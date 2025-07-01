import {get} from "../utils/api.js";
import { renderList } from "./renderList.js";

export async function listar() {
   
    try {
        const residentes = await get('core/routes/api/indexResidente.php');
        const residentesData = residentes.data;
        renderList(residentesData);
    } catch (error) {
        console.error('Error al obtener los residentes:', error);
    }
}