<div class="flex">
    <aside id="sidebar"
        class="bg-gradient-to-b from-[#640D5F] to-[#D91656] text-white p-6 space-y-6 shadow-lg transition-all duration-300 w-64">
        <div class="flex justify-between items-center mb-8">
            <div class="text-3xl font-extrabold tracking-wide whitespace-nowrap">
                <span class="text-udagold">Dev</span><span style="color: #FFB200;">Store</span>
            </div>
            <button id="toggleBtn" class="text-white focus:outline-none">
                &#9776; <!-- icon hamburger -->
            </button>
        </div>
        <nav class="flex flex-col space-y-4 text-sm font-medium">
            <!-- Dashboard -->
            <a href="{{ route('dashboard') }}"
                class="hover:bg-[#FFB200] hover:text-black p-2 rounded-md transition-all duration-300 flex items-center gap-3">
                <svg class="w-[35px] h-[35px] text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                    width="24" height="24" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                        d="m4 12 8-8 8 8M6 10.5V19a1 1 0 0 0 1 1h3v-3a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v3h3a1 1 0 0 0 1-1v-8.5" />
                </svg>

                Dashboard
            </a>

            <!-- Users -->
            <a href="{{ route('users.index') }}"
                class="hover:bg-[#FFB200] hover:text-black p-2 rounded-md transition-all flex items-center gap-3">
                <svg class="w-[35px] h-[35px] text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                    width="24" height="24" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-width="1.8"
                        d="M4.5 17H4a1 1 0 0 1-1-1 3 3 0 0 1 3-3h1m0-3.05A2.5 2.5 0 1 1 9 5.5M19.5 17h.5a1 1 0 0 0 1-1 3 3 0 0 0-3-3h-1m0-3.05a2.5 2.5 0 1 0-2-4.45m.5 13.5h-7a1 1 0 0 1-1-1 3 3 0 0 1 3-3h3a3 3 0 0 1 3 3 1 1 0 0 1-1 1Zm-1-9.5a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0Z" />
                </svg>


                Users
            </a>

            <!-- Events -->
            <a href="{{ route('events.index') }}"
                class="hover:bg-[#FFB200] hover:text-black p-2 rounded-md transition-all flex items-center gap-3">
                <svg class="w-[35px] h-[35px] text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                    width="24" height="24" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                        d="M3.78552 9.5 12.7855 14l9-4.5-9-4.5-8.99998 4.5Zm0 0V17m3-6v6.2222c0 .3483 2 1.7778 5.99998 1.7778 4 0 6-1.3738 6-1.7778V11" />
                </svg>
                Events
            </a>

            <!-- Books -->
            <a href="{{ route('bukus.index') }}"
                class="hover:bg-[#FFB200] hover:text-black p-2 rounded-md transition-all flex items-center gap-3">
                <svg class="w-[35px] h-[35px] text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                    width="24" height="24" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linejoin="round" stroke-width="1.8"
                        d="M12.1429 11v9m0-9c-2.50543-.7107-3.19099-1.39543-6.13657-1.34968-.48057.00746-.86348.38718-.86348.84968v7.2884c0 .4824.41455.8682.91584.8617 2.77491-.0362 3.45995.6561 6.08421 1.3499m0-9c2.5053-.7107 3.1067-1.39542 6.0523-1.34968.4806.00746.9477.38718.9477.84968v7.2884c0 .4824-.4988.8682-1 .8617-2.775-.0362-3.3758.6561-6 1.3499m2-14c0 1.10457-.8955 2-2 2-1.1046 0-2-.89543-2-2s.8954-2 2-2c1.1045 0 2 .89543 2 2Z" />
                </svg>

                Books
            </a>


            <!-- Settings -->
            <a href="#"
                class="hover:bg-[#FFB200] hover:text-black p-2 rounded-md transition-all flex items-center gap-3">
                <svg class="w-[35px] h-[35px] text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                    width="24" height="24" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="square" stroke-linejoin="round" stroke-width="1.8"
                        d="M10 19H5a1 1 0 0 1-1-1v-1a3 3 0 0 1 3-3h2m10 1a3 3 0 0 1-3 3m3-3a3 3 0 0 0-3-3m3 3h1m-4 3a3 3 0 0 1-3-3m3 3v1m-3-4a3 3 0 0 1 3-3m-3 3h-1m4-3v-1m-2.121 1.879-.707-.707m5.656 5.656-.707-.707m-4.242 0-.707.707m5.656-5.656-.707.707M12 8a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                </svg>
                Settings
            </a>

            <a href="#"
                class="hover:bg-[#FFB200] hover:text-black p-2 rounded-md transition-all flex items-center gap-3">
                <svg class="w-[35px] h-[35px] text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                    width="24" height="24" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M5 18h14M5 18v3h14v-3M5 18l1-9h12l1 9M16 6v3m-4-3v3m-2-6h8v3h-8V3Zm-1 9h.01v.01H9V12Zm3 0h.01v.01H12V12Zm3 0h.01v.01H15V12Zm-6 3h.01v.01H9V15Zm3 0h.01v.01H12V15Zm3 0h.01v.01H15V15Z" />
                </svg>

                Transaksi
            </a>
        </nav>
    </aside>
</div>
