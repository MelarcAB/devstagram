# DevStagram

¡Repositorio de DevStagram. Este es un clon de Instagram que que forma parte de un curso de Laravel y Tailwind (Udemy)

## ¿Qué es DevStagram?

DevStagram es una aplicación web que permite a los usuarios registrarse, iniciar sesión, interactuar y compartir fotos con sus seguidores. Los usuarios también pueden seguir a otros usuarios y comentar en las publicaciones. La aplicación está construida utilizando Laravel, Tailwind CSS y otras tecnologías modernas.

## ¿Cómo puedo probar DevStagram?

Para probar DevStagram, necesitarás clonar este repositorio en tu computadora local y configurar una instancia de Laravel. Estos son los pasos a seguir:

1. Clona este repositorio en tu computadora utilizando el siguiente comando:
`git clone https://github.com/tu-usuario/devstagram.git`

2. Entra al directorio del proyecto utilizando el siguiente comando:
`cd devstagram`


3. Instala las dependencias de Composer utilizando el siguiente comando:

`composer install`


4. Crea un archivo `.env` utilizando el archivo `.env.example` como plantilla. En el archivo `.env`, configura las variables de entorno requeridas para tu entorno.

5. Genera una nueva clave de aplicación utilizando el siguiente comando:

`php artisan key:generate`


6. Ejecuta las migraciones de la base de datos utilizando el siguiente comando:


php artisan migrate


7. Ejecuta la aplicación utilizando el siguiente comando:


`php artisan serve`


Una vez que hayas ejecutado estos pasos, deberías poder acceder a la aplicación en `http://localhost:8000`.
