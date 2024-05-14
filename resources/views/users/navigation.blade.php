<!-- Sidebar -->
<div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <!--div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="info">
            <a href="{{ route('profile.show') }}" class="d-block">{{ Auth::user()->name }}</a>
        </div>
    </!--div-->

    <!-- Sidebar Menu -->
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <li class="nav-item">
                <a href="{{ route('home') }}" class="nav-link">
                    <i class="nav-icon fas fa-th"></i>
                    <p>
                        {{ __('Dashboard') }}
                    </p>
                </a>
            </li>

            @can('show employee')
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-users nav-icon"></i>
                    <p>
                        {{ __('Human Resources') }}
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview" style="display: none;">
                    @can('show employees')
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="fa fa-user nav-icon" aria-hidden="true"></i>
                            <p>{{ __('Employees') }}</p>
                        </a>
                    </li>
                    @endcan
                    @can('show payslip')
                    <li class="nav-item">
                        <a href="{{route('payslips.index')}}" class="nav-link">
                            <i class="fa fa-paperclip nav-icon" aria-hidden="true"></i>
                            <p>{{ __('Pay Slip') }}</p>
                        </a>
                    </li>
                    @endcan
                </ul>
            </li>
            @endcan

            @can('show wms')
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="fa fa-university nav-icon" aria-hidden="true"></i>
                    <p>{{ __('Warehouse') }}
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview" style="display: none;">
                    @can('show wms')
                    <li class="nav-item">
                        @role('staff')
                        <a href="{{ route('products.form-add') }}" class="nav-link">
                            <i class="fa fa-book nav-icon" aria-hidden="true"></i>
                            <p>{{ __('Production') }}</p>
                        </a>
                        @else
                        <a href="{{ route('products') }}" class="nav-link">
                            <i class="fa fa-book nav-icon" aria-hidden="true"></i>
                            <p>{{ __('Production') }}</p>
                        </a>
                        @endrole
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('skus') }}" class="nav-link">
                            <i class="fa fa-list-ul nav-icon" aria-hidden="true"></i>
                            <p>{{ __('SKU') }}</p>
                        </a>
                    </li>
                    @endcan
                </ul>
            </li>
            @endcan
            @can('show settings')
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-cog nav-icon"></i>
                    <p>
                        {{ __('Settings') }}
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview" style="display: none;">
                    @can('show sites')
                    <li class="nav-item">
                        <a href="{{route('sites.index')}}" class="nav-link">
                            <i class="fa fa-location-arrow nav-icon" aria-hidden="true"></i>
                            <p>{{ __('Sites') }}</p>
                        </a>
                    </li>
                    @endcan
                    @can('show departments')
                    <li class="nav-item">
                        <a href="{{route('departments.index')}}" class="nav-link">
                            <i class="fa fa-sitemap nav-icon" aria-hidden="true"></i>
                            {{ __('Departments') }}
                        </a>
                    </li>
                    @endcan
                    @hasallroles('Super-Admin')
                    <li class="nav-item">
                        <a href="{{ route('permissions.index') }}" class="nav-link">
                            <i class="fas fa-lock nav-icon"></i>
                            <p>{{ __('Permissions') }}</p>
                        </a>
                    </li>
                    @endhasallroles
                    @can('show roles')
                    <li class="nav-item">
                        <a href="{{ route('roles.index') }}" class="nav-link">
                            <i class="far fa-user-circle nav-icon"></i>
                            <p>
                                {{ __('Roles') }}
                            </p>
                        </a>
                    </li>
                    @endcan
                    @can('show users')
                    <li class="nav-item">
                        <a href="{{ route('users.index') }}" class="nav-link">
                            <i class="nav-icon fas fa-user"></i>
                            <p>
                                {{ __('Users') }}
                            </p>
                        </a>
                    </li>
                    @endcan
                </ul>
            </li>
            @endcan
            <li class="nav-item">
                <a href="{{ route('about') }}" class="nav-link">
                    <i class="nav-icon far fa-address-card"></i>
                    <p>
                        {{ __('About us') }}
                    </p>
                </a>
            </li>

        </ul>
    </nav>
    <!-- /.sidebar-menu -->
</div>
<!-- /.sidebar -->
