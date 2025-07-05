<!DOCTYPE html>
<html lang="zxx">

<head>
    <title>Gurudakshina</title>
    <link rel="icon" href="{{asset('website/assets/Gokhale-logo.png')}}" type="image/gif" sizes="16x16">
    <meta content="text/html;charset=utf-8" http-equiv="Content-Type">
    <meta content="width=device-width, initial-scale=1.0" name="viewport" >
    <meta content="Almaris — Hotel Website Template" name="description" >
    <meta content="" name="keywords" >
    <meta content="" name="author" >
    <!-- CSS Files
    ================================================== -->
    <link href="{{asset('website/assets/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" id="bootstrap">
    <link href="{{asset('website/assets/css/plugins.css')}}" rel="stylesheet" type="text/css" >
    <link href="{{asset('website/assets/css/swiper.css')}}" rel="stylesheet" type="text/css" >
    <link href="{{asset('website/assets/css/style.css')}}" rel="stylesheet" type="text/css" >
    <link href="{{asset('website/assets/css/coloring.css')}}" rel="stylesheet" type="text/css" >
    <!-- Load Google Icons -->
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

{{-- <!-- Load Bootstrap and FontAwesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script> --}}


    <!-- color scheme -->
    <link id="colors" href="{{asset('website/assets/css/colors/scheme-01.css')}}" rel="stylesheet" type="text/css" >
    <style>
        .menu-item {
            text-decoration: none;
            color: black;
            padding: 10px;
            display: inline-block;
        }

        .menu-item.active {
            font-weight: bold;
            color: #AB8965;

            border-bottom: 4px solid #AB8965;
            /* border-bottom: 2px solid #d67f21; */
        }
    </style>

</head>

<body>
    <div id="wrapper">
        <a href="#" id="back-to-top"></a>

        <!-- page preloader begin -->
        <div id="de-loader"></div>
        <!-- page preloader close -->

        <!-- header begin -->
        <header class="transparent has-topbar">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="de-flex sm-pt10">
                            <div class="de-flex-col">
                                <!-- logo begin -->
                                <div id="logo">
                                    <a href="">
                                        <img class="logo-main" src="{{asset('website/assets/new Gokhale logo1.png')}}" style="width:130%; margin-right:30px !important;" alt="" >
                                        <img class="logo-scroll" src="{{asset('website/assets/new Gokhale logo1.png')}}" style="width:170%" alt="" >
                                        <img class="logo-mobile" src="{{asset('website/assets/new Gokhale logo1.png')}}" style="width:100%" alt="" >
                                    </a>
                                </div>
                                <!-- logo close -->
                            </div>
                            <div class="de-flex-col header-col-mid" style="margin-left: 80px;">
                                <ul id="mainmenu">
                                    <li><a class="menu-item {{ request()->routeIs('Index.Page') ? 'active' : '' }}" href="{{route('Index.Page')}}">Home</a></li>
                                    <li><a class="menu-item {{ request()->routeIs('About.Page') ? 'active' : '' }}" href="{{route('About.Page')}}">About US</a>

                                    </li>
                                    <li><a class="menu-item {{ request()->routeIs('Hall') ? 'active' : '' }}" href="{{route('Hall')}}">Halls</a>

                                    </li>
                                    <li><a class="menu-item {{ request()->routeIs('gallery-page') ? 'active' : '' }}" href="{{route('gallery-page')}}">Gallery</a></li>


                                    </li>

                                    <li><a class="menu-item {{ request()->routeIs('Contact.Page') ? 'active' : '' }}" href="{{route('Contact.Page')}}">Contact Us</a></li>
                                    {{-- <li><a class="menu-item btn-main btn-line">
                                        href="{{route('Enquiry.Page')}}" >Enquiry Now
                                    </a></li> --}}

                                    <li class="d-block d-md-none">
                                        <a class="btn-main btn-line menu-item" style="background-color: #AB8965; margin-top: 20px; padding: 5px;" href="{{route('Enquiry.Page')}}">Enquiry Now</a>
                                    </li>


                                </ul>
                            </div>
                            <div class="de-flex-col">
                                <div class="menu_side_area">
                                    <a href="{{route('Enquiry.Page')}}" class="btn-main btn-line menu-item">Enquiry Now</a>
                                    <span id="menu-btn"></span>
                                </div>
                            </div>

                            <div class="de-flex-col">
                                <!-- logo begin -->
                                <div id="logo">
                                    <a href="">
                                        <img class="logo-main" src="{{asset('website/assets/100gokhale-logo-2.png')}}" style="width:100%; margin-left:10px !important;" alt="" >
                                        <img class="logo-scroll" src="{{asset('website/assets/100gokhale-logo-2.png')}}" style="width:100%" alt="" >
                                        {{-- <img class="logo-mobile" src="{{asset('website/assets/100gokhale-logo-2.png')}}" style="width:80%" alt="" > --}}
                                    </a>
                                </div>
                                <!-- logo close -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- header close -->
