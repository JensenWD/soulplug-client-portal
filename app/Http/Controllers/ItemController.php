<?php

namespace App\Http\Controllers;

use App\Item;
use App\Mail\NotifyAdminOfNewItem;
use App\Mail\NotifyAdminOfPriceChange;
use App\Mail\NotifyCustomerItemSold;
use App\Mail\NotifyCustomerOfItemStatus;
use App\User;
use Illuminate\Contracts\Support\MessageProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class ItemController extends Controller
{
    public $adminEmail = 'info@soul-plug.com';

    public function index()
    {
        $items = Item::whereUserId(Auth::user()->id)->get();
        return response()->json($items);
    }

    public function update(Request $request)
    {
        $item = Item::find($request->input('id'));
        $range = false;

        if (!$item)
            return back()->with('error', 'Item ID #' . $request->input('id') . ' was invalid.');

        if ($request->input('priceMin'))
            $range = '$' . $request->input('priceMin') . ', $' . $request->input('priceMax');

        if ($range) {
            $item->update(['range' => $range]);
            Mail::to($this->adminEmail)->send(new NotifyAdminOfPriceChange($item));
        } else {
            $item->update([
                'sold_on' => $request->input('sold_on'),
                'paid_off' => false
            ]);
            Mail::to($item->user()->first())->send(new NotifyCustomerItemSold($item));
        }

        return back()->with('success', 'Item ' . $item->name . ' was updated');;
    }

    public function approve(Item $item)
    {
        $item->update(['approved' => true]);
        $status = "approved";
        Mail::to($item->user()->first())->send(new NotifyCustomerOfItemStatus($status, $item));

        return redirect()->back();
    }

    public function archive(Item $item)
    {
        $item->update(['archived' => !$item->archived]);
        return redirect()->back();
    }

    public function decline(Item $item)
    {
        $item->update(['approved' => false]);
        $status = "declined";
        Mail::to($item->user()->first())->send(new NotifyCustomerOfItemStatus($status, $item));

        return redirect()->back();
    }

    public function togglePaid(Item $item)
    {
        $item->update(['paid_off' => !$item->paid_off]);
        return redirect()->back();
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|min:3',
            'size' => 'required',
            'condition' => 'required',
            'priceMin' => 'required',
            'priceMax' => 'required'
        ]);

        $user = Auth::user();
        $range = '$' . $request->input('priceMin') . ', $' . $request->input('priceMax');

        if ($request->input('user_email') != null)
            $user = User::whereEmail($request->input('user_email'))->first();

        $user->items()->create([
            'name' => $request->input('name'),
            'size' => strtoupper($request->input('size')),
            'condition' => $request->input('condition'),
            'range' => $range,
            'dropped_off' => $request->input('dropped_off')
        ]);

        if ($request->input('user_email') == null)
            Mail::to($this->adminEmail)->send(new NotifyAdminOfNewItem($user));

        return redirect()->back();
    }

    public function delete(Item $item)
    {
        $item->delete();
        return redirect()->back();
    }
}
