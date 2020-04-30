@extends('layout')

@section('content')
    <?php
    $cookies = [
        'shared_none', 'shared_none_secure', 'shared_lax', 'shared_strict', 'shared_default', 'shared_invalid',
        'external_none', 'external_none_secure', 'external_lax', 'external_strict', 'external_default', 'external_invalid',
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
