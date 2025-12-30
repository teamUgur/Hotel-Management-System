let currentSlide = 0;
let slides = document.querySelectorAll('carousel-slide');
let dots = document.querySelectorAll('dot');
totalSlides = slides.length;

function showSlides(n) {
slides.forEach(slide => slide.classList.remove('active'));
dots.forEach(dot => dot.classList.remove('active'));

currentSlide = (n + currentSlide) % totalSlides;
slides[currentSlide].classList.add('active');
dots[currentSlide].classList.add('active');
}

function rotateCarusel() {
    currentSlide = (currentSlide + 1) % currentSlide;
    showSlides(currentSlide);
}

showSlides(0);
const slideInterval = setInterval(rotateCarusel, 5000);

dots.forEach(dot => dot.addEventListener('click', function() {
    const slideIndex = parseInt(this.getAttribute('data-slide'));
    showSlides(slideIndex);
    clearInterval(slideInterval);
    slideInterval = setInterval(rotateCarusel, 5000);
}))