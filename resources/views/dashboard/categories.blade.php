@extends("dashboard/layouts/layout")

@section("interface")

<div class="my-5 mx-2 col" style="max-width: 45rem">
    <h1>Category <strong>{{ $title }}</strong></h1>
    <ul>
        @foreach ($Categories as $category)
        <li> <a href="/category/{{ $category->name }}">{{ $category->name }}</a></li>
        @endforeach
    </ul>
</div>

@endsection