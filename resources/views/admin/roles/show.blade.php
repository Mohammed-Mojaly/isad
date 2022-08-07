@extends('admin.admin-app')
@section('content')
<style>#cont{ max-width: 60% !important; width: 70% !important;}@media  screen and (max-width: 991px) { #cont{ max-width: 90% !important; width: 90% !important;}}</style>

    <div class="mt-5">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title"> Role Data</h4>
                    </div>
                <div class="card-body">
                  <div class="table-responsive table-hover">

                    <h3> {{ $role->name }}</h3>
                    </div>
                    @if (!empty($rolePermissions))
                    @foreach ($rolePermissions as $v)
                        <li style="list-style: circle">{{ $v->name }}</li>
                    @endforeach
                </div>
            @endif
            </div>
        </div>

    </div>
@endsection
