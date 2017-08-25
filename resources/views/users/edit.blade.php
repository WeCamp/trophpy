<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Update your profile</h4>
            </div>
            {!! Form::model(Auth::user(),['route' => ['users.update', Auth::user()->username], 'files' => true]) !!}
            <div class="modal-body">
                {!! Form::token() !!}
                <div class="input-group">
                    {!! Form::label('name', 'Name') !!}
                    {!! Form::text('name', null, ['class' => 'form-control']) !!}
                </div>

                <div class="input-group">
                    {!! Form::label('avatar', 'Avatar') !!}
                    {!! Form::file('avatar',null,['class' => 'form-control']) !!}
                </div>

                <div class="input-group">
                    {!! Form::label('bio', 'Bio') !!}
                    {!! Form::textArea('bio',null,['class' => 'form-control']) !!}
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                {!! Form::submit('Update', ['type' => 'button','class'=>'btn btn-primary']) !!}
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>