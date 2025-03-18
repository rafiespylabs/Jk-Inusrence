<x-admin1-layout>
<div class="page-inner">
    <div class="page-header">
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h2>Purchase Items</h2>
                    <a href="{{ url()->previous() }}" class="ml-2"><button class="btn btn-info btn-round ms-auto btn-sm">
                    <i class="fa fa-arrow-left"></i> Back</button></a>
                </div>
                <div class="card-body">
                    <div id="preloader" style="display:none;">
                        <img src="{{asset('web/preloader.gif')}}">
                    </div>
                    <p>Invoice Number : {{$purchase->invoice_num}}</p>
                    <p>Purchase Date : {{$purchase->purchase_date}}</p>
                    <input type="hidden" id="purchase_id" value="{{$purchase_id}}">
                    <div class="table-responsive">
                        <table id="purchase-items-datatable" class="table table-striped table-bordered">
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
                            <tbody id="purchase-items_tbody">
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@push('scripts')
<script type="text/javascript">
    $(document).ready(function() {
        $.fn.dataTable.ext.errMode = 'none';
        var table = $('#purchase-items-datatable').DataTable({
            processing: true,
            serverSide: true,
            pageLength: 10, 
            lengthMenu: [10, 25, 50, 100], 
            ajax: {
                url: "{{ route('purchaseitem.list') }}",
                type: "GET",
                 data: function (d) 
                {
                    d.purchase_id = $('#purchase_id').val(); 
                }
            },
            columns: [
                {data: "sl_no",name: "sl_no", orderable: false, searchable: false  },
                {data:"item",name: "item" },
                {data: "batch" ,name: "batch"},
                {data: "unit" ,name: "unit"},
                {data: "quantity" ,name: "quantity"},
                {data: "purchase_rate" ,name: "purchase_rate"},
                {data: "sale_rate" ,name: "sale_rate"},
                {data: "mrp" ,name: "mrp"},
                {data: "subtotal",name: "subtotal" },
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
    });
</script>
@endpush
</x-admin1-layout>
