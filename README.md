# 🔐 Laravel CRUD Login

Aplicación web desarrollada con **Laravel (PHP)** que implementa un sistema de autenticación de usuarios junto con operaciones CRUD, aplicando buenas prácticas de desarrollo backend.

---

## 🚀 Descripción

Este proyecto consiste en una aplicación web que permite a los usuarios registrarse, iniciar sesión y gestionar información mediante operaciones CRUD.

Fue desarrollado utilizando Laravel, aprovechando su sistema de autenticación y arquitectura MVC para construir una aplicación segura, escalable y organizada.

---

## 🧱 Funcionalidades principales

* Registro de usuarios
* Inicio de sesión (Login)
* Cierre de sesión (Logout)
* Protección de rutas (middleware)
* CRUD de registros
* Interfaz dinámica con Blade

---

## 🛠️ Tecnologías utilizadas

* PHP (Laravel)
* Blade
* MySQL
* JavaScript

---

## ⚙️ Requisitos

Antes de ejecutar el proyecto necesitas:

* PHP >= 8.x
* Composer
* MySQL
* Servidor web (Apache o Nginx)

---

## ▶️ Cómo ejecutar el proyecto

1. Clonar el repositorio:

```bash id="0bkgq6"
git clone https://github.com/nachoLuarca/laravel-crud-login.git
cd laravel-crud-login
```

---

2. Instalar dependencias:

```bash id="lq3l6h"
composer install
```

---

3. Configurar variables de entorno:

```bash id="3c6f9p"
cp .env.example .env
```

Editar `.env`:

```env id="ik2p1b"
DB_DATABASE=login_db
DB_USERNAME=root
DB_PASSWORD=
```

---

4. Generar clave de aplicación:

```bash id="k9l4mf"
php artisan key:generate
```

---

5. Ejecutar migraciones:

```bash id="5e7h2o"
php artisan migrate
```

---

6. Levantar servidor:

```bash id="y2v8ps"
php artisan serve
```

---

7. Acceder en navegador:

```bash id="i1k3as"
http://localhost:8000
```

---

## 🔐 Autenticación

El sistema incluye:

* Registro de usuarios
* Login seguro
* Encriptación de contraseñas
* Middleware para protección de rutas

---

## 📁 Estructura del proyecto

```id="k0j2p8"
laravel-crud-login/
│
├── app/
├── routes/
├── resources/
│   ├── views/ (Blade)
├── database/
├── public/
└── artisan
```

---

## 🧠 Conceptos aplicados

* Arquitectura MVC (Laravel)
* Autenticación de usuarios
* Middleware
* ORM Eloquent
* Migraciones
* CRUD completo

---

## 🚧 Mejoras futuras

* Implementar roles y permisos (admin/user)
* Autenticación con JWT
* API REST
* Validaciones avanzadas
* Dashboard de administración

---

## 👨‍💻 Autor

Ignacio Luarca
Analista Programador | Full Stack Developer

---

## ⭐ Notas

Este proyecto fue desarrollado como práctica para reforzar conocimientos en autenticación de usuarios, desarrollo backend con Laravel y construcción de aplicaciones seguras.
