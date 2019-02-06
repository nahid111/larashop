<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    {{-- CSRF Token --}}
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name') }}</title>

    {{-- Favicon --}}
    <link rel="shortcut icon" href="{{ asset('images/cart.png') }}" type="image/x-icon">


    {{-- Bootstrap core CSS --}}
    <link href="{{ asset('admin/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    {{-- Font-awesome --}}
    <link href="{{ asset('admin/vendor/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css">
    {{-- DataTables --}}
    <link href="{{ asset('admin/vendor/datatables/dataTables.bootstrap4.css') }}" rel="stylesheet">
    {{-- Custom styles for this template--}}
    <link href="{{ asset('admin/css/sb-admin.css') }}" rel="stylesheet">
    {{-- jquery-confirm Alert --}}
    <link rel="stylesheet" href="{{ asset('admin/css/jquery-confirm.min.css') }}">
    {{-- Google fonts --}}
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,300" rel="stylesheet">



    {{-- Missing Bootstrap Classes --}}
    <style type="text/css">
        .img-responsive{
            display: block;
            max-width: 100%;
            height: auto;
        }
        .col-xs-1, .col-sm-1, .col-md-1, .col-lg-1, .col-xs-2, .col-sm-2, .col-md-2, .col-lg-2, .col-xs-3, .col-sm-3, .col-md-3, .col-lg-3, .col-xs-4, .col-sm-4, .col-md-4, .col-lg-4, .col-xs-5, .col-sm-5, .col-md-5, .col-lg-5, .col-xs-6, .col-sm-6, .col-md-6, .col-lg-6, .col-xs-7, .col-sm-7, .col-md-7, .col-lg-7, .col-xs-8, .col-sm-8, .col-md-8, .col-lg-8, .col-xs-9, .col-sm-9, .col-md-9, .col-lg-9, .col-xs-10, .col-sm-10, .col-md-10, .col-lg-10, .col-xs-11, .col-sm-11, .col-md-11, .col-lg-11, .col-xs-12, .col-sm-12, .col-md-12, .col-lg-12 {
            position: relative;
            min-height: 1px;
            padding-right: 15px;
            padding-left: 15px;
        }
        .col-xs-1, .col-xs-2, .col-xs-3, .col-xs-4, .col-xs-5, .col-xs-6, .col-xs-7, .col-xs-8, .col-xs-9, .col-xs-10, .col-xs-11, .col-xs-12 {
            float: left;
        }
        .col-xs-12 {
            width: 100%;
        }
        .col-xs-11 {
            width: 91.66666667%;
        }
        .col-xs-10 {
            width: 83.33333333%;
        }
        .col-xs-9 {
            width: 75%;
        }
        .col-xs-8 {
            width: 66.66666667%;
        }
        .col-xs-7 {
            width: 58.33333333%;
        }
        .col-xs-6 {
            width: 50%;
        }
        .col-xs-5 {
            width: 41.66666667%;
        }
        .col-xs-4 {
            width: 33.33333333%;
        }
        .col-xs-3 {
            width: 25%;
        }
        .col-xs-2 {
            width: 16.66666667%;
        }
        .col-xs-1 {
            width: 8.33333333%;
        }
    </style>

    <style type="text/css">
        *{
            font-family: 'Raleway', sans-serif;
        }

        .navbar-brand {
            height: 40px;
            padding: 0;
        }

        .navbar-brand img {
            height: 30px;
            width: auto;
            margin: 10px 10px 0 0;
        }

        .smaller_text{
            font-size: 0.8em;
        }

    </style>

    @yield('pageStyles')

</head>



<body class="fixed-nav sticky-footer bg-dark" id="page-top">
<div id="app">


    <div class="content-wrapper">


        @include('adminInc.navBar')
        @include('adminInc.adminMessages')

        @yield('content')


        {{--FOOTER--}}
        <footer class="sticky-footer">
            <div class="container">
                <div class="text-center">
                    <small>Copyright © Your Website 2017</small>
                </div>
            </div>
        </footer>


        {{-- Scroll to Top Button--}}
        <a class="scroll-to-top rounded" href="#page-top">
            <i class="fa fa-angle-up"></i>
        </a>


    </div>
    {{-- /.content-wrapper--}}


</div>




{{-- Bootstrap core JavaScript --}}
<script src="{{ asset('admin/vendor/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('admin/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
{{-- jQuery Easing--}}
<script src="{{ asset('admin/vendor/jquery-easing/jquery.easing.min.js') }}"></script>
{{-- Chart.js & DataTables JS --}}
<script src="{{ asset('admin/vendor/chart.js/Chart.min.js') }}"></script>
<script src="{{ asset('admin/vendor/datatables/jquery.dataTables.js') }}"></script>
<script src="{{ asset('admin/vendor/datatables/dataTables.bootstrap4.js') }}"></script>
{{-- Custom scripts for all pages --}}
<script src="{{ asset('admin/js/sb-admin.min.js') }}"></script>
{{-- Custom chart & dataTables --}}
<script src="{{ asset('admin/js/sb-admin-datatables.min.js') }}"></script>
<script src="{{ asset('admin/js/sb-admin-charts.min.js') }}"></script>
{{-- jquery-confirm Alert --}}
<script src="{{ asset('admin/js/jquery-confirm.min.js') }}"></script>

{{-- CK-editor --}}
<script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>




<script type="text/javascript">

    function confirmDelete(obj, event, msg) {
        event.preventDefault();
        $.confirm({
            title: msg,
            content: 'It will be deleted permanently !',
            //theme: 'supervan',
            theme: 'dark',
            icon: 'fa fa-question-circle',
            type: 'red',
            typeAnimated: true,
            buttons: {

                confirm: {
                    text: 'Delete',
                    btnClass: 'btn-red',
                    action: function () {
                        //$.alert('Done');
                        $(obj).closest("form").submit();
                    }
                },

                cancel: function () {
                    //$.alert('Canceled!');
                }

            }
        });
    }


    function confirmLogout(obj, event, msg) {
        event.preventDefault();
        $.confirm({
            title: '<span style="color: #ff1b10">'+msg+'</span>',
            content: '<span style="color: #2ECC71; font-weight: bolder;">' +
                        '<i class="fa fa-2x fa-exclamation-triangle"></i>&nbsp;&nbsp;' +
                        'All unsaved changes will be lost !</span>',
            theme: 'supervan',
            //theme: 'dark',
            icon: 'fa fa-3x fa-question-circle',
            type: 'red',
            typeAnimated: true,
            buttons: {

                confirm: {
                    text: 'Logout',
                    btnClass: 'btn-red',
                    action: function () {
                        $("#logout-form").submit();
                    }
                },

                cancel: {
                    text: 'Cancel',
                    btnClass: 'btn-green',
                    action: function () {
                        //$.alert('Canceled!');
                    }
                }

            }
        });
    }



    {{--

    // $.alert('Content here', 'Title here');


    // jQuery Ajax format
    /*
    $(".ajaxBtn").click(function () {

        var prodId = $(this).attr('value');
        $.ajax({
            url : '/product/'+prodId+'/edit',
            method : "GET",
            //data : { 'key1':'value1', 'key2':'value2' },
            success : function(response){
                var obj = JSON.parse(response);
                $.alert({
                    title: 'AJAX response',
                    content: obj.someKey,
                    theme: 'dark',
                    type: 'green',
                    typeAnimated: true
                });
                //window.location.replace("url");
            },
            error : function(){}
        });
    });
    */

    // CKEDITOR
    // CKEDITOR.replace( 'prod_description' );

     --}}

</script>


@yield('pageScripts')



</body>
</html>









