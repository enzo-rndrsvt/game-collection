<footer>
    <p>Game Collection - <span id="footerYear">Chargement de l'année...</span> - Tous droits réservés</p>

    <!-- La gestion des années étant compliqué, on utilise une API qui le fait pour nous :D -->
    <!-- cf. https://getfullyear.com/ -->
    <script>
        // Le proxy est nécessaire pour éviter les problèmes de CORS :(
        fetch('https://proxy.corsfix.com/?https://getfullyear.com/api/year')
            .then(response => response.json())
            .then(data => {
                console.log(data.sponsored_by);
                const footerYear = document.getElementById('footerYear'); // Récupérer l'élément
                footerYear.textContent = data.year; // Mettre à jour l'année
            });
    </script>
</footer>