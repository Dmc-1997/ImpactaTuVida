<html>
<head>
    <style>
        #watermark {
            position: fixed;
            bottom: 0%;
            width: 100%;
            text-align: center;
            opacity: 1;
            transform: rotate(0deg);
            transform-origin: 50% 50%;
            z-index: -1000;
        }

        .student{
            color: #ffffff;
            margin-top: {{$student_margin_top}}rem;
            text-align: center;
            font-weight: bold;
            font-size: 3.1rem;
            text-transform: uppercase;
            font-family: "Montserrat", -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";
        }

        .course_title {
            color: #ffffff;
            text-align: center;
            font-weight: bold;
            font-size: 2rem;
            margin-top: {{$title_margin_top}}rem;
            text-transform: uppercase;
            font-family: "Montserrat", -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";
        }

        .certification_date {
            color: #ffffff;
            text-align: center;
            font-weight: bold;
            font-size: 1.9rem;
            margin-top: {{$date_margin_top}}rem;
            text-transform: uppercase;
            font-family: "Montserrat", -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";
        }

    </style>
</head>
<body>
    <div id="watermark">
        <img src="{{ public_path('imagenes/certificate.png') }}" height="100%" width="100%" />
    </div>
    <div>
        <h1 class="student">{{ $student }}</h1>
        <div class="course_title">{{$title}}</div>
        <div class="certification_date">{{ $certification_date }}</div>
    </div>
</body>
</html>