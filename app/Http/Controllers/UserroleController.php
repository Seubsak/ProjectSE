<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserroleController extends Controller
{
    public function index(){
        $roles = [
            ['type' => 'Teacher','name' => ['อ.จักรกฤษณ์']],
            ['type' => 'TA','name' => ['TA.พี่โอม','TA.พี่เฟรนด์']],
            ['type' => 'Students','name' => ['สืบศักดิ์ ศรีบุญ','ก้าวไกล ไปดง']],
            ['type' => 'Admin','name' => ['AdminA']]
        ];
        return view('roles',compact('roles'));
    }
    public function templateWeb(){
        return view('');
    }
}
