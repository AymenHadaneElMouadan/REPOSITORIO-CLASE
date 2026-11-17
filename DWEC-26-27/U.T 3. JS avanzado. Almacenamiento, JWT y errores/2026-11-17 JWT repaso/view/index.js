const TOKEN_KEY = 'token-2026-11-17';
const userElement = document.querySelector('#tDivUser');
const loginButton = document.querySelector('#tButLogin');

function decodeToken(token) {
    const parts = token.split('.');

    if (parts.length !== 3 || !parts[1]) {
        throw new Error('Token con formato inválido.');
    }

    let base64 = parts[1].replace(/-/g, '+').replace(/_/g, '/');

    while (base64.length % 4 !== 0) {
        base64 += '=';
    }

    const bytes = Uint8Array.from(atob(base64), character => character.charCodeAt(0));
    const payload = JSON.parse(new TextDecoder().decode(bytes));

    if (typeof payload.exp !== 'number' || payload.exp * 1000 <= Date.now()) {
        throw new Error('Token caducado.');
    }

    return payload;
}

function updateHeader() {
    const token = window.localStorage.getItem(TOKEN_KEY);

    if (!token) {
        if (userElement) {
            userElement.textContent = '';
        }

        if (loginButton) {
            loginButton.textContent = 'Iniciar sesión';
            loginButton.onclick = () => {
                window.location.href = './login.html';
            };
        }

        return;
    }

    try {
        const decodedToken = decodeToken(token);

        if (userElement) {
            userElement.textContent = `${decodedToken.firstName ?? ''} ${decodedToken.lastName ?? ''}`.trim();
        }

        if (loginButton) {
            loginButton.textContent = 'Cerrar Sesión';
            loginButton.onclick = () => {
                window.localStorage.removeItem(TOKEN_KEY);
                updateHeader();
            };
        }
    } catch (error) {
        window.localStorage.removeItem(TOKEN_KEY);
        alert('Problema al identificar al usuario. Refresque la página o intente iniciar sesión');
        updateHeader();
    }
}

updateHeader();
