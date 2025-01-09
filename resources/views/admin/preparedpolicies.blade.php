<x-admin1-layout>
<div class="page-inner">
    <div class="page-header">
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex align-items-center">
                        <h2>Prepared Policies</h2>
                        <button class="btn btn-primary btn-round ms-auto" data-bs-toggle="modal" data-bs-target="#CreateModal">
                        <i class="fa fa-plus"></i> Create</button>
                    </div>
                </div>
                <div class="card-body">
                    <div id="preloader" style="display:none;">
                        <img src="{{asset('web/preloader.gif')}}">
                    </div>
                    <div class="table-responsive">
                    <table id="prepare_policy-datatable" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                            <th>Sl No</th>
                            <th>Vehicle Number</th>
                            <th>Phone Number</th>
                            <th>Prepared Link</th>
                            <th>Note</th>
                            <th>Created By</th>
                            <th>Created Date</th>
                            <th>Action</th>
                            </tr>
                        </thead>
                        <tbody id="prepare_policy_tbody">
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
              <form id="create_prepare_policy_form" class="form" enctype="multipart/form-data">
              @csrf
                <div class="row form-group">
                    <div class="col-6">
                        <label>Policy<span>*</span></label>
                        <select name="policy_id" class="form-control" required>
                            <option value="">Select One</option>
                            @foreach($assigned_policies as $policy)
                            <option value="{{$policy->id}}">{{$policy->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-6">
                        <label>Link<span>*</span></label>
                        <textarea  name="link" class="form-control" required></textarea>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-6">
                        <label>Note</label>
                        <textarea  name="note" class="form-control"></textarea>
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
                <form id="update_prepare_policy_form" class="form" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="prepare_policyid" id="prepare_policyid" value="">
                    <div class="row form-group">
                        <div class="col-6">
                            <label>Policy<span>*</span></label>
                            <select name="policy_id" id="policy_id" class="form-control" required>
                                <option value="">Select One</option>
                                @foreach($assigned_policies as $policy)
                                <option value="{{$policy->id}}">{{$policy->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-6">
                            <label>Link<span>*</span></label>
                            <textarea  name="link" id="link" class="form-control" required></textarea>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-6">
                            <label>Note</label>
                            <textarea  name="note" id="note"  class="form-control"></textarea>
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
        function fetch_prepare_policyData()
        {
            $('#prepare_policy_tbody').html('');
            $.ajax({ type: "GET",
                    url: "{{route('prepared_policies.list')}}",
                    beforeSend: function() 
                    {
                        $('#preloader').show();
                    },
                    success: function(res) 
                    {
                        $('#preloader').hide();
                        $('#prepare_policy-datatable').DataTable().destroy();
                        $('#prepare_policy_tbody').html(res);
                        $('#prepare_policy-datatable').DataTable({
                            "bStateSave": true,
                            "fnStateSave": function (oSettings, oData) {
                                localStorage.setItem('prepare_policy-datatable', JSON.stringify(oData));
                            },
                            "fnStateLoad": function (oSettings) {
                                return JSON.parse(localStorage.getItem('prepare_policy-datatable'));
                            }
                        });
                    },
                });
        }   
        fetch_prepare_policyData();
        $('#create_prepare_policy_form').submit(function(event) 
        {
            event.preventDefault();
            var formData = new FormData($(this)[0]); 
            $.ajax({
                url: "{{route('prepared_policy.store')}}",
                method: "POST",
                data: formData,
                contentType: false, 
                processData: false,
                success: function(response) {
                    if (response.success) 
                    {
                        $('#CreateModal').modal('hide');
                        $('#create_prepare_policy_form')[0].reset();
                        swal("Good job!",response.message, {
                            icon: "success",
                            buttons: {
                                confirm: {
                                className: "btn btn-success",
                                },
                            },
                        });
                        fetch_prepare_policyData();
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
        $('#update_prepare_policy_form').submit(function(event) {
            event.preventDefault();
            var formData = new FormData($(this)[0]);
            $.ajax({
                url: "{{route('prepared_policy.update')}}",
                method: "POST", 
                data: formData,
                contentType: false, 
                processData: false,
                success: function(response) {
                    if (response.success) 
                    {
                        $('#EditModal').modal('hide');
                        $('#update_prepare_policy_form')[0].reset();
                        swal("Good job!", response.message, {
                            icon: "success",
                            buttons: {
                                confirm: {
                                className: "btn btn-success",
                                },
                            },
                        });
                        fetch_prepare_policyData();
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
$(document).on("click", ".edit_preparepolicy", function() {
   var prepare_policyid = $(this).data('id');
   $('#prepare_policyid').val(prepare_policyid);
   $.ajax({ type: "POST",
        url: "{{route('prepared_policy.show')}}",
        data: { "_token": "{{ csrf_token() }}",
            prepare_policyid:prepare_policyid
              },
        success: function(res) 
        {
          $('#policy_id').val(res.policy_id);
          $('#link').val(res.link);
          $('#note').val(res.note);
        },
    });
});
</script> 
@endpush
</x-admin1-layout>