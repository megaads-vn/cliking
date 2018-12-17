@extends('cliking::layout')
@section('content')

    <div class="container">
        <table class="table table-bordered">
            <tr>
                <th>#</th>
                <th>IP</th>
                <th>Location</th>
                <th>At</th>
                <th>User agent</th>
                <th>Referer</th>
            </tr>
            <?php $i = 1; ?>
            @foreach ($accessGroup as $access)
                <tr>
                    <td>{{ $i++ }}</td>
                    <td>{{ $access->ip }}</td>
                    <td>{{ $access->request_uri }}</td>
                    <td>{{ $access->created_at }}</td>
                    <td>{{ $access->user_agent }}</td>
                    <td>{{ $access->referer }}</td>
                </tr>

            @endforeach


        </table>
        {{ $accessGroup->render() }}

    </div>

@endsection
