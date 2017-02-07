<html>
<head>
    <title>Lagos PHP Devs</title>
    <style>
        html, body {
            background-color: #fff;
            color: #636b6f;
            font-weight: 100;
            height: 100vh;
            margin: 0;
        }
        h3 {
            text-align: center;
        }

        ul {
            display: block;
        }

        li {
            padding: 2px;
            margin: 2px;
        }

        .dev_url {
            text-decoration: none;

        }
        .dev_image {
            width: 32px;
            height: 32px;
        }

    </style>
</head>
<body>
    <div class="container">
        <h3>Github Report - Lagos PHP Devs - Page {{$current_page}} of {{$last_page}}</h3>
        <div id="pagination">
            @if ($prev_page != 0)
                <a href="/?page={{$prev_page}}">Prev</a>
            @endif
            @if  ($next_page != 0)
                <a href="/?page={{$next_page}}">Next</a>
            @endif
        </div>
        <div id="developers">
            <table>
                @forelse ($devs as $dev)
                    <tr>
                        <td><img src="{{ $dev->avatar_url }}" class="dev_image"></td>
                        <td><a href="{{ $dev->html_url }}" target="_blank" class="dev_url">{{ $dev->login }}</a></td>
                    </tr>
                @empty
                    <tr><td colspan="2">No Users Found.</td></tr>
                @endforelse
            </table>

        </div>

    </div>
</body>
</html>