<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Property;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;

class DetailsController extends Controller
{
    public function show($id)
    {
        $properties = Property::findOrFail($id);
        $user = Auth::user();
        return view('show.details', compact('properties', 'user'));
    }
}
