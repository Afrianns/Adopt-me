@extends("dashboard/layouts/layout")

@section("interface")
<h1>Welcome, {{ Auth()->user()->name }}</h1>
<form action="/dashboard/profile/{{ Auth()->user()->username }}" method="post">
    @method("put")
    @csrf
    <div class="mb-3">
        <label for="Name" class="form-label">Nama</label>
        <input type="text" class="form-control" id="Name" name="name" value="{{ $user[0]['name'] }}" required>
    </div>
    <div class="mb-3">
        <label for="username" class="form-label">Username</label>
        <input type="text" class="form-control" id="username" name="username" value="{{ $user[0]['username'] }}" required>
    </div>
    <div class="mb-3">
        <label for="email" class="form-label">Email address</label>
        <input type="email" class="form-control" id="email" name="email" value="{{ $user[0]['email'] }}" required>
    </div>
    <button type="submit" class="btn btn-primary">Update</button>
</form>
@endsection