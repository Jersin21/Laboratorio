
# Descripción del Sistema
El objetivo principal del sistema es digitalizar y automatizar el proceso de gestión de análisis clínicos, eliminando la necesidad de realizar peticiones por escrito y agilizando el envío de resultados entre el laboratorio y los centros de salud.

El sistema cuenta actualmente con un módulo funcional, el módulo de solicitud de análisis. Este módulo permite a los médicos realizar solicitudes de análisis clínicos a través de una interfaz en línea, proporcionando información detallada sobre los análisis requeridos, como tipo de análisis, categoría, observaciones y método de obtención de muestras.

Una vez que se realiza una solicitud, el sistema envía la solicitud al laboratorio, donde un recepcionista asigna la solicitud al personal de laboratorio correspondiente. El personal de laboratorio se encarga de realizar la toma de muestras, realizar los análisis necesarios y cargar los resultados en el sistema.

Una vez que los resultados están disponibles, el médico solicitante puede acceder al sistema para ver los resultados de los análisis solicitados, incluyendo el texto con los resultados y las imágenes asociadas, si las hubiera.

# Características del Sistema
El sistema de gestión de análisis clínicos de laboratorio presenta las siguientes características:

- Suscripción de centros médicos: Los centros médicos interesados en utilizar el sistema deben suscribirse, proporcionando información relevante sobre el centro, como nombre, dirección y especialidades. Esta suscripción es realizada por un operador de subscripción en el laboratorio.

- Registro de médicos: Una vez que un centro médico está suscrito, puede registrar a sus médicos en el sistema. Cada médico tendrá su propio perfil con información personal y credenciales de acceso para realizar las solicitudes y acceder a los resultados.

- Selección de análisis: Los médicos pueden seleccionar los análisis clínicos requeridos de una lista categorizada de análisis disponibles. Pueden marcar más de un análisis por solicitud y agregar observaciones específicas.

- Método de obtención de muestras: El médico puede indicar si el centro médico proporcionará las muestras al laboratorio o si requiere que el personal del laboratorio se desplace para tomar las muestras.

- Recepción y asignación de solicitudes: El sistema cuenta con un recepcionista en el laboratorio que revisa y asigna las solicitudes recibidas a los miembros del personal de laboratorio correspondientes. Esto garantiza una distribución eficiente de las solicitudes y una asignación adecuada de recursos.

- Carga de resultados: El personal de laboratorio tiene acceso al sistema para cargar los resultados de los análisis realizados. Pueden ingresar el texto con los resultados y, si es necesario, adjuntar imágenes relacionadas.

- Acceso a los resultados: Una vez que los resultados están cargados en el sistema, el médico solicitante puede acceder a ellos, visualizar los resultados y revisar las imágenes asociadas.

## Tecnologías Utilizadas

El sistema de gestión de análisis clínicos de laboratorio se ha desarrollado utilizando las siguientes tecnologías:

- Framework de desarrollo web: CodeIgniter
- Lenguaje de programación: PHP
- Base de datos: MySQL
- Frontend: HTML, CSS y JavaScript (con uso de frameworks(Bootstrap))
- Control de versiones: Git

## Módulo de Solicitud de Análisis

El módulo implementado hasta el momento es el de Solicitud de Análisis, el cual permite a los médicos ingresar al sistema y realizar solicitudes de análisis clínicos. Algunas de las características incluidas en este módulo son:

- Registro de centros médicos y médicos en el sistema.
- Selección de análisis clínicos de una lista predefinida.
- Adición de observaciones y forma de obtención de la muestra en cada solicitud.
- Recepción y asignación de solicitudes por parte del personal de laboratorio.
- Carga de resultados de análisis por parte del personal de laboratorio.
- Visualización de resultados por parte de los médicos solicitantes.

## Instalación y Configuración

Para instalar y configurar el sistema, siga los siguientes pasos:

- Clonar el repositorio del proyecto desde [URL del repositorio].
- Configurar las dependencias necesarias, como el framework CodeIgniter y el servidor web.
- Configurar la base de datos MySQL y las credenciales de acceso correspondientes.
- Importar la estructura de la base de datos desde el archivo SQL proporcionado.
- Realizar las configuraciones adicionales necesarias según las instrucciones del archivo de configuración de CodeIgniter.
- Ejecutar el sistema accediendo a la URL del proyecto desde un navegador web.

## Contribuciones

Este proyecto se encuentra en constante desarrollo y se agradecen las contribuciones de la comunidad. Si deseas contribuir al proyecto, sigue los pasos:

1. Realiza un fork del repositorio.
2. Crea una rama con el nombre descriptivo de tu contribución.
3. Realiza tus cambios y mejoras en la rama creada.
4. Realiza un pull request para que tus cambios sean revisados e incorporados al proyecto.

¡Gracias por tu interés y contribuciones al Sistema de Gestión de Análisis Clínicos de Laboratorio!

