<div class="container d-flex justify-content-center align-items-center min-vh-100">
    <div class="row align-items-center shadow-lg" style="width: 60rem;">
        <!-- Image à gauche -->
        <div class="col-md-6 p-0">
            <img src="https://img.freepik.com/vecteurs-libre/illustration-dessin-anime-electricien-dessinee-main_23-2151016726.jpg" alt="Image de connexion" class="img-fluid" style="height: 100%; object-fit: cover; border-radius: 0.5rem 0 0 0.5rem;">
        </div>

        <!-- Formulaire à droite -->
        <div class="col-md-6 bg-white p-4" style="border-radius: 0 0.5rem 0.5rem 0;">

             <!-- Logo -->
             <div class="text-center mb-4">
                <img src="https://visionzero.global/sites/default/files/2019-07/cnps.png" alt="Logo" style="max-width: 150px;" >
            </div>
            <!-- Message d'erreur -->
            @if (session('error'))
                <p class="text-danger text-center">{{ session('error') }}</p>
            @endif

            <!-- Formulaire -->
            <form action="{{ route('login') }}" method="POST">
                @csrf

                
                <!-- composant pour les input -->
               <x-input/>

               <!-- composant pour le bouton submit -->
               <x-buttonSubmitLogin/>


            </form>
        </div>
    </div>
</div>
