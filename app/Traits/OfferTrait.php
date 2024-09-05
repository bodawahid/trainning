<?php

namespace App\Traits;

use Illuminate\Http\Request;

trait OfferTrait
{
    public function getImageWithData(Request $request, String $path): array
    {
        $data = $request->except('image');
        if ($request->hasFile('image')) {
            $extension =  $request->image->getClientOriginalExtension();
            $file_name = time() . '.' . $extension;
            $request->image->move($path, $file_name);
            $data['image'] = $file_name;
        }
        return $data;
    }
}
