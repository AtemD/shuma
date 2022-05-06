@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb bg-white">
            <li class="breadcrumb-item"><a href="{{ route('lister.home') }}">Home</a></li>
            <li class="breadcrumb-item">Account Settings</li>
            <li class="breadcrumb-item"><a href="{{ route('lister.basic-profile.index') }}">Basic Profile</a></li>
            <li class="breadcrumb-item">{{$spoken_language->name}}</li>
            <li class="breadcrumb-item active" aria-current="page">edit</li>
        </ol>
    </nav>
</div>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="card card-default card-outline card-primary mt-4 shadow">
                <div class="card-header">
                    <h5><b>{{ __('Spoken Language Editor') }}</b></h4>
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('lister.spoken-languages.update', ['spoken_language' => $spoken_language->id]) }}">
                        @method('PUT')
                        @csrf                        

                        <div class="form-group row">
                            <div class="col-12">
                                <label for="spoken_language">Spoken Language</label>
                                <input type="text" class="form-control @error('spoken_language') is-invalid @enderror" id="spoken_language" name="spoken_language" value="{{ old('spoken_language') ? old('spoken_language') : $spoken_language->name }}">

                                @error('spoken_language')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-12 d-flex justify-content-center">
                                <button type="submit" class="btn btn-block btn-primary">
                                    {{ __('Update Spoken Language') }}
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