<div class="head-wrapper">
    <div class="header">
        <img src="" alt="" class="logo">
        <span class="title">
            Title
        </span>
        <span class="float-end me-2">
            @if (Auth::user())
                <button class="btn btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#exampleModal">Add
                    Note
                </button>
            @else
                <a href="{{ route('user.login') }}" class="btn btn-outline-success">Login</a>
                <a href="{{ route('user.register') }}" class="btn btn-outline-info">Sign Up</a>
            @endif
        </span>
    </div>
    <div class="jumbotrun">
        <div class="first">

            <div class="d-inline-block">
                <a class="btn" href="{{ url()->previous() }}">
                    <i class="bi bi-arrow-left"></i>
                </a>
                <a class="btn">
                    <i class="bi bi-arrow-right"></i>
                </a>
                <a class="btn" href="">
                    <i class="bi bi-arrow-up"></i>
                </a>
            </div>
            <div style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb" class="d-inline-block jt">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Library</li>
                </ol>
            </div>
        </div>
        <div class="second">
            <div class="input-group">
                <span class="input-group-text"><i class="bi bi-search"></i></span>
                <input class="form-control" type="text" placeholder="Search">
            </div>
        </div>
    </div>
</div>

<div class="modal fade " id="exampleModal" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content ">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Select Type</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <a class="btn btn-success px-4 me-2" href="{{ route('note.add', ['type' => 1]) }}">Academic</a>
                <a class="btn btn-success px-4 ms-2" href="{{ route('note.add', ['type' => 2]) }}">Non Academic</a>

            </div>

        </div>
    </div>
</div>
