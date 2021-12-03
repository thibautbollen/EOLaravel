@extends('template.app')
@section('content')
    <div class="container">
        <div class="my-5">
            <h1 class="mb-3">Members</h1>
            @foreach($array as $country)
                <h3 class="text-muted">{{$country}}</h3>
                @foreach($members as $spec)
                    @if ($spec->country == $country)
                        <p>{{$spec->title}}</p>
                    @endif
                @endforeach
            @endforeach
        </div>
    </div>
@endsection
