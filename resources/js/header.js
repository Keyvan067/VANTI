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
                    duration: 0.1,
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