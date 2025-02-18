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
                        <h2>Other Policy Renew </h2>
                        <button class="btn btn-primary btn-round ms-auto" data-bs-toggle="modal" data-bs-target="#CreateModal">
                        <i class="fa fa-plus"></i>Renew</button>
                        <a href="{{ url()->previous() }}">
                            <button class="btn btn-info btn-round ms-auto  ml-2">
                                Back 
                            </button>
                        </a>
                    </div>
                    <h5>Policy Name : {{$other_policy->name}}</h5>
                </div>
                <div class="card-body">
                    <hr>
                    <div id="preloader" style="display:none;">
                        <img src="{{asset('web/preloader.gif')}}">
                    </div>
                    <div class="table-responsive">
                    <table id="other_policy_renew-datatable" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>Sl No</th>
                                <th>Start Date</th>
                                <th>End Date</th>
                                <th>Premium Amount</th>
                                <th>Custom Premium</th>
                                <th>Payment Mode</th>
                                <th>Added Date</th>
                                <th>Added By</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $i = 1; @endphp
                            @foreach ($other_policy_renews as $renew)
                                <tr id="row{{ $renew->id }}">
                                    <td>{{ $i }}</td>                                            
                                    <td>{{ $renew->renew_date }}</td>                                        
                                    <td>{{ $renew->expiry_date }}</td>
                                    <td>{{ $renew->premium_amount	 }}</td>
                                    <td>{{ $renew->customer_premium	 }}</td>
                                    <td>{{ $renew->payment_mode->payment_mode ??"" }}</td>
                                    <td>{{ $renew->added_date }}</td>
                                    <td>{{ $renew->added_user->name ?? "" }}</td>
                                    <td>
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
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Create</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
              <form id="create_other_policy_renew_form" class="form" enctype="multipart/form-data">
              @csrf
                <input type="hidden"  name="other_policy_id"   class="form-control" value="{{$other_policy->id}}">
                <input type="hidden"  name="policy_cat_id"   class="form-control" value="{{$other_policy->policy_category_id}}">
                <div class="row form-group">
                    <div class="col-4">
                        <label>Premium Amount <span>*</span></label>
                        <input type="text"  name="premium_amount"  class="form-control" value="{{$other_policy->premium_amount}}" required>
                    </div>
                    <div class="col-4">
                        <label>Customer Premium Amount <span>*</span></label>
                        <input type="text"  name="customer_premium"  class="form-control" value="{{$other_policy->customer_premium_amount}}" required>
                    </div>
                    <div class="col-4">
                        <label>Renew Date <span>*</span></label>
                        <input type="date"  name="renew_date"  id="add_renew_date" value="{{$other_policy->start_date}}" class="form-control" required>
                    </div>
                    <div class="col-4">
                        <label>Expiry Date <span>*</span></label>
                        <input type="date"  name="expiry_date" id="add_renew_expiry_date" value="{{$other_policy->expiry_date}}"  class="form-control" required>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-4">
                        <label>Payment Mode <span>*</span></label>
                        <select  name="payment_mode_id" class="form-control" required>
                            <option value="">Select One</option>
                            @foreach($payment_modes as $mode)
                            <option value="{{$mode->id}}">{{$mode->payment_mode}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-4">
                        <label>Added Date </label>
                        <input type="date"  name="created_date" class="form-control" value="{{$other_policy->added_date}}">
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
 @push('scripts')
<script type="text/javascript">
    $(document).ready(function() {
        $('#other_policy_renew-datatable').DataTable();
        $('#create_other_policy_renew_form').submit(function(event) 
        {
            event.preventDefault();
            var formData = new FormData($(this)[0]); 
            $.ajax({
                url: "{{route('otherPolicyRenew.store')}}",
                method: "POST",
                data: formData,
                contentType: false, 
                processData: false,
                success: function(response) {
                    if (response.success) 
                    {
                        $('#CreateModal').modal('hide');
                        $('#create_other_policy_renew_form')[0].reset();
                        swal("Good job!", "Renewed Successfully", {
                            icon: "success",
                            buttons: {
                                confirm: {
                                className: "btn btn-success",
                                },
                            },
                        });
                        var table = $('#other_policy_renew-datatable').DataTable();
                        var lastRowNumber = table.data().count() > 0 ? parseInt(table.row(':last').data()[0]) + 1 : 0;
                        var newRow = table.row.add([
                            lastRowNumber,  
                            response.data.renew_date,                        
                            response.data.expiry_date, 
                            response.data.premium_amount,	
                            response.data.customer_premium,	 
                            response.data.payment_mode, 
                            response.data.added_date, 
                            response.data.added_by,                                                                      
                            // '<i class="fa fa-edit edit_healthpolicies" data-rowid="'+ lastRowNumber +'" data-id="' + response.data.id + '" data-bs-toggle="modal" data-bs-target="#EditModal"></i>' +
                            // '<i class="fa fa-trash delete_healthpolicies" data-rowid="'+ lastRowNumber +'" data-id="' + response.data.id + '"></i>'+
                            ''
                        ]).draw(false);
                        table.page('last').draw(false);  
                        $(newRow.node()).attr('id', 'row' + response.data.id);              
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
                url: "{{route('vechicle_policyrenew.update')}}",
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
                        fetch_vechiclePolicyrenewData();
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
        url: "{{route('vechicle_policyrenew.show')}}",
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
$(document).on("change", "#add_renew_date", function() {
    var startDate = new Date($(this).val());
    var expiryDate = new Date(startDate);
    expiryDate.setFullYear(expiryDate.getFullYear() + 1);
    var formattedDate = expiryDate.getFullYear() + 
                      "-" + (expiryDate.getMonth() + 1 < 10 ? '0' + (expiryDate.getMonth() + 1) : expiryDate.getMonth() + 1) + 
                      "-" + (expiryDate.getDate() < 10 ? '0' + expiryDate.getDate() : expiryDate.getDate());
    $('#add_renew_expiry_date').val(formattedDate);
});
</script>
@endpush
</x-admin1-layout>