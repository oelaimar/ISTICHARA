<?php
$page = explode('?', $_SERVER['REQUEST_URI'])[0];
?>

<aside class="w-64 border-r border-gray-200 bg-white flex-shrink-0 hidden md:flex flex-col z-20">
            <div class="h-16 flex items-center px-6 border-b border-gray-100">
                <div class="flex items-center gap-2">
                    <div class="w-6 h-6 bg-gray-900 rounded flex items-center justify-center text-white">
                        <span class="iconify" data-icon="lucide:scale" data-width="14" data-height="14"></span>
                    </div>
                    <span class="text-sm font-semibold tracking-tight text-gray-900">ISTICHARA</span>
                </div>
            </div>

            <div class="p-4 space-y-8 overflow-y-auto flex-1">
                <div>
                    <div class="px-2 mb-2 text-xs font-medium uppercase tracking-wider text-gray-400">Administration
                    </div>
                    <nav class="space-y-1">
                        <button onclick="window.location.href='/';" id="nav-dashboard"
                            class="<?php echo "w-full flex items-center gap-3 px-3 py-2 text-sm font-medium text-gray-" . ($page === '/' ? '900 ' : '500 hover:text-gray-900 hover:') . "bg-gray-50 rounded-md transition-colors" ?>">
                            <span class="iconify" data-icon="lucide:layout-dashboard" data-width="18"
                                style="stroke-width: 1.5;"></span>
                            Dashboard
                        </button>
                        <button onclick="window.location.href='/create';" id="nav-professionals"
                            class="<?php echo "w-full flex items-center gap-3 px-3 py-2 text-sm font-medium text-gray-" . ($page == '/create' ? '900 ' : '500 hover:text-gray-900 hover:') . "bg-gray-50 rounded-md transition-colors" ?>">
                            <span class="iconify" data-icon="lucide:users" data-width="18"
                                style="stroke-width: 1.5;"></span>
                            Manage Professionals
                        </button>
                    </nav>
                </div>

                <div>
                    <div class="px-2 mb-2 text-xs font-medium uppercase tracking-wider text-gray-400">Public Area
                    </div>
                    <nav class="space-y-1">
                        <button onclick="window.location.href='/search'" id="nav-search"
                            class="<?php echo "w-full flex items-center gap-3 px-3 py-2 text-sm font-medium text-gray-" . ($page == '/search' ? '900 ' : '500 hover:text-gray-900 hover:') . "bg-gray-50 rounded-md transition-colors" ?>">
                            <span class="iconify" data-icon="lucide:search" data-width="18"
                                style="stroke-width: 1.5;"></span>
                            Search Lawyers
                        </button>
                    </nav>
                </div>
            </div>

            <div class="p-4 border-t border-gray-100">
                <div class="flex items-center gap-3 px-2">
                    <div
                        class="w-8 h-8 rounded-full bg-gray-100 border border-gray-200 flex items-center justify-center text-gray-600 font-medium text-xs">
                        AD</div>
                    <div class="flex-1 min-w-0">
                        <p class="text-sm font-medium text-gray-900 truncate">Admin</p>
                        <p class="text-xs text-gray-400 truncate">admin@istichara.ma</p>
                    </div>
                </div>
            </div>
        </aside>
