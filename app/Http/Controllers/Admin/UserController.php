<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class UserController extends Controller
{
    //
    $user = Auth::user();
    $user = User::paginate(8);
    return view('admin.user.index', compact('user', 'user'));
}
