@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Team Form</h4>

                    <form class="forms-sample" action="{{ route('admin.team.update_create') }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputName1">Name</label>
                            <input type="text" name="name" class="form-control" id="exampleInputName1" placeholder="Name"
                                value="{{ isset($team) ? $team->name : '' }}" required>
                        </div>

                        <div class="form-group">
                            <label>Photo</label>
                            <input type="file" name="team_photo" id="logo" class="file-upload-default">
                            <div class="input-group col-xs-12">
                                <div class="form-control file-upload-info">
                                    @if (isset($team))
                                        <img src="{{ asset('storage/' . $team->photo) }}" alt="image"
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
                            <label for="position">Position</label>
                            <select id="position" name="position" class="form-control">
                                <option value="">Select Position</option>
                                <option value="Developer"
                                    {{ isset($team) && $team->position == 'Developer' ? 'selected' : '' }}>Developer
                                </option>
                                <option value="Designer"
                                    {{ isset($team) && $team->position == 'Designer' ? 'selected' : '' }}>Designer
                                </option>
                                <option value="Marketing"
                                    {{ isset($team) && $team->position == 'Marketing' ? 'selected' : '' }}>Marketing
                                </option>
                                <option value="Sales" {{ isset($team) && $team->position == 'Sales' ? 'selected' : '' }}>
                                    Sales</option>
                                <option value="HR" {{ isset($team) && $team->position == 'HR' ? 'selected' : '' }}>HR
                                </option>
                                <option value="Accounting"
                                    {{ isset($team) && $team->position == 'Accounting' ? 'selected' : '' }}>Accounting
                                </option>
                                <option value="IT" {{ isset($team) && $team->position == 'IT' ? 'selected' : '' }}>IT
                                </option>
                                <option value="Other" {{ isset($team) && $team->position == 'Other' ? 'selected' : '' }}>
                                    Other</option>
                            </select>


                        </div>

                        <button type="submit" class="btn btn-primary mr-2">Submit</button>
                        <button class="btn btn-light">Cancel</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
