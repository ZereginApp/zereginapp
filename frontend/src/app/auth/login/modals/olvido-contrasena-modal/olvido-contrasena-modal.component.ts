import { Component } from '@angular/core';
import { Output, EventEmitter } from '@angular/core';

@Component({
  selector: 'app-olvido-contrasena-modal',
  standalone: false,
  templateUrl: './olvido-contrasena-modal.component.html',
  styleUrl: './olvido-contrasena-modal.component.css',
})
export class OlvidoContrasenaModal {

  /*------------------ LÓGICA DEL BOTÓN DE CERRAR ------------------ */
  @Output() cerrarOlvidoContrasena = new EventEmitter<void>();
  /*--------------------------**-------------------------------------*/


  /*---------- LÓGICA DEL MENSAJE DE ÉXITO EN SOLICITUD ------------ */
  mostrarResultado: boolean = false;

  async solicitarRestablecimiento(event: Event) {
    event.preventDefault();

    //Primero tiene que comprobar que todos los campos están rellenados. Sino, no hará nada (Ahora mismo como lo tengo muestra el resultado cuando pulso el botón)

    //Introducir código para generar la invitación y crear a la persona participante en la BBDD

    // Cuando todo haya terminado, mostramos la ventana con el token
      this.mostrarResultado = true;
  }
  /*--------------------------**-------------------------------------*/

}
