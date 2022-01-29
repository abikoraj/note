@extends('layout.front.app')

@section('content')
    <h2>Add Note</h2>
    <hr>
    <form class="row g-3" action="{{ route('note.add', ['type' => $type]) }}" method="POST">
        @csrf
        <div class="col-md-8">
            <label class="form-label">Title</label>
            <input name="title" type="text" class="form-control" placeholder="Title">
        </div>
        @if ($type == 1)
            <div class="col-md-4">
                <label class="form-label">Subject</label>
                <select class="form-select" name="subject_id">
                    @foreach (App\Models\Subject::all() as $item)
                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="col-md-6">
                <label class="form-label">Chapter</label>
                <input type="text" class="form-control" name="chapter" placeholder="Chapter">
            </div>
        @endif
        <div class="col-md-6">
            <label class="form-label">Tags</label>
            <input type="text" class="form-control" placeholder="Tags" name="tags">
        </div>
        <div class="col-12">
            <label class="form-label">Description</label>
            <textarea name="desc" class="form-control" placeholder="Description"></textarea>
        </div>
        <div class="form-group">
            <label>Content</label>
            <textarea id="mytextarea" name="content" placeholder="Your News Here"></textarea>
        </div>

        <div class="col-12">
            <button type="submit" class="btn btn-primary">Save</button>
        </div>
    </form>

@endsection

@section('js')
    <script>
        tinymce.init({
            selector: '#mytextarea'
        });
    </script>
@endsection
