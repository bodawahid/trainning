<?php

namespace App\Http\Controllers\Offer;

use App\Http\Controllers\Controller;
use App\Http\Requests\OfferRequest;
use App\Models\Offer;
use Illuminate\Http\Request;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use App\Traits\OfferTrait;
use Illuminate\Support\Facades\File;

class OfferController extends Controller
{
    use OfferTrait;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $offers =  Offer::select('id', 'name_' . LaravelLocalization::getCurrentLocale() . ' as name', 'description_' . LaravelLocalization::getCurrentLocale() . ' as description', 'price', 'features_' . LaravelLocalization::getCurrentLocale() . ' as features', 'image')->get();
        return view('offers.index', compact('offers'));
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
    public function store(OfferRequest $request)
    {
        $path = 'images/offers';
        $data = $this->getImageWithData($request, $path);
        Offer::create($data);
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
    public function edit(Offer $offer)
    {
        return view('offers.edit', compact('offer'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(OfferRequest $request, Offer $offer)
    {
        $path = 'images/offers';
        if ($request->hasFile('image') and $offer->image) {
            File::delete(public_path($path .'/'. $offer->image));
        }
        $data = $this->getImageWithData($request, $path);
        $offer->update($data);
        return redirect()->route('offers.index')->with('success', 'Offer is Updated Successfully');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
    // helper functions for rules and error messages .

}
