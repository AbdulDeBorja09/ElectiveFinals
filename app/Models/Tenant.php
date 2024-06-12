<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tenant extends Model
{
    use HasFactory;
    use HasFactory;
    protected $table = 'customer';
    protected $fillable = [
        'user_id',
        'name',
        'email',
        'age',
        'unit',
        'since',
        'image',
        'created_at',
        'updated_at',
    ];
}
