<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Not Found</title>
    <link rel="stylesheet" href="404.css">
</head>
<body>
    <div id="container">
        <div class="content">
            <h2>404</h2>
            <h4>Opps! Page not found</h4>
            <p>The page you were looking for doesn't exist. You may have mistyped the address or the page may have moved.</p>
            <a href="../../index">Back To Home</a>
        </div>
    </div>
    <script type="text/javascript">
        var container = document.getElementById('container');
        window.onmousemove = function(e){
            var x = - e.clientX/5,
                y = - e.clientY/5;
            container.style.backgroundPositionX = x + 'px';
            container.style.backgroundPositionY = y + 'px';
        }
    </script>
</body>
</html>