// get machine info about power and temperature
export async function getMachine(machineId) {
    let result = await fetch('http://127.0.0.1/api/machine/info')
        .then( response => {
            response.text()
        })
        .then( data => {
            console.log(data)
        })
        .catch(error => {
            console.log(error)
        })
}

