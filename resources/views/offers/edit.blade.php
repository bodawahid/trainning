<x-form route="{{ route('offers.update', $offer->id) }}" title="{{ __('offers.Offer Edit') }}" :value="$offer"
    submitLabel="{{ __('offers.Update') }}" />
