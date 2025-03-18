<x-admin1-layout>
@push('styles')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.14.0-beta2/dist/css/bootstrap-select.min.css">   
@endpush
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
                                        <th>Premium Amount</th>
                                        <th>Customer Paid Premium Amount</th>
                                        <th>Paid Amount</th>
                                        <th>Due Amount</th>
                                        <th>Payment Status</th>
                                        <th>Pay Now</th>
                                        <th>Purchase Card</th>
                                        <th>Document</th>
                                        <th>Renew</th>
                                        <th>Action</th>
                                        <th>Policy Mode</th>
                                        <th>Secondary Number</th>
                                        <th>Start Date</th>
                                        <th>Expiry Date</th>
                                        <th>Sum Insured</th>
                                        <th>Executive</th>
                                        <th>Referesnce Perosn</th>
                                        <th>Insurance Provider</th>
                                        <th>Note</th>
                                        <th>Created By</th>
                                        <th>Created Date</th>
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
                                            <td>{{ $otherpolicy->premium_amount}}</td>
                                            <td>{{ $otherpolicy->customer_premium_amount}}</td>
                                            <td>{{ $otherpolicy->paid_amount}}</td>
                                            <td>{{ $otherpolicy->due_amount}}</td>
                                            <td>
                                                @if($otherpolicy->paid_amount==0)
                                                <span class="badge badge-warning mb-2">Not Paid</span>
                                                @elseif(($otherpolicy->paid_amount!=0 &&  $otherpolicy->premium_amount != $otherpolicy->paid_amount))
                                                <span class="badge badge-danger mb-2">Partial Paid</span>
                                                @elseif($otherpolicy->paid_amount == $otherpolicy->premium_amount)
                                                <span class="badge badge-success">Full Paid</span>
                                                @endif
                                            </td>
                                            <td><a href="/policypayments/{{$otherpolicy->policy_category_id}}/{{$otherpolicy->id}}"><button class="btn btn-danger btn-xs" data-id="{{$otherpolicy->id}}"><i class="fas fa-wallet"></i> Pay Now</button></a></td>
                                            <td><a href="/purchase_cards/{{$otherpolicy->policy_category_id}}/{{$otherpolicy->id}}"><button class="btn btn-black btn-xs"><i class="fa fa-archive"></i> Purchase Card</button></a></td>
                                            <td><a href="{{route('otherPolicyDocs',$otherpolicy->id)}}" class="btn btn-primary btn-xs">Documents</a></td>     
                                            <td><a href="{{route('otherPolicyRenew',$otherpolicy->id)}}" class="btn btn-secondary btn-xs">Renew</a></td>                                  
                                            <td>
                                                <i class="fa fa-edit edit_otherpolicies"
                                                    data-id="{{ $otherpolicy->id }}" data-rowid="{{ $i }}" data-bs-toggle="modal"
                                                    data-bs-target="#EditModal"></i>
                                                    <i class="fa fa-trash delete_otherpolicies"
                                                    data-id="{{ $otherpolicy->id }}"></i>    
                                            </td>
                                            <td>
                                                @if($otherpolicy->policy_mode==1)
                                                <span class="badge badge-primary">New</span>
                                                @elseif($otherpolicy->policy_mode==2)
                                                <span class="badge badge-success">Renewal</span>
                                                @endif
                                            </td>
                                            <td>{{ $otherpolicy->secondary_number}}</td>
                                            <td>{{ $otherpolicy->start_date}}</td>
                                            <td>{{ $otherpolicy->expiry_date}}</td>
                                            <td>{{ $otherpolicy->sum_insured}}</td>
                                            <td>{{ $otherpolicy->executive->user->name ?? 'N/A' }}</td>
                                            <td>{{ $otherpolicy->referred->name ?? 'N/A' }}</td>                                            
                                            <td>{{ $otherpolicy->provider->provider_name ?? 'N/A' }}</td>   
                                            <td>{{ $otherpolicy->note }}</td>                                        
                                            <td>{{ $otherpolicy->created_user->name ?? 'N/A'}}</td> 
                                            <td>{{ $otherpolicy->created_date}}</td> 
                                        </tr>
                                        @php $i++; @endphp
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- <a href="{{route('payments')}}" class="btn btn-danger" style="margin-top:30px;">
                            <i class="fa fa-money-bill"></i>
                            Go To Payments
                        </a> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="CreateModal" tabindex="-1" role="dialog" aria-labelledby="CreateModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
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
                        <div class="row form-group">
                            <div class="col-4">
                                <label for="policy_category">Policy Category <span>*</span></label>
                                <select name="policy_category_id" id="policy_category_id" class="form-control" required>
                                    <option value="">Select One</option>
                                    @foreach ($policy_category as $pol)
                                        <option value="{{ $pol->id }}">{{ $pol->policy_category }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-4">
                                <label for="name">Name <span>*</span></label>
                                <input type="text" name="name" id="name" class="form-control" required>
                            </div>
                            <div class="col-4">
                                <label for="primary_number">Primary Number </label>
                                <input type="text" name="primary_number" id="primary_number" pattern="[0-9]{10}" 
                                title="Phone number must be 10 digits" class="form-control" >
                            </div>
                        </div>    
                        <div class="row form-group">
                            <div class="col-4">
                                <label for="secondary_number">Secondary Number</label>
                                <input type="text" name="secondary_number" id="secondary_number" pattern="[0-9]{10}" 
                                title="Phone number must be 10 digits" class="form-control">
                            </div>
                            <div class="col-4">
                                <label for="start_date">Start Date <span>*</span></label>
                                <input type="date" name="start_date" id="add_start_date" class="form-control" required>
                            </div>
                            <div class="col-4">
                                <label for="expiry_date">Expiry Date <span>*</span></label>
                                <input type="date" name="expiry_date" id="add_expiry_date" class="form-control" required>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-4">
                                <label for="premium_amount">Premium Amount <span>*</span></label>
                                <input type="number" name="premium_amount" id="premium_amount" class="form-control" required>
                            </div>
                            <div class="col-4">
                                <label for="premium_amount">Customer Paid Premium Amount</label>
                                <input type="number" name="customer_premium_amount" id="customer_premium_amount" class="form-control">
                            </div>
                            <div class="col-4">
                                <label for="sum_insured">Sum Insured <span>*</span></label>
                                <input type="number" name="sum_insured" id="sum_insured" class="form-control" required>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-4">
                                <label for="term">Term</label><br>
                                <div class="form-check">
                                    <input type="radio" name="term" id="term_1year" value="1year" class="form-check-input" checked>
                                    <label for="term_1year" class="form-check-label">1 Year</label>
                                </div>
                            </div>
                            <div class="col-4">
                                <label for="executive">Executive <span>*</span></label>
                                <select name="executive_id" id="executive_id" class="form-control" required>
                                    <option value="">Select One</option>
                                    @foreach ($executive as $exe)
                                        <option value="{{ $exe->user_id }}">{{ $exe->user->name }}</option>
                                    @endforeach
                                </select>
                            </div>  
                            <div class="col-4">
                                <label for="status" class="form-label">Status </label>
                                <select name="status" id="status" class="form-control">
                                    <option value="">Select One</option>
                                    <option value="0" {{ isset($policy) && $policy->status == 0 ? 'selected' : '' }}>Not Paid</option>
                                    <option value="1" {{ isset($policy) && $policy->status == 1 ? 'selected' : '' }}>Paid</option>
                                </select>
                            </div>    
                        </div>
                        <div class="row form-group">
                            <div class="col-4">
                                <label for="referred">C/O Perosn <span>*</span></label>
                                <div class="input-group">
                                    <select name="referred_id" id="referred_id" class="form-control selectpicker with-ajax" data-live-search="true" required>
                                        <option value="">Select One</option>
                                        @foreach ($referred as $ref)
                                            <option value="{{ $ref->id }}">{{ $ref->name }}</option>
                                        @endforeach
                                    </select>
                                    <div class="input-group-append">
                                        <button type="button" class="btn btn-info" id="openReferrenceModal"><i class="fa fa-plus" aria-hidden="true"></i></button>
                                    </div>
                                </div>
                            </div>  
                            <div class="col-4">
                                <label for="provider">Insurance Provider <span>*</span></label>
                                <select name="provider_id" id="provider_id" class="form-control" required>
                                    <option value="">Select One</option>
                                    @foreach ($provider as $prov)
                                        <option value="{{ $prov->id }}">{{ $prov->provider_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-4">
                                <label for="note">Note</label>
                                <input type="text" name="note" id="note" class="form-control">
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-md-4">
                                <label for="executive">Prepared User</label>
                                <select name="prepared_user_id"  class="form-control">
                                    <option value="">Select One</option>
                                    @foreach ($executive as $exe)
                                        <option value="{{ $exe->user_id }}">{{ $exe->user->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-4">
                                <label>Payment Mode </label>
                                <select  name="payment_mode_id" class="form-control">
                                    <option value="">Select One</option>
                                    @foreach($payment_modes as $mode)
                                    <option value="{{$mode->id}}">{{$mode->payment_mode}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-4">
                                <label for="policy_mode"  class="form-label">Policy Mode </label>
                                <select name="policy_mode"  class="form-control">
                                    <option value="">Select One</option>
                                    <option value="1">New </option>
                                    <option value="2">Renewal</option>
                                </select>
                            </div>  
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
        <div class="modal-dialog modal-xl" role="document">
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
                        <div class="row form-group">
                            <div class="col-4">
                                <label for="policy_category">Policy Category <span>*</span></label>
                                <select name="policy_category_id" id="edit_policy_category_id" class="form-control" required>
                                    <option value="">Select One</option>
                                    @foreach ($policy_category as $pol)
                                        <option value="{{ $pol->id }}">{{ $pol->policy_category }}</option>
                                    @endforeach
                                </select>
                            </div>    
                            <div class="col-4">
                                <label for="name">Name <span>*</span></label>
                                <input type="text" name="name" id="edit_name" class="form-control" required>
                            </div>
                            <div class="col-4">
                                <label for="primary_number">Primary Number </label>
                                <input type="text" name="primary_number" id="edit_primary_number" pattern="[0-9]{10}" 
                                title="Phone number must be 10 digits" class="form-control">
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-4">
                                <label for="secondary_number">Secondary Number</label>
                                <input type="text" name="secondary_number" id="edit_secondary_number" pattern="[0-9]{10}" 
                                title="Phone number must be 10 digits" class="form-control">
                            </div>
                            <div class="col-4">
                                <label for="start_date">Start Date <span>*</span></label>
                                <input type="date" name="start_date" id="edit_start_date" class="form-control">
                            </div>
                            <div class="col-4">
                                <label for="expiry_date">Expiry Date  <span>*</span></label>
                                <input type="date" name="expiry_date" id="edit_expiry_date" class="form-control">
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-4">
                                <label for="premium_amount">Premium Amount <span>*</span></label>
                                <input type="number" name="premium_amount" id="edit_premium_amount" class="form-control" required>
                            </div>
                            <div class="col-4">
                                <label for="premium_amount">Customer Paid Premium Amount </label>
                                <input type="number" name="customer_premium_amount" id="edit_customer_premium_amount" class="form-control">
                            </div>
                            <div class="col-4">
                                <label for="sum_insured">Sum Insured <span>*</span></label>
                                <input type="number" name="sum_insured" id="edit_sum_insured" class="form-control" required>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-4">
                                <label for="term">Term</label><br>
                                <div class="form-check">
                                    <input type="radio" name="term" id="edit_term_1year" value="1year" class="form-check-input" checked>
                                    <label for="term_1year" class="form-check-label">1 Year</label>
                                </div>
                            </div>
                            <div class="col-4">
                                <label for="executive">Executive <span>*</span></label>
                                <select name="executive_id" id="edit_executive_id" class="form-control" required>
                                    <option value="">Select One</option>
                                    @foreach ($executive as $exe)
                                        <option value="{{ $exe->user_id }}">{{ $exe->user->name }}</option>
                                    @endforeach
                                </select>
                            </div> 
                            <div class="col-4">
                                <label for="status" class="form-label">Status </label>
                                <select name="status" id="edit_status" class="form-control">
                                    <option value="">Select One</option>
                                    <option value="0" {{ isset($policy) && $policy->status == 0 ? 'selected' : '' }}>Not Paid</option>
                                    <option value="1" {{ isset($policy) && $policy->status == 1 ? 'selected' : '' }}>Paid</option>
                                </select>
                            </div>   
                        </div>
                        <div class="row form-group">
                            <div class="col-4">
                                <label for="referred">C/O Perosn <span>*</span></label>
                                <select name="referred_id" id="edit_referred_id" class="form-control" required>
                                    <option value="">Select One</option>
                                    @foreach ($referred as $ref)
                                        <option value="{{ $ref->id }}">{{ $ref->name }}</option>
                                    @endforeach
                                </select>
                            </div>   
                            <div class="col-4">
                                <label for="provider">Insurance Provider <span>*</span></label>
                                <select name="provider_id" id="edit_provider_id" class="form-control" required>
                                    <option value="">Select One</option>
                                    @foreach ($provider as $prov)
                                        <option value="{{ $prov->id }}">{{ $prov->provider_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-4">
                                <label for="note">Note</label>
                                <input type="text" name="note" id="edit_note" class="form-control">
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-4">
                                <label for="policy_mode"  class="form-label">Policy Mode </label>
                                <select name="policy_mode" id="edit_policy_mode"  class="form-control">
                                    <option value="">Select One</option>
                                    <option value="1">New </option>
                                    <option value="2">Renewal</option>
                                </select>
                            </div>  
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
    <!-- Create Reference Modal -->
    <div class="modal fade" id="CreateReferencemodel" tabindex="-1" role="dialog" aria-labelledby="CreateReferencemodelLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Create</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                <form id="create_reference_form" class="form" enctype="multipart/form-data">
                @csrf
                    <div class="row form-group">
                        <div class="col-6">
                            <label>Name<span>*</span></label>
                            <input type="text"  name="name" class="form-control" required>
                        </div>
                        <div class="col-6">
                            <label>Phone Number </label>
                            <input type="text"  name="phone_number" class="form-control">
                        </div>
                    </div>
                    <div class="form-actions form-group">
                    <button type="submit" class="btn btn-primary btn-sm">Submit</button>
                    <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Cancel</button>
                    </div>
                </form>
                </div>
                <div class="modal-footer">
                </div>
            </div>
        </div>
    </div>
    <!-- Create Reference Modal -->
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
                                $('.selectpicker').selectpicker('refresh');
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
                                var status='';
                                var policy_mode='';
                                var purchase_card='';
                                var pay_now='';
                                if(response.data.policy_mode==1)
                                {
                                    policy_mode='<span class="badge badge-success">New</span>';
                                }
                                else if(response.data.policy_mode==2)
                                {
                                    policy_mode='<span class="badge badge-secondary">Renewal</span>';
                                }
                                if(response.data.paid_amount==0)
                                {
                                    status='<span class="badge badge-warning mb-2">Not Paid</span>';
                                }
                                else if(response.data.paid_amount!=0 && response.data.premium_amount != response.data.paid_amount)
                                {
                                    status='<span class="badge badge-danger mb-2">Partial Paid</span>';
                                }
                                else if(response.data.paid_amount==response.data.premium_amount)
                                {
                                    status='<span class="badge badge-success">Full Paid</span>';
                                }
                                pay_now='<a href="/policypayments/'+response.data.policy_category_id+'/'+response.data.id+'"><button class="btn btn-danger btn-xs" data-id="'+response.data.id+'"><i class="fas fa-wallet"></i> Pay Now</button></a>';
                                purchase_card='<a href="/purchase_cards/'+response.data.policy_category_id+'/'+response.data.id+'"><button class="btn btn-dark btn-xs" data-id="'+response.data.id+'"><i class="fa fa-archive"></i> Purchase Card</button></a>';
                                var newRow = table.row.add([
                                    lastRowNumber,                         
                                    response.data.policy_category, 
                                    response.data.name, 
                                    response.data.primary_number, 
                                    response.data.premium_amount, 
                                    response.data.customer_premium_amount,
                                    response.data.paid_amount,
                                    response.data.due_amount,   
                                    status,   
                                    pay_now,
                                    purchase_card,
                                    '<a href="/otherPolicyDoc/'+response.data.id+'" class="btn btn-primary btn-xs">Documents</a>',                                   
                                    '<a href="/otherPolicyRenew/'+response.data.id+'" class="btn btn-secondary btn-xs">Renew</a>', 
                                    '<i class="fa fa-edit edit_otherpolicies" data-rowid="'+ lastRowNumber +'" data-id="' + response.data.id + '" data-bs-toggle="modal" data-bs-target="#EditModal"></i>' +
                                    '<i class="fa fa-trash delete_otherpolicies" data-rowid="'+ lastRowNumber +'" data-id="' + response.data.id + '"></i>', 
                                    policy_mode,                                                                                                          
                                    response.data.secondary_number,                                    
                                    response.data.start_date,
                                    response.data.expiry_date,                                    
                                    response.data.sum_insured,                                    
                                    response.data.user_id,                                    
                                    response.data.referred,                                    
                                    response.data.provider,                                     
                                    response.data.note,
                                    response.data.created_user,
                                    response.data.created_date
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
                                $('#edit_start_date').val(response.data.start_date);
                                $('#edit_expiry_date').val(response.data.expiry_date);
                                $('#edit_premium_amount').val(response.data.premium_amount);
                                $('#edit_customer_premium_amount').val(response.data.customer_premium_amount);
                                $('#edit_sum_insured').val(response.data.sum_insured);
                                $('#edit_term').val(response.data.term);
                                $('#edit_executive_id').val(response.data.executive_id);
                                $('#edit_status').val(response.data.status);
                                $('#edit_referred_id').val(response.data.referred_id).selectpicker('refresh');
                                $('#edit_provider_id').val(response.data.provider_id);
                                $('#edit_note').val(response.data.note);
                                $('#edit_policy_mode').val(response.data.policy_mode);           
                            
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
                                $('.selectpicker').selectpicker('refresh');
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
                                var status='';
                                var policy_mode='';
                                var purchase_card='';
                                var pay_now='';
                                if(response.data.policy_mode==1)
                                {
                                    policy_mode='<span class="badge badge-success">New</span>';
                                }
                                else if(response.data.policy_mode==2)
                                {
                                    policy_mode='<span class="badge badge-secondary">Renewal</span>';
                                }
                                if(response.data.paid_amount==0)
                                {
                                    status='<span class="badge badge-warning mb-2">Not Paid</span>';
                                }
                                else if(response.data.paid_amount!=0 && response.data.premium_amount != response.data.paid_amount)
                                {
                                    status='<span class="badge badge-danger mb-2">Partial Paid</span>';
                                }
                                else if(response.data.paid_amount == response.data.premium_amount)
                                {
                                    status='<span class="badge badge-success">Full Paid</span>';
                                }
                                pay_now='<a href="/policypayments/'+response.data.policy_category_id+'/'+response.data.id+'"><button class="btn btn-danger btn-xs" data-id="'+response.data.id+'"><i class="fas fa-wallet"></i> Pay Now</button></a>';
                                purchase_card='<a href="/purchase_cards/'+response.data.policy_category_id+'/'+response.data.id+'"><button class="btn btn-dark btn-xs" data-id="'+response.data.id+'"><i class="fa fa-archive"></i> Purchase Card</button></a>';
                                row.data([
                                    rowId,                        
                                    response.data.policy_category, 
                                    response.data.name, 
                                    response.data.primary_number,   
                                    response.data.premium_amount,  
                                    response.data.customer_premium_amount,
                                    response.data.paid_amount,
                                    response.data.due_amount,
                                    status,    
                                    pay_now,
                                    purchase_card,
                                    '<a href="/otherPolicyDoc/'+response.data.id+'" class="btn btn-primary btn-xs">Documents</a>',                                   
                                    '<a href="/otherPolicyRenew/'+response.data.id+'" class="btn btn-secondary btn-xs">Renew</a>',  
                                    '<i class="fa fa-edit edit_otherpolicies" data-rowid="'+ rowId +'" data-id="' + response.data.id + '" data-bs-toggle="modal" data-bs-target="#EditModal"></i>' +
                                    '<i class="fa fa-trash delete_otherpolicies" data-rowid="'+ rowId +'" data-id="' + response.data.id + '"></i>',  
                                    policy_mode,                                                                                                
                                    response.data.secondary_number,  
                                    response.data.start_date,                                  
                                    response.data.expiry_date,                                    
                                    response.data.sum_insured,                                    
                                    response.data.user_id,                                    
                                    response.data.referred,   
                                    response.data.provider,    
                                    response.data.note,
                                    response.data.created_user.name || 'N/A',
                                    response.data.created_date
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
        <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.14.0-beta2/dist/js/bootstrap-select.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/ajax-bootstrap-select@1.4.4/dist/js/ajax-bootstrap-select.min.js"></script>
        <script>
            document.getElementById('openReferrenceModal').addEventListener('click', function () 
            {
                const secondModal = new bootstrap.Modal(document.getElementById('CreateReferencemodel'));
                secondModal.show();
                document.getElementById('CreateModal').classList.add('show');
                document.getElementById('CreateModal').style.display = 'block';
            });
        </script>
        <script>
             function getreference_persons()
            {
                $('#referred_id').empty();
                $.ajax({
                    url: "{{ route('referredPersons') }}",
                    type: 'POST',
                    data: { "_token": "{{ csrf_token() }}"
                        },
                    success: function(response) {
                        $('#referred_id').append('<option value="">Select One</option>');
                        $.each(response, function(index, reference) {
                            $('#referred_id').append('<option value="' + reference.id + '">' + reference.name + '</option>');
                        });
                        $('#referred_id').selectpicker('refresh'); 
                    }
                });
            }
            $('#create_reference_form').submit(function(event) 
            {
                event.preventDefault();
                var formData = new FormData($(this)[0]); 
                $.ajax({
                    url: "{{route('referredPerson.store')}}",
                    method: "POST",
                    data: formData,
                    contentType: false, 
                    processData: false,
                    success: function(response) {
                        if (response.success) 
                        {
                            $('#CreateReferencemodel').modal('hide');
                            $('#create_reference_form')[0].reset();
                            swal("Good job!", response.message, {
                                icon: "success",
                                buttons: {
                                    confirm: {
                                    className: "btn btn-success",
                                    },
                                },
                            });
                            getreference_persons();
                        } 
                        else 
                        {
                            alert( response.message);
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error('AJAX error:', error);
                    }
                });
            });
        </script>
        <script>
            $(document).ready(function(){
                $(".selectpicker").selectpicker({
                });
            });
        </script>
        <script>
            $(document).on("change", "#add_start_date", function() {
                var startDate = new Date($(this).val());
                var expiryDate = new Date(startDate);
                expiryDate.setFullYear(expiryDate.getFullYear() + 1);
                var formattedDate = expiryDate.getFullYear() + 
                                "-" + (expiryDate.getMonth() + 1 < 10 ? '0' + (expiryDate.getMonth() + 1) : expiryDate.getMonth() + 1) + 
                                "-" + (expiryDate.getDate() < 10 ? '0' + expiryDate.getDate() : expiryDate.getDate());
                $('#add_expiry_date').val(formattedDate);
            });
            $(document).on("change", "#edit_start_date", function() {
                var startDate = new Date($(this).val());
                var expiryDate = new Date(startDate);
                expiryDate.setFullYear(expiryDate.getFullYear() + 1);
                var formattedDate = expiryDate.getFullYear() + 
                                "-" + (expiryDate.getMonth() + 1 < 10 ? '0' + (expiryDate.getMonth() + 1) : expiryDate.getMonth() + 1) + 
                                "-" + (expiryDate.getDate() < 10 ? '0' + expiryDate.getDate() : expiryDate.getDate());
                $('#edit_expiry_date').val(formattedDate);
            });
        </script>
    @endpush
</x-admin1-layout>