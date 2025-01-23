<!DOCTYPE html>
<html lang="en">

<head>
  <script src="https://kit.fontawesome.com/332610fa08.js" crossorigin="anonymous"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

  <style>
    .error {
      color: red;
    }
    .gra{
      background-image: radial-gradient( circle farthest-corner at 48.4% 47.5%,  rgba(122,183,255,1) 0%, rgba(21,83,161,1) 90% );      background-position: center;
      background-size: cover;
    }
  </style>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>MyBank</title>
  <link rel="stylesheet" href="{{url('assets/vendors/feather/feather.css')}}">
  <link rel="stylesheet" href="{{url('assets/vendors/mdi/css/materialdesignicons.min.css')}}">
  <link rel="stylesheet" href="{{url('assets/vendors/ti-icons/css/themify-icons.css')}}">
  <link rel="stylesheet" href="{{url('assets/vendors/typicons/typicons.css')}}">
  <link rel="stylesheet" href="{{url('assets/vendors/simple-line-icons/css/simple-line-icons.css')}}">
  <link rel="stylesheet" href="{{url('assets/vendors/css/vendor.bundle.base.css')}}">
  <link rel="stylesheet" href="{{url('assets/vendors/datatables.net-bs4/dataTables.bootstrap4.css')}}">
  <link rel="stylesheet" href="{{url('assets/js/select.dataTables.min.css')}}">
  <link rel="stylesheet" href="{{url('assets/css/vertical-layout-light/style.css')}}">
  <link rel="stylesheet" href="{{url('assets/css/index.css')}}">
  <link rel="shortcut icon" href="{{url('assets/images/favicon.png')}}" />
</head>

<body>
  <div class="container-scroller">
    <nav class="navbar default-layout col-lg-12 col-12 p-0 fixed-top d-flex align-items-top flex-row">
      <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-start">
        <div class="me-3">
          <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-bs-toggle="minimize">
            <span class="icon-menu"></span>
          </button>
        </div>
        <div>
          <a class="navbar-brand brand-logo" >
            <img src="{{url('assets/images/logol.png')}}" alt="logo" />
          </a>
          <a class="navbar-brand brand-logo-mini" >
          </a>
        </div>
      </div>
      <div class="navbar-menu-wrapper back border d-flex" style="background-color: #0739a8; background-image: linear-gradient(180deg, #0739a8 0%, #efeff7 75%); background-color: #002f9a; background-image: linear-gradient(90deg, #002f9a 0%, #e6e6e6 100%);">
       
        <ul class="navbar-nav ms-auto">                
          <li class="nav-item d-none d-lg-block">
            <div id="datepicker-popup" class="input-group date datepicker navbar-date-picker">
              <span class="input-group-addon input-group-prepend border-right">
                <span class="icon-calendar input-group-text calendar-icon"></span>
              </span>
              <input type="text" class="form-control">
            </div>
          </li>
          <li class="nav-item dropdown d-none d-lg-block user-dropdown">
            <i class="menu-icon mdi mdi mdi-account-outline h3"></i>
            @if(Auth::guard('admin')->check())
            <span>{{Auth::guard('admin')->user()->name}}</span>
            @elseif(Auth::guard('web')->check())
            <span>{{Auth::guard('web')->user()->name}}</span>
            @endif
          </li>
        </ul>
      </div>
    </nav>

    <div class="container-fluid page-body-wrapper">
      <div class=""></div>
    
      <nav class="sidebar sidebar-offcanvas " id="sidebar" font-weight='500'>
        <ul class="nav">
          <li class="nav-item">
            <a class="nav-link"
              href="{{(Auth::guard('admin')->check()) ? url('admin_dashboard') : url('user_dashboard')}} ">
              <i class="mdi mdi-grid-large menu-icon"></i>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>

          @if(Auth::guard('admin')->check())
          
            @if(Auth::guard('admin')->user()->name == 'Fahmitha')
          
            <li class="nav-item">
              <a class="nav-link" data-bs-toggle="collapse" href="#form-elements" aria-expanded="false"
                aria-controls="form-elements">
                <i class="mdi mdi-account-key menu-icon "></i>
                <span class="menu-title">Admin</span>
                <i class="menu-arrow"></i>
              </a>
              <div class="collapse" id="form-elements">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"><a class="nav-link" href="/addadmin">Add Admin</a></li>
                    <li class="nav-item"><a class="nav-link" href="/viewAdmin">View Admin</a></li>
                </ul>
              </div>
            </li>
            @endif

            <li class="nav-item">
              <a class="nav-link" data-bs-toggle="collapse" href="#charts" aria-expanded="false" aria-controls="charts">
              <i class="mdi mdi-account-multiple menu-icon"></i>
                <span class="menu-title">User</span>
                <i class="menu-arrow"></i>
              </a>
              <div class="collapse" id="charts">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item"> <a class="nav-link" href="/adduser">Add User</a></li>
                  <li class="nav-item"> <a class="nav-link" href="viewUser">View User</a></li>
                </ul>
              </div>
            </li>
          @endif

          @if(Auth::guard('admin')->check() && Auth::guard('admin')->user()->name != 'Fahmitha')

          <li class="nav-item">
            <a class="nav-link" href="/transaction">
              <i class="menu-icon mdi mdi-card-text-outline"></i>
              <span class="menu-title">All Transaction</span>
            </a>
          </li>
          @endif

          @if(Auth::guard('web')->check())

          <li class="nav-item">
            <a class="nav-link" href="/view_transaction">
              <i class="menu-icon mdi mdi-card-text-outline"></i>
              <span class="menu-title">Your Transaction</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/pay">
              <i class="mdi  mdi-currency-inr menu-icon"></i>
              <span class="menu-title">Make Payment</span>
            </a>
          </li>

          @endif

          <li class="nav-item">
            <a class="nav-link" href="{{ Auth::guard('admin')->check() ? url('/admin_logout') : url('user_logout') }}"
              aria-expanded="false" aria-controls="auth">
              <i class="menu-icon mdi mdi mdi-logout"></i>
              <span class="menu-title">Log Out</span>
            </a>
          </li>
        </ul>
      </nav>
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-sm-12">
              <div class="home-tab">
