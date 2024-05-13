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
                        <h5 class="mt-5 mb-2"><span class="counter-value" data-target="{{ $userCount }}">0</span></h5>
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
                        <h5 class="mt-5 mb-2"><span class="counter-value" data-target="{{ $adminCount }}">0</span></h5>
                        <p class="text-slate-500 dark:text-slate-200">Total Role Admin</p>
                    </div>
                </div><!--end col-->
                <div class="order-5 col-span-12 2xl:order-1 card 2xl:row-span-2 2xl:col-span-8">
                    <div class="card-body">
                        <div class="flex items-center gap-2 mb-3">
                            <h6 class="text-15 grow">Total Driver <a href="#!" data-tooltip="default"
                                    data-tooltip-content="Total Driver"
                                    class="inline-block align-middle ltr:ml-1 rtl:mr-1 text-slate-500 dark:text-zink-200"><i
                                        data-lucide="info" class="size-4"></i></a></h6>

                            <div class="mb-3">
                                <input type="text"
                                    class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200"
                                    name="select_years_gender" id="select_years_gender" placeholder="Select Years">
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
                        <h5 class="mt-5 mb-2"><span class="counter-value" data-target="{{ $poolCount }}">0</span></h5>
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
                        <h5 class="mt-5 mb-2"><span class="counter-value" data-target="{{ $clientCount }}">0</span></h5>
                        <p class="text-slate-500 dark:text-slate-200">Total Driver</p>
                    </div>
                </div><!--end col-->
                <div class="order-7 col-span-12 2xl:order-1 card 2xl:col-span-12">
                    <div class="card-body">
                        <div class="flex items-center gap-2">
                            <h6 class="mb-3 text-15 grow">Total Kendaraan</h6>
                            
                                <div class="mb-3">
                                    <input type="text"
                                        class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200"
                                        name="select_years_kendaraan" id="select_years_kendaraan"
                                        placeholder="Select Years">
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
@section('script')
    <script>
        //Daily Visit Insights
        $(document).ready(function() {
            var currentYeargender = new Date().getFullYear(); // Mendapatkan tahun saat ini
            $("#select_years_gender").val(currentYeargender); // Mengatur nilai input ke tahun saat ini
            getDatagender(currentYeargender); // Panggil fungsi untuk mengambil data berdasarkan tahun saat ini
        });

        $("#select_years_gender").change(function() {
            var selectedYeargender = $(this).val(); // Ambil tahun yang dipilih
            getDatagender(selectedYeargender); // Panggil fungsi untuk mengambil data berdasarkan tahun
        });

        function getDatagender(year) {
            $.ajax({
                url: '/datagender/' + year, // Sesuaikan dengan rute di controller Anda, termasuk tahun yang dipilih
                method: 'GET',
                success: function(response) {
                    console.log(response);
                    // response akan berisi data yang Anda kirimkan dari Laravel
                    // Buat opsi grafik
                    var options1 = {
                        series: response,

                        annotations: {
                            points: [{
                                x: 'Bananas',
                                seriesIndex: 0,
                                label: {
                                    borderColor: getChartColorsArray("dailyVisitInsightsChart")[1],
                                    offsetY: 0,
                                    style: {
                                        color: '#fff',
                                        background: getChartColorsArray("dailyVisitInsightsChart")[
                                            1],
                                    },
                                    text: 'Bananas are good',
                                }
                            }]
                        },
                        colors: getChartColorsArray("dailyVisitInsightsChart"),
                        chart: {
                            height: 238,
                            type: 'bar',
                            toolbar: {
                                show: false,
                            }
                        },
                        plotOptions: {
                            bar: {
                                borderRadius: 10,
                                columnWidth: '70%',
                            }
                        },
                        dataLabels: {
                            enabled: false
                        },
                        stroke: {
                            width: 2
                        },
                        xaxis: {
                            labels: {
                                rotate: -45
                            },
                            categories: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep",
                                "Oct", "Nov",
                                "Dec"
                            ],
                            tickPlacement: 'on'
                        },
                        fill: {
                            type: 'gradient',
                            gradient: {
                                shade: 'light',
                                type: "horizontal",
                                shadeIntensity: 0.25,
                                gradientToColors: undefined,
                                inverseColors: true,
                                opacityFrom: 0.85,
                                opacityTo: 0.85,
                                stops: [50, 0, 100]
                            },
                        },
                        grid: {
                            xaxis: {
                                lines: {
                                    show: true
                                }
                            },
                            yaxis: {
                                lines: {
                                    show: true
                                }
                            },
                            padding: {
                                top: -10,
                                right: -10,
                                left: -10
                            }
                        },
                        yaxis: {
                            show: false,
                        }
                    };
                    // Render grafik dengan opsi yang baru
                    var chart = new ApexCharts(document.querySelector("#dailyVisitInsightsChart"), options1);
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


        $(document).ready(function() {
            var currentYearkendaraan = new Date().getFullYear(); // Mendapatkan tahun saat ini
            $("#select_years_kendaraan").val(currentYearkendaraan); // Mengatur nilai input ke tahun saat ini
            getDatakendaraan(
                currentYearkendaraan); // Panggil fungsi untuk mengambil data berdasarkan tahun saat ini
        });

        $("#select_years_kendaraan").change(function() {
            var selectedYearkendaraan = $(this).val(); // Ambil tahun yang dipilih
            getDatakendaraan(selectedYearkendaraan); // Panggil fungsi untuk mengambil data berdasarkan tahun
        });

        function getDatakendaraan(year) {
            $.ajax({
                url: '/datakendaraan/' +
                    year, // Sesuaikan dengan rute di controller Anda, termasuk tahun yang dipilih
                method: 'GET',
                success: function(response) {
                    console.log(response);

                    //Pages Interaction
                    var options = {
                        series: response,
                        chart: {
                            height: 350,
                            type: 'bar',
                            toolbar: {
                                show: false,
                            }
                        },
                        plotOptions: {
                            bar: {
                                borderRadius: 10,
                                dataLabels: {
                                    position: 'top', // top, center, bottom
                                },
                            }
                        },
                        dataLabels: {
                            enabled: true,
                            offsetY: -20,
                            style: {
                                fontSize: '12px',
                                colors: ["#304758"]
                            }
                        },

                        xaxis: {
                            categories: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep",
                                "Oct", "Nov", "Dec"
                            ],
                            position: 'bottom',
                            axisBorder: {
                                show: false
                            },
                            axisTicks: {
                                show: false
                            },
                            crosshairs: {
                                fill: {
                                    type: 'gradient',
                                    gradient: {
                                        colorFrom: '#D8E3F0',
                                        colorTo: '#BED1E6',
                                        stops: [0, 100],
                                        opacityFrom: 0.4,
                                        opacityTo: 0.5,
                                    }
                                }
                            },
                            tooltip: {
                                enabled: true,
                            }
                        },
                        yaxis: {
                            axisBorder: {
                                show: false
                            },
                            axisTicks: {
                                show: false,
                            },
                            labels: {
                                show: true,
                                formatter: function(value) {
                                    return Math.round(
                                        value);
                                }
                            }
                        },
                        stroke: {
                            show: true,
                            width: 4,
                            colors: ['transparent']
                        },
                        grid: {
                            show: false,
                            padding: {
                                top: 0,
                                right: 0,
                                bottom: 0,
                                left: -10
                            },
                        },
                        colors: getChartColorsArray("pagesInteraction")
                    };

                    var chart = new ApexCharts(document.querySelector("#pagesInteraction"), options);
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
