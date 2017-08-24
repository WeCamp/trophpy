@foreach($challenges as $challenge)
    <div class="panel panel-default">
        <div class="panel-body">
            <h4>{{ $challenge['title'] }}</h4>

            @if(isset($showStartedOn) && $showStartedOn === true)
                Started on {{ \Carbon\Carbon::parse($challenge['pivot']['created_at'])->format(\Carbon\Carbon::DEFAULT_TO_STRING_FORMAT) }}
            @endif

            @if(isset($showCompletedOn) && $showCompletedOn === true)
                Completed on {{ \Carbon\Carbon::parse($challenge['pivot']['completed_on'])->format(\Carbon\Carbon::DEFAULT_TO_STRING_FORMAT) }}
            @endif
        </div>
    </div>
@endforeach