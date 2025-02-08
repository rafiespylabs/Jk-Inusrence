<x-admin1-layout>
<div class="page-inner">
    <div class="page-header">
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex align-items-center">
                        <h2>Credit Card RePayments</h2>
                        <button class="btn btn-primary btn-round ms-auto" data-bs-toggle="modal" data-bs-target="#CreateModal">
                        <i class="fa fa-plus"></i> Add Repay</button>
                        <a href="{{ url()->previous() }}" class="ml-2"><button class="btn btn-info btn-round ms-auto">
                        <i class="fa fa-arrow-left"></i> Back</button></a>
                    </div>
                    <div class="d-flex align-items-center"> 
                        <p>CARD NAME : {{$credit_cardayment->card->holder_name ?? "N/A" }}<br>
                        CREDIT AMOUNT : {{$credit_cardayment->credit }}</p>
                    </div>
                    @if($credit_cardayment->status==0)
                        <button class="btn btn-danger btn-sm pay_status" data-id="{{$credit_cardayment->id}}" data-bs-toggle="modal" data-bs-target="#PayStatusModal">
                            Due
                        </button>
                    @elseif($credit_cardayment->status==1)
                        <button class="btn btn-success btn-sm">
                           Full Paid
                        </button>
                    @endif
                </div>
                <div class="card-body">
                    <div id="preloader" style="display:none;">
                        <img src="{{asset('web/preloader.gif')}}">
                    </div>
                    <div class="table-responsive">
                    <table id="credit_repay-datatable" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                            <th>Sl No</th>
                            <th>Repay Amount</th>
                            <th>Repay Date</th>
                            <th>Added By</th>
                            <th>Added Date</th>
                            <th>Action</th>
                            </tr>
                        </thead>
                        <tbody id="credit_repay_tbody">
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
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Create</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
              <form id="create_credit_repay_form" class="form" enctype="multipart/form-data">
              @csrf
                <input type="hidden" name="credit_pay_id" value="{{$credit_pay_id}}">
                <div class="row form-group">
                    <div class="col-6">
                        <label>Repay Amount<span>*</span></label>
                        <input type="text"  name="repay_amount" class="form-control" required>
                    </div>
                    <div class="col-6">
                        <label>Repay Date <span>*</span></label>
                        <input type="date"  name="repay_date" class="form-control" required>
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
                <form id="update_credit_repay_form" class="form" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id" id="credit_repay_id" value="">
                    <input type="hidden" name="rowid" id="row_id">
                    <div class="row form-group">
                        <div class="col-6">
                            <label>Repay Amount<span>*</span></label>
                            <input type="text"  name="repay_amount" id="repay_amount" class="form-control" required>
                        </div>
                        <div class="col-6">
                            <label>Repay Date <span>*</span></label>
                            <input type="date"  name="repay_date" id="repay_date" class="form-control" required>
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
  <!-- Status Modal -->
<div class="modal fade" id="PayStatusModal" tabindex="-1" role="dialog" aria-labelledby="PayStatusModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Do You Complete Payment?</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="update_pay_status_form" class="form" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id" id="creditcard_statusid" value="">
                    <div class="row form-group">
                        <div class="col-6">
                            <label>Status<span>*</span></label>
                            <select  name="status" class="form-control" required>
                                <option value="">Select One</option>
                                <option value="0">Due</option>
                                <option value="1">Full Paid</option>
                            </select>
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
 <!-- Status Modal -->
 @push('scripts')
<script type="text/javascript">
    $(document).ready(function() {
        $.fn.dataTable.ext.errMode = 'none';
        var table = $('#credit_repay-datatable').DataTable({
            processing: true,
            serverSide: true,
            pageLength: 10, 
            lengthMenu: [10, 25, 50, 100], 
            ajax: {
                url: "{{ route('credit_repayment.list') }}",
                type: "POST",
                data: {
                    "_token": "{{ csrf_token() }}",
                    "credit_pay_id": {{$credit_pay_id}}
                },
            },
            columns: [
                {data: "sl_no",name: "sl_no", orderable: false, searchable: false  },
                {data:"repay_amount",name: "repay_amount" },
                {data: "repay_date" ,name: "repay_date"},
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
        $('#create_credit_repay_form').submit(function(event) 
        {
            event.preventDefault();
            var formData = new FormData($(this)[0]); 
            $.ajax({
                url: "{{route('credit_repayment.store')}}",
                method: "POST",
                data: formData,
                contentType: false, 
                processData: false,
                success: function(response) {
                    if (response.success) 
                    {
                        $('#CreateModal').modal('hide');
                        $('#create_credit_repay_form')[0].reset();
                        swal("Good job!",response.message, {
                            icon: "success",
                            buttons: {
                                confirm: {
                                className: "btn btn-success",
                                },
                            },
                        });
                        var table = $('#credit_repay-datatable').DataTable();
                            var newRow = table.row.add([
                            String(response.data.sl_no), 
                            response.data.repay_amount, 
                            response.data.repay_date,
                            response.data.added_by, 
                            response.data.added_date, 
                            '<i class="fa fa-edit edit_credit_repay" data-rowid="'+ response.data.id +'" data-id="' + response.data.id + '" data-bs-toggle="modal" data-bs-target="#EditModal"></i>'
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
$(document).on("click", ".pay_status", function() {
   var credit_pay_id = $(this).data('id');
   $('#creditcard_statusid').val(credit_pay_id);
});
</script> 
@endpush
</x-admin1-layout>