@extends ('layouts.master')

@section ('content')
	<div class="zh text-center">
      <div class="container">
        <h1 class="jumbotron-heading"> CAT </h1>
      </div>
  </div>

    <div class="album text-muted">
      <div class="container">

        <div class="row" >
        @foreach ($cats as $cat)
        <a class="card" href="/cats/{{ $cat->id }}" target="_blank">
        <img src= {{ $cat->thumb }} alt= "alt">
          <p class="card-text"> {{ $cat->title }} </p>
        </a>
        @endforeach
        </div>
        {{ $cats -> render() }}
      </div>
  </div>
@endsection
