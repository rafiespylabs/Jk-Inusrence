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
                            <table id="vehicleinsurances-datatable" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>Sl No</th>
                                        <th>Vehicle</th>
                                        <th>Insurance start date</th>
                                        <th>Insurance end date</th>
                                        <th>Insurance company name</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $i = 1; @endphp
                                    @foreach ($vehicleinsurances as $vehicleinsurance)
                                        <tr id="row{{ $vehicleinsurance->id }}">
                                            <td>{{ $i }}</td>
                                            <td>{{ $vehicleinsurance->vehicle_number->vehicle_number ?? 'N/A' }}</td>                                
                                            <td>{{ $vehicleinsurance->start_date}}</td>                                         
                                            <td>{{ $vehicleinsurance->end_date}}</td>                                         
                                            <td>{{ $vehicleinsurance->insurance_company_name}}</td>
                                            <td>
                                                <i class="fa fa-edit edit_vehicleinsurances"
                                                    data-id="{{ $vehicleinsurance->id }}" data-rowid="{{ $i }}" data-bs-toggle="modal"
                                                    data-bs-target="#EditModal"></i>

                                                    <i class="fa fa-trash delete_vehicleinsurances"
                                                    data-id="{{ $vehicleinsurance->id }}"></i>    
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
                    <h5 class="modal-title">Create Vehicle Insurance</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="create_vehicleinsurances_form" class="form">
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
                            <label for="start_date">Insurance Start Date</label>
                            <input type="date" name="start_date" id="start_date" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="end_date">Insurance End Date</label>
                            <input type="date" name="end_date" id="end_date" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="insurance_company_name">Insurance Company Name</label>
                            <input type="text" name="insurance_company_name" id="insurance_company_name" class="form-control">
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
                    <h5 class="modal-title">Edit Vehicle Insurance</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="edit_vehicleinsurances_form" class="form">
                        @csrf

                        <input type="hidden" name="rowid" id="row_id">
                            <input type="hidden" name="id" id="vehicleinsurances_id">
                            <div class="form-group">
                            <label for="vehicle_number_id">Vehicle Number</label>
                            <select name="vehicle_number_id" id="edit_vehicle_number_id" class="form-control" required>
                                @foreach ($vehiclecreation as $vehiclecreate)
                                    <option value="{{ $vehiclecreate->id }}">{{ $vehiclecreate->vehicle_number }}</option>
                                @endforeach
                            </select>
                        </div>   
                        <div class="form-group">
                            <label for="start_date">Insurance Start Date</label>
                            <input type="date" name="start_date" id="edit_start_date" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="end_date">Insurance End Date</label>
                            <input type="date" name="end_date" id="edit_end_date" class="form-control" required>
                        </div>  
                        <div class="form-group">
                            <label for="insurance_company_name">Insurance Company Name</label>
                            <input type="text" name="insurance_company_name" id="edit_insurance_company_name" class="form-control" required>
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
                $('#vehicleinsurances-datatable').DataTable();
                $('#create_vehicleinsurances_form').submit(function(event) {
                    event.preventDefault(); 
                    var formData = new FormData($(this)[0]);  

                    $.ajax({
                        url: "{{ route('vehicleinsurances.store') }}",  
                        method: "POST",
                        data: formData,
                        contentType: false,  
                        processData: false,  
                        success: function(response) {
                            if (response.success) {
                                $('#CreateModal').modal('hide');  

                                $('#create_vehicleinsurances_form')[0].reset(); 

                                swal("Success!", "Vehicle insurance added successfully!", {
                                    icon: "success",
                                    buttons: {
                                        confirm: {
                                            className: "btn btn-success",
                                        },
                                    },
                                });

                                var table = $('#vehicleinsurances-datatable').DataTable();
                                var lastRowNumber = table.data().count() > 0 ? parseInt(table.row(':last').data()[0]) + 1 : 0;

                                var newRow = table.row.add([
                                    lastRowNumber,                         
                                    response.data.vehicle_number, 
                                    response.data.start_date, 
                                    response.data.end_date,                                   
                                    response.data.insurance_company_name, 
                                    '<i class="fa fa-edit edit_vehicleinsurances" data-rowid="'+ lastRowNumber +'" data-id="' + response.data.id + '" data-bs-toggle="modal" data-bs-target="#EditModal"></i>' +
                                    '<i class="fa fa-trash delete_vehicleinsurances" data-rowid="'+ lastRowNumber +'" data-id="' + response.data.id + '"></i>'
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
          
                $(document).on("click", ".edit_vehicleinsurances", function() {
                    var vehicleinsurances_id = $(this).data('id'); 
                    var row_id = $(this).data('rowid');   
                    var vehicle_number_id = $(this).data('vehicle_number_id'); 
                    
                    $('#vehicleinsurances_id').val(vehicleinsurances_id);
                    $('#row_id').val(row_id);
                    $('#vehicle_number_id').val(vehicle_number_id);
                
                    $.ajax({
                        type: "POST",
                        url: "{{ route('vehicleinsurances.edit') }}", 
                        data: {
                            "_token": "{{ csrf_token() }}",
                            "id": vehicleinsurances_id             
                        },
                        success: function(response) {
                            if (response.success) {

                                $('#edit_vehicle_number_id').val(response.data.vehicle_number_id);                                
                                $('#edit_start_date').val(response.data.start_date);
                                $('#edit_end_date').val(response.data.end_date);
                                $('#edit_insurance_company_name').val(response.data.insurance_company_name);
                                
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

                $('#edit_vehicleinsurances_form').submit(function(event) {
                    event.preventDefault(); 
                    var formData = new FormData($(this)[0]);
                    var rowId = $('#row_id').val();

                    $.ajax({
                        url: "{{ route('vehicleinsurances.update') }}", 
                        method: "POST", 
                        data: formData,
                        contentType: false, 
                        processData: false, 
                        success: function(response) {
                            if (response.success) {
                                $('#EditModal').modal('hide');
                                $('#edit_vehicleinsurances_form')[0].reset();
                                swal("Success!", "Vehicle insurance Updated successfully", {
                                    icon: "success",
                                    buttons: {
                                        confirm: {
                                            className: "btn btn-success",
                                        },
                                    },
                                });
                                
                                var table = $('#vehicleinsurances-datatable').DataTable();
                                var row = table.row('#row' + response.data.id); 
                                
                                row.data([
                                    rowId,                        
                                    response.data.vehicle_number, 
                                    response.data.start_date, 
                                    response.data.end_date, 
                                    response.data.insurance_company_name, 
                                    '<i class="fa fa-edit edit_vehicleinsurances" data-rowid="'+ rowId +'" data-id="' + response.data.id + '" data-bs-toggle="modal" data-bs-target="#EditModal"></i>' +
                                    '<i class="fa fa-trash delete_vehicleinsurances" data-rowid="'+ rowId +'" data-id="' + response.data.id + '"></i>' 
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

                $(document).on('click', '.delete_vehicleinsurances', function () {
                    var vehicleinsurancesId = $(this).data('id'); 
                    var rowSelector = '#row' + vehicleinsurancesId; 

                    swal({
                        title: "Are you sure?",
                        text: "You won't be able to revert this!",
                        icon: "warning",
                        buttons: true,
                        dangerMode: true,
                    }).then((willDelete) => {
                        if (willDelete) {
                            $.ajax({
                                url: "{{ route('vehicleinsurances.destroy') }}", 
                                method: "POST",
                                data: {
                                    "_token": "{{ csrf_token() }}",
                                    "id": vehicleinsurancesId               
                                },
                                success: function (response) {
                                    if (response.success) {                       
                                        var table = $('#vehicleinsurances-datatable').DataTable();
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