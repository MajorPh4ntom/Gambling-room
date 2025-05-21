document.addEventListener("DOMContentLoaded", function () {
    const form = document.getElementById("gambling-form");

    form.addEventListener("submit", function (event) {
        const fullNames = [
            (document.getElementById("fname1").value.trim() + " " + document.getElementById("lname1").value.trim()).toLowerCase(),
            (document.getElementById("fname2").value.trim() + " " + document.getElementById("lname2").value.trim()).toLowerCase(),
            (document.getElementById("fname3").value.trim() + " " + document.getElementById("lname3").value.trim()).toLowerCase()
        ];

        const uniqueNames = new Set(fullNames);

        if (uniqueNames.size < fullNames.length) {
            event.preventDefault();
            Swal.fire({
                position: "bottom-end",
                icon: "error",
                title: "Each player must have a unique full name!",
                showConfirmButton: false,
                timer: 2500,
                background: '#333',
                color: '#fff',
                width: '300px'
            });
        }
    });
});


let timeLeft = 10;

function countdown() {
    const counter = document.getElementById('count-down');
    if (timeLeft <= 0) {
        window.location.href = 'index.php';
    } else {
        counter.textContent = `Returning to main menu in ${timeLeft--}s...`;
        setTimeout(countdown, 1000);
    }
}

window.onload = countdown;