<div role="dialog" aria-live="polite" aria-label="cookieconsent" aria-describedby="cookieconsent:desc" class="cc-window cc-banner cc-type-info cc-theme-classic cc-bottom cc-color-override-804788623" style="background: black;">
    <span id="cookieconsent:desc" class="cc-message" style="font-size: 15px;">
        We use cookies to enhance your experience on Soccer Spotlight. Cookies help us analyze site traffic and provide personalized content. By continuing to use our site, you consent to our use of cookies.
    </span>
    <div class="cc-compliance">
        <button aria-label="dismiss" role="button" tabindex="0" class="cookie message js-cookie-consent-agree cookie-consent__agree cursor-pointer flex items-center justify-center px-4 py-2 rounded-md text-sm font-medium text-yellow-800 bg-yellow-400 hover:bg-yellow-300 cc-btn cc-dismiss">
            Accept Cookies
        </button>
    </div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const consentBanner = document.querySelector('.cc-window');
        const acceptButton = document.querySelector('.js-cookie-consent-agree');

        acceptButton.addEventListener('click', function() {
            consentBanner.style.display = 'none';
        });
    });

    acceptButton.addEventListener('click', function() {
        consentBanner.style.display = 'none';
        // Add additional actions here, such as loading Google Analytics
    });
</script>
