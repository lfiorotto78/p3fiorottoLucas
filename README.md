# Sistema Asistencias
## Tecnologías
- ### Laragon Full 6.0 (PHP 8.1.10, Apache 2.4.54, MySQL 8.0.30).
- ### Node.js 20.12.2
- ### Composer 2.7.2
## Pasos para inicializar el proyecto
1. Tener instaladas las tecnologías especificadas o compatibles.
2. Clonar este repositorio.
3. Duplicar el archivo "**.env.example**" en la carpeta "**laravel-10-crud**" y renombrarlo a "**.env**".
4. Iniciar Laragon y crear una nueva base de datos que se llame "**laravel**".
5. En una interfaz de linea de comandos o consola (cmd, powershell, etc.), ubicarse en la carpeta "**laravel-10-crud**".
6. Ejecutar estos comandos en el siguiente orden:
  ```
  composer install
  php artisan key:generate
  npm install
  npm run dev (en una consola separada)
  php artisan serve
  ```
7. Abrir un navegador web y dirigirse a la url [http://127.0.0.1:8000](url).
