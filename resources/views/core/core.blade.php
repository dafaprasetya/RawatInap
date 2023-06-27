<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>
        @yield('title')
    </title>
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

    <link rel="stylesheet" href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
    @if (Route::is('dokter_kunjungan'))
    <script>
        $( function() {
          var pasien = [
            @foreach ($pasien as $p)
                {
                    value : {{ $p->id }},
                    label : '{{ $p->nama_pasien }}'
                },
            @endforeach
          ];
          $( "#tags" ).autocomplete({
            source: pasien,
            select: function (event, ui) {
                $(this).val(' '),
                $("#pasien_id").val(ui.item.value)
            }
          });
        } );
    </script>
    @elseif (Route::is('dokter_index') || Route::is('dokter_allkunjungan'))
    <script>
        $(document).ready(function(){
          $("#caripasien").on("keyup", function() {
            var value = $(this).val().toLowerCase();
            $("#tablepasien tr").filter(function() {
              $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
          });
        });
    </script>
    @endif
</head>
<body>
    @include('snippets.sidebar')


    <script src="{{ asset('vendor/popper/popper.min.js') }}"></script>
    @if (Route::is('dokter_kunjungan'))

    @else
        <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>

    @endif
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/script.js') }}"></script>
</body>
</html>
