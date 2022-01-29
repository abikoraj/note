@extends('layout.front.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('assets/dropify/css/dropify.min.css') }}">

    <style>
        .desc-box {
            border: 1px solid #ced4da;
            border-radius: 5px;
        }

        .add-image {
            width: 10rem;
            height: 10rem;
            overflow: hidden;
            cursor: pointer;
        }

        .add-image:hover {
            border: 1px solid #0D6EFD;

        }

        .add-image:hover>svg {
            transition: 0.2s;
            height: 50px;
            width: 50px;
            color: #0D6EFD;
        }

        .img-del {
            position: absolute;
            right: 5px;
            top: 5px;
        }

        .delete {
            display: none;
        }

        .img-box:hover .delete {
            display: block
        }

        @media (max-width: 768px) {
            .delete {
                display: block;
            }
        }

        @media (max-width: 471px) {
            .add-image {
                width: 10rem;
                height: 10rem;
            }
        }

        @media (max-width: 407px) {
            .add-image {
                width: 8rem;
                height: 8rem;
            }
        }

        @media (max-width: 343px) {
            .add-image {
                width: 6.5rem;
                height: 6.5rem;
            }
        }

    </style>
@endsection

@php
$notes = $subject->note->all();
@endphp

@section('content')
    <div>
        @foreach ($notes as $note)
            <div class="card">
                <div class="card-header" id="heading">

                    <a class="btn btn-link" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample"
                        aria-expanded="false" aria-controls="collapseExample">
                        {{ $note->title }}
                    </a>

                </div>

                <div id="collapseExample" class="collapse" aria-labelledby="heading" data-parent="#accordionExample">
                    <div class="card-body">

                        <div class="row">
                            <div class="col-md-4 mb-1">
                                <span class="fw-bold"> Chapter: </span> <span class="text-muted">
                                    {{ $note->chapter }}</span>
                            </div>
                            <div class="col-12 mb-1">
                                <p class="fw-bold mb-0">Description:</p>
                                <div class="text-muted desc-box p-1">{{ $note->desc }}</div>
                            </div>
                            <div class="col-12 ">
                                <p class="fw-bold mb-0">Content:</p>
                                <div class="text-muted desc-box p-1">{!! $note->content !!}</div>
                            </div>

                        </div>
                        <hr>
                        <div class="row">
                            @foreach ($note->file->all() as $items)
                                <div class="card bg-light shadow add-image m-2 p-0 img-box">
                                    <a href="{{ asset($items->file) }}" target="_blank">
                                        {{-- <img src="{{ $items->file }}" alt="Report Image" class="w-100 h-100"> --}}
                                        {{ $items->file }}
                                    </a>
                                    <div class="img-del">
                                        <a href="" class="btn btn-outline-danger rounded-circle delete">
                                            <i class="bi bi-trash-fill"></i>
                                        </a>
                                    </div>

                                </div>
                            @endforeach
                            @if (Auth::user())
                                <div class="card shadow bg-light justify-content-center align-items-center add-image clickable m-2"
                                    onclick="showUpload({{ $note->id }})">
                                    {{-- data-bs-toggle="modal" data-bs-target="#staticBackdropImage" --}}
                                    <svg xmlns="http://www.w3.org/2000/svg" width="42" height="42" fill="currentColor"
                                        class="bi bi-plus-circle-fill" viewBox="0 0 16 16">
                                        <path
                                            d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3v-3z" />
                                    </svg>
                                </div>
                            @endif
                        </div>

                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <!-- Modal for adding Medical History Report Images -->
    <div class="modal fade" id="staticBackdropImage" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropImageLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropImageLabel">Add Note File</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('file.upload') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3 col-auto">
                            <label for="name" class="form-label">Upload File</label>
                            <input type="number" name="note_id" id="note_id" value="" hidden>
                            <input type="file" class="dropifyFile" name="file" placeholder="File" required>
                            <div class="col-12 mt-2">
                                <label for="name" class="form-label">File Title</label>
                                <input type="text" name="name" class="form-control" placeholder="Title">
                            </div>
                        </div>

                        <div class="mb-3 col-auto d-flex justify-content-between">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script src="{{ asset('assets/dropify/js/dropify.min.js') }}"></script>

    <script>
        function showUpload(note_id) {
            $('#note_id').val(note_id);
            $('#staticBackdropImage').modal('show');
        }

        $('.dropifyFile').dropify();
    </script>
@endsection
