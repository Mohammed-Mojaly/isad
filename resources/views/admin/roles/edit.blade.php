@extends('admin.admin-app')
@section('content')
<style>#cont{ max-width: 60% !important; width: 70% !important;}@media  screen and (max-width: 991px) { #cont{ max-width: 90% !important; width: 90% !important;}}</style>

    <div class="mt-5">

        <div class="col-xl-12 col-lg-12">
            @if (count($errors) > 0)
            <div class="alert alert-danger">
                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">  Edit Role: <b>{{$role->name}}<b> </h4>
                </div>
                <div class="card-body">
                    <div class="">
                        <form  action="{{route('roles.update' , $role->id)}}" method="POST">
                            @csrf
                            @method('PATCH')

                            <div class="form-group row">
                                <div class="col-12 d-flex">
                                    <label class="col-form-label-lg mr-4">Name<span class="required_input">*</span> </label>
                                    <input type="text" name="name" required class="form-control form-control-md bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500"  value="{{ old('name' , $role->name) }}">

                                </div>
                            </div>

                            <div class="form-group">

                                <label class="col-form-label-lg mt-1">Permisstions:<span class="required_input">*</span> </label>

                                <div class="col-12 d-block p-3 shadow">

                                    @foreach ($permission as $value)
                                    <div class="form-check form-check-inline">
                                        <label class="form-check-label">
                                            <input type="checkbox" class="form-check-input" name="permission[]" value="{{ $value->id }}"  {{in_array($value->id, $rolePermissions) ? 'checked':''}} >{{ $value->name }}
                                        </label>
                                    </div>
                                    @endforeach
                                </div>

                            </div>
                            <button type="submit" class="mt-5 mr-2  d-flex p-2 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg">Save</button>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
