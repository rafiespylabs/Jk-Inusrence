<x-admin1-layout>
    <div class="page-inner">
        <div class="page-header"></div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex align-items-center">
                            <button class="btn btn-primary btn-round ms-auto" data-bs-toggle="modal"
                                data-bs-target="#CreateModal">
                                <i class="fa fa-plus"></i> Create
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div id="preloader" style="display:none;">
                            <img src="{{ asset('web/preloader.gif') }}">
                        </div>
                        <div class="table-responsive">
                            <table id="items-datatable" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>Sl No</th>
                                        <th>Item Name</th>                                    
                                        <th>Item Code</th>
                                        <th>Category</th>
                                        <th>Subcategory</th>
                                        <th>HSN Code</th>
                                        <th>HSN Value</th>
                                        <th>HSN Description</th>
                                        <th>Type</th>
                                        <th>Unit</th>
                                        <th>Created By</th>
                                        <th>Created Date</th>                                        
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $i = 1; @endphp
                                    @foreach ($items as $item)
                                    @php $created_by = $item->user->name ?? ''; @endphp
                                        <tr id="row{{ $item->id }}">
                                            <td>{{ $i }}</td>                                           
                                            <td>{{ $item->item_name }}</td>
                                            <td>{{ $item->item_code}}</td>
                                            <td>{{ $item->category->category_name ?? 'N/A'}}</td>
                                            <td>{{ $item->subcategory->subcategory_name ?? 'N/A'}}</td>
                                            <td>{{ $item->hsn_code}}</td>
                                            <td>{{ $item->hsn_value}}</td>
                                            <td>{{ $item->hsn_description}}</td>
                                            <td>{{ $item->type == 1 ? 'service' : 'parts' }}</td>
                                            <td>{{ $item->unit->unit_name ?? 'N/A'}}</td>                                            
                                            <td>{{ $created_by}}</td>                                            
                                            <td>{{ \Carbon\Carbon::parse($item->created_date)->format('d/m/Y') }}</td>                                    
                                           
                                            <td>
                                                <i class="fa fa-edit edit_items"
                                                    data-id="{{ $item->id }}" data-rowid="{{ $i }}" data-bs-toggle="modal"
                                                    data-bs-target="#EditModal"></i>

                                                    <i class="fa fa-trash delete_items"
                                                    data-id="{{ $item->id }}"></i>    
                                            </td>
                                        </tr>
                                        @php $i++; @endphp
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

  
    <div class="modal fade" id="CreateModal" tabindex="-1" role="dialog" aria-labelledby="CreateModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Create Item</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="create_items_form" class="form">
                        @csrf      
                        <div class="row form-group">
                            <div class="col-4">
                                <label for="item_name">Item Name</label>
                                <input type="text" name="item_name" id="item_name" class="form-control">
                            </div>     
                            <div class="col-4">
                                <label for="item_code">Item Code</label>
                                <input type="text" name="item_code" id="item_code" class="form-control">
                            </div>             
                            <div class="col-4">
                                <label for="category">Category</label>
                                <select name="category_id" id="category_id" class="form-control" required>
                                        <option value="">Select One</option>
                                    @foreach ($category as $cat)
                                        <option value="{{ $cat->id }}">{{ $cat->category_name }}</option>
                                    @endforeach
                                </select>
                            </div>   
                        </div>  
                        <div class="row form-group">
                            <div class="col-4">
                                <label for="subcategory">Subcategory</label>
                                <select name="subcategory_id" id="subcategory_id" class="form-control" required>
                                    <option value="">Select One</option>
                                    @foreach ($subcategory as $sub)
                                        <option value="{{ $sub->id }}">{{ $sub->subcategory_name }}</option>
                                    @endforeach
                                </select>
                            </div>   
                            <div class="col-4">
                                <label for="hsn_code">HSN Code</label>
                                <input type="text" name="hsn_code" id="hsn_code" class="form-control">
                            </div>
                            <div class="col-4">
                                <label for="hsn_value">HSN Value</label>
                                <input type="number" name="hsn_value" id="hsn_value" class="form-control">
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-4">
                                <label for="hsn_description">HSN Description</label>
                                <input type="text" name="hsn_description" id="hsn_description" class="form-control">
                            </div>
                            <div class="col-4">
                                <label for="type" class="form-label">Type</label>
                                <select name="type" id="type" class="form-control" required>
                                    <option value="">Select One</option>
                                    <option value="0" {{ isset($item) && $item->type == 0 ? 'selected' : '' }}>service</option>
                                    <option value="1" {{ isset($item) && $item->type == 1 ? 'selected' : '' }}>parts</option>
                                </select>
                            </div>
                            <div class="col-4">
                                <label for="unit">Unit</label>
                                <select name="unit_id" id="unit_id" class="form-control" required>
                                    <option value="">Select One</option>
                                    @foreach ($unit as $uni)
                                        <option value="{{ $uni->id }}">{{ $uni->unit_name }}</option>
                                    @endforeach
                                </select>
                            </div>  
                        </div>                    
                        <div class="form-actions form-group">
                            <button type="submit" class="btn btn-primary btn-sm">Submit</button>
                            <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Cancel</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="EditModal" tabindex="-1" role="dialog" aria-labelledby="EditModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Item</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="edit_items_form" class="form">
                        @csrf
                        <input type="hidden" name="rowid" id="row_id">
                        <input type="hidden" name="id" id="items_id">                    
                        <div class="row form-group">
                            <div class="col-4">
                                <label for="item_name">Customer Name</label>
                                <input type="text" name="item_name" id="edit_item_name" class="form-control">
                            </div>     
                            <div class="col-4">
                                <label for="item_code">Item Code</label>
                                <input type="text" name="item_code" id="edit_item_code" class="form-control">
                            </div>             
                            <div class="col-4">
                                <label for="category">Category</label>
                                <select name="category_id" id="edit_category_id" class="form-control" required>
                                        <option value="">Select One</option>
                                    @foreach ($category as $cat)
                                        <option value="{{ $cat->id }}">{{ $cat->category_name }}</option>
                                    @endforeach
                                </select>
                            </div>   
                        </div> 
                        <div class="row form-group">
                            <div class="col-4">
                                <label for="subcategory">Subcategory</label>
                                <select name="subcategory_id" id="edit_subcategory_id" class="form-control" required>
                                        <option value="">Select One</option>
                                    @foreach ($subcategory as $sub)
                                        <option value="{{ $sub->id }}">{{ $sub->subcategory_name }}</option>
                                    @endforeach
                                </select>
                            </div>   
                            <div class="col-4">
                                <label for="hsn_code">HSN Code</label>
                                <input type="text" name="hsn_code" id="edit_hsn_code" class="form-control">
                            </div>
                            <div class="col-4">
                                <label for="hsn_value">HSN Value</label>
                                <input type="number" name="hsn_value" id="edit_hsn_value" class="form-control">
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-4">
                                <label for="hsn_description">HSN Description</label>
                                <input type="text" name="hsn_description" id="edit_hsn_description" class="form-control">
                            </div>
                            <div class="col-4">
                                <label for="type" class="form-label">Type</label>
                                <select name="type" id="edit_type" class="form-control" required>
                                    <option value="">Select One</option>
                                    <option value="0" {{ isset($item) && $item->type == 0 ? 'selected' : '' }}>service</option>
                                    <option value="1" {{ isset($item) && $item->type == 1 ? 'selected' : '' }}>parts</option>
                                </select>
                            </div>
                            <div class="col-4">
                                <label for="unit">Unit</label>
                                <select name="unit_id" id="edit_unit_id" class="form-control" required>
                                    <option value="">Select One</option>
                                    @foreach ($unit as $uni)
                                        <option value="{{ $uni->id }}">{{ $uni->unit_name }}</option>
                                    @endforeach
                                </select>
                            </div>                         
                        </div> 
                        <div class="form-actions form-group">
                            <button type="submit" class="btn btn-primary btn-sm">Submit</button>
                            <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Cancel</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>    

    @push('scripts')
        <script>
            $(document).ready(function() {
                $('#items-datatable').DataTable();
                $('#create_items_form').submit(function(event) {
                    event.preventDefault(); 
                    var formData = new FormData($(this)[0]);  

                    $.ajax({
                        url: "{{ route('items.store') }}",  
                        method: "POST",
                        data: formData,
                        contentType: false,  
                        processData: false,  
                        success: function(response) {
                            if (response.success) {
                                $('#CreateModal').modal('hide');  

                                $('#create_items_form')[0].reset(); 

                                swal("Success!", "Item added successfully!", {
                                    icon: "success",
                                    buttons: {
                                        confirm: {
                                            className: "btn btn-success",
                                        },
                                    },
                                });

                                var table = $('#items-datatable').DataTable();
                                var lastRowNumber = table.data().count() > 0 ? parseInt(table.row(':last').data()[0]) + 1 : 0;
                                var type='';
                                if(response.data.type==0)
                                {
                                    type='Service';
                                }
                                else if(response.data.type==1)
                                {
                                    type='Parts';
                                }
                                var newRow = table.row.add([
                                    lastRowNumber,                      
                                    response.data.item_name || 'N/A',
                                    response.data.item_code || 'N/A',
                                    response.data.category_name || 'N/A',
                                    response.data.subcategory_name || 'N/A',
                                    response.data.hsn_code || 'N/A',
                                    response.data.hsn_value || 'N/A',
                                    response.data.hsn_description || 'N/A',
                                    type || 'N/A',
                                    response.data.unit || 'N/A',
                                    response.data.created_user || 'N/A',
                                    response.data.created_date || 'N/A',  
                                    
                                                                                                            
                                    '<i class="fa fa-edit edit_items" data-rowid="'+ lastRowNumber +'" data-id="' + response.data.id + '" data-bs-toggle="modal" data-bs-target="#EditModal"></i>' +
                                    '<i class="fa fa-trash delete_items" data-rowid="'+ lastRowNumber +'" data-id="' + response.data.id + '"></i>'
                                ]).draw(false);

                                table.page('last').draw(false);  
                                $(newRow.node()).attr('id', 'row' + response.data.id);              
                            } else {
                                swal("Error", response.message, {
                                    icon: "error",
                                    buttons: {
                                        confirm: {
                                            className: "btn btn-danger",
                                        },
                                    },
                                });
                            }
                        },
                        error: function(xhr, status, error) {
                            console.error('AJAX error:', error);
                            swal("Error", "An unexpected error occurred. Please try again.", {
                                icon: "error",
                                buttons: {
                                    confirm: {
                                        className: "btn btn-danger",
                                    },
                                },
                            });
                        }
                    });
                });  

                        
    
                $(document).on("click", ".edit_items", function() {
                                    

                    var items_id = $(this).data('id');
                    var row_id = $(this).data('rowid');                        
                    var category_id = $(this).data('category_id');
                    var subcategory_id = $(this).data('subcategory_id');
                    var unit_id = $(this).data('unit_id');
                     
                    $('#items_id').val(items_id);
                    $('#row_id').val(row_id);
                    $('#category_id').val(category_id);
                    $('#subcategory_id').val(subcategory_id);                   
                    $('#unit_id').val(unit_id);                   
    
                    $.ajax({
                        type: "POST",
                        url: "{{ route('items.edit') }}",
                        data: {
                            "_token": "{{ csrf_token() }}",
                            "id": items_id
                        },
                        success: function(response) {
                            if (response.success) {
                                $('#edit_item_name').val(response.data.item_name);
                                $('#edit_item_code').val(response.data.item_code);
                                $('#edit_category_id').val(response.data.category_id);
                                $('#edit_subcategory_id').val(response.data.subcategory_id);
                                $('#edit_hsn_code').val(response.data.hsn_code);
                                $('#edit_hsn_value').val(response.data.hsn_value);
                                $('#edit_hsn_description').val(response.data.hsn_description);
                                $('#edit_type').val(response.data.type);
                                $('#edit_unit_id').val(response.data.unit_id);                                         
                            
                                $('#EditModal').modal('show');
                            } else {
                                alert('Error: ' + response.message);
                            }
                        },
                        error: function(xhr, status, error) {
                            console.error('AJAX Error:', error);
                            alert('Failed to fetch data.');
                        }
                    });
                });


                $('#edit_items_form').submit(function(event) {
                    event.preventDefault(); 
                    var formData = new FormData($(this)[0]);
                    var rowId = $('#row_id').val();

                    $.ajax({
                        url: "{{ route('items.update') }}", 
                        method: "POST", 
                        data: formData,
                        contentType: false, 
                        processData: false, 
                        success: function(response) {
                            if (response.success) {
                                $('#EditModal').modal('hide');
                                $('#edit_items_form')[0].reset();
                                swal("Success!", "Item Updated successfully", {
                                    icon: "success",
                                    buttons: {
                                        confirm: {
                                            className: "btn btn-success",
                                        },
                                    },
                                });
                                
                                var table = $('#items-datatable').DataTable();
                                var row = table.row('#row' + response.data.id); 
                                var type='';
                                if(response.data.type==0)
                                {
                                    type='Service';
                                }
                                else if(response.data.type==1)
                                {
                                    type='Parts';
                                }
                                row.data([
                                    rowId,                       
                                    response.data.item_name || 'N/A',
                                    response.data.item_code || 'N/A',
                                    response.data.category_name || 'N/A',
                                    response.data.subcategory_name || 'N/A',
                                    response.data.hsn_code || 'N/A',
                                    response.data.hsn_value || 'N/A',
                                    response.data.hsn_description || 'N/A',
                                    type || 'N/A',
                                    response.data.unit || 'N/A',
                                    response.data.created_user || 'N/A',
                                    response.data.created_date || 'N/A',                                 
                                    '<i class="fa fa-edit edit_items" data-rowid="'+ rowId +'" data-id="' + response.data.id + '" data-bs-toggle="modal" data-bs-target="#EditModal"></i>' +
                                    '<i class="fa fa-trash delete_items" data-rowid="'+ rowId +'" data-id="' + response.data.id + '"></i>' 
                                ]).draw(false); 
                                } else {
                                    alert('Error updating data: ' + response.message);
                                }
                        },
                        error: function(xhr, status, error) {
                            console.error('AJAX error:', error);
                        }
                    });
                });

                $(document).on('click', '.delete_items', function () {
                    var itemsId = $(this).data('id'); 
                    var rowSelector = '#row' + itemsId; 

                    swal({
                        title: "Are you sure?",
                        text: "You won't be able to revert this!",
                        icon: "warning",
                        buttons: true,
                        dangerMode: true,
                    }).then((willDelete) => {
                        if (willDelete) {
                            $.ajax({
                                url: "{{ route('items.destroy') }}", 
                                method: "POST",
                                data: {
                                    "_token": "{{ csrf_token() }}",
                                    "id": itemsId               
                                },
                                success: function (response) {
                                    if (response.success) {                       
                                        var table = $('#items-datatable').DataTable();
                                        table.row($(rowSelector)).remove().draw(false);                    

                                        swal("Deleted!", response.message, {
                                            icon: "success",
                                        });
                                    } else {
                                        swal("Error", response.message, {
                                            icon: "error",
                                        });
                                    }
                                },
                                error: function (xhr, status, error) {
                                    console.error('AJAX error:', xhr.responseText);
                                    swal("Error", "An unexpected error occurred. Please try again.", {
                                        icon: "error",
                                    });
                                }
                            });
                        }
                    });
                });

            });
            
        </script>
    @endpush
</x-admin1-layout>