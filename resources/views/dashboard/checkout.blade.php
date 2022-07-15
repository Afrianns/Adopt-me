@extends("dashboard/layouts/layout")

@section("interface")
@if(session()->has("success"))
<div class="my-5 mx-2 col">
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
    <h1>My Pet</h1>
    @if($pets->count() <= 0) <div class="container mx-auto text-center">
        <img src="/img/is_empty.png" class="img-fluid my-5 w-50" alt="">
        <h3 class="text-muted text-center">Sorry, No Adopted Pet Here.</h3>
        <p>Start to <a href="/dashboard">Find</a></p>
</div>
@endif
@foreach($pets as $pet)
<div class="card my-5 card-size w-75">
    <div class="card-body">
        <h5 class="card-title">
            {{ $pet->title }}
        </h5>
        <p class="card-text">
            {!! $pet->description !!}
        </p>
        <button class="btn btn-primary"><a href="/dashboard/pet/{{ $pet->slug }}" class="text-light text-decoration-none">more</a></button>
        <button class="btn btn-success"><a href="/dashboard/user/pet/{{ $pet->slug }}" class="text-light text-decoration-none">print ownership</a></button>
    </div>
</div>
@endforeach
</div>

@endsection