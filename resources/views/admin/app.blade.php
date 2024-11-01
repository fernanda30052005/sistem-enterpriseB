<!DOCTYPE html>
<html lang="en" class="light-style layout-menu-fixed" dir="ltr" 
      data-theme="theme-default" 
      data-assets-path="{{ asset('assets/') }}" 
      data-template="vertical-menu-template-free">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
    <title>OneP

    </title>
    <meta name="description" content="" />

    <!-- Include your custom styles here -->
    @include('admin.styles.style')

    <!-- Helpers -->
    <script src="{{ asset('assets/vendor/js/helpers.js') }}"></script>

    <!-- Config: Mandatory theme config file -->
    <script src="{{ asset('assets/js/config.js') }}"></script>
</head>

<body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            <!-- Menu -->
            <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
                <div class="app-brand demo">
                   <a href="{{ route('dashboard') }}" class="app-brand-link d-flex align-items-center"> 
                   <i class='bx bx-buildings'></i>
                         <h1 class="h4 mb-0">Manajemen kantor</h1> 
                        </a>
                    <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
                        <i class="bx bx-chevron-left bx-sm align-middle"></i>
                    </a>
                </div>

                <div class="menu-inner-shadow"></div>

                <ul class="menu-inner py-1">
                    <!-- Main Menu -->
                    <li class="menu-header small text-uppercase" style="color: blue;">
                        <span class="menu-header-text">Human Resource</span>
                    </li>
                    <li class="menu-item">
                        <a href="{{ route('departements.index') }}" class="menu-link">
                            <i class='bx bx-buildings'></i>
                            <div data-i18n="Menu 2">Departements</div>
                        </a>
                    </li> 
                    <li class="menu-item">
                        <a href="{{route('employees.index')}}" class="menu-link">
                            <i class='bx bxs-user-account'></i>
                            <div data-i18n="Menu 2">Employees</div>
                        </a>
                    </li> 
                    <li class="menu-item">
                    <a href="{{route('payrolls.index')}}" class="menu-link">
                           <i class='bx bxl-paypal'></i>
                            <div data-i18n="Menu 2">Payroll</div>
                        </a>
                    </li> <li class="menu-item">
                    <a href="{{route('leaves.index')}}" class="menu-link">
                            <i class='bx bxs-door-open' ></i>
                            <div data-i18n="Menu 2">Leave</div>
                        </a>
                    </li> 
                    <li class="menu-item">
                    <a href="{{route('attendances.index')}}" class="menu-link">
                            <i class='bx bxs-notepad'></i>
                            <div data-i18n="Menu 2">Attendance</div>
                        </a>
                    </li> 
                    <li class="menu-item">
                        <a href="{{route('customers.index')}}" class="menu-link">
                            <i class='bx bxs-user-account'></i>
                            <div data-i18n="Menu 2">Costumers</div>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="{{route('promotions.index')}}" class="menu-link">
                            <i class='bx bxs-user-account'></i>
                            <div data-i18n="Menu 2">Promotions</div>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="{{ route('send.promotion.form') }}" class="menu-link">
                            <i class='bx bx-mail-send'></i>
                            <div data-i18n="Send Promotion">Send Promotion</div>
                        </a>
                    </li>
                    <li class="menu-item">
                    <a href="#" class="menu-link menu-toggle">
                         <div data-i18n="Menu 1" style="color: blue;">User Management</div>
                        </a> 
                        <ul class="menu-sub">
                            <li class="menu-item">
                                <a href="{{ route('submenu1') }}" class="menu-link">
                                    <div>Users</div>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="{{ route('roles.index') }}" class="menu-link">
                                    <div data-i18n="Sub Menu 2">Roles</div>
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </aside>
            <!-- / Menu -->

            <!-- Layout container -->
            <div class="layout-page">
                <!-- Navbar -->
                <nav class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme" id="layout-navbar">
                    <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
                        <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
                            <i class="bx bx-menu bx-sm"></i>
                        </a>
                    </div>

                    <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
                        <!-- Search -->
                        <div class="navbar-nav align-items-center">
                            <div class="nav-item d-flex align-items-center">
                                <i class="bx bx-search fs-4 lh-0"></i>
                                <input type="text" class="form-control border-0 shadow-none" placeholder="Search..." aria-label="Search..." />
                            </div>
                        </div>
                        <!-- /Search -->

                        <ul class="navbar-nav flex-row align-items-center ms-auto">
                            <!-- User -->
                            <li class="nav-item navbar-dropdown dropdown-user dropdown">
                                <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
                                    <div class="avatar avatar-online">
                                        <img src="{{ asset('assets/img/avatars/1.png') }}" alt class="w-px-40 h-auto rounded-circle" />
                                    </div>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end">
                                    <li>
                                        <a class="dropdown-item" href="#">
                                            <div class="d-flex">
                                                <div class="flex-shrink-0 me-3">
                                                    <div class="avatar avatar-online">
                                                        <img src="{{ asset('assets/img/avatars/1.png') }}" alt class="w-px-40 h-auto rounded-circle" />
                                                    </div>
                                                </div>
                                                <div class="flex-grow-1">
                                                    <span class="fw-semibold d-block">John Doe</span>
                                                    <small class="text-muted">Admin</small>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <div class="dropdown-divider"></div>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="#">
                                            <i class="bx bx-user me-2"></i>
                                            <span class="align-middle">My Profile</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="#">
                                            <i class="bx bx-cog me-2"></i>
                                            <span class="align-middle">Settings</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="#">
                                            <span class="d-flex align-items-center align-middle">
                                                <i class="flex-shrink-0 bx bx-credit-card me-2"></i>
                                                <span class="flex-grow-1 align-middle">Billing</span>
                                                <span class="flex-shrink-0 badge badge-center rounded-pill bg-danger w-px-20 h-px-20">4</span>
                                            </span>
                                        </a>
                                    </li>
                                    <li>
                                        <div class="dropdown-divider"></div>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="auth-login-basic.html">
                                            <i class="bx bx-power-off me-2"></i>
                                            <span class="align-middle">Log Out</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <!--/ User -->
                        </ul>
                    </div>
                </nav>
                <!-- / Navbar -->

                <!-- Content wrapper -->
                <div class="content-wrapper">
                    <!-- Main Content -->
                    <div class="container-xxl flex-grow-1 container-p-y">
                        <div class="row">
                            @yield('content') <!-- This is where the page-specific content will go -->
                        </div>
                    </div>
                    <!-- / Main Content -->

                    <!-- Footer -->
                    <footer class="content-footer footer bg-footer-theme">
                        <div class="container-xxl d-flex flex-wrap justify-content-between py-2 flex-md-row flex-column">
                            <div class="mb-2 mb-md-0">
                                © <script>document.write(new Date().getFullYear());</script>
                                , made with ❤️ by 
                                <a href="https://themeselection.com" target="_blank" class="footer-link fw-bolder">ThemeSelection</a>
                            </div>
                        </div>
                    </footer>
                    <!-- / Footer -->
                    <div class="content-backdrop fade"></div>
                </div>
                <!-- / Content wrapper -->
            </div>
            <!-- / Layout page -->
        </div>

        <!-- Overlay -->
        <div class="layout-overlay layout-menu-toggle"></div>
    </div>
    <!-- / Layout wrapper -->

    <!-- Include your custom scripts here -->
    @include('admin.scripts.script')

</body>
</html>