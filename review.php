<!DOCTYPE html>
<html>
<head>
	<title>Feedback Modal UI Design</title>
	<link rel="stylesheet" type="text/css" href="style1.css">
	<script src="https://kit.fontawesome.com/4a0046fff5.js" crossorigin="anonymous"></script>
</head>
<body>
<div class="navbar">
        <a href="http://localhost/cscorner/waste-management-system-main/waste-management-system-main/index.html">Home</a>
    </div>
<div class="wrapper">
  <button class="feedback_btn send_btn">Send Your Feedback</button>
  
  <div class="modal_wrapper">
    <div class="shadow close_btn"></div>
    
    <div class="modal">
      <div class="close_btn">
        <i class="fa-solid fa-xmark"></i>
      </div>
      
      <div class="header">
        <h3>Give Feedback</h3>
        <p>What do you think of this software?</p>
        
        <div class="feedback_icons">
          <ul>
            <li>
              <i class="fa-regular fa-face-smile"></i>
            </li>
            <li>
              <i class="fa-regular fa-face-smile-wink"></i>
            </li>
            <li>
             <i class="fa-regular fa-face-kiss-beam"></i>
            </li>
            <li>
              <i class="fa-regular fa-face-grin-hearts"></i>
            </li>
            <li>
              <i class="fa-regular fa-face-meh-blank"></i>
            </li>
          </ul>
        </div>
      </div>
      <div class="body">
        <p>Do you have any thoughts you'd like to share?</p>
        <textarea class="textarea"></textarea>
      </div>
      <div class="footer">
        <button class="send_btn">Send</button>
        <button class="cancel_btn">cancel</button>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
var feedback_btn = document.querySelector(".feedback_btn");
var wrapper = document.querySelector(".wrapper");
var close_btns = document.querySelectorAll(".close_btn");
var li_items = document.querySelectorAll("ul li");

feedback_btn.addEventListener("click", function () {
  wrapper.classList.add("active");
});

close_btns.forEach(function (btn) {
  btn.addEventListener("click", function () {
    wrapper.classList.remove("active");
  });
});

li_items.forEach(function (item) {
  item.addEventListener("click", function () {
    li_items.forEach(function (item) {
      item.classList.remove("active");
    });

    item.classList.add("active");
  });
});

</script>

</body>
</html>