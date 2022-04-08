@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h3 class="card-title">
                        {{ isset($manager) ? __('Edit') : __('Create') }}
                    </h3>
                </div>

                <div class="card-body">
                    <form action="{{ route('admin.manager.update_create') }}" method="post">
                        @csrf
                        <div class="mb-3">
                            <label for="name">{{ __('Name') }}</label>
                            <input required type="text" name="name" id="name" class="form-control"
                                value="{{ isset($manager) ? $manager->name : '' }}">
                        </div>

                        @if (isset($manager))
                            <input type="hidden" name="id" value="{{ $manager->id }}">
                        @endif
                        <div class="mb-3">
                            <label for="role">{{ __('Roles') }}</label>
                            <select name="role" id="role" class="form-control">
                                @foreach ($roles as $key => $role)
                                    <option value="{{ $role->id }}"
                                        {{ isset($manager) && $manager->role == $role->id ? 'selected' : '' }}>
                                        {{ $role->role }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="email">{{ __('E-mail') }}</label>
                            <input required autocomplete="address-level1" type="email" name="email" id="email"
                                class="form-control" value="{{ isset($manager) ? $manager->email : '' }}">
                        </div>
                        <div class="mb-3">
                            <label for="password">{{ __('Password') }}</label>
                            <input type="password" name="user_password" id="password" class="form-control"
                                autocomplete="additional-name">
                        </div>

                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary">{{ __('Save') }}</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
@endsection
