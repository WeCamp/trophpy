@foreach($challenges as $challenge)
    <div class="panel panel-default">
        <div class="panel-body">
            <h4>{{ $challenge['title'] }}

            @if(isset($showStartChallenge) && $showStartChallenge === true)
                <a  class="btn btn-primary pull-right" href="{{ route('challenges.startChallenge', ['challengeId' => $challenge['id']]) }}">I'm Going For It!</a>
            @endif
            </h4>

            @if(isset($showStartedOn) && $showStartedOn === true)
                <p>Started on {{ \Carbon\Carbon::parse($challenge['pivot']['started_on'])->format('l j F Y h:i A') }}
                    <a  class="btn btn-success pull-right" href="{{ route('challenges.completeChallenge', ['user_challenge_id' => $challenge['pivot']['id']]) }}">I Did It!</a>
                </p>
            @endif

            @if(isset($showCompletedOn) && $showCompletedOn === true)
                <p>Completed on {{ \Carbon\Carbon::parse($challenge['pivot']['completed_on'])->format('l j F Y h:i A') }}</p>
            @endif
        </div>
    </div>
@endforeach