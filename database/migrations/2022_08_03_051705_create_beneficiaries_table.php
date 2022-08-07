<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('beneficiaries', function (Blueprint $table) {
            $table->id();
            // $table->string('fullname');
            $table->string('id_number',10)->unique();
            $table->date('expiration_id_date')->nullable();
            $table->date('birthdate')->nullable();
            $table->string('marital_status')->nullable();
            $table->date('divorce_date')->nullable();
            $table->boolean('has_divorce_reason')->nullable();
            $table->boolean('cases_divorce_your_family')->nullable();
            $table->text('divorce_reason')->nullable();
            $table->boolean('have_custody_deed')->nullable();
            $table->boolean('have_guardianship_deed_children')->nullable();
            $table->boolean('have_avisitors_deed_children')->nullable();
            $table->tinyInteger('number_marriages')->nullable();
            $table->string('phone',15)->nullable();
            $table->string('another_phone',15)->nullable();
            $table->boolean('have_car')->nullable();
            $table->foreignId('country_id')->nullable()->constrained("countries")->cascadeOnUpdate()->nullOnDelete();
            $table->string('education_level')->nullable();
            $table->string('general_health_condition')->nullable();
            $table->text('experiences_and_skills')->nullable();
            $table->boolean('have_desire_join_labor_market')->nullable();
            $table->boolean('have_desire_training_courses_help')->nullable();
            $table->boolean('you_join_labor_marke')->nullable();
            $table->boolean('want_benefit_psychological_social_counseling')->nullable();
            $table->boolean('want_take_benefits_financial_support_program')->nullable();
            $table->boolean('want_help_judicial_legal_children')->nullable();
            $table->string('bank_name')->nullable();
            $table->string('iban_number',35)->nullable();
            $table->boolean('have_suspended_services')->nullable();
            $table->foreignId('user_id')->nullable()->constrained("users")->cascadeOnUpdate()->nullOnDelete()->nullable()->unique();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('beneficiaries');
    }
};
