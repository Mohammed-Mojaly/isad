<?php

namespace App\Http\Controllers;

use App\Models\Beneficiary;
use App\Models\Country;
use App\Models\HouseInfo;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;


class BeneficiaryController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:Update beneficiary', ['only' => ['edit_primary_data']]);
        $this->middleware('permission:Update House Info', ['only' => ['edit_housing_info']]);

    }
    public function get_user_data()
    {
        $countries = Country::get();
        $beneficiary = auth()->user()->beneficiary()->get()[0];
        return view('beneficiary.update-primary-data', compact('beneficiary', 'countries'));
    }

    public function edit_primary_data(Request $request)
    {

        try {
            $data =  $request->except('_method', '_token', 'submit', 'id');
            $checkboxes = ['has_divorce_reason', 'cases_divorce_your_family', 'have_custody_deed', 'have_guardianship_deed_children', 'have_avisitors_deed_children', 'have_car', 'have_desire_join_labor_market', 'have_desire_training_courses_help', 'you_join_labor_marke', 'want_benefit_psychological_social_counseling', 'want_take_benefits_financial_support_program', 'want_help_judicial_legal_children', 'have_suspended_services'];
            foreach ($checkboxes as $checkbox) {
                if (!array_key_exists($checkbox, $request->all())) {
                    $data[$checkbox] = 0;
                }
            }
            $validator = Validator::make($request->all(), [
                'id_number' => ['bail', 'required', 'numeric', 'digits:10', 'unique:beneficiaries,id_number,' . $request->id],
                'expiration_id_date' => 'nullable|date|after:tomorrow',
                'birthdate' => 'nullable|date|before:yesterday',
                'marital_status' => 'nullable|string|max:255',
                'divorce_date' => 'nullable|date|before:yesterday',
                'divorce_reason' => 'nullable|string',
                'number_marriages' => ['nullable', 'numeric', 'digits_between:1,2'],
                'phone' => ['nullable', 'numeric', 'digits_between:6,15'],
                'another_phone' => ['nullable', 'numeric', 'digits_between:6,15'],
                'education_level' => 'nullable|string|max:255',
                'general_health_condition' => 'nullable|string|max:255',
                'country_id' => ['nullable', 'numeric', 'digits_between:1,3'],
                'bank_name' => 'nullable|string|max:255',
                'iban_number' => 'nullable|string|max:35',
                'experiences_and_skills' => 'nullable|string',
                'has_divorce_reason'        => ['boolean'],
                'cases_divorce_your_family'        => ['boolean'],
                'have_custody_deed'        => ['boolean'],
                'have_guardianship_deed_children'        => ['boolean'],
                'have_avisitors_deed_children'        => ['boolean'],
                'have_car'        => ['boolean'],
                'have_desire_join_labor_market'        => ['boolean'],
                'have_desire_training_courses_help'        => ['boolean'],
                'you_join_labor_marke'        => ['boolean'],
                'want_benefit_psychological_social_counseling'        => ['boolean'],
                'want_take_benefits_financial_support_program'        => ['boolean'],
                'want_help_judicial_legal_children'        => ['boolean'],
                'have_suspended_services'        => ['boolean'],
            ]);
            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }

            $beneficiary = Beneficiary::whereUser_id(auth()->user()->id)->first();
            if ($beneficiary->update($data)) {
                Session::flash('status', true);
                return redirect()->back();
            } else {
                Session::flash('status', false);

                return redirect()->back();
            }
        } catch (\Throwable $e) {
            Session::flash('status', false);
            return redirect()->back();
        }
    }

    public function get_housing_info()
    {
        $housingtypes = ['Apartment', 'Villa', 'popular', 'house', 'Residential', 'Annex'];
        $housingownerships = ['Renter', 'Owner', 'Heirs'];
        $paymentmethods = ['Monthly', 'Annual'];
        $beneficiary_house = auth()->user()->houseinfo()->get()[0];
        return view('beneficiary.update-housing-info', compact('beneficiary_house', 'housingownerships', 'paymentmethods', 'housingtypes'));
    }

    public function edit_housing_info(Request $request)
    {
        try {
            $data =  $request->except('_method', '_token', 'submit', 'id', 'img_1', 'img_2', 'img_3', 'img_4');
            $checkboxes = ['live_one_relatives_his_house_partment', 'you_eligible_housing_support_Sakani_program_Ministry_Housing'];
            foreach ($checkboxes as $checkbox) {
                if (!array_key_exists($checkbox, $request->all())) {
                    $data[$checkbox] = 0;
                }
            }
            $validator = Validator::make($request->all(), [
                'housing_type' => 'nullable|string',
                'housing_ownership' => 'nullable|string',
                'rent_payment_method' => 'nullable|string',
                'value_rent' => ['nullable', 'numeric', 'min:0', 'max:100000'],
                'rent_expiry_date' => 'nullable|date|after:tomorrow',
                'house_owner_name' => 'nullable|string',
                'city_you_livein' => 'nullable|string',
                'neighborhood_livein' => 'nullable|string',
                'live_one_relatives_his_house_partment'        => ['boolean'],
                'you_eligible_housing_support_Sakani_program_Ministry_Housing'        => ['boolean'],
                'img_1' => 'nullable|max:2048|mimes:jpeg,png,jpg,gif,bmp',
                'img_2' => 'nullable|max:2048|mimes:jpeg,png,jpg,gif,bmp',
                'img_3' => 'nullable|max:2048|mimes:jpeg,png,jpg,gif,bmp',
                'img_4' => 'nullable|max:2048|mimes:jpeg,png,jpg,gif,bmp'

            ]);
            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }

            $houseInfo = HouseInfo::whereUser_id(auth()->user()->id)->first();
            $images = $this->upload_images($request, $houseInfo->accommodation_photos);
            $data['accommodation_photos'] = json_encode($images);
            if ($houseInfo->update($data)) {
                Session::flash('status', true);
                return redirect()->back();
            } else {
                Session::flash('status', false);
                return redirect()->back();
            }
        } catch (\Throwable $e) {
            Session::flash('status', false);
            return redirect()->back();
        }
    }
    public function upload_images($request, $res_images)
    {
        $path = public_path('tmp/uploads');
        if (!file_exists($path)) {
            mkdir($path, 0777, true);
        }

        $arr_images = [];
        for ($i = 1; $i <= 4; $i++) {
            $file = $request->file('img_' . $i);
            if ($file) {
                $fileName = uniqid() . '_' . $i . '.' . trim($file->getClientOriginalExtension());
                $file->move($path, $fileName);
                $arr_images['img_' . $i] = $fileName;
            } else {
                $arr_images['img_' . $i] =   json_decode($res_images, true)['img_' . $i];
            }
        }

        return $arr_images;
    }
}
