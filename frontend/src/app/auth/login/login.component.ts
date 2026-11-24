import { Component } from '@angular/core';
import { Router } from '@angular/router';

@Component({
  selector: 'app-login',
  standalone: false,
  templateUrl: './login.component.html',
  styleUrl: './login.component.css',
})
export class Login {

  /*-------- INICIAR EL COMPONENTE CON SUS MODALES OCULTOS -------- */
  /* En este caso se trata del modal para solicitar al administrador
     un restablecimiento de contraseña por olvido de la misma
  */   
  mostrarOlvidoContrasenaModal: boolean = false;
  /*----------------------------------------------------------------*/

  /*----------- LÓGICA PARA MOSTRAR Y OCULTAR CONTRASEÑA ----------- */
    // Controla si la contraseña se muestra o permanece oculta
    mostrarContrasena: boolean = false;

    constructor(private router: Router) {}

    // Alterna entre mostrar y ocultar la contraseña
    alternarContrasena(): void {
        this.mostrarContrasena = !this.mostrarContrasena;
    }
  /*----------------------------------------------------------------*/

  /*----------------- LÓGICA PARA INICIO DE SESIÓN ---------------- */  
    iniciarSesion(event: Event): void {

        // Evita que el formulario recargue la página
        event.preventDefault();

        // TODO: AQUÍ SE INTRODUCIRÁ LA LÓGICA REAL DE AUTENTICACIÓN
        // Comprobar correo electrónico y contraseña.
        // Verificar si el usuario existe y tiene permisos de acceso.
        /* Verificar si el usuario es un participante raso o un administrador y guardarlo
           en el sessionStorage para que pueda visualizar o no el botón de modo administrador*/
        /* Verificar si el usuario ha marcado el check de Mantener sesion activa y guardarlo
           en el localStorage para que no le vuelva a pedir login en las siguientes ocasiones*/

        // Redirección provisional al inicio del usuario
        this.router.navigate(['/usuario/inicio']);
    }
  /*----------------------------------------------------------------*/  
}

