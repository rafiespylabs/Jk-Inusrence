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
                    <table id="lead-datatable" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                            <th>Sl No</th>
                            <th>Name</th>
                            <th>Followups</th>
                            <th>Applied Post</th>
                            <th>Email</th>
                            <th>Contact</th>
                            <th>Type</th>
                            <th>Source</th>
                            <th>Status</th>
                            <th>Added By</th>
                            <th>Created Date</th>
                            <th>Edited By</th>
                            <th>Edited Date</th>
                            <th>Action</th>
                            </tr>
                        </thead>
                        <tbody id="lead_tbody">
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
              <form id="create_lead_form" class="form" enctype="multipart/form-data">
              @csrf
                <div class="row form-group">
                    <div class="col-6">
                        <label>Name<span>*</span></label>
                        <input type="text"  name="name" class="form-control" required>
                    </div>
                    <div class="col-6">
                        <label>Post Applied For<span>*</span></label>
                        <input type="text"  name="post_applied" class="form-control" required>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-6">
                        <label>Contact Number <span>*</span></label>
                        <input type="text"  name="mobile_number" class="form-control" required>
                    </div>
                    <div class="col-6">
                        <label>Email</label>
                        <input type="email"  name="email" class="form-control">
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-6">
                        <label>Lead Source <span>*</span></label>
                        <select  name="leadsource_id" class="form-control" required>
                            <option value="">Select One</option>
                            @foreach($leadsources as $source)
                            <option value="{{$source->id}}">{{$source->leadsource}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-6">
                        <label>Call Description <span>*</span></label>
                        <textarea  name="call_description" class="form-control" required></textarea>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-6">
                        <label>Next Followup Date <span>*</span></label>
                        <input type="date"  name="next_followup_date" class="form-control" required>
                    </div>
                    <div class="col-2">
                        <label>Type <span>*</span></label>
                    </div>
                    <div class="col-4">
                        <div class="form-check">
                            <div class="radio">
                                <input type="radio"  name="lead_type" class="form-check-input"  value="1"><label>Hot</label>
                            </div>
                            <div class="radio">
                                <input type="radio"  name="lead_type"  class="form-check-input" value="2"><label>Medium</label>
                            </div>
                            <div class="radio">
                                <input type="radio"  name="lead_type"  class="form-check-input" value="3"><label>Cold</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-6">
                        <label>Status <span>*</span></label>
                        <select  name="lead_status" class="form-control" required>
                            <option value="">Select One</option>
                            <option value="1">Started</option>
                            <option value="2">In Progress</option>
                            <option value="3">Not Need</option>
                            <option value="4">Converted	</option>
                        </select>
                    </div>
                    <div class="col-6">
                        <label>Resume Link</label>
                        <input type="text"  name="resume_link" class="form-control">
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
                <form id="update_lead_form" class="form" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="lead_id" id="lead_id" value="">
                    <div class="row form-group">
                        <div class="col-6">
                            <label>Name<span>*</span></label>
                            <input type="text"  name="name" id="name" class="form-control" required>
                        </div>
                        <div class="col-6">
                            <label>Post Applied For<span>*</span></label>
                            <input type="text"  name="post_applied" id="post_applied" class="form-control" required>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-6">
                            <label>Contact Number <span>*</span></label>
                            <input type="text"  name="mobile_number" id="mobile_number" class="form-control" required>
                        </div>
                        <div class="col-6">
                            <label>Email</label>
                            <input type="email"  name="email" id="email" class="form-control">
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-6">
                            <label>Lead Source <span>*</span></label>
                            <select  name="leadsource_id" id="leadsource_id" class="form-control" required>
                                <option value="">Select One</option>
                                @foreach($leadsources as $source)
                                <option value="{{$source->id}}">{{$source->leadsource}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-2">
                            <label>Type <span>*</span></label>
                        </div>
                        <div class="col-4">
                            <div class="form-check">
                                <div class="radio">
                                    <input type="radio"  name="lead_type" id="type1" class="form-check-input"  value="1"><label>Hot</label>
                                </div>
                                <div class="radio">
                                    <input type="radio"  name="lead_type"  id="type2" class="form-check-input" value="2"><label>Medium</label>
                                </div>
                                <div class="radio">
                                    <input type="radio"  name="lead_type" id="type3"  class="form-check-input" value="3"><label>Cold</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-6">
                            <label>Status <span>*</span></label>
                            <select  name="lead_status" id="lead_status" class="form-control" required>
                                <option value="">Select One</option>
                                <option value="1">Started</option>
                                <option value="2">In Progress</option>
                                <option value="3">Not Need</option>
                                <option value="4">Converted	</option>
                            </select>
                        </div>
                        <div class="col-6">
                            <label>Resume Link</label>
                            <input type="text"  name="resume_link" id="resume_link" class="form-control">
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
        function fetch_leadData()
        {
            $('#lead_tbody').html('');
            $.ajax({ type: "GET",
                    url: "{{route('lead.list')}}",
                    beforeSend: function() 
                    {
                        $('#preloader').show();
                    },
                    success: function(res) 
                    {
                        $('#preloader').hide();
                        $('#lead-datatable').DataTable().destroy();
                        $('#lead_tbody').html(res);
                        $('#lead-datatable').DataTable({
                            "bStateSave": true,
                            "fnStateSave": function (oSettings, oData) {
                                localStorage.setItem('lead-datatable', JSON.stringify(oData));
                            },
                            "fnStateLoad": function (oSettings) {
                                return JSON.parse(localStorage.getItem('lead-datatable'));
                            }
                        });
                    },
                });
        }   
        fetch_leadData();
        $('#create_lead_form').submit(function(event) 
        {
            event.preventDefault();
            var formData = new FormData($(this)[0]); 
            $.ajax({
                url: "{{route('lead.store')}}",
                method: "POST",
                data: formData,
                contentType: false, 
                processData: false,
                success: function(response) {
                    if (response.success) 
                    {
                        $('#CreateModal').modal('hide');
                        $('#create_lead_form')[0].reset();
                        swal("Good job!", "Lead Created successfully", {
                            icon: "success",
                            buttons: {
                                confirm: {
                                className: "btn btn-success",
                                },
                            },
                        });
                        fetch_leadData();
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
        $('#update_lead_form').submit(function(event) {
            event.preventDefault();
            var formData = new FormData($(this)[0]);
            $.ajax({
                url: "{{route('lead.update')}}",
                method: "POST", 
                data: formData,
                contentType: false, 
                processData: false,
                success: function(response) {
                    if (response.success) 
                    {
                        $('#EditModal').modal('hide');
                        $('#update_lead_form')[0].reset();
                        swal("Good job!", "Lead Updated successfully", {
                            icon: "success",
                            buttons: {
                                confirm: {
                                className: "btn btn-success",
                                },
                            },
                        });
                        fetch_leadData();   
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
        $(document).on("click", ".delete_lead", function() {
            var lead_id = $(this).data('id');
            if (confirm('Are you sure you want to delete this row?')) 
            {
                $.ajax({
                    url: "{{route('lead.destroy')}}",
                    method: "POST",
                    data:{ "_token": "{{ csrf_token() }}",
                            lead_id: lead_id
                        },
                    success: function(response) {
                        if (response.success) 
                        {
                            swal("Good job!", "Lead Deleted successfully", {
                                icon: "error",
                                buttons: {
                                    confirm: {
                                    className: "btn btn-danger",
                                    },
                                },
                            });
                            fetch_leadData();
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
            }
        });
    });
</script>
<script>
$(document).on("click", ".edit_lead", function() {
   var lead_id = $(this).data('id');
   $('#lead_id').val(lead_id);
   $.ajax({ type: "POST",
        url: "{{route('lead.show')}}",
        data: { "_token": "{{ csrf_token() }}",
                lead_id:lead_id
              },
        success: function(res) 
        {
          $('#post_applied').val(res.post_applied);
          $('#name').val(res.name);
          $('#mobile_number').val(res.mobile_number);
          $('#email').val(res.email);
          $('#leadsource_id').val(res.leadsource_id);
          if(res.lead_type==1)
          {
            $('#type1').prop('checked', true);
          }
          else if(res.lead_type==2)
          {
            $('#type2').prop('checked', true);
          }
          else if(res.lead_type==3)
          {
            $('#type3').prop('checked', true);
          }
          else{
            $('#type1').prop('checked', false);
            $('#type2').prop('checked', false);
            $('#type3').prop('checked', false);
          }
          $('#lead_status').val(res.lead_status);
          $('#resume_link').val(res.resume_link);
        },
    });
});
</script> 
@endpush
</x-admin1-layout>
