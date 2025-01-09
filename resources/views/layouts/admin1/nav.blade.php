@php 
$role_id=auth()->user()->role_id;
@endphp
<div class="sidebar" data-background-color="agean">
    <div class="sidebar-logo">
        <div class="logo-header" data-background-color="agean">
        <a href="{{route('dashboard')}}" class="logo">
            <img src="{{asset('admin1/assets/img/logo/jklogo.png')}}" alt="navbar brand" class="navbar-brand" height="40" />
        </a>
        <div class="nav-toggle">
            <button class="btn btn-toggle toggle-sidebar">
            <i class="gg-menu-right"></i>
            </button>
            <button class="btn btn-toggle sidenav-toggler">
            <i class="gg-menu-left"></i>
            </button>
        </div>
        <button class="topbar-toggler more">
            <i class="gg-more-vertical-alt"></i>
        </button>
        </div>
    </div>
    <div class="sidebar-wrapper scrollbar scrollbar-inner">
        <div class="sidebar-content">
            <ul class="nav nav-secondary">
                <li class="nav-item">
                    <a href="{{route('dashboard')}}">
                        <i class="fas fa-home"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li class="nav-section">
                    <span class="sidebar-mini-icon">
                        <i class="fa fa-ellipsis-h"></i>
                    </span>
                    <h4 class="text-section">APPLICATION</h4>
                </li>
                <li class="nav-item {{request()->is('staffs')? 'active':''}}">
                    <a href="{{route('staffs')}}">
                        <i class="menu-icon fa  fa-users"></i>
                        <p>Staffs</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a data-bs-toggle="collapse" href="#submenu" class="" aria-expanded="true">
                    <i class="fas fa-piggy-bank"></i>
                    <p>LOAN & <br>INUSRENCES</p>
                    <span class="caret"></span>
                    </a>
                    <div class="collapse {{ request()->is('dealers')
                                ||request()->is('insuranceproviders')
                                || request()->is('referredPersons')
                                ||request()->is('companies')
                                ||request()->is('agents')
                                ||request()->is('policycategories')
                                ||request()->is('policyholders')
                                || request()->is('creditcard_pay')
                                ||  request()->is('expensetypes') 
                                || request()->is('expenses')
                                ||  request()->is('leads') 
                                || request()->is('renews')
                                || request()->is('healthpolicies') 
                                || request()->is('otherpolicies') ? 'show' : '' }}" id="submenu" style="">
                        <ul class="nav nav-collapse">
                            <li class="{{request()->is('agents')? 'active':''}}">
                                <a href="{{route('agents')}}">
                                    <i class="menu-icon fas fa-user-secret"></i>
                                         Agents
                                </a>
                            </li>
                            <li class="submenu">
                                <a data-bs-toggle="collapse" href="#source" class="collapsed" aria-expanded="false">
                                    <i class="fas fa-coffee"></i> Source
                                    <span class="caret"></span>
                                </a>
                                <div class="collapse  {{ request()->is('dealers')
                                ||  request()->is('insuranceproviders')
                                || request()->is('referredPersons')
                                || request()->is('companies') ? 'show' : '' }}" id="source" style="">
                                    <ul class="nav nav-collapse subnav">
                                        <li class="{{request()->is('insuranceproviders')? 'active':''}}">
                                            <a href="{{route('insuranceproviders')}}">
                                                <span class="sub-item">Insurence Porviders</span>
                                            </a>
                                        </li>
                                        <li class="{{request()->is('dealers')? 'active':''}}">
                                            <a href="{{route('dealers')}}">
                                                <span class="sub-item">Dealers</span>
                                            </a>
                                        </li>
                                        <li class="{{request()->is('referredPersons')? 'active':''}}">
                                            <a href="{{route('referredPersons')}}">
                                                <span class="sub-item">Referred Persons</span>
                                            </a>
                                        </li>
                                        <li class="{{request()->is('companies')? 'active':''}}">
                                            <a href="{{route('companies')}}">
                                                <span class="sub-item">Companies</span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li class="submenu">
                                <a data-bs-toggle="collapse" href="#policy" class="collapsed" aria-expanded="false">
                                    <i class="fas fa-file-contract"></i> Policy
                                    <span class="caret"></span>
                                </a>
                                <div class="collapse  {{ request()->is('policycategories')
                                ||request()->is('policyholders')
                                || request()->is('healthpolicies') 
                                || request()->is('otherpolicies') ? 'show' : '' }}" id="policy" style="">
                                    <ul class="nav nav-collapse subnav">
                                        <li class="{{request()->is('policycategories')? 'active':''}}">
                                            <a href="{{route('policycategories')}}">
                                                <span class="sub-item">Policy Categories</span>
                                            </a>
                                        </li>
                                        <li class="{{request()->is('policyholders')? 'active':''}}">
                                            <a href="{{route('policyholders')}}">
                                                <span class="sub-item">Motor Vehicle Policies</span>
                                            </a>
                                        </li>
                                        <li class="{{request()->is('healthpolicies')? 'active':''}}">
                                            <a href="{{route('healthpolicies')}}">
                                                <span class="sub-item">Health Policies</span>
                                            </a>
                                        </li>
                                        <li class="{{request()->is('otherpolicies')? 'active':''}}">
                                            <a href="{{route('otherpolicies')}}">
                                                <span class="sub-item">Other Policies</span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li class="{{request()->is('renews')? 'active':''}}">
                                <a href="{{route('renews')}}">
                                    <i class="menu-icon fa fa-redo"></i> Renews
                                </a>
                            </li>
                            <li class="{{request()->is('creditcard_pay')? 'active':''}}">
                                <a href="{{route('creditcard_pay')}}">
                                    <i class="menu-icon fa fa-credit-card"></i>Credit Card Pay
                                </a>
                            </li>
                            <li class="submenu">
                                <a data-bs-toggle="collapse" href="#expense" class="collapsed" aria-expanded="false">
                                    <i class="fa fa-money-bill-wave"></i>Expense
                                    <span class="caret"></span>
                                </a>
                                <div class="collapse  {{ request()->is('expensetypes')
                                ||request()->is('expenses') ? 'show' : '' }}" id="expense" style="">
                                    <ul class="nav nav-collapse subnav">
                                        <li class="{{request()->is('expensetypes')? 'active':''}}">
                                            <a href="{{route('expensetypes')}}">
                                                <span class="sub-item">Expense Types</span>
                                            </a>
                                        </li>
                                        <li class="{{request()->is('expenses')? 'active':''}}">
                                            <a href="{{route('expenses')}}">
                                                <span class="sub-item">Expenses</span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li class="{{request()->is('leads')? 'active':''}}">
                                <a href="{{route('leads')}}">
                                <i class="menu-icon fa fa-bullhorn"></i>Leads
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <!-- <li class="nav-item">
                    <a data-bs-toggle="collapse" href="#source">
                        <i class="fas fa-coffee"></i>
                        <p>Source</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse {{ request()->is('dealers')
                    ||request()->is('insuranceproviders')
                    || request()->is('referredPersons')
                    || request()->is('companies') ? 'show' : '' }}" id="source">
                        <ul class="nav nav-collapse">
                            <li class="{{request()->is('insuranceproviders')? 'active':''}}">
                                <a href="{{route('insuranceproviders')}}">
                                <span class="sub-item">Insurence Porviders</span>
                                </a>
                            </li>
                            <li class="{{request()->is('dealers')? 'active':''}}">
                                <a href="{{route('dealers')}}">
                                <span class="sub-item">Dealers</span>
                                </a>
                            </li>
                            <li class="{{request()->is('referredPersons')? 'active':''}}">
                                <a href="{{route('referredPersons')}}">
                                <span class="sub-item">Referred Persons</span>
                                </a>
                            </li>
                            <li class="{{request()->is('companies')? 'active':''}}">
                                <a href="{{route('companies')}}">
                                <span class="sub-item">Companies</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li> -->
                <!-- <li class="nav-item {{request()->is('dealers')? 'active':''}}">
                    <a href="{{route('dealers')}}">
                        <i class="menu-icon fa fa-industry"></i>
                        <p>Dealers</p>
                    </a>
                </li>
                <li class="nav-item {{request()->is('insuranceproviders')? 'active':''}}">
                    <a href="{{route('insuranceproviders')}}">
                        <i class="menu-icon fa fa-industry"></i>
                        <p>Insurence Porviders</p>
                    </a>
                </li>
                <li class="nav-item {{request()->is('referredPersons')? 'active':''}}">
                    <a href="{{route('referredPersons')}}">
                        <i class="menu-icon fa fa-user-friends"></i>
                        <p>References</p>
                    </a>
                </li>
                <li class="nav-item  {{request()->is('companies')? 'active':''}}">
                    <a href="{{route('companies')}}">
                        <i class="menu-icon fa fa-building"></i>
                        <p>Companies</p>
                    </a>
                </li> -->
                @if($role_id==1)
                <!-- <li class="nav-item">
                    <a data-bs-toggle="collapse" href="#base">
                        <i class="fa fa-money-bill-wave"></i>
                        <p>Policy Holder</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse {{ request()->is('policyholders')||request()->is('policycategories') ? 'show' : '' }}" id="base">
                        <ul class="nav nav-collapse">
                            <li class="{{request()->is('policycategories')? 'active':''}}">
                                <a href="{{route('policycategories')}}">
                                    <span class="sub-item">Policy Categories</span>
                                </a>
                            </li>
                            <li class="{{request()->is('policyholders')? 'active':''}}">
                                <a href="{{route('policyholders')}}">
                                    <span class="sub-item">Policy Holders</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item  {{request()->is('renews')? 'active':''}}">
                    <a href="{{route('renews')}}">
                        <i class="menu-icon fa fa-redo"></i>
                        <p>Renews</p>
                    </a>
                </li> -->
                @else
                <li class="nav-item  {{request()->is('prepared_policies')? 'active':''}}">
                    <a href="{{route('prepared_policies')}}">
                        <i class="menu-icon fa fa-shield-alt"></i>
                        <p>Policy Preparation</p>
                    </a>
                </li>
                @endif
                <!-- <li class="nav-item  {{request()->is('creditcard_pay')? 'active':''}}">
                    <a href="{{route('creditcard_pay')}}">
                        <i class="menu-icon fa fa-credit-card"></i>
                        <p>Credit Card Pay</p>
                    </a>
                </li> -->
                <li class="nav-item {{request()->is('attendances')? 'active':''}}">
                    <a href="{{route('attendances')}}">
                        <i class="menu-icon fa fa-clock"></i>
                        <p>Attendances</p>
                    </a>
                </li>
                <!-- <li class="nav-item {{request()->is('leads')? 'active':''}}">
                    <a href="{{route('leads')}}">
                        <i class="menu-icon fa fa-bullhorn"></i>
                        <p>Leads</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a data-bs-toggle="collapse" href="#expense">
                        <i class="fa fa-money-bill-wave"></i>
                        <p>Expense</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse {{ request()->is('expensetypes')||request()->is('expenses') ? 'show' : '' }}" id="expense">
                        <ul class="nav nav-collapse">
                            <li class="{{request()->is('expensetypes')? 'active':''}}">
                                <a href="{{route('expensetypes')}}">
                                    <span class="sub-item">Expense Types</span>
                                </a>
                            </li>
                            <li class="{{request()->is('expenses')? 'active':''}}">
                                <a href="{{route('expenses')}}">
                                    <span class="sub-item">Expenses</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li> -->
                <li class="nav-item">
                    <a data-bs-toggle="collapse" href="#base">
                        <i class="fas fa fa-cogs"></i>
                        <p>Settings</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse {{ request()->is('branches')||request()->is('departments')
                    ||request()->is('designations')||request()->is('roles')
                    ||request()->is('countries')||request()->is('states')||request()->is('districts')
                    ||request()->is('jobtypes') ||request()->is('leadsources')
                    ||request()->is('prooftypes')
                    ||request()->is('vehiclemodels') ? 'show' : '' }}" id="base">
                        <ul class="nav nav-collapse">
                            <li class="{{request()->is('branches')? 'active':''}}">
                                <a href="{{route('branches')}}">
                                    <span class="sub-item">Branches</span>
                                </a>
                            </li>
                            <li class="{{request()->is('departments')? 'active':''}}">
                                <a href="{{route('departments')}}">
                                    <span class="sub-item">Departments</span>
                                </a>
                            </li>
                            <li class="{{request()->is('designations')? 'active':''}}">
                                <a href="{{route('designations')}}">
                                    <span class="sub-item">Designations</span>
                                </a>
                            </li>
                            <li class="{{request()->is('roles')? 'active':''}}">
                                <a href="{{route('roles')}}">
                                    <span class="sub-item">Roles</span>
                                </a>
                            </li>
                            <li class="{{request()->is('countries')? 'active':''}}">
                                <a href="{{route('countries')}}">
                                    <span class="sub-item">Countries</span>
                                </a>
                            </li>
                            <li class="{{request()->is('states')? 'active':''}}">
                                <a href="{{route('states')}}">
                                    <span class="sub-item">States</span>
                                </a>
                            </li>
                            <li class="{{request()->is('districts')? 'active':''}}">
                                <a href="{{route('districts')}}">
                                    <span class="sub-item">Districts</span>
                                </a>
                            </li>
                            <li class="{{request()->is('vehiclemodels')? 'active':''}}">
                                <a href="{{route('vehiclemodels')}}">
                                    <span class="sub-item">Vehicle Models</span>
                                </a>
                            </li>
                            <li class="{{request()->is('cards')? 'active':''}}">
                                <a href="{{route('cards')}}">
                                    <span class="sub-item">Credit Cards</span>
                                </a>
                            </li>
                            <li class="{{request()->is('leadsources')? 'active':''}}">
                                <a href="{{route('leadsources')}}">
                                <span class="sub-item">Lead Sources</span>
                                </a>
                            </li>
                            <li class="{{request()->is('prooftypes')? 'active':''}}">
                                <a href="{{route('prooftypes')}}">
                                <span class="sub-item">Proof Types</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</div>