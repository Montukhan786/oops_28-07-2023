
console.log(190);

//card scroll effect

window.addEventListener('scroll', reveal);

function reveal() {
  var reveals = document.querySelectorAll('.reveal');

  for (var i = 0; i < reveals.length; i++) {
    var windowheight = window.innerHeight;
    var revealtop = reveals[i].getBoundingClientRect().top;
    var revealpoint = 150;

    if (revealtop < windowheight - revealpoint) {
      reveals[i].classList.add('active');
    }
    else {
      reveals[i].classList.remove('active');
    }
  }
}


// navbar responsive-ness logic

const navMenu = document.getElementById('nav-menu'),
  toggleMenu = document.getElementById('toggle-menu'),
  closeMenu = document.getElementById('close-menu');


toggleMenu.addEventListener('click', () => {
  navMenu.classList.toggle('show');
})

closeMenu.addEventListener('click', () => {
  navMenu.classList.remove('show');
})

// carousal logic

var indexValue = 1;
showImg(indexValue);
function btm_slide(e) {
  showImg(indexValue = e);
}
function side_slide(e) {
  showImg(indexValue += e);
}

function showImg(e) {
  var i;
  const img = document.querySelectorAll('.images img');
  const sliders = document.querySelectorAll('.btm-sliders span');

  if (e > img.length) { indexValue = 1; }
  if (e < 1) { indexValue = img.length }

  for (i = 0; i < img.length; i++) {
    img[i].style.display = "none";
  }

  for (i = 0; i < sliders.length; i++) {
    sliders[i].style.background = "inherit";
  }

  img[indexValue - 1].style.display = "block";
  sliders[indexValue - 1].style.background = "white";

}

//auto slide code start
var slideindex = 0;
showslides();

function showslides() {
  var i;
  const images = document.querySelectorAll('.images img');
  const slides = document.querySelectorAll('.btm-sliders span');

  for (i = 0; i < slides.length; i++) {
    images[i].style.display = "none";
    slides[i].style.background = "inherit";
  }

  slideindex++;

  if (slideindex > slides.length) {
    slideindex = 1;
  }

  images[slideindex - 1].style.display = "block";
  slides[slideindex - 1].style.background = "white";

  setTimeout(showslides, 2500); //change image in every 2 seconds

}
//auto slide end


$().ready(function () {
  jQuery("#frm").validate({
    // Specify validation rules
    rules: {
      user: "required",
      email: {
        required: true,
        email: true
      },
      mobile: {
        required: true,
        minlength: 10,
        maxlength: 10
      },
      comments: {
        required: true,
        minlength: 10
      }
    },
    // Specify validation error messages
    messages: {
      user: "Please enter your username",
      email: {
        required: "Please Enter an Email Id",
        email: "Please enter valid email"
      },
      mobile: {
        required: "Please Enter a mobile number",
        minlength: "Please enter 10 digit mobile number",
        maxlength: "Mobile number should not be more then 10 digits"
      },
      comments: {
        required: "Please Enter a Feedback/suggestion",
        minlength: "coomments should be contain minimum 10 character!"
      }
    },
    submitHandler: function (form) {
      form.submit();
    }
  });
});


//Gallary open-close logic

var fullImgBox = document.getElementById("fullImgBox");
var fullImg = document.getElementById("fullImg");

function openFullImg(imglink){
  fullImgBox.style.display = "flex";
  fullImg.src = imglink;
}

function closeFullImg(){
  fullImgBox.style.display = "none";
}


// console.log(390);


//update notification

    let toastBox = document.getElementById('toastBox');

    function showUpdateMsg(){
      let toast = document.createElement('div');
      toast.classList.add('toast');
      toast.innerHTML = 'Record update successfully!';
      toastBox.appendChild(toast);

    }

    function isDelete(){
      return confirm("Are you sure you want to delete the message?(i2)");
    }

    
    
        