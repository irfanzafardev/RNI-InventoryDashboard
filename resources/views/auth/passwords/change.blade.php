@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Change Password') }}</div>
                @if ($message = Session::get('success'))
                <div class="alert alert-primary mt-2 mx-2" role="alert">
                  {{ $message }}
                </div>
                @endif
                <div class="card-body">
                    <form method="POST" action="{{ route('change.password') }}">
                        @csrf

                        @foreach ($errors->all() as $error)
                        <div class="alert alert-danger" role="alert">
                          {{ $error }}
                        </div>
                         @endforeach 

                        {{-- <input type="hidden" name="token" value="{{ $token }}"> --}}

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Current Password') }}</label>

                            <div class="col-md-6">
                                {{-- <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus> --}}
                                <input id="password" type="password" class="form-control" name="current_password" autocomplete="current-password" required autofocus>

                                @error('current_password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('New Password') }}</label>

                            <div class="col-md-6">
                                {{-- <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password"> --}}
                                <input id="new_password" type="password" class="form-control" name="new_password" autocomplete="current-password">

                                @error('new_password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                {{-- <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password"> --}}
                                <input id="new_confirm_password" type="password" class="form-control" name="new_confirm_password" autocomplete="current-password">
                               
                                @error('new_password')
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-0">
                          <div class="col-md-10">
                            <button type="submit" class="btn btn-primary bg-darkblue float-end">
                                {{ __('Change Password') }}
                            </button>
                            <a href="{{ url()->previous() }}" class="btn btn-light float-end me-3">Cancel</a>
                          </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
