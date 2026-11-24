import { Component, Input} from '@angular/core';

@Component({
  selector: 'app-mobile-footer',
  standalone: false,
  templateUrl: './mobile-footer.component.html',
  styleUrl: './mobile-footer.component.css',
})
export class MobileFooter {

  /*----------------- LÓGICA PARA RECIBIR EL MODO ----------------- */

    /* Con esta lógica recibe el modo del componente padre y mostrará
       un contenido u otro en función de si es modo usuario o admin.
    */
    @Input() modo: 'admin' | 'usuario' = 'usuario';
  /*----------------------------------------------------------------*/

}
