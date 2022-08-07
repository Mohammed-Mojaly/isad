<?php

namespace App\Actions\Fortify;

use App\Models\Beneficiary;
use App\Models\HouseInfo;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;
use Illuminate\Support\Facades\DB;
class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;


    public function create(array $input)
    {
        // dd($input);
        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'id_number' => ['required', 'numeric', 'digits:10','unique:beneficiaries'],
            'phone' => ['required', 'numeric', 'digits_between:6,15'],
            'city_live' => ['required', 'string', 'max:255'],
            'marital_status' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'accept_policy' => ['accepted'],
            'password' => $this->passwordRules(),
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['accepted', 'required'] : '',
        ])->validate();

        $user =  User::create([
            'name' => $input['name'],
            'email' => $input['email'],
            'password' => Hash::make($input['password']),
        ]);

         Beneficiary::create([
            'id_number' => $input['id_number'],
            'phone' => $input['phone'],
            'marital_status' => $input['marital_status'],
            'user_id' => $user->id,
        ]);


         HouseInfo::create([
            'city_you_livein' => $input['city_live'],
            'user_id' => $user->id,
        ]);

        DB::table('model_has_roles')->insert([
            'role_id' => 2,
            'model_type' => 'App\Models\User',
            'model_id' => $user->id,
        ]);

        return $user;

    }
}
