# App Estación

Aplicación web para monitorear estaciones meteorológicas en tiempo real.

## Descripción

Esta aplicación permite visualizar datos de estaciones meteorológicas distribuidas, mostrando información como temperatura, humedad, presión atmosférica y ubicación de cada estación.

## Características

- **Vista Landing**: Página de inicio con descripción de la aplicación
- **Panel de Estaciones**: Lista todas las estaciones disponibles con información básica
- **Detalle de Estación**: Muestra información detallada de una estación específica
- **Diseño Responsive**: Adaptable a diferentes dispositivos
- **Arquitectura MVC**: Estructura organizada y mantenible

## Estructura del Proyecto

```
app-estacion/
├── controllers/          # Controladores MVC
├── views/               # Vistas y plantillas
├── models/              # Modelos de datos
├── librarys/            # Motor de plantillas Enano
├── .env.php            # Variables de entorno (no incluido en git)
├── .gitignore          # Archivos excluidos de git
└── index.php           # Router principal
```

## Tecnologías Utilizadas

- PHP (Backend)
- JavaScript (Frontend - Fetch API, async/await)
- HTML5 & CSS3
- Motor de plantillas personalizado "Enano"

## Instalación

1. Clonar el repositorio
2. Configurar las variables en `.env.php`
3. Ejecutar en servidor web con PHP

## Funcionalidades Implementadas

- ✅ Estructura MVC completa
- ✅ Motor de plantillas funcional
- ✅ Vista landing con información de la app
- ✅ Panel de estaciones con datos simulados
- ✅ Vista de detalle de estación
- ✅ Navegación entre vistas
- ✅ Diseño responsive
- ✅ Integración con Git

## Próximas Mejoras

- [ ] Conexión con API real de estaciones
- [ ] Base de datos para persistencia
- [ ] Gráficos de datos históricos
- [ ] Sistema de alertas meteorológicas

## Autor

Estudiante TEC - Desarrollo Web