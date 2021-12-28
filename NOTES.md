# Notas

Para este proyecto no se ha utilizado ningun bundle adicional de manera intencional. Además del Web Encore Dev.

Todo se ha hecho tomando como base los comandos de consola de symfony, es decir:

## Bases de Datos

bin/console make:entity
bin/console doctrine:schema:update --dump-sql | --force
bin/console doctrine:schema:validate

## CRUD

bin/console make:crud

Con solo estos comandos se han generado los controladores, entidades, forms, plantillas y repositorios que conforman el sistema, a partir de ahí se ha modificado todo tal como symfony establece en su documentación. La idea era crear algo lo más Symfony posible sin más dependencias de las básicas de un proyecto estándar.

## Mejoras

.- Siempre hay espacio para mejoras, aunque la parte funcional esta bastante desarrollada.
.- Presentación, con más tiempo incluiría Bootstrap 5 y todas sus mejoras visuales, por ahora he aplicado css propio.
