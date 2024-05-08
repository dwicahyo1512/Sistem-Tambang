@extends('layouts.master')
@section('content')
    <!-- Page-content -->
    <div class="relative min-h-screen group-data-[sidebar-size=sm]:min-h-sm">

        <div class="group-data-[sidebar-size=lg]:ltr:md:ml-vertical-menu group-data-[sidebar-size=lg]:rtl:md:mr-vertical-menu group-data-[sidebar-size=md]:ltr:ml-vertical-menu-md group-data-[sidebar-size=md]:rtl:mr-vertical-menu-md group-data-[sidebar-size=sm]:ltr:ml-vertical-menu-sm group-data-[sidebar-size=sm]:rtl:mr-vertical-menu-sm pt-[calc(theme('spacing.header')_*_1)] pb-[calc(theme('spacing.header')_*_0.8)] px-4 group-data-[navbar=bordered]:pt-[calc(theme('spacing.header')_*_1.3)] group-data-[navbar=hidden]:pt-0 group-data-[layout=horizontal]:mx-auto group-data-[layout=horizontal]:max-w-screen-2xl group-data-[layout=horizontal]:px-0 group-data-[layout=horizontal]:group-data-[sidebar-size=lg]:ltr:md:ml-auto group-data-[layout=horizontal]:group-data-[sidebar-size=lg]:rtl:md:mr-auto group-data-[layout=horizontal]:md:pt-[calc(theme('spacing.header')_*_1.6)] group-data-[layout=horizontal]:px-3 group-data-[layout=horizontal]:group-data-[navbar=hidden]:pt-[calc(theme('spacing.header')_*_0.9)]">        
            <div class="container-fluid group-data-[content=boxed]:max-w-boxed mx-auto">

                <div class="flex flex-col gap-2 py-4 md:flex-row md:items-center print:hidden">
                    <div class="grow">
                        <h5 class="text-16">List View</h5>
                    </div>
                    <ul class="flex items-center gap-2 text-sm font-normal shrink-0">
                        <li class="relative before:content-['\ea54'] before:font-remix ltr:before:-right-1 rtl:before:-left-1  before:absolute before:text-[18px] before:-top-[3px] ltr:pr-4 rtl:pl-4 before:text-slate-400 dark:text-zink-200">
                            <a href="#!" class="text-slate-400 dark:text-zink-200">User</a>
                        </li>
                        <li class="text-slate-700 dark:text-zink-100">
                            List View
                        </li>
                    </ul>
                </div>
              
                <div class="card">
                    <div class="card-body">
                        <h6 class="mb-4 text-15">Users List</h6>
                        <table id="basic_tables" class="display stripe group userList" style="width:100%">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th class="ltr:!text-left rtl:!text-right">Name</th>
                                    <th>User ID</th>
                                    <th>Email</th>
                                    <th>Position</th>
                                    <th>Phone</th>
                                    <th>Join Date</th>
                                    <th>Last Login</th>
                                    <th>Role</th>
                                    <th>Status</th>
                                    <th>Departement</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
                <!--end card-->
            </div>
            <!-- container-fluid -->
        </div>
        <!-- End Page-wrapper -->
    </div>
    <!-- End Page-content -->

    @section('script')
    <script type="text/javascript">
        $(document).ready(function() {
            
            table = $('.userList').DataTable({
                
                lengthMenu: [
                    [10, 25, 50, 100,150],
                    [10, 25, 50, 100,150]
                ],
                buttons: [
                    'pageLength',
                ],
                "pageLength": 10,
                order: [
                    [5, 'desc']
                ],
                processing: true,
                serverSide: true,
                ordering: true,
                searching: true,
                ajax: {
                    url:"{{ route('get-users-data') }}",
                    data:function(data) {
                        // read valus for search
                        var user_name   = $('#user_name').val();
                        var type_role   = $('#type_role').val();
                        var type_status = $('#type_status').val();
                        data.user_name   = user_name;
                        data.type_role   = type_role;
                        data.type_status = type_status;
                    }
                },
                
                columns: [
                    {
                        data: 'no',
                        name: 'no',
                    },
                    {
                        data: 'name',
                        name: 'name'
                    },
                    {
                        data: 'user_id',
                        name: 'user_id'
                    },
                    {
                        data: 'email',
                        name: 'email'
                    },
                    {
                        data: 'position',
                        name: 'position'
                    },
                    {
                        data: 'phone_number',
                        name: 'phone_number'
                    },
                    {
                        data: 'join_date',
                        name: 'join_date',
                    },
                    {
                        data: 'last_login',
                        name: 'last_login',
                    },
                    {
                        data: 'role_name',
                        name: 'role_name',
                    },
                    {
                        data: 'status',
                        name: 'status',
                    },
                    {
                        data: 'department',
                        name: 'department',
                    },
                    {
                        data: 'action',
                        name: 'action',
                    },
                ]
            });
            $('.btn_search').on('click',function() {
                table.draw();
            });
        });
    </script>

        <!-- datatables list js-->
        <script src="{{ URL::to('assets/js/starcode.bundle.js') }}"></script>
        <script src="{{ URL::to('assets/js/datatables/jquery-3.7.0.js') }}"></script>
        <script src="{{ URL::to('assets/js/datatables/data-tables.min.js') }}"></script>
        <script src="{{ URL::to('assets/js/datatables/data-tables.tailwindcss.min.js') }}"></script>
        <script src="{{ URL::to('assets/js/datatables/datatables.buttons.min.js') }}"></script>
        <script src="{{ URL::to('assets/js/datatables/jszip.min.js') }}"></script>
        <script src="{{ URL::to('assets/js/datatables/pdfmake.min.js') }}"></script>
        <script src="{{ URL::to('assets/js/datatables/buttons.html5.min.js') }}"></script>
        <script src="{{ URL::to('assets/js/datatables/buttons.print.min.js') }}"></script>
        {{-- <script src="{{ URL::to('assets/js/datatables/datatables.init.js') }}"></script> --}}
    @endsection
@endsection
