<?php

namespace App\Http\Controllers;

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

        $properties = $lendlord ? $lendlord->properties : new Collection();

        return view('dashboard', compact('properties', 'lendlord'));
    }
}
