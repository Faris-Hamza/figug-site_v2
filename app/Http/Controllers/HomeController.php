<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Support\Facades\Crypt;
use App\Models\User;

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
        return view('frontEnd.home');
    }


    public function dashbord()
    {
        return view('home');
    }


    public function users()
    {
        $users = User::latest()->paginate();

        return view('users.index')->with('users',$users);
    }

    public function usersDestroy($id)
    {
       $user = User::where('id', $id)->first();
        $user->delete();
        return redirect()->back();
    }
}
