@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                          <label for="username" class="col-md-4 col-form-label text-md-end">{{ __('Username') }}</label>

                          <div class="col-md-6">
                              <input id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="name" autofocus>

                              @error('username')
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                              @enderror
                          </div>
                        </div>

                        <div class="row mb-3">
                          <label for="company" class="col-md-4 col-form-label text-md-end">{{ __('Company') }}</label>
                          <div class="col-md-6">
                            <select
                              name="company_id"
                              class="form-select"
                              id="company"
                              required>
                              <option value="">Choose Company</option>
                              @foreach ($companies as $company)
                                @if (old('company_id') == $company->id)
                                  <option value="{{ $company->id }}" selected>{{ $company->company_name }}</option>
                                @else
                                  <option value="{{ $company->id }}">{{ $company->company_name }}</option>
                                @endif
                              @endforeach
                            </select>
                          </div>
                        </div>

                        <div class="row mb-3">
                          <label for="phone" class="col-md-4 col-form-label text-md-end">{{ __('Phone') }}</label>

                          <div class="col-md-6">
                              <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" required autocomplete="phone" autofocus>

                              @error('phone')
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                              @enderror
                          </div>
                        </div>

                        <div class="row mb-3">
                          <label for="role" class="col-md-4 col-form-label text-md-end">{{ __('Role') }}</label>

                          <div class="col-md-6">
                              <select
                                name="role"
                                class="form-select"
                                id="role"
                                value="{{ old('role') }}"
                                required>
                                <option value="">Choose Role</option>
                                {{-- <option value="superadmin">Superadmin</option> --}}
                                <option value="admin">Admin</option>
                                <option value="staff">Staff</option>
                              </select>
                          </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
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
