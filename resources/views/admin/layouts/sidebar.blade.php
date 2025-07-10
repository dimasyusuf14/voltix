<aside class="w-80 bg-white shadow-md rounded-3xl ml-10 mt-10 overflow-hidden">
    <div class="sticky top-0 bg-white p-6 text-xl font-bold text-indigo-700 flex items-center gap-2 z-10">
        Voltix Admin
    </div>
    <nav class=" w-full flex flex-col sidebar-nav px-4 mt-5">
        <ul id="sidebarnav" class="text-gray-600 text-sm in overflow-y-auto max-h-[calc(100vh-100px)] pr-2">
            <li class="text-xs font-bold pb-[5px]">
                <i class="ti ti-dots nav-small-cap-icon text-lg hidden text-center"></i>
                <span class="text-xs text-gray-400 font-semibold">HOME</span>
            </li>

            <li class="sidebar-item selected">
                <a class="sidebar-link gap-3 py-2.5 my-1 text-base flex items-center relative rounded-md text-gray-500 w-full  hover:bg-blue-100 transition duration-300 {{ request()->routeIs('dashboard.index') ? 'bg-blue-100 font-semibold' : '' }}" href="{{ route('dashboard.index') }}">
                    <i class="ti ti-layout-dashboard ps-2  text-2xl"></i> <span>Dashboard</span>
                </a>
            </li>

            <li class="text-xs font-bold mb-4 mt-6">
                <i class="ti ti-dots nav-small-cap-icon text-lg hidden text-center"></i>
                <span class="text-xs text-gray-400 font-semibold">Pelanggan</span>
            </li>

            <li class="sidebar-item">
                <a class="sidebar-link gap-3 py-2.5 my-1 text-base flex items-center relative rounded-md text-gray-500 w-full hover:bg-blue-100 transition duration-300 {{ request()->routeIs('admin.pelanggan.konfirmasi') ? 'bg-blue-100 font-semibold' : '' }}" href="{{ route('admin.pelanggan.konfirmasi') }}">
                    <i class="ti ti-article ps-2 text-2xl"></i> <span>Konfirmasi Pelanggan</span>
                </a>
            </li>

            <li class="sidebar-item">
                <a class="sidebar-link gap-3 py-2.5 my-1 text-base flex items-center relative rounded-md text-gray-500 w-full hover:bg-blue-100 transition duration-300 {{ request()->routeIs('admin.pelanggan.index') ? 'bg-blue-100 font-semibold' : '' }}" href="{{ route('admin.pelanggan.index') }}">
                    <i class="ti ti-cards ps-2 text-2xl"></i> <span>Pelanggan Aktif</span>
                </a>
            </li>

            <li class="sidebar-item">
                <a class="sidebar-link gap-3 py-2.5 my-1 text-base flex items-center relative rounded-md text-gray-500 w-full hover:bg-blue-100 transition duration-300 {{ request()->routeIs('admin.tarif.index') ? 'bg-blue-100 font-semibold' : '' }}" href="{{ route('admin.tarif.index') }}">
                    <i class="ti ti-alert-circle ps-2 text-2xl"></i> <span>Tarif Layanan</span>
                </a>
            </li>

            <li class="sidebar-item">
                <a class="sidebar-link gap-3 py-2.5 my-1 text-base flex items-center relative rounded-md text-gray-500 w-full hover:bg-blue-100 transition duration-300" href="./components/forms.html">
                    <i class="ti ti-file-description ps-2 text-2xl"></i> <span>Tagihan Pelanggan</span>
                </a>
            </li>

            <li class="sidebar-item">
                <a class="sidebar-link gap-3 py-2.5 my-1 text-base flex items-center relative rounded-md text-gray-500 w-full hover:bg-blue-100 transition duration-300" href="./components/typography.html">
                    <i class="ti ti-typography ps-2 text-2xl"></i> <span>Riwayat Pembayaran</span>
                </a>
            </li>

            <li class="text-xs font-bold mb-4 mt-6">
                <i class="ti ti-dots nav-small-cap-icon text-lg hidden text-center"></i>
                <span class="text-xs text-gray-400 font-semibold">APPS</span>
            </li>
            <div class="hs-accordion-group">
                <div class="hs-accordion sidebar-item" id="hs-basic-with-title-and-arrow-stretched-heading-ecommerce">
                    <button class="sidebar-link gap-3 py-2.5 my-1 text-base flex items-center relative  rounded-md text-gray-500  w-full hs-accordion-toggle hs-accordion-active:text-blue-600 justify-between" aria-expanded="false" aria-controls="hs-basic-with-title-and-arrow-stretched-collapse-ecommerce">
                        <div class="flex items-center gap-3">
                            <i class="ti ti-basket ps-2 text-2xl"></i>
                            <span>Ecommerce</span>
                        </div>
                        <div class="mr-5">
                            <svg class="hs-accordion-active:hidden block size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="m6 9 6 6 6-6"></path>
                            </svg>
                            <svg class="hs-accordion-active:block hidden size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="m18 15-6-6-6 6"></path>
                            </svg>
                        </div>
                    </button>
                    <div id="hs-basic-with-title-and-arrow-stretched-collapse-ecommerce" class="hs-accordion-content hidden w-full overflow-hidden transition-[height] duration-300" role="region" aria-labelledby="hs-basic-with-title-and-arrow-stretched-heading-ecommerce">
                        <a class="gap-4 py-2.5 my-1 px-[14px] text-sm flex items-center justify-between relative rounded-md text-gray-500 w-full hover:bg-blue-100 transition duration-300" href="#">
                            <div class="flex items-center gap-4">
                                <i class="ti ti-circle text-xs"></i> <span>Shop One</span>
                            </div>
                            <span class="text-white bg-blue-700 rounded-3xl px-2 text-xs py-0.5">Pro</span>
                        </a>
                        <a class="gap-4 py-2.5 my-1 px-[14px] text-sm flex items-center justify-between relative rounded-md text-gray-500 w-full hover:bg-blue-100 transition duration-300" href="#">
                            <div class="flex items-center gap-4">
                                <i class="ti ti-circle text-xs"></i> <span>Shop Two</span>
                            </div>
                            <span class="text-white bg-blue-700 rounded-3xl px-2 text-xs py-0.5">Pro</span>
                        </a>
                        <a class="gap-4 py-2.5 my-1 px-[14px] text-sm flex items-center justify-between relative rounded-md text-gray-500 w-full hover:bg-blue-100 transition duration-300" href="#">
                            <div class="flex items-center gap-4">
                                <i class="ti ti-circle text-xs"></i> <span>Details One</span>
                            </div>
                            <span class="text-white bg-blue-700 rounded-3xl px-2 text-xs py-0.5">Pro</span>
                        </a>
                        <a class="gap-4 py-2.5 my-1 px-[14px] text-sm flex items-center justify-between relative rounded-md text-gray-500 w-full hover:bg-blue-100 transition duration-300" href="#">
                            <div class="flex items-center gap-4">
                                <i class="ti ti-circle text-xs"></i> <span>Details Two</span>
                            </div>
                            <span class="text-white bg-blue-700 rounded-3xl px-2 text-xs py-0.5">Pro</span>
                        </a>
                        <a class="gap-4 py-2.5 my-1 px-[14px] text-sm flex items-center justify-between relative rounded-md text-gray-500 w-full hover:bg-blue-100 transition duration-300" href="#">
                            <div class="flex items-center gap-4">
                                <i class="ti ti-circle text-xs"></i> <span>List</span>
                            </div>
                            <span class="text-white bg-blue-700 rounded-3xl px-2 text-xs py-0.5">Pro</span>
                        </a>
                        <a class="gap-4 py-2.5 my-1 px-[14px] text-sm flex items-center justify-between relative rounded-md text-gray-500 w-full hover:bg-blue-100 transition duration-300" href="#">
                            <div class="flex items-center gap-4">
                                <i class="ti ti-circle text-xs"></i> <span>Checkout</span>
                            </div>
                            <span class="text-white bg-blue-700 rounded-3xl px-2 text-xs py-0.5">Pro</span>
                        </a>
                    </div>
                </div>
            </div>

            <div class="hs-accordion-group">
                <div class="hs-accordion sidebar-item" id="hs-basic-with-title-and-arrow-stretched-heading-userprofile">
                    <button class="sidebar-link gap-3 py-2.5 my-1 text-base flex items-center relative  rounded-md text-gray-500  w-full hs-accordion-toggle hs-accordion-active:text-blue-600 justify-between" aria-expanded="false" aria-controls="hs-basic-with-title-and-arrow-stretched-collapse-userprofile">
                        <div class="flex items-center gap-3">
                            <i class="ti ti-user-circle ps-2 text-2xl"></i>
                            <span>User Profile</span>
                        </div>
                        <div class="mr-5">
                            <svg class="hs-accordion-active:hidden block size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="m6 9 6 6 6-6"></path>
                            </svg>
                            <svg class="hs-accordion-active:block hidden size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="m18 15-6-6-6 6"></path>
                            </svg>
                        </div>
                    </button>
                    <div id="hs-basic-with-title-and-arrow-stretched-collapse-userprofile" class="hs-accordion-content hidden w-full overflow-hidden transition-[height] duration-300" role="region" aria-labelledby="hs-basic-with-title-and-arrow-stretched-heading-userprofile">
                        <a class="gap-4 py-2.5 my-1 px-[14px] text-sm flex items-center justify-between relative rounded-md text-gray-500 w-full hover:bg-blue-100 transition duration-300" href="#">
                            <div class="flex items-center gap-4">
                                <i class="ti ti-circle text-xs"></i> <span>Profile One</span>
                            </div>
                            <span class="text-white bg-blue-700 rounded-3xl px-2 text-xs py-0.5">Pro</span>
                        </a>
                        <a class="gap-4 py-2.5 my-1 px-[14px] text-sm flex items-center justify-between relative rounded-md text-gray-500 w-full hover:bg-blue-100 transition duration-300" href="#">
                            <div class="flex items-center gap-4">
                                <i class="ti ti-circle text-xs"></i> <span>Profile Two</span>
                            </div>
                            <span class="text-white bg-blue-700 rounded-3xl px-2 text-xs py-0.5">Pro</span>
                        </a>
                    </div>
                </div>
            </div>

            <div class="hs-accordion-group">
                <div class="hs-accordion sidebar-item" id="hs-basic-with-title-and-arrow-stretched-heading-blog">
                    <button class="sidebar-link gap-3 py-2.5 my-1 text-base flex items-center relative  rounded-md text-gray-500  w-full hs-accordion-toggle hs-accordion-active:text-blue-600 justify-between" aria-expanded="false" aria-controls="hs-basic-with-title-and-arrow-stretched-collapse-blog">
                        <div class="flex items-center gap-3">
                            <i class="ti ti-chart-donut-3 ps-2 text-2xl"></i>
                            <span>Blog</span>
                        </div>
                        <div class="mr-5">
                            <svg class="hs-accordion-active:hidden block size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="m6 9 6 6 6-6"></path>
                            </svg>
                            <svg class="hs-accordion-active:block hidden size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="m18 15-6-6-6 6"></path>
                            </svg>
                        </div>
                    </button>
                    <div id="hs-basic-with-title-and-arrow-stretched-collapse-blog" class="hs-accordion-content hidden w-full overflow-hidden transition-[height] duration-300" role="region" aria-labelledby="hs-basic-with-title-and-arrow-stretched-heading-blog">
                        <a class="gap-4 py-2.5 my-1 px-[14px] text-sm flex items-center justify-between relative rounded-md text-gray-500 w-full hover:bg-blue-100 transition duration-300" href="#">
                            <div class="flex items-center gap-4">
                                <i class="ti ti-circle text-xs"></i> <span>Posts</span>
                            </div>
                            <span class="text-white bg-blue-700 rounded-3xl px-2 text-xs py-0.5">Pro</span>
                        </a>
                        <a class="gap-4 py-2.5 my-1 px-[14px] text-sm flex items-center justify-between relative rounded-md text-gray-500 w-full hover:bg-blue-100 transition duration-300" href="#">
                            <div class="flex items-center gap-4">
                                <i class="ti ti-circle text-xs"></i> <span>Details</span>
                            </div>
                            <span class="text-white bg-blue-700 rounded-3xl px-2 text-xs py-0.5">Pro</span>
                        </a>
                    </div>
                </div>
            </div>
            <li class="sidebar-item">
                <a class="sidebar-link gap-3 py-2.5 my-1 text-base flex items-center justify-between relative rounded-md text-gray-500 w-full hover:bg-blue-100 transition duration-300" href="#">
                    <div class="flex items-center gap-2">
                        <i class="ti ti-mail ps-2 text-2xl"></i> <span>Email</span>
                    </div>

                </a>
            </li>
            <li class="sidebar-item">
                <a class="sidebar-link gap-3 py-2.5 my-1 text-base flex items-center justify-between relative rounded-md text-gray-500 w-full hover:bg-blue-100 transition duration-300" href="#">
                    <div class="flex items-center gap-2">
                        <i class="ti ti-calendar ps-2 text-2xl"></i> <span>Calendar</span>
                    </div>

                </a>
            </li>
            <li class="sidebar-item">
                <a class="sidebar-link gap-3 py-2.5 my-1 text-base flex items-center justify-between relative rounded-md text-gray-500 w-full hover:bg-blue-100 transition duration-300" href="#">
                    <div class="flex items-center gap-2">
                        <i class="ti ti-layout-kanban ps-2 text-2xl"></i> <span>Kanban</span>
                    </div>

                </a>
            </li>
            <li class="sidebar-item">
                <a class="sidebar-link gap-3 py-2.5 my-1 text-base flex items-center justify-between relative rounded-md text-gray-500 w-full hover:bg-blue-100 transition duration-300" href="#">
                    <div class="flex items-center gap-2">
                        <i class="ti ti-message-dots ps-2 text-2xl"></i> <span>Chat</span>
                    </div>

                </a>
            </li>
            <li class="sidebar-item">
                <a class="sidebar-link gap-3 py-2.5 my-1 text-base flex items-center justify-between relative rounded-md text-gray-500 w-full hover:bg-blue-100 transition duration-300" href="#">
                    <div class="flex items-center gap-2">
                        <i class="ti ti-notes ps-2 text-2xl"></i> <span>Notes</span>
                    </div>

                </a>
            </li>
            <li class="sidebar-item">
                <a class="sidebar-link gap-3 py-2.5 my-1 text-base flex items-center justify-between relative rounded-md text-gray-500 w-full hover:bg-blue-100 transition duration-300" href="#">
                    <div class="flex items-center gap-2">
                        <i class="ti ti-phone ps-2 text-2xl"></i> <span>Contact</span>
                    </div>

                </a>
            </li>
            <li class="sidebar-item">
                <a class="sidebar-link gap-3 py-2.5 my-1 text-base flex items-center justify-between relative rounded-md text-gray-500 w-full hover:bg-blue-100 transition duration-300" href="#">
                    <div class="flex items-center gap-2">
                        <i class="ti ti-list-details ps-2 text-2xl"></i> <span>Contact List</span>
                    </div>

                </a>
            </li>
            <li class="sidebar-item">
                <a class="sidebar-link gap-3 py-2.5 my-1 text-base flex items-center justify-between relative rounded-md text-gray-500 w-full hover:bg-blue-100 transition duration-300" href="#">
                    <div class="flex items-center gap-2">
                        <i class="ti ti-file-text ps-2 text-2xl"></i> <span>Invoice</span>
                    </div>

                </a>
            </li>
        </ul>
    </nav>
</aside>
