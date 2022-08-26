<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFormsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('forms', function (Blueprint $table) {
            $table->id();
            $table->string('app_no')->nullable();
            $table->string('reg_no')->nullable();
            $table->string('form_no')->nullable();
            $table->string('block_no')->nullable();
            $table->string('plot_type')->nullable();
            $table->string('plot_size')->nullable();
            $table->string('plot_no')->nullable();
            $table->string('street_no')->nullable();
            $table->string('location')->nullable();
            $table->text('payment_type')->nullable();
            $table->string('extra_lan')->nullable();
            $table->string('extra_land_cost')->nullable();
            $table->string('booking_data')->nullable();
            $table->string('total_price')->nullable();
            $table->string('applicant_name')->nullable();
            $table->string('aplicant_type')->nullable();
            $table->string('cnic')->nullable();
            $table->string('passport_no')->nullable();
            $table->text('mail_address')->nullable();
            $table->text('permanent_address')->nullable();
            $table->string('phone_no')->nullable();
            $table->string('mobile_no')->nullable();
            $table->string('email')->nullable();
            $table->string('nominee_applicant_name')->nullable();
            $table->string('nominee_applicant_type')->nullable();
            $table->string('nominee_applicant_cnic')->nullable();
            $table->string('nominee_applicant_passport')->nullable();
            $table->string('preference_of_plot')->nullable();
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
        Schema::dropIfExists('forms');
    }
}
