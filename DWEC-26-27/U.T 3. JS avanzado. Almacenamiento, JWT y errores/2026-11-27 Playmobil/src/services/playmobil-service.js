export class PlaymobilService {
    static URL_BASE = 'http://192.168.2.5:8082/api/';

    /**
     * Devueve las series de Playmobil
     * @param {string} token 
     * @returns {Array<{uuid: string, denomination: string}>}
     */
    async retrieveSeries(token, id) {
        const url = PlaymobilService.URL_BASE + 'series';

        // Comprueba si el servidor está encendido
        let response;
        try {
            const headers = new Headers();
            headers.append('Authorization', `Bearer ${token}`);
            headers.append('Content-Type', 'application/x-www-form-urlencoded');

            response = await fetch(url, {
                method: 'get',
                headers
            });
        } catch (error) {
            throw new Error(`Cannot retrieve series: ${error}`);
        }

        // Comprueba si el fetch fue correcto
        if (!response.ok) {
            throw new Error(`Cannot retrieve series: [${response.status} ${response.statusText}]`);
        }

        // Comprueba si estoy recibiendo JSON
        let data;
        try {
            data = await response.json();
        } catch (error) {
            throw new Error(`Cannot retrieve series: ${error}`);
        }

        // Comprueba si el data es correcto
        if (!data.ok) {
            throw new Error(`Cannot retrieve series: ${data.message}`);
        }

        return data.series;
    }

    /**
     * Devueve las series de Playmobil
     * @param {string} token 
     * @returns {Array<{uuid: string, denomination: string}>}
     */
    async retrieveSeriesById(token, id) {
        const url = PlaymobilService.URL_BASE + 'serie/' + id;

        // Comprueba si el servidor está encendido

        let response;
        try {
            const headers = new Headers();
            headers.append('Authorization', `Bearer ${token}`);
            headers.append('Content-Type', 'application/x-www-form-urlencoded');

            response = await fetch(url, {
                method: 'get',
                headers
            });
        } catch (error) {
            throw new Error(`Cannot retrieve series: ${error}`);
        }

        // Comprueba si el fetch fue correcto
        if (!response.ok) {
            throw new Error(`Cannot retrieve series: [${response.status} ${response.statusText}]`);
        }

        // Comprueba si estoy recibiendo JSON
        let data;
        try {
            data = await response.json();
        } catch (error) {
            throw new Error(`Cannot retrieve series: ${error}`);
        }

        // Comprueba si el data es correcto
        if (!data.ok) {
            throw new Error(`Cannot retrieve series: ${data.message}`);
        }

        return data.series;
    }
}