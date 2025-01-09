<x-admin1-layout>
@push('styles')
@endpush
<div class="page-inner">
    <div class="page-header">
    </div>
    <div class="row">
        <div class="col-md-12">
        <div class="card">
            <div class="card-header">
            <div class="d-flex align-items-center">
                <h4 class="card-title">Insurance Providers</h4>
                <button class="btn btn-primary btn-round ms-auto" data-bs-toggle="modal" data-bs-target="#CreateModal">
                <i class="fa fa-plus"></i> Create </button>
            </div>
            </div>
            <div class="card-body">
            <div id="preloader" style="display:none;">
                <img src="{{asset('web/preloader.gif')}}">
            </div>
            <div class="table-responsive">
                <table id="insuranceproviders-datatable" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                        <th>Sl No</th>
                        <th>Provider Name</th>
                        <th>Address</th>
                        <th>Company Name</th>
                        <th>Created Date</th>
                        <th>Created By</th>
                        <th>Action</th>
                        </tr>
                    </thead>
                    <tbody id="insuranceproviders_tbody">
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
              <form id="create_insuranceproviders_form" class="form" enctype="multipart/form-data">
              @csrf
                <div class="row form-group">
                    <div class="col-6">
                        <label>Provider Name</label>
                        <input type="text"  name="provider_name" class="form-control" required>
                    </div>                    
                </div>
                <div class="row form-group">
                    <div class="col-6">
                        <label>Address</label>
                        <input type="text"  name="address" class="form-control" required>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-6">
                        <label>Company Name</label>
                        <input type="text"  name="company_name" class="form-control" required>
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
                <form id="update_insuranceproviders_form" class="form" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="insuranceproviders_id" id="insuranceproviders_id" value="">
                    <div class="row form-group">
                        <div class="col-6">
                            <label>Provider Name</label>
                            <input type="text"  name="provider_name"  id="provider_name" class="form-control" required>
                        </div>                        
                    </div>
                    <div class="row form-group">
                        <div class="col-6">
                            <label>Address</label>
                            <input type="text"  name="address" id="address" class="form-control" required>
                        </div>  
                    </div>
                    <div class="row form-group">
                        <div class="col-6">
                            <label>Company Name</label>
                            <input type="text"  name="company_name" id="company_name" class="form-control" required>
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
        function fetch_insuranceprovidersData()
        {
            $('#insuranceproviders_tbody').html('');
            $.ajax({ type: "GET",
                    url: "{{route('insuranceproviders.list')}}",
                    beforeSend: function() 
                    {
                        $('#preloader').show();
                    },
                    success: function(res) 
                    {
                        $('#preloader').hide();
                        $('#insuranceproviders-datatable').DataTable().destroy();
                        $('#insuranceproviders_tbody').html(res);
                        $('#insuranceproviders-datatable').DataTable({
                            "bStateSave": true,
                            "fnStateSave": function (oSettings, oData) {
                                localStorage.setItem('insuranceproviders-datatable', JSON.stringify(oData));
                            },
                            "fnStateLoad": function (oSettings) {
                                return JSON.parse(localStorage.getItem('insuranceproviders-datatable'));
                            }
                        });
                    },
                });
        }   
        fetch_insuranceprovidersData();
        $('#create_insuranceproviders_form').submit(function(event) 
        {
            event.preventDefault();
            var formData = new FormData($(this)[0]); 
            $.ajax({
                url: "{{route('insuranceproviders.store')}}",
                method: "POST",
                data: formData,
                contentType: false, 
                processData: false,
                success: function(response) {
                    if (response.success) 
                    {
                        $('#CreateModal').modal('hide');
                        $('#create_insuranceproviders_form')[0].reset();
                        swal("Good job!", "Insurance providers Created successfully", {
                            icon: "success",
                            buttons: {
                                confirm: {
                                className: "btn btn-success",
                                },
                            },
                        });
                        fetch_insuranceprovidersData();
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
        $('#update_insuranceproviders_form').submit(function(event) 
        {
            event.preventDefault();
            var formData = new FormData($(this)[0]);
            formData.append('_token',  $('input[name="_token"]').val());
            formData.append('insuranceproviders_id', $('#insuranceproviders_id').val());
            formData.append('provider_name', $('#provider_name').val());
            formData.append('address', $('#address').val());
            formData.append('company_name', $('#company_name').val());
            $.ajax({
                url: "{{route('insuranceproviders.update')}}",
                method: "POST", 
                data: formData,
                contentType: false, 
                processData: false,
                success: function(response) {
                    if (response.success) 
                    {
                        $('#EditModal').modal('hide');
                        $('#update_insuranceproviders_form')[0].reset();
                        swal("Good job!", "Insurance providers Updated successfully", {
                            icon: "success",
                            buttons: {
                                confirm: {
                                className: "btn btn-success",
                                },
                            },
                        });
                        fetch_insuranceprovidersData();                   
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
        $(document).on("click", ".delete_insuranceproviders", function() {
    var insuranceproviders_id = $(this).data('id');
    
    if (confirm('Are you sure you want to delete this insurance provider?')) {
        $.ajax({
            url: "{{ route('insuranceproviders.destroy') }}",
            method: "POST",
            data: {
                "_token": "{{ csrf_token() }}",
                "insuranceproviders_id": insuranceproviders_id
            },
            success: function(response) {
                if (response.success) {
                    swal("Good job!", "Insurance provider deleted successfully", {
                        icon: "success",
                        buttons: {
                            confirm: {
                                className: "btn btn-success",
                            },
                        },
                    });
                    fetch_insuranceprovidersData();  
                    alert(response.message);  
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
$(document).on("click", ".edit_insuranceproviders", function() {
    var insuranceproviders_id = $(this).data('id'); 
    $('#insuranceproviders_id').val(insuranceproviders_id); 

    $.ajax({
        type: "POST",
        url: "{{ route('insuranceproviders.show') }}", 
        data: { 
            "_token": "{{ csrf_token() }}", 
            "insuranceproviders_id": insuranceproviders_id  
        },
        success: function(res) {            
            $('#provider_name').val(res.provider_name);  
            $('#address').val(res.address);
            $('#company_name').val(res.company_name);            
        },
        error: function(xhr, status, error) {
            console.error("Error:", error);
        }
    });
});
</script> 
@endpush
</x-admin1-layout>
