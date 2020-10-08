<p align="center"><img src="https://www.soysoftware.com/img/soysoftware.jpg"></p>

## ACERCA DE @factur
Sistema de Almacén y Facturación totalmente 100% gratis.
## Escribenos

Necesitas algunos de nuestro servicio o productos. O quieres trabajar con nosotros por favor escribinos a info@soysoftware.com

## Patrocinadores

Nos gustaría extender nuestro agradecimiento a los siguientes patrocinadores por financiar el desarrollo de algunos proyectos. Si está interesado en convertirse en patrocinador, escríbenos a info@soysoftware.com

- **[Sindicato de pastocalle](https://www.sindicatodepastocalle.com/)**
- **[Universidad Técnica de Cotopaxi](http://www.utc.edu.ec/)**
- **[Coorporación de asociaciones de Cotopaxi y Tungurahua](https://cactu.ec/)**
- **[Cuerpo de bomberos de Latacunga](http://api-bomberoslatacunga.com/)**
- **[..entre otros]**

## Contribuyendo

¡Gracias por considerar contribuir en nuestros proyectos!. Un sincero agradecimiento.

## Vulnerabilidades de seguridad

Si descubre una vulnerabilidad de seguridad dentro de nuestros productos, envíe un correo electrónico a SOYSOFTWARE a través de info@soysoftware.com . Todas las vulnerabilidades de seguridad serán tratadas con prontitud.

## Licencia

Algunos de nuestros productos es un software de código abierto con licencia de la [Licencia MIT](https://opensource.org/licenses/MIT).

## INSTALACIÓN
Clonar proyecto
```
git clone https://github.com/soy-software/factur.git

```
Acceder por una terminal al directorio factur, clonado
```
cd PATH....

```
Instalar dependencias: Ingrese a su directorio de proyecto clonado e instale las dependencias
```
composer install

```
Crear archivo .env, copiar información de .env-example a .env y establecer credenciales

Migración y seeder de datos: Ejecute el siguiente comando en proyecto clonado
```
php artisan migrate:fresh --seed

```
Generar la clave para su aplicación
```
php artisan key:generate

```
Almacenamiento de archivos
```
php artisan storage:link

```


Listo, disfrutalo
Ejecutar Proyecto:
```
php artisan serve

```
Ingresar a [http://localhost:8000/](http://localhost:8000/)

Credenciales

```
Email:admin@factur.com
Contraseña:@dmin_factur

```
