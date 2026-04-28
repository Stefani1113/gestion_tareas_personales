# Respuestas

## Respuesta 1
El MVC es una arquitectura de software que separa una aplicación en tres partes y cada una tiene una resposabilidad clara.
Model: Este contiene la lógica de negocio, se comunica con la base de datos y realiza validaciones.
View: Es la interfaz gráfica que el usuario ve y se actualiza cuando el modelo cambia. 
Controller: Recibe las peticiones de los usuario, interactua con el modelo y selecciona la vista a mostrar.

## Respuesta 2
La diferencia entre los metodos http Get y Post es que el Get trae los datos que ya existen en el servidor y el Post envia información al servidor para que la procese y guarde.

## Respuesta 3
Eloquent es un ORM incluido en Laravel y el problema que resuleve es que al poder interactuar con tu db con clases y objetos de PHP no es necesario escribir consultas SQL manualmente.

## Respuesta 4
El comando "php artisan migrate" sirve para ejercutar las migraciones pendientes y asi crear o editar la base de datos.
Las migraciones sirven para que a la hora de trabajar en equipo cada desarrollador no tenga que crear manualmente su propia base de datos.

## Respuesta 5
La diferencia entre == y === en php es que 
== : compara valores mietras que, === : compara tipos.
Ejemplo: si digo que A = 1 y B = "1" al momento de compararlo con == da verdadero ya que tienen el mismo valor, pero
si lo comparo con === da falso ya que no son del mismo tipo de dato. 

## Respuesta 6
Composer es un gestor de dependencias de PHP que sirve para instalar, actualizar y manejar las librerías que necesita mi proyecto. La diferencia es que composer install: instala las dependencias exactas al descargar o crear un proyecto. Composer update: Actualiza las dependencias cuando quieres versiones nuevas.

## Respuesta 7
La diferencia es que git pull: descarga cambios y los fuisona con tu código automaticamnete.
git fetch: descarga cambios, pero sin modificar tu código.


