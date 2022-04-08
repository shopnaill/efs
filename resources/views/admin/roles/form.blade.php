@php
$admin = true;
$permissions = [
    '1' => __('Home'),
    '11' => __('Contact Requests'),
    '4' => __('Website Pages'),
    '7' => __('Contact Links'),
    '9' => __('System Users'),
];
@endphp
@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h3 class="card-title">
                        {{ isset($role) ? __('Edit') : __('Create') }}
                    </h3>
                </div>

                <div class="card-body">
                    <form action="{{ route('admin.roles.update_create') }}" method="post">
                        @csrf
                        <div class="mb-3">
                            <label for="role">{{ __('Role') }}</label>
                            <input type="text" name="role" id="role" class="form-control"
                                value="{{ isset($role) ? $role->role : '' }}">
                        </div>
                        @if (isset($role))
                            <input type="hidden" name="id" value="{{ $role->id }}">
                        @endif
                        <div class="mb-3">
                            <label for="permissions">{{ __('Permissions') }}</label>

                            @foreach ($permissions as $key => $permission)
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="{{ $permission }}"
                                        name="permission[]" value="{{ $key }}"
                                        {{ isset($role) ? ($role->hasPermissionTo($key) ? 'checked' : '') : '' }}>
                                    <label class="custom-control-label"
                                        for="{{ $permission }}">{{ $permission }}</label>
                                </div>
                            @endforeach
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
