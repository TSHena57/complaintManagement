@extends('layouts.admin_app')
@section('title')
    Complaints
@endsection
@section('content')
<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
    <div class="breadcrumb-title pe-3">Complaints</div>
    <div class="ps-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0 p-0">
                <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">My Complaints</li>
            </ol>
        </nav>
    </div>
</div>
<!--end breadcrumb-->
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="data-table" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th width="5%">#</th>
								<th>Title</th>
								<th>Address</th>
								<th>Status</th>
								<th>Submitted</th>
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
                ajax: "{{ route('complaint.my-index') }}",
                columns: [
                    {data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false},
                    {data: 'title', name: 'title'},
                    {data: 'address', name: 'address'},
                    {data: 'complaint_status', name: 'complaint_status'},
                    {data: 'created_at', name: 'created_at'},
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
    </script>
@endpush