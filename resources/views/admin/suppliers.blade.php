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
                            <table id="suppliers-datatable" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>Sl No</th>
                                        <th>Supplier Name</th>                                    
                                        <th>Supplier GST</th>                                    
                                        <th>Supplier Address</th>                                    
                                        <th>Supplier Contact Number</th>                                    
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $i = 1; @endphp
                                    @foreach ($suppliers as $supplier)
                                        <tr id="row{{ $supplier->id }}">
                                            <td>{{ $i }}</td>                                            
                                            <td>{{ $supplier->supplier_name }}</td>                                        
                                            <td>{{ $supplier->supplier_gst }}</td>                                        
                                            <td>{{ $supplier->supplier_address }}</td>                                        
                                            <td>{{ $supplier->supplier_contact_number }}</td>                                        
                                            <td>
                                                <i class="fa fa-edit edit_suppliers"
                                                    data-id="{{ $supplier->id }}" data-rowid="{{ $i }}" data-bs-toggle="modal"
                                                    data-bs-target="#EditModal"></i>
                                                    <i class="fa fa-trash delete_suppliers"
                                                    data-id="{{ $supplier->id }}">
                                                </i>
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
        <div class="modal-dialog modal-lg" role="document">            
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Create Supplier</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="create_suppliers_form" class="form">
                        @csrf
                        <div class="form-group">
                            <label for="supplier_name">Supplier Name</label>
                            <input type="text" name="supplier_name" id="supplier_name" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="supplier_gst">Supplier GST</label>
                            <input type="text" name="supplier_gst" id="supplier_gst" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="supplier_address">Supplier Address</label>
                            <input type="text" name="supplier_address" id="supplier_address" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="supplier_contact_number">Supplier Contact Number</label>
                            <input type="number" name="supplier_contact_number" id="supplier_contact_number" class="form-control" required>
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
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Supplier </h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="edit_suppliers_form" class="form">
                        @csrf

                        <input type="hidden" name="rowid" id="row_id">
                            <input type="hidden" name="id" id="suppliers_id">
                        <div class="form-group">
                            <label for="supplier_name">Supplier Name</label>
                            <input type="text" name="supplier_name" id="edit_supplier_name" class="form-control" required>
                        </div>     
                        <div class="form-group">
                            <label for="supplier_gst">Supplier GST</label>
                            <input type="text" name="supplier_gst" id="edit_supplier_gst" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="supplier_address">Supplier Address</label>
                            <input type="text" name="supplier_address" id="edit_supplier_address" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="supplier_contact_number">Supplier Contact Number</label>
                            <input type="text" name="supplier_contact_number" id="edit_supplier_contact_number" class="form-control" required>
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
                $('#suppliers-datatable').DataTable();
                $('#create_suppliers_form').submit(function(event) {
                    event.preventDefault();
                    var formData = new FormData($(this)[0]);  
                    $.ajax({
                        url: "{{ route('suppliers.store') }}", 
                        method: "POST",
                        data: formData,
                        contentType: false,
                        processData: false,
                        success: function(response) {
                            if (response.success) {
                                $('#CreateModal').modal('hide');  
                                $('#create_suppliers_form')[0].reset(); 
                                swal("Success!", "Supplier added successfully!", {
                                    icon: "success",
                                    buttons: {
                                        confirm: {
                                            className: "btn btn-success",
                                        },
                                    },
                                });

                                var table = $('#suppliers-datatable').DataTable();
                                var lastRowNumber = table.data().count() > 0 ? parseInt(table.row(':last').data()[0]) + 1 : 0;
                                var newRow = table.row.add([
                                    lastRowNumber,
                                    response.data.supplier_name,
                                    response.data.supplier_gst,
                                    response.data.supplier_address,
                                    response.data.supplier_contact_number,
                                    '<i class="fa fa-edit edit_suppliers" data-rowid="'+ lastRowNumber +'" data-id="' + response.data.id + '" data-bs-toggle="modal" data-bs-target="#EditModal"></i>'+
                                    '<i class="fa fa-trash delete_suppliers" data-rowid="'+ lastRowNumber +'" data-id="' + response.data.id + '"></i>'
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

                $(document).on("click", ".edit_suppliers", function() {
                    var suppliers_id = $(this).data('id');
                    var row_id = $(this).data('rowid');
                    $('#suppliers_id').val(suppliers_id);
                    $('#row_id').val(row_id);

                    $.ajax({
                        type: "POST",
                        url: "{{ route('suppliers.edit') }}",
                        data: {
                            "_token": "{{ csrf_token() }}",
                            "suppliers_id":suppliers_id
                        },
                        success: function(response) {
                            if (response.success) {
                                $('#edit_supplier_name').val(response.data.supplier_name);                                              
                                $('#edit_supplier_gst').val(response.data.supplier_gst);                                              
                                $('#edit_supplier_address').val(response.data.supplier_address);                                              
                                $('#edit_supplier_contact_number').val(response.data.supplier_contact_number);                                              
                            } else {
                                alert('Error fetching data: ' + response.message);
                            }
                        },
                        error: function(xhr, status, error) {
                            console.error('AJAX error:', error);
                        }
                    });
                });

                $('#edit_suppliers_form').submit(function(event) {
                    event.preventDefault(); 
                    var formData = new FormData($(this)[0]);
                    var rowId = $('#row_id').val(); 

                    $.ajax({
                        url: "{{ route('suppliers.update') }}", 
                        method: "POST", 
                        data: formData,
                        contentType: false,
                        processData: false,
                        success: function(response) {
                            if (response.success) {
                                $('#EditModal').modal('hide');
                                $('#edit_suppliers_form')[0].reset();
                                swal("Success!", "Supplier updated successfully", {
                                    icon: "success",
                                    buttons: {
                                        confirm: {
                                            className: "btn btn-success",
                                        },
                                    },
                                });

                                var table = $('#suppliers-datatable').DataTable();
                                var row = table.row('#row' + response.data.id); 

                                row.data([
                                    rowId, 
                                    response.data.supplier_name, 
                                    response.data.supplier_gst, 
                                    response.data.supplier_address, 
                                    response.data.supplier_contact_number, 
                                    '<i class="fa fa-edit edit_suppliers" data-rowid="' + rowId + '" data-id="' + response.data.id + '" data-bs-toggle="modal" data-bs-target="#EditModal"></i>' +
                                    '<i class="fa fa-trash delete_suppliers" data-rowid="' + rowId + '" data-id="' + response.data.id + '"></i>'
                                ]).draw(false);
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

                $(document).on('click', '.delete_suppliers', function() {
                    var suppliersId = $(this).data('id');
                    var rowSelector = '#row' + suppliersId; 

                    swal({
                        title: "Are you sure?",
                        text: "You won't be able to revert this!",
                        icon: "warning",
                        buttons: true,
                        dangerMode: true,
                    }).then((willDelete) => {
                        if (willDelete) {
                            $.ajax({
                                url: "{{ route('suppliers.destroy') }}", 
                                method: "POST",
                                data: {
                                    "_token": "{{ csrf_token() }}", 
                                    "id": suppliersId
                                },
                                success: function(response) {
                                    if (response.success) {
                                        var table = $('#suppliers-datatable').DataTable();
                                        table.row(rowSelector).remove().draw(false);
                                        swal("Deleted!", response.message, {
                                            icon: "success",
                                        });
                                    } else {
                                        swal("Error", response.message, {
                                            icon: "error",
                                        });
                                    }
                                },
                                
                                error: function(xhr, status, error) {
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