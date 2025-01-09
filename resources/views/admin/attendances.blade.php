<x-admin1-layout>
<div class="page-inner">
    <div class="page-header">
    </div>
    <div class="row">
        <div class="col-md-12">
        <div class="card">
            <div class="card-header">
            <div class="d-flex align-items-center">
                <h4 class="card-title">Attendances</h4>
            </div>
            </div>
            <div class="card-body">
                <div id="preloader" style="display:none;">
                    <img src="{{asset('web/preloader.gif')}}">
                </div>
                <div class="table-responsive">
                    <table id="attendance-datatable" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                            <th>Sl No</th>
                            <th>Staff</th>
                            <th>Punchin Time</th>
                            <th>Punchin Location</th>
                            <th>Punchin Image</th>
                            <th>Punchout Time</th>
                            <th>Punchout Location</th>
                            <th>Punchout Image</th>
                            <th>Date</th>
                            <th>Action</th>
                            </tr>
                        </thead>
                        <tbody id="attendance_tbody">
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        </div>
    </div>
</div>
 @push('scripts')
<script type="text/javascript">
    $(document).ready(function() {
        function fetch_attendanceData()
        {
            $('#attendance_tbody').html('');
            $.ajax({ type: "GET",
                    url: "{{route('attendance.list')}}",
                    beforeSend: function() 
                    {
                        $('#preloader').show();
                    },
                    success: function(res) 
                    {
                        $('#preloader').hide();
                        $('#attendance-datatable').DataTable().destroy();
                        $('#attendance_tbody').html(res);
                        $('#attendance-datatable').DataTable();
                    },
                });
        }   
        fetch_attendanceData();
    });
</script>
@endpush
</x-admin1-layout>