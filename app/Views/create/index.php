<?php include_once __DIR__ . "/../layouts/header.php"; ?>
<body class="text-gray-600">

<div class="flex h-screen overflow-hidden bg-white">
    <?php include_once __DIR__ . "/../layouts/aside.php" ?>
    <main class="flex-1 flex flex-col min-w-0 bg-gray-50/50 overflow-hidden">

        <div class="flex-1 overflow-auto p-4 md:p-8 space-y-8" id="main-container">
<!-- VIEW 2: PROFESSIONAL MANAGEMENT (CREATE FORM) -->
<div id="view-professionals" class="max-w-4xl mx-auto space-y-6">
    <div class="flex items-center justify-between">
        <div>
            <h1 class="text-xl font-semibold tracking-tight text-gray-900">New Professional</h1>
            <p class="text-sm text-gray-500 mt-1">Add a lawyer or bailiff.</p>
        </div>
    </div>

    <div class="bg-white border border-gray-200 rounded-lg shadow-sm p-6 md:p-8">
        <form class="space-y-6" method = 'POST'>
            <!-- Toggle Type -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-3">Professional
                    Type</label>
                <div class="grid grid-cols-2 gap-4 max-w-md">
                    <label class="cursor-pointer relative">
                        <input type="radio" name="prof_type" value="lawyer" class="peer sr-only" checked
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
                        <input type="radio" name="prof_type" value="bailiff" class="peer sr-only"
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
                    <input name="name" type="text" placeholder="Ex: Maitre Alami"
                           class="w-full px-3 py-2 bg-white border border-gray-200 rounded-md text-sm placeholder:text-gray-400 focus:outline-none focus:ring-2 focus:ring-indigo-500/20 focus:border-indigo-500 transition-shadow">
                </div>

                <div class="space-y-1">
                    <label class="text-xs font-medium text-gray-700">Email</label>
                    <input name="email" type="email" placeholder="contact@cabinet.ma"
                           class="w-full px-3 py-2 bg-white border border-gray-200 rounded-md text-sm placeholder:text-gray-400 focus:outline-none focus:ring-2 focus:ring-indigo-500/20 focus:border-indigo-500 transition-shadow">
                </div>

                <div class="space-y-1">
                    <label class="text-xs font-medium text-gray-700">Phone</label>
                    <input name="phone" type="tel" placeholder="+212 6..."
                           class="w-full px-3 py-2 bg-white border border-gray-200 rounded-md text-sm placeholder:text-gray-400 focus:outline-none focus:ring-2 focus:ring-indigo-500/20 focus:border-indigo-500 transition-shadow">
                </div>

                <div class="space-y-1">
                    <label class="text-xs font-medium text-gray-700">City</label>
                    <select name="city"
                        class="w-full px-3 py-2 bg-white border border-gray-200 rounded-md text-sm text-gray-700 focus:outline-none focus:ring-2 focus:ring-indigo-500/20 focus:border-indigo-500 transition-shadow appearance-none">
                        <?php foreach ($cities as $city) : ?>
                        <option value="<?= $city->getName() ?>"><?= $city->getName() ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="space-y-1">
                    <label class="text-xs font-medium text-gray-700">Years of experience</label>
                    <div class="relative">
                        <input name="YearsOfExperience" type="number" min="0" step="1" placeholder="Ex: 5" inputmode="numeric"
                               class="w-full px-3 py-2 bg-white border border-gray-200 rounded-md text-sm placeholder:text-gray-400 focus:outline-none focus:ring-2 focus:ring-indigo-500/20 focus:border-indigo-500 transition-shadow pr-12">
                        <span class="absolute right-3 top-1/2 -translate-y-1/2 text-xs text-gray-400 pointer-events-none">Years</span>
                    </div>
                </div>
                <div class="space-y-1">
                    <label class="text-xs font-medium text-gray-700">Hourly rate</label>
                    <div class="relative">
                        <input name="hourlyRate" type="number" min="0" step="0.01" placeholder="Ex: 500.00" inputmode="decimal"
                               class="w-full px-3 py-2 bg-white border border-gray-200 rounded-md text-sm placeholder:text-gray-400 focus:outline-none focus:ring-2 focus:ring-indigo-500/20 focus:border-indigo-500 transition-shadow pr-10">
                        <span class="absolute right-3 top-1/2 -translate-y-1/2 text-xs text-gray-400 pointer-events-none">DH</span>
                    </div>
                </div>
            </div>

            <!-- Dynamic Section: lawyer -->
            <div id="fields-lawyer" class="space-y-6 pt-4 border-t border-gray-100">
                <div class="space-y-3">
                    <label class="text-sm font-medium text-gray-900">Legal Specialties</label>
                    <div class="grid grid-cols-2 md:grid-cols-4 gap-3">
                        <?php foreach (\App\Enums\Specialization::cases() as $spec) : ?>
                            <label class="flex items-center gap-2 text-sm text-gray-600 cursor-pointer">
                                <input type="radio" name="specialty" value="<?= $spec->value ?>"
                                       class="rounded-full border-gray-300 text-indigo-600 focus:ring-indigo-500/20">
                                <?= $spec->value ?>
                            </label>
                        <?php endforeach; ?>
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
                        <input name="Consultation" type="hidden" value="0">
                        <input name="Consultation" type="checkbox" value="1" class="sr-only peer">
                        <div
                            class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-indigo-300/20 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-indigo-600">
                        </div>
                    </label>
                </div>
            </div>

            <!-- Dynamic Section: Bailiff -->
            <div id="fields-bailiff" class="hidden-section section-hide space-y-6 pt-4 border-t border-gray-100">
                <div class="space-y-3">
                    <label class="text-sm font-medium text-gray-900">Authorized Act Types</label>
                    <div class="space-y-3">
                        <?php
                        $type_icons = [
                            \App\Enums\Type::SIGNIFICATION->value => ['icon' => 'lucide:scroll-text', 'label' => 'Service', 'desc' => 'Judicial and extra-judicial acts'],
                            \App\Enums\Type::EXECUTION->value => ['icon' => 'lucide:hammer', 'label' => 'Execution', 'desc' => 'Seizures and evictions'],
                            \App\Enums\Type::CONSTATS->value => ['icon' => 'lucide:eye', 'label' => 'Reports', 'desc' => 'Material evidence'],
                        ];
                        foreach (\App\Enums\Type::cases() as $type) :
                            $info = $type_icons[$type->value] ?? ['icon' => 'lucide:file-text', 'label' => ucfirst($type->value), 'desc' => ''];
                        ?>
                        <label
                            class="flex p-3 border border-gray-200 rounded-md cursor-pointer hover:bg-gray-50 transition-colors has-[:checked]:border-purple-600 has-[:checked]:bg-purple-50">
                            <input type="radio" name="act_type" value="<?= $type->value ?>" class="sr-only">
                            <div class="flex items-center gap-3">
                                <div
                                    class="flex-shrink-0 w-8 h-8 rounded bg-purple-100 text-purple-600 flex items-center justify-center">
                                                    <span class="iconify" data-icon="<?= $info['icon'] ?>"
                                                          data-width="16"></span>
                                </div>
                                <div>
                                    <p class="text-sm font-medium text-gray-900"><?= $info['label'] ?></p>
                                    <p class="text-xs text-gray-500"><?= $info['desc'] ?></p>
                                </div>
                            </div>
                        </label>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>

            <div class="flex justify-end gap-3 pt-6">
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