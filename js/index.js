// const bookBox = document.getElementById('guestdetailpanel');

// openbookbox = () => {
//     bookBox.style.display = "flex";
// }

// closebox = () => {
//     bookBox.style.display = "none";
// }

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