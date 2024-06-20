<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Property;

class DetailsController extends Controller
{
    public function show($id)
    {
        $properties = Property::findOrFail($id);
        return view('show.details', compact('properties'));
    }
}
