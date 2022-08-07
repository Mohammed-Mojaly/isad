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
        Schema::create('house_infos', function (Blueprint $table) {
            $table->id();
            $table->string('housing_type')->nullable();
            $table->boolean('live_one_relatives_his_house_partment')->nullable();
            $table->string('housing_ownership')->nullable();
            $table->string('rent_payment_method')->nullable();
            $table->decimal('value_rent')->nullable();
            $table->date('rent_expiry_date')->nullable();
            $table->string('house_owner_name')->nullable();
            $table->string('city_you_livein')->nullable();
            $table->string('neighborhood_livein')->nullable();
            $table->boolean('you_eligible_housing_support_Sakani_program_Ministry_Housing')->nullable();
            $table->json('accommodation_photos')->default(json_encode(["img_1" => "","img_2" => "","img_3" => "","img_4" => ""]));
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
        Schema::dropIfExists('house_infos');
    }
};
