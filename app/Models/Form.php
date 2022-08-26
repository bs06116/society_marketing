<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Form extends Model
{
    use HasFactory;
    protected $fillable = [
        'app_no' ,'reg_no','form_no','block_no','plot_type','plot_size','plot_no','street_no','location','payment_type','extra_lan',
        'extra_land_cost','booking_data','total_price','applicant_name','aplicant_type','cnic','passport_no','mail_address','permanent_address',
        'phone_no','mobile_no','email','nominee_applicant_name','nominee_applicant_type','nominee_applicant_cnic','nominee_applicant_passport','preference_of_plot'
    ];
}
