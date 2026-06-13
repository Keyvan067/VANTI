<div id="searchBarWarper" class="max-w-6xl origin-center mx-auto px-6 relative flex flex-col items-center">
    <div id="search-bar"
         class="relative w-md h-[48px] select-none bg-white border border-accent/50 rounded-full shadow-sm hover:shadow-md cursor-pointer airbnb-timing flex items-center overflow-hidden">
        <div id="collapsed-view"
             class="w-full h-full flex items-center justify-between pl-14 pr-8 airbnb-timing opacity-100">
            <div class="flex items-center text-xs font-bold text-base-content w-full justify-start gap-4">
                <span class="text-base-content font-medium truncate">دسته بندی کالاها</span>
                <span class="search-divider w-[1px] h-3 bg-gray-200 shrink-0"></span>
                <span class="text-gray-500 font-medium truncate">شگفت انگیز ها</span>
                <span class="search-divider w-[1px] h-3 bg-gray-200 shrink-0"></span>
                <span class="truncate text-gray-500 font-medium">جستوجو</span>
            </div>
        </div>
        <div id="expanded-view"
             class="absolute inset-0 w-full h-full bg-base-200 rounded-full flex items-center opacity-0 pointer-events-none airbnb-timing pr-4 pl-4">

            <div id="active-tab-indicator"
                 class="absolute border-x border-accent bg-white rounded-full shadow-[0_6px_20px_rgba(0,0,0,0.06)] drop-shadow-2xl drop-shadow-accent/40 z-10 pointer-events-none"
                 style="height: calc(100% - 8px); top: 4px; left: 0; width: 0; opacity: 0;filter: drop-shadow(0 0 10px rgb(0, 0, 0,0.1));">
            </div>

            <div data-section="p_1"
                 class="search-section text-center flex-auto h-full rounded-full flex flex-col justify-center pl-6 pr-6 relative airbnb-timing">
                <div class="relative z-20 pointer-events-none">
                    <span class="block text-xs truncate text-base-content">دنبال چی میگردی؟</span>
                </div>
            </div>

            <div data-section="p_2"
                 class="search-section text-center flex-auto h-full rounded-full flex flex-col justify-center pl-6 pr-6 relative airbnb-timing">
                <div class="relative z-20 pointer-events-none">
                    <span class="block text-xs truncate text-base-content">جدیدترین شگفت‌انگیزها</span>
                </div>
                <div class="section-divider !z-[5] absolute right-0 top-1/4 bottom-1/4 w-[1px] bg-base-300 airbnb-timing"></div>
            </div>

            <div data-section="p_3"
                 class="search-section text-right flex-auto h-full rounded-full flex flex-col justify-center pl-6 pr-10 relative airbnb-timing">
                <div class="relative z-20 pointer-events-none">
                    <span class="block text-xs truncate text-base-content">جستوجوهای اخیر</span>
                </div>
                <div class="section-divider !z-[5] absolute right-0 top-1/4 bottom-1/4 w-[1px] bg-base-300 airbnb-timing"></div>
            </div>
        </div>
        <div id="search-action-btn"
             class="absolute left-2 top-1/2 -translate-y-1/2 bg-[#FF385C] text-white rounded-full flex items-center justify-center z-20 shadow-sm"
             style="width: 32px; height: 32px;">
            <div class="flex items-center justify-center gap-2 px-1">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="3"
                     stroke="currentColor"
                     class="w-4 h-4 shrink-0">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z"/>
                </svg>
                <span id="search-btn-label"
                      class="text-xs font-bold whitespace-nowrap hidden opacity-0">Search</span>
            </div>
        </div>
    </div>
    <!--Search-Modals...-->
    <div id="search-dropdown-box"
         class="absolute min-h-40 h-[calc(100% - 180px)] top-20 w-full max-w-xl bg-white border border-accent/50 rounded-[32px] p-6 shadow-[0_24px_48px_rgba(0,0,0,0.1)] opacity-0 scale-95 pointer-events-none z-50 overflow-hidden transition-all duration-200">
        <div id="p_1" class="hidden">
            <div class="breadcrumbs flex items-center gap-2">
                <ul class="text-xs text-accent">
                    <li class="text-lg font-bold text-base-content">دسته‌بندی کالاها</li>
                    <li><a>Documents</a></li>
                    <li>Add Document</li>
                </ul>
            </div>
            <div class="grid grid-cols-1 gap-4">
                <a href="#" class="flex flex-row items-center gap-4 hover:bg-gray-50 rounded-xl p-2">
                    <!-- <img src="category-cover" alt="">-->
                    <span class="w-14 h-14 rounded-xl bg-blue-50 p-1 text-xl text-sky-500 flex items-center justify-center font-bold">DJ</span>
                    <div class="flex-1 items-start gap-2 flex-col w-fit grow">
                        <div class="text-base font-bold text-base-content">کالای دیجیتال</div>
                        <span class="text-xs text-accent">کالاهای دیجیتال،وسایل گیمینگ، پاوربانک،...</span>
                    </div>
                </a>
                <a href="#" class="flex flex-row items-center gap-4 hover:bg-gray-50 rounded-xl p-2">
                    <!-- <img src="category-cover" alt="">-->
                    <span class="w-14 h-14 rounded-xl bg-yellow-50 p-1 text-xl text-yellow-500 flex items-center justify-center font-bold">MB</span>
                    <div class="flex-1 items-start gap-2 flex-col w-fit grow">
                        <div class="text-base font-bold text-base-content">موبایل</div>
                        <span class="text-xs text-accent">اپل، سامسونگ، ریلمی، شیائومی، هواوی،...</span>
                    </div>
                </a>
                <a href="#" class="flex flex-row items-center gap-4 hover:bg-gray-50 rounded-xl p-2">
                    <!-- <img src="category-cover" alt="">-->
                    <span class="w-14 h-14 rounded-xl bg-emerald-50 p-1 text-xl text-emerald-500 flex items-center justify-center font-bold">MB</span>
                    <div class="flex-1 items-start gap-2 flex-col w-fit grow">
                        <div class="text-base font-bold text-base-content">لپتاپ</div>
                        <span class="text-xs text-accent">مکبوک، سرفیس، ایسوس، شیائومی، لنوو، هواوی،...</span>
                    </div>
                </a>
            </div>
        </div>
        <div id="p_2" class="hidden">
            <h4 class="text-lg font-normal text-gray-900 mb-4"> تخفیف‌ها </h4>
            <div class="grid grid-cols-1 gap-4">
                <a href="#" class="flex flex-row items-center gap-4 hover:bg-gray-50 rounded-xl p-2">
                    <!-- <img src="category-cover" alt="">-->
                    <span class="w-16 h-16 rounded-xl bg-emerald-50 p-1 text-xl text-emerald-500 flex items-center justify-center font-bold">MB</span>
                    <div class="flex-1 items-start gap-2 flex-col w-fit grow">
                        <div class="text-base font-bold text-base-content">لپتاپ</div>
                        <span class="text-xs text-accent">مکبوک، سرفیس، ایسوس، شیائومی، لنوو، هواوی،...</span>
                    </div>
                </a>
                <a href="#" class="flex flex-row items-center gap-4 hover:bg-gray-50 rounded-xl p-2">
                    <!-- <img src="category-cover" alt="">-->
                    <span class="w-16 h-16 rounded-xl bg-orange-50 p-1 text-xl text-orange-500 flex items-center justify-center font-bold">MB</span>
                    <div class="flex-1 items-start gap-2 flex-col w-fit grow">
                        <div class="text-base font-bold text-base-content">موبایل سامسونگ s21 ultra 512GB</div>
                        <span class="text-xs text-accent">مکبوک، سرفیس، ایسوس، شیائومی، لنوو، هواوی،...</span>
                    </div>
                </a>
            </div>
        </div>
        <div id="p_3" class="hidden">
            <div class="w-full">
                <div class="w-full block mb-5">
                    <label class="input rounded-full w-full">
                        <svg class="h-[1em] opacity-50" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                            <g
                                    stroke-linejoin="round"
                                    stroke-linecap="round"
                                    stroke-width="2.5"
                                    fill="none"
                                    stroke="currentColor"
                            >
                                <circle cx="11" cy="11" r="8"></circle>
                                <path d="m21 21-4.3-4.3"></path>
                            </g>
                        </svg>
                        <input type="search" class="grow" placeholder="Search"/>
                        <kbd class="kbd kbd-sm">⌘</kbd>
                        <kbd class="kbd kbd-sm">K</kbd>
                    </label>
                </div>
                <ul>
                    <li>
                        <a href="#" class="flex flex-row items-center gap-4 hover:bg-gray-50 rounded-xl p-2">
                            <!-- <img src="category-cover" alt="">-->
                            <span class="w-16 h-16 rounded-xl bg-orange-50 p-1 text-xl text-orange-500 flex items-center justify-center font-bold">MB</span>
                            <div class="flex-1 items-start gap-2 flex-col w-fit grow">
                                <div class="text-base font-bold text-base-content">موبایل شیائومی</div>
                                <span class="text-xs text-accent"> دسته‌بندی موبایل / قاب موبایل </span>
                            </div>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>