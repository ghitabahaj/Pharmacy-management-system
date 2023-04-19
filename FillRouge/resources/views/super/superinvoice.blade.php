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
                                        <td class="text-dark">{{$invoice->total}} <span class="fw-bold">Dh</span></td>
                                        <td class="text-dark">
                                            <button class="btn btn-danger rounded-pill" data-bs-toggle="modal" data-bs-target="#remove-invoice{{$loop->iteration}}"><i class="text-white me-1 uil uil-trash"></i>remove</button>
                                        </td>
                                    </tr>  
                                    <!-- remove invoice -->
                                    <div class="modal fade" id="remove-invoice{{$loop->iteration}}">
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
                                                    <form action="{{ url('CreateInvoice') }}" method="post" enctype="multipart/form-data" id="invoice-form">
                                                    @csrf
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="add-title">Create New Invoice</h5>
                                                            <a href="#" class="btn-close" data-bs-dismiss="modal"></a>
                                                        </div>
                                                        <div class="modal-body">                                      
                                                                <div class="mb-3">
                                                                    <label class="form-label">Client Name</label>
                                                                    <input type="text" name="clientName" class="form-control" />
                                                                    <div class="invalid-feedback mt-2">RZRRR</div>
                                                                </div>                                                        
                                                                <div class="mb-3" id="medicaments-container">
                                                                    <label class="form-label">Select a medicament and enter the quantity</label>
                                                                    @foreach($mypharmacy->medicine as $med)
                                                                        @if($med->quantity > 0)
                                                                            <div class="mb-2">
                                                                                    <input type="checkbox" name="medicaments[]" value="{{ $med->id }}" class="form-check-input medicament-checkbox" />
                                                                                    <label class="form-check-label">{{ $med->label }}</label>
                                                                                <input type="number" name="quantities[]" class="form-control " min="1" max="{{ $med->quantity }}" />
                                                                            </div>
                                                                        @endif
                                                                    @endforeach
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
            <script>

                // document.querySelector('#invoice-form').addEventListener('submit', function(event) {

                //     var clientNameInput = document.querySelector('input[name="clientName"]');

                //     if (clientNameInput.value.trim() === '') {
                //         event.preventDefault(); 
                //         clientNameInput.classList.add('is-invalid');
                //         clientNameInput.parentElement.querySelector('.invalid-feedback').innerText = 'The client name field is required.'; 
                //     }
                //     else {
                //         clientNameInput.classList.remove('is-invalid'); 
                //         clientNameInput.parentElement.querySelector('.invalid-feedback').innerText = '';
                //     }

                //     var medicamentCheckboxes = document.querySelectorAll('input[name="medicaments[]"]');
                //     var quantityInputs = document.querySelectorAll('input[name="quantities[]"]');
                //     var atLeastOneChecked = false;

                //     for (var i = 0; i < medicamentCheckboxes.length; i++) {
                //         var medicamentCheckbox = medicamentCheckboxes[i];
                //         var quantityInput = quantityInputs[i];

                //         if (medicamentCheckbox.checked) {
                //           atLeastOneChecked = true;

                //         if (quantityInput.value.trim() === '') {
                //             event.preventDefault(); 
                //             medicamentCheckbox.classList.add('is-invalid'); 
                //             quantityInput.classList.add('is-invalid');
                //             medicamentCheckbox.parentElement.querySelector('.invalid-feedback').innerText = 'Please enter the quantity.'; 
                //         } else {
                //             medicamentCheckbox.classList.remove('is-invalid'); 
                //             quantityInput.classList.remove('is-invalid'); 
                //             medicamentCheckbox.parentElement.querySelector('.invalid-feedback').innerText = ''; 
                //         }
                //         }
                //     }
                //     if (!atLeastOneChecked) {
                //         event.preventDefault(); 
                //         medicamentCheckboxes[0].classList.add('is-invalid'); 
                //         medicamentCheckboxes[0].parentElement.querySelector('.invalid-feedback').innerText = 'Please select at least one medication.'; 
                //     } else {
                //         medicamentCheckboxes[0].classList.remove('is-invalid'); 
                //         medicamentCheckboxes[0].parentElement.querySelector('.invalid-feedback').innerText = ''; 
                //     }
                //     });
    
       </script> 

@endsection