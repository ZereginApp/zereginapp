import { Component, Input} from '@angular/core';

@Component({
  selector: 'app-main-navigation',
  standalone: false,
  templateUrl: './main-navigation.component.html',
  styleUrl: './main-navigation.component.css',
})
export class MainNavigation {

  /*----------------- LÓGICA PARA RECIBIR EL MODO ----------------- */

    /* Con esta lógica recibe el modo del componente padre y mostrará
       un contenido u otro en función de si es modo usuario o admin.
    */
    @Input() modo: 'admin' | 'usuario' = 'usuario';
    /*----------------------------------------------------------------*/

}
