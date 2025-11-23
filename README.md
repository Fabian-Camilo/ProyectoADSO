#  Validador de Certificados Online con Códigos QR  
_Evidencia: GA6-220501096-AA4-EV03 — Diseño Frontend que cumpla con los requerimientos del proyecto_

Este repositorio contiene el **proyecto completo**, desarrollado como evidencia para el programa **ADSO – Ficha 3070306**.

El proyecto es un **validador de certificados ambientales online con códigos QR**, desarrollado en **Laravel monolítico**, utilizando **Blade, Tailwind CSS, Livewire y Vite**, con base de datos **MySQL**.

---

##  Funcionalidad Principal

- Escaneo y lectura de códigos QR  
- Validación de certificados en tiempo real directamente desde el frontend  
- Visualización de resultados de certificados  
- Interfaz clara, profesional y responsive  
- Formularios con validaciones dinámicas mediante Livewire  
- Componentes reutilizables y estructura modular en Blade  

---

##  Tecnologías Utilizadas

| Componente | Herramienta |
|-----------|-------------|
| Framework | Laravel (MVC monolítico) |
| Plantillas | Blade (HTML estructurado) |
| Estilos | Tailwind CSS (compilado con Vite) |
| Interactividad | Livewire |
| Bundler | Vite |
| Base de datos | MySQL (Eloquent ORM) |
| Control de versiones | Git / GitHub |

---

##  Instalación y Ejecución Local

1. Clonar el repositorio:
   ```bash
   git clone https://github.com/usuario/proyecto-certificados.git
   cd proyecto-certificados
2. Instalar dependencias
    ```bash
    composer install
    npm install
4. Configurar el entorno:
    ```bash
    cp .env.example .env
    php artisan key:generate
6. Ejecutar migraciones y seeders
   ```bash
    php artisan migrate --seed
8. Compilar frontend con Vite
   ```bash
    npm run build
10. Iniciar servidor local
    ```bash
    php artisan serve

---

## Ubicaciones importantes

Vistas Blade (HTML): resources/views/
CSS compilado: public/css(app.[hash].css
JS compilado: public/js/app.js
Estos archivos reflejan el frontend funcional y son equivalentes a HTML, CSS y JS puro para fines de la evidencia.

