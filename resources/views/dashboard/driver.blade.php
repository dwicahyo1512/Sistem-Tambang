@extends('layouts.master')

@section('content')
    <!-- Page-content -->
    <div
        class="group-data-[sidebar-size=lg]:ltr:md:ml-vertical-menu group-data-[sidebar-size=lg]:rtl:md:mr-vertical-menu group-data-[sidebar-size=md]:ltr:ml-vertical-menu-md group-data-[sidebar-size=md]:rtl:mr-vertical-menu-md group-data-[sidebar-size=sm]:ltr:ml-vertical-menu-sm group-data-[sidebar-size=sm]:rtl:mr-vertical-menu-sm pt-[calc(theme('spacing.header')_*_1)] pb-[calc(theme('spacing.header')_*_0.8)] px-4 group-data-[navbar=bordered]:pt-[calc(theme('spacing.header')_*_1.3)] group-data-[navbar=hidden]:pt-0 group-data-[layout=horizontal]:mx-auto group-data-[layout=horizontal]:max-w-screen-2xl group-data-[layout=horizontal]:px-0 group-data-[layout=horizontal]:group-data-[sidebar-size=lg]:ltr:md:ml-auto group-data-[layout=horizontal]:group-data-[sidebar-size=lg]:rtl:md:mr-auto group-data-[layout=horizontal]:md:pt-[calc(theme('spacing.header')_*_1.6)] group-data-[layout=horizontal]:px-3 group-data-[layout=horizontal]:group-data-[navbar=hidden]:pt-[calc(theme('spacing.header')_*_0.9)]">
        <div class="container-fluid group-data-[content=boxed]:max-w-boxed mx-auto">

            <div class="flex flex-col gap-2 py-4 md:flex-row md:items-center print:hidden">
                <div class="grow">
                    <h5 class="text-16">Analytics</h5>
                </div>
                <ul class="flex items-center gap-2 text-sm font-normal shrink-0">
                    <li
                        class="relative before:content-['\ea54'] before:font-remix ltr:before:-right-1 rtl:before:-left-1  before:absolute before:text-[18px] before:-top-[3px] ltr:pr-4 rtl:pl-4 before:text-slate-400 dark:text-zink-200">
                        <a href="#!" class="text-slate-400 dark:text-zink-200">Dashboards</a>
                    </li>
                    <li class="text-slate-700 dark:text-zink-100">
                        Analytics
                    </li>
                </ul>
            </div>
            <div class="grid grid-cols-12 gap-x-5">
                <div
                    class="order-1 md:col-span-6 lg:col-span-3 col-span-12 2xl:order-1 bg-green-100 dark:bg-green-500/20 card 2xl:col-span-2 group-data-[skin=bordered]:border-green-500/20 relative overflow-hidden">
                    <div class="card-body">
                        <i data-lucide="kanban"
                            class="absolute top-0 stroke-1 size-32 text-green-200/50 dark:text-green-500/20 ltr:-right-10 rtl:-left-10"></i>
                        <div class="flex items-center justify-center bg-green-500 rounded-md size-12 text-15 text-green-50">
                            <i data-lucide="users"></i>
                        </div>
                        <h5 class="mt-5 mb-2"><span class="counter-value" data-target="{{$userCount}}">0</span></h5>
                        <p class="text-slate-500 dark:text-slate-200">Total Users</p>
                    </div>
                </div><!--end col-->
                <div
                    class="order-2 md:col-span-6 lg:col-span-3 col-span-12 2xl:order-1 bg-orange-100 dark:bg-orange-500/20 card 2xl:col-span-2 group-data-[skin=bordered]:border-orange-500/20 relative overflow-hidden">
                    <div class="card-body">
                        <i data-lucide="list-filter"
                            class="absolute top-0 stroke-1 size-32 text-orange-200/50 dark:text-orange-500/20 ltr:-right-10 rtl:-left-10"></i>
                        <div
                            class="flex items-center justify-center bg-orange-500 rounded-md size-12 text-15 text-orange-50">
                            <i data-lucide="users"></i>
                        </div>
                        <h5 class="mt-5 mb-2"><span class="counter-value" data-target="{{$adminCount}}">0</span></h5>
                        <p class="text-slate-500 dark:text-slate-200">Total Role Admin</p>
                    </div>
                </div><!--end col-->
                <div class="order-5 col-span-12 2xl:order-1 card 2xl:row-span-2 2xl:col-span-8">
                    <div class="card-body">
                        <div class="flex items-center gap-2 mb-3">
                            <h6 class="text-15 grow">Daily Visit Insights <a href="#!" data-tooltip="default"
                                    data-tooltip-content="Analyst or business user discovering a pattern in data or a relationship between variables"
                                    class="inline-block align-middle ltr:ml-1 rtl:mr-1 text-slate-500 dark:text-zink-200"><i
                                        data-lucide="info" class="size-4"></i></a></h6>
                            <div class="relative dropdown shrink-0">
                                <button type="button"
                                    class="flex items-center justify-center size-[30px] p-0 bg-white text-slate-500 btn hover:text-slate-500 hover:bg-slate-100 focus:text-slate-500 focus:bg-slate-100 active:text-slate-500 active:bg-slate-100 dark:bg-zink-700 dark:hover:bg-slate-500/10 dark:focus:bg-slate-500/10 dark:active:bg-slate-500/10 dropdown-toggle"
                                    id="dailyVisitInsightsDropdown" data-bs-toggle="dropdown">
                                    <i data-lucide="more-vertical" class="inline-block size-4"></i>
                                </button>

                                <ul class="absolute z-50 hidden py-2 mt-1 ltr:text-left rtl:text-right list-none bg-white rounded-md shadow-md dropdown-menu min-w-[10rem] dark:bg-zink-600"
                                    aria-labelledby="dailyVisitInsightsDropdown">
                                    <li>
                                        <a class="block px-4 py-1.5 text-base transition-all duration-200 ease-linear text-slate-600 dropdown-item hover:bg-slate-100 hover:text-slate-500 focus:bg-slate-100 focus:text-slate-500 dark:text-zink-100 dark:hover:bg-zink-500 dark:hover:text-zink-200 dark:focus:bg-zink-500 dark:focus:text-zink-200"
                                            href="#!">1 Weekly</a>
                                    </li>
                                    <li>
                                        <a class="block px-4 py-1.5 text-base transition-all duration-200 ease-linear text-slate-600 dropdown-item hover:bg-slate-100 hover:text-slate-500 focus:bg-slate-100 focus:text-slate-500 dark:text-zink-100 dark:hover:bg-zink-500 dark:hover:text-zink-200 dark:focus:bg-zink-500 dark:focus:text-zink-200"
                                            href="#!">1 Monthly</a>
                                    </li>
                                    <li>
                                        <a class="block px-4 py-1.5 text-base transition-all duration-200 ease-linear text-slate-600 dropdown-item hover:bg-slate-100 hover:text-slate-500 focus:bg-slate-100 focus:text-slate-500 dark:text-zink-100 dark:hover:bg-zink-500 dark:hover:text-zink-200 dark:focus:bg-zink-500 dark:focus:text-zink-200"
                                            href="#!">3 Monthly</a>
                                    </li>
                                    <li>
                                        <a class="block px-4 py-1.5 text-base transition-all duration-200 ease-linear text-slate-600 dropdown-item hover:bg-slate-100 hover:text-slate-500 focus:bg-slate-100 focus:text-slate-500 dark:text-zink-100 dark:hover:bg-zink-500 dark:hover:text-zink-200 dark:focus:bg-zink-500 dark:focus:text-zink-200"
                                            href="#!">6 Monthly</a>
                                    </li>
                                    <li>
                                        <a class="block px-4 py-1.5 text-base transition-all duration-200 ease-linear text-slate-600 dropdown-item hover:bg-slate-100 hover:text-slate-500 focus:bg-slate-100 focus:text-slate-500 dark:text-zink-100 dark:hover:bg-zink-500 dark:hover:text-zink-200 dark:focus:bg-zink-500 dark:focus:text-zink-200"
                                            href="#!">This Yearly</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div id="dailyVisitInsightsChart" class="apex-charts"
                            data-chart-colors='["bg-green-500", "bg-purple-500"]' dir="ltr"></div>
                    </div>
                </div><!--end col-->
                <div
                    class="order-3 md:col-span-6 lg:col-span-3 col-span-12 2xl:order-1 bg-sky-100 dark:bg-sky-500/20 card 2xl:col-span-2 group-data-[skin=bordered]:border-sky-500/20 relative overflow-hidden">
                    <div class="card-body">
                        <i data-lucide="list-filter"
                            class="absolute top-0 stroke-1 size-32 text-sky-200/50 dark:text-sky-500/20 ltr:-right-10 rtl:-left-10"></i>
                        <div class="flex items-center justify-center rounded-md size-12 bg-sky-500 text-15 text-sky-50">
                            <i data-lucide="users"></i>
                        </div>
                        <h5 class="mt-5 mb-2"><span class="counter-value" data-target="{{$poolCount}}">0</span></h5>
                        <p class="text-slate-500 dark:text-slate-200">Total Pool</p>
                    </div>
                </div><!--end col-->
                <div
                    class="order-4 md:col-span-6 lg:col-span-3 col-span-12 2xl:order-1 bg-purple-100 dark:bg-purple-500/20 card 2xl:col-span-2 group-data-[skin=bordered]:border-purple-500/20 relative overflow-hidden">
                    <div class="card-body">
                        <i data-lucide="kanban"
                            class="absolute top-0 stroke-1 size-32 text-purple-200/50 dark:text-purple-500/20 ltr:-right-10 rtl:-left-10"></i>
                        <div
                            class="flex items-center justify-center bg-purple-500 rounded-md size-12 text-15 text-purple-50">
                            <i data-lucide="users"></i>
                        </div>
                        <h5 class="mt-5 mb-2"><span class="counter-value" data-target="{{$clientCount}}">0</span></h5>
                        <p class="text-slate-500 dark:text-slate-200">Total Driver</p>
                    </div>
                </div><!--end col-->
                <div class="order-6 col-span-12 2xl:order-1 card 2xl:col-span-5">
                    <div class="card-body">
                        <div class="flex items-center gap-2">
                            <h6 class="mb-3 text-15 grow">Location-Based Response Times</h6>
                            <div class="shrink-0">
                                <button type="button"
                                    class="px-2 py-1.5 text-xs text-custom-500 btn bg-custom-100 hover:text-white hover:bg-custom-600 focus:text-white focus:bg-custom-600 focus:ring focus:ring-custom-100 active:text-white active:bg-custom-600 active:ring active:ring-custom-100 dark:bg-custom-500/20 dark:text-custom-500 dark:hover:bg-custom-500 dark:hover:text-white dark:focus:bg-custom-500 dark:focus:text-white dark:active:bg-custom-500 dark:active:text-white dark:ring-custom-400/20">
                                    View More <i data-lucide="move-right"
                                        class="inline-block size-4 ltr:ml-1 rlt:mr-1 rtl:-rotate-180"></i>
                                </button>
                            </div>
                        </div>

                        <div id="responseTimes" class="apex-charts" data-chart-colors='["bg-red-500"]' dir="ltr"></div>
                    </div>
                </div><!--end col-->
                <div class="order-7 col-span-12 2xl:order-1 card 2xl:col-span-7">
                    <div class="card-body">
                        <div class="flex items-center gap-2">
                            <h6 class="mb-3 text-15 grow">Pages Interaction</h6>
                            <div class="relative dropdown shrink-0">
                                <button type="button"
                                    class="px-2 py-1.5 text-xs bg-text-slate-500 btn bg-slate-100 hover:text-white hover:bg-slate-600 focus:text-white focus:bg-slate-600 focus:ring focus:ring-slate-100 active:text-white active:bg-slate-600 active:ring active:ring-slate-100 dark:bg-slate-500/20 dark:text-slate-400 dark:hover:bg-slate-500 dark:hover:text-white dark:focus:bg-slate-500 dark:focus:text-white dark:active:bg-slate-500 dark:active:text-white dark:ring-slate-400/20 dropdown-toggle"
                                    id="emailDataDropdown" data-bs-toggle="dropdown">
                                    This Yearly <i data-lucide="chevron-down"
                                        class="inline-block size-4 ltr:ml-1 rlt:mr-1"></i>
                                </button>

                                <ul class="absolute z-50 hidden py-2 mt-1 ltr:text-left rtl:text-right list-none bg-white rounded-md shadow-md dropdown-menu min-w-[10rem] dark:bg-zink-600"
                                    aria-labelledby="emailDataDropdown">
                                    <li>
                                        <a class="block px-4 py-1.5 text-base transition-all duration-200 ease-linear text-slate-600 dropdown-item hover:bg-slate-100 hover:text-slate-500 focus:bg-slate-100 focus:text-slate-500 dark:text-zink-100 dark:hover:bg-zink-500 dark:hover:text-zink-200 dark:focus:bg-zink-500 dark:focus:text-zink-200"
                                            href="#!">1 Weekly</a>
                                    </li>
                                    <li>
                                        <a class="block px-4 py-1.5 text-base transition-all duration-200 ease-linear text-slate-600 dropdown-item hover:bg-slate-100 hover:text-slate-500 focus:bg-slate-100 focus:text-slate-500 dark:text-zink-100 dark:hover:bg-zink-500 dark:hover:text-zink-200 dark:focus:bg-zink-500 dark:focus:text-zink-200"
                                            href="#!">1 Monthly</a>
                                    </li>
                                    <li>
                                        <a class="block px-4 py-1.5 text-base transition-all duration-200 ease-linear text-slate-600 dropdown-item hover:bg-slate-100 hover:text-slate-500 focus:bg-slate-100 focus:text-slate-500 dark:text-zink-100 dark:hover:bg-zink-500 dark:hover:text-zink-200 dark:focus:bg-zink-500 dark:focus:text-zink-200"
                                            href="#!">3 Monthly</a>
                                    </li>
                                    <li>
                                        <a class="block px-4 py-1.5 text-base transition-all duration-200 ease-linear text-slate-600 dropdown-item hover:bg-slate-100 hover:text-slate-500 focus:bg-slate-100 focus:text-slate-500 dark:text-zink-100 dark:hover:bg-zink-500 dark:hover:text-zink-200 dark:focus:bg-zink-500 dark:focus:text-zink-200"
                                            href="#!">6 Monthly</a>
                                    </li>
                                    <li>
                                        <a class="block px-4 py-1.5 text-base transition-all duration-200 ease-linear text-slate-600 dropdown-item hover:bg-slate-100 hover:text-slate-500 focus:bg-slate-100 focus:text-slate-500 dark:text-zink-100 dark:hover:bg-zink-500 dark:hover:text-zink-200 dark:focus:bg-zink-500 dark:focus:text-zink-200"
                                            href="#!">This Yearly</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div id="pagesInteraction" class="apex-charts"
                            data-chart-colors='["bg-custom-500", "bg-purple-500"]' dir="ltr"></div>
                    </div>
                </div><!--end col-->
            </div>
        </div>
        <!-- container-fluid -->
    </div>
    <!-- End Page-content -->
@endsection
