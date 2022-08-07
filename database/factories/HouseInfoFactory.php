<?php

namespace Database\Factories;

use App\Models\HouseInfo;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;


class HouseInfoFactory extends Factory
{
    protected $model = HouseInfo::class;

    public function definition()
    {
        return [

            'housing_type'                                  =>  $this->faker->randomElement(['Apartment', 'Villa', 'popular', 'house','Residential Annex']),
            'live_one_relatives_his_house_partment'         =>   $this->faker->boolean(),
            'housing_ownership'                             =>  $this->faker->randomElement(['Renter', 'heirs', 'owner']),
            'rent_payment_method'                           =>  $this->faker->randomElement(['Monthly', 'annual']),
            'value_rent'                                    =>  $this->faker->randomFloat(2,0,100000),
            'rent_expiry_date'                              => $this->faker->dateTimeBetween('now','5 years'),
            'house_owner_name'                              => $this->faker->sentence(),
            'city_you_livein'                               => $this->faker->randomElement(['Aldamam', 'Alkhabar', 'Governorate','Al-Ahsa']),
            'neighborhood_livein'                           =>  $this->faker->sentence(),
            'you_eligible_housing_support_Sakani_program_Ministry_Housing'  =>   $this->faker->boolean(),
            'user_id'                        => $this->get_random_user(),

        ];
    }
    public function get_random_user()
    {
        $user = User::whereType('beneficiary')->inRandomOrder()->first()->id;
        if($user){
            if(!HouseInfo::where('user_id',$user)->exists()){
                return $user;
            }
            else{
              return  $this->get_random_user();
            }
        }
        return $this->get_random_user();
    }
}
