import { post } from "../utils/api.js";

export function modal(){
    document.addEventListener("click", async e =>{
        if(e.target.classList.contains("btn-info")){
            // Obtener el id del residente desde un atributo data-id del botón

            const residenteId = e.target.dataset.id;

            // Aquí deberías hacer una petición para obtener los datos del residente
            // Por ejemplo, usando fetch (ajusta la URL según tu backend)
            const residente = await post('core/routes/api/getResidenteById.php', residenteId);

            const data = residente.data;
            console.log(data)

            // Rellenar los campos del modal
            document.getElementById("modalCedula").textContent = data.cedula_residente || "";
            document.getElementById("modalNombre").textContent = data.nombre_residente || "";
            document.getElementById("modalApellido").textContent = data.apellido_residente || "";
            document.getElementById("modalEdad").textContent = data.edad || "";
            document.getElementById("modalSexo").textContent = data.nombre_genero || "";
            document.getElementById("modalTelefono").textContent = data.telefono || "";
            document.getElementById("modalDireccion").textContent = data.direccion || "";

            // Mostrar el modal
            const modal = document.getElementById("residenteModal");
            modal.classList.add("active");

            // Cerrar el modal al hacer click en la X o en el botón cerrar
            const closeModal = () => modal.classList.remove("active");
            document.getElementById("closeResidenteModal").onclick = closeModal;
            document.getElementById("modalCloseBtn").onclick = closeModal;

            // Opcional: cerrar el modal al hacer click fuera del contenido
            modal.onclick = function(ev) {
                if (ev.target === modal) closeModal();
            };

        }
    });
}