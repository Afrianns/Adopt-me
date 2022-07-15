@extends("dashboard/layouts/layout")

@section("interface")

@if(session()->has("success"))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    {{ session("success") }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif
<div class="d-flex justify-content-between align-items-center">
    <h1>My Pets</h1>
    <a href="/dashboard/library/create" class="btn btn-primary">
        Buat Post
    </a>
</div>
@if(count($result) <= 0) <div class="container text-center">
    <img src="/img/empty-box.webp" class="img-fluid" alt="">
    <h1>You Don't Have Any Pet!!</h1>
    </div>
    @else
    <div class="row row-cols-lg-3 row-cols-sm-1" id="masonry">
        @foreach ($result as $key)
        <div class="mx-auto col">
            <div class="card my-3 card-featured">
                <div class="card-body">
                    <img src="{{ asset('storage/' . $key['image']) }}" id="img" class="img-fluid mb-3" alt="">
                    <h5 class="card-title">{{ $key['title'] }}</h5>
                    <p class="text-muted">{{ $key['created_at']->diffForHumans() }}</p>
                    <h6 class="card-subtitle mb-2 text-muted">{{ $key['slug'] }}</h6>
                    <p class="card-text">{!! strip_tags( Str::limit($key['description'], 200) ) !!}</p>

                    <a href="/dashboard/library/{{ $key['slug'] }} " class="badge bg-primary ">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" viewBox="0 0 20 20" fill="#fff">
                            <path d="M10 12a2 2 0 100-4 2 2 0 000 4z" />
                            <path fill-rule="evenodd" d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z" clip-rule="evenodd" />
                        </svg>
                    </a>
                    @if(!$key['is_adopt'])
                    <a href="/dashboard/library/{{ $key['slug'] }}/edit" class="badge bg-secondary border-0">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" viewBox="0 0 20 20" fill="#fff">
                            <path d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z" />
                            <path fill-rule="evenodd" d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z" clip-rule="evenodd" />
                        </svg>
                    </a>
                    <form action="/dashboard/library/{{ $key['slug'] }}" method="post" class="d-inline">
                        @method("delete")
                        @csrf
                        <button class="badge bg-danger border-0" onclick="return confirm('Anda Yakin?')">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" viewBox="0 0 20 20" fill="#fff">
                                <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd" />
                            </svg>
                        </button>
                    </form>
                    @endif
                </div>
                @if($key['is_adopt'])
                <div class="label-card">
                    <h3 class="fs-5">ADOPTED</h3>
                </div>
                @endif
            </div>
        </div>
        @endforeach
    </div>
    @endif
    <!-- </div> -->
    @endsection