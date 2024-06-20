<?php

namespace App\Http\Controllers;

use App\Models\WishedProperty;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use App\Models\Property;
use App\Models\Lendlord;

class DashboardController extends Controller
{
    public function index(Request $request)
    {

        $user = Auth::user();

        $lendlord = Lendlord::where('user_id', $user->id)->first();

        if(!$lendlord) {
            return redirect()->route('wishlist');
        }

        $properties = $lendlord ? $lendlord->properties : new Collection();

        return view('dashboard', compact('properties', 'lendlord'));
    }

    public function wishlist(Request $request)
    {

        $user = Auth::user();

        $lendlord = Lendlord::where('user_id', $user->id)->first();

        $wished = WishedProperty::where('user_id', $user->id)->get();
        $wishedPropertyId = $wished->pluck('property_id');
        $wishedProperties = Property::whereIn('property_id', $wishedPropertyId)->get();

        $properties = $wished->count() > 0 ? $wishedProperties : new Collection();

        return view('wishlist', compact('properties', 'lendlord'));
    }
}
