document.addEventListener("DOMContentLoaded", docLoaded = () => {

    const footerBtnNewsletterSignIn = document.querySelector("#footerBtnNewsletterSignIn");
    const emailFooterInput = document.querySelector("#footerFormNewsletterEmail")

    const RGPD = document.querySelector("#newsletterRGPD");
    const RGPDError = document.querySelector("#newsletterRGPDError");

    emailFooterInput.onkeydown = (event) => {
        if(event.key === 'Enter') {
            footerBtnNewsletterSignIn.click();
        }
    }

    footerBtnNewsletterSignIn.onclick = () => {

        const eMailFooterInputValue = emailFooterInput.value;
        const emailInput = document.querySelector("#newsletterEmail");

        emailInput.value = eMailFooterInputValue;

        RGPD.checked = false;
    }

    const divPath = document.querySelector(".js-form-newsletter-path");
    const path = divPath.dataset.formNewsletterPath;

    const divButtonText = document.querySelector(".js-form-newsletter-button-text");
    const buttonText = divButtonText.dataset.formNewsletterButtonText;

    const divSuccessTitle = document.querySelector(".js-form-newsletter-success-title");
    const successTitle = divSuccessTitle.dataset.formNewsletterSuccessTitle;
    const divSuccessSubtitle = document.querySelector(".js-form-newsletter-success-subtitle");
    const successSubtitle = divSuccessSubtitle.dataset.formNewsletterSuccessSubtitle;
    const divSuccessText = document.querySelector(".js-form-newsletter-success-text");
    const successText = divSuccessText.dataset.formNewsletterSuccessText;

    const divErrorTitle = document.querySelector(".js-form-newsletter-error-title");
    const errorTitle = divErrorTitle.dataset.formNewsletterErrorTitle;
    const divErrorSubtitle = document.querySelector(".js-form-newsletter-error-subtitle");
    const errorSubtitle = divErrorSubtitle.dataset.formNewsletterErrorSubtitle;
    const divErrorText = document.querySelector(".js-form-newsletter-error-text");
    const errorText = divErrorText.dataset.formNewsletterErrorText;

    const btnForm = document.querySelector("#btnFormNewsletter");

    const newsletterModal = document.querySelector('#newsletterModal');
    const newsletterModalBootstrap = new bootstrap.Modal(newsletterModal);

    const resultModal = document.querySelector('#newsletterResultModal');
    const resultModalBootstrap = new bootstrap.Modal(resultModal);

    const emailInput = document.querySelector("#newsletterEmail");
    const emailError = document.querySelector("#newsletterEmailError");
    const firstnameInput = document.querySelector("#newsletterFirstname");
    const firstnameError = document.querySelector("#newsletterFirstnameError");
    const lastnameInput = document.querySelector("#newsletterLastname");
    const lastnameError = document.querySelector("#newsletterLastnameError");

    btnForm.onclick = () => {

        emailInput.className = "form-control";
        emailError.className = "alert alert-danger mt-2 mb-0 d-none";
        firstnameInput.className = "form-control";
        firstnameError.className = "alert alert-danger mt-2 mb-0 d-none";
        lastnameInput.className = "form-control";
        lastnameError.className = "alert alert-danger mt-2 mb-0 d-none";
        RGPD.className = "form-check-input"
        RGPDError.className = "invalid-feedback d-none";

        const email = emailInput.value;
        const firstname = firstnameInput.value;
        const lastname = lastnameInput.value;

        function validateEmail(email)
        {
            var re = /\S+@\S+\.\S+/;
            return re.test(email);
        }

        if(validateEmail(email) && firstname !== "" && firstname !== null && lastname !== "" && lastname !== null && RGPD.checked !== false) {

            btnForm.innerHTML = '<div class="d-flex align-items-center"><span class="me-2 ms-2 text-white">' + buttonText + '</span><div class="spinner-border me-2 ms-2" role="status"><span class="visually-hidden">Loading...</span></div></div>';

            emailInput.className = "form-control";
            emailError.className = "alert alert-danger mt-2 mb-0 d-none";
            firstnameInput.className = "form-control";
            firstnameError.className = "alert alert-danger mt-2 mb-0 d-none";
            lastnameInput.className = "form-control";
            lastnameError.className = "alert alert-danger mt-2 mb-0 d-none";

            const contact = {
                email: email,
                firstname: firstname,
                lastname: lastname
            }

            const apiCall = async () => {
                const response = await fetch(path, {
                    method: 'POST',
                    body: JSON.stringify(contact),
                    headers: {
                        'Content-Type': 'application/json'
                    }
                });
                const result = await response.json();
                const status = result.status;

                const resultTitle = document.querySelector("#newsletterResultModalTitle");
                const resultSubtitle = document.querySelector("#newsletterResultModalSubtitle");
                const resultText = document.querySelector("#newsletterResultModalText");

                btnForm.innerHTML = buttonText;

                if(status === 200) {
                    resultTitle.innerHTML = successTitle + " " + capitalizeFirstLetter(firstname.toLowerCase()) + " !";
                    resultSubtitle.innerHTML = successSubtitle;
                    resultText.innerHTML = successText;
                    resultModalBootstrap.show();
                }

                else {
                    resultTitle.innerHTML = errorTitle;
                    resultSubtitle.innerHTML = errorSubtitle;
                    resultText.innerHTML = errorText;
                    resultModalBootstrap.show();
                }
            };

            setTimeout(waitSomeSecs = () => {
                apiCall();
            },200)


        } else {

            if(validateEmail(email) === false) {
                emailInput.className = "form-control is-invalid";
                emailError.className = "alert alert-danger mt-2 mb-0";
            }

            if(firstname === "" || firstname === null) {
                firstnameInput.className = "form-control is-invalid";
                firstnameError.className = "alert alert-danger mt-2 mb-0";
            }

            if(lastname === "" || lastname  === null) {
                lastnameInput.className = "form-control is-invalid";
                lastnameError.className = "alert alert-danger mt-2 mb-0";
            }

            if(RGPD.checked === false) {
                RGPD.className = "form-check-input is-invalid"
                RGPDError.className = "invalid-feedback";
            }

        }

    }


    resultModal.addEventListener('hide.bs.modal', hideAll = () => {
        document.querySelector('#footerFormNewsletterEmail').value = "";
        newsletterModalBootstrap.hide();
    })

    newsletterModal.addEventListener('hide.bs.modal', resetForm = () => {
        document.querySelector('#newsletterEmail').value = "";
        document.querySelector('#newsletterLastname').value = "";
        document.querySelector('#newsletterFirstname').value = "";
        document.querySelector('#newsletterResultModalTitle').innerHTML = "";
        document.querySelector('#newsletterResultModalSubtitle').innerHTML = "";
        document.querySelector('#newsletterResultModalText').innerHTML = "";
        btnForm.innerHTML = buttonText;
    })

})

const capitalizeFirstLetter = (str) => {
    if (!str) return '';

    var firstCodeUnit = str[0];

    if (firstCodeUnit < '\uD800' || firstCodeUnit > '\uDFFF') {
        return str[0].toUpperCase() + str.slice(1);
    }

    return str.slice(0, 2).toUpperCase() + str.slice(2);
}
