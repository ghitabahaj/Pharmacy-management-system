@extends('layouts.app')

@section('content')

<div class="d-flex shadow-sm bg-light" id="wrapper" >
        <div class="bg-white" id="sidebar-wrapper">
            <div class="sidebar-heading text-center d-flex flex-column py-4 fs-5 border-bottom mt-5">
                <div class="d-flex align-items-center">
                    <img src="/img/user.png" width="40px" class="rounded-circle me-3" alt="">
                    <div>
                        <p style="margin:-5px;">admin</p>
                        <p class="text-secondary fs-6">email@emaill.com</p>
                    </div>
                </div>
                    <button class="btn btn-lg btn-block btn-light my-3 mycolor button1 fs-6 " type="button">Log out</button> 
                </div>
            <form class="list-group list-group-flush " method="post" action="">
                <button class="list-group-item list-group-item-action  text-secondary "><i
                        class="uil uil-chart-bar fs-4 me-2 p-2"></i>dashboard</button>
                <button   class="list-group-item list-group-item-action text-success   fw-bold"><i
                        class="uil uil-heart-medical me-2 fs-4 p-2 text-success" ></i>Pharmacy</button>
                <button class="list-group-item list-group-item-action  fw-bold text-warning"><i
                        class="uil uil-shop me-2 fs-4 p-2 text-warning" ></i>City</button>        
                <button  class="list-group-item list-group-item-action  fw-bold text-primary"><i
                        class="uil uil-user-square me-2 fs-4 p-2 text-primary"></i>Update Account</button>
                <button class="list-group-item list-group-item-action fw-bold text-danger"><i
                        class="uil uil-users-alt fs-4 me-2 p-2 text-danger"></i>Give Roles</button>
            </form>
            
        </div>
        <div id="page-content-wrapper" style="height: 100vh; overflow: scroll;">
        <nav class="navbar navbar-expand-lg navbar-light bg-transparent p-4 pt-1 justify-content-between" >
                <div class="d-flex align-items-center">
                    <i class="fas fa-align-left mycolor fs-2 mt-3" id="menu-toggle"></i>
            </div>
            <div class="d-flex align-items-center ms-auto">
                <div class="pt-3 me-3">
                  <p class="fs-6 text-secondary" style="margin-bottom: -5px;">Today's date</p>
                  <p class="fs-6 text-black fw-bold ms-1" id="current-date">
                  </p>
                </div>
                <i class="uil uil-calendar-alt fs-2 mt-1 box rounded p-2"></i>
            </div>
        </nav>

@endsection