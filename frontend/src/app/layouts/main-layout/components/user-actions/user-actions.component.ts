import { Component, Input} from '@angular/core';
import { Router } from '@angular/router';

@Component({
  selector: 'app-user-actions',
  standalone: false,
  templateUrl: './user-actions.component.html',
  styleUrl: './user-actions.component.css',
})
export class UserActions {

  /*----------------- LÓGICA PARA RECIBIR EL MODO ----------------- */

    /* Con esta lógica recibe el modo del componente padre y mostrará
       un contenido u otro en función de si es modo usuario o admin.
    */
    @Input() modo: 'admin' | 'usuario' = 'usuario';
    /*----------------------------------------------------------------*/

  /*--------------- LÓGICA PARA EL CIERRE DE SESIÓN --------------- */
  constructor(private router: Router) {}

  cerrarSesion(): void {

    /* Introducir aquí la lógica correspondiente para que el sistema olvide las credenciales
       de la persona y, en caso de que haya marcado el check de Mantener sesión iniciada, que
       esto también lo olvide*/

    // Redirigir al usuario a la página de login
    this.router.navigate(['/login']);
    }
  /*----------------------------------------------------------------*/

}
