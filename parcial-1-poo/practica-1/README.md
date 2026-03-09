# Práctica 1: Creación de Clases en PHP

## Objetivo de la Práctica

Comprender y aplicar los conceptos fundamentales de la Programación Orientada a Objetos (POO) en PHP, mediante la creación de una clase básica con atributos privados, método constructor y métodos de acceso (getters y setters), así como su instanciación y uso en un script principal.

## Descripción de la Clase Creada

Se creó la clase `Usuario`, la cual representa a un usuario dentro del sistema con la siguiente estructura:

- **Atributos privados**:
  - `$nombre`: Almacena el nombre completo del usuario.
  - `$correo`: Almacena la dirección de correo electrónico del usuario.
- **Constructor**: Inicializa la clase recibiendo el nombre y el correo electrónico, asignándolos automáticamente a los atributos correspondientes al momento de instanciar el objeto.
- **Getters y Setters**: Contiene los métodos `getNombre()`, `getCorreo()`, `setNombre()` y `setCorreo()` que permiten la lectura y escritura segura de los atributos de la clase, respetando el principio de encapsulamiento.

## Instrucciones de Ejecución

### Opción 1: Servidor de Pruebas de PHP (Recomendado)

1. Abrir una terminal o consola de comandos.
2. Navegar hasta la carpeta `practica-1` del proyecto:
   ```bash
   cd ruta/al/proyecto/desarrollo-web-avanzado-fimaz-uas/parcial-1-poo/practica-1
   ```
3. Ejecutar el servidor integrado de PHP apuntando al puerto 8000:
   ```bash
   php -S localhost:8000
   ```
   _(Si tienes XAMPP y php no está en tus variables de entorno, puedes usar: `C:\xampp\php\php.exe -S localhost:8000`)_
4. Abrir un navegador web e ingresar a la dirección: `http://localhost:8000/`

### Opción 2: Usando Apache en XAMPP

1. Iniciar el servicio **Apache** desde el Panel de Control de XAMPP.
2. Asegúrate de que la carpeta del proyecto (`desarrollo-web-avanzado-fimaz-uas`) se encuentre dentro de la carpeta `htdocs` de XAMPP (por defecto `C:\xampp\htdocs\`).
3. Abrir un navegador web e ingresar a la dirección correspondiente. Por ejemplo:
   `http://localhost/desarrollo-web-avanzado-fimaz-uas/parcial-1-poo/practica-1/`
