<nav class="navbar navbar-expand-sm navbar-default">
    <div id="main-menu" class="main-menu collapse navbar-collapse">
        <ul class="nav navbar-nav">
            <li class="active">
                <a href="{{route('dashboard')}}">
                    <i class="menu-icon fa fa-laptop"></i>Dashboard </a>
                </li>
            <li class="menu-title">APPLICATION</li>
            <li>
                <a href="{{route('staffs')}}" class="{{request()->is('staffs')? 'activesubmenu':''}}">
                    <i class="menu-icon fa  fa-users"></i>Staffs
                </a>
            </li>
            <li>
                <a href="{{route('employers')}}" class="{{request()->is('employers')? 'activesubmenu':''}}">
                    <i class="menu-icon fa fa-address-book"></i>Employers
                </a>
            </li>
            <li>
                <a href="{{route('jobvacancies')}}" class="{{request()->is('jobvacancies')? 'activesubmenu':''}}">
                    <i class="menu-icon fa fa-briefcase"></i>Categories
                </a>
            </li>
            <li>
                <a href="{{route('candidates')}}" class="{{request()->is('candidates')? 'activesubmenu':''}}">
                    <i class="menu-icon fa fa-user"></i>Recruitement
                </a>
            </li>
            <li>
                <a href="{{route('processing.employers')}}" class="{{request()->is('processing/employers')? 'activesubmenu':''}}">
                    <i class="menu-icon fa fa-spinner"></i>Processing
                </a>
            </li>
            <li>
                <a href="{{route('passports')}}" class="{{request()->is('passports')? 'activesubmenu':''}}">
                    <i class="menu-icon fa fa-book"></i>Passport Status
                </a>
            </li>
            <li>
                <a href="{{route('leads')}}" class="{{request()->is('leads')? 'activesubmenu':''}}">
                    <i class="menu-icon fa fa-bullhorn"></i>Leads
                </a>
            </li>
            <li class="menu-item-has-children dropdown {{ request()->is('branches')||request()->is('departments')
            ||request()->is('designations')||request()->is('roles')
            ||request()->is('countries')||request()->is('states')
            ||request()->is('districts')||request()->is('jobtypes') 
            ||request()->is('leadsources')||request()->is('prooftypes')? 'show' : '' }}">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="menu-icon fa fa-cogs"></i>Settings
                </a>
                <ul class="sub-menu children dropdown-menu {{ request()->is('branches')||request()->is('departments')
                ||request()->is('designations')||request()->is('roles')
                ||request()->is('countries')||request()->is('states')||request()->is('districts')
                ||request()->is('jobtypes') ||request()->is('leadsources')||request()->is('prooftypes') ? 'show' : '' }}">
                    <li>
                        <i class="fa fa-puzzle-piece"></i>
                        <a href="{{route('branches')}}" class="{{request()->is('branches')? 'activesubmenu':''}}">Branches</a>
                    </li>
                    <li>
                        <i class="fa fa-id-badge"></i>
                        <a href="{{route('departments')}}" class="{{request()->is('departments')? 'activesubmenu':''}}">Departments</a>
                    </li>
                    <li>
                        <i class="fa fa-id-card-o"></i>
                        <a href="{{route('designations')}}" class="{{request()->is('designations')? 'activesubmenu':''}}">Designations</a>
                    </li>
                    <li>
                        <i class="fa fa-spinner"></i>
                        <a href="{{route('roles')}}" class="{{request()->is('roles')? 'activesubmenu':''}}">Roles</a>
                    </li>
                    <li>
                        <i class="fa fa-globe"></i>
                        <a href="{{route('countries')}}" class="{{request()->is('countries')? 'activesubmenu':''}}">Countries</a>
                    </li>
                    <li>
                        <i class="fa fa-th"></i>
                        <a href="{{route('states')}}" class="{{request()->is('states')? 'activesubmenu':''}}">States</a>
                    </li>
                    <li>
                        <i class="fa fa-file-word-o"></i>
                        <a href="{{route('districts')}}" class="{{request()->is('districts')? 'activesubmenu':''}}">Districts</a>
                    </li>
                    <li>
                        <i class="fa fa-file-word-o"></i>
                        <a href="{{route('jobtypes')}}" class="{{request()->is('jobtypes')? 'activesubmenu':''}}">Jobtypes</a>
                    </li>
                    <li>
                        <i class="fa fa-file-word-o"></i>
                        <a href="{{route('leadsources')}}" class="{{request()->is('leadsources')? 'activesubmenu':''}}">Lead Sources</a>
                    </li>
                    <li>
                        <i class="fa fa-id-card"></i>
                        <a href="{{route('prooftypes')}}" class="{{request()->is('prooftypes')? 'activesubmenu':''}}">Proof Types</a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</nav>