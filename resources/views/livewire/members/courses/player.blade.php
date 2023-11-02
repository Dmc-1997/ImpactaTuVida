<div>
    {{-- <h6 class="pt-2 text-item">{{ $title }}</h6>
    <h4 class="mb-2 d-none d-lg-block">{{ $subtitle }}</h4>

    <h5 class="mb-2 d-block d-lg-none">{{ $subtitle }}</h5> --}}
    
    @if ($selectedClass == 0)
        <div class="mt-4 text-center intro_video" id="container_intro">
            <h1>Selecciona una clase para iniciar</h1>
        </div>
    @else
        @if ($type == 'video')
            <div class="progress">
                <div class="progress-bar bg-progressbar" role="progressbar" style="width: {{ $seen }}%" aria-valuenow="{{ $seen }}" aria-valuemin="0" aria-valuemax="100"></div>
            </div>
            <div class="intro_video embed-responsive embed-responsive-16by9" id="container_video">
                <video id="video" oncontextmenu="return false;" controls onclick="playPause();" controlslist="nodownload">
                    <source src="{{ $video_url }}" type="video/mp4">
                </video>
            </div>
            <p class=" card-text">Duración: {{ $duration }}</p>
        @elseif($type == 'pdf')
            <a href="{!! $video_url !!}" target="_blank" class="mb-2 btn btn-theme rounded-pill">Descargar</a>
            <div class="mt-4 text-center intro_pdf" id="container_pdf">
                <iframe src="{{ $video_url }}" id="pdf_file" style="width:100%; height:700px;" frameborder="0"></iframe>
            </div>
        @elseif($type == 'png' || $type == 'jpg' || $type == 'jpeg' || $type == 'gif')
            <div class="mt-4 text-center intro_img" id="container_img">
                <img src="{{ $video_url }}" id="img_file" style="width:100%;">
            </div>
        @else

        @endif

        <div class="mt-4 coursesTemplate_container-btn-next__PpsfZ">
            @if ($course->classes_to_certificate == $total_completed && $total_completed > 0)
                <a href="{{ route('members.courses.certification', $course->id)}}" class="btn btn-theme rounded-pill">Certificación</a>
            @endif
            @if ($previous >= 0)
                <div class="coursesTemplate_container-icon-btn__gdLbW">
                    <img
                        src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAHoAAABtCAYAAABuinXHAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAAlxJREFUeNrs3b9Nw0AYh2HHE2SEZAJERxeyARTUJCN4ApIJEBNgapqMkHQps0E8gkfgO2FLFCAQvvj+/N5XsiyQkbAfLopx7CsKIiIiIiIiIiIiIiKiBJrktkPvx/nMVrPuy+bh5tzAnBG0Aa9s9fQFuc9BVwa+Azp95FdbrX7ZrDbstSp0KYLsWtm2G0Z03sh9rS1zG9ktIzpfZNf0Hz8DdGLIfVdA549cfPOuHOgMkfvTLaAzR3YdgM4f2b3b3gGdN7KrUjy1iv482jPy2pDrQrQJyECDDDTIQIMMNMji0CALQIMsAA2yADTIAtAgC0CDLAANsgA0yALQIIevTAy5AjnCEe0ZWfpOi2ihQRaABlkAGmQBaJAFoD0jn9w7bGGX1v7IT9FBe0amzxpb3gx8EwU0yBdvb8v90M+jlwORNyBfvFtbnoON6O6hMGccRmtpo3ofYkTfcexH7THUS/eCYz9qs1DQU459Og2Bbjl8GtAHDt+onUJB14zqUXsJAt2dwFcc/1HaDn2mKf8Ziz8vF3cGf5So+yVqPLznnrWy9HUFj6tX8eX9ypVX6Atgcz06VmiwhaDBFoIGWwgabCFosIWgwRaCBlsIGmwhaLCFoMEWggZbCBpsIWiwhaDBFoIGWwgabCFosIWgwRaCBlsIGmy/RT2TneePEjMjfOx5HtnzoXc9MKLTGNmSN/AnM62wR+wF0BrYU6A1sBugNbCZEV4AmxnhRbBlZ4QvU9+BDnv7h02l5+Ioc9iJ7sGoyx9elt33rpmLg4iIiIiIiIiIiIiIiIiIyH8fAgwANblqO7Msc/QAAAAASUVORK5CYII="
                        alt=""
                        class="coursesTemplate_styles-icon__+66Pq"
                        style="height: 20px;width: 20px;"
                    />
                    <button class="coursesTemplate_styles-next-btn__WFv4P" wire:click="previous">Módulo anterior</button>
                </div>
            @endif
            @if ($next < count($list))
                <div class="coursesTemplate_container-icon-btn__gdLbW">
                    <button class="coursesTemplate_styles-next-btn__WFv4P"  wire:click="next">Módulo siguiente</button>
                    <img
                        src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAHoAAABtCAYAAABuinXHAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAAnlJREFUeNrs3cFN40AYQOEJFaQEbwfhxm1DB3DgTFIBuxVsOgAqCJw5QAeEG8d0kJSQEvitjbQIgcDriZ3hvSdZFiIc8JcZMjaJUzIzMzMzMzMzMzMzMyuggYcgpbvnH1Xsqu2Xm7Oj1VLo7wU8jt2f2MZvvrWO7TbAZ0KXjzyJ3fyThy1iOw3wjdBlIp/E7v6LD6+n8ePSsQ+gA3re4LGj2B7jyTEUurzR3BSteGziiB61+LlisalTd6JhCw3BJkIvidjU5dUq/TsT1vZJU8TSizp1T2nTOBI6RuCChk0/1z1JzU6eFDuN469eUbC9TAnBFhqCLTQEW2gIttAQbKEh2EJDsIWGYAsNwRYagi00BFtoCLbQEGyhIdhCQ7CFhmALDcEWGoI9yPzL1v8oNwR7n8c22UfsQcZnc/2G8sqxnbVs2IMMyPOMz2LbEfZBS+SZyDuv/nN42duI3n7Ay0qHzjrevvGg8xF94rHv/IVeL1P3T499p1V9QQ899uXUBnrj4WNAP3n4Ol9m9QJ946jutOteoLcL+N8e/066iuO97mUd/Wo9/SvHgt4+njkDufWb9nOd6x7H7sK19X4iZ4N+g14l7sWNemYb7RvyTqCpZb64kxVZaAiy0BBkoSHIQkOQhYYgCw1BFhqCLDQEWWgIstAQZKEhyEJDkIWGIAsNQRYagiw0BFloCLLQEGQ8NAUZDU1CxkI3vCN88ch13hEegIyE/s87wheNTB3RIxoyeepGIQsNQaZCL2jI5OVV0zvCF41MnrqnJGQs9Ks7wm8IyOgXYwF4E7vD9P5nsTykv5/UN01mZmZmZmZmZmZmZmZmZmb2YS8CDAB0z3mCD2hKlwAAAABJRU5ErkJggg=="
                        alt=""
                        class="coursesTemplate_styles-icon__+66Pq"
                        style="height: 20px;width: 20px;"
                    />
                </div>
            @endif
        </div>
        
        {{-- <div class="d-flex justify-content-between">
            @if ($previous >= 0)
                <button class="mt-0 mb-0 btn btn-theme rounded-pill" wire:click="previous">Anterior</button>
            @endif
            @if ($course->classes_to_certificate == $total_completed && $total_completed > 0)
                <a href="{{ route('members.courses.certification', $course->id)}}" class="btn btn-theme rounded-pill">Certificación</a>
            @endif
            @if ($next < count($list))
                <button class="mt-0 mb-0 btn btn-theme rounded-pill" wire:click="next">Siguiente</button>
            @endif
        </div> --}}

    @endif

    <div class="text-center card video_container_buttons">
        <div class="card-footer video_container_buttons">
            <div class="row">
                @if ($course->action_button)
                    <div class="mb-4 col-md-6 col-12">
                    </div>
                @endif
                @if ($course->action_image)
                    <div class="col-md-6 col-12">
                        <a href="{{$course->action_image_url}}" target="_blank">
                            <img src="{{$course->action_image_path}}">
                        </a>
                    </div>
                @endif
            </div>
        </div>
    </div>

    @section('js')
    <script>
        $(document).ready(function(){
            var selectedChapter = '{{$selectedChapter}}';
            var selectedClass = '{{$selectedClass}}';
            var progress = '{{ $progress }}';
            var type = '{{$type}}';

            if (type == 'video') {
                video = document.getElementById("video");
                video.currentTime = progress;
                setTimeout(function(){
                    video = document.getElementById("video");
                    if (video.duration > 0 && video.currentTime > 0 ) {
                        Livewire.emit('updateFollowup', video.duration, video.currentTime)
                    }
                }, 10000);
            }
            window.livewire.emit('contentPlaying', selectedChapter, selectedClass );
        });
    </script>
    @endsection
</div>
