@extends('layouts.master')

@section('content')
    <div
        class="group-data-[sidebar-size=lg]:ltr:md:ml-vertical-menu group-data-[sidebar-size=lg]:rtl:md:mr-vertical-menu group-data-[sidebar-size=md]:ltr:ml-vertical-menu-md group-data-[sidebar-size=md]:rtl:mr-vertical-menu-md group-data-[sidebar-size=sm]:ltr:ml-vertical-menu-sm group-data-[sidebar-size=sm]:rtl:mr-vertical-menu-sm pt-[calc(theme('spacing.header')_*_1)] pb-[calc(theme('spacing.header')_*_0.8)] px-4 group-data-[navbar=bordered]:pt-[calc(theme('spacing.header')_*_1.3)] group-data-[navbar=hidden]:pt-0 group-data-[layout=horizontal]:mx-auto group-data-[layout=horizontal]:max-w-screen-2xl group-data-[layout=horizontal]:px-0 group-data-[layout=horizontal]:group-data-[sidebar-size=lg]:ltr:md:ml-auto group-data-[layout=horizontal]:group-data-[sidebar-size=lg]:rtl:md:mr-auto group-data-[layout=horizontal]:md:pt-[calc(theme('spacing.header')_*_1.6)] group-data-[layout=horizontal]:px-3 group-data-[layout=horizontal]:group-data-[navbar=hidden]:pt-[calc(theme('spacing.header')_*_0.9)]">
        <div class="container-fluid group-data-[content=boxed]:max-w-boxed mx-auto">

            <div class="flex flex-col gap-2 py-4 md:flex-row md:items-center print:hidden">
                <div class="grow">
                    <h5 class="text-16">List Kendaraan</h5>
                </div>
                <ul class="flex items-center gap-2 text-sm font-normal shrink-0">
                    <li
                        class="relative before:content-['\ea54'] before:font-remix ltr:before:-right-1 rtl:before:-left-1  before:absolute before:text-[18px] before:-top-[3px] ltr:pr-4 rtl:pl-4 before:text-slate-400 dark:text-zink-200">
                        <a href="{{ route('kendaraans.index') }}" class="text-slate-400 dark:text-zink-200">Kendaraan</a>
                    </li>
                    <li class="text-slate-700 dark:text-zink-100">
                        List Kendaraan
                    </li>
                </ul>
            </div>
            <div class="card">
                <div class="card-body">
                    <h6 class="mb-4 text-15">Kendaraan Table</h6>
                    <form action="{{ route('export-laporan') }}" method="GET">
                        <div class="mb-5 flex items-center justify-between gap-4">
                            <div class="card-body">
                                <input type="text" name="date-range" class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200" data-provider="flatpickr" data-date-format="Y-m-d" data-range-date="true" readonly="readonly" placeholder="Select Date">
                                <button type="submit" class="bg-white border-dashed text-green-500 btn border-green-500 hover:text-green-500 hover:bg-green-50 hover:border-green-600 focus:text-green-600 focus:bg-green-50 focus:border-green-600 active:text-green-600 active:bg-green-50 active:border-green-600 dark:bg-zink-700 dark:ring-green-400/20 dark:hover:bg-green-800/20 dark:focus:bg-green-800/20 dark:active:bg-green-800/20">
                                    <i class="align-baseline ltr:pr-1 rtl:pl-1 ri-file-excel-2-line"></i>
                                </button>
                            </div>
                        </div>
                    </form>                    
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
                                        Gambar Kendaraan</th>
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
                                        class="px-3.5 py-2.5 font-semibold border-b border-custom-200 dark:border-custom-900">
                                        Riwayat</th>
                                    <th
                                        class="px-3.5 py-2.5 font-semibold border-b border-custom-200 dark:border-custom-900">
                                        Status</th>
                                    <th
                                        class="px-3.5 py-2.5 font-semibold border-b border-custom-200 dark:border-custom-900">
                                        Persetujuan Pool</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($kendaraans as $index => $kendaraan)
                                    <tr>
                                        <td class="px-3.5 py-2.5 border-y border-custom-200 dark:border-custom-900">
                                            {{ $index + 1 }}</td>
                                        <td class="px-3.5 py-2.5 border-y border-custom-200 dark:border-custom-900">
                                            {{ $kendaraan->nama }}</td>
                                        <td class="px-3.5 py-2.5 border-y border-custom-200 dark:border-custom-900">
                                            {{ $kendaraan->kendaraan_id }}</td>
                                        <td class="px-3.5 py-2.5 border-y border-custom-200 dark:border-custom-900">
                                            <img src="{{ asset($kendaraan->img) }}" alt="Image"
                                                class="w-24 h-24 rounded">
                                        </td>
                                        <td class="px-3.5 py-2.5 border-y border-custom-200 dark:border-custom-900">
                                            {{ $kendaraan->type }}</td>
                                        <td class="px-3.5 py-2.5 border-y border-custom-200 dark:border-custom-900">
                                            {{ $kendaraan->bahan_bakar }}</td>
                                        <td class="px-3.5 py-2.5 border-y border-custom-200 dark:border-custom-900">
                                            {{ $kendaraan->konsumsi_bbm }}</td>
                                        <td class="px-3.5 py-2.5 border-y border-custom-200 dark:border-custom-900">
                                            {{ $kendaraan->jadwal_service }}</td>
                                        <td class="px-3.5 py-2.5 border-y border-custom-200 dark:border-custom-900">
                                            {{ $kendaraan->riwayat }}</td>
                                        <td class="px-3.5 py-2.5 border-y border-custom-200 dark:border-custom-900">
                                            @if ($kendaraan->status === 0)
                                                <span
                                                    class="px-2.5 py-0.5 inline-block text-xs font-medium rounded border bg-ren-100 border-transparent text-ren-500 dark:bg-ren-500/20 dark:border-transparent">Nonaktif</span>
                                            @elseif($kendaraan->status === 1)
                                                <span
                                                    class="px-2.5 py-0.5 inline-block text-xs font-medium rounded border bg-orange-100 border-transparent text-orange-500 dark:bg-orange-500/20 dark:border-transparent">Tersedia</span>
                                            @elseif($kendaraan->status === 2)
                                                <span
                                                    class="px-2.5 py-0.5 inline-block text-xs font-medium rounded border bg-green-100 border-transparent text-green-500 dark:bg-green-500/20 dark:border-transparent">Terpakai</span>
                                            @endif
                                        </td>
                                        <td class="px-3.5 py-2.5 border-y border-custom-200 dark:border-custom-900">
                                            @can('read pool')
                                                @if ($kendaraan->persetujuan === 0)
                                                    <span
                                                        class="px-2.5 py-0.5 inline-block text-xs font-medium rounded border bg-red-100 border-transparent text-red-500 dark:bg-red-500/20 dark:border-transparent">Tidak
                                                        Setujui</span>
                                                @elseif($kendaraan->persetujuan === 1)
                                                    <span
                                                        class="px-2.5 py-0.5 inline-block text-xs font-medium rounded border bg-green-100 border-transparent text-green-500 dark:bg-green-500/20 dark:border-transparent">Setuju</span>
                                                @endif
                                            @endcan
                                        </td>
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
