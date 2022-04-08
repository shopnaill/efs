@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                <h3 class="card-title"> 
                    {{__('Sliders')}}
                </h3>
                <a href="{{ route('admin.slider.create') }}" class="btn btn-outline-dark float-left">
                    <i class="bi bi-plus-square-fill"></i>
                    {{__('Add New')}}
                </a>
            </div>
            <div class="card-body">
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>
                                {{__('Photo')}}
                            </th>
                            <th>
                                {{__('Name')}}
                            </th>
                           
                            <th class="text-center">
                                {{__('Actions')}}
                            </th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($sliders as $slider)
                            <tr>
                                <td>{{ $slider->id }}</td>
                                <td>
                                    <img src="{{ asset('storage/' . $slider->photo) }}" alt="{{ $slider->name }}" width="100" height="100">
                                </td>
                                <td>{{ $slider->name }}</td>
                                 <td class="text-center">
                                    <a href="{{ route('admin.slider.edit', $slider->id) }}" class="btn btn-outline-dark btn-sm">
                                        <i class="fs-4 bi-pen"></i>
                                    </a>

                                    <button type="button" data-bs-toggle="modal" data-bs-target="#DeleteModal"
                                        class="btn btn-outline-dark btn-sm delete-btn" data="{{ $slider->id }}">
                                        <i class="fs-4 bi-trash"></i>
                                    </button>
                        @endforeach
                    </tbody>
                </table>

                {{ $sliders->links() }}
            </div>
        </div>
    </div>
</div>

    @include('admin.slider.delete')
@endsection

@section('scripts')
    <script>
        $(document).on('click', '.delete-btn', function() {
             var id = $(this).attr('data');
            var url = "{{ route('admin.slider.delete', '#id') }}";
            url = url.replace('#id', id);
            $('#delete-form').attr('action', url);
        });
    </script>
@endsection
