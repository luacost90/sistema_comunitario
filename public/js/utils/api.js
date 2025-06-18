export async function get(url){
    const response = await fetch(url);
    return await response.json();
}

export async function post(url, data){
    const response = await fetch(url,{
        method: 'POST',
        headers: {'Content-Type': 'application/json'},
        body: JSON.stringify(data)
    });

    return await response.json();
    
}