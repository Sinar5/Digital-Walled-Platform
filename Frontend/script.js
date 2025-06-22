function toggleSettings() {
    const settings = document.getElementById("settings_page");
    if (settings.style.display == "block") {
        settings.style.display = "none";
    }else{
        settings.style.display = "block";
    }
}

function toggleUpdateProfile(){
    const settings = document.getElementById("settings_page");
    if (settings.style.display == "block") {
        settings.style.display = "none";
    }


    const updateProfile = document.getElementById("update_profile");
    if (updateProfile.style.display == "block") {
        updateProfile.style.display = "none";
    }else{
        updateProfile.style.display = "block";
    }
}

function toggleLogout() {

    const settings = document.getElementById("settings_page");
    if (settings.style.display == "block") {
        settings.style.display = "none";
    }

    const logout = document.getElementById("logout_page");
    if (logout.style.display == "block") {
        logout.style.display = "none";
    }else{
        logout.style.display = "block";
    }
}