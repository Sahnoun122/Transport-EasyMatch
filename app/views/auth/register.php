<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup | MedicoSoft</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
</head>
<body>
    <div class="bg-gray-50 dark:bg-gray-800">
        <div class="flex min-h-[80vh] flex-col justify-center py-12 sm:px-6 lg:px-8">
            <div class="text-center sm:mx-auto sm:w-full sm:max-w-md">
                <h1 class="text-3xl font-extrabold text-gray-900 dark:text-white">
                    Sign up
                </h1>
            </div>
            <div class="mt-8 sm:mx-auto sm:w-full sm:max-w-md">
                <div class="bg-white dark:bg-gray-700 px-4 pb-4 pt-8 sm:rounded-lg sm:px-10 sm:pb-6 sm:shadow">
                    <ul class="text-red-500 list-disc px-4 mb-4">
                        <?php 
                            if(isset($this->params['errors'])):
                                foreach($this->params['errors'] as $error): 
                        ?>
                        <li><?= $error ?></li>
                        <?php 
                                endforeach;
                            endif; 
                        ?>
                    </ul>

                    <?php
                        if(isset($this->params['success']) && $this->params['success'] == true){
                            header('location: /auth/login');
                        }
                    ?>
                    <form method="post" action="/auth/register" class="space-y-6">
                        <div>
                            <label for="fname" class="block text-sm font-medium text-gray-700 dark:text-white">First Name</label>
                            <div class="mt-1">
                                <input id="fname" type="text" name="fname" data-testid="fname" required=""
                                    class="block w-full appearance-none rounded-md border border-gray-300 px-3 py-2 placeholder-gray-400 shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 dark:bg-gray-800 dark:border-gray-600 dark:text-white dark:placeholder-gray-300 dark:focus:border-indigo-400 dark:focus:ring-indigo-400 sm:text-sm"
                                    value="">
                            </div>
                        </div>
                        <div>
                            <label for="lname" class="block text-sm font-medium text-gray-700 dark:text-white">Last Name</label>
                            <div class="mt-1">
                                <input id="lname" type="text" name="lname" data-testid="lname" required=""
                                    class="block w-full appearance-none rounded-md border border-gray-300 px-3 py-2 placeholder-gray-400 shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 dark:bg-gray-800 dark:border-gray-600 dark:text-white dark:placeholder-gray-300 dark:focus:border-indigo-400 dark:focus:ring-indigo-400 sm:text-sm"
                                    value="">
                            </div>
                        </div>
                        <div>
                            <label for="email" class="block text-sm font-medium text-gray-700 dark:text-white">Email</label>
                            <div class="mt-1">
                                <input id="email" type="text" name="email" data-testid="email" required=""
                                    class="block w-full appearance-none rounded-md border border-gray-300 px-3 py-2 placeholder-gray-400 shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 dark:bg-gray-800 dark:border-gray-600 dark:text-white dark:placeholder-gray-300 dark:focus:border-indigo-400 dark:focus:ring-indigo-400 sm:text-sm"
                                    value="">
                            </div>
                        </div>
                        <div>
                            <label for="password" class="block text-sm font-medium text-gray-700 dark:text-white">Password</label>
                            <div class="mt-1">
                                <input id="password" name="password" type="password" data-testid="password"
                                    autocomplete="current-password" required=""
                                    class="block w-full appearance-none rounded-md border border-gray-300 px-3 py-2 placeholder-gray-400 shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 dark:bg-gray-800 dark:border-gray-600 dark:text-white dark:placeholder-gray-300 dark:focus:border-indigo-400 dark:focus:ring-indigo-400 sm:text-sm"
                                    value="">
                            </div>
                        </div>
                        <div>
                            <label for="role" class="block text-sm font-medium text-gray-700 dark:text-white">Password</label>
                            <div class="mt-1">
                                <select id="role" name="role" required=""
                                    class="block w-full appearance-none rounded-md border border-gray-300 px-3 py-2 placeholder-gray-400 shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 dark:bg-gray-800 dark:border-gray-600 dark:text-white dark:placeholder-gray-300 dark:focus:border-indigo-400 dark:focus:ring-indigo-400 sm:text-sm"
                                    >
                                    <option value="" selected disabled>Select role</option>
                                    <option value="conducteur">Conducteur</option>
                                    <option value="expediteur">Expiditeur</option>
                                </select>
                            </div>
                        </div>

                        <div>
                            <button data-testid="register" type="submit"
                                class="group relative flex w-full justify-center rounded-md border border-transparent bg-indigo-600 px-4 py-2 text-sm font-medium text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:bg-indigo-700 dark:border-transparent dark:hover:bg-indigo-600 dark:focus:ring-indigo-400 dark:focus:ring-offset-2 disabled:cursor-wait disabled:opacity-50">
                                <span class="absolute inset-y-0 left-0 flex items-center pl-3">
                                    <svg class="h-5 w-5 text-indigo-500 group-hover:text-indigo-400"
                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                        aria-hidden="true">
                                        <path fill-rule="evenodd"
                                            d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                </span>
                                Sign Up
                            </button>
                        </div>
                    </form>
                    <div class="m-auto mt-6 w-fit md:mt-8">
                        <span class="m-auto dark:text-gray-400">Already have an account?
                            <a class="font-semibold text-indigo-600 dark:text-indigo-100" href="/auth/login">Sign in</a>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>