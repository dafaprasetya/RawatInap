<!-- Bootstrap NavBar -->
@if (!Route::is('login') && !Route::is('register'))

<nav class="navbar navbar-expand-md navbar-light bg-light shadow-sm">
  <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <a class="navbar-brand" href="#">
    <span class="">Rumah sakit Tidak Peduli</span>
  </a>

</nav><!-- NavBar END -->


@endif


<!-- Bootstrap row -->
<div class="row" id="body-row">
    <!-- Sidebar -->
      @if (Route::is('dokter_index') || Route::is('dokter_kunjungan') || Route::is('dokter_checkup') || Route::is('dokter_allkunjungan'))
         @include('snippets.sidebardokter')
      @elseif (Route::is('index') || Route::is('buatpasien') || Route::is('pasiendone') || Route::is('dirawat') || Route::is('buatdokter'))
        @include('snippets.sidebaradmin')

      @endif

      <!-- MAIN -->
      <div class="col" style="margin-top: 15px">

          @yield('content')



      </div><!-- Main Col END -->

</div><!-- body-row END -->
