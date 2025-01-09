<x-admin1-layout>
<div class="page-inner">
    <div class="page-header">
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex align-items-center">
                        <h2>Cards</h2>
                        <button class="btn btn-primary btn-round ms-auto" data-bs-toggle="modal" data-bs-target="#CreateModal">
                        <i class="fa fa-plus"></i> Create</button>
                    </div>
                </div>
                <div class="card-body">
                    <div id="preloader" style="display:none;">
                        <img src="{{asset('web/preloader.gif')}}">
                    </div>
                    <div class="table-responsive">
                    <table id="card-datatable" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                            <th>Sl No</th>
                            <th>Card Holder Name</th>
                            <th>Expiry Date</th>
                            <th>Bank</th>
                            <th>Created By</th>
                            <th>Created Date</th>
                            <th>Action</th>
                            </tr>
                        </thead>
                        <tbody id="card_tbody">
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
              <form id="create_card_form" class="form" enctype="multipart/form-data">
              @csrf
                <div class="row form-group">
                    <div class="col-6">
                        <label>Card Holder Name<span>*</span></label>
                        <input type="text"  name="holder_name" class="form-control" required>
                    </div>
                    <div class="col-6">
                        <label>Expiry Date<span>*</span></label>
                        <input type="date"  name="expiry_date" class="form-control" required>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-6">
                        <label>Bank<span>*</span></label>
                        <input type="text"  name="bank" class="form-control" required>
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
                <form id="update_card_form" class="form" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="card_id" id="card_id" value="">
                    <div class="row form-group">
                        <div class="col-6">
                            <label>Card Holder Name<span>*</span></label>
                            <input type="text"  name="holder_name" id="holder_name" class="form-control" required>
                        </div>
                        <div class="col-6">
                            <label>Expiry Date<span>*</span></label>
                            <input type="date"  name="expiry_date" id="expiry_date" class="form-control" required>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-6">
                            <label>Bank<span>*</span></label>
                            <input type="text"  name="bank" id="bank" class="form-control" required>
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
 @push('scripts')
<script type="text/javascript">
    $(document).ready(function() {
        function fetch_cardData()
        {
            $('#card_tbody').html('');
            $.ajax({ type: "GET",
                    url: "{{route('card.list')}}",
                    beforeSend: function() 
                    {
                        $('#preloader').show();
                    },
                    success: function(res) 
                    {
                        $('#preloader').hide();
                        $('#card-datatable').DataTable().destroy();
                        $('#card_tbody').html(res);
                        $('#card-datatable').DataTable({
                            "bStateSave": true,
                            "fnStateSave": function (oSettings, oData) {
                                localStorage.setItem('card-datatable', JSON.stringify(oData));
                            },
                            "fnStateLoad": function (oSettings) {
                                return JSON.parse(localStorage.getItem('card-datatable'));
                            }
                        });
                    },
                });
        }   
        fetch_cardData();
        $('#create_card_form').submit(function(event) 
        {
            event.preventDefault();
            var formData = new FormData($(this)[0]); 
            $.ajax({
                url: "{{route('card.store')}}",
                method: "POST",
                data: formData,
                contentType: false, 
                processData: false,
                success: function(response) {
                    if (response.success) 
                    {
                        $('#CreateModal').modal('hide');
                        $('#create_card_form')[0].reset();
                        swal("Good job!", "Card Created successfully", {
                            icon: "success",
                            buttons: {
                                confirm: {
                                className: "btn btn-success",
                                },
                            },
                        });
                        fetch_cardData();
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
        $('#update_card_form').submit(function(event) {
            event.preventDefault();
            var formData = new FormData($(this)[0]);
            $.ajax({
                url: "{{route('card.update')}}",
                method: "POST", 
                data: formData,
                contentType: false, 
                processData: false,
                success: function(response) {
                    if (response.success) 
                    {
                        $('#EditModal').modal('hide');
                        $('#update_card_form')[0].reset();
                        swal("Good job!", "Card Updated successfully", {
                            icon: "success",
                            buttons: {
                                confirm: {
                                className: "btn btn-success",
                                },
                            },
                        });
                        fetch_cardData();   
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
$(document).on("click", ".edit_card", function() {
   var card_id = $(this).data('id');
   $('#card_id').val(card_id);
   $.ajax({ type: "POST",
        url: "{{route('card.show')}}",
        data: { "_token": "{{ csrf_token() }}",
                card_id:card_id
              },
        success: function(res) 
        {
          $('#holder_name').val(res.holder_name);
          $('#expiry_date').val(res.expiry_date);
          $('#bank').val(res.bank);
        },
    });
});
</script> 
@endpush
</x-admin1-layout>