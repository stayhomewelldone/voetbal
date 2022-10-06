<?php

namespace App\Http\Controllers;

use App\Models\Image;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use function GuzzleHttp\Promise\all;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
//    public function __construct()
//    {
//        $this->middleware('auth');
//    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
    public function about()
    {

        return view('about');
    }
    public function pictures()
    {
        $image = Image::all();
        return view('pictures', compact('image'));

    }
    public function information()
    {
        $user = User::all();
        $image = Image::where('user_id', '=', $user->id)->first();
        return view('information', compact('user'));
    }
    public function fourzerofour()
    {
        return view('404');
    }
}

