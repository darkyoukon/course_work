var rotated = false;

function dropdown() {
    var show = rotated ? 'none' : 'flex';
    document.getElementById("catalog_small_dpi_dropdown").style.display = show;
    document.getElementById("catalog_small_dpi_dropdown").classList.toggle('catalog_animate');
    var deg = rotated ? 0 : 180;
    document.getElementById("catalog_variants").style.transform = 'rotate('+deg+'deg)';
    rotated = !rotated;
}

// Close the dropdown if the user clicks outside of it
window.onclick = function(event) {
    if (!event.target.matches('.dropbtn')) {
        const dropdowns = document.getElementsByClassName("dropdown-content");
        let i;
        for (i = 0; i < dropdowns.length; i++) {
            const openDropdown = dropdowns[i];
            if (openDropdown.classList.contains('show')) {
                openDropdown.classList.remove('show');
            }
        }
    }
};
