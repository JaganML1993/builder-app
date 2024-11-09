<!DOCTYPE html>
<html lang="en">


<!-- index.html  21 Nov 2019 03:44:50 GMT -->

<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Flatworld Builder - Admin</title>
  <!-- General CSS Files -->
  <link rel="stylesheet" href="{{asset('assets/css/app.min.css')}}">
  <link rel="stylesheet" href="{{asset('assets/bundles/dropzonejs/dropzone.css')}}">
  <link rel="stylesheet" href="{{asset('assets/bundles/izitoast/css/iziToast.min.css')}}">
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
  {{-- <link rel="stylesheet" href="{{asset('assets/bundles/summernote/summernote-bs4.css')}}"> --}}
  <link rel="stylesheet" href="{{asset('assets/bundles/jquery-selectric/selectric.css')}}">
  <link rel="stylesheet" href="{{asset('assets/bundles/bootstrap-tagsinput/dist/bootstrap-tagsinput.css')}}">
  <!-- Template CSS -->
  <link rel="stylesheet" href="{{asset('assets/bundles/datatables/datatables.min.css')}}">
  <link rel="stylesheet" href="{{asset('assets/bundles/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
  <link rel="stylesheet" href="{{asset('assets/css/components.css')}}">
  <!-- Custom style CSS -->
  <link rel="stylesheet" href="{{asset('assets/css/custom.css')}}">
  <link rel='shortcut icon' type='image/x-icon' href="{{asset('assets/img/fws-fav.png')}}" />

<style>
  .dropdown.active > a {
  background-color: #c20e05 !important;
  color: white !important;
}

.modal-backdrop {
  z-index: -20 !important;
}
.modal-dialog {
  margin: auto !important;
    margin-top: 8% !important;
}

</style>
</head>

<body>
  <div class="loader"></div>
  <div id="app">
    <div class="main-wrapper main-wrapper-1">
      <div class="navbar-bg"></div>
      <nav class="navbar navbar-expand-lg main-navbar sticky">
        <div class="form-inline mr-auto">
          <ul class="navbar-nav mr-3">
            <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg
									collapse-btn"> <i data-feather="align-justify"></i></a></li>
            <li><a href="#" class="nav-link nav-link-lg fullscreen-btn">
                <i data-feather="maximize"></i>
              </a></li>
            <li>
              <form class="form-inline mr-auto">
                {{-- <div class="search-element">
                  <input class="form-control" type="search" placeholder="Search" aria-label="Search" data-width="200">
                  <button class="btn" type="submit">
                    <i class="fas fa-search"></i>
                  </button>
                </div> --}}
              </form>
            </li>
          </ul>
        </div>
        <ul class="navbar-nav navbar-right">


          <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user"> <img alt="image" src="{{asset('assets/img/fws-fav.png')}}" class="user-img-radious-style"> <span class="d-sm-none d-lg-inline-block"></span></a>
            <div class="dropdown-menu dropdown-menu-right pullDown">
              <div class="dropdown-title">Hello {{Auth::user()->name}}</div>
              {{-- <a href="profile.html" class="dropdown-item has-icon"> <i class="far
										fa-user"></i> Profile
              </a>  --}}
              <div class="dropdown-divider"></div>
              {{-- <a href="auth-login.html" class="dropdown-item has-icon text-danger"> <i class="fas fa-sign-out-alt"></i>
                Logout
              </a> --}}
              <a href="#" onclick="event.preventDefault();document.getElementById('logout-form').submit();" class="dropdown-item has-icon text-danger"> <i class="fas fa-sign-out-alt"></i> Logout </a>

              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                {{ csrf_field() }}
              </form>
            </div>
          </li>
        </ul>
      </nav>
      <div class="main-sidebar sidebar-style-2">
        <aside id="sidebar-wrapper">
          <div class="sidebar-brand">
            <a href="{{ route('dashboard') }}">
              <span class="logo-name">
                <img alt="image" src="{{ asset('assets/img/fws-logo-white.webp') }}" class="header-logo" />
              </span>
            </a>
          </div>
          <ul class="sidebar-menu">
            <li class="menu-header">Main</li>
            <li class="dropdown {{ request()->routeIs('dashboard') ? 'active' : '' }}">
              <a href="{{ route('dashboard') }}" class="nav-link">
                <i data-feather="home"></i><span>Dashboard</span>
              </a>
            </li>
            @if (Auth::user()->role == 1)
            <li class="dropdown {{ request()->routeIs('admin.index') ? 'active' : '' }}">
              <a href="{{ route('admin.index') }}" class="nav-link">
                <i data-feather="user"></i><span>Admin</span>
              </a>
            </li>
            @endif
            <li class="dropdown {{ request()->routeIs('admin.service.index') ? 'active' : '' }}">
              <a href="{{ route('admin.service.index') }}" class="nav-link">
                <i data-feather="file"></i><span>Service Template</span>
              </a>
            </li>
            <li class="dropdown {{ request()->routeIs('admin.case-study.index') ? 'active' : '' }}">
              <a href="{{ route('admin.case-study.index') }}" class="nav-link">
                <i data-feather="file"></i><span>Case Study Template</span>
              </a>
            </li>
            <li class="dropdown {{ request()->routeIs('admin.article.index') ? 'active' : '' }}">
              <a href="{{ route('admin.article.index') }}" class="nav-link">
                <i data-feather="file"></i><span>Article Template</span>
              </a>
            </li>
          </ul>
          <ul class="sidebar-menu">
            <li class="menu-header">Settings</li>
            <li class="dropdown {{ request()->routeIs('admin.service-list.index') ? 'active' : '' }}">
              <a href="{{ route('admin.service-list.index') }}" class="nav-link">
                <i data-feather="file"></i><span>Folder</span>
              </a>
            </li>
            <li class="dropdown {{ request()->routeIs('admin.sub-service-list.index') ? 'active' : '' }}">
              <a href="{{ route('admin.sub-service-list.index') }}" class="nav-link">
                <i data-feather="file"></i><span>Sub Folder</span>
              </a>
            </li>
            <li class="dropdown {{ request()->routeIs('admin.sub-sub-service-list.index') ? 'active' : '' }}">
              <a href="{{ route('admin.sub-sub-service-list.index') }}" class="nav-link">
                <i data-feather="file"></i><span>Sub Sub Folder</span>
              </a>
            </li>
          </ul>
        </aside>
        
      </div>
      <!-- Main Content -->
      @yield('content')

      <footer class="main-footer">
        {{-- <div class="footer-left">
          <a href="templateshub.net">Templateshub</a></a>
        </div> --}}
        <div class="footer-right">
        </div>
      </footer>
    </div>
  </div>


  <!-- General JS Scripts -->
  <script src="{{asset('assets/js/app.min.js')}}"></script>
  <script src="{{asset('assets/bundles/dropzonejs/min/dropzone.min.js')}}"></script>
  <script src="{{asset('assets/bundles/izitoast/js/iziToast.min.js')}}"></script>
  <!-- Page Specific JS File -->
  <script src="{{asset('assets/js/page/toastr.js')}}"></script>
  <!-- JS Libraies -->
  <script src="{{asset('assets/bundles/apexcharts/apexcharts.min.js')}}"></script>
  <!-- Page Specific JS File -->
  <script src="{{asset('assets/js/page/index.js')}}"></script>
  <script src="{{asset('assets/bundles/summernote/summernote-bs4.js')}}"></script>
  <script src="{{asset('assets/bundles/jquery-selectric/jquery.selectric.min.js')}}"></script>
  <script src="{{asset('assets/bundles/upload-preview/assets/js/jquery.uploadPreview.min.js')}}"></script>
  <script src="{{asset('assets/bundles/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js')}}"></script>
  <!-- Page Specific JS File -->
  <script src="{{asset('assets/js/page/create-post.js')}}"></script>
  <!-- Template JS File -->
  <!-- JS Libraies -->
  <script src="{{asset('assets/bundles/datatables/datatables.min.js')}}"></script>
  <script src="{{asset('assets/bundles/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js')}}"></script>
  <script src="{{asset('assets/bundles/jquery-ui/jquery-ui.min.js')}}"></script>

  <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
  <!-- Page Specific JS File -->
  <script src="{{asset('assets/js/page/datatables.js')}}"></script>
  <script src="{{asset('assets/js/scripts.js')}}"></script>
  <!-- Custom JS File -->
  <script src="{{asset('assets/js/custom.js')}}"></script>
  <script>
    @if(Session::has('message'))
    iziToast.success({
      title: 'Message',
      message: "{{ session('message') }}",
      position: 'topRight'
    });

    @endif

    @if(Session::has('error'))
    toastr.options = {
      "closeButton": true,
      "progressBar": true
    }
    toastr.error("{{ session('error') }}");
    @endif

    @if(Session::has('info'))
    toastr.options = {
      "closeButton": true,
      "progressBar": true
    }
    toastr.info("{{ session('info') }}");
    @endif

    @if(Session::has('warning'))
    toastr.options = {
      "closeButton": true,
      "progressBar": true
    }
    toastr.warning("{{ session('warning') }}");
    @endif
  </script>

</body>


<!-- index.html  21 Nov 2019 03:47:04 GMT -->

</html>