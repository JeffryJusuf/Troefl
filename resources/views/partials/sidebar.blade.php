<div class="d-flex flex-column flex-shrink-0 p-3 text-bg-dark h-100" style="width: 280px;">
    <a href="/" class="d-flex align-items-center ms-3 mb-3 mb-md-0 me-md-auto text-light text-decoration-none">
        <img src="/img/troefl-logo-text.png" alt="" width="200">
    </a>
    <hr>
    <ul class="nav nav-pills flex-column mb-auto">
        <li class="nav-item">
            <a href="/" class="nav-link text-light {{ $active === 'home' ? 'active' : '' }}">
                Home
            </a>
        </li>
        <li>
            <a href="/learning-material" class="nav-link text-light {{ $active === 'learning-material' ? 'active' : '' }}">
                Learning Material
            </a>
        </li>
        <li>
            <a href="/quiz/disclaimer" class="nav-link text-light {{ $active === 'quiz' ? 'active' : '' }}">
                Quiz
            </a>
        </li>
        <li>
            <a href="/discussions" class="nav-link text-light {{ $active === 'discussions' ? 'active' : '' }}">
                Discussion
            </a>
        </li>
        @auth
            @if (auth()->user()->is_admin)
                <li>
                    <a href="/manage-quiz" class="nav-link text-light {{ $active === 'manage-quiz' ? 'active' : '' }}">
                        Manage Quiz
                    </a>
                </li>
            @endif
        @endauth
    </ul>
    <hr>
    @auth
        <div class="dropdown mx-3">
            <a href="#" class="d-flex align-items-center text-light text-decoration-none dropdown-toggle"
                data-bs-toggle="dropdown" aria-expanded="false">
                @if (auth()->user()->profile_picture)
                    <img src="{{ auth()->user()->profile_picture_url }}" alt="/img/troefl-profile-picture.png" width="35" height="35" class="rounded-circle me-2">
                @else
                    <img src="/img/troefl-profile-picture.png" alt="" width="35" height="35" class="rounded-circle me-2">
                @endif
                <strong class="text-wrap text-break">{{ auth()->user()->username }}</strong>
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
            <a href="/login" class="nav-link text-light ms-3 custom-nav-link">Login</a>
        </div>
    @endauth
</div>
