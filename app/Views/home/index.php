<?php include_once __DIR__ . "/../layouts/header.php"; ?>
<body class="text-gray-600">

<div class="flex h-screen overflow-hidden bg-white">
<?php include_once __DIR__ . "/../layouts/aside.php" ?>
<main class="flex-1 flex flex-col min-w-0 bg-gray-50/50 overflow-hidden">
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
            </div>
<?php include_once __DIR__ . "/../layouts/footer.php" ?>
</body>
</html>