@extends("auth/layouts/layout")

@section("sign")
<img src="https://source.unsplash.com/random/300x400/?pet" class="img-fluid front-img">
<div class="px-5 align-self-center">
    @if (session()->has('authError'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{ session()->get("authError") }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
    @if (session()->has('status'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session()->get("status") }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
    <form action="/login" method="post">
        <h1 class="pb-2">Welcome</h1>
        @csrf
        <div>
            <label for="exampleInputEmail1" class="form-label">Email address</label>
            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email">
            @error("email")
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" name="password" class="form-control" id="password">
        </div>
        <button type="submit" class="btn btn-primary">Login</button>
        <span class="text-right px-2"><a href="/register" class="register">Register</a></span>
    </form>
    <p class="text-muted text-center mt-5">want to be contributor? <a href="/admin/register" class="register">register</a></p>
</div>
@endsection