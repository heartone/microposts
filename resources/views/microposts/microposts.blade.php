<ul class="media-list">
@foreach ($microposts as $micropost)
    <?php $user = $micropost->user; ?>
    <li class="media">
        <div class="media-left">
            <img class="media-object img-rounded" src="{{ Gravatar::src($user->email, 50) }}" alt="">
        </div>
        <div class="media-body">
            <div>
                {!! link_to_route('users.show', $user->name, ['id' => $user->id]) !!} <span class="text-muted pull-right">{{ $micropost->created_at->format('m月d日 H:i') }}</span>
            </div>
            <div>
                <p>{!! nl2br(e($micropost->content)) !!}（ID:{{ $micropost->id }}）</p>
            </div>
            <div style="display:inline-flex">
                
                
                @if (Auth::user()->is_favorite($micropost->id))
                    {!! Form::open(['route' => ['unfavorite', $micropost->id], 'method' => 'delete']) !!}
                        {!! Form::submit('お気に入り解除', ['class' => 'btn btn-warning btn-xs active']) !!}
                    {!! Form::close() !!}
                @else
                    {!! Form::open(['route' => ['favorite', $micropost->id], 'method' => 'post', 'class' => 'form-inline']) !!}
                        {!! Form::submit('お気に入り', ['class' => 'btn btn-success btn-xs']) !!}
                    {!! Form::close() !!}
                    
                @endif
                &nbsp;
                @if (Auth::user()->id == $micropost->user_id)
                    {!! Form::open(['route' => ['microposts.destroy', $micropost->id], 'method' => 'delete']) !!}
                        {!! Form::submit('削除', ['class' => 'btn btn-danger btn-xs']) !!}
                    {!! Form::close() !!}
                @endif
                
                
            </div>
        </div>
    </li>
@endforeach
</ul>
{!! $microposts->render() !!}