<x-admin1-layout>
<div class="page-inner">
    <div class="page-header">
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex align-items-center">
                        <h2>Credit Card Payments</h2>
                        <button class="btn btn-primary btn-round ms-auto" data-bs-toggle="modal" data-bs-target="#CreateModal">
                        <i class="fa fa-plus"></i> Create</button>
                    </div>
                </div>
                <div class="card-body">
                    <div id="preloader" style="display:none;">
                        <img src="{{asset('web/preloader.gif')}}">
                    </div>
                    <div class="table-responsive">
                    <table id="creditcard_pay-datatable" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                            <th>Sl No</th>
                            <th>Card</th>
                            <th>Credit</th>
                            <th>Credited Date</th>
                            <th>Provider Card</th>
                            <th>Purpose</th>
                            <th>Due Date</th>
                            <th>Created By</th>
                            <th>Created Date</th>
                            <th>Action</th>
                            </tr>
                        </thead>
                        <tbody id="creditcard_pay_tbody">
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
              <form id="create_creditcard_pay_form" class="form" enctype="multipart/form-data">
              @csrf
                <div class="row form-group">
                    <div class="col-6">
                        <label>Card<span>*</span></label>
                        <select  name="card_id" class="form-control" required>
                            <option value="">Select One</option>
                            @foreach($cards as $card)
                            <option value="{{$card->id}}">{{$card->holder_name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-6">
                        <label>Credit<span>*</span></label>
                        <input type="text"  name="credit" class="form-control" required>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-6">
                        <label>Credited Date <span>*</span></label>
                        <input type="date"  name="credited_date" class="form-control" required>
                    </div>
                    <div class="col-6">
                        <label>Insurence Provider Card<span>*</span></label>
                        <select  name="provider_id" class="form-control" required>
                            <option value="">Select One</option>
                            @foreach($provider_cards as $pro_card)
                            <option value="{{$pro_card->id}}">{{$pro_card->provider_name}}-{{$pro_card->card_name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-6">
                        <label>Purpose</label>
                        <textarea  name="purpose" class="form-control"></textarea>
                    </div>
                    <div class="col-6">
                        <label>Due Date </label>
                        <input type="date"  name="due_date" class="form-control">
                    </div>
                </div>
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
                <form id="update_creditcard_pay_form" class="form" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="creditcard_payid" id="creditcard_payid" value="">
                    <input type="hidden" name="rowid" id="row_id">
                    <div class="row form-group">
                        <div class="col-6">
                            <label>Card<span>*</span></label>
                            <select  name="card_id" id="card_id" class="form-control" required>
                                <option value="">Select One</option>
                                @foreach($cards as $card)
                                <option value="{{$card->id}}">{{$card->holder_name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-6">
                            <label>Credit<span>*</span></label>
                            <input type="text"  name="credit" id="credit"  class="form-control" readonly>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-6">
                            <label>Credited Date<span>*</span></label>
                            <input type="date"  name="credited_date" id="credited_date"  class="form-control" required>
                        </div>
                        <div class="col-6">
                            <label>Purpose</label>
                            <textarea  name="purpose" id="purpose" class="form-control"></textarea>
                        </div>
                        <div class="col-6">
                            <label>Due Date </label>
                            <input type="date"  name="due_date" id="due_date"  class="form-control">
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
<div class="modal fade" id="StatusModal" tabindex="-1" role="dialog" aria-labelledby="StatusModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="update_creditcard_status_form" class="form" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="creditcard_statusid" id="creditcard_statusid" value="">
                    <div class="row form-group">
                        <div class="col-6">
                            <label>Status<span>*</span></label>
                            <select  name="status" id="status" class="form-control" required>
                                <option value="">Select One</option>
                                <option value="0">Pending</option>
                                <option value="1">Paid</option>
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
        var table = $('#creditcard_pay-datatable').DataTable({
            processing: true,
            serverSide: true,
            pageLength: 10, 
            lengthMenu: [10, 25, 50, 100], 
            ajax: {
                url: "{{ route('creditcard_pay.list') }}",
                type: "GET"
            },
            columns: [
                {data: "sl_no",name: "sl_no", orderable: false, searchable: false  },
                {data:"card_name",name: "card_name" },
                {data: "credit" ,name: "credit"},
                {data: "credited_date" ,name: "credited_date"},
                {data: "provider_card" ,name: "provider_card"},
                {data: "purpose" ,name: "purpose"},
                {data: "due_date" ,name: "due_date"},
                {data: "created_by",name: "created_by" },
                {data: "created_date",name: "created_date"},
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
        $('#create_creditcard_pay_form').submit(function(event) 
        {
            event.preventDefault();
            var formData = new FormData($(this)[0]); 
            $.ajax({
                url: "{{route('creditcard_pay.store')}}",
                method: "POST",
                data: formData,
                contentType: false, 
                processData: false,
                success: function(response) {
                    if (response.success) 
                    {
                        $('#CreateModal').modal('hide');
                        $('#create_creditcard_pay_form')[0].reset();
                        $("#submit_btn").prop("disabled", true);
                        swal("Good job!",response.message, {
                            icon: "success",
                            buttons: {
                                confirm: {
                                className: "btn btn-success",
                                },
                            },
                        });
                        var table = $('#creditcard_pay-datatable').DataTable();
                            var newRow = table.row.add([
                            String(response.data.sl_no), 
                            response.data.card_name, 
                            response.data.credit,
                            response.data.credited_date, 
                            response.data.purpose, 
                            response.data.due_date, 
                            response.data.created_by, 
                            response.data.created_date,
                            '<i class="fa fa-edit edit_creditcard_pay" data-rowid="'+ response.data.id +'" data-id="' + response.data.id + '" data-bs-toggle="modal" data-bs-target="#EditModal"></i>'
                        ]).draw(false);
                        table.page('first').draw(false);  
                        $("#submit_btn").prop("disabled", false);
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
        $('#update_creditcard_pay_form').submit(function(event) {
            event.preventDefault();
            var formData = new FormData($(this)[0]);
            var rowId = $('#row_id').val();
            $.ajax({
                url: "{{route('creditcard_pay.update')}}",
                method: "POST", 
                data: formData,
                contentType: false, 
                processData: false,
                success: function(response) {
                    if (response.success) 
                    {
                        $('#EditModal').modal('hide');
                        $('#update_creditcard_pay_form')[0].reset();
                        swal("Good job!", response.message, {
                            icon: "success",
                            buttons: {
                                confirm: {
                                className: "btn btn-success",
                                },
                            },
                        });
                        var table = $('#creditcard_pay-datatable').DataTable();
                        var row = table.row($('#row' + response.data.id));
                        row.data([
                                rowId,
                                response.data.card_name, 
                                response.data.credit,
                                response.data.credited_date, 
                                response.data.purpose, 
                                response.data.due_date, 
                                response.data.created_by, 
                                response.data.created_date,
                            '<i class="fa fa-edit edit_creditcard_pay"  data-rowid="'+ rowId  +'"  data-id="' + response.data.id + '" data-bs-toggle="modal" data-bs-target="#EditModal"></i>'
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
        $('#update_creditcard_status_form').submit(function(event) {
            event.preventDefault();
            var formData = new FormData($(this)[0]);
            $.ajax({
                url: "{{route('creditcard_pay.statusupdate')}}",
                method: "POST", 
                data: formData,
                contentType: false, 
                processData: false,
                success: function(response) {
                    if (response.success) 
                    {
                        $('#StatusModal').modal('hide');
                        $('#update_creditcard_status_form')[0].reset();
                        swal("Good job!", response.message, {
                            icon: "success",
                            buttons: {
                                confirm: {
                                className: "btn btn-success",
                                },
                            },
                        });
                        fetch_creditcard_payData();
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
$(document).on("click", ".edit_creditcard_pay", function() {
   var creditcard_payid = $(this).data('id');
   $('#creditcard_payid').val(creditcard_payid);
   var row_id = $(this).data('rowid');
   $('#row_id').val(row_id);
   $.ajax({ type: "POST",
        url: "{{route('creditcard_pay.show')}}",
        data: { "_token": "{{ csrf_token() }}",
                creditcard_payid:creditcard_payid
              },
        success: function(res) 
        {
          $('#card_id').val(res.card_id);
          $('#credit').val(res.credit);
          $('#credited_date').val(res.credited_date);
          $('#purpose').val(res.purpose);
          $('#due_date').val(res.due_date);
        },
    });
});
</script> 
<script>
$(document).on("click", ".change_status", function() {
   var creditcard_statusid = $(this).data('id');
   $('#creditcard_statusid').val(creditcard_statusid);
   $.ajax({ type: "POST",
        url: "{{route('creditcard_pay.show')}}",
        data: { "_token": "{{ csrf_token() }}",
                creditcard_payid:creditcard_statusid
              },
        success: function(res) 
        {
          $('#status').val(res.status);
        },
    });
});
</script> 
@endpush
</x-admin1-layout>