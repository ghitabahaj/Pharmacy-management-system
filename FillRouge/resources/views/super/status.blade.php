@extends('layouts.app')

@section('content')

      @include('super.supersidebar')
<section id="status" class="container-fluid">

                <h3  class="fw-bold mb-5" style="color: #007A69;"><i class="uil uil-exchange-alt me-2 fs-4" ></i>Pharmacy's Status</h3>
                <div class="w-100 d-flex justify-content-around m-3 align-items-center py-2 ">
                    <div>
                        <label for="">Search : </label>
                        <input type="text" class="rounded border-0  px-4 ms-2" >
                    </div>
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
                               <button class="btn btn-warning text-white rounded-pill" data-bs-toggle="modal" data-bs-target="#update-phar-status"><i class="text-white me-1 uil uil-pen"></i>Edit</button>
                           </td>
                       </tr>  
                        <!-- change Status -->
                        <div class="modal fade" id="update-phar-status">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <form action="{{ route('ChangeStatus',$mypharmacy->id) }}" method="POST" enctype="multipart/form-data">
                                                    @csrf
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="add-title">Update Pharmacy's Status</h5>
                                                            <a href="#" class="btn-close" data-bs-dismiss="modal"></a>
                                                        </div>
                                                        <div class="modal-body">
                                                                <div class="mb-3">
                                                                    <label class="form-label"> Name</label>
                                                                    <input type="text" name="name" class="form-control" id="name" value="{{$mypharmacy->name}}" disabled/>
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label class="form-label">Change Pharmacy's Status</label>
                                                                    <select class="form-select" name="status" required>
                                                                            <option value="{{$mypharmacy->status}}" selected>{{$mypharmacy->status}}</option>
                                                                            <option value="null">Nothing</option>
                                                                            <option value="Day and Night">Day/Night</option>
                                                                            <option value="Day Not Night">Day/ Not Night</option>

                                                                    </select>
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label class="form-label">Pharmacy's Employees Number</label>
                                                                    <input type="text" name="employees" class="form-control" value="{{$mypharmacy->employees}}" disabled/>
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label class="form-label">Pharmacy's Telephone</label>
                                                                    <input type="text" name="telephone" class="form-control" value="{{$mypharmacy->telephone}}" disabled/>
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label class="form-label">Pharmacy's City</label>
                                                                    <select class="form-select" name="city_id" id="city" required disabled>
                                                                            <option value="{{$mypharmacy->city->id}}" selected>{{$mypharmacy->city->name}}</option>
                                                                    </select>
                                                                                                                                    
                                                                </div>
                                                            </div>
                                                          <div class="modal-footer">
                                                            <a href="#" class="btn btn-light" data-bs-dismiss="modal">Cancel</a>
                                                            <button type="submit" name="Update" class="btn btn-warning text-white" >Update</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>

      


@endsection