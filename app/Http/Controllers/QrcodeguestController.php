<?php

namespace App\Http\Controllers;

use App\Models\Qrcode;
use Illuminate\Http\Request;
use App\Repositories\UserRepository;
use App\Repositories\TaskRepository;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Maestroerror\HeicToJpg;


class QrcodeguestController extends Controller
{
   
    public function index2()
    {
        return view('qr.index');
    }
    

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'max:255'],
            'description' => ['required','max:255'],
            'image' => ['required','max:20480'],
        
    ]);
    $file=$request->file('image');


        if (HeicToJpg::isHeic($file)) {


            $extention = $file->getClientOriginalExtension();
            date_default_timezone_set('Europe/Warsaw');
            $date = now()->format("YmdHis");
            $filename = $date.'.'.$extention;
            $filename2 = $date.'.jpg';
            $file->move('uploads/kb/',$filename);
            HeicToJpg::convert('uploads/kb/'.$filename)->saveAs('uploads/kb/'.$filename2);
            $qrcode = new Qrcode;
            $qrcode->name=$request->input('name');
            $qrcode->description=$request->input('description');
            $qrcode->image=$filename2;     
            $qrcode->task_id=1;
            $qrcode->user_id=1;
            $qrcode->save();


            return redirect('/test')->with('message', 'Wiadomość została pomyślnie dodana!');                  
        
        }
        else
        {

            $qrcode = new Qrcode;
            $qrcode->name=$request->input('name');
            $qrcode->description=$request->input('description');
    
            $extention = $file->getClientOriginalExtension();
            date_default_timezone_set('Europe/Warsaw');
            $date = now()->format("YmdHis");
            $filename = $date.'.'.$extention;
            $file->move('uploads/kb/',$filename);
            $qrcode->image=$filename;
            $qrcode->task_id=1;
            $qrcode->user_id=1;
            $qrcode->save();

            return redirect('/test')->with('message', 'Wiadomość została pomyślnie dodana!');
        


        }




    }

   
    public function store2(Request $request)
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
            if (HeicToJpg::isHeic($file)) {
                
                HeicToJpg::convert($file)->saveAs("image1.jpg");
                
                
                $extention = $file->getClientOriginalExtension();
                date_default_timezone_set('Europe/Warsaw');
                $date = now()->format("YmdHis");
                $filename = $date.'.'.$extention;
                 $qrcode->image=$filename;                       }
            else{
                $extention = $file->getClientOriginalExtension();
                date_default_timezone_set('Europe/Warsaw');
                $date = now()->format("YmdHis");
                $filename = $date.'.'.$extention;
                $file->move('uploads/kb/',$filename);
                 $qrcode->image=$filename;

            }
         


        }
        $qrcode->task_id=1;
        $qrcode->user_id=1;


$qrcode->save();

return redirect('/test')->with('message', 'Wiadomość została pomyślnie dodana!');

    }         
            
    }

