@foreach($challenges as $challenge)
    <div class="panel panel-default">
        <div class="panel-body">
            {{ $challenge['title'] }}
        </div>
    </div>
@endforeach