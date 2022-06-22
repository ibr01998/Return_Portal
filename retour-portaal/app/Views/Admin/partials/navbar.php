<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Admin Panel Return</title>
</head>
<body>
<div class="grid grid-cols-3 md:grid-cols-4 lg:grid-cols-5">
    <aside class="w-64" aria-label="Sidebar">
        <div class="px-3 py-4 overflow-y-auto h-screen rounded-r-lg bg-gray-700 w-2/3">
            <ul class="space-y-2">
                <li>
                    <a href="/Admin" class="flex duration-150 items-center p-2 text-base font-normal text-white rounded-lg hover:bg-gray-200 hover:text-gray-900 group active:bg-gray-200 ">
                        <svg class="w-6 h-6 duration-150 group-hover:text-gray-900" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M2 10a8 8 0 018-8v8h8a8 8 0 11-16 0z"></path><path d="M12 2.252A8.014 8.014 0 0117.748 8H12V2.252z"></path></svg>
                        <span class="ml-3">Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="Admin/returns" class="flex duration-150 items-center p-2 text-base font-normal text-white rounded-lg text-white hover:bg-gray-200 hover:text-gray-900 group">
                    <svg class="flex-shrink-0 text-white group-hover:text-gray-900 w-6 h-6 transition duration-150 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"
                             fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path
                                    d="M5 3a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2V5a2 2 0 00-2-2H5zM5 11a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2v-2a2 2 0 00-2-2H5zM11 5a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V5zM11 13a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z">
                            </path>
                        </svg>
                        <span class="flex-1 ml-3 text-left whitespace-nowrap">Returns</span>
                    </a>
                </li>
                <li>
                    <a href="#" class="flex duration-150 items-center p-2 text-base font-normal text-white rounded-lg hover:bg-gray-200 hover:text-gray-900 group">
                        <svg class="flex-shrink-0 w-6 h-6 text-white transition duration-150 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"></path></svg>
                        <span class="flex-1 ml-3 whitespace-nowrap">Customers</span>
                    </a>
                </li>
                <li>
                    <a href="#" class="flex duration-150 items-center p-2 text-base font-normal text-white rounded-lg hover:bg-gray-200 hover:text-gray-900 group">
                        <svg class="flex-shrink-0 w-6 h-6 text-white transition duration-150 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 2a4 4 0 00-4 4v1H5a1 1 0 00-.994.89l-1 9A1 1 0 004 18h12a1 1 0 00.994-1.11l-1-9A1 1 0 0015 7h-1V6a4 4 0 00-4-4zm2 5V6a2 2 0 10-4 0v1h4zm-6 3a1 1 0 112 0 1 1 0 01-2 0zm7-1a1 1 0 100 2 1 1 0 000-2z" clip-rule="evenodd"></path></svg>
                        <span class="flex-1 ml-3 whitespace-nowrap">Products</span>
                    </a>
                </li>
                <li>
                    <a href="#" class="flex duration-150 items-center p-2 text-base font-normal text-white rounded-lg hover:bg-gray-200 hover:text-red-500">
                        <svg class="flex-shrink-0 w-6 h-6 text-red-500 transition duration-150 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M3 3a1 1 0 00-1 1v12a1 1 0 102 0V4a1 1 0 00-1-1zm10.293 9.293a1 1 0 001.414 1.414l3-3a1 1 0 000-1.414l-3-3a1 1 0 10-1.414 1.414L14.586 9H7a1 1 0 100 2h7.586l-1.293 1.293z" clip-rule="evenodd"></path></svg>
                        <span class="flex-1 ml-3 whitespace-nowrap">Sign out</span>
                    </a>
                </li>
            </ul>
        </div>
    </aside>
