# 🌐 Web Forum

Este es un proyecto de una página web con sistema de inicio de sesión y registro, que incluye varias herramientas, destacando un foro basado en MyBB. La aplicación está diseñada con un enfoque en seguridad para prevenir vulnerabilidades comunes.

## 🔹 Características

- **🔑 Sistema de autenticación**: Registro e inicio de sesión seguros.
- **💬 Foro integrado**: Implementación con MyBB para la gestión de temas y mensajes.
- **🛡️ Medidas de seguridad**:
  - Protección contra inyección SQL.
  - Prevención de ataques XSS.
  - Restricción de acceso a directorios y landing pages no autorizados.

## 📋 Requisitos

- Servidor web con soporte para PHP.
- Base de datos MySQL o compatible.

## 🚀 Instalación

1. Clona el repositorio:
   ```bash
   git clone https://github.com/Zyrakk/Web_Forum.git
   ```
2. Configura la base de datos y el archivo de conexión.
   ```
   sudo apt install nginx php php-fpm php-mysql php-mbstring php-curl php-xml php-zip php-gd php-cli php-intl unzip git mariadb-server mariadb-client -y
   ```
3. Asegúrate de establecer permisos adecuados en los archivos y directorios necesarios.
4. Accede a la página desde tu navegador y sigue el proceso de configuración inicial.

## 🤝 Contribuciones

Las contribuciones son bienvenidas. Si deseas mejorar el proyecto, abre un *issue* o envía un *pull request*.

## 📜 Licencia

Este proyecto se distribuye bajo la licencia MIT. Consulta el archivo `LICENSE` para más detalles.
