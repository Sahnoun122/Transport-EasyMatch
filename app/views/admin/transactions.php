<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EasyMatch Transport - Transactions</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/chart.js/3.7.0/chart.min.js"></script>
</head>

<body class="bg-gray-100 select-none">
    <!-- Menu Burger -->
    <button id="menuButton" class="lg:hidden fixed top-4 left-4 z-50 p-2 bg-gray-800 text-white rounded">
        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path id="menuIcon" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
            <path id="closeIcon" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
        </svg>
    </button>

    <!-- Sidebar -->
    <aside id="sidebar" class="fixed left-0 top-0 h-screen w-64 bg-gray-800 text-white transform -translate-x-full lg:translate-x-0 transition-transform duration-300 ease-in-out z-40">
        <div class="p-4">
            <h2 class="text-2xl font-bold mb-6">EasyMatch Admin</h2>
            <nav>
                <a href="dashboard.php" class="block py-2 px-4 hover:bg-gray-700 rounded mb-2">Tableau de bord</a>
                <a href="utilisateurs.php" class="block py-2 px-4 hover:bg-gray-700 rounded mb-2">Utilisateurs</a>
                <a href="anonces.php" class="block py-2 px-4 hover:bg-gray-700 rounded mb-2">Annonces</a>
                <a href="transactions.php" class="block py-2 px-4 bg-gray-700 rounded mb-2">Transactions</a>
                <a href="evaluations.php" class="block py-2 px-4 hover:bg-gray-700 rounded mb-2">Évaluations</a>
            </nav>
        </div>
    </aside>

    <div id="overlay" class="fixed inset-0 bg-black opacity-50 z-30 hidden lg:hidden"></div>

    <main class="lg:ml-64 p-8">
        <header class="bg-white shadow rounded-lg p-4 mb-6">
            <div class="flex justify-between items-center">
                <h1 class="text-2xl font-bold">Transactions</h1>
            </div>
        </header>

        <!-- Stats Cards -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-6">
            <div class="bg-white p-6 rounded-lg shadow">
                <div class="flex items-center justify-between">
                    <h3 class="text-gray-500">Total Transactions</h3>
                    <span class="text-blue-500">💶</span>
                </div>
                <p class="text-2xl font-bold mt-2">45,892 €</p>
                <p class="text-green-500 text-sm">+15% ce mois</p>
            </div>

            <div class="bg-white p-6 rounded-lg shadow">
                <div class="flex items-center justify-between">
                    <h3 class="text-gray-500">En attente</h3>
                    <span class="text-yellow-500">⏳</span>
                </div>
                <p class="text-2xl font-bold mt-2">1,234 €</p>
                <p class="text-yellow-500 text-sm">8 transactions</p>
            </div>

            <div class="bg-white p-6 rounded-lg shadow">
                <div class="flex items-center justify-between">
                    <h3 class="text-gray-500">Commission</h3>
                    <span class="text-green-500">📈</span>
                </div>
                <p class="text-2xl font-bold mt-2">4,589 €</p>
                <p class="text-green-500 text-sm">+12% ce mois</p>
            </div>

            <div class="bg-white p-6 rounded-lg shadow">
                <div class="flex items-center justify-between">
                    <h3 class="text-gray-500">Remboursements</h3>
                    <span class="text-red-500">↩️</span>
                </div>
                <p class="text-2xl font-bold mt-2">234 €</p>
                <p class="text-red-500 text-sm">3 ce mois</p>
            </div>
        </div>

        <!-- Tableau des transactions -->
        <div class="bg-white rounded-lg shadow p-6">
            <div class="flex justify-between items-center mb-4">
                <div class="flex space-x-2">
                    <input type="text" placeholder="Rechercher une transaction..." class="border p-2 rounded">
                    <select class="border p-2 rounded">
                        <option>Tous les statuts</option>
                        <option>Complétée</option>
                        <option>En attente</option>
                        <option>Remboursée</option>
                    </select>
                </div>
            </div>

            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead>
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">ID Transaction</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Date</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Client</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Montant</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Status</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        <tr>
                            <td class="px-6 py-4">#TR-7829</td>
                            <td class="px-6 py-4">13/02/2024</td>
                            <td class="px-6 py-4">
                                <div class="flex items-center">
                                    <img src="/api/placeholder/32/32" alt="" class="w-8 h-8 rounded-full mr-3">
                                    <div>
                                        <div class="text-sm font-medium">Marie Martin</div>
                                        <div class="text-sm text-gray-500">ID: #U-45678</div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4">75.00 €</td>
                            <td class="px-6 py-4">
                                <span class="px-2 py-1 text-xs font-semibold rounded-full bg-green-100 text-green-800">
                                    Complétée
                                </span>
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex space-x-2">
                                    <button class="text-blue-600 hover:text-blue-900">Détails</button>
                                    <button class="text-gray-600 hover:text-gray-900">Facture</button>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

        </div>
    </main>

    <script>
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

        // Graphique des transactions
        const ctx = document.createElement('canvas').getContext('2d');
        new Chart(ctx, {
            type: 'line',
            data: {
                labels: ['Jan', 'Fév', 'Mar', 'Avr', 'Mai', 'Juin'],
                datasets: [{
                    label: 'Volume des transactions',
                    data: [12000, 19000, 15000, 25000, 22000, 30000],
                    borderColor: 'rgb(75, 192, 192)',
                    tension: 0.1
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false
            }
        });
    </script>
</body>

</html>