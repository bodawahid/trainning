<?php

namespace App\Http\Controllers\Offer;

use App\Http\Controllers\Controller;
use App\Models\Offer;
use Illuminate\Http\Request;

class OfferController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $offers =  Offer::all();
        return view('offers.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('offers.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rules = $this->getRules();
        $messages = $this->getMessages();
        $request->validate($rules, $messages);
        Offer::create($request->toArray());
        return redirect()->route('offers.index')->with('success', 'offer is created successfully');
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
    // helper functions for rules and error messages .
    protected function getRules()
    {
        return [
            'name' => 'required|min:3|max:100|unique:offers,name',
            'description' => 'required|min:5|string',
            'price' => 'required|numeric|decimal:2',
        ];
    }
    protected function getMessages()
    {
        return [
            'name.required' => __('offers.name.required'),
            'description.required' => __('offers.description.required'),
            'price.required' =>  __('offers.price.required'),
        ];
    }
}
