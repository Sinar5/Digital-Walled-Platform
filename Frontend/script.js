function openSection(sectionId) {
const allSections = document.querySelectorAll("section");
allSections.forEach(section => {
      section.style.display = "none";
});

let section = document.getElementById(sectionId);
section.style.display = "block"; 
}

function toggleSettings() {
    const settingsSection = document.getElementById('settings_page');
    if (settingsSection.classList.contains('show')) {
        settingsSection.classList.remove('show');
    } else {
        settingsSection.classList.add('show');
    }
}
