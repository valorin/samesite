<p>Redirecting to {{ $url }} in <span id="seconds">{{ $delay ?? 0 }}</span> seconds...</p>

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
