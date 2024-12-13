<nav class="navbar" style="background-color: #1d277c; padding: 10px; height: 67px; color: white; position: fixed; top: 0; width: 100%; z-index: 1000; box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);">
    <div class="container d-flex justify-content-end align-items-center">

        {{-- Dropdown pour la déconnexion --}}
        <div class="dropdown">
            <a href="#"
               class="dropdown-toggle text-white text-decoration-none fs-5"
               id="userDropdown"
               role="button"
               data-bs-toggle="dropdown"
               aria-expanded="true">
                {{ Auth::user()->nom_prenom }}
            </a>
            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                <li>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="m-0">
                        @csrf
                        <button type="submit" class="dropdown-item "
                         style="background-color: transparent; color: orange; border: none; outline: none; box-shadow: none;">
                            <i class="bi bi-box-arrow-right"></i> Déconnexion
                        </button>
                    </form>
                </li>

            </ul>
        </div>
    </div>
</nav>


