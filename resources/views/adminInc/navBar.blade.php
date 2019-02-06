@if( !Auth::guest() )

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">

        <a class="navbar-brand" href="{{ url('/dashboard') }}">
            <img src="{{ asset('images/cart.png') }}" alt="logo">
            <span class="text-center brand-title">
                Admin panel
            </span>
        </a>

        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse"
                data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false"
                aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">


            <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">

                <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
                    <a class="nav-link" href="{{ url('/dashboard') }}">
                        <i class="fa fa-fw fa-dashboard"></i>
                        <span class="nav-link-text">Dashboard</span>
                    </a>
                </li>

                {{--
                <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Main Slider">
                    <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapse_main_slider" data-parent="#exampleAccordion">
                        <i class="fa fa-picture-o" aria-hidden="true"></i>&nbsp;
                        <span class="nav-link-text">Main Slider</span>
                    </a>
                    <ul class="sidenav-second-level collapse" id="collapse_main_slider">
                        <li>
                            <a href="{{ url('/carousel') }}">Show all images</a>
                        </li>
                    </ul>
                </li>
                --}}

                <li class="nav-item" data-toggle="tooltip" data-placement="right" title="User Management">
                    <a class="nav-link" href="{{ url('/users') }}">
                        <i class="fa fa-fw fa-users"></i>
                        <span class="nav-link-text">User Management</span>
                    </a>
                </li>


                <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Slider">
                    <a class="nav-link" href="{{ url('/slider') }}">
                        <i class="fa fa-fw fa-image"></i>
                        <span class="nav-link-text">Slider</span>
                    </a>
                </li>

                <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Products">
                    <a class="nav-link" href="{{ url('/product') }}">
                        <i class="fa fa-fw fa-shopping-bag"></i>
                        <span class="nav-link-text">Products</span>
                    </a>
                </li>

                <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Products">
                    <a class="nav-link" href="{{ url('/category') }}">
                        <i class="fa fa-fw fa-area-chart"></i>
                        <span class="nav-link-text">Categories</span>
                    </a>
                </li>

                <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Brands">
                    <a class="nav-link" href="{{ url('/brand') }}">
                        <i class="fa fa-fw fa-shopping-bag"></i>
                        <span class="nav-link-text">Brands</span>
                    </a>
                </li>

                <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Charts & Cards">
                    <a class="nav-link" href="{{ url('/dashboard/charts') }}">
                        <i class="fa fa-fw fa-area-chart"></i>
                        <span class="nav-link-text">Charts & Cards</span>
                    </a>
                </li>

                <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Tables">
                    <a class="nav-link" href="{{ url('/dashboard/tables') }}">
                        <i class="fa fa-fw fa-table"></i>
                        <span class="nav-link-text">Tables</span>
                    </a>
                </li>

            </ul>



            {{-- ==============   SideNav toggle button   ============== --}}
            <ul class="navbar-nav sidenav-toggler">
                <li class="nav-item">
                    <a class="nav-link text-center" id="sidenavToggler">
                        <i class="fa fa-fw fa-angle-left"></i>
                    </a>
                </li>
            </ul>



            {{-- ==============   Right-side nav   ============== --}}
            <ul class="navbar-nav ml-auto">


                {{-- Messages --}}
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle mr-lg-2" id="messagesDropdown" href="#" data-toggle="dropdown"
                       aria-haspopup="true" aria-expanded="false">
                        <i class="fa fa-fw fa-envelope"></i>
                        <span class="d-lg-none">
                            Messages<span class="badge badge-pill badge-primary">12 New</span>
                        </span>
                        <span class="indicator text-primary d-none d-lg-block">
                            <i class="fa fa-fw fa-circle"></i>
                        </span>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="messagesDropdown">
                        <h6 class="dropdown-header">New Messages:</h6>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">
                            <strong>David Miller</strong>
                            <span class="small float-right text-muted">11:21 AM</span>
                            <div class="dropdown-message small">Hey there! This new version of SB Admin is pretty
                                awesome! These messages clip off when they reach the end of the box so they don't
                                overflow over to the sides!
                            </div>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">
                            <strong>Jane Smith</strong>
                            <span class="small float-right text-muted">11:21 AM</span>
                            <div class="dropdown-message small">I was wondering if you could meet for an appointment at
                                3:00 instead of 4:00. Thanks!
                            </div>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">
                            <strong>John Doe</strong>
                            <span class="small float-right text-muted">11:21 AM</span>
                            <div class="dropdown-message small">I've sent the final files over to you for review. When
                                you're able to sign off of them let me know and we can discuss distribution.
                            </div>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item small" href="#">View all messages</a>
                    </div>
                </li>

                {{-- Notifications --}}
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle mr-lg-2" id="alertsDropdown" href="#" data-toggle="dropdown"
                       aria-haspopup="true" aria-expanded="false">
                        <i class="fa fa-fw fa-bell"></i>
                        <span class="d-lg-none">
                            Alerts<span class="badge badge-pill badge-warning">6 New</span>
                        </span>
                        <span class="indicator text-warning d-none d-lg-block">
                            <i class="fa fa-fw fa-circle"></i>
                        </span>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="alertsDropdown">
                        <h6 class="dropdown-header">New Alerts:</h6>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">
                            <span class="text-success">
                                <strong>
                                    <i class="fa fa-long-arrow-up fa-fw"></i>Status Update</strong>
                            </span>
                            <span class="small float-right text-muted">11:21 AM</span>
                            <div class="dropdown-message small">This is an automated server response message. All
                                systems are online.
                            </div>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">
                            <span class="text-danger">
                                <strong><i class="fa fa-long-arrow-down fa-fw"></i>Status Update</strong>
                            </span>
                            <span class="small float-right text-muted">11:21 AM</span>
                            <div class="dropdown-message small">This is an automated server response message. All
                                systems are online.
                            </div>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">
                            <span class="text-success">
                                <strong><i class="fa fa-long-arrow-up fa-fw"></i>Status Update</strong>
                            </span>
                            <span class="small float-right text-muted">11:21 AM</span>
                            <div class="dropdown-message small">This is an automated server response message. All
                                systems are online.
                            </div>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item small" href="#">View all alerts</a>
                    </div>
                </li>

                {{-- Search Box --}}
                <li class="nav-item">
                    <form class="form-inline my-2 my-lg-0 mr-lg-2">
                        <div class="input-group">
                            <input class="form-control" type="text" placeholder="Search for...">
                            <span class="input-group-btn">
                                <button class="btn btn-primary" type="button">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                        </div>
                    </form>
                </li>


                {{-- Authentication Links --}}
                <li class="dropdown">
                    <a href="#" class="btn btn-default text-light dropdown-toggle" data-toggle="dropdown" role="button"
                       aria-expanded="false" aria-haspopup="true">
                        <i class="fa fa-user-circle" aria-hidden="true"></i>
                        &nbsp;{{ Auth::user()->name }}&nbsp;
                        <span class="caret"></span>
                    </a>

                    <ul class="dropdown-menu" style="background-color: #343A40">
                        <li>
                            <a class="btn btn-default text-center text-danger" style="font-weight: 700"
                               onclick="return confirmLogout(this, event, 'Sure to Logout ?');">
                                <i class="fa fa-sign-out" aria-hidden="true"></i>&nbsp;Logout
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </li>
                    </ul>
                </li>

            </ul>


        </div>
    </nav>


@endif