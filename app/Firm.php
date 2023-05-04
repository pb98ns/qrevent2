<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Firm extends Model
{
  
    protected $fillable = [
        'name',
        'place',
        'nip',
        'status',
        'kpir',
        'kh',
        'placezus',
        'amortyzacja'
    ];
    public $timestamps = false;
}