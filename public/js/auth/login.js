import { post } from "../utils/api.js";
import { showMessage } from "../utils/formHelpers.js";

export function singInLogin(){
    const form = document.getElementById("loginForm");

    form.addEventListener("submit", async e =>{
        e.preventDefault();

        const data = {
            username: form.username.value,
            password: form.password.value
        };

        const response = await post('core/routes/api/login.php', data);

        if(response.success){
            location.href = './dashboard';
        }else{
            console.log("No entra")
            showMessage(response.error, 'danger');
        }
    });
}