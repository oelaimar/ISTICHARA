<?php include_once __DIR__ . "/../layouts/header.php"; ?>
<body class="text-gray-600">

    <div class="flex h-screen overflow-hidden bg-white">
<?php include_once __DIR__ . "/../layouts/aside.php" ?>
<main class="flex-1 flex flex-col min-w-0 bg-gray-50/50 overflow-hidden">
            <!-- Top Mobile Header -->
            <header class="h-16 border-b border-gray-200 bg-white flex items-center justify-between px-4 md:px-8">
                <div class="md:hidden flex items-center gap-2">
                    <span class="iconify text-gray-900" data-icon="lucide:menu" data-width="24"></span>
                    <span class="text-sm font-semibold tracking-tight text-gray-900"><?php echo $title; ?></span>
                </div>
                <div class="flex items-center gap-4 ml-auto">
                    <button class="relative p-2 text-gray-400 hover:text-gray-500">
                        <span class="iconify" data-icon="lucide:bell" data-width="20" style="stroke-width: 1.5;"></span>
                        <span
                            class="absolute top-2 right-2 w-2 h-2 bg-red-500 rounded-full border-2 border-white"></span>
                    </button>
                </div>
            </header>

            <div class="flex-1 overflow-auto p-4 md:p-8 space-y-8" id="main-container">

                <!-- VIEW 1: DASHBOARD & STATS (Admin) -->
                <div id="view-dashboard" class="space-y-8 max-w-6xl mx-auto">
                    <div>
                        <h1 class="text-xl font-semibold tracking-tight text-gray-900">Overview</h1>
                        <p class="text-sm text-gray-500 mt-1">Overall platform statistics.</p>
                    </div>

                    <!-- KPI Cards -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div class="bg-white p-6 rounded-lg border border-gray-200 shadow-sm">
                            <div class="flex items-center justify-between">
                                <div>
                                    <p class="text-xs font-medium text-gray-500 uppercase tracking-wide">Total Lawyers
                                    </p>
                                    <p class="mt-2 text-2xl font-semibold text-gray-900 tracking-tight"><?php echo count($lawyers); ?></p>
                                </div>
                                <div class="p-2 bg-blue-50 rounded-md text-blue-600">
                                    <span class="iconify" data-icon="lucide:briefcase" data-width="20"></span>
                                </div>
                            </div>
                        </div>

                        <div class="bg-white p-6 rounded-lg border border-gray-200 shadow-sm">
                            <div class="flex items-center justify-between">
                                <div>
                                    <p class="text-xs font-medium text-gray-500 uppercase tracking-wide">Total Bailiffs
                                    </p>
                                    <p class="mt-2 text-2xl font-semibold text-gray-900 tracking-tight"><?= count($bailiffs) ?></p>
                                </div>
                                <div class="p-2 bg-purple-50 rounded-md text-purple-600">
                                    <span class="iconify" data-icon="lucide:gavel" data-width="20"></span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Charts & Tables Row -->
                    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                        <!-- Chart Area -->
                        <div class="lg:col-span-2 bg-white rounded-lg border border-gray-200 shadow-sm p-6">
                            <div class="flex items-center justify-between mb-6">
                                <h3 class="text-sm font-medium text-gray-900">Distribution by City</h3>
                                <button class="text-xs text-gray-500 hover:text-gray-900">View all</button>
                            </div>
                            <!-- Mock Chart Visualization -->
                            <div class="h-64 flex items-end justify-between gap-2 px-2">
                                <?php $totalPersonnel = count($lawyers) + count($bailiffs) ?>
                                <?php foreach($cityStats as $city):?>
                                <div class="w-full bg-blue-50 rounded-t flex flex-col justify-end group relative hover:bg-blue-100 transition-colors"
                                    style="height: <?= ($city['total'] * 100) / $totalPersonnel ?>%">
                                    <div
                                        class="absolute -top-6 left-1/2 -translate-x-1/2 text-xs font-medium text-gray-600 opacity-0 group-hover:opacity-100 transition-opacity">
                                        <?= ($city['total'] * 100) / $totalPersonnel ?>%</div>
                                    <div class="text-[10px] text-center text-gray-500 pb-2"><?= $city['name'] ?></div>
                                </div>
                            <?php endforeach; ?>
                            </div>
                        </div>

                        <!-- Top Lawyers Table -->
                        <div class="bg-white rounded-lg border border-gray-200 shadow-sm overflow-hidden flex flex-col">
                            <div class="p-4 border-b border-gray-100">
                                <h3 class="text-sm font-medium text-gray-900">Top 3 Lawyers (Experience)</h3>
                            </div>
                            <div class="overflow-x-auto">
                                <table class="w-full text-left text-sm">
                                    <thead class="bg-gray-50 text-xs uppercase text-gray-500 font-medium">
                                        <tr>
                                            <th class="px-4 py-3">Name</th>
                                            <th class="px-4 py-3 text-right">Years</th>
                                        </tr>
                                    </thead>
                                    <tbody class="divide-y divide-gray-100">
                                    <?php foreach ($findTopNumberOfLawyers as $lawyer) : ?>
                                        <tr class="group hover:bg-gray-50 transition-colors">
                                            <td class="px-4 py-3">
                                                <div class="flex items-center gap-2">
                                                    <div
                                                        class="w-6 h-6 rounded-full bg-indigo-100 text-indigo-600 flex items-center justify-center text-[10px] font-bold">
                                                        KA</div>
                                                    <span class="text-gray-900 font-medium"><?= $lawyer->getName() ?></span>
                                                </div>
                                            </td>
                                            <td class="px-4 py-3 text-right text-gray-600"><?= $lawyer->getExperienceYears() ?> years</td>
                                        </tr>
                                    <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                            <div class="p-3 bg-gray-50 border-t border-gray-100 mt-auto">
                                <button
                                    class="w-full text-xs text-center text-indigo-600 hover:text-indigo-700 font-medium">View
                                    full ranking</button>
                            </div>
                        </div>
                    </div>
                </div>



                <!-- VIEW 3: USER SEARCH (Public) -->
                <div id="view-search" class="hidden-section space-y-6 max-w-6xl mx-auto">
                    <div class="text-center md:text-left">
                        <h1 class="text-2xl font-semibold tracking-tight text-gray-900">Find your legal expert
                        </h1>
                        <p class="text-sm text-gray-500 mt-2">Search among hundreds of qualified lawyers and bailiffs
                            across Morocco.</p>
                    </div>

                    <!-- Search Bar & Filters -->
                    <div class="bg-white p-4 rounded-lg border border-gray-200 shadow-sm sticky top-0 z-10">
                        <div class="flex flex-col md:flex-row gap-4">
                            <div class="flex-1 relative">
                                <span class="absolute left-3 top-1/2 -translate-y-1/2 text-gray-400">
                                    <span class="iconify" data-icon="lucide:search" data-width="18"></span>
                                </span>
                                <input type="text" placeholder="Search by name, specialty..."
                                    class="w-full pl-10 pr-4 py-2.5 bg-gray-50 border border-gray-200 rounded-md text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500/20 focus:border-indigo-500 transition-all">
                            </div>
                            <div class="flex gap-2">
                                <select
                                    class="px-3 py-2.5 bg-gray-50 border border-gray-200 rounded-md text-sm text-gray-600 focus:outline-none hover:bg-gray-100 cursor-pointer">
                                    <option>All cities</option>
                                    <option>Casablanca</option>
                                    <option>Rabat</option>
                                </select>
                                <select
                                    class="px-3 py-2.5 bg-gray-50 border border-gray-200 rounded-md text-sm text-gray-600 focus:outline-none hover:bg-gray-100 cursor-pointer">
                                    <option>Experience</option>
                                    <option>+5 years</option>
                                    <option>+10 years</option>
                                </select>
                                <button
                                    class="px-4 py-2.5 bg-gray-900 text-white rounded-md text-sm font-medium hover:bg-gray-800 transition-colors">
                                    Filter
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- Results Grid -->
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                        <!-- Card 1 -->
                        <div
                            class="bg-white border border-gray-200 rounded-lg p-5 hover:shadow-md transition-shadow cursor-pointer group">
                            <div class="flex items-start justify-between mb-4">
                                <div class="flex gap-3">
                                    <div
                                        class="w-12 h-12 rounded-full bg-gray-100 overflow-hidden flex items-center justify-center">
                                        <span class="text-sm font-semibold text-gray-500">MK</span>
                                    </div>
                                    <div>
                                        <h3
                                            class="font-semibold text-gray-900 group-hover:text-indigo-600 transition-colors">
                                            Maitre Karim Bennani</h3>
                                        <p class="text-xs text-gray-500">Lawyer at Casa Bar</p>
                                    </div>
                                </div>
                                <span
                                    class="inline-flex items-center px-2 py-1 rounded bg-green-50 text-green-700 text-[10px] font-medium border border-green-100">Available</span>
                            </div>

                            <div class="space-y-3 mb-5">
                                <div class="flex items-center text-xs text-gray-500 gap-2">
                                    <span class="iconify" data-icon="lucide:briefcase" data-width="14"></span>
                                    <span>15 years of experience</span>
                                </div>
                                <div class="flex items-center text-xs text-gray-500 gap-2">
                                    <span class="iconify" data-icon="lucide:map-pin" data-width="14"></span>
                                    <span>Casablanca, Maârif</span>
                                </div>
                                <div class="flex flex-wrap gap-1.5 pt-1">
                                    <span
                                        class="px-2 py-0.5 bg-gray-50 border border-gray-100 rounded text-[10px] text-gray-600">Business
                                        Law</span>
                                    <span
                                        class="px-2 py-0.5 bg-gray-50 border border-gray-100 rounded text-[10px] text-gray-600">Tax Law</span>
                                </div>
                            </div>

                            <div class="flex items-center justify-between pt-4 border-t border-gray-100">
                                <span class="text-sm font-semibold text-gray-900">500 DH<span
                                        class="text-xs font-normal text-gray-500">/hour</span></span>
                                <button class="text-xs font-medium text-indigo-600 hover:text-indigo-800">View profile
                                    &rarr;</button>
                            </div>
                        </div>

                        <!-- Card 2 -->
                        <div
                            class="bg-white border border-gray-200 rounded-lg p-5 hover:shadow-md transition-shadow cursor-pointer group">
                            <div class="flex items-start justify-between mb-4">
                                <div class="flex gap-3">
                                    <div
                                        class="w-12 h-12 rounded-full bg-gray-100 overflow-hidden flex items-center justify-center">
                                        <span class="text-sm font-semibold text-gray-500">SL</span>
                                    </div>
                                    <div>
                                        <h3
                                            class="font-semibold text-gray-900 group-hover:text-indigo-600 transition-colors">
                                            Maitre Sara Lahlou</h3>
                                        <p class="text-xs text-gray-500">Lawyer</p>
                                    </div>
                                </div>
                            </div>

                            <div class="space-y-3 mb-5">
                                <div class="flex items-center text-xs text-gray-500 gap-2">
                                    <span class="iconify" data-icon="lucide:briefcase" data-width="14"></span>
                                    <span>8 years of experience</span>
                                </div>
                                <div class="flex items-center text-xs text-gray-500 gap-2">
                                    <span class="iconify" data-icon="lucide:map-pin" data-width="14"></span>
                                    <span>Rabat, Agdal</span>
                                </div>
                                <div class="flex flex-wrap gap-1.5 pt-1">
                                    <span
                                        class="px-2 py-0.5 bg-gray-50 border border-gray-100 rounded text-[10px] text-gray-600">Family</span>
                                    <span
                                        class="px-2 py-0.5 bg-gray-50 border border-gray-100 rounded text-[10px] text-gray-600">Divorce</span>
                                </div>
                            </div>

                            <div class="flex items-center justify-between pt-4 border-t border-gray-100">
                                <span class="text-sm font-semibold text-gray-900">400 DH<span
                                        class="text-xs font-normal text-gray-500">/hour</span></span>
                                <button class="text-xs font-medium text-indigo-600 hover:text-indigo-800">View profile
                                    &rarr;</button>
                            </div>
                        </div>

                        <!-- Card 3 -->
                        <div
                            class="bg-white border border-gray-200 rounded-lg p-5 hover:shadow-md transition-shadow cursor-pointer group">
                            <div class="flex items-start justify-between mb-4">
                                <div class="flex gap-3">
                                    <div
                                        class="w-12 h-12 rounded-full bg-gray-100 overflow-hidden flex items-center justify-center">
                                        <span class="text-sm font-semibold text-gray-500">YB</span>
                                    </div>
                                    <div>
                                        <h3
                                            class="font-semibold text-gray-900 group-hover:text-indigo-600 transition-colors">
                                            Yassine Berrada</h3>
                                        <p class="text-xs text-gray-500">Huissier de Justice</p>
                                    </div>
                                </div>
                            </div>

                            <div class="space-y-3 mb-5">
                                <div class="flex items-center text-xs text-gray-500 gap-2">
                                    <span class="iconify" data-icon="lucide:gavel" data-width="14"></span>
                                    <span>22 years of experience</span>
                                </div>
                                <div class="flex items-center text-xs text-gray-500 gap-2">
                                    <span class="iconify" data-icon="lucide:map-pin" data-width="14"></span>
                                    <span>Marrakech, Gueliz</span>
                                </div>
                                <div class="flex flex-wrap gap-1.5 pt-1">
                                    <span
                                        class="px-2 py-0.5 bg-purple-50 border border-purple-100 rounded text-[10px] text-purple-700">Reports</span>
                                    <span
                                        class="px-2 py-0.5 bg-purple-50 border border-purple-100 rounded text-[10px] text-purple-700">Execution</span>
                                </div>
                            </div>

                            <div class="flex items-center justify-between pt-4 border-t border-gray-100">
                                <span class="text-sm font-semibold text-gray-900">Regulated rate</span>
                                <button class="text-xs font-medium text-indigo-600 hover:text-indigo-800">View profile
                                    &rarr;</button>
                            </div>
                        </div>
                    </div>

                    <!-- Pagination -->
                    <div class="flex items-center justify-between border-t border-gray-200 pt-6">
                        <button
                            class="flex items-center gap-2 px-3 py-2 text-sm text-gray-600 bg-white border border-gray-200 rounded-md hover:bg-gray-50 disabled:opacity-50"
                            disabled>
                            <span class="iconify" data-icon="lucide:chevron-left" data-width="16"></span>
                            Previous
                        </button>
                        <div class="hidden md:flex gap-1 text-sm">
                            <button
                                class="w-8 h-8 flex items-center justify-center rounded-md bg-gray-900 text-white">1</button>
                            <button
                                class="w-8 h-8 flex items-center justify-center rounded-md text-gray-600 hover:bg-gray-100">2</button>
                            <button
                                class="w-8 h-8 flex items-center justify-center rounded-md text-gray-600 hover:bg-gray-100">3</button>
                            <span class="w-8 h-8 flex items-center justify-center text-gray-400">...</span>
                        </div>
                        <button
                            class="flex items-center gap-2 px-3 py-2 text-sm text-gray-600 bg-white border border-gray-200 rounded-md hover:bg-gray-50">
                            Next
                            <span class="iconify" data-icon="lucide:chevron-right" data-width="16"></span>
                        </button>
                    </div>
                </div>

            </div>
<?php include_once __DIR__ . "/../layouts/footer.php" ?>
</body>
</html>