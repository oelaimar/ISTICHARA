<?php include_once __DIR__ . "/../layouts/header.php"; ?>
<body class="text-gray-600">

<div class="flex h-screen overflow-hidden bg-white">
    <?php include_once __DIR__ . "/../layouts/aside.php" ?>
    <main class="flex-1 flex flex-col min-w-0 bg-gray-50/50 overflow-hidden">
        <!-- Top Mobile Header -->
        <header class="h-16 border-b border-gray-200 bg-white flex items-center justify-between px-4 md:px-8">
            <div class="flex items-center gap-4 ml-auto">
                <button class="relative p-2 text-gray-400 hover:text-gray-500">
                    <span class="iconify" data-icon="lucide:bell" data-width="20" style="stroke-width: 1.5;"></span>
                    <span
                            class="absolute top-2 right-2 w-2 h-2 bg-red-500 rounded-full border-2 border-white"></span>
                </button>
            </div>
        </header>
        <div class="flex-1 overflow-auto p-4 md:p-8 space-y-8" id="main-container">
<!-- VIEW 2: PROFESSIONAL MANAGEMENT (CREATE FORM) -->
<div id="view-professionals" class="max-w-4xl mx-auto space-y-6">
    <div class="flex items-center justify-between">
        <div>
            <h1 class="text-xl font-semibold tracking-tight text-gray-900">New Professional</h1>
            <p class="text-sm text-gray-500 mt-1">Add a lawyer or bailiff.</p>
        </div>
        <button
            class="px-4 py-2 bg-white border border-gray-200 text-gray-700 text-sm font-medium rounded-md hover:bg-gray-50 transition-colors">
            Cancel
        </button>
    </div>

    <div class="bg-white border border-gray-200 rounded-lg shadow-sm p-6 md:p-8">
        <form class="space-y-6">
            <!-- Toggle Type -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-3">Professional
                    Type</label>
                <div class="grid grid-cols-2 gap-4 max-w-md">
                    <label class="cursor-pointer relative">
                        <input type="radio" name="prof_type" value="avocat" class="peer sr-only" checked
                               onchange="toggleFormFields()">
                        <div
                            class="p-4 rounded-lg border border-gray-200 peer-checked:border-indigo-600 peer-checked:bg-indigo-50 peer-checked:text-indigo-700 hover:bg-gray-50 transition-all text-center">
                                            <span
                                                class="iconify mx-auto mb-2 text-gray-400 peer-checked:text-indigo-600"
                                                data-icon="lucide:briefcase" data-width="24"></span>
                            <span class="text-sm font-medium">Lawyer</span>
                        </div>
                    </label>
                    <label class="cursor-pointer relative">
                        <input type="radio" name="prof_type" value="huissier" class="peer sr-only"
                               onchange="toggleFormFields()">
                        <div
                            class="p-4 rounded-lg border border-gray-200 peer-checked:border-purple-600 peer-checked:bg-purple-50 peer-checked:text-purple-700 hover:bg-gray-50 transition-all text-center">
                                            <span
                                                class="iconify mx-auto mb-2 text-gray-400 peer-checked:text-purple-600"
                                                data-icon="lucide:gavel" data-width="24"></span>
                            <span class="text-sm font-medium">Bailiff</span>
                        </div>
                    </label>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 pt-4 border-t border-gray-100">
                <!-- Common Fields -->
                <div class="space-y-1">
                    <label class="text-xs font-medium text-gray-700">Full name</label>
                    <input type="text" placeholder="Ex: Maitre Alami"
                           class="w-full px-3 py-2 bg-white border border-gray-200 rounded-md text-sm placeholder:text-gray-400 focus:outline-none focus:ring-2 focus:ring-indigo-500/20 focus:border-indigo-500 transition-shadow">
                </div>

                <div class="space-y-1">
                    <label class="text-xs font-medium text-gray-700">Email</label>
                    <input type="email" placeholder="contact@cabinet.ma"
                           class="w-full px-3 py-2 bg-white border border-gray-200 rounded-md text-sm placeholder:text-gray-400 focus:outline-none focus:ring-2 focus:ring-indigo-500/20 focus:border-indigo-500 transition-shadow">
                </div>

                <div class="space-y-1">
                    <label class="text-xs font-medium text-gray-700">Phone</label>
                    <input type="tel" placeholder="+212 6..."
                           class="w-full px-3 py-2 bg-white border border-gray-200 rounded-md text-sm placeholder:text-gray-400 focus:outline-none focus:ring-2 focus:ring-indigo-500/20 focus:border-indigo-500 transition-shadow">
                </div>

                <div class="space-y-1">
                    <label class="text-xs font-medium text-gray-700">City</label>
                    <select
                        class="w-full px-3 py-2 bg-white border border-gray-200 rounded-md text-sm text-gray-700 focus:outline-none focus:ring-2 focus:ring-indigo-500/20 focus:border-indigo-500 transition-shadow appearance-none">
                        <option>Casablanca</option>
                        <option>Rabat</option>
                        <option>Marrakech</option>
                        <option>Tanger</option>
                    </select>
                </div>
            </div>

            <!-- Dynamic Section: Avocat -->
            <div id="fields-avocat" class="space-y-6 pt-4 border-t border-gray-100">
                <div class="space-y-3">
                    <label class="text-sm font-medium text-gray-900">Legal Specialties</label>
                    <div class="grid grid-cols-2 md:grid-cols-4 gap-3">
                        <label class="flex items-center gap-2 text-sm text-gray-600 cursor-pointer">
                            <input type="checkbox"
                                   class="rounded border-gray-300 text-indigo-600 focus:ring-indigo-500/20">
                            Criminal Law
                        </label>
                        <label class="flex items-center gap-2 text-sm text-gray-600 cursor-pointer">
                            <input type="checkbox"
                                   class="rounded border-gray-300 text-indigo-600 focus:ring-indigo-500/20">
                            Civil Law
                        </label>
                        <label class="flex items-center gap-2 text-sm text-gray-600 cursor-pointer">
                            <input type="checkbox"
                                   class="rounded border-gray-300 text-indigo-600 focus:ring-indigo-500/20">
                            Family
                        </label>
                        <label class="flex items-center gap-2 text-sm text-gray-600 cursor-pointer">
                            <input type="checkbox"
                                   class="rounded border-gray-300 text-indigo-600 focus:ring-indigo-500/20">
                            Business
                        </label>
                        <label class="flex items-center gap-2 text-sm text-gray-600 cursor-pointer">
                            <input type="checkbox"
                                   class="rounded border-gray-300 text-indigo-600 focus:ring-indigo-500/20">
                            Real Estate
                        </label>
                        <label class="flex items-center gap-2 text-sm text-gray-600 cursor-pointer">
                            <input type="checkbox"
                                   class="rounded border-gray-300 text-indigo-600 focus:ring-indigo-500/20">
                            Labor
                        </label>
                    </div>
                </div>

                <div
                    class="flex items-center justify-between p-4 bg-gray-50 rounded-md border border-gray-100">
                    <div>
                        <p class="text-sm font-medium text-gray-900">Online Consultation</p>
                        <p class="text-xs text-gray-500">Allow clients to book video
                            calls.</p>
                    </div>
                    <label class="relative inline-flex items-center cursor-pointer">
                        <input type="checkbox" value="" class="sr-only peer">
                        <div
                            class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-indigo-300/20 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-indigo-600">
                        </div>
                    </label>
                </div>
            </div>

            <!-- Dynamic Section: Huissier -->
            <div id="fields-huissier" class="hidden-section space-y-6 pt-4 border-t border-gray-100">
                <div class="space-y-3">
                    <label class="text-sm font-medium text-gray-900">Authorized Act Types</label>
                    <div class="space-y-3">
                        <label
                            class="flex p-3 border border-gray-200 rounded-md cursor-pointer hover:bg-gray-50 transition-colors has-[:checked]:border-purple-600 has-[:checked]:bg-purple-50">
                            <input type="checkbox" class="sr-only">
                            <div class="flex items-center gap-3">
                                <div
                                    class="flex-shrink-0 w-8 h-8 rounded bg-purple-100 text-purple-600 flex items-center justify-center">
                                                    <span class="iconify" data-icon="lucide:scroll-text"
                                                          data-width="16"></span>
                                </div>
                                <div>
                                    <p class="text-sm font-medium text-gray-900">Service</p>
                                    <p class="text-xs text-gray-500">Judicial and
                                        extra-judicial acts</p>
                                </div>
                            </div>
                        </label>
                        <label
                            class="flex p-3 border border-gray-200 rounded-md cursor-pointer hover:bg-gray-50 transition-colors has-[:checked]:border-purple-600 has-[:checked]:bg-purple-50">
                            <input type="checkbox" class="sr-only">
                            <div class="flex items-center gap-3">
                                <div
                                    class="flex-shrink-0 w-8 h-8 rounded bg-purple-100 text-purple-600 flex items-center justify-center">
                                                    <span class="iconify" data-icon="lucide:hammer"
                                                          data-width="16"></span>
                                </div>
                                <div>
                                    <p class="text-sm font-medium text-gray-900">Execution</p>
                                    <p class="text-xs text-gray-500">Seizures and evictions</p>
                                </div>
                            </div>
                        </label>
                        <label
                            class="flex p-3 border border-gray-200 rounded-md cursor-pointer hover:bg-gray-50 transition-colors has-[:checked]:border-purple-600 has-[:checked]:bg-purple-50">
                            <input type="checkbox" class="sr-only">
                            <div class="flex items-center gap-3">
                                <div
                                    class="flex-shrink-0 w-8 h-8 rounded bg-purple-100 text-purple-600 flex items-center justify-center">
                                    <span class="iconify" data-icon="lucide:eye" data-width="16"></span>
                                </div>
                                <div>
                                    <p class="text-sm font-medium text-gray-900">Reports</p>
                                    <p class="text-xs text-gray-500">Material evidence</p>
                                </div>
                            </div>
                        </label>
                    </div>
                </div>
            </div>

            <div class="flex justify-end gap-3 pt-6">
                <button type="button"
                        class="px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-200 rounded-md hover:bg-gray-50">Reset</button>
                <button type="submit"
                        class="px-4 py-2 text-sm font-medium text-white bg-gray-900 rounded-md hover:bg-gray-800 shadow-sm">Create
                    account</button>
            </div>
        </form>
    </div>
</div>
    <?php include_once __DIR__ . "/../layouts/footer.php" ?>
</body>
</html>>