# mvc_primitiva
MVC Para Primitiva - En desarrollo


Completada toda la parte del desarrollo actual de la aplicación.
Corregido errores tales como la gestión de las fechas en las apuestas "OTRAS":
    El STRTOTIME con fechas en formato DD/MM/AAAA las fuerza a formato ingles (MM/DD/AAAA) por lo que en días superiores a 12, da un error y no genera correctamente la fecha.
    Esto ocurre cuando la fecha se lee del campo "OTROS" ya que en el resto de los casos, la fecha proviene de la misma base de datos, campo "FECHA" que ya está en formato AAAA-MM-DD.

PENDIENTE:

  - Históricos: falta la gestión de esta parte y buscar en las apuestas por una fecha en concreto.
    IDEA ==> mostrar un listado de las ultimas apuestas y al pulsar sobre ella, mostrarlas como si fuese la pantalla de inicio.
    

Nuevas Mejoras:

  - Posibilidad de en el listado de SALDOS, mostrar paginados los saldos (aportaciones) de cada usuario al pulsar sobre su nombre.

