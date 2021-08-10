@extends('admin.layouts.app')

@section('title', 'Rules')
@section('content')
    <section style="padding-top: 15px">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-12 text-right">
                            <a class="btn btn-dark rounded-pill" href="javascript:void(0)" id="createNewFoodFact"> + Rules</a>
                        </div>
                        <div class="col-md-12 mt-2">
                            <table class="table table-hover data-table" style="width: 100%">
                                <thead class="table-light">
                                    <tr>
                                        <th>No</th>
                                        <th>Food ID</th>
                                        <th>Fact ID</th>
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
                <form id="foodFactForm" name="foodFactForm" class="form-horizontal">
                    <input type="hidden" name="id" id="id">
                    <div class="form-group">
                        <label for="name" class="col-sm-2 control-label">Code</label>
                        <div class="col-sm-12">
                            <select name="food_id" id="food_id"  class="form-select form-select-sm" aria-label=".form-select-sm example">
                                <option selected hidden>Pilih Makanan</option>
                                @foreach($foods as $food)
                                    <option value="{{$food->id}}">{{$food->food_name}} - {{$food->food_code}} - {{$food->id}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Name</label>
                        <div class="col-sm-12">
                            <select name="fact_id" id="fact_id"  class="form-select form-select-sm" aria-label=".form-select-sm example">
                                <option selected hidden>Pilih Fakta</option>
                                @foreach($facts as $fact)
                                    <option value="{{$fact->id}}">{{$fact->fact_name}} - {{$fact->fact_code}} - {{$fact->id}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
      
                    <div class="col-sm-offset-2 col-sm-10">
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
        ajax: "{{ route('rules.index') }}",
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {data: 'food_id', name: 'food_id'},
            {data: 'fact_id', name: 'fact_id'},
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ]
    });
     
    $('#createNewFoodFact').click(function () {
        $('#saveBtn').val("create-foodfact");
        $('#id').val('');
        $('#foodfactForm').trigger("reset");
        $('#modelHeading').html("Create New Food Fact");
        $('#ajaxModel').modal('show');
    });
    
    $('body').on('click', '.editFoodFact', function () {
        var id = $(this).data('id');
        $.get("{{ route('rules.index') }}" +'/' + id +'/edit', function (data) {
            $('#modelHeading').html("Edit Food Fact");
            $('#saveBtn').val("edit-user");
            $('#ajaxModel').modal('show');
            $('#id').val(data.id);
            $('#food_id').val(data.food_id);
            $('#fact_id').val(data.fact_id);
        })
    });
    
    $('#saveBtn').click(function (e) {
        e.preventDefault();
        $(this).html('Sending..');
    
        $.ajax({
            data: $('#foodFactForm').serialize(),
            url: "{{ route('rules.store') }}",
            type: "POST",
            dataType: 'json',
            success: function (data) {
                $('#foodfactForm').trigger("reset");
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

    $('body').on('click', '.deleteFoodFact', function (){
        var id = $(this).data("id");
        var result = confirm("Are You sure want to delete !");
        if(result){
            $.ajax({
                type: "DELETE",
                url: "{{ route('rules.store') }}"+'/'+id,
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