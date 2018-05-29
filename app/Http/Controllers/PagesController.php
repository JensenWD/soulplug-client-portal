<?php

namespace App\Http\Controllers;

use App\Item;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\Datatables\DataTables;

class PagesController extends Controller
{
    public function home()
    {
        return view('layouts.homepage');
    }

    public function portal()
    {
        return view('layouts.portal');
    }

    public function adminPortal()
    {
        return view('layouts.admin-portal');
    }

    public function getClientDataTable()
    {
        $items = Item::whereUserId(Auth::user()->id)->orderBy('dropped_off', 'desc');
        return DataTables::of($items)
            ->addColumn('action', function ($item) {
                return '<a href="'. "items/remove/".$item->id .'" class="btn btn-sm btn-outline-dark">Delete</a>';
            })
            ->make(true);
    }

    public function getAdminItemsDataTable()
    {
        $items = Item::with('user');
        return DataTables::of($items)->make(true);
    }

    public function getAdminUsersDataTable()
    {
        $users = User::all();
        return DataTables::of($users)->make(true);
    }
}
