@extends('layouts.admin')
<link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/highlight.js/11.4.0/styles/default.min.css">
<script src="//cdnjs.cloudflare.com/ajax/libs/highlight.js/11.4.0/highlight.min.js"></script>
<style>
    .ql-container {
        height: 500px;
    }

    .ql-editor {
        direction: rtl;
        text-align: right;
    }

</style>
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
                            <label for="title_en">{{ __('Title En') }}</label>
                            <textarea name="name_en" id="title_en" class="form-control"
                                rows="3">{{ isset($slider) ? $slider->name_en : '' }}</textarea>
                        </div>
                        <div class="mb-3">
                            <label for="description">{{ __('Description') }}</label>
                            <div dir="rtl" id="editor">
                                {!! isset($slider) ? $slider->description : '' !!}
                            </div>
                            <input type="hidden" name="description" id="description">
                        </div>
                        <div class="mb-3">
                            <label for="description_en">{{ __('Description En') }}</label>
                            <div dir="rtl" id="editor_en">
                                {!! isset($slider) ? $slider->description_en : '' !!}
                            </div>
                            <input type="hidden" name="description_en" id="description_en">
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
@section('scripts')
    <!-- Include the Quill library -->
    <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>

    <!-- Initialize Quill editor -->
    <script>
        var toolbarOptions = [

            [{
                'header': 1
            }, {
                'header': 2
            }], // custom button values
            [{
                'list': 'ordered'
            }, {
                'list': 'bullet'
            }],
            [{
                'script': 'sub'
            }, {
                'script': 'super'
            }], // superscript/subscript
            [{
                'indent': '-1'
            }, {
                'indent': '+1'
            }], // outdent/indent

            [{
                'header': [1, 2, 3, 4, 5, 6, false]
            }],

            [{
                'color': []
            }, {
                'background': []
            }], // dropdown with defaults from theme
            [{
                'font': []
            }],
            [{
                'align': []
            }],

        ];

        var quill = new Quill('#editor', {
            direction: 'rtl',
            modules: {
                toolbar: toolbarOptions
            },
            theme: 'snow'
        });

        // en_editor 
        var quill_en = new Quill('#editor_en', {
            direction: 'rtl',
            modules: {
                toolbar: toolbarOptions
            },
            theme: 'snow'
        });
        $('#description_en').val(quill_en.root.innerHTML);
        $('#description').val(quill.root.innerHTML);

        quill_en.on('text-change', function(delta, oldDelta, source) {
            $('#description_en').val(quill_en.root.innerHTML);
        });
        // add a change handler for the editor
        quill.on('text-change', function(delta, oldDelta, source) {
            document.getElementById('description').value = quill.root.innerHTML;
        });
    </script>
@endsection
