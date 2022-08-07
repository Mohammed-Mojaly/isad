@extends('admin.admin-app')
@section('content')
<style>#cont{ max-width: 60% !important; width: 70% !important;}@media  screen and (max-width: 991px) { #cont{ max-width: 90% !important; width: 90% !important;}}</style>

    <div class="mt-5">


        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Edit: {{$user->name}} </h4>
                </div>
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
                <div class="card-body">
                    <div class="basic-form">
                        <form class="form-valide-with-icon" action="{{route('users.update' , $user->id)}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')


                            <div class="mb-6">
                                <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Name</label>
                                <input type="text" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value="{{ old('name' , $user->name) }}" name="name" required>
                            </div>
                               <div class="mb-6">
                                <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Email address</label>
                                <input type="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" name="email" value="{{ old('email' , $user->email) }}" required>
                            </div>
                            <div class="mb-6">
                                <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Password</label>
                                <input type="password" id="password" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="•••••••••" minlength="8"  name="password"
                                >
                            </div>
                            <div class="mb-6">
                                <label  class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Permission</label>

                                <select style="height: auto" class="form-control default-select form-control-lg" tabindex="-98"
                                name="roles[]" required>

                                @foreach ($roles as $role)
                                    <option value="{{ $role }}" {{$role == $userRole ? 'selected' : ''}}>{{ $role }}</option>
                                @endforeach
                            </select>

                            </div>





                            <input type="hidden" name="userId" value="{{$user->id}}">


                            <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Save</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>



    </div>

@section('script')
<script>
//     $(document).ready(function() {
//        $(document).on('submit', 'form', function() {

//        $('button').attr('disabled', 'disabled');
//     //    $('button').html('');
//        $('button').append('  <i id="spinner" class="fas fa-circle-notch fa-spin"></i> ');
//    });
// });

</script>
@endsection

@endsection
