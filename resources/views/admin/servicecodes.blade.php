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
                            <table id="servicecodes-datatable" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>Sl No</th>
                                        <th>Service Code</th>   
                                        <th>Service Name</th>                                                    
                                        <th>HSN Code</th>                                                    
                                        <th>Created By</th>                                    
                                        <th>Created Date</th>                                    
                                        <th>Edited By</th>                                    
                                        <th>Edited Date</th>                                    
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $i = 1; @endphp
                                    @foreach ($servicecodes as $servicecode)
                                    @php $created_by = $servicecode->createdByUser->name ?? ''; @endphp
                                    @php $created_date = \Carbon\Carbon::parse($servicecode->created_date)->timezone('Asia/Kolkata')->format('d/m/Y h:i A') ; @endphp
                                    @php $edited_by = $servicecode->editedByUser->name ?? ''; @endphp
                                    @php $edited_date = $servicecode->edited_date ? \Carbon\Carbon::parse($servicecode->edited_date)->timezone('Asia/Kolkata')->format('d/m/Y h:i A') : ''; @endphp
                                        <tr id="row{{ $servicecode->id }}">
                                            <td>{{ $i }}</td>                                                                                    
                                            <td>{{ $servicecode->service_code}}</td>                                             
                                            <td>{{ $servicecode->service_name}}</td> 
                                            <td>{{ $servicecode->hsn->hsncode ?? 'N/A'}}</td>                                              
                                            <td>{{ $created_by}}</td>
                                            <td>{{ $created_date}}</td>                                           
                                            <td>{{ $edited_by ?? ' '}}</td> 
                                            <td>{{ $edited_date ?? ' '}}</td>                                      
                                            <td>
                                                <i class="fa fa-edit edit_servicecodes"
                                                    data-id="{{ $servicecode->id }}" data-rowid="{{ $i }}" data-bs-toggle="modal"
                                                    data-bs-target="#EditModal"></i>
                                                    <i class="fa fa-trash delete_servicecodes"
                                                    data-id="{{ $servicecode->id }}">
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
                    <h5 class="modal-title">Create service code</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="create_servicecodes_form" class="form">
                        @csrf
                        <div class="form-group">
                            <label for="service_code">Service Code</label>
                            <input type="text" name="service_code" id="service_code" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="service_name">Service Name</label>
                            <input type="text" name="service_name" id="baservice_nametch" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="hsn">HSN Code</label>
                            <select name="hsn_id" id="hsn_id" class="form-control" required>
                                @foreach ($hsn as $hs)
                                    <option value="{{ $hs->id }}">{{ $hs->hsncode }}</option>
                                @endforeach
                            </select>
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
                    <h5 class="modal-title">Edit service code</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="edit_servicecodes_form" class="form">
                        @csrf

                        <input type="hidden" name="rowid" id="row_id">
                            <input type="hidden" name="id" id="servicecodes_id">
                            <div class="form-group">
                            <label for="service_code">Service Code</label>
                            <input type="text" name="service_code" id="edit_service_code" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="service_name">Service Name</label>
                            <input type="text" name="service_name" id="edit_service_name" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="hsn">HSN Code</label>
                            <select name="hsn_id" id="edit_hsn_id" class="form-control" required>
                                @foreach ($hsn as $hs)
                                    <option value="{{ $hs->id }}">{{ $hs->hsncode }}</option>
                                @endforeach
                            </select>
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
                $('#servicecodes-datatable').DataTable();
                $('#create_servicecodes_form').submit(function(event) {
                    event.preventDefault();
                    var formData = new FormData($(this)[0]);  
                    $.ajax({
                        url: "{{ route('servicecodes.store') }}", 
                        method: "POST",
                        data: formData,
                        contentType: false,
                        processData: false,
                        success: function(response) {
                            if (response.success) {
                                $('#CreateModal').modal('hide');  
                                $('#create_servicecodes_form')[0].reset(); 
                                swal("Success!", "service code added successfully!", {
                                    icon: "success",
                                    buttons: {
                                        confirm: {
                                            className: "btn btn-success",
                                        },
                                    },
                                });

                                var table = $('#servicecodes-datatable').DataTable();
                                var lastRowNumber = table.data().count() > 0 ? parseInt(table.row(':last').data()[0]) + 1 : 0;

                                var formattedCreatedDate = response.data.created_date ? new Date(response.data.created_date).toLocaleString() : ' ';
                                var formattedEditedDate = response.data.edited_date ? new Date(response.data.edited_date).toLocaleString() : ' ';

                                var newRow = table.row.add([
                                    lastRowNumber,
                                    response.data.service_code ,
                                    response.data.service_name ,
                                    response.data.hsncode || 'N/A',                                    
                                    response.data.created_by,
                                    formattedCreatedDate,
                                    response.data.edited_by || ' ',
                                    formattedEditedDate || ' ',
                                    '<i class="fa fa-edit edit_servicecodes" data-rowid="'+ lastRowNumber +'" data-id="' + response.data.id + '" data-bs-toggle="modal" data-bs-target="#EditModal"></i>'+
                                    '<i class="fa fa-trash delete_servicecodes" data-rowid="'+ lastRowNumber +'" data-id="' + response.data.id + '"></i>'
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

                $(document).on("click", ".edit_servicecodes", function() {
                    var servicecodes_id = $(this).data('id');
                    var row_id = $(this).data('rowid');
                    var item_id = $(this).data('item_id');
                    $('#servicecodes_id').val(servicecodes_id);
                    $('#hsn_id').val(hsn_id);
                    $('#row_id').val(row_id);

                    $.ajax({
                        type: "POST",
                        url: "{{ route('servicecodes.edit') }}",
                        data: {
                            "_token": "{{ csrf_token() }}",
                            "servicecodes_id": servicecodes_id
                        },
                        success: function(response) {
                            if (response.success) {
                                $('#edit_service_code ').val(response.data.service_code );                                              
                                $('#edit_service_name ').val(response.data.service_name );                                              
                                $('#edit_hsn_id ').val(response.data.hsn_id );                                              
                            } else {
                                alert('Error fetching data: ' + response.message);
                            }
                        },
                        error: function(xhr, status, error) {
                            console.error('AJAX error:', error);
                        }
                    });
                });

                $('#edit_servicecodes_form').submit(function(event) {
                    event.preventDefault(); 
                    var formData = new FormData($(this)[0]);
                    var rowId = $('#row_id').val(); 

                    $.ajax({
                        url: "{{ route('servicecodes.update') }}", 
                        method: "POST", 
                        data: formData,
                        contentType: false,
                        processData: false,
                        success: function(response) {
                            if (response.success) {
                                $('#EditModal').modal('hide');
                                $('#edit_servicecodes_form')[0].reset();
                                swal("Success!", "service code updated successfully", {
                                    icon: "success",
                                    buttons: {
                                        confirm: {
                                            className: "btn btn-success",
                                        },
                                    },
                                });

                                var table = $('#servicecodes-datatable').DataTable();
                                var row = table.row('#row' + response.data.id); 

                                var formattedCreatedDate = response.data.created_date ? new Date(response.data.created_date).toLocaleString() : ' ';
                                var formattedEditedDate = response.data.edited_date ? new Date(response.data.edited_date).toLocaleString() : ' ';

                                row.data([
                                    rowId, 
                                    response.data.service_code ,
                                    response.data.service_name ,
                                    response.data.hsncode || 'N/A',                                    
                                    response.data.created_by,
                                    formattedCreatedDate,
                                    response.data.edited_by,
                                    formattedEditedDate,
                                    '<i class="fa fa-edit edit_servicecodes" data-rowid="' + rowId + '" data-id="' + response.data.id + '" data-bs-toggle="modal" data-bs-target="#EditModal"></i>' +
                                    '<i class="fa fa-trash delete_servicecodes" data-rowid="' + rowId + '" data-id="' + response.data.id + '"></i>'
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

                $(document).on('click', '.delete_servicecodes', function() {
                    var servicecodesId = $(this).data('id');
                    var rowSelector = '#row' + servicecodesId; 

                    swal({
                        title: "Are you sure?",
                        text: "You won't be able to revert this!",
                        icon: "warning",
                        buttons: true,
                        dangerMode: true,
                    }).then((willDelete) => {
                        if (willDelete) {
                            $.ajax({
                                url: "{{ route('servicecodes.destroy') }}", 
                                method: "POST",
                                data: {
                                    "_token": "{{ csrf_token() }}", 
                                    "id": servicecodesId
                                },
                                success: function(response) {
                                    if (response.success) {
                                        var table = $('#servicecodes-datatable').DataTable();
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