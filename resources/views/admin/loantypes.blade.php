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
                            <table id="loantypes-datatable" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>Sl No</th>
                                        <th>Loan Type</th>                                    
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $i = 1; @endphp
                                    @foreach ($loantypes as $loantype)
                                        <tr id="row{{ $loantype->id }}">
                                            <td>{{ $i }}</td>                                            
                                            <td>{{ $loantype->loan_type }}</td>                                        
                                            <td>
                                                <i class="fa fa-edit edit_loantypes"
                                                    data-id="{{ $loantype->id }}" data-rowid="{{ $i }}" data-bs-toggle="modal"
                                                    data-bs-target="#EditModal"></i>
                                                    <i class="fa fa-trash delete_loantypes"
                                                    data-id="{{ $loantype->id }}">
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
                    <h5 class="modal-title">Create Loan Type</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="create_loantypes_form" class="form">
                        @csrf
                        <div class="form-group">
                            <label for="loan_type">Loan Type</label>
                            <input type="text" name="loan_type" id="loan_type" class="form-control" required>
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
                    <h5 class="modal-title">Edit Loan Type </h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="edit_loantypes_form" class="form">
                        @csrf

                        <input type="hidden" name="rowid" id="row_id">
                            <input type="hidden" name="id" id="loantypes_id">
                        <div class="form-group">
                            <label for="loan_type">Loan Type</label>
                            <input type="text" name="loan_type" id="edit_loan_type" class="form-control" required>
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
                $('#loantypes-datatable').DataTable();
                $('#create_loantypes_form').submit(function(event) {
                    event.preventDefault();
                    var formData = new FormData($(this)[0]);  
                    $.ajax({
                        url: "{{ route('loantypes.store') }}", 
                        method: "POST",
                        data: formData,
                        contentType: false,
                        processData: false,
                        success: function(response) {
                            if (response.success) {
                                $('#CreateModal').modal('hide');  
                                $('#create_loantypes_form')[0].reset(); 
                                swal("Success!", "Loan Types added successfully!", {
                                    icon: "success",
                                    buttons: {
                                        confirm: {
                                            className: "btn btn-success",
                                        },
                                    },
                                });

                                var table = $('#loantypes-datatable').DataTable();
                                var lastRowNumber = table.data().count() > 0 ? parseInt(table.row(':last').data()[0]) + 1 : 0;
                                var newRow = table.row.add([
                                    lastRowNumber,
                                    response.data.loan_type,
                                    '<i class="fa fa-edit edit_loantypes" data-rowid="'+ lastRowNumber +'" data-id="' + response.data.id + '" data-bs-toggle="modal" data-bs-target="#EditModal"></i>'+
                                    '<i class="fa fa-trash delete_loantypes" data-rowid="'+ lastRowNumber +'" data-id="' + response.data.id + '"></i>'
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

                $(document).on("click", ".edit_loantypes", function() {
                    var loantypes_id = $(this).data('id');
                    var row_id = $(this).data('rowid');
                    $('#loantypes_id').val(loantypes_id);
                    $('#row_id').val(row_id);

                    $.ajax({
                        type: "POST",
                        url: "{{ route('loantypes.edit') }}",
                        data: {
                            "_token": "{{ csrf_token() }}",
                            "loantypes_id": loantypes_id
                        },
                        success: function(response) {
                            if (response.success) {
                                $('#edit_loan_type').val(response.data.loan_type);                                              
                            } else {
                                alert('Error fetching data: ' + response.message);
                            }
                        },
                        error: function(xhr, status, error) {
                            console.error('AJAX error:', error);
                        }
                    });
                });

                $('#edit_loantypes_form').submit(function(event) {
                    event.preventDefault(); 
                    var formData = new FormData($(this)[0]);
                    var rowId = $('#row_id').val(); 

                    $.ajax({
                        url: "{{ route('loantypes.update') }}", 
                        method: "POST", 
                        data: formData,
                        contentType: false,
                        processData: false,
                        success: function(response) {
                            if (response.success) {
                                $('#EditModal').modal('hide');
                                $('#edit_loantypes_form')[0].reset();
                                swal("Success!", "Loan Types updated successfully", {
                                    icon: "success",
                                    buttons: {
                                        confirm: {
                                            className: "btn btn-success",
                                        },
                                    },
                                });

                                var table = $('#loantypes-datatable').DataTable();
                                var row = table.row('#row' + response.data.id); 

                                row.data([
                                    rowId, 
                                    response.data.loan_type, 
                                    '<i class="fa fa-edit edit_loantypes" data-rowid="' + rowId + '" data-id="' + response.data.id + '" data-bs-toggle="modal" data-bs-target="#EditModal"></i>' +
                                    '<i class="fa fa-trash delete_loantypes" data-rowid="' + rowId + '" data-id="' + response.data.id + '"></i>'
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

                $(document).on('click', '.delete_loantypes', function() {
                    var loantypesId = $(this).data('id');
                    var rowSelector = '#row' + loantypesId; 

                    swal({
                        title: "Are you sure?",
                        text: "You won't be able to revert this!",
                        icon: "warning",
                        buttons: true,
                        dangerMode: true,
                    }).then((willDelete) => {
                        if (willDelete) {
                            $.ajax({
                                url: "{{ route('loantypes.destroy') }}", 
                                method: "POST",
                                data: {
                                    "_token": "{{ csrf_token() }}", 
                                    "id": loantypesId
                                },
                                success: function(response) {
                                    if (response.success) {
                                        var table = $('#loantypes-datatable').DataTable();
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