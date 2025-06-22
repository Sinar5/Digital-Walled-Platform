function openSection(sectionId) {
const allSections = document.querySelectorAll("section");
allSections.forEach(section => {
    section.style.display = "none"; 
});

let section = document.getElementById(sectionId);
section.style.display = "block"; 
}
