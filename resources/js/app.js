/**
 * ------------------------------------------------------------------------------------
 * PROJECT SETUP
 * ------------------------------------------------------------------------------------
 */

// imports
import './bootstrap.js';


// set global variables
const errorMessage = $('#dzErrorMessage');
const successMessage = $('#successMessage');
const fnErrorMessage = $('#fnErrorMessage');
const mailErrorMessage = $('#mailErrorMessage');
const urlErrorMessage = $('#urlErrorMessage');
const totalSubmission = $('#totalSubmission');


$(document).ready(function() {
        // Handle form submission
        $('#submitForm').on('submit', function(e) {
            e.preventDefault(); // Prevent default form submission

            // Clear any previous response messages
            errorMessage.hide();
            urlErrorMessage.hide();
            mailErrorMessage.hide();
            fnErrorMessage.hide();
            successMessage.hide()

            // Client-side validation
            var isValid = true;
            var name = $('#fullname').val();
            var email = $('#email').val();
            var url = $('#url').val();
            var errorMessages = '';

            // Name validation
            if (name === '') {
                fnErrorMessage.show().text('Wajib Diisi');
                isValid = false;
            }

            // Email validation
            if (email === '') {
                mailErrorMessage.show().text('Wajib Diisi');
                isValid = false;
            } else if (!validateEmail(email)) {
                mailErrorMessage.show().text('Format email salah');
                isValid = false;
            }

            // URL validation
            if (url === '') {
                urlErrorMessage.show().text('Wajib diisi');
                isValid = false;
            } else if (!validateURL(url)) {
                urlErrorMessage.show().text('Format URL salah');
                isValid = false;
            }

            // If validation fails, display error messages
            if (!isValid) {
                return;
            }

            // Get CSRF token from the meta tag
            var csrfToken = $('meta[name="csrf-token"]').attr('content');

            // Send AJAX POST request
            $.ajax({
                url: '/submit', 
                type: 'POST',
                data: {
                    "fullname": name,
                    "email": email,
                    "link": url,
                },
                headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response) {
                    // Display success message
                    successMessage.show().text(response.message);
                    $('#fullname').val('');
                    $('#email').val('');
                    $('#url').val('');
                    console.log(response.count);
                    totalSubmission.text(response.count);
                },
                error: function(xhr) {
                    // Handle server-side validation errors
                    var errors = xhr.responseJSON;
                    console.log(xhr.responseJSON);
                    errorMessage.show().text(errors);
                }
            });
        });

        // Email validation function
        function validateEmail(email) {
            var re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            return re.test(String(email).toLowerCase());
        }

        // URL validation function
        function validateURL(url) {
            var re = /^(https?:\/\/)?([a-z\d]+)\.([a-z\d]+)\.([a-z]{2,6})([\/\w .-]*)*\/?$/;
            return re.test(String(url).toLowerCase());
        }
    });



 