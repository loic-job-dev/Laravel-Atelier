<html lang="eng">
    <head>
        <meta charset="utf-8">
        <title>L'atelier. Votre boutique de parfums de luxe.</title>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
    </head>
    <body>
        
        <header>
            <div>
                <img src="/pictures/diamond_logo.svg" alt="logo l'Atelier.">
                <h1>L'Atelier.</h1>
            </div>
            <h2>Marques</h2>
            <h2>Parfums</h2>
            <h2>Voyage olfactif</h2>
            <img src="/pictures/menu_logo.svg" alt="logo menu">
            <img src="/pictures/profile_logo.svg" alt="logo profile">
            <img src="/pictures/cart_logo.svg" alt="logo cart">
        </header>
    
@yield("content")
<footer>
    <footer class="bg-dark text-white text-center py-4">
  <div class="container">
    <p>&copy; 2025 L'atelier . Tous droits réservés.</p>
  </div>

    <div>
        <p>
            <a href="/about">À propos</a> | 
            <a href="/contact">Contact</a> | 
            <a href="/privacy-policy">Politique de confidentialité</a>
        </p>
    </div>
</footer>

</body>

</html>