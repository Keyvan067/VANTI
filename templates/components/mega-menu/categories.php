<?php

use VANTI\WooCommerce\MegaMenu;

$categoriesJson = MegaMenu::getCategoriesJson();

?>

<div
        x-data="megaMenu()"
        x-init="init()"
        class="relative"
>

    <!-- Trigger -->
    <button
            @click="open = !open"
            type="button"
            class="cursor-pointer"
    >
        دسته بندی کالاها
    </button>

    <!-- Panel -->
    <div
            x-show="open"
            @click.outside="open = false"
            class="w-full block"
    >

        <!-- HEADER (Breadcrumb + Back) -->
        <div class="breadcrumb flex items-center justify-between gap-2">
            <div class="text-xs text-accent">
                <!-- Breadcrumb -->
                <div class="text-xs text-gray-500 flex gap-1 flex-wrap items-center">
                    <template x-for="(item, index) in stack" :key="index">
                        <span class="flex items-center gap-1">
                            <button
                                    @click="goTo(index)"
                                    class="hover:text-primary text-text-base-content font-bold transition-colors text-[1.2em]"
                                    x-text="item.title"
                            ></button>
                            <span class="pt-[3px]">
                               <svg xmlns="http://www.w3.org/2000/svg" width="1.5em" height="auto"
                                    viewBox="0 0 24 24"><title xmlns="">left-line</title><g fill="none"
                                                                                            fill-rule="evenodd"><path
                                               d="M24 0v24H0V0zM12.593 23.258l-.011.002l-.071.035l-.02.004l-.014-.004l-.071-.035q-.016-.005-.024.005l-.004.01l-.017.428l.005.02l.01.013l.104.074l.015.004l.012-.004l.104-.074l.012-.016l.004-.017l-.017-.427q-.004-.016-.017-.018m.265-.113l-.013.002l-.185.093l-.01.01l-.003.011l.018.43l.005.012l.008.007l.201.093q.019.005.029-.008l.004-.014l-.034-.614q-.005-.019-.02-.022m-.715.002a.02.02 0 0 0-.027.006l-.006.014l-.034.614q.001.018.017.024l.015-.002l.201-.093l.01-.008l.004-.011l.017-.43l-.003-.012l-.01-.01z"/><path
                                               fill="currentColor"
                                               d="M8.293 12.707a1 1 0 0 1 0-1.414l5.657-5.657a1 1 0 1 1 1.414 1.414L10.414 12l4.95 4.95a1 1 0 0 1-1.414 1.414z"/></g></svg>
                            </span>
                        </span>
                    </template>
                    <span
                            class="font-bold text-black"
                            x-text="title"
                    ></span>
                </div>
            </div>
            <!-- Back Button -->
            <button
                    x-show="stack.length > 0"
                    @click="back()"
                    class="text-sm flex items-center justify-center size-8 p-1 border rounded-full border-accent/70"
            >
                <span>
                    <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24"><title
                                xmlns="">back-fill</title><g fill="none" fill-rule="evenodd"><path
                                    d="M24 0v24H0V0zM12.593 23.258l-.011.002l-.071.035l-.02.004l-.014-.004l-.071-.035q-.016-.005-.024.005l-.004.01l-.017.428l.005.02l.01.013l.104.074l.015.004l.012-.004l.104-.074l.012-.016l.004-.017l-.017-.427q-.004-.016-.017-.018m.265-.113l-.013.002l-.185.093l-.01.01l-.003.011l.018.43l.005.012l.008.007l.201.093q.019.005.029-.008l.004-.014l-.034-.614q-.005-.019-.02-.022m-.715.002a.02.02 0 0 0-.027.006l-.006.014l-.034.614q.001.018.017.024l.015-.002l.201-.093l.01-.008l.004-.011l.017-.43l-.003-.012l-.01-.01z"/><path
                                    fill="currentColor"
                                    d="M2.614 5.426A1.5 1.5 0 0 1 4 4.5h10a7.5 7.5 0 1 1 0 15H5a1.5 1.5 0 0 1 0-3h9a4.5 4.5 0 1 0 0-9H7.621l.94.94a1.5 1.5 0 0 1-2.122 2.12l-3.5-3.5a1.5 1.5 0 0 1-.325-1.634"/></g></svg>
                </span>
            </button>
        </div>

        <!-- LIST -->
        <div class="max-h-[420px] grid grid-cols-1 gap-4 overflow-y-auto">
            <template x-for="item in currentItems" :key="item.id">

                <button
                        @click="select(item)"
                        class="flex flex-row items-center gap-4 hover:bg-gray-50 rounded-xl p-2 transition"
                >
                    <!-- ICON --or>-- <img src="category-cover" alt="">-->
                    <span
                            class="w-14 h-14 rounded-xl bg-blue-50 p-1 text-xl text-sky-500 flex items-center justify-center font-bold"
                            x-text="item.name.substring(0,2)"
                    ></span>
                    <!-- TEXT -->
                    <div class="flex-1 items-start text-right gap-2 flex-col w-fit grow">
                        <div class="text-base font-bold text-base-content"
                             x-text="item.name">
                        </div>
                        <div class="text-xs text-accent"
                             x-text="item.description || ''">

                        </div>
                    </div>
                    <!-- ARROW -->
                    <span x-show="item.children && item.children.length > 0">
                        ›
                    </span>

                </button>

                <div class="flex-1 items-start gap-2 flex-col w-fit grow">
                    <div class="text-base font-bold text-base-content">کالای دیجیتال</div>
                    <span class="text-xs text-accent">کالاهای دیجیتال،وسایل گیمینگ، پاوربانک،...</span>
                </div>


            </template>
        </div>

    </div>
</div>

<!-- ALPINE -->
<script>
    function megaMenu() {
        return {

            open: false,

            title: 'دسته بندی کالاها',

            stack: [],

            currentItems: [],

            original: [],

            init() {
                const data = <?php echo $categoriesJson ?: '[]'; ?>;

                this.currentItems = data;
                this.original = data;
            },

            select(item) {

                if (!item.children || item.children.length === 0) {
                    window.location.href = item.url;
                    return;
                }

                this.stack.push({
                    title: this.title,
                    items: this.currentItems
                });

                this.currentItems = item.children;
                this.title = item.name;
            },

            back() {

                const prev = this.stack.pop();

                if (!prev) return;

                this.currentItems = prev.items;
                this.title = prev.title;
            },

            goTo(index) {

                this.stack = this.stack.slice(0, index);

                const last = this.stack[this.stack.length - 1];

                if (!last) {
                    this.currentItems = this.original;
                    this.title = 'دسته بندی کالاها';
                    return;
                }

                this.currentItems = last.items;
                this.title = last.title;
            }
        }
    }
</script>