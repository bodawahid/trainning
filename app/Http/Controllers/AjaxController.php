<?php

namespace App\Http\Controllers;

use App\Http\Requests\OfferRequest;
use App\Models\Offer;
use App\Traits\OfferTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class AjaxController extends Controller
{
    use OfferTrait;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $offers =  Offer::select('id', 'name_' . LaravelLocalization::getCurrentLocale() . ' as name', 'description_' . LaravelLocalization::getCurrentLocale() . ' as description', 'features_' . LaravelLocalization::getCurrentLocale() . ' as features', 'price', 'created_at', 'deleted_at', 'image')->get();
        // return $offers;
        return view('ajax.index', compact('offers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('ajax.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(OfferRequest $offerRequest)
    {
        $path = 'images/offers';
        $data = $this->getImageWithData($offerRequest, $path);
        $offer = Offer::create($data);
        if ($offer)
            return response()->json([
                'status' => true,
                'msg' => 'تم التخزين بنجاح',
            ]);
        else
            return response()->json([
                'status' => false,
                'msg' => 'تم فشل التخزين'
            ]);
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
        return view('ajax.edit', compact('offer'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function ajaxUpdate(Request $request)
    {
        $offer = Offer::findOrFail($request->id);
        if ($offer->image and  $request->image) {
            File::delete(public_path('images/offers/' . $offer->image));
        }
        $path = 'images/offers';
        $data = $this->getImageWithData($request, $path);
        $offer->update($data);
        if ($offer) {
            return response()->json([
                'status' => true,
                'msg' => 'تم تحديث العرض بنجاح'
            ]);
        } else {
            return response()->json([
                'status' => false,
                'msg' => 'لم يتم تحديث العرض ',
            ]);
        }
    }
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $offer = Offer::find($request->id)->delete();
        if ($offer)
            return response()->json([
                'status' => true,
                'msg' => 'تم الحذف بنجاح',
            ]);
        else
            return response()->json([
                'status' => false,
            ]);
    }
    public function delete(Request $request)
    {
        $offer = Offer::findOrFail($request->id)->delete();
        if ($offer)
            return response()->json([
                'status' => true,
                'msg' => 'تم الحذف بنجاح',
                'id' => $request->id,
            ]);
        else
            return response()->json([
                'status' => false,
            ]);
    }
}
