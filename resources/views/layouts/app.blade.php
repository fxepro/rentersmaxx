<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="csrf-token" content="{{ csrf_token() }}">
<title>@yield('title', 'Rentersmaxx — Collect rent anywhere. Get paid everywhere.')</title>
<meta name="description" content="@yield('meta_description', 'One app to manage rental properties across any country. Collect rent locally in EUR, INR, GBP and more. See everything in your currency.')">

{{-- Fonts --}}
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Fraunces:ital,opsz,wght@0,9..144,300;0,9..144,500;0,9..144,700;1,9..144,300;1,9..144,400&family=Outfit:wght@300;400;500;600&display=swap" rel="stylesheet">

{{-- Shared styles --}}
@if(app()->environment('local') && !file_exists(public_path('build/manifest.json')))
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
@else
    @vite(['resources/css/app.css'])
@endif

{{-- Page-specific styles --}}
@stack('styles')
</head>
<body>

{{-- Nav --}}
@include('partials.nav', ['page' => $page ?? ''])

{{-- Page content --}}
@yield('content')

{{-- Footer (includes CTA banner) --}}
@unless($hideFooter ?? false)
  @include('partials.footer')
@endunless

{{-- Shared JS --}}
@if(app()->environment('local') && !file_exists(public_path('build/manifest.json')))
    <script src="{{ asset('js/app.js') }}"></script>
@else
    @vite(['resources/js/app.js'])
@endif

{{-- Page-specific scripts --}}
@stack('scripts')

</body>
</html>
