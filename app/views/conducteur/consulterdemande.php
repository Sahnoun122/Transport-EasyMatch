
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EasyMatch Transport </title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/chart.js/3.7.0/chart.min.js"></script>
</head>

<body class="bg-gray-100">
    <!-- Menu Burger pour mobile -->
    <button id="menuButton" class="lg:hidden fixed top-4 left-4 z-50 p-2 bg-gray-800 text-white rounded">
        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path id="menuIcon" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
            <path id="closeIcon" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
        </svg>
    </button>

    <!-- Sidebar avec classe pour mobile -->
    <aside id="sidebar" class="fixed left-0 top-0 h-screen w-64 bg-gray-800 text-white transform -translate-x-full lg:translate-x-0 transition-transform duration-300 ease-in-out z-40">
        <div class="p-4">
            <h2 class="text-2xl font-bold mb-6">EasyMatch Admin</h2>
            <nav>
                <a href="#" class="block py-2 px-4 bg-gray-700 rounded mb-2">Tableau de bord</a>
                <a href="#" class="block py-2 px-4 hover:bg-gray-700 rounded mb-2">Utilisateurs</a>
                <a href="#" class="block py-2 px-4 hover:bg-gray-700 rounded mb-2">Annonces</a>
                <a href="#" class="block py-2 px-4 hover:bg-gray-700 rounded mb-2">Transactions</a>
                <a href="#" class="block py-2 px-4 hover:bg-gray-700 rounded mb-2">Évaluations</a>
            </nav>
        </div>
    </aside>

    <!-- Overlay pour mobile -->
    <div id="overlay" class="fixed inset-0 bg-black opacity-50 z-30 hidden lg:hidden"></div>

    <!-- Main Content avec ajustement responsive -->
    <main class="lg:ml-64 p-8">
        <!-- Header -->
        <header class="bg-white shadow rounded-lg p-4 mb-6">
            <div class="flex justify-between items-center">
                <h1 class="text-2xl font-bold">Demandes</h1>
                <div class="flex items-center space-x-4">
                    <button class="p-2 hover:bg-gray-100 rounded-full">
                        <span class="sr-only">Notifications</span>
                        🔔
                    </button>
                    <div class="flex items-center">
                        <span class="text-sm mr-2">Admin</span>
                        <img src="/api/placeholder/32/32" alt="Admin" class="w-8 h-8 rounded-full" />
                    </div>
                </div>
            </div>
        </header>
<!-- Main -->
<div class="p- sm:ml-36">
    <div class="flex items-center justify-center overflow-x-auto shadow-lg rounded-lg" data-aos="fade-up" data-aos-anchor-placement="top-bottom">
        <table class="min-w-full table-auto border-collapse bg-white">
            <thead class="bg-black">
                <tr>
                    <th class="px-6 py-3 text-left text-sm font-medium text-white">Expéditeur</th>
                    <th class="px-6 py-3 text-left text-sm font-medium text-white">Type</th>
                    <th class="px-6 py-3 text-left text-sm font-medium text-white">Longueur</th>
                    <th class="px-6 py-3 text-left text-sm font-medium text-white">Largeur</th>
                    <th class="px-6 py-3 text-left text-sm font-medium text-white">Hauteur</th>
                    <th class="px-6 py-3 text-left text-sm font-medium text-white">Poids</th>
                    <th class="px-6 py-3 text-left text-sm font-medium text-white">Départ</th>
                    <th class="px-6 py-3 text-left text-sm font-medium text-white">Destination</th>
                    <th class="px-6 py-3 text-left text-sm font-medium text-white">Statut</th>
                    <th class="px-6 py-3 text-left text-sm font-medium text-white">Actions</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach ($this->params['Consulter'] as $demande): ?>
            <tr class="border-b hover:bg-gray-50">
                <td class="px-6 py-4 text-sm"><?= htmlspecialchars($demande['expediteur_name']) ?></td>
                <td class="px-6 py-4 text-sm"><?= htmlspecialchars($demande['type']) ?></td>
                <td class="px-6 py-4 text-sm"><?= htmlspecialchars($demande['longueur']) ?></td>
                <td class="px-6 py-4 text-sm"><?= htmlspecialchars($demande['largeur']) ?></td>
                <td class="px-6 py-4 text-sm"><?= htmlspecialchars($demande['hauteur']) ?></td>
                <td class="px-6 py-4 text-sm"><?= htmlspecialchars($demande['poids']) ?></td>
                <td class="px-6 py-4 text-sm"><?= htmlspecialchars($demande['depart']) ?></td>
                <td class="px-6 py-4 text-sm"><?= htmlspecialchars($demande['destination']) ?></td>
                <td class="px-6 py-4 text-sm"><?= htmlspecialchars($demande['statut']) ?></td>
                <td class="px-6 py-4">
                    <form method="POST" action="/conducteur/dashbordconsulter" class="flex space-x-2">
                        <input type="hidden" name="demande_id" value="<?= $demande['id'] ?>">
                        <button name="action" value="Accepte" class="text-xl hover:scale-105">✅</button>
                        <button name="action" value="Refuse" class="text-xl hover:scale-105">❌</button>
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
    </main>

    <script>

const modal = document.querySelector("#crud-modal");
let isclick = true;
let btn = function() {
    if (isclick == 1) {
        modal.style.display = "block";
        isclick = 0;
    } else {
        modal.style.display = "none";
        isclick = 1;
    }
}


        // Logique du menu burger
        const menuButton = document.getElementById('menuButton');
        const sidebar = document.getElementById('sidebar');
        const overlay = document.getElementById('overlay');
        const menuIcon = document.getElementById('menuIcon');
        const closeIcon = document.getElementById('closeIcon');
        let isMenuOpen = false;

        function toggleMenu() {
            isMenuOpen = !isMenuOpen;
            if (isMenuOpen) {
                sidebar.classList.remove('-translate-x-full');
                overlay.classList.remove('hidden');
                menuIcon.classList.add('hidden');
                closeIcon.classList.remove('hidden');
            } else {
                sidebar.classList.add('-translate-x-full');
                overlay.classList.add('hidden');
                menuIcon.classList.remove('hidden');
                closeIcon.classList.add('hidden');
            }
        }

        menuButton.addEventListener('click', toggleMenu);
        overlay.addEventListener('click', toggleMenu);

        // Configuration des graphiques
        function initCharts() {
            const monthlyStatsCtx = document.getElementById('monthlyStats').getContext('2d');
            new Chart(monthlyStatsCtx, {
                type: 'line',
                data: {
                    labels: ['Jan', 'Fév', 'Mar', 'Avr', 'Mai', 'Juin'],
                    datasets: [{
                        label: 'Transactions',
                        data: [65, 59, 80, 81, 56, 55],
                        borderColor: 'rgb(75, 192, 192)',
                        tension: 0.1
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false
                }
            });

            const transactionTypesCtx = document.getElementById('transactionTypes').getContext('2d');
            new Chart(transactionTypesCtx, {
                type: 'doughnut',
                data: {
                    labels: ['Colis', 'Meubles', 'Documents', 'Autres'],
                    datasets: [{
                        data: [30, 20, 25, 25],
                        backgroundColor: [
                            'rgb(255, 99, 132)',
                            'rgb(54, 162, 235)',
                            'rgb(255, 205, 86)',
                            'rgb(75, 192, 192)'
                        ]
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false
                }
            });
        }

        // Initialisation des graphiques
        initCharts();


    </script>
</body>

</html>