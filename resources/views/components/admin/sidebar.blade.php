<div class="app-menu navbar-menu">
    <!-- LOGO -->
    <div class="navbar-brand-box">
        <!-- Dark Logo-->
        <a href="{{ route('dashboard') }}" class="logo logo-dark">
            <span class="logo-sm">
                <img src="{{ asset('admin/images/logo.png') }}" alt="" height="22" />
            </span>
            <span class="logo-lg">
                <img src="{{ asset('admin/images/logo.png') }}" alt="" height="17" />
            </span>
        </a>
        <!-- Light Logo-->
        <a href="{{ route('dashboard') }}" class="logo logo-light">
            <span class="logo-sm">
                <img src="{{ asset('admin/images/login-logo.png') }}" alt="" height="35" />
            </span>
            <span class="logo-lg">
                <img src="{{ asset('admin/images/logo.png') }}" alt="" height="50" />
            </span>
        </a>
        <button type="button" class="btn btn-sm p-0 fs-20 header-item float-end btn-vertical-sm-hover" id="vertical-hover">
            <i class="ri-record-circle-line"></i>
        </button>
    </div>

    <div id="scrollbar">
        <div class="container-fluid">
            <div id="two-column-menu"></div>
            <ul class="navbar-nav" id="navbar-nav">
                <li class="menu-title">
                    <span data-key="t-menu">Menu</span>
                </li>

                <li class="nav-item">
                    <a class="nav-link menu-link {{ request()->routeIs('dashboard') ? 'active' : '' }}" href="{{ route('dashboard') }}" >
                        <i class="ri-dashboard-2-line"></i>
                        <span data-key="t-dashboards">Dashboard</span>
                    </a>
                </li>

                @can('masters.all')
                    <li class="nav-item">
                        <a class="nav-link menu-link {{ request()->routeIs('wards.index') || request()->routeIs('financial_year.index') || request()->routeIs('source_of_fund.index') || request()->routeIs('schemes.index') || request()->routeIs('locations.index') || request()->routeIs('departments.index') || request()->routeIs('designation.index') || request()->routeIs('contractor.index')  ? 'active' : 'collapsed' }}" href="#masters" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarLayouts">
                            <i class="ri-layout-3-line"></i>
                            <span data-key="t-layouts">Masters</span>
                        </a>
                        <div class="collapse menu-dropdown {{ request()->routeIs('wards.index') || request()->routeIs('financial_year.index') || request()->routeIs('source_of_fund.index') || request()->routeIs('schemes.index') || request()->routeIs('locations.index') || request()->routeIs('departments.index') || request()->routeIs('designation.index') || request()->routeIs('contractor.index')  ? 'show' : '' }}" id="masters">
                            <ul class="nav nav-sm flex-column">
                                <li class="nav-item">
                                    <a href="{{ route('wards.index') }}" class="nav-link {{ request()->routeIs('wards.index') ? 'active' : '' }}" data-key="t-horizontal">Wards</a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('financial_year.index') }}" class="nav-link {{ request()->routeIs('financial_year.index') ? 'active' : '' }}" data-key="t-horizontal">Financial Years</a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('source_of_fund.index') }}" class="nav-link {{ request()->routeIs('source_of_fund.index') ? 'active' : '' }}" data-key="t-horizontal">Source Of Fund</a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('schemes.index') }}" class="nav-link {{ request()->routeIs('schemes.index') ? 'active' : '' }}" data-key="t-horizontal">Schemes</a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('locations.index') }}" class="nav-link {{ request()->routeIs('locations.index') ? 'active' : '' }}" data-key="t-horizontal">Locations</a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('departments.index') }}" class="nav-link {{ request()->routeIs('departments.index') ? 'active' : '' }}" data-key="t-horizontal">Departments</a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('designation.index') }}" class="nav-link {{ request()->routeIs('designation.index') ? 'active' : '' }}" data-key="t-horizontal">Designations</a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('contractor.index') }}" class="nav-link {{ request()->routeIs('contractor.index') ? 'active' : '' }}" data-key="t-horizontal">Contractors</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                @endcan

                @canany(['users.view', 'roles.view'])
                    <li class="nav-item">
                        <a class="nav-link menu-link {{ request()->routeIs('users.index') || request()->routeIs('roles.index')  ? 'active' : 'collapsed' }}" href="#usermanagement" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarLayouts">
                            <i class="bx bx-user-circle"></i>
                            <span data-key="t-layouts">User Management</span>
                        </a>
                        <div class="collapse menu-dropdown {{ request()->routeIs('users.index') || request()->routeIs('roles.index')  ? 'show' : '' }}" id="usermanagement">
                            <ul class="nav nav-sm flex-column">
                                @can('users.view')
                                    <li class="nav-item">
                                        <a href="{{ route('users.index') }}" class="nav-link {{ request()->routeIs('users.index') ? 'active' : '' }}" data-key="t-horizontal">Users</a>
                                    </li>
                                @endcan
                                @can('roles.view')
                                    <li class="nav-item">
                                        <a href="{{ route('roles.index') }}" class="nav-link {{ request()->routeIs('roles.index') ? 'active' : '' }}" data-key="t-horizontal">Roles</a>
                                    </li>
                                @endcan
                            </ul>
                        </div>
                    </li>
                @endcan

                <li class="nav-item">
                    <a class="nav-link menu-link" href="#applications" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarLayouts">
                        <i class="bx bx-list-ul"></i>
                        <span data-key="t-layouts">Applications</span>
                    </a>
                    <div class="collapse menu-dropdown" id="applications">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="#" class="nav-link" data-key="t-horizontal">New Applications</a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link" data-key="t-horizontal">Pending Applications</a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link" data-key="t-horizontal">Approved Applications</a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link" data-key="t-horizontal">Rejected Applications</a>
                            </li>
                        </ul>
                    </div>
                </li>

            </ul>
        </div>
    </div>

    <div class="sidebar-background"></div>
</div>


<div class="vertical-overlay"></div>
