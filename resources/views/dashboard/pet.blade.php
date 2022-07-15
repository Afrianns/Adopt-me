@extends("dashboard/layouts/layout")

@section("interface")

<div class="card my-5 mx-2 col" style="max-width: 50rem">
    <div class="card-body">
        <div class="mb-5 mt-3">
            <img src="{{ asset('storage/' . $pet['image']) }}" class="img-fluid mb-3" alt="">
            <h5 class="card-title fs-1">{{ $pet['title'] }}</h5>
            <h6 class="card-subtitle fs-5 mb-2 text-muted">{{ $pet['slug'] }}</h6>
        </div>
        <p class="card-text fs-4">{!! $pet['description'] !!}</p>
        <div class="d-flex justify-content-between w-75 mx-auto border-top my-4 py-3">
            <section>
                <h5>Address</h5>
                <p>{{ $pet->user->address }}</p>
            </section>
            <section>
                <h5>Phone Number</h5>
                <p>{{ $pet->user->contact }}</p>
            </section>
        </div>
        <p class="text-muted"> By <a href="/dashboard/pet/owner/{{ $pet->user->name }}">{{ $pet->user->name }}</a> in <a href="/dashboard/pet/category/{{ $pet->category->name }}">{{ $pet->category->name }}</a></p>
        @if(!Auth()->user()->is_admin)
        <form action=" /dashboard/user/pet" method="post" class="d-inline">
            @csrf
            <input type="hidden" name="id" value="{{ $pet->id }}">
            @if($pet['is_adopt'])
            <div class="label-card">
                <h1>ADOPTED</h1>
            </div>
            <button type="button" class="card-link btn btn-success disable-btn" disabled>Adopt Pet</button>
            @else
            <button type="submit" class="card-link btn btn-success" onclick="return confirm('Siap Untuk Adopsi??');">Adopt Pet</button>
            @endif
        </form>
        @endcan
        <a href=".." class="card-link btn btn-secondary">Back</a>
    </div>
</div>

@endsection