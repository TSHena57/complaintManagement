@extends('layouts.admin_app')
@section('title')
    User Information
@endsection
@section('content')
<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
    <div class="breadcrumb-title pe-3">User Management/System Setting</div>
    <div class="ps-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0 p-0">
                <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Edit User Information</li>
            </ol>
        </nav>
    </div>
</div>
<!--end breadcrumb-->
<div class="row">
	<div class="col-xl-12 mx-auto">
		<div class="card">
			<div class="card-body">
				<div class="border p-3 rounded">
					<form class="row g-4" method="POST" action="{{route('user.update', $user->id)}}" enctype="multipart/form-data">
						@csrf
						<div class="col-xl-4">
							<label class="form-label" for="name">Name <span class="text-danger">*</span></label>
							<input type="text" class="form-control" id="name" name="name" placeholder="Name" value="{{$user->name}}" required>
						</div>
						<div class="col-xl-4">
							<label class="form-label" for="mobile">Mobile <span class="text-danger">*</span></label>
							<input type="text" class="form-control" id="mobile" name="mobile" placeholder="Mobile" value="{{$user->mobile}}" required>
						</div>
						<div class="col-xl-4">
							<label class="form-label" for="email">Email <span class="text-danger">*</span></label>
							<input type="text" class="form-control" id="email" name="email" placeholder="Email" value="{{$user->email}}" required>
						</div>
						<div class="col-xl-4">
							<label class="form-label" for="nid">NID </label>
							<input type="text" class="form-control" id="nid" name="nid" placeholder="NID" value="{{$user->nid}}">
						</div>
						<div class="col-xl-4">
							<label class="form-label" for="passport">Passport </label>
							<input type="text" class="form-control" id="passport" name="passport" placeholder="Passport" value="{{$user->passport}}">
						</div>
						<div class="col-xl-4">
							<label class="form-label" for="address">Address </label>
							<input type="text" class="form-control" id="address" name="address" placeholder="Address" value="{{$user->address}}">
						</div>
						<div class="col-xl-4">
							<label class="form-label">Gender </label>
							<select class="form-select single-select" id="gender" name="gender">
								<option value="0">-- Select --</option>
								<option value="Male" @selected($user->gender == "Male")>Male</option>
								<option value="Female" @selected($user->gender == "Female")>Female</option>
								<option value="Others" @selected($user->gender == "Others")>Others</option>
							</select>
						</div>
						<div class="col-xl-4">
							<label class="form-label">Blood Group </label>
							<select class="form-select single-select" id="blood_group" name="blood_group">
								<option value="0">-- Select --</option>
								<option value="A+" @selected($user->blood_group == "A+")>A+</option>
								<option value="A-" @selected($user->blood_group == "A-")>A-</option>
								<option value="B+" @selected($user->blood_group == "B+")>B+</option>
								<option value="B-" @selected($user->blood_group == "B-")>B-</option>
								<option value="AB+" @selected($user->blood_group == "AB+")>AB+</option>
								<option value="AB-" @selected($user->blood_group == "AB-")>AB-</option>
								<option value="O+" @selected($user->blood_group == "O+")>O+</option>
								<option value="O-" @selected($user->blood_group == "O-")>O-</option>
							</select>
						</div>
						<div class="col-xl-4">
							<label class="form-label">Religion </label>
							<select class="form-select single-select" id="religion" name="religion">
								<option value="0">-- Select --</option>
								<option value="Islam" @selected($user->religion == "Islam")>Islam</option>
                                <option value="Hinduism" @selected($user->religion == "Hinduism")>Hinduism</option>
                                <option value="Christianity" @selected($user->religion == "Christianity")>Christianity</option>
                                <option value="Buddhism" @selected($user->religion == "Buddhism")>Buddhism</option>
                                <option value="Judaism" @selected($user->religion == "Judaism")>Judaism</option>
                                <option value="Sikhism" @selected($user->religion == "Sikhism")>Sikhism</option>
                                <option value="Others" @selected($user->religion == "Others")>Others</option>

							</select>
						</div>
						<div class="col-xl-4">
							<label class="form-label" for="country_id">Country </label>
							<select class="form-select server-select country_id" id="country_id" name="country_id">
								<option value="{{$user->country_id}}">{{$user->country->name}}</option>											
							</select>
						</div>
						<div class="col-xl-4">
							<label class="form-label" for="city_id">City </label>
							<select class="form-select server-select city_id" id="city_id" name="city_id">
								<option value="{{$user->city_id}}">{{$user->city->name}}</option>				
							</select>
						</div>
						<div class="col-xl-4">
							<label class="form-label">Service </label>
							<select class="form-select single-select" id="service" name="service">
								<option value="Army" @selected($user->service == "Army")>Army</option>
								<option value="Navy" @selected($user->service == "Navy")>Navy</option>
								<option value="Air" @selected($user->service == "Air")>Air</option>
							</select>
						</div>
						<div class="col-xl-4">
							<label class="form-label">Rank </label>
							<select class="form-select single-select" id="rank_id" name="rank_id">
								@foreach ($ranks as $rank)
									<option value="{{$rank->id}}" @selected($user->rank_id == $rank->id)>{{$rank->name}}</option>
								@endforeach
							</select>
						</div>
						<div class="col-xl-4">
							<label class="form-label">Appointment Classification </label>
							<select class="form-select single-select" id="appointment_classification_id" name="appointment_classification_id">
								@foreach ($appontments as $appontment)
									<option value="{{$appontment->id}}" @selected($user->appointment_classification_id == $appontment->id)>{{$appontment->name}}</option>
								@endforeach
							</select>
						</div>
						<div class="col-xl-4">
							<label class="form-label">Date of Commission </label>
							<input type="date" class="form-control" placeholder="Date of Commission" id="date_of_commission" name="date_of_commission" value="{{$user->date_of_commission}}">
						</div>
						<div class="col-xl-4">
							<label class="form-label">Date of Join in DSCSC </label>
							<input type="date" class="form-control" placeholder="Date of Join in DSCSC" id="date_of_join_in_dscsc" name="date_of_join_in_dscsc" value="{{$user->date_of_join_in_dscsc}}">
						</div>
						<div class="col-xl-4">
							<label class="form-label">Photo </label>
							<input class="form-control" type="file" id="formFile" name="photo">
						</div>
						<div class="col-xl-4">
							<label class="form-label">Password </label>
							<input type="password" class="form-control" id="signature" name="password">
						</div>
						<div class="col-xl-4">
							<label class="form-label">Signature </label>
							<input class="form-control" type="file" id="signature" name="signature">
						</div>
						<div class="col-xl-4">
							<label class="form-label">User Type </label>
							<select class="form-select single-select" id="user_type" name="user_type">
								<option value="0">-- Select Type --</option>
								<option value="Parmanent" @selected($user->user_type == "Parmanent")>Parmanent</option>
								<option value="Non-Parmanent" @selected($user->user_type == "Non-Parmanent")>Non-Parmanent</option>
							</select>
						</div>
						<div class="col-xl-4">
							<label class="form-label">Role Assign </label>
							<select class="form-select single-select" id="role_id" name="role_id">
								<option value="0">-- Select --</option>
								@foreach ($roles as $role)
									<option value="{{$role->id}}" @selected($user->role_id == $role->id)>{{$role->name}}</option>
								@endforeach
							</select>
						</div>

						<div class="submit text-end">
							<button type="Submit" class="btn btn-primary px-5">Submit</button>
						</div>
					</form>

				</div>
			</div>
		</div>
	</div>
</div>
@endsection
@push('scripts')
    <script type="text/javascript">
        $(function () { 
            "use strict";
            $(".country_id").select2({
                ajax: {
                    url: '{{route('country.list_for_select_ajax')}}',
                    type: "get",
                    dataType: 'json',
                    delay: 250,
                    data: function (params) {
                            var query = {
                                search: params.term,
                                page: params.page || 1,
                            }
                            return query;
                    },
                    cache: false
                },
                escapeMarkup: function (m) {
                    return m;
                }
            });
            $(".city_id").select2({
                ajax: {
                    url: '{{route('cities.list_for_select_ajax')}}',
                    type: "get",
                    dataType: 'json',
                    delay: 250,
                    data: function (params) {
                            var query = {
                                search: params.term,
                                page: params.page || 1,
                                country_id: $('#country_id').val(),
                            }
                            return query;
                    },
                    cache: false
                },
                escapeMarkup: function (m) {
                    return m;
                }
            });
                
        });
    </script>
@endpush