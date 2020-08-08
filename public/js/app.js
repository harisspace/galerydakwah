// handle hamburger menu
// wakwaw
const check = document.querySelector('div.hamburger-menu');
const ul = document.querySelector('.nav-list');
const span1 = document.getElementById('span1');
const span2 = document.getElementById('span2');
const span3 = document.getElementById('span3');
const list = document.querySelectorAll('.list');
const images = document.querySelectorAll('[data-src]');
const cards = document.querySelectorAll('a.card');
const covers = document.querySelectorAll('img.cover');


check.addEventListener('click', function () {
    span1.classList.toggle('animate1');
    span2.classList.toggle('animate2');
    span3.classList.toggle('animate3');

    ul.classList.toggle('show');

})

// lazy image
function preloadImage(img) {
    const src = img.getAttribute('data-src');
    img.src = src;
}


let options = [
    root = null,
    threshold = 0
];

let observer = new IntersectionObserver(function (entries, observer) {
    entries.forEach(entry => {
        if (!entry.isIntersecting) {
            return
        } else {
            preloadImage(entry.target)
        }
    })
}, options);


covers.forEach(cover => {
    observer.observe(cover)
})

// appearObserver
function appear(card) {
    card.classList.add('appear')
}


let appearObserver = new IntersectionObserver(function (entries, observer) {
    entries.forEach(entry => {
        if (!entry.isIntersecting) {
            return
        } else {
            appear(entry.target);
            appearObserver.unobserve(entry.target)
        }
    })
}, options);

cards.forEach(card => {
    appearObserver.observe(card)
})


//progressbar
const progressbar = document.querySelector('div.progressbar');
const myprogress = document.querySelector('div.myprogress');
const trackVideo = document.querySelectorAll('span.track-video');
const track = document.querySelector('div.track');
const myprogressCount = document.querySelector('p.myprogress-count')

let dataSession = document.querySelector('input.data-session')
let dataDB = document.querySelector('input.data-db')

if(dataSession !== null && dataDB !== null) {
    if (dataDB.value != 0 && dataSession.value != 0) {
        let progress = Math.floor((dataSession.value / dataDB.value) * 100);
        myprogress.style.width = progress + '%';
        myprogressCount.innerHTML = progress + '%';
    }
}


// modal box
const tambah = document.querySelector('button.tambah');
const closes = document.querySelector('span.close');
const modal = document.querySelector('div.modal');

if (tambah !== null && closes !== null && modal !== null) {
    tambah.addEventListener('click', function () {
        modal.style.display = 'block';
    })

    closes.addEventListener('click', function () {
        modal.style.display = 'none';
    })

    window.addEventListener('click', function (event) {
        if (event.target === modal) {
            modal.style.display = 'none';
        }
    })
}




