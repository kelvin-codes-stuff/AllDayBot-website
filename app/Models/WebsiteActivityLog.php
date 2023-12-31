<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WebsiteActivityLog extends Model
{
    use HasFactory;

    protected $fillable = [
        'subject', 
        'url',
        'method', 
        'IP', 
        'agent', 
        'username'
    ];
}
