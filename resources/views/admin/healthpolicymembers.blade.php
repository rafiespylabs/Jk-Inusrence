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
                                <i class="fa fa-plus"></i> Add Member
                            </button>
                            <a href="{{ url()->previous() }}" class="ml-2"><button class="btn btn-info btn-round ms-auto">
                            <i class="fa fa-arrow-left"></i> Back</button></a>
                        </div>
                        <h2>Policy : {{$healthpolicy->name}}</h2>
                    </div>
                    <div class="card-body">
                        <div id="preloader" style="display:none;">
                            <img src="{{ asset('web/preloader.gif') }}">
                        </div>
                        <div class="table-responsive">
                            <table id="healthpolimember-datatable" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>Sl No</th>
                                        <th>Age Group</th>  
                                        <th>Member Name</th>
                                        <th>Age</th>
                                        <th>Birth Date</th>
                                        <th>Height</th>
                                        <th>Wieght</th>
                                        <th>Note</th>
                                        <th>Added By</th>
                                        <th>Added Date</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $i = 1; @endphp
                                    @foreach ($healthpolicymembers as $member)
                                        <tr id="row{{ $member->id }}">
                                            <td>{{ $i }}</td>
                                            <td>                                                
                                                @switch($member->age_group)
                                                    @case(1) Adult @break
                                                    @case(2) Child @break
                                                @endswitch
                                            </td>
                                            <td>{{ $member->member_name }}</td>
                                            <td>{{ $member->member_age }}</td>
                                            <td>{{ $member->member_birthdate}}</td>
                                            <td>{{ $member->member_height}}</td>
                                            <td>{{ $member->member_weight}}</td>
                                            <td>{{ $member->member_note}}</td>
                                            <td>{{ $member->added_user->name ?? "N/A"}}</td>
                                            <td>{{ $member->added_date}}</td>
                                            <td>
                                                <i class="fa fa-edit edit_health_member"
                                                    data-id="{{$member->id }}" data-rowid="{{ $i }}" data-bs-toggle="modal"
                                                    data-bs-target="#EditModal"></i>
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
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add Member</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="create_healthpolimemebr_form" class="form">
                        @csrf
                        <input type="hidden" name="health_id" value="{{$health_id}}">
                        <div class="row form-group">
                            <div class="col-md-6">
                                <label for="age_group">Age Group <span>*</span></label>
                                <select name="age_group"  class="form-control" required>
                                    <option value="">Select One </option>
                                    <option value="1">Adult </option>
                                    <option value="2">Child </option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="member_name">Name <span>*</span></label>
                                <input type="text" name="member_name"  class="form-control" required>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-md-3">
                                <label for="member_birthdate">Birth Date <span>*</span></label>
                                <input type="date" name="member_birthdate" id="addmember_birthdate" class="form-control" required>
                            </div>
                            <div class="col-md-3">
                                <label for="member_age">Age</label>
                                <input type="number" step="any" name="member_age" id="addmember_age" class="form-control" readonly>
                            </div>
                            <div class="col-md-3">
                                <label for="height">Height <span>*</span></label>
                                <input type="number" name="member_height"  class="form-control" required>
                            </div>
                            <div class="col-md-3">
                                <label for="weight">Weight <span>*</span></label>
                                <input type="number" name="member_weight"  class="form-control" required>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-md-4">
                                <label for="member_note">Note</label>
                                <textarea name="member_note"  class="form-control"></textarea>
                            </div>
                        </div>
                        <div class="form-actions form-group">
                            <button type="submit" class="btn btn-primary btn-sm">Submit</button>
                            <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Cancel</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="EditModal" tabindex="-1" role="dialog" aria-labelledby="EditModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Health Policy</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="update_healthpolimemebr_form" class="form">
                        @csrf
                        <input type="hidden" name="rowid" id="row_id">
                        <input type="hidden" name="id" id="healthpolicy_member_id">  
                        <div class="row form-group">
                            <div class="col-md-6">
                                <label for="name">Age Group <span>*</span></label>
                                <select name="age_group" id="age_group"  class="form-control" required>
                                    <option value="">Select One </option>
                                    <option value="1">Adult </option>
                                    <option value="2">Child </option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="member_name">Name <span>*</span></label>
                                <input type="text" name="member_name"  id="member_name" class="form-control" required>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-md-3">
                                <label for="member_birthdate">Birth Date <span>*</span></label>
                                <input type="date" name="member_birthdate" id="edit_member_birthdate"  class="form-control" required>
                            </div>
                            <div class="col-md-3">
                                <label for="member_age">Age</label>
                                <input type="number" step="any" name="member_age" id="edit_member_age"  class="form-control" readonly>
                            </div>
                            <div class="col-md-3">
                                <label for="height">Height <span>*</span></label>
                                <input type="number" name="member_height"  id="member_height" class="form-control" required>
                            </div>
                            <div class="col-md-3">
                                <label for="weight">Weight <span>*</span></label>
                                <input type="number" name="member_weight"  id="member_weight" class="form-control" required>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-md-4">
                                <label for="member_note">Note</label>
                                <textarea name="member_note"  id="member_note" class="form-control"></textarea>
                            </div>
                        </div>
                        <div class="form-actions form-group">
                            <button type="submit" class="btn btn-primary btn-sm">Submit</button>
                            <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Cancel</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>    
    @push('scripts')
        <script>
            $(document).ready(function() {
                $('#healthpolimember-datatable').DataTable();
                $('#create_healthpolimemebr_form').submit(function(event) {
                    event.preventDefault(); 
                    var formData = new FormData($(this)[0]);  
                    $.ajax({
                        url: "{{ route('healthPolicyMember.store') }}",  
                        method: "POST",
                        data: formData,
                        contentType: false,  
                        processData: false,  
                        success: function(response) {
                            if (response.success) {
                                $('#CreateModal').modal('hide');  
                                $('#create_healthpolimemebr_form')[0].reset(); 
                                swal("Success!", response.message, {
                                    icon: "success",
                                    buttons: {
                                        confirm: {
                                            className: "btn btn-success",
                                        },
                                    },
                                });
                                var table = $('#healthpolimember-datatable').DataTable();
                                var agegroup='';
                                if(response.data.age_group==1)
                                {
                                    age_group='Adult';
                                }   
                                else if(response.data.age_group==2)
                                {
                                    age_group='Child';
                                }
                                var lastRowNumber = table.data().count() > 0 ? parseInt(table.row(':last').data()[0]) + 1 : 0;
                                var newRow = table.row.add([
                                    lastRowNumber,  
                                    age_group,                        
                                    response.data.member_name, 
                                    response.data.member_age, 
                                    response.data.member_birthdate, 
                                    response.data.member_height, 
                                    response.data.member_weight, 
                                    response.data.member_note, 
                                    response.data.added_by,                                                                     
                                    response.data.added_date,
                                    '<i class="fa fa-edit edit_health_member" data-rowid="'+ lastRowNumber +'" data-id="' + response.data.id + '" data-bs-toggle="modal" data-bs-target="#EditModal"></i>'
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
                $(document).on("click", ".edit_health_member", function() {
                    var healthpolicy_member_id = $(this).data('id');
                    var row_id = $(this).data('rowid');                     
                    $('#healthpolicy_member_id').val(healthpolicy_member_id);
                    $('#row_id').val(row_id); 
                    $.ajax({
                        type: "POST",
                        url: "{{ route('healthPolicyMember.show') }}",
                        data: {
                            "_token": "{{ csrf_token() }}",
                            "id": healthpolicy_member_id
                        },
                        success: function(response) 
                        {
                            if (response.success) 
                            {
                                $('#age_group').val(response.data.age_group);
                                $('#member_name').val(response.data.member_name);
                                $('#edit_member_age').val(response.data.member_age);
                                $('#edit_member_birthdate').val(response.data.member_birthdate);
                                $('#member_height').val(response.data.member_height);
                                $('#member_weight').val(response.data.member_weight);
                                $('#member_note').val(response.data.member_note);             
                            } 
                            else 
                            {
                                alert('Error: ' + response.message);
                            }
                        },
                        error: function(xhr, status, error) {
                            console.error('AJAX Error:', error);
                            alert('Failed to fetch data.');
                        }
                    });
                });
                $('#update_healthpolimemebr_form').submit(function(event) {
                    event.preventDefault(); 
                    var formData = new FormData($(this)[0]);
                    var rowId = $('#row_id').val();
                    $.ajax({
                        url: "{{ route('healthPolicyMember.update') }}", 
                        method: "POST", 
                        data: formData,
                        contentType: false, 
                        processData: false, 
                        success: function(response) 
                        {
                            if (response.success) {
                                $('#EditModal').modal('hide');
                                $('#update_healthpolimemebr_form')[0].reset();
                                swal("Success!", response.message, {
                                    icon: "success",
                                    buttons: {
                                        confirm: {
                                            className: "btn btn-success",
                                        },
                                    },
                                });
                                var table = $('#healthpolimember-datatable').DataTable();
                                var agegroup='';
                                if(response.data.age_group==1)
                                {
                                    age_group='Adult';
                                }   
                                else if(response.data.age_group==2)
                                {
                                    age_group='Child';
                                }
                                var row = table.row('#row' + response.data.id); 
                                row.data([
                                    rowId,   
                                    age_group,                        
                                    response.data.member_name, 
                                    response.data.member_age, 
                                    response.data.member_birthdate, 
                                    response.data.member_height, 
                                    response.data.member_weight, 
                                    response.data.member_note, 
                                    response.data.added_by,                                                                     
                                    response.data.added_date,                                 
                                    '<i class="fa fa-edit edit_health_member" data-rowid="'+ rowId +'" data-id="' + response.data.id + '" data-bs-toggle="modal" data-bs-target="#EditModal"></i>' 
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
            });
        </script>
        <script>
            function calculateAge(birthDate) 
            {
                var birthDateObj = new Date(birthDate);
                var today = new Date();
                var age = today.getFullYear() - birthDateObj.getFullYear();
                if (today.getMonth() < birthDateObj.getMonth() || 
                    (today.getMonth() == birthDateObj.getMonth() && 
                    today.getDate() < birthDateObj.getDate())) {
                    age--;
                }
                return age;
            }
            $(document).on("change", "#addmember_birthdate", function() 
            {
                var birthDate = $(this).val(); 
                var age = calculateAge(birthDate);
                $("#addmember_age").val(age); 
            });
            $(document).on("change", "#edit_member_birthdate", function() 
            {
                var birthDate = $(this).val(); 
                var age = calculateAge(birthDate);
                $("#edit_member_age").val(age); 
            });
        </script>
    @endpush
</x-admin1-layout>