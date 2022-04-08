@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h3 class="card-title">
                        {{ isset($slider) ? __('Edit') : __('Create') }}
                    </h3>
                </div>

                <div class="card-body">
                    <form action="{{ route('admin.slider.update_create') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="name">{{ __('Title') }}</label>
                            <textarea name="name" id="name" class="form-control" rows="3">{{ isset($slider) ? $slider->name : '' }}</textarea>
                        </div>
                        <div class="mb-3">
                            <label for="description">{{ __('Description') }}</label>
                            <textarea name="description" id="description" class="form-control"
                                rows="3">{{ isset($slider) ? $slider->description : '' }}</textarea>
                        </div>
                        <div class="mb-3">
                            <img width="100" class="img-fluid"
                                src="{{ isset($slider) ? asset('storage/' . $slider->photo) : '' }}" alt="">
                            <br>
                            <label for="photo">{{ __('Photo') }}</label>
                            <input type="file" name="image" id="photo" class="form-control"
                                value="{{ isset($slider) ? $slider->photo : '' }}" accept="image/*">
                        </div>

                        @if (isset($slider))
                            <input type="hidden" name="id" value="{{ $slider->id }}">
                        @endif


                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary">{{ __('Save') }}</button>
                        </div>
                    </form>
                </div>


                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif


            </div>
        </div>
    </div>
@endsection
