let photo1 = document.getElementById('photo1')
let photo2 = document.getElementById('photo2')
let photo3 = document.getElementById('photo3')
let photo4 = document.getElementById('photo4')
let photo5 = document.getElementById('photo5')
photo1.addEventListener('click', () => {
    if (photo1.style.background === 'rgb(217, 217, 217)') {
        photo1.style.background = 'rgb(66, 69, 48)'

        photo2.style.background = 'rgb(217, 217, 217)'
        photo3.style.background = 'rgb(217, 217, 217)'
        photo4.style.background = 'rgb(217, 217, 217)'
        photo5.style.background = 'rgb(217, 217, 217)'
        document.getElementById('img1').style.display='block'
        document.getElementById('img2').style.display='none'
        document.getElementById('img3').style.display='none'
        document.getElementById('img4').style.display='none'
        document.getElementById('img5').style.display='none'

    }
});

photo2.addEventListener('click', () => {
    if (photo2.style.background === 'rgb(217, 217, 217)') {
        photo2.style.background = 'rgb(66, 69, 48)'

        photo1.style.background = 'rgb(217, 217, 217)'
        photo3.style.background = 'rgb(217, 217, 217)'
        photo4.style.background = 'rgb(217, 217, 217)'
        photo5.style.background = 'rgb(217, 217, 217)'
        document.getElementById('img1').style.display='none'
        document.getElementById('img2').style.display='block'
        document.getElementById('img3').style.display='none'
        document.getElementById('img4').style.display='none'
        document.getElementById('img5').style.display='none'

    }
});

photo3.addEventListener('click', () => {
    if (photo3.style.background === 'rgb(217, 217, 217)') {
        photo3.style.background = 'rgb(66, 69, 48)'

        photo1.style.background = 'rgb(217, 217, 217)'
        photo2.style.background = 'rgb(217, 217, 217)'
        photo4.style.background = 'rgb(217, 217, 217)'
        photo5.style.background = 'rgb(217, 217, 217)'
        document.getElementById('img1').style.display='none'
        document.getElementById('img2').style.display='none'
        document.getElementById('img3').style.display='block'
        document.getElementById('img4').style.display='none'
        document.getElementById('img5').style.display='none'

    }
});
photo4.addEventListener('click', () => {
    if (photo4.style.background === 'rgb(217, 217, 217)') {
        photo4.style.background = 'rgb(66, 69, 48)'

        photo1.style.background = 'rgb(217, 217, 217)'
        photo2.style.background = 'rgb(217, 217, 217)'
        photo3.style.background = 'rgb(217, 217, 217)'
        photo5.style.background = 'rgb(217, 217, 217)'
        document.getElementById('img1').style.display='none'
        document.getElementById('img2').style.display='none'
        document.getElementById('img3').style.display='none'
        document.getElementById('img4').style.display='block'
        document.getElementById('img5').style.display='none'

    }
});
photo5.addEventListener('click', () => {
    if (photo5.style.background === 'rgb(217, 217, 217)') {
        photo5.style.background = 'rgb(66, 69, 48)'

        photo1.style.background = 'rgb(217, 217, 217)'
        photo3.style.background = 'rgb(217, 217, 217)'
        photo4.style.background = 'rgb(217, 217, 217)'
        photo2.style.background = 'rgb(217, 217, 217)'
        document.getElementById('img1').style.display='none'
        document.getElementById('img2').style.display='none'
        document.getElementById('img3').style.display='none'
        document.getElementById('img4').style.display='none'
        document.getElementById('img5').style.display='block'

    }
});
