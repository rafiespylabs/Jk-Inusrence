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
                            <table id="vehiclecreation-datatable" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>Sl No</th>
                                        <th>Vehicle Type</th>
                                        <th>Vehicle Brand</th>
                                        <th>Vehicle Model</th>
                                        <th>Vehicle Number</th>
                                        <th>Engine Number</th>
                                        <th>Date of registration</th>
                                        <th>End registration</th>
                                        <th>Owner Name</th>
                                        <th>Chassis Number</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $i = 1; @endphp
                                    @foreach ($vehiclecreation as $vehiclecreate)
                                        <tr id="row{{ $vehiclecreate->id }}">
                                            <td>{{ $i }}</td>
                                            <td>{{ $vehiclecreate->type->type ?? 'N/A' }}</td>
                                            <td>{{ $vehiclecreate->brand->brand ?? 'N/A' }}</td>
                                            <td>{{ $vehiclecreate->model->model ?? 'N/A' }}</td>
                                            <td>{{ $vehiclecreate->vehicle_number}}</td>
                                            <td>{{ $vehiclecreate->engine_number}}</td>
                                            <td>{{ $vehiclecreate->date_of_registration}}</td>                                         
                                            <td>{{ $vehiclecreate->end_registration}}</td>                                         
                                            <td>{{ $vehiclecreate->owner_name}}</td>                                         
                                            <td>{{ $vehiclecreate->chassis_number}}</td>
                                            <td>
                                                <i class="fa fa-edit edit_vehiclecreation"
                                                    data-id="{{ $vehiclecreate->id }}" data-rowid="{{ $i }}" data-bs-toggle="modal"
                                                    data-bs-target="#EditModal"></i>

                                                    <i class="fa fa-trash delete_vehiclecreation"
                                                    data-id="{{ $vehiclecreate->id }}"></i>    
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
                    <h5 class="modal-title">Create vehicle </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="create_vehiclecreation_form" class="form">
                        @csrf
                        <div class="form-group">
                            <label for="type">Type</label>
                            <select name="type_id" id="type_id" class="form-control" required>
                                @foreach ($vehicletypes as $vehicletype)
                                    <option value="{{ $vehicletype->id }}">{{ $vehicletype->type }}</option>
                                @endforeach
                            </select>
                        </div>      
                        <div class="form-group">
                            <label for="brand">Brand</label>
                            <select name="brand_id" id="brand_id" class="form-control" required>
                                @foreach ($vehiclebrands as $vehiclebrand)
                                    <option value="{{ $vehiclebrand->id }}">{{ $vehiclebrand->brand }}</option>
                                @endforeach
                            </select>
                        </div>   
                        <div class="form-group">
                            <label for="model">Model</label>
                            <select name="model_id" id="model_id" class="form-control" required>
                                @foreach ($vehiclemodels as $vehiclemodel)
                                    <option value="{{ $vehiclemodel->id }}">{{ $vehiclemodel->model }}</option>
                                @endforeach
                            </select>
                        </div>          
                        <div class="form-group">
                            <label for="vehicle_number">Vehicle number</label>
                            <input type="number" name="vehicle_number" id="vehicle_number" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="engine_number">Engine Number</label>
                            <input type="text" name="engine_number" id="engine_number" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="date_of_registration">Date of registration</label>
                            <input type="date" name="date_of_registration" id="date_of_registration" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="end_registration">End registration</label>
                            <input type="date" name="end_registration" id="end_registration" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="owner_name">Owner Name</label>
                            <input type="text" name="owner_name" id="owner_name" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="chassis_number">Chassis Number</label>
                            <input type="number" name="chassis_number" id="chassis_number" class="form-control" required>
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
                    <h5 class="modal-title">Edit Vehicle</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="edit_vehiclecreation_form" class="form">
                        @csrf

                        <input type="hidden" name="rowid" id="row_id">
                            <input type="hidden" name="id" id="vehiclecreation_id">
                            <div class="form-group">
                            <label for="type_id">Type</label>
                            <select name="type_id" id="edit_type_id" class="form-control" required>
                                @foreach ($vehicletypes as $vehicletype)
                                    <option value="{{ $vehicletype->id }}">{{ $vehicletype->type }}</option>
                                @endforeach
                            </select>
                        </div>       
                        <div class="form-group">
                            <label for="brand_id">Brand</label>
                            <select name="brand_id" id="edit_brand_id" class="form-control" required>
                                @foreach ($vehiclebrands as $vehiclebrand)
                                    <option value="{{ $vehiclebrand->id }}">{{ $vehiclebrand->brand }}</option>
                                @endforeach
                            </select>
                        </div>       
                        <div class="form-group">
                            <label for="model_id">Model</label>
                            <select name="model_id" id="edit_model_id" class="form-control" required>
                                @foreach ($vehiclemodels as $vehiclemodel)
                                    <option value="{{ $vehiclemodel->id }}">{{ $vehiclemodel->model }}</option>
                                @endforeach
                            </select>
                        </div>       
                        <div class="form-group">
                            <label for="vehicle_number">Vehicle number</label>
                            <input type="number" name="vehicle_number" id="edit_vehicle_number" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="engine_number">Engine Number</label>
                            <input type="text" name="engine_number" id="edit_engine_number" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="date_of_registration">Date of registration</label>
                            <input type="date" name="date_of_registration" id="edit_date_of_registration" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="end_registration">End registration</label>
                            <input type="date" name="end_registration" id="edit_end_registration" class="form-control" required>
                        </div>  
                        <div class="form-group">
                            <label for="owner_name">Owner Name</label>
                            <input type="text" name="owner_name" id="edit_owner_name" class="form-control" required>
                        </div>  
                        <div class="form-group">
                            <label for="chassis_number">Chassis Number</label>
                            <input type="number" name="chassis_number" id="edit_chassis_number" class="form-control" required>
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
                $('#vehiclecreation-datatable').DataTable();
                $('#create_vehiclecreation_form').submit(function(event) {
                    event.preventDefault(); 
                    var formData = new FormData($(this)[0]);  

                    $.ajax({
                        url: "{{ route('vehiclecreation.store') }}",  
                        method: "POST",
                        data: formData,
                        contentType: false,  
                        processData: false,  
                        success: function(response) {
                            if (response.success) {
                                $('#CreateModal').modal('hide');  

                                $('#create_vehiclecreation_form')[0].reset(); 

                                swal("Success!", "Vehicle added successfully!", {
                                    icon: "success",
                                    buttons: {
                                        confirm: {
                                            className: "btn btn-success",
                                        },
                                    },
                                });

                                var table = $('#vehiclecreation-datatable').DataTable();
                                var lastRowNumber = table.data().count() > 0 ? parseInt(table.row(':last').data()[0]) + 1 : 0;

                                var newRow = table.row.add([
                                    lastRowNumber,                         
                                    response.data.type, 
                                    response.data.brand, 
                                    response.data.model, 
                                    response.data.vehicle_number, 
                                    response.data.engine_number, 
                                    response.data.date_of_registration, 
                                    response.data.end_registration, 
                                    response.data.owner_name, 
                                    response.data.chassis_number, 
                                    '<i class="fa fa-edit edit_vehiclecreation" data-rowid="'+ lastRowNumber +'" data-id="' + response.data.id + '" data-bs-toggle="modal" data-bs-target="#EditModal"></i>' +
                                    '<i class="fa fa-trash delete_vehiclecreation" data-rowid="'+ lastRowNumber +'" data-id="' + response.data.id + '"></i>'
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
          
                $(document).on("click", ".edit_vehiclecreation", function() {
                    var vehiclecreation_id = $(this).data('id'); 
                    var row_id = $(this).data('rowid');   
                    var type_id = $(this).data('type_id'); 
                    var brand_id = $(this).data('brand_id'); 
                    var model_id = $(this).data('model_id'); 
                    
                    $('#vehiclecreation_id').val(vehiclecreation_id);
                    $('#row_id').val(row_id);
                    $('#type_id').val(type_id);
                    $('#brand_id').val(brand_id);
                    $('#model_id').val(model_id);
                
                    $.ajax({
                        type: "POST",
                        url: "{{ route('vehiclecreation.edit') }}", 
                        data: {
                            "_token": "{{ csrf_token() }}",
                            "id": vehiclecreation_id             
                        },
                        success: function(response) {
                            if (response.success) {

                                $('#edit_vehicle_number').val(response.data.vehicle_number);
                                $('#edit_engine_number').val(response.data.engine_number);
                                $('#edit_date_of_registration').val(response.data.date_of_registration);
                                $('#edit_end_registration').val(response.data.end_registration);
                                $('#edit_owner_name').val(response.data.owner_name);
                                $('#edit_chassis_number').val(response.data.chassis_number);
                                $('#edit_type_id').val(response.data.type_id); 
                                $('#edit_brand_id').val(response.data.brand_id); 
                                $('#edit_model_id').val(response.data.model_id); 
                            
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

                $('#edit_vehiclecreation_form').submit(function(event) {
                    event.preventDefault(); 
                    var formData = new FormData($(this)[0]);
                    var rowId = $('#row_id').val();

                    $.ajax({
                        url: "{{ route('vehiclecreation.update') }}", 
                        method: "POST", 
                        data: formData,
                        contentType: false, 
                        processData: false, 
                        success: function(response) {
                            if (response.success) {
                                $('#EditModal').modal('hide');
                                $('#edit_vehiclecreation_form')[0].reset();
                                swal("Success!", "Vehicle Updated successfully", {
                                    icon: "success",
                                    buttons: {
                                        confirm: {
                                            className: "btn btn-success",
                                        },
                                    },
                                });
                                
                                var table = $('#vehiclecreation-datatable').DataTable();
                                var row = table.row('#row' + response.data.id); 
                                
                                row.data([
                                    rowId,                        
                                    response.data.type, 
                                    response.data.brand, 
                                    response.data.model, 
                                    response.data.vehicle_number, 
                                    response.data.engine_number, 
                                    response.data.date_of_registration, 
                                    response.data.end_registration, 
                                    response.data.owner_name, 
                                    response.data.chassis_number, 
                                    '<i class="fa fa-edit edit_vehiclecreation" data-rowid="'+ rowId +'" data-id="' + response.data.id + '" data-bs-toggle="modal" data-bs-target="#EditModal"></i>' +
                                    '<i class="fa fa-trash delete_vehiclecreation" data-rowid="'+ rowId +'" data-id="' + response.data.id + '"></i>' 
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

                $(document).on('click', '.delete_vehiclecreation', function () {
                    var vehiclecreationId = $(this).data('id'); 
                    var rowSelector = '#row' + vehiclecreationId; 

                    swal({
                        title: "Are you sure?",
                        text: "You won't be able to revert this!",
                        icon: "warning",
                        buttons: true,
                        dangerMode: true,
                    }).then((willDelete) => {
                        if (willDelete) {
                            $.ajax({
                                url: "{{ route('vehiclecreation.destroy') }}", 
                                method: "POST",
                                data: {
                                    "_token": "{{ csrf_token() }}",
                                    "id": vehiclecreationId               
                                },
                                success: function (response) {
                                    if (response.success) {                       
                                        var table = $('#vehiclecreation-datatable').DataTable();
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