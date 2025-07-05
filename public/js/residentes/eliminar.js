import { post } from "../utils/api.js";

export function eliminar(){
    document.addEventListener("click", async e =>{
        if(e.target.classList.contains("btn-eliminar")){
            let id = e.target.dataset.id;
            
        if (confirm("¿Estás seguro de que deseas eliminar este registro?")) {
             try {
                const residentes = await post('core/routes/api/deleteResidente.php', id);
            
                if(residentes.success){
                    window.location.href = '/sistema_comunitario/residentes';
                }
            } catch (error) {
                console.error("Error al obtener los datos del residente:", error);
                alert("Ocurrió un error al intentar eliminar el registro del residente.");
            }
        }


        }
    });
}