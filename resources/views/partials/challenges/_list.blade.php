@foreach($challenges as $challenge)
    <div class="panel panel-default">
        <div class="panel-body">
            <h4>{{ $challenge['title'] }}</h4>

            @if(isset($showStartedOn) && $showStartedOn === true)
                <p>Started on {{ \Carbon\Carbon::parse($challenge['pivot']['started_on'])->format('l j F Y h:i A') }}</p>
            @endif

        @if(isset($showCompletedOn) && $showCompletedOn === true)
                <p>Completed on {{ \Carbon\Carbon::parse($challenge['pivot']['completed_on'])->format('l j F Y h:i A') }}</p>
            @endif
        </div>
    </div>
@endforeach