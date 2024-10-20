<style>
    /* Container Styling */
    .container {
        max-width: 1200px;
        margin: 0 auto;
        padding: 20px;
    }

    /* Dashboard Header */
    h1 {
        font-size: 36px;
        font-weight: bold;
        margin-bottom: 20px;
        color: #fff; /* Change text color to white */
    }

    /* Card Styling */
    .bg-white {
        background-color: white;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        padding: 20px;
        transition: transform 0.2s ease; /* Keep transition for smooth scaling */
    }

    /* Hover effect only for cards */
    .bg-white.card:hover {
        transform: scale(1.05);
    }

    .text-xl {
        font-size: 24px;
        font-weight: 600;
        margin-bottom: 10px;
        color: #fff; /* Change text color to white */
    }

    .text-gray-600 {
        color: #bbb; /* Lighter gray for better contrast */
        font-size: 16px;
    }

    /* Recent Activity Section */
    .mt-10 {
        margin-top: 40px;
    }

    .text-2xl {
        font-size: 28px;
        font-weight: 600;
        margin-bottom: 15px;
        color: #fff; /* Change text color to white */
    }

    .bg-white ul {
        background-color: white;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        border-radius: 12px;
        list-style-type: none;
        padding: 0;
    }

    .p-4 {
        padding: 15px 20px;
        border-bottom: 1px solid #eee;
        color: #333;
    }

    .p-4:last-child {
        border-bottom: none;
    }

    /* Responsive Behavior */
    @media (max-width: 768px) {
        .grid {
            grid-template-columns: 1fr;
        }
    }

    /* Navigation Styling */
    nav {
        background-color: #000; /* Set background to black */
        color: #fff; /* Set text color to white */
    }

    nav a {
        color: #fff; /* Make links white */
    }

    /* Dropdown Button */
    button {
        color: #fff; /* White text for button */
    }

    /* Hover and Focus States */
    button:hover,
    button:focus,
    nav a:hover,
    nav a:focus {
        color: #ddd; /* Lighter color on hover for better visibility */
    }

    .border-gray-100 {
        border-color: #FFF; /* Darken the border */
    }

    /* For responsive menu */
    .sm\:hidden {
        color: #fff;
    }

    .text-gray-500 {
        color: #FFF; /* Change light text to a soft gray for contrast */
    }

    .text-gray-800 {
        color: #fff; /* White text for darker background */
    }

    .bg-white {
        background-color: #000; /* Set background of dropdown to black */
    }
</style>


<nav x-data="{ open: false }" class="bg-white border-b border-gray-100">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('dashboard') }}">
                        <x-application-logo class="block h-9 w-auto fill-current text-gray-800" />
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                    <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                        {{ __('Dashboard') }}
                    </x-nav-link>
                </div>
                
                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                    <x-nav-link :href="route('motor')" :active="request()->routeIs('motor')">
                        {{ __('Customize Motorcycle') }}
                    </x-nav-link>
                </div>

                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                    <x-nav-link :href="route('community')" :active="request()->routeIs('community')">
                        {{ __('Community Hub') }}
                    </x-nav-link>
                </div>
            </div>

            <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ms-6">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-white-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
                            <div>{{ Auth::user()->name }}</div>

                            <div class="ms-1">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <x-dropdown-link :href="route('profile.edit')">
                            {{ __('Profile') }}
                        </x-dropdown-link>

                        <x-dropdown-link :href="route('motor.show')">
                            {{ __('My Customizes') }}
                        </x-dropdown-link>

                        <x-dropdown-link :href="route('community.show')">
                            {{ __('My Concerns') }}
                        </x-dropdown-link>


                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>

            <!-- Hamburger -->
            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                {{ __('Dashboard') }}
            </x-responsive-nav-link>
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200">
            <div class="px-4">
                <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
                <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
            </div>

            <div class="mt-3 space-y-1">
                <x-responsive-nav-link :href="route('profile.edit')">
                    {{ __('Profile') }}
                </x-responsive-nav-link>
                <x-responsive-nav-link :href="route('motor.show')">
                    {{ __('My Customizes') }}
                </x-responsive-nav-link>
                <x-responsive-nav-link :href="route('community.show')">
                    {{ __('My Concerns') }}
                </x-responsive-nav-link>
                

                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-responsive-nav-link :href="route('logout')"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
</nav>
