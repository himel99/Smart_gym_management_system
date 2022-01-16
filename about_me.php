<!DOCTYPE html>
<html>
<head>
<style>
.card {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  max-width: 300px;
  margin: auto;
  text-align: center;
  font-family: roman;
  background : #DCD7DD;
}

.price {
  color: grey;
  font-size: 22px;
}

.card button {
  border: none;
  outline: 0;
  padding: 12px;
  color: white;
  background-color: #000;
  text-align: center;
  cursor: pointer;
  width: 100%;
  font-size: 18px;
}

.card button:hover {
  opacity: 0.7;
}

  /* Navigation Bar*/

  .topnav {
  overflow: hidden;
  background-color: #333;
  text-align: center;
  margin-left: 40%;
  margin-right: 42%;
}

.topnav a {
  float: left;
  color: #f2f2f2;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 17px;
}

.topnav a:hover {
  background-color: #ddd;
  color: black;
}

.topnav a.active {
  background-color: #EA74CF;
  color: white;
}

body{
  background:  linear-gradient(to right,indigo,violet);
 
}

button{
  font-family: roman;
}

</style>
</head>
<body>

  <div class="topnav">
    <a href="user_profile.php">Profile</a>
    <a href="gridView.php">News</a>
    <a class="active" href="#about">About</a>
   </div>

<h2 style="text-align:center">About Developer</h2>

<div class="card">
  <img src="himel.jpg" alt="Himel" style="width:100%">
  <h1><i>Asiful Islam Himel</i></h1>
  <p class="price"><b>Roll :</b> 1707082</p>
  <p><b>Department :</b> CSE</p>
  <p><b>Khulna University of Engineering & Technology</b></p>
  
  <p><button>&copy; Asiful Islam Himel</button></p>
</div>

</body>
</html>
