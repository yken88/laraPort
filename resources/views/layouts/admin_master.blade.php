<!doctype html>
<html lang="ja" >
  <head>
    <title>@yield('title')</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Noto+Sans+JP&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
    <link href="album.css" rel="stylesheet">
    <link href="../example.css" rel="stylesheet">
  </head>
  <body >

<header>@include('layouts.header')</header>

<div class="main bg-dark">@include('layouts.admin_main')</div>

<footer class="bg-dark">@include('layouts.footer')</footer>


    </body>
</html>
