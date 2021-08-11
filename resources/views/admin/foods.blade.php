@extends('admin.layouts.app')

@section('title', 'Foods')
@section('content')
    <section style="padding-top: 15px">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-12 text-right">
                            <a class="btn btn-dark" href="javascript:void(0)" id="createNewFood"><i class="bi bi-plus-circle-fill"></i></a>
                        </div>
                        <div class="col-md-12 mt-2">
                            <table class="table table-hover data-table" style="width: 100%">
                                <thead class="table-light">
                                    <tr>
                                        <th>No</th>
                                        <th>Code</th>
                                        <th>Name</th>
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
                <form id="foodForm" name="foodForm" class="form-horizontal">
                    <input type="hidden" name="id" id="id">
                    <div class="form-group">
                        <label for="name" class="col-sm-2 control-label">Code</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" id="food_code" name="food_code" placeholder="Enter Code"  minlength="5" maxlength="5" required>
                        </div>
                    </div>
     
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Name</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" id="food_name" name="food_name" placeholder="Enter Name" maxlength="50" required>
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
        ajax: "{{ route('foods.index') }}",
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {data: 'food_code', name: 'food_code'},
            {data: 'food_name', name: 'food_name'},
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ]
    });
     
    $('#createNewFood').click(function () {
        $('#saveBtn').val("create-food");
        $('#id').val('');
        $('#foodForm').trigger("reset");
        $('#modelHeading').html("Create New Food");
        $('#ajaxModel').modal('show');
    });
    
    $('body').on('click', '.editFood', function () {
        var id = $(this).data('id');
        $.get("{{ route('foods.index') }}" +'/' + id +'/edit', function (data) {
            $('#modelHeading').html("Edit Food");
            $('#saveBtn').val("edit-user");
            $('#ajaxModel').modal('show');
            $('#id').val(data.id);
            $('#food_code').val(data.food_code);
            $('#food_name').val(data.food_name);
        })
    });
    
    $('#saveBtn').click(function (e) {
        e.preventDefault();
        $(this).html('Sending..');
    
        $.ajax({
            data: $('#foodForm').serialize(),
            url: "{{ route('foods.store') }}",
            type: "POST",
            dataType: 'json',
            success: function (data) {
                $('#foodForm').trigger("reset");
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

    $('body').on('click', '.deleteFood', function (){
        var id = $(this).data("id");
        var result = confirm("Are You sure want to delete !");
        if(result){
            $.ajax({
                type: "DELETE",
                url: "{{ route('foods.store') }}"+'/'+id,
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
