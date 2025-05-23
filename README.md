# 🎬 ISHUME PRODUCTORA - Sección de Ubicación

## 📋 Descripción del Proyecto

Sección web moderna y responsiva para mostrar la ubicación y información de contacto de **ISHUME PRODUCTORA**. Diseñada con un enfoque juvenil, profesional y fácil de usar, implementando las mejores prácticas de UX/UI.

## 🎨 Características de Diseño

### Paleta de Colores
- **Naranja Principal**: `#ff6b35` - Color corporativo vibrante
- **Naranja Secundario**: `#f7931e` - Para gradientes y acentos
- **Negro**: `#1a1a1a` - Texto principal y elementos de contraste
- **Blanco**: `#ffffff` - Fondo de tarjetas y texto sobre fondos oscuros

### Estilo Visual
- ✨ **Diseño moderno** con gradientes y sombras suaves
- 🎯 **Interfaz juvenil** con animaciones fluidas
- 📱 **Totalmente responsivo** (móvil, tablet, desktop)
- 🎭 **Elementos flotantes** decorativos en el fondo
- 💫 **Efectos hover** interactivos en tarjetas y botones

## 🚀 Funcionalidades Implementadas

### 📞 Contacto Directo
- **Llamadas telefónicas**: Protocolo `tel:` para llamadas directas desde móvil
- **WhatsApp Web**: Integración con mensaje predefinido
- **Email**: Enlaces `mailto:` para apertura de cliente de correo
- **Copiar al portapapeles**: Clic en elementos de contacto para copiar información

### 🗺️ Ubicación y Mapas
- **Google Maps integrado** con iframe responsivo
- **Información de dirección** completa y detallada
- **Horarios de atención** visibles
- **Botón "Ver en Maps"** para navegación externa

### 🎭 Animaciones y Efectos
- **Animaciones de entrada** al hacer scroll (fadeInUp)
- **Efectos hover** en tarjetas con elevación
- **Elementos flotantes** con animación continua
- **Transiciones suaves** en todos los elementos interactivos

## 🛠️ Tecnologías Utilizadas

### Frontend
- **HTML5**: Estructura semántica moderna
- **CSS3**: Flexbox, Grid, animaciones y transiciones
- **JavaScript**: Interactividad y funcionalidades dinámicas
- **Font Awesome 6.4.0**: Iconografía profesional

### APIs y Servicios
- **Google Maps Embed API**: Integración de mapas
- **WhatsApp Business API**: Enlaces directos a chat
- **Clipboard API**: Funcionalidad de copiar texto

## 📁 Estructura del Proyecto

```
ishume-location/
├── index.html              # Archivo principal
├── README.md              # Documentación del proyecto
└── assets/
    ├── css/
    │   └── styles.css     # Estilos CSS (integrados en HTML)
    ├── js/
    │   └── main.js        # JavaScript (integrado en HTML)
    └── images/
        └── icons/         # Iconos personalizados (si los hubiera)
```

## 🎯 Secciones Implementadas

### 1. Header de Sección
- Título principal "Encuéntranos"
- Subtítulo descriptivo
- Animación de entrada

### 2. Tarjeta de Ubicación
- 📍 Dirección completa
- 🏢 Información del edificio
- 🕒 Horarios de atención
- 🔗 Botón de enlace a Maps

### 3. Tarjeta de Contacto
- ☎️ Teléfono con enlace directo
- ✉️ Email corporativo
- 🌐 Sitio web
- 📱 Redes sociales
- 💬 WhatsApp con mensaje predefinido

### 4. Mapa Interactivo
- 🗺️ Google Maps embebido
- 📐 Diseño responsivo
- 🎨 Estilo personalizado

## 📱 Responsividad

### Breakpoints
- **Desktop**: 1200px+ (Grid 2 columnas)
- **Tablet**: 768px - 1199px (Grid 2 columnas ajustado)
- **Móvil**: <768px (Grid 1 columna)

### Adaptaciones Móviles
- Reducción de padding y márgenes
- Ajuste de tamaños de fuente
- Reorganización de elementos en columna única
- Optimización de altura del mapa

## 🔧 Configuración y Personalización

### 1. Información de Contacto
```html
<!-- Actualizar en el HTML -->
<span>+52 55 1234 5678</span>           <!-- Teléfono -->
<span>contacto@ishume.com</span>        <!-- Email -->
<span>www.ishume.com</span>             <!-- Sitio web -->
<span>@ishume_productora</span>         <!-- Instagram -->
```

### 2. Configuración de WhatsApp
```html
<!-- Actualizar número y mensaje -->
href="https://wa.me/525512345678?text=Tu%20mensaje%20aquí"
```

### 3. Google Maps
```html
<!-- Reemplazar con coordenadas reales -->
<iframe src="https://www.google.com/maps/embed?pb=..."></iframe>
```

### 4. Colores Personalizados
```css
:root {
  --primary-orange: #ff6b35;
  --secondary-orange: #f7931e;
  --dark-text: #1a1a1a;
  --white: #ffffff;
}
```

## 🚀 Instalación y Uso

### Pasos para Implementar

1. **Descarga** el archivo HTML
2. **Personaliza** la información de contacto
3. **Configura** el mapa de Google Maps con tu ubicación real
4. **Actualiza** los enlaces de redes sociales
5. **Sube** a tu servidor web

### Requisitos
- Navegador web moderno (Chrome, Firefox, Safari, Edge)
- Conexión a internet (para cargar Font Awesome y Google Maps)

## 📊 Métricas de Rendimiento

### Optimizaciones Implementadas
- ✅ CSS y JS inline para reducir requests HTTP
- ✅ Lazy loading en iframe de Google Maps
- ✅ Animaciones optimizadas con `transform` y `opacity`
- ✅ Imágenes vectoriales (SVG) para iconos
- ✅ Media queries eficientes

### Tiempos de Carga Esperados
- **First Contentful Paint**: <1.5s
- **Largest Contentful Paint**: <2.5s
- **Time to Interactive**: <3s

## 🔍 SEO y Accesibilidad

### SEO Implementado
- Meta tags correctos
- Texto alternativo en elementos
- Estructura semántica HTML5
- Enlaces descriptivos

### Accesibilidad
- Contraste adecuado de colores
- Navegación por teclado
- Elementos semánticamente correctos
- Textos descriptivos en iconos

## 🐛 Resolución de Problemas

### Problemas Comunes

**El mapa no se muestra:**
- Verificar que la URL del iframe esté correcta
- Comprobar conexión a internet
- Validar permisos de Google Maps

**Las llamadas no funcionan:**
- Verificar formato del número: `+525512345678`
- Probar en dispositivo móvil
- Comprobar que no haya espacios en el número

**WhatsApp no abre:**
- Verificar que el número incluya código de país
- Comprobar que WhatsApp esté instalado
- Validar codificación URL del mensaje

## 📈 Próximas Mejoras

### Funcionalidades Planeadas
- [ ] Sistema de reservas online
- [ ] Chat en vivo integrado
- [ ] Galería de proyectos
- [ ] Formulario de contacto avanzado
- [ ] Integración con Google Analytics
- [ ] Sistema de calificaciones y reseñas

### Optimizaciones Técnicas
- [ ] Service Worker para funcionamiento offline
- [ ] Compresión de assets
- [ ] CDN para recursos estáticos
- [ ] Análisis de performance con Lighthouse

## 👥 Contribuciones

### Cómo Contribuir
1. Fork del repositorio
2. Crear rama para feature (`git checkout -b feature/nueva-funcionalidad`)
3. Commit de cambios (`git commit -am 'Agregar nueva funcionalidad'`)
4. Push a la rama (`git push origin feature/nueva-funcionalidad`)
5. Crear Pull Request

### Estándares de Código
- Indentación: 2 espacios
- Nomenclatura: camelCase para JavaScript, kebab-case para CSS
- Comentarios en español
- Validación W3C para HTML

## 📄 Licencia

Este proyecto está bajo la Licencia MIT. Ver el archivo `LICENSE` para más detalles.

## 📞 Soporte y Contacto

### ISHUME PRODUCTORA
- **Teléfono**: +51 991 157 028
- **Email**: ishumeProductora@gmail.com
- **Sitio Web**: Pronto..
- **WhatsApp**: [Enviar mensaje](https://wa.me/51991157028)

### Desarrollador
Para soporte técnico o consultas sobre el código, contactar al equipo de desarrollo.

---

## 🏆 Créditos

**Desarrollado por**: Equipo de Desarrollo Web
**Diseño**: Basado en tendencias modernas de UI/UX
**Iconos**: Font Awesome
**Mapas**: Google Maps Platform

---

*Última actualización: Mayo 2025*

**Versión**: 1.0.0