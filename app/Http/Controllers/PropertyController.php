<?php

namespace App\Http\Controllers;

use App\Models\Property;
use App\Models\PropertyType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class PropertyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Property $property)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Property $property)
    {
        $user = Auth::user();
        return view('property.edit', [
            'property' => $property,
            'user' => $user,
            'propertyTypes' => PropertyType::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Property $property)
    {
        $property->cost = $request->property_cost;
        $property->total_area = $request->total_area;
        $property->property_status = $request->property_status;
        $property->property_type_id = $request->property_type_id;
//        $property->property_details = [
//            'address' => [
//                'city' => $request->city,
//                'building' => $request->building,
//                'street' => $request->street,
//                'zip' => $request->zip,
//            ],
//            'bedrooms' => $request->bedrooms,
//            'bathrooms' => $request->bathrooms,
//            'floors' => $request->floors,
//            'garage' => $request->garage,
//            'pool' => $request->pool,
//            'description' => $request->description,
//        ];
        $property->save();
        return Redirect::route('property.edit', $property->property_id)->with('status', 'property-updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Property $property)
    {
        //
    }
}
