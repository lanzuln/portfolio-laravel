<section class="contact-area section-padding" id="contact-page">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 offset-lg-3 text-center">
                <div class="section-title">
                    <h3 class="title">{{$ContactHeading->title}}</h3>
                    <div class="desc">
                        {{$ContactHeading->subtitle}}
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <!-- Contact-Form -->
                <form class="contact-form" id="contact-form">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-box">
                                <input type="text" name="name" id="name" class="input-box" placeholder="Name">
                                <label for="form-name" class="icon lb-name"><i class="fal fa-user"></i></label>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-box">
                                <input type="text" name="email" id="email" class="input-box" placeholder="Email">
                                <label for="form-email" class="icon lb-email"><i class="fal fa-envelope"></i></label>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-box">
                                <input type="text" name="subject" id="subject" class="input-box" placeholder="Subject">
                                <label for="form-subject" class="icon lb-subject"><i
                                        class="fal fa-check-square"></i></label>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-box">
                                <textarea class="input-box" id="message" placeholder="Message" cols="30" rows="4"
                                    name="form-message"></textarea>
                                <label for="form-message" class="icon lb-message"><i class="fal fa-edit"></i></label>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-box">
                                <button class="button-primary mouse-dir" id="submitButton" type="submit">Send Now <span
                                        class="dir-part"></span></button>
                            </div>
                        </div>
                    </div>
                </form>
                <!-- Contact-Form / -->
            </div>
        </div>
    </div>
</section>

@push('script')
<script>

    function showLoader() {
        document.getElementById('loader').classList.remove('d-none')
    }
    function hideLoader() {
        document.getElementById('loader').classList.add('d-none')
    }

    function successToast(msg) {
        Toastify({
            gravity: "bottom", // `top` or `bottom`
            position: "center", // `left`, `center` or `right`
            text: msg,
            className: "mb-5",
            style: {
                background: "green",
            }
        }).showToast();
    }

    function errorToast(msg) {
        Toastify({
            gravity: "bottom", // `top` or `bottom`
            position: "center", // `left`, `center` or `right`
            text: msg,
            className: "mb-5",
            style: {
                background: "red",
            }
        }).showToast();
    }



    let contactForm = document.getElementById('contact-form');

    contactForm.addEventListener('submit', async (event) => {
        event.preventDefault();

        let name = document.getElementById('name').value;
        let email = document.getElementById('email').value;
        let subject = document.getElementById('subject').value;
        let message = document.getElementById('message').value;

        if (name.length == 0) {
            errorToast('insert your name')
        } else if (email.length == 0) {
            errorToast('insert your email')
        } else if (subject.length == 0) {
            errorToast('insert your subject')
        } else if (message.length == 0) {
            errorToast('insert your message')
        } else {
            let formData = {
                name: name,
                email: email,
                subject: subject,
                message: message
            }
            let url = "/contact";
            showLoader()
            submitButton.disabled = true;
            submitButton.textContent = 'Please Wait';
            submitButton.classList.add('disabled-button');
            let result = await axios.post(url, formData);
            hideLoader()


            if (result.status == 200 || result.data === 1) {

                setTimeout(() => {
                    successToast('message send sucessfully');
                    contactForm.reset();
                    submitButton.disabled = false;
                    submitButton.textContent = 'Send Now';
                    submitButton.classList.remove('disabled-button');
                }, 1000);

            } else {
                errorToast('error')
                submitButton.disabled = false;
                submitButton.textContent = 'Send Now';
                submitButton.classList.remove('disabled-button');
            }

        }

    });

</script>
@endpush
