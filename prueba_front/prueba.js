const BASEURL = 'http://localhost/practicas_php_con_lucas/cubanitos/api/cubanitos/';

async function getCubanitos() {
    try {
        const cubanitos = await fetch(BASEURL);
        const response = await cubanitos.json();
        console.log(response);
        
    } catch (error) {
        console.log(error);
    }
}

getCubanitos();