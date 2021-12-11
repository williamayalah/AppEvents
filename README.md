Paso 1: Congiguracion de Servidor de Base de Datos
        1. Abrir el archivo ".env" del proyecto y establecer las
            credenciales de su entorno local en las siguiente variables:
            DB_CONNECTION=
            DB_HOST=127.0.0.1
            DB_PORT=5432
            DB_DATABASE=
            DB_USERNAME=
            DB_PASSWORD=

Paso 2: Configuracion de Servidor de Correos
        1. En el archivo ".env" del proyecto, establecer las
            credenciales de su entorno local en las siguiente variables:
            MAIL_MAILER=smtp
            MAIL_HOST=smtp.mailtrap.io
            MAIL_PORT=2525
            MAIL_USERNAME=
            MAIL_PASSWORD=
            MAIL_ENCRYPTION=tls
            MAIL_FROM_ADDRESS=
            MAIL_FROM_NAME=

Paso 3: Migracion de tablas de base de datos
        En la consola de comandos ejecutar lo siguiente:
        1. php artisan migrate
        2.php artisan db:seed

Paso 4: Ejecución del proyecto
        1.  Abrir una consola ubicada en la carpeta del proyecto
            y ejecutar el siguiente comando:
            php artisan serve
        2.  Abrir una consola adicional ubicada en la carpeta del 
            proyecto y escribir el comando:
            php artisan queue:work