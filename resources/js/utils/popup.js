if (!window.popupInitialized) {
    window.popupInitialized = true;

    document.addEventListener('DOMContentLoaded', () => {
        const popup = document.getElementById('popup');
        const closePopup = document.getElementById('closePopup');

        function overlayClickHandler(event) {
            if (event.target === popup) {
                popup.classList.add('hidden');
                popup.removeEventListener('click', overlayClickHandler);
            }
        }

        popup.addEventListener('click', overlayClickHandler);

        if (popup && closePopup) {
            const popupKey = "popupLastShown";
            const developmentMode = false; //. true = altijd tonen, false = normale cookie-check
            const popupDisplayDelay = developmentMode ? 1000 : 15000; // 1 sec in dev, 15 sec normaal
            const oneDayInMilliseconds = 24 * 60 * 60 * 1000;

            // Function to get a cookie value by name
            function getCookie(name) {
                const value = `; ${document.cookie}`;
                const parts = value.split(`; ${name}=`);
                if (parts.length === 2) return parts.pop().split(';').shift();
                return null;
            }

            // Function to set a cookie
            function setCookie(name, value, days) {
                const date = new Date();
                date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
                document.cookie = `${name}=${value}; expires=${date.toUTCString()}; path=/`;
            }

            // Function to check if popup should show
            function shouldShowPopup() {
                const lastShown = getCookie(popupKey);
                if (!lastShown) return true;

                const lastShownTime = new Date(lastShown).getTime();
                const currentTime = new Date().getTime();

                return currentTime - lastShownTime >= oneDayInMilliseconds;
            }

            // Show the popup after delay if conditions are met
            if (developmentMode || shouldShowPopup()) {
                setTimeout(() => {
                    popup.classList.remove('hidden');
                    if (!developmentMode) {
                        setCookie(popupKey, new Date().toISOString(), 1); // Alleen cookies gebruiken als niet in dev
                    }
                }, popupDisplayDelay);
            }

            // Close the popup on button click
            closePopup.addEventListener('click', () => {
                popup.classList.add('hidden');
            });
        }
    });
}