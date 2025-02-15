<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    @livewireStyles
    <!-- link from booststrap official website, no need to download anything -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<style>
    .bekgron 
    {
      background-color: rgb(177, 255, 229);
    }
  
    .button {
      background-color: transparent
    }
  </style>

    <body class="font-sans antialiased">
        <div class="min-h-screen font-[Poppins] bg-gradient-to-br from-[#a8e8f6] to-[#90fab9]">
            @livewire('navbar')
            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>
        @livewire('footer')
        @livewireScripts

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    </body>
</html>
