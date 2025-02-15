import CryptoJS from 'crypto-js';

// Secret key for encryption and decryption
const SECRET_KEY = "@Bloom2024";

// Set a cookie with an encrypted value
export function setCookie(name, value, days) {
    const encryptedValue = CryptoJS.AES.encrypt(value, SECRET_KEY).toString();
    const d = new Date();
    d.setTime(d.getTime() + days * 24 * 60 * 60 * 1000); // Set expiry time
    const expires = "expires=" + d.toUTCString();
    document.cookie = `${name}=${encryptedValue};${expires};path=/`;
}

// Get the decrypted value of a cookie by name
export function getCookie(name) {
    const nameEq = name + "=";
    const ca = document.cookie.split(';');
    for (let i = 0; i < ca.length; i++) {
        let c = ca[i].trim();
        if (c.indexOf(nameEq) === 0) {
            const encryptedValue = c.substring(nameEq.length, c.length);
            try {
                const bytes = CryptoJS.AES.decrypt(encryptedValue, SECRET_KEY);
                return bytes.toString(CryptoJS.enc.Utf8);
            } catch (error) {
                console.error("Error decrypting cookie:", error);
                return null;
            }
        }
    }
    return null;
}