<!DOCTYPE html>
<html lang="en" class="overflow-x-hidden scroll-smooth group" data-mode="light" dir="ltr">

<head>

    <meta charset="utf-8">
    <title>Product Landing Page | Sistem Tambang & Dashboard Template</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <meta content="Minimal Admin & Dashboard Template" name="description">
    <meta content="Sistem Tambang Kh" name="author">
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ URL::to('assets/images/favicon.ico') }}">
    <link href="../../css2?family=Tourney:wght@100&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="../../aos%403.0.0-beta.6/dist/aos.css">

    <!-- Swiper Slider css-->


    <!-- Layout config Js -->
    <script src="{{ URL::to('assets/js/layout.js') }}"></script>
    <!-- Icons CSS -->

    <!-- StarCode CSS -->


    <link rel="stylesheet" href="{{ URL::to('assets/css/starcode2.css') }}">
</head>

<body class="text-base bg-white text-body font-public dark:text-zink-50 dark:bg-zinc-900">

    <nav class="fixed inset-x-0 top-0 z-50 flex items-center justify-center h-20 py-3 [&.is-sticky]:bg-white dark:[&.is-sticky]:bg-zinc-900 border-b border-slate-200 dark:border-zinc-800 [&.is-sticky]:shadow-lg [&.is-sticky]:shadow-slate-200/25 dark:[&.is-sticky]:shadow-zinc-700/30 navbar"
        id="navbar">
        <div class="container 2xl:max-w-[87.5rem] px-4 mx-auto flex items-center self-center w-full">
            <div class="shrink-0">
                <a href="#!">
                    <img src="assets/images/logo-dark.png" alt="" class="block h-6 dark:hidden">
                    <img src="assets/images/logo-light.png" alt="" class="hidden h-6 dark:block">
                </a>
            </div>
            <div class="mx-auto">
                <ul id="navbar7"
                    class="absolute inset-x-0 z-20 items-center hidden py-3 mt-px bg-white shadow-lg md:mt-0 dark:bg-zinc-800 dark:md:bg-transparent md:z-0 navbar-menu rounded-b-md md:shadow-none md:flex top-full ltr:ml-auto rtl:mr-auto md:relative md:bg-transparent md:rounded-none md:top-auto md:py-0">
                    <li>
                        <a href="#home"
                            class="block md:inline-block px-4 md:px-3 py-2.5 md:py-0.5 text-15 font-medium text-slate-800 transition-all duration-300 ease-linear hover:text-custom-500 [&.active]:text-custom-500 dark:text-zinc-200 dark:hover:text-custom-500 dark:[&.active]:text-custom-500 active">Home</a>
                    </li>
                </ul>
            </div>
            <div class="flex gap-2">
                <div class="ltr:ml-auto rtl:mr-auto md:hidden navbar-toggale-button">
                    <button type="button"
                        class="flex items-center  justify-center size-[37.5px] p-0 text-white btn bg-custom-500 border-custom-500 hover:text-white hover:bg-custom-600 hover:border-custom-600 focus:text-white focus:bg-custom-600 focus:border-custom-600 focus:ring focus:ring-custom-100 active:text-white active:bg-custom-600 active:border-custom-600 active:ring active:ring-custom-100 dark:ring-custom-400/20"><i
                            data-lucide="menu"></i></button>
                </div>
                @if (Route::has('login'))
                @auth
                    <a href="{{ url('/dashboard') }}"
                        class="text-white border-0 btn bg-gradient-to-r from-custom-500 to-purple-500 hover:text-white hover:from-purple-500 hover:to-custom-500">
                        <button type="button">
                            <span class="align-middle">Dashboard</span>
                            <i data-lucide="log-in" class="inline-block size-4 ltr:ml-1 rtl:mr-1"></i>
                        </button>
                    </a>
                    @else
                    <a href="{{ route('login') }}"
                        class="text-white border-0 btn bg-gradient-to-r from-custom-500 to-purple-500 hover:text-white hover:from-purple-500 hover:to-custom-500">
                        <button type="button">
                            <span class="align-middle">Sign In</span>
                            <i data-lucide="log-in" class="inline-block size-4 ltr:ml-1 rtl:mr-1"></i>
                        </button>
                    </a>
                    @endauth
                @endif
            </div>
        </div>
    </nav>

    <section class="relative pb-28 xl:pb-36 pt-44 xl:pt-52" id="home">
        <div class="absolute top-0 left-0 size-64 bg-custom-500 opacity-10 blur-3xl"></div>
        <div class="absolute bottom-0 right-0 size-64 bg-purple-500/10 blur-3xl"></div>
        <div class="container 2xl:max-w-[87.5rem] px-4 mx-auto">
            <div class="grid items-center grid-cols-12 gap-5 2xl:grid-cols-12">
                <div class="col-span-12 xl:col-span-5 2xl:col-span-5">
                    <h1 class="mb-4 !leading-normal lg:text-5xl 2xl:text-6xl dark:text-zinc-100" data-aos="fade-right"
                        data-aos-delay="300">Sistem Tambang</h1>
                    <p class="text-lg mb-7 text-slate-500 dark:text-zinc-400" data-aos="fade-right"
                        data-aos-delay="600">Lorem ipsum dolor sit amet consectetur adipisicing elit. Libero repudiandae minima possimus. Minus iure tempore alias, fuga ratione nulla. Asperiores nisxsi deserunt rem aspernatur laboriosam in illo dolorum dolores itaque?</p>
                    <div class="flex items-center gap-2" data-aos="fade-right" data-aos-delay="800">
                        <a href="{{ route('register') }}" type="button"
                            class="px-8 py-3 text-white border-0 text-15 btn bg-gradient-to-r from-custom-500 to-purple-500 hover:text-white hover:from-purple-500 hover:to-custom-500">Register Now<i data-lucide="user-plus"
                                class="inline-block align-middle size-4 rtl:mr-1 ltr:ml-1"></i></a>
                    </div>
                </div>
                <div class="col-span-12 xl:col-span-7 2xl:col-start-8 2xl:col-span-6">
                    <div class="relative mt-10 xl:mt-0">
                        <div class="absolute text-center -top-20 xl:-right-40 lg:text-[10rem] 2xl:text-[14rem] text-slate-100 dark:text-zinc-800/60 font-tourney"
                            data-aos="zoom-in-down" data-aos-delay="1400">
                           
                        </div>
                        <img src="assets/images/offer.png" alt=""
                            class="absolute h-40 left-10 xl:-left-10 top-32" data-aos="fade-down-right"
                            data-aos-delay="900" data-aos-easing="linear">
                        <div class="relative" data-aos="zoom-in" data-aos-delay="500">
                            <button data-tooltip="default" data-tooltip-content="$199.99"
                                class="absolute items-center justify-center hidden bg-white rounded-full size-8 xl:flex bottom-20 text-slate-800 left-20"><i
                                    data-lucide="plus"></i></button>
                            <img src="assets/images/bulldozer.png" alt="" class="mx-auto">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section><!--end -->
    <footer class="relative pt-20 pb-12 border-t border-slate-200 dark:border-zinc-800">
        <div class="absolute left-0 bg-purple-500 size-64 -top-16 opacity-10 blur-3xl"></div>
        <div class="container 2xl:max-w-[87.5rem] px-4 mx-auto">
            <div class="relative z-10 grid grid-cols-12 gap-5 xl:grid-cols-12">
                <div class="col-span-12 md:col-span-12 lg:col-span-12 xl:col-span-4">
                    <div class="mb-5">
                        <a href="#!"><img src="assets/images/logo-light.png" alt=""
                                class="hidden h-7 dark:block"></a>
                        <a href="#!"><img src="assets/images/logo-dark.png" alt=""
                                class="block h-7 dark:hidden"></a>
                    </div>
                    <p class="mb-5 text-slate-500 dark:text-zinc-400">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Laudantium et atque eos ad beatae cumque expedita ipsam sint nesciunt, voluptate non error accusantium porro vel nam dolor quaerat a cum.</p>
                    <ul class="flex items-center gap-3">
                        <li>
                            <a href="https://web.facebook.com/"
                                class="flex items-center justify-center transition-all duration-200 ease-linear border rounded-full size-10 text-slate-500 border-slate-200 dark:text-zinc-400 dark:border-zinc-800 hover:text-custom-500 dark:hover:text-custom-500"><i
                                    data-lucide="facebook" class="size-4"></i></a>
                        </li>
                        <li>
                            <a href="https://www.linkedin.com/in/devdwicahyo/"
                                class="flex items-center justify-center transition-all duration-200 ease-linear border rounded-full size-10 text-slate-500 border-slate-200 dark:text-zinc-400 dark:border-zinc-800 hover:text-custom-500 dark:hover:text-custom-500"><i
                                    data-lucide="linkedin" class="size-4"></i></a>
                        </li>
                        <li>
                            <a href="https://www.instagram.com/m_dwi_cahyo15/"
                                class="flex items-center justify-center transition-all duration-200 ease-linear border rounded-full size-10 text-slate-500 border-slate-200 dark:text-zinc-400 dark:border-zinc-800 hover:text-custom-500 dark:hover:text-custom-500"><i
                                    data-lucide="instagram" class="size-4"></i></a>
                        </li>
                        <li>
                            <a href="https://twitter.com/MDwiCahyo15"
                                class="flex items-center justify-center transition-all duration-200 ease-linear border rounded-full size-10 text-slate-500 border-slate-200 dark:text-zinc-400 dark:border-zinc-800 hover:text-custom-500 dark:hover:text-custom-500"><i
                                    data-lucide="twitter" class="size-4"></i></a>
                        </li>
                        <li>
                            <a href="https://github.com/dwicahyo1512"
                                class="flex items-center justify-center transition-all duration-200 ease-linear border rounded-full size-10 text-slate-500 border-slate-200 dark:text-zinc-400 dark:border-zinc-800 hover:text-custom-500 dark:hover:text-custom-500"><i
                                    data-lucide="github" class="size-4"></i></a>
                        </li>
                    </ul>
                </div>
                <div class="col-span-12 md:col-span-4 lg:col-span-4 xl:col-span-3">
                    <h5 class="mb-4 font-medium tracking-wider dark:text-zink-50">Resource</h5>
                    <ul class="flex flex-col gap-3 text-15">
                        <li>
                            <a href="https://laravel.com/"
                                class="relative inline-block transition-all duration-200 ease-linear text-slate-500 dark:text-zinc-400 hover:text-slate-800 dark:hover:text-zinc-50 before:absolute before:border-b before:border-slate-200 dark:before:border-zinc-700 before:inset-x-0 before:bottom-0 before:w-0 hover:before:w-full before:transition-all before:duration-300 before:ease-linear">Laravel</a>
                        </li>
                    </ul>
                </div><!--end col-->
                <div class="col-span-12 md:col-span-4 lg:col-span-4 xl:col-span-3">
                    <h5 class="mb-4 font-medium tracking-wider dark:text-zinc-50">My Portfolio</h5>
                    <ul class="flex flex-col gap-3 text-15">
                        <li>
                            <a href="https://portfoliocahyo.netlify.app/"
                                class="relative inline-block transition-all duration-200 ease-linear text-slate-500 dark:text-zinc-400 hover:text-slate-800 dark:hover:text-zinc-50 before:absolute before:border-b before:border-slate-200 dark:before:border-zinc-700 before:inset-x-0 before:bottom-0 before:w-0 hover:before:w-full before:transition-all before:duration-300 before:ease-linear">MY portfolio</a>
                        </li>
                    </ul>
                </div><!--end col-->
                <div class="col-span-12 md:col-span-4 lg:col-span-4 xl:col-span-2">
                    <h5 class="mb-4 font-medium tracking-wider dark:text-zink-50">Get Help</h5>
                    <ul class="flex flex-col gap-3 text-15">
                        <li>
                            <a href="https://wa.me/6283851574470"
                                class="relative inline-block transition-all duration-200 ease-linear text-slate-500 dark:text-zinc-400 hover:text-slate-800 dark:hover:text-zinc-50 before:absolute before:border-b before:border-slate-200 dark:before:border-zinc-700 before:inset-x-0 before:bottom-0 before:w-0 hover:before:w-full before:transition-all before:duration-300 before:ease-linear">Whatshapp</a>
                        </li>
                    </ul>
                </div><!--end col-->
            </div><!--end grid-->

        </div>
        <div class="pt-10 mt-16 text-center border-t text-slate-500 dark:text-zinc-400 dark:border-zinc-800 text-16">
            <p>
                <script>
                    document.write(new Date().getFullYear())
                </script> Sistem Tambang Kh Design & Develop by <a href="#!"
                    class="underline text-slate-800 dark:text-zinc-100">Sistem Tambang Kh</a>
            </p>
        </div>
    </footer>

    <button id="back-to-top"
        class="fixed flex items-center justify-center text-white bg-purple-500 rounded-md size-10 bottom-10 right-10">
        <i data-lucide="chevron-up" class="animate animate-icons"></i>
    </button>

    <script src='assets/libs/choices.js/public/assets/scripts/choices.min.js'></script>
    <script src="assets/libs/%40popperjs/core/umd/popper.min.js"></script>
    <script src="assets/libs/tippy.js/tippy-bundle.umd.min.js"></script>
    <script src="assets/libs/simplebar/simplebar.min.js"></script>
    <script src="assets/libs/prismjs/prism.js"></script>
    <script src="assets/libs/lucide/umd/lucide.js"></script>
    <script src="assets/js/starcode.bundle.js"></script>
    <script src="assets/libs/swiper/swiper-bundle.min.js"></script>
    <script src="assets/libs/aos/aos.js"></script>

    <script src="assets/js/pages/landing-product.init.js"></script>

</body>

</html>
