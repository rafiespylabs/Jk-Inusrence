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
                            <table id="expenses-datatable" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>Sl No</th>
                                        <th>Amount</th>
                                        <th>Description</th>
                                        <th>Date</th>
                                        <th>Type</th>
                                        <th>Created Date</th>
                                        <th>Created By</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $i = 1; @endphp
                                    @foreach ($expenses as $expense)
                                    @php $created_by = $expense->user->id ?? ''; @endphp
                                        <tr id="row{{ $expense->id }}">
                                            <td>{{ $i }}</td>
                                            <td>{{ $expense->amount}}</td>
                                            <td>{{ $expense->description}}</td>
                                            <td>{{ $expense->date}}</td>                                           
                                            <td>{{ $expense->type->type ?? 'N/A' }}</td>
                                            <td>{{ \Carbon\Carbon::parse($expense->created_date)->format('d/m/Y') }}</td>
                                            <td>{{ $created_by }}</td>
                                            <td>
                                                <i class="fa fa-edit edit_expenses"
                                                    data-id="{{ $expense->id }}" data-rowid="{{ $i }}" data-bs-toggle="modal"
                                                    data-bs-target="#EditModal"></i>

                                                    <i class="fa fa-trash delete_expenses"
                                                    data-id="{{ $expense->id }}"></i>    
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
                    <h5 class="modal-title">Create Expenses </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="create_expenses_form" class="form">
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
                                @foreach ($expenseTypes as $expenseType)
                                    <option value="{{ $expenseType->id }}">{{ $expenseType->type }}</option>
                                @endforeach
                            </select>
                        </div>                
                        <div class="form-actions form-group">
                            <button type="submit" class="btn btn-primary btn-sm">Submit</button>
                            <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Cancel</button>
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
                    <h5 class="modal-title">Edit Expenses</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="edit_expenses_form" class="form">
                        @csrf

                        <input type="hidden" name="rowid" id="row_id">
                            <input type="hidden" name="id" id="expenses_id">
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
                            <label for="type_id">Type</label>
                            <select name="type_id" id="edit_type_id" class="form-control" required>
                                @foreach ($expenseTypes as $expenseType)
                                    <option value="{{ $expenseType->id }}">{{ $expenseType->type }}</option>
                                @endforeach
                            </select>
                        </div>                 
                        
                        <div class="form-actions form-group">
                            <button type="submit" class="btn btn-primary btn-sm">Submit</button>
                            <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Cancel</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>    

    @push('scripts')
        <script>
            $(document).ready(function() {
                $('#expenses-datatable').DataTable();
                $('#create_expenses_form').submit(function(event) {
                    event.preventDefault(); 
                    var formData = new FormData($(this)[0]);  

                    $.ajax({
                        url: "{{ route('expenses.store') }}",  
                        method: "POST",
                        data: formData,
                        contentType: false,  
                        processData: false,  
                        success: function(response) {
                            if (response.success) {
                                $('#CreateModal').modal('hide');  

                                $('#create_expenses_form')[0].reset(); 

                                swal("Success!", "Expenses added successfully!", {
                                    icon: "success",
                                    buttons: {
                                        confirm: {
                                            className: "btn btn-success",
                                        },
                                    },
                                });

                                var table = $('#expenses-datatable').DataTable();
                                var lastRowNumber = table.data().count() > 0 ? parseInt(table.row(':last').data()[0]) + 1 : 0;

                                var newRow = table.row.add([
                                    lastRowNumber,                         
                                    response.data.amount, 
                                    response.data.description, 
                                    response.data.date, 
                                    response.data.type, 
                                    response.data.created_date, 
                                    response.data.created_by, 
                                    '<i class="fa fa-edit edit_expenses" data-rowid="'+ lastRowNumber +'" data-id="' + response.data.id + '" data-bs-toggle="modal" data-bs-target="#EditModal"></i>' +
                                    '<i class="fa fa-trash delete_expenses" data-rowid="'+ lastRowNumber +'" data-id="' + response.data.id + '"></i>'
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
          
                $(document).on("click", ".edit_expenses", function() {
                    var expenses_id = $(this).data('id'); 
                    var row_id = $(this).data('rowid');   
                    var type_id = $(this).data('typeid'); 
                    
                    $('#expenses_id').val(expenses_id);
                    $('#row_id').val(row_id);
                    $('#type_id').val(type_id);
                
                    $.ajax({
                        type: "POST",
                        url: "{{ route('expenses.edit') }}", 
                        data: {
                            "_token": "{{ csrf_token() }}",
                            "id": expenses_id             
                        },
                        success: function(response) {
                            if (response.success) {

                                $('#edit_amount').val(response.data.amount);
                                $('#edit_description').val(response.data.description);
                                $('#edit_date').val(response.data.date);
                                $('#edit_type_id').val(response.data.type_id); 
                            
                                $('#EditModal').modal('show');
                            } else {
                                alert('Error: ' + response.message);
                            }
                        },
                        error: function(xhr, status, error) {
                            console.error('AJAX Error:', error);
                            alert('Failed to fetch expense data. Please try again.');
                        }
                    });
                });

                $('#edit_expenses_form').submit(function(event) {
                    event.preventDefault(); 
                    var formData = new FormData($(this)[0]);
                    var rowId = $('#row_id').val();

                    $.ajax({
                        url: "{{ route('expenses.update') }}", 
                        method: "POST", 
                        data: formData,
                        contentType: false, 
                        processData: false, 
                        success: function(response) {
                            if (response.success) {
                                $('#EditModal').modal('hide');
                                $('#edit_expenses_form')[0].reset();
                                swal("Success!", "Expenses Updated successfully", {
                                    icon: "success",
                                    buttons: {
                                        confirm: {
                                            className: "btn btn-success",
                                        },
                                    },
                                });
                                
                                var table = $('#expenses-datatable').DataTable();
                                var row = table.row('#row' + response.data.id); 
                                
                                row.data([
                                    rowId,                        
                                    response.data.amount, 
                                    response.data.description, 
                                    response.data.date, 
                                    response.data.type, 
                                    response.data.created_date, 
                                    response.data.created_by, 
                                    '<i class="fa fa-edit edit_expenses" data-rowid="'+ rowId +'" data-id="' + response.data.id + '" data-bs-toggle="modal" data-bs-target="#EditModal"></i>' +
                                    '<i class="fa fa-trash delete_expenses" data-rowid="'+ rowId +'" data-id="' + response.data.id + '"></i>' 
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

                $(document).on('click', '.delete_expenses', function () {
                    var expensesId = $(this).data('id'); 
                    var rowSelector = '#row' + expensesId; 

                    swal({
                        title: "Are you sure?",
                        text: "You won't be able to revert this!",
                        icon: "warning",
                        buttons: true,
                        dangerMode: true,
                    }).then((willDelete) => {
                        if (willDelete) {
                            $.ajax({
                                url: "{{ route('expenses.destroy') }}", 
                                method: "POST",
                                data: {
                                    "_token": "{{ csrf_token() }}",
                                    "id": expensesId               
                                },
                                success: function (response) {
                                    if (response.success) {                       
                                        var table = $('#expenses-datatable').DataTable();
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