<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $data = [
            'name' => 'Иванов',
            'email' => 'ivanov@ivanov.loc',
            'password' => Hash::make('123123123')
        ];
//        dd($data);
        $user = User::firstOrCreate(['email' => $data['email']], $data);
//        dd($user);
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
}
