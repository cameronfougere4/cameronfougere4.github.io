<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="author" content="Cameron Fougere">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Happy Sunday. Welcome to Cam Fougere's Week 2 Lab</title>
  <link rel="stylesheet" href="my_style.css">
  <script src="nav.js"></script>
</head>
<body>

<nav id="main-nav"></nav>
<script>
  setNav(window.location.pathname);
</script>


  <div class="body_wrapper">
  
  <h1>Cameron Fougere</h1>
  <p>I play defensive midfield for the Lacrosse team here at Bishop's University.</p>
  
  <h2>Intro into the everyday life of Cam Fuji</h2>
  <p>I love sports, and my favorite subject in school is math, coding is difficult for me however I am enjoying learning about it.<br>
  I specifically love <em>hockey</em> and the <strong>Montreal Canadiens</strong>.</p>
  <hr>
  
  <h2>More into my everyday life hobbies</h2>
  <ul>
	<li>Gym</li>
	<li>Golf</li>
	<li>Watching football</li>
	<li>Data Analytics</li>
  </ul>
  
  <h2>My top 3 favorite classes ever taken at BU</h2>
  <ol>
	<li>Bmg311: Business Policy</li>
	<li>Bac121: Financial Accounting I</li>
	<li>Bcs220: Operations Management</li>
  </ol>
  
    <p>I enjoy playing &amp; watching golf.</p>
  
  <h2>My Education</h2>
<table border="1" style="width:100%">
  <tr style="background-color: lightgreen; text-align: center; font-family: Arial, sans-serif;">
    <th>Year</th>
    <th>School</th>
    <th>Degree</th>
  </tr>
  <tr style="text-align: left; font-family: 'Times New Roman', Georgia, serif;">
    <td>2018-2022</td>
    <td>Milton High School</td>
    <td>High School Diploma</td>
  </tr>
  <tr>
    <td style="font-weight: bold;">2022-2026</td>
    <td>Bishop's University</td>
    <td>Business Technology and Analytics</td>
  </tr>
  
</table>

<div class="slideshow">
    <div class="slideshow_img">
        <img src="Images/hockey.png" style="width:100%">
    </div>

    <div class="slideshow_img">
        <img src="Images/montreal.jpg" style="width:100%">
    </div>

    <div class="slideshow_img">
        <img src="Images/dogs.jpg" style="width:100%">
    </div>

    <a id="prev" onclick="previous()">❮ Previous</a>
    <a id="next" onclick="next()">Next ❯</a>
</div>

 
  </div>

<footer>
  This website is made for CS203 labs!
</footer>
  
  <script src="slideshow.js"></script>
  
</body>
</html>