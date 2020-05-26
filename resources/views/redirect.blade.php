@extends('layout')

@section('content')

    <h2>Automatic SameSite Browser Test</h2>

    <p>Redirecting to <code>{{ $url }}</code> in <span id="seconds">{{ $delay ?? 0 }}</span> seconds...</p>

    <p><strong>Please do not close this window.</strong></p>

    @if ($post ?? false)
        <form id="submit" method="post" action="{!! $url !!}"><button type="submit">Submitting...</button></form>
    @endif

    <script>
        var delay = {{ $delay ?? 0 }};

        var interval = setInterval(function() {
            if (delay <= 0) {
                @if ($post ?? false)
                    console.log('Submitting POST form to: {!! $url !!}');
                    document.getElementById('submit').submit();
                @else
                    console.log('Redirecting to location: {!! $url !!}');
                    window.location = '{!! $url !!}';
                @endif
                clearInterval(interval);
            }

            document.getElementById('seconds').innerText = delay;
            delay -= 1;
        }, 1000);
    </script>

    <hr>

    <p>
        <em>Your browser will automatically redirect been the various same-site and cross-site domains in the test.
            Checking the cookies available in each, as per the request performed. <strong>It will take more than 2 minutes!</strong>
            Please do not close this window, or the test will be aborted. You need to wait until the results are shown.
        </em>
    </p>

@endsection
