<!-- Sidebar -->
<style>
    .lv1 {
        padding-left: 24px;
    }
</style>
<div class="sidebar">
    <!-- Sidebar user panel (optional) -->

    <!-- Sidebar Menu -->
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            @can('show sys')
                <li class="nav-item">
                    <a href="{{ route('home') }}" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            {{ __('Dashboard') }}
                        </p>
                    </a>
                </li>
            @endcan

            @can('show purchasing')
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="fa fa-wallet nav-icon" aria-hidden="true"></i>
                        <p>{{ __('Purchasing') }}
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview" style="display: none;">
                        <li class="nav-item">
                            <a href="{{ route('supplier.index') }}" class="nav-link lv1">
                                <i class="fa fa-pallet nav-icon" aria-hidden="true"></i>
                                <p>{{ __('Daftar Supplier') }}</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('customer.index') }}" class="nav-link lv1">
                                <i class="fa fa-pallet nav-icon" aria-hidden="true"></i>
                                <p>{{ __('Daftar Customer') }}</p>
                            </a>
                        </li>


                        <li class="nav-item">
                            <a href="{{ route('purchaseOrder') }}" class="nav-link lv1">
                                <i class="fa fa-shopping-cart nav-icon" aria-hidden="true"></i>
                                <p>{{ __('Purchase Order') }}</p>
                            </a>
                        </li>
                    </ul>
                </li>
            @endcan

            @can('show prod')
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="fa fa-industry nav-icon" aria-hidden="true"></i>
                        <p>{{ __('Produksi') }}
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview" style="display: none;">
                        <li class="nav-item">
                            <a href="{{ route('wo.form-add') }}" class="nav-link lv1">
                                <i class="fa fa-clipboard-list nav-icon" aria-hidden="true"></i>
                                <p>{{ __('Jadwal Produksi') }}</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('production.init-add') }}" class="nav-link lv1">
                                <i class="fa fa-pallet nav-icon" aria-hidden="true"></i>
                                <p>{{ __('Pengepakan ke Pallet') }}</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('production.index') }}" class="nav-link lv1">
                                <i class="fa fa-pallet nav-icon" aria-hidden="true"></i>
                                <p>{{ __('Input Nomer Pallet') }}</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('pickinglist.index') }}" class="nav-link lv1">
                                <i class="fa fa-pallet nav-icon" aria-hidden="true"></i>
                                <p>{{ __('Penerimaaan Inbound') }}</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('report.index') }}" class="nav-link lv1">
                                <i class="fa fa-pallet nav-icon" aria-hidden="true"></i>
                                <p>{{ __('Item Report') }}</p>
                            </a>
                        </li>
                    </ul>
                </li>
            @endcan

            {{-- @can('show prod') --}}
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="fa fa-industry nav-icon" aria-hidden="true"></i>
                    <p>{{ __('request Order') }}
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview" style="display: none;">
                    @if (Auth::user()->role == 'Staff-IT' || Auth::user()->role == 'Super-Admin-User')
                    <li class="nav-item">
                        <a href="{{ route('RO.index') }}" class="nav-link lv1">
                            <i class="fa fa-clipboard-list nav-icon" aria-hidden="true"></i>
                            <p>{{ __('Request Order') }}</p>
                        </a>
                    </li>
                    @endif

                    @if (Auth::user()->role == 'Manager-IT' || Auth::user()->role == 'Super-Admin-User')
                        <li class="nav-item">
                            <a href="{{ route('ROApproved.index') }}" class="nav-link lv1">
                                <i class="fa fa-clipboard-list nav-icon" aria-hidden="true"></i>
                                <p>{{ __('Manager Approved') }}</p>
                            </a>
                        </li>
                    @endif



                    {{-- @if (Auth::user()->role == 3) --}}
                    <li class="nav-item">
                        <a href="{{ route('HRApproved.index') }}" class="nav-link lv1">
                            <i class="fa fa-clipboard-list nav-icon" aria-hidden="true"></i>
                            <p>{{ __('HR Approved') }}</p>
                        </a>
                    </li>
                    {{-- @endif --}}
                    <li class="nav-item">
                        <a href="{{ route('GAApproved.index') }}" class="nav-link lv1">
                            <i class="fa fa-clipboard-list nav-icon" aria-hidden="true"></i>
                            <p>{{ __('GA Approved') }}</p>
                        </a>
                    </li>

                </ul>
            </li>
            {{-- @endcan --}}

            @can('show wms')
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="fa fa-warehouse nav-icon" aria-hidden="true"></i>
                        <p>{{ __('Logistik FG') }}
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview" style="display: none;">
                        <li class="nav-item">
                            <a href="{{ route('warehouse.penerimaan') }}" class="nav-link lv1">
                                <i class="fa fa-dolly nav-icon" aria-hidden="true"></i>
                                <p>{{ __('Terima dari Produksi') }}</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('warehouse.penyimpanan') }}" class="nav-link lv1">
                                <i class="fa fa-snowflake fa-boxes nav-icon" aria-hidden="true"></i>
                                <p>{{ __('Simpan ke Cold Storage') }}</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="fa fa-warehouse nav-icon" aria-hidden="true"></i>
                        <p>{{ __('Logistik RM') }}
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview" style="display: none;">
                        <li class="nav-item">
                            <a href="{{ route('material.released') }}" class="nav-link lv1">
                                <i class="fa fa-boxes nav-icon" aria-hidden="true"></i>
                                <p>{{ __('Material Release') }}</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('gr.index') }}" class="nav-link lv1">
                                <i class="fa fa-truck-loading nav-icon" aria-hidden="true"></i>
                                <p>{{ __('Terima dari Supplier') }}</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('label.create') }}" class="nav-link lv1">
                                <i class="fa fa-tag nav-icon" aria-hidden="true"></i>
                                <p>{{ __('Pelabelan PID') }}</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('label.index') }}" class="nav-link lv1">
                                <i class="fa fa-boxes nav-icon" aria-hidden="true"></i>
                                <p>{{ __('Simpan ke Gudang') }}</p>
                            </a>
                        </li>
                    </ul>
                </li>
            @endcan

            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-shopping-cart"></i>
                    <p>
                        {{ __('Transfer Stock') }}
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview" style="display: none;">
                    <li class="nav-item">
                        <a href="{{ route('requestStock') }}" class="nav-link">
                            <i class="nav-icon fas fa-shopping-cart"></i>
                            <p>{{ __('List Request Stock') }}</p>
                        </a>
                    </li>

                    @if (Auth::user()->id == 4 || Auth::user()->id == 3)
                        <li class="nav-item">
                            <a href="{{ route('requestStock.waitingApproval') }}" class="nav-link">
                                <i class="nav-icon fas fa-shopping-cart"></i>
                                <p>{{ __('Waiting for Approval') }}</p>
                            </a>
                        </li>
                    @endif
                </ul>
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
                                <a href="#" class="nav-link lv1">
                                    <i class="fa fa-user nav-icon" aria-hidden="true"></i>
                                    <p>{{ __('Employees') }}</p>
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
                        <li class="nav-item">
                            <a href="{{ route('skus') }}" class="nav-link lv1">
                                <i class="fa fa-list-ul nav-icon" aria-hidden="true"></i>
                                <p>{{ __('SKU') }}</p>
                            </a>
                        </li>
                    </ul>
                    <ul class="nav nav-treeview" style="display: none;">
                        @can('show sites')
                            <li class="nav-item">
                                <a href="{{ route('sites.index') }}" class="nav-link lv1">
                                    <i class="fa fa-location-arrow nav-icon" aria-hidden="true"></i>
                                    <p>{{ __('Sites') }}</p>
                                </a>
                            </li>
                        @endcan
                        @can('show departments')
                            <li class="nav-item">
                                <a href="{{ route('departments.index') }}" class="nav-link lv1">
                                    <i class="fa fa-sitemap nav-icon" aria-hidden="true"></i>
                                    {{ __('Departments') }}
                                </a>
                            </li>
                        @endcan
                        @hasallroles('Super-Admin')
                            <li class="nav-item">
                                <a href="{{ route('permissions.index') }}" class="nav-link lv1">
                                    <i class="fas fa-lock nav-icon"></i>
                                    <p>{{ __('Permissions') }}</p>
                                </a>
                            </li>
                        @endhasallroles
                        @can('show roles')
                            <li class="nav-item">
                                <a href="{{ route('roles.index') }}" class="nav-link lv1">
                                    <i class="far fa-user-circle nav-icon"></i>
                                    <p>
                                        {{ __('Roles') }}
                                    </p>
                                </a>
                            </li>
                        @endcan
                        @can('show users')
                            <li class="nav-item">
                                <a href="{{ route('users.index') }}" class="nav-link lv1">
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

            @can('show wms')
                <li class="nav-item">
                    <a href="{{ route('about') }}" class="nav-link">
                        <i class="nav-icon far fa-address-card"></i>
                        <p>
                            {{ __('About us') }}
                        </p>
                    </a>
                </li>
            @endcan

        </ul>
    </nav>
    <!-- /.sidebar-menu -->
</div>
<!-- /.sidebar -->
