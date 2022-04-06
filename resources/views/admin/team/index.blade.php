@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Team Table</h4>
                    <a href="{{route('team.create')}}" class="btn btn-primary btn-sm">Add New</a>

                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>
                                        Photo
                                    </th>
                                    <th>
                                        Name
                                    </th>
                                    <th>
                                        Position
                                    </th>
                                    <th>
                                        Action
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($teams as $team)
                                <tr>
                                    <td class="py-1">
                                        <img src="{{ asset('storage/'.$team->photo) }}" alt="image" class="img-sm rounded-circle">
                                    </td>
                                    <td>
                                        {{ $team->name }}
                                    </td>
                                    <td>
                                        {{ $team->position }}
                                    </td>
                                    <td>
                                        <a  href="{{ route('team.edit', $team->id) }}" class="btn btn-secondary btn-sm">Edit</a>
                                        <a class="btn btn-sm btn-primary delete-btn" data-id="{{$team->id}}" data-toggle="modal" data-target="#deleteModal">Delete</a>
                                    </td>
                                </tr>
                                @endforeach


                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('admin.team.delete')
@endsection

@section('scripts')
    <script>
        $(document).ready(function(){
            $(document).on('click', '.delete-btn', function(){
                var id = $(this).attr('data-id');
                var url = "{{ route('team.delete', ':id') }}";
                url = url.replace(':id', id);
                $('#delete-form').attr('action', url);

             });
        });
    </script>
@endsection
