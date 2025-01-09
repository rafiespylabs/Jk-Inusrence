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
                        <h2>Renew Policy</h2>
                        <button class="btn btn-primary btn-round ms-auto" data-bs-toggle="modal" data-bs-target="#CreateModal">
                        <i class="fa fa-plus"></i>Renew</button>
                    </div>
                </div>
                <div class="card-body">
                    <hr>
                    <div id="preloader" style="display:none;">
                        <img src="{{asset('web/preloader.gif')}}">
                    </div>
                    <div class="table-responsive">
                    <table id="renew-datatable" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>Sl No</th>
                                <th>Policy</th>
                                <th>Vehicle Number</th>
                                <th>Premium Amount</th>
                                <th>Valuation Amount</th>
                                <th>Total Cost</th>
                                <th>Start Date</th>
                                <th>End Date</th>
                                <th>Payment Mode</th>
                                <th>Created Date</th>
                                <th>Created By</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody id="renew_tbody">
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
              <form id="create_renew_form" class="form" enctype="multipart/form-data">
              @csrf
                <div class="row form-group">
                    <div class="col-4">
                        <label>Policy</label>
                        <select name="policy_category_id" id="addpolicy_cat_id"  class="form-control" required>
                            <option value="">Select One</option>
                            @foreach($policy_categories as $cat)
                            <option value="{{$cat->id}}">{{$cat->policy_category}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-4">
                        <label>Policy</label>
                        <select name="policy_id" id="addpolicy_id" class="form-control policy selectpicker with-ajax" data-live-search="true" required>
                            <option value="">Select One</option>
                            @foreach($policy_holders as $holder)
                            <option value="{{$holder->id}}">{{$holder->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-4">
                        <label>Name<span>*</span></label>
                        <input type="text"  name="name" id="renew_name" class="form-control" required>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-4">
                        <label>Vehcile Number<span>*</span></label>
                        <input type="text"  name="vehicle_number" id="renew_vehicle_number" class="form-control" required>
                    </div>
                    <div class="col-4">
                        <label>Primary Contact<span>*</span></label>
                        <input type="text"  name="primary_number" id="renew_primary_number" class="form-control" required>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-4">
                        <label>Vehicle Model<span>*</span></label>
                        <select  name="vehicle_model_id" id="renew_vehicle_model_id" class="form-control selectpicker with-ajax" data-live-search="true" required>
                            <option value="">Select One</option>
                            @foreach($vehiclemodels as $model)
                            <option value="{{$model->id}}"  data-subtext="{{$model->vehicle_model}}">{{$model->vehicle_model}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-4">
                        <label>Company<span>*</span></label>
                        <select  name="company_id"  id="renew_company_id" class="form-control selectpicker with-ajax" data-live-search="true"required>
                            <option value="">Select One</option>
                            @foreach($companies as $company)
                            <option value="{{$company->id}}">{{$company->company}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-4">
                        <label>Premium Amount <span>*</span></label>
                        <input type="text"  name="premium_amount" id="renew_premium_amount" class="form-control" required>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-4">
                        <label>Valuation Amount</label>
                        <input type="text" name="valuation_amount" id="renew_valuation_amount" class="form-control">
                    </div>
                    <div class="col-4">
                        <label>Total Cost</label>
                        <input type="text" name="total_cost" id="renew_total_cost" value="0" readonly="" class="form-control">
                    </div>
                    <div class="col-4">
                        <label>Renew Date <span>*</span></label>
                        <input type="date"  name="renew_date" class="form-control" required>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-4">
                        <label>Expiry Date <span>*</span></label>
                        <input type="date"  name="expiry_date" class="form-control" required>
                    </div>
                    <div class="col-4">
                        <label>Payment Mode <span>*</span></label>
                        <select  name="payment_mode_id" id="renew_payment_mode_id" class="form-control" required>
                            <option value="">Select One</option>
                            @foreach($payment_modes as $mode)
                            <option value="{{$mode->id}}">{{$mode->payment_mode}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-4">
                        <label>Added Date </label>
                        <input type="date"  name="created_date" class="form-control">
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
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="update_renew_form" class="form" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="renew_id" id="renew_id" value="">
                    <div class="row form-group">
                        <div class="col-4">
                            <label>Premium Amount <span>*</span></label>
                            <input type="text"  name="premium_amount" id="premium_amount" class="form-control" required>
                        </div>
                        <div class="col-4">
                            <label>Start Date <span>*</span></label>
                            <input type="date"  name="start_date" id="start_date" class="form-control" required>
                        </div>
                        <div class="col-4">
                            <label>End Date <span>*</span></label>
                            <input type="date"  name="end_date" id="end_date" class="form-control" required>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-6">
                            <label>Payment Mode <span>*</span></label>
                            <select  name="payment_mode_id" id="payment_mode_id" class="form-control" required>
                                <option value="">Select One</option>
                                @foreach($payment_modes as $mode)
                                <option value="{{$mode->id}}">{{$mode->payment_mode}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-6">
                            <label>Added Date </label>
                            <input type="date"  name="created_date" id="created_date" class="form-control">
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
 @push('scripts')
<script type="text/javascript">
    $(document).ready(function() {
        function fetch_renewData()
        {
            $('#renew_tbody').html('');
            $.ajax({ type: "GET",
                    url: "{{route('renew.list')}}",
                    beforeSend: function() 
                    {
                        $('#preloader').show();
                    },
                    success: function(res) 
                    {
                        $('#preloader').hide();
                        $('#renew-datatable').DataTable().destroy();
                        $('#renew_tbody').html(res);
                        $('#renew-datatable').DataTable({
                            "bStateSave": true,
                            "fnStateSave": function (oSettings, oData) {
                                localStorage.setItem('renew-datatable', JSON.stringify(oData));
                            },
                            "fnStateLoad": function (oSettings) {
                                return JSON.parse(localStorage.getItem('renew-datatable'));
                            }
                        });
                    },
                });
        }   
        fetch_renewData();
        $('#create_renew_form').submit(function(event) 
        {
            event.preventDefault();
            var formData = new FormData($(this)[0]); 
            $.ajax({
                url: "{{route('renew.store')}}",
                method: "POST",
                data: formData,
                contentType: false, 
                processData: false,
                success: function(response) {
                    if (response.success) 
                    {
                        $('#CreateModal').modal('hide');
                        $('#create_renew_form')[0].reset();
                        swal("Good job!", "Renew Created successfully", {
                            icon: "success",
                            buttons: {
                                confirm: {
                                className: "btn btn-success",
                                },
                            },
                        });
                        fetch_renewData();
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
        $('#update_renew_form').submit(function(event) {
            event.preventDefault();
            var formData = new FormData($(this)[0]);
            $.ajax({
                url: "{{route('renew.update')}}",
                method: "POST", 
                data: formData,
                contentType: false, 
                processData: false,
                success: function(response) {
                    if (response.success) 
                    {
                        $('#EditModal').modal('hide');
                        $('#update_renew_form')[0].reset();
                        swal("Good job!", "Renew Updated successfully", {
                            icon: "success",
                            buttons: {
                                confirm: {
                                className: "btn btn-success",
                                },
                            },
                        });
                        fetch_renewData();
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
    });
</script>
<script>
$(document).on("click", ".edit_renewpolicy", function() {
   var renew_id = $(this).data('id');
   $('#renew_id').val(renew_id);
   $.ajax({ type: "POST",
        url: "{{route('renew.show')}}",
        data: { "_token": "{{ csrf_token() }}",
                renew_id:renew_id
              },
        success: function(res) 
        {
          $('#premium_amount').val(res.premium_amount);
          $('#start_date').val(res.start_date);
          $('#end_date').val(res.end_date);
          $('#payment_mode_id').val(res.payment_mode_id);
          $('#created_date').val(res.created_date);
        },
    });
});
</script> 
<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.14.0-beta2/dist/js/bootstrap-select.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/ajax-bootstrap-select@1.4.4/dist/js/ajax-bootstrap-select.min.js"></script>
<script>
$(".selectpicker").selectpicker();
</script>
<script>
$(document).ready(function() {
    $('.selectpicker').selectpicker().on('change', function() 
    {
        var policyholder_id = $(this).val();
        $.ajax({
            url: "{{route('policyholder.show')}}",
            method: "POST",
            data:{ "_token": "{{ csrf_token() }}",
                    policyholder_id: policyholder_id
                },
            success: function(response) 
            {
                $('#renew_name').val(response.name);
                $('#renew_vehicle_number').val(response.vehicle_number);
                $('#renew_primary_number').val(response.primary_number);
                $('#renew_vehicle_model_id').val(response.vehicle_model_id);
                $('#renew_vehicle_model_id').selectpicker('refresh');
                $('#renew_company_id').val(response.company_id);
                $('#renew_company_id').selectpicker('refresh');
                $('#renew_premium_amount').val(response.premium_amount);
                $('#renew_payment_mode_id').val(response.payment_mode_id);
                $('#renew_valuation_amount').val(response.valuation_amount);
                $('#renew_total_cost').val(response.total_cost);

            },
            error: function(xhr, status, error) {
                console.error('AJAX error:', error);
            }
        });
}   );
});
</script>
<script>
$(document).on("keyup", "#renew_valuation_amount", function() {
    var valuation_amount=parseFloat($(this).val());
    var premium_amount=parseFloat($('#renew_premium_amount').val());
    var total_cost=(premium_amount+valuation_amount);
    $('#renew_total_cost').val(total_cost);

});
</script>
<script>
$(document).on("change", "#addpolicy_cat_id", function() {
   var policy_cat_id = $(this).val();
   $('#addpolicy_id').prop('disabled', true).html('<option value="">Loading...</option>');
   $.ajax({ type: "POST",
        url: "{{route('renew.getPolicies')}}",
        data: { "_token": "{{ csrf_token() }}",
                policy_cat_id:policy_cat_id
              },
        success: function(res) 
        {
            $('#addpolicy_id').prop('disabled', false).html('<option value="">Select One</option>');
            if (res.success) 
            {
                $.each(res.policies, function(index, policy) {
                    $('#addpolicy_id').append('<option value="' +policy.id+'">'+policy.name	+'</option>');
                });
            }
            $(".selectpicker").selectpicker('refresh');
        },
    });
});
</script>
@endpush
</x-admin1-layout>