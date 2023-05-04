<?php

namespace App\Models;

use App\User;
use App\Task;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Qrcode extends Model
{
    use HasFactory;
    protected $fillable = [
        'id','name','description','image','task_id','user_id'
           
       ];
       public function task(){
        return $this->belongsTo(Task::class,'task_id');
    }
       public function user(){
        return $this->belongsTo(User::class,'user_id');
    }
  
       public $timestamps = false;
}
