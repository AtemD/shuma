<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Helpers\ProfileSetup;
use App\Models\PersonalPreference;
use App\References\DietHabit;
use App\References\SmokingHabit;
use App\References\AlcoholHabit;
use App\References\PartyingHabit;
use App\References\GuestHabit;
use App\References\MaritalStatus;
use App\References\OccupationType;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;

class PersonalPreferencesController extends Controller
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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $personal_preference = auth()->user()->personalPreference()->firstOrFail();

        return view('user/personal-preferences/index', compact('personal_preference'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user/personal-preferences/create');
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
            'diet_habit' => ['required', 'integer', Rule::in(array_keys(DietHabit::dietHabitList()))],
            'smoking_habit' => ['required', 'integer', Rule::in(array_keys(SmokingHabit::smokingHabitList()))],
            'alcohol_habit' => ['required', 'integer', Rule::in(array_keys(AlcoholHabit::alcoholHabitList()))],
            'partying_habit' => ['required', 'integer', Rule::in(array_keys(PartyingHabit::partyingHabitList()))],
            'guest_habit' => ['required', 'integer', Rule::in(array_keys(GuestHabit::guestHabitList()))],
            'occupation_type' => ['required', 'integer', Rule::in(array_keys(OccupationType::occupationTypeList()))],
            'marital_status' => ['required', 'integer', Rule::in(array_keys(MaritalStatus::maritalStatusList()))],
        ]);

        // Store the personal preferences in the session
        $request->session()->put('profile_setup.personal_preferences', [
            'diet_habit' => $validatedData['diet_habit'],
            'smoking_habit' => $validatedData['smoking_habit'],
            'alcohol_habit' => $validatedData['alcohol_habit'],
            'partying_habit' => $validatedData['partying_habit'],
            'guest_habit' => $validatedData['guest_habit'],
            'occupation_type' => $validatedData['occupation_type'],
            'marital_status' => $validatedData['marital_status'],
        ]);

        $next_step = ProfileSetup::determineNextStep(ProfileSetup::STEP_3);
        return redirect($next_step);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  PersonalPreference  $personal_preference
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PersonalPreference  $personal_preference)
    {
        $this->authorize('update', $personal_preference);

        $validatedData = $request->validate([
            'diet_habit' => ['required', 'integer', Rule::in(array_keys(DietHabit::dietHabitList()))],
            'smoking_habit' => ['required', 'integer', Rule::in(array_keys(SmokingHabit::smokingHabitList()))],
            'alcohol_habit' => ['required', 'integer', Rule::in(array_keys(AlcoholHabit::alcoholHabitList()))],
            'partying_habit' => ['required', 'integer', Rule::in(array_keys(PartyingHabit::partyingHabitList()))],
            'guest_habit' => ['required', 'integer', Rule::in(array_keys(GuestHabit::guestHabitList()))],
            'occupation_type' => ['required', 'integer', Rule::in(array_keys(OccupationType::occupationTypeList()))],
            'marital_status' => ['required', 'integer', Rule::in(array_keys(MaritalStatus::maritalStatusList()))],
        ]);

        $personal_preference->update([
            'diet_habit' => $validatedData['diet_habit'],
            'smoking_habit' => $validatedData['smoking_habit'],
            'alcohol_habit' => $validatedData['alcohol_habit'],
            'partying_habit' => $validatedData['partying_habit'],
            'guest_habit' => $validatedData['guest_habit'],
            'occupation_type' => $validatedData['occupation_type'],
            'marital_status' => $validatedData['marital_status'],
        ]);

        return back()->with('success', 'Your Personal Preference Information Has Been Updated Successfully');
    }
}
