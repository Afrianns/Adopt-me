@extends("/layouts/layout")

@section("template")
<div class="w-50">

    <h1>Welcome, {{ auth()->user()->name }}</h1>
    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Obcaecati tempora est, sit voluptas aliquid similique doloremque sequi nihil consequuntur modi, molestiae ea quisquam quaerat non?</p>
</div>
<form action="/logout" method="post">
    @csrf
    <button class="btn btn-warning">Logout</button>
</form>
@endsection