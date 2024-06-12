<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bills extends Model
{
    use HasFactory;
    protected $table = 'bills';
    protected $fillable = [
        'user_id',
        'receipt',
        'month',
        'rent',
        'water',
        'internet',
        'electricity',
        'total',
        'due',
        'status',
        'created_at',
        'updated_at',
    ];


    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->receipt = self::generateReceiptNumber();
        });
    }

    public static function generateReceiptNumber()
    {
        $latestBill = self::latest('id')->first();
        $number = $latestBill ? intval($latestBill->receipt) + 1 : 1;
        return str_pad($number, 5, '0', STR_PAD_LEFT);
    }
}
