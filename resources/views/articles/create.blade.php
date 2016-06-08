@extends ('app')

@section('content')
  <h1>Write a New Article </h1>

  <hr />

  <!-- instead of using-->
  <!-- <form></form> -->
  <!-- Use: -->
  <!-- Bandingkan kode disini dan view source -->
  {!! Form::open(['url' => 'articles']) !!}
    <div class="form-group">
      {!! Form::label('title', 'Title:') !!}
      {!! Form::text('title', null, ['class' => 'form-control']) !!}
    </div>

    <!-- Body Form Input -->
    <div class="form-group">
      {!! Form::label('body', 'Body:') !!}
      {!! Form::textarea('body', null, ['class' => 'form-control']) !!}
    </div>

    <!-- Published_at Form Input -->
    <div class="form-group">
      {!! Form::label('published_at', 'Publish On:') !!}
      {!! Form::input('date','published_at', date('Y-m-d'), ['class' => 'form-control']) !!}
      <!-- the third argument, which null, is actually a default -->
    </div>

    <!-- Add Article Form Input -->
    <div class="form-group">
      {!! Form::submit('Add Article', ['class' => 'btn btn-primary form-control']) !!}
    </div>
  {!! Form::close() !!}

  @if ($errors->any())
  <ul class="alert alert-danger">
    @foreach ($errors->all() as $error)
      <li>{{ $error }}</li>
    @endforeach
  </ul>

  @endif
@stop
