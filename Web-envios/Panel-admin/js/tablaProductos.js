$(document).ready(funcionPrincipal);

function functionPrincipal()
{
	$("#botonNuevoProducto").click(funcionNuevoProducto);
}

function funcionNuevoProducto()
{
	$("#tablaProductos")
	.append
	(
		$('<tr>')
		.append
		(
			$('<td>')
			.append
			(
				$('<input>').attr('type','text').addClass('form-control')
			)					
		)
		.append
		(
			$('<td>')
			.append
			(
				$('<div>').addClass('btn btn-primary').text('Guardar')
			)
		)
		.append
		(
			$('<td>')
			.append
			(
				$('<div>').addClass('btn btn-danger').text('Eliminar')
			)
		)
						
	);
}