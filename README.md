# Proyecto-Final-Daw-2024-2025-Francesc-Sora-Quevedo
# **PioPio eSports**
### Temática
La página irá dedicada a la promoción y gestión de un club amateur de e-sports, además, se desarrollaría para un “cliente” ubicado en gran canaria, por ese motivo, el nombre y los colores estarían basados en la identidad canaria, por tanto, esta identidad y los e-sports serían los principales ejes vertebradores de la temática de la página.
### Objetivos
-   Desarrollar una página web para la promoción y gestión de un club amateur de e-sports.
    
-   Aprender a integrar las diversas partes del desarrollo web en un mismo proyecto.
    
-   Conseguir que la página sea funcional tanto para usuarios anónimos, registrados y administradores. Teniendo derechos diferentes dentro de la misma.

-   Obtener experiencia en el trato con un cliente no experto en aspectos técnicos.
### Tecnologías
-   Laravel para el back-end.
    
-   Vanilla JS para el front-end (principalmente validaciones de formularios).
    
-   HTML y SCSS para los estilos y la estructura de la página.
    
-   Para la base de datos utilizaría MySQL
##Diseño de la web
-  El cliente me presentó el siguiente boceto inicial
-  ![image](https://github.com/user-attachments/assets/5f5d51b2-0972-423e-9906-66c97ed87126)
-  En la actualidad este es la primera plantila llevaba a cabo con la información del cliente:
-  ![image](https://github.com/user-attachments/assets/c2ab1814-ad49-4523-9bb6-953fbb446d95)
-  También con plantilla para la version móvil
-  ![image](https://github.com/user-attachments/assets/68370443-6630-4254-9053-029781118449)
 

## El proyecto se puede definir en 3 flujos de desarrollo
1. Flujo de usuario:
-  El usuario interactua con el cliente mediante links, formularios y botones que le permiten navegar a través de la Web. Puede ver las noticias publicadas, los equipos introducidos y sus jugadores. Así como autentificarse para poder contactar con los administradores de la web y obtener información sobre las actividades que se van a realizar.
-  Rol 'user'.
2. Flujo de gestión/administración:
-  Los administradores tienen la potestad de crear/actualizar/eliminar contenido para la página. Teniendo una sencilla página de administración desde donde pueden acceder a distintos formularios que les permitan interactuar con el contenido.
-  Rol 'admin'
3. Flujo de contenido estático:
-  El contenido estático consiste en información que suele mantenerse con el paso del tiempo, como el logo de la página, o los enlaces a redes sociales. Este flujo se encarga de traer esta información que se encuentra guardada en la base de datos.
## Modelos base de datos

En este apartado mostraré en 3 partes diferenciadas los modelos entidad-relación y relacional, para que pueda verse con más claridad

### Users-News

#### Modelo entidad-relación
![imagen](https://github.com/user-attachments/assets/401bf45f-2983-4424-85e0-dfbc801086c3)

#### Modelo relacional
![imagen](https://github.com/user-attachments/assets/4d276258-7268-4ee6-88ba-69a0b0567ad4)

### Medias-Teams-Players

#### Modelo entidad-relación
![imagen](https://github.com/user-attachments/assets/345e2f50-5fc4-4287-afb7-e315133366ca)

#### Modelo relacional
![imagen](https://github.com/user-attachments/assets/352511a0-2c2c-4ae4-90dd-ec20c4e66783)

### Images

#### Modelo entidad-relación
![imagen](https://github.com/user-attachments/assets/5a110921-f900-4404-ae2a-078f4e937b5e)

#### Modelo relacional
![imagen](https://github.com/user-attachments/assets/890eba02-2c5f-40d9-9548-c18df260bc8c)


