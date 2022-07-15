@extends("auth/layouts/layout")

@section("sign")
<img src="https://source.unsplash.com/random/400x500/?pet" class="img-fluid front-img">
<div class="px-5 py-2 align-self-center">

    <h1 class="pb-2">Register</h1>
    <form action="/register" method="post">
        @csrf
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Username</label>
            <input type="username" name="username" class="form-control @error('username') is-invalid @enderror" id="username" required>
            @error('username')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Name</label>
            <input type="name" name="name" class="form-control @error('name') is-invalid @enderror" id="name" required>
            @error('name')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Email address</label>
            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email" required>
            @error('email')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="password" required>
            @error('password')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Register</button>
        <span class="text-right px-2"><a href="/" class="login">Login</a></span>
    </form>
</div>

@endsection