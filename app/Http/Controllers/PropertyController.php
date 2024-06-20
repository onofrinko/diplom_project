<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePropertyRequest;
use App\Http\Requests\UpdatePropertyImageRequest;
use App\Http\Requests\UpdatePropertyRequest;
use App\Models\Property;
use App\Models\PropertyType;
use App\Models\WishedProperty;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;

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
        $user = Auth::user();
        return view('property.create', [
            'user' => $user,
            'propertyTypes' => PropertyType::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePropertyRequest $request)
    {
        $lendlord = Auth::user()->lendlord;
        $p = Property::create([
            'cost' => $request['property_cost'],
            'total_area' => $request['total_area'],
            'property_status' => $request['property_status'],
            'pub_date' => now(),
            'property_type_id' => $request['property_type_id'],
            'property_details' => $request['property_details'],
            'lendlord_id' => $lendlord->lendlord_id,
        ]);

        //$new->save();

        return redirect()
            ->route('property.show', $p->property_id)
            ->with('status', 'property-created');
    }

    /**
     * Display the specified resource.
     */
    public function show(Property $property)
    {
        $user = Auth::user();
        return view('property.show', [
            'user' => $user,
            'property' => $property,
        ]);
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
    public function update(UpdatePropertyRequest $request, Property $property)
    {
        $property->cost = $request->property_cost;
        $property->total_area = $request->total_area;
        $property->property_status = $request->property_status;
        $property->property_type_id = $request->property_type_id;
        $property->property_details = $request->property_details;
        $property->save();
        return Redirect::route('property.edit', $property->property_id)->with('status', 'property-updated');
    }

    public function updateImage(UpdatePropertyImageRequest $request, $id)
    {
        $property = Property::findOrFail($id);

        // Handle image upload
        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($property->image) {
                Storage::delete($property->image);
            }

            // Store new image
            $path = $request->file('image')->store('public/images');
            $property->update(['image' => $path]);
        }

        return redirect()->route('property.edit', $id)->with('status', 'image-updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Property $property)
    {
        //
    }

    public function wish(Property $property)
    {
        $user = Auth::user();
        $wished = WishedProperty::where('user_id', $user->id)
            ->where('property_id', $property->property_id)
            ->first();
        if ($wished) {
            return redirect()
                ->route('property.show', $property->property_id)
                ->with('status','property-already-wished');
        }

        WishedProperty::create([
            'user_id' => $user->id,
            'property_id' => $property->property_id,
        ]);
        return redirect()
            ->route('property.show', $property->property_id)
            ->with('status','property-wished');
    }
}
