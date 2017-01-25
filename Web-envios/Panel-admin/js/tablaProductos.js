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
	var fila = '<tr id="fila'+cont+'"><td>'+cont+'</td><td>valor por defecto</td></tr>';
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
