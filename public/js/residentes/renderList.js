

export function renderList(residentes){
    const table = document.getElementById("residentesTable");
    const tbody = table.querySelector('tbody');
    
        tbody.innerHTML = '';
        residentes.forEach(residente => {
            const tr = document.createElement('tr');
            tr.innerHTML = `
                <td>${residente.cedula_residente}</td>
                <td>${residente.nombre_residente}</td>
                <td>${residente.apellido_residente}</td>
                <td>${residente.telefono}</td>
                <td>${residente.direccion}</td>
                <td>
                    <button class="btn btn-edit btn-primary btn-sm" data-id="${residente.id_residente}">Editar</button>
                    <button class="btn btn-eliminar btn-danger btn-sm" data-id="${residente.id_residente}">Eliminar</button>
                </td>
            `;
            tbody.appendChild(tr);
        });
}