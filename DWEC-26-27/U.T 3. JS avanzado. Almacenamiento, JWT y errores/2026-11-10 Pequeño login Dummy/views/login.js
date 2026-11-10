import AuthenticationService from "/service/authentication.service.js";

document.querySelector('#tButInitSession').addEventListener('click', async e => {
    const username = document.querySelector('#tTxtUsername').value;
    const password = document.querySelector('#tTxtPassword').value;
    const service = new AuthenticationService();
    try {
        const token = await service.validateUser(username, password);
        window.sessionStorage.setItem('token', token);
        window.location = '/view/index.html';
    } catch (error) {
        alter(error.message);        
    }
});

