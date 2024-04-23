<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
        <meta name="author" content="Coderthemes">
        <meta name="csrf_token" content="{{ csrf_token() }}">

        <link rel="shortcut icon" href="{{ asset('admin_theme/assets/images/favicon.ico') }}">

        <title>@stack('url_title') | {{ env('APP_NAME') }}</title>

           <!-- Sweet Alert-->
        <link href="{{ asset('admin_theme/assets/libs/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet" type="text/css" />

         <!-- Plugins css -->
        <link href="{{ asset('admin_theme/assets/libs/flatpickr/flatpickr.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('admin_theme/assets/libs/selectize/css/selectize.bootstrap3.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('admin_theme/assets/libs/mohithg-switchery/switchery.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('admin_theme/assets/libs/multiselect/css/multi-select.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('admin_theme/assets/libs/select2/css/select2.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('admin_theme/assets/libs/selectize/css/selectize.bootstrap3.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('admin_theme/assets/libs/bootstrap-select/css/bootstrap-select.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('admin_theme/assets/libs/bootstrap-touchspin/jquery.bootstrap-touchspin.min.css') }}" rel="stylesheet" type="text/css" />

        <!-- datatable -->
        <link href="{{ asset('admin_theme/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('admin_theme/assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('admin_theme/assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('admin_theme/assets/libs/datatables.net-select-bs4/css//select.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
        <!-- datatable -->

        <!-- datepicker -->
        <link href="{{ asset('admin_theme/assets/libs/bootstrap-datepicker/css/bootstrap-datepicker.min.css" rel="stylesheet" type="text/css') }}" />

        <!-- App css -->
        <link href="{{ asset('admin_theme/assets/css/bootstrap-material.min.css') }}" rel="stylesheet" type="text/css" id="bs-default-stylesheet" />
        <link href="{{ asset('admin_theme/assets/css/app-material.min.css') }}" rel="stylesheet" type="text/css" id="app-default-stylesheet" />
        <link href="{{ asset('admin_theme/assets/css/custom.css') }}" rel="stylesheet" type="text/css" id="app-default-stylesheet" />


        <!-- icons -->
        <link href="{{ asset('admin_theme/assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />

        @stack('css')
        <style type="text/css">
            /* =============
               Form elements
            ============= */
            .error {
              color: #f05050;
              font-size: 12px;
              font-weight: 500;
            }

            .d-none
            {
                display: none;
            }
            /* Form validation */

        </style>

        </head>


        <body>

        <!-- Begin page -->
        <div id="wrapper">

            <!-- Topbar Start -->
            @include('admin.shared.header')
            <!-- end Topbar -->

            <!-- ========== Left Sidebar Start ========== -->
            @include('admin.shared.sidebar')
            <!-- Left Sidebar End -->

            <!-- ============================================================== -->
            <!-- Start Page Content here -->
            <!-- ============================================================== -->

            <div class="content-page">
                <div class="content">

                    <!-- Start Content-->
                    <div class="container-fluid">
                        @stack('content') 
                     </div> <!-- container -->

                </div> <!-- content -->

                <!-- Footer Start -->
                @include('admin.shared.footer')

                <!-- end Footer -->

            </div>

            <!-- ============================================================== -->
            <!-- End Page content -->
            <!-- ============================================================== -->


        </div>
        <!-- END wrapper -->

        <div class="rightbar-overlay"></div>

        <!-- Vendor js -->
        <script src="{{ asset('admin_theme/assets/js/vendor.min.js') }}"></script>

        <!-- Plugins js-->
        <script src="{{ asset('admin_theme/assets/libs/flatpickr/flatpickr.min.js') }}"></script>
        <script src="{{ asset('admin_theme/assets/libs/mohithg-switchery/switchery.min.js') }}"></script>
        <script src="{{ asset('admin_theme/assets/libs/multiselect/js/jquery.multi-select.js') }}"></script>
        <script src="{{ asset('admin_theme/assets/libs/select2/js/select2.min.js') }}"></script>
        <script src="{{ asset('admin_theme/assets/libs/devbridge-autocomplete/jquery.autocomplete.min.js') }}"></script>
        <script src="{{ asset('admin_theme/assets/libs/bootstrap-select/js/bootstrap-select.min.js') }}"></script>
        <script src="{{ asset('admin_theme/assets/libs/bootstrap-touchspin/jquery.bootstrap-touchspin.min.js') }}"></script>
        <script src="{{ asset('admin_theme/assets/libs/bootstrap-maxlength/bootstrap-maxlength.min.js') }}"></script>

        <!-- Sweet Alerts js -->
        <script src="{{ asset('admin_theme/assets/libs/sweetalert2/sweetalert2.min.js') }}"></script>

        <!-- Sweet alert init js-->
        <script src="{{ asset('admin_theme/assets/js/pages/sweet-alerts.init.js') }}"></script>

        <!-- datatable -->
        <script src="{{ asset('admin_theme/assets/libs/datatables.net/js/jquery.dataTables.min.js') }}"></script>
        <script src="{{ asset('admin_theme/assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
        <script src="{{ asset('admin_theme/assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js') }}"></script>
        <script src="{{ asset('admin_theme/assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js') }}"></script>
        <script src="{{ asset('admin_theme/assets/libs/datatables.net-buttons/js/dataTables.buttons.min.js') }}"></script>
        <script src="{{ asset('admin_theme/assets/libs/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js') }}"></script>
        <script src="{{ asset('admin_theme/assets/libs/datatables.net-buttons/js/buttons.html5.min.js') }}"></script>
        <script src="{{ asset('admin_theme/assets/libs/datatables.net-buttons/js/buttons.flash.min.js') }}"></script>
        <script src="{{ asset('admin_theme/assets/libs/datatables.net-buttons/js/buttons.print.min.js') }}"></script>
        <script src="{{ asset('admin_theme/assets/libs/datatables.net-keytable/js/dataTables.keyTable.min.js') }}"></script>
        <script src="{{ asset('admin_theme/assets/libs/datatables.net-select/js/dataTables.select.min.js') }}"></script>
        <script src="{{ asset('admin_theme/assets/libs/pdfmake/build/pdfmake.min.js') }}"></script>
        <script src="{{ asset('admin_theme/assets/libs/pdfmake/build/vfs_fonts.js') }}"></script>
        <script src="{{ asset('admin_theme/assets/js/pages/datatables.init.js') }}"></script>
        
        <!-- Jquery -->
        <script src="{{ asset('admin_theme/assets/libs/selectize/js/standalone/selectize.min.js') }}"></script>
        <script src="{{ asset('admin_theme/assets/libs/parsleyjs/parsley.min.js') }}"></script>
        <script src="{{ asset('admin_theme/assets/js/jquery.slimscroll.js') }}"></script>
        <script src="{{ asset('admin_theme/assets/js/jquery.blockUI.js') }}"></script>
        <script src="{{ asset('admin_theme/assets/js/jquery.nicescroll.js') }}"></script>
        <script src="{{ asset('admin_theme/assets/js/jquery.scrollTo.min.js') }}"></script>
        <script src="{{ asset('admin_theme/assets/js/custom.js') }}"></script>

        <!-- datepicker -->
        <script src="{{ asset('admin_theme/assets/libs/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}"></script>
        <script src="{{ asset('admin_theme/assets/js/pages/form-pickers.init.js') }}"></script>
        
        <!-- Validation init js-->
        <script src="{{ asset('admin_theme/assets/js/jquery.validate.min.js') }}"></script>
        
        <!-- App js-->
        <script src="{{ asset('admin_theme/assets/js/app.min.js') }}"></script>
        
        @stack('js')

    </body>
</html>