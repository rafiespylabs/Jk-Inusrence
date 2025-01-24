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
                                <i class="fa fa-plus"></i> Add Document
                            </button>
                            <a href="{{ url()->previous() }}" class="ml-2"><button class="btn btn-info btn-round ms-auto">
                            <i class="fa fa-arrow-left"></i> Back</button></a>
                        </div>
                        <h2>Policy : {{$healthpolicy->name}}</h2>
                    </div>
                    <div class="card-body">
                        <div id="preloader" style="display:none;">
                            <img src="{{ asset('web/preloader.gif') }}">
                        </div>
                        <div class="table-responsive">
                            <table id="healthpolicydoc-datatable" class="table table-striped table-bordered">
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
                                    @foreach ($healthpolicy_docs as $doc)
                                        <tr id="row{{ $doc->id }}">
                                            <td>{{ $i }}</td>
                                            <td>{{ $doc->title }}</td>
                                            <td>{{ $doc->description	}}</td>
                                            <td><a href="{{   $doc->link }}" target="blank"> Click Here</a></td>       
                                            <td>{{  $doc->added_date }}</td>
                                            <td>{{  $doc->added_user->name ?? "" }}</td> 
                                            <td>
                                                <i class="fa fa-edit edit_healthpolicy_doc"
                                                    data-id="{{ $doc->id }}" data-rowid="{{ $i }}" data-bs-toggle="modal"
                                                    data-bs-target="#EditModal"></i>
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
                    <h5 class="modal-title">Add Document</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="create_healthpolicydoc_form" class="form">
                        @csrf
                        <input type="hidden" name="policy_id" value="{{$policy_id}}">
                        <div class="row form-group">
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
    <div class="modal fade" id="EditModal" tabindex="-1" role="dialog" aria-labelledby="EditModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Health Policy</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="update_healthpolicydoc_form" class="form">
                        @csrf
                        <input type="hidden" name="rowid" id="row_id">
                        <input type="hidden" name="id" id="healthpolicy_doc_id">  
                        <div class="row form-group">
                            <div class="col-4">
                                <label for="title">Title</label>
                                <input type="text" name="title" id="title" class="form-control" required>
                            </div>
                            <div class="col-4">
                                <label for="description">Description</label>
                                <textarea name="description" id="description" class="form-control"></textarea>
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
                $('#healthpolicydoc-datatable').DataTable();
                $('#create_healthpolicydoc_form').submit(function(event) {
                    event.preventDefault(); 
                    var formData = new FormData($(this)[0]);  
                    $.ajax({
                        url: "{{ route('healthPolicyDoc.store') }}",  
                        method: "POST",
                        data: formData,
                        contentType: false,  
                        processData: false,  
                        success: function(response) {
                            if (response.success) {
                                $('#CreateModal').modal('hide');  
                                $('#create_healthpolicydoc_form')[0].reset(); 
                                swal("Success!", response.message, {
                                    icon: "success",
                                    buttons: {
                                        confirm: {
                                            className: "btn btn-success",
                                        },
                                    },
                                });
                                var table = $('#healthpolicydoc-datatable').DataTable();
                                var lastRowNumber = table.data().count() > 0 ? parseInt(table.row(':last').data()[0]) + 1 : 0;
                                var newRow = table.row.add([
                                    lastRowNumber,  
                                    response.data.title,
                                    response.data.description,
                                    '<a href="'+response.data.link+'" target="blank">Click Here</a>',
                                    response.data.added_date,
                                    response.data.added_user.name,
                                    '<i class="fa fa-edit edit_healthpolicy_doc" data-rowid="'+ lastRowNumber +'" data-id="' + response.data.id + '" data-bs-toggle="modal" data-bs-target="#EditModal"></i>'
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
                $(document).on("click", ".edit_healthpolicy_doc", function() {
                    var healthpolicy_doc_id = $(this).data('id');
                    var row_id = $(this).data('rowid');                     
                    $('#healthpolicy_doc_id').val(healthpolicy_doc_id);
                    $('#row_id').val(row_id); 
                    $.ajax({
                        type: "POST",
                        url: "{{ route('healthPolicyDoc.show') }}",
                        data: {
                            "_token": "{{ csrf_token() }}",
                            "id": healthpolicy_doc_id
                        },
                        success: function(response) 
                        {
                            if (response.success) 
                            {
                                $('#title').val(response.data.healthpolicydocument.title);                                              
                                $('#description').val(response.data.healthpolicydocument.description); 
                                $('#link').val(response.data.healthpolicydocument.link);   
                            } 
                            else 
                            {
                                alert('Error: ' + response.message);
                            }
                        },
                        error: function(xhr, status, error) {
                            console.error('AJAX Error:', error);
                            alert('Failed to fetch data.');
                        }
                    });
                });
                $('#update_healthpolicydoc_form').submit(function(event) {
                    event.preventDefault(); 
                    var formData = new FormData($(this)[0]);
                    var rowId = $('#row_id').val();
                    $.ajax({
                        url: "{{ route('healthPolicyDoc.update') }}", 
                        method: "POST", 
                        data: formData,
                        contentType: false, 
                        processData: false, 
                        success: function(response) 
                        {
                            if (response.success) {
                                $('#EditModal').modal('hide');
                                $('#update_healthpolicydoc_form')[0].reset();
                                swal("Success!", response.message, {
                                    icon: "success",
                                    buttons: {
                                        confirm: {
                                            className: "btn btn-success",
                                        },
                                    },
                                });
                                var table = $('#healthpolicydoc-datatable').DataTable();
                                var row = table.row('#row' + response.data.id); 
                                row.data([
                                    rowId,   
                                    response.data.title,
                                    response.data.description,
                                    '<a href="'+response.data.link+'" target="blank">Click Here</a>',
                                    response.data.added_date,
                                    response.data.added_user.name,                               
                                    '<i class="fa fa-edit edit_healthpolicy_doc" data-rowid="'+ rowId +'" data-id="' + response.data.id + '" data-bs-toggle="modal" data-bs-target="#EditModal"></i>' 
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
            });
        </script>
    @endpush
</x-admin1-layout>