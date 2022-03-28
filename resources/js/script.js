const btnStepUpJam = document.getElementById('stepUpJam')
const btnStepUpMenit = document.getElementById('stepUpMenit')
const btnStepDownJam = document.getElementById('stepDownJam')
const btnStepDownMenit = document.getElementById('stepDownMenit')
const textJam = document.getElementById('textJam')
const textMenit = document.getElementById('textMenit')
const inputJam = document.getElementById('timerJam')
const inputMenit = document.getElementById('timerMenit')
const btnSubmitTimer = document.getElementById('btnSubmitTimer')
const machineid = document.getElementById('machineid').innerText
const stokkasar = document.getElementById('stokKasar')
const stokehalus = document.getElementById('stokHalus')
const btnhalus = document.querySelector('.btnHalus')
const btnkasar = document.querySelector('.btnKasar')
const btnOnOffBlender = document.querySelector('.onOffBlender')
const suhumesin = document.getElementById('suhuMesin')
const max = document.querySelector('h3#max')
const min = document.querySelector('h3#min')
const avg = document.querySelector('h3#avg')
const filter = document.getElementById('filterWaktuStatistik')

const server = 'http://127.0.0.1'
const fanOnRoute = `${server}/images/fan-on.svg`

if(document.querySelector('h1#halaman').innerText == 'Kontrol') {
    btnSubmitTimer.addEventListener('click', () => {
        btnSubmitTimer.preventDefault()
    })
    btnStepUpJam.addEventListener('mousedown', () => {
        inputJam.stepUp()
        textJam.innerText = inputJam.value
    })
    btnStepDownJam.addEventListener('click', () => {
        inputJam.stepDown()
        textJam.innerText = inputJam.value
    })
    btnStepUpMenit.addEventListener('click', () => {
        inputMenit.stepUp()
        textMenit.innerText = inputMenit.value
    })
    btnStepDownMenit.addEventListener('click', () => {
        inputMenit.stepDown()
        textMenit.innerText = inputMenit.value
    })
    btnOnOffBlender.addEventListener('click', () => {
        fetch(`${window.location.origin}/api/setmachinepower`, {
            method: 'POST',
            headers: {'Content-Type': 'application/json'},
            body: JSON.stringify({
                machineid: machineid,
                state: btnOnOffBlender.classList.contains('onOffBlender-on') ? false : true
            })
        }).then(response => response.status == 204 ? console.log('on off mesin berhasil') : console.log('gagal'))

        return false
    })
    btnhalus.addEventListener('click', () => {
        if(!btnhalus.classList.contains('border-blue') && !btnOnOffBlender.classList.contains('onOffBlender-on')) {
            fetch(`${window.location.origin}/api/sethaluskasar`, {
                method: 'POST',
                headers: {'Content-Type': 'application/json'},
                body: JSON.stringify({
                    machineid: machineid,
                    ishalus: true
                })
            }).then(response => response.status == 204 ? console.log('sekarang halus') : console.log('gagal'))

            return false
        }
    })
    btnkasar.addEventListener('click', () => {
        if(!btnkasar.classList.contains('border-blue') && !btnOnOffBlender.classList.contains('onOffBlender-on')) {
            fetch(`${window.location.origin}/api/sethaluskasar`, {
                method: 'POST',
                headers: {'Content-Type': 'application/json'},
                body: JSON.stringify({
                    machineid: machineid,
                    ishalus: false
                })
            }).then(response => response.status == 204 ? console.log('sekarang kasar') : console.log('gagal'))

            return false
        }
    })
}else if(document.querySelector('h1#halaman').innerText == 'Statistik Produksi') {
    filter.addEventListener('change', () => {
        getStat()
    })
}

function getMachineInfo() {
    fetch(`${window.location.origin}/api/getmachineinfo?machineid=${machineid}`)
    .then(response => {return response.json()})
    .then(data => {

        suhumesin.innerText = data.temperature + '\u00B0' + ' C'
        stokehalus.innerText = data.stockhalus + ' Kg'
        stokkasar.innerText = data.stockkasar + ' Kg'

        if(data.isactive) {
            btnOnOffBlender.classList.add('onOffBlender-on')
        }else if(!data.isactive) {
            btnOnOffBlender.classList.remove('onOffBlender-on')
        }

        if(data.ishalus) {
            btnkasar.classList.remove('border-blue')
            btnhalus.classList.add('border-blue')
        }else if(!data.ishalus) {
            btnhalus.classList.remove('border-blue')
            btnkasar.classList.add('border-blue')
        }
    })
    .catch(err => {
        suhumesin.innerText = 'error'
        stokehalus.innerText = 'error'
        stokkasar.innerText = 'error'

        console.log(err)
    })
    return false
}

function getStat() {
    fetch(`${window.location.origin}/api/getstat?option=${filter.value}`)
    .then(response => {return response.json()})
    .then(data => {
        data.forEach(element => {
            console.log(element.weightkasar)
        });
        max.innerText = Math.max(...data.map(o => o.weightkasar), 0);
        min.innerText = 'OK'
        avg.innerText = 'OK'
    })
    .catch(err => {
        max.innerText = 'Error'
        min.innerText = 'Error'
        avg.innerText = 'Error'
    })
    return false
}

document.addEventListener('DOMContentLoaded', () => {
    if(document.querySelector('h1#halaman').innerText == 'Kontrol') {
        setInterval(() => {
            getMachineInfo()
            console.log('getMachineInfo() sedang berjalan')
        }, 3000);
    }else if(document.querySelector('h1#halaman').innerText == 'Statistik Produksi') {
        getStat()
    }
})
