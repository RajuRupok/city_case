<!-- Side Nav START -->
<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="{{ route('support_staff.dashboard.index') }}">
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
            <li class="{{ Request::is('support_staff') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('support_staff.dashboard.index') }}">
                    <i data-feather="airplay"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            {{-- Dashboard Ends --}}

            {{-- <li class="menu-header">Case</li> --}}

            {{-- Cases Starts --}}
            <li class="dropdown {{ Request::is('support_staff/case*') ? 'active' : '' }}">
                <a href="javascript:void(0);" class="menu-toggle nav-link has-dropdown {{ Request::is('support_staff/case*') ? 'toggled' : '' }}">
                    <i data-feather="hash"></i>
                    <span>Cases</span>
                </a>
                <ul class="dropdown-menu {{ Request::is('support_staff/case/all*') ? 'd-block' : '' }}">
                    <li class="{{ Request::is('support_staff/case/all*') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('support_staff.case.index') }}">All Cases</a>
                    </li>
                    
                    <li class="{{ Request::is('support_staff/case/new_assigned*') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('support_staff.case.new_assigned') }}">New Assigned Cases</a>
                    </li>

                    <li class="{{ Request::is('support_staff/case/completed*') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('support_staff.case.completed') }}">Completed</a>
                    </li>

                    <li class="{{ Request::is('support_staff/case/canceled*') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('support_staff.case.canceled') }}">Canceled</a>
                    </li>
                </ul>
            </li>
            {{-- Cases Ends --}}
        </ul>
    </aside>
</div>
<!-- Side Nav END -->
