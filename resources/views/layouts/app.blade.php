<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title> @yield('title') </title>
    @stack('styles')
    <link rel="stylesheet" href="/css/nav_footer.css" />
  </head>
  <body>
    <x-header/>

    @yield('content')

    <x-footer/>
  </body>
  @stack('scripts')
</html>
