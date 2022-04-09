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
                    <h4 class="card-title">About</h4>
                    <form action="{{ route('admin.about.update', $about->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" class="form-control" name="title" id="title" value="{{ $about->title }}">
                        </div>
                        <div class="form-group">
                            <label for="title_en">Title (English)</label>
                            <input type="text" class="form-control" name="title_en" id="title_en"
                                value="{{ $about->title_en }}">
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <div dir="rtl" id="editor">
                                {!! isset($about) ? $about->description : '' !!}
                            </div>
                            <input type="hidden" name="description" id="description">
                        </div>
                        <div class="form-group">
                            <label for="description_en">Description (English)</label>
                            <div dir="rtl" id="editor_en">
                                {!! isset($about) ? $about->description_en : '' !!}
                            </div>
                            <input type="hidden" name="description_en" id="description_en">
                        </div>
                        <div class="form-group">
                            <label for="photo">Photo</label>
                            <input type="file" class="form-control" name="image" id="photo">
                            <img width="350" src="{{ asset('storage/' . $about->photo) }}" alt="image"
                                class="img-fluid">
                        </div>

                        <button type="submit" class="btn btn-primary">Submit</button>
                </div>
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
