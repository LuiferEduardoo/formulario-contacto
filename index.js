// Este codigo evita que el formulario se reenvie cuando se refresca la pagina
if (window.history.replaceState)
{
    // verificamos disponibilidad
    window.history.replaceState(null, null, window.location.href);
}