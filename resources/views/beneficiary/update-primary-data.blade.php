<x-app-layout>

<div class="p-5 mt-5">



    @if (Session::has('status'))
        @if (Session::get('status') == true)
            <div class="p-4 mb-4 text-sm text-center text-green-700 bg-green-100 rounded-lg dark:bg-green-200 dark:text-green-800" role="alert">
                <span class="font-medium">Success alert!</span> Updated successfully
            </div>
        @else
            <div class="p-4 mb-4 text-sm text-red-700 bg-red-100 rounded-lg dark:bg-red-200 dark:text-red-800" role="alert">
                <span class="font-medium">Danger alert!</span> Something was wrong
            </div>
        @endif

    @endif


    <div class="bg-white p-5 rounded-md text-2xl font-bold text-center">
        <h3>Update primary data</h3>
    </div>

    <form action="{{ route('user.edit_primary_data') }}" class="bg-white p-6 lg:p-8 mt-4 rounded-md" name="user_data" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="id" value="{{$beneficiary->id}}">
       <div class="grid md:grid-cols-3 md:gap-6">
         <div class="relative z-0 mb-6 w-full group">
             <input type="number" name="id_number" id="id_number" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none  focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" "  value="{{ old('id_number' , $beneficiary->id_number) }}" maxlength="10" minlength="10">
             <label for="id_number" class="peer-focus:font-medium absolute text-sm text-gray-500  duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Identity number</label>
             @error('id_number')<span class="text-red-500">{{ $message }}</span>@enderror
         </div>
         <div class="relative z-0 mb-6 w-full group">
             <input type="date" name="expiration_id_date" id="expiration_id_date" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none  focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder="dd-mm-yyyy"   value="{{ old('expiration_id_date' , $beneficiary->expiration_id_date) }}">
             <label for="expiration_id_date" class="peer-focus:font-medium absolute text-sm text-gray-500  duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Expiration identity date</label>
             @error('expiration_id_date')<span class="text-red-500">{{ $message }}</span>@enderror
         </div>
         <div class="relative z-0 mb-6 w-full group">
             <input type="date" name="birthdate" id="birthdate" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none  focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" "  value="{{ old('birthdate' , $beneficiary->birthdate) }}">
             <label for="birthdate" class="peer-focus:font-medium absolute text-sm text-gray-500  duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Birthdate</label>
             @error('birthdate')<span class="text-red-500">{{ $message }}</span>@enderror
         </div>
       </div>

       <div class="grid md:grid-cols-3 md:gap-6">
         <div class="relative z-0 mb-6 w-full group">
             <input type="text" name="marital_status" id="marital_status" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none  focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" "  value="{{ old('marital_status' , $beneficiary->marital_status) }}">
             <label for="marital_status" class="peer-focus:font-medium absolute text-sm text-gray-500  duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Marital status</label>
             @error('marital_status')<span class="text-red-500">{{ $message }}</span>@enderror
         </div>
         <div class="relative z-0 mb-6 w-full group">
             <input type="date" name="divorce_date" id="divorce_date" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none  focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" "  value="{{ old('divorce_date' , $beneficiary->divorce_date) }}">
             <label for="divorce_date" class="peer-focus:font-medium absolute text-sm text-gray-500  duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Divorce date</label>
             @error('divorce_date')<span class="text-red-500">{{ $message }}</span>@enderror
         </div>
         <div class="relative z-0 mb-6 w-full group">
             <label for="divorce_reason" class="block mb-2 text-sm font-medium text-gray-500 dark:text-gray-400">Divorce reason</label>
             <textarea id="divorce_reason" name="divorce_reason" rows="3" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500" placeholder="Write here....">{{ old('divorce_reason' , $beneficiary->divorce_reason) }}</textarea>
             @error('divorce_reason')<span class="text-red-500">{{ $message }}</span>@enderror
         </div>
       </div>

       <div class="grid md:grid-cols-3 md:gap-6">
        <div class="relative z-0 mb-6 w-full group">
            <input type="number" name="number_marriages" id="number_marriages" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none  focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" "  value="{{ old('number_marriages' , $beneficiary->number_marriages) }}">
            <label for="number_marriages" class="peer-focus:font-medium absolute text-sm text-gray-500  duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Number of marriages</label>
            @error('number_marriages')<span class="text-red-500">{{ $message }}</span>@enderror
        </div>

        <div class="relative z-0 mb-6 w-full group">
            <input type="number" name="phone" id="phone" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none  focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" "  minlength="6" maxlength="15" value="{{ old('phone' , $beneficiary->phone) }}">
            <label for="phone" class="peer-focus:font-medium absolute text-sm text-gray-500  duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Phone</label>
            @error('phone')<span class="text-red-500">{{ $message }}</span>@enderror
        </div>

        <div class="relative z-0 mb-6 w-full group">
            <input type="number" name="another_phone" id="another_phone" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none  focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" "  minlength="6" maxlength="15" value="{{ old('another_phone' , $beneficiary->another_phone) }}">
            <label for="another_phone" class="peer-focus:font-medium absolute text-sm text-gray-500  duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Another phone</label>
            @error('another_phone')<span class="text-red-500">{{ $message }}</span>@enderror
        </div>
      </div>

       <div class="grid md:grid-cols-3 md:gap-6">
         <div class="relative z-0 mb-6 w-full group">
             <input type="text" name="education_level" id="education_level" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none  focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" "  minlength="6" maxlength="15" value="{{ old('education_level' , $beneficiary->education_level) }}">
             <label for="education_level" class="peer-focus:font-medium absolute text-sm text-gray-500  duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Education level</label>
             @error('education_level')<span class="text-red-500">{{ $message }}</span>@enderror
         </div>
           <div class="relative z-0 mb-6 w-full group">
               <input type="text" name="general_health_condition" id="general_health_condition" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none  focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" "  minlength="6" maxlength="15" value="{{ old('general_health_condition' , $beneficiary->general_health_condition) }}">
               <label for="general_health_condition" class="peer-focus:font-medium absolute text-sm text-gray-500  duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">General health condition</label>
               @error('general_health_condition')<span class="text-red-500">{{ $message }}</span>@enderror
           </div>
        <div class="relative z-0 mb-6 w-full group">
            <select id="countries" name="country_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            <option selected disabled value="">Nationality...</option>
            @forelse ($countries as $country )
                <option value="{{$country->id}}" {{$country->id == $beneficiary->country_id ? 'selected' : ''}}>{{$country->name}}</option>
            @empty
            @endforelse
            </select>
            @error('country_id')<span class="text-red-500">{{ $message }}</span>@enderror
        </div>
      </div>

       <div class="grid md:grid-cols-3 md:gap-6">
         <div class="relative z-0 mb-6 w-full group">
             <input type="text" name="bank_name" id="bank_name" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none  focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" "  value="{{ old('bank_name' , $beneficiary->bank_name) }}">
             <label for="bank_name" class="peer-focus:font-medium absolute text-sm text-gray-500  duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">The name of your bank</label>
             @error('bank_name')<span class="text-red-500">{{ $message }}</span>@enderror
         </div>
         <div class="relative z-0 mb-6 w-full group">
             <input type="text" name="iban_number" id="iban_number" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none  focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" "  maxlength="35" value="{{ old('iban_number' , $beneficiary->iban_number) }}">
             <label for="iban_number" class="peer-focus:font-medium absolute text-sm text-gray-500  duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">IBAN account number</label>
             @error('iban_number')<span class="text-red-500">{{ $message }}</span>@enderror
         </div>
         <div class="relative z-0 mb-6 w-full group">
             <label for="experiences_and_skills" class="block mb-2 text-sm font-medium text-gray-500 dark:text-gray-400">Experiences and Skills</label>
             <textarea id="experiences_and_skills" name="experiences_and_skills" rows="3" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500" placeholder="Write here....">{{ old('experiences_and_skills' , $beneficiary->experiences_and_skills) }}</textarea>
             @error('experiences_and_skills')<span class="text-red-500">{{ $message }}</span>@enderror
         </div>

       </div>

       <div class="grid md:grid-cols-3 md:gap-6 mt-3">

        <div class="relative z-0 mb-6 w-full group">
            <label for="checked-toggle" class="inline-flex relative items-center mb-4 cursor-pointer">
                <input type="checkbox" value="{{old('has_divorce_reason',$beneficiary->has_divorce_reason)}}" name="has_divorce_reason" id="checked-toggle" class="sr-only peer" @checked(old('has_divorce_reason',$beneficiary->has_divorce_reason))>
                <div class="absolute w-11 h-6  bg-gray-200 rounded-full peer peer-focus:ring-4 peer-focus:ring-blue-300  peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all  peer-checked:bg-blue-600"></div>
                <span class="ml-16 text-sm font-medium text-gray-900">Has a divorce reason</span>
              </label>
            @error('has_divorce_reason')<span class="text-red-500">{{ $message }}</span>@enderror
        </div>

        <div class="relative z-0 mb-6 w-full group">
            <label for="checked-toggle1" class="inline-flex relative items-center mb-4 cursor-pointer">
                <input type="checkbox" value="{{old('cases_divorce_your_family',$beneficiary->cases_divorce_your_family)}}" name="cases_divorce_your_family" id="checked-toggle1" class="sr-only peer" @checked(old('cases_divorce_your_family',$beneficiary->cases_divorce_your_family))>
                <div class="absolute w-11 h-6  bg-gray-200 rounded-full peer peer-focus:ring-4 peer-focus:ring-blue-300  peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all  peer-checked:bg-blue-600"></div>
                <span class="ml-16 text-sm font-medium text-gray-900">Are there cases of divorce in your family</span>
              </label>
            @error('cases_divorce_your_family')<span class="text-red-500">{{ $message }}</span>@enderror
        </div>

        <div class="relative z-0 mb-6 w-full group">
            <label for="checked-toggle2" class="inline-flex relative items-center mb-4 cursor-pointer">
                <input type="checkbox" value="{{old('have_custody_deed',$beneficiary->have_custody_deed)}}" name="have_custody_deed" id="checked-toggle2" class="sr-only peer" @checked(old('have_custody_deed',$beneficiary->have_custody_deed))>
                <div class="absolute w-11 h-6  bg-gray-200 rounded-full peer peer-focus:ring-4 peer-focus:ring-blue-300  peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all  peer-checked:bg-blue-600"></div>
                <span class="ml-16 text-sm font-medium text-gray-900">Do you have a custody deed</span>
              </label>
            @error('have_custody_deed')<span class="text-red-500">{{ $message }}</span>@enderror
        </div>

      </div>

       <div class="grid md:grid-cols-3 md:gap-6">

        <div class="relative z-0 mb-6 w-full group">
            <label for="checked-toggle4" class="inline-flex relative items-center mb-4 cursor-pointer">
                <input type="checkbox" value="{{old('have_guardianship_deed_children',$beneficiary->have_guardianship_deed_children)}}" name="have_guardianship_deed_children" id="checked-toggle4" class="sr-only peer" @checked(old('have_guardianship_deed_children',$beneficiary->have_guardianship_deed_children))>
                <div class="absolute w-11 h-6  bg-gray-200 rounded-full peer peer-focus:ring-4 peer-focus:ring-blue-300  peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all  peer-checked:bg-blue-600"></div>
                <span class="ml-16 text-sm font-medium text-gray-900">Do you have a guardianship deed over the children</span>
              </label>
            @error('have_guardianship_deed_children')<span class="text-red-500">{{ $message }}</span>@enderror
        </div>

        <div class="relative z-0 mb-6 w-full group">
            <label for="checked-toggle6" class="inline-flex relative items-center mb-4 cursor-pointer">
                <input type="checkbox" value="{{old('have_avisitors_deed_children',$beneficiary->have_avisitors_deed_children)}}" name="have_avisitors_deed_children" id="checked-toggle6" class="sr-only peer" @checked(old('have_avisitors_deed_children',$beneficiary->have_avisitors_deed_children))>
                <div class="absolute w-11 h-6  bg-gray-200 rounded-full peer peer-focus:ring-4 peer-focus:ring-blue-300  peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all  peer-checked:bg-blue-600"></div>
                <span class="ml-16 text-sm font-medium text-gray-900">Do you have a visitor's deed for  your children</span>
              </label>
            @error('have_avisitors_deed_children')<span class="text-red-500">{{ $message }}</span>@enderror
        </div>

        <div class="relative z-0 mb-6 w-full group">
            <label for="checked-toggle7" class="inline-flex relative items-center mb-4 cursor-pointer">
                <input type="checkbox" value="{{old('have_car',$beneficiary->have_car)}}" name="have_car" id="checked-toggle7" class="sr-only peer" @checked(old('have_car',$beneficiary->have_car))>
                <div class="absolute w-11 h-6  bg-gray-200 rounded-full peer peer-focus:ring-4 peer-focus:ring-blue-300  peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all  peer-checked:bg-blue-600"></div>
                <span class="ml-16 text-sm font-medium text-gray-900">Do you have a car</span>
              </label>
            @error('have_car')<span class="text-red-500">{{ $message }}</span>@enderror
        </div>

      </div>

       <div class="grid md:grid-cols-3 md:gap-6">

        <div class="relative z-0 mb-6 w-full group">
            <label for="checked-toggle8" class="inline-flex relative items-center mb-4 cursor-pointer">
                <input type="checkbox" value="{{old('have_desire_join_labor_market',$beneficiary->have_desire_join_labor_market)}}" name="have_desire_join_labor_market" id="checked-toggle8" class="sr-only peer" @checked(old('have_desire_join_labor_market',$beneficiary->have_desire_join_labor_market))>
                <div class="absolute w-11 h-6  bg-gray-200 rounded-full peer peer-focus:ring-4 peer-focus:ring-blue-300  peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all  peer-checked:bg-blue-600"></div>
                <span class="ml-16 text-sm font-medium text-gray-900">Do you have a desire to join the labor market</span>
              </label>
            @error('have_desire_join_labor_market')<span class="text-red-500">{{ $message }}</span>@enderror
        </div>

        <div class="relative z-0 mb-6 w-full group">
            <label for="checked-toggle9" class="inline-flex relative items-center mb-4 cursor-pointer">
                <input type="checkbox" value="{{old('have_desire_training_courses_help',$beneficiary->have_desire_training_courses_help)}}" name="have_desire_training_courses_help" id="checked-toggle9" class="sr-only peer" @checked(old('have_desire_training_courses_help',$beneficiary->have_desire_training_courses_help))>
                <div class="absolute w-11 h-6  bg-gray-200 rounded-full peer peer-focus:ring-4 peer-focus:ring-blue-300  peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all  peer-checked:bg-blue-600"></div>
                <span class="ml-16 text-sm font-medium text-gray-900">Do you have a  desire for training  courses to help</span>
              </label>
            @error('have_desire_training_courses_help')<span class="text-red-500">{{ $message }}</span>@enderror
        </div>

        <div class="relative z-0 mb-6 w-full group">
            <label for="checked-toggle10" class="inline-flex relative items-center mb-4 cursor-pointer">
                <input type="checkbox" value="{{old('you_join_labor_marke',$beneficiary->you_join_labor_marke)}}" name="you_join_labor_marke" id="checked-toggle10" class="sr-only peer" @checked(old('you_join_labor_marke',$beneficiary->you_join_labor_marke))>
                <div class="absolute w-11 h-6  bg-gray-200 rounded-full peer peer-focus:ring-4 peer-focus:ring-blue-300  peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all  peer-checked:bg-blue-600"></div>
                <span class="ml-16 text-sm font-medium text-gray-900">you join the labor market</span>
              </label>
            @error('you_join_labor_marke')<span class="text-red-500">{{ $message }}</span>@enderror
        </div>

      </div>

       <div class="grid md:grid-cols-2 md:gap-6">
            <div class="relative z-0 mb-6 w-full group">
                <label for="checked-toggle12" class="inline-flex relative items-center mb-4 cursor-pointer">
                    <input type="checkbox" value="{{old('want_benefit_psychological_social_counseling',$beneficiary->want_benefit_psychological_social_counseling)}}" name="want_benefit_psychological_social_counseling" id="checked-toggle12" class="sr-only peer" @checked(old('want_benefit_psychological_social_counseling',$beneficiary->want_benefit_psychological_social_counseling))>
                    <div class="absolute w-11 h-6  bg-gray-200 rounded-full peer peer-focus:ring-4 peer-focus:ring-blue-300  peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all  peer-checked:bg-blue-600"></div>
                    <span class="ml-16 text-sm font-medium text-gray-900">Do you want to benefit from psychological and social counseling</span>
                </label>
                @error('want_benefit_psychological_social_counseling')<span class="text-red-500">{{ $message }}</span>@enderror
            </div>
            <div class="relative z-0 mb-6 w-full group">
                <label for="checked-toggle13" class="inline-flex relative items-center mb-4 cursor-pointer">
                    <input type="checkbox" value="{{old('want_take_benefits_financial_support_program',$beneficiary->want_take_benefits_financial_support_program)}}" name="want_take_benefits_financial_support_program" id="checked-toggle13" class="sr-only peer" @checked(old('want_take_benefits_financial_support_program',$beneficiary->want_take_benefits_financial_support_program))>
                    <div class="absolute w-11 h-6  bg-gray-200 rounded-full peer peer-focus:ring-4 peer-focus:ring-blue-300  peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all  peer-checked:bg-blue-600"></div>
                    <span class="ml-16 text-sm font-medium text-gray-900">Do you want to take benefits of the financial support program</span>
                </label>
                @error('want_take_benefits_financial_support_program')<span class="text-red-500">{{ $message }}</span>@enderror
            </div>
      </div>

       <div class="grid md:grid-cols-2 md:gap-6">
            <div class="relative z-0 mb-6 w-full group">
                <label for="checked-toggle14" class="inline-flex relative items-center mb-4 cursor-pointer">
                    <input type="checkbox" value="{{old('want_help_judicial_legal_children',$beneficiary->want_help_judicial_legal_children)}}" name="want_help_judicial_legal_children" id="checked-toggle14" class="sr-only peer" @checked(old('want_help_judicial_legal_children',$beneficiary->want_help_judicial_legal_children))>
                    <div class="absolute w-11 h-6  bg-gray-200 rounded-full peer peer-focus:ring-4 peer-focus:ring-blue-300  peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all  peer-checked:bg-blue-600"></div>
                    <span class="ml-16 text-sm font-medium text-gray-900">Do you want to help in a judicial or legal case for you or your children</span>
                </label>
                @error('want_help_judicial_legal_children')<span class="text-red-500">{{ $message }}</span>@enderror
            </div>
            <div class="relative z-0 mb-6 w-full group">
                <label for="checked-toggle15" class="inline-flex relative items-center mb-4 cursor-pointer">
                    <input type="checkbox" value="{{old('have_suspended_services',$beneficiary->have_suspended_services)}}" name="have_suspended_services" id="checked-toggle15" class="sr-only peer" @checked(old('have_suspended_services',$beneficiary->have_suspended_services))>
                    <div class="absolute w-11 h-6  bg-gray-200 rounded-full peer peer-focus:ring-4 peer-focus:ring-blue-300  peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all  peer-checked:bg-blue-600"></div>
                    <span class="ml-16 text-sm font-medium text-gray-900">Do you have suspended services</span>
                </label>
                @error('have_suspended_services')<span class="text-red-500">{{ $message }}</span>@enderror
            </div>
      </div>


       <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Update</button>
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

        for (var checkbox of checkboxes)
        {
            checkbox.addEventListener('change', function(event)
            {
                if (event.target.checked) {
                    event.target.value = 1;
                }
                else {
                    event.target.value = 0;
                }
            });
        }
    }, false);
</script>


</x-app-layout>
