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
                <li class="breadcrumb-item active" aria-current="page">User Information</li>
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
					<form class="row g-4" method="POST" action="{{route('user.store')}}" enctype="multipart/form-data">
						@csrf
						<div class="col-xl-4">
							<label class="form-label" for="name">Name <span class="text-danger">*<span></label>
							<input type="text" class="form-control" id="name" name="name" placeholder="Name" required>
						</div>
						<div class="col-xl-4">
							<label class="form-label" for="mobile">Mobile <span class="text-danger">*<span></label>
							<input type="text" class="form-control" id="mobile" name="mobile" placeholder="Mobile" required>
						</div>
						<div class="col-xl-4">
							<label class="form-label" for="email">Email <span class="text-danger">*<span></label>
							<input type="text" class="form-control" id="email" name="email" placeholder="Email" required>
						</div>
						<div class="col-xl-4">
							<label class="form-label" for="nid">NID </label>
							<input type="text" class="form-control" id="nid" name="nid" placeholder="NID">
						</div>
						<div class="col-xl-4">
							<label class="form-label" for="passport">Passport </label>
							<input type="text" class="form-control" id="passport" name="passport" placeholder="Passport">
						</div>
						<div class="col-xl-4">
							<label class="form-label" for="address">Address </label>
							<input type="text" class="form-control" id="address" name="address" placeholder="Address">
						</div>
						<div class="col-xl-4">
							<label class="form-label">Gender </label>
							<select class="form-select single-select" id="gender" name="gender">
								<option value="0">-- Select --</option>
								<option value="Male">Male</option>
								<option value="Female">Female</option>
								<option value="Others">Others</option>
							</select>
						</div>
						<div class="col-xl-4">
							<label class="form-label">Blood Group </label>
							<select class="form-select single-select" id="blood_group" name="blood_group">
								<option value="0">-- Select --</option>
								<option value="A+">A+</option>
								<option value="A-">A-</option>
								<option value="B+">B+</option>
								<option value="B-">B-</option>
								<option value="AB+">AB+</option>
								<option value="AB-">AB-</option>
								<option value="O+">O+</option>
								<option value="O-">O-</option>
							</select>
						</div>
						<div class="col-xl-4">
							<label class="form-label">Religion </label>
							<select class="form-select single-select" id="religion" name="religion">
								<option value="0">-- Select --</option>
								<option value="Islam">Islam</option>
								<option value="Hinduism">Hinduism</option>
								<option value="Christianity">Christianity</option>
								<option value="Buddhism">Buddhism</option>
								<option value="Judaism">Judaism</option>
								<option value="Sikhism">Sikhism</option>
								<option value="Others">Others</option>
							</select>
						</div>
						<div class="col-xl-4">
							<label class="form-label" for="country_id">Country </label>
							<select class="form-select server-select country_id" id="country_id" name="country_id">
								<option value="0">-- Select Country --</option>											
							</select>
						</div>
						<div class="col-xl-4">
							<label class="form-label" for="city_id">City </label>
							<select class="form-select server-select city_id" id="city_id" name="city_id">
								<option value="0">-- Select City --</option>
							</select>
						</div>
						<div class="col-xl-4">
							<label class="form-label">Service <span class="text-danger">*<span></label>
							<select class="form-select single-select" id="service" name="service" required>
								<option value="0">-- Select --</option>
								<option value="Army">Army</option>
								<option value="Navy">Navy</option>
								<option value="Air">Air</option>
							</select>
						</div>
						<div class="col-xl-4">
							<label class="form-label">Date of Commission </label>
							<input type="date" class="form-control" placeholder="Date of Commission" id="date_of_commission" name="date_of_commission">
						</div>
						<div class="col-xl-4">
							<label class="form-label">Date of Join in DSCSC </label>
							<input type="date" class="form-control" placeholder="Date of Join in DSCSC" id="date_of_join_in_dscsc" name="date_of_join_in_dscsc">
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
							<label class="form-label">User Type <span class="text-danger">*<span></label>
							<select class="form-select single-select" id="user_type" name="user_type" required>
								<option value="0">-- Select Type --</option>
								<option value="Parmanent">Parmanent</option>
								<option value="Non-Parmanent">Non-Parmanent</option>
							</select>
						</div>
						<div class="col-xl-4">
							<label class="form-label">Role Assign <span class="text-danger">*<span></label>
							<select class="form-select single-select" id="role_id" name="role_id" required>
								<option value="0">-- Select --</option>
								@foreach ($roles as $role)
									<option value="{{$role->id}}">{{$role->name}}</option>
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
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="data-table" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th width="5%">#</th>
								<th>Name</th>
								<th>Mobile</th>
								<th>Email</th>
								<th>NID</th>
								<th>Passport</th>
								<th>Country</th>
								<th>City</th>
								<th>User Type</th>
                                <th width="5%" class="text-end">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                        </tbody>
                    </table>
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
            var table = $('#data-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('user.index') }}",
                columns: [
                    {data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false},
                    {data: 'name', name: 'name'},
                    {data: 'mobile', name: 'mobile'},
                    {data: 'email', name: 'email'},
                    {data: 'nid', name: 'nid'},
                    {data: 'passport', name: 'passport'},
                    {data: 'country.name', name: 'country.name'},
                    {data: 'city.name', name: 'city.name'},
                    {data: 'user_type', name: 'user_type'},
                    {data: 'action', name: 'action', className: 'text-end', orderable: false, searchable: false},
                ],
				dom: 'Bfrtip',
        		buttons: [{
							extend: 'csv',
							exportOptions: {
								columns: ':not(:last-child)' // exclude the last column (action)
							}
						},
						{
							extend: 'excel',
							exportOptions: {
								columns: ':not(:last-child)'
							}
						},
						{
							extend: 'pdf',
							exportOptions: {
								columns: ':not(:last-child)'
							}
						},
						{
							extend: 'print',
							exportOptions: {
								columns: ':not(:last-child)'
							}
						}]
            });
            $.fn.dataTable.ext.errMode = () => alert('Error while loading the table data. Please refresh');
                
        });
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
    </script>
@endpush