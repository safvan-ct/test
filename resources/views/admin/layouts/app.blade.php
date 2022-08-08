<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="{{ config('app.name') }}">
    <meta name="author" content="{{ config('app.name') }}">

    <title>{{ config('app.name') }} | @yield('title')</title>
    <link rel="stylesheet" href="{{ asset('admin_assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin_assets/fonts/style.css') }}">
    <link rel="stylesheet" href="{{ asset('admin_assets/css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('admin_assets/vendor/datatables/dataTables.bs4.css') }}" />
    <link rel="stylesheet" href="{{ asset('admin_assets/vendor/datatables/dataTables.bs4-custom.css') }}" />
    <link href="{{ asset('admin_assets/vendor/datatables/buttons.bs.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('admin_assets/vendor/summernote/summernote-bs4.css') }}" />
    <!-- favicon -->
    <link rel="shortcut icon" href="{{ asset('/storage/images/favicon.png') }}">

</head>

<body>
    <div class="page-wrapper">
        <nav id="sidebar" class="sidebar-wrapper">
            <!-- Sidebar brand start  -->
            {{-- <div class="sidebar-brand">
                <a href="" class="logo text-center d-block">{{ config('app.name') }}</a>
            </div> --}}
            <!-- Sidebar brand end  -->

            <!-- User profile start -->
            <div class="sidebar-user-details">
                <div class="user-profile">
                    <img src="{{ asset('/storage/' .auth()->guard('admin')->user()->image) }}" class="profile-thumb"
                        alt="Profile Image">
                </div>

                <h6 class="profile-name text-capitalize">
                    {{ auth()->guard('admin')->user()->name }}
                </h6>

                <div class="profile-actions">
                    <a href="{{ route('profile.index') }}" data-toggle="tooltip" data-placement="top" title=""
                        data-original-title="Settings">
                        <i class="icon-settings1"></i>
                    </a>

                    <a href="{{ route('admin.logout') }}" class="red" data-toggle="tooltip" data-placement="top"
                        title="" data-original-title="Logout">
                        <i class="icon-power1"></i>
                    </a>
                </div>
            </div>
            <!-- User profile end -->

            <!-- Sidebar content start -->
            <div class="sidebar-content">

                <!-- sidebar menu start -->
                <div class="sidebar-menu">
                    <ul>
                        <li class="{{ $active == 'dashboard' ? 'active' : '' }}">
                            <a href="{{ route('dashboard') }}">
                                <i class="icon-home2"></i>
                                <span class="menu-text">Dashboards</span>
                            </a>
                        </li>

                        <li class="sidebar-dropdown {{ $active == 'website' ? 'active' : '' }}">
                            <a href="#">
                                <i class="icon-layers2"></i>
                                <span class="menu-text">Website Management</span>
                            </a>
                            <div class="sidebar-submenu active">
                                <ul>
                                    <li><a href="{{ route('slider.index') }}">Home Slider</a></li>
                                    <li><a href="{{ route('bestsaleslider.index') }}">Product Slider</a></li>
                                    <li><a href="{{ route('flash.index') }}">Flash News</a></li>
                                    <li><a href="{{ route('news.index') }}">Blogs</a></li>
                                    <li><a href="{{ route('adv.index') }}">Offer Banner</a></li>
                                    <li><a href="{{ route('homeabout.index') }}">Home about</a></li>
                                    <li><a href="{{ route('homecat1.index') }}">Home category1</a></li>
                                    <li><a href="{{ route('homecat2.index') }}">Home category2</a></li>
                                    <li><a href="{{ route('homesubcat1.index') }}">Home Subcategory</a></li>
                                    <li><a href="{{ route('aboutus.index') }}">About Us</a></li>
                                    <li><a href="{{ route('awardimage.index') }}">Award Images</a></li>
                                    <li><a href="{{ route('homequiz.index') }}">Home Quiz</a></li>
                                    <li><a href="{{ route('testimonial.index') }}">Testimonials</a></li>
                                    <li><a href="{{ route('socialmedia.index') }}">Social Media</a></li>
                                    <li><a href="{{ route('seo.index') }}">Seo</a></li>
                                    <li><a href="{{ route('deliverys.index') }}">Delivery Policy</a></li>
                                    <li><a href="{{ route('privacy.index') }}">Privacy Policy</a></li>
                                    <li><a href="{{ route('refund.index') }}">Refund Policy</a></li>
                                    <li><a href="{{ route('terms.index') }}">Terms Of Use</a></li>
                                </ul>
                            </div>
                        </li>

                        <li class="sidebar-dropdown {{ $active == 'product' ? 'active' : '' }}">
                            <a href="#">
                                <i class="icon-box"></i>
                                <span class="menu-text">Product Management</span>
                            </a>
                            <div class="sidebar-submenu">
                                <ul>
                                    <li><a href="{{ route('cats.index') }}">Category</a></li>
                                    <li><a href="{{ route('category.index') }}">Sub Category</a></li>
                                    <li><a href="{{ route('accounts.index') }}">Product</a></li>
                                    <li><a href="{{ route('ingredient.index') }}">Products Ingredient</a></li>
                                    <li><a href="{{ route('reviews.index') }}">Reviews</a></li>
                                    <li><a href="{{ route('faq.index') }}">Faq</a></li>
                                </ul>
                            </div>
                        </li>

                        <li class="sidebar-dropdown {{ $active == 'order' ? 'active' : '' }}">
                            <a href="#">
                                <i class="icon-box"></i>
                                <span class="menu-text">Order Management</span>
                            </a>
                            <div class="sidebar-submenu">
                                <ul>
                                    <li><a href="{{ route('neworder.list') }}">New Order</a></li>
                                    <li><a href="{{ route('shippedorder.list') }}">Shipped Order</a></li>
                                    <li><a href="{{ route('order.list') }}">Delivered Order</a></li>
                                </ul>
                            </div>
                        </li>

                        <li class="{{ $active == 'users' ? 'active' : '' }}">
                            <a href="{{ route('user.list') }}">
                                <i class="icon-user"></i>
                                <span class="menu-text">Users</span>
                            </a>
                        </li>

                    </ul>
                </div>
            </div>
        </nav>

        <div class="page-content">

            <header class="header">
                <div class="toggle-btns">
                    <a id="toggle-sidebar" href="#"><i class="icon-menu"></i></a>
                    <a id="pin-sidebar" href="#"><i class="icon-menu"></i></a>
                </div>
                <div class="header-items">

                    <!-- Header actions start -->
                    <ul class="header-actions">

                        <li class="dropdown user-settings">
                            <a href="#" id="userSettings" data-toggle="dropdown" aria-haspopup="true">
                                <img src="{{ asset('/storage/' .auth()->guard('admin')->user()->image) }}"
                                    class="user-avatar" alt="Logo">
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userSettings">
                                <div class="header-profile-actions">
                                    <div class="header-user-profile">
                                        <div class="header-user">
                                            <img src="{{ asset('/storage/' .auth()->guard('admin')->user()->image) }}"
                                                alt="Logo">
                                        </div>
                                        <h5 class="text-capitalize">
                                            {{ auth()->guard('admin')->user()->name }}
                                        </h5>
                                        {{ auth()->guard('admin')->user()->username }}
                                    </div>
                                    <a href="{{ route('profile.index') }}">
                                        <i class="icon-user1"></i> My Profile
                                    </a>
                                    <a href="{{ route('profile.edit',auth()->guard('admin')->user()->id) }}">
                                        <i class="icon-vpn_key"></i> Password Change
                                    </a>
                                    <a href="{{ route('admin.logout') }}">
                                        <i class="icon-log-out1"></i> Sign Out
                                    </a>
                                </div>
                            </div>
                        </li>
                    </ul>
                    <!-- Header actions end -->
                </div>
            </header>

            @yield('content')

            <div class="container-fluid">
                <div class="row gutters">
                    <div class="col-12">
                        <div class="footer">All copyrights reserved &copy; {{ date('Y') }}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Sweet alert assets -->
    <link href="{{ asset('admin_assets/alert/sweetalert.css') }}" type="text/css" rel="stylesheet">
    <script src="{{ asset('admin_assets/alert/jquery-3.4.1.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('admin_assets/alert/sweetalert.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('admin_assets/alert/delete-btn.js') }}" type="text/javascript"></script>

    <script src="{{ asset('admin_assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('admin_assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('admin_assets/js/moment.js') }}"></script>
    <script src="{{ asset('admin_assets/vendor/slimscroll/slimscroll.min.js') }}"></script>
    <script src="{{ asset('admin_assets/vendor/slimscroll/custom-scrollbar.js') }}"></script>

    <script src="{{ asset('admin_assets/vendor/datatables/dataTables.min.js') }}"></script>
    <script src="{{ asset('admin_assets/vendor/datatables/dataTables.bootstrap.min.js') }}"></script>

    <script src="{{ asset('admin_assets/vendor/datatables/custom/custom-datatables.js') }}"></script>
    <script src="{{ asset('admin_assets/vendor/datatables/custom/fixedHeader.js') }}"></script>

    <script src="{{ asset('admin_assets/vendor/datatables/buttons.min.js') }}"></script>
    <script src="{{ asset('admin_assets/vendor/datatables/jszip.min.js') }}"></script>
    <script src="../../../cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js') }}"></script>
    <script src="{{ asset('admin_assets/vendor/datatables/vfs_fonts.js') }}"></script>
    <script src="{{ asset('admin_assets/vendor/datatables/html5.min.js') }}"></script>
    <script src="{{ asset('admin_assets/vendor/datatables/buttons.print.min.js') }}"></script>

    <script src="{{ asset('admin_assets/vendor/summernote/summernote-bs4.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('.summernote').summernote({
                height: '300px',
                tabsize: 2
            });
        });
    </script>

    <!-- Toastr -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/css/toastr.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/js/toastr.js"></script>

    <!-- Sweetalert -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script src="{{ asset('admin_assets/js/main.js') }}"></script>
    <script src="{{ asset('admin_assets/js/custom.js') }}"></script>

    @yield('scripts')
</body>

</html>
