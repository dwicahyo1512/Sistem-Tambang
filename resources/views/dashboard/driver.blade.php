@extends('layouts.master')

@section('content')
    <!-- Page-content -->
    <div
        class="group-data-[sidebar-size=lg]:ltr:md:ml-vertical-menu group-data-[sidebar-size=lg]:rtl:md:mr-vertical-menu group-data-[sidebar-size=md]:ltr:ml-vertical-menu-md group-data-[sidebar-size=md]:rtl:mr-vertical-menu-md group-data-[sidebar-size=sm]:ltr:ml-vertical-menu-sm group-data-[sidebar-size=sm]:rtl:mr-vertical-menu-sm pt-[calc(theme('spacing.header')_*_1)] pb-[calc(theme('spacing.header')_*_0.8)] px-4 group-data-[navbar=bordered]:pt-[calc(theme('spacing.header')_*_1.3)] group-data-[navbar=hidden]:pt-0 group-data-[layout=horizontal]:mx-auto group-data-[layout=horizontal]:max-w-screen-2xl group-data-[layout=horizontal]:px-0 group-data-[layout=horizontal]:group-data-[sidebar-size=lg]:ltr:md:ml-auto group-data-[layout=horizontal]:group-data-[sidebar-size=lg]:rtl:md:mr-auto group-data-[layout=horizontal]:md:pt-[calc(theme('spacing.header')_*_1.6)] group-data-[layout=horizontal]:px-3 group-data-[layout=horizontal]:group-data-[navbar=hidden]:pt-[calc(theme('spacing.header')_*_0.9)]">
        <div class="container-fluid group-data-[content=boxed]:max-w-boxed mx-auto">

            <div class="flex flex-col gap-2 py-4 md:flex-row md:items-center print:hidden">
                <div class="grow">
                    <h5 class="text-16">Overview</h5>
                </div>
                <ul class="flex items-center gap-2 text-sm font-normal shrink-0">
                    <li
                        class="relative before:content-['\ea54'] before:font-remix ltr:before:-right-1 rtl:before:-left-1  before:absolute before:text-[18px] before:-top-[3px] ltr:pr-4 rtl:pl-4 before:text-slate-400 dark:text-zink-200">
                        <a href="/dashboard" class="text-slate-400 dark:text-zink-200">Driver</a>
                    </li>
                    <li class="text-slate-700 dark:text-zink-100">
                        Overview
                    </li>
                </ul>
            </div>
            <div class="grid grid-cols-1 gap-x-5 xl:grid-cols-12">
                <div class="xl:col-span-4">
                    <div class="sticky top-[calc(theme('spacing.header')_*_1.3)] mb-5">
                        <div class="card">
                            <div class="card-body">
                                <div class="grid grid-cols-1 gap-5 md:grid-cols-12">
                                    <div class="rounded-md md:col-span-12 md:row-span-2 bg-slate-100 dark:bg-zink-600">
                                        <img src="{{ asset($kendaraanuser->img) }}" alt="">
                                    </div>
                                </div>

                                <div class="flex gap-2 mt-4 shrink-0">
                                    @if ($kendaraanuser->persetujuan == null)
                                        <span
                                            class="w-full text-white bg-yellow-500 border-yellow-500 btn hover:text-white hover:bg-yellow-600 hover:border-yellow-600 focus:text-white focus:bg-yellow-600 focus:border-yellow-600 focus:ring focus:ring-yellow-100 active:text-white active:bg-yellow-600 active:border-yellow-600 active:ring active:ring-yellow-100 dark:ring-yellow-400/20">
                                            Menunggu Konfirmasi Pool
                                        </span>
                                    @elseif ($kendaraanuser->persetujuan == 0)
                                        <span
                                            class="w-full text-white bg-red-500 border-red-500 btn hover:text-white hover:bg-red-600 hover:border-red-600 focus:text-white focus:bg-red-600 focus:border-red-600 focus:ring focus:ring-red-100 active:text-white active:bg-red-600 active:border-red-600 active:ring active:ring-red-100 dark:ring-red-400/20">
                                            Menunggu Konfirmasi Pool
                                        </span>
                                    @else
                                        <span
                                            class="w-full text-white bg-green-500 border-green-500 btn hover:text-white hover:bg-green-600 hover:border-green-600 focus:text-white focus:bg-green-600 focus:border-green-600 focus:ring focus:ring-green-100 active:text-white active:bg-green-600 active:border-green-600 active:ring active:ring-green-100 dark:ring-green-400/20">
                                            Sudah Disetujui
                                        </span>
                                    @endif

                                </div>
                            </div>
                        </div><!--end card-->
                    </div>
                </div><!--end col-->
                <div class="xl:col-span-8">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="mt-3 mb-1">{{ $kendaraanuser->nama }}</h5>
                            <ul class="flex flex-wrap items-center gap-4 mb-5 text-slate-500 dark:text-zink-200">
                                @if (is_null($kendaraanuser->pool))
                                    <li>Pool: <span class="font-medium">Kosong</span></li>
                                    <li>Disetujui: <span class="font-medium">Kosong</span></li>
                                @else
                                    <li>Pool: <a href="#!" class="font-medium">{{ $kendaraanuser->pool->name }}</a>
                                    </li>
                                    <li>Disetujui: <span class="font-medium">{{ $kendaraanuser->pool->created_at }}</span>
                                    </li>
                                @endif

                            </ul>
                            <div class="mt-5">
                                <h6 class="mb-3 text-15">{{ $kendaraanuser->nama }} Description:</h6>
                                {{ $kendaraanuser->keterangan }}
                            </div>

                            <div class="mt-5">
                                <h6 class="mb-3 text-15">Detail Kendaraan:</h6>
                                <div class="overflow-x-auto">
                                    <table class="w-full">
                                        <tbody>
                                            <tr>
                                                <th
                                                    class="px-3.5 py-2.5 font-semibold border-b border-transparent w-64 ltr:text-left rtl:text-right text-slate-500 dark:text-zink-200">
                                                    Status</th>
                                                <td class="px-3.5 py-2.5 border-b border-transparent">
                                                    @if ($kendaraanuser->status == 0)
                                                        Kendaraan sedang non aktif
                                                    @elseif ($kendaraanuser->status == 2)
                                                        Aktif
                                                    @endif
                                                </td>
                                            </tr>
                                            <tr>
                                                <th
                                                    class="px-3.5 py-2.5 font-semibold border-b border-transparent w-64 ltr:text-left rtl:text-right text-slate-500 dark:text-zink-200">
                                                    Type</th>
                                                <td class="px-3.5 py-2.5 border-b border-transparent">
                                                    {{ $kendaraanuser->type }}</td>
                                            </tr>
                                            <tr>
                                                <th
                                                    class="px-3.5 py-2.5 font-semibold border-b border-transparent w-64 ltr:text-left rtl:text-right text-slate-500 dark:text-zink-200">
                                                    Jenis Bahan Bakar</th>
                                                <td class="px-3.5 py-2.5 border-b border-transparent">
                                                    {{ $kendaraanuser->bahan_bakar }}</td>
                                            </tr>
                                            <tr>
                                                <th
                                                    class="px-3.5 py-2.5 font-semibold border-b border-transparent w-64 ltr:text-left rtl:text-right text-slate-500 dark:text-zink-200">
                                                    konsumsi BBM</th>
                                                <td class="px-3.5 py-2.5 border-b border-transparent">
                                                    {{ $kendaraanuser->konsumsi_bbm }}</td>
                                            </tr>
                                            <tr>
                                                <th
                                                    class="px-3.5 py-2.5 font-semibold border-b border-transparent w-64 ltr:text-left rtl:text-right text-slate-500 dark:text-zink-200">
                                                    Jadwal Service</th>
                                                <td class="px-3.5 py-2.5 border-b border-transparent">
                                                    {{ $kendaraanuser->jadwal_service }}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <h6 class="mt-5 mb-3 text-15">Profile Driver</h6>
                            <div class="grid grid-cols-1 gap-5 xl:grid-cols-12">
                                <div class="xl:col-span-12">
                                    <div class="mt-3">
                                        <div class="flex items-center gap-3">
                                            <div class="w-10 h-10 rounded-full shrink-0 bg-sky-100 dark:bg-sky-500/20">
                                                @if (Auth::user()->avatar)
                                                    <img src="{{ asset(Auth::user()->avatar) }}" alt="Avatar"
                                                        class="h-10 rounded-full">
                                                @elseif (Auth::user()->gender === 'male')
                                                    <img src="{{ asset('assets/images/avatar-2.png') }}" alt="Male Avatar"
                                                        class="h-10 rounded-full">
                                                @else
                                                    <img src="{{ asset('assets/images/avatar-3.png') }}"
                                                        alt="Female Avatar" class="h-10 rounded-full">
                                                @endif
                                            </div>
                                            <div class="grow">
                                                <h6 class="text-15"><a href="#!">{{ Auth::user()->name }}</a></h6>
                                                <p class="text-sm text-slate-500 dark:text-zink-200">{{ Auth::user()->created_at }}</p>
                                            </div>
                                        </div>
                                        <div class="mt-5">
                                            <h6 class="mb-3 text-15">Biodata Driver:</h6>
                                            <div class="overflow-x-auto">
                                                <table class="w-full">
                                                    <tbody>
                                                        <tr>
                                                            <th
                                                                class="px-3.5 py-2.5 font-semibold border-b border-transparent w-64 ltr:text-left rtl:text-right text-slate-500 dark:text-zink-200">
                                                                Nama</th>
                                                            <td class="px-3.5 py-2.5 border-b border-transparent">
                                                                {{ $kendaraanuser->user->name }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th
                                                                class="px-3.5 py-2.5 font-semibold border-b border-transparent w-64 ltr:text-left rtl:text-right text-slate-500 dark:text-zink-200">
                                                                Email</th>
                                                            <td class="px-3.5 py-2.5 border-b border-transparent">
                                                                {{ $kendaraanuser->user->email }}</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div><!--end col-->
                            </div><!--end grid-->
                        </div>
                    </div><!--end card-->
                </div><!--end col-->
            </div><!--end grid-->

        </div>
        <!-- container-fluid -->
    </div>
    <!-- End Page-content -->
@endsection
