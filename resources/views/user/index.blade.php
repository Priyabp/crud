

<html>
<p class="lead">User data</p>
<hr>

@foreach($test_data as $data)
   <p>{{ $data->name }} <span>=></span>
  {{ $data->email}}</p>
   
@endforeach
</html>