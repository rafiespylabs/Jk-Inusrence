<x-admin1-layout>
<div class="page-inner">
    <div class="page-header">
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex align-items-center">
                        <h2>Purchase Cards</h2>
                        <button class="btn btn-primary btn-round btn-sm  ms-auto"  data-bs-toggle="modal" data-bs-target="#PurchaseCardModal">
                        <i class="fa fa-plus"></i> Add Purchase Card</button>
                        <a href="{{ url()->previous() }}" class="ml-2"><button class="btn btn-info btn-round ms-auto btn-sm">
                        <i class="fa fa-arrow-left"></i> Back</button></a>
                    </div>
                </div>
                <div class="card-body">
                    <p>Policy Name : {{$policy_name}}&nbsp; &nbsp; Policy Phone Number : {{$policy_phone_number}}</p>
                    <p>Insurence Provider: <span>{{$provider_name}}</span> &nbsp; &nbsp; Premium : {{$policy->premium_amount}}</p>
                    <p>Due Premium : <span>{{$due_premium}}</span></p>
                    <div id="preloader" style="display:none;">
                        <img src="{{asset('web/preloader.gif')}}">
                    </div>
                    <div class="table-responsive">
                    <table id="purchase_card-datatable" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                            <th>Sl No</th>
                            <th>Card/Client Direct</th>
                            <!-- <th>Card</th> -->
                            <th>Provider</th>
                            <th>Taken Amount</th>
                            <!-- <th>Card Balance</th> -->
                            <th>Provider Card Balance</th>
                            <th>Added By</th>
                            <th>Added Date</th>
                            <th>Action</th>
                            </tr>
                        </thead>
                        <tbody id="purchase_card_tbody">
                        </tbody>
                    </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Purchase Card Modal -->
 <div class="modal fade" id="PurchaseCardModal" tabindex="-1" role="dialog" aria-labelledby="PurchaseCardModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add Purchase Card</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Policy Name : {{$policy_name}}&nbsp; &nbsp; Policy Phone Number : {{$policy_phone_number}}</p>
                <p>Insurence Provider: <span>{{$provider_name}}</span> &nbsp; &nbsp; Premium : {{$policy->premium_amount}}</p>
              <form id="add_purchase_card_form" class="form" enctype="multipart/form-data">
              @csrf
                <input type="hidden" name="policy_id" value="{{$policy_id}}">
                <input type="hidden" name="policy_cat_id" value="{{$policy_cat_id}}">
                <input type="hidden" name="due_premium_amount" value="{{$due_premium ?? '' }}">
                <div id="form-fields">
                    <div class="row form-group" id="field-1">
                        <div class="col-3">
                            <label>Card/Company <span>*</span></label>
                            <select  name="purchase_type" class="add_payment_type form-control" data-count="1">
                                <option value="">Select One</option>
                                <option value="1">Card</option>
                                <!-- <option value="2">Company Direct</option> -->
                                <option value="3">Client Direct</option>
                            </select>
                        </div>
                        <div class="col-3" id="provider_div1" style="display:none;">
                            <label>Inusrence Provider</label>
                            <select  name="provider_id" id="provider_id" class="form-control">
                                <option value="">Select One</option>
                                @foreach($insurence_providers as $provider)
                                <option value="{{$provider->id}}">{{$provider->provider_name}}-[{{$provider->card_name}}-{{$provider->current_amount}}]</option>
                                @endforeach
                            </select>
                        </div>
                        <!-- <div class="col-3" id="card_div1" style="display:none;">
                            <label>Card </label>
                            <select  name="card_id" id="card_id" class="form-control">
                                <option value="">Select One</option>
                                @foreach($cards as $card)
                                <option value="{{$card->id}}">{{$card->holder_name}}-[{{$card->current_amount}}]</option>
                                @endforeach
                            </select>
                        </div> -->
                        <div class="col-3">
                            <label>Amount Taken <span>*</span></label>
                            <input type="number" step="any"  name="taken_amount" id="taken_amount" class="form-control" required>
                        </div>
                        <!-- <div class="col-3" id="card_bal_div1">
                            <label>Card Balance <span>*</span></label>
                            <input type="number" step="any"  name="card_balance_amount" id="card_balance_amount" class="form-control" required>
                        </div> -->
                        <div class="col-3" id="provider_bal_div1">
                            <label>Provider Card Balance <span>*</span></label>
                            <input type="number" step="any"  name="provider_balance_amount" id="provider_balance_amount" class="form-control" required>
                        </div>
                    </div>
                </div>
                <!-- <div class="col-12  text-center mt-4">
                    <button id="add-field" type="button" class="btn btn-secondary btn-sm" ><i class="fa fa-plus"></i> Add</button>
                </div> -->
                <div class="form-actions form-group">
                  <button type="submit" class="btn btn-primary btn-sm" id="submit_btn">Submit</button>
                  <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Cancel</button>
                </div>
              </form>
            </div>
            <div class="modal-footer">
            </div>
        </div>
    </div>
</div>
<!-- Purchase Card Modal -->
 @push('scripts')
 <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $.fn.dataTable.ext.errMode = 'none';
        var table = $('#purchase_card-datatable').DataTable({
            processing: true,
            serverSide: true,
            pageLength: 10, 
            lengthMenu: [10, 25, 50, 100], 
            ajax: {
                url: "{{ route('purchase_card.list') }}",
                type: "POST",
                data: {
                    "_token": "{{ csrf_token() }}",
                    "policy_cat_id": {{$policy_cat_id}},
                    "policy_id": {{$policy_id}}
                },
            },
            columns: [
                {data: "sl_no",name: "sl_no", orderable: false, searchable: false  },
                {data :"purchase_type" , name:"purchase_type"},
                // {data:"card",name: "card" },
                {data: "provider" ,name: "provider"},
                {data: "taken_amount" ,name: "taken_amount"},
                // {data: "card_balance_amount" ,name: "card_balance_amount"},
                {data: "provider_balance_amount" ,name: "provider_balance_amount"},
                {data: "added_by" ,name: "added_by"},
                {data: "added_date" ,name: "added_date"},
                { 
                    data: "action", 
                    name: "action", 
                    orderable: false, 
                    searchable: false 
                },
            ],
            rowCallback: function(row, data, index) {
                $(row).attr('id', 'row' + data.id);
            }
        });
        var fieldCount = 2;
        $("#add-field").click(function() {
            fieldCount++;
            let newFieldHtml = `
                <div class="row form-group" id="field-${fieldCount}">
                    <div class="col-3">
                        <label>Card/Company <span>*</span></label>
                        <select  name="purchase_type[]" class="add_payment_type form-control" data-count='${fieldCount}'>
                        <option value="">Select One</option>
                        <option value="1">Card</option>
                        <option value="2">Company Direct</option>
                        </select>
                    </div>
                    <div class="col-3" id="provider_div${fieldCount}" style="display:none;">
                        <label>Inusrence Provider</label>
                        <select  name="provider_id[]" class="form-control">
                            <option value="">Select One</option>
                            @foreach($insurence_providers as $provider)
                            <option value="{{$provider->id}}">{{$provider->provider_name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-3" id="card_div${fieldCount}" style="display:none;">
                        <label>Card </label>
                        <select  name="card_id[]" class="form-control">
                            <option value="">Select One</option>
                            @foreach($cards as $card)
                            <option value="{{$card->id}}">{{$card->holder_name}}-[{{$card->current_amount}}]</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-3">
                        <label>Amount Taken <span>*</span></label>
                        <input type="number" step="any" name="taken_amount[]" class="form-control" required>
                    </div>
                    <div class="col-3" id="card_bal_div${fieldCount}">
                        <label>Card Balance <span>*</span></label>
                        <input type="number"  step="any" name="card_balance_amount[]" class="form-control" required>
                    </div>
                    <div class="col-3" id="provider_bal_div${fieldCount}">
                        <label>Provider Card Balance <span>*</span></label>
                        <input type="number"  step="any" name="provider_balance_amount[]" class="form-control" required>
                    </div>
                    <div class="col-3 mt-4">
                        <button type="button" class="btn btn-danger btn-sm remove-field" data-field="${fieldCount}"> <i class="fa fa-minus"></i> Remove</button>
                     </div>
                </div>
                `;
            $("#form-fields").append(newFieldHtml);
        });
        $("#form-fields").on("click", ".remove-field", function() {
            let fieldToRemove = $(this).data("field");
            $("#field-" + fieldToRemove).remove();
        });
        $('#add_purchase_card_form').submit(function(event) 
        {
            event.preventDefault();
            var formData = new FormData($(this)[0]); 
            $.ajax({
                url: "{{route('purchase_card.store')}}",
                method: "POST",
                data: formData,
                contentType: false, 
                processData: false,
                success: function(response) {
                    if (response.success) 
                    {
                        $('#PurchaseCardModal').modal('hide');
                        $("#submit_btn").prop("disabled", true);
                        Swal.fire({
                                icon: 'success',
                                title: 'Success!',
                                text: response.message, // Display the success message from the server
                            }).then(() => {
                                // $('#purchase_card-datatable').DataTable().ajax.reload();
                                // response.data.forEach(item => {
                                //     table.row.add([
                                //     String(item.sl_no), 
                                //     item.card, 
                                //     item.provider,
                                //     item.added_user, 
                                //     item.added_date, 
                                //     '<i class="fa fa-edit edit_purchase_card" data-rowid="'+ item.id +'" data-id="' + item.id + '" data-bs-toggle="modal" data-bs-target="#EditModal"></i>']).draw(false);
                                //         });
                                //         table.page('first').draw(false);  
                                //         $(newRow.node()).attr('id', 'row' + response.data.id);
                                $("#add_purchase_card_form")[0].reset(); 
                                location.reload();
                            });
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
        $('#update_credit_repay_form').submit(function(event) {
            event.preventDefault();
            var formData = new FormData($(this)[0]);
            var rowId = $('#row_id').val();
            $.ajax({
                url: "{{route('credit_repayment.update')}}",
                method: "POST", 
                data: formData,
                contentType: false, 
                processData: false,
                success: function(response) {
                    if (response.success) 
                    {
                        $('#EditModal').modal('hide');
                        $('#update_credit_repay_form')[0].reset();
                        swal("Good job!", response.message, {
                            icon: "success",
                            buttons: {
                                confirm: {
                                className: "btn btn-success",
                                },
                            },
                        });
                        var table = $('#credit_repay-datatable').DataTable();
                        var row = table.row($('#row' + response.data.id));
                        row.data([
                                rowId,
                                response.data.repay_amount, 
                                response.data.repay_date,
                                response.data.added_by, 
                                response.data.added_date, 
                            '<i class="fa fa-edit edit_credit_repay"  data-rowid="'+ rowId  +'"  data-id="' + response.data.id + '" data-bs-toggle="modal" data-bs-target="#EditModal"></i>'
                        ]).draw(false);
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
        $('#update_pay_status_form').submit(function(event) {
            event.preventDefault();
            var formData = new FormData($(this)[0]);
            var rowId = $('#row_id').val();
            $.ajax({
                url: "{{route('credit_repayment.status_update')}}",
                method: "POST", 
                data: formData,
                contentType: false, 
                processData: false,
                success: function(response) {
                    if (response.success) 
                    {
                        $('#PayStatusModal').modal('hide');
                        $('#update_pay_status_form')[0].reset();
                        swal("Good job!", response.message, {
                            icon: "success",
                            buttons: {
                                confirm: {
                                className: "btn btn-success",
                                },
                            },
                        });
                       location.reload();
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
$(document).on("click", ".edit_credit_repay", function() {
   var credit_repay_id = $(this).data('id');
   $('#credit_repay_id').val(credit_repay_id);
   var row_id = $(this).data('rowid');
   $('#row_id').val(row_id);
   $.ajax({ type: "POST",
        url: "{{route('credit_repayment.show')}}",
        data: { "_token": "{{ csrf_token() }}",
                credit_repay_id:credit_repay_id
              },
        success: function(response) 
        {
            if(response.success)
            {
                $('#repay_amount').val(response.data.repay_amount);
                $('#repay_date').val(response.data.repay_date);
            }
        },
    });
});
</script> 
<script>
$(document).on("change", ".add_payment_type", function() {
   var payment_type = $(this).val();
   var count=$(this).data('count');
   if (payment_type==1) 
   {
        $('#card_div'+count).show();
        $('#provider_div'+count).show();
   }
   else if(payment_type==2) 
   {
        $('#card_div'+count).show();
        $('#provider_div'+count).show();
   }
   else if(payment_type==3)
   {
        $('#card_div'+count).hide();
        $('#provider_div'+count).hide();
        $('#provider_bal_div'+count).hide();
        $('#card_bal_div'+count).hide();
        $("#card_balance_amount").removeAttr("required");
        $("#provider_balance_amount").removeAttr("required");
   }
});
$(document).on("change", "#edit_payment_type", function() {
   var payment_type = $(this).val();
   if (payment_type==1) 
   {
        $('#edit_card_div').show();
        $('#edit_provider_div').show();
   }
   else if(payment_type==2) 
   {
        $('#edit_card_div').show();
        $('#edit_provider_div').show();
   }
});
$(document).on("keyup", "#taken_amount", function() {
   var taken_amount = $(this).val();
   var provider_id=$('#provider_id').find("option:selected").val();
   var card_id=$('#card_id').find("option:selected").val();
   $.ajax({ type: "POST",
        url: "{{route('purchase_card.getCardBalance')}}",
        data: { "_token": "{{ csrf_token() }}",
                 provider_id:provider_id,
                 card_id: card_id,
                 taken_amount:taken_amount
              },
        success: function(response) 
        {
            if(response.success)
            {
                $('#card_balance_amount').val(response.data.totalcardbalance);
                $('#provider_balance_amount').val(response.data.totalprovidercardbalance);
            }
            else
            {
                alert( response.message);
            }
        },
    });
    
});
</script>
@endpush
</x-admin1-layout>