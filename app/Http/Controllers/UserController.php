<?php

namespace App\Http\Controllers;

use App\Models\User;

class UserController extends Controller
{
    public function index(User $user)
    {
        $reviews = $user->reviews();
        return view('user.index', compact('user', 'reviews'));
    }
}
