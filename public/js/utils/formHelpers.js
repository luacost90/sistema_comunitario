export function clearForm(form){
    form.reset();
}

export function showMessage(message, type = 'success'){
    const alertMessage = document.createElement('div');
    const formLogin = document.querySelector('input[name="password"]');

    alertMessage.className = `alert alert-${type}`;
    alertMessage.textContent = message;

    if(formLogin){
        formLogin.parentNode.insertBefore(alertMessage, formLogin.nextSibling);
    }

    setTimeout(() => alertMessage.remove(), 3000);
}