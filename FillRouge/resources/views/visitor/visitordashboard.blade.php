@extends('layouts.app')

@section('content')

      @include('visitor.visitorsidebar')

      <div class="container-fluid px-4">
                
                <div class="cover_image" style="background-image: url(/img/vis.jpg);background-size:cover;"  >
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12 p-5 pb-5">
                                <h5 class="fw-bolder">Welcome !</h5>
                                <p class="fs-4 fw-bold">{{ Auth::user()->name }} </p>
                                <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Dicta ab tempore quo.<br>
                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Quas debitis quidem esse fuga ullam dolores at a aliquid.<br>
                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloremque tenetur quod cumque?
                                </p>
                                <h6 class="fw-bolder">Channel Pharmacies here </h6>
                                <div class="input-group pt-2" style="min-width:200px; max-width:500px">
                                    <input type="search" class="form-control rounded " placeholder="Search" aria-label="Search" aria-describedby="search-addon" />
                                    <button type="button" class="btn btn-secondary  ms-2 rounded  border-0">search</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                  <section class="mt-2 row justify-content-between">
                        <div  class="col-6  rounded shadowborder " >
                            <div class="row g-3 my-2 d-flex justify-content-around">
                                <div class="col-lg-6 col-md-12 col-11">
                                    <div class="p-3 shadow-sm d-flex justify-content-around align-items-center rounded border">
                                        <div>                      
                                            <h3 class="fs-2 mycolor">{{$countPhar}}</h3>
                                            <p class="fs-5 text-black">Pharmacies</p>
                                        </div>    
                                        <i class="uil uil-hospital fs-3 box rounded py-2  px-3"></i>           
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-12 col-11">
                                    <div class="p-3 shadow-sm d-flex justify-content-around align-items-center rounded border">
                                        <div>
                                            <h3 class="fs-2 mycolor">{{$categories}}</h3>
                                            <p class="fs-5 text-black">Medicines Categories</p>
                                        </div>
                                        <i class="uil uil-capsule fs-3 box rounded py-2  px-3 "></i>
                                    </div>
                                </div>
            
                                <div class="col-lg-6 col-md-12 col-11">
                                    <div class="p-3  shadow-sm d-flex justify-content-around align-items-center rounded  border"> 
                                        <div>
                                            <h3 class="fs-2 mycolor">{{$countCities}}</h3>
                                            <p class="fs-5 text-black">Cities</p>
                                        </div>
                                        <i class="uil uil-university fs-3 rounded py-2  px-3 box"></i>
                                    </div>
                                </div>
            
                                
                                <div class="col-lg-6 col-md-12 col-11">
                                    <div class="p-3  shadow-sm d-flex justify-content-around align-items-center rounded border"> 
                                        <div>
                                            <h3 class="fs-2 mycolor">2</h3>
                                            <p class="fs-5 text-black">Invoices</p>
                                        </div>
                                        <i class="uil uil-invoice fs-3 rounded py-2  px-3 box"></i>
                                    </div>
                                </div>
                            </div>
                           
                        </div>
                        <div style=" height: 25em;border: 1px black;" class="col-6 position-relative  rounded shadowborder mt-3" >
                            <p class=" mt-2 ms-3 fs-4 fw-bold">All Pharmacies that opens at night</p>
                          
                           <div class="card-body table-responsive position-relative" style="height: 15em; overflow: scroll; background-image:  url(img/icons/notfound.svg);
                           background-repeat: no-repeat;
                           background-size:15em;
                           background-position: bottom;">
                           <table class="table table-light" style="border: 0.5px solid rgb(184, 181, 181);border-radius: 20px;">
                            <thead>
                            <tr class="" style="border-bottom: 2px #007A69 solid;">
                                <td class="fw-bold ">Phrmacy Name</td>
                                <td class="fw-bold">Pharmacy City</td>
                                <td class="fw-bold">Pharmacy Number</td>
                                <td class="fw-bold">Status</td>
                            </tr>
                            </thead>
                           <tbody class=" border-none">
                           @foreach ($pharmacies as $pharmacy) 
                            <tr>
                                <td class="text-dark">{{$pharmacy->name}}</td>
                                <td class="text-dark">{{$pharmacy->city->name}}</td>
                                <td class="text-dark">{{$pharmacy->telephone}}</td>
                                <td class="text-dark">{{$pharmacy->status}}</td>
                            </tr>
                            </tbody>
                          @endforeach
                           </table>
                        </div>
                        </div>
                    
                  </section>
                  
        </div>
</div>


@endsection