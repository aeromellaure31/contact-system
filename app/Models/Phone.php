<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Phone extends Model
{
    use HasFactory;

    public $table = "phone_book";

    protected $fillable = [
        'name',
        'phone',
        'email',
    ];
}
