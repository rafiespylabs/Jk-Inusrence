@php 
use App\Models\Tbl_healthpolicy_renews; 
@endphp
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
                            <table id="healthpolicies-datatable" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>Sl No</th>
                                        <th>Policy Category</th>  
                                        <th>Policy Type</th>
                                        <th>Company</th>
                                        <th>Name</th>
                                        <th>Primary Number</th>
                                        <th>Premium Amount</th>
                                        <th>Customer Paid Premium Amount</th>
                                        <th>Paid Amount</th>
                                        <th>Due Amount</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                        <th>Birth Date</th>
                                        <th>Age</th>
                                        <th>Height</th>
                                        <th>Weight</th>
                                        <th>Secondary Number</th>
                                        <th>Start Date</th>
                                        <th>Expiry Date</th>
                                        <th>Sum Insured</th>
                                        <th>Nominee Name</th>
                                        <th>Nominee Relation</th>
                                        <th>Executive</th>
                                        <th>Reference Perosn</th>
                                        <th>Insurance Provider</th>
                                        <th>Note</th>
                                        <th>Created By</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php 
                                        $i = 1; 
                                    @endphp
                                    @foreach ($healthpolicies as $healthpolicy)
                                        @php 
                                            $renew_created_by=Tbl_healthpolicy_renews::with('added_user')->where('healthpolicy_id',$healthpolicy->id)->first();
                                            $created_by=$renew_created_by->added_user->name ?? "";
                                        @endphp
                                        <tr id="row{{ $healthpolicy->id }}">
                                            <td>{{ $i }}</td>
                                            <td>{{ $healthpolicy->policy_category->policy_category ?? 'N/A' }}</td>
                                            <td>                                               
                                                @switch($healthpolicy->type)
                                                    @case(1) Family @break
                                                    @case(2) Individual @break
                                                    @case(3) Group (Company) @break
                                                    @case(4) Top-Up @break
                                                @endswitch
                                            </td>
                                            <td>{{ $healthpolicy->company->company ?? 'N/A' }}</td>
                                            <td>{{ $healthpolicy->name}}</td>
                                            <td>{{ $healthpolicy->primary_number}}</td>
                                            <td>{{ $healthpolicy->premium_amount}}</td>
                                            <td>{{ $healthpolicy->customer_premium_amount}}</td>
                                            <td>{{ $healthpolicy->paid_amount }}</td>
                                            <td>{{ $healthpolicy->due_amount }}</td>
                                            <td>
                                                @if($healthpolicy->paid_amount==0)
                                                <span class="badge badge-warning mb-2">Not Paid</span>
                                                <a href="/policypayments/1/{{$healthpolicy->id}}"><button class="btn btn-danger btn-xs" data-id="{{$healthpolicy->id}}"><i class="fas fa-wallet"></i> Pay Now</button></a>
                                                @elseif($healthpolicy->paid_amount!=0 &&  $healthpolicy->premium_amount != $healthpolicy->paid_amount)
                                                <span class="badge badge-danger mb-2">Partial Paid</span>
                                                <a href="/policypayments/1/{{$healthpolicy->id}}"><button class="btn btn-danger btn-xs" data-id="{{$healthpolicy->id}}"><i class="fas fa-wallet"></i> Pay Now</button></a>
                                                @elseif($healthpolicy->paid_amount==$healthpolicy->premium_amount)
                                                <span class="badge badge-success">Full Paid</span>
                                                @endif
                                            </td>
                                            <td>
                                                <div class="btn-group dropdown">
                                                    <button class="btn btn-primary btn-xs dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false" fdprocessedid="oolj6">Actions</button>
                                                    <ul class="dropdown-menu" role="menu" style="">
                                                        <li>
                                                            <a class="dropdown-item edit_healthpolicies" href="#" data-id="{{ $healthpolicy->id }}" data-rowid="{{ $i }}" data-bs-toggle="modal" data-bs-target="#EditModal">
                                                                <i class="fa fa-edit"> Edit
                                                                </i>
                                                            </a>
                                                            <a class="dropdown-item view_healthpolicy" href="#" data-id="{{ $healthpolicy->id }}" data-bs-toggle="modal" data-bs-target="#ViewModal">
                                                                <i class="fa fa-eye"> View
                                                                </i>
                                                            </a>
                                                            @if( $healthpolicy->type==1)
                                                                <a href="{{route('healthPolicyMembers',$healthpolicy->id)}}" class="dropdown-item"> <i class="fa fa-plus"></i>Add Members</a>
                                                            @endif 
                                                            <a href="{{route('healthPolicyDocs',$healthpolicy->id)}}" class="dropdown-item"><i class="fa fa-file"></i> Documents</a>
                                                            <a href="{{route('healthPolicyRenew',$healthpolicy->id)}}" class="dropdown-item"><i class="fa fa-sync"></i> Renew</a>
                                                            <a class="dropdown-item delete_healthpolicies" href="#" data-id="{{ $healthpolicy->id }}" data-rowid="{{ $i }}">
                                                                <i class="fa fa-trash"></i> Delete
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </td>
                                            <td>{{ $healthpolicy->birth_date}}</td>
                                            <td>{{ $healthpolicy->age}}</td>
                                            <td>{{ $healthpolicy->height}}</td>
                                            <td>{{ $healthpolicy->weight}}</td>
                                            <td>{{ $healthpolicy->secondary_number}}</td>
                                            <td>{{ $healthpolicy->start_date}}</td>
                                            <td>{{ $healthpolicy->expiry_date}}</td>
                                            <td>{{ $healthpolicy->sum_insured}}</td>
                                            <td>{{ $healthpolicy->nominee_name}}</td>
                                            <td>{{ $healthpolicy->nominee_relation}}</td>
                                            <td>{{ $healthpolicy->executive->user->name ?? 'N/A' }}</td>
                                            <td>{{ $healthpolicy->referred->name ?? 'N/A' }}</td>                                            
                                            <td>{{ $healthpolicy->provider->provider_name ?? 'N/A' }}</td>                                                                                           
                                            <td>{{ $healthpolicy->note }}</td>  
                                            <td>{{$created_by}}</td>   
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
                    <h5 class="modal-title">Create Health Policy</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="create_healthpolicies_form" class="form">
                        @csrf
                        <div class="row form-group">
                            <div class="col-md-4">
                                <label for="policy_category">Policy Category</label>
                                <select name="policy_category_id" id="policy_category_id" class="form-control" required>
                                        <option value="1">Health Policy</option>
                                </select>
                            </div>   
                            <div class="col-md-4">
                                <label for="type" class="form-label">Policy Type <span>*</span></label>
                                <select name="type" id="type" class="form-control" required>
                                    <option value="">Select One</option>
                                    <option value="1" {{ isset($policy) && $policy->type == 1 ? 'selected' : '' }}>Family</option>
                                    <option value="2" {{ isset($policy) && $policy->type == 2 ? 'selected' : '' }}>Individual</option>
                                    <option value="3" {{ isset($policy) && $policy->type == 3 ? 'selected' : '' }}>Group (Company)</option>
                                    <option value="4" {{ isset($policy) && $policy->type == 4 ? 'selected' : '' }}>Top-Up</option>
                                </select>
                            </div>
                            <div class="col-md-4" id="company_div" style="display:none;">
                                <label for="company">Company <span>*</span></label>
                                <div class="input-group">
                                    <select name="company_id" id="company_id" class="form-control  selectpicker with-ajax" data-live-search="true">
                                            <option value="">Select One</option>
                                        @foreach ($company as $com)
                                            <option value="{{ $com->id }}">{{ $com->company }}</option>
                                        @endforeach
                                    </select>
                                    <div class="input-group-append">
                                        <button type="button" class="btn btn-info" id="openCompanyModal"><i class="fa fa-plus" aria-hidden="true"></i></button>
                                    </div>
                                </div>
                            </div>    
                        </div>
                        <div class="row form-group">
                            <div class="col-md-4">
                                <label for="name">Name <span>*</span></label>
                                <input type="text" name="name" id="name" class="form-control" required>
                            </div>
                            <div class="col-md-4">
                                <label for="birth_date">Birth Date <span>*</span></label>
                                <input type="date" name="birth_date" id="birth_date" class="form-control" required>
                            </div>
                            <div class="col-md-4">
                                <label for="age">Age</label>
                                <input type="number" step="any" name="age" id="age" class="form-control" readonly>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-md-3">
                                <label for="height">Height <span>*</span></label>
                                <input type="number" name="height" id="height" class="form-control" required>
                            </div>
                            <div class="col-md-3">
                                <label for="weight">Weight <span>*</span></label>
                                <input type="number" name="weight" id="weight" class="form-control" required>
                            </div>
                            <div class="col-md-3">
                                <label for="primary_number">Primary Number </label>
                                <input type="text" name="primary_number" id="primary_number" pattern="[0-9]{10}" 
                                title="Phone number must be 10 digits" class="form-control">
                            </div>
                            <div class="col-md-3">
                                <label for="secondary_number">Secondary Number</label>
                                <input type="text" name="secondary_number" id="secondary_number" pattern="[0-9]{10}" 
                                title="Phone number must be 10 digits" class="form-control">
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-md-4">
                                <label for="term">Term</label><br>
                                <div class="form-check">
                                    <input type="radio" name="term" id="term_1year" value="1year" class="form-check-input" checked>
                                    <label for="term_1year" class="form-check-label">1 Year</label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label for="expiry_date">Start Date <span>*</span></label>
                                <input type="date" name="start_date" id="add_start_date" class="form-control" required>
                            </div>
                            <div class="col-md-4">
                                <label for="expiry_date">Expiry Date <span>*</span></label>
                                <input type="date" name="expiry_date" id="add_expiry_date" class="form-control" required>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-md-4">
                                <label for="premium_amount">Premium Amount <span>*</span></label>
                                <input type="number" name="premium_amount" id="premium_amount" class="form-control" required>
                            </div>
                            <div class="col-md-4">
                                <label for="premium_amount">Customer Paid Premium Amount </label>
                                <input type="number" step="any" name="customer_premium_amount" id="customer_premium_amount" class="form-control">
                            </div>
                            <div class="col-md-4">
                                <label for="sum_insured">Sum Insured <span>*</span></label>
                                <input type="number" name="sum_insured" id="sum_insured" class="form-control" required>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-md-4">
                                <label for="nominee_name">Nominee Name</label>
                                <input type="text" name="nominee_name" id="nominee_name" class="form-control" >
                            </div>
                            <div class="col-md-4">
                                <label for="nominee_relation">Nominee Relation</label>
                                <input type="text" name="nominee_relation" id="nominee_relation" class="form-control">
                            </div>
                            <div class="col-md-4">
                                <label for="executive">Executive <span>*</span></label>
                                <select name="executive_id" id="executive_id" class="form-control" required>
                                        <option value="">Select One</option>
                                    @foreach ($executive as $exe)
                                        <option value="{{ $exe->user_id }}">{{ $exe->user->name }}</option>
                                    @endforeach
                                </select>
                            </div>  
                        </div>
                        <div class="row form-group">
                            <div class="col-md-4">
                                <label for="status" class="form-label">Status </label>
                                <select name="status" id="status" class="form-control">
                                    <option value="">Select One</option>
                                    <option value="0" {{ isset($policy) && $policy->status == 0 ? 'selected' : '' }}>Not Paid</option>
                                    <option value="1" {{ isset($policy) && $policy->status == 1 ? 'selected' : '' }}>Paid</option>
                                </select>
                            </div>   
                            <div class="col-md-4">
                                <label>C/O Person <span>*</span></label>
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
                            <div class="col-md-4">
                                <label for="provider">Insurance Provider <span>*</span></label>
                                <select name="provider_id" id="provider_id" class="form-control" required>
                                    <option value="">Select One</option>
                                    @foreach ($provider as $prov)
                                        <option value="{{ $prov->id }}">{{ $prov->provider_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-md-4">
                                <label for="note">Note</label>
                                <textarea name="note" id="note" class="form-control"></textarea>
                            </div>
                            <div class="col-md-4">
                                <label for="executive">Prepared User</label>
                                <select name="prepared_user_id" id="prepared_user_id" class="form-control">
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
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Health Policy</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="edit_healthpolicies_form" class="form">
                        @csrf
                        <input type="hidden" name="rowid" id="row_id">
                        <input type="hidden" name="id" id="healthpolicies_id">  
                        <input type="hidden" name="policy_category_id" id="edit_policy_category_id">  
                        <input type="hidden" name="type" id="edit_type">  
                        <div class="row form-group">
                            <!-- <div class="col-md-4">
                                <label for="policy_category">Policy Category</label>
                                <select name="policy_category_id" id="edit_policy_category_id" class="form-control" required>
                                        <option value="1">Health Policy</option>
                                </select>
                            </div>                            
                            <div class="col-md-4">
                                <label for="type" class="form-label">Policy Type</label>
                                <select name="type" id="edit_type" class="form-control" required>
                                    <option value="1" {{ isset($policy) && $policy->type == 1 ? 'selected' : '' }}>Family</option>
                                    <option value="2" {{ isset($policy) && $policy->type == 2 ? 'selected' : '' }}>Individual</option>
                                    <option value="3" {{ isset($policy) && $policy->type == 3 ? 'selected' : '' }}>Group (Company)</option>
                                    <option value="4" {{ isset($policy) && $policy->type == 4 ? 'selected' : '' }}>Top-Up</option>
                                </select>
                            </div> -->
                            <div class="col-md-4" id="edit_company_div">
                                <label for="company">Company</label>
                                <select name="company_id" id="edit_company_id" class="form-control">
                                    <option value="">Select One</option>
                                    @foreach ($company as $com)
                                        <option value="{{ $com->id }}">{{ $com->company }}</option>
                                    @endforeach
                                </select>
                            </div>    
                        </div> 
                        <div class="row form-group">
                            <div class="col-md-4">
                                <label for="name">Name</label>
                                <input type="text" name="name" id="edit_name" class="form-control" required>
                            </div>
                            <div class="col-md-4">
                                <label for="birth_date">Birth Date</label>
                                <input type="date" name="birth_date" id="edit_birth_date" class="form-control" required>
                            </div>
                            <div class="col-md-4">
                                <label for="height">Height</label>
                                <input type="number" name="height" id="edit_height" class="form-control" required>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-md-4">
                                <label for="weight">Weight</label>
                                <input type="number" name="weight" id="edit_weight" class="form-control" required>
                            </div>
                            <div class="col-md-4">
                                <label for="primary_number">Primary Number</label>
                                <input type="text" name="primary_number" id="edit_primary_number" pattern="[0-9]{10}" 
                                title="Phone number must be 10 digits" class="form-control">
                            </div>
                            <div class="col-md-4">
                                <label for="secondary_number">Secondary Number</label>
                                <input type="text" name="secondary_number" id="edit_secondary_number" pattern="[0-9]{10}" 
                                title="Phone number must be 10 digits" class="form-control">
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-md-4">
                                <label for="expiry_date">Expiry Date</label>
                                <input type="date" name="expiry_date" id="edit_expiry_date" class="form-control" required>
                            </div>
                            <div class="col-md-4">
                                <label for="premium_amount">Premium Amount</label>
                                <input type="number" name="premium_amount" id="edit_premium_amount" class="form-control" required>
                            </div>
                            <div class="col-md-4">
                                <label for="premium_amount">Customer Paid Premium Amount</label>
                                <input type="number" step="any" name="customer_premium_amount" id="edit_customer_premium_amount" class="form-control">
                            </div>
                            <div class="col-md-4">
                                <label for="sum_insured">Sum Insured</label>
                                <input type="number" name="sum_insured" id="edit_sum_insured" class="form-control" required>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-md-4">
                                <label for="term">Term</label>
                                <div class="form-check">
                                    <input type="radio" name="term" id="edit_term_1year" value="1year" class="form-check-input" checked>
                                    <label for="term_1year" class="form-check-label">1 Year</label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label for="nominee_name">Nominee Name</label>
                                <input type="text" name="nominee_name" id="edit_nominee_name" class="form-control">
                            </div>
                            <div class="col-md-4">
                                <label for="nominee_relation">Nominee Relation</label>
                                <input type="text" name="nominee_relation" id="edit_nominee_relation" class="form-control">
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-md-4">
                                <label for="executive">Executive</label>
                                <select name="executive_id" id="edit_executive_id" class="form-control" required>
                                    <option value="">Select One</option>
                                    @foreach ($executive as $exe)
                                        <option value="{{ $exe->user_id }}">{{ $exe->user->name }}</option>
                                    @endforeach
                                </select>
                            </div>  
                            <div class="col-md-4">
                                <label for="status" class="form-label">Status</label>
                                <select name="status" id="edit_status" class="form-control">
                                    <option value="">Select One</option>
                                    <option value="0" {{ isset($policy) && $policy->status == 0 ? 'selected' : '' }}>Not Paid</option>
                                    <option value="1" {{ isset($policy) && $policy->status == 1 ? 'selected' : '' }}>Paid</option>
                                </select>
                            </div> 
                            <div class="col-md-4">
                                <label for="referred">C/O Perosn</label>
                                <select name="referred_id" id="edit_referred_id" class="form-control" required>
                                    <option value="">Select One</option>
                                    @foreach ($referred as $ref)
                                        <option value="{{ $ref->id }}">{{ $ref->name }}</option>
                                    @endforeach
                                </select>
                            </div>     
                        </div> 
                        <div class="row form-group">
                            <div class="col-md-4">
                                <label for="provider">Insurance Provider</label>
                                <select name="provider_id" id="edit_provider_id" class="form-control" required>
                                    <option value="">Select One</option>
                                    @foreach ($provider as $prov)
                                        <option value="{{ $prov->id }}">{{ $prov->provider_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label for="note">Note</label>
                                <textarea name="note" id="edit_note" class="form-control"></textarea>
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
    <!-- View Modal -->
    <div class="modal fade" id="ViewModal" tabindex="-1" role="dialog" aria-labelledby="ViewModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">View  Health Policy</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="card card-stats card-round">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-6 col-md-3">
                                    <h5>Company</h5>
                                    <p id="hpolicy_company"></p>
                                </div>
                                <div class="col-sm-6 col-md-3">
                                    <h5>Name</h5>
                                    <p id="hpolicy_name"></p>
                                </div>
                                <div class="col-sm-6 col-md-3">
                                    <h5>Birth Date</h5>
                                    <p id="hpolicy_birth_date"></p>
                                </div>
                                <div class="col-sm-6 col-md-3">
                                    <h5>Age </h5>
                                    <p id="hpolicy_age"></p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6 col-md-3">
                                    <h5>Height</h5>
                                    <p id="hpolicy_height"></p>
                                </div>
                                <div class="col-sm-6 col-md-3">
                                    <h5>Weight</h5>
                                    <p id="hpolicy_weight"></p>
                                </div>
                                <div class="col-sm-6 col-md-3">
                                    <h5>Primary Number</h5>
                                    <p id="hpolicy_primary_number"></p>
                                </div>
                                <div class="col-sm-6 col-md-3">
                                    <h5>Secondary Number </h5>
                                    <p id="hpolicy_secondary_number"></p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6 col-md-3">
                                    <h5>Start Date</h5>
                                    <p id="hpolicy_start_date"></p>
                                </div>
                                <div class="col-sm-6 col-md-3">
                                    <h5>Expiry Date</h5>
                                    <p id="hpolicy_expiry_date"></p>
                                </div>
                                <div class="col-sm-6 col-md-3">
                                    <h5>Premium Amount</h5>
                                    <p id="hpolicy_premium_amount"></p>
                                </div>
                                <div class="col-sm-6 col-md-3">
                                    <h5>Sum Insured </h5>
                                    <p id="hpolicy_sum_insured"></p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6 col-md-3">
                                    <h5>Nominee Name</h5>
                                    <p id="hpolicy_nominee_name"></p>
                                </div>
                                <div class="col-sm-6 col-md-3">
                                    <h5>Nominee Relation</h5>
                                    <p id="hpolicy_relation"></p>
                                </div>
                                <div class="col-sm-6 col-md-3">
                                    <h5>Created By</h5>
                                    <p id="hpolicy_created_by"></p>
                                </div>
                                <div class="col-sm-6 col-md-3">
                                    <h5>Created Date </h5>
                                    <p id="hpolicy_created_date"></p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6 col-md-3">
                                    <h5>Edited By</h5>
                                    <p id="hpolicy_edited_by"></p>
                                </div>
                                <div class="col-sm-6 col-md-3">
                                    <h5>Edited Date</h5>
                                    <p id="hpolicy_edited_date"></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-actions form-group">
                        <button type="submit" class="btn btn-primary btn-sm">Submit</button>
                        <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Cancel</button>
                    </div>
                </div>
            </div>
        </div>
    </div>    
    <!-- View Modal -->
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
 <!-- Create Company  Modal -->
<div class="modal fade" id="CreateCompanymodel" tabindex="-1" role="dialog" aria-labelledby="CreateCompanymodelLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Create Company</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
              <form id="create_company_form" class="form" enctype="multipart/form-data">
              @csrf
                <div class="row form-group">
                    <div class="col-4">
                        <label>Company<span>*</span></label>
                        <input type="text"  name="company" class="form-control" required>
                    </div>
                    <div class="col-4">
                        <label>Phone Number</label>
                        <input type="text"  name="phone" class="form-control">
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
<!-- Create Company  Modal -->
    @push('scripts')
        <script>
            $(document).ready(function() {
                $('#healthpolicies-datatable').DataTable();
                $('#create_healthpolicies_form').submit(function(event) {
                    event.preventDefault(); 
                    var formData = new FormData($(this)[0]);  
                    $.ajax({
                        url: "{{ route('healthpolicies.store') }}",  
                        method: "POST",
                        data: formData,
                        contentType: false,  
                        processData: false,  
                        success: function(response) {
                            if (response.success) {
                                $('#CreateModal').modal('hide');  
                                $('#create_healthpolicies_form')[0].reset(); 
                                $('.selectpicker').selectpicker('refresh');
                                swal("Success!", response.message, {
                                    icon: "success",
                                    buttons: {
                                        confirm: {
                                            className: "btn btn-success",
                                        },
                                    },
                                });

                                var table = $('#healthpolicies-datatable').DataTable();
                                var addMembers='';
                                var status=''; 
                                if(response.data.type==1)
                                {
                                    addMembers='<a href="/healthPolicyMembers/"'+response.data.id+'" class="dropdown-item"> <i class="fa fa-plus"></i>Add Members</a>';
                                }
                                if(response.data.paid_amount==0)
                                {
                                    status='<span class="badge badge-warning mb-2">Not Paid</span>';
                                    status+='<a href="/policypayments/1/'+response.data.id+'"><button class="btn btn-danger btn-xs" data-id="'+response.data.id+'"><i class="fas fa-wallet"></i> Pay Now</button></a>';
                                }
                                else if(response.data.paid_amount!=0 && response.data.premium_amount != response.data.paid_amount)
                                {
                                    status='<span class="badge badge-danger mb-2">Partial Paid</span>';
                                    status+='<a href="/policypayments/1/'+response.data.id+'"><button class="btn btn-danger btn-xs" data-id="'+response.data.id+'"><i class="fas fa-wallet"></i> Pay Now</button></a>';
                                }
                                else if(response.data.paid_amount==response.data.premium_amount)
                                {
                                    status='<span class="badge badge-success">Full Paid</span>';
                                }
                                var type='';
                                if(response.data.type==1)
                                {
                                  type='family';
                                }
                                else if(response.data.type==2)
                                {
                                    type='individual';
                                }
                                else if(response.data.type==3)
                                {
                                    type='group(company)';
                                }
                                else if(response.data.type==4)
                                {
                                    type='Topup';
                                }
                                var lastRowNumber = table.data().count() > 0 ? parseInt(table.row(':last').data()[0]) + 1 : 0;
                                var newRow = table.row.add([
                                    lastRowNumber,  
                                    response.data.policy_category,                        
                                    type, 
                                    response.data.company, 
                                    response.data.name, 
                                    response.data.primary_number,                                    
                                    response.data.premium_amount,
                                    response.data.customer_premium_amount,
                                    response.data.paid_amount,
                                    response.data.due_amount,
                                    status,  
                                    '<div class="btn-group dropdown">'+
                                        '<button class="btn btn-primary btn-xs dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false" fdprocessedid="oolj6">Actions</button>'+
                                        '<ul class="dropdown-menu" role="menu">'+
                                            '<li>'+
                                                '<a class="dropdown-item" href="#">'+
                                                    '<i class="fa fa-edit edit_healthpolicies" data-id="'+response.data.id+'"  data-rowid="'+ lastRowNumber +'" data-bs-toggle="modal" data-bs-target="#EditModal">'+
                                                     'Edit'+
                                                    '</i>'+
                                                '</a>'+
                                                '<a class="dropdown-item view_healthpolicy" href="#" data-id="'+response.data.id+'" data-bs-toggle="modal" data-bs-target="#ViewModal">'+
                                                    '<i class="fa fa-eye"> View'+
                                                    '</i>'+
                                                '</a>'+
                                                addMembers+
                                                '<a href="/healthPolicyDocs/'+response.data.id+'" class="dropdown-item"><i class="fa fa-file"></i> Documents</a>'+
                                                '<a href="/healthPolicyRenew'+response.data.id+'" class="dropdown-item"><i class="fa fa-sync"></i> Renew</a>'+
                                                '<a class="dropdown-item" href="#">'+
                                                    '<i class="fa fa-trash delete_healthpolicies"'+
                                                    'data-id="'+response.data.id+'" data-rowid="'+ lastRowNumber +'"></i> Delete'+
                                                '</a>'+
                                            '</li>'+
                                        '</ul>'+
                                    '</div>',                                                                      
                                    response.data.birth_date, 
                                    response.data.age, 
                                    response.data.height, 
                                    response.data.weight, 
                                    response.data.secondary_number,                                    
                                    response.data.start_date, 
                                    response.data.expiry_date,                                    
                                    response.data.sum_insured,                                    
                                    response.data.nominee_name,                                    
                                    response.data.nominee_relation,                                    
                                    response.data.user_id,                                    
                                    response.data.referred,                                    
                                    response.data.provider,  
                                    response.data.note,                                                                     
                                    response.data.created_user
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
                $(document).on("click", ".edit_healthpolicies", function() {
                    var healthpolicies_id = $(this).data('id');
                    var row_id = $(this).data('rowid');   
                    var policy_category_id = $(this).data('policy_category_id');                     
                    var executive_id = $(this).data('executive_id');
                    var referred_id = $(this).data('referred_id');
                    var provider_id = $(this).data('provider_id');
                    var company_id = $(this).data('company_id');                   
                    $('#healthpolicies_id').val(healthpolicies_id);
                    $('#row_id').val(row_id);
                    $('#policy_category_id').val(policy_category_id);
                    $('#executive_id').val(executive_id);
                    $('#referred_id').val(referred_id);
                    $('#provider_id').val(provider_id);
                    $('#company_id').val(company_id);   
                    $.ajax({
                        type: "POST",
                        url: "{{ route('healthpolicies.edit') }}",
                        data: {
                            "_token": "{{ csrf_token() }}",
                            "id": healthpolicies_id
                        },
                        success: function(response) {
                            if (response.success) {
                                $('#edit_policy_category_id').val(response.data.policy_category_id);
                                $('#edit_type').val(response.data.type);
                                $('#edit_name').val(response.data.name);
                                $('#edit_birth_date').val(response.data.birth_date);
                                $('#edit_height').val(response.data.height);
                                $('#edit_weight').val(response.data.weight);
                                if(response.data.type==3)
                                {
                                    $('#edit_company_div').show();
                                    $('#edit_company_id').val(response.data.company_id);
                                }
                                else
                                {
                                    $('#edit_company_div').hide();
                                    $('#edit_company_id').val('');
                                }
                                $('#edit_primary_number').val(response.data.primary_number);
                                $('#edit_secondary_number').val(response.data.secondary_number);
                                $('#edit_expiry_date').val(response.data.expiry_date);
                                $('#edit_premium_amount').val(response.data.premium_amount);
                                $('#edit_customer_premium_amount').val(response.data.customer_premium_amount);
                                $('#edit_sum_insured').val(response.data.sum_insured);
                                $('#edit_term').val(response.data.term);
                                $('#edit_nominee_name').val(response.data.nominee_name);
                                $('#edit_nominee_relation').val(response.data.nominee_relation);
                                $('#edit_executive_id').val(response.data.executive_id);
                                $('#edit_status').val(response.data.status);
                                $('#edit_referred_id').val(response.data.referred_id).selectpicker('refresh');
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
                $(document).on("click", ".view_healthpolicy", function() {
                    var healthpolicies_id = $(this).data('id');
                    var row_id = $(this).data('rowid');     
                    $.ajax({
                        type: "POST",
                        url: "{{ route('healthpolicies.edit') }}",
                        data: {
                            "_token": "{{ csrf_token() }}",
                            "id": healthpolicies_id
                        },
                        success: function(response) {
                            if (response.success) 
                            {             
                               $('#hpolicy_company').text(response.data.company);
                               $('#hpolicy_name').text(response.data.name);
                               $('#hpolicy_birth_date').text(response.data.birth_date);
                               $('#hpolicy_age').text(response.data.age);
                               $('#hpolicy_height').text(response.data.height);
                               $('#hpolicy_weight').text(response.data.weight);
                               $('#hpolicy_primary_number').text(response.data.primary_number);
                               $('#hpolicy_secondary_number').text(response.data.secondary_number);
                               $('#hpolicy_start_date').text(response.data.start_date);
                               $('#hpolicy_expiry_date').text(response.data.expiry_date);
                               $('#hpolicy_premium_amount').text(response.data.premium_amount);
                               $('#hpolicy_sum_insured').text(response.data.sum_insured);
                               $('#hpolicy_nominee_name').text(response.data.nominee_name);
                               $('#hpolicy_relation').text(response.data.nominee_relation);
                               $('#hpolicy_relation').text(response.data.nominee_relation);
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
                $('#edit_healthpolicies_form').submit(function(event) {
                    event.preventDefault(); 
                    var formData = new FormData($(this)[0]);
                    var rowId = $('#row_id').val();

                    $.ajax({
                        url: "{{ route('healthpolicies.update') }}", 
                        method: "POST", 
                        data: formData,
                        contentType: false, 
                        processData: false, 
                        success: function(response) {
                            if (response.success) {
                                $('#EditModal').modal('hide');
                                $('#edit_healthpolicies_form')[0].reset();
                                $('.selectpicker').selectpicker('refresh');
                                swal("Success!", "Health Policy Updated successfully", {
                                    icon: "success",
                                    buttons: {
                                        confirm: {
                                            className: "btn btn-success",
                                        },
                                    },
                                });
                                
                                var table = $('#healthpolicies-datatable').DataTable();
                                var type='';
                                var status='';
                                if(response.data.type==1)
                                {
                                    type='Family';
                                }
                                else if(response.data.type==2)
                                {
                                    type='Individual';
                                }
                                else if(response.data.type==3)
                                {
                                    type='Group (Company)';
                                }
                                else if(response.data.type==4)
                                {
                                    type='Top-Up';
                                }
                                if(response.data.paid_amount==0)
                                {
                                    status='<span class="badge badge-warning mb-2">Not Paid</span>';
                                    status+='<a href="/policypayments/1/'+response.data.id+'"><button class="btn btn-danger btn-xs" data-id="'+response.data.id+'"><i class="fas fa-wallet"></i> Pay Now</button></a>';
                                }
                                else if(response.data.paid_amount!=0 && response.data.premium_amount != response.data.paid_amount)
                                {
                                    status='<span class="badge badge-danger mb-2">Partial Paid</span>';
                                    status+='<a href="/policypayments/1/'+response.data.id+'"><button class="btn btn-danger btn-xs" data-id="'+response.data.id+'"><i class="fas fa-wallet"></i> Pay Now</button></a>';
                                }
                                else if(response.data.paid_amount == response.data.premium_amount)
                                {
                                    status='<span class="badge badge-success">Full Paid</span>';
                                }
                                var addMembers='';
                                if( response.data.type==1)
                                {
                                    addMembers='<a href="" class="btn btn-info btn-xs">Add Members</a>';
                                }   
                                var row = table.row('#row' + response.data.id); 
                                row.data([
                                    rowId,   
                                    response.data.policy_category,                      
                                    type, 
                                    response.data.company, 
                                    response.data.name, 
                                    response.data.primary_number,                                    
                                    response.data.premium_amount,  
                                    response.data.customer_premium_amount,  
                                    response.data.paid_amount,
                                    response.data.due_amount, 
                                    status,
                                    '<div class="btn-group dropdown">'+
                                        '<button class="btn btn-primary btn-xs dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false" fdprocessedid="oolj6">Actions</button>'+
                                        '<ul class="dropdown-menu" role="menu">'+
                                            '<li>'+
                                                '<a class="dropdown-item" href="#">'+
                                                    '<i class="fa fa-edit edit_healthpolicies" data-id="'+response.data.id+'"  data-rowid="'+ rowId +'" data-bs-toggle="modal" data-bs-target="#EditModal">'+
                                                     'Edit'+
                                                    '</i>'+
                                                '</a>'+
                                                addMembers+
                                                '<a href="/healthPolicyDocs/'+response.data.id+'" class="dropdown-item"><i class="fa fa-file"></i> Documents</a>'+
                                                '<a href="/healthPolicyRenew'+response.data.id+'" class="dropdown-item"><i class="fa fa-sync"></i> Renew</a>'+
                                                '<a class="dropdown-item" href="#">'+
                                                    '<i class="fa fa-trash delete_healthpolicies"'+
                                                    'data-id="'+response.data.id+'" data-rowid="'+ rowId +'"></i> Delete'+
                                                '</a>'+
                                            '</li>'+
                                        '</ul>'+
                                    '</div>',                                                                    
                                    response.data.birth_date, 
                                    response.data.age, 
                                    response.data.height, 
                                    response.data.weight, 
                                    response.data.secondary_number,
                                    response.data.start_date,                                       
                                    response.data.expiry_date,                                    
                                    response.data.sum_insured,                                    
                                    response.data.nominee_name,                                    
                                    response.data.nominee_relation,                                    
                                    response.data.user_id,                                    
                                    response.data.referred,   
                                    response.data.provider,                                 
                                    response.data.note, 
                                    response.data.created_user
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
                $(document).on('click', '.delete_healthpolicies', function () {
                    var healthpoliciesId = $(this).data('id'); 
                    var rowSelector = '#row' + healthpoliciesId; 

                    swal({
                        title: "Are you sure?",
                        text: "You won't be able to revert this!",
                        icon: "warning",
                        buttons: true,
                        dangerMode: true,
                    }).then((willDelete) => {
                        if (willDelete) {
                            $.ajax({
                                url: "{{ route('healthpolicies.destroy') }}", 
                                method: "POST",
                                data: {
                                    "_token": "{{ csrf_token() }}",
                                    "id": healthpoliciesId               
                                },
                                success: function (response) {
                                    if (response.success) {                       
                                        var table = $('#healthpolicies-datatable').DataTable();
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
            $(document).on("change", "#type", function() {
                var healthpolicy_type=$(this).val();
                if (healthpolicy_type == 3) 
                {
                    $('#company_div').show();
                    $('#company_id').prop('required', true);
                }
                else 
                {
                    $('#company_div').hide();
                    $('#company_id').prop('required', false);
                }
            });
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
            function calculateAge(birthDate) 
            {
                var birthDateObj = new Date(birthDate);
                var today = new Date();
                var age = today.getFullYear() - birthDateObj.getFullYear();
                if (today.getMonth() < birthDateObj.getMonth() || 
                    (today.getMonth() == birthDateObj.getMonth() && 
                    today.getDate() < birthDateObj.getDate())) {
                    age--;
                }
                return age;
            }
            $(document).on("change", "#birth_date", function() 
            {
                var birthDate = $(this).val(); 
                var age = calculateAge(birthDate);
                $("#age").val(age); 
            });
            $(document).on("change", "#add_start_date", function() {
                var startDate = new Date($(this).val());
                var expiryDate = new Date(startDate);
                expiryDate.setFullYear(expiryDate.getFullYear() + 1);
                var formattedDate = expiryDate.getFullYear() + 
                                "-" + (expiryDate.getMonth() + 1 < 10 ? '0' + (expiryDate.getMonth() + 1) : expiryDate.getMonth() + 1) + 
                                "-" + (expiryDate.getDate() < 10 ? '0' + expiryDate.getDate() : expiryDate.getDate());
                $('#add_expiry_date').val(formattedDate);
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
            document.getElementById('openCompanyModal').addEventListener('click', function () {
                const CompanyModal = new bootstrap.Modal(document.getElementById('CreateCompanymodel'));
                CompanyModal.show();
                document.getElementById('CreateModal').classList.add('show');
                document.getElementById('CreateModal').style.display = 'block';
            });
        </script>
        <script>
            $(document).ready(function(){
                $(".selectpicker").selectpicker({
                });
            });
        </script>
        <script>
        function getcompanies()
        {
            $('#company_id').empty();
            $.ajax({
                url: "{{ route('companies') }}",
                type: 'POST',
                data: { "_token": "{{ csrf_token() }}"},
                success: function(response) {
                    $('#company_id').append('<option value="">Select One</option>');
                    $.each(response, function(index, company) {
                        $('#company_id').append('<option value="' +company.id + '">' + company.company + '</option>');
                    });
                    $('#company_id').selectpicker('refresh'); 
                }
            });
        }
        $('#create_company_form').submit(function(event) 
        {
            event.preventDefault();
            var formData = new FormData($(this)[0]); 
            $.ajax({
                url: "{{route('companies.store')}}",
                method: "POST",
                data: formData,
                contentType: false, 
                processData: false,
                success: function(response) {
                    if (response.success) 
                    {
                        $('#CreateCompanymodel').modal('hide');
                        $('#create_company_form')[0].reset();
                        swal("Good job!", response.message, {
                            icon: "success",
                            buttons: {
                                confirm: {
                                className: "btn btn-success",
                                },
                            },
                        });
                        getcompanies();
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
    @endpush
</x-admin1-layout>