# HOTELES-AUTOBOT

## DESCRIPCIÓN

Este proyecto es un **catálogo de hoteles** en el que los usuarios pueden consultar los precios de los hoteles y ver la evolución de los mismos a lo largo del tiempo. Además, cuenta con un sistema automatizado que, utilizando **n8n**, consulta los precios de los hoteles diariamente y envía un correo electrónico a los usuarios que hayan añadido un hotel a su lista de deseos si el precio alcanza el valor deseado o es más bajo.

El sistema también incluye un **chatbot inteligente** alimentado por **Rasa**, **Laragent** e **Inteligencia Artificial** con **MCP** (Model Control Protocol) desarrollado en **Python**.

Puedes ver un vídeo del proyecto, con instrucciones sobre su uso, su desarrollo y más a través de este enlace :D

- **Backend**: Laravel
- **Frontend**: Angular

## CARACTERÍSTICAS

- **Consulta de precios**: Los usuarios pueden consultar los precios actuales de los hoteles y ver cómo han cambiado a lo largo del tiempo.
- **Automatización de precios**: Cada día, el sistema consulta los precios de los hoteles y los actualiza automáticamente.
- **Notificación por correo**: Los usuarios que hayan añadido un hotel a su lista de deseos reciben un correo cuando el precio alcanza el valor deseado o es más bajo.
- **Chatbot inteligente**: Asistencia interactiva alimentada por **Rasa** y **Laragent**, para resolver dudas sobre precios, consultas sobre viajes y más y más.
- **Interfaz de usuario**: Una interfaz sencilla y moderna en **Angular**.

## TECNOLOGÍAS UTILIZADAS

- **Backend**: Laravel (PHP)
- **Frontend**: Angular
- **Automatización de precios y envío de correos electrónicos**: n8n
- **Chatbot**: Rasa, Laragent, MCP hecho en Python
- **Base de datos**: MySQL

## FUTURAS IMPLEMENTACIONES
- Hacer que sea compatible con múltiples servicios (como Day Pass de piscina), y no solo alojamiento
- Mostrar la página en español y en inglés

## RECURSOS
- **Relaciones:** https://www.youtube.com/watch?v=7B_Sbqq62Bc&t=650s
- **Autenticación:** https://www.youtube.com/watch?v=57jtVRxWEMw
- **Fallo con PHP:** https://www.youtube.com/watch?v=Ljncj5aqR9c
- **Middleware a partir de Laravel 11:** https://dev.to/grantholle/exploring-middleware-in-laravel-11-2e10
- **Instalar API a partir de Laravel 12:** https://laravel.com/docs/12.x/routing
- **Instalar n8n localmente:** https://www.youtube.com/watch?v=YHsN8jb8A8M
- **Tutorial LarAgent:** https://www.youtube.com/watch?v=Y7F4MoC5M8Y
- **Instalar Rasa:** https://www.youtube.com/watch?v=RVoFqxmG8p0
- **MCP + n8n:** https://www.youtube.com/watch?v=uXRkwwDTWdg
- **Configurar servidor MCP a través de API:** https://www.youtube.com/watch?v=2hwrxAbw-9Y
- **Fallbacks en Rasa:** https://legacy-docs-oss.rasa.com/docs/rasa/fallback-handoff/
- **API de hoteles (limitado a un listado de 10 pero por ahora vale):** https://xotelo.com/
- **Listado de hoteles (es necesario tener cuenta de RapidAPI, y luego simplemente se hace la consulta una vez para obtener los nombres y los id manualmente para el seeder):** https://rapidapi.com/anastue-pGK7lGUO-Wo/api/xotelo-hotel-prices/playground/apiendpoint_2bd42903-8d5d-42fd-bfb2-c772387237f1
