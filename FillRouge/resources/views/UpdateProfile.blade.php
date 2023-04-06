@extends('layouts.app')

@section('content')

        @include('sidebar')

    <section class="content_section" id="admin_settings_section">
           <div class="row m-4"> 
        <button class="p-3 shadow-sm d-flex bg-light justify-content-start align-items-center rounded border">
            <i class="uil uil-medkit fs-3 mycolor box rounded py-4 px-4 my-2 mx-4"></i>
            <div class="text-start">
                <h3 class="fs-2 mycolor">Account Settings</h3>
                <p class="fs-6 text-black mb-0">Edit your Account Details & Change Password</p>
            </div>
        </button>
    </div>
    <div class="row m-4">
        <button class="p-3 shadow-sm d-flex bg-light justify-content-start align-items-center rounded border">
            <i class="uil uil-eye fs-3 mycolor box rounded py-4 px-4 my-2 mx-4"></i>
            <div class="text-start">
                <h3 class="fs-2 mycolor">View Account Details</h3>
                <p class="fs-6 text-black mb-0">View Personal information About Your Accout</p>
            </div>
        </button>
    </div>
    <div class="row m-4">
        <button class="p-3 shadow-sm d-flex bg-light justify-content-start align-items-center rounded border" data-bs-toggle="modal" data-bs-target="#delete_account">
            <i class="uil uil-trash-alt fs-3 box text-danger rounded py-4 px-4 my-2 mx-4"></i>
            <div class="text-start">
                <h3 class="fs-2 text-danger">Delete Account</h3>
                <p class="fs-6 text-black mb-0">Will Permanently Remove your Account</p>
            </div>
        </button>
    </div>
</section>

<div class="modal fade" id="delete_account" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
			<div class="modal-dialog modal-sm">
				<div class="modal-content">
				<div class="modal-header">
					<h1 class="modal-title fs-5" id="d">Delete Account </h1>
					<button type="button"   class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body">
					<form action="includes/logout.php" method="post">
						<h4 class="text-danger">Confirm your Password to delete Account</h4>
					<input type="password" class="form-control mt-3" id="current_pass2"  placeholder="Current password" >
					<input type="hidden" id="hdn_session_pass2">
					<span class="text-danger mt-2" id="match_cc_none"style="display:none"> Password don't match The current password !</span>
				
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-danger my-3 mycolor button1 px-4" id="delete_acc" name="delete_acc">Delete</button>
				</div>
				</div>
                </form>
			</div>
</div>
@endsection