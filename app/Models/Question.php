<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;

    protected $fillable = [
        'question',
        'answer',
        'general_cat',
        'tech_cat',
        'usage_cat',
        'cards_cat',
        'others_cat',
    ];
}
