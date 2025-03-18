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
                            <table id="multiexpenses-datatable" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>Sl No</th>
                                        <th>Amount</th>
                                        <th>Description</th>
                                        <th>Date</th>
                                        <th>Type</th>
                                        <th>Business Category</th>
                                        <th>Branch</th>
                                        <th>Added By</th>
                                        <th>Added Date</th>                                       
                                        <th>Edited By</th>
                                        <th>Edited Date</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $i = 1; @endphp
                                    @foreach ($multiexpenses as $multiexpense)
                                    @php $added_by = $multiexpense->addedByUser->name ?? ''; @endphp
                                    @php $added_date = \Carbon\Carbon::parse($multiexpense->added_date)->timezone('Asia/Kolkata')->format('d/m/Y h:i A') ; @endphp
                                    @php $edited_by = $multiexpense->editedByUser->name ?? ''; @endphp
                                    @php $edited_date = $multiexpense->edited_date ? \Carbon\Carbon::parse($multiexpense->edited_date)->timezone('Asia/Kolkata')->format('d/m/Y h:i A') : ''; @endphp
                                        <tr id="row{{ $multiexpense->id }}">
                                            <td>{{ $i }}</td>
                                            <td>{{ $multiexpense->amount}}</td>
                                            <td>{{ $multiexpense->description}}</td>
                                            <td>{{ $multiexpense->date}}</td>                                           
                                            <td>{{ $multiexpense->type->type ?? 'N/A' }}</td>
                                            <td>{{ $multiexpense->business_catogory->business_category_name ?? 'N/A' }}</td>
                                            <td>{{ $multiexpense->branch->branch ?? 'N/A' }}</td>
                                            <td>{{ $added_by}}</td>
                                            <td>{{ $added_date}}</td>                                           
                                            <td>{{ $edited_by ?? ' '}}</td> 
                                            <td>{{ $edited_date ?? ' '}}</td> 
                                            <td>
                                                <i class="fa fa-edit edit_multiexpenses"
                                                    data-id="{{ $multiexpense->id }}" data-rowid="{{ $i }}" data-bs-toggle="modal"
                                                    data-bs-target="#EditModal"></i>

                                                    <i class="fa fa-trash delete_multiexpenses"
                                                    data-id="{{ $multiexpense->id }}"></i>    
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
                    <h5 class="modal-title">Create multi expense </h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="create_multiexpenses_form" class="form">
                        @csrf
                        <div class="form-group">
                            <label for="amount">Amount</label>
                            <input type="number" name="amount" id="amount" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <input type="text" name="description" id="description" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="date">Date</label>
                            <input type="date" name="date" id="date" class="form-control" required>
                        </div>
                        
                        <div class="form-group">
                            <label for="type">Type</label>
                            <select name="type_id" id="type_id" class="form-control" required>
                            <option value="" disabled selected>Select One</option>
                                @foreach ($expensetypes as $expensetype)
                                    <option value="{{ $expensetype->id }}">{{ $expensetype->type }}</option>
                                @endforeach
                            </select>
                        </div>     
                        <div class="form-group">
                            <label for="businesscategories">Business Category</label>
                            <select name="business_catogory_id" id="business_catogory_id" class="form-control" required>
                            <option value="" disabled selected>Select One</option>
                                @foreach ($businesscategories as $businesscategory)
                                    <option value="{{ $businesscategory->id }}">{{ $businesscategory->business_category_name }}</option>
                                @endforeach
                            </select>
                        </div>  
                        <div class="form-group">
                            <label for="type">Branch</label>
                            <select name="branch_id" id="branch_id" class="form-control" required>
                            <option value="" disabled selected>Select One</option>
                                @foreach ($branches as $branch)
                                    <option value="{{ $branch->id }}">{{ $branch->branch }}</option>
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
                    <h5 class="modal-title">Edit multi expense</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="edit_multiexpenses_form" class="form">
                        @csrf

                        <input type="hidden" name="rowid" id="row_id">
                            <input type="hidden" name="id" id="multiexpenses_id">
                        <div class="form-group">
                            <label for="amount">Amount</label>
                            <input type="number" name="amount" id="edit_amount" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <input type="text" name="description" id="edit_description" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="date">Date</label>
                            <input type="date" name="date" id="edit_date" class="form-control" required>
                        </div>
                        
                        <div class="form-group">
                            <label for="type">Type</label>
                            <select name="type_id" id="edit_type_id" class="form-control" required>
                                @foreach ($expensetypes as $expensetype)
                                    <option value="{{ $expensetype->id }}">{{ $expensetype->type }}</option>
                                @endforeach
                            </select>
                        </div>     
                        <div class="form-group">
                            <label for="businesscategories">Business Category</label>
                            <select name="business_catogory_id" id="edit_business_catogory_id" class="form-control" required>
                                @foreach ($businesscategories as $businesscategory)
                                    <option value="{{ $businesscategory->id }}">{{ $businesscategory->business_category_name}}</option>
                                @endforeach
                            </select>
                        </div>  
                        <div class="form-group">
                            <label for="type">Branch</label>
                            <select name="branch_id" id="edit_branch_id" class="form-control" required>
                                @foreach ($branches as $branch)
                                    <option value="{{ $branch->id }}">{{ $branch->branch }}</option>
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
                $('#multiexpenses-datatable').DataTable();
                $('#create_multiexpenses_form').submit(function(event) {
                    event.preventDefault(); 
                    var formData = new FormData($(this)[0]);  

                    $.ajax({
                        url: "{{ route('multiexpenses.store') }}",  
                        method: "POST",
                        data: formData,
                        contentType: false,  
                        processData: false,  
                        success: function(response) {
                            if (response.success) {
                                $('#CreateModal').modal('hide');  
                                $('#create_multiexpenses_form')[0].reset(); 
                                swal("Success!", "multi expense added successfully!", {
                                    icon: "success",
                                    buttons: {
                                        confirm: {
                                            className: "btn btn-success",
                                        },
                                    },
                                });

                                var table = $('#multiexpenses-datatable').DataTable();
                                var lastRowNumber = table.data().count() > 0 ? parseInt(table.row(':last').data()[0]) + 1 : 0;

                                var formattedAddedDate = response.data.added_date ? new Date(response.data.added_date).toLocaleString() : ' ';
                                var formattedEditedDate = response.data.edited_date ? new Date(response.data.edited_date).toLocaleString() : ' ';

                                var newRow = table.row.add([
                                    lastRowNumber,                         
                                    response.data.amount || ' ', 
                                    response.data.description || ' ', 
                                    response.data.date || ' ', 
                                    response.data.type || ' ', 
                                    response.data.business_category_name|| ' ', 
                                    response.data.branch || ' ', 
                                    response.data.added_by || ' ', 
                                    formattedAddedDate || ' ',
                                    response.data.edited_by || ' ',
                                    formattedEditedDate || ' ',
                                    '<i class="fa fa-edit edit_multiexpenses" data-rowid="'+ lastRowNumber +'" data-id="' + response.data.id + '" data-bs-toggle="modal" data-bs-target="#EditModal"></i>' +
                                    '<i class="fa fa-trash delete_multiexpenses" data-rowid="'+ lastRowNumber +'" data-id="' + response.data.id + '"></i>'
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
          
                $(document).on("click", ".edit_multiexpenses", function() {
                    var multiexpenses_id = $(this).data('id'); 
                    var row_id = $(this).data('rowid');   
                    var type_id = $(this).data('type_id'); 
                    var business_catogory_id = $(this).data('business_catogory_id'); 
                    var branch_id = $(this).data('branch_id'); 
                    
                    $('#multiexpenses_id').val(multiexpenses_id);
                    $('#row_id').val(row_id);
                    $('#type_id').val(type_id);
                    $('#business_catogory_id').val(business_catogory_id);
                    $('#branch_id').val(branch_id);
                
                    $.ajax({
                        type: "POST",
                        url: "{{ route('multiexpenses.edit') }}", 
                        data: {
                            "_token": "{{ csrf_token() }}",
                            "id": multiexpenses_id             
                        },
                        success: function(response) {
                            if (response.success) {

                                $('#edit_amount').val(response.data.amount);
                                $('#edit_description').val(response.data.description);
                                $('#edit_date').val(response.data.date);
                                $('#edit_type_id').val(response.data.type_id); 
                                $('#edit_business_catogory_id').val(response.data.business_catogory_id); 
                                $('#edit_branch_id').val(response.data.branch_id); 
                            
                                $('#EditModal').modal('show');
                            } else {
                                alert('Error: ' + response.message);
                            }
                        },
                        error: function(xhr, status, error) {
                            console.error('AJAX Error:', error);
                            alert('Failed to fetch multi expense data. Please try again.');
                        }
                    });
                });

                $('#edit_multiexpenses_form').submit(function(event) {
                    event.preventDefault(); 
                    var formData = new FormData($(this)[0]);
                    var rowId = $('#row_id').val();

                    $.ajax({
                        url: "{{ route('multiexpenses.update') }}", 
                        method: "POST", 
                        data: formData,
                        contentType: false, 
                        processData: false, 
                        success: function(response) {
                            if (response.success) {
                                $('#EditModal').modal('hide');
                                $('#edit_multiexpenses_form')[0].reset();
                                swal("Success!", "multi expense Updated successfully", {
                                    icon: "success",
                                    buttons: {
                                        confirm: {
                                            className: "btn btn-success",
                                        },
                                    },
                                });
                                
                                var table = $('#multiexpenses-datatable').DataTable();
                                var row = table.row('#row' + response.data.id); 

                                var formattedAddedDate = response.data.added_date ? new Date(response.data.added_date).toLocaleString() : ' ';
                                var formattedEditedDate = response.data.edited_date ? new Date(response.data.edited_date).toLocaleString() : ' ';
                                
                                row.data([
                                    rowId,                        
                                    response.data.amount || ' ', 
                                    response.data.description || ' ', 
                                    response.data.date || ' ', 
                                    response.data.type || ' ', 
                                    response.data.business_category_name|| ' ', 
                                    response.data.branch || ' ', 
                                    response.data.added_by || ' ',
                                    formattedAddedDate || ' ',
                                    response.data.edited_by || ' ',
                                    formattedEditedDate || ' ', 
                                    '<i class="fa fa-edit edit_multiexpenses" data-rowid="'+ rowId +'" data-id="' + response.data.id + '" data-bs-toggle="modal" data-bs-target="#EditModal"></i>' +
                                    '<i class="fa fa-trash delete_multiexpenses" data-rowid="'+ rowId +'" data-id="' + response.data.id + '"></i>' 
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

                $(document).on('click', '.delete_multiexpenses', function () {
                    var multiexpensesId = $(this).data('id'); 
                    var rowSelector = '#row' + multiexpensesId; 

                    swal({
                        title: "Are you sure?",
                        text: "You won't be able to revert this!",
                        icon: "warning",
                        buttons: true,
                        dangerMode: true,
                    }).then((willDelete) => {
                        if (willDelete) {
                            $.ajax({
                                url: "{{ route('multiexpenses.destroy') }}", 
                                method: "POST",
                                data: {
                                    "_token": "{{ csrf_token() }}",
                                    "id": multiexpensesId               
                                },
                                success: function (response) {
                                    if (response.success) {                       
                                        var table = $('#multiexpenses-datatable').DataTable();
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