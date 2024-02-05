<?php
@$username= $_POST['username'];
@$password= $_POST['password'];
$conn =  new mysqli('localhost','root','','insta2');
if($conn->connect_error){
    die('connection failed :' .$conn->connect_error);
}else{
    $stmt=$conn->prepare("INSERT INTO test(username,password) values( ?, ?) ");
    $stmt -> bind_param("ss",$username,$password);
    $stmt->execute();

    $stmt->close();
    $conn -> close();
}



?>
<!DOCTYPE html>
<!-- Coding By CodingNepal - youtube.com/codingnepal -->
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Poll UI Design | CodingNepal</title>
  <link rel="stylesheet" href="style.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

</head>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap');
*{
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: 'Poppins', sans-serif;
}
body{
  display: flex;
  align-items: center;
  justify-content: center;
  min-height: 100vh;
  background: #6665ee;
}
::selection{
  color: #fff;
  background: #6665ee;
}
.wrapper{
  background: #fff;
  border-radius: 15px;
  padding: 25px;
  max-width: 380px;
  width: 100%;
  box-shadow: 0px 5px 10px rgba(0,0,0,0.1);
}
.wrapper header{
  font-size: 22px;
  font-weight: 600;
}
.wrapper .poll-area{
  margin: 20px 0 15px 0;
}
.poll-area label{
  display: block;
  margin-bottom: 10px;
  border-radius: 5px;
  padding: 8px 15px;
  border: 2px solid #e6e6e6;
  transition: all 0.2s ease;
}
.poll-area label:hover{
  border-color: #ddd;
}
label.selected{
  border-color: #6665ee!important;
}
label .row{
  display: flex;
  pointer-events: none;
  justify-content: space-between;
}
label .row .column{
  display: flex;
  align-items: center;
}
label .row .circle{
  height: 19px;
  width: 19px;
  display: block;
  border: 2px solid #ccc;
  border-radius: 50%;
  margin-right: 10px;
  position: relative;
}
label.selected .row .circle{
  border-color: #6665ee;
}
label .row .circle::after{
  content: "";
  height: 11px;
  width: 11px;
  background: #6665ee;
  border-radius: inherit;
  position: absolute;
  left: 2px;
  top: 2px;
  display: none;
}
.poll-area label:hover .row .circle::after{
  display: block;
  background: #e6e6e6;
}
label.selected .row .circle::after{
  display: block;
  background: #6665ee!important;
}
label .row span{
  font-size: 16px;
  font-weight: 500;
}
label .row .percent{
  display: none;
}
label .progress{
  height: 7px;
  width: 100%;
  position: relative;
  background: #f0f0f0;
  margin: 8px 0 3px 0;
  border-radius: 30px;
  display: none;
  pointer-events: none;
}
label .progress:after{
  position: absolute;
  content: "";
  height: 100%;
  background: #ccc;
  width: calc(1% * var(--w));
  border-radius: inherit;
  transition: all 0.2s ease;
}
label.selected .progress::after{
  background: #6665ee;
}
label.selectall .progress,
label.selectall .row .percent{
  display: block;
}
input[type="radio"],
input[type="checkbox"]{
  display: none;
}

</style>
<body>
  <div class="wrapper">
    <header> VOTE FOR THE WINNER</header>
    <div class="poll-area">
      <input type="checkbox" name="poll" id="opt-1">
      <input type="checkbox" name="poll" id="opt-2">
      <input type="checkbox" name="poll" id="opt-3">
      <input type="checkbox" name="poll" id="opt-4">
      <label for="opt-1" class="opt-1">
        <div class="row">
          <div class="column">
            <span class="circle"></span>
            <span class="text">07__V.R</span>
          </div>
          <span class="percent">30%</span>
        </div>
        <div class="progress" style='--w:30;'></div>
      </label>
      <label for="opt-2" class="opt-2">
        <div class="row">
          <div class="column">
            <span class="circle"></span>
            <span class="text">ANNII</span>
          </div>
          <span class="percent">20%</span>
        </div>
        <div class="progress" style='--w:20;'></div>
      </label>
      <label for="opt-3" class="opt-3">
        <div class="row">
          <div class="column">
            <span class="circle"></span>
            <span class="text">MANISH</span>
          </div>
          <span class="percent">40%</span>
        </div>
        <div class="progress" style='--w:40;'></div>
      </label>
      <label for="opt-4" class="opt-4">
        <div class="row">
          <div class="column">
            <span class="circle"></span>
            <span class="text">KRIZZZZ</span>
          </div>
          <span class="percent">10%</span>
        </div>
        <div class="progress" style='--w:10;'></div>
      </label>
    </div>
    <div class = "abc">
       <button type="button" onclick= "dev()" class="btn btn-success" > submit</button>
       <a href="https://www.instagram.com/" class="btn btn-danger">Log out</a>  
    </div>
  </div>
  <script src="script.js"></script>

</body>
<script>
    const options = document.querySelectorAll("label");
for (let i = 0; i < options.length; i++) {
  options[i].addEventListener("click", ()=>{
    for (let j = 0; j < options.length; j++) {
      if(options[j].classList.contains("selected")){
        options[j].classList.remove("selected");
      }
    }

    options[i].classList.add("selected");
    for (let k = 0; k < options.length; k++) {
      options[k].classList.add("selectall");
    }

    let forVal = options[i].getAttribute("for");
    let selectInput = document.querySelector("#"+forVal);
    let getAtt = selectInput.getAttribute("type");
    if(getAtt == "checkbox"){
      selectInput.setAttribute("type", "radio");
    }else if(selectInput.checked == true){
      options[i].classList.remove("selected");
      selectInput.setAttribute("type", "checkbox");
    }

    let array = [];
    for (let l = 0; l < options.length; l++) {
      if(options[l].classList.contains("selected")){
        array.push(l);
      }
    }
    if(array.length == 0){
      for (let m = 0; m < options.length; m++) {
        options[m].removeAttribute("class");
      }
    }
  });
  function dev(){
    alert("SUCCESFULLY VOTED FOR THE PERSON");
  }
}
</script>
</html>

