{!! Form::open(['url' => 'product','files'=>true])!!}
	{!! Form::label('Product Name') !!}<br/>
	{!! Form::text('name') !!}<br/>
	
	{!! Form::label('Product SKU') !!}<br/>
	{!! Form::text('sku',null) !!}<br/>
	{!! Form::label('Product Image') !!}<br/>
	{!! Form::file('image', null) !!}<br/>
	{!! Form::submit('Create Product') !!}
{!! Form::close() !!}