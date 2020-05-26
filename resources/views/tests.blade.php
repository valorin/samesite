@extends('layout')

@section('content')

    <h2>Automatic SameSite Browser Test</h2>

    <p>Testing cross-site <code>&lt;iframe&gt;</code> and <code>&lt;img&gt;</code> requests.</p>

    <p><strong>Please do not close this window.</strong></p>

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

    <hr>

    <p>
        <em>Your browser will automatically initiate cross-site requests through <code>&lt;iframe&gt;</code>s and
        <code>&lt;img&gt;</code>s, to send cookies to the server for logging. It will automatically redirect away to
        the next part of the test when finished. Note, slow loading time may affect results - I need to fix it so it waits
        for each request before proceeding.</em>
    </p>

@endsection
