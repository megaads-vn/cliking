@extends('cliking::layout')
@section('content')
    <div class="container">
        <ul>
            @foreach ($days as $item)
                <li><a href="{{ route('logger-by-day', [
                        'day' => $item->day
                    ])
                }}">
                {{$item->day}}
            </a></li>
            @endforeach
            {{ $days->render() }}
        </ul>
    </div>

@endsection
