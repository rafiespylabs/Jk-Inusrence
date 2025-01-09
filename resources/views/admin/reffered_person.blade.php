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
                        <table id="reffered_person-datatable" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                <th>Sl No</th>
                                <th>Name</th>
                                <th>Phone Number</th>
                                <th>Action</th>
                                </tr>
                            </thead>
                            <tbody id="reffered_person_tbody">
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
              <form id="create_reffered_person_form" class="form" enctype="multipart/form-data">
              @csrf
                <div class="row form-group">
                    <div class="col-6">
                        <label>Name <span>*</span></label>
                        <input type="text"  name="name" class="form-control" required>
                    </div>
                    <div class="col-6">
                        <label>Phone Number</label>
                        <input type="text"  name="phone_number" class="form-control">
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
                <form id="update_reffered_person_form" class="form" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="referred_id" id="referred_id" value="">
                    <div class="row form-group">
                        <div class="col-6">
                            <label>Name <span>*</span></label>
                            <input type="text"  name="name" id="name" class="form-control" required>
                        </div>
                        <div class="col-6">
                            <label>Phone Number</label>
                            <input type="text"  name="phone_number" id="phone_number"  class="form-control">
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
        function fetch_reffered_personData()
        {
            $('#reffered_person_tbody').html('');
            $.ajax({ type: "GET",
                    url: "{{route('referredPerson.list')}}",
                    beforeSend: function() 
                    {
                        $('#preloader').show();
                    },
                    success: function(res) 
                    {
                        $('#preloader').hide();
                        $('#reffered_person-datatable').DataTable().destroy();
                        $('#reffered_person_tbody').html(res);
                        $('#reffered_person-datatable').DataTable();
                    },
                });
        }   
        fetch_reffered_personData();
        $('#create_reffered_person_form').submit(function(event) 
        {
            event.preventDefault();
            var formData = new FormData($(this)[0]); 
            $.ajax({
                url: "{{route('referredPerson.store')}}",
                method: "POST",
                data: formData,
                contentType: false, 
                processData: false,
                success: function(response) {
                    if (response.success) 
                    {
                        $('#CreateModal').modal('hide');
                        $('#create_reffered_person_form')[0].reset();
                        swal("Good job!", response.message, {
                            icon: "success",
                            buttons: {
                                confirm: {
                                className: "btn btn-success",
                                },
                            },
                        });
                        fetch_reffered_personData();
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
        $('#update_reffered_person_form').submit(function(event) {
            event.preventDefault();
            var formData = new FormData($(this)[0]);
            $.ajax({
                url: "{{route('referredPerson.update')}}",
                method: "POST", 
                data: formData,
                contentType: false, 
                processData: false,
                success: function(response) {
                    if (response.success) 
                    {
                        $('#EditModal').modal('hide');
                        $('#update_reffered_person_form')[0].reset();
                        swal("Good job!", response.message, {
                            icon: "success",
                            buttons: {
                                confirm: {
                                className: "btn btn-success",
                                },
                            },
                        });
                        fetch_reffered_personData();
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
$(document).on("click", ".edit_reffered_person", function() {
   var referred_id = $(this).data('id');
   $('#referred_id').val(referred_id);
   $.ajax({ type: "POST",
        url: "{{route('referredPerson.show')}}",
        data: { "_token": "{{ csrf_token() }}",
                 referred_id:referred_id
              },
        success: function(res) 
        {
          $('#name').val(res.name);
          $('#phone_number').val(res.phone_number);
        },
    });
});
</script> 
@endpush
</x-admin1-layout>