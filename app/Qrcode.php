<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Qrcode extends Model
{
    use HasFactory;
    protected $fillable = [
        'id','name','description','image','task_id','user_id'
           
       ];
       
       public $timestamps = false;
}
