<x-admin1-layout>
    @push('styles')
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.14.0-beta2/dist/css/bootstrap-select.min.css">  
    @endpush
    <div class="page-inner">
        <div class="page-header">
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex align-items-center">
                            <h2>Report</h2>
                            <div class="mx-auto d-flex">
                                <input type="date" id="start_date" class="form-control me-2" placeholder="Start Date" style="width:200px">
                                <input type="date" id="end_date" class="form-control me-2" placeholder="End Date" style="width:200px">
                                <button class="btn btn-primary" id="filter">Filter</button>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div id="preloader" style="display:none;">
                            <img src="{{asset('web/preloader.gif')}}">
                        </div>
                        <div class="alert alert-info">
                            <strong>Total Premium Amount: </strong> <span style="
                            color: green;
                            font-weight: bold;
                            font-size: 18px;
                        ">₹</span><span id="totalPremiumAmount" style="
                            color: green;
                            font-weight: bold;
                            font-size: 18px;
                        ">0.00</span>
                        </div>
                        <div class="table-responsive">
                            <table id="policyholder-datatable" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>Sl No</th>
                                        <th>Agent</th>
                                        <th>Dealer</th>
                                        <th>Name</th>
                                        <th>Vehicle Number</th>
                                        <th>Primary Number</th>
                                        <th>Premium</th>
                                        <th>Customer Paid Premium</th>
                                        <th>Paid Amount</th>
                                        <th>Due Amount</th>
                                        <th>Payment Mode</th>
                                        <th>Payment Status</th>
                                        <th>Insurence Provider</th>
                                        <th>Policy Mode</th>
                                        <th>Secondary Number</th>
                                        <th>Start Date</th>
                                        <th>Expiry Date</th>
                                        <th>Vehicle Model</th>
                                        <th>Company</th>
                                        <th>Valuation Amount</th>
                                        <th>Total Cost</th>
                                        <th>Executive</th>
                                        <th>Prepared Staff</th>
                                        <th>Reference</th>
                                        <th>Created By</th>
                                        <th>Created Date</th>
                                        <th>Assigned Date</th>
                                    </tr>
                                </thead>
                                <tbody id="policyholder_tbody">
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.14.0-beta2/dist/js/bootstrap-select.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/ajax-bootstrap-select@1.4.4/dist/js/ajax-bootstrap-select.min.js">
    </script>
    <script>
        $(document).ready(function () {

            
        let formatDate = (date) => {
            let yyyy = date.getFullYear();
            let mm = String(date.getMonth() + 1).padStart(2, '0'); 
            let dd = String(date.getDate()).padStart(2, '0');
            return `${yyyy}-${mm}-${dd}`;
        };
            
        let today = new Date();
        let firstDayOfMonth = new Date(today.getFullYear(), today.getMonth(), 1);

        document.getElementById("start_date").value = formatDate(firstDayOfMonth);
        document.getElementById("end_date").value = formatDate(today);


        let table = $('#policyholder-datatable').DataTable({
            processing: true,
            serverSide: true,
            searching: false,
            ajax: {
                url: "{{ route('motorVehicleReport.report') }}",
                data: function (d) {
                    d.start_date = $('#start_date').val();
                    d.end_date = $('#end_date').val();
                },
                dataSrc: function(json) {
                    $('#totalPremiumAmount').text(json.totalPremiumAmount.toFixed(2));
                    return json.data;
                }
            },
            columns: [
                { data: 'DT_RowIndex', name: 'sl_no', orderable: false, searchable: false  },
                { data: 'agent', name: 'agent', orderable: false, searchable: false },
                { data: 'dealer', name: 'dealer', orderable: false, searchable: false },
                { data: 'name', name: 'name', orderable: false, searchable: false },
                { data: 'vehicle_number', name: 'vehicle_number', orderable: false, searchable: false },
                { data: 'primary_number', name: 'primary_number', orderable: false, searchable: false },
                { data: 'premium', name: 'premium', orderable: false, searchable: false },
                { data: 'customer_premium', name: 'Customer Paid Premium', orderable: false, searchable: false },
                { data: 'paid_amount', name: 'paid_amount', orderable: false, searchable: false },
                { data: 'due_amount', name: 'due_amount', orderable: false, searchable: false },
                { data: 'payment_mode', name: 'payment_mode', orderable: false, searchable: false },
                { data: 'payment_status', name: 'payment_status', orderable: false, searchable: false },
                { data: 'insurance_provider', name: 'insurance_provider', orderable: false, searchable: false },
                { data: 'policy_mode', name: 'policy_mode', orderable: false, searchable: false },
                { data: 'secondary_number', name: 'secondary_number', orderable: false, searchable: false },
                { data: 'start_date', name: 'start_date', orderable: false, searchable: false },
                { data: 'expiry_date', name: 'expiry_date', orderable: false, searchable: false },
                { data: 'vehicle_model', name: 'vehicle_model', orderable: false, searchable: false },
                { data: 'company', name: 'company', orderable: false, searchable: false },
                { data: 'valuation_amount', name: 'valuation_amount', orderable: false, searchable: false },
                { data: 'total_cost', name: 'total_cost', orderable: false, searchable: false },
                { data: 'added_executive', name: 'executive', orderable: false, searchable: false },
                { data: 'prepared_by', name: 'prepared_staff', orderable: false, searchable: false },
                { data: 'referred_person', name: 'reference', orderable: false, searchable: false },
                { data: 'created_by', name: 'created_by', orderable: false, searchable: false },
                { data: 'created_date', name: 'created_date', orderable: false, searchable: false },
                { data: 'assigned_date', name: 'assigned_date', orderable: false, searchable: false },
            ],
            pageLength: 10,
            lengthMenu: [10, 25, 50],
        });

        $('#filter').click(function () {
            table.ajax.reload();
        });
    });
    </script>
    @endpush
</x-admin1-layout>