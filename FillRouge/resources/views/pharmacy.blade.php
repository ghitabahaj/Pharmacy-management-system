@extends('layouts.app')

@section('content')

<div class="d-flex shadow-sm bg-light" id="wrapper" >
        <div class="bg-white" id="sidebar-wrapper">
            <div class="sidebar-heading text-center d-flex flex-column py-4 fs-5 border-bottom mt-5">
                <div class="d-flex align-items-center">
                    <img src="/img/user.png" width="40px" class="rounded-circle me-3" alt="">
                    <div>
                        <p style="margin:-5px;" class="fs-5"> {{ Auth::user()->name }}</p>
                        <p class="text-secondary fs-6"> {{ Auth::user()->email }}</p>
                    </div>
                </div>

                   <div>
                   <a  class="btn w-100 btn-light my-3 mycolor button1 fs-6" href="{{ route('logout') }}"  onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"> Log out</a>
                                                      <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                                       @csrf
                                                       </form>
                   </div>                
                </div>
            <form class="list-group list-group-flush " method="post" action="">
                <button class="list-group-item list-group-item-action  text-secondary "><i
                        class="uil uil-chart-bar fs-4 me-2 p-2"></i>dashboard</button>
                <button   class="list-group-item list-group-item-action text-success   fw-bold"><i
                        class="uil uil-heart-medical me-2 fs-4 p-2 text-success" ></i>Pharmacy</button>
                <button class="list-group-item list-group-item-action  fw-bold text-warning"><i
                        class="uil uil-shop me-2 fs-4 p-2 text-warning" ></i>City</button> 
                        <button class="list-group-item list-group-item-action fw-boldtext-secondary"><i
                        class="uil uil-receipt fs-4 me-2 p-2 text-secondary"></i>Invoices</button>       
                <button  class="list-group-item list-group-item-action  fw-bold text-primary"><i
                        class="uil uil-user-square me-2 fs-4 p-2 text-primary"></i>Update Account</button>
                <button class="list-group-item list-group-item-action fw-bold text-danger"><i
                        class="uil uil-users-alt fs-4 me-2 p-2 text-danger"></i>Give Roles</button> 
            </form>
            
        </div>
        <div id="page-content-wrapper" style="height: 100vh; overflow: scroll; overflow-x: hidden;">
        <nav class="navbar navbar-expand-lg navbar-light bg-transparent p-4 pt-1 justify-content-between" >
                <div class="d-flex align-items-center">
                    <i class="fas fa-align-left mycolor fs-2 mt-3" id="menu-toggle"></i>
            </div>
            <div class="d-flex align-items-center ms-auto">
                <div class="pt-3 me-3">
                  <p class="fs-6 text-secondary" style="margin-bottom: -5px;">Today's date</p>
                  <p class="fs-6 text-black fw-bold ms-1" id="current-date">
                  </p>
                </div>
                <i class="uil uil-calendar-alt fs-2 mt-1 box rounded p-2"></i>
            </div>
        </nav>


           <section id="doctors" class="container-fluid">

                     <h3  class="fw-bold mb-5" style="color: #007A69;"><i class="uil uil-medkit me-2 fs-4" ></i>Pharmacies</h3>
                     <div class="w-100 d-flex justify-content-around m-3 align-items-center py-2 ">
                            <div>
                                <label for="">Search : </label>
                                <input type="text" class="rounded border-0  px-4 ms-2" name="">
                            </div>
                         </div>
                    
                        <div class="d-flex justify-content-between">
                            <p class="fs-5 ms-2 fw-bold">All Pharmacies(1)</p>
                            <button class="btn btn-dark rounded-pill" data-bs-toggle="modal" data-bs-target="#modal-phar" id="add-doctor-btn"><i class="uil uil-plus text-white" onclick=""></i>&emsp; Add Pharamcy</button>
                        </div>
                         <div class="card-body table-responsive mt-2" style="height: 60vh; overflow: scroll;">
                                           <table class="table border-secondary text-center table-hover ">
                                            <tr class="">
                                                <td class="mycolor fw-bold ">Pharmacy Name</td>
                                                <td class="mycolor fw-bold">City / Location</td>
                                                <td class="mycolor fw-bold">Number Of Employees</td>
                                                <td class="mycolor fw-bold">Number Phone</td>
                                                <td class="mycolor fw-bold">Events</td>
                                            </tr> 
                                            <tr class="">
                                                <td class="text-dark">Pharmacy</td>
                                                <td class="text-dark">Safi</td>
                                                <td class="text-dark">5</td>
                                                <td class="text-dark">0564789834</td>
                                                <td class="text-dark">
                                                    <button class="btn btn-warning text-white rounded-pill" data-bs-toggle="modal" data-bs-target="#modal-phar" id="update-btn"><i class="text-white me-1 uil uil-pen"></i>Edit</button>
                                                    <button class="btn btn-light rounded-pill" data-bs-toggle="modal" data-bs-target="#view-phar" id="view-doctor-btn"><i class="text-dark me-1 uil uil-eye"></i>view</button>
                                                    <button class="btn btn-danger rounded-pill" data-bs-toggle="modal" data-bs-target="#remove-phar" id="remove-btn"><i class="text-white me-1 uil uil-trash"></i>remove</button>
                                                </td>
                                            </tr>     
                                           </table>
                            </div>
            </section>



             <div class="modal fade" id="modal-phar">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <form action="" method="POST" name="form_add_phar">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="add-title">Add New Pharmacy</h5>
                                    <a href="#" class="btn-close" data-bs-dismiss="modal"></a>
                                </div>
                                <div class="modal-body">
                                        <input type="hidden" id="pharmacy-id">
                                        <div class="mb-3">
                                            <label class="form-label">Pharmacy Name</label>
                                            <input type="text" name="doctorname" class="form-control" id="doctor-name"/>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Pharmacy City / location </label>
                                            <input type="text" name="pharCity" class="form-control" id="phar-city"/>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Number Of Employees</label>
                                            <input type="text" name="speciality" class="form-control" id="doctor-speciality"/>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Phone Number</label>
                                            <input type="text" name="doctornumber" class="form-control" id="doctornumber"/>
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


                <div class="modal fade" id="view-phar">
                    <div class="modal-dialog">
                         <div class="d-flex justify-content-around align-items-center bg-white p-3 rounded">
                                <div >
                                   <img class="rounded-circle" src="/img/pharlog.png" width="100px" height="100px" alt="" srcset="">
                                 </div>
                                <div>
                                    <p>Pharmacy Name : <span class="fw-bold">Pharmacy</span></p>
                                    <p>City / Location : <span class="fw-bold">Safi</span></p>
                                </div>
                                 <div>
                                   <p>Nulber Of Employees : <span class="fw-bold">5</span></p>
                                   <p>Number Phone : <span class="fw-bold">+212653436475</span></p>
                                 </div>
                           </div>
                     </div>
                </div>

@endsection