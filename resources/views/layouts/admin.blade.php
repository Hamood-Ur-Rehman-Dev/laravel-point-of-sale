<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>@yield('title')</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{ asset('css/app.css') }}">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

  <link rel="stylesheet" href="{{ asset('plugins/sweetalert2/sweetalert2.min.css') }}">
  <style>
    *,
    *::after,
    *::before {
      font-variant: small-caps;
    }
  </style>
  @yield('css')
    <script>
        window.APP = @json(json_encode(['currency_symbol' => config('settings.currency_symbol')]))
    </script>
</head>

<body class="hold-transition sidebar-mini">
  <!-- Site wrapper -->
  <div class="wrapper">

    @include('layouts.partials.navbar')
    @include('layouts.partials.sidebar')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>@yield('content-header')</h1>
            </div>
            <div class="col-sm-6 text-right">
              @yield('content-actions')
            </div><!-- /.col -->
          </div>
        </div><!-- /.container-fluid -->
      </section>

      <!-- Main content -->
      <section class="content">
        @include('layouts.partials.alert.success')
        @include('layouts.partials.alert.error')
        @yield('content')
      </section>

    </div>
    <!-- /.content-wrapper -->

    @include('layouts.partials.footer')

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
      <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
  </div>
  <!-- ./wrapper -->

  <script src="{{ asset('js/app.js') }}"></script>
  @yield('js')
  <script src="{{ asset('plugins/sweetalert2/sweetalert2.min.js') }}"></script>
  <script>
    $(document).ready(function () {
      $(document).on('click', '.btn-delete', function () {
        $this = $(this);
        const swalWithBootstrapButtons = Swal.mixin({
          customClass: {
            confirmButton: 'btn btn-success',
            cancelButton: 'btn btn-danger'
          },
          buttonsStyling: false
        })

        swalWithBootstrapButtons.fire({
          title: 'Are you sure?',
          text: "Do you really want to delete this?",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonText: 'Yes, delete it!',
          cancelButtonText: 'No',
          reverseButtons: true
        }).then((result) => {
          if (result.value) {
            $.post($this.data('url'), {_method: 'DELETE', _token: '{{csrf_token()}}'}, function (res) {
              $this.closest('tr').fadeOut(500, function () {
                $(this).remove();
              })
            })
          }
        })
      })
    });

    function imagePreview(event){
      const [file] = event.target.files;
      if (file) {
        let img_prev = document.querySelector('.img-preview');
        img_prev.src = URL.createObjectURL(file);

        let img = document.querySelector('.custom-file-input');
        if(img){
          document.querySelector('.custom-file-label').innerText = img.value.replace(/.*(\/|\\)/, '');
        }
      }
    }
  </script>
</body>

</html>
