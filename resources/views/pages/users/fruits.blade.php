<h1> Here are all the fruits:</h1>
<ul>
    @foreach ($fruits as $fruit )
        <li>{{$fruit->name}} costs {{$fruit->price}} $</li>
    @endforeach
</ul>