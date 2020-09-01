@include('front.includes.head')
<body id="index" class="lang-ar lang-rtl country-gb currency-gbp layout-full-width page-index tax-display-enabled">
<main id="main-site" class="displayhomenovthree">
    <header id="header" class="header-3 sticky-menu">
        @include('front.includes.header-mobile')
        @include('front.includes.header-top')
        @include('front.includes.header-center')
        @include('front.includes.header-bottom')
    </header>

    <div id="header-sticky">
        <div class="container">
            <div class="row align-items-center justify-content-between">
                <div class="d-flex align-items-center col-xl-3 col-md-3">
                    <div class="contentstickynew_verticalmenu"></div>
                    <div class="contentstickynew_logo"></div>
                </div>
                <div class="contentstickynew_search col-xl-7 col-md-6"></div>
                <div class="contentstickynew_group d-flex justify-content-end col-xl-2 col-md-3"></div>
            </div>
        </div>
    </div>
    <aside id="notifications">
        <div class="container">



        </div>
    </aside>


    <div id="wrapper-site">
        <div id="content-wrapper" class="full-width">
              @yield('content')
        </div>
    </div>

      @include('front.includes.footer')

