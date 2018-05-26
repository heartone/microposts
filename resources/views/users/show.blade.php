@extends('layouts.app')

@section('content')
    <div class="row">
        
        @include('commons.user_profile', ['user' => $user])
        
        <div class="col-xs-12 col-sm-7 col-md-8">
            
            @if (Auth::user()->id == $user->id)
                <div id="post-form">
                {!! Form::open(['route' => 'microposts.store']) !!}
                    <div class="form-group">
                        {!! Form::textarea('content', old('content'), ['class' => 'form-control', 'rows' => '3', 'placeholder' => '今何してる？']) !!}
                    </div>
                    <div class="form-group text-right">
                          {!! Form::submit('投稿する', ['class' => 'btn btn-primary']) !!}
                    </div>
                  {!! Form::close() !!}
                </div><!-- #post-form -->
            @endif
            @if (count($microposts) > 0)
                @include('microposts.microposts', ['microposts' => $microposts])
            @endif
        </div>
    </div>
@endsection