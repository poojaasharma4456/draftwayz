// Toggle Menu Functionaliy Start
document.addEventListener("DOMContentLoaded", function () {
  document.querySelector(".menu-icon").addEventListener("click", function () {
    document.body.classList.add("menuToggle");
  });

  document.querySelector(".close-icon").addEventListener("click", function () {
    document.body.classList.remove("menuToggle");
  });
});
// Toggle Menu Functionaliy End

// Header Scroll JS Start
document.addEventListener("DOMContentLoaded", function () {
  window.addEventListener("scroll", function () {
    var header = document.querySelector(".draftdayz-header");
    if (window.scrollY > 0) {
      header.classList.add("fixed-header");
    } else {
      header.classList.remove("fixed-header");
    }
  });
});
// Header Scroll JS Start

// AOS JS Start
AOS.init();
// AOS JS Start



//Cookies JS Start
const cookiesBox = document.querySelector('.wrapper'),
  buttons = document.querySelectorAll('.button');

// ---- ---- Show ---- ---- //
const executeCodes = () => {
  if (document.cookie.includes('AlexGolovanov')) return;
  cookiesBox.classList.add('show');

  // ---- ---- Button ---- ---- //
  buttons.forEach((button) => {
    button.addEventListener('click', () => {
      cookiesBox.classList.remove('show');

      // ---- ---- Time ---- ---- //
      if (button.id == 'acceptBtn') {
        document.cookie =
          'cookieBy= AlexGolovanov; max-age=' + 60 * 60 * 24 * 30;
      }
    });
  });
};
window.addEventListener('load', executeCodes);
//Cookies JS End


// document.getElementById('signupForm').addEventListener('submit', function(event) {
//   event.preventDefault(); 

 
//   const errorMessagesDiv = document.getElementById('errorMessages');
//   errorMessagesDiv.innerHTML = '';


//   const firstName = document.getElementById('firstName').value.trim();
//   const lastName = document.getElementById('lastName').value.trim();
//   const email = document.getElementById('email').value.trim();
//   const phoneNumber = document.getElementById('phoneNumber').value.trim();
//   const password = document.getElementById('password').value.trim();
//   const confirmPassword = document.getElementById('confirmPassword').value.trim();

//   let isValid = true;
//   let errorMessages = [];

//   if (firstName === "") {
//       isValid = false;
//       errorMessages.push("First Name is required.");
//   }

 
//   if (lastName === "") {
//       isValid = false;
//       errorMessages.push("Last Name is required.");
//   }


//   const emailPattern = /^[^ ]+@[^ ]+\.[a-z]{2,3}$/;
//   if (!emailPattern.test(email)) {
//       isValid = false;
//       errorMessages.push("Please enter a valid email address.");
//   }


//   const phonePattern = /^\d{10}$/;
//   if (!phonePattern.test(phoneNumber)) {
//       isValid = false;
//       errorMessages.push("Please enter a valid 10-digit phone number.");
//   }


//   if (password.length < 6) {
//       isValid = false;
//       errorMessages.push("Password must be at least 6 characters long.");
//   }


//   if (password !== confirmPassword) {
//       isValid = false;
//       errorMessages.push("Passwords do not match.");
//   }


//   if (!isValid) {
//       errorMessagesDiv.innerHTML = errorMessages.join('<br>');
//   } else {
 
//       alert('Form submitted successfully!');

//   }
// });




   