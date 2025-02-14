
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
            <h2 class="text-2xl font-bold mb-6">EasyMatch</h2>
            <nav>
                <a href="#" class="block py-2 px-4 hover:bg-gray-700 rounded mb-2">Tableau de bord</a>
                <a href="#" class="block py-2 px-4 bg-gray-700 rounded mb-2">Créer Annonces</a>
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
                <h1 class="text-2xl font-bold">Créer Annonce</h1>
                <div class="flex items-center space-x-4">
                    <button class="p-2 hover:bg-gray-100 rounded-full">
                        <span class="sr-only">Notifications</span>
                        🔔
                    </button>
                    <div class="flex items-center">
                        <span class="text-sm mr-2">Admin</span>
                        <!-- <img src="/api/placeholder/32/32" alt="Admin" class="w-8 h-8 rounded-full" /> -->
                    </div>
                </div>
            </div>
        </header>

        <div class="bg-white rounded-lg shadow">
            <div class="p-6">
                <h3 class="text-lg font-semibold mb-4">Créer Annonce</h3>
                <div class="overflow-x-auto">
                    <form action="/annonce/create" method="POST" class="space-y-4 mx-auto bg-white rounded-lg shadow-md">
                        <div>
                          <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                          <textarea id="description" name="description" rows="4" class="mt-1 p-2 w-full border border-gray-300 rounded-md" placeholder="Enter description" required></textarea>
                        </div>
                      
                        <div>
                          <label for="from_city" class="block text-sm font-medium text-gray-700">From City</label>
                          <input type="text" id="from_city" name="from_city" class="mt-1 p-2 w-full border border-gray-300 rounded-md" placeholder="Enter departure city" required />
                        </div>
                      
                        <div>
                          <label for="to_city" class="block text-sm font-medium text-gray-700">To City</label>
                          <input type="text" id="to_city" name="to_city" class="mt-1 p-2 w-full border border-gray-300 rounded-md" placeholder="Enter destination city" required />
                        </div>
                      
                        <div>
                          <label for="date_depart" class="block text-sm font-medium text-gray-700">Date of Departure</label>
                          <input type="date" id="date_depart" name="date_depart" class="mt-1 p-2 w-full border border-gray-300 rounded-md" required />
                        </div>
                      
                        <div id="trajets" class="space-y-4">
                          <div class="trajet flex space-x-2 items-center">
                            <div>
                              <label for="city_1" class="block text-sm font-medium text-gray-700">City</label>
                              <input type="text" id="city_1" name="trajet[0][city]" class="mt-1 p-2 w-1/2 border border-gray-300 rounded-md" placeholder="Enter city" required />
                            </div>
                            <div>
                              <label for="order_1" class="block text-sm font-medium text-gray-700">Order</label>
                              <input type="number" id="order_1" name="trajet[0][order]" class="mt-1 p-2 w-1/4 border border-gray-300 rounded-md" placeholder="Enter order" required />
                            </div>
                          </div>
                        </div>
                      
                        <button type="button" id="add_trajet" class="bg-black mt-4 px-4 py-2 text-white rounded-md">Add Trajet</button>
                      
                        <div>
                          <button type="submit" class="w-full px-4 py-2 bg-black text-white rounded-md">Submit</button>
                        </div>
                      </form>
                      
                </div>
            </div>
        </div>
    </main>

    <script>
        document.getElementById('add_trajet').addEventListener('click', function() {
        const trajetsContainer = document.getElementById('trajets');
        const trajetsCount = trajetsContainer.children.length;

        // Create new trajet fields
        const newTrajet = document.createElement('div');
        newTrajet.classList.add('trajet', 'flex', 'space-x-2', 'items-center', 'mt-4');

        // City input
        const cityInput = document.createElement('input');
        cityInput.type = 'text';
        cityInput.name = `trajet[${trajetsCount}][city]`;
        cityInput.classList.add('mt-1', 'p-2', 'w-1/2', 'border', 'border-gray-300', 'rounded-md');
        cityInput.placeholder = 'Enter city';
        cityInput.required = true;

        // Order input
        const orderInput = document.createElement('input');
        orderInput.type = 'number';
        orderInput.name = `trajet[${trajetsCount}][order]`;
        orderInput.classList.add('mt-1', 'p-2', 'w-1/4', 'border', 'border-gray-300', 'rounded-md');
        orderInput.placeholder = 'Enter order';
        orderInput.required = true;

        // Append inputs to the new trajet
        newTrajet.appendChild(cityInput);
        newTrajet.appendChild(orderInput);

        // Append the new trajet to the container
        trajetsContainer.appendChild(newTrajet);
        });

    </script>
</body>
</html>