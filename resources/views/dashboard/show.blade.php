@extends("dashboard/layouts/layout")

@section("interface")
<h1>Hasil</h1>

<div class="card my-5 mx-2 col" style="max-width: 50rem">
    <div class="card-body">

        <div class="mb-5 mt-3">
            <img src="{{ asset('storage/'. $book['image'])}}" class="img-fluid mb-3" alt="">
            <h5 class="card-title fs-1">{{ $book['title'] }}</h5>
            <p class="card-subtitle fs-5 mb-2 text-muted">{{ $book['slug'] }}</p>
        </div>

        <p class="card-text fs-4">{!! $book['description'] !!}</p>
        <a href="/dashboard/library" class="card-link btn btn-secondary">Kembali</a>
    </div>
</div>
@endsection