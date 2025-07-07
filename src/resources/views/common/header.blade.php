<header
        x-data="{menuToggle: false}"
        class="sticky top-0 z-99999 flex w-full border-gray-200 bg-white lg:border-b dark:border-gray-800 dark:bg-gray-900"
>

    <div
            class="flex grow flex-col items-center justify-between  "
    >
        <div class="items-center justify-between hidden  md:flex  md:order-1" id="navbar-sticky ">
            <ul class="flex flex-col p-4 md:p-0 mt-4 font-medium border border-gray-100 rounded-lg bg-gray-50 md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
                <li>
                    <a href="#" class="block py-2 px-3 text-white bg-blue-700 rounded-sm md:bg-transparent md:text-blue-700 md:p-0 md:dark:text-blue-500" aria-current="page">Home</a>
                </li>
                <li>
                    <a href="#" class="block py-2 px-3 text-gray-900 rounded-sm hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 md:dark:hover:text-blue-500 dark:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">About</a>
                </li>
                <li>
                    <a href="#" class="block py-2 px-3 text-gray-900 rounded-sm hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 md:dark:hover:text-blue-500 dark:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">Services</a>
                </li>
                <li>
                    <a href="#" class="block py-2 px-3 text-gray-900 rounded-sm hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 md:dark:hover:text-blue-500 dark:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">Contact</a>
                </li>
            </ul>
        </div>


        <div
                :class="menuToggle ? 'flex' : 'hidden'"
                class="shadow-theme-md w-full items-center justify-between gap-4 px-5 py-4 lg:flex lg:justify-end lg:px-0 lg:shadow-none"
        >
            <!-- User Area -->
            <div
                    class="relative"
                    x-data="{ dropdownOpen: false }"
                    @click.outside="dropdownOpen = false"
            >
                <a
                        class="flex items-center text-gray-700 dark:text-gray-400"
                        href="#"
                        @click.prevent="dropdownOpen = ! dropdownOpen"
                >
          <span class="mr-3 h-11 w-11 overflow-hidden rounded-full">
            <img src="data:image/jpeg;base64,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" alt="User"/>
          </span>

                    <span class="text-theme-sm mr-1 block font-medium"> Musharof </span>

                    <svg
                            :class="dropdownOpen && 'rotate-180'"
                            class="stroke-gray-500 dark:stroke-gray-400"
                            width="18"
                            height="20"
                            viewBox="0 0 18 20"
                            fill="none"
                            xmlns="http://www.w3.org/2000/svg"
                    >
                        <path
                                d="M4.3125 8.65625L9 13.3437L13.6875 8.65625"
                                stroke=""
                                stroke-width="1.5"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                        />
                    </svg>
                </a>

                <!-- Dropdown Start -->
                <div
                        x-show="dropdownOpen"
                        class="shadow-theme-lg dark:bg-gray-dark absolute right-0 mt-[17px] flex w-[260px] flex-col rounded-2xl border border-gray-200 bg-white p-3 dark:border-gray-800"
                >
                    <div>
                        <span
                         class="text-theme-sm block font-medium text-gray-700 dark:text-gray-400"
                        >
                          Musharof Chowdhury
                        </span>
                        <span
                                class="text-theme-xs mt-0.5 block text-gray-500 dark:text-gray-400"
                        >
                          randomuser@pimjo.com
                        </span>
                    </div>
                    <button
                            class="group text-theme-sm mt-3 flex items-center gap-3 rounded-lg px-3 py-2 font-medium text-gray-700 hover:bg-gray-100 hover:text-gray-700 dark:text-gray-400 dark:hover:bg-white/5 dark:hover:text-gray-300"
                    >
                        <svg
                                class="fill-gray-500 group-hover:fill-gray-700 dark:group-hover:fill-gray-300"
                                width="24"
                                height="24"
                                viewBox="0 0 24 24"
                                fill="none"
                                xmlns="http://www.w3.org/2000/svg"
                        >
                            <path
                                    fill-rule="evenodd"
                                    clip-rule="evenodd"
                                    d="M15.1007 19.247C14.6865 19.247 14.3507 18.9112 14.3507 18.497L14.3507 14.245H12.8507V18.497C12.8507 19.7396 13.8581 20.747 15.1007 20.747H18.5007C19.7434 20.747 20.7507 19.7396 20.7507 18.497L20.7507 5.49609C20.7507 4.25345 19.7433 3.24609 18.5007 3.24609H15.1007C13.8581 3.24609 12.8507 4.25345 12.8507 5.49609V9.74501L14.3507 9.74501V5.49609C14.3507 5.08188 14.6865 4.74609 15.1007 4.74609L18.5007 4.74609C18.9149 4.74609 19.2507 5.08188 19.2507 5.49609L19.2507 18.497C19.2507 18.9112 18.9149 19.247 18.5007 19.247H15.1007ZM3.25073 11.9984C3.25073 12.2144 3.34204 12.4091 3.48817 12.546L8.09483 17.1556C8.38763 17.4485 8.86251 17.4487 9.15549 17.1559C9.44848 16.8631 9.44863 16.3882 9.15583 16.0952L5.81116 12.7484L16.0007 12.7484C16.4149 12.7484 16.7507 12.4127 16.7507 11.9984C16.7507 11.5842 16.4149 11.2484 16.0007 11.2484L5.81528 11.2484L9.15585 7.90554C9.44864 7.61255 9.44847 7.13767 9.15547 6.84488C8.86248 6.55209 8.3876 6.55226 8.09481 6.84525L3.52309 11.4202C3.35673 11.5577 3.25073 11.7657 3.25073 11.9984Z"
                                    fill=""
                            />
                        </svg>

                        Sign out
                    </button>
                </div>
                <!-- Dropdown End -->
            </div>
            <!-- User Area -->
        </div>
    </div>
</header>
