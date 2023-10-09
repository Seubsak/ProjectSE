<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class ImportUsersController extends Controller
{
    public function testimport(){
        $userone = new User;
        $userone->name = 'Seubsak Sriboon';
        $userone->email = 'seubsak.s@kkumail.com';
        $userone->password = Hash::make('Pleum5288');
        $userone->save();
    }
    public function importuser(){
        $users = array(
            array(
                'name' => 'Ple',
                'email' => 'Ple@gmail.com'
            )
        );
        foreach($users as $u){
            echo "Name: " . $u['name'] . "<br>";
            echo "Email: " . $u['email'] . "<br><br>";
            $user = new User;
            $user->name = $u['name'];
            $user->email = $u['email'];
            $user->password = Hash::make('12345678');
            $user->save();
        }
    }
    public function index(){
        $user = User::all();
        return view('');
    }
}
