@extends('layout')

@section('content')
    <div id="sharedFrame"></div>
    <div id="externalFrame"></div>

    <script>
        var delay = -500;

        setTimeout(function() {
            document.getElementById('sharedFrame').innerHTML =
                '<p>Testing shared same-site subdomain...</p>'
                + '<iframe src="{!! $shared !!}&method=iframe" height="100" width="100"></iframe>';
        }, delay += 1000);

        setTimeout(function() {
            document.getElementById('externalFrame').innerHTML =
            '<p>Testing external cross-site domain...</p>'
            + '<iframe src="{!! $external !!}&method=iframe" height="100" width="100"></iframe>';
        }, delay += 1000);

        setTimeout(function() {
            document.location = '{{ $redirect }}';
        }, delay += 1000);
    </script>
@endsection
