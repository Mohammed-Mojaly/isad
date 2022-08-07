@extends('admin.admin-app')
@section('content')

<style>#cont{ max-width: 60% !important; width: 70% !important;}@media  screen and (max-width: 991px) { #cont{ max-width: 90% !important; width: 90% !important;}}</style>



    <div class="mt-5">

        <div class="col-lg-12">
            <div class="card">
                <div class="flex"  style="justify-content: space-between;">
                    <h3 class="ml-3 mt-1 card-title text-xl font-bold">Permission management</h3>
                    {{-- @can('انشاء-الصلاحيات') --}}
                    <div class="text-end mt-2 mr-3">
                        <a href="{{ route('roles.create') }}" class="btn btn-info light">ِAdd Permission </a>

                    </div>
                        {{-- @endcan --}}
                    </div>
                <div class="card-body">
                    <div class="table-responsive table-hover">
                        <table class="table table-hover table-responsive-sm">
                            <thead>
                                <tr>
                                    <th><strong> name</strong></th>
                                    <th></th>
                                    <th>Operations</th>
                                </tr>
                            </thead>
                            <tbody>

                                @forelse ($roles as $role)
                                    <tr>
                                        <td>{{ $role->name }}</td>
                                        <td></td>
                                        <td>
                                            <div class="d-flex">

                                                {{-- @can('تعديل-الصلاحيات') --}}
                                                    <a href="{{ route('roles.show', $role->id) }}"
                                                        class="btn btn-info shadow btn-xs sharp mr-2"><i
                                                            class="fa fa-eye"></i></a>
                                                    <a href="{{ route('roles.edit', $role->id) }}"
                                                        class="btn btn-primary shadow btn-xs sharp mr-2"><i
                                                            class="fa fa-pencil"></i></a>
                                                {{-- @endcan --}}
                                                {{-- @can('حذف-الصلاحيات') --}}
                                                    <form method="POST" action="{{ route('roles.destroy', $role->id) }}">

                                                        @csrf

                                                        <input name="_method" type="hidden" value="DELETE">

                                                        <a type="submit"
                                                            class="btn btn-danger shadow bg-red-500 btn-xs  mr-2 show_confirm"
                                                            href="javascript:void(0);">
                                                            <i class="fa fa-trash"></i>
                                                        </a>

                                                    </form>
                                                {{-- @endcan --}}
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <p class="text-center"> Not found</p>
                                @endforelse

                            </tbody>
                        </table>

                        <div class="col-xl-12 mt-5">
                            {!! $roles->appends(request()->all())->links() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>




    @section('script')
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>

        <script>

            $('.show_confirm').click(function(event) {
            var form = $(this).closest("form");
            var name = $(this).data("name");
            event.preventDefault();
            swal.fire({
                    title: `Are youe sure?`,
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: '#283593',
                    cancelButtonColor: '#d33',
                    cancelButtonText: 'Cancel',
                    confirmButtonText: 'Yes'
                })
                .then((result) => {
                    if (result.isConfirmed) {
                        form.submit();
                    }
                });
        });
        </script>
    @endsection
@endsection
