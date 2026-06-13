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

<body <?php body_class('bg-background text-foreground selection:bg-primary selection:text-white'); ?>>
<?php wp_body_open(); ?>
<div id="bg-overlay" class="fixed inset-0 bg-black/25 opacity-0 pointer-events-none airbnb-timing z-40"></div>

<header class="bg-base-100 border-b border-accent sticky top-0 w-full z-50 pt-4 pb-4 airbnb-timing" id="main-header">
    <div id="searchBarWarper" class="max-w-7xl origin-center mx-auto px-6 relative flex flex-col items-center">
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
             class="absolute left-auto right-8 !-translate-x-1/2 min-h-40 h-[calc(100% - 180px)] top-20 w-full max-w-xl bg-white border border-accent/50 rounded-[32px] p-6 shadow-[0_24px_48px_rgba(0,0,0,0.1)] opacity-0 scale-95 pointer-events-none z-50 overflow-hidden transition-all duration-200">
            <div id="p_1" class="hidden">
                <h4 class="text-lg font-normal text-gray-900 mb-4">دسته‌بندی کالاها</h4>
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
                            <input type="search" class="grow" placeholder="Search" />
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
</header>


<script>
    document.addEventListener("DOMContentLoaded", () => {
        gsap.registerPlugin(ScrollTrigger);

        // کانسپت‌ها و انیمیشن‌های پیش‌فرض
        const airbnbEase = "cubic-bezier(0.2, 0, 0, 1)",
            elasticTabEase = "back.out(1.4)",
            elasticMorph = "cubic-bezier(0.2, 0.8, 0.2, 1)"; // افکت مۆرفینگ بسیار روان نزدیک به Airbnb

        const [searchBar, collapsedView, expandedView, searchActionBtn, searchBtnLabel, bgOverlay, mainHeader, searchDropdownBox, activeTabIndicator] =
            ['search-bar', 'collapsed-view', 'expanded-view', 'search-action-btn', 'search-btn-label', 'bg-overlay', 'main-header', 'search-dropdown-box', 'active-tab-indicator'].map(id => document.getElementById(id));
        const searchSections = document.querySelectorAll('.search-section');

        // ۱. نگاشت دقیق پنل‌ها به آی‌دی‌ها بر اساس مارک‌آپ شما
        const PANEL_MAP = {
            'p_1': 'p_1',
            'p_2': 'p_2',
            'p_3': 'p_3'
        };
        const ALL_PANELS = ['p_1', 'p_2', 'p_3'].map(id => document.getElementById(id));

        // ۲. کنترل پایداری ابعاد دقیق پنل‌ها (میتوانید این اعداد را ترجیحاً تغییر دهید)
        const PANEL_WIDTHS = {
            'p_1': 480, // عرض پنل دسته‌بندی کالاها
            'p_2': 600, // عرض پنل شگفت‌انگیزها
            'p_3': 450  // عرض پنل جستجوهای اخیر
        };

        let isExpanded = false, activeTimeline = null;

        // مدیریت اندیکاتور متحرک (کپسول سفید پشت تب‌ها)
        function moveActiveIndicator(target, animate = true) {
            if (!target || !activeTabIndicator) return;
            const {offsetLeft: left, offsetWidth: width} = target;

            gsap.set(activeTabIndicator, {position: 'absolute', top: '0', height: '100%', zIndex: 10});
            const animProps = {left: left - 15, width: width + 30, opacity: 1, ease: elasticTabEase, overwrite: "auto"};

            if (animate) {
                gsap.to(activeTabIndicator, {duration: 0.45, ...animProps});
                const origin = left > activeTabIndicator.offsetLeft ? "left center" : "right center";
                gsap.fromTo(activeTabIndicator, {scaleX: 1.12, transformOrigin: origin}, {
                    duration: 0.45,
                    scaleX: 1,
                    ease: "power3.out",
                    overwrite: "none"
                });
            } else {
                gsap.set(activeTabIndicator, animProps);
            }
        }

        // محاسبۀ فوق‌هوشمند موقعیت راست (Right) دراپ‌داون باکس بر اساس هندسه RTL کادر سرچ
        function calculateDropdownRight(targetSection, targetWidth) {
            const sectionType = targetSection.getAttribute('data-section');
            const barWidth = searchBar.offsetWidth;

            // محاسبه موقعیت لبه سمت راست تب نسبت به کادر سرچ در حالت RTL
            const sectionLeft = targetSection.offsetLeft;
            const sectionWidth = targetSection.offsetWidth;
            const sectionRight = barWidth - (sectionLeft + sectionWidth);

            if (sectionType === 'p_1') {
                // تب اول (راست‌ترین تب): پنل دقیقاً زیر تب چسبیده به سمت راست کادر (با تراز ۱۶ پیکسل فاصله مچ)
                return Math.max(16, sectionRight + 16);
            } else if (sectionType === 'p_3') {
                // تب آخر (چپ‌ترین تب نزدیک دکمه سرچ): پنل نباید از سمت چپ کادر بیرون بزند
                // کل عرض منهای عرض پنل منهای فاصله ایمنی دکمه اکشن سرچ
                return barWidth - targetWidth + 45;
            } else {
                // تب میانی (p_2): کاملاً متمرکز زیر تب خودش همراستا با مرکز ثقل تب
                const centerRight = sectionRight + (sectionWidth / 2) - (targetWidth / 2);
                // لیمیت کردن مرزها برای عدم خروج از باکس اصلی سرچ
                return Math.max(16, Math.min(centerRight, barWidth - targetWidth - 16));
            }
        }

        // انیمیشن باز شدن منو اصلی
        function expandMenuWithGSAP() {
            if (isExpanded) return;
            isExpanded = true;
            activeTimeline?.kill();
            gsap.set(expandedView, {display: 'flex'});

            activeTimeline = gsap.timeline({
                onComplete: () => {
                    const firstTab = document.querySelector('[data-section="p_1"]');
                    if (!firstTab) return;
                    firstTab.classList.add('is-active');
                    moveActiveIndicator(firstTab, false);
                    activateTabDropdownBox(firstTab);
                    updateDividersVisibility();
                }
            });

            activeTimeline.to(searchBar, {
                duration: 0.38,
                width: "740px",
                height: "66px",
                borderColor: "rgba(0,0,0,0.06)",
                backgroundColor: "#f7f7f7",
                boxShadow: "0 6px 20px rgba(0,0,0,0.08)",
                ease: airbnbEase
            }, 0)
                .to(mainHeader, {duration: 0.38, paddingBottom: "24px", ease: airbnbEase}, 0)
                .to(collapsedView, {
                    duration: 0.15,
                    opacity: 0,
                    scale: 0.95,
                    pointerEvents: "none",
                    ease: "power2.out"
                }, 0)
                .fromTo(expandedView, {opacity: 0, scale: 0.95}, {
                    duration: 0.25,
                    opacity: 1,
                    scale: 1,
                    pointerEvents: "auto",
                    ease: airbnbEase
                }, 0.08)
                .to(searchActionBtn, {
                    duration: 0.35,
                    width: "95px",
                    height: "48px",
                    left: "12px",
                    ease: elasticTabEase
                }, 0.05)
                .to(searchBtnLabel, {duration: 0.2, opacity: 1, display: "inline-block", ease: "power2.out"}, 0.15)
                .to(bgOverlay, {duration: 0.35, opacity: 1, pointerEvents: "auto", ease: "power2.out"}, 0);
        }

        // انیمیشن بسته شدن منو اصلی
        function collapseMenuWithGSAP() {
            if (!isExpanded) return;
            activeTimeline?.kill();
            activeTimeline = gsap.timeline();

            activeTimeline.to(searchBtnLabel, {duration: 0.1, opacity: 0, display: 'none', ease: "power2.in"}, 0)
                .to(searchActionBtn, {
                    duration: 0.25,
                    width: "32px",
                    display: 'flex',
                    height: "32px",
                    left: "8px",
                    ease: airbnbEase
                }, 0)
                .to([searchDropdownBox, expandedView], {
                    duration: 0.2,
                    opacity: 0,
                    scale: 0.95,
                    pointerEvents: "none",
                    ease: "power2.in"
                }, 0)
                .to(searchBar, {
                    duration: 0.35,
                    width: "448px",
                    height: "48px",
                    borderColor: "rgba(0,0,0,0.1)",
                    backgroundColor: "#ffffff",
                    boxShadow: "0 1px 2px rgba(0,0,0,0.08), 0 4px 12px rgba(0,0,0,0.05)",
                    ease: airbnbEase
                }, 0.05)
                .to(mainHeader, {duration: 0.35, paddingBottom: "16px", ease: airbnbEase}, 0.05)
                .fromTo(collapsedView, {opacity: 0, scale: 0.95, display: 'flex'}, {
                    duration: 0.2,
                    opacity: 1,
                    scale: 1,
                    pointerEvents: "auto",
                    ease: airbnbEase
                }, 0.15)
                .to(bgOverlay, {duration: 0.25, opacity: 0, pointerEvents: "none", ease: "power2.out"}, 0)
                .call(() => {
                    isExpanded = false;
                    gsap.set(expandedView, {display: 'none'});
                });

            gsap.to(activeTabIndicator, {duration: 0.2, opacity: 0, width: 0});
            searchSections.forEach(sec => sec.querySelector('.section-divider') && (sec.querySelector('.section-divider').style.opacity = '1'));
        }

        // تغییر ابعاد و موقعیت افقی دراپ‌داون باکس به صورت داینامیک و مۆرفینگ (مشابه Airbnb)
        function activateTabDropdownBox(targetSection) {
            const sectionType = targetSection.getAttribute('data-section');
            const panelId = PANEL_MAP[sectionType];
            const targetPanel = document.getElementById(panelId);
            if (!targetPanel) return;

            const targetWidth = PANEL_WIDTHS[panelId] || 500;
            const targetRight = calculateDropdownRight(targetSection, targetWidth); // خروجی متناسب راست‌چین

            const currentPanel = ALL_PANELS.find(p => p && !p.classList.contains('hidden') && p !== targetPanel);
            const isDropdownVisible = gsap.getProperty(searchDropdownBox, "opacity") > 0;
            const wasHidden = targetPanel.classList.contains('hidden');

            // حذف تداخل‌های پوزیشن لفت قدیمی و ست کردن ترانسفورم مرجع از راست بالا
            gsap.set(searchDropdownBox, {left: 'auto', transformOrigin: "top right"});

            if (currentPanel) {
                // سناریو ۱: جابجایی بین دو پنل مجزا (تغییر موقعیت و ابعاد هم‌زمان به سبک جیوه‌ای)
                targetPanel.classList.remove('hidden');
                gsap.set(targetPanel, {position: 'absolute', opacity: 0, width: '100%', right: 0, top: 0});

                gsap.to(searchDropdownBox, {
                    duration: 0.45,
                    right: targetRight,
                    width: targetWidth,
                    height: "fit-content",
                    ease: elasticMorph,
                    overwrite: "auto"
                });

                gsap.to(currentPanel, {
                    duration: 0.18, opacity: 0,
                    x: sectionType === 'p_1' ? -20 : 20, // هماهنگ با فلو راست به چپ
                    ease: "power2.in",
                    onComplete: () => {
                        currentPanel.classList.add('hidden');
                        gsap.set(currentPanel, {x: 0});
                    }
                });

                gsap.fromTo(targetPanel,
                    {opacity: 0, x: sectionType === 'p_1' ? 20 : -20},
                    {
                        duration: 0.35,
                        opacity: 1,
                        x: 0,
                        ease: "power2.out",
                        delay: 0.08,
                        onComplete: () => gsap.set(targetPanel, {
                            position: 'relative',
                            top: 'auto',
                            right: 'auto',
                            width: '100%',
                            height: 'auto'
                        })
                    }
                );
            } else if (!wasHidden && isDropdownVisible) {
                // سناریو ۲: جابجایی بین تب‌های میانی بدون تغییر ناگهانی لایه محتوا
                gsap.to(searchDropdownBox, {
                    duration: 0.45,
                    right: targetRight,
                    width: targetWidth,
                    height: "fit-content",
                    ease: elasticMorph,
                    overwrite: "auto"
                });
            } else {
                // سناریو ۳: اولین کلیک و باز شدن اورجینال کل دراپ‌داون باکس از حالت غایب
                ALL_PANELS.forEach(p => p?.classList.add('hidden'));
                targetPanel.classList.remove('hidden');
                gsap.set(targetPanel, {position: 'relative', opacity: 1, x: 0});

                gsap.fromTo(searchDropdownBox,
                    {opacity: 0, scale: 0.94, y: -10, right: targetRight, width: targetWidth, height: "fit-content"},
                    {
                        duration: 0.4,
                        opacity: 1,
                        scale: 1,
                        y: 0,
                        right: targetRight,
                        width: targetWidth,
                        height: "fit-content",
                        pointerEvents: "auto",
                        ease: elasticMorph
                    }
                );
            }
        }

        // مدیریت اسکرول هدر
        if (mainHeader) {
            ScrollTrigger.create({
                trigger: document.body, start: "top top", end: "bottom top",
                onUpdate: self => gsap.to(mainHeader, {
                    duration: 0.2,
                    boxShadow: self.progress > 0.01 ? "0 4px 12px rgba(0,0,0,0.05), 0 1px 0px rgba(0,0,0,0.05)" : "0 1px 0px rgba(0,0,0,0.05)",
                    ease: "power1.out"
                })
            });
        }

        // تخصیص رویدادها (Event Listeners)
        searchBar?.addEventListener('click', e => {
            if (!isExpanded) {
                e.stopPropagation();
                expandMenuWithGSAP();
            }
        });
        document.addEventListener('click', e => {
            if (isExpanded && !searchBar.contains(e.target) && !searchDropdownBox.contains(e.target)) collapseMenuWithGSAP();
        });

        searchSections.forEach(section => {
            section.addEventListener('click', e => {
                e.stopPropagation();
                if (!isExpanded) return;
                searchSections.forEach(s => s.classList.remove('is-active'));
                section.classList.add('is-active');

                moveActiveIndicator(section, true);
                activateTabDropdownBox(section);
                updateDividersVisibility();
            });

            section.addEventListener('mouseenter', () => {
                if (!isExpanded || section.classList.contains('is-active')) return;
                section.querySelector('.section-divider')?.style.setProperty('opacity', '0');
                section.previousElementSibling?.querySelector('.section-divider')?.style.setProperty('opacity', '0');
            });

            section.addEventListener('mouseleave', () => isExpanded && updateDividersVisibility());
        });

        function updateDividersVisibility() {
            searchSections.forEach(sec => {
                const divider = sec.querySelector('.section-divider');
                if (!divider) return;
                const nextActive = sec.nextElementSibling?.classList.contains('is-active');
                divider.style.opacity = (sec.classList.contains('is-active') || nextActive) ? '0' : '1';
            });
        }

        gsap.from(searchBar, {duration: 0.4, y: -15, opacity: 0, ease: airbnbEase, delay: 0.2});
    });
</script>