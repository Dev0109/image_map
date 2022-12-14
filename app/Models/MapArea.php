<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MapArea extends Model
{
    use HasFactory;
    protected $fillable = [
        'date',
        'paperId',
        'pageNo',
        'description',
        'connection',
        'x',
        'y',
        'width',
        'height',
        'edition'
   ];
}
