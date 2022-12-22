<?php
session_start();

if (isset($_SESSION['status'])) {
  if ($_SESSION['status'] == 'loggedin') {
    $buttonlg="Logout";
$buttonlglink="/logout.php";
  }else{
    $buttonlg="Login/Signup";
$buttonlglink="/login.php";
  }
}else{
  $buttonlg="Login/Signup";
$buttonlglink="/login.php";
};
?> 
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">

    <title>About&Contact | CodeWorld</title>
    <meta name="description" content="Official website of Code World.Get All video code information programs and Projects.">
    <meta name="author" content="Code World">
    <link rel="stylesheet" href="css/style.css">

    <link href="css/tstyle.css" rel="stylesheet">
    <style>
        #contact {
            text-shadow: 0 0 2px #fff;
            background-color: #bababa;
            padding: 5px 15px;
            border-radius: 5px;
        }
    </style>
</head>

<body>
    <?php include('header.html'); ?>
    <br>
<center>

  <h1 class="title-font sm:text-4xl text-3xl mb-4 font-medium text-gray-900">Contact Us</h1>
</center>

    <section class="text-gray-600 body-font relative">
    <div class="container px-5 py-24 mx-auto flex sm:flex-nowrap flex-wrap" >
      <div id="mapdiv"
        class="lg:w-2/3 md:w-1/2 bg-gray-300 rounded-lg overflow-hidden sm:mr-10 p-10 flex items-end justify-start relative">
        <iframe width="100%" height="100%" class="absolute inset-0" frameborder="1" title="map" marginheight="0"
          marginwidth="0" scrolling="no"
          src="https://maps.google.com/maps?width=100%&height=600&hl=en&q=MESCOE%20Pune+(Modern%20Education%20Society's%20College%20Of%20Engineering%20Pune)&ie=UTF8&t=1&z=16&iwloc=B&output=embed"></iframe>
        <div class="bg-white relative flex flex-wrap py-6 rounded shadow-md">
          <div class="lg:w-1/2 px-6">
            <h2 class="title-font font-semibold text-gray-900 tracking-widest text-xs">ADDRESS</h2>
            <p class="mt-1">Modern Education Societs's College Of Engineering, Pune, Dist. Pune (MS) <br>Pin: 411001</p>
          </div>


        </div>
      </div>
      <div id="feeddiv" class="lg:w-1/3 md:w-1/2 bg-white flex flex-col md:ml-auto w-full md:p-8 mt-8 md:mt-0">
        <!-- <iframe src="form.html" frameborder="0" width="100%" height="100%"></iframe> -->
        
        <h2 class="text-gray-900 text-lg mb-1 font-medium title-font">Your Feedback is valuable for us...😊</h2>
        <form action="https://getform.io/f/174eecbb-d646-4db5-ac4f-5f379c56f8a7" method="POST">
          <div class="relative mb-4">
            <label for="name" class="leading-7 text-sm text-gray-600">Name</label>
            <input required type="text" id="name" name="name"
              class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
          </div>
          <div class="relative mb-4">
            <label for="email" class="leading-7 text-sm text-gray-600">Email</label>
            <input required type="email" id="email" name="email"
              class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
          </div>
          <div class="relative mb-4">
            <label for="message" class="leading-7 text-sm text-gray-600">Message</label>
            <textarea required id="message" name="message"
              class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 h-32 text-base outline-none text-gray-700 py-1 px-3 resize-none leading-6 transition-colors duration-200 ease-in-out"></textarea>
          </div>
          <input type="text" name="App_Name" id="App_Name" value="Coding World" hidden>
          <button
            class="text-white bg-indigo-500 border-0 py-2 px-6 focus:outline-none hover:bg-indigo-600 rounded text-lg">Submit</button>
          <p class="text-xs text-gray-500 mt-3">We will receive your details filled above.</p>
        </form> 
      </div>
    </div>
  </section>






        
    <br>
    <?php include('footer.html'); ?>
</body>
<html>