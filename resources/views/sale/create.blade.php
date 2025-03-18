<x-admin1-layout>
@push('styles')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.14.0-beta2/dist/css/bootstrap-select.min.css">
<style>
    .item-select{
        border:1px solid #000 !important;
    }
</style>
@endpush
<div class="page-inner">
    <div class="page-header">
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h2>Add Sale</h2>
                </div>
                <div class="card-body">
                    <form id="saleForm" class="form" enctype="multipart/form-data">
                        @csrf
                        <div class="row form-group">
                            <div class="col-6">
                                <label>Invoice Number<span>*</span></label>
                                <input type="text"  name="sale_invoice_num" id="add_sale_invoice_num" class="form-control">
                                <span class="error-message" id="sale_invoiceError"></span>
                            </div>
                            <div class="col-6">
                                <label>Sale Date<span>*</span></label>
                                <input type="date"  name="sale_date" id="add_sale_date" class="form-control">
                                <span class="error-message" id="sale_dateError"></span>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-6">
                                <label>Client</label>
                                <select  name="client_id"  id="add_client_id" class="form-control">
                                    <option value="">Select One</option>
                                    @foreach($clients as $client)
                                    <option value="{{$client->id}}">{{$client->client_name}}</option>
                                    @endforeach
                                </select>
                                <span class="error-message" id="clientError"></span>
                            </div>
                            <div class="col-6">
                                <label>Gst Type</label>
                                <select  name="gst_type"  id="add_gst_type" class="form-control select_gst_type">
                                    <option value="">Select One</option>
                                    <option value="1">Kerala</option>
                                    <option value="2">Other </option>
                                </select>
                                <span class="error-message" id="gst_typeError"></span>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-6">
                                <label>Sale Type</label>
                                <select  name="sale_type_id"  id="add_sale_type_id" class="form-control">
                                    <option value="">Select One</option>
                                    @foreach($saletypes as $saletype)
                                    <option value="{{$saletype->id}}">{{$saletype->name}}</option>
                                    @endforeach
                                </select>
                                <span class="error-message" id="sale_typeError"></span>
                            </div>
                        </div>
                        <hr>
                        <h3>Items</h3>
                        <div id="itemRows" class="mb-3">
                            <div class="item-row"> 
                                <div class="row">
                                    <table>
                                        <thead>
                                            <tr>
                                                <th>Item</th>
                                                <th>Batch</th>
                                                <th>Sale Rate</th>
                                                <th>HSN</th>
                                                <th>Unit</th>
                                                <th>Quantity</th>
                                                <th>Sub Taxable Amount</th>
                                                <th>CGST</th>
                                                <th>SGST</th>
                                                <th>IGST</th>
                                                <th>Subtotal</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <select class="form-control item-select selectpicker with-ajax" data-live-search="true" name="item_id[]" id="item_id0" data-count="0" >
                                                        <option value="">Select Item</option>
                                                        @foreach ($items as $item)
                                                            <option value="{{ $item->id }}">{{ $item->item_name }} - {{ $item->item_code }}</option>
                                                        @endforeach
                                                    </select>
                                                    <span class="error-message" id="itemError0"></span>
                                                </td>
                                                <td>
                                                    <select class="form-control batch-select" name="batch_id[]" id="batch_id0" data-count="0">
                                                        <option value="">Select Batch</option>
                                                    </select>
                                                    <span class="error-message" id="batchError0"></span>
                                                </td>
                                                <td>
                                                    <input type="number" class="form-control sale_rate-input" id="sale_rate0" name="sale_rate[]" value="" min="0" step="0.01" placeholder="Sale Rate">
                                                    <span class="error-message" id="sale_rateError0"></span>
                                                </td>
                                                <td>
                                                    <select class="form-control hsn-select" name="hsn_id[]">
                                                        <option value="">Select HSN</option>
                                                        @foreach($hsncodes as $hsncode)
                                                        <option value="{{$hsncode->id}}">{{$hsncode->hsncode}}</option>
                                                        @endforeach
                                                    </select>
                                                    <span class="error-message" id="hsn_idError0"></span>
                                                </td>
                                                <td>
                                                    <select class="form-control unit-select" name="unit_id[]">
                                                        <option value="">Select Unit</option>
                                                        @foreach($units as $unit)
                                                        <option value="{{$unit->id}}">{{$unit->unit_name}}</option>
                                                        @endforeach
                                                    </select>
                                                    <span class="error-message" id="unit_idError0"></span>
                                                </td>
                                                <td>
                                                    <input type="number" class="form-control qty-input" name="qty[]" value="" min="1" placeholder="Quantity" >
                                                    <span class="error-message" id="qtyError0"></span>
                                                </td>
                                                <td>
                                                    <input type="number" class="form-control sub_taxable_amount-input" name="sub_taxable_amount[]" value="0" readonly>
                                                    <span class="error-message" id="sub_taxableError0"></span>
                                                </td>
                                                <td>
                                                    <input type="number" class="form-control cgst_input" name="cgst[]" value="0" readonly>
                                                    <span class="error-message" id="cgstError0"></span>
                                                </td>
                                                <td>
                                                    <input type="number" class="form-control sgst_input" name="sgst[]" value="0" readonly>
                                                    <span class="error-message" id="sgstError0"></span>
                                                </td>
                                                <td>
                                                    <input type="number" class="form-control igst_input" name="igst[]" value="0" readonly>
                                                    <span class="error-message" id="igstError0"></span>
                                                </td>
                                                <td>
                                                    <input type="number" class="form-control subtotal_amount-input" name="subtotal_amount[]" value="0" readonly>
                                                    <span class="error-message" id="subtotal_amountError0"></span>
                                                </td>
                                                <td>
                                                    <button type="button" class="btn btn-danger remove-item"><i class="fa fa-minus"></i></button>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <button type="button" class="btn btn-primary btn-sm" id="addItem">Add Item</button>
                            <div class="d-flex justify-content-end">
                                <div class="col-3">
                                    <label>Total Taxable Amount</label>
                                    <input type="number"  name="total_taxable_amount" id="total_taxable_amount" class="form-control" value="0"  readonly>
                                </div>
                            </div>
                            <div class="d-flex justify-content-end">
                                <div class="col-3">
                                    <label>Total CSGT</label>
                                    <input type="number"  name="total_cgst" id="total_cgst" class="form-control" value="0" readonly>
                                </div>
                            </div>
                            <div class="d-flex justify-content-end">
                                <div class="col-3">
                                    <label>Total SGST</label>
                                    <input type="number"  name="total_sgst" id="total_sgst" class="form-control" value="0" readonly>
                                </div>
                            </div>
                            <div class="d-flex justify-content-end">
                                <div class="col-3">
                                    <label>Total IGST</label>
                                    <input type="number"  name="total_igst" id="total_igst" class="form-control" value="0" readonly>
                                </div>
                            </div>
                            <div class="d-flex justify-content-end">
                                <div class="col-3">
                                    <label>Total Quantity</label>
                                    <input type="number"  name="total_qty" id="total_qty" class="form-control" value="0"  readonly>
                                </div>
                            </div>
                            <div class="d-flex justify-content-end">
                                <div class="col-3">
                                    <label>Grand Total</label>
                                    <input type="number"  name="grand_total" id="grand_total" class="form-control" value="0" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="form-actions form-group mt-5">
                            <button type="submit" class="btn btn-primary btn-lg"><i class="fa fa-save"></i> Save</button>
                            <a href="{{route('sales')}}"><button type="button" class="btn btn-secondary btn-lg">Back</button></a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>   
@push('scripts')
<script type="text/javascript">
$(document).ready(function() {
    let counter = 1; 
    $('#addItem').click(function() {
        let newItemRow = `
        <div class="item-row"> 
            <div class="row">
                <table>
                     <tbody>
                        <tr>
                            <td>
                                <select class="form-control item-select selectpicker with-ajax" data-live-search="true" name="item_id[]" id="item_id${counter}" data-count="${counter}" >
                                    <option value="">Select Item</option>
                                    @foreach ($items as $item)
                                        <option value="{{ $item->id }}">{{ $item->item_name }} - {{ $item->item_code }}</option>
                                    @endforeach
                                </select>
                                <span class="error-message" id="itemError${counter}"></span>
                            </td>
                            <td>
                                <select class="form-control batch-select" name="batch_id[]" id="batch_id${counter}" data-count="${counter}">
                                    <option value="">Select Batch</option>
                                </select>
                                <span class="error-message" id="batchError${counter}"></span>
                            </td>
                            <td>
                                <input type="number" class="form-control sale_rate-input" id="sale_rate${counter}" name="sale_rate[]" value="" min="0" step="0.01" placeholder="Sale Rate">
                                <span class="error-message" id="sale_rateError${counter}"></span>
                            </td>
                            <td>
                                <select class="form-control hsn-select" name="hsn_id[]">
                                    <option value="">Select HSN</option>
                                    @foreach($hsncodes as $hsncode)
                                    <option value="{{$hsncode->id}}">{{$hsncode->hsncode}}</option>
                                    @endforeach
                                </select>
                                <span class="error-message" id="hsn_idError${counter}"></span>
                            </td>
                             <td>
                                <select class="form-control unit-select" name="unit_id[]">
                                    <option value="">Select Unit</option>
                                    @foreach($units as $unit)
                                    <option value="{{$unit->id}}">{{$unit->unit_name}}</option>
                                    @endforeach
                                </select>
                                <span class="error-message" id="unit_idError${counter}"></span>
                            </td>
                            <td>
                                <input type="number" class="form-control qty-input" name="qty[]" value="" min="1" placeholder="Quantity" >
                                <span class="error-message" id="qtyError${counter}"></span>
                            </td>
                            <td>
                                <input type="number" class="form-control sub_taxable_amount-input" name="sub_taxable_amount[]" value="0" readonly>
                                <span class="error-message" id="sub_taxableError${counter}"></span>
                            </td>
                            <td>
                                <input type="number" class="form-control cgst_input" name="cgst[]" value="0" readonly>
                                <span class="error-message" id="cgstError${counter}"></span>
                            </td>
                            <td>
                                <input type="number" class="form-control sgst_input" name="sgst[]" value="0" readonly>
                                <span class="error-message" id="sgstError${counter}"></span>
                            </td>
                            <td>
                                <input type="number" class="form-control igst_input" name="igst[]" value="0" readonly>
                                <span class="error-message" id="igstError${counter}"></span>
                            </td>
                            <td>
                                <input type="number" class="form-control subtotal_amount-input" name="subtotal_amount[]" value="0" readonly>
                                <span class="error-message" id="subtotal_amountError${counter}"></span>
                            </td>
                            <td>
                                <button type="button" class="btn btn-danger remove-item"><i class="fa fa-minus"></i></button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>`;
        $('#itemRows').append(newItemRow);
        $(".selectpicker").selectpicker('refresh');
        counter++;
    });
    $(document).on('click', '.remove-item', function() {
        $(this).closest('.item-row').remove();
    });
});
</script> 
<script>
$(document).on("change", ".item-select", function() {
   var item_id = $(this).val();
   var count=$(this).data('count');
   $('#batch_id'+count).prop('disabled', true).html('<option value="">Loading...</option>');
   $.ajax({ type: "POST",
        url: "{{route('item.getbatches')}}",
        data: { "_token": "{{ csrf_token() }}",
                item_id:item_id
              },
        success: function(res) 
        {
            if(res.success)
            {
                $('#batch_id'+count).prop('disabled', false).html('<option value="">Select One</option>');
                $.each(res.batches, function(index, batch) {
                    $('#batch_id'+count).append('<option value="' + batch.id + '">' + batch.batch + '</option>');
                });
            }
        },
    });
});
$(document).on("change", ".batch-select", function() {
   var batch_id = $(this).val();
   var count=$(this).data('count');
   var item_id=$('#item_id'+count).val();
   $.ajax({ type: "POST",
        url: "{{route('sale.getsale_rate')}}",
        data: { "_token": "{{ csrf_token() }}",
                 batch_id:batch_id,
                 item_id:item_id
              },
        success: function(res) 
        {
            if(res.success)
            {
                if(res.live_stock)
                {
                    $('#sale_rate'+count).val(res.live_stock.sale_rate);
                }
                else{
                    $('#sale_rate'+count).val(0);
                }
            }
        },
    });
});
$(document).on('keyup', '.qty-input, .sale_rate-input', function() {
    let row = $(this).closest('.item-row');
    let quantity = row.find('.qty-input').val();
    let price = row.find('.sale_rate-input').val();
    let hsn_id=row.find('.hsn-select').val();
    let gst_type=$('.select_gst_type').val();
    let subtotal_amount=0;
    let cgst_per=0;
    let sgst_per=0;
    let cgst_value=0;
    let sgst_value=0;
    let igst_per=0;
    let  igst_value=0;
    if(!gst_type)
    {
        alert('Please Select Gst Type');
    }
    else
    {
        let amount = quantity * price;
        $.ajax({ type: "POST",
            url: "{{route('sale.getHsn')}}",
            data: { "_token": "{{ csrf_token() }}",
                    hsn_id:hsn_id,
                },
            success: function(res) 
            {
                if(res.success)
                {
                    if(gst_type==1)
                    {
                            cgst_per=res.cgst;
                            sgst_per=res.sgst;
                            cgst_value=(amount*cgst_per)/100;
                            sgst_value=(amount*sgst_per)/100;
                            row.find('.cgst_input').val(cgst_value.toFixed(2));
                            row.find('.sgst_input').val(sgst_value.toFixed(2));
                            row.find('.igst_input').val(0);
                            subtotal_amount=(amount+cgst_value+sgst_value);
                    }
                    else if(gst_type==2)
                    {
                            igst_per=res.igst;
                            igst_value=(amount*igst_per)/100;
                            row.find('.cgst_input').val(0);
                            row.find('.sgst_input').val(0);
                            row.find('.igst_input').val(igst_value);
                            subtotal_amount=(amount+igst_value);
                    }
                    console.log(cgst_value);
                    row.find('.sub_taxable_amount-input').val(amount.toFixed(2));
                    row.find('.subtotal_amount-input').val(subtotal_amount.toFixed(2));
                    calculateTotalTaxableAmount();
                    calculateTotalQty();
                    calculateGrandTotal(gst_type);
                    calculateTotalCgst();
                    calculateTotalSgst();
                    calculateTotalIgst();
                }
            },
        });
    }
});
function calculateTotalTaxableAmount() {
    let TaxableAmount = 0;
    let quantity=0;
    $('.item-row').each(function() {
        let amount = parseFloat($(this).find('.sale_rate-input').val());
        let quantity=parseFloat($(this).find('.qty-input').val());
        if (!isNaN(amount)) { 
            TaxableAmount += (amount*quantity);
        }
    });
    $('#total_taxable_amount').val(TaxableAmount.toFixed(2));
}
function calculateTotalQty() {
    let Totalquantity=0;
    $('.item-row').each(function() {
        let quantity=parseFloat($(this).find('.qty-input').val());
        if (!isNaN(quantity)) { 
            Totalquantity += quantity;
        }
    });
    $('#total_qty').val(Totalquantity);
}
function calculateGrandTotal(gst_type) {
    let GrandTotal=0;
    $('.item-row').each(function() {
        let sub_taxable_amount = parseFloat($(this).find('.sub_taxable_amount-input').val());
        let cgst_input=parseFloat($(this).find('.cgst_input').val());
        let sgst_input=parseFloat($(this).find('.sgst_input').val());
        let igst_input=parseFloat($(this).find('.igst_input').val());
        let sub_total_amount=0;
        if (!isNaN(sub_taxable_amount)) { 
            if(gst_type==1)
            {
                sub_total_amount=sub_taxable_amount+(cgst_input+sgst_input);
            }
            else if(gst_type==2)
            {
                
                sub_total_amount=sub_taxable_amount+igst_input;
            }
            GrandTotal += sub_total_amount;
        }
    });
    $('#grand_total').val(GrandTotal);
}
function calculateTotalCgst() {
    let Totalcgst=0;
    $('.item-row').each(function() {
        let cgst=parseFloat($(this).find('.cgst_input').val());
        if (!isNaN(cgst)) { 
            Totalcgst += cgst;
        }
    });
    $('#total_cgst').val(Totalcgst);
}
function calculateTotalSgst() {
    let Totalsgst=0;
    $('.item-row').each(function() {
        let sgst=parseFloat($(this).find('.sgst_input').val());
        if (!isNaN(sgst)) { 
            Totalsgst += sgst;
        }
    });
    $('#total_sgst').val(Totalsgst);
}
function calculateTotalIgst() {
    let Totaligst=0;
    $('.item-row').each(function() {
        let sgst=parseFloat($(this).find('.igst_input').val());
        if (!isNaN(sgst)) { 
            Totaligst += sgst;
        }
    });
    $('#total_igst').val(Totaligst);
}
$('#saleForm').submit(function(event) {
    $('.error-message').text(''); 
    let isValid = true;
    if ($('#add_sale_invoice_num').val() === "") {
        $('#sale_invoiceError').text("Sale Invoice Number is required.");
        isValid = false;
    }
    if ($('#add_sale_date').val() === "") {
        $('#sale_dateError').text("Sale Date is required.");
        isValid = false;
    }
    if ($('#add_client_id').val() === "") {
        $('#clientError').text("Supplier is required.");
        isValid = false;
    }
    if ($('#add_gst_type').val() === "") {
        $('#gst_typeError').text("Gst Type is required.");
        isValid = false;
    }
    if ($('#add_sale_type_id').val() === "") {
        $('#sale_typeError').text("Sale Type is required.");
        isValid = false;
    }
    $('.item-row').each(function(index) {
        let itemSelect = $(this).find('.item-select option:selected');
        let batchSelect = $(this).find('.batch-select');
        let hsnSelect = $(this).find('.hsn-select');
        let unitSelect = $(this).find('.unit-select');
        let quantityInput = $(this).find('.qty-input');
        let salerateInput = $(this).find('.sale_rate-input');
        if (itemSelect.val()=== "") {
            $('#itemError' + index).text("Item is required.");
            isValid = false;
        }
        if (batchSelect.val() === "") {
            $('#batchError' + index).text("Batch is required.");
            isValid = false;
        }
        if(unitSelect.val()===""){
            $('#unit_idError' + index).text("Unit is required.");
            isValid = false;
        }
        if(salerateInput.val()===""){
            $('#sale_rateError' + index).text("Sale Price is required.");
            isValid = false;
        }
        if (quantityInput.val() === "" || quantityInput.val() < 1) {
            $('#qtyError' + index).text("Quantity is required and must be greater than 0.");
            isValid = false;
        }
        if (hsnSelect.val() === "") {
            $('#hsn_idError' + index).text("HSN is required");
            isValid = false;
        }
    });
    if (!isValid) 
    {
        event.preventDefault(); 
    }
    else
    {
        event.preventDefault(); 
        var formData = new FormData($(this)[0]);  
        $.ajax({
            url: "{{ route('sale.store') }}",  
            method: "POST",
            data: formData,
            contentType: false,  
            processData: false,  
            success: function(response) {
                if (response.success) 
                {
                    $('#saleForm')[0].reset(); 
                    $(".selectpicker").selectpicker('refresh');
                    swal("Success!", response.message, {
                        icon: "success",
                        buttons: {
                            confirm: {
                                className: "btn btn-success",
                            },
                        },
                    });
                } 
                else 
                {
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
    }
});
</script> 
<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.14.0-beta2/dist/js/bootstrap-select.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/ajax-bootstrap-select@1.4.4/dist/js/ajax-bootstrap-select.min.js"></script>
<script>
$(document).ready(function(){
    $(".selectpicker").selectpicker({
    });
});
</script>
@endpush
</x-admin1-layout>