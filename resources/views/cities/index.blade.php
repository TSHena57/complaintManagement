@extends('layouts.admin_app')
@section('title')
    Cities
@endsection

@section('content')

<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
    <div class="breadcrumb-title pe-3">General Setup</div>
    <div class="ps-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0 p-0">
                <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Cities</li>
            </ol>
        </nav>
    </div>
</div>
<div class="row">
    <div class="col-md-12">        
        <div class="card">
            <div class="card-body">
                <div class="border p-3 rounded">
                    <form class="row g-4" method="POST" action="{{route('cities.store')}}">
                        @csrf
                        <div class="col-xl-4">
                            <label class="form-label" for="country_id">Country <span class="text-danger">*</label>
                            <select class="form-select server-select country_id" id="country_id" name="country_id">
                                <option value="0">-- Select Country --</option>
                                
                            </select>
                        </div>
                        <div class="col-xl-4">
                            <label class="form-label" for="state_id">State <span class="text-danger">*</label>
                            <select class="form-select server-select state_id" id="state_id" name="state_id">
                                <option value="0">-- Select State --</option>
                            </select>
                        </div>
                        <div class="col-xl-4">
                            <div class="mb-3">
                                <label class="form-label" for="name">City Name <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" placeholder="City Name" id="name" name="name" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-3">
                                <div class="mt-3">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </div>
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
                                <th>Country</th>
                                <th>State</th>
                                <th>City Name</th>
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
<div id="ajaxDiv"></div>
@endsection
@push('scripts')
    <script type="text/javascript">
        $(function () { 
            "use strict";
            var table = $('#data-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('cities.index') }}",
                columns: [
                    {data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false},
                    {data: 'state.country.name', name: 'state.country.name'},
                    {data: 'state.name', name: 'state.name'},
                    {data: 'name', name: 'name'},
                    {data: 'action', name: 'action', className: 'text-end', orderable: false, searchable: false},
                ]
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
        $(".state_id").select2({
            ajax: {
                url: '{{route('state.list_for_select_ajax')}}',
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