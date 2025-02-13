<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EasyMatch Transport - Gestion des Annonces</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 select-none">
    <button id="menuButton" class="lg:hidden fixed top-4 left-4 z-50 p-2 bg-gray-800 text-white rounded">
        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path id="menuIcon" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
            <path id="closeIcon" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
        </svg>
    </button>

    <aside id="sidebar" class="fixed left-0 top-0 h-screen w-64 bg-gray-800 text-white transform -translate-x-full lg:translate-x-0 transition-transform duration-300 ease-in-out z-40">
        <div class="p-4">
            <h2 class="text-2xl font-bold mb-6">EasyMatch Admin</h2>
            <nav>
                <a href="dashboard.php" class="block py-2 px-4 hover:bg-gray-700 rounded mb-2">Tableau de bord</a>
                <a href="utilisateurs.php" class="block py-2 px-4 hover:bg-gray-700 rounded mb-2">Utilisateurs</a>
                <a href="anonces.php" class="block py-2 px-4 bg-gray-700 rounded mb-2">Annonces</a>
                <a href="transactions.php" class="block py-2 px-4 hover:bg-gray-700 rounded mb-2">Transactions</a>
                <a href="evaluations.php" class="block py-2 px-4 hover:bg-gray-700 rounded mb-2">Évaluations</a>
            </nav>
        </div>
    </aside>

    <div id="overlay" class="fixed inset-0 bg-black opacity-50 z-30 hidden lg:hidden"></div>

    <main class="lg:ml-64 p-8">
        <header class="bg-white shadow rounded-lg p-4 mb-6">
            <div class="flex justify-between items-center">
                <h1 class="text-2xl font-bold">Gestion des Annonces</h1>
                <div class="flex items-center space-x-4">
                    <button class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded">
                        + Nouvelle Annonce
                    </button>
                </div>
            </div>
        </header>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-6">
            <div class="bg-white p-6 rounded-lg shadow">
                <div class="flex items-center justify-between">
                    <h3 class="text-gray-500">Total Annonces</h3>
                    <span class="text-blue-500">📦</span>
                </div>
                <p class="text-2xl font-bold mt-2">3,427</p>
                <p class="text-green-500 text-sm">+8% ce mois</p>
            </div>

            <div class="bg-white p-6 rounded-lg shadow">
                <div class="flex items-center justify-between">
                    <h3 class="text-gray-500">En cours</h3>
                    <span class="text-yellow-500">🕒</span>
                </div>
                <p class="text-2xl font-bold mt-2">842</p>
                <p class="text-blue-500 text-sm">Actives</p>
            </div>

            <div class="bg-white p-6 rounded-lg shadow">
                <div class="flex items-center justify-between">
                    <h3 class="text-gray-500">Complétées</h3>
                    <span class="text-green-500">✅</span>
                </div>
                <p class="text-2xl font-bold mt-2">2,158</p>
                <p class="text-green-500 text-sm">+12% ce mois</p>
            </div>

            <div class="bg-white p-6 rounded-lg shadow">
                <div class="flex items-center justify-between">
                    <h3 class="text-gray-500">En attente</h3>
                    <span class="text-orange-500">⏳</span>
                </div>
                <p class="text-2xl font-bold mt-2">427</p>
                <p class="text-orange-500 text-sm">À modérer</p>
            </div>
        </div>

        <div class="bg-white rounded-lg shadow p-6">
            <div class="flex justify-between items-center mb-4">
                <div class="flex space-x-2">
                    <input type="text" placeholder="Rechercher une annonce..." class="border p-2 rounded">
                    <select class="border p-2 rounded">
                        <option>Tous les types</option>
                        <option>Colis</option>
                        <option>Meubles</option>
                        <option>Documents</option>
                    </select>
                </div>
                <div class="flex space-x-2">
                    <button class="p-2 hover:bg-gray-100 rounded">
                        Exporter
                    </button>
                    <button class="p-2 hover:bg-gray-100 rounded">
                        Filtres
                    </button>
                </div>
            </div>

            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead>
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">ID</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Détails</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Type</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Prix</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Status</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        <tr>
                            <td class="px-6 py-4">#A5689</td>
                            <td class="px-6 py-4">
                                <div class="flex items-center">
                                    <img src="/api/placeholder/48/48" alt="" class="w-12 h-12 rounded mr-3">
                                    <div>
                                        <div class="text-sm font-medium">Paris → Lyon</div>
                                        <div class="text-sm text-gray-500">Départ: 15/02/2024</div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                <span class="px-2 py-1 text-xs font-semibold rounded-full bg-blue-100 text-blue-800">
                                    Colis
                                </span>
                            </td>
                            <td class="px-6 py-4">45 €</td>
                            <td class="px-6 py-4">
                                <span class="px-2 py-1 text-xs font-semibold rounded-full bg-green-100 text-green-800">
                                    Active
                                </span>
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex space-x-2">
                                    <button class="text-blue-600 hover:text-blue-900">Voir</button>
                                    <button class="text-red-600 hover:text-red-900">Supprimer</button>
                                </div>
                            </td>
                        </tr>
                        <!-- Plus d'annonces -->
                    </tbody>
                </table>

                <div class="flex justify-between items-center mt-4">
                    <div class="text-sm text-gray-500">
                        Affichage de 1 à 10 sur 3,427 annonces
                    </div>
                    <div class="flex space-x-2">
                        <button class="px-3 py-1 border rounded hover:bg-gray-100">Précédent</button>
                        <button class="px-3 py-1 border rounded bg-blue-500 text-white">1</button>
                        <button class="px-3 py-1 border rounded hover:bg-gray-100">2</button>
                        <button class="px-3 py-1 border rounded hover:bg-gray-100">3</button>
                        <button class="px-3 py-1 border rounded hover:bg-gray-100">Suivant</button>
                    </div>
                </div>
            </div>
    </main>

    <script>
        // Script du menu burger (même que précédemment)
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
    </script>
</body>

</html>