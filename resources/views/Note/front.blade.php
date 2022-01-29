@extends('layout.front.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('assets/dropify/css/dropify.min.css') }}">

    <style>
        .desc-box {
            border: 1px solid #ced4da;
            border-radius: 5px;
        }

    </style>
@endsection

@section('content')
    @foreach ($subject->note->all() as $item)
        <div class="card">
            <div class="card-header" id="heading">
                <h5 class="mb-0">
                    <a class="btn btn-link" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample"
                        aria-expanded="false" aria-controls="collapseExample">
                        {{ $item->title }}
                    </a>
                    <button class="btn btn-outline-secondary float-end" data-bs-toggle="modal"
                        data-bs-target="#fileModal">Add File</button>
                </h5>
            </div>

            <div id="collapseExample" class="collapse" aria-labelledby="heading" data-parent="#accordionExample">
                <div class="card-body">

                    <div class="row">
                        <div class="col-md-4 mb-1">
                            <span class="fw-bold"> Chapter: </span> <span class="text-muted">
                                {{ $item->chapter }}</span>
                        </div>
                        <div class="col-12 mb-1">
                            <p class="fw-bold mb-0">Description:</p>
                            <div class="text-muted desc-box p-1">{{ $item->desc }}</div>
                        </div>
                        <div class="col-12 ">
                            <p class="fw-bold mb-0">Content:</p>
                            <div class="text-muted desc-box p-1">{!! $item->content !!}</div>
                        </div>

                    </div>
                    <hr>


                </div>
            </div>
        </div>
    @endforeach

    <div class="modal fade" id="fileModal" tabindex="-1" aria-labelledby="fileModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="fileModalLabel">Add File</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label class="sr-only" for="signup-email">Title</label>
                            <input name="name" type="text" class="form-control signup-name" placeholder="Title" required>
                        </div>
                        <div class=" mb-3">
                            <label>File</label>
                            <input type="file" class="dropifyFile" id="dropify-event" name="logo" placeholder="File"
                                required>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary float-end">Save changes</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script src="{{ asset('assets/dropify/js/dropify.min.js') }}"></script>

    <script>
        $('.dropifyFile').dropify();
    </script>
@endsection
