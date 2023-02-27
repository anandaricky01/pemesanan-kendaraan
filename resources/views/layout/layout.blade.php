<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.101.0">
    @vite('resources/css/app.css')
    <title>Tugas Akhir</title>

</head>

<body>

    @include('layout.components.symbol')

    <main class="d-flex flex-nowrap">
        <div class="container mx-4 my-3">
            @yield('container')
        </div>
    </main>

@include('layout.components.js')
