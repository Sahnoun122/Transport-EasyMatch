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
                <h1 class="text-2xl font-bold">Tableau de bord</h1>
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

        <!-- Stats Cards -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-5 mb-6">
            <div class="container">
                <?php if (!empty($this->params['statistics'])): ?>
                    <?php foreach ($this->params['statistics'] as $annonce): ?>
                        <div class="bg-white rounded-lg overflow-hidden shadow-lg ring-4 ring-opacity-40 max-w-sm">
                            <div class="relative">
                                <img class="w-full" src="https://images.unsplash.com/photo-1523275335684-37898b6baf30" alt="Product Image">
                                <div class="absolute top-0 right-0 bg-green-500 text-white px-2 py-1 m-2 rounded-md text-sm font-medium">Active
                                </div>
                            </div>
                            <div class="relative">
                                <div class=""></div>
                            </div>
                            <div class="p-4">
                                <h3 class="text-lg font-medium mb-2"><?= htmlspecialchars($annonce['description']) ?></h3>
                                <p class="text-gray-600 text-sm mb-4">From: <?= htmlspecialchars($annonce['from_city']) ?> To: <?= htmlspecialchars($annonce['to_city']) ?></p>
                                <p class="text-gray-600 text-sm mb-4">Date: <?= htmlspecialchars($annonce['date_depart']) ?></p>
                                <p class="text-gray-600 text-sm mb-4">Created At: <?= htmlspecialchars($annonce['created_at']) ?></p>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <p>No active annonces found.</p>
                <?php endif; ?>
            </div>


        </div>
        <!-- Charts Section -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-6">
            <div class="bg-white p-6 rounded-lg shadow">
                <h3 class="text-lg font-semibold mb-4">Statistiques mensuelles</h3>
                <canvas id="monthlyStats" class="w-full h-64"></canvas>
            </div>
            <div class="bg-white p-6 rounded-lg shadow">
                <h3 class="text-lg font-semibold mb-4">Types de transactions</h3>
                <canvas id="transactionTypes" class="w-full h-64"></canvas>
            </div>
        </div>

        <!-- Recent Users Table -->
        <div class="bg-white rounded-lg shadow">
            <div class="p-6">
                <h3 class="text-lg font-semibold mb-4">Utilisateurs récents</h3>
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead>
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Utilisateur</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Email</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Status</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200">
                            <tr>
                                <td class="px-6 py-4">
                                    <div class="flex items-center">
                                        <img src="/api/placeholder/32/32" alt="" class="w-8 h-8 rounded-full mr-3">
                                        <div>
                                            <div class="text-sm font-medium">Jean Dupont</div>
                                            <div class="text-sm text-gray-500">Conducteur</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4">jean.dupont@example.com</td>
                                <td class="px-6 py-4">
                                    <span class="px-2 py-1 text-xs font-semibold rounded-full bg-green-100 text-green-800">
                                        Vérifié
                                    </span>
                                </td>
                                <td class="px-6 py-4">
                                    <button class="text-blue-600 hover:text-blue-900">Éditer</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>

    <script>
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