let now = new Date();

document.getElementById('date_arraive').min = now.toISOString().split('T')[0];

function departure() {
    let Arrival = document.getElementById('date_arraive').value
    document.getElementById('date_departure').min = Arrival
    setTimeout(Subtraction, 1000);
}

function Subtraction() {
    let departure = document.getElementById('date_departure').value
    let Arrival = document.getElementById('date_arraive').value
    let timeDiff = Date.parse(departure) - Date.parse(Arrival)
    let diffDays = Math.ceil(timeDiff / (1000 * 3600 * 24))


    let cost = document.getElementById('cost').value
    let tags = document.getElementById('p')[0]
    document.getElementById('p').innerHTML = cost + 'x ' + diffDays + ' ночей'
    count.innerHTML = cost * diffDays + 'P'
    counts.innerHTML = cost * diffDays + 'P'
    document.querySelector('.count').value = cost * diffDays
    document.querySelector('.night').value = diffDays
}
