@extends('layouts.app')

@section('content')

      @include('super.supersidebar')

           <section id="medicines" class="container-fluid">

                     <h3  class="fw-bold mb-5" style="color: #007A69;"><i class="uil uil-medkit me-2 fs-4" ></i>Medicines</h3>
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
                         @if(session('error'))
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                {{ session('error') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                         @endif
                    
                        <div class="d-flex justify-content-between">
                            <p class="fs-5 ms-2 fw-bold">All Medicines({{$countMed}})</p>
                            <button class="btn btn-dark rounded-pill" data-bs-toggle="modal" data-bs-target="#modal-med" ><i class="uil uil-plus text-white" ></i>&emsp; Add Medicine</button>
                        </div>
                         <div class="card-body table-responsive mt-2" style="height: 60vh; overflow: scroll;">
                                           <table class="table border-secondary text-center table-hover ">
                                            <thead>
                                                <td class="mycolor fw-bold ">Medicine Name</td>
                                                <td class="mycolor fw-bold">Category</td>
                                                <td class="mycolor fw-bold">Price</td>
                                                <td class="mycolor fw-bold">Quantity</td>
                                                <td class="mycolor fw-bold">Expiration Date</td>
                                                <td class="mycolor fw-bold">Status</td>
                                                <td class="mycolor fw-bold">Events</td>
                                            </thead> 
                                            <tr>
                                            @foreach ($mypharmacy->medicine as $med) 
                                                <td class="text-dark">{{$med->label}}</td>
                                                <td class="text-dark">{{$med->category->label}}</td>
                                                <td class="text-dark">{{$med->price}}</td>
                                                <td class="text-dark">{{$med->quantity}}</td>
                                                <td class="text-dark">{{$med->expiration_date}}</td>
                                                <td class="text-dark">
                                                @if($med->quantity > 0)
                                                        In Stock
                                                @else
                                                      Out Of Stock
                                                @endif
                                                </td>
                                                <td class="text-dark">
                                                    <button class="btn btn-warning text-white rounded-pill" data-bs-toggle="modal" data-bs-target="#update-med{{$loop->iteration}}" ><i class="text-white me-1 uil uil-pen"></i>Edit</button>
                                                    <button class="btn btn-light rounded-pill" data-bs-toggle="modal" data-bs-target="#view-med{{$loop->iteration}}" ><i class="text-dark me-1 uil uil-eye"></i>view</button>
                                                    <button class="btn btn-danger rounded-pill" data-bs-toggle="modal" data-bs-target="#remove-med{{$loop->iteration}}"><i class="text-white me-1 uil uil-trash"></i>remove</button>
                                                </td>
                                            </tr>

                                           
                                                                            
                                        <div class="modal fade" id="view-med{{$loop->iteration}}">
                                                    <div class="modal-dialog">
                                                        <div class="d-flex justify-content-around align-items-center bg-white p-3 rounded">
                                                        
                                                                <div>
                                                                    <p>Medicine Name : <span class="fw-bold">{{$med->label}}</span></p>
                                                                    <p>Category : <span class="fw-bold">{{$med->category->label}}</span></p>
                                                                </div>
                                                                <div>
                                                                <p>Price : <span class="fw-bold">{{$med->price}} DH</span></p>
                                                                <p>Quantity : <span class="fw-bold">{{$med->quantity}}</span></p>
                                                                </div>
                                                                <div>
                                                                <p>Name Of Provider : <span class="fw-bold">{{$med->provider}}</span></p>
                                                                <p>Expiration Date : <span class="fw-bold">{{$med->expiration_date}}</span></p>
                                                                </div>
                                                        </div>
                                                    </div>
                                                </div>

                       

                                         <div class="modal fade" id="remove-med{{$loop->iteration}}">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <form action="" class="p-3">
                                                                <div class="d-flex align-items-center justify-content-center">
                                                                    <i class="uil uil-exclamation-triangle fs-1 text-danger me-3"></i>
                                                                    <p class="fw-bold pt-3">Are you sure that you want to remove this Medicine?</p>
                                                                    </div>
                                                                    <div class="d-flex justify-content-around w-75 m-auto">
                                                                    <button type="submit" class="btn btn-white" data-bs-dismiss="modal">Cancel</button>
                                                                    <button type="submit" class="btn text-white bg-danger"><a style=" text-decoration: none; color:white "  href="{{route('destroyMedicine',$med->id)}}">remove</a></button>
                                                                    </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                            </div>

                                      

                                            <div class="modal fade" id="update-med{{$loop->iteration}}">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <form action="{{ route('updateMedicine',$med->id) }}" method="POST" enctype="multipart/form-data" name="form_add_med">
                                                    @csrf
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="add-title">Update Medicine</h5>
                                                            <a href="#" class="btn-close" data-bs-dismiss="modal"></a>
                                                        </div>
                                                        <div class="modal-body">                                    
                                                                <div class="mb-3">
                                                                    <label class="form-label">Medicine Name</label>
                                                                    <input type="text" name="label" class="form-control" id="name" value="{{$med->label}}"/>
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label class="form-label">Choose Medicine Category </label>
                                                                    <select class="form-select" name="category_id" id="category" required>
                                                                            <option value="{{$med->category->id}}" selected>{{$med->category->label}}</option>
                                                                            @foreach ($categories as $cat) 
                                                                            <option value="{{$cat->id}}">{{$cat->label}}</option>
                                                                            @endforeach
                                                                          
                                                                    </select>
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label class="form-label">Price</label>
                                                                    <input type="number" name="price" class="form-control" value="{{$med->price}}"/>
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label class="form-label">Expiration Date</label>
                                                                    <input type="text" name="expiration_date" class="form-control"  value="{{$med->expiration_date}}"/>
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label class="form-label">Quantity</label>
                                                                    <input type="number" name="quantity" class="form-control" value="{{$med->quantity}}"/>
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label class="form-label">Name of Provider</label>
                                                                    <input type="text" name="provider" class="form-control"  value="{{$med->Provider}}"/>
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label class="form-label">Change Medicine's Status</label>
                                                                    <select class="form-select" name="status" required>
                                                                            <option value="{{ $med->status ? $med->status : null }}" selected>{{$med->status ? $med->status : 'No Informations'}}</option>
                                                                            <option value="Out Of Stock">Out Of Stock</option>
                                                                            <option value="In Stock">In Stock</option>
                                                                    </select>
                                                                </div>
                                                    
                                                        </div>
                                                        <div class="modal-footer">
                                                            <a href="#" class="btn btn-light" data-bs-dismiss="modal">Cancel</a>
                                                            <button type="submit" name="UpdateMed" class="btn btn-warning text-white" id="med-update-btn">Update</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>

                                        @endforeach  
                                       
                                           </table>
                            </div>  
            </section>



                                    <div class="modal fade" id="modal-med">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <form action="{{ url('addMedicine') }}" method="POST" enctype="multipart/form-data">
                                                    @csrf
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="add-title">Add New Medicine</h5>
                                                            <a href="#" class="btn-close" data-bs-dismiss="modal"></a>
                                                        </div>
                                                        <div class="modal-body">                                      
                                                                <div class="mb-3">
                                                                    <label class="form-label">Medicine Name</label>
                                                                    <input type="text" name="label" class="form-control" id="label"/>
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label class="form-label">Choose Medicine Category </label>
                                                                    <select class="form-select" name="category_id" id="category" required>
                                                                            <option selected>Open this select menu</option>
                                                                            @foreach ($categories as $cat) 
                                                                            <option value="{{$cat->id}}">{{$cat->label}}</option>
                                                                            @endforeach
                                                                    </select>
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label class="form-label">Price</label>
                                                                    <input type="number" name="price" class="form-control" />
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label class="form-label">Expiration Date</label>
                                                                    <input type="date" name="expiration_date" class="form-control" />
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label class="form-label">Quantity in Stock</label>
                                                                    <input type="number" name="quantity" class="form-control" />
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label class="form-label">Name Of Provider</label>
                                                                    <input type="text" name="Provider" class="form-control" />
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label class="form-label">Name of The Pharmacy</label>
                                                                    <input type="hidden" name="pharmacy_id" class="form-control"  value="{{$user->pharmacy->id}}"/>
                                                                    <input type="text" name="pharmacy" class="form-control"  value="{{$user->pharmacy->name}}" disabled/>
                                                                </div>

                                                                
                                                        </div>
                                                        <div class="modal-footer">
                                                            <a href="#" class="btn btn-light" data-bs-dismiss="modal">Cancel</a>
                                                            <button type="submit" name="saveMed" class="btn btn-primary" id="med-save-btn">Save</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>


              
@endsection