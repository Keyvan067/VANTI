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



<!------------------->

<script src="https://tailwindcss.com"></script>
<style>
    body {
        background-color: #f7f7f7;
        margin: 0;
        font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
    }
    .airbnb-timing {
        transition: all 0.3s cubic-bezier(0.35, 0, 0.15, 1);
    }
    .dropdown-animate {
        transition: opacity 0.2s cubic-bezier(0.35, 0, 0.15, 1), transform 0.2s cubic-bezier(0.35, 0, 0.15, 1);
    }
</style>
<div class="relative h-screen w-screen">
    <div id="bg-overlay" class="fixed inset-0 bg-black/25 opacity-0 pointer-events-none airbnb-timing z-40"></div>


    <header class="bg-white border-b border-gray-200/80 sticky top-0 w-full z-50 pt-4 pb-4 airbnb-timing" id="main-header">
        <div class="max-w-7xl mx-auto px-6 relative flex flex-col items-center">
            <div id="search-bar" class="relative w-[440px] h-[48px] bg-white border border-gray-200 rounded-full shadow-sm hover:shadow-md cursor-pointer airbnb-timing flex items-center overflow-hidden">
                <div id="collapsed-view" class="w-full h-full flex items-center justify-between pl-6 pr-14 airbnb-timing opacity-100">
                    <div class="flex items-center text-xs font-bold text-gray-800 w-full justify-start gap-4">
                        <span class="truncate">Anywhere</span>
                        <span class="w-[1px] h-3 bg-gray-200 shrink-0"></span>
                        <span class="text-gray-500 font-medium truncate">Any week</span>
                        <span class="w-[1px] h-3 bg-gray-200 shrink-0"></span>
                        <span class="text-gray-500 font-medium truncate">Add guests</span>
                    </div>
                </div>
                <div id="expanded-view" class="absolute inset-0 w-full h-full bg-gray-100 rounded-full flex items-center opacity-0 pointer-events-none airbnb-timing">
                    <div data-section="destination" class="search-section flex-[1.4] h-full rounded-full flex flex-col justify-center pl-8 pr-4 relative z-10 hover:bg-gray-200/60 airbnb-timing">
                        <label class="block text-[10px] font-black tracking-wide text-gray-800 select-none">Where</label>
                        <input type="text" id="input-destination" placeholder="Search destinations" class="bg-transparent text-xs text-gray-800 font-medium outline-none w-full placeholder-gray-400 mt-0.5" autocomplete="off">
                        <div class="section-divider absolute right-0 top-1/4 bottom-1/4 w-[1px] bg-gray-300 airbnb-timing"></div>
                    </div>
                    <div data-section="checkin" class="search-section flex-[0.9] h-full rounded-full flex flex-col justify-center pl-6 pr-4 relative z-10 hover:bg-gray-200/60 airbnb-timing">
                        <label class="block text-[10px] font-black tracking-wide text-gray-800 select-none">Check in</label>
                        <span class="block text-xs text-gray-400 font-medium mt-0.5 truncate">Add dates</span>
                        <div class="section-divider absolute right-0 top-1/4 bottom-1/4 w-[1px] bg-gray-300 airbnb-timing"></div>
                    </div>
                    <div data-section="checkout" class="search-section flex-[0.9] h-full rounded-full flex flex-col justify-center pl-6 pr-4 relative z-10 hover:bg-gray-200/60 airbnb-timing">
                        <label class="block text-[10px] font-black tracking-wide text-gray-800 select-none">Check out</label>
                        <span class="block text-xs text-gray-400 font-medium mt-0.5 truncate">Add dates</span>
                        <div class="section-divider absolute right-0 top-1/4 bottom-1/4 w-[1px] bg-gray-300 airbnb-timing"></div>
                    </div>
                    <div data-section="guests" class="search-section flex-[1.3] h-full rounded-full flex flex-col justify-center pl-6 pr-24 relative z-10 hover:bg-gray-200/60 airbnb-timing">
                        <label class="block text-[10px] font-black tracking-wide text-gray-800 select-none">Who</label>
                        <span class="block text-xs text-gray-400 font-medium mt-0.5 truncate">Add guests</span>
                    </div>
                </div>
                <div id="search-action-btn" class="absolute right-2 bg-[#FF385C] text-white rounded-full flex items-center justify-center transition-all duration-300 cubic-bezier(0.35, 0, 0.15, 1) z-20 shadow-sm" style="width: 32px; height: 32px;">
                    <div class="flex items-center justify-center gap-2 px-1">
                        <svg xmlns="http://w3.org" fill="none" viewBox="0 0 24 24" stroke-width="3" stroke="currentColor" class="w-4 h-4 shrink-0">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
                        </svg>
                        <span id="search-btn-label" class="text-xs font-bold whitespace-nowrap hidden opacity-0 transition-opacity duration-200">Search</span>
                    </div>
                </div>
            </div>
            <div id="search-dropdown-box" class="absolute top-[85px] w-full max-w-xl bg-white border border-gray-100 rounded-[32px] p-6 shadow-[0_24px_48px_rgba(0,0,0,0.1)] opacity-0 scale-95 pointer-events-none dropdown-animate z-50">
                <div id="panel-destination" class="hidden">
                    <h4 class="text-xs font-black text-gray-900 mb-4">Search by region</h4>
                    <div class="grid grid-cols-3 gap-4">
                        <div class="border border-gray-200 p-4 rounded-2xl hover:border-black airbnb-timing text-center text-xs font-bold cursor-pointer bg-gray-50">I'm flexible</div>
                        <div class="border border-gray-200 p-4 rounded-2xl hover:border-black airbnb-timing text-center text-xs font-bold cursor-pointer bg-gray-50">Europe</div>
                        <div class="border border-gray-200 p-4 rounded-2xl hover:border-black airbnb-timing text-center text-xs font-bold cursor-pointer bg-gray-50">Middle East</div>
                    </div>
                </div>
                <div id="panel-dates" class="hidden text-center text-xs text-gray-500 py-4 font-medium">
                    Airbnb dual-calendar component goes here.
                </div>
                <div id="panel-guests" class="hidden">
                    <div class="flex items-center justify-between">
                        <div>
                            <h5 class="text-xs font-bold text-gray-900">Adults</h5>
                            <p class="text-[11px] text-gray-400 mt-0.5">Ages 13 or above</p>
                        </div>
                        <div class="flex items-center gap-3">
                            <button class="w-8 h-8 rounded-full border border-gray-200 flex items-center justify-center text-gray-600 hover:border-black text-lg font-light">-</button>
                            <span class="text-xs font-bold text-gray-800 w-4 text-center">0</span>
                            <button class="w-8 h-8 rounded-full border border-gray-200 flex items-center justify-center text-gray-600 hover:border-black text-lg font-light">+</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <main class="max-w-7xl mx-auto px-6 mt-12 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-6">
        <div class="bg-gray-200 aspect-square rounded-xl"></div>
        <div class="bg-gray-200 aspect-square rounded-xl"></div>
        <div class="bg-gray-200 aspect-square rounded-xl"></div>
        <div class="bg-gray-200 aspect-square rounded-xl"></div>
    </main>
    <script>
        const searchBar = document.getElementById('search-bar');
        const collapsedView = document.getElementById('collapsed-view');
        const expandedView = document.getElementById('expanded-view');
        const searchActionBtn = document.getElementById('search-action-btn');
        const searchBtnLabel = document.getElementById('search-btn-label');
        const bgOverlay = document.getElementById('bg-overlay');
        const mainHeader = document.getElementById('main-header');
        const searchDropdownBox = document.getElementById('search-dropdown-box');
        const inputDestination = document.getElementById('input-destination');
        const searchSections = document.querySelectorAll('.search-section');

        let isExpanded = false;

        searchBar.addEventListener('click', (e) => {
            if (isExpanded) return;
            e.stopPropagation();
            expandMenu();
        });

        function expandMenu() {
            isExpanded = true;
            searchBar.classList.remove('w-[440px]', 'h-[48px]');
            searchBar.classList.add('w-[850px]', 'h-[66px]', 'border-gray-200/40');
            mainHeader.classList.add('pb-8');
            collapsedView.classList.replace('opacity-100', 'opacity-0');
            collapsedView.classList.add('pointer-events-none');
            setTimeout(() => {
                expandedView.classList.remove('opacity-0', 'pointer-events-none');
                expandedView.classList.add('opacity-100');
                inputDestination.focus();
                activateTab(document.querySelector('[data-section="destination"]'));
            }, 100);
            searchActionBtn.style.width = '90px';
            searchActionBtn.style.height = '48px';
            searchActionBtn.classList.remove('right-2');
            searchActionBtn.classList.add('right-3');
            setTimeout(() => {
                searchBtnLabel.classList.remove('hidden');
                searchBtnLabel.classList.add('opacity-100');
            }, 150);
            bgOverlay.classList.remove('opacity-0', 'pointer-events-none');
            bgOverlay.classList.add('opacity-100');
        }

        searchSections.forEach(section => {
            section.addEventListener('click', (e) => {
                e.stopPropagation();
                activateTab(section);
            });
        });

        function activateTab(targetSection) {
            searchSections.forEach(sec => {
                sec.classList.remove('bg-white', 'shadow-[0_6px_20px_rgba(0,0,0,0.06)]', 'z-30');
                const divider = sec.querySelector('.section-divider');
                if (divider) divider.classList.remove('opacity-0');
            });
            targetSection.classList.add('bg-white', 'shadow-[0_6px_20px_rgba(0,0,0,0.06)]', 'z-30');
            const currentDivider = targetSection.querySelector('.section-divider');
            if (currentDivider) currentDivider.classList.add('opacity-0');
            const prevSection = targetSection.previousElementSibling;
            if (prevSection) {
                const prevDivider = prevSection.querySelector('.section-divider');
                if (prevDivider) prevDivider.classList.add('opacity-0');
            }
            switchDropdownContent(targetSection.getAttribute('data-section'));
        }

        function switchDropdownContent(sectionType) {
            document.getElementById('panel-destination').classList.add('hidden');
            document.getElementById('panel-dates').classList.add('hidden');
            document.getElementById('panel-guests').classList.add('hidden');
            if (sectionType === 'destination') {
                document.getElementById('panel-destination').classList.remove('hidden');
            } else if (sectionType === 'checkin' || sectionType === 'checkout') {
                document.getElementById('panel-dates').classList.remove('hidden');
            } else if (sectionType === 'guests') {
                document.getElementById('panel-guests').classList.remove('hidden');
            }
            searchDropdownBox.classList.remove('opacity-0', 'scale-95', 'pointer-events-none');
            searchDropdownBox.classList.add('opacity-100', 'scale-100');
        }

        document.addEventListener('click', (e) => {
            if (!isExpanded) return;
            if (!searchBar.contains(e.target) && !searchDropdownBox.contains(e.target)) {
                collapseMenu();
            }
        });

        function collapseMenu() {
            isExpanded = false;
            searchBtnLabel.classList.remove('opacity-100');
            searchBtnLabel.classList.add('opacity-0');
            setTimeout(() => { searchBtnLabel.classList.add('hidden'); }, 100);
            searchActionBtn.style.width = '32px';
            searchActionBtn.style.height = '32px';
            searchActionBtn.classList.remove('right-3');
            searchActionBtn.classList.add('right-2');
            searchDropdownBox.classList.add('opacity-0', 'scale-95', 'pointer-events-none');
            searchDropdownBox.classList.remove('opacity-100', 'scale-100');
            bgOverlay.classList.add('opacity-0', 'pointer-events-none');
            bgOverlay.classList.remove('opacity-100');
            expandedView.classList.add('opacity-0', 'pointer-events-none');
            expandedView.classList.remove('opacity-100');
            searchBar.classList.remove('w-[850px]', 'h-[66px]', 'border-gray-200/40');
            searchBar.classList.add('w-[440px]', 'h-[48px]');
            mainHeader.classList.remove('pb-8');
            searchSections.forEach(sec => {
                sec.classList.remove('bg-white', 'shadow-[0_6px_20px_rgba(0,0,0,0.06)]', 'z-30');
                const divider = sec.querySelector('.section-divider');
                if (divider) divider.classList.remove('opacity-0');
            });
            setTimeout(() => {
                collapsedView.classList.remove('opacity-0', 'pointer-events-none');
                collapsedView.classList.add('opacity-100');
            }, 150);
        }
    </script>
</div>

