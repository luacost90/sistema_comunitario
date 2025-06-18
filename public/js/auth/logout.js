import { get } from "../utils/api.js";

export function singOutLogin(){
    const btnLogOut = document.getElementById("log-out");

    btnLogOut.addEventListener("click", async () =>{
        // e.preventDefault();

        console.log("Está deslogueando...");

        const response = await get('core/routes/api/logout.php');

        if(response.success){
            location.href = './';
        }
    });
}