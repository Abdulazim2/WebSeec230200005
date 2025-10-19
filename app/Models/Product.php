<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    // 👇 هنا التصريح بالأعمدة اللي يُسمح بتخزينها
    protected $fillable = [
        'code',
        'name',
        'model',
        'price',
        'photo',
        'description',
    ];
}
