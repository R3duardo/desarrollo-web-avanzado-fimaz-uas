# Práctica 2: Herencia en PHP

## Explicación de la herencia aplicada

En esta práctica se aplicó el concepto de **Herencia**. Se creó una nueva clase llamada `Admin` que extiende o hereda de la clase base `Usuario` mediante la palabra reservada `extends`. Esto significa que la clase `Admin` adquiere automáticamente todos los atributos (nombre, correo) y métodos (constructor, getters y setters) que ya estaban definidos en la clase `Usuario`, promoviendo la reutilización de código y estableciendo una relación de tipo "es-un" (Un Admin es un Usuario).

## Diferencias entre Usuario y Admin

- **Clase base vs derivada**: `Usuario` es la superclase o clase padre genérica, mientras que `Admin` es una subclase o clase hija más especializada.
- **Funcionalidad extendida**: Aunque el `Admin` tiene exactamente la misma estructura de datos (nombre y correo) y comportamiento base que un `Usuario` normal, difiere en que implementa su propio método adicional llamado `getRol()`.
- **El método getRol()**: Este método es exclusivo de la clase `Admin` y tiene como propósito retornar específicamente la cadena de texto `"Administrador"`, un comportamiento que un objeto `Usuario` ordinario de la primera práctica no posee.

## Evidencia de ejecución

_(Puedes colocar aquí una captura de pantalla de tu navegador mostrando el resultado de `index.php` donde se imprime el Nombre, Correo y Rol)_

**Salida esperada en pantalla:**

```text
Nombre: Eduardo Montes de Oca Zatarain
Correo: emozp@hotmail.com
Rol: Administrador
```

Para ejecutar el código, se puede usar el servidor integrado de PHP:

```bash
php -S localhost:8000
```

Y luego acceder en el navegador a `http://localhost:8000/`.
