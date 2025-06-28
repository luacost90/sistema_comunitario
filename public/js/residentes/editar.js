import { post } from "../utils/api.js";

export function editar(){
    document.addEventListener("click", async e =>{
        if(e.target.classList.contains("btn-edit")){
            let id = e.target.dataset.id;
            
            try {
                const residentes = await post('core/routes/api/getResidenteById.php', id);
                console.log(residentes);
                sessionStorage.setItem('datosResidente', JSON.stringify(residentes));
                window.location.href = '/sistema_comunitario/editar';
            } catch (error) {
                console.error("Error al obtener los datos del residente:", error);
                alert("Ocurrió un error al intentar editar el residente. Por favor, inténtalo de nuevo.");
            }


        }
    });
    // document.querySelectorAll(".btn").forEach( btn =>{
    //     btn.addEventListener("click", e =>{
    //         console.log("Ha dado click en " + e.target.dataset.id);
    //     })
    // })
}