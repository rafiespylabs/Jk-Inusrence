<x-admin1-layout>
<div class="page-inner">
    <div class="page-header">
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex align-items-center">
                        <h2>Policy Payments</h2>
                        <button class="btn btn-primary btn-round btn-sm ms-auto" data-bs-toggle="modal" data-bs-target="#CreateModal">
                        <i class="fa fa-plus"></i> Add Payment</button>
                        <a href="{{ url()->previous() }}" class="ml-2"><button class="btn btn-info btn-round ms-auto btn-sm">
                        <i class="fa fa-arrow-left"></i> Back</button></a>
                    </div>
                </div>
                <div class="card-body">
                    <a href="/purchase_cards/{{$policy_cat_id}}/{{$policy_id}}" class="ml-2">
                        <button class="btn btn-black btn-md ms-auto">
                            <i class="fa fa-archive"></i> Purchase Cards  <i class="fa fa-arrow-right"></i>
                        </button>
                    </a>
                    <p>Policy Name: <span id="policy_name"></span> &nbsp;&nbsp; Policy Phone Number: <span id="policy_primary_number"></span></p>
                    <p>Insurence Provider: <span id="provider_name"></span>&nbsp;&nbsp; <b>Customer Premium Amount :</b> <span id="total_cust_premium"></span></p>
                    <p class="mt-3"><b> Premium Amount :</b> <span id="total_premium"></span></p>
                    <div id="preloader" style="display:none;">
                        <img src="{{asset('web/preloader.gif')}}">
                    </div>
                    <div class="table-responsive">
                    <table id="policypayment-datatable" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>Sl No</th>
                                <th>Payment Mode</th>
                                <th>Paid Amount</th>
                                <th>Added Date</th>
                                <th>Added By</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody id="policypayment_tbody">
                        </tbody>
                        <tfoot>
                            <tr>
                                <td></td>
                                <th>Total Paid Amount</th>
                                <td id="total_paid_amount"></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                                <th>Due Amount</th>
                                <td id="balance_amount"></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                        </tfoot>
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
               <p>Policy Name : <span id="policy_name_1"></span> &nbsp;&nbsp; Policy Phone Number : <span id="policy_primary_number_1"></span></p>
               <p>Customer Paid Premium : <span id="customer_premium"></span> &nbsp; &nbsp; Premium Amount : <span id="premium_amt"></span></p>
               <p>Inusrence Provider : <span id="provider_name_1"></span></p>
              <form id="create_policy_payment_form" class="form" enctype="multipart/form-data">
              @csrf
                <div class="row form-group">
                    <input type="hidden" name="policy_id" value="{{$policy_id}}">
                    <input type="hidden" name="policy_cat_id" value="{{$policy_cat_id}}">
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
                        <label>Paid Amount <span>*</span></label>
                        <input type="text"  name="paid_amount" id="add_paid_amount" class="form-control" required>
                        <span id="due_amount" style="color:red;"> </span>
                    </div>
                    <div class="col-4">
                        <label>Remarks </label>
                        <textarea  name="remarks" class="form-control"></textarea>
                    </div>
                </div>
                <div class="form-actions form-group">
                  <button type="submit" class="btn btn-primary btn-sm">Submit</button>
                  <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Cancel</button>
                </div>
              </form>
              <div>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Card</th>
                                <th>Taken Amount</th>
                                <th>Card Balance</th>
                                <th>Provider Card Balance</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($purchase_cards as $pcard)
                            <tr>
                                <td>{{$pcard->card->holder_name ?? ""}}</td>
                                <td>{{$pcard->taken_amount}}</td>
                                <td>{{$pcard->card_balance_amount}}</td>
                                <td>{{$pcard->provider_balance_amount}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
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
                <form id="update_policy_payment_form" class="form" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="policy_pay_id" id="policy_pay_id" value="">
                    <div class="row form-group">
                        <div class="col-4">
                            <label>Payment Mode <span>*</span></label>
                            <select  name="payment_mode_id" id="payment_mode_id" class="form-control" required>
                                <option value="">Select One</option>
                                @foreach($payment_modes as $mode)
                                <option value="{{$mode->id}}">{{$mode->payment_mode}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-4">
                            <label>Paid Amount <span>*</span></label>
                            <input type="text"  name="paid_amount" id="paid_amount" class="form-control" required>
                        </div>
                        <div class="col-4">
                            <label>Remarks </label>
                            <textarea  name="remarks"  id="remarks" class="form-control"></textarea>
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
        function fetch_policypaymentData(policy_id='',policy_cat_id='')
        {
            $('#policypayment_tbody').html('');
            $.ajax({ type: "POST",
                    url: "{{route('policypayment.list')}}",
                    data:{ "_token": "{{ csrf_token() }}",
                        policy_id:{{$policy_id}},
                        policy_cat_id:{{$policy_cat_id}}
                    },
                    beforeSend: function() 
                    {
                        $('#preloader').show();
                    },
                    success: function(res) 
                    {
                        $('#preloader').hide();
                        $('#policypayment-datatable').DataTable().destroy();
                        $('#policypayment_tbody').html(res.data);
                        $('#total_paid_amount').text(res.total_paid_amount);
                        $('#balance_amount').text(res.balance_amount);
                        $('#total_cust_premium').text(res.total_cust_premium);
                        $('#customer_premium').text(res.total_cust_premium);
                        $('#total_premium').text(res.total_premium);
                        $('#premium_amt').text(res.total_premium);
                        $('#policy_primary_number').text(res.policy_phone_number);
                        $('#policy_primary_number_1').text(res.policy_phone_number);
                        $('#policy_name').text(res.policy_name);
                        $('#policy_name_1').text(res.policy_name);
                        $('#provider_name').text(res.provider_name);
                        $('#provider_name_1').text(res.provider_name);
                        $('#policypayment-datatable').DataTable({
                            "bStateSave": true,
                            "fnStateSave": function (oSettings, oData) {
                                localStorage.setItem('policypayment-datatable', JSON.stringify(oData));
                            },
                            "fnStateLoad": function (oSettings) {
                                return JSON.parse(localStorage.getItem('policypayment-datatable'));
                            }
                        });
                    },
                });
        }   
        fetch_policypaymentData();
        $('#create_policy_payment_form').submit(function(event) 
        {
            event.preventDefault();
            var formData = new FormData($(this)[0]); 
            $.ajax({
                url: "{{route('policypayment.store')}}",
                method: "POST",
                data: formData,
                contentType: false, 
                processData: false,
                success: function(response) {
                    if (response.success) 
                    {
                        $('#CreateModal').modal('hide');
                        $('#create_policy_payment_form')[0].reset();
                        swal("Good job!", "Policy Payment Created successfully", {
                            icon: "success",
                            buttons: {
                                confirm: {
                                className: "btn btn-success",
                                },
                            },
                        });
                        fetch_policypaymentData();
                    } 
                    else 
                    {
                        swal("Warning!", response.message, {
                            icon: "warning",
                            buttons: {
                                confirm: {
                                className: "btn btn-warning",
                                },
                            },
                        });
                    }
                },
                error: function(xhr, status, error) {
                    console.error('AJAX error:', error);
                }
            });
        });
        $('#update_policy_payment_form').submit(function(event) {
            event.preventDefault();
            var formData = new FormData($(this)[0]);
            $.ajax({
                url: "{{route('policypayment.update')}}",
                method: "POST", 
                data: formData,
                contentType: false, 
                processData: false,
                success: function(response) {
                    if (response.success) 
                    {
                        $('#EditModal').modal('hide');
                        $('#update_policy_payment_form')[0].reset();
                        swal("Good job!", "Policy Payment Updated successfully", {
                            icon: "success",
                            buttons: {
                                confirm: {
                                className: "btn btn-success",
                                },
                            },
                        });
                        fetch_policypaymentData();
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
$(document).on("click", ".edit_policypayment", function() {
   var policy_pay_id = $(this).data('id');
   $('#policy_pay_id').val(policy_pay_id);
   $.ajax({ type: "POST",
        url: "{{route('policypayment.show')}}",
        data: { "_token": "{{ csrf_token() }}",
                policy_pay_id:policy_pay_id
              },
        success: function(res) 
        {
            $('#payment_mode_id').val(res.payment_mode_id);
            $('#paid_amount').val(res.paid_amount);
            $('#remarks').val(res.remarks);
        },
    });
});
</script> 
@endpush
</x-admin1-layout>