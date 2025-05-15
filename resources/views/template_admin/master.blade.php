<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <link rel="shortcut icon" href="{{ asset('') }}assets_admin/img/logo.png" type="image/x-icon">
    <title>Aplikasi Pendaftaran Magang</title>

    <!-- General CSS Files -->

    <!-- General CSS Files -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

    <!-- CSS Libraries -->

    <!-- Template CSS -->
    <link rel="stylesheet" href="{{ asset('assets_admin/css/style.css')}}">
    <link rel="stylesheet" href="{{ asset('assets_admin/css/components.css')}}">

  <!-- General CSS Files -->
    <link rel="stylesheet" href="{{ asset('assets_admin/datatables/datatables.min.css'); }}">
    <link rel="stylesheet" href="{{ asset('assets_admin/datatables/dataTables.bootstrap4.min.css'); }}">
    <link rel="stylesheet" href="{{ asset('assets_admin/datatables/buttons.dataTables.min.css'); }}">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/css/select2.min.css" rel="stylesheet" />
    <script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/js/select2.min.js"></script>
    <link rel="stylesheet" href="{{ asset('assets_admin/summernote/summernote-bs4.css'); }}">
    <!-- Start GA -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-94034622-3"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'UA-94034622-3');
    </script>
    <!-- /END GA -->
</head>
<body>
    <div id="app">
        <div class="main-wrapper">
            <div class="navbar-bg"></div>
            <nav class="navbar navbar-expand-lg main-navbar">
                <form class="form-inline mr-auto">
                    <ul class="navbar-nav mr-3">
                    <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
                    <li><a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none"><i class="fas fa-search"></i></a></li>
                    </ul>
                </form>
                <ul class="navbar-nav navbar-right">
                    <!-- menu drop down sebelah kanan untuk lougout -->
                    <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">

                    <div class="d-sm-none d-lg-inline-block">Hi, {{ Auth::user()->name }}</div></a>
                    <div class="dropdown-menu dropdown-menu-right">
                        <div class="dropdown-title"></div>

                        <div class="dropdown-divider"></div>
                        <a href="{{ url('logout')}}" class="dropdown-item has-icon text-danger">
                            <i class="fas fa-sign-out-alt"></i> Logout
                        </a>
                    </div>
                    </li>
                </ul>
            </nav>
            @include('template_admin.sidebar')
            <div class="main-content">
                @yield('contents')
            </div>
            @include('template_admin.footer')

            <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
            <script src="{{ asset('assets_admin/datatables/jquery.dataTables.min.js') }}"></script>
            <script src="{{ asset('assets_admin/datatables/datatables.min.js') }}"></script>
            <script src="{{ asset('assets_admin/datatables/dataTables.bootstrap4.min.js') }}"></script>
            <script src="{{ asset('assets_admin/datatables/dataTables.buttons.min.js') }}"></script>
            <script src="{{ asset('assets_admin/datatables/jszip.min.js') }}"></script>
            <script src="{{ asset('assets_admin/datatables/pdfmake.min.js') }}"></script>
            <script src="{{ asset('assets_admin/datatables/vfs_fonts.js') }}"></script>
            <script src="{{ asset('assets_admin/datatables/buttons.html5.min.js') }}"></script>
            <script src="{{ asset('assets_admin/js/stisla.js') }}"></script>
            <script src="{{ asset('assets_admin') }}/summernote/summernote-bs4.js"></script>
            <!-- Template JS File -->
            <script src="{{ asset('assets_admin/js/scripts.js') }}"></script>
            <script src="{{ asset('assets_admin/js/custom.js') }}"></script>
            <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
            <script>
                $(document).ready(function() {
                    $(document).on('click', '#btn-delete', function() {
                        event.preventDefault();
                        const url = $(this).attr("data-url");
                        Swal.fire({
                            title: 'Are you sure?',
                            text: "You are attempting to log out of system",
                            icon: 'warning',
                            showCancelButton: true,
                            confirmButtonColor: '#3085d6',
                            cancelButtonColor: '#d33',
                            confirmButtonText: 'Yes, log out'
                        }).then((result) => {
                            if (result.isConfirmed) {
                                $('#logout-form').submit();
                            } else {
                                return false;
                            }
                        })
                    });
                });

            </script>

            <!-- Page Script -->
            <script>
            $(document).ready(function() {
                $('#table').DataTable({
                dom: 'lBfrtip',
                buttons: [
                    'copyHtml5',
                    'excelHtml5',
                    'csvHtml5',
                    'pdfHtml5'
                ],
                "lengthMenu": [ [10, 25, 50, -1], [10, 25, 50, "All"] ],
                });
            });
            </script>

            <script>
            $(document).ready(function(){
                $('#summernote').summernote({
                    height: "200px",
                    toolbar:[
                        ['basic', ['style', 'fontname','fontsize']],
                        ['style', ['bold','italic','underline','clear']],
                        ['font', ['strikethough', 'superscript','subscript']],
                        ['color', ['forecolor', 'backcolor']],
                        ['block', ['ul', 'ol', 'paragraph']],
                        ['fontsize', ['fontsize']],
                        ['height', ['height', 'codeview', 'fullscreen', 'undo', 'redo']],
                    ],
                });
                $('#summernote1').summernote({
                    height: "150px",
                });
            });
            </script>
        </div>
    </div>
</body>
</html>
