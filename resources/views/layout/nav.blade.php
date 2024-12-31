<!-- Mobile Top Navigation -->
<nav id="mobileTopNav" class="bg-white fixed top-0 w-full shadow-sm md:hidden z-50">
    <div class="flex justify-between items-center h-16 px-4">
        <!-- Arrow Left Icon -->
        <a href="/" class="text-gray-600 hover:text-blue-500">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor" width="24" height="24" viewBox="0 0 24 24" class="humbleicons hi-user">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
        </svg>
        </a>

        <!-- Home Icon -->
        <a href="#" class="flex flex-col items-center text-gray-600 hover:text-blue-500">
        <h2 class="heading text-center font-bold text-2xl m-5 text-gray-800">Home</h2>
        </a>

        <!-- Menu Icon -->

        <a href="#" class="flex flex-col items-center text-gray-600 hover:text-blue-500">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor" width="24" height="24" viewBox="0 0 24 24" class="humbleicons hi-chat">
                <g xmlns="http://www.w3.org/2000/svg" fill="currentColor"><path d="M4 19l-.93-.37a1 1 0 001.125 1.35L4 19zm4.706-.936l.474-.881-.317-.17-.352.07.195.98zm-3.082-3.147l.93.37.163-.414-.196-.399-.897.443zM19 12c0 3.246-2.853 6-6.53 6v2c4.641 0 8.53-3.514 8.53-8h-2zM5.941 12c0-3.246 2.854-6 6.53-6V4C7.83 4 3.94 7.514 3.94 12h2zm6.53-6C16.147 6 19 8.754 19 12h2c0-4.486-3.889-8-8.53-8v2zm0 12c-1.205 0-2.328-.3-3.291-.817l-.948 1.761A8.934 8.934 0 0012.471 20v-2zm-8.276 1.98l4.706-.936-.39-1.961-4.706.936.39 1.962zm2.326-5.506A5.564 5.564 0 015.94 12h-2c0 1.2.282 2.338.786 3.36l1.794-.886zm-1.826.073L3.07 18.631l1.858.738 1.624-4.083-1.858-.739z"/><circle cx="9" cy="12" r="1"/><circle cx="12.5" cy="12" r="1"/><circle cx="16" cy="12" r="1"/></g>
            </svg>
        </a>

    </div>
</nav>

<!-- Desktop Navbar -->
<nav class="bg-white shadow-sm fixed w-full z-50 top-0 hidden md:block">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-16">
            <!-- Logo -->
            <div class="flex-shrink-0">
                <a href="/" class="text-2xl font-bold text-gray-700">{{config('app.name')}}</a>
            </div>

            <!-- Search Bar -->
            <div class="flex flex-grow justify-center items-center">
                @include('shared.search')
            </div>

            <!-- Links -->
            <div class="flex space-x-4">
                @guest
                    <a href="{{ route('login') }}" class="text-gray-600 hover:text-blue-500">Login</a>
                    <a href="{{ route('register') }}" class="text-gray-600 hover:text-blue-500">Register</a>
                @endguest
                @auth
                <div class="flex items-center space-x-4">
                    <a href="{{ route('profile') }}" class="text-gray-600 hover:text-blue-500">{{ Auth::user()->name }}</a>
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="bg-red-500 text-white font-semibold py-2 px-4 rounded-lg hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-red-400">
                            Logout
                        </button>
                    </form>
                </div>
                @endauth
            </div>
        </div>
    </div>
</nav>


<!-- Mobile Bottom Navbar -->
<nav id="mobileBotNav" class="bg-white border fixed bottom-0 w-full shadow-sm md:hidden">
    <div class="flex justify-around items-center h-16">
        <a href="/" class="flex flex-col items-center text-gray-600 hover:text-blue-500">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor" width="24" height="24" viewBox="0 0 24 24" class="humbleicons hi-home">
            <path xmlns="http://www.w3.org/2000/svg" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 10v9a1 1 0 001 1h10a1 1 0 001-1v-9M6 10l6-6 6 6M6 10l-2 2m14-2l2 2m-10 1h4v4h-4v-4z"/>
        </svg>
        <span class="text-xs">Home</span>
        </a>
        <a href="#" class="flex flex-col items-center text-gray-600 hover:text-blue-500">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor" width="24" height="24" viewBox="0 0 24 24" class="humbleicons hi-users">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
        </svg>
        <span class="text-xs">Pencarian</span>
        </a>
        <a href="#" class="flex flex-col items-center text-gray-600 hover:text-blue-500">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor" width="24" height="24" viewBox="0 0 24 24" class="humbleicons hi-bell">
            <path xmlns="http://www.w3.org/2000/svg" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 17h2m0 0h10M7 17v-6a5 5 0 0110 0v6m0 0h2M11.5 5.5V4a.5.5 0 011 0v1.5M13 20a1 1 0 11-2 0h2z"/>
        </svg>
        <span class="text-xs">Notifications</span>
        </a>
        <a href="#" class="flex flex-col items-center text-gray-600 hover:text-blue-500">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor" width="24" height="24" viewBox="0 0 24 24" class="humbleicons hi-mail">
            <path xmlns="http://www.w3.org/2000/svg" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 7v10a1 1 0 01-1 1H4a1 1 0 01-1-1V7m18 0a1 1 0 00-1-1H4a1 1 0 00-1 1m18 0l-7.72 6.433a2 2 0 01-2.56 0L3 7"/>
        </svg>
        <span class="text-xs">Messages</span>
        </a>
    </div>
</nav>

<style>
    #mobileBotNav,  #mobileTopNav {
        transition: transform 0.3s ease-in-out; /* Smooth hide/show transition */
    }

    .hide-topNav {
        transform: translateY(-100%); /* Move navbar off-screen when hidden */
    }

    .hide-nav {
        transform: translateY(100%); /* Move navbar off-screen when hidden */
    }
</style>

<script>
    let lastScrollTop = 0; // Variable to store last scroll position
    const topNav = document.getElementById('mobileTopNav');
    const botNav = document.getElementById('mobileBotNav');

    window.addEventListener('scroll', function() {
        let currentScroll = window.pageYOffset || document.documentElement.scrollTop;

        if (currentScroll > lastScrollTop && currentScroll > topNav.offsetHeight && botNav.offsetHeight ) {
            // Scrolling down and more than navbar height - hide the navbar
            topNav.classList.add('hide-topNav');
            botNav.classList.add('hide-nav');
        } else {
            // Scrolling up - show the navbar
            topNav.classList.remove('hide-topNav');
            botNav.classList.remove('hide-nav');
        }

        lastScrollTop = currentScroll <= 0 ? 0 : currentScroll; // Prevent negative scroll values
    });
</script>
