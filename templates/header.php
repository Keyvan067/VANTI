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
                    <span class="text-base-content font-bold truncate">دسته بندی کالاها</span>
                    <span class="search-divider w-[1px] h-3 bg-gray-200 shrink-0"></span>
                    <span class="text-gray-500 font-medium truncate">شگفت انگیز ها</span>
                    <span class="search-divider w-[1px] h-3 bg-gray-200 shrink-0"></span>
                    <span class="truncate text-gray-500 font-medium">جستوجو</span>
                </div>
            </div>
            <div id="expanded-view"
                 class="absolute inset-0 w-full h-full bg-base-200 rounded-full flex items-center opacity-0 pointer-events-none airbnb-timing pr-4 pl-40">

                <div id="active-tab-indicator"
                     class="absolute border-x border-accent bg-white rounded-full shadow-[0_6px_20px_rgba(0,0,0,0.06)] drop-shadow-2xl drop-shadow-accent/40 z-10 pointer-events-none"
                     style="height: calc(100% - 8px); top: 4px; left: 0; width: 0; opacity: 0;filter: drop-shadow(0 0 20px rgb(227, 227, 227));">
                </div>

                <div data-section="main-category"
                     class="search-section text-center flex-auto h-full rounded-full flex flex-col justify-center pl-6 pr-6 relative airbnb-timing">
                    <div class="relative z-20 pointer-events-none">
                        <span class="block text-[10px] text-nowrap tracking-wide text-base-content select-none">دنبال چی میگردی؟</span>
                    </div>
                    <div class="section-divider !z-[5] absolute right-0 top-1/4 bottom-1/4 w-[1px] bg-base-300 airbnb-timing"></div>
                </div>

                <div data-section="checkin-amazing"
                     class="search-section text-center flex-auto h-full rounded-full flex flex-col justify-center pl-6 pr-6 relative airbnb-timing">
                    <div class="relative z-20 pointer-events-none">
                        <span class="block text-[10px] text-nowrap tracking-wide text-base-content select-none">دنبال چی میگردی؟</span>
                    </div>
                    <div class="section-divider !z-[5] absolute right-0 top-1/4 bottom-1/4 w-[1px] bg-base-300 airbnb-timing"></div>
                </div>

                <div data-section="top-searching"
                     class="search-section text-center flex-auto h-full rounded-full flex flex-col justify-center pl-6 pr-6 relative airbnb-timing">
                    <div class="relative z-20 pointer-events-none">
                        <span class="block text-[10px] text-nowrap tracking-wide text-base-content select-none">دنبال چی میگردی؟</span>
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

        <div id="search-dropdown-box"
             class="absolute left-1/2 -translate-x-1/2 top-20 w-full max-w-xl bg-white border border-accent/50 rounded-[32px] p-6 shadow-[0_24px_48px_rgba(0,0,0,0.1)] opacity-0 scale-95 pointer-events-none z-50 overflow-hidden transition-all duration-200">
            <div id="panel-main-category" class="hidden">
                <h4 class="text-xs font-black text-gray-900 mb-4">Search by region</h4>
                <div class="grid grid-cols-3 gap-4">
                    <div class="border border-accent p-4 rounded-2xl hover:border-black airbnb-timing text-center text-xs font-bold cursor-pointer bg-base-200">
                        I'm flexible
                    </div>
                    <div class="border border-accent p-4 rounded-2xl hover:border-black airbnb-timing text-center text-xs font-bold cursor-pointer bg-base-200">
                        Europe
                    </div>
                    <div class="border border-accent p-4 rounded-2xl hover:border-black airbnb-timing text-center text-xs font-bold cursor-pointer bg-base-200">
                        Middle East
                    </div>
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
                        <button class="w-8 h-8 rounded-full border border-accent flex items-center justify-center text-gray-600 hover:border-black text-lg font-light">
                            -
                        </button>
                        <span class="text-xs font-bold text-base-content w-4 text-center">0</span>
                        <button class="w-8 h-8 rounded-full border border-accent flex items-center justify-center text-gray-600 hover:border-black text-lg font-light">
                            +
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>


<script>
    document.addEventListener("DOMContentLoaded", function () {
        gsap.registerPlugin(ScrollTrigger);
        const airbnbEase = "cubic-bezier(0.2, 0, 0, 1)";
        const elasticTabEase = "back.out(1.4)";
        const elasticMorph = "back.out(1.2)";

        const searchBar = document.getElementById('search-bar');
        const collapsedView = document.getElementById('collapsed-view');
        const expandedView = document.getElementById('expanded-view');
        const searchActionBtn = document.getElementById('search-action-btn');
        const searchBtnLabel = document.getElementById('search-btn-label');
        const bgOverlay = document.getElementById('bg-overlay');
        const mainHeader = document.getElementById('main-header');
        const searchDropdownBox = document.getElementById('search-dropdown-box');
        const searchSections = document.querySelectorAll('.search-section');
        const activeTabIndicator = document.getElementById('active-tab-indicator');

        let isExpanded = false;
        let activeTimeline = null;

        // تابع محاسبه پوزیشن به سبک استاندارد Airbnb (اندیکاتور خارج از تب‌ها باقی می‌ماند)
        function moveActiveIndicator(targetSection, animate = true) {
            if (!targetSection || !activeTabIndicator) return;

            // ۱. پیدا کردن مختصات دقیق تب نسبت به والد اصلی
            const targetLeft = targetSection.offsetLeft;
            const targetWidth = targetSection.offsetWidth;

            // ۲. اعمال لایه‌بندی پایدار به کل مجموعه
            gsap.set(activeTabIndicator, {
                position: 'absolute',
                top: '0',
                height: 'calc(100%)',
                zIndex: 10 // زیر لایه تب‌ها (که z-index: 2 دارند) قرار می‌گیرد
            });

            if (animate) {
                // ۳. انیمیشن سُر خوردن کپسول در سطح والد
                gsap.to(activeTabIndicator, {
                    duration: 0.45,
                    left: targetLeft - 15,
                    width: targetWidth + 30,
                    opacity: 1,
                    ease: elasticTabEase,
                    overwrite: "auto"
                });

                // ۴. افکت کشسانی جیوه‌ای براساس جهت حرکت (Airbnb-style)
                const currentLeft = activeTabIndicator.offsetLeft;
                const origin = targetLeft > currentLeft ? "left center" : "right center";

                gsap.fromTo(activeTabIndicator,
                    {scaleX: 1.12, transformOrigin: origin},
                    {duration: 0.45, scaleX: 1, ease: "power3.out", overwrite: "none"}
                );
            } else {
                // حالت لود اول بدون انیمیشن
                gsap.set(activeTabIndicator, {
                    left: targetLeft - 15,
                    width: targetWidth + 30,
                    opacity: 1
                });
            }
        }

        // ۱. انیمیشن باز شدن منو (اصلاح شده برای فیکس شدن لود اولیه تب اول)
        function expandMenuWithGSAP() {
            if (isExpanded) return;
            isExpanded = true;

            if (activeTimeline) activeTimeline.kill();

            // استفاده از callback برای محاسبه پوزیشن دقیقاً پس از اتمام انیمیشن تغییر عرض نوار
            const tl = gsap.timeline({
                onComplete: () => {
                    const firstTab = document.querySelector('[data-section="main-category"]');
                    if (firstTab) {
                        // ۱. اضافه کردن کلاس اکتیو به تب اول در اولین کلیک
                        firstTab.classList.add('is-active');

                        // ۲. اجرای انیمیشن استایل‌های تب اول
                        activateTabWithGSAP(firstTab);
                    }
                }
            });
            activeTimeline = tl;

            gsap.set(expandedView, {display: 'flex'});

            tl.to(searchBar, {
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
                .fromTo(expandedView,
                    {opacity: 0, scale: 0.95},
                    {duration: 0.25, opacity: 1, scale: 1, pointerEvents: "auto", ease: airbnbEase},
                    0.08
                )
                .to(searchActionBtn, {
                    duration: 0.35,
                    width: "95px",
                    height: "48px",
                    left: "12px",
                    ease: elasticTabEase
                }, 0.05)
                .to(searchBtnLabel, {
                    duration: 0.2,
                    opacity: 1,
                    display: "inline-block",
                    ease: "power2.out"
                }, 0.15)
                .to(bgOverlay, {duration: 0.35, opacity: 1, pointerEvents: "auto", ease: "power2.out"}, 0);

            updateDividersVisibility();
        }

        // ۲. انیمیشن بسته شدن منو
        function collapseMenuWithGSAP() {
            if (!isExpanded) return;

            if (activeTimeline) activeTimeline.kill();
            const tl = gsap.timeline();
            activeTimeline = tl;

            tl.to(searchBtnLabel, {duration: 0.1, opacity: 0, display: 'none', ease: "power2.in"}, 0)
                .to(searchActionBtn, {
                    duration: 0.25,
                    width: "32px",
                    display: 'flex',
                    height: "32px",
                    left: "8px",
                    ease: airbnbEase
                }, 0)
                .to(searchDropdownBox, {
                    duration: 0.2,
                    opacity: 0,
                    scale: 0.95,
                    pointerEvents: "none",
                    ease: "power2.in"
                }, 0)
                .to(expandedView, {
                    duration: 0.15,
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
                .fromTo(collapsedView,
                    {opacity: 0, scale: 0.95, display: 'flex'},
                    {duration: 0.2, opacity: 1, scale: 1, pointerEvents: "auto", ease: airbnbEase},
                    0.15
                )
                .to(bgOverlay, {duration: 0.25, opacity: 0, pointerEvents: "none", ease: "power2.out"}, 0);

            gsap.to(activeTabIndicator, {duration: 0.2, opacity: 0, width: 0});

            searchSections.forEach(sec => {
                const divider = sec.querySelector('.section-divider');
                if (divider) divider.style.opacity = '1';
            });

            tl.call(() => {
                isExpanded = false;
                gsap.set(expandedView, {display: 'none'});
            });
        }

        // ۳. تغییر سایز داینامیک باکس پایینی
        function activateTabDropdownBox(targetSection) {
            searchSections.forEach(sec => {
                const divider = sec.querySelector('.section-divider');
                if (divider) divider.style.opacity = '1';
            });

            const currentDivider = targetSection.querySelector('.section-divider');
            if (currentDivider) currentDivider.style.opacity = '0';

            const prevSection = targetSection.previousElementSibling;
            if (prevSection) {
                const prevDivider = prevSection.querySelector('.section-divider');
                if (prevDivider) prevDivider.style.opacity = '0';
            }

            const sectionType = targetSection.getAttribute('data-section');
            let targetPanel = null;

            if (sectionType === 'main-category') targetPanel = document.getElementById('panel-main-category');
            else if (sectionType === 'checkin-amazing' || sectionType === 'top-searching') targetPanel = document.getElementById('panel-dates');
            else if (sectionType === 'guests2') targetPanel = document.getElementById('panel-guests');

            if (!targetPanel) return;

            const allPanels = [
                document.getElementById('panel-main-category'),
                document.getElementById('panel-dates'),
                document.getElementById('panel-guests')
            ];

            const currentPanel = allPanels.find(p => p && !p.classList.contains('hidden') && p !== targetPanel);

            if (currentPanel) {
                targetPanel.classList.remove('hidden');
                gsap.set(targetPanel, {
                    position: 'absolute',
                    visibility: 'hidden',
                    width: '100%',
                    height: 'auto',
                    left: 0,
                    top: 0
                });

                const targetWidth = targetPanel.scrollWidth || 500;
                const targetHeight = targetPanel.scrollHeight || 300;

                gsap.set(targetPanel, {visibility: 'visible', opacity: 0});

                gsap.to(searchDropdownBox, {
                    duration: 0.45,
                    width: targetWidth,
                    // height: targetHeight,
                    height: "fit-content",
                    ease: elasticMorph,
                    overwrite: "auto"
                });

                gsap.to(currentPanel, {
                    duration: 0.18,
                    opacity: 0,
                    x: sectionType === 'main-category' ? 20 : -20,
                    ease: "power2.in",
                    onComplete: () => {
                        currentPanel.classList.add('hidden');
                        gsap.set(currentPanel, {x: 0});
                    }
                });

                gsap.fromTo(targetPanel,
                    {opacity: 0, x: sectionType === 'main-category' ? -20 : 20},
                    {
                        duration: 0.35,
                        opacity: 1,
                        x: 0,
                        ease: "power2.out",
                        delay: 0.08,
                        onComplete: () => {
                            gsap.set(targetPanel, {
                                position: 'relative',
                                top: 'auto',
                                left: 'auto',
                                width: '100%',
                                height: 'auto'
                            });
                        }
                    }
                );
            } else {
                allPanels.forEach(p => {
                    if (p) p.classList.add('hidden');
                });
                targetPanel.classList.remove('hidden');
                gsap.set(targetPanel, {position: 'relative', opacity: 1, x: 0});

                const targetWidth = targetPanel.scrollWidth || 500;
                const targetHeight = targetPanel.scrollHeight || 300;

                gsap.fromTo(searchDropdownBox,
                    {opacity: 0, scale: 0.92, y: -15, width: targetWidth, height: "fit-content"},
                    {
                        duration: 0.4,
                        opacity: 1,
                        scale: 1,
                        y: 0,
                        width: targetWidth,
                        // height: targetHeight,
                        height: "fit-content",
                        pointerEvents: "auto",
                        ease: elasticMorph
                    }
                );
            }
        }

        // ۴. مدیریت اسکرول هدر
        if (mainHeader) {
            ScrollTrigger.create({
                trigger: document.body,
                start: "top top",
                end: "bottom top",
                onUpdate: (self) => {
                    if (self.progress > 0.01) {
                        gsap.to(mainHeader, {
                            duration: 0.2,
                            boxShadow: "0 4px 12px rgba(0,0,0,0.05), 0 1px 0px rgba(0,0,0,0.05)",
                            ease: "power1.out"
                        });
                    } else {
                        gsap.to(mainHeader, {
                            duration: 0.2,
                            boxShadow: "0 1px 0px rgba(0,0,0,0.05)",
                            ease: "power1.out"
                        });
                    }
                }
            });
        }

        // ۵. ایونت لیسنرها
        if (searchBar) {
            searchBar.addEventListener('click', (e) => {
                if (isExpanded) return;
                e.stopPropagation();
                expandMenuWithGSAP();
            });
        }

        document.addEventListener('click', (e) => {
            if (!isExpanded) return;
            if (!searchBar.contains(e.target) && !searchDropdownBox.contains(e.target)) {
                collapseMenuWithGSAP();
            }
        });

// ۵. مدیریت کلیک، هاور و خطوط جداکننده تب‌ها به سبک Airbnb
        searchSections.forEach(section => {

            // الف) رویداد کلیک (افزودن کلاس وضعیت فعال)
            section.addEventListener('click', (e) => {
                e.stopPropagation();
                if (isExpanded) {
                    // حذف کلاس active از تمام تب‌ها
                    searchSections.forEach(s => s.classList.remove('is-active'));
                    // اضافه کردن کلاس active به تب کلیک شده
                    section.classList.add('is-active');

                    moveActiveIndicator(section, true);
                    activateTabDropdownBox(section);
                    updateDividersVisibility(); // بروزرسانی جداکننده‌ها
                }
            });

            // ب) رویداد ورود ماوس (Hover In)
            section.addEventListener('mouseenter', () => {
                if (!isExpanded || section.classList.contains('is-active')) return;

                // محو کردن جداکننده خود تب
                const currentDivider = section.querySelector('.section-divider');
                if (currentDivider) currentDivider.style.opacity = '0';

                // محو کردن جداکننده تب قبلی
                const prevSection = section.previousElementSibling;
                if (prevSection) {
                    const prevDivider = prevSection.querySelector('.section-divider');
                    if (prevDivider) prevDivider.style.opacity = '0';
                }
            });

            // ج) رویداد خروج ماوس (Hover Out)
            section.addEventListener('mouseleave', () => {
                if (!isExpanded) return;
                // بازگرداندن وضعیت جداکننده‌ها به حالت استاندارد براساس تب فعال
                updateDividersVisibility();
            });

        });

// تابع مرکزی برای مدیریت پنهان/آشکار شدن خطوط جداکننده اطراف تب فعال و هاور شده
        function updateDividersVisibility() {
            searchSections.forEach(sec => {
                const divider = sec.querySelector('.section-divider');
                if (!divider) return;
                // پیش‌فرض: همه جداکننده‌ها روشن باشند
                divider.style.opacity = '1';
                // اگر خود تب یا تب بعدی آن فعال (Active) باشد، جداکننده باید محو شود
                const nextSec = sec.nextElementSibling;
                if (sec.classList.contains('is-active') || (nextSec && nextSec.classList.contains('is-active'))) {
                    divider.style.opacity = '0';
                }
            });
        }

        gsap.from(searchBar, {duration: 0.4, y: -15, opacity: 0, ease: airbnbEase, delay: 0.2});
    });
</script>
</body>
</html>