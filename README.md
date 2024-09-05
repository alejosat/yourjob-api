# Sistema de Emparejamiento de Recursos Humanos

Este proyecto es un sistema de emparejamiento de recursos humanos desarrollado con Laravel 10 y construido con una arquitectura basada en microservicios. El sistema permite a los solicitantes de empleo postularse a vacantes y a los empleadores publicar vacantes y gestionar aplicaciones.

## Requisitos

- PHP 8.0 o superior
- Composer
- MySQL o PostgreSQL
- Laravel 11
- Node.js y npm (para el frontend y las herramientas de construcción)

## Instalación

1. **Clona el repositorio:**
   ```bash
   git clone https://github.com/alejosat/yourjob-api.git

   cd nombre-del-repositorio

2. **Instala las dependencias de PHP:**
    ````bash
    composer install

3. **Copia el archivo de configuración del entorno:**
    ```bash
    cp .env.example .env

4. **Genera la clave de aplicación:**
    ```bash
    php artisan key:generate

5. **Configura la base de datos en el archivo `.env`: Ajusta las siguientes variables según tu configuración de base de datos:**
    ```env
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=nombre_de_base_de_datos
    DB_USERNAME=usuario
    DB_PASSWORD=contraseña

6. **Ejecuta las migraciones y seeder:**
    ```bash
    php artisan migrate:fresh --seed

7. **Instala las dependencias de JavaScript:**
    ```bash
    npm install

8. **Compila los activos:**
    ```bash
    npm run dev

## Uso

* **Inicio del servidor:**
    ```bash
    php artisan serve
    ```
    La aplicación estará disponible en `http://localhost:8000`.

* **Rutas de la API:**

    * **Registro de usuario:** `POST /api/register`

    *  **Inicio de sesión:** `POST /api/login`

    * **Cerrar sesión:** `POST /api/logout` (requiere autenticación)

* **Perfiles de solicitantes de empleo:

    * `GET /api/job-seeker-profiles`
    * `POST /api/job-seeker-profiles`
    * `GET /api/job-seeker-profiles/{id}`
    * `PUT /api/job-seeker-profiles/{id}`
    * `DELETE /api/job-seeker-profiles/{id}`

* **Perfiles de empleadores:**

    * `GET /api/employer-profiles`
    * `POST /api/employer-profiles`
    * `GET /api/employer-profiles/{id}`
    * `PUT /api/employer-profiles/{id}`
    * `DELETE /api/employer-profiles/{id}`
    
* **Vacantes de empleo:**

    * `GET /api/job-vacancies`
    * `POST /api/job-vacancies`
    * `GET /api/job-vacancies/{id}`
    * `PUT /api/job-vacancies/{id}`
    * `DELETE /api/job-vacancies/{id}`

* **Aplicaciones de trabajo:**

    * `GET /api/job-applications`
    * `POST /api/job-applications`
    * `GET /api/job-applications/{id}`
    * `PUT /api/job-applications/{id}`
    * `DELETE /api/job-applications/{id}`

## Contribución
Si deseas contribuir a este proyecto, por favor realiza un fork del repositorio y envía un pull request con tus cambios.

## Licencia
Este proyecto está licenciado bajo la MIT License.

## Contacto
Si tienes alguna pregunta o comentario, no dudes en ponerte en contacto conmigo a través de GitHub.

Asegúrate de reemplazar `https://github.com/alejosat/yourjob-api.git` con el nombre real de tu repositorio y ajustar cualquier otra información específica según sea necesario. ¡Espero que te sea útil!
