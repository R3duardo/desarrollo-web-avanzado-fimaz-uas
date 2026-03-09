# Práctica 3: Polimorfismo y Manejo de Excepciones en PHP

## Descripción del sistema

El sistema actual es una simulación básica de gestión de usuarios escolares usando Programación Orientada a Objetos en PHP. Está compuesto por una clase base que representa a un usuario genérico del sistema, y dos clases derivadas que representan roles específicos: un Administrador y un Alumno. El sistema implementa reglas de validación de datos (como el formato correcto del correo electrónico) para garantizar la integridad de la información al momento de crear nuevos objetos en el sistema.

## Explicación del flujo de clases

El flujo de las clases sigue un modelo de herencia jerárquica y encapsulamiento estricto:

1.  **`Usuario` (Clase Base/Padre):** Es el pilar del sistema. Define los atributos comunes `nombre` y `correo` como `protected` para que las clases hijas puedan heredarlos. En su método `setCorreo()` incluye la lógica de validación de formato (usando `filter_var`) y lanza una excepción si el correo es inválido. Su constructor es el encargado de llamar a estos setters.
2.  **`Admin` (Clase Derivada):** Hereda directamente de `Usuario`. No añade nuevos atributos, pero sí un comportamiento específico: el método `getRol()` que retorna estrictamente la cadena `"Administrador"`. Al instanciarse, utiliza el constructor de su clase padre (`Usuario`) validando automáticamente el correo.
3.  **`Alumno` (Clase Derivada):** Al igual que `Admin`, hereda de `Usuario`. Sin embargo, esta clase es más compleja porque añade un nuevo atributo específico: `matricula`. Esto obliga a sobrescribir su constructor (`__construct`) para recibir este tercer dato, pero inteligentemente llama a `parent::__construct($nombre, $correo)` para reutilizar la validación de la clase padre en lugar de reescribirla. De igual forma, implementa su propia versión de `getRol()` que retorna `"Alumno"`.

Este diseño permite que tanto `Admin` como `Alumno` compartan reglas de negocio comunes (validación de correo) pero mantengan características únicas y comportamientos específicos (polimorfismo en `getRol()`).

## Evidencia del manejo de errores

El manejo de errores se evidencia en el archivo `index.php` utilizando bloques `try/catch`.

Cuando se intenta crear un usuario (ya sea `Admin` o `Alumno`), la clase padre evalúa el correo. Si el correo tiene un formato aceptable (ej: `alumno@correo.com`), el objeto se crea y el bloque `try` finaliza con éxito mostrando los resultados.

Sin embargo, si se ingresa un correo con formato inválido (ej: `juanperez_correo`), ocurre lo siguiente:

1. La función `filter_var` en `Usuario->setCorreo()` detecta el error.
2. Se ejecuta `throw new Exception("El formato del correo electrónico no es válido.");`, interrumpiendo la creación del objeto.
3. El flujo del programa salta inmediatamente al bloque `catch (Exception $e)`.
4. El script captura el error y lo muestra de forma controlada en pantalla usando `$e->getMessage()`, en lugar de mostrar un error fatal de PHP que detendría toda la aplicación.

_(Puedes colocar aquí una captura de pantalla del resultado de la Prueba 3 en el navegador donde se muestre el mensaje de error controlado)_
