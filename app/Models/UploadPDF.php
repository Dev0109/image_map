<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UploadPDF extends Model
{
    use HasFactory;
    protected $fillable = [
        'date',
        'paperId',
        'edition',
        'publishOn',
        'fileUrl'
   ];
}
