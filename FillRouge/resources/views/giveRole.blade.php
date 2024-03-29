@extends('layouts.app')

@section('content')

      @include('sidebar')

<section id="users" class="container-fluid">

<h3  class="fw-bold mb-5" style="color: #007A69;"><i class="uil uil-users-alt me-2 fs-4" ></i>Users</h3>
<div class="w-100 d-flex justify-content-around m-3 align-items-center py-2 ">
       <div>
           <label for="">Search : </label>
           <input type="text" class="rounded border-0  px-4 ms-2" >
       </div>
    </div>

   <div class="d-flex justify-content-between">
       <p class="fs-5 ms-2 fw-bold">All Users({{$usersCount}})</p>
   </div>
    <div class="card-body table-responsive mt-2" style="height: 60vh; overflow: scroll;">
                      <table class="table border-secondary text-center table-hover ">
                       <thead>
                           <td class="mycolor fw-bold ">User's Name</td>
                           <td class="mycolor fw-bold">User's Email</td>
                           <td class="mycolor fw-bold">User's Role</td>
                           <td class="mycolor fw-bold">User's Pharmacy</td>                               
                           <td class="mycolor fw-bold">Events</td>
                       </thead>
                       @foreach ($users as $user)   
                       <tr>  
                           <td class="text-dark">{{$user->name}}</td>
                           <td class="text-dark">{{$user->email}}</td>
                           <td class="text-dark">{{$user->role->name}}</td>
                           <td class="text-dark">{{ $user->pharmacy ? $user->pharmacy->name : 'No pharmacy' }}</td>
                           <td class="text-dark">
                               <button class="btn btn-warning text-white rounded-pill" data-bs-toggle="modal" data-bs-target="#update-user-role{{$loop->iteration}}"><i class="text-white me-1 uil uil-pen"></i>Edit</button>
                               <button class="btn btn-danger rounded-pill" data-bs-toggle="modal" data-bs-target="#remove-user{{$loop->iteration}}"><i class="text-white me-1 uil uil-trash"></i>remove</button>
                           </td>
                       </tr>  
                       <!-- remove user -->
                       <div class="modal fade" id="remove-user{{$loop->iteration}}">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <form action="" class="p-3">
                                                                <div class="d-flex align-items-center justify-content-center">
                                                                    <i class="uil uil-exclamation-triangle fs-1 text-danger me-3"></i>
                                                                    <p class="fw-bold pt-3">Are you sure that you want to remove this <span class="text-danger"> Super Admin</span>?</p>
                                                                    </div>
                                                                    <div class="d-flex justify-content-around w-75 m-auto">
                                                                    <button type="submit" class="btn btn-white" data-bs-dismiss="modal">Cancel</button>
                                                                    <button type="submit" class="btn text-white bg-danger" id="session-save-btn"><a style=" text-decoration: none; color:white "  href="{{route('deleteUser',$user->id)}}">remove</a></button>
                                                                    </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                            </div>
                        <!-- change Role -->
                        <div class="modal fade" id="update-user-role{{$loop->iteration}}">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <form action="{{ route('ChangeRole',$user->id) }}" method="POST" enctype="multipart/form-data">
                                                    @csrf
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="add-title">Update User's Role</h5>
                                                            <a href="#" class="btn-close" data-bs-dismiss="modal"></a>
                                                        </div>
                                                        <div class="modal-body">
                                                                <div class="mb-3">
                                                                    <label class="form-label"> Name</label>
                                                                    <input type="text" name="name" class="form-control" id="name" value="{{$user->name}}" disabled/>
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label class="form-label">Change User's Role</label>
                                                                    <select class="form-select" name="role_id" required>
                                                                            <option value="{{$user->role->id}}" selected>{{$user->role->name}}</option>
                                                                            @foreach ($roles as $role) 
                                                                            <option value="{{$role->id}}">{{$role->name}}</option>
                                                                            @endforeach
                                                                    </select>
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label class="form-label">User's Email</label>
                                                                    <input type="text" name="email" class="form-control" value="{{$user->email}}" disabled/>
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label class="form-label">User's Pharmacy</label>
                                                                    <select class="form-select" name="pharmacy_id" required>
                                                                        <option value="{{ $user->pharmacy ? $user->pharmacy->id : null }}" selected>{{ $user->pharmacy ? $user->pharmacy->name : 'No pharmacy' }}</option>
                                                                        @foreach ($pharmacies as $phar) 
                                                                              <option value="{{$phar->id}}">{{$phar->name}}</option>
                                                                        @endforeach
                                                                        <option value="null">No Pharmacy</option>
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

      
                    @endforeach


      
@endsection