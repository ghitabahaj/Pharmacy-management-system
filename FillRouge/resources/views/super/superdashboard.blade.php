@extends('layouts.app')

@section('content')

      @include('super.supersidebar')
        <section id="dashboard" class="ms-4">
                <h3 class="fw-bold" style="color: #007A69;"><i
                    class="uil uil-chart-bar fs-4 me-2"></i>Dashboard <span class="text-secondary"> /Home</span></h3>
                <div class="row g-3 d-flex justify-content-around">
                    <div class="col-lg-3 col-md-5 col-11">
                        <div class="p-3 shadow-sm d-flex justify-content-around align-items-center rounded border">
                            <div>                      
                                <h3 class="fs-2 mycolor">1</h3>
                                <p class="fs-5 text-black">Clients</p>
                            </div>    
                            <i class="uil uil-medkit fs-3 mycolor box rounded py-2  px-3"></i>           
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-5 col-11">
                        <div class="p-3 shadow-sm d-flex justify-content-around align-items-center rounded border">
                            <div>
                         
                                <h3 class="fs-2 mycolor">{{$countMed}}</h3>
                                <p class="fs-5 text-black">Medicines</p>
                            </div>
                            <i class="uil uil-users-alt fs-3 mycolor box rounded py-2  px-3 "></i>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-5 col-11">
                        <div class="p-3  shadow-sm d-flex justify-content-around align-items-center rounded  border"> 
                            <div>
                                <h3 class="fs-2 mycolor">{{$Employees}}</h3>
                                <p class="fs-5 text-black">Employees</p>
                            </div>
                            <i class="uil uil-heart-medical fs-3 mycolor rounded py-2  px-3 box"></i>
                        </div>
                    </div>
                    
                    <div class="col-lg-3 col-md-5 col-11">
                        <div class="p-3  shadow-sm d-flex justify-content-around align-items-center rounded border"> 
                            <div>
                                <h3 class="fs-2 mycolor">{{$countInvoices}}</h3>
                                <p class="fs-5 text-black">Invoices</p>
                            </div>
                            <i class="uil uil-receipt fs-3 mycolor  rounded py-2  px-3 box"></i>
                        </div>
                    </div>
                </div>
                  <section class="mt-5 d-flex justify-content-between">
                        <form method="post"  style="width: 49%; height: 25em;" class="position-relative appointment-table rounded shadowborder" >
                           <p class="ms-3 mycolor fs-4 fw-bold">Last Added Medicines</p>
                           <p class="ms-3">Here's the last Medicines that you added Recently  <br> More details available in @Medicine section.</p>
                           <div class="card-body table-responsive position-relative" style="height: 15em; overflow: scroll;">
                            <table class="table border-secondary text-center table-hover ">
                                <thead>
                                    <td class="mycolor fw-bold ">Medicine number</td>
                                    <td class="mycolor fw-bold">Medicine name</td>
                                    <td class="mycolor fw-bold">Category</td>
                                    <td class="mycolor fw-bold">Price</td>
                              </thead>  
                              @foreach ($lastMed as $med) 
                                            <tr>
                                            <td class="text-dark">{{$loop->iteration}}</td>
                                            <td class="text-dark">{{$med->label}}</td>
                                            <td class="text-dark">{{$med->category->label}}</td>
                                            <td class="text-dark">{{$med->price}} <span class = "fw-bold"> Dh</span></td>
                                           </tr>
                             @endforeach          
                            </table>
                           
                        </div>
                        <button class="w-100 btn  position-absolute bottom-0 " style="color:#007A69;  border: 1px solid #CCF2E5; background-color:#CCF2E5;"  type="submit"><a class="text-dark" style=" text-decoration: none;"  href="">Show all Medicines</a> </button>
                        
                        </form>
                        <form method="post" style="width: 49%; height: 25em;" class="position-relative appointment-table rounded shadowborder" >
                            <p class="ms-3 mycolor fs-4 fw-bold">Last Invoices</p>
                           <p class="ms-3">Here's a the last invoices with the name of the pahrmacy<br> and with more informations available in @Invoices Section.</p>
                           <div class="card-body table-responsive position-relative" style="height: 15em; overflow: scroll;">
                           <table class="table border-secondary text-center table-hover">
                                   <thead>
                                        <td class="mycolor fw-bold ">Invoice Number</td>
                                        <td class="mycolor fw-bold">Pharmacy Name</td>
                                        <td class="mycolor fw-bold">Date</td>
                                        <td class="mycolor fw-bold">Client Name</td>

                                  </thead>

                                   @foreach ($invoices as $invoice) 

                                           <tr>
                                            <td class="text-dark">{{$loop->iteration}}</td>
                                            <td class="text-dark">{{$invoice->User->Pharmacy->name}}</td>
                                            <td class="text-dark">{{$invoice->date}}</td>
                                            <td class="text-dark">{{$invoice->clientName}}</td>
                                           </tr>
                                   @endforeach 
                           </table>
                        </div>
                        <button class="w-100 btn position-absolute bottom-0" style="color:#007A69;  border: 1px solid #CCF2E5; background-color:#CCF2E5;"  name="allSessions" type="submit"> <a class="text-dark" style=" text-decoration: none;"  href="">Show all Invoices</a></button>
                        </form>
                  </section>
                </section>

@endsection