@extends('layouts.app')

@section('content')

      @include('sidebar')

           <section id="pharmacies" class="container-fluid">

                     <h3  class="fw-bold mb-5" style="color: #007A69;"><i class="uil uil-medkit me-2 fs-4" ></i>Pharmacies</h3>
                     <div class="w-100 d-flex justify-content-around m-3 align-items-center py-2 ">
                            <div>
                                <label for="">Search : </label>
                                <input type="text" class="rounded border-0  px-4 ms-2" >
                            </div>
                         </div>
                    
                        <div class="d-flex justify-content-between">
                            <p class="fs-5 ms-2 fw-bold">All Pharmacies({{$countPhar}})</p>
                            <button class="btn btn-dark rounded-pill" data-bs-toggle="modal" data-bs-target="#modal-phar" id="add-phar-btn"><i class="uil uil-plus text-white" ></i>&emsp; Add Pharamcy</button>
                        </div>
                         <div class="card-body table-responsive mt-2" style="height: 60vh; overflow: scroll;">
                                           <table class="table border-secondary text-center table-hover ">
                                            <thead>
                                                <td class="mycolor fw-bold ">Pharmacy Name</td>
                                                <td class="mycolor fw-bold">City / Location</td>
                                                <td class="mycolor fw-bold">Number Of Employees</td>
                                                <td class="mycolor fw-bold">Number Phone</td>
                                                <td class="mycolor fw-bold">Events</td>
                                            </thead> 
                                            @foreach ($pharmacies as $phar) 
                                            <tr>
                                                <td class="text-dark">{{$phar->name}}</td>
                                                <td class="text-dark">{{$phar->city->name}}</td>
                                                <td class="text-dark">{{$phar->employees}}</td>
                                                <td class="text-dark">{{$phar->telephone}}</td>
                                                <td class="text-dark">
                                                    <button class="btn btn-warning text-white rounded-pill" data-bs-toggle="modal" data-bs-target="#update-phar{{$loop->iteration}}" id="update-btn"><i class="text-white me-1 uil uil-pen"></i>Edit</button>
                                                    <button class="btn btn-light rounded-pill" data-bs-toggle="modal" data-bs-target="#view-phar{{$loop->iteration}}"><i class="text-dark me-1 uil uil-eye"></i>view</button>
                                                    <button class="btn btn-danger rounded-pill" data-bs-toggle="modal" data-bs-target="#remove-phar{{$loop->iteration}}" id="remove-btn"><i class="text-white me-1 uil uil-trash"></i>remove</button>
                                                </td>
                                            </tr>

                                            <!-- view pharmacy info -->
                                                                            
                                        <div class="modal fade" id="view-phar{{$loop->iteration}}">
                                                    <div class="modal-dialog">
                                                        <div class="d-flex justify-content-around align-items-center bg-white p-3 rounded">
                                                                <div >
                                                                <img class="rounded-circle" src="/img/pharlog.png" width="100px" height="100px">
                                                                </div>
                                                                <div>
                                                                    <p>Pharmacy Name : <span class="fw-bold">{{$phar->name}}</span></p>
                                                                    <p>City / Location : <span class="fw-bold">{{$phar->city->name}}</span></p>
                                                                </div>
                                                                <div>
                                                                <p>Number Of Employees : <span class="fw-bold">{{$phar->employees}}</span></p>
                                                                <p>Number Phone : <span class="fw-bold">{{$phar->telephone}}</span></p>
                                                                </div>
                                                        </div>
                                                    </div>
                                                </div>

                                       <!-- remove pharmacy -->

                                         <div class="modal fade" id="remove-phar{{$loop->iteration}}">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <form action="" class="p-3">
                                                                <div class="d-flex align-items-center justify-content-center">
                                                                    <i class="uil uil-exclamation-triangle fs-1 text-danger me-3"></i>
                                                                    <p class="fw-bold pt-3">Are you sure that you want to remove this Pharmacy?</p>
                                                                    </div>
                                                                    <div class="d-flex justify-content-around w-75 m-auto">
                                                                    <button type="submit" class="btn btn-white" data-bs-dismiss="modal">Cancel</button>
                                                                    <button type="submit" class="btn text-white bg-danger" id="session-save-btn"><a style=" text-decoration: none; color:white "  href="{{route('deletePhar',$phar->id)}}">remove</a></button>
                                                                    </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                            </div>

                                            <!-- edit phar -->

                                            <div class="modal fade" id="update-phar{{$loop->iteration}}">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <form action="{{ route('UpdatePhar',$phar->id) }}" method="POST" enctype="multipart/form-data" name="form_add_phar">
                                                    @csrf
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="add-title">Update Pharmacy</h5>
                                                            <a href="#" class="btn-close" data-bs-dismiss="modal"></a>
                                                        </div>
                                                        <div class="modal-body">
                                                                <input type="hidden" id="pharmacy-id">
                                                                <div class="mb-3">
                                                                    <label class="form-label">Pharmacy Name</label>
                                                                    <input type="text" name="name" class="form-control" id="name" value="{{$phar->name}}"/>
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label class="form-label">Choose Pharmacy City / location </label>
                                                                    <select class="form-select" name="city_id" id="city" required>
                                                                            <option value="{{$phar->city->id}}" selected>{{$phar->city->name}}</option>
                                                                            @foreach ($cities as $city) 
                                                                            <option value="{{$city->id}}">{{$city->name}}</option>
                                                                            @endforeach
                                                                    </select>
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label class="form-label">Number Of Employees</label>
                                                                    <input type="number" name="employees" class="form-control" id="employees"  value="{{$phar->employees}}"/>
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label class="form-label">Phone Number</label>
                                                                    <input type="number" name="telephone" class="form-control" id="telephone"  value="{{$phar->telephone}}"/>
                                                                </div>
                                                                
                                                        </div>
                                                        <div class="modal-footer">
                                                            <a href="#" class="btn btn-light" data-bs-dismiss="modal">Cancel</a>
                                                            <button type="submit" name="UpdatePhar" class="btn btn-warning text-white" id="phar-update-btn">Update</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>


                                            @endforeach  
                                           </table>
                            </div>  
            </section>



                                    <div class="modal fade" id="modal-phar">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <form action="{{ url('addPharmacy') }}" method="POST" enctype="multipart/form-data" name="form_add_phar">
                                                    @csrf
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="add-title">Add New Pharmacy</h5>
                                                            <a href="#" class="btn-close" data-bs-dismiss="modal"></a>
                                                        </div>
                                                        <div class="modal-body">
                                                                <input type="hidden" id="pharmacy-id">
                                                                <div class="mb-3">
                                                                    <label class="form-label">Pharmacy Name</label>
                                                                    <input type="text" name="name" class="form-control" id="name"/>
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label class="form-label">Choose Pharmacy City / location </label>
                                                                    <select class="form-select" name="city_id" id="city" required>
                                                                            <option selected>Open this select menu</option>
                                                                            @foreach ($cities as $city) 
                                                                            <option value="{{$city->id}}">{{$city->name}}</option>
                                                                            @endforeach
                                                                    </select>
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label class="form-label">Number Of Employees</label>
                                                                    <input type="number" name="employees" class="form-control" id="employees"/>
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label class="form-label">Phone Number</label>
                                                                    <input type="number" name="telephone" class="form-control" id="telephone"/>
                                                                </div>
                                                                
                                                        </div>
                                                        <div class="modal-footer">
                                                            <a href="#" class="btn btn-light" data-bs-dismiss="modal">Cancel</a>
                                                            <button type="submit" name="savePhar" class="btn btn-primary" id="phar-save-btn">Save</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>


              
@endsection