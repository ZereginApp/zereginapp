# ZereginApp

Plataforma web para organizar las tareas de las cuadrillas de blusas y neskas durante las fiestas de La Blanca (Vitoria-Gasteiz). Proyecto de fin de grado de Desarrollo de Aplicaciones Web.

La aplicación centraliza las tareas de una cuadrilla, permite a sus miembros inscribirse en ellas según su perfil y controla automáticamente cupos y requisitos de participación. La junta dispone de un panel para supervisar la cobertura de cada actividad y reasignar personas ante imprevistos.

> **Estado:** en desarrollo.

## Equipo

| Persona | Área |
|---|---|
| Nadia | Diseño de interfaz, prototipado y maquetación (HTML y Tailwind CSS) |
| Walter | Diseño y gestión de la base de datos |
| Santiago | Lógica de negocio y API REST · Infraestructura (Docker y entorno Git) |
| Zuriñe | Lógica del frontend en TypeScript y conexión con la API · Infraestructura (Docker) |

## Tecnologías

- **Frontend:** Angular y Tailwind CSS
- **Backend:** Laravel (PHP) y Laravel Sanctum
- **Base de datos:** MySQL
- **Infraestructura:** Docker, Docker Compose y Traefik
- **Integración continua y gestión:** GitHub Actions y GitHub Projects

## Estructura del repositorio

```
zereginapp/
├── backend/                 API REST en Laravel
├── frontend/                Aplicación Angular
├── docker/                  Configuración de Traefik
├── docs/                    Documentación técnica
│   └── api/                 Contrato de la API (OpenAPI)
├── .github/                 Plantillas, CODEOWNERS y workflows
├── docker-compose.yml       Servicios del entorno de desarrollo
└── docker-compose.prod.yml  Ajustes del entorno de producción
```

## Puesta en marcha

### Requisitos

- [Git](https://git-scm.com/)
- [Docker Desktop](https://www.docker.com/products/docker-desktop/) (incluye Docker Compose)

No hace falta instalar PHP, Node ni MySQL: todo se ejecuta en contenedores.

### Instalación

1. Clona el repositorio:

   ```bash
   git clone https://github.com/ZereginApp/zereginapp.git
   cd zereginapp
   ```

2. Crea tu archivo de variables de entorno a partir de la plantilla y rellena los valores:

   ```bash
   cp .env.example .env
   ```

3. Levanta los contenedores:

   ```bash
   docker compose up -d
   ```

> Esta sección se completará a medida que se configuren los contenedores, el backend y el frontend.

## Flujo de trabajo

El proyecto sigue el modelo **GitFlow**:

- `main`: versiones estables. Solo recibe cambios desde `develop` al cierre de cada sprint.
- `develop`: rama de integración. Es la rama por defecto.
- `feature/<issue>-<descripcion>`: nuevas funcionalidades, creadas desde `develop`. Ejemplo: `feature/12-login`.
- `fix/<issue>-<descripcion>`: corrección de errores en desarrollo.
- `hotfix/<issue>-<descripcion>`: correcciones urgentes sobre `main`.

### Normas

- Cada rama parte de una issue del tablero de GitHub Projects.
- Todo cambio entra mediante pull request, con al menos una aprobación de otro miembro del equipo.
- Los mensajes de commit siguen [Conventional Commits](https://www.conventionalcommits.org/es/v1.0.0/): `feat`, `fix`, `docs`, `test`, `refactor` o `chore`. Ejemplo: `feat(inscripcion): validar solapamiento horario`.
- Nunca se suben archivos `.env` ni contraseñas.

### Definición de terminado

Una tarea está terminada cuando su código ha sido revisado y aprobado, supera las pruebas y está desplegado en el entorno de pruebas.

## Documentación

- Documento de descripción del proyecto: *(enlace a Drive)*
- [Prototipo de la interfaz de administración (Figma)](https://www.figma.com/design/KL0EfOhjDdm7d0RBiffEpk/Version-Administrador--PC-?node-id=0-1&t=0nxCGk23OZijVSQA-1)
- [Prototipo de la interfaz de usuario (Figma)](https://www.figma.com/design/8z07ip8GB1bEQDko4Tdzv8/Version-usuario--M%C3%B3vil-?node-id=11-5315&t=8EjYTlf5nyYProdS-1)
- Contrato de la API: [`docs/api/`](docs/api/)
