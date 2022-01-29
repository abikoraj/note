@extends('layout.front.app')
@section('content')
    <div class="row">
        @foreach ($uni->fac->all() as $item)
            <div class="col-md-4">
                <a class="row single-content" href="{{ route('faculty', ['faculty' => $item->id]) }}">
                    <div class="col-md-3 pe-0">
                        <img class="w-100" src="https://iconarchive.com/download/i34231/treetog/i/Pictures.ico"
                            alt="">
                    </div>
                    <div class="col-md-9 pt-2">
                        {{ $item->name }}
                    </div>
                </a>
            </div>
        @endforeach
    </div>
@endsection
