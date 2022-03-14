<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.4.4/sweetalert2.min.css">
    <link rel="stylesheet" href="<?=$_SERVER['SERVER_NAME']?>../../src/public/css/style.css">
</head>
<body>
<nav class="navbar">
    <div class="logo">PHP MVC</div>
    <ul class="nav-links">
        <div class="menu">
            <li><a href="home">Home</a></li>
            <li><a href="report">Report</a></li>
        </div>
    </ul>
</nav>
{{yeildblock}}
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.4.4/sweetalert2.min.js"></script>
<script src="<?=$_SERVER['SERVER_NAME']?>../../src/public/js/custom.js"></script>

</body>
</html>