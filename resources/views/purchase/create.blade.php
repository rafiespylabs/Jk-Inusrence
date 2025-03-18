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
                    <h2>Add Purchase</h2>
                </div>
                <div class="card-body">
                    <form id="purchaseForm" class="form" enctype="multipart/form-data">
                        @csrf
                        <div class="row form-group">
                            <div class="col-6">
                                <label>Invoice Number<span>*</span></label>
                                <input type="text"  name="invoice_num" id="add_invoice_num" class="form-control">
                                <span class="error-message" id="invoiceError"></span>
                            </div>
                            <div class="col-6">
                                <label>Purchase Date<span>*</span></label>
                                <input type="date"  name="purchase_date" id="add_purchase_date" class="form-control">
                                <span class="error-message" id="purchase_dateError"></span>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-6">
                                <label>Supplier</label>
                                <select  name="supplier_id"  id="add_supplier_id" class="form-control">
                                    <option value="">Select One</option>
                                    @foreach($suppliers as $supp)
                                    <option value="{{$supp->id}}">{{$supp->supplier_name}}</option>
                                    @endforeach
                                </select>
                                <span class="error-message" id="supplierError"></span>
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
                                                <th>Quantity</th>
                                                <th>Unit</th>
                                                <th>Purchase Rate</th>
                                                <th>Sale Rate</th>
                                                <th>MRP</th>
                                                <th>Subtotal</th>
                                                <th>Action</th>
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
                                                    <input type="number" class="form-control qty-input" name="qty[]" value="" min="1" placeholder="Quantity" >
                                                    <span class="error-message" id="qtyError0"></span>
                                                </td>
                                                <td>
                                                    <select class="form-control unit-select" name="unit_id[]">
                                                        <option value="">Select Unit</option>
                                                        @foreach($units as $unit)
                                                        <option value="{{$unit->id}}">{{$unit->unit_name}}</option>
                                                        @endforeach
                                                    </select>
                                                    <span class="error-message" id="unitError0"></span>
                                                </td>
                                                <td>
                                                    <input type="number" class="form-control pur_rate-input" name="pur_rate[]" value="" min="0" step="0.01" placeholder="Purchase Rate">
                                                    <span class="error-message" id="pur_rateError0"></span>
                                                </td>
                                                <td>
                                                    <input type="number" class="form-control sale_rate-input" name="sale_rate[]" value="" min="0" step="0.01" placeholder="Sale Rate">
                                                    <span class="error-message" id="sale_rateError0"></span>
                                                </td>
                                                <td>
                                                    <input type="number" class="form-control mrp-input" name="mrp[]" value="" min="0" step="0.01" placeholder="MRP">
                                                    <span class="error-message" id="mrpError0"></span>
                                                </td>
                                                <td>
                                                    <input type="number" class="form-control subtotal-input" name="subtotal[]" value="0" readonly>
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
                                    <label>Total Tax</label>
                                    <input type="number"  name="total_tax" id="total_tax" class="form-control" value="0" readonly>
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
                            <a href="{{route('purchases')}}"><button type="button" class="btn btn-secondary btn-lg">Back</button></a>
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
                                <select class="form-control item-select selectpicker with-ajax" data-live-search="true" name="item_id[]" id="item_id${counter}" data-count="${counter}">
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
                                <input type="number" class="form-control qty-input" name="qty[]" value="" min="1" placeholder="Quantity">
                                <span class="error-message" id="qtyError${counter}"></span>
                            </td>
                            <td>
                                <select class="form-control unit-select" name="unit_id[]">
                                    <option value="">Select Unit</option>
                                    @foreach($units as $unit)
                                    <option value="{{$unit->id}}">{{$unit->unit_name}}</option>
                                    @endforeach
                                </select>
                                <span class="error-message" id="unitError${counter}"></span>
                            </td>
                            <td>
                                <input type="number" class="form-control pur_rate-input" name="pur_rate[]" value="" min="0" step="0.01" placeholder="Purchase Rate">
                                <span class="error-message" id="pur_rateError${counter}"></span>
                            </td>
                            <td>
                                <input type="number" class="form-control sale_rate-input" name="sale_rate[]" value="" min="0" step="0.01" placeholder="Sale Rate">
                                <span class="error-message" id="sale_rateError${counter}"></span>
                            </td>
                            <td>
                                <input type="number" class="form-control mrp-input" name="mrp[]" value="" min="0" step="0.01" placeholder="MRP">
                                <span class="error-message" id="mrpError${counter}"></span>
                            </td>
                            <td>
                                <input type="number" class="form-control subtotal-input" name="subtotal[]" value="0" readonly>
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
$(document).on('input', '.qty-input, .pur_rate-input', function() {
    let row = $(this).closest('.item-row');
    let quantity = row.find('.qty-input').val();
    let price = row.find('.pur_rate-input').val();
    let amount = quantity * price;
    row.find('.subtotal-input').val(amount.toFixed(2));
    calculateTotalTaxableAmount();
    calculateTotalQty();
    calculateGrandTotal();
});
$('#purchaseForm').submit(function(event) {
    $('.error-message').text(''); 
    let isValid = true;
    if ($('#add_invoice_num').val() === "") {
        $('#invoiceError').text("Invoice Number is required.");
        isValid = false;
    }
    if ($('#add_purchase_date').val() === "") {
        $('#purchase_dateError').text("Purchase Date is required.");
        isValid = false;
    }
    if ($('#add_supplier_id').val() === "") {
        $('#supplierError').text("Supplier is required.");
        isValid = false;
    }
    $('.item-row').each(function(index) {
        let itemSelect = $(this).find('.item-select option:selected');
        let batchSelect = $(this).find('.batch-select');
        let unitSelect = $(this).find('.unit-select');
        let quantityInput = $(this).find('.qty-input');
        let purrateInput = $(this).find('.pur_rate-input');
        let salerateInput = $(this).find('.sale_rate-input');
        let mrpInput = $(this).find('.mrp-input');
        if (itemSelect.val() === "") {
            $('#itemError' + index).text("Item is required.");
            isValid = false;
        }
        if (batchSelect.val() === "") {
            $('#batchError' + index).text("Batch is required.");
            isValid = false;
        }
        if(unitSelect.val()===""){
            $('#unitError' + index).text("Unit is required.");
            isValid = false;
        }
        if(salerateInput.val()===""){
            $('#sale_rateError' + index).text("Sale Price is required.");
            isValid = false;
        }
        if(mrpInput.val()===""){
            $('#mrpError' + index).text("MRP is required.");
            isValid = false;
        }
        if (quantityInput.val() === "" || quantityInput.val() < 1) {
            $('#qtyError' + index).text("Quantity is required and must be greater than 0.");
            isValid = false;
        }
        if (purrateInput.val() === "" || purrateInput.val() < 0) {
            $('#pur_rateError' + index).text("Purchase Rate is required and must be greater than or equal to 0.");
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
            url: "{{ route('purchase.store') }}",  
            method: "POST",
            data: formData,
            contentType: false,  
            processData: false,  
            success: function(response) {
                if (response.success) 
                {
                    $('#CreateModal').modal('hide');  
                    $('#purchaseForm')[0].reset(); 
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
function calculateTotalTaxableAmount() {
    let TaxableAmount = 0;
    let quantity=0;
    $('.item-row').each(function() {
        let amount = parseFloat($(this).find('.pur_rate-input').val());
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
function calculateGrandTotal() {
    let GrandTotal=0;
    $('.item-row').each(function() {
        let subtotal=parseFloat($(this).find('.subtotal-input').val());
        if (!isNaN(subtotal)) { 
            GrandTotal += subtotal;
        }
    });
    $('#grand_total').val(GrandTotal);
}
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