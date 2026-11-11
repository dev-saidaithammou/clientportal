function validateForm() {
    const name = document.getElementById('name').value.trim();
    const email = document.getElementById('email').value.trim();
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

    if (name === "") {
        alert("Le nom du client est requis.");
        return false;
    }

    if (!emailRegex.test(email)) {
        alert("Veuillez saisir une adresse email valide.");
        return false;
    }

    return true;
}