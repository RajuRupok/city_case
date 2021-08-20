<!-- Side Nav START -->
<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="#">
              <img alt="image" src="{{ asset('frontend/assets/img/CCM_Logo.svg') }}" class="header-logo" />
            </a>
        </div>
        <div class="sidebar-user">
            <div class="sidebar-user-details">
                <div class="user-name">{{ auth()->user()->name }}</div>
                <div class="user-role">{{ auth()->user()->role }}</div>
            </div>
        </div>
        <ul class="sidebar-menu">
            {{-- <li class="menu-header">Main</li> --}}

            {{-- Dashboard Start --}}
            <li class="{{ Request::is('city_corporation') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('city_corporation.dashboard.index') }}">
                    <i data-feather="airplay"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            {{-- Dashboard Ends --}}

            {{-- <li class="menu-header">Case</li> --}}

            {{-- Cases Starts --}}
            <li class="dropdown {{ Request::is('city_corporation/case*') ? 'active' : '' }}">
                <a href="javascript:void(0);" class="menu-toggle nav-link has-dropdown {{ Request::is('city_corporation/case*') ? 'toggled' : '' }}">
                    <i data-feather="hash"></i>
                    <span>Cases</span>
                </a>
                <ul class="dropdown-menu {{ Request::is('city_corporation/case/all*') ? 'd-block' : '' }}">
                    <li class="{{ Request::is('city_corporation/case/all*') ? 'active' : '' }}">
                        <a class="nav-link" href="#">All Cases</a>
                    </li>

                    <li class="{{ Request::is('city_corporation/case/pending*') ? 'active' : '' }}">
                        <a class="nav-link" href="#">Pending</a>
                    </li>

                    <li class="{{ Request::is('city_corporation/case/running*') ? 'active' : '' }}">
                        <a class="nav-link" href="#">Running</a>
                    </li>

                    <li class="{{ Request::is('city_corporation/case/completed*') ? 'active' : '' }}">
                        <a class="nav-link" href="#">Completed</a>
                    </li>

                    <li class="{{ Request::is('city_corporation/case/canceled*') ? 'active' : '' }}">
                        <a class="nav-link" href="#">Canceled</a>
                    </li>
                </ul>
            </li>
            {{-- Cases Ends --}}

            {{-- <li class="menu-header">Service Manager</li> --}}

            {{-- Service Managers Starts --}}
            <li class="dropdown {{ Request::is('city_corporation/service_manager*') ? 'active' : '' }}">
                <a href="javascript:void(0);" class="menu-toggle nav-link has-dropdown {{ Request::is('city_corporation/service_manager*') ? 'toggled' : '' }}">
                    <i data-feather="hash"></i>
                    <span>Service Managers</span>
                </a>
                <ul class="dropdown-menu {{ Request::is('city_corporation/service_manager/all*') ? 'd-block' : '' }}">
                    <li class="{{ Request::is('city_corporation/service_manager/all*') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('city_corporation.service_manager.index') }}">All Service Managers</a>
                    </li>

                    <li class="{{ Request::is('city_corporation/service_manager/active*') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('city_corporation.service_manager.active') }}">Active</a>
                    </li>

                    <li class="{{ Request::is('city_corporation/service_manager/inactive*') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('city_corporation.service_manager.inactive') }}">Inactive</a>
                    </li>

                    <li class="{{ Request::is('city_corporation/service_manager/create*') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('city_corporation.service_manager.create') }}">Assign New</a>
                    </li>
                </ul>
            </li>
            {{-- Service Managers Ends --}}

            {{-- <li class="menu-header">Support Staff</li> --}}

            {{-- Support Staffs Starts --}}
            <li class="dropdown {{ Request::is('city_corporation/support_staff*') ? 'active' : '' }}">
                <a href="javascript:void(0);" class="menu-toggle nav-link has-dropdown {{ Request::is('city_corporation/support_staff*') ? 'toggled' : '' }}">
                    <i data-feather="hash"></i>
                    <span>Support Staffs</span>
                </a>
                <ul class="dropdown-menu {{ Request::is('city_corporation/support_staff/all*') ? 'd-block' : '' }}">
                    <li class="{{ Request::is('city_corporation/support_staff/all*') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('city_corporation.support_staff.index') }}">All Support Staffs</a>
                    </li>

                    <li class="{{ Request::is('city_corporation/support_staff/active*') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('city_corporation.support_staff.active') }}">Active</a>
                    </li>

                    <li class="{{ Request::is('city_corporation/support_staff/inactive*') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('city_corporation.support_staff.inactive') }}">Inactive</a>
                    </li>

                    <li class="{{ Request::is('city_corporation/support_staff/create*') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('city_corporation.support_staff.create') }}">Assign New</a>
                    </li>
                </ul>
            </li>
            {{-- Support Staffs Ends --}}

            {{-- <li class="menu-header">Citizen</li> --}}

            {{-- Citizens Starts --}}
            <li class="dropdown {{ Request::is('city_corporation/citizen*') ? 'active' : '' }}">
                <a href="javascript:void(0);" class="menu-toggle nav-link has-dropdown {{ Request::is('city_corporation/citizen*') ? 'toggled' : '' }}">
                    <i data-feather="hash"></i>
                    <span>Citizens</span>
                </a>
                <ul class="dropdown-menu {{ Request::is('city_corporation/citizen/all*') ? 'd-block' : '' }}">
                    <li class="{{ Request::is('city_corporation/citizen/all*') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('city_corporation.citizen.index') }}">All Citizens</a>
                    </li>

                    <li class="{{ Request::is('city_corporation/citizen/approved*') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('city_corporation.citizen.approved') }}">Approved</a>
                    </li>

                    <li class="{{ Request::is('city_corporation/citizen/banned*') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('city_corporation.citizen.banned') }}">Banned</a>
                    </li>
                </ul>
            </li>
            {{-- Citizens Ends --}}

            <li class="menu-header">Settings</li>

            {{-- Categories Starts --}}
            <li class="dropdown {{ Request::is('city_corporation/category*') ? 'active' : '' }}">
                <a href="javascript:void(0);" class="menu-toggle nav-link has-dropdown {{ Request::is('city_corporation/category*') ? 'toggled' : '' }}">
                    <i data-feather="settings"></i>
                    <span>Categories</span>
                </a>
                <ul class="dropdown-menu {{ Request::is('city_corporation/category/all*') ? 'd-block' : '' }}">
                    <li class="{{ Request::is('city_corporation/category/all*') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('city_corporation.category.index') }}">All Categories</a>
                    </li>

                    <li class="{{ Request::is('city_corporation/category/active*') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('city_corporation.category.active') }}">Active</a>
                    </li>

                    <li class="{{ Request::is('city_corporation/category/inactive*') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('city_corporation.category.inactive') }}">Inactive</a>
                    </li>

                    <li class="{{ Request::is('city_corporation/category/create*') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('city_corporation.category.create') }}">Create New</a>
                    </li>
                </ul>
            </li>
            {{-- Categories Ends --}}
        </ul>
    </aside>
</div>
<!-- Side Nav END -->
