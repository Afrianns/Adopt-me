@extends("dashboard/layouts/layout")

@section("interface")
<h1>Let's Update Post!</h1>
<div class="container-md">
    @if (session()->has("success"))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session("success")}}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
    @endif
    <form action="/dashboard/library/{{ $library['slug'] }}" method="post" enctype="multipart/form-data">
        @method('PUT')
        @csrf
        <section class="mb-3">
            <label for="title" class="form-label">
                <p class="fs-5">Judul</p>
            </label>
            <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" id="title" value="{{ $library['title'] }}">

            @error("title")
            <p class="text-danger">{{ $message }}</p>
            @enderror
            @error("slug")
            <p class="text-danger">Judul Sudah Ada</p>
            @enderror
        </section>
        <p class="fs-5">Kategori</p>
        <section class="mb-3">
            <select name="category_id" class="form-select">
                @foreach ($categories as $category)
                @if ($category->id == $library['category_id'])
                <option selected value="{{ $category->id }}">{{ $category->name }}</option>
                @else
                <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endif
                @endforeach
            </select>
            @error("category_id")
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </section>
        <p class="fs-5">Gambar / Foto</p>
        <section>
            <img src="{{ asset('storage/' . $library['image'])}}" class="img-thumbnail w-25 mb-3" alt="">
            <input class="form-control @error('image') is-invalid @enderror" type="file" id="image" name="image">
            @error('image')
            <p class="text-danger py-2">{{ $message }}</p>
            @enderror
        </section>
        <section class="mb-3" id="toolbar">
            <x-forms.form-editor :library="$library" />
        </section>

        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection