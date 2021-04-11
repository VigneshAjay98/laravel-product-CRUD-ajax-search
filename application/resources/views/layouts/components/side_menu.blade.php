<?php

use Illuminate\Support\Facades\Auth;

$uri = $_SERVER['REQUEST_URI'];
$act = explode('/', $uri);

// echo"<pre>"; print_r($act); exit;

?>

<style>
   @media (max-width: 1440px){ 
        .dashboard-sidebar .dashboard-nav-container {
                width: 300px;
                margin-top: 6%;
        }
    }
   @media (min-width: 1440px){ 
        .dashboard-sidebar .dashboard-nav-container {
                margin-top: 10%;
        }
    }

</style>

<div class="dashboard-sidebar">
        <div class="dashboard-nav-trigger">
            <div class="dashboard-nav-trigger-btn">
                <i class="la la-bars"></i> Dashboard Nav
            </div>
        </div>
        <div class="dashboard-nav-container">
            <div class="humburger-menu">
                <div class="humburger-menu-lines side-menu-close"></div><!-- end humburger-menu-lines -->
            </div><!-- end humburger-menu -->
            <div class="side-menu-wrap" style="margin-top: -40%;">
                <ul class="side-menu-ul">
                    
                    <li class="sidenav__item @if(in_array('products', $act)) page-active @endif "><a href="{{ url('/products') }}"><i class="la la-lock"></i> Products</a></li>

                @if(Auth()->user()->role == 'admin')
                    <li class="sidenav__item @if(in_array('users', $act)) page-active @endif "><a href="{{ url('/users') }}"><i class="fas fa-link mr-2"></i> Assigned products</a></li>
                @endif
                    <li class="sidenav__item"><a href="{{ url('/logout') }}"><i class="la la-power-off"></i> Logout </a></li>

                </ul>
            </div><!-- end side-menu-wrap -->
        </div>
    </div><!-- end dashboard-sidebar -->





