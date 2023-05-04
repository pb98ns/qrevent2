<?php

namespace App\Http\Controllers;

use App\Models\Qrcode;
use Illuminate\Http\Request;
use App\Repositories\UserRepository;
use App\Repositories\TaskRepository;
use App\Models\User;
use Illuminate\Support\Facades\Auth;



class QrcodeController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    public function index()
    {
    
        $user_id = Auth::id();
        $qrcode = Qrcode::where('user_id', '=', $user_id)->get(); 
        $project5=Qrcode::where('user_id', '=', $user_id)->get();       

        return view ('home',compact('qrcode','project5'));
    }
    public function index2()
    {
        return view('qr.index');
    }
    public function login1()
    {
        return view('qr.login1');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'max:255'],
            'description' => ['required','max:255'],
            'image' => ['required','max:20480'],
        
    ]);
        $qrcode = new Qrcode;
        $qrcode->name=$request->input('name');
        $qrcode->description=$request->input('description');
        if($request->hasfile('image'))
        {
            $file=$request->file('image');
            $extention = $file->getClientOriginalExtension();
            date_default_timezone_set('Europe/Warsaw');
            $date = now()->format("YmdHis");
            $filename = $date.'.'.$extention;
            $file->move('uploads/kb/',$filename);
             $qrcode->image=$filename;


        }
        $qrcode->task_id=1;
        $qrcode->user_id=1;

$qrcode->save();
return redirect('/test')->with('message', 'Wiadomość została pomyślnie dodana!');

    }
}
