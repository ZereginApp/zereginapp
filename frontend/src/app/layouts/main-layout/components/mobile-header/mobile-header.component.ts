import { Component, Input} from '@angular/core';

@Component({
  selector: 'app-mobile-header',
  standalone: false,
  templateUrl: './mobile-header.component.html',
  styleUrl: './mobile-header.component.css',
})
export class MobileHeader {

  /*----------------- LÓGICA PARA RECIBIR EL MODO ----------------- */

    /* Con esta lógica recibe el modo del componente padre y mostrará
       un contenido u otro en función de si es modo usuario o admin.
    */
    @Input() modo: 'admin' | 'usuario' = 'usuario';
  /*----------------------------------------------------------------*/


  /*--------------- LÓGICA PARA EL MENÚ HAMBURGUESA --------------- */
  menuAbierto = false;

  alternarMenu() {
    this.menuAbierto = !this.menuAbierto;
  }

  cerrarMenu() {
    this.menuAbierto = false;
  }
  /*----------------------------------------------------------------*/


}
