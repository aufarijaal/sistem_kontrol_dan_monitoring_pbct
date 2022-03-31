const btnStepUpJam = document.getElementById("stepUpJam");
const btnStepUpMenit = document.getElementById("stepUpMenit");
const btnStepDownJam = document.getElementById("stepDownJam");
const btnStepDownMenit = document.getElementById("stepDownMenit");
const textJam = document.getElementById("textJam");
const textMenit = document.getElementById("textMenit");
const inputJam = document.getElementById("timerJam");
const inputMenit = document.getElementById("timerMenit");
const btnSubmitTimer = document.getElementById("btnSubmitTimer");
const machineid = document.getElementById("machineid");
const stokkasar = document.getElementById("stokKasar");
const stokehalus = document.getElementById("stokHalus");
const btnhalus = document.querySelector(".btnHalus");
const btnkasar = document.querySelector(".btnKasar");
const btnOnOffBlender = document.querySelector(".onOffBlender");
const suhumesin = document.getElementById("suhuMesin");
const max = document.querySelector("h3#max");
const min = document.querySelector("h3#min");
const avg = document.querySelector("h3#avg");
const filter = document.getElementById("filterWaktuStatistik");
const filterHalusKasar = document.getElementById("filterHalusKasar");
let ctx = document.getElementById("chartStat");

const server = "http://127.0.0.1";
const fanOnRoute = `${server}/images/fan-on.svg`;

if (document.querySelector("h1#halaman").innerText == "Kontrol") {
    btnSubmitTimer.addEventListener("click", () => {
        btnSubmitTimer.preventDefault();
    });
    btnStepUpJam.addEventListener("mousedown", () => {
        inputJam.stepUp();
        textJam.innerText = inputJam.value;
    });
    btnStepDownJam.addEventListener("click", () => {
        inputJam.stepDown();
        textJam.innerText = inputJam.value;
    });
    btnStepUpMenit.addEventListener("click", () => {
        inputMenit.stepUp();
        textMenit.innerText = inputMenit.value;
    });
    btnStepDownMenit.addEventListener("click", () => {
        inputMenit.stepDown();
        textMenit.innerText = inputMenit.value;
    });
    btnOnOffBlender.addEventListener("click", () => {
        fetch(`${window.location.origin}/api/setmachinepower`, {
            method: "POST",
            headers: { "Content-Type": "application/json" },
            body: JSON.stringify({
                machineid: machineid.innerText,
                state: btnOnOffBlender.classList.contains("onOffBlender-on")
                    ? false
                    : true,
            }),
        }).then((response) =>
            response.status == 204
                ? console.log("on off mesin berhasil")
                : console.log("gagal")
        );

        return false;
    });
    btnhalus.addEventListener("click", () => {
        if (
            !btnhalus.classList.contains("border-blue") &&
            !btnOnOffBlender.classList.contains("onOffBlender-on")
        ) {
            fetch(`${window.location.origin}/api/sethaluskasar`, {
                method: "POST",
                headers: { "Content-Type": "application/json" },
                body: JSON.stringify({
                    machineid: machineid.innerText,
                    ishalus: true,
                }),
            }).then((response) =>
                response.status == 204
                    ? console.log("sekarang halus")
                    : console.log("gagal")
            );

            return false;
        }
    });
    btnkasar.addEventListener("click", () => {
        if (
            !btnkasar.classList.contains("border-blue") &&
            !btnOnOffBlender.classList.contains("onOffBlender-on")
        ) {
            fetch(`${window.location.origin}/api/sethaluskasar`, {
                method: "POST",
                headers: { "Content-Type": "application/json" },
                body: JSON.stringify({
                    machineid: machineid.innerText,
                    ishalus: false,
                }),
            }).then((response) =>
                response.status == 204
                    ? console.log("sekarang kasar")
                    : console.log("gagal")
            );

            return false;
        }
    });
} else if(document.querySelector('h1#halaman').innerText == 'Statistik Produksi') {
    [filter, filterHalusKasar].forEach((e) => {
        e.addEventListener("change", () => {
            document.querySelector(".canvasWrapper").innerHTML = "";
            let canvasEl = document.createElement("canvas");
            canvasEl.className = "bg-white p-1 rounded-3 shadow";
            canvasEl.id = "chartStat";
            canvasEl.setAttribute(
                "style",
                "border-radius: 100px; min-width: 260px; min-height: 130px; max-width: 900px; max-height: 500px;"
            );
            document.querySelector(".canvasWrapper").appendChild(canvasEl);
            setChart();
        });
    });
}

function getMachineInfo() {
    fetch(`${window.location.origin}/api/getmachineinfo?machineid=${machineid.innerText}`)
        .then((response) => {
            return response.json();
        })
        .then((data) => {
            suhumesin.innerText = data.temperature + "\u00B0" + " C";
            stokehalus.innerText = data.stockhalus + " Kg";
            stokkasar.innerText = data.stockkasar + " Kg";

            if (data.isactive) {
                btnOnOffBlender.classList.add("onOffBlender-on");
            } else if (!data.isactive) {
                btnOnOffBlender.classList.remove("onOffBlender-on");
            }

            if (data.ishalus) {
                btnkasar.classList.remove("border-blue");
                btnhalus.classList.add("border-blue");
            } else if (!data.ishalus) {
                btnhalus.classList.remove("border-blue");
                btnkasar.classList.add("border-blue");
            }
        })
        .catch((err) => {
            suhumesin.innerText = "error";
            stokehalus.innerText = "error";
            stokkasar.innerText = "error";

            console.log(err);
        });
    return false;
}
async function getStat() {
    let response = await fetch(
        `${window.location.origin}/api/getstat?option=${filter.value}&machineid=${machineid.innerText}&bubuk=${filterHalusKasar.value}`
    );
    let data = await response.json();
    return data;
}
let chart = undefined;
async function setChart() {
    let datas = await getStat();

    const labels =
        filter.value == "harian"
            ? datas.map((e) => e.created_at.split(" ")[1].substring(0, 5))
            : datas.map((e) => e.created_at.split(" ")[0].substring(5).replace('-', '/'));
    const data = {
        labels: labels,
        datasets: [
            {
                backgroundColor:
                    filterHalusKasar.value == "kasar"
                        ? "rgba(54, 162, 235, 0.2)"
                        : "rgba(255, 159, 64, 0.2)",
                borderColor:
                    filterHalusKasar.value == "kasar"
                        ? "rgba(54, 162, 235, 1)"
                        : "rgba(255, 159, 64, 1)",
                data: datas.map((e) => e.weightkasar ?? e.weighthalus),
            },
        ],
    };
    const config = {
        type: "line",
        data: data,
        options: {
            plugins: {
                legend: {
                    display: false
                }
            }
        },
    };
    const statistik = new Chart(document.getElementById("chartStat"), config);
}

document.addEventListener("DOMContentLoaded", () => {
    if (document.querySelector("h1#halaman").innerText == "Kontrol") {
        setInterval(() => {
            getMachineInfo();
            console.log("getMachineInfo() sedang berjalan");
        }, 3000);
    } else if (
        document.querySelector("h1#halaman").innerText == "Statistik Produksi"
    ) {
        setChart();
    }
});
