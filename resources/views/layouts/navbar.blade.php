<header class="site-header header-nine header_trans-fixed" data-top="992">
    <div class="container">
        <div class="header-inner">
            <div class="toggle-menu">
                <span class="bar"></span>
                <span class="bar"></span>
                <span class="bar"></span>
            </div>
            <!-- /.toggle-menu -->

            <div class="site-mobile-logo">
                <a href="index.html" class="logo">
                    <img src="{{ asset('images/logo-two.png') }}" alt="site logo" class="main-logo" style="">
                    <img src="{{ asset('images/logo-two.png') }}" alt="site logo" class="sticky-logo"
                        style="display: none;">
                </a>
            </div>

            <nav class="site-nav">
                <div class="close-menu">
                    <i class="fa fa-times"></i>
                </div>

                <div class="site-logo">
                    <a href="index.html" class="logo">
                        <img src="{{ asset('images/logo-two.png') }}" alt="site logo" class="main-logo" style="">
                        <img src="{{ asset('images/logo-two.png') }}" alt="site logo" class="sticky-logo"
                            style="display: none;">
                    </a>
                </div>
                <!-- /.site-logo -->

                <div class="menu-wrapper" data-top="992" style="padding-top: 0px;">
                    <ul class="site-main-menu">
                        <li><a href="#home">{{ __('Home') }}</a></li>
                        <li><a href="#about">{{ __('About') }}</a></li>
                        <li><a href="#clients">{{ __('Clients') }}</a></li>
                        <li><a href="#services">{{ __('Services') }}</a></li>
                        <li><a href="#work">{{ __('Work') }}</a></li>
                        <li><a href="#contact">{{ __('Contact') }}</a></li>
                    </ul>

                    <div class="nav-right">
                        <a href="signin.html" class="nav-btn" data-toggle="modal"
                            data-target="#ContactDemo">{{ __('Get Demo') }}</a>
                    </div>
                </div>
                <!-- /.menu-wrapper -->

            </nav><!-- /.site-nav -->
        </div><!-- /.header-inner -->
    </div><!-- /.container -->
</header>
