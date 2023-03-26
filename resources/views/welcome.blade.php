<!DOCTYPE html>
<html lang="en">

<head>

    <title>Laravel Project</title>

    <link rel="canonical" href="https://blog.appseed.us/bootstrap-for-beginners-with-examples/" />

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/font-awesome-4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/style.css">
    <style>


        html,
        body {
            height: 100%;
            width: 100%;
            margin: 0;
            padding: 0;
            color: #000;
        }

        #main {
            background: url(https://cdn.wallpapersafari.com/10/75/FoudXH.jpg) no-repeat center center fixed;
            display: table;
            height: 100%;
            position: relative;
            width: 100%;
            background-size: cover;
            color: #fff;
        }


        .getstarted {
            display: table-cell;
            text-align: center;
            vertical-align: middle;
        }

        .btn{
            background-color: darkolivegreen;
        }

        .getstarted h1,
        h3 {
            font-size: 2.5em;
            font-weight: 700;
        }
    </style>

</head>

<body>
    <div id="main">
        <div class="getstarted">
            <h1>LARAVEL</h1>
            <h3>POSTS CRUD USING LARAVEL</h3>
            <br />
            <a href="{{url('/posts')}}" class="btn btn-dark btn-lg">Get Started</a>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</body>

</html>

