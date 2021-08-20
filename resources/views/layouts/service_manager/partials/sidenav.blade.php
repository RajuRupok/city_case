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
            <li class="{{ Request::is('service_manager') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('service_manager.dashboard.index') }}">
                    <i data-feather="airplay"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            {{-- Dashboard Ends --}}

            {{-- <li class="menu-header">Case</li> --}}

            {{-- Cases Starts --}}
            <li class="dropdown {{ Request::is('service_manager/case*') ? 'active' : '' }}">
                <a href="javascript:void(0);" class="menu-toggle nav-link has-dropdown {{ Request::is('service_manager/case*') ? 'toggled' : '' }}">
                    <i data-feather="hash"></i>
                    <span>Cases</span>
                </a>
                <ul class="dropdown-menu {{ Request::is('service_manager/case/all*') ? 'd-block' : '' }}">
                    <li class="{{ Request::is('service_manager/case/all*') ? 'active' : '' }}">
                        <a class="nav-link" href="#">My Cases</a>
                    </li>

                    <li class="{{ Request::is('service_manager/case/pending*') ? 'active' : '' }}">
                        <a class="nav-link" href="#">Pending</a>
                    </li>

                    <li class="{{ Request::is('service_manager/case/running*') ? 'active' : '' }}">
                        <a class="nav-link" href="#">Running</a>
                    </li>

                    <li class="{{ Request::is('service_manager/case/completed*') ? 'active' : '' }}">
                        <a class="nav-link" href="#">Completed</a>
                    </li>

                    <li class="{{ Request::is('service_manager/case/canceled*') ? 'active' : '' }}">
                        <a class="nav-link" href="#">Canceled</a>
                    </li>
                </ul>
            </li>
            {{-- Cases Ends --}}

            {{-- <li class="menu-header">Support Staff</li> --}}

            {{-- Support Staffs Starts --}}
            <li class="dropdown {{ Request::is('service_manager/support_staff*') ? 'active' : '' }}">
                <a href="javascript:void(0);" class="menu-toggle nav-link has-dropdown {{ Request::is('service_manager/support_staff*') ? 'toggled' : '' }}">
                    <i data-feather="hash"></i>
                    <span>Support Staffs</span>
                </a>
                <ul class="dropdown-menu {{ Request::is('service_manager/support_staff/all*') ? 'd-block' : '' }}">
                    <li class="{{ Request::is('service_manager/support_staff/all*') ? 'active' : '' }}">
                        <a class="nav-link" href="#">My Support Staffs</a>
                    </li>

                    <li class="{{ Request::is('service_manager/support_staff/active*') ? 'active' : '' }}">
                        <a class="nav-link" href="#">Active</a>
                    </li>

                    <li class="{{ Request::is('service_manager/support_staff/inactive*') ? 'active' : '' }}">
                        <a class="nav-link" href="#">Inactive</a>
                    </li>

                    <li class="{{ Request::is('service_manager/support_staff/create*') ? 'active' : '' }}">
                        <a class="nav-link" href="#">Assign New</a>
                    </li>
                </ul>
            </li>
            {{-- Support Staffs Ends --}}
        </ul>
    </aside>
</div>
<!-- Side Nav END -->
