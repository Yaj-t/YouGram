function toggleProfileEdit() {

    var overlay = document.createElement("div");
    overlay.classList.add("dark-overlay");
    document.body.appendChild(overlay);

    document.getElementById("editProfileContainer").style.display = "block";
    document.body.style.overflow = "hidden"; // Disable scrolling on the page

}

function cancelEdit() {
    var overlay = document.querySelector(".dark-overlay");
    if (overlay) {
        overlay.parentNode.removeChild(overlay);
    }

    document.getElementById("editProfileContainer").style.display = "none";
    document.body.style.overflow = "auto"; // Enable scrolling on the page
    document.body.style.backgroundColor = "transparent"; // Reset the background color
}

function toggleProfileEdit2() {

    var overlay = document.createElement("div");
    overlay.classList.add("dark-overlay");
    document.body.appendChild(overlay);

    document.getElementById("editProfileContainer2").style.display = "block";
    document.body.style.overflow = "hidden"; // Disable scrolling on the page

}

function cancelEdit2() {
    var overlay = document.querySelector(".dark-overlay");
    if (overlay) {
        overlay.parentNode.removeChild(overlay);
    }

    document.getElementById("editProfileContainer2").style.display = "none";
    document.body.style.overflow = "auto"; // Enable scrolling on the page
    document.body.style.backgroundColor = "transparent"; // Reset the background color
}