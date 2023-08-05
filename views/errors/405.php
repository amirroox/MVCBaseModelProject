<?php http_response_code(405) ?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>405 Method Not Allowed</title>
    <style>
        html {
            height: 100%;
        }

        body{
            font-family: 'Lato', sans-serif;
            color: #888;
            margin: 0;
        }

        #main{
            display: table;
            width: 100%;
            height: 100vh;
            text-align: center;
        }

        .fof{
            display: table-cell;
            vertical-align: middle;
        }

        .fof h1{
            font-size: 50px;
            display: inline-block;
            padding-right: 12px;
            animation: type .5s alternate infinite;
        }

        @keyframes type{
            from{box-shadow: inset -3px 0 0 #888;}
            to{box-shadow: inset -3px 0 0 transparent;}
        }
    </style>
</head>
<body>
<div id="main">
    <div class="fof">
        <h1>Error 405</h1>
        <h3>405 Method Not Allowed</h3>
    </div>
</div>
</body>
</html>
