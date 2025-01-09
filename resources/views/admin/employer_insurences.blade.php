<x-admin1-layout>
@push('styles')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.14.0-beta2/dist/css/bootstrap-select.min.css">   
@endpush
<div class="page-inner">
    <div class="page-header">
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex align-items-center">
                        <h2>Employer Insurences</h2>
                        <button class="btn btn-primary btn-round ms-auto" data-bs-toggle="modal" data-bs-target="#CreateModal">
                        <i class="fa fa-plus"></i> Create</button>
                    </div>
                </div>
                <div class="card-body">
                    <div id="preloader" style="display:none;">
                        <img src="{{asset('web/preloader.gif')}}">
                    </div>
                    <div class="table-responsive">
                    <table id="employerinsurence-datatable" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                            <th>Sl No</th>
                            <th>Agent</th>
                            <th>Dealer</th>
                            <th>Name</th>
                            <th>Primary Number</th>
                            <th>Secondary Number</th>
                            <th>Expiry Date</th>
                            <th>Company</th>
                            <th>Premium</th>
                            <th>Valuation Amount</th>
                            <th>Total Cost</th>
                            <th>Payment Mode</th>
                            <th>Executive</th>
                            <th>Prepared Staff</th>
                            <th>Reference</th>
                            <th>Created Date</th>
                            <th>Payment</th>
                            <th>Documents</th>
                            <th>Assign</th>
                            <th>Assigned Date</th>
                            <th>Action</th>
                            </tr>
                        </thead>
                        <tbody id="employerinsurence_tbody">
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
              <form id="create_policyholder_form" class="form" enctype="multipart/form-data">
              @csrf
                <div class="row form-group">
                    <div class="col-3">
                        <input type="radio" name="policy_type"  class="policy_type" value="1"><label>Individual</label>
                    </div>
                    <div class="col-3">
                        <input type="radio" name="policy_type" class="policy_type" value="2"><label>Agent</label>
                    </div>
                    <div class="col-3">
                        <input type="radio" name="policy_type" class="policy_type" value="3"><label>Dealer</label>
                    </div>
                    <div class="col-3">
                        <input type="radio" name="policy_type" class="policy_type" value="4"><label>Company</label>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-4" id="agent_div" style="display:none;">
                        <label>Agent</label>
                        <select  name="agent_id" id="agent_field" class="form-control">
                            <option value="">Select One</option>
                            @foreach($agents as $agent)
                            <option value="{{$agent->id}}">{{$agent->agent_name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-4" id="dealer_div" style="display:none;">
                        <label>Dealer</label>
                        <select  name="dealer_id" id="dealer_field" class="form-control">
                            <option value="">Select One</option>
                            @foreach($dealers as $dealer)
                            <option value="{{$dealer->id}}">{{$dealer->dealer_name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-4"  id="company_div" style="display:none;">
                        <label>Company<span>*</span></label>
                        <select  name="company_id" id="company_field"class="form-control selectpicker with-ajax" data-live-search="true"required>
                            <option value="">Select One</option>
                            @foreach($companies as $company)
                            <option value="{{$company->id}}">{{$company->company}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-4">
                        <label>Name<span>*</span></label>
                        <input type="text"  name="name" class="form-control" required>
                    </div>
                    <div class="col-4">
                        <label>Primary Contact<span>*</span></label>
                        <input type="text"  name="primary_number" class="form-control" required>
                    </div>
                </div>
                <div class="row form-group">
                   <div class="col-4">
                        <label>Secondary Contact </label>
                        <input type="text"  name="secondary_number" class="form-control">
                    </div>
                    <div class="col-4">
                        <label>Expiry Date<span>*</span></label>
                        <input type="date"  name="expiry_date" class="form-control" required>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-4">
                        <label>Premium Amount<span>*</span></label>
                        <input type="text"  name="premium_amount" id="add_premium_amount"   class="form-control" required>
                    </div>
                    <div class="col-4">
                        <label>Valuation Amount</label>
                        <input type="text"  name="valuation_amount" id="add_valuation_amount" class="form-control">
                    </div>
                    <div class="col-4">
                        <label>Total Cost</label>
                        <input type="text"  name="total_cost" id="add_total_cost" value="0" readonly class="form-control">
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-4">
                        <label>Reference Person <span>*</span></label>
                        <select  name="referred_id" class="form-control selectpicker with-ajax" data-live-search="true" required>
                            <option value="">Select One</option>
                            @foreach($referred_persons as $reffred)
                            <option value="{{$reffred->id}}">{{$reffred->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-4">
                        <label>Buying Type</label>
                        <select  name="buying_type" class="form-control" id="add_buying_type" required>
                            <option value="1">Direct</option>
                            <option value="2">Broker</option>
                        </select>
                    </div>
                    <div class="col-4" id="broker_div" style="display:none;">
                        <label>Broker Name </label>
                        <input type="text"  name="broker_name" class="form-control">
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-4">
                        <label>Insurence Provider<span>*</span></label>
                        <select  name="provider_id" class="form-control" required>
                            <option value="">Select One</option>
                            @foreach($providers as $prov)
                            <option value="{{$prov->id}}">{{$prov->provider_name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-4">
                        <label>Payment Mode<span>*</span></label>
                        <select  name="payment_mode_id" class="form-control" required>
                            @foreach($payment_modes as $mode)
                            <option value="{{$mode->id}}">{{$mode->payment_mode}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-4">
                        <label>Executive<span>*</span></label>
                        <select  name="assigned_userid" id="assigned_userid" class="form-control" required>
                            <option value="">Select One</option>
                            @foreach($staffs as $staff)
                                <option value="{{$staff->user_id}}">{{$staff->user->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-4">
                        <label>Note</label>
                        <textarea name="note" class="form-control"></textarea>
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
 <!-- Create Modal -->
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
                <form id="update_policyholder_form" class="form" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="policyholder_id" id="policyholder_id" value="">
                    <div class="row form-group">
                        <div class="col-4">
                            <label>Company<span>*</span></label>
                            <select  name="company_id" class="form-control" id="company_id" required>
                                <option value="">Select One</option>
                                @foreach($companies as $company)
                                <option value="{{$company->id}}">{{$company->company}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-4">
                            <label>Name<span>*</span></label>
                            <input type="text"  name="name" id="name" class="form-control" required>
                        </div>
                        <div class="col-4">
                            <label>Primary Contact<span>*</span></label>
                            <input type="text"  name="primary_number" id="primary_number" class="form-control" required>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-4">
                            <label>Secondary Contact</label>
                            <input type="text"  name="secondary_number" id="secondary_number" class="form-control">
                        </div>
                        <div class="col-4">
                            <label>Expiry Date<span>*</span></label>
                            <input type="date"  name="expiry_date" id="expiry_date" class="form-control" required>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-4">
                            <label>Premium Amount<span>*</span></label>
                            <input type="text"  name="premium_amount" id="premium_amount" class="form-control" required>
                        </div>
                        <div class="col-4">
                            <label>Valuation Amount</label>
                            <input type="text"  name="valuation_amount" id="valuation_amount" class="form-control">
                        </div>
                        <div class="col-4">
                            <label>Total Cost</label>
                            <input type="text"  name="total_cost" id="edit_total_cost" value="0" readonly class="form-control">
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-4">
                            <label>Reference Person <span>*</span></label>
                            <select  name="referred_id" id="referred_id" class="form-control selectpicker with-ajax" data-live-search="true" required>
                                <option value="">Select One</option>
                                @foreach($referred_persons as $reffred)
                                <option value="{{$reffred->id}}">{{$reffred->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-4">
                            <label>Buying Type</label>
                            <select  name="buying_type" class="form-control" id="edit_buying_type" required>
                                <option value="1">Direct</option>
                                <option value="2">Broker</option>
                            </select>
                        </div>
                        <div class="col-4" id="edit_broker_div">
                            <label>Broker Name </label>
                            <input type="text"  name="broker_name" id="broker_name" class="form-control">
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-4">
                            <label>Insurence Provider<span>*</span></label>
                            <select  name="provider_id" id="provider_id" class="form-control" required>
                                <option value="">Select One</option>
                                @foreach($providers as $prov)
                                <option value="{{$prov->id}}">{{$prov->provider_name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-4">
                            <label>Payment Mode<span>*</span></label>
                            <select  name="payment_mode_id" id="payment_mode_id" class="form-control" required>
                                @foreach($payment_modes as $mode)
                                <option value="{{$mode->id}}">{{$mode->payment_mode}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-actions form-group">
                        <button type="submit" class="btn btn-primary btn-sm">Save Changes</button>
                        <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Cancel</button>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
            </div>
        </div>
    </div>
</div>
 <!-- Edit Modal -->
<!-- Create Vehicle Modal -->
 <div class="modal fade" id="CreateVehiclemodel" tabindex="-1" role="dialog" aria-labelledby="CreateVehiclemodelLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Create</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
              <form id="create_vehiclemodel_form" class="form" enctype="multipart/form-data">
              @csrf
                <div class="row form-group">
                    <div class="col-6">
                        <label>Vehicle Model<span>*</span></label>
                        <input type="text"  name="vehicle_model" class="form-control" required>
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
<!-- Create Vehicle Modal -->
<!-- Assign Modal -->
 <div class="modal fade" id="AssignModal" tabindex="-1" role="dialog" aria-labelledby="AssignModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Assign</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
              <form id="add_assign_form" class="form" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="policyholder_id" id="assign_policyholder_id" value="">
                <div class="row form-group">
                    <div class="col-6">
                        <label>Staff<span>*</span></label>
                        <select  name="assigned_userid" id="assigned_userid" class="form-control" required>
                            <option value="">Select One</option>
                            @foreach($staffs as $staff)
                                <option value="{{$staff->user_id}}">{{$staff->user->name}}</option>
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
            <div class="modal-footer">
            </div>
        </div>
    </div>
</div>
<!-- Create Vehicle Modal -->
 @push('scripts')
<script type="text/javascript">
    $(document).ready(function() {
        function fetch_policyholderData()
        {
            $('#policyholder_tbody').html('');
            $.ajax({ type: "GET",
                    url: "{{route('policyholder.list')}}",
                    beforeSend: function() 
                    {
                        $('#preloader').show();
                    },
                    success: function(res) 
                    {
                        $('#preloader').hide();
                        $('#policyholder-datatable').DataTable().destroy();
                        $('#policyholder_tbody').html(res);
                        $('#policyholder-datatable').DataTable({
                            "bStateSave": true,
                            "fnStateSave": function (oSettings, oData) {
                                localStorage.setItem('policyholder-datatable', JSON.stringify(oData));
                            },
                            "fnStateLoad": function (oSettings) {
                                return JSON.parse(localStorage.getItem('policyholder-datatable'));
                            }
                        });
                    },
                });
        }   
        fetch_policyholderData();
        $('#create_policyholder_form').submit(function(event) 
        {
            event.preventDefault();
            var formData = new FormData($(this)[0]); 
            $.ajax({
                url: "{{route('policyholder.store')}}",
                method: "POST",
                data: formData,
                contentType: false, 
                processData: false,
                success: function(response) {
                    if (response.success) 
                    {
                        $('#CreateModal').modal('hide');
                        $('#create_policyholder_form')[0].reset();
                        swal("Good job!", response.message, {
                            icon: "success",
                            buttons: {
                                confirm: {
                                className: "btn btn-success",
                                },
                            },
                        });
                        fetch_policyholderData();
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
        $('#update_policyholder_form').submit(function(event) {
            event.preventDefault();
            var formData = new FormData($(this)[0]);
            $.ajax({
                url: "{{route('policyholder.update')}}",
                method: "POST", 
                data: formData,
                contentType: false, 
                processData: false,
                success: function(response) {
                    if (response.success) 
                    {
                        $('#EditModal').modal('hide');
                        $('#update_policyholder_form')[0].reset();
                        swal("Good job!", "Policyholder Updated successfully", {
                            icon: "success",
                            buttons: {
                                confirm: {
                                className: "btn btn-success",
                                },
                            },
                        });
                        fetch_policyholderData(); 
                    } 
                    else 
                    {
                        alert('Error updating data: ' + response.message);
                    }
                },
                error: function(xhr, status, error) {
                    console.error('AJAX error:', error);
                }
            });
        });
        $('#add_assign_form').submit(function(event) 
        {
            event.preventDefault();
            var formData = new FormData($(this)[0]); 
            $.ajax({
                url: "{{route('policyholder.assign')}}",
                method: "POST",
                data: formData,
                contentType: false, 
                processData: false,
                success: function(response) {
                    if (response.success) 
                    {
                        $('#AssignModal').modal('hide');
                        $('#add_assign_form')[0].reset();
                        swal("Good job!", response.message, {
                            icon: "success",
                            buttons: {
                                confirm: {
                                className: "btn btn-success",
                                },
                            },
                        });
                        fetch_policyholderData();
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
        $(document).on("click", ".delete_agent", function() {
            var lead_id = $(this).data('id');
            if (confirm('Are you sure you want to delete this row?')) 
            {
                $.ajax({
                    url: "{{route('lead.destroy')}}",
                    method: "POST",
                    data:{ "_token": "{{ csrf_token() }}",
                            agent_id: agent_id
                        },
                    success: function(response) {
                        if (response.success) 
                        {
                            swal("Good job!", "Lead Deleted successfully", {
                                icon: "error",
                                buttons: {
                                    confirm: {
                                    className: "btn btn-danger",
                                    },
                                },
                            });
                            fetch_leadData();
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
            }
        });
    });
</script>
<script>
 $(document).on("click", ".assign_staff", function() {
    var policyholder_id = $(this).data('id');
    $('#assign_policyholder_id').val(policyholder_id);
    $.ajax({
        url: "{{route('policyholder.show')}}",
        method: "POST",
        data:{ "_token": "{{ csrf_token() }}",
                policyholder_id: policyholder_id
            },
        success: function(response) 
        {
            $('#assigned_userid').val(response.assigned_userid);
        },
        error: function(xhr, status, error) {
            console.error('AJAX error:', error);
        }
    });
 });
 $(document).on("click", ".edit_policyholder", function() {
    var policyholder_id = $(this).data('id');
    $('#policyholder_id').val(policyholder_id);
    $.ajax({
        url: "{{route('policyholder.show')}}",
        method: "POST",
        data:{ "_token": "{{ csrf_token() }}",
                policyholder_id: policyholder_id
            },
        success: function(response) 
        {
            $('#name').val(response.name);
            $('#vehicle_number').val(response.vehicle_number);
            $('#primary_number').val(response.primary_number);
            $('#secondary_number').val(response.secondary_number);
            $('#expiry_date').val(response.expiry_date);
            $('#vehicle_model_id').val(response.vehicle_model_id);
            $('#company_id').val(response.company_id);
            $('#premium_amount').val(response.premium_amount);
            $('#valuation_amount').val(response.valuation_amount);
            $('#payment_mode_id').val(response.payment_mode_id);
            $('#referred_id').val(response.referred_id).selectpicker('refresh');
            $('#edit_buying_type').val(response.buying_type);
            $('#edit_total_cost').val(response.total_cost);
            $('#provider_id').val(response.provider_id);
            if(response.buying_type==1)
            {
                $('#edit_broker_div').hide();
            }
            else if(response.buying_type==2)
            {
                $('#edit_broker_div').show();
                $('#broker_name').val(response.broker_name);
            }
            else{
                $('#edit_broker_div').hide();
            }
        },
        error: function(xhr, status, error) {
            console.error('AJAX error:', error);
        }
    });
 });
</script>
<script>
$(document).on("click", ".policy_type", function() {
   var policy_type = $(this).val();
   if ($(this).is(":checked")) 
   {
        if(policy_type==1)
        {
           $('#agent_div').hide();
           $('#dealer_div').hide();
           $('#company_div').hide();
           $('#company_field').attr("required", false);
           $('#agent_field').attr("required", false);
           $('#dealer_field').attr("required", false);
        }
        else if(policy_type==2)
        {
            $('#agent_div').show();
            $('#dealer_div').hide();
            $('#company_div').hide();
            $('#company_field').attr("required", false);
            $('#agent_field').attr("required", true);
            $('#dealer_field').attr("required", false);
        }
        else if(policy_type==3)
        {
            $('#agent_div').hide();
            $('#dealer_div').show();
            $('#company_div').hide();
            $('#company_field').attr("required", false);
            $('#dealer_field').attr("required", true);
            $('#agent_field').attr("required", false);
        }
        else if(policy_type==4)
        {
            $('#agent_div').hide();
            $('#dealer_div').hide();
            $('#company_div').show();
            $('#dealer_field').attr("required", false);
            $('#agent_field').attr("required", false);
            $('#company_field').attr("required", true);
        }
    }
});
</script> 
<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.14.0-beta2/dist/js/bootstrap-select.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/ajax-bootstrap-select@1.4.4/dist/js/ajax-bootstrap-select.min.js"></script>
<script>
$(document).ready(function(){
    // var options = 
    // {
    //     values: "a, b, c",
    //     ajax: 
    //     {
    //         url: "{{route('vehiclemodel.search')}}",
    //         type: "POST",
    //         dataType: "json",
    //         data: 
    //         {
    //             q: vehicle_model_id
    //         }
    //     },
    //     locale: 
    //     {
    //         emptyTitle: "Select and Begin Typing"
    //     },
    //     log: 3,
    //     preprocessData: function(data) 
    //     {
    //         var i,
    //         l = data.length,
    //         array = [];
    //         if (l) 
    //         {
    //             for (i = 0; i < l; i++) 
    //             {
    //                 array.push(
    //                 $.extend(true, data[i], 
    //                 {
    //                     text: data[i].Name,
    //                     value: data[i].Email,
    //                     data: {
    //                     subtext: data[i].Email
    //                     }
    //                 })
    //                 );
    //             }
    //         }
    //         return array;
    //     }
    // };
    $(".selectpicker").selectpicker();
    // $("select").trigger("change");
});
</script>
<script>
document.getElementById('openSecondModal').addEventListener('click', function () {
    const secondModal = new bootstrap.Modal(document.getElementById('CreateVehiclemodel'));
    secondModal.show();
    document.getElementById('CreateModal').classList.add('show');
    document.getElementById('CreateModal').style.display = 'block';
});
</script>
<script>
$(document).on("change", "#add_buying_type", function() {
    var buying_type=$(this).val();
    if(buying_type==1)
    {
        $('#broker_div').hide();
    }
    else if(buying_type==2)
    {
        $('#broker_div').show();
    }
});
</script>
<script>
$(document).on("keyup", "#add_valuation_amount", function() {
    var valuation_amount=parseFloat($(this).val());
    var premium_amount=parseFloat($('#add_premium_amount').val());
    var total_cost=(premium_amount+valuation_amount);
    $('#add_total_cost').val(total_cost);

});
$(document).on("keyup", "#valuation_amount", function() {
    var valuation_amount=parseFloat($(this).val());
    var premium_amount=parseFloat($('#premium_amount').val());
    var total_cost=(premium_amount+valuation_amount);
    $('#edit_total_cost').val(total_cost);

});
</script>
@endpush
</x-admin1-layout>