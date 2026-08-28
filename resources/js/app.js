document.addEventListener('DOMContentLoaded', () => {

    /*
    |--------------------------------------------------------------------------
    | Profile Picture Preview
    |--------------------------------------------------------------------------
    */

    const profileInput = document.getElementById('profile_picture');
    const previewImage = document.getElementById('profilePreviewImage');
    const placeholder = document.getElementById('profilePlaceholder');
    const fileName = document.getElementById('fileName');

    if (
        profileInput &&
        previewImage &&
        placeholder
    ) {
        profileInput.addEventListener('change', function () {

            const file = this.files[0];

            if (!file) {
                return;
            }

            if (fileName) {
                fileName.textContent = file.name;
            }

            const reader = new FileReader();

            reader.onload = function (event) {
                previewImage.src = event.target.result;

                previewImage.hidden = false;
                placeholder.hidden = true;
            };

            reader.readAsDataURL(file);
        });
    }


    /*
    |--------------------------------------------------------------------------
    | Mobile Number
    |--------------------------------------------------------------------------
    */

    const mobileInput = document.getElementById('mobile_number');

    if (mobileInput) {
        mobileInput.addEventListener('input', function () {
            this.value = this.value.replace(/\D/g, '');
        });
    }


    /*
    |--------------------------------------------------------------------------
    | Flash Message
    |--------------------------------------------------------------------------
    */

    const flashMessage = document.querySelector('.flash-message');
    const flashClose = document.querySelector('.flash-close');

    if (flashMessage && flashClose) {
        flashClose.addEventListener('click', () => {
            flashMessage.remove();
        });
    }

    if (flashMessage) {
        setTimeout(() => {
            if (flashMessage.isConnected) {
                flashMessage.style.opacity = '0';
                flashMessage.style.transform = 'translateY(-8px)';
                flashMessage.style.transition =
                    'opacity .25s ease, transform .25s ease';

                setTimeout(() => {
                    flashMessage.remove();
                }, 250);
            }
        }, 5000);
    }

});
