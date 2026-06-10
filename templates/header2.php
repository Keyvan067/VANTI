<?php
/**
 * Header template
 *
 * @package VANTI
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?> dir="rtl" lang="fa" data-theme="light">
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VANTI</title>
    <?php wp_head(); ?>
</head>
<body <?php body_class('bg-background text-foreground antialiased selection:bg-primary selection:text-white'); ?>>
<?php wp_body_open(); ?>

<header
        x-data="{ cartOpen: false, profileOpen: false, searchFocused: false }"
        class="sticky top-0 z-50 w-full border-b border-accent/50 bg-background/65 backdrop-blur-xl transition-all duration-300"
>
    <div class="container mx-auto flex h-20 items-center justify-between px-4 lg:px-8">

        <div class="flex items-center gap-6">
            <a href="<?php echo esc_url(home_url('/')); ?>" class="flex items-center gap-2 group">
                <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-primary text-white shadow-md shadow-primary/20 group-hover:scale-105 transition-transform">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5"
                         stroke="currentColor" class="w-5 h-5">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M15.75 10.5V6a3.75 3.75 0 1 0-7.5 0v4.5m11.356-1.993 1.263 12c.07.665-.45 1.243-1.119 1.243H4.25a1.125 1.125 0 0 1-1.12-1.243l1.264-12A1.125 1.125 0 0 1 5.513 7.5h12.974c.576 0 1.059.435 1.119 1.007ZM8.625 10.5a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm7.5 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Z"/>
                    </svg>
                </div>
                <span class="text-xl font-black tracking-tight text-foreground group-hover:text-primary transition-colors hidden sm:block">
                    <?php bloginfo('name'); ?>
                </span>
            </a>
        </div>

        <div class="flex-1 max-w-md mx-4 hidden md:block">
            <div
                    @click="searchFocused = !searchFocused"
                    class="relative w-full flex items-center justify-between rounded-full border border-border bg-card/50 shadow hover:shadow-md shadow-accent/20 hover:shadow-accent/50 transition-all duration-300 cursor-pointer border-primary/10"
                    :class="open ? 'shadow-lg border-gray-300 rounded-3xl' : 'border-gray-200'"
            >
                <!--MODALS... -->
                <div x-data="airbnbSearchTabs()"
                     class="relative flex items-center text-xs w-full justify-between">
                    <div
                            class="flex-1 py-1.5 px-5 rounded-full bg-base-100 h-full w-fit"
                            :class="activeSearchTab === 'where' && open ? 'bg-blue-100' : 'hover:bg-red-200'"
                    >
                        <button class="py-2" @click="activeSearchTab = 'where'; open = true">
                            دسته‌بندی‌ محصولات
                        </button>
                    </div>
                    <div class="h-5 w-0.5 bg-zinc-300"></div>
                    <div
                            class="flex-1 py-1.5 px-5 rounded-full bg-base-100 h-full w-fit"
                            :class="activeSearchTab === 'when' && open ? 'bg-gray-50' : 'hover:bg-gray-50'"
                    >
                        <button
                                @click="activeSearchTab = 'when'; open = true"
                                class="py-2">
                            شگفت‌انگیزها
                        </button>
                    </div>
                    <div class="h-5 w-0.5 bg-zinc-300"></div>
                    <div
                            class="flex-1 py-1.5 pl-1 pr-5 rounded-full bg-base-100 h-full flex items-center justify-between relative w-fit"
                            :class="activeSearchTab === 'who' && open ? 'bg-gray-50' : 'hover:bg-gray-50'"
                    >
                        <button
                                @click="activeSearchTab = 'who'; open = true"
                                class="text-foreground p-2">بلاگ وانتی
                        </button>
                        <div class="flex h-8 w-8 items-center justify-center rounded-full bg-primary text-white shadow-sm shadow-primary/20">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5"
                                 stroke="currentColor" class="w-4 h-4">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                      d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.602 10.602Z"/>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="flex items-center gap-4">
            <button
                    @click="cartOpen = true"
                    class="relative flex h-10 w-10 items-center justify-center rounded-full border border-border bg-card/40 text-foreground hover:bg-card hover:scale-105 transition-all duration-200"
            >
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                     stroke="currentColor" class="w-5 h-5">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 0 0-3 3h15.75m-12.75-3h11.218c1.121-0 2.1-.743 2.424-1.81l2.28-7.652a1.051 1.051 0 0 0-1.013-1.348H6.183M7.5 14.25L5.106 5.272M6 20.25a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Zm12.75 0a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Z"/>
                </svg>
                <span class="absolute -top-1 -left-1 flex h-5 w-5 items-center justify-center rounded-full bg-primary text-[10px] font-bold text-white shadow-xs">
                    <?php echo class_exists('WooCommerce') ? WC()->cart->get_cart_contents_count() : '0'; ?>
                </span>
            </button>
        </div>
    </div>
</header>

<!--MODALS...-->
<div class="relative max-w-4xl mx-auto px-4 py-8" dir="rtl">
    <div class="relative">
        <div class="relative bg-white rounded-full border shadow-sm hover:shadow-md transition-all duration-300 cursor-pointer">
            <div class="flex items-center">
                <!-- تب Where -->
                <div class="flex-1 px-6 py-3 rounded-r-full transition-all duration-300"

                >
                    <div class="text-xs font-semibold text-gray-900">کجا</div>
                    <div class="text-sm truncate" :class="searchData.where ? 'text-gray-900' : 'text-gray-500'">
                        <span x-text="searchData.where || 'جستجوی مقصد'"></span>
                    </div>
                </div>

                <!-- تب When -->
                <div

                        class="flex-1 px-6 py-3 border-r border-gray-200 transition-all duration-300"

                >
                    <div class="text-xs font-semibold text-gray-900">کی</div>
                    <div class="text-sm" :class="searchData.when ? 'text-gray-900' : 'text-gray-500'">
                        <span x-text="searchData.when || 'افزودن تاریخ'"></span>
                    </div>
                </div>

                <!-- تب Who -->
                <div

                        class="flex-1 px-6 py-3 border-r border-gray-200 transition-all duration-300"

                >
                    <div class="text-xs font-semibold text-gray-900">چه کسی</div>
                    <div class="text-sm" :class="searchData.who ? 'text-gray-900' : 'text-gray-500'">
                        <span x-text="searchData.who || 'افزودن مهمان'"></span>
                    </div>
                </div>

                <!-- دکمه جستجو -->
                <div class="mx-2">
                    <button
                            @click="performSearch()"
                            class="bg-gradient-to-r from-rose-500 to-rose-600 text-white p-3 rounded-full hover:scale-105 transition-transform duration-200 shadow-md hover:shadow-lg"
                    >
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        <!-- پنل بازشو با انیمیشن شبیه Airbnb -->
        <div
                x-show="open"
                x-transition:enter="transition-all duration-300 ease-out"
                x-transition:enter-start="opacity-0 -translate-y-2 scale-95"
                x-transition:enter-end="opacity-100 translate-y-0 scale-100"
                x-transition:leave="transition-all duration-200 ease-in"
                x-transition:leave-start="opacity-100 translate-y-0 scale-100"
                x-transition:leave-end="opacity-0 -translate-y-2 scale-95"
                @click.away="open = false"
                class="absolute top-full left-0 right-0 mt-3 bg-white rounded-3xl shadow-2xl border border-gray-100 overflow-hidden z-50"
        >
            <!-- هدر تب‌ها با انیمیشن Sliding Indicator -->
            <div class="relative border-b border-gray-100">
                <div class="flex px-6 pt-4">
                    <button
                            @click="activeSearchTab = 'where'"
                            class="relative px-4 py-3 text-sm font-medium transition-all duration-300"
                            :class="activeSearchTab === 'where' ? 'text-gray-900' : 'text-gray-500 hover:text-gray-700'"
                    >
                        جستجوی مقصدها
                        <span
                                class="absolute bottom-0 left-0 h-0.5 bg-gray-900 transition-all duration-300 ease-out"
                                :class="activeSearchTab === 'where' ? 'w-full' : 'w-0'"
                        ></span>
                    </button>
                    <button
                            @click="activeSearchTab = 'when'"
                            class="relative px-4 py-3 text-sm font-medium transition-all duration-300"
                            :class="activeSearchTab === 'when' ? 'text-gray-900' : 'text-gray-500 hover:text-gray-700'"
                    >
                        انتخاب تاریخ
                        <span
                                class="absolute bottom-0 left-0 h-0.5 bg-gray-900 transition-all duration-300 ease-out"
                                :class="activeSearchTab === 'when' ? 'w-full' : 'w-0'"
                        ></span>
                    </button>
                    <button
                            @click="activeSearchTab = 'who'"
                            class="relative px-4 py-3 text-sm font-medium transition-all duration-300"
                            :class="activeSearchTab === 'who' ? 'text-gray-900' : 'text-gray-500 hover:text-gray-700'"
                    >
                        افزودن مهمان
                        <span
                                class="absolute bottom-0 left-0 h-0.5 bg-gray-900 transition-all duration-300 ease-out"
                                :class="activeSearchTab === 'who' ? 'w-full' : 'w-0'"
                        ></span>
                    </button>
                </div>

                <!-- اندیکاتور لغزنده -->
                <div
                        x-ref="searchIndicator"
                        class="absolute bottom-0 h-0.5 bg-gray-900 transition-all duration-300 ease-out"
                        :style="`width: ${indicatorWidth}px; transform: translateX(${indicatorPosition}px);`"
                ></div>
            </div>

            <!-- محتوای تب‌ها با انیمیشن Fade + Slide -->
            <div class="relative min-h-[400px] bg-white">
                <!-- تب Where -->
                <div
                        x-show="activeSearchTab === 'where'"
                        x-transition:enter="transition-all duration-400 ease-[cubic-bezier(0.23,1,0.32,1)]"
                        x-transition:enter-start="opacity-0 translate-x-4"
                        x-transition:enter-end="opacity-100 translate-x-0"
                        x-transition:leave="transition-all duration-300 ease-[cubic-bezier(0.23,1,0.32,1)]"
                        x-transition:leave-start="opacity-100 translate-x-0"
                        x-transition:leave-end="opacity-0 -translate-x-4"
                        class="absolute inset-0 p-6 overflow-y-auto"
                >
                    <div>
                        <!-- باکس جستجوی مقصد -->
                        <div class="relative mb-6">
                            <input
                                    type="text"
                                    x-model="searchQuery"
                                    @input="filterDestinations()"
                                    placeholder="جستجوی شهرها یا مناطق"
                                    class="w-full px-5 py-4 pr-12 rounded-xl border border-gray-200 focus:border-gray-400 focus:ring-0 transition-all text-lg"
                                    :class="searchQuery ? 'bg-white' : 'bg-gray-50'"
                            >
                            <svg class="absolute right-4 top-1/2 -translate-y-1/2 w-5 h-5 text-gray-400" fill="none"
                                 stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                            </svg>
                        </div>

                        <!-- مقصدهای پیشنهادی با انیمیشن Stagger -->
                        <div x-show="!searchQuery" class="space-y-4">
                            <div class="text-sm font-medium text-gray-700 mb-3">مقصدهای محبوب</div>
                            <template x-for="(dest, idx) in popularDestinations" :key="dest.name">
                                <div
                                        @click="selectDestination(dest)"
                                        class="flex items-center gap-4 p-3 rounded-xl hover:bg-gray-50 cursor-pointer transition-all duration-300 group"
                                        x-init="
                                        $el.style.opacity = '0';
                                        $el.style.transform = 'translateX(-20px)';
                                        setTimeout(() => {
                                            $el.style.transition = 'all 0.3s ease-out';
                                            $el.style.opacity = '1';
                                            $el.style.transform = 'translateX(0)';
                                        }, idx * 50)
                                    "
                                >
                                    <div class="w-14 h-14 rounded-xl bg-gradient-to-br from-gray-100 to-gray-200 flex items-center justify-center text-2xl group-hover:scale-110 transition-transform">
                                        <span x-text="dest.emoji">📍</span>
                                    </div>
                                    <div class="flex-1">
                                        <div class="font-medium text-gray-900" x-text="dest.name"></div>
                                        <div class="text-sm text-gray-500" x-text="dest.description"></div>
                                    </div>
                                    <div x-show="dest.favorite"
                                         class="text-xs bg-rose-50 text-rose-600 px-2 py-1 rounded-full">
                                        ⭐ محبوب
                                    </div>
                                </div>
                            </template>
                        </div>

                        <!-- نتایج جستجو -->
                        <div x-show="searchQuery" class="space-y-3">
                            <template x-for="dest in filteredDestinations" :key="dest.name">
                                <div
                                        @click="selectDestination(dest)"
                                        class="flex items-center gap-4 p-3 rounded-xl hover:bg-gray-50 cursor-pointer transition-all"
                                >
                                    <div class="w-12 h-12 rounded-lg bg-gray-100 flex items-center justify-center text-xl">
                                        <span x-text="dest.emoji">🏠</span>
                                    </div>
                                    <div>
                                        <div class="font-medium text-gray-900" x-text="dest.name"></div>
                                        <div class="text-sm text-gray-500" x-text="dest.description"></div>
                                    </div>
                                </div>
                            </template>
                        </div>
                    </div>
                </div>

                <!-- تب When -->
                <div
                        x-show="activeSearchTab === 'when'"
                        x-transition:enter="transition-all duration-400 ease-[cubic-bezier(0.23,1,0.32,1)]"
                        x-transition:enter-start="opacity-0 translate-x-4"
                        x-transition:enter-end="opacity-100 translate-x-0"
                        x-transition:leave="transition-all duration-300 ease-[cubic-bezier(0.23,1,0.32,1)]"
                        x-transition:leave-start="opacity-100 translate-x-0"
                        x-transition:leave-end="opacity-0 -translate-x-4"
                        class="absolute inset-0 p-6 overflow-y-auto"
                >
                    <div>
                        <div class="text-sm font-medium text-gray-700 mb-4">چه زمانی سفر می‌کنید؟</div>

                        <!-- تقویم ساده (برای دمو) -->
                        <div class="grid grid-cols-7 gap-2 mb-6">
                            <template x-for="day in ['ش', 'ی', 'د', 'س', 'چ', 'پ', 'ج']">
                                <div class="text-center text-sm font-medium text-gray-500 py-2" x-text="day"></div>
                            </template>
                            <template x-for="i in 35">
                                <div
                                        @click="selectDate(i)"
                                        class="text-center py-3 rounded-full cursor-pointer transition-all duration-200 hover:bg-gray-100"
                                        :class="selectedDates.includes(i) ? 'bg-gray-900 text-white hover:bg-gray-800' : 'text-gray-700 hover:bg-gray-50'"
                                >
                                    <span x-text="i"></span>
                                </div>
                            </template>
                        </div>

                        <div class="flex gap-4 text-sm text-gray-600">
                            <div class="flex items-center gap-2">
                                <div class="w-4 h-4 rounded-full bg-gray-900"></div>
                                <span>تاریخ انتخاب شده</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- تب Who -->
                <div
                        x-show="activeSearchTab === 'who'"
                        x-transition:enter="transition-all duration-400 ease-[cubic-bezier(0.23,1,0.32,1)]"
                        x-transition:enter-start="opacity-0 translate-x-4"
                        x-transition:enter-end="opacity-100 translate-x-0"
                        x-transition:leave="transition-all duration-300 ease-[cubic-bezier(0.23,1,0.32,1)]"
                        x-transition:leave-start="opacity-100 translate-x-0"
                        x-transition:leave-end="opacity-0 -translate-x-4"
                        class="absolute inset-0 p-6 overflow-y-auto"
                >
                    <div class="space-y-6">
                        <div class="flex items-center justify-between py-4 border-b border-gray-100">
                            <div>
                                <div class="font-medium text-gray-900">بزرگسالان</div>
                                <div class="text-sm text-gray-500">بالای ۱۳ سال</div>
                            </div>
                            <div class="flex items-center gap-4">
                                <button
                                        @click="updateGuests('adults', -1)"
                                        :disabled="searchData.adults <= 1"
                                        class="w-10 h-10 rounded-full border border-gray-300 flex items-center justify-center hover:border-gray-400 disabled:opacity-40 transition-all hover:scale-110"
                                >
                                    <span class="text-xl">-</span>
                                </button>
                                <span class="w-8 text-center text-lg" x-text="searchData.adults"></span>
                                <button
                                        @click="updateGuests('adults', 1)"
                                        class="w-10 h-10 rounded-full border border-gray-300 flex items-center justify-center hover:border-gray-400 transition-all hover:scale-110"
                                >
                                    <span class="text-xl">+</span>
                                </button>
                            </div>
                        </div>

                        <div class="flex items-center justify-between py-4 border-b border-gray-100">
                            <div>
                                <div class="font-medium text-gray-900">کودکان</div>
                                <div class="text-sm text-gray-500">۲ تا ۱۲ سال</div>
                            </div>
                            <div class="flex items-center gap-4">
                                <button
                                        @click="updateGuests('children', -1)"
                                        :disabled="searchData.children <= 0"
                                        class="w-10 h-10 rounded-full border border-gray-300 flex items-center justify-center hover:border-gray-400 disabled:opacity-40 transition-all hover:scale-110"
                                >
                                    <span class="text-xl">-</span>
                                </button>
                                <span class="w-8 text-center text-lg" x-text="searchData.children"></span>
                                <button
                                        @click="updateGuests('children', 1)"
                                        class="w-10 h-10 rounded-full border border-gray-300 flex items-center justify-center hover:border-gray-400 transition-all hover:scale-110"
                                >
                                    <span class="text-xl">+</span>
                                </button>
                            </div>
                        </div>

                        <div class="flex items-center justify-between py-4 border-b border-gray-100">
                            <div>
                                <div class="font-medium text-gray-900">نوزادان</div>
                                <div class="text-sm text-gray-500">زیر ۲ سال</div>
                            </div>
                            <div class="flex items-center gap-4">
                                <button
                                        @click="updateGuests('infants', -1)"
                                        :disabled="searchData.infants <= 0"
                                        class="w-10 h-10 rounded-full border border-gray-300 flex items-center justify-center hover:border-gray-400 disabled:opacity-40 transition-all hover:scale-110"
                                >
                                    <span class="text-xl">-</span>
                                </button>
                                <span class="w-8 text-center text-lg" x-text="searchData.infants"></span>
                                <button
                                        @click="updateGuests('infants', 1)"
                                        class="w-10 h-10 rounded-full border border-gray-300 flex items-center justify-center hover:border-gray-400 transition-all hover:scale-110"
                                >
                                    <span class="text-xl">+</span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- دکمه‌های پایین پنل -->
            <div class="border-t border-gray-100 p-4 flex justify-between bg-gray-50">
                <button
                        @click="resetSearch()"
                        class="text-sm text-gray-500 hover:underline transition-all"
                >
                    حذف همه
                </button>
                <button
                        @click="performSearch()"
                        class="bg-gradient-to-r from-rose-500 to-rose-600 text-white px-8 py-3 rounded-full hover:scale-105 transition-all duration-200 font-medium shadow-md hover:shadow-lg"
                >
                    جستجو
                </button>
            </div>
        </div>
    </div>
</div>

<script>
    function airbnbSearchTabs() {
        return {
            open: false,
            activeSearchTab: 'where',
            indicatorWidth: 0,
            indicatorPosition: 0,
            searchQuery: '',
            searchData: {
                where: '',
                when: '',
                who: '',
                adults: 1,
                children: 0,
                infants: 0
            },
            selectedDates: [],
            destinations: [
                {name: 'تهران', description: 'مرکز ایران', emoji: '🏙️', favorite: true},
                {name: 'اصفهان', description: 'نصف جهان', emoji: '🕌', favorite: true},
                {name: 'شیراز', description: 'شهر شعر و ادب', emoji: '🌹', favorite: true},
                {name: 'مشهد', description: 'شهر مقدس', emoji: '⛪', favorite: false},
                {name: 'تبریز', description: 'شهر اولین‌ها', emoji: '🏛️', favorite: false}
            ],
            filteredDestinations: [],
            popularDestinations: [],

            init() {
                this.popularDestinations = this.destinations.filter(d => d.favorite);
                this.filteredDestinations = this.destinations;
                this.updateIndicator();

                this.$watch('activeSearchTab', () => {
                    this.updateIndicator();
                    this.updateSearchSummary();
                });

                window.addEventListener('resize', () => this.updateIndicator());
            },

            updateIndicator() {
                this.$nextTick(() => {
                    const buttons = document.querySelectorAll('[x-data] .relative button');
                    const activeButton = Array.from(buttons).find(btn => {
                        return (btn.textContent.includes('جستجوی مقصدها') && this.activeSearchTab === 'where') ||
                            (btn.textContent.includes('انتخاب تاریخ') && this.activeSearchTab === 'when') ||
                            (btn.textContent.includes('افزودن مهمان') && this.activeSearchTab === 'who');
                    });

                    if (activeButton) {
                        this.indicatorWidth = activeButton.offsetWidth;
                        this.indicatorPosition = activeButton.offsetLeft;
                    }
                });
            },

            filterDestinations() {
                if (!this.searchQuery) {
                    this.filteredDestinations = this.destinations;
                } else {
                    this.filteredDestinations = this.destinations.filter(dest =>
                        dest.name.includes(this.searchQuery) ||
                        dest.description.includes(this.searchQuery)
                    );
                }
            },

            selectDestination(dest) {
                this.searchData.where = dest.name;
                this.searchQuery = '';
                this.activeSearchTab = 'when';
                this.updateSearchSummary();
            },

            selectDate(day) {
                if (this.selectedDates.length === 0) {
                    this.selectedDates = [day];
                } else if (this.selectedDates.length === 1) {
                    this.selectedDates.push(day);
                    this.selectedDates.sort((a, b) => a - b);
                    this.activeSearchTab = 'who';
                    this.updateSearchSummary();
                } else {
                    this.selectedDates = [day];
                }
            },

            updateGuests(type, delta) {
                if (type === 'adults') {
                    this.searchData.adults = Math.max(1, this.searchData.adults + delta);
                } else if (type === 'children') {
                    this.searchData.children = Math.max(0, this.searchData.children + delta);
                } else {
                    this.searchData.infants = Math.max(0, this.searchData.infants + delta);
                }
                this.updateSearchSummary();
            },

            updateSearchSummary() {
                // به‌روزرسانی خلاصه جستجو
                if (this.searchData.where) {
                    // قبلاً تنظیم شده
                }

                if (this.selectedDates.length === 2) {
                    const nights = this.selectedDates[1] - this.selectedDates[0];
                    this.searchData.when = `${nights} شب`;
                } else {
                    this.searchData.when = '';
                }

                const totalGuests = this.searchData.adults + this.searchData.children;
                if (totalGuests > 0) {
                    let guestText = `${totalGuests} مهمان`;
                    if (this.searchData.infants > 0) {
                        guestText += `، ${this.searchData.infants} نوزاد`;
                    }
                    this.searchData.who = guestText;
                } else {
                    this.searchData.who = '';
                }
            },

            resetSearch() {
                this.searchData = {
                    where: '',
                    when: '',
                    who: '',
                    adults: 1,
                    children: 0,
                    infants: 0
                };
                this.selectedDates = [];
                this.searchQuery = '';
                this.open = false;
            },

            performSearch() {
                console.log('جستجو:', this.searchData);
                this.open = false;
                // هدایت به صفحه نتایج
                // window.location.href = '/search?' + new URLSearchParams(this.searchData);
            }
        }
    }
</script>










