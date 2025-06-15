if (!window.popupInitialized) {
    window.popupInitialized = true;

    document.addEventListener('DOMContentLoaded', () => {
        const popup = document.getElementById('popup');
        const closePopup = document.getElementById('closePopup');

        // const popupContent = popup.querySelector('div.relative'); / select the popup content div by class

        function overlayClickHandler(event) {
            if (event.target === popup) {
                popup.classList.add('hidden');
                popup.removeEventListener('click', overlayClickHandler);
            }
        }

        popup.addEventListener('click', overlayClickHandler);

        if (popup && closePopup) {
            const popupKey = "popupLastShown";
            const popupDisplayDelay = 200; // 2 seconds for development
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
            // if (shouldShowPopup()) {
                setTimeout(() => {
                    popup.classList.remove('hidden');
                    setCookie(popupKey, new Date().toISOString(), 1); // Store for 1 day
                }, popupDisplayDelay);
            // }

            // Close the popup on button click
            closePopup.addEventListener('click', () => {
                popup.classList.add('hidden');
            });
        }
    });
}