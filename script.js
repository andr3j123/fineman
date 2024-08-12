// Checks if DOM is loaded and will execute function that changes text on hover.

document.addEventListener("DOMContentLoaded", () => {

    const logOut = document.getElementById("userName");
    const logOutText = document.getElementById("userName").innerHTML;

    logOut.addEventListener("mouseover", (event) => {
        event.target.innerHTML = "Log Out?";
    });
    logOut.addEventListener("mouseout", (event) => {
        event.target.innerHTML = logOutText;
    });

})

// Some functions that will redirect user to some pages.

function redToCreate(){
    window.location.href = "./createCollection.php";
}
function redToDash(){
    window.location.href = './dashboard.php'
}