Reglas:  // Se estaran actualizando :3
- HTML(php): 
  Para desarrollar estructuras en html, se va a utilizar la arquitectura de BEM (Block--Element__Modifier) para porder
  hacer mejor manejo de los archivos scss ejemplo: 
  
  ```
      <div class="cuerpo">
        <div class="cuerpo__titulo">
            <h1 class="cuerpo__titulo--principal"></h1>
            <h2 class="cuerpo__titulo--secundario"></h2>
        </div>
    </div>
    
 ```
  -nombres de clases en minusculas
  -separar por secciones cada bloque de estructura html
  - no poner nada de estilos ni scripts dentro de los componentes presentacionales
  
  
-SCSS:
  Para hacer manejo de los archivos scss, se va utilizar la notacion de BEM ejemplo:
  ```
  .cuerpo{
    &__titulo{
           /** Estilos **/
        &__titulo--principal{
           /** Estilos **/
            }
        &__titulo--secundario{
           /** Estilos **/
            }
        }
}
```





