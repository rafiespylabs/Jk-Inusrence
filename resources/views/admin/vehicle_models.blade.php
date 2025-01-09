<x-admin1-layout>
<div class="page-inner">
    <div class="page-header">
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex align-items-center">
                        <h2>Companies</h2>
                        <button class="btn btn-primary btn-round ms-auto" data-bs-toggle="modal" data-bs-target="#CreateModal">
                        <i class="fa fa-plus"></i> Create</button>
                    </div>
                </div>
                <div class="card-body">
                    <div id="preloader" style="display:none;">
                        <img src="{{asset('web/preloader.gif')}}">
                    </div>
                    <div class="table-responsive">
                    <table id="vehiclemodel-datatable" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                            <th>Sl No</th>
                            <th>Vehicle Model</th>
                            <th>Created By</th>
                            <th>Created Date</th>
                            <th>Action</th>
                            </tr>
                        </thead>
                        <tbody id="vehiclemodel_tbody">
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
              <form id="create_vehiclemodel_form" class="form" enctype="multipart/form-data">
              @csrf
                <div class="row form-group">
                    <div class="col-6">
                        <label>Vehicle Model<span>*</span></label>
                        <input type="text"  name="vehicle_model" class="form-control" required>
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
                <form id="update_vehiclemodel_form" class="form" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="vehicle_model_id" id="vehicle_model_id" value="">
                    <div class="row form-group">
                        <div class="col-6">
                            <label>Vehicle Model<span>*</span></label>
                            <input type="text"  name="vehicle_model" id="vehicle_model"  class="form-control" required>
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
        function fetch_vehiclemodelData()
        {
            $('#vehiclemodel_tbody').html('');
            $.ajax({ type: "GET",
                    url: "{{route('vehiclemodel.list')}}",
                    beforeSend: function() 
                    {
                        $('#preloader').show();
                    },
                    success: function(res) 
                    {
                        $('#preloader').hide();
                        $('#vehiclemodel-datatable').DataTable().destroy();
                        $('#vehiclemodel_tbody').html(res);
                        $('#vehiclemodel-datatable').DataTable({
                            "bStateSave": true,
                            "fnStateSave": function (oSettings, oData) {
                                localStorage.setItem('vehiclemodel-datatable', JSON.stringify(oData));
                            },
                            "fnStateLoad": function (oSettings) {
                                return JSON.parse(localStorage.getItem('vehiclemodel-datatable'));
                            }
                        });
                    },
                });
        }   
        fetch_vehiclemodelData();
        $('#create_vehiclemodel_form').submit(function(event) 
        {
            event.preventDefault();
            var formData = new FormData($(this)[0]); 
            $.ajax({
                url: "{{route('vehiclemodel.store')}}",
                method: "POST",
                data: formData,
                contentType: false, 
                processData: false,
                success: function(response) {
                    if (response.success) 
                    {
                        $('#CreateModal').modal('hide');
                        $('#create_vehiclemodel_form')[0].reset();
                        swal("Good job!", "Vehicle Model Created successfully", {
                            icon: "success",
                            buttons: {
                                confirm: {
                                className: "btn btn-success",
                                },
                            },
                        });
                        fetch_vehiclemodelData();
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
        $('#update_vehiclemodel_form').submit(function(event) {
            event.preventDefault();
            var formData = new FormData($(this)[0]);
            $.ajax({
                url: "{{route('vehiclemodel.update')}}",
                method: "POST", 
                data: formData,
                contentType: false, 
                processData: false,
                success: function(response) {
                    if (response.success) 
                    {
                        $('#EditModal').modal('hide');
                        $('#update_vehiclemodel_form')[0].reset();
                        swal("Good job!", "Vehicle Model Updated successfully", {
                            icon: "success",
                            buttons: {
                                confirm: {
                                className: "btn btn-success",
                                },
                            },
                        });
                        fetch_vehiclemodelData();   
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
$(document).on("click", ".edit_vehicle_model", function() {
   var vehicle_model_id = $(this).data('id');
   $('#vehicle_model_id').val(vehicle_model_id);
   $.ajax({ type: "POST",
        url: "{{route('vehiclemodel.show')}}",
        data: { "_token": "{{ csrf_token() }}",
                vehicle_model_id:vehicle_model_id
              },
        success: function(res) 
        {
          $('#vehicle_model').val(res.vehicle_model);
        },
    });
});
</script> 
@endpush
</x-admin1-layout>