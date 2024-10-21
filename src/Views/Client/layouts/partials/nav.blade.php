<!-- Header news -->
<header class="bg-light">
    <!-- Navbar  Top-->
    <div class="topbar d-none d-sm-block">
        <div class="container ">
            <div class="row">
                <div class="col-sm-12 col-md-5">
                    <div class="topbar-left">
                        <div class="topbar-text">
                            Monday, March 22, 2020
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-7">
                    <div class="list-unstyled topbar-right">
                        <ul class="topbar-link">
                            <li><a href="#" title="">Career</a></li>
                            <li><a href="#" title="">Contact Us</a></li>
                            @if (empty($_SESSION['user']))
                                <li><a href="{{ url('login') }}" title="">Login / Register</a></li>
                            @else
                                <li class="nav-item dropdown">
                                    <a class="nav-link active dropdown-toggle" href="#" id="userDropdown"
                                        role="button" data-toggle="dropdown" aria-haspopup="true"
                                        aria-expanded="false">
                                        <img src="{{ show_uploads($_SESSION['user']['hinhAnh']) }}" alt=""
                                            style="width:30px; height:30px; border-radius:50%;">
                                        {{ $_SESSION['user']['tenDangNhap'] }}
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-left" aria-labelledby="userDropdown">
                                        <a class="dropdown-item text-dark" href="{{ url('edit') }}">Profile</a>
                                        <a class="dropdown-item text-dark" href="{{ url('editUse') }}">Edit</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item text-dark" href="{{ url('logout') }}">Logout</a>
                                    </div>
                                </li>
                            @endif


                        </ul>

                        <ul class="topbar-sosmed">
                            <li>
                                <a href="#"><i class="fa-brands fa-facebook"></i></i></a>
                            </li>
                            <li>
                                <a href="#"><i class="fa-brands fa-twitter"></i></a>
                            </li>
                            <li>
                                <a href="#"><i class="fa-brands fa-instagram"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Navbar Top  -->
    <!-- Navbar  -->
    <!-- Navbar menu  -->
    <div class="navigation-wrap navigation-shadow bg-white">
        <nav class="navbar navbar-hover navbar-expand-lg navbar-soft">
            <div class="container">
                <div class="offcanvas-header">
                    <div data-toggle="modal" data-target="#modal_aside_right" class="btn-md">
                        <span class="navbar-toggler-icon"></span>
                    </div>
                </div>
                <figure class="mb-0 mx-auto">
                    <a href='homepage-v1.html'>
                        <img src="{{ asset('assets/client/images/logo1.png') }}" alt="" class="img-fluid logo">
                    </a>
                </figure>
                <div class="collapse navbar-collapse justify-content-between" id="main_nav99">
                    <ul class="navbar-nav ml-auto ">
                        <li class="nav-item dropdown">
                            <a class="nav-link active" href="{{ url('') }}"> Trang chủ </a>
                        </li>

                        <li class="nav-item dropdown">
                            <a class="nav-link active dropdown-toggle" href="#"> Tin tức </a>

                        </li>

                        <li class="nav-item dropdown">
                            <a class="nav-link active dropdown-toggle" href="#" data-toggle="dropdown"> Danh mục
                            </a>
                            <ul class="dropdown-menu dropdown-menu-left">
                                @foreach ($lists as $list)
                                    <li><a class='dropdown-item' href="{{url($list['tenDanhMuc'] .'/loadList')}}">{{ $list['tenDanhMuc'] }}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </li>

                    </ul>
                    </li>

                    </ul>


                    <!-- Search bar.// -->
                    <ul class="navbar-nav ">
                        <li class="nav-item search hidden-xs hidden-sm ">
                            <a class="nav-link" href="#">
                                <i class="fa fa-search"></i>
                            </a>
                        </li>
                    </ul>
                    <!-- Search content bar.// -->
                    <div class="top-search navigation-shadow">
                        <div class="container">
                            <div class="input-group ">
                                <form action="{{ url('search') }}" method="POST">

                                    <div class="row no-gutters mt-3">
                                        <div class="col">
                                            <input class="form-control border-secondary border-right-0 rounded-0"
                                                type="text" value="" placeholder="Search" name="word"
                                                id="example-search-input4">
                                        </div>
                                        <div class="col-auto">
                                            <a class='btn btn-outline-secondary border-left-0 rounded-0 rounded-right'
                                                href='search-result.html'>
                                                <i class="fa fa-search"></i>
                                            </a>
                                        </div>
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- Search content bar.// -->
                </div> <!-- navbar-collapse.// -->
            </div>
        </nav>
    </div>
    <!-- End Navbar menu  -->

    <!-- Navbar sidebar menu  -->
    <div id="modal_aside_right" class="modal fixed-left fade" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-dialog-aside" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="widget__form-search-bar  ">
                        <div class="row no-gutters">
                            <div class="col">
                                <input class="form-control border-secondary border-right-0 rounded-0" value=""
                                    placeholder="Search">
                            </div>
                            <div class="col-auto">
                                <button class="btn btn-outline-secondary border-left-0 rounded-0 rounded-right">
                                    <i class="fa fa-search"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <nav class="list-group list-group-flush">
                        <ul class="navbar-nav ">
                            <li class="nav-item dropdown">
                                <a class="nav-link active text-dark" href="#"> Home
                                </a>
                            </li>
                            <li class="nav-item"><a class="nav-link  text-dark" href="#"> Login </a></li>
                            <li class="nav-item"><a class="nav-link  text-dark" href="#"> Register </a></li>
                            <li class="nav-item"><a class='nav-link  text-dark' href='contact.html'> Contact </a>
                            </li>
                        </ul>

                    </nav>
                </div>

            </div>
        </div> <!-- modal-bialog .// -->
    </div> <!-- modal.// -->
    <!-- End Navbar sidebar menu  -->
    <!-- End Navbar  -->
</header>
<!-- End Header news -->
