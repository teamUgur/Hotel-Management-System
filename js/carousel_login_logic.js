// Carousel LOGIC! 

const slides = document.querySelectorAll(".carousel-slide");
const indicators = document.querySelectorAll(".carousel-indicator");
const nextBtn = document.getElementById("nextBtn");
const prevBtn = document.getElementById("prevBtn");

let currentIndex = 0;
let setAutoTimer;

function updateCarousel(index) {
    document.querySelector(".carousel-slide.active").classList.remove("active");
    document.querySelector(".carousel-indicator.current-slide").classList.remove("current-slide");

    slides[index].classList.add("active");
    indicators[index].classList.add("current-slide");

    currentIndex = index;
    resetTimer();
}

function resetTimer() {
    clearInterval(setAutoTimer);
    setAutoTimer = setInterval(nextSlideLogic, 5000);
}

function nextSlideLogic() {
    let nextPoint = ((currentIndex + 1) % slides.length);
    updateCarousel(nextPoint);
}

nextBtn.addEventListener("click", nextSlideLogic)

prevBtn.addEventListener("click", () => {
    let prevPoint = (currentIndex - 1 + slides.length) % slides.length;
    updateCarousel(prevPoint);
});

indicators.forEach((dot, index) => {
    dot.addEventListener("click", () => {
        updateCarousel(index);
    })
})

resetTimer();

// Login LOGIC! 

const userBtn = document.getElementById("userBtn");
const staffBtn = document.getElementById("staffBtn");
const userForm = document.getElementById("userForm");
const staffForm = document.getElementById("staffForm");

function changeState(toShowForm, toHideForm, toShowBtn, toHideBtn) {
    toShowForm.classList.remove("hidden");
    toHideForm.classList.add("hidden");
    
    toShowBtn.classList.add("active");
    toHideBtn.classList.remove("active");
}

userBtn.addEventListener("click", function() {
    changeState(userForm, staffForm, userBtn, staffBtn);
})

staffBtn.addEventListener("click", function() {
    changeState(staffForm, userForm, staffBtn, userBtn);
})

// const login = document.getElementById("login");
// const signup = document.getElementById("signup");

// signupPage = () => {
//     login.style.display = 'none';
//     signup.style.display = 'flex';
// }

// loginPage = () => {
//     login.style.display = 'flex';
//     signup.style.display = 'none';
// }

// const btns = querySelectorAll(".changeBtn ");
// const auth = querySelectorAll(".authsection");

// function changeActive(index) {

//     btns.forEach((btn) => {
//         btn.classList.remove("active");
//     })

//     auth.forEach((slide) => {
//         slide.classList.remove("active");
//     })

//     btns[index].classList.add("active");
//     auth[index].classList.add("active");
// }

// btns.forEach((btn, i) => {
//     btn.addEventListener("click", function() {
//         changeActive(i);
//     })
// })

// Signup LOGIC! 