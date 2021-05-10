<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        //$users=User::all()->pa;
        $users=User::where('is_admin',0)->latest()->paginate(5);
        return view('admin.users.index',compact('users'));
    }
}
