    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">King <sup>2</sup></div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="/dashboard">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
                </li>
                <!-- Heading -->
                <div class="sidebar-heading">
                    Mobil  
                </div>

                <!-- Nav Item - Pages Collapse Menu -->
                <li class="nav-item">
                    <a class="nav-link" href="/typemobil">
                        <i class="fas fa-fw fa-tachometer-alt"></i>
                        <span>Type Mobil</span></a>
                    </li>

                    <!-- Nav Item - Pages Collapse Menu -->
                    <li class="nav-item">
                        <a class="nav-link" href="/jenismobil">
                            <i class="fas fa-fw fa-tachometer-alt"></i>
                            <span>Produk</span></a>
                        </li>

                        <!-- Divider -->
                        <hr class="sidebar-divider">

                        <div class="sidebar-heading">
                            Transaksi 
                        </div>

                        <!-- Nav Item - Pages Collapse Menu -->
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('penjualan.index') }}">
                                <i class="fas fa-fw fa-tachometer-alt"></i>
                                <span>Penjualan</span></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('transaksi.index') }}">
                                    <i class="fas fa-fw fa-tachometer-alt"></i>
                                    <span>Transaksi lama </span></a>
                                </li>


                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('transaksi.baru') }}">
                                    <i class="fas fa-fw fa-tachometer-alt"></i>
                                    <span>Transaksi Baru </span></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="/payment">
                                        <i class="fas fa-fw fa-tachometer-alt"></i>
                                        <span>Payments</span></a>
                                    </li>


                                    <!-- Divider -->
                                    <hr class="sidebar-divider">

                                    <!-- Heading -->
                                    <div class="sidebar-heading">
                                        People
                                    </div>

                                    <li class="nav-item">
                                        <a class="nav-link" href="/customer">
                                            <i class="fas fa-fw fa-tachometer-alt"></i>
                                            <span>Customers</span></a>
                                        </li>

                                        <!-- Nav Item - Pages Collapse Menu -->
                                        <li class="nav-item">
                                            <a class="nav-link" href="/pegawai">
                                                <i class="fas fa-fw fa-tachometer-alt"></i>
                                                <span>Pegawai</span></a>
                                            </li>
                                            <!-- Nav Item - Pages Collapse Menu -->
                                            <li class="nav-item">
                                                <a class="nav-link" href="/supplier">
                                                    <i class="fas fa-fw fa-tachometer-alt"></i>
                                                    <span>Suppliers </span></a>
                                                </li>
                                                <!-- Divider -->
                                                <hr class="sidebar-divider d-none d-md-block">

                                                <!-- Sidebar Toggler (Sidebar) -->
                                                <div class="text-center d-none d-md-inline">
                                                    <button class="rounded-circle border-0" id="sidebarToggle"></button>
                                                </div>
                                            </ul>
                                            <!-- End of Sidebar -->

                                            <!-- Content Wrapper -->
                                            <div id="content-wrapper" class="d-flex flex-column">

                                                <!-- Main Content -->
                                                <div id="content">

                                                    <!-- Topbar -->
                                                    <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                                                        <!-- Sidebar Toggle (Topbar) -->
                                                        <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                                                            <i class="fa fa-bars"></i>
                                                        </button>

                                                        <h6>WELCOME MAMEN</h6>
                                                        <!-- Topbar Navbar -->
                                                        <ul class="navbar-nav ml-auto">

                                                            <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                                                            <li class="nav-item dropdown no-arrow d-sm-none">
                                                                <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                <i class="fas fa-search fa-fw"></i>
                                                            </a>
                                                            <!-- Dropdown - Messages -->
                                                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                                                            aria-labelledby="searchDropdown">
                                                            <form class="form-inline mr-auto w-100 navbar-search">
                                                                <div class="input-group">
                                                                    <input type="text" class="form-control bg-light border-0 small"
                                                                    placeholder="Search for..." aria-label="Search"
                                                                    aria-describedby="basic-addon2">
                                                                    <div class="input-group-append">
                                                                        <button class="btn btn-primary" type="button">
                                                                            <i class="fas fa-search fa-sm"></i>
                                                                        </button>
                                                                    </div>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </li>



                                                    <div class="topbar-divider d-none d-sm-block"></div>

                                                    <!-- Nav Item - User Information -->
                                                    <li class="nav-item dropdown no-arrow">
                                                        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                       
                                                        <img class="img-profile rounded-circle"
                                                        src="img/undraw_profile.svg">
                                                    </a>
                                                    <!-- Dropdown - User Information -->
                                                    <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                                    aria-labelledby="userDropdown">
                                                    <a class="dropdown-item" href="#">
                                                        <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                                        Profile
                                                    </a>
                                                    <a class="dropdown-item" href="#">
                                                        <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                                        Settings
                                                    </a>
                                                    <a class="dropdown-item" href="#">
                                                        <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                                                        Activity Log
                                                    </a>
                                                    <div class="dropdown-divider"></div>
                                                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                                        <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                                        Logout
                                                    </a>
                                                </div>
                                            </li>

                                        </ul>

                                    </nav>
                                    <!-- End of Topbar -->

                                </div>
                                <!-- End of Main Content -->

                                <!-- Bootstrap core JavaScript-->
                                <script src="/vv/jquery/jquery.min.js"></script>
                                <script src="/vv/bootstrap/js/bootstrap.bundle.min.js"></script>

                                <!-- Core plugin JavaScript-->
                                <script src="/vv/jquery-easing/jquery.easing.min.js"></script>

                                <!-- Custom scripts for all pages-->
                                <script src="/js/sb-admin-2.min.js"></script>

                                <!-- Page level plugins -->
                                <script src="/vv/chart.js/Chart.min.js"></script>

                                <!-- Page level custom scripts -->
                                <script src="/js/demo/chart-area-demo.js"></script>
                                <script src="/js/demo/chart-pie-demo.js"></script>

                            </body>

                            </html>