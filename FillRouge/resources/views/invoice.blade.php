@extends('layouts.app')

@section('content')

      @include('sidebar')



          <section id="invoices" class="container-fluid">

                  <h3  class="fw-bold mb-5" style="color: #007A69;"><i class="uil uil-invoice me-2 fs-4" ></i>Invoices</h3>
                  <div class="w-100 d-flex justify-content-around m-3 align-items-center py-2 ">
                    <div>
                        <label for="">Search : </label>
                        <input type="text" class="rounded border-0  px-4 ms-2" >
                    </div>
                  </div>

                  <div class="d-flex justify-content-between">
                        <p class="fs-5 ms-2 fw-bold">All Invoices({{$counter}})</p>
                  </div>
                  <div class="card-body table-responsive mt-2" style="height: 60vh; overflow: scroll;">
                                    <table class="table border-secondary text-center table-hover ">
                                    <thead>

                                          <td class="mycolor fw-bold ">Invoice's Number</td>
                                          <td class="mycolor fw-bold ">Invoice's Pharmacy</td>
                                          <td class="mycolor fw-bold">Invoice's total</td>
                                          <td class="mycolor fw-bold">Invoice's Client Name</td>
                                          <td class="mycolor fw-bold">Invoice's Medicines</td>                               
                                          <td class="mycolor fw-bold">Events</td>
                                    </thead>
                                    @foreach ($invoices as $invoice)   
                                    <tr>  
                                          <td class="text-dark">{{$loop->iteration}}</td>
                                          <td class="text-dark">{{$invoice->User->Pharmacy->name}}</td>
                                          <td class="text-dark">{{$invoice->total}}</td>
                                          <td class="text-dark">{{$invoice->clientName}}</td>
                                          <td class="text-dark">
                                          @foreach ($invoice->Medicine as $med)   
                                          {{$med->label}} /
                                          @endforeach
                                          </td>
                                          <td class="text-dark">
                                                <button class="btn btn-light rounded-pill" data-bs-toggle="modal" data-bs-target="#view-invoice{{$loop->iteration}}"><i class="text-dark me-1 uil uil-eye"></i>view</button>
                                                <button class="btn btn-danger rounded-pill" data-bs-toggle="modal" data-bs-target="#remove-invoice{{$loop->iteration}}"><i class="text-white me-1 uil uil-trash"></i>remove</button>
                                          </td>
                                    </tr>  

    

               <div class="modal fade" id="view-invoice{{$loop->iteration}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                           <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                                                <div class="modal-content">
                                                        <div class="modal-header">
                                                                  <h5 class="modal-title">Invoice Details</h5>
                                                                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                       <div class="modal-body">
                                                                  <p class="fw-bold"><span class="text-primary fw-bold fs-6">Invoice's Number: </span> {{$loop->iteration}}</p><br>
                                                                  <p class="fw-bold"><span class="text-primary fw-bold fs-6">Invoice's Pharmacy: </span> {{$invoice->User->Pharmacy->name}}</p><br>
                                                                  <p class="fw-bold"><span class="text-primary fw-bold fs-6">Invoice's Pharmacy's City: </span> {{$invoice->User->Pharmacy->city->name}}</p><br>
                                                                  <p class="fw-bold"><span class="text-primary fw-bold fs-6">Invoice's Medicines:</span> </p><br>
                                                                  <div class="justify-content-center ms-5">
                                                                  @foreach ($invoice->Medicine as $med) 
                                                                  <p class="fw-bold"><span class="text-danger fw-bold fs-6">Medicine's number :</span> {{$loop->iteration}} </p>
                                                                  <p class="fw-bold"><span class="text-secondary fw-bold fs-6">Medicine's name :</span> {{$med->label}} </p>
                                                                  <p class="fw-bold"><span class="text-secondary fw-bold fs-6">Medicine's Price :</span> {{$med->price}} Dh </p>
                                                                  <p class="fw-bold"><span class="text-secondary fw-bold fs-6">Medicine's Provider :</span> {{$med->Provider}} </p>
                                                                  <p class="fw-bold"><span class="text-secondary fw-bold fs-6">Medicine's Category :</span> {{$med->category->label}}</p>
                                                                  <p class="fw-bold"><span class="text-secondary fw-bold fs-6">Medicine's status :</span> {{ $med->status ? $med->status : 'No Information' }} </p>
                                                                  <p class="fw-bold"><span class="text-secondary fw-bold fs-6">Medicine's quantity :</span> {{$med->quantity}}</p>                               
                                                                  @endforeach
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