@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Client Form</h4>

                    <form class="forms-sample" action="{{ route('client.update_create') }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputName1">Name</label>
                            <input type="text" name="name" class="form-control" id="exampleInputName1" placeholder="Name"
                                value="{{ isset($client) ? $client->name : '' }}" required>
                        </div>

                        <div class="form-group">
                            <label>Logo</label>
                            <input type="file" name="client_logo" id="logo" class="file-upload-default">
                            <div class="input-group col-xs-12">
                                <div class="form-control file-upload-info">
                                    @if (isset($client))
                                        <img src="{{ asset('storage/' . $client->logo) }}" alt="image"
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
                            <label for="exampleInputCity1">Website</label>
                            <input type="text" name="website" class="form-control" id="exampleInputCity1"
                                placeholder="Website" value="{{ isset($client) ? $client->website : '' }}" required>
                        </div>

                        <button type="submit" class="btn btn-primary mr-2">Submit</button>
                        <button class="btn btn-light">Cancel</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
