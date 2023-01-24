export async function getDados(coin) {
    let url = "http://localhost:5178/api/Historico/coin/"
    try {
        const response = await fetch(url+coin,{
            method: 'GET',
        });
        const data = await response.json();
        return data;
    } catch(error) {
        console.log(error)
    }
}