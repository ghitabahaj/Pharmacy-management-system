@extends('layouts.app')

@section('content')

      @include('super.supersidebar')

      <section id="invoices" class="container-fluid">

                <h3  class="fw-bold mb-5" style="color: #007A69;"><i class="uil uil-invoice me-2 fs-4" ></i>Invoices</h3>
                <div class="w-100 d-flex justify-content-around m-3 align-items-center py-2 ">
                      <div>
                        <label for="">Search : </label>
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
                    <p class="fs-5 ms-2 fw-bold">All Invoices({{$countInvoices}})</p>
                    <button class="btn btn-dark rounded-pill" data-bs-toggle="modal" data-bs-target="#modal-invoice" ><i class="uil uil-plus text-white" ></i>&emsp; Add Invoice</button>
                </div>
                    <div class="card-body table-responsive mt-2" style="height: 60vh; overflow: scroll;">
                                    <table class="table border-secondary text-center table-hover ">
                                    <thead>
                                        <td class="mycolor fw-bold ">Invoice's Number</td>
                                        <td class="mycolor fw-bold">Invoice's Date</td>
                                        <td class="mycolor fw-bold">Invoice's Medicaments</td>
                                        <td class="mycolor fw-bold">Invoice's Total</td>                               
                                        <td class="mycolor fw-bold">Events</td>
                                    </thead>
                                    @foreach ($invoices as $invoice) 
                                    <tr>  
                                        <td class="text-dark">{{$loop->iteration}}</td>
                                        <td class="text-dark">{{$invoice->date}}</td>
                                        <td class="text-dark">
                                        @foreach ($invoice->Medicine as $medicine)
                                            {{$medicine->label}} /
                                        @endforeach
                                        </td>
                                        <td class="text-dark">{{$invoice->total}}</td>
                                        <td class="text-dark">
                                            <button class="btn btn-danger rounded-pill" data-bs-toggle="modal" data-bs-target="#remove-invoice"><i class="text-white me-1 uil uil-trash"></i>remove</button>
                                        </td>
                                    </tr>  
                                    <!-- remove invoice -->
                                    <div class="modal fade" id="remove-invoice">
                                                                    <div class="modal-dialog">
                                                                        <div class="modal-content">
                                                                            <form action="" class="p-3">
                                                                                <div class="d-flex align-items-center justify-content-center">
                                                                                    <i class="uil uil-exclamation-triangle fs-1 text-danger me-3"></i>
                                                                                    <p class="fw-bold pt-3">Are you sure that you want to remove this <span class="text-danger"> Invoice</span>?</p>
                                                                                    </div>
                                                                                    <div class="d-flex justify-content-around w-75 m-auto">
                                                                                    <button type="submit" class="btn btn-white" data-bs-dismiss="modal">Cancel</button>
                                                                                    <button type="submit" class="btn text-white bg-danger" id="session-save-btn"><a style=" text-decoration: none; color:white "  href="{{route('deleteInvoice',$invoice->id)}}">remove</a></button>
                                                                                    </div>
                                                                            </form>
                                                                        </div>
                                                                    </div>
                                     </div>
                      @endforeach
                      <div class="modal fade" id="modal-invoice">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <form action="{{ url('CreateInvoice') }}" method="post" enctype="multipart/form-data">
                                                    @csrf
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="add-title">Create New Invoice</h5>
                                                            <a href="#" class="btn-close" data-bs-dismiss="modal"></a>
                                                        </div>
                                                        <div class="modal-body">                                      
                                                                <div class="mb-3">
                                                                    <label class="form-label">Client Name</label>
                                                                    <input type="text" name="clientName" class="form-control" />
                                                                </div>
                                                                <div class="mb-3" id="medicaments-container">
                                                                <select name="medicaments[]"  class="form-select" multiple>
                                                                    <option value="">Select a medicament</option>
                                                                    @foreach($medicaments as $medicament)
                                                                      @if($medicament->quantity > 0)
                                                                        <option value="{{ $medicament->id }}"> {{$medicament->label }}</option>
                                                                       @endif
                                                                    @endforeach
                                                                </select>
                                                                </div>
                                                         </div>
                                                        <div class="modal-footer">
                                                            <a href="#" class="btn btn-light" data-bs-dismiss="modal">Cancel</a>
                                                            <button type="submit" name="saveInvoice" class="btn btn-primary">Save</button>                  
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>

            <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>  
@endsection