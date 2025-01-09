<x-admin1-layout>
<div class="page-inner">
    <div class="page-header">
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex align-items-center">
                        <button class="btn btn-primary btn-round ms-auto" data-bs-toggle="modal" data-bs-target="#CreateModal">
                        <i class="fa fa-plus"></i> Create</button>
                    </div>
                </div>
                <div class="card-body">
                    <div id="preloader" style="display:none;">
                        <img src="{{asset('web/preloader.gif')}}">
                    </div>
                    <div class="table-responsive">
                    <table id="followup-datatable" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>Sl No</th>
                                <th>Name</th>
                                <th>Call Description</th>
                                <th>Followup Date</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody id="followup_tbody">
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
              <form id="create_followup_form" class="form" enctype="multipart/form-data">
              @csrf
                <input type="hidden" name="lead_id" value="{{$lead_id}}">
                <div class="row form-group">
                <div class="col-6">
                    <p>Lead : {{$lead->name}}</p>
                </div>
                </div>
                <div class="row form-group">
                    <div class="col-6">
                        <label>Call Description <span>*</span></label>
                        <textarea  name="call_description" class="form-control" required></textarea>
                    </div>
                    <div class="col-6">
                        <label>Next Followup Date <span>*</span></label>
                        <input type="date"  name="next_followup_date" class="form-control" required>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-6">
                        <label>Status <span>*</span></label>
                        <select  name="status" class="form-control" required>
                            <option value="">Select One</option>
                            <option value="1">Started</option>
                            <option value="2">In Progress</option>
                            <option value="3">Not Need</option>
                            <option value="4">Converted	</option>
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
                <form id="update_followup_form" class="form" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="follow_id" id="follow_id" value="">
                    <div class="row form-group">
                        <div class="col-6">
                            <p>Lead : {{$lead->name}}</p>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-6">
                            <label>Call Description <span>*</span></label>
                            <textarea  name="call_description" id="call_description" class="form-control" required></textarea>
                        </div>
                        <div class="col-6">
                            <label>Next Followup Date <span>*</span></label>
                            <input type="date"  name="next_followup_date" id="next_followup_date" class="form-control" required>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-6">
                            <label>Status <span>*</span></label>
                            <select  name="status" class="form-control" id="status" required>
                                <option value="">Select One</option>
                                <option value="1">Started</option>
                                <option value="2">In Progress</option>
                                <option value="3">Not Need</option>
                                <option value="4">Converted	</option>
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
 <!-- Edit Modal -->
 @push('scripts')
<script type="text/javascript">
    $(document).ready(function() {
        function fetch_followupData($lead_id)
        {
            $('#followup_tbody').html('');
            $.ajax({ type: "GET",
                    url: "{{route('followup.list',"+$lead_id+")}}",
                    beforeSend: function() 
                    {
                        $('#preloader').show();
                    },
                    success: function(res) 
                    {
                        $('#preloader').hide();
                        $('#followup-datatable').DataTable().destroy();
                        $('#followup_tbody').html(res);
                        $('#followup-datatable').DataTable({
                            "bStateSave": true,
                            "fnStateSave": function (oSettings, oData) {
                                localStorage.setItem('followup-datatable', JSON.stringify(oData));
                            },
                            "fnStateLoad": function (oSettings) {
                                return JSON.parse(localStorage.getItem('followup-datatable'));
                            }
                        });
                    },
                });
        }   
        fetch_followupData();
        $('#create_followup_form').submit(function(event) 
        {
            event.preventDefault();
            var formData = new FormData($(this)[0]); 
            $.ajax({
                url: "{{route('followup.store')}}",
                method: "POST",
                data: formData,
                contentType: false, 
                processData: false,
                success: function(response) {
                    if (response.success) 
                    {
                        $('#CreateModal').modal('hide');
                        $('#create_followup_form')[0].reset();
                        swal("Good job!", "Followup Created successfully", {
                            icon: "success",
                            buttons: {
                                confirm: {
                                className: "btn btn-success",
                                },
                            },
                        });
                        fetch_followupData();
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
        $('#update_followup_form').submit(function(event) {
            event.preventDefault();
            var formData = new FormData($(this)[0]);
            $.ajax({
                url: "{{route('followup.update')}}",
                method: "POST", 
                data: formData,
                contentType: false, 
                processData: false,
                success: function(response) {
                    if (response.success) 
                    {
                        $('#EditModal').modal('hide');
                        $('#update_followup_form')[0].reset();
                        swal("Good job!", "Followup Updated successfully", {
                            icon: "success",
                            buttons: {
                                confirm: {
                                className: "btn btn-success",
                                },
                            },
                        });
                        fetch_followupData();   
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
$(document).on("click", ".edit_follow", function() {
   var follow_id = $(this).data('id');
   $('#follow_id').val(follow_id);
   $.ajax({ type: "POST",
        url: "{{route('followup.show')}}",
        data: { "_token": "{{ csrf_token() }}",
                follow_id:follow_id
              },
        success: function(res) 
        {
          $('#call_description').val(res.call_description);
          $('#next_followup_date').val(res.next_followup_date);
          $('#status').val(res.status);
        },
    });
});
</script> 
@endpush
</x-admin1-layout>
