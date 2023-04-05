@extends('layouts.app')

@section('content')

        @include('sidebar')

        <section id="cities" class="container-fluid">

                     <h3  class="fw-bold mb-5" style="color: #007A69;"><i class="uil uil-shop me-2 fs-4" ></i>Cities</h3>
                     <div class="w-100 d-flex justify-content-around m-3 align-items-center py-2 ">
                            <div>
                                <label for="">Search : </label>
                                <input type="text" class="rounded border-0  px-4 ms-2" >
                            </div>
                         </div>
                    
                        <div class="d-flex justify-content-between">
                            <p class="fs-5 ms-2 fw-bold">All Cities(1)</p>
                            <button class="btn btn-dark rounded-pill" data-bs-toggle="modal" data-bs-target="#modal-city" id="add-city-btn"><i class="uil uil-plus text-white"></i>&emsp; Add City</button>
                        </div>
                         <div class="card-body table-responsive mt-2" style="height: 60vh; overflow: scroll;">
                                           <table class="table border-secondary text-center table-hover ">
                                            <thead>
                                                <td class="mycolor fw-bold ">City Name</td>
                                                <td class="mycolor fw-bold">Province</td>
                                                <td class="mycolor fw-bold">Number Of Pharmacies</td> 
                                                <td class="mycolor fw-bold">Postal Code</td>                              
                                                <td class="mycolor fw-bold">Events</td>
                                            </thead>  
                                             @foreach ($cities as $city) 
                                            <tr>
                                         
                                                <td class="text-dark">{{$city->name}}</td>
                                                <td class="text-dark">{{$city->province}}</td>
                                                <td class="text-dark">{{$city->pharmaciesnum}}</td>
                                                <td class="text-dark">{{$city->PostalCode}}</td>
                                                <td class="text-dark">
                                                    <button class="btn btn-warning text-white rounded-pill" data-bs-toggle="modal" data-bs-target="#update-city" id="update-btn"><i class="text-white me-1 uil uil-pen"></i>Edit</button>
                                                    <button class="btn btn-light rounded-pill" data-bs-toggle="modal" data-bs-target="#view-city" data-city-id="{{$city->id}}" id="view-city-btn"><i class="text-dark me-1 uil uil-eye"></i>view</button>
                                                    <button class="btn btn-danger rounded-pill" data-bs-toggle="modal" data-bs-target="#remove-city" data-city-id="{{$city->id}}" id="remove-city-btn"><i class="text-white me-1 uil uil-trash"></i>remove</button>
                                                </td>
                                            </tr>  
                                            @endforeach   
                                           </table>
                            </div>
            </section>

            <!-- add modal -->
            <div class="modal fade" id="modal-city">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <form action="{{ url('addCity') }}" method="POST" enctype="multipart/form-data" name="form_add_city">
                            @csrf
                                <div class="modal-header">
                                    <h5 class="modal-title" id="add-title">Add New City</h5>
                                    <a href="#" class="btn-close" data-bs-dismiss="modal"></a>
                                </div>
                                <div class="modal-body">
                                        <input type="hidden" id="city-id">
                                        <div class="mb-3">
                                            <label class="form-label">City Name</label>
                                            <input type="text" name="name" class="form-control" id="city-name"/>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Province</label>
                                            <input type="text" name="province" class="form-control" id="city-pro"/>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Number Of Pharmacies</label>
                                            <input type="number" name="pharmaciesnum" class="form-control" id="employees-num"/>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Postal Code</label>
                                            <input type="number" name="PostalCode" class="form-control" id="Postal-code"/>
                                        </div>
                                        
                                </div>
                                <div class="modal-footer">
                                    <a href="#" class="btn btn-light" data-bs-dismiss="modal">Cancel</a>
                                    <button type="submit" name="saveCity" class="btn btn-primary" id="city-save-btn">Save</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- view modal  -->

                <div class="modal fade" id="view-city">
                    <div class="modal-dialog">
                         <div class="d-flex justify-content-around align-items-center bg-white p-3 rounded">
                                <div >
                                   <img class="rounded-circle" src="/img/pharlog.png" width="100px" height="100px" alt="" srcset="">
                                 </div>
                                <div>
                                    <p>City Name : <span class="fw-bold">Safi</span></p>
                                    <p>Province: <span class="fw-bold">Marrakech-Safi</span></p>
                                </div>
                                 <div>
                                   <p>Number Of Pharmacies : <span class="fw-bold">25</span></p>
                                   <p>Postal Code: <span class="fw-bold">4600</span></p>
                                 </div>
                           </div>
                     </div>
                </div>



                <!--  remove modal  -->
                <div class="modal fade" id="remove-city">
                    <div class="modal-dialog">
                        <div class="modal-content">
                              <form action="" class="p-3">
                                   <div class="d-flex align-items-center justify-content-center">
                                       <i class="uil uil-exclamation-triangle fs-1 text-danger me-3"></i>
                                       <p class="fw-bold pt-3">Are you sure that you want to remove this City?</p>
                                    </div>
                                    <div class="d-flex justify-content-around w-75 m-auto">
                                       <button type="submit" class="btn btn-white" data-bs-dismiss="modal">Cancel</button>
                                       <button type="submit" name="deleteCity" class="btn text-white bg-danger" id="remove-city">remove</button>
                                    </div>
                               </form>
                         </div>
                     </div>
               </div>

@endsection