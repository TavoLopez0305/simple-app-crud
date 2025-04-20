# Aplicación CRUD con Angular y Laravel

Este proyecto es una implementación de una aplicación con las operaciones básicas de Crear, Leer, Actualizar y Eliminar (CRUD). Utiliza las siguientes tecnologías:

- **Frontend:** Angular (versión [indicar la versión si ya la conoces])
- **Backend:** Laravel (versión 8.x)
- **Base de Datos:** [Indicar la base de datos que planeas usar, por ejemplo, MySQL]

## Requisitos de Instalación

Para poder ejecutar este proyecto en tu computadora, necesitarás tener instaladas las siguientes herramientas:

### Backend (Laravel)

- **PHP:** Versión 7.4 o superior
- **Composer:** Administrador de dependencias para PHP (puedes descargarlo desde [https://getcomposer.org/](https://getcomposer.org/))
- **Servidor Web:** (Opcional para desarrollo, Laravel tiene su propio servidor) Apache, Nginx o el servidor de desarrollo de PHP (`php artisan serve`)
- **Extensión de PHP:** `ext-pdo` y el driver para la base de datos que vayas a usar (por ejemplo, `pdo_mysql` para MySQL)

### Frontend (Angular)

- **Node.js:** Versión 14.15.0 LTS o superior (incluye npm)
- **npm:** Administrador de paquetes de Node.js (se instala con Node.js)
- **Angular CLI:** Interfaz de línea de comandos de Angular (se instala globalmente con `npm install -g @angular/cli`)

## Instrucciones de Configuración

1.  **Clonar el repositorio:**
    ```bash
    git clone <URL_DE_TU_REPOSITORIO>
    cd app_crud
    ```

2.  **Configurar el backend (Laravel):**
    ```bash
    cd aplicacion-crud-backend
    composer install
    cp .env.example .env
    # Configurar las variables de entorno en .env (DB_DATABASE, DB_USERNAME, DB_PASSWORD, etc.)
    php artisan key:generate
    ```

3.  **Configurar el frontend (Angular):**
    ```bash
    cd ../aplicacion-crud-frontend
    npm install
    ```

## Instrucciones de Ejecución

### Backend (Laravel)

```bash
cd aplicacion-crud-backend
php artisan serve