<x-admin1-layout>
<div class="page-inner">
    <div class="page-header">
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex align-items-center">
                        <h2>Payments</h2>
                        <button class="btn btn-primary btn-round ms-auto" data-bs-toggle="modal" data-bs-target="#CreateModal">
                        <i class="fa fa-plus"></i> Add Payment</button>
                        <a href="{{ url()->previous() }}" class="ml-2"><button class="btn btn-info btn-round ms-auto">
                        <i class="fa fa-arrow-left"></i> Back</button></a>
                    </div>
                    <h5>Filter</h5>
                    <div class="row">
                        <div class="col-4">
                            <label>Policy Categroy <span>*</span></label>
                            <select  name="policy_category_id" id="filter_policy_category_id" class="form-control">
                                <option value="">Select One</option>
                                @foreach( $policy_categories as $cat)
                                <option value="{{$cat->id}}">{{$cat->policy_category}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-4">
                            <label>Policy<span>*</span></label>
                            <select  name="policy_id" id="filter_policy_id" class="form-control" required>
                                <option value="">Select One</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div id="preloader" style="display:none;">
                        <img src="{{asset('web/preloader.gif')}}">
                    </div>
                    <div class="table-responsive">
                    <table id="payment-datatable" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>Sl No</th>
                                <th>Policy Category</th>
                                <th>Policy</th>
                                <th>Card/Company Direct</th>
                                <th>Card</th>
                                <th>Insurence Company</th>
                                <th>Paid Amount</th>
                                <th>Payment Mode</th>
                                <th>Added Date</th>
                                <th>Added By</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody id="payment_tbody">
                        </tbody>
                        <tfoot>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <th>Total Premium</th>
                                <td id="total_premium"></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <th>Total Paid Amount</th>
                                <td id="total_paid_amount"></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
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
              <form id="create_payment_form" class="form" enctype="multipart/form-data">
              @csrf
                <div class="row form-group">
                    <div class="col-4">
                        <label>Policy Categroy <span>*</span></label>
                        <select  name="policy_category_id" id="add_policy_category_id" class="form-control">
                            <option value="">Select One</option>
                            @foreach( $policy_categories as $cat)
                            <option value="{{$cat->id}}">{{$cat->policy_category}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-4">
                        <label>Policy<span>*</span></label>
                        <select  name="policy_id" id="add_policy_id" class="form-control" required>
                            <option value="">Select One</option>
                        </select>
                    </div>
                    <div class="col-4">
                        <label>Card/Company <span>*</span></label>
                        <select  name="payment_type" id="add_payment_type" class="form-control">
                            <option value="">Select One</option>
                            <option value="1">Card</option>
                            <option value="2">Company Direct</option>
                        </select>
                    </div>
                    <div class="col-4" id="card_div" style="display:none;">
                        <label>Card </label>
                        <select  name="card_id" class="form-control">
                            <option value="">Select One</option>
                            @foreach($cards as $card)
                            <option value="{{$card->id}}">{{$card->holder_name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-4" id="provider_div" style="display:none;">
                        <label>Inusrence Provider</label>
                        <select  name="provide_id" class="form-control">
                            <option value="">Select One</option>
                            @foreach($insurence_providers as $provider)
                            <option value="{{$provider->id}}">{{$provider->provider_name}}</option>
                            @endforeach
                        </select>
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
                <form id="update_payment_form" class="form" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="payment_id" id="payment_id" value="">
                    <div class="row form-group">
                        <div class="col-4">
                            <label>Card/Company <span>*</span></label>
                            <select  name="payment_type" id="edit_payment_type" class="form-control">
                                <option value="">Select One</option>
                                <option value="1">Card</option>
                                <option value="2">Company Direct</option>
                            </select>
                        </div>
                        <div class="col-4" id="edit_card_div" style="display:none;">
                            <label>Card </label>
                            <select  name="card_id" id="card_id" class="form-control">
                                <option value="">Select One</option>
                                @foreach($cards as $card)
                                <option value="{{$card->id}}">{{$card->holder_name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-4" id="edit_provider_div" style="display:none;">
                            <label>Inusrence Provider</label>
                            <select  name="provide_id" id="provide_id" class="form-control">
                                <option value="">Select One</option>
                                @foreach($insurence_providers as $provider)
                                <option value="{{$provider->id}}">{{$provider->provider_name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-4">
                            <label>Payment Mode <span>*</span></label>
                            <select  name="payment_mode_id" id="payment_mode_id" class="form-control" required>
                                <option value="">Select One</option>
                                @foreach($payment_modes as $mode)
                                <option value="{{$mode->id}}">{{$mode->payment_mode}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-6">
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
        function fetch_paymentData(policy_id='',policy_cat_id='')
        {
            $('#payment_tbody').html('');
            $.ajax({ type: "POST",
                    url: "{{route('payment.list')}}",
                    data:{ "_token": "{{ csrf_token() }}",
                        policy_id:policy_id,
                        policy_cat_id:policy_cat_id
                    },
                    beforeSend: function() 
                    {
                        $('#preloader').show();
                    },
                    success: function(res) 
                    {
                        $('#preloader').hide();
                        $('#payment-datatable').DataTable().destroy();
                        $('#payment_tbody').html(res.data);
                        $('#total_paid_amount').text(res.total_paid_amount);
                        $('#balance_amount').text(res.balance_amount);
                        $('#total_premium').text(res.total_premium);
                        $('#payment-datatable').DataTable({
                            "bStateSave": true,
                            "fnStateSave": function (oSettings, oData) {
                                localStorage.setItem('payment-datatable', JSON.stringify(oData));
                            },
                            "fnStateLoad": function (oSettings) {
                                return JSON.parse(localStorage.getItem('payment-datatable'));
                            }
                        });
                    },
                });
        }   
        fetch_paymentData();
        $('#create_payment_form').submit(function(event) 
        {
            event.preventDefault();
            var formData = new FormData($(this)[0]); 
            $.ajax({
                url: "{{route('payment.store')}}",
                method: "POST",
                data: formData,
                contentType: false, 
                processData: false,
                success: function(response) {
                    if (response.success) 
                    {
                        $('#CreateModal').modal('hide');
                        $('#create_payment_form')[0].reset();
                        swal("Good job!", "Payment Created successfully", {
                            icon: "success",
                            buttons: {
                                confirm: {
                                className: "btn btn-success",
                                },
                            },
                        });
                        fetch_paymentData();
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
        $('#update_payment_form').submit(function(event) {
            event.preventDefault();
            var formData = new FormData($(this)[0]);
            $.ajax({
                url: "{{route('payment.update')}}",
                method: "POST", 
                data: formData,
                contentType: false, 
                processData: false,
                success: function(response) {
                    if (response.success) 
                    {
                        $('#EditModal').modal('hide');
                        $('#update_payment_form')[0].reset();
                        swal("Good job!", "Payment Updated successfully", {
                            icon: "success",
                            buttons: {
                                confirm: {
                                className: "btn btn-success",
                                },
                            },
                        });
                        fetch_paymentData();
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
        $(document).on("change", "#filter_policy_id", function() {
            var policy_id=$(this).val();
            var policy_cat_id=$('#filter_policy_category_id').val();
            fetch_paymentData(policy_id,policy_cat_id);
        });
    });
</script>
<script>
$(document).on("click", ".edit_payment", function() {
   var payment_id = $(this).data('id');
   $('#payment_id').val(payment_id);
   $.ajax({ type: "POST",
        url: "{{route('payment.show')}}",
        data: { "_token": "{{ csrf_token() }}",
                payment_id:payment_id
              },
        success: function(res) 
        {
            $('#edit_payment_type').val(res.payment_type);
            if(res.payment_type==1)
            {
                $('#edit_card_div').show();
                $('#card_id').val(res.card_id);
            }
            else if(res.payment_type==2)
            {
                $('#edit_provider_div').show();
                $('#provide_id').val(res.provide_id);
            }
            $('#payment_mode_id').val(res.payment_mode_id);
            $('#paid_amount').val(res.paid_amount);
            $('#remarks').val(res.remarks);
        },
    });
});
</script> 
<script>
$(document).on("change", "#add_payment_type", function() {
   var payment_type = $(this).val();
   if (payment_type==1) 
   {
        $('#card_div').show();
        $('#provider_div').hide();
   }
   else if(payment_type==2) 
   {
        $('#card_div').hide();
        $('#provider_div').show();
   }
});
$(document).on("change", "#edit_payment_type", function() {
   var payment_type = $(this).val();
   if (payment_type==1) 
   {
        $('#edit_card_div').show();
        $('#edit_provider_div').hide();
   }
   else if(payment_type==2) 
   {
        $('#edit_card_div').hide();
        $('#edit_provider_div').show();
   }
});
$(document).on("change", "#add_policy_category_id", function() {
    var policy_category_id=$(this).val();
    $('#add_policy_id').prop('disabled', true).html('<option value="">Loading...</option>');
    $.ajax({ type: "POST",
        url: "{{route('payment.getPolicyByCategory')}}",
        data: { "_token": "{{ csrf_token() }}",
                policy_category_id:policy_category_id
              },
        success: function(res) 
        {
            $('#add_policy_id').prop('disabled', false).html('<option value="">Select One</option>');
            $.each(res.policies, function(index, policy) {
                $('#add_policy_id').append('<option value="' +policy.id+'">'+policy.name	+'</option>');
            });
        }
    });

});
$(document).on("change", "#filter_policy_category_id", function() {
    var policy_category_id=$(this).val();
    $('#filter_policy_id').prop('disabled', true).html('<option value="">Loading...</option>');
    $.ajax({ type: "POST",
        url: "{{route('payment.getPolicyByCategory')}}",
        data: { "_token": "{{ csrf_token() }}",
                policy_category_id:policy_category_id
              },
        success: function(res) 
        {
            $('#filter_policy_id').prop('disabled', false).html('<option value="">Select One</option>');
            $.each(res.policies, function(index, policy) {
                $('#filter_policy_id').append('<option value="' +policy.id+'">'+policy.name	+'</option>');
            });
        }
    });
});
$(document).on("change", "#add_policy_id", function() {
    var policy_id=$(this).val();
    var policy_cat_id=$('#add_policy_category_id').val();
    $.ajax({ type: "POST",
        url: "{{route('payment.getPolicyDetails')}}",
        data: { "_token": "{{ csrf_token() }}",
                policy_id:policy_id,
                policy_cat_id:policy_cat_id
              },
        success: function(res) 
        {
            $('#due_amount').text('Due is : '+res.due_amount);
        }
    });

});
</script>
@endpush
</x-admin1-layout>