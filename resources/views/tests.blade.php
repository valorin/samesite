@extends('layout')

@section('content')
    <div id="sharedFrame"></div>
    <div id="sharedImage"></div>
    <div id="externalFrame"></div>
    <div id="externalImage"></div>

    <script>
        var delay = -500;

        setTimeout(function() {
            document.getElementById('sharedFrame').innerHTML =
                '<p>Testing shared same-site subdomain in iframe...</p>'
                + '<iframe src="{!! $shared !!}&method=iframe" height="100" width="100"></iframe>';
        }, delay += 1000);

        setTimeout(function() {
            document.getElementById('sharedImage').innerHTML =
                '<p>Testing shared same-site subdomain in image...</p>'
                + '<img src="{!! $shared !!}&method=image" height="100" width="100"></iframe>';
        }, delay += 1000);

        setTimeout(function() {
            document.getElementById('externalFrame').innerHTML =
            '<p>Testing external cross-site domain in iframe...</p>'
            + '<iframe src="{!! $external !!}&method=iframe" height="100" width="100"></iframe>';
        }, delay += 1000);

        setTimeout(function() {
            document.getElementById('externalImage').innerHTML =
                '<p>Testing external cross-site domain in image...</p>'
                + '<img src="{!! $external !!}&method=image" height="100" width="100"></iframe>';
        }, delay += 1000);

        setTimeout(function() {
            document.location = '{{ $redirect }}';
        }, delay += 1000);
    </script>
@endsection
