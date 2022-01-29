@extends('layout.app')
@section('content')
    <div class="container-xl">
        <h1 class="app-page-title">
            {{-- <a href="{{ route('university.index') }}">{{ $faculty->university->name }}</a> --}}
            University
            >
            Faculty
            {{-- {{ $fact->name }} --}}
            {{-- <a
                href="{{ route('university.view', ['university' => $program->getFac->university_id]) }}">{{ $program->name }}</a> --}}
            >
            <a href="{{ route('faculty.view', ['faculty' => $program->faculty_id]) }}">{{ $program->name }}</a>
            > Programs
        </h1>
    </div>
    <div class="app-card app-card-notification shadow-sm mb-4">
        <div class="app-card-header px-4 py-3">
            <form action="{{ route('subject.submit') }}" method="POST">
                @csrf
                <div class="row g-3 align-items-center">
                    <input type="hidden" name="program_id" value="{{ $program->id }}">
                    <div class="col-md-4">
                        <label class="sr-only" for="signup-email">Subject Name</label>
                        <input name="name" type="text" class="form-control signup-name" placeholder="Subject Name" required>
                    </div>
                    <div class="col-md-2">
                        <label class="sr-only" for="signup-email">Subject Code</label>
                        <input name="code" type="text" class="form-control signup-name" placeholder="Subject Code" required>
                    </div>
                    <div class="col-md-2">
                        <label class="sr-only" for="signup-email">Tag</label>
                        <input name="tag" type="text" class="form-control signup-name" placeholder="Tag">
                    </div>
                    @if ($program->type == 0)
                        <div class="col-md-2">
                            <label class="sr-only" for="signup-email">Year</label>
                            <select class="form-select " name="class" required>
                                @foreach (\App\Helper::getYrs() as $key => $yrs)
                                    <option value="{{ $key }}">{{ $yrs }}</option>
                                @endforeach
                            </select>
                        </div>
                    @else
                        <div class="col-md-2">
                            <label class="sr-only" for="signup-email">Semester</label>
                            <select class="form-select" name="class" required>
                                @foreach (\App\Helper::getSem() as $key => $sem)
                                    <option value="{{ $key }}">{{ $sem }}</option>
                                @endforeach
                            </select>
                        </div>
                    @endif
                    {{-- <div class="col-md-4">
                        <label class="sr-only" for="signup-email">Program Type</label>
                        <select class="form-select w-auto" name="type">
                            @foreach (\App\Helper::getSem() as $key => $sem)
                                <option value="{{ $key }}">{{ $sem }}</option>
                            @endforeach
                        </select>
                    </div> --}}
                    <div class="col-md-2">
                        <button type="submit" class="btn btn-primary w-100 text-white">Add</button>
                    </div>
                </div>
            </form>
            <!--//row-->
        </div>
        <!--//app-card-header-->
    </div>
    <div class="app-card app-card-orders-table shadow-sm mb-5">
        <div class="app-card-body">
            <div class="table-responsive">
                <table class="table app-table-hover mb-0 text-left">
                    <thead>
                        <tr>
                            <th class="cell">S.N.</th>
                            <th class="cell">Subject Name</th>
                            <th class="cell">Subject Code</th>
                            <th class="cell">Tag</th>
                            <th class="cell">Year / Sem</th>
                            <th class="cell">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($program->subject->all() as $item)
                            <tr>
                                <form action="{{ route('subject.update', ['subject' => $item->id]) }}" method="POST">
                                    @csrf
                                    <td class="cell">{{ $item->id }}</td>
                                    <td class="cell">
                                        <div class="col-md-12">
                                            <label class="sr-only" for="signup-email">Subject Name</label>
                                            <input name="name" type="text" class="form-control signup-name"
                                                placeholder="Subject Name" required value="{{ $item->name }}">
                                        </div>
                                    </td>
                                    <td class="cell">
                                        <div class="col-md-12">
                                            <label class="sr-only" for="signup-email">Subject Code</label>
                                            <input name="code" type="text" class="form-control signup-name"
                                                placeholder="Subject Code" required value="{{ $item->code }}">
                                        </div>
                                    </td>
                                    <td class="cell">
                                        <div class="col-md-12">
                                            <label class="sr-only" for="signup-email">Tag</label>
                                            <input name="tag" type="text" class="form-control signup-name" placeholder="Tag"
                                                required value="{{ $item->tag }}">
                                        </div>
                                    </td>
                                    <td class="cell">
                                        <div class="col-md-12">
                                            @if ($program->type == 0)
                                                <label class="sr-only" for="signup-email">Year</label>
                                                <select class="form-select " name="class" required>
                                                    @foreach (\App\Helper::getYrs() as $key => $yrs)
                                                        <option value="{{ $key }}"
                                                            {{ $key == $item->class ? 'selected' : '' }}>
                                                            {{ $yrs }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            @else
                                                <label class="sr-only" for="signup-email">Semester</label>
                                                <select class="form-select" name="class" required>
                                                    @foreach (\App\Helper::getSem() as $key => $sem)
                                                        <option value="{{ $key }} "
                                                            {{ $key == $item->class ? 'selected' : '' }}>
                                                            {{ $sem }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            @endif
                                        </div>
                                    </td>
                                    <td class="cell ">
                                        <button class="btn btn-primary text-white">Update</button>
                                        <a href="{{ route('subject.delete', ['subject' => $item->id]) }}"
                                            class="btn btn-danger text-white">Delete</a>
                                        {{-- <a href="{{ route('program.view', ['program' => $item->id]) }}"
                                            class="btn btn-secondary text-white">View</a> --}}
                                    </td>
                                </form>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
            <!--//table-responsive-->

        </div>
        <!--//app-card-body-->
    </div>

@endsection
