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
                            <table id="otherpolicies-datatable" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>Sl No</th>
                                        <th>Policy Category</th>                                    
                                        <th>Name</th>
                                        <th>Primary Number</th>
                                        <th>Secondary Number</th>
                                        <th>Expiry Date</th>
                                        <th>Premium Amount</th>
                                        <th>Sum Insured</th>
                                        <th>Term</th>
                                        <th>Executive</th>
                                        <th>Status</th>
                                        <th>Referesnce Perosn</th>
                                        <th>Insurance Provider</th>
                                        <th>Note</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $i = 1; @endphp
                                    @foreach ($otherpolicies as $otherpolicy)
                                        <tr id="row{{ $otherpolicy->id }}">
                                            <td>{{ $i }}</td>                                           
                                            <td>{{ $otherpolicy->policy_category->policy_category ?? 'N/A' }}</td>
                                            <td>{{ $otherpolicy->name}}</td>
                                            <td>{{ $otherpolicy->primary_number}}</td>
                                            <td>{{ $otherpolicy->secondary_number}}</td>
                                            <td>{{ $otherpolicy->expiry_date}}</td>
                                            <td>{{ $otherpolicy->premium_amount}}</td>
                                            <td>{{ $otherpolicy->sum_insured}}</td>
                                            <td>{{ $otherpolicy->term}}</td>
                                            <td>{{ $otherpolicy->executive->user->name ?? 'N/A' }}</td>
                                            <td>{{ $otherpolicy->status == 1 ? 'Paid' : 'Not Paid' }}</td>
                                            <td>{{ $otherpolicy->referred->name ?? 'N/A' }}</td>                                            
                                            <td>{{ $otherpolicy->provider->provider_name ?? 'N/A' }}</td>                                          
                                            <td>{{ $otherpolicy->note }}</td>                                        
                                           
                                            <td>
                                                <i class="fa fa-edit edit_otherpolicies"
                                                    data-id="{{ $otherpolicy->id }}" data-rowid="{{ $i }}" data-bs-toggle="modal"
                                                    data-bs-target="#EditModal"></i>

                                                    <i class="fa fa-trash delete_otherpolicies"
                                                    data-id="{{ $otherpolicy->id }}"></i>    
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
                    <h5 class="modal-title">Create Other Policy</h5>
                    <button type="button" onclick="$('#CreateModal').modal('hide')" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="create_otherpolicies_form" class="form">
                        @csrf                        
                        <div class="form-group">
                            <label for="policy_category">Policy Category</label>
                            <select name="policy_category_id" id="policy_category_id" class="form-control" required>
                                @foreach ($policy_category as $pol)
                                    <option value="{{ $pol->id }}">{{ $pol->policy_category }}</option>
                                @endforeach
                            </select>
                        </div>    
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" name="name" id="name" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="primary_number">Primary Number</label>
                            <input type="number" name="primary_number" id="primary_number" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="secondary_number">Secondary Number</label>
                            <input type="number" name="secondary_number" id="secondary_number" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="expiry_date">Expiry Date</label>
                            <input type="date" name="expiry_date" id="expiry_date" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="premium_amount">Premium Amount</label>
                            <input type="number" name="premium_amount" id="premium_amount" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="sum_insured">Sum Insured</label>
                            <input type="number" name="sum_insured" id="sum_insured" class="form-control">
                        </div>
                        <div class="form-group">
                        <label for="term">Term</label><br>
                        <div class="form-check">
                            <input type="radio" name="term" id="term_1year" value="1year" class="form-check-input" checked>
                            <label for="term_1year" class="form-check-label">1 Year</label>
                        </div>
                        </div>
                        <div class="form-group">
                            <label for="executive">Executive</label>
                            <select name="executive_id" id="executive_id" class="form-control" required>
                                @foreach ($executive as $exe)
                                    <option value="{{ $exe->user_id }}">{{ $exe->user->name }}</option>
                                @endforeach
                            </select>
                        </div>  
                        <div class="form-group">
                            <label for="status" class="form-label">Status</label>
                            <select name="status" id="status" class="form-control" required>
                                <option value="0" {{ isset($policy) && $policy->status == 0 ? 'selected' : '' }}>Not Paid</option>
                                <option value="1" {{ isset($policy) && $policy->status == 1 ? 'selected' : '' }}>Paid</option>
                            </select>
                        </div> 
                        <div class="form-group">
                            <label for="referred">Referesnce Perosn</label>
                            <select name="referred_id" id="referred_id" class="form-control" required>
                                @foreach ($referred as $ref)
                                    <option value="{{ $ref->id }}">{{ $ref->name }}</option>
                                @endforeach
                            </select>
                        </div>     
                        <div class="form-group">
                            <label for="provider">Insurance Provider</label>
                            <select name="provider_id" id="provider_id" class="form-control" required>
                                @foreach ($provider as $prov)
                                    <option value="{{ $prov->id }}">{{ $prov->provider_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="note">Note</label>
                            <input type="text" name="note" id="note" class="form-control">
                        </div>
                        <div class="form-actions form-group">
                            <button type="submit" class="btn btn-primary btn-sm">Submit</button>
                            <button type="button" onclick="$('#CreateModal').modal('hide')" class="btn btn-secondary btn-sm" data-dismiss="modal">Cancel</button>
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
                    <h5 class="modal-title">Edit Other Policy</h5>
                    <button type="button" onclick="$('#EditModal').modal('hide')" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="edit_otherpolicies_form" class="form">
                        @csrf
                        <input type="hidden" name="rowid" id="row_id">
                            <input type="hidden" name="id" id="otherpolicies_id">                      
                        
                            
                        <div class="form-group">
                            <label for="policy_category">Policy Category</label>
                            <select name="policy_category_id" id="edit_policy_category_id" class="form-control" required>
                                @foreach ($policy_category as $pol)
                                    <option value="{{ $pol->id }}">{{ $pol->policy_category }}</option>
                                @endforeach
                            </select>
                        </div>    
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" name="name" id="edit_name" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="primary_number">Primary Number</label>
                            <input type="number" name="primary_number" id="edit_primary_number" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="secondary_number">Secondary Number</label>
                            <input type="number" name="secondary_number" id="edit_secondary_number" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="expiry_date">Expiry Date</label>
                            <input type="date" name="expiry_date" id="edit_expiry_date" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="premium_amount">Premium Amount</label>
                            <input type="number" name="premium_amount" id="edit_premium_amount" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="sum_insured">Sum Insured</label>
                            <input type="number" name="sum_insured" id="edit_sum_insured" class="form-control">
                        </div>
                        <div class="form-group">
                        <label for="term">Term</label><br>
                        <div class="form-check">
                            <input type="radio" name="term" id="edit_term_1year" value="1year" class="form-check-input" checked>
                            <label for="term_1year" class="form-check-label">1 Year</label>
                        </div>
                        </div>
                        <div class="form-group">
                            <label for="executive">Executive</label>
                            <select name="executive_id" id="edit_executive_id" class="form-control" required>
                                @foreach ($executive as $exe)
                                    <option value="{{ $exe->user_id }}">{{ $exe->user->name }}</option>
                                @endforeach
                            </select>
                        </div>  
                        <div class="form-group">
                        <label for="status" class="form-label">Status</label>
                        <select name="status" id="edit_status" class="form-control" required>
                            <option value="0" {{ isset($policy) && $policy->status == 0 ? 'selected' : '' }}>Not Paid</option>
                            <option value="1" {{ isset($policy) && $policy->status == 1 ? 'selected' : '' }}>Paid</option>
                        </select>
                        </div> 
                        <div class="form-group">
                            <label for="referred">Referesnce Perosn</label>
                            <select name="referred_id" id="edit_referred_id" class="form-control" required>
                                @foreach ($referred as $ref)
                                    <option value="{{ $ref->id }}">{{ $ref->name }}</option>
                                @endforeach
                            </select>
                        </div>     
                        <div class="form-group">
                            <label for="provider">Insurance Provider</label>
                            <select name="provider_id" id="edit_provider_id" class="form-control" required>
                                @foreach ($provider as $prov)
                                    <option value="{{ $prov->id }}">{{ $prov->provider_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="note">Note</label>
                            <input type="text" name="note" id="edit_note" class="form-control">
                        </div>
                       
                        <div class="form-actions form-group">
                            <button type="submit" class="btn btn-primary btn-sm">Submit</button>
                            <button type="button" onclick="$('#EditModal').modal('hide')" class="btn btn-secondary btn-sm" data-dismiss="modal">Cancel</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>    

    @push('scripts')
        <script>
            $(document).ready(function() {
                $('#otherpolicies-datatable').DataTable();
                $('#create_otherpolicies_form').submit(function(event) {
                    event.preventDefault(); 
                    var formData = new FormData($(this)[0]);  

                    $.ajax({
                        url: "{{ route('otherpolicies.store') }}",  
                        method: "POST",
                        data: formData,
                        contentType: false,  
                        processData: false,  
                        success: function(response) {
                            if (response.success) {
                                $('#CreateModal').modal('hide');  

                                $('#create_otherpolicies_form')[0].reset(); 

                                swal("Success!", "other policy added successfully!", {
                                    icon: "success",
                                    buttons: {
                                        confirm: {
                                            className: "btn btn-success",
                                        },
                                    },
                                });

                                var table = $('#otherpolicies-datatable').DataTable();
                                var lastRowNumber = table.data().count() > 0 ? parseInt(table.row(':last').data()[0]) + 1 : 0;

                                var newRow = table.row.add([
                                    lastRowNumber,                         
                                    response.data.policy_category, 
                                    response.data.name, 
                                    response.data.primary_number,                                    
                                    response.data.secondary_number,                                    
                                    response.data.expiry_date,                                    
                                    response.data.premium_amount,                                    
                                    response.data.sum_insured,                                    
                                    response.data.term,                                    
                                    response.data.user_id,                                    
                                    response.data.status,                                    
                                    response.data.referred,                                    
                                    response.data.provider,                                    
                                    response.data.note,                                                                     
                                    '<i class="fa fa-edit edit_otherpolicies" data-rowid="'+ lastRowNumber +'" data-id="' + response.data.id + '" data-bs-toggle="modal" data-bs-target="#EditModal"></i>' +
                                    '<i class="fa fa-trash delete_otherpolicies" data-rowid="'+ lastRowNumber +'" data-id="' + response.data.id + '"></i>'
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

                        
    
                $(document).on("click", ".edit_otherpolicies", function() {
                                    

                    var otherpolicies_id = $(this).data('id');
                    var row_id = $(this).data('rowid');                        
                    var executive_id = $(this).data('executive_id');
                    var referred_id = $(this).data('referred_id');
                    var provider_id = $(this).data('provider_id');
                    var policy_category_id = $(this).data('policy_category_id');

                     
                    $('#otherpolicies_id').val(otherpolicies_id);
                    $('#row_id').val(row_id);
                    $('#executive_id').val(executive_id);
                    $('#referred_id').val(referred_id);
                    $('#provider_id').val(provider_id);
                    $('#policy_category_id').val(policy_category_id);
    
                    $.ajax({
                        type: "POST",
                        url: "{{ route('otherpolicies.edit') }}",
                        data: {
                            "_token": "{{ csrf_token() }}",
                            "id": otherpolicies_id
                        },
                        success: function(response) {
                            if (response.success) {
                                $('#edit_policy_category_id').val(response.data.policy_category_id);
                                $('#edit_name').val(response.data.name);
                                $('#edit_primary_number').val(response.data.primary_number);
                                $('#edit_secondary_number').val(response.data.secondary_number);
                                $('#edit_expiry_date').val(response.data.expiry_date);
                                $('#edit_premium_amount').val(response.data.premium_amount);
                                $('#edit_sum_insured').val(response.data.sum_insured);
                                $('#edit_term').val(response.data.term);
                                $('#edit_executive_id').val(response.data.executive_id);
                                $('#edit_status').val(response.data.status);
                                $('#edit_referred_id').val(response.data.referred_id);
                                $('#edit_provider_id').val(response.data.provider_id);
                                $('#edit_note').val(response.data.note);               
                            
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


                $('#edit_otherpolicies_form').submit(function(event) {
                    event.preventDefault(); 
                    var formData = new FormData($(this)[0]);
                    var rowId = $('#row_id').val();

                    $.ajax({
                        url: "{{ route('otherpolicies.update') }}", 
                        method: "POST", 
                        data: formData,
                        contentType: false, 
                        processData: false, 
                        success: function(response) {
                            if (response.success) {
                                $('#EditModal').modal('hide');
                                $('#edit_otherpolicies_form')[0].reset();
                                swal("Success!", "Other Policy Updated successfully", {
                                    icon: "success",
                                    buttons: {
                                        confirm: {
                                            className: "btn btn-success",
                                        },
                                    },
                                });
                                
                                var table = $('#otherpolicies-datatable').DataTable();
                                var row = table.row('#row' + response.data.id); 
                                
                                row.data([
                                    rowId,                        
                                    response.data.policy_category, 
                                    response.data.name, 
                                    response.data.primary_number,                                    
                                    response.data.secondary_number,                                    
                                    response.data.expiry_date,                                    
                                    response.data.premium_amount,                                    
                                    response.data.sum_insured,                                    
                                    response.data.term,                                    
                                    response.data.user_id,                                    
                                    response.data.status,                                    
                                    response.data.referred,   
                                    response.data.provider,                                  
                                    response.data.note,                                    
                                    '<i class="fa fa-edit edit_otherpolicies" data-rowid="'+ rowId +'" data-id="' + response.data.id + '" data-bs-toggle="modal" data-bs-target="#EditModal"></i>' +
                                    '<i class="fa fa-trash delete_otherpolicies" data-rowid="'+ rowId +'" data-id="' + response.data.id + '"></i>' 
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

                $(document).on('click', '.delete_otherpolicies', function () {
                    var otherpoliciesId = $(this).data('id'); 
                    var rowSelector = '#row' + otherpoliciesId; 

                    swal({
                        title: "Are you sure?",
                        text: "You won't be able to revert this!",
                        icon: "warning",
                        buttons: true,
                        dangerMode: true,
                    }).then((willDelete) => {
                        if (willDelete) {
                            $.ajax({
                                url: "{{ route('otherpolicies.destroy') }}", 
                                method: "POST",
                                data: {
                                    "_token": "{{ csrf_token() }}",
                                    "id": otherpoliciesId               
                                },
                                success: function (response) {
                                    if (response.success) {                       
                                        var table = $('#otherpolicies-datatable').DataTable();
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