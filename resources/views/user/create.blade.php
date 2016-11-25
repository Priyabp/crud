{!! Form::open(['url' => 'user'])!!}

<div class="col-xs-12">
    {!! Form::label('name', 'Name:', ['class' => 'control-label']) !!}<br/>
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>
<div class="col-xs-12">
    {!! Form::label('email', 'E-mail:', ['class' => 'control-label']) !!}<br/>
    {!! Form::text('email', null, ['class' => 'form-control']) !!}
</div>
<div class="col-xs-12">
    {!! Form::label('password', 'Password:', ['class' => 'control-label']) !!}<br/>
    {!! Form::password('password', null, ['class' => 'form-control']) !!}
</div>
<div class="clearall"></div>
<div class='center-wrap'>

{!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
</div>
{!! Form::close() !!}
