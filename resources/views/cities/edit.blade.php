@extends('layouts.admin_app')
@section('title')
    Edit City
@endsection
@section('content')

<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
    <div class="breadcrumb-title pe-3">General Setup</div>
    <div class="ps-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0 p-0">
                <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Edit City</li>
            </ol>
        </nav>
    </div>
</div>
<div class="row">
    <div class="col-md-12">        
        <div class="card">
            <div class="card-body">
                <div class="border p-3 rounded">
                    <form class="row g-4" method="POST" action="{{route('cities.update', $city->id)}}">
                        @csrf
                        <div class="col-xl-4">
                            <label class="form-label" for="country_id">Country <span class="text-danger">*</label>
                            <select class="form-select server-select country_id" id="country_id" name="country_id">
                                <option value="{{$city->state->country_id}}">{{$city->state->country->name}}</option>
                                
                            </select>
                        </div>
                        <div class="col-xl-4">
                            <label class="form-label" for="state_id">State <span class="text-danger">*</label>
                            <select class="form-select server-select state_id" id="state_id" name="state_id">
                                <option value="{{$city->state_id}}">{{$city->state->name}}</option>
                            </select>
                        </div>
                        <div class="col-xl-4">
                            <div class="mb-3">
                                <label class="form-label" for="name">City Name <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" placeholder="City Name" id="name" name="name" value="{{$city->name}}" required>
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
</div>
@endsection
@push('scripts')
    <script type="text/javascript">
        
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