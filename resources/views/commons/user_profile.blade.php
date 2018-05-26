<aside class="col-xs-12 col-sm-5 col-md-4">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">{{ $user->name }}</h3>
        </div>
        <div class="panel-body">
            <img class="media-object img-rounded img-responsive" src="{{ Gravatar::src($user->email, 500) }}" alt="">
        </div>
        <ul class="nav nav-pills nav-justified">
            <li role="presentation" class="{{ Request::is('users/' . $user->id) ? 'active' : '' }}"><a href="{{ route('users.show', ['id' => $user->id]) }}">ツイート <span class="number">{{ $count_microposts }}</span></a></li>
            <li role="presentation" class="{{ Request::is('users/*/followings') ? 'active' : '' }}"><a href="{{ route('users.followings', ['id' => $user->id]) }}">フォロー <span class="number">{{ $count_followings }}</span></a></li>
            <li role="presentation" class="{{ Request::is('users/*/followers') ? 'active' : '' }}"><a href="{{ route('users.followers', ['id' => $user->id]) }}">フォロワー <span class="number">{{ $count_followers }}</span></a></li>
        </ul>
    </div>
    @include('user_follow.follow_button', ['user' => $user])
</aside>