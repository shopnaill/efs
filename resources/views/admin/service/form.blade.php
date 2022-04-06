@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Service Form</h4>

                    <form class="forms-sample" action="{{ route('service.update_create') }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputName1">Name</label>
                            <input type="text" name="name" class="form-control" id="exampleInputName1" placeholder="Name"
                                value="{{ isset($service) ? $service->name : '' }}" required>
                        </div>

                        <div class="form-group">
                            <label>Icon</label>
                            <input type="file" name="service_logo" id="logo" class="file-upload-default">
                            <div class="input-group col-xs-12">
                                <div class="form-control file-upload-info">
                                    @if (isset($service))
                                        <img src="{{ asset('storage/' . $service->logo) }}" alt="image"
                                            class="img-sm rounded-circle">
                                    @else
                                        <img src="https://cdn.logo.com/hotlink-ok/logo-social.png" alt="image"
                                            class="img-sm rounded-circle">
                                    @endif
                                </div>
                                <span class="input-group-append">
                                    <label for="logo" class="file-upload-browse btn btn-primary"
                                        type="button">Upload</label>
                                </span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputCity1">Description</label>
                            <textarea name="description" class="form-control" id="exampleInputCity1" placeholder="Description"
                                required>{{ isset($service) ? $service->description : '' }}</textarea>

                        </div>

                        <button type="submit" class="btn btn-primary mr-2">Submit</button>
                        <button class="btn btn-light">Cancel</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
