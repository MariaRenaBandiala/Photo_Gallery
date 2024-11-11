<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <style>
    body {
      font-family: Verdana, sans-serif;
      margin: 0;
      background-color: lightblue;
    }

    * {
      box-sizing: border-box;
    }

    .row > .column {
      padding: 8px; 
    }

    .column {
    float: left;
    width: 33.33%;
    height: 50vh; 
    overflow: hidden;
    }

    .column img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    display: block;
    margin: 10px 0;
    border: 3px solid #ddd;
    border-radius: 8px;
    }

    .modal {
      display: none;
      position: fixed;
      z-index: 1;
      padding-top: 100px;
      left: 0;
      top: 0;
      width: 100%;
      height: 100%;
      overflow: auto;
      background-color: black;
    }

    .modal-content {
      position: relative;
      background-color: #fefefe;
      margin: auto;
      padding: 0;
      width: 90%;
      max-width: 1200px;
    }

    .close {
      color: white;
      position: absolute;
      top: 10px;
      right: 25px;
      font-size: 35px;
      font-weight: bold;
    }

    .close:hover,
    .close:focus {
      color: #999;
      text-decoration: none;
      cursor: pointer;
    }

    .mySlides {
      display: none;
    }

    .cursor {
      cursor: pointer;
    }

    .prev,
    .next {
      cursor: pointer;
      position: absolute;
      top: 50%;
      width: auto;
      padding: 16px;
      margin-top: -50px;
      color: white;
      font-weight: bold;
      font-size: 20px;
      transition: 0.6s ease;
      border-radius: 0 3px 3px 0;
      user-select: none;
      -webkit-user-select: none;
    }

    .next {
      right: 0;
      border-radius: 3px 0 0 3px;
    }

    .prev:hover,
    .next:hover {
      background-color: rgba(0, 0, 0, 0.8);
    }

    .numbertext {
      color: #f2f2f2;
      font-size: 12px;
      padding: 8px 12px;
      position: absolute;
      top: 0;
    }

    .caption-container {
      text-align: center;
      background-color: black;
      padding: 2px 16px;
      color: white;
    }

    .demo {
      opacity: 0.6;
    }

    .active,
    .demo:hover {
      opacity: 1;
    }

    img.hover-shadow {
      transition: 0.3s;
    }

    .hover-shadow:hover {
      box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
    }
</style>

</head>
<body>

<h2 style="text-align:center">Maria Rena Bandiala's Photo Gallery</h2>

<div class="row">
  <?php
    $image_dir = "imgs/"; 
    $images = glob($image_dir . "*.{jpg,jpeg,png,gif}", GLOB_BRACE); // 

    foreach ($images as $index => $image) {
      
        echo '<div class="column">
                <img src="' . $image . '" onclick="openModal();currentSlide(' . ($index + 1) . ')" class="hover-shadow cursor">
              </div>';
    }
  ?>
</div>


<div id="myModal" class="modal">
  <span class="close cursor" onclick="closeModal()">&times;</span>
  <div class="modal-content">
    
    <?php
      foreach ($images as $index => $image) {
          
          echo '<div class="mySlides">
                  <div class="numbertext">' . ($index + 1) . ' / ' . count($images) . '</div>
                  <img src="' . $image . '" style="width:100%">
                </div>';
      }
    ?>
    
    <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
    <a class="next" onclick="plusSlides(1)">&#10095;</a>

    <div class="caption-container">
      <p id="caption"></p>
    </div>

    <?php
      foreach ($images as $index => $image) {
       
          echo '<div class="column">
                  <img class="demo cursor" src="' . $image . '" style="width:100%" onclick="currentSlide(' . ($index + 1) . ')" alt="Image ' . ($index + 1) . '">
                </div>';
      }
    ?>
  </div>
</div>

<script>
function openModal() {
  document.getElementById("myModal").style.display = "block";
}

function closeModal() {
  document.getElementById("myModal").style.display = "none";
}

var slideIndex = 1;
showSlides(slideIndex);

function plusSlides(n) {
  showSlides(slideIndex += n);
}

function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("demo");
  var captionText = document.getElementById("caption");
  if (n > slides.length) {slideIndex = 1}
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none";
  }
  for (i = 0; i < dots.length; i++) {
      dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";
  dots[slideIndex-1].className += " active";
  captionText.innerHTML = dots[slideIndex-1].alt;
}
</script>

</body>
</html>
