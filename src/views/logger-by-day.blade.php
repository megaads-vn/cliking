@extends('cliking::layout')
@section('content')
    <div class="container">
        <table class="table table-bordered">
            <tr>
                <th>#</th>
                <th>IP</th>
                <th>Count</th>
            </tr>
            <?php $i = 1; ?>
            @foreach ($accessGroup as $access)
                <tr>
                    <td>{{ $i++ }}</td>
                    <td><a href="{{ route('logger-by-day-and-ip', [
                            'ip' => $access->ip,
                            'day' => $day
                        ]) }}">{{ $access->ip }}</a></td>
                    <td>{{ $access->count }}</td>
                </tr>
            @endforeach

        </table>
        {{ $accessGroup->render() }}

    </div>

@endsection
