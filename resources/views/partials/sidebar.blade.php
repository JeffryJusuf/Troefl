<div class="d-flex flex-column flex-shrink-0 p-3 text-bg-dark h-100" style="width: 280px;">
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
                <svg class="bi pe-none me-2" width="16" height="16">
                    <use xlink:href="#home" />
                </svg>
                Home
            </a>
        </li>
        <li>
            <a href="/material" class="nav-link text-light {{ $title === 'Material' ? 'active' : '' }}">
                <svg class="bi pe-none me-2" width="16" height="16">
                    <use xlink:href="#speedometer2" />
                </svg>
                Learning Material
            </a>
        </li>
        <li>
            <a href="/quiz" class="nav-link text-light {{ $title === 'Quiz' ? 'active' : '' }}">
                <svg class="bi pe-none me-2" width="16" height="16">
                    <use xlink:href="#table" />
                </svg>
                Quiz
            </a>
        </li>
        <li>
            <a href="/discussions" class="nav-link text-light {{ Request::is('discussions') ? 'active' : '' }}">
                <svg class="bi pe-none me-2" width="16" height="16">
                    <use xlink:href="#grid" />
                </svg>
                Discussion
            </a>
        </li>
    </ul>
    <hr>
    @auth
        <div class="dropdown">
            <a href="#" class="d-flex align-items-center text-light text-decoration-none dropdown-toggle"
                data-bs-toggle="dropdown" aria-expanded="false">
                <img src="https://github.com/mdo.png" alt="" width="35" height="35"
                    class="rounded-circle me-2">
                <strong>{{ auth()->user()->username }}</strong>
            </a>
            <ul class="dropdown-menu dropdown-menu-dark text-small shadow">
                <li><a class="dropdown-item" href="/profile">Profile</a></li>
                <li>
                    <hr class="dropdown-divider">
                </li>
                <li>
                    <form action="/logout" method="POST">
                        @csrf
                        <button type="submit" class="dropdown-item">Sign out</button>
                    </form>
                </li>
            </ul>
        </div>
    @else
        <a href="/login" class="nav-link text-light ms-4"><i class="bi bi-box-arrow-in-right"></i> Login</a>
    @endauth
</div>
