@extends ('layouts.master')

@section ('content')
	<div class="jumbotron">
		<div class="container m">
			<p> {{ $title }} </p>
			<video id="my-video" 
				class="video-js vjs-big-play-centered jumbotron text-center"
				controls preload="auto" 
				width="640" 
				height="480" 
				poster= @php echo $thumb; @endphp
				data-setup="{}">
			<source src= @php echo $url; @endphp type='video/mp4'>
		</video>
		</div>
		<script src="http://vjs.zencdn.net/6.2.4/video.js"></script>
	</div>
@endsection
