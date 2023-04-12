@extends('layouts.app')

@section('content')

      @include('sidebar')
        <section id="dashboard" class="ms-4">
                <h3 class="fw-bold" style="color: #007A69;"><i
                    class="uil uil-chart-bar fs-4 me-2"></i>Dashboard <span class="text-secondary"> /Home</span></h3>
                <div class="row g-3 d-flex justify-content-around">
                    <div class="col-lg-3 col-md-5 col-11">
                        <div class="p-3 shadow-sm d-flex justify-content-around align-items-center rounded border">
                            <div>                      
                                <h3 class="fs-2 mycolor">{{$countCities}}</h3>
                                <p class="fs-5 text-black">Cities</p>
                            </div>    
                            <i class="uil uil-medkit fs-3 mycolor box rounded py-2  px-3"></i>           
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-5 col-11">
                        <div class="p-3 shadow-sm d-flex justify-content-around align-items-center rounded border">
                            <div>
                         
                                <h3 class="fs-2 mycolor">{{$superAdminCount}}</h3>
                                <p class="fs-5 text-black">Super Admins</p>
                            </div>
                            <i class="uil uil-users-alt fs-3 mycolor box rounded py-2  px-3 "></i>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-5 col-11">
                        <div class="p-3  shadow-sm d-flex justify-content-around align-items-center rounded  border"> 
                            <div>
                                <h3 class="fs-2 mycolor">{{$countPhar}}</h3>
                                <p class="fs-5 text-black">Pharmacies</p>
                            </div>
                            <i class="uil uil-heart-medical fs-3 mycolor rounded py-2  px-3 box"></i>
                        </div>
                    </div>
                    
                    <div class="col-lg-3 col-md-5 col-11">
                        <div class="p-3  shadow-sm d-flex justify-content-around align-items-center rounded border"> 
                            <div>
                                <h3 class="fs-2 mycolor">{{$invoicesCount}}</h3>
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
                           <div class="card-body table-responsive position-relative" style="height: 15em; overflow: scroll;">
                            <table class="table border-secondary text-center table-hover ">
                                <thead>
                                    <td class="mycolor fw-bold ">Pharmacy number</td>
                                    <td class="mycolor fw-bold">Pharmacy name</td>
                                    <td class="mycolor fw-bold">City</td>
                                    <td class="mycolor fw-bold">Employees number</td>
                              </thead>  
                                 @foreach ($lastPhar as $pharmacy) 
                                            <tr>
                                            <td class="text-dark">{{$loop->iteration}}</td>
                                            <td class="text-dark">{{$pharmacy->name}}</td>
                                            <td class="text-dark">{{$pharmacy->city->name}}</td>
                                            <td class="text-dark">{{$pharmacy->employees}}</td>
                                           </tr>
                                @endforeach
                            </table>
                           
                        </div>
                        <button class="w-100 btn  position-absolute bottom-0 " style="color:#007A69;  border: 1px solid #CCF2E5; background-color:#CCF2E5;" type="submit"><a class="text-dark" style=" text-decoration: none;"  href="{{ route('pharmacy') }}">Show all Pharmacies</a> </button>
                        
                        </form>
                        <form method="post" style="width: 49%; height: 25em;" class="position-relative appointment-table rounded shadowborder" >
                            <p class="ms-3 mycolor fs-4 fw-bold">Last Invoices</p>
                           <p class="ms-3">Here's a the last invoices with the name of the pahrmacy<br> and with more informations available in @Invoices Section.</p>
                           <div class="card-body table-responsive position-relative" style="height: 15em; overflow: scroll;">
                           <table class="table border-secondary text-center table-hover">
                            <tr class="">
                                <td class="mycolor fw-bold ">Invoice Number</td>
                                <td class="mycolor fw-bold">Pharmacy Name</td>
                                <td class="mycolor fw-bold">Date & Time</td>
                                </tr>
                            
                           </table>
                        </div>
                        <button class="w-100 btn position-absolute bottom-0" style="color:#007A69;  border: 1px solid #CCF2E5; background-color:#CCF2E5;"  name="allSessions" type="submit"> <a class="text-dark" style=" text-decoration: none;"  href="">Show all Invoices</a></button>
                        </form>
                  </section>
                </section>

@endsection