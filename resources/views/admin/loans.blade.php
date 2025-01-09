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
                            <table id="loans-datatable" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>Sl No</th>
                                        <th>Customer Name</th>                                    
                                        <th>Phone number</th>
                                        <th>Loan Type</th>
                                        <th>Bank</th>
                                        <th>Loan Amount</th>
                                        <th>Vehicle Category</th>
                                        <th>Status</th>
                                        <th>Reason(Reason for Pending)</th>
                                        <th>Approved Date</th>
                                        <th>Remarks</th>
                                        <th>Created By</th>
                                        <th>Created Date</th>                                        
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $i = 1; @endphp
                                    @foreach ($loans as $loan)
                                    @php $created_by = $loan->user->id ?? ''; @endphp
                                        <tr id="row{{ $loan->id }}">
                                            <td>{{ $i }}</td>                                           
                                            <td>{{ $loan->customer_name }}</td>
                                            <td>{{ $loan->phone_number}}</td>
                                            <td>{{ $loan->loan_type->loan_type ?? 'N/A'}}</td>
                                            <td>{{ $loan->bank}}</td>
                                            <td>{{ $loan->loan_amount}}</td>
                                            <td>{{ $loan->vehicle_category->vechile_category ?? 'N/A'}}</td>
                                            <td>{{ $loan->status == 1 ? 'approved' : 'pending' }}</td>
                                            <td>{{ $loan->reason}}</td>
                                            <td>{{ $loan->approved_date}}</td>
                                            <td>{{ $loan->remarks}}</td>
                                            <td>{{ $created_by}}</td>                                            
                                            <td>{{ \Carbon\Carbon::parse($loan->created_date)->format('d/m/Y') }}</td>                                    
                                           
                                            <td>
                                                <i class="fa fa-edit edit_loans"
                                                    data-id="{{ $loan->id }}" data-rowid="{{ $i }}" data-bs-toggle="modal"
                                                    data-bs-target="#EditModal"></i>

                                                    <i class="fa fa-trash delete_loans"
                                                    data-id="{{ $loan->id }}"></i>    
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
                    <h5 class="modal-title">Create Loan</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="create_loans_form" class="form">
                        @csrf      
                        <div class="form-group">
                            <label for="customer_name">Customer Name</label>
                            <input type="text" name="customer_name" id="customer_name" class="form-control">
                        </div>     
                        <div class="form-group">
                            <label for="phone_number">Phone Number</label>
                            <input type="number" name="phone_number" id="phone_number" class="form-control">
                        </div>             
                        <div class="form-group">
                            <label for="loan_type">Loan Type</label>
                            <select name="loan_type_id" id="loan_type_id" class="form-control" required>
                                @foreach ($loan_type as $loan)
                                    <option value="{{ $loan->id }}">{{ $loan->loan_type }}</option>
                                @endforeach
                            </select>
                        </div>    
                        <div class="form-group">
                            <label for="bank">Bank</label>
                            <input type="text" name="bank" id="bank" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="loan_amount">Loan Amount</label>
                            <input type="number" name="loan_amount" id="loan_amount" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="vehicle_category">Vehicle Category</label>
                            <select name="vehicle_cat_id" id="vehicle_cat_id" class="form-control" required>
                                @foreach ($vehicle_category as $vehicle)
                                    <option value="{{ $vehicle->id }}">{{ $vehicle->vechile_category }}</option>
                                @endforeach
                            </select>
                        </div>   
                        <div class="form-group">
                            <label for="status" class="form-label">Status</label>
                            <select name="status" id="status" class="form-control" required>
                                <option value="0" {{ isset($loan) && $loan->status == 0 ? 'selected' : '' }}>pending</option>
                                <option value="1" {{ isset($loan) && $loan->status == 1 ? 'selected' : '' }}>approved</option>
                            </select>
                        </div> 
                        <div class="form-group">
                            <label for="reason">Reason(Reason for Pending)</label>
                            <input type="text" name="reason" id="reason" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="approved_date">Approved Date</label>
                            <input type="date" name="approved_date" id="approved_date" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="remarks">Remarks</label>
                            <input type="text" name="remarks" id="remarks" class="form-control">
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
                    <h5 class="modal-title">Edit Loan</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="edit_loans_form" class="form">
                        @csrf
                        <input type="hidden" name="rowid" id="row_id">
                            <input type="hidden" name="id" id="loans_id">                    
                        
                            <div class="form-group">
                            <label for="customer_name">Customer Name</label>
                            <input type="text" name="customer_name" id="edit_customer_name" class="form-control">
                        </div>     
                        <div class="form-group">
                            <label for="phone_number">Phone Number</label>
                            <input type="number" name="phone_number" id="edit_phone_number" class="form-control">
                        </div>             
                        <div class="form-group">
                            <label for="loan_type">Loan Type</label>
                            <select name="loan_type_id" id="edit_loan_type_id" class="form-control" required>
                                @foreach ($loan_type as $loan)
                                    <option value="{{ $loan->id }}">{{ $loan->loan_type }}</option>
                                @endforeach
                            </select>
                        </div>    
                        <div class="form-group">
                            <label for="bank">Bank</label>
                            <input type="text" name="bank" id="edit_bank" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="loan_amount">Loan Amount</label>
                            <input type="number" name="loan_amount" id="edit_loan_amount" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="vehicle_category">Vehicle Category</label>
                            <select name="vehicle_cat_id" id="edit_vehicle_cat_id" class="form-control" required>
                                @foreach ($vehicle_category as $vehicle)
                                    <option value="{{ $vehicle->id }}">{{ $vehicle->vechile_category }}</option>
                                @endforeach
                            </select>
                        </div>   
                        <div class="form-group">
                            <label for="status" class="form-label">Status</label>
                            <select name="status" id="edit_status" class="form-control" required>
                                <option value="0" {{ isset($loan) && $loan->status == 0 ? 'selected' : '' }}>pending</option>
                                <option value="1" {{ isset($loan) && $loan->status == 1 ? 'selected' : '' }}>approved</option>
                            </select>
                        </div> 
                        <div class="form-group">
                            <label for="reason">Reason(Reason for Pending)</label>
                            <input type="text" name="reason" id="edit_reason" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="approved_date">Approved Date</label>
                            <input type="date" name="approved_date" id="edit_approved_date" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="remarks">Remarks</label>
                            <input type="text" name="remarks" id="edit_remarks" class="form-control">
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
                $('#loans-datatable').DataTable();
                $('#create_loans_form').submit(function(event) {
                    event.preventDefault(); 
                    var formData = new FormData($(this)[0]);  

                    $.ajax({
                        url: "{{ route('loans.store') }}",  
                        method: "POST",
                        data: formData,
                        contentType: false,  
                        processData: false,  
                        success: function(response) {
                            if (response.success) {
                                $('#CreateModal').modal('hide');  

                                $('#create_loans_form')[0].reset(); 

                                swal("Success!", "Loan added successfully!", {
                                    icon: "success",
                                    buttons: {
                                        confirm: {
                                            className: "btn btn-success",
                                        },
                                    },
                                });

                                var table = $('#loans-datatable').DataTable();
                                var lastRowNumber = table.data().count() > 0 ? parseInt(table.row(':last').data()[0]) + 1 : 0;

                                var newRow = table.row.add([
                                    lastRowNumber,                         
                                    response.data.customer_name, 
                                    response.data.phone_number, 
                                    response.data.loan_type,                                    
                                    response.data.bank,                                    
                                    response.data.loan_amount,                                    
                                    response.data.vehicle_category,                                    
                                    response.data.status,                                    
                                    response.data.reason,                                    
                                    response.data.approved_date,                                    
                                    response.data.remarks,                                    
                                    response.data.created_by,                                    
                                    response.data.created_date,                                                                                                        
                                    '<i class="fa fa-edit edit_loans" data-rowid="'+ lastRowNumber +'" data-id="' + response.data.id + '" data-bs-toggle="modal" data-bs-target="#EditModal"></i>' +
                                    '<i class="fa fa-trash delete_loans" data-rowid="'+ lastRowNumber +'" data-id="' + response.data.id + '"></i>'
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

                        
    
                $(document).on("click", ".edit_loans", function() {
                                    

                    var loans_id = $(this).data('id');
                    var row_id = $(this).data('rowid');                        
                    var loan_type_id = $(this).data('loan_type_id');
                    var vehicle_cat_id = $(this).data('vehicle_cat_id');
                     
                    $('#loans_id').val(loans_id);
                    $('#row_id').val(row_id);
                    $('#loan_type_id').val(loan_type_id);
                    $('#vehicle_cat_id').val(vehicle_cat_id);                   
    
                    $.ajax({
                        type: "POST",
                        url: "{{ route('loans.edit') }}",
                        data: {
                            "_token": "{{ csrf_token() }}",
                            "id": loans_id
                        },
                        success: function(response) {
                            if (response.success) {
                                $('#edit_customer_name').val(response.data.customer_name);
                                $('#edit_phone_number').val(response.data.phone_number);
                                $('#edit_loan_type_id').val(response.data.loan_type_id);
                                $('#edit_bank').val(response.data.bank);
                                $('#edit_loan_amount').val(response.data.loan_amount);
                                $('#edit_vehicle_cat_id').val(response.data.vehicle_cat_id);
                                $('#edit_status').val(response.data.status);
                                $('#edit_reason').val(response.data.reason);
                                $('#edit_approved_date').val(response.data.approved_date);
                                $('#edit_remarks').val(response.data.remarks);                                             
                            
                                $('#EditModal').modal('show');
                            } else {
                                alert('Error: ' + response.message);
                            }
                        },
                        error: function(xhr, status, error) {
                            console.error('AJAX Error:', error);
                            alert('Failed to fetch data.');
                        }
                    });
                });


                $('#edit_loans_form').submit(function(event) {
                    event.preventDefault(); 
                    var formData = new FormData($(this)[0]);
                    var rowId = $('#row_id').val();

                    $.ajax({
                        url: "{{ route('loans.update') }}", 
                        method: "POST", 
                        data: formData,
                        contentType: false, 
                        processData: false, 
                        success: function(response) {
                            if (response.success) {
                                $('#EditModal').modal('hide');
                                $('#edit_loans_form')[0].reset();
                                swal("Success!", "Loan Updated successfully", {
                                    icon: "success",
                                    buttons: {
                                        confirm: {
                                            className: "btn btn-success",
                                        },
                                    },
                                });
                                
                                var table = $('#loans-datatable').DataTable();
                                var row = table.row('#row' + response.data.id); 
                                
                                row.data([
                                    rowId,                        
                                    response.data.customer_name, 
                                    response.data.phone_number, 
                                    response.data.loan_type,                                    
                                    response.data.bank,                                    
                                    response.data.loan_amount,                                    
                                    response.data.vehicle_category,                                    
                                    response.data.status,                                    
                                    response.data.reason,                                    
                                    response.data.approved_date,                                    
                                    response.data.remarks,                                    
                                    response.data.created_by,                                    
                                    response.data.created_date,                                   
                                    '<i class="fa fa-edit edit_loans" data-rowid="'+ rowId +'" data-id="' + response.data.id + '" data-bs-toggle="modal" data-bs-target="#EditModal"></i>' +
                                    '<i class="fa fa-trash delete_loans" data-rowid="'+ rowId +'" data-id="' + response.data.id + '"></i>' 
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

                $(document).on('click', '.delete_loans', function () {
                    var loansId = $(this).data('id'); 
                    var rowSelector = '#row' + loansId; 

                    swal({
                        title: "Are you sure?",
                        text: "You won't be able to revert this!",
                        icon: "warning",
                        buttons: true,
                        dangerMode: true,
                    }).then((willDelete) => {
                        if (willDelete) {
                            $.ajax({
                                url: "{{ route('loans.destroy') }}", 
                                method: "POST",
                                data: {
                                    "_token": "{{ csrf_token() }}",
                                    "id": loansId               
                                },
                                success: function (response) {
                                    if (response.success) {                       
                                        var table = $('#loans-datatable').DataTable();
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