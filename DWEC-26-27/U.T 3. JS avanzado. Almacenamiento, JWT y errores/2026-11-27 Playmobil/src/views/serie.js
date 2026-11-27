import { closeSpinner, openSpinner } from "../lib/spinner.lib.js";
import { PlaymobilService } from "../services/playmobil-service.js";

await setup();


async function setup() {
    const token = checkToken();
    try {
        openSpinner();
        const series = await (new PlaymobilService()).retrieveSeries(token);
        renderSeries(series);

    } catch (error) {
        alert('Hay un problema: ' + error.message + '\n Refresque la página');
    } finally {
        closeSpinner();
    }
}

function checkToken() {
    const token = window.localStorage.getItem('token-playmobil');
    if (!token) {
        alert('identificate');
        window.location = './index.html';
        return;
    }

    return token;
}

function renderSeries(series) {
    const nTbody = document.querySelector('#tTabSeries>tbody')

    series.forEach(serie => {
        const nTr = nTbody.appendChild(document.createElement('tr'));

        const nTd = nTr.appendChild(document.createElement('td'));

        const nRadio = nTd.appendChild(document.createElement('input'));
        nRadio.type = 'radio';
        nRadio.name = 'series';
        nRadio.value = serie.uuid;
        nRadio.id = `tRad${serie.uuid}`;
        nRadio, addEventListener('change', async e => {
            try {
                openSpinner();
                const token = checkToken();
                const series = await(new PlaymobilService()).retrieveSerieById(token, serie.uuid);
                renderSerie(series);

            } catch (error) {
                alert('Hay un problema: ' + error.message + '\n Refresque la página');
            } finally {
                closeSpinner();
            }
        });

        const nLabel = nTd.appendChild(document.createElement('label'));
        nLabel.setAttribute('for', `tRad${serie.uuid}`);
        nLabel.textContent = serie.denomination;

    });
}
function renderSerie(serie){
    document.querySelector(#tHeaSerie).textContent
}