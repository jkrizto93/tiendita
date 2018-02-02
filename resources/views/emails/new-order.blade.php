<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<p>Se ha realizado un nuevo pedido</p>
	<p>Datos del cliente : </p>
	<ul>
		<li>
			<strong>Nombre
			</strong>
			{{$user->name}}
		</li>
		<li>
			<strong>E-mail
			</strong>
			{{$user->email}}
		</li>
		<li>
			<strong>pedido
			</strong>
			{{$cart->order_date}}
		</li>
	</ul>
	<hr>
	<p>detalles del pedido</p>
	<ul>
		@foreach ($cart->details as $detail)
		<li>
			
			{{$detail->product->name}} x {{$detail->quantity}} ($ {{$detail->quantity * $detail->product->price}})
		</li>
		@endforeach
		
	</ul>
	<p>
		<strong>Impote a pargar:</strong>{{ $cart->total}}
	</p>
	<hr>
	<p>
		<a href="{{url('/admin/orders/'.$cart->id)}}">Haz clickaqui</a>
		Para ver mas informacion.
	</p>
</body>
</html>