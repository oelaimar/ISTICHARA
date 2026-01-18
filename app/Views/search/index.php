<?php include_once __DIR__ . "/../layouts/header.php"; ?>
<body class="text-gray-600">

<div class="flex h-screen overflow-hidden bg-white">
    <?php include_once __DIR__ . "/../layouts/aside.php" ?>
    <main class="flex-1 flex flex-col min-w-0 bg-gray-50/50 overflow-hidden">
        <div class="flex-1 overflow-auto p-4 md:p-8 space-y-8" id="main-container">
            <!-- VIEW 3: USER SEARCH (Public) -->
<div id="view-search" class="space-y-6 max-w-6xl mx-auto">
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
            </div>
        </div>
    </div>

    <!-- Results Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        <?php foreach ($lawyers as $lawyer): ?>
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
                            <?= $lawyer->getName(); ?></h3>
                        <p class="text-xs text-gray-500">Lawyer</p>
                    </div>
                </div>
                <span
                    class="inline-flex items-center px-2 py-1 rounded bg-green-50 text-green-700 text-[10px] font-medium border border-green-100"><?= $lawyer->getConsultation() ? "Online Available" : ""; ?></span>
            </div>

            <div class="space-y-3 mb-5">
                <div class="flex items-center text-xs text-gray-500 gap-2">
                    <span class="iconify" data-icon="lucide:briefcase" data-width="14"></span>
                    <span><?= $lawyer->getExperienceYears(); ?> years of experience</span>
                </div>
                <div class="flex items-center text-xs text-gray-500 gap-2">
                    <span class="iconify" data-icon="lucide:map-pin" data-width="14"></span>
                    <span><?= $lawyer->getCity()->getName(); ?></span>
                </div>
                <div class="flex flex-wrap gap-1.5 pt-1">
                                    <span
                                        class="px-2 py-0.5 bg-gray-50 border border-gray-100 rounded text-[10px] text-gray-600">
                                        <?= $lawyer->getSpecialization()->value ?>
                                    </span>
                </div>
            </div>

            <div class="flex items-center justify-between pt-4 border-t border-gray-100">
                                <span class="text-sm font-semibold text-gray-900"><?= $lawyer->getHourlyRate() ?> DH<span
                                        class="text-xs font-normal text-gray-500">/hour</span></span>
                <button class="text-xs font-medium text-indigo-600 hover:text-indigo-800">View profile
                    &rarr;</button>
            </div>
        </div>
        <?php endforeach; ?>
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
            <?php include_once __DIR__ . "/../layouts/footer.php" ?>
</body>
</html>