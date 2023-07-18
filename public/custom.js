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

function toggleUpload() {

    var overlay = document.createElement("div");
    overlay.classList.add("dark-overlay");
    document.body.appendChild(overlay);

    document.getElementById("Upload").style.display = "block";
    document.body.style.overflow = "hidden"; // Disable scrolling on the page

}

function cancelUpload() {
    var overlay = document.querySelector(".dark-overlay");
    if (overlay) {
        overlay.parentNode.removeChild(overlay);
    }

    document.getElementById("Upload").style.display = "none";
    document.body.style.overflow = "auto"; // Enable scrolling on the page
    document.body.style.backgroundColor = "transparent"; // Reset the background color
}

function disableButton() {
    // Disable the button
    var button = document.getElementsByName("uploadVideo")[0];
    button.disabled = true;
    
    // Change the button text
    button.innerHTML = "Uploading...";
}