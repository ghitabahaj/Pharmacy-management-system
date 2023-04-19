@extends('layouts.app')

@section('content')
 
         @include('visitor.visitorsidebar')


         <section id="reauests" class="container-fluid">
                <h3  class="fw-bold mb-5" style="color: #007A69;"><i class="uil uil-exchange-alt me-2 fs-4" ></i>My Requests</h3>
                <div class="w-100 d-flex justify-content-around m-3 align-items-center py-2 ">
                    <div>
                        <label>Search : </label>
                        <input type="text" class="rounded border-0  px-4 ms-2" >
                    </div>
               </div>

               @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif       

       
                <div class="d-flex justify-content-between">
                        <p class="fs-5 ms-2 fw-bold">All Requests({{$request_count}})</p>
                </div>


                <div class="card-body table-responsive mt-2" style="height: 60vh; overflow: scroll;">
                            <table class="table border-secondary text-center table-hover ">
                            <thead>
                                <td class="mycolor fw-bold ">Request's Number</td>
                                <td class="mycolor fw-bold">Requested Medicine</td>
                                <td class="mycolor fw-bold"> New Requested Medicine</td>
                                <td class="mycolor fw-bold">Quantity</td>
                                <td class="mycolor fw-bold">Pharmacy's Name</td>
                                <td class="mycolor fw-bold"> Request Status</td>                               
                                <td class="mycolor fw-bold">Events</td>
                            </thead>
                                @foreach ($requests as $req) 
                            <tr>  
                                <td class="text-dark">{{$loop->iteration}}</td>
                                <td class="text-dark">{{$req->medicine->label ?? 'Nothing here! the new requested medicine  will be available soon'}}</td>
                                <td class="text-dark">{{$req->medicine_name ?? 'Nothing here ! you requested an existed medicine'}}</td>
                                <td class="text-dark">{{$req->quantity}}</td>
                                <td class="text-dark">{{$req->pharmacy->name}}</td>
                                <td class="text-dark">
                                   @if(!$req->is_handled)
                                   On Hold
                                   @else
                                   request traited the medicine is now available in Our pharmacy
                                   Welcome
                                   @endif
                                </td>
                                <td class="text-dark">
                                    <button class="btn btn-warning text-white rounded-pill" ><i class="text-white me-1 uil uil-pen"></i>View Details</button>
                                    <button class="btn btn-danger rounded-pill" data-bs-toggle="modal" data-bs-target="#remove-request{{$loop->iteration}}" id="remove-btn"><i class="text-white me-1 uil uil-trash"></i>remove</button>
                                </td>
                            </tr>  
                                           <!-- remove request -->
                                           <div class="modal fade" id="remove-request{{$loop->iteration}}">
                                                                    <div class="modal-dialog">
                                                                        <div class="modal-content">
                                                                            <form action="" class="p-3">
                                                                                <div class="d-flex align-items-center justify-content-center">
                                                                                    <i class="uil uil-exclamation-triangle fs-1 text-danger me-3"></i>
                                                                                    <p class="fw-bold pt-3">Are you sure that you want to remove this <span class="text-danger"> Request</span>?</p>
                                                                                    </div>
                                                                                    <div class="d-flex justify-content-around w-75 m-auto">
                                                                                    <button type="submit" class="btn btn-white" data-bs-dismiss="modal">Cancel</button>
                                                                                    <button type="submit" class="btn text-white bg-danger" id="session-save-btn"><a style=" text-decoration: none; color:white "  href="{{route('deleteRequest',$req->id)}}">remove</a></button>
                                                                                    </div>
                                                                            </form>
                                                                        </div>
                                                                    </div>
                                         </div>

                     @endforeach

                        </table>
                </div>  
    </section>


@endsection