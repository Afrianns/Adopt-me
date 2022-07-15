@extends("dashboard/layouts/layout")

@section("interface")

<div class="my-5 mx-2 col" style="max-width: 45rem">
    <h1>Category <strong>{{ $title }}</strong></h1>

    @foreach ($pets as $pet)
    <div class="card my-5">
        <div class=" card-body">
            <div class="mb-5 mt-3">
                <h5 class="card-title fs-1">{{ $pet->title }}</h5>
                <h6 class="card-subtitle fs-5 mb-2 text-muted">{{ $pet->slug }}</h6>

                <p class="card-text fs-4">{!! $pet->description !!}</p>
            </div>
            <a href="/dashboard" class="card-link btn btn-secondary">Back</a>
        </div>
    </div>
    @endforeach
</div>

@endsection