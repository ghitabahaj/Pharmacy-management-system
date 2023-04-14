@extends('layouts.app')

@section('content')

      @include('visitor.visitorsidebar')

<section id="pharmacies" class="container-fluid">

        <h3  class="fw-bold mb-5" style="color: #007A69;"><i class="uil uil-exchange-alt me-2 fs-4" ></i>Pharmacies</h3>
        <div class="w-100 d-flex justify-content-around m-3 align-items-center py-2 ">
            <div>
                <label for="">Search : </label>
                <input type="text" class="rounded border-0  px-4 ms-2" >
            </div>
        </div>
        
        <div class="d-flex justify-content-between">
                        <p class="fs-5 ms-2 fw-bold">All Pharmacies({{$countPhar}})</p>
        </div>


    <div class="card-body table-responsive mt-2" style="height: 60vh; overflow: scroll;">
                      <table class="table border-secondary text-center table-hover ">
                       <thead>
                           <td class="mycolor fw-bold ">Pharmacy's Name</td>
                           <td class="mycolor fw-bold">Pharmacy's Employees Number</td>
                           <td class="mycolor fw-bold">Pharmacy's City</td>
                           <td class="mycolor fw-bold">Pharmacy's Telephone</td>
                           <td class="mycolor fw-bold">Pharmacy's Status</td>                               
                           <td class="mycolor fw-bold">Events</td>
                       </thead>
                          @foreach ($pharmacies as $mypharmacy) 
                       <tr>  
                           <td class="text-dark">{{$mypharmacy->name}}</td>
                           <td class="text-dark">{{$mypharmacy->employees}}</td>
                           <td class="text-dark">{{$mypharmacy->city->name}}</td>
                           <td class="text-dark">{{$mypharmacy->telephone}}</td>
                           <td class="text-dark">
                           @if($mypharmacy->status)
                                {{$mypharmacy->status}}
                           @else
                                Nothing
                           @endif
                           </td>
                           <td class="text-dark">
                               <button class="btn btn-warning text-white rounded-pill" data-bs-toggle="modal" data-bs-target="#view-phar{{$loop->iteration}}"><i class="text-white me-1 uil uil-pen"></i>View Medicaments in this Pharmacy</button>
                           </td>
                       </tr>  
                        <!-- change Status -->
                        <div class="modal fade" id="view-phar{{$loop->iteration}}">
                                      <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                                                <div class="modal-content">
                                                        <div class="modal-header">
                                                                  <h5 class="modal-title">About Medicines in {{$mypharmacy->name}}  Pharmacy</h5>
                                                                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                       <div class="modal-body">
                                                                  <p class="fw-bold"><span class="text-primary fw-bold fs-6">Medicine's Number: </span> {{$loop->iteration}}</p><br>
                                                                  <p class="fw-bold"><span class="text-primary fw-bold fs-6">Medicine's Pharmacy: </span> </p><br>
                                                                  <p class="fw-bold"><span class="text-primary fw-bold fs-6">Medicine's Pharmacy's City: </span></p><br>
                                                                  <p class="fw-bold"><span class="text-primary fw-bold fs-6">Medicines:</span> </p><br>
                                                                  <div class="justify-content-center ms-5">
                                                              
                                                                  <p class="fw-bold"><span class="text-danger fw-bold fs-6">Medicine's number :</span> {{$loop->iteration}} </p>
                                                                  <p class="fw-bold"><span class="text-secondary fw-bold fs-6">Medicine's name :</span>  </p>
                                                                  <p class="fw-bold"><span class="text-secondary fw-bold fs-6">Medicine's Price :</span>  </p>
                                                                  <p class="fw-bold"><span class="text-secondary fw-bold fs-6">Medicine's Provider :</span>  </p>
                                                                  <p class="fw-bold"><span class="text-secondary fw-bold fs-6">Medicine's Category :</span> </p>
                                                                  <p class="fw-bold"><span class="text-secondary fw-bold fs-6">Medicine's status :</span> </p>
                                                                  <p class="fw-bold"><span class="text-secondary fw-bold fs-6">Medicine's quantity :</span></p>                               
                                                                
                                                                  </div>
                                                       </div>

                                                      <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                      </div>
                                            </div>
                                    </div>
                            </div>

                                   @endforeach

                        </table>
                    </div>  
            </section>

@endsection