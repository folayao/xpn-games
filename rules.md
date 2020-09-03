# Estándar de codificación básico

Esta sección de la norma comprende lo que debe considerarse la norma
elementos de codificación necesarios para garantizar un alto nivel de
interoperabilidad entre código PHP compartido.

Las palabras clave "DEBE", "NO DEBE", "REQUERIDO", "DEBERÁ", "NO DEBE", "DEBE",
"NO DEBE", "RECOMENDADO", "PUEDE" y "OPCIONAL" en este documento
interpretado como se describe en [RFC 2119].

[RFC 2119]: http://www.ietf.org/rfc/rfc2119.txt
[PSR-0]: https://github.com/php-fig/fig-standards/blob/master/accepted/PSR-0.md
[PSR-4]: https://github.com/php-fig/fig-standards/blob/master/accepted/PSR-4-autoloader.md

## 1. Información general

- Los archivos DEBEN usar solo etiquetas `<? Php` y` <? = `.

- Los archivos DEBEN usar solo UTF-8 sin BOM para código PHP.

- Los archivos DEBEN * o * declarar símbolos (clases, funciones, constantes, etc.)
  * o * causar efectos secundarios (por ejemplo, generar resultados, cambiar la configuración de .ini, etc.)
  pero NO DEBE hacer ambas cosas.

- Los espacios de nombres y las clases DEBEN seguir un PSR de "carga automática": [[PSR-0], [PSR-4]].

- Los nombres de las clases DEBEN declararse en "StudlyCaps".

- Las constantes de clase DEBEN declararse en mayúsculas con separadores de subrayado.

- Los nombres de los métodos DEBEN declararse en "camelCase".

## 2. Archivos

### 2.1. Etiquetas PHP

El código PHP DEBE usar las etiquetas largas `<? Php?>` O las etiquetas de eco corto `<? =?>`; eso
NO DEBE usar las otras variaciones de etiqueta.

### 2.2. Codificación de caracteres

El código PHP DEBE usar solo UTF-8 sin BOM.

### 2.3. Efectos secundarios

Un archivo DEBE declarar nuevos símbolos (clases, funciones, constantes,
etc.) y no causa otros efectos secundarios, o DEBE ejecutar la lógica con el lado
efectos, pero NO DEBE hacer ambos.

La frase "efectos secundarios" significa ejecución de lógica no relacionada directamente con
declarando clases, funciones, constantes, etc., * simplemente por incluir el
expediente*.

Los "efectos secundarios" incluyen pero no se limitan a: generar resultados, explícitos
uso de `require` o` include`, conectando a servicios externos, modificando ini
configuraciones, emitiendo errores o excepciones, modificando variables globales o estáticas,
leer o escribir en un archivo, etc.

El siguiente es un ejemplo de un archivo con declaraciones y efectos secundarios;
es decir, un ejemplo de qué evitar:

~~~ php
<? php
// efecto secundario: cambiar la configuración de ini
ini_set ('error_reporting', E_ALL);

// efecto secundario: carga un archivo
incluir "file.php";

// efecto secundario: genera salida
echo "<html> \ n";

// declaración
función foo ()
{
    // cuerpo de la función
}
~~~

El siguiente ejemplo es de un archivo que contiene declaraciones sin lado
efectos; es decir, un ejemplo de qué emular:

~~~ php
<? php
// declaración
función foo ()
{
    // cuerpo de la función
}

// la declaración condicional * no * es un efecto secundario
if (! function_exists ('bar')) {
    barra de función ()
    {
        // cuerpo de la función
    }
}
~~~

## 3. Nombres de clases y espacios de nombres

Los espacios de nombres y las clases DEBEN seguir un PSR de "carga automática": [[PSR-0], [PSR-4]].

Esto significa que cada clase está en un archivo por sí misma y está en un espacio de nombres de en
al menos un nivel: un nombre de proveedor de nivel superior.

Los nombres de las clases DEBEN declararse en "StudlyCaps".

El código escrito para PHP 5.3 y posteriores DEBE usar espacios de nombres formales.

Por ejemplo:

~~~ php
<? php
// PHP 5.3 y posteriores:
Proveedor de espacio de nombres \ Modelo;

clase Foo
{
}
~~~

El código escrito para 5.2.xy antes DEBE usar la convención de pseudo-espacio de nombres
de prefijos `Vendor_` en nombres de clases.

~~~ php
<? php
// PHP 5.2.xy versiones anteriores:
clase Vendor_Model_Foo
{
}
~~~

## 4. Constantes, propiedades y métodos de clase

El término "clase" se refiere a todas las clases, interfaces y rasgos.

### 4.1. Constantes

Las constantes de clase DEBEN declararse en mayúsculas con separadores de subrayado.
Por ejemplo:

~~~ php
<? php
Proveedor de espacio de nombres \ Modelo;

clase Foo
{
    const VERSION = '1.0';
    const DATE_APPROVED = '2012-06-01';
}
~~~

### 4.2. Propiedades

Esta guía evita intencionalmente cualquier recomendación sobre el uso de
Nombres de propiedad `$ StudlyCaps`,` $ camelCase` o `$ under_score`.

Cualquiera que sea la convención de nomenclatura que se use DEBE aplicarse de manera consistente dentro de un
alcance razonable. Ese alcance puede ser a nivel de proveedor, a nivel de paquete, a nivel de clase,
o nivel de método.

### 4.3. Métodos

Los nombres de los métodos DEBEN declararse en `camelCase ()`.
