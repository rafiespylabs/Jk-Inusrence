<x-admin1-layout>
    <div class="page-inner">
        <div class="page-header"></div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex align-items-center">
                            <button class="btn btn-primary btn-round ms-auto" data-bs-toggle="modal"
                                data-bs-target="#CreateModal">
                                <i class="fa fa-plus"></i> Create
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div id="preloader" style="display:none;">
                            <img src="{{ asset('web/preloader.gif') }}">
                        </div>
                        <div class="table-responsive">
                            <table id="openstocks-datatable" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>Sl No</th>                                    
                                        <th>Item Name</th>  
                                        <th>Item Code</th>                                                   
                                        <th>Batch</th>                                                    
                                        <th>Purchase Rate</th>                                                    
                                        <th>Sale Rate</th>                                                    
                                        <th>MRP</th>                                                    
                                        <th>Qty</th>                                                    
                                        <th>Stock Type</th>                                                    
                                        <th>Created By</th>                                    
                                        <th>Created Date</th>                                    
                                        <th>Edited By</th>                                    
                                        <th>Edited Date</th>                                    
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody id="openstocks_tbody">
                                @php $i = 1; @endphp
                                    @foreach ($openstocks as $openstock)
                                    @php $created_by = $openstock->createdByUser->name ?? ''; @endphp
                                    @php $created_date = \Carbon\Carbon::parse($openstock->created_date)->timezone('Asia/Kolkata')->format('d/m/Y h:i A') ; @endphp
                                    @php $edited_by = $openstock->editedByUser->name ?? ''; @endphp
                                    @php $edited_date = $openstock->edited_date ? \Carbon\Carbon::parse($openstock->edited_date)->timezone('Asia/Kolkata')->format('d/m/Y h:i A') : ''; @endphp
                                    <tr id="row{{ $openstock->id }}">                                           
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
    
    <div class="modal fade" id="CreateModal" tabindex="-1" role="dialog" aria-labelledby="CreateModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">            
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Create open stock</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="create_openstocks_form" class="form">
                        @csrf
                        <div class="form-group">                           
                            <label for="item_code">Item Code</label>
                            <input type="text" id="add_item_code" name="item_code" class="form-control mb-2" placeholder="Enter Item Code">
                        </div>                    
                        <div class="form-group">
                            <label for="item_name">Item Name</label>
                            <input type="text" id="add_item_name" name="item_name" class="form-control mb-2" placeholder="Enter Item Name">
                        </div>
                        <div class="form-group">
                            <label for="batch">Batch</label>
                            <select name="batch_id" id="add_batch_id" class="form-control" required>
                                @foreach ($batch as $bat)
                                    <option value="{{ $bat->id }}">{{ $bat->batch }}</option>
                                @endforeach
                            </select>
                        </div> 
                        <div class="form-group">
                            <label for="pur_rate">Purchase Rate</label>
                            <input type="number" name="pur_rate" id="add_pur_rate" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="sale_rate">Sale Rate</label>
                            <input type="number" name="sale_rate" id="add_sale_rate" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="mrp">MRP</label>
                            <input type="number" name="mrp" id="add_mrp" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="qty">Qty</label>
                            <input type="number" name="qty" id="add_qty" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="stocktype">Stock Type</label>
                            <select name="stocktype_id" id="add_stocktype_id" class="form-control" required>
                                @foreach ($stocktype as $stock)
                                    <option value="{{ $stock->id }}">{{ $stock->stock_type }}</option>
                                @endforeach
                            </select>
                        </div> 
                        <div class="form-actions form-group">
                            <button type="submit" class="btn btn-primary btn-sm">Submit</button>
                            <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Cancel</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="EditModal" tabindex="-1" role="dialog" aria-labelledby="EditModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit open stock</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="edit_openstocks_form" class="form">
                        @csrf
                        <input type="hidden" name="rowid" id="row_id">
                            <input type="hidden" name="id" id="openstocks_id">
                            <div class="form-group">                           
                                <label for="item_code">Item Code</label>
                                <input type="text" id="add_item_code" name="item_code" class="form-control mb-2" placeholder="Enter Item Code">
                            </div>   
                            <div class="form-group">
                                <label for="item_name">Item Name</label>
                                <input type="text" id="add_item_name" name="item_name" class="form-control mb-2" placeholder="Enter Item Name">
                            </div>
                            <div class="form-group">
                                <label for="batch">Batch</label>
                                <select name="batch_id" id="edit_batch_id" class="form-control" required>
                                     @foreach ($batch as $bat)
                                        <option value="{{ $bat->id }}">{{ $bat->batch }}</option>
                                     @endforeach
                                </select>
                            </div> 
                            <div class="form-group">
                                <label for="pur_rate">Purchase Rate</label>
                                <input type="number" name="pur_rate" id="edit_pur_rate" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="sale_rate">Sale Rate</label>
                                <input type="number" name="sale_rate" id="edit_sale_rate" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="mrp">MRP</label>
                                <input type="number" name="mrp" id="edit_mrp" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="qty">Qty</label>
                                <input type="number" name="qty" id="edit_qty" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="stocktype">Stock Type</label>
                                <select name="stocktype_id" id="edit_stocktype_id" class="form-control" required>
                                    @foreach ($stocktype as $stock)
                                        <option value="{{ $stock->id }}">{{ $stock->stock_type }}</option>
                                    @endforeach
                                </select>
                            </div>                                 
                            <div class="form-actions form-group">
                                <button type="submit" class="btn btn-primary btn-sm">Submit</button>
                                <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Cancel</button>
                            </div>
                    </form>
                </div>
            </div>
        </div>
    </div>    

    @push('scripts')
        <script type="text/javascript">
            $(document).ready(function() {
                $.fn.dataTable.ext.errMode = 'none';

                var table = $('#openstocks-datatable').DataTable({
                processing: true,
                serverSide: true,
                pageLength: 10,
                lengthMenu: [10, 25, 50, 100],
                ajax: {
                    url: "{{ route('openstocks.list') }}",
                    type: "POST",
                    data: function (d) {
                        d._token = "{{ csrf_token() }}";  
                    }
                },
                columns: [
                    { 
                        data: null, 
                        name: "sl_no", 
                        orderable: false, 
                        searchable: false,
                        render: function (data, type, row, meta) {
                            return meta.row + 1; 
                        }
                    },
                    { data: "item_name", name: "item_name" },
                    { data: "item_code", name: "item_code" }, 
                    { data: "batch", name: "batch" },
                    { data: "pur_rate", name: "pur_rate" },
                    { data: "sale_rate", name: "sale_rate" },
                    { data: "mrp", name: "mrp" },
                    { data: "qty", name: "qty" },
                    { data: "stock_type", name: "stock_type" },
                    { data: "created_by", name: "created_by" },
                    { data: "created_date", name: "created_date" },
                    { data: "edited_by", name: "edited_by" },
                    { data: "edited_date", name: "edited_date" },
                    { 
                        data: "action", 
                        name: "action", 
                        orderable: false, 
                        searchable: false,
                        render: function(data, type, row) {
                            return data ? data : 'No Actions';
                        }
                    }
                ],
                rowCallback: function(row, data, index) {
                    $(row).attr('id', 'row' + data.id);
                }
            });
            
            $('#add_item_code').on('input', function () {
                var itemCode = $(this).val();
                if (itemCode !== '') {
                    $.ajax({
                        url: "{{ route('openstocks.fetch') }}",
                        method: "POST",
                        data: {
                            _token: "{{ csrf_token() }}",
                            item_code: itemCode
                        },
                        dataType: "json",
                        success: function (response) {
                            if (response.success) {
                                $('#add_item_name').val(response.item_name);
                                $('#add_item_code').val(response.item_code);
                                $('#add_batch').val(response.batch);
                                $('#add_pur_rate').val(response.pur_rate);
                                $('#add_sale_rate').val(response.sale_rate);
                                $('#add_mrp').val(response.mrp);
                                $('#add_qty').val(response.qty);
                                $('#add_stock_type').val(response.stock_type);
                                
                            } else {
                                $('#add_item_name').val('');
                                $('#add_item_code').val('');
                                $('#add_batch').val('');
                                $('#add_pur_rate').val('');
                                $('#add_sale_rate').val('');
                                $('#add_mrp').val('');
                                $('#add_qty').val('');
                                $('#add_stock_type').val('');
                            }
                        }
                    });
                } else {
                        $('#add_item_name').val('');
                        $('#add_item_code').val('');
                        $('#add_batch').val('');
                        $('#add_pur_rate').val('');
                        $('#add_sale_rate').val('');
                        $('#add_mrp').val('');
                        $('#add_qty').val('');
                        $('#add_stock_type').val('');
                }
            });
        
            $('#add_item_name').on('input', function () {
                var itemName = $(this).val();
                if (itemName !== '') {
                    $.ajax({
                        url: "{{ route('openstocks.fetch') }}",
                        method: "POST",
                        data: {
                            _token: "{{ csrf_token() }}",
                            item_name: itemName
                        },
                        dataType: "json",
                        success: function (response) {
                            if (response.success) {
                                $('#add_item_code').val(response.item_code);
                                $('#add_batch').val(response.batch);
                                $('#add_pur_rate').val(response.pur_rate);
                                $('#add_sale_rate').val(response.sale_rate);
                                $('#add_mrp').val(response.mrp);
                                $('#add_qty').val(response.qty);
                                $('#add_stock_type').val(response.stock_type);
                            } else {
                                $('#add_item_code').val('');
                                $('#add_batch').val('');
                                $('#add_pur_rate').val('');
                                $('#add_sale_rate').val('');
                                $('#add_mrp').val('');
                                $('#add_qty').val('');
                                $('#add_stock_type').val('');
                            }
                        }
                    });
                } else {
                    $('#add_item_code').val('');
                    $('#add_batch').val('');
                    $('#add_pur_rate').val('');
                                $('#add_sale_rate').val('');
                                $('#add_mrp').val('');
                                $('#add_qty').val('');
                                $('#add_stock_type').val('');
                }
            });            

                
            $('#create_openstocks_form').submit(function(event)
            {
                    event.preventDefault();
                    var formData = new FormData($(this)[0]); 
                    $.ajax({
                        url: "{{route('openstocks.store')}}",
                        method: "POST",
                        data: formData,
                        contentType: false, 
                        processData: false,
                        success: function(response) {
                            if (response.success) 
                            {
                                $('#CreateModal').modal('hide');
                                $('#create_openstocks_form')[0].reset();
                                swal("Good job!", response.message, {
                                    icon: "success",
                                    buttons: {
                                        confirm: {
                                        className: "btn btn-success",
                                        },
                                    },
                                });
                                var table = $('#openstocks-datatable').DataTable();
                                var lastRowNumber = table.data().count() > 0 ? parseInt(table.row(':last').data()[0]) + 1 : 0;

                                var formattedCreatedDate = response.data.created_date ? new Date(response.data.created_date).toLocaleString() : ' ';
                                        var formattedEditedDate = response.data.edited_date ? new Date(response.data.edited_date).toLocaleString() : ' ';

                                var newRow = table.row.add([
                                    lastRowNumber, 
                                    response.data.item_name || 'N/A',
                                    response.data.item_code || 'N/A',
                                            response.data.batch,
                                            response.data.pur_rate,
                                        response.data.sale_rate ,
                                        response.data.mrp ,
                                        response.data.qty ,
                                        response.data.stock_type || 'N/A',
                                            response.data.created_by,
                                            formattedCreatedDate,
                                            response.data.edited_by || ' ',
                                            formattedEditedDate || ' ',                                    
                                    ]).draw(false);
                                    table.page('first').draw(false);  
                                    $(newRow.node()).attr('id', 'row' + response.data.id);  
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
                });
                
            });
        </script>
        <script>   
            function editopenstocks(openstocksId) {
                var url = "{{ route('openstocks.edit', ':id') }}"; 
                    url = url.replace(':id', openstocksId);

                $.ajax({           
                    url: url,
                    type: 'GET',
                    success: function(response) {
                        if (response.openstocks) {
                            $('#edit_item_name').val(response.item_name);
                            $('#edit_item_code').val(response.item_code);
                            $('#edit_batch_id').val(response.batch_id);
                            $('#edit_pur_rate').val(response.pur_rate);
                            $('#edit_sale_rate').val(response.sale_rate);
                            $('#edit_mrp').val(response.mrp);
                            $('#edit_qty').val(response.qty);
                            $('#edit_stocktype_id').val(response.stocktype_id);
                            $('#EditModal').modal('show'); 
                        }
                    },
                    error: function() {
                        alert('Error fetching openstocks details');
                    }
                });
            }

        
            function deleteopenstocks(batchopenstocksId) {
                if (confirm('Are you sure you want to delete this openstock?')) {
                    $.ajax({
                        url: '/openstocks/' + openstocksId,
                        type: 'DELETE',
                        data: { _token: '{{ csrf_token() }}' }, 
                        success: function(response) {
                            alert(response.success);
                            location.reload(); 
                        },
                        error: function(response) {
                            alert(response.responseJSON.error);
                        }
                    });
                }
            }
        </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.14.0-beta2/dist/js/bootstrap-select.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/ajax-bootstrap-select@1.4.4/dist/js/ajax-bootstrap-select.min.js"></script>
    @endpush  
</x-admin1-layout>