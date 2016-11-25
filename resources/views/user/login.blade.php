{!! Html::style('bootstrap-3.2.0-dist/css/bootstrap.css') !!}
{!! Html::style('bootstrap-3.2.0-dist/css/bootstrap.min.css') !!}
{!! Html::style('style.css') !!}

{!! Html::style('bootstrap-3.2.0-dist/js/bootstrap.js') !!}

{!! Html::style('bootstrap-3.2.0-dist/js/bootstrap.min.js') !!}
<div class='wrapper'>
<div class = 'login login-bg clearfix'>
	<div class="login-wrap container-fluid">
		<div class="row vertical-center-row">
		<div class="col-xs-4"></div>
		<div class="col-xs-4">
			<h3><span class="text-center article-title">User Sign In </span></h3>
			<div id ='login-form'>
			@if(Session::has('error'))
				<div class="col-xs-12">
				<?php 
					echo '<div class="alert alert-danger">';
				  
					if (Session::has('error'));
					
				echo Session::get('error');
				 	echo '</div>';
					?>
				</div>
				@endif
			{!! Form::open(['url' => 'login'])!!}


			<div class="col-xs-12">
			    {!! Form::label('email', 'E-mail:', ['class' => 'control-label']) !!}<br/>
			    {!! Form::text('email', null, ['class' => 'form-control']) !!}
			</div>
			<br/>
			<div class="col-xs-12">
			    {!! Form::label('password', 'Password:', ['class' => 'control-label']) !!}<br/>
			    {!! Form::password('password', null, ['class' => 'form-control']) !!}
			</div>
			<br/>
					
			{!! Form::submit('Sign In', ['class' => 'btn btn-primary col-xs-4']) !!}<br/>
			
			{!! Form::close() !!}

			</div>

			</div>

			<div class="col-xs-4"></div>
		</div>
	</div>
</div>
</div>