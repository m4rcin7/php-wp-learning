function validateForm(form) {
    let name = form.name.value.trim();
    let email = form.email.value.trim();
    if (name.length < 2) {
        alert("Name must be at least 2 characters long.");
        return false;
    }
    if (!/^\S+@\S+\.\S+$/.test(email)) {
        alert("Please enter a valid email.");
        return false;
    }
    return true;
}
