# Virtualio Server Side

## Instalación

Para instalar este proyecto en tu servidor local

1. Clona el repositorio
   ```sh
   git clone https://github.com/guzanaz/m7_Sprint3
   ```
2. cd en m7_Sprint3 o abre el archivo en VSCode (Necesitarás estar dentro de ese archivo de proyecto para introducir el resto de los comandos de este tutorial)
   ```sh
   cd m7_Sprint3
   ```
3. Dentro del proyecto en VSCode abre la terminal e Instala composer
   ```sh
   composer install
   ```
   
4. Crea una copia del archivo `.env` (Los archivos `.env` generalmente no se comprometen en el control de fuentes por razones de seguridad. Pero hay un archivo .env.example que es una plantilla del archivo .env que el proyecto espera que tengamos. Así que haremos una copia del archivo .env.example y crearemos un archivo .env que podemos empezar a rellenar para hacer cosas como la configuración de la base de datos en los próximos pasos.)
   
   ```sh
   cp .env.example .env
   ```
5. Genera una clave de encriptación de la aplicación. Laravel requiere que tengas una clave de encriptación de la aplicación que generalmente se genera al azar y se almacena en tu archivo .env. La aplicación utilizará esta clave de cifrado para codificar varios elementos de tu aplicación, desde las cookies hasta los hashes de las contraseñas, entre otros.

Las herramientas de línea de comandos de Laravel, afortunadamente, hacen que sea súper fácil generar esto. En la terminal podemos ejecutar este comando para generar esa clave. (Asegúrate de haber instalado Laravel a través de Composer y de haber creado un archivo .env antes de hacer esto, de lo cual hemos hecho ambas cosas).
  ```sh
   php artisan key:generate
   ```

6. Crea una base de datos vacía para nuestra aplicación. En este caso se ha creado con MySql la base de datos **Virtualio_students**. Simplemente crea una base de datos vacía aquí, los pasos exactos dependerán de la configuración de tu sistema.

7. En el archivo .env, añade la información de la base de datos para permitir que Laravel se conecte a la base de datos.

Queremos permitir que Laravel se conecte a la base de datos que acaba de crear en el paso anterior. Para ello, debemos añadir las credenciales de conexión en el fichero .env y Laravel se encargará de la conexión a partir de ahí.

En el archivo .env rellenamos las opciones `DB_HOST`, `DB_PORT`, `DB_DATABASE`, `DB_USERNAME` y `DB_PASSWORD` para que coincidan con las credenciales de la base de datos que acabamos de crear. Esto nos permitirá ejecutar las migraciones y sembrar la base de datos en el siguiente paso.

8. Migra la base de datos. Una vez que sus credenciales están en el archivo `.env`, ahora puede migrar su base de datos.
  ```sh
   php artisan migrate
   ```
   
9. Implementa los Seeders para popular la bbdd
   ```sh
   php artisan db:seed
   ```

