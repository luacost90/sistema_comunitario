

export function editar(){
    document.addEventListener("click", async e =>{
        if(e.target.classList.contains("btn-edit")){
            let id = e.target.dataset.id;
            
            try {
                const residentes = await post('ore/routes/api/updateResidente.php');
            } catch (error) {
                
            }
        }
    });
    // document.querySelectorAll(".btn").forEach( btn =>{
    //     btn.addEventListener("click", e =>{
    //         console.log("Ha dado click en " + e.target.dataset.id);
    //     })
    // })
}