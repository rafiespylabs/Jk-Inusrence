<x-admin1-layout>
    @push('styles')
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.14.0-beta2/dist/css/bootstrap-select.min.css">
    <style>
        .item-select {
            border: 1px solid #000 !important;
        }

        .form-step {
            display: none;
        }

        .form-step-active {
            display: block;
        }

        .error-message {
            color: red;
        }
    </style>
    @endpush

    <div class="page-inner">
        <div class="page-header"></div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h2>Add Purchase</h2>
                    </div>
                    <div class="card-body">
                        <form id="purchaseForm" class="form" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" id="purchase_id" name="purchase_id" value="">
                            <!-- Step 1: Purchase Details -->
                            <div id="step1" class="form-step form-step-active">
                                <h3>Step 1: Purchase Details</h3>
                                <div class="row form-group">
                                    <div class="col-6">
                                        <label>Invoice Number<span>*</span></label>
                                        <input type="text" name="invoice_num" id="add_invoice_num" class="form-control">
                                        <span class="error-message" id="invoiceError"></span>
                                    </div>
                                    <div class="col-6">
                                        <label>Purchase Date<span>*</span></label>
                                        <input type="date" name="purchase_date" id="add_purchase_date"
                                            class="form-control">
                                        <span class="error-message" id="purchase_dateError"></span>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col-6">
                                        <label>Supplier</label>
                                        <select name="supplier_id" id="add_supplier_id" class="form-control">
                                            <option value="">Select One</option>
                                            @foreach($suppliers as $supp)
                                            <option value="{{$supp->id}}">{{$supp->supplier_name}}</option>
                                            @endforeach
                                        </select>
                                        <span class="error-message" id="supplierError"></span>
                                    </div>
                                </div>
                                <div class="form-actions form-group mt-5">
                                    <button type="button" class="btn btn-primary btn-lg" id="nextStep1">Next</button>
                                </div>
                            </div>

                            <!-- Step 2: Add Items -->
                           
                            <!-- Step 3: Summary and Submit -->
                            <div id="step3" class="form-step">
                                <h3>Step 3: Summary</h3>
                                <p>Review the details before submitting.</p>
                                <!-- Display summary data here -->
                                <div class="form-actions form-group mt-5">
                                    <button type="submit" class="btn btn-success btn-lg">Submit Purchase</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
    <script>
        $(document).ready(function() {
        $('#nextStep1').click(function() {
            if(validateStep1()) {
                var formData = {
                        'invoice_num': $('#add_invoice_num').val(),
                        'purchase_date': $('#add_purchase_date').val(),
                        'supplier_id': $('#add_supplier_id').val(),
                        "_token": "{{ csrf_token() }}",
                        "total_taxable_amount":0.0,
                        "total_tax":0.0,
                        "total_qty":0,
                        "grand_total":0.0
                    };

                    $.ajax({
                        url: "{{ route('purchase.storePurchase') }}", 
                        type: 'POST',
                        data: formData,
                        success: function(response) {
                            if (response.success) {
                                $('#purchase_id').val(response.purchase_id);
                                window.location.href = "{{ url('/purchaseitem/addItems') }}/" + response.purchase_id;
                            } else {
                                alert('Error: ' + response.message);
                            }
                        },
                        error: function(xhr, status, error) {
                            console.log(error);
                        }
                    });
            }
        });
    
        $('#nextStep2').click(function() {
            if(validateStep2()) {
                $('#step2').removeClass('form-step-active');
                $('#step3').addClass('form-step-active');
            }
        });
    
        // Form validation for Step 1
        function validateStep1() {
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
            return isValid;
        }
    
        // Form validation for Step 2
        function validateStep2() {
            let isValid = true;
            // Additional validation for Step 2 (e.g., ensuring that at least one item is added)
            return isValid;
        }
    });
    </script>
    @endpush

</x-admin1-layout>