<!-- <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block sidebar collapse"> -->
<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block sidebar">
    @can('is_admin')
    <a class=" navbar-brand fw-bold fs-3 text-center d-block mt-1" href="/dashboard">ADOPT ME <br> <span class="fw-normal">OWNER</span></a>
    @else
    <a class=" navbar-brand fw-bold fs-3 text-center d-block mt-1" href="/dashboard">ADOPT ME</a>
    @endcan
    <div class="position-sticky pt-5">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link {{ (Request()->is('dashboard') || Request()->is('dashboard/pet*')) ? 'active-side' : ''}}" aria-current="page" href="/dashboard">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" viewBox="0 0 20 20" fill="#fff">
                        <path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z" />
                    </svg>
                    <p class="d-inline align-middle  text-light">Home</p>
                </a>
            </li>
            <li class="nav-item">
                @can("is_admin")
                <a class="nav-link {{ Request()->is('dashboard/library*') ? 'active-side' : ''}}" href="/dashboard/library">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="#fff">
                        <path d="M18.991 2H9.01C7.899 2 7 2.899 7 4.01v5.637l-4.702 4.642A1 1 0 0 0 3 16v5a1 1 0 0 0 1 1h16a1 1 0 0 0 1-1V4.009C21 2.899 20.102 2 18.991 2zm-8.069 13.111V20H5v-5.568l2.987-2.949 2.935 3.003v.625zM13 9h-2V7h2v2zm4 8h-2v-2h2v2zm0-4h-2v-2h2v2zm0-4h-2V7h2v2z"></path>
                        <path d="M7 15h2v2H7z"></path>
                    </svg>

                    <p class="d-inline align-middle text-light">My Shelter</p>
                </a>
                @endcan
            </li>
            @if(!Auth()->user()->is_admin)
            <li class="nav-item">
                <a class="nav-link {{ Request()->is('dashboard/user*') ? 'active-side' : ''}}" href="/dashboard/user/pet">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="#fff">
                        <path d="M17 14a5 5 0 0 0 2.71-.81L20 13a3.16 3.16 0 0 0 .45-.37l.21-.2a4.48 4.48 0 0 0 .48-.58l.06-.08a4.28 4.28 0 0 0 .41-.76 1.57 1.57 0 0 0 .09-.23 4.21 4.21 0 0 0 .2-.63l.06-.25A5.5 5.5 0 0 0 22 9V2l-3 3h-4l-3-3v7a5 5 0 0 0 5 5zm2-7a1 1 0 1 1-1 1 1 1 0 0 1 1-1zm-4 0a1 1 0 1 1-1 1 1 1 0 0 1 1-1z"></path>
                        <path d="M11 22v-5H8v5H5V11.9a3.49 3.49 0 0 1-2.48-1.64A3.59 3.59 0 0 1 2 8.5 3.65 3.65 0 0 1 6 5a1.89 1.89 0 0 0 2-2 1 1 0 0 1 1-1 1 1 0 0 1 1 1 3.89 3.89 0 0 1-4 4C4.19 7 4 8.16 4 8.51S4.18 10 6 10h5.09A6 6 0 0 0 19 14.65V22h-3v-5h-2v5z"></path>
                    </svg>
                    <p class="d-inline align-middle  text-light">My Pet</p>
                </a>
            </li>
            @endif
            <li class="nav-item">
                <a class="nav-link {{ Request()->is('dashboard/profile*') ? 'active-side' : ''}}" href="/dashboard/profile/{{Auth()->user()->username ?? 'noname'}}/edit">
                    @can("is_admin")
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="#fff" viewBox="0 0 24 24" stroke="#fff" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z" />
                    </svg>
                    @else
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="#fff">
                        <path d="M7.5 6.5C7.5 8.981 9.519 11 12 11s4.5-2.019 4.5-4.5S14.481 2 12 2 7.5 4.019 7.5 6.5zM20 21h1v-1c0-3.859-3.141-7-7-7h-4c-3.86 0-7 3.141-7 7v1h17z"></path>
                    </svg>
                    @endcan
                    <p class="d-inline align-middle text-light">Profile</p>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request()->is('dashboard/about') ? 'active-side' : ''}}" href="/dashboard/about">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" viewBox="0 0 20 20" fill="#fff">
                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd" />
                    </svg>
                    <p class="d-inline align-middle  text-light">About</p>
                </a>
            </li>
        </ul>
    </div>
</nav>