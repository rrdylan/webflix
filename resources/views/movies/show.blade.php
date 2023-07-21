@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col">
            <img src="{{ $movie->cover}}" width="200" alt="{{ $movie->title}}"/>
            
        </div>
        <div class="col">
            <h1>{{ $movie->title }}</h1>
            <p>{{ $movie->synopsis }}</p>
            <p>Durée: {{ $movie->duration }}</p>
            @if($movie->released_at)
            <p>Sortie: {{ $movie->released_at }}</p>
            @endif
            <p>Catégorie: {{ $movie->category_id }}</p>
            
        </div>
    </div>

    @if($movie->youtube)
    <div class="embed-responsive youtube">
        <div id="player">
        <script>
        // 2. This code loads the IFrame Player API code asynchronously.
        var tag = document.createElement('script');

        tag.src = "https://www.youtube.com/iframe_api";
        var firstScriptTag = document.getElementsByTagName('script')[0];
        firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);

        // 3. This function creates an <iframe> (and YouTube player)
        //    after the API code downloads.
        var player;
        function onYouTubeIframeAPIReady() {
            player = new YT.Player('player', {
            height: '360',
            width: '640',
            videoId: '{{$movie->youtube}}',
            events: {
                'onReady': onPlayerReady,
                'onStateChange': onPlayerStateChange
            }
            });
        }

        // 4. The API will call this function when the video player is ready.
        function onPlayerReady(event) {
            event.target.playVideo();
        }

        // 5. The API calls this function when the player's state changes.
        //    The function indicates that when playing a video (state=1),
        //    the player should play for six seconds and then stop.
        var done = false;
        function onPlayerStateChange(event) {
            if (event.data == YT.PlayerState.PLAYING && !done) {
            setTimeout(stopVideo, 6000);
            done = true;
            }
        }
        function stopVideo() {
            player.stopVideo();
        }
        </script>
    </div>


    @endif
@endsection
