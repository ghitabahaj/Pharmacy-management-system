@extends('layouts.app')

@section('content')

        @include('sidebar')

    <section class="content_section" id="admin_settings_section">
           <div class="row m-4"> 
        <button class="p-3 shadow-sm d-flex bg-light justify-content-start align-items-center rounded border" data-bs-toggle="modal" data-bs-target="#update-profile">
            <i class="uil uil-medkit fs-3 mycolor box rounded py-4 px-4 my-2 mx-4"></i>
            <div class="text-start">
                <h3 class="fs-2 mycolor">Account Settings</h3>
                <p class="fs-6 text-black mb-0">Edit your Account Details & Change Password</p>
            </div>
        </button>
    </div>
    <div class="row m-4">
        <button class="p-3 shadow-sm d-flex bg-light justify-content-start align-items-center rounded border"  data-bs-toggle="modal" data-bs-target="#view-profile">
            <i class="uil uil-eye fs-3 mycolor box rounded py-4 px-4 my-2 mx-4"></i>
            <div class="text-start">
                <h3 class="fs-2 mycolor">View Account Details</h3>
                <p class="fs-6 text-black mb-0">View Personal information About Your Accout</p>
            </div>
        </button>
    </div>
</section>
                        <!-- view profile info -->
                                            <div class="modal fade" id="view-profile">
                                                        <div class="modal-dialog">
                                                            <div class="d-flex justify-content-around align-items-center bg-white p-3 rounded">
                                                                    <div >
                                                                    <img class="rounded-circle my-2" src="/img/user.png" width="100px" height="100px" alt="" srcset="">
                                                                        <p>Email : <span class="fw-bold">{{$data->name}}</span></p>
                                                                        <p>Name: <span class="fw-bold">{{$data->email}}</span></p>
                                                                    </div>
                                                            </div>
                                                        </div>
                                                    </div>

                        <!-- Update Profile -->
                                         <div class="modal fade" id="update-profile">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <form class="p-3" onclick="event.preventDefault();">
                                                                    <div class="d-flex align-items-center justify-content-center">
                                                                        <i class="uil uil-exclamation-triangle fs-1 text-danger me-3"></i>
                                                                        <p class="fw-bold pt-3">Wanna Update Your Profile?</p>
                                                                        </div>
                                                                        <div class="d-flex justify-content-around w-75 m-auto">
                                                                        <button  class="btn btn-light text-black m-2" data-bs-dismiss="modal">Cancel</button>
                                                                        <button  name="updatePass" class="btn btn-warning text-white m-2" data-bs-toggle="modal" data-bs-target="#update-password">Change Password</button>
                                                                        <button  name="updateEmail" class="btn btn-primary text-white m-2" data-bs-toggle="modal" data-bs-target="#update-email">Change Email/Name</button>
                                                                        </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                          </div>  
                     <!-- change password -->
                     
                     <div class="modal fade" id="update-password">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <form action="{{ route('UpdatePass'}}" method="POST" enctype="multipart/form-data" >
                                                            @csrf  
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="add-title">Update Password</h5>
                                                                    <a href="#" class="btn-close" data-bs-dismiss="modal"></a>
                                                                </div>
                                                                <div class="modal-body">
                                                                        <div class="mb-3">
                                                                            <label class="mt-3">Old Password</label>
                                                                            <input type="password" class="form-control" name="old_password" id="myInput">
                                                                        </div>
                                                                        <div class="mb-3">
                                                                        <label class="mt-3">New Password</label>
                                                                        <input type="password" class="form-control" name="new_password" id="myInput1">
                                                                        </div>
                                                                        <div class="mb-3">
                                                                        <label class="mt-3">Confirm Password</label>
                                                                         <input type="password" class="form-control" name="confirm_password" id="myInput2">
                                                                        </div>                                         
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <a href="#" class="btn btn-light" data-bs-dismiss="modal">Cancel</a>
                                                                    <button type="submit" name="updatePassword" class="btn btn-warning text-white" id="pass-update-btn">Update</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>

                     <!-- Change email -->
                     <div class="modal fade" id="update-email">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <form action="" method="POST" enctype="multipart/form-data" >
                                                            @csrf
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="add-title">Update Email / Name</h5>
                                                                    <a href="#" class="btn-close" data-bs-dismiss="modal"></a>
                                                                </div>
                                                                <div class="modal-body">
                                                                        <div class="mb-3">
                                                                        <label class="mt-3">Name</label>
                                                                        <input type="text" class="form-control" name="name" value={{$data->name}}>
                                                                        </div>
                                                                        <div class="mb-3">
                                                                        <label class="mt-3">Email</label>
                                                                        <input type="email" class="form-control" name="email" value={{$data->email}}>
                                                                        </div>                                                                                                  
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <a href="#" class="btn btn-light" data-bs-dismiss="modal">Cancel</a>
                                                                    <button type="submit" name="updateEmail" class="btn btn-warning text-white" id="email-update-btn">Update</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                        </div>



                                                
      

@endsection