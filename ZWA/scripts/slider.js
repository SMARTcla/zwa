//slider

let prev = document.getElementById('btn-prev'),
    next = document.getElementById('btn-next'),
    slides = document.querySelectorAll('.slide'),
    icons = document.querySelectorAll('.small'),
    image = document.getElementsByClassName('slide active');

let index = 0;
const activeIcon = n =>  {
    for (icon of icons) {
        icon.classList.remove('active');
    }
    icons[n].classList.add('active');
}

const activeSlide = n => {
    for (slide of slides) {
        slide.classList.remove('active');
    }
    slides[n].classList.add('active');
}

const Current = n => {
    activeSlide(n);
    activeIcon(n);
}

const nextSlide = () => {
    if(index == slides.length-1) {
        index = 0;
        Current(index);
    }
    else {
        index++;
        Current(index);
    }
}

const prevSlide = () => {
    if(index == 0) {
        index = slides.length-1;
        Current(index)
    }
    else {
        index--;
        Current(index)
    }
}

icons.forEach((item, indexIcon) =>
{
    item.addEventListener('click', () =>  {
        index = indexIcon;
        Current(index);
    })
})

next.addEventListener('click', nextSlide);
prev.addEventListener('click', prevSlide);

// горячие клавиши для слайдера

function moveByKey() {
    let flag = false;
    document.onkeydown = function(event) {
        if (event.code == 'AltLeft') flag = true;
        if (event.code == 'KeyN' && flag) {
            nextSlide();
        }
        if (event.code == 'KeyP' && flag) {
            prevSlide();
        }
    }
}

// popup

const popupLinks = document.querySelectorAll('.popup-link');

let unlock = true;

if (popupLinks.length > 0) {
    for ( let i = 0; i < popupLinks.length; i++) {
        const popupLink = popupLinks[i];
        popupLink.addEventListener('click', function (e) {
            const popupName = popupLink.getAttribute('href').replace('#', '');
            const currentPopup = document.getElementById(popupName);
            popupOpen(currentPopup);
            e.preventDefault;
        });
    }
}

const popupCloseIcon = document.querySelectorAll('.close-popup');
if (popupCloseIcon.length > 0) {
    for (let i = 0; i < popupCloseIcon.length; i++) {
        const el = popupCloseIcon[i];
        el.addEventListener('click', function (e) {
            popupClose(el.closest('.popup'));
            e.preventDefault
        });
    }
}

function popupOpen(currentPopup) {
    if (currentPopup && unlock) {
        currentPopup.classList.add('open');
        currentPopup.addEventListener('click', function (e) {
            if (!e.target.closest('.popup_content')){
                popupClose(e.target.closest('.popup'));
            }
        });
    }
}

function popupClose(popupActive) {
    if (unlock) {
        popupActive.classList.remove('open');
    }
}