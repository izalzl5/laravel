<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;

class HomeAboutController extends Controller
{
    public function home() {
         $userData = $this->user();
         
         return view('home', [
             "title" => "Home",
             "user" => $userData, 
         ]);
     }

     public function about() {
         $userData = $this->user();
         
         return view('about',[
            "title" => "About",
            "name" => "Muhammad Faizal Izzudin",
            "email" =>"izalizzudin18@gmail.com",
            "kelas" => "11 PPLG 2",
            "image" => "image/izal.jpg",
            "github" => "https://github.com/izalzl5",
            "user" => $userData
        ]);
     }
    public function user() {
        
        $user = User::first(); // Assuming you want the first user
        if ($user) {
            return $user->name;
        } else {
            return 'User';
        }
    
}
}