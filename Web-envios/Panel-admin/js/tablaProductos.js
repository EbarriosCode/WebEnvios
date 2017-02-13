$(document).ready(function(){
	$("#btn-add").click(function(){
		agregar();
	});
});

var cont = 0;
var id_fila_selected = [];

function agregar()
{
	cont++;
	var fila = '<tr id="fila"><tr><td><select id="producto" name="producto" class="form-control" onchange="ajax(this.value)" required><option selected="">Seleccione:</option><?php foreach($Productos as $prod){echo <option value=$prod[id_producto]>$prod["nombreProducto"]</option>}?></select></td><td class="text-center"><button class="btn btn-success" disabled>Guardar</button></td><td class="text-center"><button class=btn btn-danger disabled>Eliminar</button></td></tr>';
	$('#tablaProductos').append(fila);
	reordenar();
}

function reordenar()
{
	var num = 1;
	$("#tablaProductos tbody tr").each(function(){
		$(this).find('td').eq(0).text(num);
	});
}
