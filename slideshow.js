let current_slide = 0;

function showSlide(n) {
    let slides = document.getElementsByClassName("slideshow_img");

    // Wrap around (last → first, first → last)
    if (n >= slides.length) {
        current_slide = 0;
    }
    if (n < 0) {
        current_slide = slides.length - 1;
    }

    // Hide all slides
    for (let i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";
    }

    // Show the current one
    slides[current_slide].style.display = "block";
}

function next() {
    current_slide++;
    showSlide(current_slide);
}

function previous() {
    current_slide--;
    showSlide(current_slide);
}

// Start the slideshow
showSlide(current_slide);