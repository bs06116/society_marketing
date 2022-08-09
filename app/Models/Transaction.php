<?php

namespace App\Models;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = ['transaction_type', 'transaction_category', 'customer_id', 'description', 'amount', 'exchange_rate', 'paid_amount', 'currency_id', 'daily_transaction', 'status', 'received_amount','transactoion_with'];

    protected $appends = ['paid','received','profit','name','detailp', 'detailr', 'currency'];

    public function getPaidAttribute()
    {
        return number_format(Transaction::where(['customer_id'=> $this->customer_id])->sum('paid_amount'));
    }
    public function getReceivedAttribute()
    {
        return  number_format(Transaction::where(['customer_id'=> $this->customer_id])->sum('received_amount'));
    }

    public function getProfitAttribute()
    {
        return intval(preg_replace('/[^\d.]/', '',$this->received)) - intval(preg_replace('/[^\d.]/', '',$this->paid));
    }

    public function getNameAttribute()
    {
        $name = "";
        $customer = User::where(['id'=> $this->customer_id])->first();
        if(!empty($customer)){
            $name = $customer->name;
        }
        return $name;
    }

    public function getDetailpAttribute()
    {
       return Transaction::where(['customer_id'=> $this->customer_id,'transactoion_with'=>$this->id])->sum('paid_amount');
    }
    public function getDetailrAttribute()
    {
       return Transaction::where(['customer_id'=> $this->customer_id,'transactoion_with'=>$this->id])->sum('received_amount');
    }
    public function getCurrencyAttribute()
    {
       $currency = "";
       $selected_currency = Currency::where(['id'=> $this->currency_id])->first();
       if(!empty($selected_currency)){
        $currency = $selected_currency->currency;
       }

       return $currency;
    }
}
