<?php

namespace App\Http\Controllers;

use App\Models\Image;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
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
//        dd(request('search'));
        $image = Image::latest();
        $users = DB::table('users')->select('id', 'name')->get();
//        DB::table('users');->pluck('name')
        if (request('search')){
            $image->where('name', 'like', '%' . request('search') . '%')
            ->orWhere('position', 'like', '%' . request('search'));
        }
        if (request('usernames')){
            $image->where('user_id', 'like', '%' . request('usernames') . '%');

        }



        return view('index',compact('users'),  [ 'image'=>$image->get()]);
    }


    public function about()
    {

        return view('about');
    }
    public function pictures()
    {

        return view('home');
    }
    public function information()
    {

        return view('information');
    }


}

