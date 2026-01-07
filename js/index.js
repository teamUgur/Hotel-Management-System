// For roombook:

const bookBox = document.getElementById('guestdetailpanel');
const bookBtns = document.querySelectorAll(".bookbtn");
const closeBtn = document.getElementById("closeBtn");

bookBtns.forEach(button => {
    button.addEventListener("click", () => {
        bookBox.style.display = "flex";
    })
})

closeBtn.addEventListener("click", function() {
    bookBox.style.display = "none";
})

bookBox.addEventListener("click", function(event) {
    if (event.target === bookBox) {
        bookBox.style.display = "none";
    }
})

// For responsive design:

const menu = document.getElementById("menu");
const navBar = document.getElementById("nav-bar");

const linkOne = document.getElementById("link-1");
const linkTwo = document.getElementById("link-2");
const linkThree = document.getElementById("link-3");
const linkFour = document.getElementById("link-4");

menu.addEventListener("click", function() {
    if (navBar.style.display === "none") {
        navBar.style.display = "block";
    } else {
        navBar.style.display = "none";
    }
})

linkOne.addEventListener('click', function() {
    navBar.style.display = "none";
})

linkTwo.addEventListener('click', function() {
    navBar.style.display = "none";
})

linkThree.addEventListener('click', function() {
    navBar.style.display = "none";
})

linkFour.addEventListener('click', function() {
    navBar.style.display = "none";
})

