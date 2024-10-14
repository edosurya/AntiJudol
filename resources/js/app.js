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
const thankyou = $('#thankyou');
const time = $('#time');

$(document).ready(function() {
    // Handle form submission
    $('#submitForm').on('submit', function(e) {
        e.preventDefault(); // Prevent default form submission

        const loadingDiv = $('#dzLoadingOverlay').html();

        // show loading div
        $('#submitForm').append(loadingDiv);
        document.getElementById("theForm").style.webkitFilter = "blur(3px)";

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
            fnErrorMessage.show().text('Wajib diisi');
            isValid = false;
        }
        // Email validation
        if (email === '') {
            mailErrorMessage.show().text('Wajib diisi');
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
            $('.dz-loading-div').fadeOut();
            document.getElementById("theForm").style.webkitFilter = "";
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
                // successMessage.show().text(response.message);
                thankyou.showModal();
                $('.dz-loading-div').fadeOut();
                document.getElementById("theForm").style.webkitFilter = "";
                $('#fullname').val('');
                $('#email').val('');
                $('#url').val('');
                var numbers = response.numbers;
                var text = '';
                var i;
                for (let i = 0; i < numbers.length; i++) {
                  text += `<img class="number px-1" src="../frontend/images/webp/`+numbers[i]+`.webp" alt="" loading="lazy" />`;
                  // console.log(text);
                }

                totalSubmission.html(text);
            },
            error: function(xhr) {
                // Handle server-side validation errors
                $('.dz-loading-div').fadeOut();
                document.getElementById("theForm").style.webkitFilter = "";
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


const month = ["Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember"];
const days = ["Senin","Selasa","Rabu","Kamis","Jumat","Sabtu","Minggu"];

function startTime() {
  const today = new Date();
  let day = days[today.getDay()];
  let D = today.getDate();
  let M = month[today.getMonth()];
  let Y = today.getFullYear();
  let h = today.getHours();
  let m = today.getMinutes();
  let s = today.getSeconds();
  m = checkTime(m);
  s = checkTime(s);
  time.show().text( day+", "+ D+" "+M+" "+Y+ " "+ h + ":" + m + ":" + s);
  setTimeout(startTime, 1000);
}

function checkTime(i) {
  if (i < 10) {i = "0" + i};  // add zero in front of numbers < 10
  return i;
}

$(window).on("load", function () {
    startTime();
});


function refreshResult() {
    // Send AJAX POST request
    $.get('/result', function(numbers) {
        var text = '';
        var i;
        for (let i = 0; i < numbers.length; i++) {
          text += `<img class="number px-1" src="../frontend/images/webp/`+numbers[i]+`.webp" alt="" loading="lazy" />`;
          // console.log(text);
        }
        totalSubmission.html(text);  
    }).fail(function(xhr, status, error) {
      console.error('Error:', error);   // Handle errors here
    });
}

$(function () {
    setInterval(refreshResult, 10000);
});




 