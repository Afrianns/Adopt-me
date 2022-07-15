@extends("dashboard/layouts/layout")

@section("interface")
<h1>Welcome, {{auth()->user()->name}}</h1>
@if(session()->has("success"))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    {{ session("success") }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif
<div class="my-5 max-vw-100">
    <form action="/dashboard/pet" class="col align-self-center">
        <div class="input-group">
            <input type="text" class="form-control" placeholder="Search..." name="search">
            <button type="submit" class="input-group-text px-5">Search</button>
        </div>
    </form>
</div>
@if($name->count() < 1) <div class="container text-center">
    <img src="/img/pet.png" class="img-fluid my-5" alt="">
    <h1 class="text-muted text-center">Pet Not Found.</h1>
    </div>
    @endif
    <div class="row-cols-lg-3 row-cols-sm-2" id="masonry">
        @foreach ($name as $key)
        <div class="mx-auto col">
            <div class="card my-3 mx-2 card-featured">
                @if($key['is_adopt'])
                <div class="label-card">
                    <h3 class="fs-5">ADOPTED</h3>
                </div>
                @endif
                <div class="card-body">
                    <img src="{{ asset('storage/' . $key['image'])}}" id="img" class="img-fluid mb-3" alt="">
                    <h5 class="card-title">{{ $key['title'] }}</h5>
                    <p class="text-muted">{{ $key['created_at']->diffForHumans() }} by {{ $key->user->name}} </p>
                    <h6 class="card-subtitl;e mb-2 text-muted">{{ $key['slug'] }}</h6>
                    <p class="card-text">{!! strip_tags(Str::limit( $key['description'], 100 )) !!}</p>
                    <a href="/dashboard/pet/{{ $key['slug'] }}" class="card-link btn btn-primary">Select Pet</a>
                    @can('is_admin')
                    @if (Auth()->user()->id == $key->user->id)
                    <a href="/dashboard/library/{{ $key['slug'] }}/edit" class="card-link btn btn-secondary">Edit</a>
                    @endif
                    @endcan
                </div>
            </div>
        </div>
        @endforeach


    </div>
    <div class="d-flex justify-content-end">
        {{ $name->links() }}
    </div>
    @endsection