@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Services Table</h4>
                    <a href="{{route('admin.service.create')}}" class="btn btn-primary btn-sm">Add New</a>

                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>
                                        Logo
                                    </th>
                                    <th>
                                        Name
                                    </th>
                                    <th>
                                        Action
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($services as $service)
                                <tr>
                                    <td class="py-1">
                                        <img src="{{ asset('storage/'.$service->logo) }}" alt="image" class="img-sm rounded-circle">
                                    </td>
                                    <td>
                                        {{ $service->name }}
                                    </td>
                                    <td>
                                        <a  href="{{ route('admin.service.edit', $service->id) }}" class="btn btn-secondary btn-sm">Edit</a>
                                        <a class="btn btn-sm btn-primary delete-btn" data-id="{{$service->id}}" data-toggle="modal" data-target="#deleteModal">Delete</a>
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

    @include('admin.service.delete')
@endsection

@section('scripts')
    <script>
        $(document).ready(function(){
            $(document).on('click', '.delete-btn', function(){
                var id = $(this).attr('data-id');
                var url = "{{ route('admin.service.delete', ':id') }}";
                url = url.replace(':id', id);
                $('#delete-form').attr('action', url);

             });
        });
    </script>
@endsection
