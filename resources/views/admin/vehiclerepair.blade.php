<x-admin1-layout>
    <div class="page-inner">
        <div class="page-header"></div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex align-items-center">
                            <button class="btn btn-primary btn-round ms-auto" data-bs-toggle="modal"
                                data-bs-target="#CreateModal">
                                <i class="fa fa-plus"></i> Create
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div id="preloader" style="display:none;">
                            <img src="{{ asset('web/preloader.gif') }}">
                        </div>
                        <div class="table-responsive">
                            <table id="vehiclerepair-datatable" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>Sl No</th>
                                        <th>Vehicle</th>
                                        <th>Driver</th>
                                        <th>Complaint Description</th>
                                        <th>Remarks</th>
                                        <th>Repair Link</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $i = 1; @endphp
                                    @foreach ($vehiclerepair as $vehicle)
                                        <tr id="row{{ $vehicle->id }}">
                                            <td>{{ $i }}</td>
                                            <td>{{ $vehicle->vehicle_number->vehicle_number ?? 'N/A' }}</td>                                
                                            <td>{{ $vehicle->staff_user_id ?? 'N/A' }}</td>                                         
                                            <td>{{ $vehicle->complaint_description}}</td>                                         
                                            <td>{{ $vehicle->remarks}}</td>
                                            <td>{{ $vehicle->repair_link}}</td>
                                            <td>{{ $vehicle->status}}</td>
                                            <td>
                                                <i class="fa fa-edit edit_vehiclerepair"
                                                    data-id="{{ $vehicle->id }}" data-rowid="{{ $i }}" data-bs-toggle="modal"
                                                    data-bs-target="#EditModal"></i>

                                                    <i class="fa fa-trash delete_vehiclerepair"
                                                    data-id="{{ $vehicle->id }}"></i>    
                                            </td>
                                        </tr>
                                        @php $i++; @endphp
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

  
    <div class="modal fade" id="CreateModal" tabindex="-1" role="dialog" aria-labelledby="CreateModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Create Vehicle Repair</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="create_vehiclerepair_form" class="form">
                        @csrf
                        <div class="form-group">
                            <label for="vehicle_number">Select Vehicle</label>
                            <select name="vehicle_number_id" id="vehicle_number_id" class="form-control" required>
                                @foreach ($vehiclecreation as $vehiclecreate)
                                    <option value="{{ $vehiclecreate->id }}">{{ $vehiclecreate->vehicle_number }}</option>
                                @endforeach
                            </select>
                        </div>    
                        <div class="form-group">
                            <label for="staff">Select Staff</label>
                            <select name="staff_user_id" id="staff_user_id" class="form-control" required>
                                @foreach ($staff as $staf)
                                    <option value="{{ $staf->user_id }}">{{ $staf->user_id }}</option>
                                @endforeach
                            </select>
                        </div>                      
                        <div class="form-group">
                            <label for="complaint_description">Complaint Description</label>
                            <input type="text" name="complaint_description" id="complaint_description" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="remarks">Remarks</label>
                            <input type="text" name="remarks" id="remarks" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="repair_link">Repair Link</label>
                            <input type="text" name="repair_link" id="repair_link" class="form-control">
                        </div>
                        <div class="form-group">
                        <label for="status">Status</label>
                        <select name="status" id="status" class="form-control" required>
                            <option value="Pending">Pending</option>
                            <option value="In Progress">In Progress</option>
                            <option value="Completed">Completed</option>
                        </select>
                    </div>                       
                        <div class="form-actions form-group">
                            <button type="submit" class="btn btn-primary btn-sm">Submit</button>
                            <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Cancel</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <div class="modal fade" id="EditModal" tabindex="-1" role="dialog" aria-labelledby="EditModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Vehicle Repair</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="edit_vehiclerepair_form" class="form">
                        @csrf

                        <input type="hidden" name="rowid" id="row_id">
                            <input type="hidden" name="id" id="vehiclerepair_id">
                            <div class="form-group">
                            <label for="vehicle_number_id">Vehicle Number</label>
                            <select name="vehicle_number_id" id="edit_vehicle_number_id" class="form-control" required>
                                @foreach ($vehiclecreation as $vehiclecreate)
                                    <option value="{{ $vehiclecreate->id }}">{{ $vehiclecreate->vehicle_number }}</option>
                                @endforeach
                            </select>
                        </div>   
                        <div class="form-group">
                            <label for="staff">Select Staff</label>
                            <select name="staff_user_id" id="edit_staff_user_id" class="form-control" required>
                                @foreach ($staff as $staf)
                                    <option value="{{ $staf->user_id }}">{{ $staf->user_id }}</option>
                                @endforeach
                            </select>
                        </div>                      
                        <div class="form-group">
                            <label for="complaint_description">Complaint Description</label>
                            <input type="text" name="complaint_description" id="edit_complaint_description" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="remarks">Remarks</label>
                            <input type="text" name="remarks" id="edit_remarks" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="repair_link">Repair Link</label>
                            <input type="text" name="repair_link" id="edit_repair_link" class="form-control">
                        </div>
                        <div class="form-group">
                        <label for="status">Status</label>
                        <select name="status" id="edit_status" class="form-control" required>
                            <option value="Pending">Pending</option>
                            <option value="In Progress">In Progress</option>
                            <option value="Completed">Completed</option>
                        </select>
                    </div>                                                   
                        <div class="form-actions form-group">
                            <button type="submit" class="btn btn-primary btn-sm">Submit</button>
                            <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Cancel</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>    

    @push('scripts')
        <script>
            $(document).ready(function() {
                $('#vehiclerepair-datatable').DataTable();
                $('#create_vehiclerepair_form').submit(function(event) {
                    event.preventDefault(); 
                    var formData = new FormData($(this)[0]);  

                    $.ajax({
                        url: "{{ route('vehiclerepair.store') }}",  
                        method: "POST",
                        data: formData,
                        contentType: false,  
                        processData: false,  
                        success: function(response) {
                            if (response.success) {
                                $('#CreateModal').modal('hide');  

                                $('#create_vehiclerepair_form')[0].reset(); 

                                swal("Success!", "Vehicle repair added successfully!", {
                                    icon: "success",
                                    buttons: {
                                        confirm: {
                                            className: "btn btn-success",
                                        },
                                    },
                                });

                                var table = $('#vehiclerepair-datatable').DataTable();
                                var lastRowNumber = table.data().count() > 0 ? parseInt(table.row(':last').data()[0]) + 1 : 0;

                                var newRow = table.row.add([
                                    lastRowNumber,                         
                                    response.data.vehicle_number, 
                                    response.data.user_id, 
                                    response.data.complaint_description, 
                                    response.data.remarks,                                   
                                    response.data.repair_link, 
                                    response.data.status, 
                                    '<i class="fa fa-edit edit_vehiclerepair" data-rowid="'+ lastRowNumber +'" data-id="' + response.data.id + '" data-bs-toggle="modal" data-bs-target="#EditModal"></i>' +
                                    '<i class="fa fa-trash delete_vehiclerepair" data-rowid="'+ lastRowNumber +'" data-id="' + response.data.id + '"></i>'
                                ]).draw(false);

                                table.page('last').draw(false);  
                                $(newRow.node()).attr('id', 'row' + response.data.id);  
                            } else {
                                swal("Error", response.message, {
                                    icon: "error",
                                    buttons: {
                                        confirm: {
                                            className: "btn btn-danger",
                                        },
                                    },
                                });
                            }
                        },
                        error: function(xhr, status, error) {
                            console.error('AJAX error:', error);
                            swal("Error", "An unexpected error occurred. Please try again.", {
                                icon: "error",
                                buttons: {
                                    confirm: {
                                        className: "btn btn-danger",
                                    },
                                },
                            });
                        }
                    });
                });          
          
                $(document).on("click", ".edit_vehiclerepair", function() {
                    var vehiclerepair_id = $(this).data('id'); 
                    var row_id = $(this).data('rowid');   
                    var vehicle_number_id = $(this).data('vehicle_number_id'); 
                    var staff_user_id = $(this).data('staff_user_id'); 
                    
                    $('#vehiclerepair_id').val(vehiclerepair_id);
                    $('#row_id').val(row_id);
                    $('#vehicle_number_id').val(vehicle_number_id);
                    $('#staff_user_id').val(staff_user_id);
                
                    $.ajax({
                        type: "POST",
                        url: "{{ route('vehiclerepair.edit') }}", 
                        data: {
                            "_token": "{{ csrf_token() }}",
                            "id": vehiclerepair_id             
                        },
                        success: function(response) {
                            if (response.success) {

                                $('#edit_vehicle_number_id').val(response.data.vehicle_number_id);                                
                                $('#edit_staff_user_id').val(response.data.staff_user_id);                                
                                $('#edit_complaint_description').val(response.data.complaint_description);
                                $('#edit_remarks').val(response.data.remarks);
                                $('#edit_repair_link').val(response.data.repair_link);
                                $('#edit_status').val(response.data.status);
                                
                                $('#EditModal').modal('show');
                            } else {
                                alert('Error: ' + response.message);
                            }
                        },
                        error: function(xhr, status, error) {
                            console.error('AJAX Error:', error);
                            alert('Failed to fetch vehicle data. Please try again.');
                        }
                    });
                });

                $('#edit_vehiclerepair_form').submit(function(event) {
                    event.preventDefault(); 
                    var formData = new FormData($(this)[0]);
                    var rowId = $('#row_id').val();

                    $.ajax({
                        url: "{{ route('vehiclerepair.update') }}", 
                        method: "POST", 
                        data: formData,
                        contentType: false, 
                        processData: false, 
                        success: function(response) {
                            if (response.success) {
                                $('#EditModal').modal('hide');
                                $('#edit_vehiclerepair_form')[0].reset();
                                swal("Success!", "Vehicle repair Updated successfully", {
                                    icon: "success",
                                    buttons: {
                                        confirm: {
                                            className: "btn btn-success",
                                        },
                                    },
                                });
                                
                                var table = $('#vehiclerepair-datatable').DataTable();
                                var row = table.row('#row' + response.data.id); 
                                
                                row.data([
                                    rowId,                        
                                    response.data.vehicle_number, 
                                    response.data.user_id, 
                                    response.data.complaint_description, 
                                    response.data.remarks,                                   
                                    response.data.repair_link, 
                                    response.data.status,
                                    '<i class="fa fa-edit edit_vehiclerepair" data-rowid="'+ rowId +'" data-id="' + response.data.id + '" data-bs-toggle="modal" data-bs-target="#EditModal"></i>' +
                                    '<i class="fa fa-trash delete_vehiclerepair" data-rowid="'+ rowId +'" data-id="' + response.data.id + '"></i>' 
                                ]).draw(false); 
                                } else {
                                    alert('Error updating data: ' + response.message);
                                }
                        },
                        error: function(xhr, status, error) {
                            console.error('AJAX error:', error);
                        }
                    });
                });

                $(document).on('click', '.delete_vehiclerepair', function () {
                    var vehiclerepairId = $(this).data('id'); 
                    var rowSelector = '#row' + vehiclerepairId; 

                    swal({
                        title: "Are you sure?",
                        text: "You won't be able to revert this!",
                        icon: "warning",
                        buttons: true,
                        dangerMode: true,
                    }).then((willDelete) => {
                        if (willDelete) {
                            $.ajax({
                                url: "{{ route('vehiclerepair.destroy') }}", 
                                method: "POST",
                                data: {
                                    "_token": "{{ csrf_token() }}",
                                    "id": vehiclerepairId               
                                },
                                success: function (response) {
                                    if (response.success) {                       
                                        var table = $('#vehiclerepair-datatable').DataTable();
                                        table.row($(rowSelector)).remove().draw(false);                    

                                        swal("Deleted!", response.message, {
                                            icon: "success",
                                        });
                                    } else {
                                        swal("Error", response.message, {
                                            icon: "error",
                                        });
                                    }
                                },
                                error: function (xhr, status, error) {
                                    console.error('AJAX error:', xhr.responseText);
                                    swal("Error", "An unexpected error occurred. Please try again.", {
                                        icon: "error",
                                    });
                                }
                            });
                        }
                    });
                });

            });
            
        </script>
    @endpush
</x-admin1-layout>