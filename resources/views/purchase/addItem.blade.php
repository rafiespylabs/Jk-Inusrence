<x-admin1-layout>
    @push('styles')
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.14.0-beta2/dist/css/bootstrap-select.min.css">
    <style>
        label {
            font-weight: 500;
        }

        #addItemForm {
            border: 0.5px solid #dfd4d4;
            padding: 15px;
        }

        .dropdown-toggle {
            border: 1px solid #00000040;
        }

        .amount-spacer {
            padding: 0px 5px;
        }

        .amount-value {
            color: darkgreen;
            font-size: 16px;
        }

        .total-block {
            padding: 5px;
            border: 1px solid #d9e3ef;
            background: #d9e3ef;
            margin: -8px -18px;

        }

        .total-block label {
            color: black !important;
        }
    </style>
    @endpush

    <div class="page-inner">
        <div class="page-header"></div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h2 style="float:left">Add Item</h2>
                        <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal"
                            data-bs-target="#addItemModal" style="float:right" id="addItem">Add
                            Item</button>
                    </div>
                    <div class="card-body">
                        <div class="row total-block mb-5">
                            <div class="col-3 d-flex align-items-center">
                                <label>Total Taxable Amount</label>
                                <span class="amount-spacer"> : </span>
                                <span class="amount-value" id="total_taxable_amount">0</span>
                            </div>
                            <div class="col-3 d-flex align-items-center">
                                <label>Total Tax</label>
                                <span class="amount-spacer"> : </span>
                                <span class="amount-value" id="total_tax">0</span>
                            </div>
                            <div class="col-3 d-flex align-items-center">
                                <label>Total Quantity</label>
                                <span class="amount-spacer"> : </span>
                                <span class="amount-value" id="total_qty">0</span>
                            </div>
                            <div class="col-3 d-flex align-items-center">
                                <label>Grand Total</label>
                                <span class="amount-spacer"> : </span>
                                <span class="amount-value" id="grand_total">0</span>
                            </div>
                        </div>

                        <table id="purchaseItemsTable" class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Sl No</th>
                                    <th>Item</th>
                                    <th>Batch</th>
                                    <th>Unit</th>
                                    <th>Quantity</th>
                                    <th>Purchase Rate</th>
                                    <th>Sale Rate</th>
                                    <th>MRP</th>
                                    <th>SubTotal</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <div class="modal fade" id="addItemModal" tabindex="-1" aria-labelledby="addItemModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addItemModalLabel">Add Item</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="addItemForm">
                        @csrf
                        <input id="purchase_id_item" name="purchase_id" value="{{$purchaseId}}" hidden />
                        <div id="itemRows" class="mb-3">
                            <div class="item-row">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Item Name</label>
                                        <div class="d-flex align-items-center">
                                            <select class="form-control item-select selectpicker with-ajax"
                                                style="border: 1px solid !important;" data-live-search="true"
                                                name="item_id" id="item_id">
                                                <option value="">Item Name</option>
                                                @foreach ($items as $item)
                                                <option value="{{ $item->id }}">{{ $item->item_name }} - {{
                                                    $item->item_code
                                                    }}</option>
                                                @endforeach
                                            </select>
                                            <button type="button" class="btn btn-primary ms-1" id="addItemButton">
                                                <i class="fa fa-plus"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label>Select Batch</label>
                                        <div class="d-flex align-items-center">
                                            <select class="form-control batch-select selectpicker with-ajax "
                                                style="border: 1px solid !important;" data-live-search="true"
                                                name="batch_id" id="batch_id">
                                                <option value="">Select Batch</option>
                                                @foreach ($batches as $batch)
                                                <option value="{{ $batch->id }}">{{ $batch->batch }}</option>
                                                @endforeach
                                            </select>
                                            <button type="button" class="btn btn-primary ms-1" id="addBatchButton">
                                                <i class="fa fa-plus"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <div class="row  mt-3">
                                    <div class="col-md-6">
                                        <label>ManuFacturer</label>
                                        <div class="d-flex align-items-center">
                                            <select class="form-control item-select selectpicker with-ajax"
                                                style="border: 1px solid !important;" data-live-search="true"
                                                name="manufacturer_id" id="manufacturer_id">
                                                <option value="">Select Manufacturer</option>
                                                @foreach ($manufacturers as $manufacturer)
                                                <option value="{{ $manufacturer->id }}">{{ $manufacturer->manufacturer
                                                    }}</option>
                                                @endforeach
                                            </select>
                                            <button type="button" class="btn btn-primary ms-1"
                                                id="addManufacturerButton">
                                                <i class="fa fa-plus"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label>HSN Code</label>
                                        <div class="d-flex align-items-center">
                                            <select class="form-control item-select selectpicker with-ajax"
                                                style="border: 1px solid !important;" data-live-search="true"
                                                name="hsn_code_id" id="hsn_code_id">
                                                <option value="">Select Hsncode</option>
                                                @foreach ($hsncodes as $hsncode)
                                                <option value="{{ $hsncode->id }}">{{ $hsncode->hsncode }} --
                                                    {{$hsncode->hsnvalue}}</option>
                                                @endforeach
                                            </select>
                                            <button type="button" class="btn btn-primary ms-1" id="addHsnButton">
                                                <i class="fa fa-plus"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-md-4">
                                        <label>Quantity</label>
                                        <input type="number" class="form-control qty-input" name="qty" min="1"
                                            placeholder="Quantity">
                                    </div>
                                    <div class="col-md-4">
                                        <label>Unit</label>
                                        <select class="form-control unit-select" name="unit_id">
                                            <option value="">Unit</option>
                                            @foreach($units as $unit)
                                            <option value="{{$unit->id}}">{{$unit->unit_name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-4">
                                        <label>Purchase Rate</label>
                                        <input type="number" class="form-control pur_rate-input" name="pur_rate" min="0"
                                            step="0.01" placeholder="Purchase Rate">
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-md-4">
                                        <label>Sale Rate</label>
                                        <input type="number" class="form-control sale_rate-input" name="sale_rate"
                                            min="0" step="0.01" placeholder="Sale Rate">
                                    </div>
                                    <div class="col-md-4">
                                        <label>MRP</label>
                                        <input type="number" class="form-control mrp-input" name="mrp" min="0"
                                            step="0.01" placeholder="MRP">
                                    </div>
                                    <div class="col-md-4">
                                        <label>Purchase Type</label>
                                        <select class="form-control unit-select" name="purchase_type_id">
                                            <option value="">Purchase Type</option>
                                            @foreach($purchasetypes as $purchasetype)
                                            <option value="{{$purchasetype->id}}">{{$purchasetype->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save Item</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="CreateModal" tabindex="-1" role="dialog" aria-labelledby="CreateModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Create item </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="create_items_form" class="form">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="item_name">Item Name</label>
                                    <input type="text" name="item_name" id="item_name_create" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="item_code">Item Code</label>
                                    <input type="text" name="item_code" id="item_code_create" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="category">Category</label>
                                    <select name="category_id" id="category_id_create" class="form-control" required>
                                        <option value="" selected>Select One</option>
                                        @foreach ($category as $cat)
                                        <option value="{{ $cat->id }}">{{ $cat->category_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="subcategory">Subcategory</label>
                                    <select id="subcategory_id_create" name="subcategory_id"
                                        class="form-control category-dropdown">
                                        <option value="">Select Subcategory</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="hsn_code">HSN Code</label>
                                    <select name="hsn_code_id" id="hsn_code_id_create" class="form-control">
                                        <option value="" selected>Select One</option>
                                        @foreach ($hsncodes as $code)
                                        <option value="{{ $code->id }}">{{ $code->hsncode }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="hsn_code_value">HSN Value</label>
                                    <input type="text" id="hsn_code_value_create" class="form-control" readonly>
                                </div>

                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="type" class="form-label">Type</label>
                                    <select name="type" id="type_create" class="form-control" required>
                                        <option value="" selected>Select One</option>
                                        <option value="1">Service</option>
                                        <option value="2">Parts</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="unit">Unit</label>
                                    <select name="unit_id" id="unit_id_create" class="form-control" required>
                                        <option value="" selected>Select One</option>
                                        @foreach ($units as $uni)
                                        <option value="{{ $uni->id }}">{{ $uni->unit_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="manufacturer_id" class="form-label">Manufacturer</label>
                                    <select name="manufacturer_id" id="manufacturer_id_create" class="form-control">
                                        <option value="" selected>Select One</option>
                                        @foreach($manufacturers as $manufact)
                                        <option value="{{$manufact->id}}">{{$manufact->manufacturer}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-actions form-group">
                            <button type="submit" class="btn btn-primary btn-sm">Submit</button>
                            <button type="button" class="btn btn-secondary btn-sm"
                                data-bs-dismiss="modal">Cancel</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="CreateHsnModal" tabindex="-1" role="dialog" aria-labelledby="CreateModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <e class="modal-title">Create hsn code</h5>
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                </div>
                <div class="modal-body">
                    <form id="create_hsncodes_form" class="form">
                        @csrf
                        <div class="form-group">
                            <label for="hsncode">HSN Code</label>
                            <input type="text" name="hsncode" id="hsncode" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="hsnvalue">HSN Value</label>
                            <input type="number" name="hsnvalue" id="hsnvalue" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="cgst_perc">CGST Percentage</label>
                            <input type="number" name="cgst_perc" id="cgst_perc" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="sgst_perc">SGST Percentage</label>
                            <input type="number" name="sgst_perc" id="sgst_perc" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="igst_perc">IGST Percentage</label>
                            <input type="number" name="igst_perc" id="igst_perc" class="form-control" required>
                        </div>
                        <div class="form-actions form-group">
                            <button type="submit" class="btn btn-primary btn-sm">Submit</button>
                            <button type="button" class="btn btn-secondary btn-sm"
                                data-bs-dismiss="modal">Cancel</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="CreateManufacturerModal" tabindex="-1" role="dialog" aria-labelledby="CreateModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Create Manufacturer</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="create_manufacturers_form" class="form">
                        @csrf
                        <div class="form-group">
                            <label for="manufacturer">Manufacturer</label>
                            <input type="text" name="manufacturer" id="manufacturer" class="form-control" required>
                        </div>
                        <div class="form-actions form-group">
                            <button type="submit" class="btn btn-primary btn-sm">Submit</button>
                            <button type="button" class="btn btn-secondary btn-sm"
                                data-bs-dismiss="modal">Cancel</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="CreateBatchModal" tabindex="-1" role="dialog" aria-labelledby="CreateModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Create Batch</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="Create_BatchModal_form" class="form">
                        @csrf
                        <div class="form-group">
                            <label>Item Name</label>
                            <select class="form-control item-select selectpicker with-ajax"
                                style="border: 1px solid !important;" data-live-search="true" name="item_id_batch"
                                id="item_id_batch">
                                <option value="">Item Name</option>
                                @foreach ($items as $item)
                                <option value="{{ $item->id }}">{{ $item->item_name }} - {{
                                    $item->item_code
                                    }}</option>
                                @endforeach
                            </select>
                            <div>
                                <div class="form-group">
                                    <label for="manufacturer">Batch</label>
                                    <input type="text" name="batch" id="newBatch" class="form-control" value=""
                                        readonly>
                                </div>
                            </div>
                            <div class="form-actions form-group">
                                <button type="submit" class="btn btn-primary btn-sm">Submit</button>
                                <button type="button" class="btn btn-secondary btn-sm"
                                    data-bs-dismiss="modal">Cancel</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    @push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.14.0-beta2/dist/js/bootstrap-select.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/ajax-bootstrap-select@1.4.4/dist/js/ajax-bootstrap-select.min.js">
    </script>
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
    <script>
        $(document).ready(function(){
    $(".selectpicker").selectpicker({
    });

    getTotalValues();

    var table = $('#purchaseItemsTable').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url: "{{ route('purchaseitem.list') }}", 
                type: "GET",
                data: function (d) {
                    d.purchase_id = {{$purchaseId}}; 
                }
            },
            columns: [
                { data: 'sl_no', name: 'sl_no', orderable: false, searchable: false },
                { data: 'item', name: 'item' },
                { data: 'batch', name: 'batch' },
                { data: 'unit', name: 'unit' },
                { data: 'quantity', name: 'quantity' },
                { data: 'purchase_rate', name: 'purchase_rate' },
                { data: 'sale_rate', name: 'sale_rate' },
                { data: 'mrp', name: 'mrp' },
                { data: 'subtotal', name: 'subtotal' },
                { data: 'action', name: 'action', orderable: false, searchable: false }
            ]
        });

    function getTotalValues(){
        $.ajax({
            url: "{{ route('purchaseitem.calculateTotals') }}", 
            method: "GET",
            success: function(response) {
                $('#total_taxable_amount').html(response.total_purchase_amount);
                $('#total_tax').html(response.total_sale_amount);
                $('#total_qty').html(response.total_qty);
                $('#grand_total').html(response.total_subtotal);
            },
            error: function(xhr) {
                alert("Error: " + xhr.responseJSON.message);
            }
        });
    }

    function editItemModal($id){

    }

    $("#addItemForm").on("submit", function (e) {
            e.preventDefault(); 
            
            let formData = new FormData(this); 
            formData.append("purchase_id", $("#purchase_id_item").val());
            
            $.ajax({
                url: "{{ route('purchaseitem.saveItems') }}", 
                type: "POST",
                data: formData,
                processData: false,
                contentType: false,
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content") 
                },
                beforeSend: function () {
                    $("#addItemForm button[type='submit']").prop("disabled", true).text("Saving...");
                },
                success: function (response) {
                    if (response.success) {
                        alert("Item added successfully!");
                        $("#addItemModal").modal("hide");
                        $("#addItemForm")[0].reset();
                        $(".selectpicker").selectpicker("refresh");
                    } else {
                        alert("Error: " + response.message);
                    }
                },
                error: function (xhr) {
                    let errors = xhr.responseJSON.errors;
                    let errorMessages = "";
                    $.each(errors, function (key, value) {
                        errorMessages += value[0] + "\n";
                    });
                    alert("Validation Error:\n" + errorMessages);
                },
                complete: function () {
                    table.ajax.reload();
                    $("#addItemForm button[type='submit']").prop("disabled", false).text("Save Item");
                }
            });
        });

        $('#create_manufacturers_form').submit(function(event) {
                    event.preventDefault();
                    var formData = new FormData($(this)[0]);  
                    $.ajax({
                        url: "{{ route('manufacturers.store') }}", 
                        method: "POST",
                        data: formData,
                        contentType: false,
                        processData: false,
                        success: function(response) {
                            let manufacturerSelect = $("#manufacturer_id");
                            manufacturerSelect.append(new Option(response.data.manufacturer, response.data.id, true, true));
                            manufacturerSelect.val(response.data.id).change();
                            manufacturerSelect.selectpicker("refresh");
                            $('#CreateManufacturerModal').modal('hide');
                        }});
                    });

                    $('#create_hsncodes_form').submit(function(event) {
                    event.preventDefault();
                    var formData = new FormData($(this)[0]);  
                    $.ajax({
                        url: "{{ route('hsncodes.store') }}", 
                        method: "POST",
                        data: formData,
                        contentType: false,
                        processData: false,
                        success: function(response) {
                            if (response.success) {
                                let hsncodeSelect = $("#hsn_code_id");
                                hsncodeSelect.append(new Option(response.data.hsncode, response.data.id, true, true));
                                hsncodeSelect.val(response.data.id).change();
                                hsncodeSelect.selectpicker("refresh");
                            $('#CreateHsnModal').modal('hide');
                            }}});
                        });

        $("#item_id").on("change", function () {
            let itemId = $(this).val();

            if (itemId) {
                $.ajax({
                    url: "{{ route('purchaseitem.getItemDetails') }}",
                    type: "POST",
                    data: { "_token": "{{ csrf_token() }}",item_id: itemId },
                    success: function (response) {
                        if (response.success) {
                            console.log(response.data.batches);
                            let manufacturerSelect = $("#manufacturer_id");
                            manufacturerSelect.val(response.data.manufacturer_id).change();
                            manufacturerSelect.selectpicker("refresh");
                            let hsconde = $("#hsn_code_id");
                            hsconde.val(response.data.hsn_code_id).change();
                            hsconde.selectpicker("refresh");
                            let batchSelect = $("#batch_id");
                            batchSelect.empty();
                            batchSelect.append('<option value="">Select Batch</option>');
                            $.each(response.data.batches, function(index, batch) {
                                batchSelect.append(new Option(batch.batch, batch.id));
                            });
                            batchSelect.selectpicker("refresh");
                        }
                    },
                    error: function () {
                        alert("Failed to fetch item details.");
                    }
                });
            }
        });

        $('#Create_BatchModal_form').submit(function(event) {
                    event.preventDefault();
                    var formData = new FormData($(this)[0]);  
                    $.ajax({
                        url: "{{ route('purchaseitem.addBatch') }}", 
                        method: "POST",
                        data: formData,
                        contentType: false,
                        processData: false,
                        success: function(response) {
                            let batchSelect = $("#batch_id");
                            batchSelect.empty();
                            batchSelect.append('<option value="">Select Batch</option>');
                            $.each(response.batches, function(index, batch) {
                                batchSelect.append(new Option(batch.batch, batch.id));
                            });
                            batchSelect.selectpicker("refresh");
                            $('#CreateBatchModal').modal('hide');
                        }
                    });
                });

        $("#item_id_batch").on("change", function () {
            let itemId = $(this).val();
            if (itemId) {
                $.ajax({
                    url: "{{ route('purchaseitem.getBatchForItem') }}",
                    type: "POST",
                    data: { "_token": "{{ csrf_token() }}",item_id: itemId },
                    success: function (response) {
                        if (response.success) {
                            $('#newBatch').val(response.data.newBatch);
                        }
                    },
                    error: function () {
                        alert("Failed to fetch item details.");
                    }
                });
            }
        });

        $('#addItemButton').on('click', function () {
            $('#CreateModal').modal('show');
        });

        $('#addManufacturerButton').on('click', function () {
            $('#CreateManufacturerModal').modal('show');
        });

        $('#addHsnButton').on('click', function () {
            $('#CreateHsnModal').modal('show');
        });

        $('#addBatchButton').on('click', function () {
            $('#CreateBatchModal').modal('show');
        });


        $('#create_items_form').submit(function(event) {
                event.preventDefault(); 
                var formData = new FormData($(this)[0]);  

                $.ajax({
                    url: "{{ route('items.store') }}",  
                    method: "POST",
                    data: formData,
                    contentType: false,  
                    processData: false,  
                    success: function(response) {
                        let itemNewId = $('#item_id');
                        itemNewId.append(new Option(response.data.item_name, response.data.id, true, true));
                        itemNewId.val(response.data.id).change();
                        itemNewId.selectpicker("refresh");
                        $('#CreateModal').modal('hide');
                    }
                });
        });

        $(document).on('change', '#category_id_create', function() {
                    let categoryId = $(this).val();
                    fetchSubcategories(categoryId, '#subcategory_id_create');
                });

                function fetchSubcategories(categoryId, targetDropdown, selectedSubcategoryId = null) {
                    if (categoryId) {
                        $.ajax({
                            url: "{{ route('get.subcategories') }}",
                            method: "POST",
                            data: {
                                "_token": "{{ csrf_token() }}",
                                "category_id": categoryId
                            },
                            success: function(response) {
                                if (response.success) {
                                    let subcategories = response.data;
                                    $(targetDropdown).empty().append('<option value="">Select Subcategory</option>');
                                    subcategories.forEach(function(subcategory) {
                                        $(targetDropdown).append(
                                            `<option value="${subcategory.id}" ${
                                            selectedSubcategoryId == subcategory.id ? 'selected' : ''
                                        }>${subcategory.subcategory_name}</option>`
                                        );
                                    });
                                }
                            },

                            error: function(xhr, status, error) {
                                console.error('Error fetching subcategories:', error);
                            }
                        });
                    } else {
                            $(targetDropdown).empty().append('<option value="">Select Subcategory</option>');
                    }
                }

                $('#hsn_code_id_create').change(function () {
                    var hsnCodeId = $(this).val(); 
                    if (hsnCodeId) {
                        $.ajax({
                            url: '/items/' + hsnCodeId, 
                            type: 'GET',
                            dataType: 'json',
                            success: function (response) {
                                if (response.hsn_code) {
                                    $('#hsn_code_value_create').val(response.hsn_code);
                                } else {
                                    $('#hsn_code_value_create').val('');
                                }
                            },
                            error: function () {
                                $('#hsn_code_value_create').val('');
                            }
                        });
                    } else {
                        $('#hsn_code_value_create').val('');
                    }
                });
        
});
    </script>
    @endpush
</x-admin1-layout>