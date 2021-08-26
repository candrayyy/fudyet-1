@extends('admin.layouts.app')

@section('title', 'Blood Type')
@section('content')
    <section style="padding-top: 15px">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-12 text-right">
                            <a class="btn btn-dark" href="javascript:void(0)" id="createNewBloodType"><i class="bi bi-plus-circle-fill"></i> add blood type</a>
                        </div>
                        <div class="col-md-12 mt-2 mb-5">
                            <table class="table table-hover data-table" style="width: 100%">
                                <thead class="table-light">
                                    <tr>
                                        <th>No</th>
                                        <th>Type</th>
                                        <th>ID</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


   <div class="modal fade" id="ajaxModel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modelHeading"></h4>
            </div>
            <div class="modal-body">
                <form id="bloodTypeForm" name="bloodTypeForm" class="form-horizontal">
                    <input type="hidden" name="id" id="id">
     
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Type</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" id="blood_type" name="blood_type" placeholder="Enter Type" maxlength="50" required>
                        </div>
                    </div>
      
                    <div class="col-sm-offset-2 col-sm-10 mt-2">
                        <button type="submit" class="btn btn-primary" id="saveBtn">Create</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

    
<script type="text/javascript">
    $(function () {
     
    $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    
    var table = $('.data-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('blood-fact.index') }}",
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {data: 'blood_type', name: 'blood_type'},
            {data: 'id', name: 'id'},
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ]
    });
     
    $('#createNewBloodType').click(function () {
        $('#saveBtn').val("create-blood-type");
        $('#id').val('');
        $('#bloodTypeForm').trigger("reset");
        $('#modelHeading').html("Create New Blood Type");
        $('#ajaxModel').modal('show');
    });
    
    $('body').on('click', '.editBloodFact', function () {
        var id = $(this).data('id');
        $.get("{{ route('blood-fact.index') }}" +'/' + id +'/edit', function (data) {
            $('#modelHeading').html("Edit Blood Fact");
            $('#saveBtn').val("edit-user");
            $('#ajaxModel').modal('show');
            $('#id').val(data.id);
            $('#blood_type').val(data.blood_type);
        })
    });
    
    $('#saveBtn').click(function (e) {
        e.preventDefault();
        $(this).html('Sending..');
    
        $.ajax({
            data: $('#bloodTypeForm').serialize(),
            url: "{{ route('blood-fact.store') }}",
            type: "POST",
            dataType: 'json',
            success: function (data) {
                $('#bloodTypeForm').trigger("reset");
                $('#ajaxModel').modal('hide');
                $('#saveBtn').html('Create');
                table.draw();
            },
            error: function (data) {
                console.log('Error:', data);
                $('#saveBtn').html('Create');
            }
        });
    });

    $('body').on('click', '.deleteBloodType', function (){
        var id = $(this).data("id");
        var result = confirm("Are You sure want to delete !");
        if(result){
            $.ajax({
                type: "DELETE",
                url: "{{ route('blood-fact.store') }}"+'/'+id,
                success: function (data) {
                    table.draw();
                },
                error: function (data) {
                    console.log('Error:', data);
                }
            });
        }else{
            return false;
        }
    });
});
</script>
    

@endsection
