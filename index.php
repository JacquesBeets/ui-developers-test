<?php
  if($_POST["submit"]) {
      $recipient=$_POST["senderEmail"];
      $subject="Form to email message";
      $sender="Jacques-FirstViewContactForm";
      $senderEmail="jacques@jacquesbeets.com";
      $message="Thank you for signing up!";

      $mailBody="Name: $sender\nEmail: $senderEmail\n\n$message";

      mail($recipient, $subject, $mailBody, "From: $sender <$senderEmail>");

      $thankYou="<p>Thank you! Your message has been sent.</p>";

  }
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
  <link href="https://fonts.googleapis.com/css?family=PT+Sans:400,700" rel="stylesheet">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
  <link rel="stylesheet" href="styles.css"></style>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>FirstView UI Test</title>
</head>
  <body>
  <div id="app">
    <div class="container h-100">
      <div class="row align-items-center h-100"> 
        <div class="column col-sm-10 col-md-8 col-lg-6 mx-auto">
          <!-- Snackbar confirmation -->
          <div id="snackbar" class="snack" :class="{show: showSnack}">Thank you for your submission! You will receive an email shortly.</div>

          <!-- Landing page and animation -->
          <transition name="landingCard" mode="out-in">
              <template v-if="cardFlipped">
                <div class="pageLandingElement" key="landing">
                    <div class="header-text">
                        <h3 class="text-center">{{title}}</h3>
                      </div>
                      <svg class="svg" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                        viewBox="0 0 500 500"  xml:space="preserve">
                      <path id="Box-Stroke" class="st0" d="M420.7,463.4H79.3c-23.5,0-42.7-19.2-42.7-42.7v-65.9v-18.5v-16V79.3
                        c0-23.5,19.2-42.7,42.7-42.7h341.5c23.5,0,42.7,19.2,42.7,42.7v341.5C463.4,444.2,444.2,463.4,420.7,463.4z"/>
                      <g id="Box-fill">
                        <rect id="XMLID_1_" x="51.1" y="52.1" width="397.7" height="395.1"/>
                      </g>
                      <g id="FV-letters">
                        <g id="letterF">
                          <path id="XMLID_86_" class="st1" d="M108,137.2h121.5v24.4h-92.4v75h85.4v24.1h-85.4v102.1H108V137.2z"/>
                        </g>
                        <g id="letterV">
                          <path id="XMLID_10_" class="st1" d="M294.4,362.8l-73.7-225.6h31.5l35.1,111.2c9.7,30.5,18.1,57.9,24.1,84.4h0.7
                            c6.4-26.1,15.7-54.6,25.8-84l38.2-111.5h31.1l-80.7,225.6H294.4z"/>
                        </g>
                      </g>
                      </svg>
                      <div class="contact-btn d-flex justify-content-center">
                        <button type="button" @click="flipCard" class="btn btn-lg btn-outline-dark btn-block w-75">TO THE FORM!</button>
                      </div>
                </div>
            </template>

          <!-- Contact Form -->
                <template v-else>
                    <div class="card shadow" key="contact">
                        <div class="card-header bg-dark text-white">
                          <img src="images/FirstView-Logo.png" alt="FV-logo">
                        </div>
                        <div class="card-body ">
                          <form @submit="checkForm">
                            <div class="form-group">
                              <label for="nameInput">Name</label>
                              <input 
                                type="text" 
                                class="form-control mb-3"
                                id="nameInput" 
                                placeholder="Your Name" 
                                v-model="name"
                              >
                              <label for="emailInput">Email</label>
                              <input 
                                type="email" 
                                class="form-control mb-3" 
                                id="emailInput" 
                                placeholder="Your Email Address"
                                name="senderEmail" 
                                v-model="email"
                              >
                              <label for="dateInput">Date</label>
                              <input 
                                type="date" 
                                class="form-control mb-3" 
                                id="dateInput"
                                v-model="date"
                              >
                              <label for="passwordInput">Password</label>
                              <input 
                                type="password" 
                                class="form-control mb-3" 
                                id="passwordInput" 
                                placeholder="Your Password" 
                                v-model="password"
                              >
                            </div>
                            <hr>
                            <!-- Form validation message -->
                            <div v-if="errors.length" class="alert alert-danger" role="alert">
                              <p>Please correct the following fields:</p>
                              <ul>
                                <li v-for="error in errors">{{ error }}</li>
                              </ul>
                            </div>
                            <button type="submit" class="btn btn-outline-dark btn-block" name="submit">SUBMIT</button>
                          </form>
                        </div>
                      </div>
              </template>
            </transition>
        </div>
      </div>
    </div>
    <script src="js/app.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/2.0.1/TweenMax.min.js"></script>
    <script src="js/gsapAnimation.js"></script>
  </body>
</html>