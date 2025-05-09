window.onload = function() {
    // Hide the roll results initially
    var rollResults = document.getElementsByClassName("rollResults");
    for (var i = 0; i < rollResults.length; i++) {
        rollResults[i].style.display = "none";  // Hide all roll results initially
    }

    // Show roll results after 2 seconds
    setTimeout(function() {
        for (var i = 0; i < rollResults.length; i++) {
            rollResults[i].style.display = "block";  // Show roll results after 2 seconds
        }
    }, 2000);
};