<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NewspaperPages extends Model
{
    use HasFactory;
    protected $fillable = [
        'date',
        'paperId',
        'edition',
        'pageTitle',
        'publishOn',
        'pageNo',
        'pageImageUrl'
   ];
}
