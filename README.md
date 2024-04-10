Bienvenido a la prueba técnica para el puesto de desarrollador backend de DOMO.

Requisitos:
	- Agregar comportamiento al boton de index.html para que envíe los inputs a agregar.php
		NO USAR <form> y su submit por default, se debe hacer la consulta con JS, a traves de un fetch.
		https://developer.mozilla.org/en-US/docs/Web/API/Fetch_API/Using_Fetch
	- agregar.php debe validar si el DNI enviado ya existe o no en usuarios.csv (no nos interesa el algortimo de búsqueda utilizado, 
	lo podes hacer recorriendo registro por registro).
		Si existe, devolver "error" a JS (usuario ya existente)
		Si no existe, agregarlo al csv (delimitado por ;) y devolver mensaje de éxito al index.
	- En el index, debemos ver la respuesta exitosa o no exitosa (ya sea con la función alert o con lo que consideres)

Adicionales (no necesarios):
	- Validación del formato del DNI
	- Estilos en HTML (css)


Una vez realizado el desafío, comprimir los archivos en un .zip y enviarlo adjunto a cv@domo.com.ar.
Por favor llamar al archivo <tuNombre_tuApellido>.zip para poder identificar a cada postulante.
