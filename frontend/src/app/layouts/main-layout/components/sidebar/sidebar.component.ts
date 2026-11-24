import { Component, Input} from '@angular/core';

@Component({
  selector: 'app-sidebar',
  standalone: false,
  templateUrl: './sidebar.component.html',
  styleUrl: './sidebar.component.css',
})
export class Sidebar {

  /*----------------- LÓGICA PARA RECIBIR EL MODO ----------------- */

    /* Con esta lógica recibe el modo del componente padre y mostrará
       un contenido u otro en función de si es modo usuario o admin.
    */
    @Input() modo: 'admin' | 'usuario' = 'usuario';
    /*----------------------------------------------------------------*/
}
