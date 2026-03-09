# Práctica 4: Polimorfismo y Tablas Dinámicas en PHP

## Objetivo de la práctica

Consolidar e integrar los conocimientos de Programación Orientada a Objetos en PHP (Herencia, Encapsulamiento, Polimorfismo y Manejo de Excepciones) mediante la extensión de un sistema de usuarios. El principal objetivo es desarrollar una interfaz web dinámica que itere un arreglo de diferentes tipos de objetos (`Admin`, `Alumno`, `Invitado`) para construir una tabla HTML, en la cual se extrae información específica dependiendo del rol del usuario, todo manteniendo un control de fallos mediante estructuras `try/catch`.

## Requisitos

Para ejecutar este proyecto de forma adecuada se requiere:

- **PHP 8** (recomendada la versión 8.0 o superior).
- **XAMPP** para la ejecución del servidor web local y proveer el entorno de PHP.
- Un navegador web moderno (Chrome, Firefox, Edge).

## Ruta de ejecución en navegador

### Opción 1: Servidor Apache (Recomendado)

1. Coloca o mueve toda la carpeta de tu proyecto (`desarrollo-web-avanzado-fimaz-uas`) dentro del directorio principal de tu servidor web en XAMPP. La ruta por defecto suele ser:
   `C:\xampp\htdocs\`
2. Inicia el servicio de **Apache** desde el Panel de Control de XAMPP.
3. Abre tu navegador web e ingresa a la siguiente ruta para visualizar la tabla de la práctica:
   `http://localhost/desarrollo-web-avanzado-fimaz-uas/parcial-1-poo/practica-4/`

### Opción 2: Servidor integrado de PHP

Alternativamente, abre una terminal en la carpeta `practica-4` y ejecuta:

```bash
php -S localhost:8000
```

Y luego accede en tu navegador a: `http://localhost:8000/`

## Evidencia esperada

Al momento de ejecutar el archivo `index.php` en el navegador, se debe poder observar la siguiente retroalimentación visual en pantalla:

1. **Error controlado**: En la parte superior verás un texto rojo de alerta informando sobre la _"Prueba de Creación de Usuario Inválido"_. En dicho mensaje se lee **"¡Excepción capturada correctamente!"** seguido de la naturaleza del error porque ingresamos un correo falso. Esto demuestra el exitoso funcionamiento de las restricciones de atributos y el bloque `try/catch` de PHP.
2. **Tabla HTML**: Debajo del error, se observará una tabla dinámica con un estilo CSS básico mostrando los usuarios registrados que sí fueron válidos.  
   Como gran evidencia del _polimorfismo_ en acción, la columna **Matrícula** solamente plasma el dato para la fila del "Alumno" y la columna **Empresa** solo se plasma en la fila del "Invitado". Aquellos campos que no le correspondan al objeto actual, tendrán de valor un simple guión ("—").

_(Adjunta aquí tu captura de pantalla mostrando la tabla de resultados y el alert del error controlado)_
