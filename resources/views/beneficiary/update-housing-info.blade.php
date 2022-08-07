<x-app-layout>

    <div class="p-5 mt-5">



        @if (Session::has('status'))
            @if (Session::get('status') == true)
                <div class="p-4 mb-4 text-sm text-center text-green-700 bg-green-100 rounded-lg dark:bg-green-200 dark:text-green-800"
                    role="alert">
                    <span class="font-medium">Success alert!</span> Updated successfully
                </div>
            @else
                <div class="p-4 mb-4 text-sm text-red-700 bg-red-100 rounded-lg dark:bg-red-200 dark:text-red-800"
                    role="alert">
                    <span class="font-medium">Danger alert!</span> Something was wrong
                </div>
            @endif

        @endif


        <div class="bg-white p-5 rounded-md text-2xl font-bold text-center">
            <h3>Update housing information</h3>
        </div>

        <form action="{{ route('user.edit_housing_info') }}" class="bg-white p-4 mt-4 rounded-md" name="house_info"
            method="POST" enctype="multipart/form-data">
            @csrf

            <input type="hidden" name="id" value="{{ $beneficiary_house->id }}">
            <div class="grid md:grid-cols-3 md:gap-6">

                <div class="relative z-0 mb-6 w-full group">
                    <select id="housing_type" name="housing_type"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
                        <option selected disabled value="">Housing type..</option>
                        @forelse ($housingtypes as $housingtype)
                            <option value="{{ $housingtype }}"
                                {{ $housingtype == $beneficiary_house->housing_type ? 'selected' : '' }}>
                                {{ $housingtype }} </option>
                        @empty
                        @endforelse
                    </select>
                    @error('housing_type')
                        <span class="text-red-500">{{ $message }}</span>
                    @enderror
                </div>

                <div class="relative z-0 mb-6 w-full group">
                    <select id="housing_ownership" name="housing_ownership"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
                        <option selected disabled value="">Housing ownership..</option>
                        @forelse ($housingownerships as $housingownership)
                            <option value="{{ $housingownership }}"
                                {{ $housingownership == $beneficiary_house->housing_ownership ? 'selected' : '' }}>
                                {{ $housingownership }} </option>
                        @empty
                        @endforelse
                    </select>
                    @error('housing_ownership')
                        <span class="text-red-500">{{ $message }}</span>
                    @enderror
                </div>

                <div class="relative z-0 mb-6 w-full group">
                    <select id="rent_payment_method" name="rent_payment_method"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
                        <option selected disabled value="">Rent payment method..</option>
                        @forelse ($paymentmethods as $paymentmethod)
                            <option value="{{ $paymentmethod }}"
                                {{ $paymentmethod == $beneficiary_house->rent_payment_method ? 'selected' : '' }}>
                                {{ $paymentmethod }} </option>
                        @empty
                        @endforelse
                    </select>
                    @error('rent_payment_method')
                        <span class="text-red-500">{{ $message }}</span>
                    @enderror
                </div>

            </div>

            <div class="grid md:grid-cols-3 md:gap-6">
                <div class="relative z-0 mb-6 w-full group">
                    <input type="number" name="value_rent" id="value_rent"
                        class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none  focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                        placeholder=" " value="{{ old('value_rent', $beneficiary_house->value_rent) }}" min="0"
                        max="100000">
                    <label for="value_rent"
                        class="peer-focus:font-medium absolute text-sm text-gray-500  duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Value
                        rent</label>
                    @error('value_rent')
                        <span class="text-red-500">{{ $message }}</span>
                    @enderror
                </div>
                <div class="relative z-0 mb-6 w-full group">
                    <input type="date" name="rent_expiry_date" id="rent_expiry_date"
                        class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none  focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                        placeholder="dd-mm-yyyy"
                        value="{{ old('rent_expiry_date', $beneficiary_house->rent_expiry_date) }}">
                    <label for="rent_expiry_date"
                        class="peer-focus:font-medium absolute text-sm text-gray-500  duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Rent
                        expiry date</label>
                    @error('rent_expiry_date')
                        <span class="text-red-500">{{ $message }}</span>
                    @enderror
                </div>
                <div class="relative z-0 mb-6 w-full group">
                    <input type="text" name="house_owner_name" id="house_owner_name"
                        class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none  focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                        placeholder=" " value="{{ old('house_owner_name', $beneficiary_house->house_owner_name) }}">
                    <label for="house_owner_name"
                        class="peer-focus:font-medium absolute text-sm text-gray-500  duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">House
                        owner name</label>
                    @error('house_owner_name')
                        <span class="text-red-500">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div class="grid md:grid-cols-3 md:gap-6">

                <div class="relative z-0 mb-6 w-full group">
                    <input type="text" name="city_you_livein" id="city_you_livein"
                        class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none  focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                        placeholder=" " value="{{ old('city_you_livein', $beneficiary_house->city_you_livein) }}">
                    <label for="city_you_livein"
                        class="peer-focus:font-medium absolute text-sm text-gray-500  duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">The
                        city you live in</label>
                    @error('city_you_livein')
                        <span class="text-red-500">{{ $message }}</span>
                    @enderror
                </div>
                <div class="relative z-0 mb-6 w-full group">
                    <input type="text" name="neighborhood_livein" id="neighborhood_livein"
                        class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none  focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                        placeholder=" "
                        value="{{ old('neighborhood_livein', $beneficiary_house->neighborhood_livein) }}">
                    <label for="neighborhood_livein"
                        class="peer-focus:font-medium absolute text-sm text-gray-500  duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">The
                        neighborhood you live in</label>
                    @error('neighborhood_livein')
                        <span class="text-red-500">{{ $message }}</span>
                    @enderror
                </div>

            </div>

            <div class="grid md:grid-cols-2 md:gap-6 mt-3">

                <div class="relative z-0 mb-6 w-full group">
                    <label for="checked-toggle" class="inline-flex relative items-center mb-4 cursor-pointer">
                        <input type="checkbox"
                            value="{{ old('live_one_relatives_his_house_partment', $beneficiary_house->live_one_relatives_his_house_partment) }}"
                            name="live_one_relatives_his_house_partment" id="checked-toggle" class="sr-only peer"
                            @checked(old('live_one_relatives_his_house_partment', $beneficiary_house->live_one_relatives_his_house_partment))>
                        <div
                            class="absolute w-11 h-6  bg-gray-200 rounded-full peer peer-focus:ring-4 peer-focus:ring-blue-300  peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all  peer-checked:bg-blue-600">
                        </div>
                        <span class="ml-16 text-sm font-medium text-gray-900">Do you live with one of your relatives in
                            his house or apartment</span>
                    </label>
                    @error('live_one_relatives_his_house_partment')
                        <span class="text-red-500">{{ $message }}</span>
                    @enderror
                </div>

                <div class="relative z-0 mb-6 w-full group">
                    <label for="checked-toggle1" class="inline-flex relative items-center mb-4 cursor-pointer">
                        <input type="checkbox"
                            value="{{ old('you_eligible_housing_support_Sakani_program_Ministry_Housing', $beneficiary_house->you_eligible_housing_support_Sakani_program_Ministry_Housing) }}"
                            name="you_eligible_housing_support_Sakani_program_Ministry_Housing" id="checked-toggle1"
                            class="sr-only peer" @checked(old(
                                    'you_eligible_housing_support_Sakani_program_Ministry_Housing',
                                    $beneficiary_house->you_eligible_housing_support_Sakani_program_Ministry_Housing
                                ))>
                        <div
                            class="absolute w-11 h-6  bg-gray-200 rounded-full peer peer-focus:ring-4 peer-focus:ring-blue-300  peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all  peer-checked:bg-blue-600">
                        </div>
                        <span class="ml-16 text-sm font-medium text-gray-900">Are you eligible for housing support in
                            the "Sakani" program of the Ministry of Housing</span>
                    </label>
                    @error('you_eligible_housing_support_Sakani_program_Ministry_Housing')
                        <span class="text-red-500">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <h2 class="mb-5 text-xl">Accommodation photos</h2>
            <div class="mb-4 grid md:grid-cols-2 md:gap-6 mt-1">
                <input id="img_1" name="img_1" class="text-sm max-h-[42px] text-gray-900 bg-gray-50 rounded-lg border border-gray-300 cursor-pointer focus:outline-none"  type="file" accept=".jpg, .jpeg, .png, .bmp, .gif">
                @error('img_1') <span class="text-red-500">{{ $message }}</span>@enderror
                <img src="/tmp/uploads/{{json_decode($beneficiary_house->accommodation_photos)->img_1 ?? ''}}" width="150" alt="">
            </div>
            <div class="mb-4 grid md:grid-cols-2 md:gap-6 mt-1">
                <input id="img_2" name="img_2" class="text-sm max-h-[42px] text-gray-900 bg-gray-50 rounded-lg border border-gray-300 cursor-pointer focus:outline-none"  type="file" accept=".jpg, .jpeg, .png, .bmp, .gif">
                @error('img_2') <span class="text-red-500">{{ $message }}</span>@enderror
                <img src="/tmp/uploads/{{json_decode($beneficiary_house->accommodation_photos)->img_2 ?? ''}}" width="150" alt="">
            </div>
            <div class="mb-4 grid md:grid-cols-2 md:gap-6 mt-1">
                <input id="img_3" name="img_3" class="text-sm max-h-[42px] text-gray-900 bg-gray-50 rounded-lg border border-gray-300 cursor-pointer focus:outline-none"  type="file" accept=".jpg, .jpeg, .png, .bmp, .gif">
                @error('img_3') <span class="text-red-500">{{ $message }}</span>@enderror
                <img src="/tmp/uploads/{{json_decode($beneficiary_house->accommodation_photos)->img_3 ?? ''}}" width="150" alt="">
            </div>
            <div class="mb-4 grid md:grid-cols-2 md:gap-6 mt-1">
                <input id="img_4" name="img_4" class="text-sm max-h-[42px] text-gray-900 bg-gray-50 rounded-lg border border-gray-300 cursor-pointer focus:outline-none"  type="file" accept=".jpg, .jpeg, .png, .bmp, .gif">
                @error('img_4') <span class="text-red-500">{{ $message }}</span>@enderror
                <img src="/tmp/uploads/{{json_decode($beneficiary_house->accommodation_photos)->img_4 ?? ''}}" width="150" alt="">
            </div>
            <button type="submit"
                class="text-white mt-5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Update</button>
        </form>
    </div>

    <script>
        // if(!document.getElementById('divorce_date').defaultValue){
        //     document.getElementById('divorce_date').defaultValue = new Date().toISOString().substring(0, 10);
        // }
        // if(!document.getElementById('birthdate').defaultValue){
        //     document.getElementById('birthdate').defaultValue = new Date().toISOString().substring(0, 10);
        // }
        // if(!document.getElementById('expiration_id_date').defaultValue){
        //     document.getElementById('expiration_id_date').defaultValue = new Date().toISOString().substring(0, 10);
        // }


        document.addEventListener('DOMContentLoaded', function() {
            var checkboxes = document.querySelectorAll('input[type=checkbox]');

            for (var checkbox of checkboxes) {
                checkbox.addEventListener('change', function(event) {
                    if (event.target.checked) {
                        event.target.value = 1;
                    } else {
                        event.target.value = 0;
                    }
                });
            }
        }, false);
    </script>


</x-app-layout>
