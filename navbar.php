    <!-- Navbar -->
    <header class="header">
        <div class="logo">
            <h1>BedFlix</h1>
        </div>
        <nav class="nav">
            <ul>
                <li><a href="home.php">Accueil</a></li>
                <li><a href="series.php">Séries</a></li>
                <li><a href="films.php">Films</a></li>
                <li><a href="profil.php">profil</a></li>
            </ul>
        </nav>
        <div class="search-avatar">
            <input type="text" placeholder="Rechercher...">
            <img src="<?php echo isset($photoUrl) ? $photoUrl : 'assets/default.png'; ?>" alt="Avatar" class="avatar">
        </div>
    </header>
    <div id="modal" class="modal">
    <div class="modal-content">
        <span class="close">&times;</span>
        <ul>
            <li><a href="profil.php">Voir Profil</a></li>
            <li><a href="deconnexion.php">Déconnexion</a></li>
        </ul>
    </div>
</div>
<script>
    // Sélection des éléments
    const avatar = document.querySelector('.avatar');
    const modal = document.getElementById('modal');
    const closeModal = document.querySelector('.modal .close');

    // Afficher la modal quand on clique sur l'avatar
    avatar.addEventListener('click', () => {
        modal.style.display = 'block';
    });

    // Fermer la modal quand on clique sur "x"
    closeModal.addEventListener('click', () => {
        modal.style.display = 'none';
    });

    // Fermer la modal quand on clique en dehors de la modal
    window.addEventListener('click', (event) => {
        if (event.target === modal) {
            modal.style.display = 'none';
        }
    });
</script>