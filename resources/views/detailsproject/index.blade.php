<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Artist | ArtsyCollabs</title>
    <!-- Favicon -->
    <link rel="icon" type="image/png" sizes="32x32" href="">
    <!-- Remix icons -->
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
    <!-- Swiper.js styles -->
    <!-- <link rel="stylesheet" href="./assets/css/swiper-bundle.min.css"/> -->
    <!-- Custom styles -->
    <link rel="stylesheet" href="{{ asset('css/details.css') }}">
</head>

<body class="light-theme">



    <section class="blog-post section-header-offset">
        <div class="blog-post-container container">
            <div class="blog-post-data">
                <h3 class="title blog-post-title">{{ $project->title }}</h3>
                <div class="article-data">
                <span>Start date: {{ $project->start_date }}</span>
                    <span class="article-data-spacer"></span>
                    <span>Ending date: {{ $project->end_date }}</span>
                    <span class="article-data-spacer"></span>
                    <span>Budget: {{ $project->budget }} $</span>
                </div>
                <img src="" alt="">
            </div>

            <div class="container">
               {{ $project->description }}

              <h1><b>Requirements :</b></h1>
              <p>{{ $project->requirements }}</p>

              <h1><b>Partner(s) :</b></h1>
                @foreach($project->partners as $partner)
                    <p>{{ $partner->name }}</p>
                @endforeach

                <h1><b>Artist(s) :</b></h1>
                @foreach($project->artists as $artist)
                    <p>{{ $artist->full_name }}</p>
                @endforeach

                
            </div>
        </div>
    </section>




  

    <script src="{{ asset('js/details.js') }}"></script>

</body>

</html>