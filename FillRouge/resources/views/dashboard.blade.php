@extends('layouts.app')

@section('content')

<div class="d-flex shadow-sm bg-light" id="wrapper" >
        <div class="bg-white" id="sidebar-wrapper">
            <div class="sidebar-heading text-center d-flex flex-column py-4 fs-5 border-bottom mt-5">
                <div class="d-flex align-items-center">
                    <img src="/img/user.png" width="40px" class="rounded-circle me-3" alt="">
                    <div>
                        <p style="margin:-5px;" class="fs-5"> {{ Auth::user()->name }}</p>
                        <p class="text-secondary fs-6"> {{ Auth::user()->email }}</p>
                    </div>
                </div>

                   <div>
                   <a  class="btn w-100 btn-light my-3 mycolor button1 fs-6" href="{{ route('logout') }}"  onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"> Log out</a>
                                                      <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                                       @csrf
                                                       </form>
                   </div>                
                </div>
            <form class="list-group list-group-flush ">
                <button class="list-group-item list-group-item-action  text-secondary "><i
                        class="uil uil-chart-bar fs-4 me-2 p-2"></i><a style=" text-decoration: none; color:grey;" href="#">Dashboard</a></button>
                <button   class="list-group-item list-group-item-action text-success   fw-bold"><i
                        class="uil uil-heart-medical me-2 fs-4 p-2 text-success" ></i><a style=" text-decoration: none; color:green;" href="{{ route('pharmacy') }}">Pharmacy</a></button>
                <button class="list-group-item list-group-item-action  fw-bold text-warning"><i
                        class="uil uil-shop me-2 fs-4 p-2 text-warning" ></i>City</button> 
                        <button class="list-group-item list-group-item-action fw-boldtext-secondary"><i
                        class="uil uil-receipt fs-4 me-2 p-2 text-secondary"></i>Invoices</button>       
                <button  class="list-group-item list-group-item-action  fw-bold text-primary"><i
                        class="uil uil-user-square me-2 fs-4 p-2 text-primary"></i><a style=" text-decoration: none; color:blue;" href="{{ route('Profile') }}">Update Account</a></button>
                <button class="list-group-item list-group-item-action fw-bold text-danger"><i
                        class="uil uil-users-alt fs-4 me-2 p-2 text-danger"></i>Give Roles</button> 
            </form>
            
        </div>
        <div id="page-content-wrapper" style="height: 100vh; overflow: scroll; overflow-x: hidden;">
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

        <section id="dashboard" class="ms-4">
                <h3 class="fw-bold" style="color: #007A69;"><i
                    class="uil uil-chart-bar fs-4 me-2"></i>Dashboard <span class="text-secondary"> /Home</span></h3>
                <div class="row g-3 d-flex justify-content-around">
                    <div class="col-lg-3 col-md-5 col-11">
                        <div class="p-3 shadow-sm d-flex justify-content-around align-items-center rounded border">
                            <div>                      
                                <h3 class="fs-2 mycolor">3</h3>
                                <p class="fs-5 text-black">Medicines</p>
                            </div>    
                            <i class="uil uil-medkit fs-3 mycolor box rounded py-2  px-3"></i>           
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-5 col-11">
                        <div class="p-3 shadow-sm d-flex justify-content-around align-items-center rounded border">
                            <div>
                         
                                <h3 class="fs-2 mycolor">3</h3>
                                <p class="fs-5 text-black">Super Admins</p>
                            </div>
                            <i class="uil uil-users-alt fs-3 mycolor box rounded py-2  px-3 "></i>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-5 col-11">
                        <div class="p-3  shadow-sm d-flex justify-content-around align-items-center rounded  border"> 
                            <div>
                                <h3 class="fs-2 mycolor">2</h3>
                                <p class="fs-5 text-black">Pharmacies</p>
                            </div>
                            <i class="uil uil-heart-medical fs-3 mycolor rounded py-2  px-3 box"></i>
                        </div>
                    </div>
                    
                    <div class="col-lg-3 col-md-5 col-11">
                        <div class="p-3  shadow-sm d-flex justify-content-around align-items-center rounded border"> 
                            <div>
                                <h3 class="fs-2 mycolor">2</h3>
                                <p class="fs-5 text-black">Invoices</p>
                            </div>
                            <i class="uil uil-receipt fs-3 mycolor  rounded py-2  px-3 box"></i>
                        </div>
                    </div>
                </div>
                  <section class="mt-5 d-flex justify-content-between">
                        <form method="post"  style="width: 49%; height: 25em;" class="position-relative appointment-table rounded shadowborder" >
                           <p class="ms-3 mycolor fs-4 fw-bold">Last Added Pharmacies</p>
                           <p class="ms-3">Here's the last pharmacies that you added Recently  <br> More details available in @Pharmacy section.</p>
                           <div class="card-body table-responsive position-relative" style="height: 15em; overflow: scroll;
                           background-image:  url(img/icons/notfound.svg);
                           background-repeat: no-repeat;
                           background-size:15em;
                           background-position: bottom;
                           ">
                            <table class="table border-secondary text-center table-hover ">
                                <tr class="">
                                    <td class="mycolor fw-bold ">Pharmacy number</td>
                                    <td class="mycolor fw-bold">Pharmacy name</td>
                                    <td class="mycolor fw-bold">City</td>
                                    <td class="mycolor fw-bold">Employees number</td>
                                </tr>     
                            </table>
                           
                        </div>
                        <button class="w-100 btn mycolor button1 position-absolute bottom-0 " name="allAppointment" type="submit">Show all Pharmacies</button>
                        
                        </form>
                        <form method="post" style="width: 49%; height: 25em;" class="position-relative appointment-table rounded shadowborder" >
                            <p class="ms-3 mycolor fs-4 fw-bold">Last Invoices</p>
                           <p class="ms-3">Here's a the last invoices with the name of the pahrmacy<br> and with more informations available in @Invoices Section.</p>
                           <div class="card-body table-responsive position-relative" style="height: 15em; overflow: scroll; background-image:  url(img/icons/notfound.svg);
                           background-repeat: no-repeat;
                           background-size:15em;
                           background-position: bottom;">
                           <table class="table border-secondary text-center table-hover">
                            <tr class="">
                                <td class="mycolor fw-bold ">Invoice Number</td>
                                <td class="mycolor fw-bold">Pharmacy Name</td>
                                <td class="mycolor fw-bold">Date & Time</td>
                                </tr>
                            
                           </table>
                        </div>
                        <button class="w-100 btn mycolor button1 position-absolute bottom-0" name="allSessions" type="submit">Show all Invoices</button>
                        </form>
                  </section>
                </section>

@endsection