document.addEventListener('DOMContentLoaded', () => {

    /*
    |--------------------------------------------------------------------------
    | Profile Picture Preview + 15 MB Client Validation
    |--------------------------------------------------------------------------
    */

    const MAX_PROFILE_SIZE = 15 * 1024 * 1024;
    const ALLOWED_TYPES = ['image/jpeg', 'image/png'];

    const profileInput = document.getElementById('profile_picture');
    const previewImage = document.getElementById('profilePreviewImage');
    const placeholder = document.getElementById('profilePlaceholder');
    const fileName = document.getElementById('fileName');
    const clientFileError = document.getElementById('clientFileError');

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

            if (!ALLOWED_TYPES.includes(file.type)) {
                this.value = '';

                if (clientFileError) {
                    clientFileError.textContent =
                        'Please upload a JPG, JPEG, or PNG image only.';
                    clientFileError.hidden = false;
                }

                return;
            }

            if (file.size > MAX_PROFILE_SIZE) {
                this.value = '';

                if (clientFileError) {
                    clientFileError.textContent =
                        'The profile picture must not be larger than 15 MB.';
                    clientFileError.hidden = false;
                }

                if (fileName) {
                    fileName.textContent =
                        'File is too large. Choose an image up to 15 MB.';
                }

                return;
            }

            if (clientFileError) {
                clientFileError.textContent = '';
                clientFileError.hidden = true;
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
