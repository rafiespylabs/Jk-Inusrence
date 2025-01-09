<x-admin1-layout>
@php
$role=auth()->user()->role_id;
@endphp
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
                                <p class="card-category">Recruitements</p>
                                <h4 class="card-title">0</h4>
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
                                class="icon-big text-center icon-info bubble-shadow-small"
                            >
                                <i class="fas fa-briefcase"></i>
                            </div>
                            </div>
                            <div class="col col-stats ms-3 ms-sm-0">
                            <div class="numbers">
                                <p class="card-category">Categories</p>
                                <h4 class="card-title">0</h4>
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
                            <p class="card-category">Passports</p>
                            <h4 class="card-title">0</h4>
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
                    <a href="{{route('leads')}}">
                        <div class="row align-items-center">
                            <div class="col-icon">
                            <div class="icon-big text-center icon-secondary bubble-shadow-small">
                                <i class="fa fa-bullhorn"></i>
                            </div>
                            </div>
                            <div class="col col-stats ms-3 ms-sm-0">
                            <div class="numbers">
                                <p class="card-category">Leads</p>
                                <h4 class="card-title">0</h4>
                            </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-8">
            <div class="card card-round">
                <div class="card-header">
                    <div class="card-head-row card-tools-still-right">
                        <div class="card-title">Due Payments</div>
                        <!-- <div class="card-tools">
                            <div class="dropdown">
                                <button
                                class="btn btn-icon btn-clean me-0"
                                type="button"
                                id="dropdownMenuButton"
                                data-bs-toggle="dropdown"
                                aria-haspopup="true"
                                aria-expanded="false"
                                >
                                <i class="fas fa-ellipsis-h"></i>
                                </button>
                                <div
                                class="dropdown-menu"
                                aria-labelledby="dropdownMenuButton"
                                >
                                <a class="dropdown-item" href="#">Action</a>
                                <a class="dropdown-item" href="#">Another action</a>
                                <a class="dropdown-item" href="#"
                                    >Something else here</a
                                >
                                </div>
                            </div>
                        </div> -->
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
    </div>
</div>
</x-admin1-layout>