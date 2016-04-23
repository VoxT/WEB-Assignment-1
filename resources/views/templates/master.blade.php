<!DOCTYPE html>
<html>
<head>
	<title>Vo Tien Thieu</title>
	
        <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">

        <style>
            html, body {
                height: 100%;
            }

            body {
                margin: 0;
                padding: 0;
                width: 100%;
                display: table;
                font-weight: 100;
                font-family: 'Lato';
            }

            .container {
                text-align: center;
                vertical-align: middle;
            }

            .content {
                text-align: center;
                display: inline-block;
            }

            .title {
                font-size: 96px;
            }

            header{
                background-color: grey;
                text-align: center;
            }
            footer{
                background-color: grey;
                text-align: center;
                bottom: 0;
            }
        </style>
</head>
<body>
<header>Header</header>
	@yield('content')
<footer>footer &copy; by me</footer>
</body>
</html>