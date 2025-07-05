<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="admin/assets/img/Gokhale-logo.png">
  <link rel="icon" type="image/png" href="admin/assets/img/Gokhale-logo.png">
  <title>
    Event Admin Panel
  </title>
  <!-- Fonts and icons -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700,900" />
  <!-- Nucleo Icons -->
  <link href="{{ asset('admin/assets/css/nucleo-icons.css') }}" rel="stylesheet" />
  <link href="{{ asset('admin/assets/css/nucleo-svg.css') }}" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <!-- Material Icons -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@24,400,0,0" />
  <!-- CSS Files -->
  <link id="pagestyle" href="{{ asset('admin/assets/css/material-dashboard.css?v=3.2.0') }}" rel="stylesheet" />
  <!-- Summernote CSS -->
    <link rel="stylesheet" href="{{ asset('assets/summernote/summernote-bs4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/summernote/summernote-lite.min.css') }}">
    <link href="{{ asset('admin/assets/summernotes/summernote-lite.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" />


    <!-- Include jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


<!-- Summernote Lite (No Bootstrap needed) -->
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>

</head>

<body class="g-sidenav-show  bg-gray-100">

  <aside class="sidenav navbar navbar-vertical navbar-expand-xs border-radius-lg fixed-start ms-2  bg-white my-2" id="sidenav-main">
    <div class="sidenav-header">
      <i class="fas fa-times p-3 cursor-pointer text-dark opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
      {{-- <a class="navbar-brand px-4 py-3 m-0" href="" >
        <img src="{{ asset('admin/assets/img/logo-2.png') }}" class="navbar-brand-img" width="100" height="50" alt="main_logo">

      </a> --}}
      <a class="navbar-brand px-4 py-3 m-0" href="#" style="text-align: center;">
        <img src="{{asset('admin/assets/img/Gokhale-logo.png')}}"
             class="navbar-brand-img"
             style="width: 100px; height: auto; max-width: none; max-height: none;"
             alt="main_logo">
    </a>
    </div>
    <hr class="horizontal dark mt-0 mb-2">
    <div class="collapse navbar-collapse w-auto" id="sidenav-collapse-main" >
        <ul class="navbar-nav" style="margin-bottom: 30px !important;">
            <li class="nav-item">
                <a class="nav-link {{ Request::is('/event-panel') ? 'active bg-gradient-dark text-white' : 'text-dark' }} " style="font-size: 16px;"   href="{{ route('Event.Dashboard') }}">
                    <i class="material-symbols-rounded opacity-5">dashboard</i>
                    <span class="nav-link-text ms-1">Dashboard</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link {{ Request::is('Event.BookedHalls') ? 'active bg-gradient-dark text-white' : 'text-dark' }} " style="font-size: 16px;"   href="{{ route('Event.BookedHalls') }}">
                    <i class="material-symbols-rounded opacity-5">dashboard</i>
                    <span class="nav-link-text ms-1">Booked Halls</span>
                </a>
            </li>


            <li class="nav-item">
                <a class="nav-link {{ Request::is('Event.BookedHalls') ? 'active bg-gradient-dark text-white' : 'text-dark' }} " style="font-size: 16px;"   href="{{ route('Item.Table') }}">
                    <i class="material-symbols-rounded opacity-5">dashboard</i>
                    <span class="nav-link-text ms-1">Event Items</span>
                </a>
            </li>

            <li class="mt-3" style="padding: 20px;">
                <form id="logout-form" action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="btn w-100 bg-gradient-danger text-white fw-bold py-2" style="border-radius: 8px; transition: 0.3s;">
                        <i class="fa fa-sign-out"></i> Logout
                    </button>
                </form>
            </li>
        </ul>
    </div>

    {{-- <div class="sidenav-footer position-absolute w-100 bottom-0 ">
      <div class="mx-3">

        <form id="logout-form" action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="btn bg-gradient-dark w-100">Logout</button>
        </form>
      </div>
    </div> --}}

  </aside>

  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
    <div class="p-3">
        @if(session('success'))
            <div class="alert alert-success" id="successMessage">
                {{ session('success') }}
            </div>
        @endif
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            setTimeout(function() {
                $("#successMessage").fadeOut('slow');
            }, 3000);
        });
    </script>
