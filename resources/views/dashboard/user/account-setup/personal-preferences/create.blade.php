@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="card card-default card-outline card-primary mt-4 shadow">
                <div class="card-header">
                    <h5>(2/6) <b>{{ __('Personal Preferences') }}</b></h4>
                </div>
<!-- 
    Diet habits, 
    smoking habits, - smoker, non-smoker 
    alcohol habits, - occasional, frequent, none
    marital status, - married, unmarried
    partying habits, - occasional, frequent, none
    guest habits, - occasional, frequent, none
    occupation - working professional, student, undergraduate student, graduate student
-->
                <div class="card-body">
                    <form method="POST" action="{{ route('user.account-setup.personal-preferences.store') }}">
                        @csrf

                        <h5>Diet Habits?</h5>
                        <div class="form-group row">
                            <div class="col-md-12">
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="user_type_1" name="user_type" class="custom-control-input" value="{{App\Classes\UserType::LISTER}}" {{ old('user_type')== App\Classes\UserType::LISTER ? 'checked' : '' }}>
                                    <label class="custom-control-label font-weight-normal" for="user_type_1">Vegetarian</label>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="user_type_2" name="user_type" class="custom-control-input" value="{{App\Classes\UserType::SEARCHER}}" {{ old('user_type')== App\Classes\UserType::SEARCHER ? 'checked' : '' }}>
                                    <label class="custom-control-label font-weight-normal" for="user_type_2">Non-vegetarian</label>
                                </div>
                            </div>

                            @error('user_type')
                            <span class="text-danger pl-3" role="alert">
                                <small><strong>{{ $message }}</strong></small>
                            </span>
                            @enderror
                        </div>

                        <h5>Smoking Habits?</h5>
                        <div class="form-group row">
                            <div class="col-md-12">
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="user_type_1" name="user_type" class="custom-control-input" value="{{App\Classes\UserType::LISTER}}" {{ old('user_type')== App\Classes\UserType::LISTER ? 'checked' : '' }}>
                                    <label class="custom-control-label font-weight-normal" for="user_type_1">Non-smoker</label>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="user_type_2" name="user_type" class="custom-control-input" value="{{App\Classes\UserType::SEARCHER}}" {{ old('user_type')== App\Classes\UserType::SEARCHER ? 'checked' : '' }}>
                                    <label class="custom-control-label font-weight-normal" for="user_type_2">Smoker</label>
                                </div>
                            </div>

                            @error('user_type')
                            <span class="text-danger pl-3" role="alert">
                                <small><strong>{{ $message }}</strong></small>
                            </span>
                            @enderror
                        </div>

                        <h5>Alcohol Habits?</h5>
                        <div class="form-group row">
                            <div class="col-md-12">
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="user_type_1" name="user_type" class="custom-control-input" value="{{App\Classes\UserType::LISTER}}" {{ old('user_type')== App\Classes\UserType::LISTER ? 'checked' : '' }}>
                                    <label class="custom-control-label font-weight-normal" for="user_type_1">Occasional</label>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="user_type_2" name="user_type" class="custom-control-input" value="{{App\Classes\UserType::SEARCHER}}" {{ old('user_type')== App\Classes\UserType::SEARCHER ? 'checked' : '' }}>
                                    <label class="custom-control-label font-weight-normal" for="user_type_2">Frequent</label>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="user_type_2" name="user_type" class="custom-control-input" value="{{App\Classes\UserType::SEARCHER}}" {{ old('user_type')== App\Classes\UserType::SEARCHER ? 'checked' : '' }}>
                                    <label class="custom-control-label font-weight-normal" for="user_type_2">None</label>
                                </div>
                            </div>

                            @error('user_type')
                            <span class="text-danger pl-3" role="alert">
                                <small><strong>{{ $message }}</strong></small>
                            </span>
                            @enderror
                        </div>

                        <h5>Partying Habits?</h5>
                        <div class="form-group row">
                            <div class="col-md-12">
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="user_type_1" name="user_type" class="custom-control-input" value="{{App\Classes\UserType::LISTER}}" {{ old('user_type')== App\Classes\UserType::LISTER ? 'checked' : '' }}>
                                    <label class="custom-control-label font-weight-normal" for="user_type_1">Occasional</label>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="user_type_2" name="user_type" class="custom-control-input" value="{{App\Classes\UserType::SEARCHER}}" {{ old('user_type')== App\Classes\UserType::SEARCHER ? 'checked' : '' }}>
                                    <label class="custom-control-label font-weight-normal" for="user_type_2">Frequent</label>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="user_type_2" name="user_type" class="custom-control-input" value="{{App\Classes\UserType::SEARCHER}}" {{ old('user_type')== App\Classes\UserType::SEARCHER ? 'checked' : '' }}>
                                    <label class="custom-control-label font-weight-normal" for="user_type_2">None</label>
                                </div>
                            </div>

                            @error('user_type')
                            <span class="text-danger pl-3" role="alert">
                                <small><strong>{{ $message }}</strong></small>
                            </span>
                            @enderror
                        </div>

                        <h5>Guest Habits?</h5>
                        <div class="form-group row">
                            <div class="col-md-12">
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="user_type_1" name="user_type" class="custom-control-input" value="{{App\Classes\UserType::LISTER}}" {{ old('user_type')== App\Classes\UserType::LISTER ? 'checked' : '' }}>
                                    <label class="custom-control-label font-weight-normal" for="user_type_1">Occasional</label>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="user_type_2" name="user_type" class="custom-control-input" value="{{App\Classes\UserType::SEARCHER}}" {{ old('user_type')== App\Classes\UserType::SEARCHER ? 'checked' : '' }}>
                                    <label class="custom-control-label font-weight-normal" for="user_type_2">Frequent</label>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="user_type_2" name="user_type" class="custom-control-input" value="{{App\Classes\UserType::SEARCHER}}" {{ old('user_type')== App\Classes\UserType::SEARCHER ? 'checked' : '' }}>
                                    <label class="custom-control-label font-weight-normal" for="user_type_2">None</label>
                                </div>
                            </div>

                            @error('user_type')
                            <span class="text-danger pl-3" role="alert">
                                <small><strong>{{ $message }}</strong></small>
                            </span>
                            @enderror
                        </div>

                        <h5>Marital Status?</h5>
                        <div class="form-group row">
                            <div class="col-md-12">
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="user_type_1" name="user_type" class="custom-control-input" value="{{App\Classes\UserType::LISTER}}" {{ old('user_type')== App\Classes\UserType::LISTER ? 'checked' : '' }}>
                                    <label class="custom-control-label font-weight-normal" for="user_type_1">Married</label>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="user_type_2" name="user_type" class="custom-control-input" value="{{App\Classes\UserType::SEARCHER}}" {{ old('user_type')== App\Classes\UserType::SEARCHER ? 'checked' : '' }}>
                                    <label class="custom-control-label font-weight-normal" for="user_type_2">Un-Married</label>
                                </div>
                            </div>

                            @error('user_type')
                            <span class="text-danger pl-3" role="alert">
                                <small><strong>{{ $message }}</strong></small>
                            </span>
                            @enderror
                        </div>

                        <h5>Occupation Type?</h5>
                        <div class="form-group row">
                            <div class="col-md-12">
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="user_type_1" name="user_type" class="custom-control-input" value="{{App\Classes\UserType::LISTER}}" {{ old('user_type')== App\Classes\UserType::LISTER ? 'checked' : '' }}>
                                    <label class="custom-control-label font-weight-normal" for="user_type_1">Working Professional</label>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="user_type_2" name="user_type" class="custom-control-input" value="{{App\Classes\UserType::SEARCHER}}" {{ old('user_type')== App\Classes\UserType::SEARCHER ? 'checked' : '' }}>
                                    <label class="custom-control-label font-weight-normal" for="user_type_2">Student</label>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="user_type_2" name="user_type" class="custom-control-input" value="{{App\Classes\UserType::SEARCHER}}" {{ old('user_type')== App\Classes\UserType::SEARCHER ? 'checked' : '' }}>
                                    <label class="custom-control-label font-weight-normal" for="user_type_2">Working professional and Student</label>
                                </div>
                            </div>

                            @error('user_type')
                            <span class="text-danger pl-3" role="alert">
                                <small><strong>{{ $message }}</strong></small>
                            </span>
                            @enderror
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-12 d-flex justify-content-between">
                            <button type="submit" class="btn btn-warning">
                                    {{ __('<< prev') }}
                                </button>
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Next >>') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection