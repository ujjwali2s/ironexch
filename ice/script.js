if (localStorage.getItem("websiteDeleted")) {
    document.getElementById("delte").innerHTML = "Page not found";
}

// Add an event listener to the delete button
document.getElementById("deleteBtn").addEventListener("click", function() {
    if (confirm("Are you sure you want to delete this website? If You Delete This You Can't Recover")) {
        // Set flag in localStorage to indicate that the website has been deleted
        localStorage.setItem("websiteDeleted", "true");
        // Display "page not found" message
        document.getElementById("delte").innerHTML = "Page not found";
        // Redirect to index.html
        window.location.href = "/";
    }
});
