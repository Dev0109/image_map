<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Advterisement extends Model
{
    use HasFactory;
    protected $fillable = [
        'advTitle',
        'displayFrom',
        'displayTo',
        'position',
        'status',
        'image'
   ];
}
