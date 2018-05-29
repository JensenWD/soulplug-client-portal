<?php

namespace App\Http\Controllers;

use App\Item;
use App\Mail\NotifyCustomerItemSold;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ItemController extends Controller
{
    public function update(Request $request)
    {
        $item = Item::findOrFail($request->input('id'));
        $item->update(['sold_on' => $request->input('sold_on')]);

        \Mail::to($item->user()->first())->send(new NotifyCustomerItemSold($item));

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

        $range = '$' . $request->input('priceMin') . ', $' . $request->input('priceMax');

        Auth::user()->items()->create([
            'name' => $request->input('name'),
            'size' => strtoupper($request->input('size')),
            'condition' => $request->input('condition'),
            'range' => $range,
            'dropped_off' => $request->input('dropped_off')
        ]);

        return redirect()->back();
    }

    public function delete(Item $item)
    {
        $item->delete();
        return redirect()->back();
    }
}
