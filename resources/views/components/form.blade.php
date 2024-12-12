
    <div class="container d-flex justify-content-center align-items-center min-vh-100">
        <div class="card shadow-lg" style="width: 30rem;">
            <div class="card-body">
                <h1 class="card-title text-center mb-4">Connexion</h1>

                <!-- Message d'erreur -->
                @if (session('error'))
                    <p class="text-danger text-center">{{ session('error') }}</p>
                @endif

                <!-- Formulaire -->
                <form action="{{ route('login') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="matricule" class="form-label">Matricule</label>
                        <input
                            type="text"
                            name="matricule"
                            id="matricule"
                            class="form-control"
                            required>
                    </div>
                    <div class="mb-3">
                        <label for="mot_de_passe" class="form-label">Mot de passe</label>
                        <input
                            type="password"
                            name="mot_de_passe"
                            id="mot_de_passe"
                            class="form-control"
                            required>
                    </div>
                    <div class="d-grid">
                        <button type="submit" class="btn btn-primary">Se connecter</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

