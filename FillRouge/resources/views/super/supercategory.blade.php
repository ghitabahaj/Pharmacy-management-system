@extends('layouts.app')

@section('content')

      @include('super.supersidebar')

    <section id="categories" class="container-fluid">

                    <h3  class="fw-bold mb-5" style="color: #007A69;"><i class="uil uil-shop me-2 fs-4" ></i>Categories</h3>
                    <div class="w-100 d-flex justify-content-around m-3 align-items-center py-2 ">
                        <div>
                            <label>Search : </label>
                            <input type="text" class="rounded border-0  px-4 ms-2" >
                        </div>
                        </div>

                    <div class="d-flex justify-content-between">
                        <p class="fs-5 ms-2 fw-bold">All Categories({{$countCategories}})</p>
                        <button class="btn btn-dark rounded-pill" data-bs-toggle="modal" data-bs-target="#modal-category" ><i class="uil uil-plus text-white"></i>&emsp; Add Category</button>
                    </div>
                        <div class="card-body table-responsive mt-2" style="height: 60vh; overflow: scroll;">
                                        <table class="table border-secondary text-center table-hover ">
                                        <thead>
                                            <td class="mycolor fw-bold ">Category id</td>
                                            <td class="mycolor fw-bold">Category Name</td>                            
                                            <td class="mycolor fw-bold">Events</td>
                                        </thead>  
                                           
                                        <tr>
                                        @foreach ($categories as $category) 
                                            <td class="text-dark">{{$loop->iteration}}</td>
                                            <td class="text-dark">{{$category->label}}</td>
                                            <td class="text-dark">
                                                <button class="btn btn-warning text-white rounded-pill" data-bs-toggle="modal" data-bs-target="#update-category{{$loop->iteration}}" ><i class="text-white me-1 uil uil-pen"></i>Edit</button>
                                                <button class="btn btn-light rounded-pill" data-bs-toggle="modal" data-bs-target="#view-category{{$loop->iteration}}"  ><i class="text-dark me-1 uil uil-eye"></i>view</button>
                                                <button class="btn btn-danger rounded-pill" data-bs-toggle="modal" data-bs-target="#remove-category{{$loop->iteration}}" ><i class="text-white me-1 uil uil-trash"></i>remove</button>
                                            </td>
                                        </tr>  
                                        <!-- view modal  -->

                                                <div class="modal fade" id="view-category{{$loop->iteration}}">
                                                    <div class="modal-dialog">
                                                        <div class="d-flex justify-content-around align-items-center bg-white p-3 rounded">
                                                                <div >
                                                                <img class="rounded-circle" src="/img/cat.jpg" width="100px" height="100px">
                                                                 <div>
                                                                    <p>Category Id : <span class="fw-bold">{{$loop->iteration}}</span></p>
                                                                    <p>Category Name: <span class="fw-bold">{{$category->label}}</span></p>
                                                                </div> 
                                                            </div>     
                                                        </div>
                                                    </div>
                                                </div>



                                                <!--  remove modal  -->
                                                <div class="modal fade" id="remove-category{{$loop->iteration}}">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <form class="p-3">
                                                                <div class="d-flex align-items-center justify-content-center">
                                                                    <i class="uil uil-exclamation-triangle fs-1 text-danger me-3"></i>
                                                                    <p class="fw-bold pt-3">Are you sure that you want to remove this Category?</p>
                                                                    </div>
                                                                    <div class="d-flex justify-content-around w-75 m-auto">
                                                                    <button type="submit" class="btn btn-white" data-bs-dismiss="modal">Cancel</button>
                                                                    <button type="submit" name="deleteCategory" class="btn text-white bg-danger" id="remove-category"><a  style=" text-decoration: none; color:white "  href="{{route('deleteCategory',$category->id)}}">remove</a></button>
                                                                    </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                            </div>         

                                            <!-- edit modal -->

                                            <div class="modal fade" id="update-category{{$loop->iteration}}">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <form action="" method="POST" enctype="multipart/form-data" name="form_update_city">
                                                        @csrf
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="add-title">Update Category</h5>
                                                                <a href="#" class="btn-close" data-bs-dismiss="modal"></a>
                                                            </div>
                                                            <div class="modal-body">
                                                                    <div class="mb-3">
                                                                        <label class="form-label">Category Name</label>
                                                                        <input type="text" name="label" class="form-control" id="category-name" value="{{$category->label}}"/>
                                                                    </div>                                                                
                                                            </div>
                                                            <div class="modal-footer">
                                                                <a href="#" class="btn btn-light" data-bs-dismiss="modal">Cancel</a>
                                                                <button type="submit" name="updateCategory" class="btn btn-warning text-white" id="category-update-btn">Update</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                            @endforeach   
                                    </table>
                        </div>
                    </section>



                    <!-- add modal -->
                    <div class="modal fade" id="modal-category">
                    <div class="modal-dialog">
                    <div class="modal-content">
                        <form action="{{ url('addCategory') }}" method="POST" enctype="multipart/form-data" name="form_add_category">
                        @csrf
                            <div class="modal-header">
                                <h5 class="modal-title" id="add-title">Add New Category</h5>
                                <a href="#" class="btn-close" data-bs-dismiss="modal"></a>
                            </div>
                            <div class="modal-body">
                                    <div class="mb-3">
                                        <label class="form-label">Categry Name</label>
                                        <input type="text" name="label" class="form-control" id="category-name"/>
                                    </div>                      
                            </div>
                            <div class="modal-footer">
                                <a href="#" class="btn btn-light" data-bs-dismiss="modal">Cancel</a>
                                <button type="submit" name="saveCategory" class="btn btn-primary" id="category-save-btn">Save</button>
                            </div>
                        </form>
                    </div>
                    </div>
                    </div>

 @endsection      