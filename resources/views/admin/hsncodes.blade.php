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
                            <table id="hsncodes-datatable" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>Sl No</th>
                                        <th>HSN Code</th>                                    
                                        <th>HSN Value</th>                                    
                                        <th>CGST Percentage</th>                                    
                                        <th>SGST Percentage</th>                                    
                                        <th>IGST Percentage</th>                                    
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $i = 1; @endphp
                                    @foreach ($hsncodes as $hsncode)
                                        <tr id="row{{ $hsncode->id }}">
                                            <td>{{ $i }}</td>                                            
                                            <td>{{ $hsncode->hsncode }}</td>                                        
                                            <td>{{ $hsncode->hsnvalue }}</td>                                        
                                            <td>{{ $hsncode->cgst_perc }}</td>                                        
                                            <td>{{ $hsncode->sgst_perc }}</td>                                        
                                            <td>{{ $hsncode->igst_perc }}</td>                                        
                                            <td>
                                                <i class="fa fa-edit edit_hsncodes"
                                                    data-id="{{ $hsncode->id }}" data-rowid="{{ $i }}" data-bs-toggle="modal"
                                                    data-bs-target="#EditModal"></i>
                                                    <i class="fa fa-trash delete_hsncodes"
                                                    data-id="{{ $hsncode->id }}">
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
                    <e class="modal-title">Create hsn code</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="create_hsncodes_form" class="form">
                        @csrf
                        <div class="form-group">
                            <label for="hsncode">HSN Code</label>
                            <input type="text" name="hsncode" id="hsncode" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="hsnvalue">HSN Value</label>
                            <input type="number" name="hsnvalue" id="hsnvalue" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="cgst_perc">CGST Percentage</label>
                            <input type="number" name="cgst_perc" id="cgst_perc" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="sgst_perc">SGST Percentage</label>
                            <input type="number" name="sgst_perc" id="sgst_perc" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="igst_perc">IGST Percentage</label>
                            <input type="number" name="igst_perc" id="igst_perc" class="form-control" required>
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
                    <h5 class="modal-title">Edit hsn code </h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="edit_hsncodes_form" class="form">
                        @csrf

                        <input type="hidden" name="rowid" id="row_id">
                            <input type="hidden" name="id" id="hsncodes_id">
                            <div class="form-group">
                            <label for="hsncode">HSN Code</label>
                            <input type="text" name="hsncode" id="edit_hsncode" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="hsnvalue">HSN Value</label>
                            <input type="number" name="hsnvalue" id="edit_hsnvalue" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="cgst_perc">CGST Percentage</label>
                            <input type="number" name="cgst_perc" id="edit_cgst_perc" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="sgst_perc">SGST Percentage</label>
                            <input type="number" name="sgst_perc" id="edit_sgst_perc" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="igst_perc">IGST Percentage</label>
                            <input type="number" name="igst_perc" id="edit_igst_perc" class="form-control" required>
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
                $('#hsncodes-datatable').DataTable();
                $('#create_hsncodes_form').submit(function(event) {
                    event.preventDefault();
                    var formData = new FormData($(this)[0]);  
                    $.ajax({
                        url: "{{ route('hsncodes.store') }}", 
                        method: "POST",
                        data: formData,
                        contentType: false,
                        processData: false,
                        success: function(response) {
                            if (response.success) {
                                $('#CreateModal').modal('hide');  
                                $('#create_hsncodes_form')[0].reset(); 
                                swal("Success!", "hsn code added successfully!", {
                                    icon: "success",
                                    buttons: {
                                        confirm: {
                                            className: "btn btn-success",
                                        },
                                    },
                                });

                                var table = $('#hsncodes-datatable').DataTable();
                                var lastRowNumber = table.data().count() > 0 ? parseInt(table.row(':last').data()[0]) + 1 : 0;
                                var newRow = table.row.add([
                                    lastRowNumber,
                                    response.data.hsncode,
                                    response.data.hsnvalue,
                                    response.data.cgst_perc,
                                    response.data.sgst_perc,
                                    response.data.igst_perc,                            
                                    '<i class="fa fa-edit edit_hsncodes" data-rowid="'+ lastRowNumber +'" data-id="' + response.data.id + '" data-bs-toggle="modal" data-bs-target="#EditModal"></i>'+
                                    '<i class="fa fa-trash delete_hsncodes" data-rowid="'+ lastRowNumber +'" data-id="' + response.data.id + '"></i>'
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

                $(document).on("click", ".edit_hsncodes", function() {
                    var hsncodes_id = $(this).data('id');
                    var row_id = $(this).data('rowid');
                    $('#hsncodes_id').val(hsncodes_id);
                    $('#row_id').val(row_id);

                    $.ajax({
                        type: "POST",
                        url: "{{ route('hsncodes.edit') }}",
                        data: {
                            "_token": "{{ csrf_token() }}",
                            "hsncodes_id": hsncodes_id
                        },
                        success: function(response) {
                            if (response.success) {
                                $('#edit_hsncode').val(response.data.hsncode);                                              
                                $('#edit_hsnvalue').val(response.data.hsnvalue);                                              
                                $('#edit_cgst_perc').val(response.data.cgst_perc);                                              
                                $('#edit_sgst_perc').val(response.data.sgst_perc);                                              
                                $('#edit_igst_perc').val(response.data.igst_perc);                                              
                            } else {
                                alert('Error fetching data: ' + response.message);
                            }
                        },
                        error: function(xhr, status, error) {
                            console.error('AJAX error:', error);
                        }
                    });
                });

                $('#edit_hsncodes_form').submit(function(event) {
                    event.preventDefault(); 
                    var formData = new FormData($(this)[0]);
                    var rowId = $('#row_id').val(); 

                    $.ajax({
                        url: "{{ route('hsncodes.update') }}", 
                        method: "POST", 
                        data: formData,
                        contentType: false,
                        processData: false,
                        success: function(response) {
                            if (response.success) {
                                $('#EditModal').modal('hide');
                                $('#edit_hsncodes_form')[0].reset();
                                swal("Success!", "hsn code updated successfully", {
                                    icon: "success",
                                    buttons: {
                                        confirm: {
                                            className: "btn btn-success",
                                        },
                                    },
                                });

                                var table = $('#hsncodes-datatable').DataTable();
                                var row = table.row('#row' + response.data.id); 

                                row.data([
                                    rowId, 
                                    response.data.hsncode,
                                    response.data.hsnvalue,
                                    response.data.cgst_perc,
                                    response.data.sgst_perc,
                                    response.data.igst_perc,  
                                    '<i class="fa fa-edit edit_hsncodes" data-rowid="' + rowId + '" data-id="' + response.data.id + '" data-bs-toggle="modal" data-bs-target="#EditModal"></i>' +
                                    '<i class="fa fa-trash delete_hsncodes" data-rowid="' + rowId + '" data-id="' + response.data.id + '"></i>'
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

                $(document).on('click', '.delete_hsncodes', function() {
                    var hsncodesId = $(this).data('id');
                    var rowSelector = '#row' + hsncodesId; 

                    swal({
                        title: "Are you sure?",
                        text: "You won't be able to revert this!",
                        icon: "warning",
                        buttons: true,
                        dangerMode: true,
                    }).then((willDelete) => {
                        if (willDelete) {
                            $.ajax({
                                url: "{{ route('hsncodes.destroy') }}", 
                                method: "POST",
                                data: {
                                    "_token": "{{ csrf_token() }}", 
                                    "id": hsncodesId
                                },
                                success: function(response) {
                                    if (response.success) {
                                        var table = $('#hsncodes-datatable').DataTable();
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