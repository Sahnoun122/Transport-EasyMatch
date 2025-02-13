<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EasyMatch Transport - Évaluations</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/chart.js/3.7.0/chart.min.js"></script>
</head>

<body class="bg-gray-100">
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
                <a href="transactions.php" class="block py-2 px-4 hover:bg-gray-700 rounded mb-2">Transactions</a>
                <a href="evaluations.php" class="block py-2 px-4 bg-gray-700 rounded mb-2">Évaluations</a>
            </nav>
        </div>
    </aside>

    <div id="overlay" class="fixed inset-0 bg-black opacity-50 z-30 hidden lg:hidden"></div>

    <main class="lg:ml-64 p-8">
        <header class="bg-white shadow rounded-lg p-4 mb-6">
            <div class="flex justify-between items-center">
                <h1 class="text-2xl font-bold">Évaluations</h1>
                <div class="flex items-center space-x-4">
                    <button class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded">
                        Exporter les statistiques
                    </button>
                </div>
            </div>
        </header>

        <!-- Stats Cards -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-6">
            <div class="bg-white p-6 rounded-lg shadow">
                <div class="flex items-center justify-between">
                    <h3 class="text-gray-500">Note moyenne</h3>
                    <span class="text-yellow-500">⭐</span>
                </div>
                <p class="text-2xl font-bold mt-2">4.8/5</p>
                <p class="text-green-500 text-sm">+0.2 ce mois</p>
            </div>

            <div class="bg-white p-6 rounded-lg shadow">
                <div class="flex items-center justify-between">
                    <h3 class="text-gray-500">Total avis</h3>
                    <span class="text-blue-500">📝</span>
                </div>
                <p class="text-2xl font-bold mt-2">1,234</p>
                <p class="text-green-500 text-sm">+85 ce mois</p>
            </div>

            <div class="bg-white p-6 rounded-lg shadow">
                <div class="flex items-center justify-between">
                    <h3 class="text-gray-500">À modérer</h3>
                    <span class="text-orange-500">⚠️</span>
                </div>
                <p class="text-2xl font-bold mt-2">12</p>
                <p class="text-orange-500 text-sm">Urgents</p>
            </div>

            <div class="bg-white p-6 rounded-lg shadow">
                <div class="flex items-center justify-between">
                    <h3 class="text-gray-500">Signalements</h3>
                    <span class="text-red-500">🚩</span>
                </div>
                <p class="text-2xl font-bold mt-2">5</p>
                <p class="text-red-500 text-sm">À traiter</p>
            </div>
        </div>

        <!-- Distribution des notes -->
        <div class="bg-white rounded-lg shadow p-6 mb-6">
            <h3 class="text-lg font-semibold mb-4">Distribution des notes</h3>
            <div class="space-y-2">
                <div class="flex items-center">
                    <span class="w-16">5 ⭐</span>
                    <div class="flex-1 h-4 bg-gray-200 rounded-full ml-4">
                        <div class="h-4 bg-green-500 rounded-full" style="width: 75%"></div>
                    </div>
                    <span class="ml-4 w-16">75%</span>
                </div>
                <div class="flex items-center">
                    <span class="w-16">4 ⭐</span>
                    <div class="flex-1 h-4 bg-gray-200 rounded-full ml-4">
                        <div class="h-4 bg-green-400 rounded-full" style="width: 20%"></div>
                    </div>
                    <span class="ml-4 w-16">20%</span>
                </div>
                <div class="flex items-center">
                    <span class="w-16">3 ⭐</span>
                    <div class="flex-1 h-4 bg-gray-200 rounded-full ml-4">
                        <div class="h-4 bg-yellow-500 rounded-full" style="width: 3%"></div>
                    </div>
                    <span class="ml-4 w-16">3%</span>
                </div>
                <div class="flex items-center">
                    <span class="w-16">2 ⭐</span>
                    <div class="flex-1 h-4 bg-gray-200 rounded-full ml-4">
                        <div class="h-4 bg-orange-500 rounded-full" style="width: 1%"></div>
                    </div>
                    <span class="ml-4 w-16">1%</span>
                </div>
                <div class="flex items-center">
                    <span class="w-16">1 ⭐</span>
                    <div class="flex-1 h-4 bg-gray-200 rounded-full ml-4">
                        <div class="h-4 bg-red-500 rounded-full" style="width: 1%"></div>
                    </div>
                    <span class="ml-4 w-16">1%</span>
                </div>
            </div>
        </div>

        <!-- Liste des avis -->
        <div class="bg-white rounded-lg shadow p-6">
            <div class="flex justify-between items-center mb-4">
                <div class="flex space-x-2">
                    <input type="text" placeholder="Rechercher un avis..." class="border p-2 rounded">
                    <select class="border p-2 rounded">
                        <option>Toutes les notes</option>
                        <option>5 étoiles</option>
                        <option>4 étoiles</option>
                        <option>3 étoiles</option>
                        <option>2 étoiles</option>
                        <option>1 étoile</option>
                    </select>
                </div>
                <div class="flex space-x-2">
                    <button class="p-2 hover:bg-gray-100 rounded">
                        Filtres
                    </button>
                </div>
            </div>

            <div class="space-y-4">
                <!-- Avis individuel -->
                <div class="border rounded-lg p-4">
                    <div class="flex justify-between items-start">
                        <div class="flex items-start">
                            <img src="/api/placeholder/40/40" alt="" class="w-10 h-10 rounded-full mr-3">
                            <div>
                                <div class="font-medium">Pierre Durand</div>
                                <div class="text-sm text-gray-500">12 février 2024</div>
                                <div class="flex items-center mt-1">
                                    ⭐⭐⭐⭐⭐
                                </div>
                                <p class="mt-2">Excellent service, conducteur très professionnel et ponctuel. Je recommande !</p>
                            </div>
                        </div>
                        <div class="flex space-x-2">
                            <button class="text-green-600 hover:text-green-800">Approuver</button>
                            <button class="text-red-600 hover:text-red-800">Supprimer</button>
                        </div>
                    </div>
                </div>

                <!-- Plus d'avis... -->
            </div>

            <div class="flex justify-between items-center mt-4">
                <div class="text-sm text-gray-500">
                    Affichage de 1 à 10 sur 1,234 avis
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
        // Menu burger script (même que précédemment)
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