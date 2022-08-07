<?php

namespace Database\Factories;

use App\Models\Beneficiary;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Beneficiary>
 */
class BeneficiaryFactory extends Factory
{
    protected $model = Beneficiary::class;

    public function definition()
    {
        return [
            // 'fullname'                          => $this->faker->name(),
            'id_number'                         => $this->faker->unique()->randomNumber(),
            'expiration_id_date'                => $this->faker->dateTimeBetween('now','20 years'),
            'birthdate'                         => $this->faker->date('Y-m-d',date('Y-m-d',strtotime("-1 days"))),
            'marital_status'                    => $this->faker->randomElement(['Widow', 'divorced', 'desertedmarried', 'Disabled husband']),
            'divorce_date'                      => $this->faker->date('Y-m-d',date('Y-m-d',strtotime("-1 days"))),
            'has_divorce_reason'                => $this->faker->boolean(),
            'cases_divorce_your_family'         => $this->faker->boolean(),
            'divorce_reason'                    => $this->faker->randomElement(['A lot of problems', 'for financial matters', 'family intervention', 'violence and abuse', 'another']),
            'have_custody_deed'                 => $this->faker->boolean(),
            'have_guardianship_deed_children'                  => $this->faker->boolean(),
            'have_avisitors_deed_children'                          => $this->faker->boolean(),
            'number_marriages'                          => $this->faker->randomDigitNotNull(),
            'phone'                                  => $this->faker->numberBetween(1000000000,10000000000),
            'another_phone'                         => $this->faker->numberBetween(1000000000,10000000000),
            'have_car'                          => $this->faker->boolean(),
            'country_id'                            => $this->faker->numberBetween(1,252),
            'education_level'                           => $this->faker->randomElement(['Did not reach school age', 'primary', 'Intermediate', 'high school', 'university', 'Postgraduate', 'Uneducated']),
            'general_health_condition'                          => $this->faker->randomElement(['healthy health', 'disabled', 'afflicted with cancer', 'Renal failure']),
            'experiences_and_skills'                            => $this->faker->sentence(),
            'have_desire_join_labor_market'                         => $this->faker->boolean(),
            'have_desire_training_courses_help'                         => $this->faker->boolean(),
            'you_join_labor_marke'                          => $this->faker->boolean(),
            'want_benefit_psychological_social_counseling'                          => $this->faker->boolean(),
            'want_take_benefits_financial_support_program'                          => $this->faker->boolean(),
            'want_help_judicial_legal_children'                         => $this->faker->boolean(),
            'bank_name'                         => $this->faker->randomElement(['Alinma bank', 'Al Rajhi Bank', 'Riyad Bank', 'Bank AlJazira']),
            'iban_number'                           => $this->faker->iban('SA'),
            'have_suspended_services'                           => $this->faker->boolean(),
            'user_id'                           => $this->get_random_user(),
        ];
    }
    public function get_random_user()
    {
        $user = User::whereType('beneficiary')->inRandomOrder()->first()->id;
        if($user){
            if(!Beneficiary::where('user_id',$user)->exists()){
                return $user;
            }
            else{
              return  $this->get_random_user();
            }
        }
        return $this->get_random_user();
    }
}
