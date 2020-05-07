@extends('layout')

@section('content')
    <?php
    $cookies = [
        'http_shared_none', 'http_shared_none_secure', 'http_shared_lax', 'http_shared_strict', 'http_shared_default', 'http_shared_invalid',
        'https_shared_none', 'https_shared_none_secure', 'https_shared_lax', 'https_shared_strict', 'https_shared_default', 'https_shared_invalid',
        'http_external_none', 'http_external_none_secure', 'http_external_lax', 'http_external_strict', 'http_external_default', 'http_external_invalid',
        'https_external_none', 'https_external_none_secure', 'https_external_lax', 'https_external_strict', 'https_external_default', 'https_external_invalid',
    ];
    ?>

    <h1>Recent Requests</h1>
    <table>
        <tr>
            <th>Cookie</th>
            @foreach($test->recent as $method => $matches)
                <th>{{ $method }}</th>
            @endforeach
        </tr>
        @foreach ($cookies as $cookie)
            <tr>
                <th><code>{{ $cookie }}</code></th>
                @foreach($test->recent as $method => $matches)
                    @if (in_array($cookie, $matches))
                        <td><strong style="color: #0A0;">YES</strong></td>
                    @else
                        <td><strong style="color: #A00;">NO</strong></td>
                    @endif
                @endforeach
            </tr>
        @endforeach
        <tr>
        </tr>
    </table>

    <h1>Delayed Requests</h1>
    <table>
        <tr>
            <th>Cookie</th>
            @foreach($test->delayed as $method => $matches)
                <th>{{ $method }}</th>
            @endforeach
        </tr>
        @foreach ($cookies as $cookie)
            <tr>
                <th><code>{{ $cookie }}</code></th>
                @foreach($test->delayed as $method => $matches)
                    @if (in_array($cookie, $matches))
                        <td><strong style="color: #0A0;">YES</strong></td>
                    @else
                        <td><strong style="color: #A00;">NO</strong></td>
                    @endif
                @endforeach
            </tr>
        @endforeach
        <tr>
        </tr>
    </table>
@endsection
