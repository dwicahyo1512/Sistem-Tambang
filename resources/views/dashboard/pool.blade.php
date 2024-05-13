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
                        <h5 class="mt-5 mb-2"><span class="counter-value" data-target="{{ $kendaraansetuju }}">0</span></h5>
                        <p class="text-slate-500 dark:text-slate-200">Total Driver Di setujui</p>
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
                        <h5 class="mt-5 mb-2"><span class="counter-value" data-target="{{ $kendaraanbelumsetuju }}">0</span>
                        </h5>
                        <p class="text-slate-500 dark:text-slate-200">Total Driver Belum Di setujui </p>
                    </div>
                </div><!--end col-->
                <div class="order-5 col-span-12 2xl:order-1 card 2xl:row-span-2 2xl:col-span-8">
                    <div class="card-body">
                        <div class="flex items-center gap-2">
                            <h6 class="mb-3 text-15 grow">Total Driver Di Setujui</h6>
                            <div class="shrink-0">
                                <div class="mb-3">
                                    <input type="text"
                                        class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200"
                                        name="select_years_pool" id="select_years_pool"
                                        placeholder="Select Years">
                                </div>
                            </div>
                        </div>

                        <div id="responseTimes" class="apex-charts" data-chart-colors='["bg-red-500"]' dir="ltr"></div>
                    </div>
                </div><!--end col-->
            </div>
        </div>
        <!-- container-fluid -->
    </div>
    <!-- End Page-content -->
@endsection
@section('script')
    <script>
        $(document).ready(function() {
            var currentYearpool = new Date().getFullYear(); // Mendapatkan tahun saat ini
            $("#select_years_pool").val(currentYearpool); // Mengatur nilai input ke tahun saat ini
            getDatapool(
                currentYearpool); // Panggil fungsi untuk mengambil data berdasarkan tahun saat ini
        });

        $("#select_years_pool").change(function() {
            var selectedYearpool = $(this).val(); // Ambil tahun yang dipilih
            getDatapool(selectedYearpool); // Panggil fungsi untuk mengambil data berdasarkan tahun
        });

        function getDatapool(year) {
            $.ajax({
                url: '/datapool/' +
                    year, // Sesuaikan dengan rute di controller Anda, termasuk tahun yang dipilih
                method: 'GET',
                success: function(response) {
                    console.log(response);

                    //Pages Interaction
                    var options = {
                        series: response,
                        chart: {
                            height: 350,
                            type: 'line',
                            zoom: {
                                enabled: false
                            },
                            margin: {
                                left: 0,
                                right: 0,
                                top: 0,
                                bottom: 0
                            },
                            toolbar: {
                                show: false,
                            },
                        },
                        stroke: {
                            show: true,
                            curve: 'smooth',
                            lineCap: 'butt',
                            width: 2,
                            dashArray: 0,
                        },
                        dataLabels: {
                            enabled: false
                        },
                        colors: getChartColorsArray("responseTimes"),
                        xaxis: {
                            categories: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep",
                                "Oct", "Nov", "Dec"
                            ],
                        }
                    };

                    var chart = new ApexCharts(document.querySelector("#responseTimes"), options);
                    chart.render();


                    setTimeout(function() {
                        chart.updateSeries([response]);
                    }, 2000);
                },
                error: function(xhr, status, error) {
                    console.error(error); // Tampilkan pesan kesalahan jika terjadi
                }
            });
        }
    </script>
@endsection
