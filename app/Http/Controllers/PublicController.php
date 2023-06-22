<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use App\Mail\CareerRequestMail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class PublicController extends Controller
{
    //
    public function homepage(){
        $articles = Article::where('is_accepted',true)->orderBy('created_at','desc')->take(4)->get();
        return view('welcome',compact('articles'));
    }

    public function careers(){
        return view('careers');
    }

    public function careersSubmit(Request $request){
        
        $request->validate([
            'email'=>'required|email',
            'role'=>'required',
            'msg'=>'required|max:150',
        ]);

        $user = Auth::user();
        
        $role = $request->role;
        $email = $request->email;
        $msg = $request->msg;

        Mail::to('admin@theaulabpost.it')->send(new CareerRequestMail(compact('role','email','msg')));

        switch($role){
            case 'revisor';
                $user->is_revisor=NULL;
                break;

            case 'writer';
                $user->is_writer=NULL;
                break;
        }

        $user->update();

        return redirect(route('welcome'))->with('status','Grazie per averci contattato');
    }
}
