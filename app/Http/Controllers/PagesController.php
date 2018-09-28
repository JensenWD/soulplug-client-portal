<?php

namespace App\Http\Controllers;

use App\Item;
use App\User;
use Carbon\Carbon;
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
                return '<a href="' . "items/remove/" . $item->id . '" class="btn btn-sm btn-outline-danger">Delete</a>';
//                    '<a id="' . "updatePrice-" . $item->id . '" href="#/" class="btn ml-2 btn-sm btn-outline-dark">$</a>';
            })
            ->editColumn('approved', function ($item) {
                if ($item->approved)
                    return 'Accepted';
                if ($item->approved === 0)
                    return 'Declined';
                else
                    return 'pending..';
            })
            ->make(true);
    }

    public function getAdminItemsDataTable()
    {
        $items = Item::with('user')->whereSoldOn(null);
        return DataTables::of($items)
            ->addColumn('action', function ($item) {
                return '<div class="d-flex"><a href="' . "item/approve/" . $item->id . '" class="btn btn-sm btn-success p-1 fs-11">Accept</a> <a href="' . "item/decline/" . $item->id . '" class="btn btn-sm btn-danger p-1 ml-1 fs-11">Decline</a></div>';
            })
            ->editColumn('approved', function ($item) {
                if ($item->approved)
                    return 'Accepted';
                if ($item->approved === 0)
                    return 'Declined';
                else
                    return 'pending..';
            })
            ->make(true);
    }

    public function getAdminUsersDataTable()
    {
        $users = User::all();
        return DataTables::of($users)
            ->editColumn('created_at', function ($user) {
                return Carbon::parse($user->created_at)->toFormattedDateString();
            })
            ->addColumn('action', function ($user) {
                return '<div class="d-flex"><a href="' . "user/remove/" . $user->id . '" class="btn btn-sm btn-danger p-1 fs-11">Remove</a>';
            })
            ->make(true);
    }
}
