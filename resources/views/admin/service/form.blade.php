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
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Service Form</h4>

                    <form class="forms-sample" action="{{ route('admin.service.update_create') }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputName1">Name</label>
                            <input type="text" name="name" class="form-control" id="exampleInputName1" placeholder="Name"
                                value="{{ isset($service) ? $service->name : '' }}" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputName1">Name (English)</label>
                            <input type="text" name="name_en" class="form-control" id="exampleInputName1"
                                placeholder="Name (English)" value="{{ isset($service) ? $service->name_en : '' }}"
                                required>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputName1">Description</label>
                            <div dir="rtl" id="editor">
                                {!! isset($service) ? $service->description : '' !!}
                            </div>
                            <input type="hidden" name="description" id="description">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputName1">Description (English)</label>
                            <div dir="rtl" id="editor_en">
                                {!! isset($service) ? $service->description_en : '' !!}
                            </div>
                            <input type="hidden" name="description_en" id="description_en">
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
                     
                        @if (isset($service))
                            <input type="hidden" name="id" value="{{ $service->id }}">
                        @endif

                        <button type="submit" class="btn btn-primary mr-2">Submit</button>
                        <button class="btn btn-light">Cancel</button>
                    </form>
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
