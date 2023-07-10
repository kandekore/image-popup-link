document.addEventListener("DOMContentLoaded", function() {
    let images = document.querySelectorAll('.ipd-image');
    images.forEach(function(img) {
        img.addEventListener('click', function() {
            let select = this.nextSibling;
            if (select.style.display === "none") {
                select.style.display = "block";
            } else {
                select.style.display = "none";
            }
        });
    });
});

document.getElementById("closeBtn").addEventListener("click", function() {
    document.getElementById("popup").style.display = "none";
  });