<div class="left-side-menu">
    <!-- LOGO -->
    <a href="index.html" class="logo text-center logo-light">
                    <span class="logo-lg">
                        <img src="{{asset('logo.png')}}" alt="" height="64">
                    </span>
        <span class="logo-sm">
                        <img src="{{asset('logo.png')}}" alt="" height="64">
                    </span>
    </a>
    <div class="h-100" id="left-side-menu-container" data-simplebar>

        <!--- Sidemenu -->
        @include('admin.layouts.side-menu')
        <!-- End Sidebar -->

        <div class="clearfix"></div>
    </div>
    <!-- Sidebar -left -->

</div>