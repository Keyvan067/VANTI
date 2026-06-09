<?php
/**
 * Header template
 *
 * @package VANTI
 */

//echo '<script type="module" src="http://localhost:5173/resources/js/app.js"></script>';
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
        class="sticky top-0 z-50 w-full border-b border-border bg-background/65 backdrop-blur-xl transition-all duration-300"
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
                    class="flex items-center justify-between rounded-full border border-border bg-card/50 p-1.5 pl-2 pr-6 shadow-xs hover:shadow-md transition-all duration-300 cursor-pointer border-primary/10"
                    :class="searchFocused ? 'ring-2 ring-primary/20 border-primary shadow-md bg-card' : ''"
            >
                <div class="flex items-center gap-4 text-xs font-medium text-muted-foreground division-x division-border">
                    <span class="px-3">شگفت‌انگیزها</span>
                    <span class="px-3 border-border border-x border-zinc-400">دسته‌بندی‌ محصولات</span>
                    <span class="text-foreground font-bold">جستجو</span>
                </div>
                <div class="flex h-8 w-8 items-center justify-center rounded-full bg-primary text-white shadow-sm shadow-primary/20">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5"
                         stroke="currentColor" class="w-4 h-4">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.602 10.602Z"/>
                    </svg>
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

            <div class="relative">
                <button
                        @click="profileOpen = !profileOpen"
                        @click.away="profileOpen = false"
                        class="flex items-center gap-3 rounded-full border border-border bg-card/40 p-1.5 pl-3 hover:bg-card hover:shadow-sm transition-all duration-200"
                >
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                         stroke="currentColor" class="w-4 h-4 text-muted-foreground mr-1">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5"/>
                    </svg>
                    <div class="h-7 w-7 rounded-full bg-muted flex items-center justify-center text-muted-foreground overflow-hidden-- border border-border">
                        <?php if (is_user_logged_in()): ?>
                            <?php echo get_avatar(get_current_user_id(), 28, '', '', ['class' => 'rounded-full']); ?>
                        <?php else: ?>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                                 stroke="currentColor" class="w-4 h-4">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                      d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z"/>
                            </svg>
                        <?php endif; ?>
                    </div>
                </button>

                <div
                        x-show="profileOpen"
                        x-transition:enter="transition ease-out duration-100"
                        x-transition:enter-start="transform opacity-0 scale-95"
                        x-transition:enter-end="transform opacity-100 scale-100"
                        x-transition:leave="transition ease-in duration-75"
                        x-transition:leave-start="transform opacity-100 scale-100"
                        x-transition:leave-end="transform opacity-0 scale-95"
                        class="absolute left-0 mt-2 w-56 rounded-xl border border-border bg-popover p-2 text-popover-foreground shadow-xl ring-1 ring-black/5 z-50 focus:outline-hidden"
                        style="display: none;"
                >
                    <?php if (is_user_logged_in()): ?>
                        <div class="px-3 py-2 text-xs font-medium text-muted-foreground border-b border-border/60 mb-1">
                            حساب کاربری: <span class="font-bold text-foreground"><?php $user = wp_get_current_user();
                                echo esc_html($user->display_name); ?></span>
                        </div>
                        <a href="<?php echo esc_url(get_permalink(get_option('woocommerce_myaccount_page_id'))); ?>"
                           class="flex w-full items-center rounded-lg px-3 py-2 text-sm hover:bg-accent hover:text-accent-foreground transition-colors">داشبورد
                            من</a>
                        <a href="<?php echo esc_url(wc_get_account_endpoint_url('orders')); ?>"
                           class="flex w-full items-center rounded-lg px-3 py-2 text-sm hover:bg-accent hover:text-accent-foreground transition-colors">سفارشات
                            من</a>
                        <a href="<?php echo esc_url(wp_logout_url(home_url())); ?>"
                           class="flex w-full items-center rounded-lg px-3 py-2 text-sm text-destructive hover:bg-destructive/10 transition-colors border-t border-border/40 mt-1 pt-2">خروج</a>
                    <?php else: ?>
                        <a href="<?php echo esc_url(get_permalink(get_option('woocommerce_myaccount_page_id'))); ?>"
                           class="flex w-full items-center rounded-lg px-3 py-2 text-sm font-bold text-primary hover:bg-accent hover:text-primary transition-colors">ورود
                            / ثبت‌نام</a>
                        <div class="border-b border-border/60 my-1"></div>
                        <a href="#"
                           class="flex w-full items-center rounded-lg px-3 py-2 text-sm hover:bg-accent hover:text-accent-foreground transition-colors">راهنمای
                            خرید</a>
                    <?php endif; ?>
                </div>
            </div>

        </div>
    </div>

    <div
            x-show="cartOpen"
            class="relative z-50"
            style="display: none;"
            @keydown.window.escape="cartOpen = false"
    >
        <div
                x-show="cartOpen"
                x-transition:enter="ease-in-out duration-300"
                x-transition:enter-start="opacity-0"
                x-transition:enter-end="opacity-100"
                x-transition:leave="ease-in-out duration-300"
                x-transition:leave-start="opacity-100"
                x-transition:leave-end="opacity-0"
                class="fixed inset-0 bg-black/40 backdrop-blur-xs transition-opacity"
                @click="cartOpen = false"
        ></div>

        <div class="fixed inset-0 overflow-hidden--">
            <div class="absolute inset-0 overflow-hidden--">
                <div class="pointer-events-none fixed inset-y-0 left-0 flex max-w-full pr-10">
                    <div
                            x-show="cartOpen"
                            x-transition:enter="transform transition ease-in-out duration-300"
                            x-transition:enter-start="-translate-x-full"
                            x-transition:enter-end="translate-x-0"
                            x-transition:leave="transform transition ease-in-out duration-300"
                            x-transition:leave-start="translate-x-0"
                            x-transition:leave-end="-translate-x-full"
                            class="pointer-events-auto w-screen max-w-md border-r border-border bg-background text-foreground shadow-2xl"
                    >
                        <div class="flex h-full flex-col overflow-y-scroll py-6 px-6">
                            <div class="flex items-center justify-between border-b border-border pb-4">
                                <h2 class="text-lg font-black">سبد خرید شما</h2>
                                <button @click="cartOpen = false" class="text-muted-foreground hover:text-foreground">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                         stroke-width="2" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12"/>
                                    </svg>
                                </button>
                            </div>

                            <div class="flex-1 py-6 flex flex-col justify-center items-center text-center">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                     stroke-width="1.5" stroke="currentColor"
                                     class="w-12 h-12 text-muted-foreground mb-4">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                          d="M15.75 10.5V6a3.75 3.75 0 1 0-7.5 0v4.5m11.356-1.993 1.263 12c.07.665-.45 1.243-1.119 1.243H4.25a1.125 1.125 0 0 1-1.12-1.243l1.264-12A1.125 1.125 0 0 1 5.513 7.5h12.974c.576 0 1.059.435 1.119 1.007ZM8.625 10.5a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm7.5 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Z"/>
                                </svg>
                                <p class="text-sm text-muted-foreground">سبد خرید شما در حال حاضر خالی است.</p>
                            </div>

                            <div class="border-t border-border pt-4">
                                <a href="<?php echo esc_url(wc_get_checkout_url()); ?>"
                                   class="flex w-full items-center justify-center rounded-xl bg-primary px-6 py-3.5 text-sm font-bold text-white shadow-xs hover:bg-primary transition-colors">
                                    ورود به صفحه پرداخت
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
