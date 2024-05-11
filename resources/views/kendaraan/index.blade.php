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
                    <div class="mb-5 flex items-center justify-between gap-4">
                        <div>
                            {{-- <div class="relative dropdown">
                                <a href="#!"
                                    class="dropdown-toggle bg-white border-dashed text-sky-500 btn border-sky-500 hover:text-sky-500 hover:bg-sky-50 hover:border-sky-600 focus:text-sky-600 focus:bg-sky-50 focus:border-sky-600 active:text-sky-600 active:bg-sky-50 active:border-sky-600 dark:bg-zink-700 dark:ring-sky-400/20 dark:hover:bg-sky-800/20 dark:focus:bg-sky-800/20 dark:active:bg-sky-800/20"
                                    id="dropdownMenuLink" data-bs-toggle="dropdown">10<svg
                                        xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" data-lucide="chevron-down"
                                        class="lucide lucide-chevron-down inline-block size-4 ltr:ml-1 rtl:mr-1">
                                        <path d="m6 9 6 6 6-6"></path>
                                    </svg></a>
                                <ul class="absolute z-50 py-2 mt-1 list-none bg-white rounded-md shadow-md ltr:text-left rtl:text-right dropdown-menu min-w-max dark:bg-zink-600 hidden"
                                    aria-labelledby="dropdownMenuLink"
                                    style="position: absolute; inset: 0px auto auto 0px; margin: 0px; transform: translate3d(276px, 221.6px, 0px);"
                                    data-popper-placement="bottom-start">
                                    <li>
                                        <a class="block px-4 py-1.5 text-base font-medium transition-all duration-200 ease-linear text-slate-600 dropdown-item hover:bg-slate-100 hover:text-slate-500 focus:bg-slate-100 focus:text-slate-500 dark:text-zink-100 dark:hover:bg-zink-500 dark:hover:text-zink-200 dark:focus:bg-zink-500 dark:focus:text-zink-200"
                                            href="#!">20</a>
                                    </li>
                                    <li>
                                        <a class="block px-4 py-1.5 text-base font-medium transition-all duration-200 ease-linear text-slate-600 dropdown-item hover:bg-slate-100 hover:text-slate-500 focus:bg-slate-100 focus:text-slate-500 dark:text-zink-100 dark:hover:bg-zink-500 dark:hover:text-zink-200 dark:focus:bg-zink-500 dark:focus:text-zink-200"
                                            href="#!">30</a>
                                    </li>
                                    <li>
                                        <a class="block px-4 py-1.5 text-base font-medium transition-all duration-200 ease-linear text-slate-600 dropdown-item hover:bg-slate-100 hover:text-slate-500 focus:bg-slate-100 focus:text-slate-500 dark:text-zink-100 dark:hover:bg-zink-500 dark:hover:text-zink-200 dark:focus:bg-zink-500 dark:focus:text-zink-200"
                                            href="#!">40</a>
                                    </li>
                                    <li class="pt-2 mt-2 border-t border-slate-200 dark:border-zink-500">
                                        <a class="block px-4 py-1.5 text-base font-medium transition-all duration-200 ease-linear text-slate-600 dropdown-item hover:bg-slate-100 hover:text-slate-500 focus:bg-slate-100 focus:text-slate-500 dark:text-zink-100 dark:hover:bg-zink-500 dark:hover:text-zink-200 dark:focus:bg-zink-500 dark:focus:text-zink-200"
                                            href="#!">50</a>
                                    </li>
                                </ul>
                            </div> --}}
                        </div>
                        {{-- <div class="relative flex-1">
                            <i data-lucide="search"
                                class="absolute size-4 ltr:left-3 rtl:right-3 top-3 text-slate-500 dark:text-zink-200"></i>
                              <input type="text" id="searchInput"
                                class="ltr:pl-10 rtl:pr-10 form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200"
                                placeholder="Search">
                        </div> --}}
                        <div>
                            @can('read admin')
                                @if ($identitas === 'kendaraan')
                                    <button data-modal-target="addkendaraanModal" type="button"
                                        class="text-white btn bg-custom-500 border-custom-500 hover:text-white hover:bg-custom-600 hover:border-custom-600 focus:text-white focus:bg-custom-600 focus:border-custom-600 focus:ring focus:ring-custom-100 active:text-white active:bg-custom-600 active:border-custom-600 active:ring active:ring-custom-100 dark:ring-custom-400/20"><i
                                            data-lucide="plus" class="inline-block size-4"></i> <span class="align-middle">Add
                                            Kendaraan</span></button>
                                @endif
                            @endcan
                            {{-- <a href="{{ route('export-kendaraan') }}"
                                class="bg-white border-dashed text-sky-500 btn border-sky-500 hover:text-sky-500 hover:bg-sky-50 hover:border-sky-600 focus:text-sky-600 focus:bg-sky-50 focus:border-sky-600 active:text-sky-600 active:bg-sky-50 active:border-sky-600 dark:bg-zink-700 dark:ring-sky-400/20 dark:hover:bg-sky-800/20 dark:focus:bg-sky-800/20 dark:active:bg-sky-800/20">
                                <i class="align-baseline ltr:pr-1 rtl:pl-1 ri-file-excel-2-line"></i> Export
                            </a> --}}
                            {{-- <button type="button" class="bg-white border-dashed text-red-500 btn border-red-500 hover:text-red-500 hover:bg-red-50 hover:border-red-600 focus:text-red-600 focus:bg-red-50 focus:border-red-600 active:text-red-600 active:bg-red-50 active:border-red-600 dark:bg-zink-700 dark:ring-red-400/20 dark:hover:bg-red-800/20 dark:focus:bg-red-800/20 dark:active:bg-red-800/20">
                                <i class="align-baseline ltr:pr-1 rtl:pl-1 ri-delete-bin-5-line"></i>
                            </button> --}}
                        </div>
                    </div>
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
                                    @can('read pool')
                                        <th
                                            class="px-3.5 py-2.5 font-semibold border-b border-custom-200 dark:border-custom-900">
                                            Persetujuan Pool</th>
                                    @endcan
                                    <th
                                        class="px-3.5 py-2.5 font-semibold border-b border-custom-200 dark:border-custom-900">
                                        Action</th>
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
                                        <td class="px-3.5 py-2.5 border-y border-custom-200 dark:border-custom-900">
                                            @can('read client_users')
                                                @if ($identitas === 'kendaraan')
                                                    <form action="{{ route('check', $kendaraan->id) }}" method="POST"
                                                        class="inline">
                                                        @csrf
                                                        @method('put')
                                                        <button type="submit"
                                                            class="transition-all duration-150 ease-linear text-green-500 hover:text-custom-600">
                                                            <i class="ri-checkbox-circle-line"></i> Pilih Kendaraan Ini
                                                        </button>
                                                    </form>
                                                @endif
                                            @endcan
                                            @can('read pool')
                                                @if ($identitas === 'pool')
                                                    <form action="{{ route('setuju', $kendaraan->id) }}" method="POST"
                                                        class="inline">
                                                        @csrf
                                                        @method('put')
                                                        <button type="submit"
                                                            class="transition-all duration-150 ease-linear text-green-500 hover:text-custom-600">
                                                            <i class="ri-check-line"></i> Check
                                                        </button>
                                                    </form>
                                                @endif
                                            @endcan
                                            @can('read admin')
                                                <a href="{{ route('kendaraans.edit', $kendaraan->id) }}"
                                                    class="transition-all duration-150 ease-linear text-yellow-500 hover:text-custom-600">
                                                    <i class="ri-pencil-line"></i> Edit
                                                </a>
                                                <form action="{{ route('kendaraans.destroy', $kendaraan->id) }}" method="POST"
                                                    class="inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="button" data-modal-target="deleteModal"
                                                        class="transition-all duration-150 ease-linear text-red-500 hover:text-custom-600">
                                                        <i class="ri-delete-bin-line"></i> Delete
                                                    </button>
                                                </form>
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
    @if ($identitas === 'kendaraan')
        <div id="addkendaraanModal" modal-center=""
            class="fixed flex flex-col hidden transition-all duration-300 ease-in-out left-2/4 z-drawer -translate-x-2/4 -translate-y-2/4 show ">
            <div class="w-screen md:w-[30rem] bg-white shadow rounded-md dark:bg-zink-600">
                <div class="flex items-center justify-between p-4 border-b dark:border-zink-300/20">
                    <h5 class="text-16">Add kendaraan</h5>
                    <button data-modal-close="addkendaraanModal"
                        class="transition-all duration-200 ease-linear text-slate-400 hover:text-red-500"><i data-lucide="x"
                            class="size-5"></i></button>
                </div>
                <div class="max-h-[calc(theme('height.screen')_-_180px)] p-4 overflow-y-auto">
                    <form action="{{ route('kendaraans.store') }}" class="mt-10" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="img_kendaraan" class="inline-block mb-2 text-base font-medium">Image
                                Kendaraan</label>
                            <input id="upload" type="file" class="hidden" name="img_kendaraan" accept="image/*" />
                            <div class="max-w-sm mx-auto bg-white rounded-lg shadow-md overflow-hidden items-center">
                                <div class="px-4 py-6">
                                    <div id="image-preview"
                                        class="max-w-sm p-6 mb-4 bg-gray-100 border-dashed border-2 border-gray-400 rounded-lg items-center mx-auto text-center cursor-pointer">
                                        <label for="upload" class="cursor-pointer">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="currentColor"
                                                class="w-8 h-8 text-gray-700 mx-auto mb-4">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M3 16.5v2.25A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75V16.5m-13.5-9L12 3m0 0l4.5 4.5M12 3v13.5" />
                                            </svg>
                                            <h5 class="mb-2 text-xl font-bold tracking-tight text-gray-700">Upload picture
                                            </h5>
                                            <p class="font-normal text-sm text-gray-400 md:px-6">Choose photo size should
                                                be
                                                less
                                                than <b class="text-gray-600">2mb</b></p>
                                            <p class="font-normal text-sm text-gray-400 md:px-6">and should be in <b
                                                    class="text-gray-600">JPG, PNG, or GIF</b> format.</p>
                                            <span id="filename" class="text-gray-500 bg-gray-200 z-50"></span>
                                        </label>
                                    </div>
                                    <div class="flex items-center justify-center">
                                        <div class="w-full">
                                            <label
                                                class="w-full text-white bg-[#050708] hover:bg-[#050708]/90 focus:ring-4 focus:outline-none focus:ring-[#050708]/50 font-medium rounded-lg text-sm px-5 py-2.5 flex items-center justify-center mr-2 mb-2 cursor-pointer">
                                                <span class="text-center ml-2">Upload</span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{ $pool }}
                        <div class="mb-3">
                            <label for="name" class="inline-block mb-2 text-base font-medium">Name Kendaraan</label>
                            <input type="text" name="name" id="name"
                                class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200"
                                placeholder="Enter name">
                            <p id="name" class="mt-1 text-sm text-red-500"></p>
                        </div>
                        <div class="mb-3">
                            <label for="type" class="inline-block mb-2 text-base font-medium">type</label>
                            <input type="text" name="type" id="type"
                                class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200"
                                placeholder="Enter type">
                        </div>
                        <div class="mb-3">
                            <label for="bahan_bakar" class="inline-block mb-2 text-base font-medium">bahan bakar</label>
                            <input type="text" name="bahan bakar" id="bahan_bakar"
                                class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200"
                                placeholder="Enter bahan bakar">
                        </div>
                        <div class="mb-3">
                            <label for="konsumsi_bbm" class="inline-block mb-2 text-base font-medium">konsumsi bbm PER
                                L</label>
                            <input type="number" name="konsumsi_bbm" id="konsumsi_bbm"
                                class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200"
                                placeholder="Enter konsumsi bbm">
                        </div>
                        <div class="mb-3">
                            <label for="date" class="inline-block mb-2 text-base font-medium">Jadwal Service</label>
                            <input type="text"
                                class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200"
                                data-provider="flatpickr" data-date-format="d M, Y" readonly="readonly"
                                name="jadwal_service" placeholder="Select Date">
                        </div>
                        <div class="mb-3">
                            <label for="keteragan" class="inline-block mb-2 text-base font-medium">Keterangan</label>
                            <textarea
                                class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200"
                                id="textArea" rows="3" name="keterangan"></textarea>
                        </div>
                     
                        <div class="mt-10">
                            <button type="submit"
                                class="w-full text-white transition-all duration-200 ease-linear btn bg-custom-500 border-custom-500 hover:text-white hover:bg-custom-600 hover:border-custom-600 focus:text-white focus:bg-custom-600 focus:border-custom-600 focus:ring focus:ring-custom-100 active:text-white active:bg-custom-600 active:border-custom-600 active:ring active:ring-custom-100 dark:ring-custom-400/20">Add
                                Kendaraan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div><!--end add kendaraan-->

        <div id="deleteModal" modal-center=""
            class="fixed flex flex-col hidden transition-all duration-300 ease-in-out left-2/4 z-drawer -translate-x-2/4 -translate-y-2/4 show">
            <div class="w-screen md:w-[25rem] bg-white shadow rounded-md dark:bg-zink-600">
                <div class="max-h-[calc(theme('height.screen')_-_180px)] overflow-y-auto px-6 py-8">
                    <div class="float-right">
                        <button data-modal-close="deleteModal"
                            class="transition-all duration-200 ease-linear text-slate-500 hover:text-red-500"><i
                                data-lucide="x" class="size-5"></i></button>
                    </div>
                    <img src="data:image/png;base64,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"
                        alt="" class="block h-12 mx-auto">
                    <div class="mt-5 text-center">
                        <h5 class="mb-1">Are you sure?</h5>
                        <p class="text-slate-500 dark:text-zink-200">Are you certain you want to delete this record?</p>
                        <div class="flex justify-center gap-2 mt-6">
                            <button type="reset" data-modal-close="deleteModal"
                                class="bg-white text-slate-500 btn hover:text-slate-500 hover:bg-slate-100 focus:text-slate-500 focus:bg-slate-100 active:text-slate-500 active:bg-slate-100 dark:bg-zink-600 dark:hover:bg-slate-500/10 dark:focus:bg-slate-500/10 dark:active:bg-slate-500/10">Cancel</button>
                            <button type="submit"
                                class="text-white bg-red-500 border-red-500 btn hover:text-white hover:bg-red-600 hover:border-red-600 focus:text-white focus:bg-red-600 focus:border-red-600 focus:ring focus:ring-red-100 active:text-white active:bg-red-600 active:border-red-600 active:ring active:ring-red-100 dark:ring-custom-400/20">Yes,
                                Delete It!</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
@endsection
@section('script')
    @if (session('success'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Success!',
                text: '{{ session('success') }}',
                showConfirmButton: false,
                timer: 1500
            });
        </script>
    @endif
    <script>
        const uploadInput = document.getElementById('upload');
        const filenameLabel = document.getElementById('filename');
        const imagePreview = document.getElementById('image-preview');

        // Check if the event listener has been added before
        let isEventListenerAdded = false;

        uploadInput.addEventListener('change', (event) => {
            const file = event.target.files[0];

            if (file) {
                filenameLabel.textContent = file.name;

                const reader = new FileReader();
                reader.onload = (e) => {
                    imagePreview.innerHTML =
                        `<img src="${e.target.result}" class="max-h-48 rounded-lg mx-auto" alt="Image preview" />`;
                    imagePreview.classList.remove('border-dashed', 'border-2', 'border-gray-400');

                    // Add event listener for image preview only once
                    if (!isEventListenerAdded) {
                        imagePreview.addEventListener('click', () => {
                            uploadInput.click();
                        });

                        isEventListenerAdded = true;
                    }
                };
                reader.readAsDataURL(file);
            } else {
                filenameLabel.textContent = '';
                imagePreview.innerHTML =
                    `<div class="bg-gray-200 h-48 rounded-lg flex items-center justify-center text-gray-500">No image preview</div>`;
                imagePreview.classList.add('border-dashed', 'border-2', 'border-gray-400');

                // Remove the event listener when there's no image
                imagePreview.removeEventListener('click', () => {
                    uploadInput.click();
                });

                isEventListenerAdded = false;
            }
        });

        uploadInput.addEventListener('click', (event) => {
            event.stopPropagation();
        });
    </script>
@endsection
