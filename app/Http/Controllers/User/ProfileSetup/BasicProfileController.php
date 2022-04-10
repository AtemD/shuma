<?php

namespace App\Http\Controllers\User\ProfileSetup;

use App\Helpers\ProfileSetup;
use App\References\Gender;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use App\Models\BasicProfile;

class BasicProfileController extends Controller
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
    public function create(Request $request)
    {
        // use policy to check if the user is allowed to create a basic profile
        $this->authorize('create', BasicProfile::class);

        return view('user/profile-setup/basic-profile/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->authorize('create', BasicProfile::class);

        // Validate the request data
        $validatedData = $request->validate([
            'gender' => ['required', 'integer', Rule::in([Gender::MALE, Gender::FEMALE])],
            'dob' => ['required', 'date_format:Y-m-d'],
            'bio' => ['required', 'max:1000'],
        ]);

        // Store the validated data in the session
        $request->session()->put('profile_setup.basic_profile', [
            'gender' => $validatedData['gender'],
            'dob' => $validatedData['dob'],
            'bio' => $validatedData['bio'],
        ]);

        $next_step = ProfileSetup::determineNextStep(ProfileSetup::STEP_1);
        return redirect($next_step);
    }
}
