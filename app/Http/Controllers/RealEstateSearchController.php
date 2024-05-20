<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Property;
use App\Models\PropertyType;

class RealEstateSearchController extends Controller
{
    public function search(Request $request)
    {
        $query = $request->validate([
            'location' => 'nullable|string',
            'min_price' => 'nullable|numeric',
            'max_price' => 'nullable|numeric',
            'property_type' => 'nullable|string'
        ]);

        $property_types = PropertyType::all();

        // $results = json_encode($request->input('min_price'));

        $properties = Property::where(function ($query) use ($request) {
            if ($request->input('min_price')) {
                $query->where('cost', '>=', $request->input('min_price'));
            }
            if ($request->input('max_price')){
                $query->where('cost', '<=', $request->input('max_price'));
            }
            if ($request->input('property_type')){
                $query->where('property_type_id', $request->input('property_type'));
            }
            if($request->input('num_bed')){
                $query->where('property_details->bedrooms', $request->input('num_bed'));
            }
        })->get();

        // Return the search results to a view or as JSON
        return view('search_results', [
            'properties' => $properties,
            'request' => $request,
            'property_types' => $property_types
        ]);
    }
}

 // Process the search here. For example, you might query your database:
        // $results = Property::where(function ($query) use ($request) {
        //     if ($request->location) {
        //         $query->where('location', 'LIKE', "%{$request->location}%");
        //     }
        //     if ($request->min_price) {
        //         $query->where('price', '>=', $request->min_price);
        //     }
        //     if ($request->max_price) {
        //         $query->where('price', '<=', $request->max_price);
        //     }
        //     if ($request->property_type) {
        //         $query->where('property_type', $request->property_type);
        //     }
        // })->get();
