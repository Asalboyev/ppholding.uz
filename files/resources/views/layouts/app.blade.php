<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>AdminPanel || Dastyor</title>
    <link rel="shortcut icon" href="{{ asset('images/shortcut.svg') }}">

    <!-- Sweet Alert -->
    <link type="text/css" href="{{ asset('app/sweetalert2.min.css') }}" rel="stylesheet">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">

    <!-- Notyf -->
    <link type="text/css" href="{{ asset('app/notyf.min.css') }}" rel="stylesheet">

{{--  font awesome --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Volt CSS -->
    <link type="text/css" href="{{ asset('app/volt.css') }}" rel="stylesheet">

    <script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>
    <script>
        // CKEDITOR.config.toolbar = [
        // 	{ name: 'document', items : [ 'Undo','Redo'] },
        // ];
        // 	{ name: 'basicstyles', items : [ 'Bold','Italic','Underline','Subscript','Superscript','Format' ] },
        // CKEDITOR.config.filebrowserBrowseUrl = '/browse.php';
        // CKEDITOR.config.extraPlugins = 'uploadimage';
        CKEDITOR.config.filebrowserUploadUrl = "{{ route('upload-image', ['_token' => csrf_token()]) }}";
        CKEDITOR.config.filebrowserUploadMethod = 'form';

    </script>

    <style>
        .table td, .table th {
            white-space: normal;
        }
    </style>

</head>

<body>
<nav class="navbar navbar-dark navbar-theme-primary px-4 col-12 d-lg-none">
    <div class="d-flex align-items-center">
        <button class="navbar-toggler d-lg-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
    </div>
</nav>
<nav id="sidebarMenu" class="sidebar d-lg-block bg-gray-800 text-white collapse" data-simplebar>
    <div class="sidebar-inner px-4 pt-3">
        <div class="user-card d-flex d-md-none align-items-center justify-content-between justify-content-md-center pb-4">
            <div class="collapse-close d-md-none">
                <a href="#sidebarMenu" data-bs-toggle="collapse"
                   data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="true"
                   aria-label="Toggle navigation">
                    <svg class="icon icon-xs" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                </a>
            </div>
        </div>
        <ul class="nav flex-column pt-3 pt-md-0">
            <li class="nav-item">
                <a href="{{ route('admin') }}" class="nav-link d-flex align-items-center">
            <span class="sidebar-icon">
              <img src="{{ asset('images/logo.png') }}" alt="logo">
            </span>
                    <!-- <span class="mt-1 ms-1 sidebar-text">Dastyor</span> -->
                </a>
            </li>
            <li class="nav-item {{ Route::currentRouteName() == 'applications.index' ? 'active' : '' }}">
                <a href="{{ route('applications.index') }}" class="nav-link">
            <span class="sidebar-icon">
{{--              <svg class="icon icon-xs me-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M2 10a8 8 0 018-8v8h8a8 8 0 11-16 0z"></path><path d="M12 2.252A8.014 8.014 0 0117.748 8H12V2.252z"></path></svg>--}}
                <i class="fas fa-sms me-2"></i>
            </span>
                    <span class="sidebar-text">Applications</span>
                </a>
            </li>
            <li class="nav-item {{ Route::currentRouteName() == 'catalog.index' ? 'active' : '' }}">
                <a href="{{ route('catalog.index') }}" class="nav-link">
            <span class="sidebar-icon">
              <svg class="icon icon-xs me-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M4 4a2 2 0 00-2 2v1h16V6a2 2 0 00-2-2H4z"></path><path fill-rule="evenodd" d="M18 9H2v5a2 2 0 002 2h12a2 2 0 002-2V9zM4 13a1 1 0 011-1h1a1 1 0 110 2H5a1 1 0 01-1-1zm5-1a1 1 0 100 2h1a1 1 0 100-2H9z" clip-rule="evenodd"></path></svg>
            </span>
                    <span class="sidebar-text">Catalog</span>
                </a>
            </li>
            <li class="nav-item {{ Route::currentRouteName() == 'products.index' ? 'active' : '' }}">
                <a href="{{ route('products.index') }}" class="nav-link">
            <span class="sidebar-icon">
              <svg class="icon icon-xs me-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M4 4a2 2 0 00-2 2v1h16V6a2 2 0 00-2-2H4z"></path><path fill-rule="evenodd" d="M18 9H2v5a2 2 0 002 2h12a2 2 0 002-2V9zM4 13a1 1 0 011-1h1a1 1 0 110 2H5a1 1 0 01-1-1zm5-1a1 1 0 100 2h1a1 1 0 100-2H9z" clip-rule="evenodd"></path></svg>
            </span>
                    <span class="sidebar-text">Products</span>
                </a>
            </li>
            <li class="nav-item {{ Route::currentRouteName() == 'sertificates.index' ? 'active' : '' }}">
                <a href="{{ route('sertificates.index') }}" class="nav-link">
            <span class="sidebar-icon">
                <i class="fas fa-certificate me-2"></i>
{{--              <svg class="icon icon-xs me-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M4 4a2 2 0 00-2 2v1h16V6a2 2 0 00-2-2H4z"></path><path fill-rule="evenodd" d="M18 9H2v5a2 2 0 002 2h12a2 2 0 002-2V9zM4 13a1 1 0 011-1h1a1 1 0 110 2H5a1 1 0 01-1-1zm5-1a1 1 0 100 2h1a1 1 0 100-2H9z" clip-rule="evenodd"></path></svg>--}}
            </span>
                    <span class="sidebar-text">Sertificates</span>
                </a>
            </li>
            <li class="nav-item {{ Route::currentRouteName() == 'partners.index' ? 'active' : '' }}">
                <a href="{{ route('partners.index') }}" class="nav-link">
            <span class="sidebar-icon">
                <i class="fas fa-handshake me-2"></i>
{{--              <svg class="icon icon-xs me-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M4 4a2 2 0 00-2 2v1h16V6a2 2 0 00-2-2H4z"></path><path fill-rule="evenodd" d="M18 9H2v5a2 2 0 002 2h12a2 2 0 002-2V9zM4 13a1 1 0 011-1h1a1 1 0 110 2H5a1 1 0 01-1-1zm5-1a1 1 0 100 2h1a1 1 0 100-2H9z" clip-rule="evenodd"></path></svg>--}}
            </span>
                    <span class="sidebar-text">Partners</span>
                </a>
            </li>
            <li class="nav-item {{ Route::currentRouteName() == 'photos.index' ? 'active' : '' }}">
                <a href="{{ route('photos.index') }}" class="nav-link">
            <span class="sidebar-icon">
                <i class="fas fa-images me-2"></i>
{{--              <svg class="icon icon-xs me-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M4 4a2 2 0 00-2 2v1h16V6a2 2 0 00-2-2H4z"></path><path fill-rule="evenodd" d="M18 9H2v5a2 2 0 002 2h12a2 2 0 002-2V9zM4 13a1 1 0 011-1h1a1 1 0 110 2H5a1 1 0 01-1-1zm5-1a1 1 0 100 2h1a1 1 0 100-2H9z" clip-rule="evenodd"></path></svg>--}}
            </span>
                    <span class="sidebar-text">Photos</span>
                </a>
            </li>
            <li class="nav-item {{ Route::currentRouteName() == 'news.index' ? 'active' : '' }}">
                <a href="{{ route('news.index') }}" class="nav-link">
            <span class="sidebar-icon">
                <i class="fas fa-clipboard me-2"></i>
{{--              <svg class="icon icon-xs me-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M4 4a2 2 0 00-2 2v1h16V6a2 2 0 00-2-2H4z"></path><path fill-rule="evenodd" d="M18 9H2v5a2 2 0 002 2h12a2 2 0 002-2V9zM4 13a1 1 0 011-1h1a1 1 0 110 2H5a1 1 0 01-1-1zm5-1a1 1 0 100 2h1a1 1 0 100-2H9z" clip-rule="evenodd"></path></svg>--}}
            </span>
                    <span class="sidebar-text">News</span>
                </a>
            </li>
            <li class="nav-item {{ Route::currentRouteName() == 'about.index' ? 'active' : '' }}">
                <a href="{{ route('about.index') }}" class="nav-link">
            <span class="sidebar-icon">
                <i class="fas fa-info-circle me-2"></i>
{{--              <svg class="icon icon-xs me-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M4 4a2 2 0 00-2 2v1h16V6a2 2 0 00-2-2H4z"></path><path fill-rule="evenodd" d="M18 9H2v5a2 2 0 002 2h12a2 2 0 002-2V9zM4 13a1 1 0 011-1h1a1 1 0 110 2H5a1 1 0 01-1-1zm5-1a1 1 0 100 2h1a1 1 0 100-2H9z" clip-rule="evenodd"></path></svg>--}}
            </span>
                    <span class="sidebar-text">About us</span>
                </a>
            </li>
{{--            <li class="nav-item {{ Route::currentRouteName() == 'faqs.index' ? 'active' : '' }}">--}}
{{--                <a href="{{ route('faqs.index') }}" class="nav-link">--}}
{{--            <span class="sidebar-icon">--}}
{{--              <svg class="icon icon-xs me-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M5 4a3 3 0 00-3 3v6a3 3 0 003 3h10a3 3 0 003-3V7a3 3 0 00-3-3H5zm-1 9v-1h5v2H5a1 1 0 01-1-1zm7 1h4a1 1 0 001-1v-1h-5v2zm0-4h5V8h-5v2zM9 8H4v2h5V8z" clip-rule="evenodd"></path></svg>--}}
{{--            </span>--}}
{{--                    <span class="sidebar-text">Faqs</span>--}}
{{--                </a>--}}
{{--            </li>--}}
{{--            <li class="nav-item {{ Route::currentRouteName() == 'works.index' ? 'active' : '' }}">--}}
{{--                <a href="{{ route('works.index') }}" class="nav-link">--}}
{{--            <span class="sidebar-icon">--}}
{{--              <svg class="icon icon-xs me-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M5 4a3 3 0 00-3 3v6a3 3 0 003 3h10a3 3 0 003-3V7a3 3 0 00-3-3H5zm-1 9v-1h5v2H5a1 1 0 01-1-1zm7 1h4a1 1 0 001-1v-1h-5v2zm0-4h5V8h-5v2zM9 8H4v2h5V8z" clip-rule="evenodd"></path></svg>--}}
{{--            </span>--}}
{{--                    <span class="sidebar-text">Our works</span>--}}
{{--                </a>--}}
{{--            </li>--}}
            <li role="separator" class="dropdown-divider mt-4 mb-3 border-gray-700"></li>
            <li class="nav-item {{ Route::currentRouteName() == 'translations.index' ? 'active' : '' }}">
                <a href="{{ route('translations.index') }}" class="nav-link">
            <span class="sidebar-icon">
                <i class="fas fa-language me-2"></i>
{{--              <svg class="icon icon-xs me-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M4 4a2 2 0 00-2 2v1h16V6a2 2 0 00-2-2H4z"></path><path fill-rule="evenodd" d="M18 9H2v5a2 2 0 002 2h12a2 2 0 002-2V9zM4 13a1 1 0 011-1h1a1 1 0 110 2H5a1 1 0 01-1-1zm5-1a1 1 0 100 2h1a1 1 0 100-2H9z" clip-rule="evenodd"></path></svg>--}}
            </span>
                    <span class="sidebar-text">Translations</span>
                </a>
            </li>
            <li class="nav-item {{ Route::currentRouteName() == 'langs.index' ? 'active' : '' }}">
          <span class="nav-link d-flex justify-content-between align-items-center collapsed" data-bs-toggle="collapse" data-bs-target="#submenu-app" aria-expanded="false">
            <span>
              <span class="sidebar-icon">
                <svg class="icon icon-xs me-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M11.49 3.17c-.38-1.56-2.6-1.56-2.98 0a1.532 1.532 0 01-2.286.948c-1.372-.836-2.942.734-2.106 2.106.54.886.061 2.042-.947 2.287-1.561.379-1.561 2.6 0 2.978a1.532 1.532 0 01.947 2.287c-.836 1.372.734 2.942 2.106 2.106a1.532 1.532 0 012.287.947c.379 1.561 2.6 1.561 2.978 0a1.533 1.533 0 012.287-.947c1.372.836 2.942-.734 2.106-2.106a1.533 1.533 0 01.947-2.287c1.561-.379 1.561-2.6 0-2.978a1.532 1.532 0 01-.947-2.287c.836-1.372-.734-2.942-2.106-2.106a1.532 1.532 0 01-2.287-.947zM10 13a3 3 0 100-6 3 3 0 000 6z" clip-rule="evenodd"></path></svg>
              </span>
              <span class="sidebar-text">Settings</span>
            </span>
            <span class="link-arrow">
              <svg class="icon icon-sm" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
            </span>
          </span>
                <div class="multi-level collapse" role="list" id="submenu-app" aria-expanded="false" style="">
                    <ul class="flex-column nav">
                        <li class="nav-item ">
                            <a class="nav-link" href="{{ route('langs.index') }}">
                                <span class="sidebar-text">Languages</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
        </ul>
    </div>
</nav>

<main class="content">

    <nav class="navbar navbar-top navbar-expand navbar-dashboard navbar-dark ps-0 pe-2 pb-0">
        <div class="container-fluid px-0">
            <div class="d-flex justify-content-end w-100" id="navbarSupportedContent">
                <!-- Navbar links -->
                <form action="{{ route('logout') }}" method="post">
                    @csrf
                    <button class="border-0" style="background-color: #fff;padding: 12px 20px;border-radius: 8px;">
                        <svg class="dropdown-icon text-danger me-2" fill="none" width="20" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path></svg>
                        Logout
                    </button>
                </form>
            </div>
        </div>
    </nav>


    @yield('content')

    <footer class="bg-white rounded shadow p-5 mb-4 mt-4">
        <div class="row">
            <div class="col-12 col-md-4 col-xl-6 mb-4 mb-md-0">
                <p class="mb-0 text-center text-lg-start">© <span class="current-year"></span> - <a class="text-primary fw-normal" href="https://spacemos.uz" target="_blank">Spacemos</a></p>
            </div>
            <div class="col-12 col-md-8 col-xl-6 text-center text-lg-start">

            </div>
        </div>
    </footer>
</main>

<!-- Vendor JS -->
<!-- <script src="../../vendor/onscreen/dist/on-screen.umd.min.js"></script> -->

<!-- Smooth scroll -->
<!-- <script src="../../vendor/smooth-scroll/dist/smooth-scroll.polyfills.min.js"></script> -->

<!-- Charts -->
<!-- <script src="../../vendor/chartist/dist/chartist.min.js"></script> -->
<!-- <script src="../../vendor/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.min.js"></script> -->

<!-- Datepicker -->
<!-- <script src="../../vendor/vanillajs-datepicker/dist/js/datepicker.min.js"></script> -->

<!-- Sweet Alerts 2 -->
<script src="{{ asset('app/sweetalert2.all.min.js') }}"></script>

<!-- Moment JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.27.0/moment.min.js"></script>

<!-- Vanilla JS Datepicker -->
<!-- <script src="../../vendor/vanillajs-datepicker/dist/js/datepicker.min.js"></script> -->

<!-- Option 1: Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>

<!-- Notyf -->
<script src="{{ asset('app/notyf.min.js') }}"></script>

<!-- Github buttons -->
<script async defer src="https://buttons.github.io/buttons.js"></script>

<!-- Volt JS -->
<script src="{{ asset('app/volt.js') }}"></script>

<!-- jquery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- my scripts -->
<script src="{{ asset('app/script.js') }}" type="text/javascript">

</script>

<script type="text/javascript">
        @if(Session::has('message'))
    const notyf = new Notyf({
            position: {
                x: 'right',
                y: 'top',
            },
            types: [
                {
                    type: 'info',
                    background: '#0948B3',
                    icon: {
                        className: 'fas fa-times',
                        tagName: 'span',
                        color: '#fff'
                    },
                    dismissible: false
                }
            ]
        });
    notyf.open({
        type: 'info',
        message: '{{ Session::get('message') }}'
    });
    @endif
</script>

@yield('scripts')

</body>

</html>
