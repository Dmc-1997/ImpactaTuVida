<!doctype html>
<html lang="es">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <title>{{ env('APP_NAME') }}</title>

        @livewireStyles

        <script src="{{ asset('js/alpine.js') }}" defer></script>

        <link rel="stylesheet" type="text/css" href="{{ asset('vendor/bootstrap_4_6/css/bootstrap.min.css') }}" >

        <link rel="stylesheet" type="text/css" href="{{ asset('vendor/fontawesome_5_8/css/fontawesome-all.min.css') }}" >

        <link rel="stylesheet" href="{{ asset('themes/impacta/css/new-css.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/rating.css') }}" >


        <!-- Bootstrap icons-->
        <link rel="stylesheet"  href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" />
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,700;0,900;1,100;1,200;1,300;1,400;1,500;1,700;1,900&display=swap"
            rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/academy.css') }}">

        <link rel="icon" type="image/x-icon" href="{{ asset('favicon.png') }}" />
        {{-- <link rel="stylesheet" href="{{ asset('css/rating.css') }}"> --}}
        
        @yield('head')
    </head>
    <body id="body">

        @yield('content')

        <script src="{{ asset('vendor/jquery/jquery-3.5.1.slim.min.js') }}"></script>

        <script src="{{ asset('vendor/bootstrap_4_6/js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('themes/advanced/js/custom.js')}}"></script>
        <script>

            window.addEventListener('close-menu-modal', (e) => {
                $('#chapterModal').modal('hide');
                return 1;
            });

            window.addEventListener('play-this-class', (e) => {
                window.livewire.emit('playThisClass', e.detail.selectedChapter, e.detail.selectedClass, e.detail.title, e.detail.subtitle, e.detail.type, e.detail.video_url, e.detail.duration);
                return 1;
            });

            window.addEventListener('content-playing', (e) => {
                window.livewire.emit('contentPlaying', e.detail.selectedChapter, e.detail.selectedClass );
                return 1;
            });

            window.addEventListener('play-this-video', (e) => {
                var video_url = e.detail.video_url;
                var progress = e.detail.progress;
                video = document.getElementById("video");
                video.pause();
                video.src = video_url;
                video.load();
                video.currentTime = progress;
                video.play();
                return 1;
            });

            window.addEventListener('class-followup', event => {
                setTimeout(function() {
                    video = document.getElementById("video");
                    if (video.duration > 0 && video.currentTime > 0 ) {
                        Livewire.emit('updateFollowup', video.duration, video.currentTime)
                    }
                }, 10000);
                return 1;
            });

            window.addEventListener('start-countdown', (e) => {
                var countDownDate = new Date(e.detail.finish_at).getTime();
                var x = setInterval(function() {
                    var now = new Date().getTime();
                    var distance = countDownDate - now;
                    var days = Math.floor(distance / (1000 * 60 * 60 * 24));
                    var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                    var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                    var seconds = Math.floor((distance % (1000 * 60)) / 1000);
                    document.getElementById("countdown").innerHTML = "Tiempo restante: " + minutes + "m " + seconds + "s ";

                    if (distance < 0) {
                        clearInterval(x);
                        document.formevaluate.submit();
                    }
                }, 1000);
            });


        </script>

        @yield('js')

        @livewireScripts
    </body>
</html>
