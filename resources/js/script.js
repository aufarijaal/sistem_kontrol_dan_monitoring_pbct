import * as helpers from './helpers.js'

const btnOnOffBlender = document.querySelector('.onOffBlender')
const btnStepUpJam = document.getElementById('stepUpJam')
const btnStepUpMenit = document.getElementById('stepUpMenit')
const btnStepDownJam = document.getElementById('stepDownJam')
const btnStepDownMenit = document.getElementById('stepDownMenit')
const textJam = document.getElementById('textJam')
const textMenit = document.getElementById('textMenit')
const inputJam = document.getElementById('timerJam')
const inputMenit = document.getElementById('timerMenit')
const btnSubmitTimer = document.getElementById('btnSubmitTimer')

const server = 'http://127.0.0.1'
const fanOnRoute = `${server}/images/fan-on.svg`

btnSubmitTimer.addEventListener('click', () => {
    btnSubmitTimer.preventDefault()
})
btnOnOffBlender.addEventListener('click', () => {
    btnOnOffBlender.classList.toggle('onOffBlender-on')

    if(btnOnOffBlender.classList.contains('onOffBlender-on')) {
        btnOnOffBlender.style.backgroundImage = `url(${fanOnRoute}) center center no-repeat`;

    }else {
        btnOnOffBlender.style.backgroundImage = `url(${fanOnRoute}) center center no-repeat`;
    }
    helpers.getMachine(machineId)
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
