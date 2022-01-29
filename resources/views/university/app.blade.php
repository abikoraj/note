@extends('layout.front.app')
@section('content')
    <div class="row">
        @foreach ($univ as $item)
            <div class="col-md-4">
                <a class="row single-content" href="{{ route('university.front', ['university' => $item->id]) }}">
                    <div class="col-md-3 pe-0">
                        <img class="w-100" src="{{ asset($item->logo) }}" alt="">
                    </div>
                    <div class="col-md-9 pt-2">
                        {{ $item->name }}
                    </div>
                </a>
            </div>
        @endforeach
    </div>
@endsection
