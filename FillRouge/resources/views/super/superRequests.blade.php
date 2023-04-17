@extends('layouts.app')

@section('content')

      @include('super.supersidebar')


<section id="reauests" class="container-fluid">
                <h3  class="fw-bold mb-5" style="color: #007A69;"><i class="uil uil-exchange-alt me-2 fs-4" ></i>Recieved Requests</h3>
                <div class="w-100 d-flex justify-content-around m-3 align-items-center py-2 ">
                    <div>
                        <label>Search : </label>
                        <input type="text" class="rounded border-0  px-4 ms-2" >
                    </div>
               </div>
       
                <div class="d-flex justify-content-between">
                        <p class="fs-5 ms-2 fw-bold">All Requests({{$request_count}})</p>
                </div>


                <div class="card-body table-responsive mt-2" style="height: 60vh; overflow: scroll;">
                            <table class="table border-secondary text-center table-hover ">
                            <thead>
                                <td class="mycolor fw-bold ">Request's Number</td>
                                <td class="mycolor fw-bold">Requested Medicine</td>
                                <td class="mycolor fw-bold">Quantity</td>
                                <td class="mycolor fw-bold">Pharmacy's Name</td>
                                <td class="mycolor fw-bold"> Request Status</td>                               
                                <td class="mycolor fw-bold">Events</td>
                            </thead>
                                @foreach ($requests as $req) 
                            <tr>  
                                <td class="text-dark">{{$loop->iteration}}</td>
                                <td class="text-dark">{{$req->medicine->label}}</td>
                                <td class="text-dark">{{$req->quantity}}</td>
                                <td class="text-dark">{{$req->pharmacy->name}}</td>
                                <td class="text-dark">
                                   @if(!$req->is_handled)
                                   On Hold
                                   @else
                                   Done Request has been traited
                                   @endif
                                </td>
                                <td class="text-dark">
                                    <button class="btn btn-warning text-white rounded-pill" ><i class="text-white me-1 uil uil-sync"></i>Trait the Request</button>
                                </td>
                            </tr>  

                                        @endforeach

                        </table>
                </div>  
</section>

@endsection     