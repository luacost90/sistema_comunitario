import {get} from "../utils/api.js";

export async function listar() {
    const table = document.getElementById("residentesTable");

    try {
        const residentes = await get('core/routes/api/indexResidente.php');
        const tbody = table.querySelector('tbody');
        tbody.innerHTML = '';
        residentes.data.forEach(residente => {
            const tr = document.createElement('tr');
            tr.innerHTML = `
                <td>${residente.cedula_residente}</td>
                <td>${residente.nombre_residente}</td>
                <td>${residente.apellido_residente}</td>
                <td>${residente.telefono}</td>
                <td>${residente.direccion}</td>
                <td>
                    <button class="btn btn-edit btn-primary btn-sm" data-id="${residente.id_residente}">Editar</button>
                    <button class="btn btn-danger btn-sm" data-id="${residente.id_residente}">Eliminar</button>
                </td>
            `;
            tbody.appendChild(tr);
        });
    } catch (error) {
        console.error('Error al obtener los residentes:', error);
    }
}