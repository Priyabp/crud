<table>
<th>Product Name</th>
<th>SKU</th>
<tbody>
@foreach($products as $products)
	<tr>
	 <td> {!! $products->name !!}</td>
	 <td> {!! $products->sku !!}</td>
	 <td> <img src='{!! public_path()."/images/catalog/$products->filename" !!}' 	</td>
	</tr>

@endforeach
</tbody>
</table>