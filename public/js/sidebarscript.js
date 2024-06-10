const hamBurger = document.querySelector(".toggle-btn");

hamBurger.addEventListener("click", function () {
    document.querySelector("#sidebar").classList.toggle("expand");
});

function toggleDropdown(item) {
    item.classList.toggle("active");
    const submenu = item.querySelector(".sidebar-dropdown");
    submenu.style.display =
        submenu.style.display === "block" ? "none" : "block";
}

document.addEventListener("DOMContentLoaded", function () {
    const dropdownItems = document.querySelectorAll(".has-dropdown");

    dropdownItems.forEach((item) => {
        item.addEventListener("click", function (event) {
            event.preventDefault();
            toggleDropdown(this);
        });
    });
});

document.addEventListener("DOMContentLoaded", function () {
    const dropdownItems = document.querySelectorAll(".has-dropdown");

    dropdownItems.forEach((item) => {
        item.addEventListener("click", function (event) {
            // Check if the clicked element is the main link (not a submenu link)
            if (event.target === this) {
                event.preventDefault();
                toggleDropdown(this); 
            }
        });
    });

    // Add click event listener to submenu links
    const submenuLinks = document.querySelectorAll(".sidebar-dropdown a");

    submenuLinks.forEach((link) => {
        link.addEventListener("click", function (event) {
            const url = this.getAttribute("href");
            window.location.href = url; // Navigate to the clicked link's URL
        });
    });
});

function toggleDropdown(item) {
    item.classList.toggle("active");
    const submenu = item.querySelector(".sidebar-dropdown");
    submenu.style.display = submenu.style.display === "block" ? "none" : "block";
}