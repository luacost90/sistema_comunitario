import { get } from "../utils/api.js";
import { renderList } from "./renderList.js";

export async function filtrar(){
    const residentesData = await get('core/routes/api/indexResidente.php');

    // Construir el array de objetos de residentes
    console.log(residentesData);
    const residentes = Array.isArray(residentesData.data)
        ? residentesData.data.map(residente => ({
                id_residente: residente.id_residente || 0,
                cedula_residente: residente.cedula_residente || "",
                nombre_residente: residente.nombre_residente || "",
                apellido_residente: residente.apellido_residente || "",
                direccion: residente.direccion || "",
                telefono: residente.telefono || "",
                edad: residente.edad_categoria || "",
                sexo: residente.nombre_genero || "",
                embarazada: residente.embarazo || 0,
                // Puedes agregar más campos según la estructura de tus datos
            }))
        : [];
    console.log(residentes);

    // Filtrado por formulario
    // Función para filtrar residentes según los valores actuales de los filtros
    function filtrarResidentes() {
        const cedula = document.getElementById('buscarCedula').value.trim();
        const categoriaEdad = document.getElementById('categoriaEdad').value;
        const sexo = document.getElementById('sexo').value;
        const embarazada = parseInt(document.getElementById('embarazada').value);

        const filtrados = residentes.filter(residente => {
            const matchCedula = !cedula || residente.cedula_residente.includes(cedula);
            // Si tienes la función getCategoriaEdad, descoméntala y úsala aquí
            // const matchEdad = !categoriaEdad || getCategoriaEdad(residente.edad) === categoriaEdad;
            const matchEdad = !categoriaEdad || residente.edad === categoriaEdad;
            const matchSexo = !sexo || residente.sexo === sexo;
            const matchEmbarazada = isNaN(embarazada) || residente.embarazada === embarazada;
            return matchCedula && matchEdad && matchSexo && matchEmbarazada;
        });

        // Aquí puedes mostrar los resultados filtrados en la tabla o donde necesites
        renderList(filtrados);
    }

    // Detectar cambios en los selects y el input
    document.getElementById('categoriaEdad').addEventListener('change', filtrarResidentes);
    document.getElementById('sexo').addEventListener('change', filtrarResidentes);
    document.getElementById('embarazada').addEventListener('change', filtrarResidentes);

    // También puedes filtrar al escribir la cédula
    document.getElementById('buscarCedula').addEventListener('input', filtrarResidentes);

    // Si quieres mantener el submit del formulario, puedes evitar el submit y filtrar
    document.getElementById('filtroResidentesForm').addEventListener('submit', function(e) {
        e.preventDefault();
        filtrarResidentes();
    });

}
