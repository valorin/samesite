@extends('layout')

@section('content')

    <h2>Automatic SameSite Browser Test</h2>

    <?php
    $cookies = [
        'http_shared_none', 'http_shared_none_secure', 'http_shared_lax', 'http_shared_strict', 'http_shared_default', 'http_shared_invalid',
        'https_shared_none', 'https_shared_none_secure', 'https_shared_lax', 'https_shared_strict', 'https_shared_default', 'https_shared_invalid',
        'http_external_none', 'http_external_none_secure', 'http_external_lax', 'http_external_strict', 'http_external_default', 'http_external_invalid',
        'https_external_none', 'https_external_none_secure', 'https_external_lax', 'https_external_strict', 'https_external_default', 'https_external_invalid',
    ];
    ?>

    <table>
        <tr>
            <td>
                <h3>Recent Requests (<2 min)</h3>
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
            </td>
            <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
            <td>
                <h3>Delayed Requests (2+ min)</h3>
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
            </td>
        </tr>
    </table>

    <hr>

    <p>
        <em>The table lists all of the cookie check results for the different cookies and request types identified
        during the test.</em>
    </p>

@endsection
