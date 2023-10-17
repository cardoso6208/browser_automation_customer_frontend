window.isStrongPassword = function(password = "") {
    // Check for minimum length of 8 characters
    if (password.length < 8) {
        return "Password must be at least 8 characters long.";
    }

    // Check for at least one uppercase letter
    if (!/[A-Z]/.test(password)) {
        return "Password must contain at least one uppercase.";
    }
    
    // Check for at least one lowercase letter
    if (!/[a-z]/.test(password)) {
        return "Password must contain at least one lowercase.";
    }
    
    // Check for at least one symbol
    if (!/[!@#$%^&*()_+{}\[\]:;<>,.?~\-]/.test(password)) {
        return "Password must contain at least one symbol.";
    }
    
    // Check for at least one number
    if (!/[0-9]/.test(password)) {
        return "Password must contain at least one number.";
    }
    
    return "";
}