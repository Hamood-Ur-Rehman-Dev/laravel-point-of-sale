<footer class="main-footer bg-{{config('settings.navbar_bg')}} text-{{config('settings.navbar_fg')}}">
    <div class="float-right d-none d-sm-block">
      <b>Version</b> 1.0.0
    </div>
    <strong>Copyright &copy; {{now()->format('Y')}} <a href="{{route('home')}}">{{env('APP_NAME')}}</a>.</strong>
    All rights reserved.
</footer>