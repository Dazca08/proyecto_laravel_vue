<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- CSRF Name App -->
    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:300,400,400i,600,700,800,900" rel="stylesheet" />

    <!-- Font awesome -->
    <link href="{{ asset('assets/fonts/fontawesome-free-5.10.1-web/css/all.min.css') }}" rel="stylesheet" />

    <!-- Styles -->
    <link id="gull-theme" rel="stylesheet" href="{{ asset('assets/styles/css/themes/lite-blue.css') }}" />
    <link href="{{ asset('assets/styles/vendor/perfect-scrollbar.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/app.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/styles/vendor/pickadate/classic.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/styles/vendor/pickadate/classic.date.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/styles/vendor/sweetalert2.min.css') }}" rel="stylesheet" />
</head>

<body class="text-left">
    <div id="app">
        @include('layouts.admin')