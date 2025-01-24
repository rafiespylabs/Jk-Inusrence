<x-admin1-layout>
    <div class="page-inner">
        <div class="page-header"></div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex align-items-center">
                            <button class="btn btn-primary btn-round ms-auto btn-sm" data-bs-toggle="modal"
                                data-bs-target="#CreateModal">
                                <i class="fa fa-plus"></i> Add Document
                            </button>
                            <a href="{{ url()->previous() }}">
                                <button class="btn btn-info btn-round ms-auto btn-sm ml-2">
                                    Back 
                                </button>
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div id="preloader" style="display:none;">
                            <img src="{{ asset('web/preloader.gif') }}">
                        </div>
                        <div class="table-responsive">
                            <table id="policydoc-datatable" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>Sl No</th>
                                        <th>Title</th>   
                                        <th>Description</th>   
                                        <th>Link</th>      
                                        <th>Added Date</th>                                       
                                        <th>Added By</th> 
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $i = 1; @endphp
                                    @foreach ($policydocuments as $policydoc)
                                        <tr id="row{{ $policydoc->id }}">
                                            <td>{{ $i }}</td>                                            
                                            <td>{{ $policydoc->title }}</td>  
                                            <td>{{ $policydoc->description }}</td>                                        
                                            <td><a href="{{ $policydoc->link }}" target="blank"> Click Here</a></td>       
                                            <td>{{ $policydoc->added_date }}</td>
                                            <td>{{ $policydoc->added_user->name ?? "" }}</td> 
                                            <td>
                                                <i class="fa fa-edit edit_policydoc"
                                                    data-id="{{ $policydoc->id }}" data-rowid="{{ $i }}" data-bs-toggle="modal"
                                                    data-bs-target="#EditModal"></i>
                                                    <i class="fa fa-trash delete_policydoc"
                                                    data-id="{{ $policydoc->id }}">
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
    <!-- Create Modal -->
    <div class="modal fade" id="CreateModal" tabindex="-1" role="dialog" aria-labelledby="CreateModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">            
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add Document</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="create_policydoc_form" class="form">
                        @csrf
                        <div class="row form-group">
                            <input type="hidden" name="policy_id" value="{{$policy_id}}">
                            <div class="col-4">
                                <label for="title">Title</label>
                                <input type="text" name="title" class="form-control" required>
                            </div>
                            <div class="col-4">
                                <label for="description">Description</label>
                                <textarea name="description" class="form-control"></textarea>
                            </div>
                            <div class="col-4">
                                <label for="link">Link</label>
                                <input type="text" name="link" class="form-control" required>
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
    <!-- Create Modal -->
    <div class="modal fade" id="EditModal" tabindex="-1" role="dialog" aria-labelledby="EditModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Policy Category</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="edit_policydoc_form" class="form">
                        @csrf
                        <input type="hidden" name="rowid" id="row_id">
                        <input type="hidden" name="id" id="policydoc_id">
                        <div class="row form-group">
                            <div class="col-4">
                                <label for="title">Title</label>
                                <input type="text" name="title" id="title" class="form-control" required>
                            </div>
                            <div class="col-4">
                                <label for="description">Description</label>
                                <textarea name="description" id="description"  class="form-control"></textarea>
                            </div>
                            <div class="col-4">
                                <label for="link">Link</label>
                                <input type="text" name="link" id="link" class="form-control" required>
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
                $('#policydoc-datatable').DataTable();
                $('#create_policydoc_form').submit(function(event) {
                    event.preventDefault();
                    var formData = new FormData($(this)[0]);  
                    $.ajax({
                        url: "{{ route('vehicle_policydocument.store') }}", 
                        method: "POST",
                        data: formData,
                        contentType: false,
                        processData: false,
                        success: function(response) {
                            if (response.success) {
                                $('#CreateModal').modal('hide');  
                                $('#create_policydoc_form')[0].reset(); 
                                swal("Success!", response.message, {
                                    icon: "success",
                                    buttons: {
                                        confirm: {
                                            className: "btn btn-success",
                                        },
                                    },
                                });

                                var table = $('#policydoc-datatable').DataTable();
                                var lastRowNumber = table.data().count() > 0 ? parseInt(table.row(':last').data()[0]) + 1 : 0;
                                var newRow = table.row.add([
                                    lastRowNumber,
                                    response.data.title,
                                    response.data.description,
                                    '<a href="'+response.data.link+'" target="blank">Click Here</a>',
                                    response.data.added_date,
                                    response.data.added_user.name,
                                    '<i class="fa fa-edit edit_policydoc" data-rowid="'+ lastRowNumber +'" data-id="' + response.data.id + '" data-bs-toggle="modal" data-bs-target="#EditModal"></i>'+
                                    '<i class="fa fa-trash delete_policydoc" data-rowid="'+ lastRowNumber +'" data-id="' + response.data.id + '"></i>'
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
                $(document).on("click", ".edit_policydoc", function() {
                    var policydoc_id = $(this).data('id');
                    var row_id = $(this).data('rowid');
                    $('#policydoc_id').val(policydoc_id);
                    $('#row_id').val(row_id);

                    $.ajax({
                        type: "POST",
                        url: "{{ route('vehicle_policydocument.show') }}",
                        data: {
                            "_token": "{{ csrf_token() }}",
                            "policydoc_id": policydoc_id
                        },
                        success: function(response) 
                        {
                            if (response.success) 
                            {
                                $('#title').val(response.data.policydocument.title);                                              
                                $('#description').val(response.data.policydocument.description); 
                                $('#link').val(response.data.policydocument.link); 
                            } else {
                                alert('Error fetching data: ' + response.message);
                            }
                        },
                        error: function(xhr, status, error) {
                            console.error('AJAX error:', error);
                        }
                    });
                });
                $('#edit_policydoc_form').submit(function(event) {
                    event.preventDefault(); 
                    var formData = new FormData($(this)[0]);
                    var rowId = $('#row_id').val(); 
                    $.ajax({
                        url: "{{ route('vehicle_policydocument.update') }}", 
                        method: "POST", 
                        data: formData,
                        contentType: false,
                        processData: false,
                        success: function(response) {
                            if (response.success) {
                                $('#EditModal').modal('hide');
                                $('#edit_policydoc_form')[0].reset();
                                swal("Success!", "Policy Document updated successfully", {
                                    icon: "success",
                                    buttons: {
                                        confirm: {
                                            className: "btn btn-success",
                                        },
                                    },
                                });
                                var table = $('#policydoc-datatable').DataTable();
                                var row = table.row('#row' + response.data.id); 
                                row.data([
                                    rowId, 
                                    response.data.title,
                                    response.data.description,
                                    '<a href="'+response.data.link+'" target="blank">Click Here</a>',
                                    response.data.added_date,
                                    response.data.added_user.name,
                                    '<i class="fa fa-edit edit_policydoc" data-rowid="' + rowId + '" data-id="' + response.data.id + '" data-bs-toggle="modal" data-bs-target="#EditModal"></i>' +
                                    '<i class="fa fa-trash delete_policydoc" data-rowid="' + rowId + '" data-id="' + response.data.id + '"></i>'
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

                $(document).on('click', '.delete_policydoc', function() {
                    var policydocId = $(this).data('id');
                    var rowSelector = '#row' + policydocId; 
                    swal({
                        title: "Are you sure?",
                        text: "You won't be able to revert this!",
                        icon: "warning",
                        buttons: true,
                        dangerMode: true,
                    }).then((willDelete) => {
                        if (willDelete) {
                            $.ajax({
                                url: "{{ route('vehicle_policydocument.destroy') }}", 
                                method: "POST",
                                data: {
                                    "_token": "{{ csrf_token() }}", 
                                    "id": policydocId
                                },
                                success: function(response) {
                                    if (response.success) 
                                    {
                                        var table = $('#policydoc-datatable').DataTable();
                                        table.row(rowSelector).remove().draw(false);
                                        swal("Deleted!", response.message, {
                                            icon: "success",
                                        });
                                    } 
                                    else 
                                    {
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