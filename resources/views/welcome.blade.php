<div style="scroll-behavior: smooth">
    <section class="h-full w-full border-box transition-all duration-500 linear relative">
        <div class="header-3-3" style="font-family: 'Poppins', sans-serif">
            <header class="w-full grid grid-cols-1 lg:grid-cols-3 pt-4 pb-4 lg:px-19 md:px-16 sm:px-8 px-8">
                <div class="flex items-center justify-between">
                    <a href="#">
                        <img src="{{ asset('assets/logo/logo-polban-news.png') }}" class="w-44" alt="" />
                    </a>
                    <div class="flex justify-end items-center lg:hidden cursor-pointer">
                        <Link href="#navbar-menu">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 6h16M4 12h16M4 18h16"></path>
                        </svg>
                        </Link>
                    </div>
                </div>

                <div class="bg-black fixed hidden w-full h-full top-0 left-0 z-30 bg-opacity-60">
                </div>
                <nav
                    class="hidden z-50 fixed left-3 right-3 rounded-md shadow-md flex-col p-8 justify-center navigation items-start lg:shadow-none lg:bg-transparent lg:p-0 lg:items-center lg:flex lg:flex-row lg:relative lg:space-x-7 bg-white">
                    <a href="#">
                        <img class="m-0 lg:hidden mb-3" src="{{ asset('assets/logo/logo-polban-news.png') }}"
                            alt="" />
                    </a>
                    <a href="#"
                        class="text-sm text-black-1 font-medium mx-0 lg:mx-5 my-4 lg:my-0 relative">Home</a>
                    <a href="#feature"
                        class="text-sm text-gray-1 font-light mx-0 lg:mx-5 my-4 lg:my-0 relative">Feature</a>
                    <a href="#benefit"
                        class="text-sm text-gray-1 font-light mx-0 lg:mx-5 my-4 lg:my-0 relative">Benefit</a>
                    <div class="flex items-center justify-end w-full lg:hidden mt-3">
                        @auth
                            <Link href="{{ url('/admin/dashboard') }}"
                                class="btn-no-fill text-sm font-medium py-3 px-8 focus:outline-none">
                            Dashboard
                            </Link>
                        @else
                            <Link href="{{ route('login') }}"
                                class="btn-no-fill text-sm font-medium py-3 px-8 focus:outline-none">Log in</Link>

                            @if (Route::has('register'))
                                <Link href="{{ route('register') }}"
                                    class="btn-fill text-sm text-white font-medium py-3 px-8 rounded-full focus:outline-none">
                                Register</Link>
                            @endif
                        @endauth
                    </div>

                    <svg class="w-6 h-6 absolute top-4 right-4 cursor-pointer lg:hidden" fill="none"
                        stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12">
                        </path>
                    </svg>
                </nav>

                <x-splade-modal name="navbar-menu" slideover position="top">
                    <nav class="flex flex-col p-8 justify-center navigation items-start ">
                        <a href="#">
                            <img class="m-0 mb-3 w-40" src="{{ asset('assets/logo/logo-polban-news.png') }}"
                                alt="" />
                        </a>
                        <a href="#" class="text-sm text-black-1 font-medium mx-0 lg:mx-5 my-4 relative">Home</a>
                        <a href="#feature" class="text-sm text-gray-1 font-light mx-0 lg:mx-5 my-4 relative">Feature</a>
                        <a href="#benefit" class="text-sm text-gray-1 font-light mx-0 lg:mx-5 my-4 relative">Benefit</a>
                        <div class="flex flex-col items-center justify-end w-full lg:hidden mt-3">
                            @auth
                                <Link href="{{ url('/admin/dashboard') }}"
                                    class="btn-no-fill text-sm font-medium py-3 px-8 focus:outline-none">
                                Dashboard
                                </Link>
                            @else
                                <Link href="{{ route('login') }}"
                                    class="text-sm font-medium py-3 px-8 focus:outline-slate-500 text-slate-700 block w-full hover:text-slate-900 transition duration-1000 text-center">
                                Log in</Link>
                                <Link href="{{ route('register') }}"
                                    class="bg-blue-500 transition duration-1000 hover:bg-blue-700 block w-full text-sm text-white font-medium py-3 px-8 rounded-full focus:outline-none text-center">
                                Register
                                </Link>
                            @endauth
                        </div>
                    </nav>
                </x-splade-modal>

                <div class="hidden items-center justify-end lg:flex">
                    @auth
                        <Link href="{{ url('/admin/dashboard') }}"
                            class="btn-no-fill text-sm font-medium py-3 px-8 focus:outline-none">
                        Dashboard
                        </Link>
                    @else
                        <Link href="{{ route('login') }}"
                            class="btn-no-fill text-sm font-medium py-3 px-8 focus:outline-none">Log in</Link>

                        @if (Route::has('register'))
                            <Link href="{{ route('register') }}"
                                class="btn-fill text-sm text-white font-medium py-3 px-8 rounded-full focus:outline-none">
                            Register</Link>
                        @endif
                    @endauth
                </div>
            </header>


            <div class="lg:px-20 md:px-16 sm:px-8 px-8">
                <hr style="border-color: #f3f8ff" />
            </div>

            <div>
                <div class="mx-auto flex pt-24 pb-16 lg:pb-20 lg:px-24 md:px-16 sm:px-8 px-8 lg:flex-row flex-col">
                    <div
                        class="lg:flex-grow lg:w-1/2 flex flex-col lg:items-start lg:text-left mb-3 md:mb-12 lg:mb-0 items-center text-center">
                        <h1 class="text-black-1 title-font top-50 sm:text-4xl lg:text-6xl text-2xl mb-5 font-semibold"
                            style="line-height: 1.2">
                            Explore News<br class="lg:block hidden" />with
                            <span style="color: #4e91f9"> Polban News</span>
                            <br class="lg:block hidden" />
                            Mobile App
                        </h1>
                        <p
                            class="text-base text-gray-400 transition-300 font-light leading-6 tracking-wide mb-12 lg:mb-20">
                            Unleashing the Power of News at Your Fingertips!<br class="sm:block hidden" />
                            @HelloDev Code
                        </p>
                        <div
                            class="md:flex contents items-center mx-auto lg:mx-0 lg:flex justify-center lg:space-x-8 md:space-x-2 space-x-0">
                            <Link href="{{ route('register') }}"
                                class="btn-fill inline-flex font-semibold text-white text-base py-4 px-8 rounded-full mb-4 lg:mb-0 md:mb-0 focus:outline-none">
                            Get Started
                            </Link>

                        </div>
                    </div>
                    <div class="w-full lg:w-1/2 text-center lg:justify-start justify-center flex pr-0">
                        <img class="absolute bottom-0 lg:block top-32 hover:-translate-y-8 hover:translate-x-2 transition duration-1000 cursor-pointer lg:right-20 xs:hidden hidden md:hidden sm:right-8 w-96"
                            src="{{ asset('assets/hero/hero-main.png') }}" alt="" />
                        <div class="flex items-end lg:pl-16 pl-0 z-1">
                            <div class="container mx-auto flex flex-wrap items-center">
                                <div
                                    class="card rounded-xl p-5 bg-white flex flex-col md:ml-auto w-full mt-10 md:mt-0 space-y-5">
                                    <div class="flex items-center space-x-4">
                                        <div>
                                            <img src="{{ asset('assets/logo/logo-circle.png') }}" class="w-12"
                                                alt="" />
                                        </div>
                                        <div class="text-left">
                                            <p class="font-semibold text-base mb-1">Polban News</p>
                                            <p class="font-light text-xs text-gray-2">Mobile App</p>
                                        </div>
                                    </div>
                                    <div class="grid grid-cols-2 text-left">
                                        <div>
                                            <p class="font-medium text-base mb-0.5" style="color: #1b8171">
                                                25
                                            </p>
                                            <p class="font-light text-xs text-gray-2">Partners</p>
                                        </div>
                                        <div>
                                            <p class="font-medium text-base mb-0.5" style="color: #ff7468">
                                                150
                                            </p>
                                            <p class="font-light text-xs text-gray-2">Reviews</p>
                                        </div>
                                    </div>
                                    <button
                                        class="btn-fill font-semibold text-white text-base py-3 px-9 mb-0.5 rounded-xl">
                                        Download Now
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="h-full w-full px-8 pt-20 bg-white" id="feature">
        <div class="content-3-2 flex lg:flex-row flex-col pt-10 items-center"
            style="font-family: 'Poppins', sans-serif">
            <div class="w-full lg:w-1/2 text-center justify-center flex lg:mb-0 mb-12">
                <img id="hero" src="{{ asset('assets/hero/hero-feature.png') }}" alt="" />
            </div>
            <div class="lg:w-1/2 w-full flex flex-col lg:items-start items-center lg:text-left text-center">
                <h2 class="md:text-4xl text-3xl font-semibold mb-10 tracking-tight text-medium-black">
                    3 Main Feature
                </h2>
                <ul>
                    <li class="mb-8">
                        <h4
                            class="font-medium text-2xl mb-5 flex lg:flex-row flex-col items-center lg:justify-start justify-center text-medium-black">
                            <span
                                class="circle h-12 w-12 text-xl flex items-center justify-center lg:mr-5 lg:mb-0 mb-5 text-white rounded-full">1</span>
                            Up to Date News
                        </h4>
                        <p class="text-base leading-7 tracking-wide caption">
                            Stay informed with the latest news and updates about Politeknik
                            Negeri Bandung (Polban). Get access to real-time information on
                            campus events, important announcements, student achievements,
                            and more.
                        </p>
                    </li>
                    <li class="mb-8">
                        <h4
                            class="font-medium text-2xl mb-5 flex lg:flex-row flex-col items-center lg:justify-start justify-center text-medium-black">
                            <span
                                class="circle h-12 w-12 text-xl flex items-center justify-center lg:mr-5 lg:mb-0 mb-5 text-white rounded-full">2</span>
                            Personalized Content
                        </h4>
                        <p class="text-base leading-7 tracking-wide caption">
                            Customize your news feed based on your interests and
                            preferences.<br class="sm:inline-block hidden" />
                            Polban News allows you to tailor your reading experience by
                            selecting specific topics or categories that matter to you the
                            most
                        </p>
                    </li>
                    <li class="mb-16">
                        <h4
                            class="font-medium text-2xl mb-5 flex lg:flex-row flex-col items-center lg:justify-start justify-center text-medium-black">
                            <span
                                class="circle h-12 w-12 text-xl flex items-center justify-center lg:mr-5 lg:mb-0 mb-5 text-white rounded-full">3</span>
                            User Friendly Interface
                        </h4>
                        <p class="text-base leading-7 tracking-wide caption">
                            Experience seamless navigation with our intuitive and
                            user-friendly interface. Polban News is designed to provide a
                            smooth and effortless browsing experience, making it easy for
                            you to discover and read news articles conveniently
                        </p>
                    </li>
                </ul>
            </div>
        </div>
    </section>

    <section class="h-full w-full px-8 pt-20 bg-white" id="benefit">
        <div class="content-2-2" style="font-family: 'Poppins', sans-serif">
            <div class="container lg:px-32 md:px-8 sm:px-12 px-5 pb-12 mx-auto">
                <div class="flex flex-col text-center w-full mb-12">
                    <h1 class="text-4xl font-semibold title-font mb-2.5 text-medium-black">
                        3 Keys Benefit
                    </h1>
                    <h2
                        class="text-base font-light title-font mx-12 lg:w-full md:w-full sm:w-3/6 sm:mx-auto text-medium-black">
                        You can easily manage your business with a powerful tools
                    </h2>
                </div>

                <div class="flex lg:flex-row flex-col -m-4">
                    <div class="px-14 md:px-0 lg:px-4 lg:w-1/3 md:w-1/3 sm:w-4/6 mx-auto">
                        <div class="flex rounded-lg h-full lg:pt-8 lg:pb-8 md:pt-8 md:pb-8 pt-4 pb-12 flex-col">
                            <div class="items-center text-center">
                                <div class="flex items-center justify-center mb-6">
                                    <x-heroicon-s-adjustments-vertical
                                        class="w-14 bg-blue-800 text-white rounded-full" />
                                </div>
                            </div>
                            <div class="flex-grow">
                                <h4 class="font-medium text-center text-2xl mb-2.5 text-medium-black">
                                    Stay Informed
                                </h4>
                                <p class="leading-relaxed text-base text-center tracking-wide text-gray">
                                    With Polban News, you can stay up to date with the latest
                                    news and information about Politeknik Negeri Bandung
                                    (Polban).
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="px-14 md:px-0 lg:px-4 lg:w-1/3 md:w-1/3 sm:w-4/6 mx-auto">
                        <div class="flex rounded-lg h-full lg:pt-8 lg:pb-8 md:pt-8 md:pb-8 pt-12 pb-12 flex-col">
                            <div class="items-center text-center">
                                <div class="flex items-center justify-center mb-6">
                                    <x-eos-bolt class="w-14 bg-blue-800 text-white rounded-full" />
                                </div>
                            </div>
                            <div class="flex-grow">
                                <h4 class="font-medium text-center text-2xl mb-2.5 text-medium-black">
                                    Personalized Experience
                                </h4>
                                <p class="leading-relaxed text-base text-center tracking-wide text-gray">
                                    Polban News offers a personalized experience tailored to
                                    your interests. <br />
                                    You can customize your news feed and select specific topics
                                    or categories that matter to you the most.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="px-14 md:px-0 lg:px-4 lg:w-1/3 md:w-1/3 sm:w-4/6 mx-auto">
                        <div class="flex rounded-lg h-full lg:pt-8 lg:pb-8 md:pt-8 md:pb-8 pt-12 pb-6 flex-col">
                            <div class="items-center text-center">
                                <div class="flex items-center justify-center mb-6">
                                    <x-heroicon-m-document-chart-bar
                                        class="w-14 bg-blue-800 text-white rounded-full" />
                                </div>
                            </div>
                            <div class="flex-grow">
                                <h4 class="font-medium text-center text-2xl mb-2.5 text-medium-black">
                                    Easy Accessibility
                                </h4>
                                <p class="leading-relaxed text-base text-center tracking-wide text-gray">
                                    Polban News provides a convenient and accessible platform
                                    for accessing news. <br />The presence of an admin page on
                                    the website enables partners to easily manage their news
                                    content.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="h-full pt-20 pb-12 lg:px-24 md:px-16 sm:px-8 px-4 bg-white transition-all duration-500 linear">
        <footer class="footer-2-2" style="font-family: 'Poppins', sans-serif">
            <div class="lg:pb-24 pb-16 mx-auto">
                <div class="grid lg:grid-cols-4 sm:grid-cols-2 lg:gap-0 gap-y-6">
                    <div class="">
                        <div class="mb-5">
                            <img src="{{ asset('assets/logo/logo-polban-news.png') }}" class="w-36"
                                alt="" />
                        </div>
                        <nav class="list-none list-footer space-y-5">
                            <li>
                                <a href="">Home</a>
                            </li>
                            <li>
                                <a href="">About</a>
                            </li>
                            <li>
                                <a href="">Features</a>
                            </li>
                            <li>
                                <a href="">Benefit</a>
                            </li>
                        </nav>
                    </div>
                    <div class="">
                        <h2 class="title-font font-semibold text-2xl mb-5">Product</h2>
                        <nav class="list-none list-footer space-y-5">
                            <li>
                                <a href="">Stay Informed</a>
                            </li>
                            <li>
                                <a href="">Easy to Operate</a>
                            </li>
                            <li>
                                <a href="">Personalized Experience</a>
                            </li>
                            <li>
                                <a href="">Easy Accessibility</a>
                            </li>
                        </nav>
                    </div>
                    <div class="">
                        <h2 class="title-font font-semibold text-2xl mb-5">
                            Polban News
                        </h2>
                        <nav class="list-none list-footer space-y-5">
                            <li>
                                <a href="">Contact Us</a>
                            </li>
                            <li>
                                <a href="">Security</a>
                            </li>
                        </nav>
                    </div>
                    <div class="">
                        <h2 class="title-font font-semibold text-2xl mb-5">Support</h2>
                        <nav class="list-none list-footer space-y-5">
                            <li>
                                <a href="">Getting Started</a>
                            </li>
                            <li>
                                <a href="">Help Center</a>
                            </li>
                            <li>
                                <a href="">Server Status</a>
                            </li>
                        </nav>
                    </div>
                </div>
            </div>
            <div class="border-color mx-auto">
                <div class="">
                    <hr />
                </div>
                <div class="container mx-auto flex pt-12 flex-col lg:flex-row items-center space-y-5 lg:space-y-0">
                    <div class="flex title-font font-medium items-center text-gray-900 mb-4 lg:mb-0 md:mb-0 space-x-5"
                        style="cursor: pointer">
                        <svg class="social-media-c" width="30" height="30" viewBox="0 0 30 30"
                            fill="none" xmlns="http://www.w3.org/2000/svg">
                            <circle cx="15" cy="15" r="15" fill="#C7C7C7" />
                            <g clip-path="url(#clip0)">
                                <path
                                    d="M17.6648 9.65667H19.1254V7.11267C18.8734 7.078 18.0068 7 16.9974 7C14.8914 7 13.4488 8.32467 13.4488 10.7593V13H11.1248V15.844H13.4488V23H16.2981V15.8447H18.5281L18.8821 13.0007H16.2974V11.0413C16.2981 10.2193 16.5194 9.65667 17.6648 9.65667V9.65667Z"
                                    fill="white" />
                            </g>
                            <defs>
                                <clipPath id="clip0">
                                    <rect width="16" height="16" fill="white" transform="translate(7 7)" />
                                </clipPath>
                            </defs>
                        </svg>
                        <svg class="social-media-c" width="30" height="30" viewBox="0 0 30 30"
                            fill="none" xmlns="http://www.w3.org/2000/svg">
                            <circle cx="15" cy="15" r="15" fill="#C7C7C7" />
                            <g clip-path="url(#clip0)">
                                <path
                                    d="M23 10.039C22.405 10.3 21.771 10.473 21.11 10.557C21.79 10.151 22.309 9.513 22.553 8.744C21.919 9.122 21.219 9.389 20.473 9.538C19.871 8.897 19.013 8.5 18.077 8.5C16.261 8.5 14.799 9.974 14.799 11.781C14.799 12.041 14.821 12.291 14.875 12.529C12.148 12.396 9.735 11.089 8.114 9.098C7.831 9.589 7.665 10.151 7.665 10.756C7.665 11.892 8.25 12.899 9.122 13.482C8.595 13.472 8.078 13.319 7.64 13.078C7.64 13.088 7.64 13.101 7.64 13.114C7.64 14.708 8.777 16.032 10.268 16.337C10.001 16.41 9.71 16.445 9.408 16.445C9.198 16.445 8.986 16.433 8.787 16.389C9.212 17.688 10.418 18.643 11.852 18.674C10.736 19.547 9.319 20.073 7.785 20.073C7.516 20.073 7.258 20.061 7 20.028C8.453 20.965 10.175 21.5 12.032 21.5C18.068 21.5 21.368 16.5 21.368 12.166C21.368 12.021 21.363 11.881 21.356 11.742C22.007 11.28 22.554 10.703 23 10.039Z"
                                    fill="white" />
                            </g>
                            <defs>
                                <clipPath id="clip0">
                                    <rect width="16" height="16" fill="white" transform="translate(7 7)" />
                                </clipPath>
                            </defs>
                        </svg>
                        <svg class="social-media-p" width="30" height="30" viewBox="0 0 30 30"
                            fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M17.8711 15C17.8711 16.5857 16.5857 17.8711 15 17.8711C13.4143 17.8711 12.1289 16.5857 12.1289 15C12.1289 13.4143 13.4143 12.1289 15 12.1289C16.5857 12.1289 17.8711 13.4143 17.8711 15Z"
                                fill="#C7C7C7" />
                            <path
                                d="M21.7144 9.92039C21.5764 9.5464 21.3562 9.20789 21.0701 8.93002C20.7923 8.64392 20.454 8.42374 20.0797 8.28572C19.7762 8.16785 19.3203 8.02754 18.4805 7.98932C17.5721 7.94789 17.2997 7.93896 14.9999 7.93896C12.6999 7.93896 12.4275 7.94766 11.5193 7.98909C10.6796 8.02754 10.2234 8.16785 9.92014 8.28572C9.54591 8.42374 9.2074 8.64392 8.92976 8.93002C8.64366 9.20789 8.42348 9.54617 8.28523 9.92039C8.16736 10.2239 8.02705 10.6801 7.98883 11.5198C7.9474 12.428 7.93848 12.7004 7.93848 15.0004C7.93848 17.3002 7.9474 17.5726 7.98883 18.481C8.02705 19.3208 8.16736 19.7767 8.28523 20.0802C8.42348 20.4545 8.64343 20.7927 8.92953 21.0706C9.2074 21.3567 9.54568 21.5769 9.91991 21.7149C10.2234 21.833 10.6796 21.9733 11.5193 22.0115C12.4275 22.053 12.6997 22.0617 14.9997 22.0617C17.3 22.0617 17.5723 22.053 18.4803 22.0115C19.3201 21.9733 19.7762 21.833 20.0797 21.7149C20.8309 21.4251 21.4247 20.8314 21.7144 20.0802C21.8323 19.7767 21.9726 19.3208 22.011 18.481C22.0525 17.5726 22.0612 17.3002 22.0612 15.0004C22.0612 12.7004 22.0525 12.428 22.011 11.5198C21.9728 10.6801 21.8325 10.2239 21.7144 9.92039V9.92039ZM14.9999 19.4231C12.5571 19.4231 10.5768 17.4431 10.5768 15.0002C10.5768 12.5573 12.5571 10.5773 14.9999 10.5773C17.4426 10.5773 19.4229 12.5573 19.4229 15.0002C19.4229 17.4431 17.4426 19.4231 14.9999 19.4231ZM19.5977 11.4361C19.0269 11.4361 18.5641 10.9733 18.5641 10.4024C18.5641 9.83159 19.0269 9.36879 19.5977 9.36879C20.1685 9.36879 20.6313 9.83159 20.6313 10.4024C20.6311 10.9733 20.1685 11.4361 19.5977 11.4361Z"
                                fill="#C7C7C7" />
                            <path
                                d="M15 0C6.717 0 0 6.717 0 15C0 23.283 6.717 30 15 30C23.283 30 30 23.283 30 15C30 6.717 23.283 0 15 0ZM23.5613 18.5511C23.5197 19.468 23.3739 20.094 23.161 20.6419C22.7135 21.7989 21.7989 22.7135 20.6419 23.161C20.0942 23.3739 19.468 23.5194 18.5513 23.5613C17.6328 23.6032 17.3394 23.6133 15.0002 23.6133C12.6608 23.6133 12.3676 23.6032 11.4489 23.5613C10.5322 23.5194 9.90601 23.3739 9.35829 23.161C8.78334 22.9447 8.26286 22.6057 7.83257 22.1674C7.39449 21.7374 7.05551 21.2167 6.83922 20.6419C6.62636 20.0942 6.48056 19.468 6.4389 18.5513C6.39656 17.6326 6.38672 17.3392 6.38672 15C6.38672 12.6608 6.39656 12.3674 6.43867 11.4489C6.48033 10.532 6.6259 9.90601 6.83876 9.35806C7.05505 8.78334 7.39426 8.26263 7.83257 7.83257C8.26263 7.39426 8.78334 7.05528 9.35806 6.83899C9.90601 6.62613 10.532 6.48056 11.4489 6.43867C12.3674 6.39679 12.6608 6.38672 15 6.38672C17.3392 6.38672 17.6326 6.39679 18.5511 6.4389C19.468 6.48056 20.094 6.62613 20.6419 6.83876C21.2167 7.05505 21.7374 7.39426 22.1677 7.83257C22.6057 8.26286 22.9449 8.78334 23.161 9.35806C23.3741 9.90601 23.5197 10.532 23.5616 11.4489C23.6034 12.3674 23.6133 12.6608 23.6133 15C23.6133 17.3392 23.6034 17.6326 23.5613 18.5511V18.5511Z"
                                fill="#C7C7C7" />
                        </svg>
                        <svg class="social-media-c" width="30" height="30" viewBox="0 0 30 30"
                            fill="none" xmlns="http://www.w3.org/2000/svg">
                            <circle cx="15" cy="15" r="15" fill="#C7C7C7" />
                            <g clip-path="url(#clip0)">
                                <path
                                    d="M17.9027 22.4467C17.916 22.4427 17.9287 22.4373 17.942 22.4327C26.0853 19.1973 23.8327 7 15 7C10.5673 7 7 10.6133 7 15C7 20.5513 12.6227 24.5127 17.9027 22.4467ZM10.5207 20.3727C11.0887 19.418 12.9267 16.7247 16.064 15.7953C16.72 17.468 17.18 19.4193 17.2253 21.632C14.848 22.4313 12.3407 21.8933 10.5207 20.3727V20.3727ZM18.2087 21.2147C18.1213 19.0887 17.6873 17.2033 17.0687 15.57C18.4567 15.3533 20.0633 15.498 21.8853 16.228C21.498 18.402 20.108 20.2293 18.2087 21.2147V21.2147ZM21.99 15.194C19.9833 14.44 18.2147 14.346 16.684 14.638C16.4473 14.1047 16.1987 13.592 15.9353 13.12C18.284 12.182 19.672 11.0387 20.2933 10.4333C21.39 11.7027 22.0413 13.346 21.99 15.194V15.194ZM19.5833 9.72133C19.018 10.2593 17.6867 11.346 15.41 12.2347C14.294 10.4693 13.1007 9.224 12.3447 8.52667C14.7633 7.53067 17.5527 7.956 19.5833 9.72133V9.72133ZM11.3887 9.01533C11.9593 9.51733 13.212 10.7227 14.4207 12.5867C12.7607 13.1213 10.6793 13.514 8.148 13.5693C8.55067 11.64 9.75333 10.0053 11.3887 9.01533V9.01533ZM8.02133 14.5733C10.8547 14.5273 13.148 14.08 14.9607 13.4747C15.2113 13.914 15.4493 14.3927 15.678 14.89C12.5213 15.8953 10.5487 18.4907 9.79333 19.6627C8.57467 18.3027 7.90267 16.528 8.02133 14.5733V14.5733Z"
                                    fill="white" />
                            </g>
                            <defs>
                                <clipPath id="clip0">
                                    <rect width="16" height="16" fill="white" transform="translate(7 7)" />
                                </clipPath>
                            </defs>
                        </svg>
                    </div>
                    <nav class="mx-auto flex flex-wrap items-center text-base justify-center space-x-5">
                        <a href="" class="footer-link">Terms of Service</a>
                        <span>|</span>
                        <a href="" class="footer-link">Privacy Policy</a>
                        <span>|</span>
                        <a href="" class="footer-link">Licenses</a>
                    </nav>
                    <nav class="flex lg:flex-row flex-col items-center text-base justify-center">
                        <p>Copyright © 2023 | Polban News</p>
                    </nav>
                </div>
            </div>
        </footer>
    </section>

</div>
