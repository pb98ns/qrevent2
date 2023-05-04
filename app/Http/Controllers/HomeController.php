<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\UserRepository;
use App\Repositories\FirmRepository;
use App\Repositories\TaskRepository;
use App\Project;
use App\User;
use App\Firm;
use App\Models\Qrcode;
use App\Models\Task;
use DB;
use Illuminate\Support\Facades\Auth;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        
        $qrcode = Qrcode::all();
        return view ('home')->with('qrcode', $qrcode);
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

