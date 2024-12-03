/**
 * ------------------------------------------------------------------------------------
 * PROJECT SETUP
 * ------------------------------------------------------------------------------------
 */

// imports
import './bootstrap.js';
import $ from 'jquery';


// set global variables
const errorMessage = $('#dzErrorMessage');
const successMessage = $('#successMessage');
const fnErrorMessage = $('#fnErrorMessage');
const mailErrorMessage = $('#mailErrorMessage');
const urlErrorMessage = $('#urlErrorMessage');
const totalSubmission = $('#totalSubmission');
const t_lapor = $('#t_lapor');
const t_dukung = $('#t_dukung');
const thankyou = $('#btnthankyou');
const btnShare = $('#btnshare');
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
                // console.log(response);
                // Display success message
                // successMessage.show().text(response.message);
                btnShare.click();
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

                var v_t_lapor = response.t_lapor;
                var c_t_lapor = '';
                var j;

                for (let j = 0; j < v_t_lapor.length; j++) {
                  c_t_lapor += `<img class="number px-1" src="../frontend/images/webp/`+v_t_lapor[j]+`.webp" alt="" loading="lazy" />`;
                  // console.log(c_t_lapor);
                }

                var v_t_dukung = response.t_dukung;
                var c_t_dukung = '';
                var k;

                for (let k = 0; k < v_t_dukung.length; k++) {
                  c_t_dukung += `<img class="number px-1" src="../frontend/images/webp/`+v_t_dukung[k]+`.webp" alt="" loading="lazy" />`;
                }

                totalSubmission.html(text);
                t_lapor.html(c_t_lapor);
                t_dukung.html(c_t_dukung);

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
    // function validateURL(url) {
    //     var re = /^(https?:\/\/)?([a-z\d]+)\.([a-z\d]+)\.([a-z]{2,6})([\/\w .-]*)*\/?$/;
    //     return re.test(String(url).toLowerCase());
    // }
    function validateURL(str) {
      var pattern = new RegExp('^(https?:\\/\\/)?'+ // protocol
        '((([a-z\\d]([a-z\\d-]*[a-z\\d])*)\\.)+[a-z]{2,}|'+ // domain name
        '((\\d{1,3}\\.){3}\\d{1,3}))'+ // OR ip (v4) address
        '(\\:\\d+)?(\\/[-a-z\\d%_.~+]*)*'+ // port and path
        '(\\?[;&a-z\\d%_.~+=-]*)?'+ // query string
        '(\\#[-a-z\\d_]*)?$','i'); // fragment locator
      return !!pattern.test(str);
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
    $.get('/result', function(response) {
        var numbers = response.numbers;
        var text = '';
        var i;
        for (let i = 0; i < numbers.length; i++) {
          text += `<img class="number px-1" src="../frontend/images/webp/`+numbers[i]+`.webp" alt="" loading="lazy" />`;
          // console.log(text);
        }

        var v_t_lapor = response.t_lapor;
        var c_t_lapor = '';
        var j;

        for (let j = 0; j < v_t_lapor.length; j++) {
          c_t_lapor += `<img class="number px-1" src="../frontend/images/webp/`+v_t_lapor[j]+`.webp" alt="" loading="lazy" />`;
          // console.log(c_t_lapor);
        }

        var v_t_dukung = response.t_dukung;
        var c_t_dukung = '';
        var k;

        for (let k = 0; k < v_t_dukung.length; k++) {
          c_t_dukung += `<img class="number px-1" src="../frontend/images/webp/`+v_t_dukung[k]+`.webp" alt="" loading="lazy" />`;
        }

        totalSubmission.html(text);
        t_lapor.html(c_t_lapor);
        t_dukung.html(c_t_dukung); 
    }).fail(function(xhr, status, error) {
      console.error('Error:', error);   // Handle errors here
    });
}

$(function () {
    setInterval(refreshResult, 10000);
});




 