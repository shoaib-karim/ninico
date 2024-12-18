<!doctype html>
<html lang="en" dir="ltr">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />

<head>

    <!-- META DATA -->
    <meta charset="UTF-8">
    <meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Ninico Dashboard">
    <meta name="author" content="Shoaib Karim">

    <!-- TITLE -->
    <title>Dashboard</title>

    <!-- FAVICON -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('/') }}assets/img/logo/favicon.png" />

    <!-- BOOTSTRAP CSS -->
    <link id="style" href="{{ asset('/') }}admin/assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" />

    <!-- STYLE CSS -->
    <link href="{{ asset('/') }}admin/assets/css/style.css" rel="stylesheet" />
    <!-- <link href="{{ asset('/') }}admin/assets/css/skin-modes.css" rel="stylesheet" /> -->


    <!--- FONT-ICONS CSS -->
    <link href="{{ asset('/') }}admin/assets/plugins/icons/icons.css" rel="stylesheet" />

    <!-- INTERNAL Switcher css -->
    <!-- <link href="{{ asset('/') }}admin/assets/switcher/css/switcher.css" rel="stylesheet">
    <link href="{{ asset('/') }}admin/assets/switcher/demo.css" rel="stylesheet"> -->

</head>

<body class="ltr app sidebar-mini">

    <!-- PAGE -->
    <div class="page">
        <!-- GLOBAL-LOADER -->
        <div id="global-loader">
            <img src="{{ asset('/') }}admin/assets/images/loader.svg" class="loader-img" alt="Loader">
        </div>
        <!-- /GLOBAL-LOADER -->


        <!-- PAGE -->

        @include('backend.includes.header')
        @include('backend.includes.sidebar')
        @yield('body')
        @include('backend.includes.footer')

        <!-- BACK-TO-TOP -->
        <a href="#top" id="back-to-top"><i class="fa fa-long-arrow-up"></i></a>

        <!-- JQUERY JS -->
        <script src="{{ asset('/') }}admin/assets/plugins/jquery/jquery.min.js"></script>

        <!-- BOOTSTRAP JS -->
        <script src="{{ asset('/') }}admin/assets/plugins/bootstrap/js/popper.min.js"></script>
        <script src="{{ asset('/') }}admin/assets/plugins/bootstrap/js/bootstrap.min.js"></script>

        <!-- SIDE-MENU JS -->
        <script src="{{ asset('/') }}admin/assets/plugins/sidemenu/sidemenu.js"></script>

        <!-- INTERNAL Summernote Editor js -->
        <script src="{{ asset('/') }}admin/assets/plugins/summernote-editor/summernote1.js"></script>
        <script src="{{ asset('/') }}admin/assets/js/summernote.js"></script>

        <!-- Perfect SCROLLBAR JS-->
        <script src="{{ asset('/') }}admin/assets/plugins/p-scroll/perfect-scrollbar.js"></script>
        <script src="{{ asset('/') }}admin/assets/plugins/p-scroll/pscroll.js"></script>

        <!-- STICKY JS -->
        <script src="{{ asset('/') }}admin/assets/js/sticky.js"></script>

        <!-- APEXCHART JS -->
        <script src="{{ asset('/') }}admin/assets/js/apexcharts.js"></script>

        <!-- INTERNAL SELECT2 JS -->
        <script src="{{ asset('/') }}admin/assets/plugins/select2/select2.full.min.js"></script>

        <!-- CHART-CIRCLE JS-->
        <script src="{{ asset('/') }}admin/assets/plugins/circle-progress/circle-progress.min.js"></script>

        <!-- INTERNAL DATA-TABLES JS-->
        <script src="{{ asset('/') }}admin/assets/plugins/datatable/js/jquery.dataTables.min.js"></script>
        <script src="{{ asset('/') }}admin/assets/plugins/datatable/js/dataTables.bootstrap5.js"></script>
        <script src="{{ asset('/') }}admin/assets/plugins/datatable/dataTables.responsive.min.js"></script>

        <!-- INDEX JS -->
        <script src="{{ asset('/') }}admin/assets/js/index1.js"></script>
        <script src="{{ asset('/') }}admin/assets/js/index.js"></script>

        <!-- Reply JS-->
        <script src="{{ asset('/') }}admin/assets/js/reply.js"></script>

        <!-- Message Timeout-->
        <script src="{{ asset('/') }}admin/assets/js/modal-timeout.js"></script>

        <!-- DATA TABLE JS-->
        <script src="{{ asset('/') }}admin/assets/plugins/datatable/js/jquery.dataTables.min.js"></script>
        <script src="{{ asset('/') }}admin/assets/plugins/datatable/js/dataTables.buttons.min.js"></script>
        <script src="{{ asset('/') }}admin/assets/plugins/datatable/js/dataTables.bootstrap5.js"></script>
        <script src="{{ asset('/') }}admin/assets/plugins/datatable/js/buttons.bootstrap5.min.js"></script>
        <script src="{{ asset('/') }}admin/assets/plugins/datatable/js/jszip.min.js"></script>
        <script src="{{ asset('/') }}admin/assets/plugins/datatable/pdfmake/pdfmake.min.js"></script>
        <script src="{{ asset('/') }}admin/assets/plugins/datatable/pdfmake/vfs_fonts.js"></script>
        <script src="{{ asset('/') }}admin/assets/plugins/datatable/js/buttons.html5.min.js"></script>
        <script src="{{ asset('/') }}admin/assets/plugins/datatable/js/buttons.print.min.js"></script>
        <script src="{{ asset('/') }}admin/assets/plugins/datatable/js/buttons.colVis.min.js"></script>
        <script src="{{ asset('/') }}admin/assets/plugins/datatable/dataTables.responsive.min.js"></script>
        <script src="{{ asset('/') }}admin/assets/plugins/datatable/responsive.bootstrap5.min.js"></script>
        <script src="{{ asset('/') }}admin/assets/js/table-data.js"></script>

        <!-- CUSTOM JS -->
        <script src="{{ asset('/') }}admin/assets/js/custom.js"></script>

        <script>
            function getSubCategoryByCategory(categoryId) {
                $.ajax({
                    method: "GET",
                    url: "#",
                    data: {
                        id: categoryId
                    },
                    DataType: "JSON",
                    success: function(response) {
                        console.log(response);
                        var option = '';
                        option += '<option value="">Select Category</option>';
                        $.each(response, function(key, value) {
                            option += '<option value="' + value.id + '">' + value.name + '</option>';
                        });
                        $('#subcategory').empty();
                        $('#subcategory').append(option);
                    }
                });
            }
        </script>
    </div>
    </div>

</body>

</html>