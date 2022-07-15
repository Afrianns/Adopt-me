@extends("auth/layouts/layout")

@section("sign")
<img src="https://source.unsplash.com/random/400x500/?pet" class="img-fluid front-img">
<div class="px-5 py-3 align-self-center">
    <h1 class="pb-2">Register as Admin</h1>
    <form action="/admin/register" method="post">
        @csrf
        <div class="mb-3 row
        ">
            <div class="col">
                <label for="name" class="form-label">Name</label>
                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name" required>
                @error('name')
                <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="col">
                <label for="username" class="form-label">Username</label>
                <input type="text" name="username" class="form-control @error('username') is-invalid @enderror" id="username" required>
                @error('username')
                <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email address</label>
            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email" required>
            @error('email')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-3">
            <label for="address" class="form-label">Address</label>
            <input type="text" name="address" class="form-control @error('address') is-invalid @enderror" id="address" required>
            @error('address')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-3">
            <label for="contact" class="form-label">Contact</label>
            <input type="number" name="contact" class="form-control @error('contact') is-invalid @enderror" id="contact" required>
            @error('contact')
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