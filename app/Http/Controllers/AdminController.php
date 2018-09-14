<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function removeUser(User $user)
    {
        $user->delete();
        return redirect()->back();
    }
}
