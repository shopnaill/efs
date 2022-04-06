@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Clients Table</h4>
                    <a href="{{route('client.create')}}" class="btn btn-primary btn-sm">Add New</a>

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
                                        Website
                                    </th>
                                    <th>
                                        Status
                                    </th>
                                    <th>
                                        Amount
                                    </th>
                                    <th>
                                        Deadline
                                    </th>
                                    <th>
                                        Action
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($clients as $client)
                                <tr>
                                    <td class="py-1">
                                        <img src="{{ asset('storage/'.$client->logo) }}" alt="image" class="img-sm rounded-circle">
                                    </td>
                                    <td>
                                        {{ $client->name }}
                                    </td>
                                    <td>
                                        {{ $client->website }}
                                    </td>
                                    <td>
                                        @if($client->status == 1)
                                            <span class="badge badge-success">Active</span>
                                        @else
                                            <span class="badge badge-danger">Inactive</span>
                                        @endif
                                    </td>
                                    <td>
                                        {{ $client->amount }}
                                    </td>
                                    <td>
                                        {{ $client->deadline }}
                                    </td>
                                    <td>
                                        <a  href="{{ route('client.edit', $client->id) }}" class="btn btn-secondary btn-sm">Edit</a>
                                        <a class="btn btn-sm btn-primary delete-btn" data-id="{{$client->id}}" data-toggle="modal" data-target="#deleteModal">Delete</a>
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

    @include('admin.client.delete')
@endsection

@section('scripts')
    <script>
        $(document).ready(function(){
            $(document).on('click', '.delete-btn', function(){
                var id = $(this).attr('data-id');
                var url = "{{ route('client.delete', ':id') }}";
                url = url.replace(':id', id);
                $('#delete-form').attr('action', url);

             });
        });
    </script>
@endsection
