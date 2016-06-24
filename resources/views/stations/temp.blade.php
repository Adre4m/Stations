<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">

<!-- Fonts -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.css" crossorigin="anonymous">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700">

<!-- Styles -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/css/bootstrap.css" crossorigin="anonymous">
{{-- <link href="{{ elixir('css/app.css') }}" rel="stylesheet"> --}}

<style>
    body {
        font-family: 'Lato';
    }

    .fa-btn {
        margin-right: 6px;
    }

    .dataTable  {
        border: solid 1px #d5d5d5;
    }

    .dataTable .odd {
        background-color: #f5f5f5;
    }

    .dataTable .odd :hover:not(.btn){
        background-color: #f0f0f0;
    }

    .dataTable .even {
        background-color: #e5e5e5;
    }

    .dataTable .even :hover:not(.btn) {
        background-color: #e0e0e0;
    }

    .navbar {
        background-color: #61addd;
    }

    .navbar .navbar-brand,
    .navbar-default .navbar-nav > li > a {
        color: #ffffff;
    }

    .navbar .navbar-brand:hover,
    .navbar-default .navbar-nav > li > a:hover {
        color: #ffffff;
        background-color:#509ccc;
    }

    .navbar-default .navbar-nav > .open > a,
    .navbar-default .navbar-nav > .open > a:focus,
    .navbar-default .navbar-nav > .open > a:hover
    {
        color:#ffffff;
        background-color:#509ccc;
    }

    .dropdown-menu > li > a{
        color:#61addd;
    }

    .dropdown-menu > li > a:hover {
        color:#509ccc;
        background-color: inherit;
    }

</style>
{!! Html::preview('stations', $messages) !!}