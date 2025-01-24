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
                            <table id="clients-datatable" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>Sl No</th>
                                        <th>Client Name</th> 
                                        <th>Client Contact Number</th>                                      
                                        <th>Client GST</th>                                    
                                        <th>Client Address</th>                                  
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $i = 1; @endphp
                                    @foreach ($clients as $client)
                                        <tr id="row{{ $client->id }}">
                                            <td>{{ $i }}</td>                                            
                                            <td>{{ $client->client_name }}</td>                                        
                                            <td>{{ $client->client_contact_number }}</td>                                        
                                            <td>{{ $client->client_gst }}</td>                                        
                                            <td>{{ $client->client_address }}</td>                                        
                                            <td>
                                                <i class="fa fa-edit edit_clients"
                                                    data-id="{{ $client->id }}" data-rowid="{{ $i }}" data-bs-toggle="modal"
                                                    data-bs-target="#EditModal"></i>
                                                    <i class="fa fa-trash delete_clients"
                                                    data-id="{{ $client->id }}">
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
                    <h5 class="modal-title">Create Client</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="create_clients_form" class="form">
                        @csrf
                        <div class="form-group">
                            <label for="client_name">Client Name</label>
                            <input type="text" name="client_name" id="client_name" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="client_contact_number">Client Contact Number</label>
                            <input type="number" name="client_contact_number" id="client_contact_number" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="client_gst">Client GST</label>
                            <input type="text" name="client_gst" id="client_gst" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="client_address">Client Address</label>
                            <input type="text" name="client_address" id="client_address" class="form-control">
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
                    <h5 class="modal-title">Edit Client </h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="edit_clients_form" class="form">
                        @csrf

                        <input type="hidden" name="rowid" id="row_id">
                            <input type="hidden" name="id" id="clients_id">
                        <div class="form-group">
                            <label for="client_name">Client Name</label>
                            <input type="text" name="client_name" id="edit_client_name" class="form-control" required>
                        </div>     
                        <div class="form-group">
                            <label for="client_contact_number">Client Contact Number</label>
                            <input type="text" name="client_contact_number" id="edit_client_contact_number" class="form-control" required>
                        </div> 
                        <div class="form-group">
                            <label for="client_gst">Client GST</label>
                            <input type="text" name="client_gst" id="edit_client_gst" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="client_address">Client Address</label>
                            <input type="text" name="client_address" id="edit_client_address" class="form-control">
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
                $('#clients-datatable').DataTable();
                $('#create_clients_form').submit(function(event) {
                    event.preventDefault();
                    var formData = new FormData($(this)[0]);  
                    $.ajax({
                        url: "{{ route('clients.store') }}", 
                        method: "POST",
                        data: formData,
                        contentType: false,
                        processData: false,
                        success: function(response) {
                            if (response.success) {
                                $('#CreateModal').modal('hide');  
                                $('#create_clients_form')[0].reset(); 
                                swal("Success!", "Client added successfully!", {
                                    icon: "success",
                                    buttons: {
                                        confirm: {
                                            className: "btn btn-success",
                                        },
                                    },
                                });

                                var table = $('#clients-datatable').DataTable();
                                var lastRowNumber = table.data().count() > 0 ? parseInt(table.row(':last').data()[0]) + 1 : 0;
                                var newRow = table.row.add([
                                    lastRowNumber,
                                    response.data.client_name,
                                    response.data.client_contact_number,
                                    response.data.client_gst,
                                    response.data.client_address,
                                    '<i class="fa fa-edit edit_clients" data-rowid="'+ lastRowNumber +'" data-id="' + response.data.id + '" data-bs-toggle="modal" data-bs-target="#EditModal"></i>'+
                                    '<i class="fa fa-trash delete_clients" data-rowid="'+ lastRowNumber +'" data-id="' + response.data.id + '"></i>'
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

                $(document).on("click", ".edit_clients", function() {
                    var clients_id = $(this).data('id');
                    var row_id = $(this).data('rowid');
                    $('#clients_id').val(clients_id);
                    $('#row_id').val(row_id);

                    $.ajax({
                        type: "POST",
                        url: "{{ route('clients.edit') }}",
                        data: {
                            "_token": "{{ csrf_token() }}",
                            "clients_id":clients_id
                        },
                        success: function(response) {
                            if (response.success) {
                                $('#edit_client_name').val(response.data.client_name);                                              
                                $('#edit_client_contact_number').val(response.data.client_contact_number);                                              
                                $('#edit_client_gst').val(response.data.client_gst);                                              
                                $('#edit_client_address').val(response.data.client_address);                                              
                            } else {
                                alert('Error fetching data: ' + response.message);
                            }
                        },
                        error: function(xhr, status, error) {
                            console.error('AJAX error:', error);
                        }
                    });
                });

                $('#edit_clients_form').submit(function(event) {
                    event.preventDefault(); 
                    var formData = new FormData($(this)[0]);
                    var rowId = $('#row_id').val(); 

                    $.ajax({
                        url: "{{ route('clients.update') }}", 
                        method: "POST", 
                        data: formData,
                        contentType: false,
                        processData: false,
                        success: function(response) {
                            if (response.success) {
                                $('#EditModal').modal('hide');
                                $('#edit_clients_form')[0].reset();
                                swal("Success!", "Client updated successfully", {
                                    icon: "success",
                                    buttons: {
                                        confirm: {
                                            className: "btn btn-success",
                                        },
                                    },
                                });

                                var table = $('#clients-datatable').DataTable();
                                var row = table.row('#row' + response.data.id); 

                                row.data([
                                    rowId, 
                                    response.data.client_name, 
                                    response.data.client_contact_number, 
                                    response.data.client_gst, 
                                    response.data.client_address, 
                                    '<i class="fa fa-edit edit_clients" data-rowid="' + rowId + '" data-id="' + response.data.id + '" data-bs-toggle="modal" data-bs-target="#EditModal"></i>' +
                                    '<i class="fa fa-trash delete_clients" data-rowid="' + rowId + '" data-id="' + response.data.id + '"></i>'
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

                $(document).on('click', '.delete_clients', function() {
                    var clientsId = $(this).data('id');
                    var rowSelector = '#row' + clientsId; 

                    swal({
                        title: "Are you sure?",
                        text: "You won't be able to revert this!",
                        icon: "warning",
                        buttons: true,
                        dangerMode: true,
                    }).then((willDelete) => {
                        if (willDelete) {
                            $.ajax({
                                url: "{{ route('clients.destroy') }}", 
                                method: "POST",
                                data: {
                                    "_token": "{{ csrf_token() }}", 
                                    "id": clientsId
                                },
                                success: function(response) {
                                    if (response.success) {
                                        var table = $('#clients-datatable').DataTable();
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