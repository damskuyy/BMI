<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>BMI Admin - @yield('title')</title>
    <link rel="shortcut icon" type="image/x-icon" href="fe/img/logo/logo-bmi-kotak.png">
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <!-- Admin CSS -->
    <link rel="stylesheet" href="{{ asset('be/css/app.css') }}">
    <!-- Sweet Alert -->
    <script src="https://lipis.github.io/bootstrap-sweetalert/dist/sweetalert.js"></script>
    <link rel="stylesheet" href="https://lipis.github.io/bootstrap-sweetalert/dist/sweetalert.css">
</head>
<body>
    <div class="wrapper">
        <!-- Sidebar -->
        <nav id="sidebar">
            <div class="sidebar-header">
                <img src="{{ asset('fe/img/logo/logo-bmi-kotak.png') }}" alt="BMI Logo" class="logo">
                <!-- Mobile minimize button: hides sidebar on small screens -->
                <button id="sidebarMinimizeMobile" class="mobile-minimize d-lg-none" aria-label="Minimize sidebar">
                    <i class="fas fa-chevron-left"></i>
                </button>
            </div>

            <ul class="list-unstyled components">
                <li class="{{ Request::is('dashboard') ? 'active' : '' }}">
                    <a href="{{ route('dashboard.index') }}">
                        <i class="fas fa-tachometer-alt"></i> Dashboard
                    </a>
                </li>
                <li class="{{ Request::is('slider_be*') ? 'active' : '' }}">
                    <a href="{{ route('slider_be.index') }}">
                        <i class="fas fa-images"></i> Hero Section
                    </a>
                </li>
                <li class="{{ Request::is('member_be*') ? 'active' : '' }}">
                    <a href="{{ route('member_be.index') }}">
                        <i class="fas fa-users"></i> Keanggotaan
                    </a>
                </li>
                <li class="{{ Request::is('product_be*') ? 'active' : '' }}">
                    <a href="{{ route('product_be.index') }}">
                        <i class="fas fa-box"></i> Products
                    </a>
                </li>
                <li class="{{ Request::is('gallery_be*') ? 'active' : '' }}">
                    <a href="{{ route('gallery_be.index') }}">
                        <i class="fas fa-photo-video"></i> Gallery
                    </a>
                </li>
                <li class="{{ Request::is('blog_be*') ? 'active' : '' }}">
                    <a href="{{ route('blog_be.index') }}">
                        <i class="fas fa-newspaper"></i> Blog
                    </a>
                </li>
                <li class="{{ Request::is('users*') ? 'active' : '' }}">
                    <a href="{{ route('users.index') }}">
                        <i class="fas fa-user-cog"></i> Users
                    </a>
                </li>
            </ul>
        </nav>

        <!-- Page Content -->
        <div id="content">
            <!-- Top Navbar -->
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">
                    <button type="button" id="sidebarCollapse" class="btn">
                        <i class="fas fa-bars"></i>
                    </button>

                    <!-- Branding in Center -->
                    <div class="navbar-brand-center">
                        <h5 class="brand-text">Bogor Manufaktur Indonesia</h5>
                    </div>

                    <div class="ml-auto user-info dropdown">
                        @php $userAvatarPath = public_path('storage/' . (Auth::user()->foto ?? '')); @endphp
                        <div class="user-avatar-wrapper" data-bs-toggle="dropdown" style="cursor: pointer; display: flex; align-items: center; gap: 10px;">
                            <img src="{{ (Auth::user()->foto && file_exists($userAvatarPath)) ? '/storage/' . Auth::user()->foto : asset('fe/img/icon/user.png') }}" alt="User Avatar" class="avatar">
                            <div class="user-text-wrapper">
                                <span class="username">{{ 'Howdy, ' . Auth::user()->name }}</span>
                                <i class="fas fa-chevron-down"></i>
                            </div>
                        </div>
                        
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li><a class="dropdown-item" href="{{ route('users.edit', Auth::user()) }}"><i class="fas fa-user-edit"></i> Edit Profile</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li>
                                <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                                    @csrf
                                    <button type="submit" class="dropdown-item" style="background: none; border: none; text-align: left; width: 100%;">
                                        <i class="fas fa-sign-out-alt"></i> Logout
                                    </button>
                                </form>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>

            <!-- Main Content -->
            <main class="container-fluid py-4">
                @yield('content')
            </main>
        </div>
    </div>

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        $(document).ready(function() {
            let sidebarCollapsed = false;
            
            $('#sidebarCollapse').on('click', function() {
                $('#sidebar').toggleClass('active');
                $('#content').toggleClass('expanded');
                sidebarCollapsed = !sidebarCollapsed;
            });

            // Mobile minimize button toggles the sidebar as well
            $('#sidebarMinimizeMobile').on('click', function() {
                $('#sidebar').toggleClass('active');
                $('#content').toggleClass('expanded');
                sidebarCollapsed = !sidebarCollapsed;
            });

            // Close sidebar when tapping outside on mobile
            $(document).on('click', function(e) {
                try {
                    if ($(window).width() <= 768) {
                        var $sidebar = $('#sidebar');
                        // On mobile, sidebar is shown when it has .active (see mobile CSS)
                        if ($sidebar.hasClass('active')) {
                            if ($(e.target).closest('#sidebar').length === 0 && $(e.target).closest('#sidebarCollapse').length === 0 && $(e.target).closest('#sidebarMinimizeMobile').length === 0) {
                                $sidebar.removeClass('active');
                                $('#content').removeClass('expanded');
                                sidebarCollapsed = true;
                            }
                        }
                    }
                } catch(err) {}
            });

            // Adjust main content padding-top to match navbar height (prevents overlap)
            function adjustMainPadding() {
                try {
                    var $nav = $('#content > nav.navbar');
                    var $main = $('#content > main');
                    if ($nav.length && $main.length) {
                        // measure nav height including borders
                        var navHeight = Math.ceil($nav.outerHeight());
                        // set CSS variable on #content so the stylesheet can use it
                        try {
                            document.getElementById('content').style.setProperty('--navbar-height', navHeight + 'px');
                        } catch (ex) {}
                        // also set body padding as a robust fallback so nothing is overlapped
                        try {
                            document.body.style.setProperty('padding-top', navHeight + 'px');
                        } catch (ex) {}
                        // also set inline padding as a fallback
                        $main.css('padding-top', navHeight + 'px');
                    }
                } catch(e) {}
            }
            // Run on ready, load, resize and after toggles
            $(window).on('load resize', adjustMainPadding);
            // Ensure we also run on DOM ready to set padding as soon as possible
            adjustMainPadding();
            // run after toggles
            $('#sidebarCollapse, #sidebarMinimizeMobile').on('click', function(){
                // small timeout to allow CSS transitions to settle
                setTimeout(adjustMainPadding, 140);
            });

            // Also adjust after any bootstrap collapse/expand that might affect navbar height
            $(document).on('shown.bs.collapse hidden.bs.collapse', adjustMainPadding);

            // Toggle dropdown icon rotation
            $('.user-info').on('show.bs.dropdown', function() {
                $(this).addClass('show');
            });
            
            $('.user-info').on('hide.bs.dropdown', function() {
                $(this).removeClass('show');
            });
        });
    </script>
    @stack('scripts')
</body>
</html>