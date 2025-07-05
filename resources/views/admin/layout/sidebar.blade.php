<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="admin/assets/img/Gokhale-logo.png">
  <link rel="icon" type="image/png" href="admin/assets/img/Gokhale-logo.png">
  <title>
    Hall Booking Admin Panel
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
                <a class="nav-link {{ Request::is('home') ? 'active bg-gradient-dark text-white' : 'text-dark' }} " style="font-size: 16px;"   href="{{ url('/home') }}">
                    <i class="material-symbols-rounded opacity-5">dashboard</i>
                    <span class="nav-link-text ms-1">Dashboard</span>
                </a>
            </li>

            {{-- <li class="nav-item">
                <a class="nav-link {{ Request::is('home') ? 'active' : 'text-dark' }}"
                   style="font-size: 16px; background-color: {{ Request::is('home') ? '#70533A' : 'transparent' }}; color: {{ Request::is('home') ? 'white' : 'black' }}0;" href="{{ url('/home') }}">
                    <i class="material-symbols-rounded opacity-5">dashboard</i>
                    <span class="nav-link-text ms-1">Dashboard</span>
                </a>
            </li> --}}




            <li class="nav-item">
                <a class="nav-link {{ Request::is('landing') ? 'active bg-gradient-dark text-white' : 'text-dark' }}" style="font-size: 16px;"  href="{{route('Landing.Table')}}">
                    <i class="material-symbols-rounded opacity-5">info</i>
                    <span class="nav-link-text ms-1">Landing Page</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link {{ Request::is('about') ? 'active bg-gradient-dark text-white' : 'text-dark' }}" style="font-size: 16px;"  href="{{route('About.Table')}}">
                    <i class="material-symbols-rounded opacity-5">info</i>
                    <span class="nav-link-text ms-1">About us</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link {{ Request::is('facilitie') ? 'active bg-gradient-dark text-white' : 'text-dark' }}" style="font-size: 16px;"  href="{{route('Facilitie.Table')}}">
                    <i class="material-symbols-rounded opacity-5">info</i>
                    <span class="nav-link-text ms-1">Facilities</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link {{ Request::is('team') ? 'active bg-gradient-dark text-white' : 'text-dark' }}" style="font-size: 16px;"  href="{{ url('/team') }}">
                    <i class="material-symbols-rounded opacity-5">groups</i>
                    <span class="nav-link-text ms-1">Teams</span>
                </a>
            </li>

            {{-- <li class="nav-item">
                <a class="nav-link {{ Request::is('types') ? 'active bg-gradient-dark text-white' : 'text-dark' }}" style="font-size: 16px;"  href="{{route('Type.page')}}">
                    <i class="material-symbols-rounded opacity-5">category</i>
                    <span class="nav-link-text ms-1">Types</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link {{ Request::is('product') ? 'active bg-gradient-dark text-white' : 'text-dark' }}" style="font-size: 16px;"  href="{{ route('product.Table') }}">
                    <i class="material-symbols-rounded opacity-5">auto_awesome</i>
                    <span class="nav-link-text ms-1">Products</span>
                </a>
            </li> --}}

            <li class="nav-item">
                <a class="nav-link {{ Request::is('testimonials') ? 'active bg-gradient-dark text-white' : 'text-dark' }}" style="font-size: 16px;"  href="{{route('Test.Table')}}">
                    <i class="material-symbols-rounded opacity-5">format_quote</i>
                    <span class="nav-link-text ms-1">Testimonials</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link {{ Request::is('image') ? 'active bg-gradient-dark text-white' : 'text-dark' }}" style="font-size: 16px;"  href="{{route('Image.Table')}}">
                    <i class="material-symbols-rounded opacity-5">groups</i>
                    <span class="nav-link-text ms-1">Gallery</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::is('ourfacilitie') ? 'active bg-gradient-dark text-white' : 'text-dark' }}" style="font-size: 16px;"  href="{{route('OurFacilitie.Table')}}">
                    <i class="material-symbols-rounded opacity-5">settings_suggest</i>
                    <span class="nav-link-text ms-1">Our Facilitie</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link {{ Request::is('accessories') ? 'active bg-gradient-dark text-white' : 'text-dark' }}" style="font-size: 16px;"  href="{{route('Accessorie.Table')}}">
                    <i class="material-symbols-rounded opacity-5">category</i>
                    <span class="nav-link-text ms-1">Accessories</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link {{ Request::is('adminhalls') ? 'active bg-gradient-dark text-white' : 'text-dark' }}" style="font-size: 16px;"  href="{{route('halls.index')}}">
                    <i class="material-symbols-rounded opacity-5">auto_awesome</i>
                    <span class="nav-link-text ms-1">Halls</span>
                </a>
            </li>


            <li class="nav-item">
                <a id="toggleMenu" class="nav-link text-dark" style="font-size: 16px; cursor: pointer; user-select: none;">
                    <i class="material-symbols-rounded opacity-5">article</i>
                    <span class="nav-link-text ms-1">Key Features /</br> Ideal For</span>
                </a>

                <!-- Collapsible Section -->
                <div id="subMenu" style="display: none; padding-left: 20px; margin-top: 10px;">
                    <a class="btn btn-outline-dark d-block mb-2" href="{{ route('Ideal.Table') }}">Ideal For</a>
                    <a class="btn btn-outline-dark d-block" href="{{ route('Key.Table') }}">Key Features</a>
                </div>
            </li>

            <!-- JavaScript to Toggle Visibility -->
            <script>
                document.getElementById("toggleMenu").addEventListener("click", function() {
                    var subMenu = document.getElementById("subMenu");
                    subMenu.style.display = (subMenu.style.display === "none" || subMenu.style.display === "") ? "block" : "none";
                });
            </script>





            <li class="nav-item">
                <a class="nav-link {{ Request::is('page') ? 'active bg-gradient-dark text-white' : 'text-dark' }}" style="font-size: 16px;"  href="{{route('Page.Table')}}">
                    <i class="material-symbols-rounded opacity-5">support_agent</i>
                    <span class="nav-link-text ms-1">Pages</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link {{ Request::is('hallPage') ? 'active bg-gradient-dark text-white' : 'text-dark' }}" style="font-size: 16px;"  href="{{route('HallPage.Table')}}">
                    <i class="material-symbols-rounded opacity-5">support_agent</i>
                    <span class="nav-link-text ms-1">Hall Page</span>
                </a>
            </li>

            {{-- <li class="nav-item">
                <a class="nav-link {{ Request::is('project') ? 'active bg-gradient-dark text-white' : 'text-dark' }}" style="font-size: 16px;"  href="">
                    <i class="material-symbols-rounded opacity-5">groups</i>
                    <span class="nav-link-text ms-1">Clients / Project</span>
                </a>
            </li> --}}
            <li class="nav-item">
                <a class="nav-link {{ Request::is('admincontacts') ? 'active bg-gradient-dark text-white' : 'text-dark' }}"  style="font-size: 16px;"   href="{{route('Contact.AdminPage')}}">
                    <i class="material-symbols-rounded opacity-5">table_view</i>
                    <span class="nav-link-text ms-1">Contacts</span>
                </a>
            </li>


            <li class="nav-item">
                <a class="nav-link {{ Request::is('donation') ? 'active bg-gradient-dark text-white' : 'text-dark' }}"  style="font-size: 16px;"   href="{{route('Donation.Table')}}">
                    <i class="material-symbols-rounded opacity-5">table_view</i>
                    <span class="nav-link-text ms-1">Donations</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link {{ Request::is('booked-halls') ? 'active bg-gradient-dark text-white' : 'text-dark' }}"  style="font-size: 16px;"   href="{{route('Booked.Halls')}}">
                    <i class="material-symbols-rounded opacity-5">table_view</i>
                    <span class="nav-link-text ms-1">Booked Halls</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link {{ Request::is('AdminHallEnquiry') ? 'active bg-gradient-dark text-white' : 'text-dark' }}"  style="font-size: 16px;"   href="{{route('AdminHallEnquiry')}}">
                    <i class="material-symbols-rounded opacity-5">table_view</i>
                    <span class="nav-link-text ms-1">Hall Enquirys</span>
                </a>
            </li>

            <li class="nav-item">
                <a id="toggleMenu2" class="nav-link text-dark" style="font-size: 16px; cursor: pointer; user-select: none;">
                    <i class="material-symbols-rounded opacity-5">article</i>
                    <span class="nav-link-text ms-1">Vendors</span>
                </a>

                <!-- Collapsible Section -->
                <div id="subMenu2" style="display: none; padding-left: 20px; margin-top: 10px;">
                    <a class="btn btn-outline-dark d-block mb-2" href="{{route('Event.Table')}}">Event</a>
                    <a class="btn btn-outline-dark d-block" href="{{route('Catering.Table')}}">Catering</a>
                </div>
            </li>

            <!-- JavaScript to Toggle Visibility -->
            <script>
                document.getElementById("toggleMenu2").addEventListener("click", function() {
                    var subMenu = document.getElementById("subMenu2");
                    subMenu.style.display = (subMenu.style.display === "none" || subMenu.style.display === "") ? "block" : "none";
                });
            </script>

            {{-- <li class="nav-item mt-3">
                <h6 class="ps-4 ms-2 text-uppercase text-xs text-dark font-weight-bolder opacity-5">Account pages</h6>
            </li> --}}

            {{-- <li class="nav-item">
                <a class="nav-link {{ Request::is('profile') ? 'active bg-gradient-dark text-white' : 'text-dark' }}" href="{{ url('/profile') }}">
                    <i class="material-symbols-rounded opacity-5">person</i>
                    <span class="nav-link-text ms-1">HallPage.Table</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link {{ Request::is('sign-in') ? 'active bg-gradient-dark text-white' : 'text-dark' }}" href="{{ url('/sign-in') }}">
                    <i class="material-symbols-rounded opacity-5">login</i>
                    <span class="nav-link-text ms-1">Sign In</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link {{ Request::is('sign-up') ? 'active bg-gradient-dark text-white' : 'text-dark' }}" href="{{ url('/sign-up') }}">
                    <i class="material-symbols-rounded opacity-5">assignment</i>
                    <span class="nav-link-text ms-1">Sign Up</span>
                </a>
            </li> --}}
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
