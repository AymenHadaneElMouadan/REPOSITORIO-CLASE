const token = window.localStorage.getItem('token-2026-11-17');

if(!token){
    document.querySelector('#tDivUser').textContent = '';
    document.querySelector('#tButLogin').textContent = 'Iniciar sesión';
} else {
    document.querySelector('#tDivUser').textContent = 'pepe';
    document.querySelector('#tButLogin').textContent = 'Cerrar Seesion';
}