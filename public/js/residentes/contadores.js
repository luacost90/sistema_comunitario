
import {get} from "../utils/api.js";

export async function contar(){
    try {
            const residentes = await get('core/routes/api/contarResidentes.php');
            const residentesData = residentes.data;
            console.log(residentesData);
            const cardsContainer = document.querySelector('.dashboard-cards');
            cardsContainer.innerHTML = ''; // Limpiar contenido previo

            residentesData.forEach(item => {
                const card = document.createElement('div');
                card.className = 'dashboard-card';
                card.innerHTML = `
                    <h3>${item.edad_categoria}</h3>
                    <p>Cantidad: ${item.cantidad}</p>
                `;
                cardsContainer.appendChild(card);
            });
        } catch (error) {
            console.error('Error al obtener los residentes:', error);
        }
}