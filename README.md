# Proyecto Biblioteca Publica - WEB 2 TPE

## Desarrolladores

Grandio Juan Manuel - Ciancio Aaron Gabriel. 

## Descripción

Este proyecto consiste en una base de datos para una biblioteca pública. El objetivo es gestionar los libros, autores, usuarios y préstamos de manera eficiente. La base de datos está diseñada para facilitar la administración de los recursos de la biblioteca y las interacciones con los usuarios.

## Diagrama del Modelo de Datos

A continuación se muestra el diagrama del modelo de datos para la base de datos de la biblioteca pública.

![diagrama](https://github.com/user-attachments/assets/16131cee-6db0-4dd3-8707-87851e734823)

## Explicación del Dominio

El modelo de datos para la biblioteca pública incluye las siguientes entidades principales:

1) Prestamo: partimos de un prestamo otorgado por la bibliteca en el cual se relaciona con un material prestado (libros, revistas, periodicos, etc) y un usuario al cual se le otorga el mismo.
2) Usuario: se reflejan los datos identificatorios del usuario tales como nombre, apellido, direccion, etc.
3) Material: aqui se ven los tipos de elementos que se pueden prestar en la biblioteca. Suponemos tres tipos de material: libros, revistas y periodicos.
4) Libros: uno de los tipo de material. Se almacena los datos relacionados al autor, fecha de publicacion, editorial, categoria, etc. Esta relaciona con autor, editorial y categoria. 
5) Revistas: tendra similar informacion a los libros. Esta relacionado con la editorial y la categoria. 
6) Periodicos: informacion relacionada al periodico. Esta relacionado con la editorial. 
7) Autor: refleja los datos del autor tales como nombre, apellido, fecha de nacimiento, nacionalidad, etc.
8) Categorias: refleja los distintos tipos de categoria que hay para diferentes tipos de material y una descripcion de la misma.
9) Editorial: refleja los datos de la editorial tales como nombre, pais, direccion, etc.


