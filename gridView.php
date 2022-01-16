
<?php
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Login</title>
  <link rel ="stylesheet" type="text/css" href="grid.css">

  <style>

  /* NOTE:
 * Grid/Flex layout stuff starts at line 187. 
 * The stuff before is just boring old CSS to make content look not crappy.
 */


/*--------------------------------------------------------------
CSS Reset
--------------------------------------------------------------*/
html {
  font-family: sans-serif;
  -webkit-text-size-adjust: 100%;
  -ms-text-size-adjust:     100%;
}

body {
  margin: 0;
  background: black;
}

img {
  display: block;
  border: 0;
  width: 100%;
  height: auto;
}


/*--------------------------------------------------------------
Accessibility
--------------------------------------------------------------*/
/* Text meant only for screen readers */
.screen-reader-text {
  clip: rect(1px, 1px, 1px, 1px);
  position: absolute !important;
  height: 1px;
  width: 1px;
  overflow: hidden;
}

.screen-reader-text:hover,
.screen-reader-text:active,
.screen-reader-text:focus {
  background-color: #f1f1f1;
  border-radius: 3px;
  box-shadow: 0 0 2px 2px rgba(0, 0, 0, 0.6);
  clip: auto !important;
  color: #21759b;
  display: block;
  font-size: 14px;
  font-weight: bold;
  height: auto;
  left: 5px;
  line-height: normal;
  padding: 15px 23px 14px;
  text-decoration: none;
  top: 5px;
  width: auto;
  z-index: 100000; /* Above WP toolbar */
}


/*--------------------------------------------------------------
Typography
--------------------------------------------------------------*/
body,
button,
input,
select,
textarea {
  color: #404040;
  font-family: 'Helvetica', Arial, sans-serif;
  font-size: 18px;
  line-height: 1.5;
}

h1,
h2,
h3 {
  text-align: center;
  margin: 0;
  padding: 1em 0;
}

p {
  margin: 0;
  padding: 1em 0;
}




/* Promo section */

.logo,
.site-title {
  text-align: center;
}

.logo {
  font-size: 4em;
  background: black;
  background-image: ;
  color: white;
  opacity: 0.8;
}

.site-title {
  margin-top: -1em;
  margin-bottom: 3em;
}

/* Splash section */

.splash {
  background: #FFF6E5;
  padding-bottom: 2em;
}

.splash-content {
  padding: 1.5em;
}

@media screen and (min-width: 600px) {
  .splash-text {
    columns: 2;
    column-gap: 2em;
  }

  .splash-text p {
    padding-top: 0;
  }
}

/* Buckets section */

.buckets {
  padding: 2em 1em 1em;
  background: #3E454C;
}

.buckets ul {
  margin: 0;
  padding: 0;
}

.buckets li {
  margin-bottom: 1em;
  background: white;
  list-style-type: none;
}

.bucket {
  padding: 1.5em;
}

/* More section */

.more {
  padding: 2em;
}

/* Twins section */

.twin {
  padding: 2em;
  background: #2185C5;
  color: white;
}

.twin:last-of-type {
  background: #FF7F66;
}

/* Colophon section */


/*Start footer*/
.copyright{
    width: 100%;
    color: white;
    text-align: center;
    background: hsl(0, 0%, 10%);
    padding: 2rem 0;
    position: relative;
}


.copyright p{
    font-size: 1.4rem;
}

/*End footer*/
.price {
  color: grey;
  font-size: 22px;
  text-align: center;
}

  /* Navigation Bar*/

  .topnav {
  overflow: hidden;
  background-color: #333;
  margin-left: 40%;
  margin-right: 41%;

}

.topnav a {
  float: left;
  color: #f2f2f2;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 17px;
  font-family: roman;
}

.topnav a:hover {
  background-color: #ddd;
  color: black;
}

.topnav a.active {
  background-color: #5D9DB5;
  color: white;
}


/*--------------------------------------------------------------
If no grid support, limit width to 50em and center align
--------------------------------------------------------------*/
@supports not (display: grid) {
  .grid {
    max-width: 50em;
    margin: 0 auto;
  }
}

/*--------------------------------------------------------------
Use flex to create a three-bucket layout 
--------------------------------------------------------------*/

@media screen and (min-width: 700px) {
  @supports (display: flex) {

    .buckets ul {
      display: flex;
      justify-content: space-around;
    }

    .buckets li {
      width: 31%;
    }

  }
}

/*--------------------------------------------------------------
CSS Grid layout for wider screens, when browser supports grid:
--------------------------------------------------------------*/

@media screen and (min-width: 600px) {
  /* Layout with CSS Grid */
  @supports (display: grid) {

    /* Four-column layout. Two center columns have a total max width of 50em: */
    .grid {

      display: grid;
      grid-template-columns: 1fr repeat(2, minmax(auto, 25em)) 1fr;
    }

    /* Center items by placing them in the two center columns: */
    .splash-content,
    .more-content,
    .buckets ul {
      grid-column: 2/4;
    }

    /* Use automatic grid placement + span to let each item span two columns:*/
    

  }
}

  </style>

</head>

<body>


  <div class="topnav">
    <a href="user_profile.php">Profile</a>
    <a class="active" href="#news">News</a>

    <a href="about_me.php">About</a>
   </div>
  
<a class="skip-link screen-reader-text" href="#content">Skip to content</a>

<header class="masthead">
  <div class="logo">Smart GYM</div>
  <img src="gymmm.jpg" alt="A man and a woman standing in the water of the Oslo fjord.">
</header><!-- .masthead -->

<main id="content" class="main-area">
  <section class="splash grid">
    <div class="splash-content">
      <h1 class="content-title">About Smart GYM</h1>
      <div class="splash-text">
        <p>Smart GYM provides everyone modern equipments and advance facilities and train people with intensive care.</p>
      </div><!-- .splash-text -->
    </div><!-- .splash-content -->
  </section><!-- .splash -->


  <section class="more grid">
    <div class="more-content" style="color: white;">
      <h1 class="content-title">Packages</h1>
      <p> We provide 3 facilities : YOGA, Cardiac Exercise and Weight Lifting. Choose your package from the following : <p>
    </div><!-- .more-content -->
  </section><!-- .more -->


  <section class="buckets grid">
    <ul>
      <li>
        <img src="yoga1.jpg" alt="">
        <div class="bucket">
          <h2 class="bucket-title">Yoga</h2>
          <p class="price">1000 Taka/month</p>
          <p>“Yoga is not just an exercise. It is a process and system through which human beings can find their highest possible potential.”</p>
        </div><!-- .bucket -->
      </li>
      <li>
        <img src="cardio.jpg" alt="">
        <div class="bucket">
          <h2 class="bucket-title">Cardio Exercise</h2>
          <p class="price">2000 Taka/month</p>
          <p>Cardio exercise uses the large muscles of your body in movement over a sustained period of time, keeping your heart rate to at least 50-percent of its maximum level. </p>
        </div><!-- .bucket -->
      </li>
      <li>
        <img src="weight.jpg" alt="">
        <div class="bucket">
          <h2 class="bucket-title">Weight Lifting</h2>
          <p class="price">3000 Taka/month</p>
          <p>Olympic weightlifting, or Olympic-style weightlifting, is a sport in which athletes compete in lifting a barbell loaded with weight plates from the ground to overhead, with each athlete vying to successfully lift the heaviest weights.</p>
        </div><!-- .bucket -->
      </li>
    </ul>
  </section><!-- .buckets -->

   


  
</main>

 <footer class="copyright">
        <div class="up" id="up">
            <i class="fas fa-chevron-up"></i>

        </div>
        <p>&copy; 2022 Asiful Islam Himel</p>
    </footer>

</body>