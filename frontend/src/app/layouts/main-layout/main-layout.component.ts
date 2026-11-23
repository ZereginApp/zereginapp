import { Component, OnInit } from '@angular/core';
import { ActivatedRoute } from '@angular/router';

@Component({
  selector: 'app-main-layout',
  standalone: false,
  templateUrl: './main-layout.component.html',
  styleUrl: './main-layout.component.css',
})
export class MainLayout implements OnInit {

  /*----------------- LÓGICA PARA EXTRAER EL MODO ----------------- */

    /* Con esta lógica extrae de la url si está en una página del
       modo usuario o del modo admin, para mostrar en las barras de
       navegación del main layout un contenido u otro
    */
    modo: 'admin' | 'usuario' = 'usuario';

    constructor(private route: ActivatedRoute) {}

    ngOnInit(): void {

        // Recuperamos el modo definido en las rutas
        this.route.data.subscribe(datos => {

            this.modo = datos['modo'];

        });

    }
    /*----------------------------------------------------------------*/
  
  
   /*-------------- LÓGICA PARA MOSTRAR FECHA ACTUAL --------------- */
  // Fecha actual
  fechaActual: Date = new Date();
  /*----------------------------------------------------------------*/
     
  }
