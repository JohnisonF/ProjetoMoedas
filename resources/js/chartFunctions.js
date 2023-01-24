import { getDados } from './requests.js'

export async function chartFunctions() {
    let cards = document.getElementsByClassName("card-moedas");
    for(let i = 0; i < cards.length; i++) {
        cards[i].addEventListener("click", async function(e){
            let idCard = cards[i].getAttribute('data-moeda');
            let dados = await getDados(idCard)
            let nameCoin = cards[i].getElementsByClassName('tipo-moeda')[0].innerHTML;
            let color = cards[i].children[0].children[0].style.backgroundColor

            if(dados) {
                myChart.destroy();
                myChart = new Chart(cnv, {
                    type: 'line',
                    data: {
                        labels: dados.map(r => new Date(r.date).toLocaleDateString('pt-BR')),
                        datasets: [
                            {
                                label: 'Valor da moeda',
                                data: dados.map(r => r.value),
                                showLines: false,
                                pointStyle: false,
                                backgroundColor: color,
                                borderColor: color,
                                borderWidth: 3,
                                tension: 0.4,
                                drawActiveElementsOnTop: false,
    
                            }
                        ]
                    },
                    options: {
                        plugins: {
                            title: {
                                display: true,
                                text: nameCoin
                            },
                            legend: {
                                display: false
                            }
                        },
                        scales: {
                            y: {
                                ticks: {
                                    color: '#B1B1B1',
                                    maxTicksLimit: 5,
                                    callback: function(v) {
                                        return "$"+v
                                    },
                                    font: {
                                        family: 'lato',
                                        weight: 'bolder',
                                        size: 11,
                                    }
                                },
                                beginAtZero: true,
                                gridLines: {
                                    display: false
                                },
                                grid: {
                                    color: '#00000000' 
                                }
                            },
                            x: {
                                ticks: {
                                    color: '#B1B1B1',
                                    maxTicksLimit: 4,
                                    font: {
                                        family: 'lato',
                                        weight: 'bolder',
                                        size: 11,
                                    }
                                },
                                gridLines: {
                                    display: false
                                },
                                grid: {
                                    color: '#00000000' 
                                }
                            }
                        }
                    }
                })
            }
            
        })
    }

    let cnv = document.getElementById("chart")
    const idFirstCoin = cards[0].getAttribute('data-moeda')
    const data = await getDados(idFirstCoin)
    let nameFirstCoin = cards[0].getElementsByClassName('tipo-moeda')[0].innerHTML
    let colorFirstCoin = cards[0].children[0].children[0].style.backgroundColor
    let myChart = new Chart(cnv, {
        type: 'line',
        data: {
            labels: data.map(r => new Date(r.date).toLocaleDateString('pt-BR')),
            datasets: [
                {
                    data: data.map(r => r.value),
                    showLines: false,
                    pointStyle: false,
                    backgroundColor: colorFirstCoin,
                    borderColor: colorFirstCoin,
                    borderWidth: 3,
                    tension: 0.4,
                    drawActiveElementsOnTop: false,

                }
            ]
        },
        options: {
            plugins: {
                title: {
                    display: true,
                    text: nameFirstCoin
                },
                legend: {
                    display: false
                }
            },
            scales: {
                y: {
                    ticks: {
                        color: '#B1B1B1',
                        maxTicksLimit: 5,
                        callback: function(v) {
                            return "$"+v
                        },
                        font: {
                            family: 'lato',
                            weight: 'bolder',
                            size: 11,
                        }
                    },
                    beginAtZero: true,
                    gridLines: {
                        display: false
                    },
                    grid: {
                        color: '#00000000' 
                    }
                },
                x: {
                    ticks: {
                        color: '#B1B1B1',
                        maxTicksLimit: 4,
                        font: {
                            family: 'lato',
                            weight: 'bolder',
                            size: 11,
                        }
                    },
                    gridLines: {
                        display: false
                    },
                    grid: {
                        color: '#00000000' 
                    }
                }
            }
        }
    });
}