
@extends('layouts.master')

@section('content')
    <div
        class="group-data-[sidebar-size=lg]:ltr:md:ml-vertical-menu group-data-[sidebar-size=lg]:rtl:md:mr-vertical-menu group-data-[sidebar-size=md]:ltr:ml-vertical-menu-md group-data-[sidebar-size=md]:rtl:mr-vertical-menu-md group-data-[sidebar-size=sm]:ltr:ml-vertical-menu-sm group-data-[sidebar-size=sm]:rtl:mr-vertical-menu-sm pt-[calc(theme('spacing.header')_*_1)] pb-[calc(theme('spacing.header')_*_0.8)] px-4 group-data-[navbar=bordered]:pt-[calc(theme('spacing.header')_*_1.3)] group-data-[navbar=hidden]:pt-0 group-data-[layout=horizontal]:mx-auto group-data-[layout=horizontal]:max-w-screen-2xl group-data-[layout=horizontal]:px-0 group-data-[layout=horizontal]:group-data-[sidebar-size=lg]:ltr:md:ml-auto group-data-[layout=horizontal]:group-data-[sidebar-size=lg]:rtl:md:mr-auto group-data-[layout=horizontal]:md:pt-[calc(theme('spacing.header')_*_1.6)] group-data-[layout=horizontal]:px-3 group-data-[layout=horizontal]:group-data-[navbar=hidden]:pt-[calc(theme('spacing.header')_*_0.9)]">
        <div class="container-fluid group-data-[content=boxed]:max-w-boxed mx-auto">

            <div class="flex flex-col gap-2 py-4 md:flex-row md:items-center print:hidden">
                <div class="grow">
                    <h5 class="text-16">Riwayat Kendaraan</h5>
                </div>
                <ul class="flex items-center gap-2 text-sm font-normal shrink-0">
                    <li
                        class="relative before:content-['\ea54'] before:font-remix ltr:before:-right-1 rtl:before:-left-1  before:absolute before:text-[18px] before:-top-[3px] ltr:pr-4 rtl:pl-4 before:text-slate-400 dark:text-zink-200">
                        <a href="{{ route('kendaraans.index') }}" class="text-slate-400 dark:text-zink-200">Kendaraan</a>
                    </li>
                    <li class="text-slate-700 dark:text-zink-100">
                        Riwayat Kendaraan
                    </li>
                </ul>
            </div>
            <div class="card">
                <div class="card-body">
                    <h6 class="mb-4 text-15">Riwayat Kendaraan Ini</h6>                 
                    <div class="overflow-x-auto">
                        <table class="w-full bg-custom-50 dark:bg-custom-500/10 mb-5">
                            <thead class="ltr:text-left rtl:text-right bg-custom-100 dark:bg-custom-500/10">
                                <tr>
                                    <th
                                        class="px-3.5 py-2.5 font-semibold border-b border-custom-200 dark:border-custom-900">
                                        No</th>
                                    <th
                                        class="px-3.5 py-2.5 font-semibold border-b border-custom-200 dark:border-custom-900">
                                        Nama Kendaraan</th>
                                    <th
                                        class="px-3.5 py-2.5 font-semibold border-b border-custom-200 dark:border-custom-900">
                                        Driver</th>
                                    <th
                                        class="px-3.5 py-2.5 font-semibold border-b border-custom-200 dark:border-custom-900">
                                        Nama Penyetuju</th>
                                    <th
                                        class="px-3.5 py-2.5 font-semibold border-b border-custom-200 dark:border-custom-900">
                                        Type</th>
                                    <th
                                        class="px-3.5 py-2.5 font-semibold border-b border-custom-200 dark:border-custom-900">
                                        Bahan Bakar</th>
                                    <th
                                        class="px-3.5 py-2.5 font-semibold border-b border-custom-200 dark:border-custom-900">
                                        Konsumsi BBM</th>
                                    <th
                                        class="px-3.5 py-2.5 font-semibold border-b border-custom-200 dark:border-custom-900">
                                        Jadwal Service</th>
                                    <th
                                        class="px-3.5 py-2.5 font-semibold border-b border-custom-200 dark:border-custom-900">keterangan</th>
                                    <th
                                        class="px-3.5 py-2.5 font-semibold border-b border-custom-200 dark:border-custom-900">Tanggal Created</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($kendaraans as $index => $kendaraan)
                                    <tr>
                                        <td class="px-3.5 py-2.5 border-y border-custom-200 dark:border-custom-900">
                                            {{ $index + 1 }}</td>
                                        <td class="px-3.5 py-2.5 border-y border-custom-200 dark:border-custom-900">
                                            {{ $kendaraan->nama_driver }}</td>
                                        <td class="px-3.5 py-2.5 border-y border-custom-200 dark:border-custom-900">
                                            {{ $kendaraan->nama_kendaraan }}</td>
                                        <td class="px-3.5 py-2.5 border-y border-custom-200 dark:border-custom-900">
                                            {{ $kendaraan->nama_pool }}</td>
                                        <td class="px-3.5 py-2.5 border-y border-custom-200 dark:border-custom-900">
                                            {{ $kendaraan->type }}</td>
                                        <td class="px-3.5 py-2.5 border-y border-custom-200 dark:border-custom-900">
                                            {{ $kendaraan->bahan_bakar }}</td>
                                        <td class="px-3.5 py-2.5 border-y border-custom-200 dark:border-custom-900">
                                            {{ $kendaraan->konsumsi_bbm }}</td>
                                        <td class="px-3.5 py-2.5 border-y border-custom-200 dark:border-custom-900">
                                            {{ $kendaraan->jadwal_service }}</td>
                                        <td class="px-3.5 py-2.5 border-y border-custom-200 dark:border-custom-900">
                                            {{ $kendaraan->keterangan }}</td>
                                        <td class="px-3.5 py-2.5 border-y border-custom-200 dark:border-custom-900">
                                            {{ $kendaraan->created_at }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $kendaraans->links() }}
                    </div>
                </div>
            </div><!--end card-->
        </div>
        <!-- container-fluid -->
    </div>
    <!-- End Page-wrapper -->
@endsection
@section('modal')
@endsection
@section('script')
@endsection
