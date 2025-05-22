<aside class="w-64 bg-gradient-to-b from-[#640D5F] to-[#D91656] text-white p-6 space-y-6 shadow-lg">
    <div class="text-3xl font-extrabold mb-8 tracking-wide">
        <span class="text-udagold">Dev</span><span style="color: #FFB200;">Store</span>
    </div>
    <nav class="flex flex-col space-y-4 text-sm font-medium">
        <!-- Dashboard -->
        <a href="#"
            class="hover:bg-[#FFB200] hover:text-black p-2 rounded-md transition-all duration-300 flex items-center gap-3">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                <path d="M3 13h18M5 13V6h14v7" stroke-linecap="round" stroke-linejoin="round" />
            </svg>
            Dashboard
        </a>

        <!-- Users -->
        <a href="{{ route('users.index') }}"
            class="hover:bg-[#FFB200] hover:text-black p-2 rounded-md transition-all flex items-center gap-3">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                <path d="M17 21v-2a4 4 0 00-4-4H7a4 4 0 00-4 4v2M12 11a4 4 0 100-8 4 4 0 000 8z" stroke-linecap="round"
                    stroke-linejoin="round" />
            </svg>
            Users
        </a>

        <!-- Events -->
        <a href="#"
            class="hover:bg-[#FFB200] hover:text-black p-2 rounded-md transition-all flex items-center gap-3">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                <path d="M3 8h18M16 2v4M8 2v4m-5 9h18" stroke-linecap="round" stroke-linejoin="round" />
            </svg>
            Events
        </a>

        <!-- Books -->
        <a href="#"
            class="hover:bg-[#FFB200] hover:text-black p-2 rounded-md transition-all flex items-center gap-3">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                <path d="M4 19.5A2.5 2.5 0 016.5 17H20M4 4h16v13H6.5A2.5 2.5 0 004 19.5V4z" stroke-linecap="round"
                    stroke-linejoin="round" />
            </svg>
            Books
        </a>

        <!-- T-Shirts -->
        <a href="#"
            class="hover:bg-[#FFB200] hover:text-black p-2 rounded-md transition-all flex items-center gap-3">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                <path d="M6 4l6 3 6-3v4l-1 1v11H7V9L6 8V4z" stroke-linecap="round" stroke-linejoin="round" />
            </svg>
            T-Shirts
        </a>

        <!-- Settings -->
        <a href="#"
            class="hover:bg-[#FFB200] hover:text-black p-2 rounded-md transition-all flex items-center gap-3">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                <path
                    d="M12 15a3 3 0 100-6 3 3 0 000 6zm7.94-1.06a9.004 9.004 0 01-1.32 1.9l.71 2.04-2.12 1.23-.71-2.05a8.963 8.963 0 01-3.5 0l-.71 2.05-2.12-1.23.71-2.04a9.004 9.004 0 01-1.32-1.9L3 12l2.04-.71a8.963 8.963 0 010-3.5L3 7l1.23-2.12 2.04.71a9.004 9.004 0 011.9-1.32L12 3l.71 2.04a8.963 8.963 0 013.5 0L17 3l2.12 1.23-.71 2.04a9.004 9.004 0 011.32 1.9L21 12l-2.04.71z"
                    stroke-linecap="round" stroke-linejoin="round" />
            </svg>
            Settings
        </a>
    </nav>
</aside>
