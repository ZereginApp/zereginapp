import { Component, Input} from '@angular/core';

@Component({
  selector: 'app-brand',
  standalone: false,
  templateUrl: './brand.component.html',
  styleUrl: './brand.component.css',
})
export class Brand {

  /*----------------- LÓGICA PARA RECIBIR EL MODO ----------------- */

    /* Con esta lógica recibe el modo del componente padre y mostrará
       un contenido u otro en función de si es modo usuario o admin.
    */
    @Input() modo: 'admin' | 'usuario' = 'usuario';
    /*----------------------------------------------------------------*/

}
