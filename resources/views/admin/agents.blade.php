<x-admin1-layout>
<div class="page-inner">
    <div class="page-header">
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex align-items-center">
                        <h2>Agents</h2>
                        <button class="btn btn-primary btn-round ms-auto" data-bs-toggle="modal" data-bs-target="#CreateModal">
                        <i class="fa fa-plus"></i> Create</button>
                    </div>
                </div>
                <div class="card-body">
                    <div id="preloader" style="display:none;">
                        <img src="{{asset('web/preloader.gif')}}">
                    </div>
                    <div class="table-responsive">
                    <table id="agent-datatable" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                            <th>Sl No</th>
                            <th>Agent Name</th>
                            <th>Phone Number</th>
                            <th>Company Name</th>
                            <th>Created By</th>
                            <th>Created Date</th>
                            <th>Action</th>
                            </tr>
                        </thead>
                        <tbody id="agent_tbody">
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
              <form id="create_agent_form" class="form" enctype="multipart/form-data">
              @csrf
                <div class="row form-group">
                    <div class="col-6">
                        <label>Agent Name<span>*</span></label>
                        <input type="text"  name="agent_name" class="form-control" required>
                    </div>
                    <div class="col-6">
                        <label>Email</label>
                        <input type="email"  name="email" class="form-control">
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-6">
                        <label>Phone Number <span>*</span></label>
                        <input type="text"  name="phone_number" class="form-control" required pattern="[6789][0-9]{9}" title="Please enter valid phone number">
                    </div>
                    <div class="col-6">
                        <label>Company Name</label>
                        <input type="text"  name="company_name" class="form-control">
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
                <form id="update_agent_form" class="form" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="agent_id" id="agent_id" value="">
                    <div class="row form-group">
                        <div class="col-6">
                            <label>Agent Name<span>*</span></label>
                            <input type="text"  name="agent_name" id="agent_name" class="form-control" required>
                        </div>
                        <div class="col-6">
                            <label>Email</label>
                            <input type="email"  name="email" id="email" class="form-control">
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-6">
                            <label>Phone Number <span>*</span></label>
                            <input type="text"  name="phone_number" class="form-control" id="phone_number" required pattern="[6789][0-9]{9}" title="Please enter valid phone number">
                        </div>
                        <div class="col-6">
                            <label>Company Name</label>
                            <input type="text"  name="company_name" class="form-control" id="company_name">
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
        function fetch_agentData()
        {
            $('#agent_tbody').html('');
            $.ajax({ type: "GET",
                    url: "{{route('agent.list')}}",
                    beforeSend: function() 
                    {
                        $('#preloader').show();
                    },
                    success: function(res) 
                    {
                        $('#preloader').hide();
                        $('#agent-datatable').DataTable().destroy();
                        $('#agent_tbody').html(res);
                        $('#agent-datatable').DataTable({
                            "bStateSave": true,
                            "fnStateSave": function (oSettings, oData) {
                                localStorage.setItem('agent-datatable', JSON.stringify(oData));
                            },
                            "fnStateLoad": function (oSettings) {
                                return JSON.parse(localStorage.getItem('agent-datatable'));
                            }
                        });
                    },
                });
        }   
        fetch_agentData();
        $('#create_agent_form').submit(function(event) 
        {
            event.preventDefault();
            var formData = new FormData($(this)[0]); 
            $.ajax({
                url: "{{route('agent.store')}}",
                method: "POST",
                data: formData,
                contentType: false, 
                processData: false,
                success: function(response) {
                    if (response.success) 
                    {
                        $('#CreateModal').modal('hide');
                        $('#create_agent_form')[0].reset();
                        swal("Good job!", "Agent Created successfully", {
                            icon: "success",
                            buttons: {
                                confirm: {
                                className: "btn btn-success",
                                },
                            },
                        });
                        fetch_agentData();
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
        $('#update_agent_form').submit(function(event) {
            event.preventDefault();
            var formData = new FormData($(this)[0]);
            $.ajax({
                url: "{{route('agent.update')}}",
                method: "POST", 
                data: formData,
                contentType: false, 
                processData: false,
                success: function(response) {
                    if (response.success) 
                    {
                        $('#EditModal').modal('hide');
                        $('#update_agent_form')[0].reset();
                        swal("Good job!", "Agent Updated successfully", {
                            icon: "success",
                            buttons: {
                                confirm: {
                                className: "btn btn-success",
                                },
                            },
                        });
                        fetch_agentData();   
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
        $(document).on("click", ".delete_agent", function() {
            var lead_id = $(this).data('id');
            if (confirm('Are you sure you want to delete this row?')) 
            {
                $.ajax({
                    url: "{{route('lead.destroy')}}",
                    method: "POST",
                    data:{ "_token": "{{ csrf_token() }}",
                            agent_id: agent_id
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
$(document).on("click", ".edit_agent", function() {
   var agent_id = $(this).data('id');
   $('#agent_id').val(agent_id);
   $.ajax({ type: "POST",
        url: "{{route('agent.show')}}",
        data: { "_token": "{{ csrf_token() }}",
                agent_id:agent_id
              },
        success: function(res) 
        {
          $('#agent_name').val(res.agent_name);
          $('#mobile_number').val(res.mobile_number);
          $('#email').val(res.email);
          $('#phone_number').val(res.phone_number);
          $('#company_name').val(res.company_name);
        },
    });
});
</script> 
@endpush
</x-admin1-layout>
