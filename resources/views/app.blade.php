<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" value="{{ csrf_token() }}"/>
    <title>{{env('APP_NAME')}}</title>
    <link href="{{ mix('css/app.css') }}" type="text/css" rel="stylesheet"/>
    <link rel="stylesheet" href="https://technext.github.io/corona-free-dark-bootstrap-admin-template/assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="https://technext.github.io/corona-free-dark-bootstrap-admin-template/assets/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="https://technext.github.io/corona-free-dark-bootstrap-admin-template/assets/vendors/select2/select2.min.css">
    <link rel="stylesheet" href="https://technext.github.io/corona-free-dark-bootstrap-admin-template/assets/vendors/select2-bootstrap-theme/select2-bootstrap.min.css">
    <link rel="stylesheet" href="https://technext.github.io/corona-free-dark-bootstrap-admin-template/assets/css/style.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="https://technext.github.io/corona-free-dark-bootstrap-admin-template/assets/images/favicon.png" />
</head>
<body>
@if (Auth::check())
    <script>
        window.Laravel = {!!json_encode([
               'isLoggedin' => true,
               'user' => Auth::user()
           ])!!}
    </script>
@else
    <script>
        window.Laravel = {!!json_encode([
                'isLoggedin' => false
            ])!!}
    </script>
@endif
<div id="app">
</div>
<script src="{{ mix('js/app.js') }}" type="text/javascript"></script>
<script src="https://technext.github.io/corona-free-dark-bootstrap-admin-template/assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="https://technext.github.io/corona-free-dark-bootstrap-admin-template/assets/js/off-canvas.js"></script>
    <script src="https://technext.github.io/corona-free-dark-bootstrap-admin-template/assets/js/hoverable-collapse.js"></script>
    <script src="https://technext.github.io/corona-free-dark-bootstrap-admin-template/assets/js/misc.js"></script>
    <script src="https://technext.github.io/corona-free-dark-bootstrap-admin-template/assets/js/settings.js"></script>
    <script src="https://technext.github.io/corona-free-dark-bootstrap-admin-template/assets/js/todolist.js"></script>
</body>
</html>
