    <div id="footer-container">
        <div id="content-wrap">
            <footer class="border-top pt-3">
                <p class="text-center text-body-secondary">El Refugio Literario</p>
                <p class="text-center text-body-secondary">Sabrina Gaspart - Juan Farroni - Rodrigo Martínez</p>
            </footer>
        </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            var headerHeight = document.getElementById('navbar').offsetHeight;
            document.getElementById('page-container').style.paddingTop = headerHeight + 'px';
        });
    </script>