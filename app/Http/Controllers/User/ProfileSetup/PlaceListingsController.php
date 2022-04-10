<?php

namespace App\Http\Controllers\User\ProfileSetup;

use App\Http\Controllers\Controller;
use App\Helpers\ProfileSetup;
use App\References\Currency;
use App\References\PlaceType;
use App\References\FurnishingType;
use App\References\PeriodType;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;

class PlaceListingsController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth']);
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user/profile-setup/place-listings/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'rent_amount' => ['required', 'integer'],
            'rent_period' => ['required', 'integer'],
            'bills_included' => ['required', 'string', Rule::in("yes", "no")],
            'currency' => ['required', 'integer', Rule::in(array_keys(Currency::currencyList()))],
            'place_type' => ['required', 'integer', Rule::in(array_keys(PlaceType::placeTypeList()))],
            'furnishing_type' => ['required', 'integer', Rule::in(array_keys(FurnishingType::furnishingTypeList()))],
            'min_stay_period' => ['required', 'integer'],
            'min_stay_period_type' => ['required', 'integer', Rule::in(array_keys(PeriodType::rentPeriodTypeList()))],
            'availability_date' => ['required', 'date_format:Y-m-d'],
            'description' => ['required', 'max:1000'],
            // 'featured_image' => ['required', 'image', 'max:4096', 'mimes:jpg,jpeg,png'],
        ]);

        $request->session()->put('profile_setup.place_listings', [
            'rent_amount' => $validatedData['rent_amount'],
            'rent_period' => $validatedData['rent_period'],
            'rent_currency' => $validatedData['currency'],
            'bills_included' => $validatedData['bills_included'],
            'place_type' => $validatedData['place_type'],
            'furnishing_type' => $validatedData['furnishing_type'],
            'min_stay_period' => PeriodType::convertPeriodTypeToDays($validatedData['min_stay_period_type']),
            'min_stay_period_type' => $validatedData['min_stay_period_type'],
            'availability_date' => $validatedData['availability_date'],
            'description' => $validatedData['description'],
            'featured_image' => 'imag1.jpg',
            // 'featured_image' => $path,
        ]);

        $next_step = ProfileSetup::determineNextStep(ProfileSetup::STEP_2_LISTER);
        return redirect($next_step);
    }
}
