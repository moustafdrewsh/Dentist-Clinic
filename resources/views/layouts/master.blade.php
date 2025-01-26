<!doctype html>
<html lang="en" dir="ltr" data-nav-layout="vertical" data-theme-mode="light" data-header-styles="light"
    data-menu-styles="dark">

    <!-- include mainhead.html"-->

    @include('layouts.mainhead')

    <body class="app sidebar-mini">

        <!-- include switcher.html"-->
        @include('layouts.switcher')

        <!-- include loader.html"-->
        @include('layouts.loader')

        <!-- PAGE -->
        <div class="page">
            <div class="page-main">

                <!-- include header.html"-->
                @include('layouts.header')

                <!-- include sidebar.html"-->
                @include('layouts.sidebar')

                <!--app-content open-->
                <div class="main-content app-content mt-0">

                    <!-- PAGE-HEADER -->
                    @yield('page-header')
                    <!-- PAGE-HEADER END -->

                    <!-- CONTAINER -->
                    <div class="main-container container-fluid">

                        <!-- Start::Row-1 -->
                        <div class="row">
                            @yield('content')
                        </div>
                        <!-- End::Row-1 -->

                    </div>
                    <!-- CONTAINER END -->
                </div>
                <!--app-content close-->

            </div>

            <!-- include headersearch_modal.html"-->
            @include('layouts.headersearch_modal')

            <!-- include footer.html"-->
            @include('layouts.footer')

        </div>
        <!-- Scroll To Top -->
        <div class="scrollToTop">
            <span class="arrow"><i class="fa fa-angle-up fs-20"></i></span>
        </div>
        <!-- Scroll To Top -->

        <div id="responsive-overlay"></div>
        <!-- include commonjs.html"-->
        @include('layouts.commonjs')

    </body>

</html>
