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
                      <table id="district-datatable" class="table table-striped table-bordered">
                        <thead>
                          <tr>
                            <th>Sl No</th>
                            <th>Country</th>
                            <th>State</th>
                            <th>District</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          @php
                              $i=1;
                          @endphp
                          @foreach($districts as $distri)
                          <tr id="row{{$distri->id}}">
                              <td>{{$i}}</td>
                              <td>{{$distri->country->country}}</td>
                              <td>{{$distri->state->state}}</td>
                              <td>{{$distri->district}}</td>
                              <td>
                                  <i class="fa fa-edit edit_district" data-id="{{$distri->id}}" data-bs-toggle="modal" data-bs-target="#EditModal"></i>
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
              <form id="create_district_form" class="form" enctype="multipart/form-data">
              @csrf
                <div class="form-group">
                    <label>Country</label>
                    <select  name="country_id" id="addcountry_id" class="form-control">
                          <option value="">Select One</option>
                        @foreach($countries as $country)
                          <option value="{{$country->id}}">{{$country->country}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label>State</label>
                    <select  name="state_id" id="addstate_id" class="form-control">
                          <option value="">Select One</option>
                        @foreach($states as $state)
                          <option value="{{$state->id}}">{{$state->state}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label>District</label>
                    <input type="text"  name="district" class="form-control">
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
            <form id="update_district_form" class="form" enctype="multipart/form-data">
              @csrf
               <input type="hidden" name="district_id" id="district_id" value="">
               <div class="form-group">
                    <label>Country</label>
                    <select  name="country_id" id="editcountry_id" class="form-control">
                          <option value="">Select One</option>
                        @foreach($countries as $country)
                          <option value="{{$country->id}}">{{$country->country}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label>State</label>
                    <select  name="state_id" id="editstate_id" class="form-control">
                          <option value="">Select One</option>
                        @foreach($states as $state)
                          <option value="{{$state->id}}">{{$state->state}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label>District</label>
                    <input type="text"  name="district" id="district" class="form-control">
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
        $('#district-datatable').DataTable();
    } );
</script>
<script>
$(document).ready(function() {
    $('#create_district_form').submit(function(event) {
        event.preventDefault();
        var formData = new FormData($(this)[0]);
        var country=$('#addcountry_id option:selected').text(); 
        var state=$('#addstate_id option:selected').text(); 
        $.ajax({
            url: "{{route('district.store')}}",
            method: "POST",
            data: formData,
            contentType: false, 
            processData: false,
            success: function(response) {
                if (response.success) 
                {
                    $('#CreateModal').modal('hide');
                    $('#create_district_form')[0].reset();
                    swal("Good job!", "District Added successfully", {
                        icon: "success",
                        buttons: {
                            confirm: {
                            className: "btn btn-success",
                            },
                        },
                    });
                    var text = $('#district-datatable tbody tr:last td:first').text();
                    var row = '<tr id="row"'+ response.data['id'] +'><td>' + response.data['id'] + '</td>';
                    row +='<td>' + country + '</td>';
                    row +='<td>' + state + '</td>';
                    row +='<td>' + response.data['district'] + '</td>';
                    row +='<td><i class="fa fa-edit edit_district" data-id="'+response.data['id']+'" data-bs-toggle="modal" data-bs-target="#EditModal"></i></td>';
                    row +='</tr>';
                    $('#district-datatable tbody').prepend(row);
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
$(document).on("click", ".edit_district", function() {
   var district_id = $(this).data('id');
   $('#district_id').val(district_id);
   $.ajax({ type: "POST",
        url: "{{route('district.show')}}",
        data: { "_token": "{{ csrf_token() }}",
              district_id: district_id
              },
        success: function(res) 
        {
          $('#editcountry_id').val(res.country_id);
          $('#editstate_id').val(res.state_id);
          $('#district').val(res.district);
        },
    });
});
</script> 
<script>
  $(document).ready(function() {
    $('#update_district_form').submit(function(event) {
        event.preventDefault();
        var country=$('#editcountry_id option:selected').text(); 
        var state=$('#editstate_id option:selected').text();
        var formData = new FormData($(this)[0]);
        $.ajax({
            url: "{{route('district.update')}}",
            method: "POST", 
            data: formData,
            contentType: false, 
            processData: false,
            success: function(response) {
                if (response.success) 
                {
                    $('#EditModal').modal('hide');
                    $('#update_district_form')[0].reset();
                    swal("Good job!", "District Updated successfully", {
                        icon: "success",
                        buttons: {
                            confirm: {
                            className: "btn btn-success",
                            },
                        },
                    });
                    $('#row'+response.data['id']).html('');
                    var row ='<td>' + response.data['id'] + '</td>';
                    row+='<td>' + country + '</td>';
                    row +='<td>' + state + '</td>';
                    row +='<td>' + response.data['district'] + '</td>';
                    row +='<td><i class="fa fa-edit edit_district" data-id="'+response.data['id']+'" data-bs-toggle="modal" data-bs-target="#EditModal"></i></td>';
                    $('#row'+response.data['id']).html(row);                    
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
