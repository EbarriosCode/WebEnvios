function lista_Productos(valor,pagina){
	var pagina = Number(pagina);
	$.ajax({
		url:'../../controller/Productos_controller.php',
		type:'POST',
		data:'valor='+valor+'&pagina='+pagina+'&boton=buscar'
	}).done(function(resp){
		//alert(resp);
		var arregloDatos = resp.split("*");
		var valores = eval(arregloDatos[0]);
		 html="<div class='table-responsive'>"+
		 		"<table class='table table-hover table-striped table-condensed'>"+
					"<thead><tr class='info'>"+
								"<th>ID</th>"+
								"<th>PRODUCTO</th>"+
								"<th>PRECIO</th>"+
								"<th>DESCRIPCION</th>"+
								"<th>EXISTENCIA</th>"+								
								"<th colspan='2'>OPCIONES</th>"+
							"</tr>"+
					"</thead>"+
					"<tbody>";
					
		for(var i=0; i<valores.length; i++)
		{
			datos=valores[i]['id_producto']+"*"+valores[i]['nombreProducto']+"*"+valores[i]['precio']+"*"+valores[i]['descripcion']+"*"+valores[i]['existencia'];
			html+="<tr>"+
						"<td>"+valores[i]['id_producto']+"</td>"+
						"<td>"+valores[i]['nombreProducto']+"</td>"+
						"<td>"+valores[i]['precio']+"</td>"+
						"<td>"+valores[i]['descripcion']+"</td>"+
						"<td>"+valores[i]['existencia']+"</td>"+
						"<td><button class='btn btn-success' data-toggle='modal' data-target='#modal-editar' onclick='cargarDatosEditar("+'"'+datos+'"'+")'><span class='icon-pencil'></span>Editar</button></td>"+
						"<td><button type='button' id='eliminar' name='eliminar' class='btn btn-danger' onclick='confirmarRegistro("+'"'+valores[i]['id']+'"'+")'><span class='icon-trash'></span>Borrar</button></td>"+
					"</tr>";
		}
		
		html+="		</tbody>"+
			"</table>"+
			"</div>"
			
		$("#lista").html(html); 

		 totalRegistros = arregloDatos[1];
		 num_links = Math.ceil(totalRegistros/3);
		//alert(num_links);
		var campoBusqueda = $("#buscar").val();
		paginar = "<ul class='pagination'>";

		if(pagina>1){
			paginar += "<li><a href='javascript:void(0)' onclick='lista_Productos("+'"'+campoBusqueda+'","'+1+'"'+")'>&laquo;</a></li>";
			paginar += "<li><a href='javascript:void(0)' onclick='lista_Productos("+'"'+campoBusqueda+'","'+(pagina-1)+'"'+")'>&lsaquo;</a></li>";
		}
		else{
			paginar += "<li class='disabled'><a href='javascript:void(0)'>&laquo;</a></li>";
			paginar += "<li class='disabled'><a href='javascript:void(0)'>&lsaquo;</a></li>";	
		}

		limite = 10;
 

			div = Math.ceil(limite / 2);

			pagInicio = (pagina > div) ? (pagina - div) : 1;


			if (num_links > div)
			{
				pagRestantes = num_links - pagina;
				pagFin = (pagRestantes > div) ? (pagina + div) : num_links;
			}
			else 
			{
				pagFin = num_links;
			} 
			
			for (var i=pagInicio; i<=num_links; i++) {
				if(i==pagina)
					paginar += "<li class='active'><a href='javascript:void(0)'>"+i+"</a></li>";
				else
				paginar += "<li><a href='javascript:void(0)' onclick='lista_Productos("+'"'+campoBusqueda+'","'+i+'"'+")'>"+i+"</li>";
				
			}

		if(pagina<num_links)
		{
			paginar+="<li><a href='javascript:void(0)' onclick='lista_Productos("+'"'+campoBusqueda+'","'+(pagina+1)+'"'+")'>&rsaquo;</a></li>";
			paginar+="<li><a href='javascript:void(0)' onclick='lista_Productos("+'"'+campoBusqueda+'","'+num_links+'"'+")'>&raquo;</a></li>";

		}
		else
		{
			paginar+="<li class='disabled'><a href='javascript:void(0)'>&rsaquo;</a></li>";
			paginar+="<li class='disabled'><a href='javascript:void(0)'>&raquo;</a></li>";
		} 	

		paginar += "</ul>";

		$('#paginacion').html(paginar);  
	});  
}

function cargarDatosEditar(datos){
	//alert(datos);
	var d=datos.split("*");
	//alert(d.length);
	$("#idProducto").val(d[0]);
	$("#nombre").val(d[1]);
	$("#precio").val(d[2]);
	$("#descripcion").val(d[3]);
	$("#existencia").val(d[4]);
}


function confirmarRegistro(id)
{
   if (window.confirm("Esta seguro que desea eliminar este registro?") == true)
      {
         window.location = "../../controller/Productos_controller.php?idProducto="+id;
      }
}