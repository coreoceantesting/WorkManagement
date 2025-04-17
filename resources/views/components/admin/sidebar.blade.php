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

                @can('masters.all')
                @php
                    $mastersRoutes = [
                        'departments.index',
                        'work_types.index',
                        'project_phases.index',
                        'contractor_type.index',
                        'standard_schedule_rates.index',
                        'contractor_sub_types.index',
                        'units.index',
                        'item_categories.index',
                        'item_sub_categories.index',
                        'items.index',
                        'contractors.index'


                    ];

                    $isMasterActive = request()->routeIs(...$mastersRoutes);
                @endphp
                    <li class="nav-item">
                        <a class="nav-link menu-link
                      {{ $isMasterActive ? 'active' : 'collapsed' }}"
                       href="#masters"
                       data-bs-toggle="collapse"
                       role="button"
                       aria-expanded="false"
                       aria-controls="sidebarLayouts">
                             <i class="ri-layout-3-line"></i>
                                <span data-key="t-layouts">Masters</span>
                            </a>
                            <div class="collapse menu-dropdown {{ $isMasterActive ? 'show' : '' }}" id="masters">


                            <ul class="nav nav-sm flex-column">
                                <li class="nav-item">
                                    <a href="{{ route('departments.index') }}" class="nav-link {{ request()->routeIs('departments.index') ? 'active' : '' }}" data-key="t-horizontal">Departments</a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('units.index') }}" class="nav-link {{ request()->routeIs('units.index') ? 'active' : '' }}" data-key="t-horizontal">Units</a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('work_types.index') }}" class="nav-link {{ request()->routeIs('work_types.index') ? 'active' : '' }}" data-key="t-horizontal">Work Types</a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('project_phases.index') }}" class="nav-link {{ request()->routeIs('project_phases.index') ? 'active' : '' }}" data-key="t-horizontal">Project Phases</a>
                                </li>

                                <li class="nav-item">
                                    <a href="{{ route('contractor_type.index') }}" class="nav-link {{ request()->routeIs('contractor_type.index') ? 'active' : '' }}" data-key="t-horizontal">Contractor Types  </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('contractor_sub_types.index') }}" class="nav-link {{ request()->routeIs('contractor_sub_types.index') ? 'active' : '' }}" data-key="t-horizontal">Contractor Sub Types </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('standard_schedule_rates.index') }}" class="nav-link {{ request()->routeIs('standard_schedule_rates.index') ? 'active' : '' }}" data-key="t-horizontal">SSR  </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('item_categories.index') }}" class="nav-link {{ request()->routeIs('item_categories.index') ? 'active' : '' }}" data-key="t-horizontal">Item Categories  </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('item_sub_categories.index') }}" class="nav-link {{ request()->routeIs('item_sub_categories.index') ? 'active' : '' }}" data-key="t-horizontal">Item Sub Categories  </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('items.index') }}" class="nav-link {{ request()->routeIs('items.index') ? 'active' : '' }}" data-key="t-horizontal">Items  </a>
                                </li>

                                <li class="nav-item">
                                    <a href="{{ route('contractors.index') }}" class="nav-link {{ request()->routeIs('contractors.index') ? 'active' : '' }}" data-key="t-horizontal">Contractors  </a>
                                </li>

                            </ul>
                        </div>
                    </li>
                @endcan

                @can('masters.all')
                    {{-- <li class="nav-item">
                        <a class="nav-link menu-link {{  request()->routeIs('bgsd.index')|| request()->routeIs('approvalsanction.index')|| request()->routeIs('tenderentry.index')|| request()->routeIs('bid.index')|| request()->routeIs('tenderexecution.index')? 'active' : 'collapsed' }}" href="#transactions" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarLayouts">
                            <i class="ri-layout-3-line"></i>
                            <span data-key="t-layouts">Transactions</span>
                        </a>
                        <div class="collapse menu-dropdown {{  request()->routeIs('bgsd.index')| request()->routeIs('approvalsanction.index')|| request()->routeIs('tenderentry.index')|| request()->routeIs('bid.index')|| request()->routeIs('tenderexecution.index')? 'show' : '' }}" id="transactions">
                            <ul class="nav nav-sm flex-column">

                                <li class="nav-item">
                                    <a href="{{ route('bgsd.index') }}" class="nav-link {{ request()->routeIs('bgsd.index') ? 'active' : '' }}" data-key="t-horizontal">Bank Gaurantee/Security Deposite</a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('tenderentry.index') }}" class="nav-link {{ request()->routeIs('tenderentry.index') ? 'active' : '' }}" data-key="t-horizontal">Tender Entry Details</a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('approvalsanction.index') }}" class="nav-link {{ request()->routeIs('approvalsanction.index') ? 'active' : '' }}" data-key="t-horizontal">Approval And Sanction</a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('bid.index') }}" class="nav-link {{ request()->routeIs('bid.index') ? 'active' : '' }}" data-key="t-horizontal">BID Entry and BID Finalization</a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('tenderexecution.index') }}" class="nav-link {{ request()->routeIs('tenderexecution.index') ? 'active' : '' }}" data-key="t-horizontal">Tender Execution And Award</a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('workordergeneration.index') }}" class="nav-link {{ request()->routeIs('workordergeneration.index') ? 'active' : '' }}" data-key="t-horizontal">Work Order Generation</a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('physicalmilestone.index') }}" class="nav-link {{ request()->routeIs('physicalmilestone.index') ? 'active' : '' }}" data-key="t-horizontal">Physical Milestone</a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('measurementbook.index') }}" class="nav-link {{ request()->routeIs('measurementbook.index') ? 'active' : '' }}" data-key="t-horizontal">Measurement Book</a>
                                </li>
                            </ul>
                        </div>
                    </li> --}}
                @endcan

            </ul>
        </div>
    </div>

    <div class="sidebar-background"></div>
</div>


<div class="vertical-overlay"></div>
