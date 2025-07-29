<html lang="eng">

<head>
    <meta charset="utf-8">
    <title>L'atelier. Votre boutique de parfums de luxe.</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
    <link rel="stylesheet" href="/style.css" />
</head>

<body>

    <header class="container-fluid py-3">
        <div class="d-flex justify-content-between align-items-center">
            <!-- Logo et Titre -->
            <div class="d-flex align-items-center gap-3">
                <img src="/pictures/diamond_logo.svg" alt="logo l'Atelier." width="40" height="40">
                <h1 class="mb-0">L'Atelier.</h1>
            </div>

            <!-- Menu principal -->
            <nav class="d-none d-md-flex gap-4 align-items-center">
                <h2 class="mb-0">Marques</h2>
                <a href="{{ url('/catalog') }}" class="text-decoration-none">
                    <h2 class="mb-0">Parfums</h2>
                </a>
                <h2 class="mb-0">Voyage olfactif</h2>
            </nav>

            <!-- Icônes -->
            <div class="d-flex align-items-center gap-3">
                <img src="/pictures/menu_logo.svg" alt="logo menu" width="24" height="24">
                <img src="/pictures/profile_logo.svg" alt="logo profile" width="34" height="34">
                <a href="{{ url('/cart') }}">
                    <img src="/pictures/cart_logo.svg" alt="logo cart" width="34" height="34">
                </a>
            </div>
        </div>
    </header>

    @yield("content")
    <footer>
        <footer class="bg-dark text-white text-center py-4">


            <div>
                <p>&copy; <?php echo date("Y"); ?> L'atelier. Tous droits réservés.</p>
            </div>
            <div>
                <p>
                    <a href="">À propos</a> |
                    <a href="">Contact</a> |
                    <a href="">Politique de confidentialité</a>
                </p>
            </div>
        </footer>

</body>

</html>