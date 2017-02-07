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
        ul {
            display: block;
        }

        li {
            padding: 2px;
            margin: 2px;
        }

        a:hover {
            text-underline: none;
        }

        a div.image_div {
            float: left;
        }

        a div.dev_name {
            font-size: 15px;
        }

    </style>
</head>
<body>
        <h3>Github Report - Lagos PHP Devs</h3>
        <ul>
        @forelse ($devs as $dev)
        <li>
            <a href="{{ $dev->html_url }}" target="_blank">
                <div>
                    <div class="image_div">
                        <img src="{{ $dev->avatar_url }}">
                    </div>
                    <div class="dev_name">
                        {{ $dev->name }}
                    </div>
                </div>

            </a>
        </li>
    @empty
        <li>No users</li>
    @endforelse
    </ul>
</body>
</html>