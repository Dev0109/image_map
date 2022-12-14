<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/dashboard" class="brand-link">
        <img src="{{ asset('adminAsset/dist/img/glp-logo.png') }}" alt="Dashboard Logo"
            class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Dashboard</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset('adminAsset/dist/img/avatar5.png') }}" class="img-circle elevation-2"
                    alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">{{ auth()->user()->name }}</a>
            </div>
        </div>

        <!-- SidebarSearch Form -->
        <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search"
                    aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->


                <li class="nav-item {{ request()->is('dashboard') ? 'menu-open' : '' }}">
                    <a href="/dashboard" class="nav-link {{ request()->is('dashboard') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Home
                        </p>
                    </a>

                </li>



                <li class="nav-item @if (request()->is('updatenewspaper')) menu-open @endif">
                    <a href="/updatenewspaper" class="nav-link">
                        <i class="nav-icon fa fa-shopping-basket"></i>
                        <p>
                            Update NewsPapper

                        </p>
                    </a>

                </li>

                <li class="nav-item @if (request()->is('uploadPDF')) menu-open @endif">
                    <a href="/uploadPDF" class="nav-link">
                        <i class="nav-icon fa fa-file"></i>
                        <p>
                            Upload PDF
                        </p>
                    </a>

                </li>
                <li class="nav-item @if (request()->is('advertisement')) menu-open @endif">
                    <a href="/advertisement" class="nav-link">
                        <i class="nav-icon fa fa-bullhorn"></i>
                        <p>
                            Advertisement
                        </p>
                    </a>

                </li>



                <li class="nav-item">
                    <a href="/auditTrail" class="nav-link {{ request()->is('auditTrail') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-shield-alt"></i>
                        <p>
                            Audit Trail
                        </p>
                    </a>

                </li>

            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
