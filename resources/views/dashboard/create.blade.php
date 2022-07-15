@extends("dashboard/layouts/layout")

@section("interface")
<h1>Let's Create Post!</h1>
<div class="container-md">
    @if (session()->has("success"))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session("success")}}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
    @endif
    <form action="/dashboard/library" method="post" enctype="multipart/form-data">
        @csrf
        <section class="mb-4">
            <label for="title" class="form-label">
                <p class="fs-5">Judul</p>
            </label>
            <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" id="title" placeholder="Judul">
            @error("title")
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </section>
        <p class="fs-5">Kategori</p>
        <section class="mb-4">
            <select name="category_id" class="form-select">
                <option selected>Pilih Kategori</option>
                @foreach ($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
            @error("category")
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </section>
        <p class="fs-5">Pilih Foto</p>
        <section>
            <input class="form-control @error('image') is-invalid @enderror" type="file" id="image" name="image">
            @error('image')
            <p class="text-danger py-2">{{ $message }}</p>
            @enderror
        </section>
        <section class="mb-3" id="toolbar">
            <x-forms.form-editor :library=null />
            @error("slug")
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </section>

        <button type="submit" class="btn btn-primary">Tambahkan</button>
    </form>
</div>
@endsection