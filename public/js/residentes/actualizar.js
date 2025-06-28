

export function actualizar(){
    const data = JSON.parse(sessionStorage.getItem('datosResidente'));
    const form = document.getElementById("editar__form");

    if(data){
        const residente = JSON.parse(data).data;   
    }

}