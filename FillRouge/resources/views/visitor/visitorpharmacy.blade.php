@extends('layouts.app')

@section('content')

      @include('visitor.visitorsidebar')

<section id="pharmacies" class="container-fluid">

        <h3  class="fw-bold mb-5" style="color: #007A69;"><i class="uil uil-exchange-alt me-2 fs-4" ></i>Pharmacies</h3>
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
                               <button class="btn btn-danger text-white rounded-pill"  data-bs-toggle="modal" data-bs-target="#request-med{{$loop->iteration}}"><i class="text-white me-1 uil uil-capsule"></i>Request Medicine</button>

                           </td>
                       </tr>  
                        <!-- change Status -->
                        <div class="modal fade" id="view-phar{{$loop->iteration}}">
                                      <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                                                <div class="modal-content">
                                                        <div class="modal-header">
                                                                  <h5 class="modal-title">About Medicines in <span class="fw-bold text-primary fs-5"> {{$mypharmacy->name}}</span> Pharmacy</h5>
                                                                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                       <div class="modal-body">
                                                       @if ($mypharmacy->medicine->isEmpty())
                                                        <p class="fw-bold text-danger">There are no medicines available right now.</p>
                                                       @else
                                                       @foreach ($mypharmacy->medicine as $med) 
                                                                  <p class="fw-bold"><span class="text-danger fw-bold fs-3">Medicines:</span> </p><br>
                                                                  <p class="fw-bold"><span class="text-primary fw-bold fs-6">Medicine's Number: </span> {{$loop->iteration}}</p><br>
                                                                  <p class="fw-bold"><span class="text-primary fw-bold fs-6">Medicine's Pharmacy: </span>{{$mypharmacy->name}} </p><br>
                                                                  <p class="fw-bold"><span class="text-primary fw-bold fs-6">Medicine's Pharmacy's City: </span>{{$mypharmacy->city->name}}</p><br>
                                                                  <p class="fw-bold"><span class="text-secondary fw-bold fs-6">Medicine's Price :</span> {{$med->price}} DH </p>
                                                                  <p class="fw-bold"><span class="text-secondary fw-bold fs-6">Medicine's quantity :</span>{{$med->quantity}}</p>                               
                                                                  <p class="fw-bold"><span class="text-secondary fw-bold fs-6">Medicine's status :</span>{{$med->status}} </p>
                                                                  <p class="fw-bold"><span class="text-secondary fw-bold fs-6">Medicine's Category :</span> {{$med->category->label}}</p>
                                                      @endforeach
                                                      @endif
                                                       </div>
                                                      <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                      </div>
                                            </div>
                                    </div>
                            </div>

                            <!-- request medicine -->


                            <div class="modal fade" id="request-med{{$loop->iteration}}">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <form action="{{ url('SendRequest') }}" method="POST" enctype="multipart/form-data">
                                                    @csrf
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="add-title">Request Medicine</h5>
                                                            <a href="#" class="btn-close" data-bs-dismiss="modal"></a>
                                                        </div>
                                                        <div class="modal-body">                                      
                                                                <div class="mb-3">
                                                                <label for="medicineName" class="form-label">Medicine Name</label>
                                                                 <input type="text" class="form-control" id="medicineName" name="new_medicine_name" placeholder="Enter The Medicine Name">
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label class="form-label">Choose Medicine To Request </label>
                                                                    <select name="medicine_id" class="form-control">
                                                                    @if ($mypharmacy->medicine->isEmpty())
                                                                    <option  selected value="">No medicine Available Right Now</option>
                                                                    @else
                                                                    @foreach ($mypharmacy->medicine as $med)
                                                                        <option  selected value="">Choose a Medicine To Request</option>
                                                                        <option value="{{ $med->id }}">{{ $med->label }}</option>
                                                                    @endforeach
                                                                    @endif
                                                                    </select>
                                                                </div>
                                                                <div class="mb-3">
                                                                <label for="medicineQuantity" class="form-label">Medicine Quantity</label>
                                                                <input type="number" class="form-control" name="medicineQuantity" placeholder="Enter The Medicine quantity" required>
                                                                </div>
                                                                <div class="mb-3">
                                                                    <input type="hidden" class="form-control" name="visitor_id" value="{{ Auth::user()->id }} ">
                                                                    <input type="hidden" class="form-control" name="pharmacy_id" value="{{$mypharmacy->id}}">
                                                                </div>   
                                                        </div>
                                                        <div class="modal-footer">
                                                             <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                            <button type="submit" class="btn btn-primary">Submit Request</button>
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