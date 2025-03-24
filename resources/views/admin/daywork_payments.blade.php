<x-admin1-layout>
@push('styles')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.14.0-beta2/dist/css/bootstrap-select.min.css">   
@endpush
<div class="page-inner">
    <div class="page-header">
    </div>
    <div class="row">
        <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <div class="d-flex align-items-center">
                    <h4 class="card-title">Payments</h4>
                    <button class="btn btn-primary btn-round ms-auto" data-bs-toggle="modal" data-bs-target="#CreateModal">
                        <i class="fa fa-plus"></i> Add Pay
                    </button>
                    <a href="{{ url()->previous() }}" class="btn btn-info btn-round ms-auto">
                        <i class="fa fa-arrow-left"></i> Go Back
                    </a>
                </div>
            </div>
            <div class="card-body">
            <div id="preloader" style="display:none;">
                <img src="{{asset('web/preloader.gif')}}">
            </div>
            <div class="table-responsive">
                <table id="daywork_pay-datatable" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>Sl No</th>
                            <th>Paid Amount</th>
                            <th>Balance Amount</th>
                            <th>Payment Mode</th>
                            <th>Added By</th>
                            <th>Added Date</th>
                            <th>Edited By</th>
                            <th>Edited Date</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody id="daywork_pay_tbody">
                    </tbody>
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
              <form id="create_daywork_pay_form" class="form" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="daywork_trans_id" id="daywork_trans_id" value="{{$daywork_trans_id}}">                    
                <div class="row form-group">
                    <div class="col-4">
                        <label>Paid Amount</label>
                        <input type="text" name="paid_amount" id="add_paid_amount" class="form-control" required>
                    </div>
                    <div class="col-4">
                        <label>Balance Amount</label>
                        <input type="text" name="balance_amount" id="add_balance_pay" class="form-control" >
                    </div>
                    <div class="col-4">
                        <label>Payment Modes</label>
                        <select name="payment_mode_id" class="form-control" required>
                                <option value="">Select One</option>
                            @foreach($payment_modes as $mode)
                                <option value="{{$mode->id}}">{{$mode->payment_mode}}</option>
                            @endforeach
                        </select>
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
 @push('scripts')
<script type="text/javascript">
$(document).ready(function() {
    $.fn.dataTable.ext.errMode = 'none';
    var table = $('#daywork_pay-datatable').DataTable({
        processing: true,
        serverSide: true,
        pageLength: 10, 
        lengthMenu: [10, 25, 50, 100], 
        ajax: {
            url: "{{ route('daywork_payment.list') }}",
            type: "POST",
            data: function (d) {
                d._token="{{ csrf_token() }}",
                d.daywork_trans_id = $('#daywork_trans_id').val();
            }
        },
        columns: [
            {data: "sl_no",name: "sl_no", orderable: false, searchable: false  },
            {data :"paid_amount" , name:"paid_amount"},
            {data: "balance_amount" ,name: "balance_amount"},
            {data: "payment_mode" ,name: "payment_mode"},
            {data: "added_by" ,name: "added_by"},
            {data: "added_date" ,name: "added_date"},
            {data: "edited_by" ,name: "edited_by"},
            {data: "edited_date" ,name: "edited_date"},
            { 
                data: "action", 
                name: "action", 
                orderable: false, 
                searchable: false 
            },
        ],
        rowCallback: function(row, data, index) {
            $(row).attr('id', 'row' + data.id);
        },
    });
    $('#create_daywork_pay_form').submit(function(event) 
    {
        event.preventDefault();
        var formData = new FormData($(this)[0]); 
        $.ajax({
            url: "{{route('daywork_payment.store')}}",
            method: "POST",
            data: formData,
            contentType: false, 
            processData: false,
            success: function(response) {
                if (response.success) 
                {
                    $('#CreateModal').modal('hide');
                    $('#create_daywork_pay_form')[0].reset();
                    swal("Success!", response.message, {
                        icon: "success",
                        buttons: {
                            confirm: {
                                className: "btn btn-success",
                            },
                        },
                    });
                    var table = $('#daywork_pay-datatable').DataTable();
                        var newRow = table.row.add([
                        String(response.data.sl_no), 
                        response.data.paid_amount, 
                        response.data.balance_amount,
                        response.data.payment_mode,
                        response.data.added_user,
                        response.data.added_date, 
                        response.data.edited_user,
                        response.data.edited_date,
                        '<i class="fa fa-edit edit_daywork_pay" data-rowid="'+ response.data.id +'" data-id="' + response.data.id + '" data-bs-toggle="modal" data-bs-target="#EditModal"></i>'
                    ]).draw(false);
                    table.page('first').draw(false);  
                    $(newRow.node()).attr('id', 'row' + response.data.id);
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
});
</script>
@endpush
</x-admin1-layout>
