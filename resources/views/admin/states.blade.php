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
                      <table id="state-datatable" class="table table-striped table-bordered">
                        <thead>
                          <tr>
                            <th>Sl No</th>
                            <th>Country</th>
                            <th>State</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          @php
                              $i=1;
                          @endphp
                          @foreach($states as $state)
                          <tr id="row{{$state->id}}">
                              <td>{{$i}}</td>
                              <td>{{$state->getcountry->country}}</td>
                              <td>{{$state->state}}</td>
                              <td>
                                  <i class="fa fa-edit edit_state" data-id="{{$state->id}}" data-bs-toggle="modal" data-bs-target="#EditModal"></i>
                              </td>
                          </tr>
                          @php
                              $i++;
                          @endphp
                          @endforeach
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
              <form id="create_state_form" class="form" enctype="multipart/form-data">
              @csrf
                <div class="form-group">
                    <label>Country</label>
                    <select  name="country_id" id="addcountry_id" class="form-control">
                        <option value="">Select One</option>
                        @foreach($countries as $countr)
                        <option value="{{$countr->id}}">{{$countr->country}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label>State</label>
                    <input type="text"  name="state" class="form-control">
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
            <form id="update_state_form" class="form" enctype="multipart/form-data">
              @csrf
               <input type="hidden" name="state_id" id="state_id" value="">
               <div class="form-group">
                    <label>Country</label>
                    <select  name="country_id" id="editcountry_id" class="form-control">
                        <option value="">Select One</option>
                        @foreach($countries as $countr)
                        <option value="{{$countr->id}}">{{$countr->country}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label>State</label>
                    <input type="text"  name="state" id="state" class="form-control">
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
        $('#state-datatable').DataTable();
    } );
</script>
<script>
$(document).ready(function() {
    $('#create_state_form').submit(function(event) {
        event.preventDefault();
        var formData = new FormData($(this)[0]); 
        var country=$('#addcountry_id option:selected').text();
        $.ajax({
            url: "{{route('state.store')}}",
            method: "POST",
            data: formData,
            contentType: false, 
            processData: false,
            success: function(response) {
                if (response.success) 
                {
                    $('#CreateModal').modal('hide');
                    $('#create_state_form')[0].reset();
                    swal("Good job!", "State Added successfully", {
                            icon: "success",
                            buttons: {
                                confirm: {
                                className: "btn btn-success",
                                },
                            },
                        });
                    var text = $('#state-datatable tbody tr:last td:first').text();
                    var row = '<tr id="row"'+ response.data['id'] +'><td>' + response.data['id'] + '</td><td>' + country+ '</td><td>' + response.data['state'] + '</td><td><i class="fa fa-edit edit_state" data-id="'+response.data['id']+'" data-bs-toggle="modal" data-bs-target="#EditModal"></i></td></tr>';
                    $('#state-datatable tbody').prepend(row);
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
  });
</script>
<script>
$(document).on("click", ".edit_state", function() {
   var state_id = $(this).data('id');
   $('#state_id').val(state_id);
   $.ajax({ type: "POST",
        url: "{{route('state.show')}}",
        data: { "_token": "{{ csrf_token() }}",
                state_id: state_id
              },
        success: function(res) 
        {
          $('#editcountry_id').val(res.country_id);
          $('#state').val(res.state);
        },
    });
});
</script> 
<script>
  $(document).ready(function() {
    $('#update_state_form').submit(function(event) {
        event.preventDefault();
        var country=$('#editcountry_id option:selected').text();
        var country_id=$('#editcountry_id option:selected').val();
        var state_id = $('#state_id').val();
        var state=$('#state').val();
        $.ajax({
            url: "{{route('state.update')}}",
            method: "PATCH", 
            data: {
              "_token": "{{ csrf_token() }}",
              country_id:country_id,
              state_id: state_id,
              state:state
            },
            success: function(response) {
                if (response.success) 
                {
                    $('#EditModal').modal('hide');
                    $('#update_state_form')[0].reset();
                    swal("Good job!", "State Updated successfully", {
                            icon: "success",
                            buttons: {
                                confirm: {
                                className: "btn btn-success",
                                },
                            },
                        });
                    $('#row'+response.data['id']).html('');
                    var row = '<td>' + response.data['id'] + '</td><td>' + country + '</td><td>' + response.data['state'] + '</td><td><i class="fa fa-edit edit_state" data-id="'+response.data['id']+'" data-bs-toggle="modal" data-bs-target="#EditModal"></i></td>';
                    $('#row'+response.data['id']).html(row );
                    
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
@endpush
</x-admin1-layout>
