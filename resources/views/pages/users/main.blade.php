<h2>
    The users are:
    @foreach($users as $user)
        {{ $user['name'] }}{{","}}
    @endforeach
</h2>
