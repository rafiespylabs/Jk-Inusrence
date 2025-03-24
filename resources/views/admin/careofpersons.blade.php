<x-admin1-layout>
    @push('styles')
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.14.0-beta2/dist/css/bootstrap-select.min.css">     
    @endpush

    <div class="page-inner">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex align-items-center">
                            <h4 class="card-title">Careof Person</h4>
                            <button class="btn btn-primary btn-round ms-auto" data-bs-toggle="modal" data-bs-target="#CreateModal">
                                <i class="fa fa-plus"></i> Create
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div id="preloader" style="display:none;">
                            <img src="{{ asset('web/preloader.gif') }}">
                        </div>
                        <div class="table-responsive">
                            <table id="careofpersons-datatable" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>Sl No</th>
                                        <th>Careof Person</th>                                                    
                                        <th>Added By</th>                                    
                                        <th>Added Date</th>                                    
                                        <th>Edited By</th>                                    
                                        <th>Edited Date</th>                                    
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody id="careofpersons">
                                @php $i = 1; @endphp
                                    @foreach ($careofpersons as $careofperson)
                                    @php $added_by = $careofperson->addedByUser->name ?? ''; @endphp
                                    @php $added_date = \Carbon\Carbon::parse($careofperson->added_date)->timezone('Asia/Kolkata')->format('d/m/Y h:i A') ; @endphp
                                    @php $edited_by = $careofperson->editedByUser->name ?? ''; @endphp
                                    @php $edited_date = $careofperson->edited_date ? \Carbon\Carbon::parse($careofperson->edited_date)->timezone('Asia/Kolkata')->format('d/m/Y h:i A') : ''; @endphp
                                    <tr id="row{{ $careofperson->id }}">                                           
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

    <!-- Create Modal -->
    <div class="modal fade" id="CreateModal" tabindex="-1" role="dialog" aria-labelledby="CreateModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Create</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="create_careofperson_form" class="form" enctype="multipart/form-data">
                        @csrf                        
                        <div class="form-group">
                            <label for="careof_person">Careof Person</label>
                            <input type="text" name="careof_person" id="add_careof_person" class="form-control" placeholder="Enter careof person">
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
    <!-- End Create Modal -->

    <!-- Edit Modal -->
    <div class="modal fade" id="EditModal" tabindex="-1" role="dialog" aria-labelledby="EditModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="update_careofpersons_form" class="form" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="rowid" id="row_id">
                        <input type="hidden" name="id" id="careofpersons_id">                       
                        <div class="form-group">
                            <label for="careof_person">Careof Person</label>
                            <input type="text" name="careof_person" id="edit_careof_person" class="form-control" required>
                        </div>
                        <div class="form-actions form-group">
                            <button type="submit" class="btn btn-primary btn-sm">Save Changes</button>
                            <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Cancel</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Edit Modal -->
    @push('scripts')
    <script type="text/javascript">
        $(document).ready(function() {
            $.fn.dataTable.ext.errMode = 'none';

            var table = $('#careofpersons-datatable').DataTable({
            processing: true,
            serverSide: true,
            pageLength: 10,
            lengthMenu: [10, 25, 50, 100],
            ajax: {
                url: "{{ route('careofpersons.list') }}",
                type: "POST",
                data: function (d) {
                    d._token = "{{ csrf_token() }}";  
                }
            },
            columns: [
                { 
                    data: null, 
                    name: "sl_no", 
                    orderable: false, 
                    searchable: false,
                    render: function (data, type, row, meta) {
                        return meta.row + 1; 
                    }
                },
                { data: "careof_person", name: "careof_person" },
                { data: "added_by", name: "added_by" },
                { data: "added_date", name: "added_date" },
                { data: "edited_by", name: "edited_by" },
                { data: "edited_date", name: "edited_date" },
                { 
                    data: "action", 
                    name: "action", 
                    orderable: false, 
                    searchable: false,
                    render: function(data, type, row) {
                        return data ? data : 'No Actions';
                    }
                }
            ],
            rowCallback: function(row, data, index) {
                $(row).attr('id', 'row' + data.id);
            }
        });
        
            
        $('#create_careofperson_form').submit(function(event)
        {
                event.preventDefault();
                var formData = new FormData($(this)[0]); 
                $.ajax({
                    url: "{{route('careofpersons.store')}}",
                    method: "POST",
                    data: formData,
                    contentType: false, 
                    processData: false,
                    success: function(response) {
                        if (response.success) 
                        {
                            $('#CreateModal').modal('hide');
                            $('#create_careofperson_form')[0].reset();
                            swal("Good job!", response.message, {
                                icon: "success",
                                buttons: {
                                    confirm: {
                                    className: "btn btn-success",
                                    },
                                },
                            }).then(() => {
                                location.reload(); 
                            });
                            var table = $('#careofperosons-datatable').DataTable();
                            var lastRowNumber = table.data().count() > 0 ? parseInt(table.row(':last').data()[0]) + 1 : 1;

                            var formattedAddedDate = response.data.added_date ? new Date(response.data.added_date).toLocaleString() : ' ';
                            var formattedEditedDate = response.data.edited_date ? new Date(response.data.edited_date).toLocaleString() : ' ';

                            var newRow = table.row.add([
                                lastRowNumber,
                                        response.data.careof_person ,
                                        response.data.added_by,
                                        formattedAddedDate,
                                        response.data.edited_by || ' ',
                                        formattedEditedDate || ' ',                                    
                                ]).draw(false);
                                table.page('first').draw(false);  
                                $(newRow.node()).attr('id', 'row' + response.data.id);  
                                } 
                                else 
                                {
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
            
        });
    </script>
    <script>  

    function editcareofpersons(careofpersonsId) {
        var url = "{{ route('careofpersons.edit', ':id') }}"; 
        url = url.replace(':id', careofpersonsId);

        $.ajax({
            url: url,
            type: 'GET',
            success: function(response) {         

                if (response) {

                    $('#edit_careof_person').val(response.careof_person); 
                    $('#careofpersons_id').val(response.id);
                
                    $('#EditModal').modal('show');
                } else {
                    alert("Error: No data received.");
                }
            },
            error: function(xhr) {
                console.error("Error fetching careofperson:", xhr.responseText);
                alert("Error fetching careof person details.");
            }
        });
    }


    $('#update_careofpersons_form').submit(function(event) {
        event.preventDefault();
    
        var careofpersonsId = $('#careofpersons_id').val();
        var url = "{{ route('careofpersons.update', ':id') }}";
        url = url.replace(':id', careofpersonsId);

        $.ajax({
            url: url,
            type: 'POST',
            data: {
                _token: '{{ csrf_token() }}',
                careof_person: $('#edit_careof_person').val(),
            },

            success: function(response) {
                if (response.success) {
                    $('#EditModal').modal('hide');
                    $('#create_careofperson_form')[0].reset();
        
                    swal("Good job!", response.message, {
                        icon: "success",
                        buttons: {
                            confirm: {
                                className: "btn btn-success",
                            },
                        },
                    }).then(() => {
                        location.reload(); 
                    });
                } else {
                    swal("Oops!", response.message, {
                        icon: "error",
                        buttons: {
                            confirm: {
                                className: "btn btn-danger",
                            },
                        },
                    });
                }
            },

        });
    });

    
    function deletecareofpersons(careofpersonsId) {
        swal({
            title: "Are you sure?",
            text: "Once deleted, you will not be able to recover this record!",
            icon: "warning",
            buttons: {
                cancel: {
                    text: "Cancel",
                    visible: true,
                    className: "btn btn-secondary",
                },
                confirm: {
                    text: "Yes, Delete it!",
                    className: "btn btn-danger",
                },
            },
            dangerMode: true,
        }).then((willDelete) => {
            if (willDelete) {
                $.ajax({
                    url: '/careofpersons/' + careofpersonsId,
                    type: 'DELETE',
                    data: { _token: '{{ csrf_token() }}' },
                    success: function(response) {
                        swal("Deleted!", response.success, {
                            icon: "success",
                            buttons: {
                                confirm: {
                                    className: "btn btn-success",
                                },
                            },
                        }).then(() => {
                            location.reload(); 
                        });
                    },
                    error: function(response) {
                        swal("Oops!", response.responseJSON.error, {
                            icon: "error",
                            buttons: {
                                confirm: {
                                    className: "btn btn-danger",
                                },
                            },
                        });
                    }
                });
            }
        });
    }

    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.14.0-beta2/dist/js/bootstrap-select.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/ajax-bootstrap-select@1.4.4/dist/js/ajax-bootstrap-select.min.js"></script>
    @endpush
</x-admin1-layout>