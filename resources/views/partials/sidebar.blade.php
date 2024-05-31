<div class="d-flex flex-column flex-shrink-0 p-3 text-bg-dark h-100 shadow-lg" style="width: 280px;">
    <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-light text-decoration-none">
        <svg class="bi pe-none me-2" width="40" height="32">
            <use xlink:href="#bootstrap" />
        </svg>
        <span class="fs-4">Troefl</span>
    </a>
    <hr>
    <ul class="nav nav-pills flex-column mb-auto">
        <li class="nav-item">
            <a href="/" class="nav-link text-light {{ $title === 'Home' ? 'active' : '' }}">
                Home
            </a>
        </li>
        <li>
            <a href="/material" class="nav-link text-light {{ $title === 'Material' ? 'active' : '' }}">
                Learning Material
            </a>
        </li>
        <li>
            <a href="/quiz" class="nav-link text-light {{ $title === 'Quiz' ? 'active' : '' }}">
                Quiz
            </a>
        </li>
        <li>
            <a href="/discussions" class="nav-link text-light {{ Request::is('discussions') ? 'active' : '' }}">
                Discussion
            </a>
        </li>
        @auth
            @if (auth()->user()->is_admin)
                <li>
                    <a href="/manage-quiz" class="nav-link text-light {{ Request::is('manage-quiz') ? 'active' : '' }}">
                        Manage Quiz
                    </a>
                </li>
            @endif
        @endauth
    </ul>
    <hr>
    @auth
        <div class="dropdown ms-3">
            <a href="#" class="d-flex align-items-center text-light text-decoration-none dropdown-toggle"
                data-bs-toggle="dropdown" aria-expanded="false">
                @if (auth()->user()->profile_picture)
                    <img src="{{ auth()->user()->profile_picture_url }}" alt="" width="35" height="35" class="rounded-circle me-2">
                @else
                    <img src="https://github.com/mdo.png" alt="" width="35" height="35" class="rounded-circle me-2">
                @endif
                <strong>{{ auth()->user()->username }}</strong>
            </a>
            <ul class="dropdown-menu dropdown-menu-dark text-small shadow">
                <li><a class="dropdown-item custom-dropdown-sidebar" href="/profile">Profile</a></li>
                <li>
                    <hr class="dropdown-divider">
                </li>
                <li>
                    <form action="/logout" method="POST">
                        @csrf
                        <button type="submit" class="dropdown-item custom-dropdown-sidebar">Sign out</button>
                    </form>
                </li>
            </ul>
        </div>
    @else
        <div class="d-flex align-items-center" style="height: 35px">
            <a href="/login" class="nav-link text-light ms-3">Login</a>
        </div>
    @endauth
</div>
