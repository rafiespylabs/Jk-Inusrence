<x-admin1-layout>
@php
$role=auth()->user()->role_id;
@endphp
@if($role == 1)
<div class="page-inner">
    <div class="page-header">
    </div>
    <div class="row">
        <div class="col-sm-6 col-md-3">
            <div class="card card-stats card-round">
                <div class="card-body">
                    <a href="">
                        <div class="row align-items-center">
                            <div class="col-icon">
                            <div
                                class="icon-big text-center icon-primary bubble-shadow-small"
                            >
                                <i class="fas fa-users"></i>
                            </div>
                            </div>
                            <div class="col col-stats ms-3 ms-sm-0">
                            <div class="numbers">
                                <p class="card-category">Attendance</p>
                                <h4 class="card-title">{{$todayAttendanceCount}}</h4>
                            </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-md-3">
            <div class="card card-stats card-round">
                <div class="card-body">
                    <a href="{{route('motorVehicleReport')}}">
                        <div class="row align-items-center">
                            <div class="col-icon">
                            <div
                                class="icon-big text-center icon-info bubble-shadow-small"
                            >
                                <i class="fas fa-briefcase"></i>
                            </div>
                            </div>
                            <div class="col col-stats ms-3 ms-sm-0">
                            <div class="numbers">
                                <p class="card-category">Motor Policy</p>
                                <h4 class="card-title">{{$todayMotorpolicyCount}}</h4>
                            </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-md-3">
        <div class="card card-stats card-round">
            <div class="card-body">
                <a href="">
                    <div class="row align-items-center">
                        <div class="col-icon">
                        <div
                            class="icon-big text-center icon-success bubble-shadow-small"
                        >
                            <i class="fas fa-book"></i>
                        </div>
                        </div>
                        <div class="col col-stats ms-3 ms-sm-0">
                        <div class="numbers">
                            <p class="card-category">Health Policy</p>
                            <h4 class="card-title">{{$todayHealthpolicyCount}}</h4>
                        </div>
                        </div>
                    </div>
                </a>
            </div>
        </div>
        </div>
        <div class="col-sm-6 col-md-3">
            <div class="card card-stats card-round">
                <div class="card-body">
                    <a href="#">
                        <div class="row align-items-center">
                            <div class="col-icon">
                            <div class="icon-big text-center icon-secondary bubble-shadow-small">
                                <i class="fa fa-bullhorn"></i>
                            </div>
                            </div>
                            <div class="col col-stats ms-3 ms-sm-0">
                            <div class="numbers">
                                <p class="card-category">Other Policy</p>
                                <h4 class="card-title">{{$todayOtherpolicyCount}}</h4>
                            </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-6 col-md-3">
            <div class="card card-stats card-round">
                <div class="card-body">
                    <a href="">
                        <div class="row align-items-center">
                            <div class="col-icon">
                            <div
                                class="icon-big text-center icon-info bubble-shadow-small"
                            >
                                <i class="fas fa-briefcase"></i>
                            </div>
                            </div>
                            <div class="col col-stats ms-3 ms-sm-0">
                            <div class="numbers">
                                <p class="card-category">Motor Policy Paid</p>
                                <h4 class="card-title">{{$paidMotorpolicyCount}}</h4>
                            </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-md-3">
        <div class="card card-stats card-round">
            <div class="card-body">
                <a href="">
                    <div class="row align-items-center">
                        <div class="col-icon">
                        <div
                            class="icon-big text-center icon-success bubble-shadow-small"
                        >
                            <i class="fas fa-book"></i>
                        </div>
                        </div>
                        <div class="col col-stats ms-3 ms-sm-0">
                        <div class="numbers">
                            <p class="card-category">Health Policy Paid</p>
                            <h4 class="card-title">{{$paidHealthpolicyCount}}</h4>
                        </div>
                        </div>
                    </div>
                </a>
            </div>
        </div>
        </div>
        <div class="col-sm-6 col-md-3">
            <div class="card card-stats card-round">
                <div class="card-body">
                    <a href="#">
                        <div class="row align-items-center">
                            <div class="col-icon">
                            <div class="icon-big text-center icon-secondary bubble-shadow-small">
                                <i class="fa fa-bullhorn"></i>
                            </div>
                            </div>
                            <div class="col col-stats ms-3 ms-sm-0">
                            <div class="numbers">
                                <p class="card-category">Other Policy Paid</p>
                                <h4 class="card-title">{{$paidOtherpolicyCount}}</h4>
                            </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-6 col-md-3">
            <div class="card card-stats card-round">
                <div class="card-body">
                    <a href="">
                        <div class="row align-items-center">
                            <div class="col-icon">
                            <div
                                class="icon-big text-center icon-info bubble-shadow-small"
                            >
                                <i class="fas fa-briefcase"></i>
                            </div>
                            </div>
                            <div class="col col-stats ms-3 ms-sm-0">
                            <div class="numbers">
                                <p class="card-category">Motor Policy Due</p>
                                <h4 class="card-title">{{$dueMotorpolicyCount}}</h4>
                            </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-md-3">
        <div class="card card-stats card-round">
            <div class="card-body">
                <a href="#">
                    <div class="row align-items-center">
                        <div class="col-icon">
                        <div
                            class="icon-big text-center icon-success bubble-shadow-small"
                        >
                            <i class="fas fa-book"></i>
                        </div>
                        </div>
                        <div class="col col-stats ms-3 ms-sm-0">
                        <div class="numbers">
                            <p class="card-category">Health Policy Due</p>
                            <h4 class="card-title">{{$dueHealthpolicyCount}}</h4>
                        </div>
                        </div>
                    </div>
                </a>
            </div>
        </div>
        </div>
        <div class="col-sm-6 col-md-3">
            <div class="card card-stats card-round">
                <div class="card-body">
                    <a href="#">
                        <div class="row align-items-center">
                            <div class="col-icon">
                            <div class="icon-big text-center icon-secondary bubble-shadow-small">
                                <i class="fa fa-bullhorn"></i>
                            </div>
                            </div>
                            <div class="col col-stats ms-3 ms-sm-0">
                            <div class="numbers">
                                <p class="card-category">Other Policy Due</p>
                                <h4 class="card-title">{{$dueOtherpolicyCount}}</h4>
                            </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-6 col-md-3">
            <div class="card card-stats card-round">
                <div class="card-body">
                    <a href="">
                        <div class="row align-items-center">
                            <div class="col-icon">
                            <div
                                class="icon-big text-center icon-info bubble-shadow-small"
                            >
                                <i class="fas fa-briefcase"></i>
                            </div>
                            </div>
                            <div class="col col-stats ms-3 ms-sm-0">
                            <div class="numbers">
                                <p class="card-category">Repaid Cards</p>
                                <h4 class="card-title">{{$dueMotorpolicyCount}}</h4>
                            </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-md-3">
        <div class="card card-stats card-round">
            <div class="card-body">
                <a href="#">
                    <div class="row align-items-center">
                        <div class="col-icon">
                        <div
                            class="icon-big text-center icon-success bubble-shadow-small"
                        >
                            <i class="fas fa-book"></i>
                        </div>
                        </div>
                        <div class="col col-stats ms-3 ms-sm-0">
                        <div class="numbers">
                            <p class="card-category">Non Repaid Cards</p>
                            <h4 class="card-title">{{$dueHealthpolicyCount}}</h4>
                        </div>
                        </div>
                    </div>
                </a>
            </div>
        </div>
        </div>
        <div class="col-sm-6 col-md-3">
            <div class="card card-stats card-round">
                <div class="card-body">
                    <a href="#">
                        <div class="row align-items-center">
                            <div class="col-icon">
                            <div class="icon-big text-center icon-secondary bubble-shadow-small">
                                <i class="fa fa-bullhorn"></i>
                            </div>
                            </div>
                            <div class="col col-stats ms-3 ms-sm-0">
                            <div class="numbers">
                                <p class="card-category">Purchase Cards</p>
                                <h4 class="card-title">{{$dueOtherpolicyCount}}</h4>
                            </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!-- <div class="row">
        <div class="col-md-8">
            <div class="card card-round">
                <div class="card-header">
                    <div class="card-head-row card-tools-still-right">
                        <div class="card-title">Due Payments</div>
                    </div>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table align-items-center mb-0">
                            <thead class="thead-light">
                                <tr>
                                <th scope="col">Name</th>
                                <th scope="col" class="text-end">Due Date</th>
                                <th scope="col" class="text-end">Card</th>
                                <th scope="col" class="text-end">Amount</th>
                                <th scope="col" class="text-end">Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($due_payments as $due)
                                <tr>
                                    <th scope="row">
                                        <button
                                        class="btn btn-icon btn-round btn-success btn-sm me-2"
                                        >
                                        <i class="fa fa-check"></i>
                                        </button>
                                        {{$due->name}}
                                    </th>
                                    <td class="text-end"> {{$due->due_date}}</td>
                                    <td class="text-end">{{$due->card->holder_name}}</td>
                                    <td class="text-end">{{$due->credit}}</td>
                                    <td class="text-end">
                                        @if($due->status==0||$due->status==NULL)
                                            <span class="badge badge-warning">Pending</span>
                                        @elseif($due->status==1)
                                            <span class="badge badge-success">Paid</span>
                                        @endif
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div> -->
</div>
@else
    <div class="page-inner">
        <div class="page-header">
           
        </div>
    </div>
@endif
</x-admin1-layout>