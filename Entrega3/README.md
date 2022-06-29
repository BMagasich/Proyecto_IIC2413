# Proyecto_IIC2413

ENTREGA 3:

	Contraseña compañias: 8 caracteres totalmente aleatorios.
	Contraseña de pasajero: primeras tres letras del nombre, las tres últimos del pasaporte y 2 str aleatorios

	Nombre: nombre
	Pasaporte: pasaporte
	aleatorios: 3G

	CONTRASEÑA = nomrte3G
 
 El método utilizado para las funcionalidades fueron procedimientos almacenados que se encuentran en Entrega3/sql/funciones.
 Cabe mencionar que par importar las bases de daros correspondientes se utilizó dblink en dichos archivos.
 
 Si se accede a la página y no se ha apretado el botón importar usuarios, a continuación se muestran 2 usuarios del tipo "compañía aérea" y "pasajero" respectivamente que pueden ser utilizados para corregir.

	USERNAME    CONTRASEÑA   TIPO
	 IBE      | 59f260e7   | Compañia Aerea
	V03976673 | Mar67306   | Pasajero

 
 Para el caso en que ya se ha apretado el botón 'importar usuarios', estos usuarios anteriormente mencionados tendrán otras contraseñas, por lo que se deberá ingresar al servidor desde la consola y luego utilizar el comando "SELECT * FROM usuarios;" para seleccionar 2 de ellos al azar. Esto se debe a que cada vez que se utiliza este botón, se crean contraseñas aleatorias, por lo que no existen usuarios permanentes diferentes a Admin DGAC.

Cabe mencionar que para el atributo 'valor' de la tabla vuelos correspondiente a aquellos vuelos que se aprueban, se cacluló de la siguiente manera:

	valor = peso*1000
