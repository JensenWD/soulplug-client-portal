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
        $items = Item::whereUserId(Auth::user()->id)->get();
        return view('layouts.portal', compact('items'));
    }

    public function adminPortal()
    {
        return view('layouts.admin-portal');
    }

    public function adminArchives()
    {
        return view('layouts.admin-archive');
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
        $items = Item::notArchived()->with('user');
        return DataTables::of($items)
            ->addColumn('action', function ($item) {
                if ($item->approved === NULL)
                    return '<div class="d-flex"><a href="' . "item/approve/" . $item->id . '" class="btn btn-sm btn-success p-1 fs-11">Accept</a> <a href="' . "item/decline/" . $item->id . '" class="btn btn-sm btn-danger p-1 ml-1 fs-11">Decline</a></div>';
                else if ($item->sold_on && $item->paid_off)
                    return '<div class="d-flex"><a href="' . "item/paid/" . $item->id . '" class="btn btn-sm btn-dark p-1 fs-11">Unpaid</a> <a href="' . "item/archive/" . $item->id . '" class="btn btn-sm btn-outline-warning p-1 ml-1 fs-11">Archive</a></div>';
                else if ($item->sold_on && !$item->paid_off)
                    return '<div class="d-flex"><a href="' . "item/paid/" . $item->id . '" class="btn btn-sm btn-dark p-1 fs-11">Paid</a> <a href="' . "item/archive/" . $item->id . '" class="btn btn-sm btn-outline-warning p-1 ml-1 fs-11">Archive</a></div>';
                else
                    return '<div class="d-flex"><a href="' . "item/archive/" . $item->id . '" class="btn btn-sm btn-outline-warning p-1 fs-11">Archive</a></div>';
            })
            ->editColumn('paid_off', function ($item) {
                if ($item->paid_off)
                    return 'Paid';
                if ($item->paid_off === 0)
                    return 'Not Paid';
                else
                    return '';
            })
            ->editColumn('sold_on', function ($item) {
                if ($item->sold_on)
                    return Carbon::parse($item->sold_on)->format('M d, Y');
                else
                    return '';
            })
            ->editColumn('dropped_off', function ($item) {
                if ($item->dropped_off)
                    return Carbon::parse($item->dropped_off)->format('M d, Y');
                else
                    return '';
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

    public function getArchivedItemsDataTable()
    {
        $items = Item::Archived()->with('user');
        return DataTables::of($items)
            ->addColumn('action', function ($item) {
                    return '<div class="d-flex"><a href="' . "item/archive/" . $item->id . '" class="btn btn-sm btn-outline-warning p-1 fs-11">Unarchive</a></div>';
            })
            ->editColumn('paid_off', function ($item) {
                if ($item->paid_off)
                    return 'Paid';
                if ($item->paid_off === 0)
                    return 'Not Paid';
                else
                    return '';
            })
            ->editColumn('sold_on', function ($item) {
                if ($item->sold_on)
                    return Carbon::parse($item->sold_on)->format('M d, Y');
                else
                    return '';
            })
            ->editColumn('dropped_off', function ($item) {
                if ($item->dropped_off)
                    return Carbon::parse($item->dropped_off)->format('M d, Y');
                else
                    return '';
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
}
