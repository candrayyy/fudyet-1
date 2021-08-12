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
                        <div class="col-md-12 mt-2 mb-5">
                            <table class="table table-hover data-table" style="width: 100%">
                                <thead class="table-light">
                                    <tr>
                                        <th>No</th>
                                        <th>Name</th>
                                        <th>Category</th>
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
                        <label for="name" class="col-sm-2 control-label">Name</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" id="food_name" name="food_name" placeholder="Enter name" required>
                        </div>
                    </div>
     
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Category</label>
                        <div class="col-sm-12">
                            <select name="food_category" id="food_category"  class="form-select form-select-sm" aria-label=".form-select-sm example">
                                <!--hardcode hehe -->
                                    <option value="Meats & Poultry">Meats & Poultry</option>
                                    <option value="Seafood">Seafood</option>
                                    <option value="Eggs & Dairy">Eggs & Dairy</option>
                                    <option value="Oils & Fats">Oils & Fats</option>
                                    <option value="Nuts & Seeds">Nuts & Seeds</option>
                                    <option value="Beans & Legumes">Beans & Legumes</option>
                                    <option value="Cereals">Cereals</option>
                                    <option value="Breads & Muffins">Breads & Muffins</option>
                                    <option value="Grains & Pastas">Grains & Pastas</option>
                                    <option value="Vegetables">Vegetables</option>
                                    <option value="Fruit">Fruit</option>
                                    <option value="Juices & Fluids">Juices & Fluids</option>
                                    <option value="Condiments">Condiments</option>
                                    <option value="Spices">Spices</option>
                                    <option value="Herbal Teas">Herbal Teas</option>
                                    <option value="Misc Beverages">Misc Beverages</option>
                            </select>
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
            {data: 'food_name', name: 'food_name'},
            {data: 'food_category', name: 'food_category'},
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
            $('#food_name').val(data.food_name);
            $('#food_category').val(data.food_category);
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
