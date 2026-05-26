// Funciones útiles
function getBaseUrl() {
    const { protocol, host, pathname } = window.location;
    const baseDirectory = pathname.substring(0, pathname.lastIndexOf('/') + 1); // Obtiene el subdirectorio actual

    return `${protocol}//${baseDirectory}`;
}