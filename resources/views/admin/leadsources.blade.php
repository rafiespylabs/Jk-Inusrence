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
                    <table id="leadsource-datatable" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                            <th>Sl No</th>
                            <th>LeadSource</th>
                            <th>Action</th>
                            </tr>
                        </thead>
                        <tbody id="leadsource_tbody">
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
              <form id="create_leadsource_form" class="form" enctype="multipart/form-data">
              @csrf
                <div class="row form-group">
                    <div class="col-6">
                        <label>LeadSource</label>
                        <input type="text"  name="leadsource" class="form-control">
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
                <form id="update_leadsource_form" class="form" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="leadsource_id" id="leadsource_id" value="">
                    <div class="row form-group">
                        <div class="col-6">
                            <label>LeadSource</label>
                            <input type="text"  name="leadsource" id="leadsource" class="form-control">
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
        function fetch_leadsourceData()
        {
            $('#leadsource_tbody').html('');
            $.ajax({ type: "GET",
                    url: "{{route('leadsource.list')}}",
                    beforeSend: function() 
                    {
                        $('#preloader').show();
                    },
                    success: function(res) 
                    {
                        $('#preloader').hide();
                        $('#leadsource-datatable').DataTable().destroy();
                        $('#leadsource_tbody').html(res);
                        $('#leadsource-datatable').DataTable();
                    },
                });
        }   
        fetch_leadsourceData();
        $('#create_leadsource_form').submit(function(event) 
        {
            event.preventDefault();
            var formData = new FormData($(this)[0]); 
            $.ajax({
                url: "{{route('leadsource.store')}}",
                method: "POST",
                data: formData,
                contentType: false, 
                processData: false,
                success: function(response) {
                    if (response.success) 
                    {
                        $('#CreateModal').modal('hide');
                        $('#create_leadsource_form')[0].reset();
                        swal("Good job!", "Leadsource Created successfully", {
                            icon: "success",
                            buttons: {
                                confirm: {
                                className: "btn btn-success",
                                },
                            },
                        });
                        fetch_leadsourceData();
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
        $('#update_leadsource_form').submit(function(event) {
            event.preventDefault();
            var formData = new FormData($(this)[0]);
            $.ajax({
                url: "{{route('leadsource.update')}}",
                method: "POST", 
                data: formData,
                contentType: false, 
                processData: false,
                success: function(response) {
                    if (response.success) 
                    {
                        $('#EditModal').modal('hide');
                        $('#update_leadsource_form')[0].reset();
                        swal("Good job!", "Leadsource Updated successfully", {
                            icon: "success",
                            buttons: {
                                confirm: {
                                className: "btn btn-success",
                                },
                            },
                        });
                        fetch_leadsourceData();   
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
$(document).on("click", ".edit_leadsource", function() {
   var leadsource_id = $(this).data('id');
   $('#leadsource_id').val(leadsource_id);
   $.ajax({ type: "POST",
        url: "{{route('leadsource.show')}}",
        data: { "_token": "{{ csrf_token() }}",
                leadsource_id:leadsource_id
              },
        success: function(res) 
        {
          $('#leadsource').val(res.leadsource);
        },
    });
});
</script> 
@endpush
</x-admin1-layout>