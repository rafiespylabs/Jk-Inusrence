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
                    <table id="company-datatable" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                            <th>Sl No</th>
                            <th>Company</th>
                            <th>Phone</th>
                            <th>Created By</th>
                            <th>Created Date</th>
                            <th>Action</th>
                            </tr>
                        </thead>
                        <tbody id="company_tbody">
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
              <form id="create_company_form" class="form" enctype="multipart/form-data">
              @csrf
                <div class="row form-group">
                    <div class="col-6">
                        <label>Company<span>*</span></label>
                        <input type="text"  name="company" class="form-control" required>
                    </div>
                    <div class="col-6">
                        <label>Phone<span>*</span></label>
                        <input type="text"  name="phone" class="form-control" required pattern="[6789][0-9]{9}" title="Please enter valid phone number">
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
                <form id="update_company_form" class="form" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="company_id" id="company_id" value="">
                    <div class="row form-group">
                        <div class="col-6">
                            <label>Company<span>*</span></label>
                            <input type="text"  name="company" id="company" class="form-control" required>
                        </div>
                        <div class="col-6">
                            <label>Phone<span>*</span></label>
                            <input type="text"  name="phone" class="form-control" id="phone" required pattern="[6789][0-9]{9}" title="Please enter valid phone number">
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
        function fetch_companyData()
        {
            $('#company_tbody').html('');
            $.ajax({ type: "GET",
                    url: "{{route('companies.list')}}",
                    beforeSend: function() 
                    {
                        $('#preloader').show();
                    },
                    success: function(res) 
                    {
                        $('#preloader').hide();
                        $('#company-datatable').DataTable().destroy();
                        $('#company_tbody').html(res);
                        $('#company-datatable').DataTable({
                            "bStateSave": true,
                            "fnStateSave": function (oSettings, oData) {
                                localStorage.setItem('company-datatable', JSON.stringify(oData));
                            },
                            "fnStateLoad": function (oSettings) {
                                return JSON.parse(localStorage.getItem('company-datatable'));
                            }
                        });
                    },
                });
        }   
        fetch_companyData();
        $('#create_company_form').submit(function(event) 
        {
            event.preventDefault();
            var formData = new FormData($(this)[0]); 
            $.ajax({
                url: "{{route('companies.store')}}",
                method: "POST",
                data: formData,
                contentType: false, 
                processData: false,
                success: function(response) {
                    if (response.success) 
                    {
                        $('#CreateModal').modal('hide');
                        $('#create_company_form')[0].reset();
                        swal("Good job!", "Company Created successfully", {
                            icon: "success",
                            buttons: {
                                confirm: {
                                className: "btn btn-success",
                                },
                            },
                        });
                        fetch_companyData();
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
        $('#update_company_form').submit(function(event) {
            event.preventDefault();
            var formData = new FormData($(this)[0]);
            $.ajax({
                url: "{{route('company.update')}}",
                method: "POST", 
                data: formData,
                contentType: false, 
                processData: false,
                success: function(response) {
                    if (response.success) 
                    {
                        $('#EditModal').modal('hide');
                        $('#update_company_form')[0].reset();
                        swal("Good job!", "Company Updated successfully", {
                            icon: "success",
                            buttons: {
                                confirm: {
                                className: "btn btn-success",
                                },
                            },
                        });
                        fetch_companyData();   
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
$(document).on("click", ".edit_company", function() {
   var company_id = $(this).data('id');
   $('#company_id').val(company_id);
   $.ajax({ type: "POST",
        url: "{{route('company.show')}}",
        data: { "_token": "{{ csrf_token() }}",
                company_id:company_id
              },
        success: function(res) 
        {
          $('#company').val(res.company);
          $('#phone').val(res.phone);
        },
    });
});
</script> 
@endpush
</x-admin1-layout>