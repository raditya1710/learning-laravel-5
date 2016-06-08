@extends ('app')

@section('content')
  <h1>Write a New Article </h1>

  <hr />

  <!-- instead of using-->
  <!-- <form></form> -->
  <!-- Use: -->
  <!-- Bandingkan kode disini dan view source -->
  {!! Form::open(['url' => 'articles']) !!}
    @include('articles.form', ['submitButtonText' => 'Add Article'])
  {!! Form::close() !!}

  @include ('errors.list')
@stop
