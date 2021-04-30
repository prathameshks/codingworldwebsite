<?php
session_start();

include('php/whichbtn.php');
if (isset($_SESSION['status'])){
if ($_SESSION['status']=='loggedin'){
  $userid = $_SESSION['userid'];
  $username = $_SESSION['name'];
  $useremail = $_SESSION['email'];
  $usertype = $_SESSION['usertype'];
  $usertstamp = $_SESSION['tstamp'];
}else{
  $userid= 0;
  $username = 'Guest';
  $useremail = 'Guest';
  $usertype = 0;
  $usertstamp = '';
}
}else{
  $userid= 0;
  $username = 'Guest';
  $useremail = 'Guest';
  $usertype = 0;
  $usertstamp = '';
  $_SESSION['status']='loggedout';
}
?>

<!doctype html>

<html lang="en">

<head>
  <meta charset="utf-8">

  <title>Home | CodeWorld</title>
  <meta name="description" content="Official website of Code World.Get All video code information programs and Projects.">
  <meta name="author" content="Code World">
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/styleslider.css">
  <script src="js/sliderjs.js"></script>

  <link href="css/tstyle.css" rel="stylesheet">
  <style>
    #home {
      text-shadow: 0 0 2px #fff;
      background-color: #bababa;
      padding: 5px 15px;
      border-radius: 5px;
    }

    img {
      opacity: 1.0;

    }
  </style>

</head>

<body class="body">
  <?php include('header.html'); ?>

  <?php
  if (isset($messagefresh)) {
    if ($messagefresh == 'in') {
      echo '
          <div id="messagediv" class="bg-opacity-70 my-3 flex justify-between items-center bg-green-200 relative text-green-600 py-3 px-3 rounded-lg">
          <div>
              <span class="font-semibold text-green-700">Sucess</span>
              You Have Sucessfully Logged In!
          </div>
          <div>
              <button onClick="hide(\'messagediv\')" type="button" class=" text-green-700">
                  <span class="text-2xl">&times;</span>
              </button>
          </div>
      </div>
      ';
    } else {
      echo '
          <div id="messagediv" class="bg-opacity-70 my-3 flex justify-between items-center bg-yellow-200 relative text-yellow-600 py-3 px-3 rounded-lg">
          <div>
              <span class="font-semibold text-yellow-700">Sucess</span>
              You Have Sucessfully Logged Out!
          </div>
          <div>
              <button onClick="hide(\'messagediv\')" type="button" class=" text-yellow-700">
                  <span class="text-2xl">&times;</span>
              </button>
          </div>
      </div>
      ';
    }
    unset($_SESSION['messagefresh']);
    global $messagefresh;
    unset($messagefresh);
  };
  ?>



<?php
if(isset($_SESSION['userid'])){
  ?>
<section class="text-gray-600 body-font">
  <div class="container px-5 py-14 mx-auto flex flex-col text-center w-full ">
    <h1 class="sm:text-3xl text-2xl font-medium title-font mb-4 text-gray-900">Welcome <?=$username?></h1>
    <p class="lg:w-2/3 mx-auto leading-relaxed text-base"><?php if($_SESSION['status']=='loggedin'){echo 'You are now logged In. You can now comment on tutorials video and access profile page.';}else{echo "You are <b>Not logged In</b>. You can't comment on tutorials video and access profile page.";} ?></p>
  </div>
</section>
  <?php
}
?>







  <section class="text-gray-900 body-font bg-transparent sectionopacity" id="introduction">
    <div class="container mx-auto flex px-5 py-24 md:flex-row flex-col items-center">
      <div class="lg:flex-grow md:w-1/2 lg:pr-24 md:pr-16 flex flex-col md:items-start md:text-left mb-16 md:mb-0 items-center text-center">
        <h1 class="title-font sm:text-4xl text-3xl mb-4 font-medium text-gray-900">Welcome to
          <br class="hidden lg:inline-block">CODE WORLD <b>{</b><span class="leavethis">🌍</span><b>}</b>
        </h1>
        <p class="mb-8 leading-relaxed">
          This is the official website of <b>CODE WORLD</b> YouTube channel. You will get all videos links, their source code, Project,s project ideas and much more...<br><i>Search and learn!</i>
        </p>
        <div class="flex justify-center">
          <button class="leavethis inline-flex text-white bg-indigo-500 border-0 py-2 px-6 focus:outline-none hover:bg-indigo-600 rounded text-lg">Tutorials</button>
          <button class="leavethis ml-4 inline-flex text-gray-700 bg-gray-100 border-0 py-2 px-6 focus:outline-none hover:bg-gray-200 rounded text-lg">Projects</button>
        </div>
      </div>
      <div class="lg:max-w-lg lg:w-full md:w-1/2 w-5/6">



        <div class="ism-slider" data-play_type="loop" data-buttons="false" data-radios="false" id="my-slider">

          <ol>
            <li>
              <img class="object-cover object-center rounded" src="images/slider/8.png">
            </li>
            <li>
              <img class="object-cover object-center rounded" src="images/slider/1.png">
            </li>
            <li>
              <img class="object-cover object-center rounded" src="images/slider/2.png">
            </li>
            <li>
              <img class="object-cover object-center rounded" src="images/slider/3.png">
            </li>
            <li>
              <img class="object-cover object-center rounded" src="images/slider/4.png">
            </li>
            <li>
              <img class="object-cover object-center rounded" src="images/slider/5.png">
            </li>
            <li>
              <img class="object-cover object-center rounded" src="images/slider/6.png">
            </li>
            <li>
              <img class="object-cover object-center rounded" src="images/slider/7.png">
            </li>
          </ol>
        </div>

      </div>
    </div>
  </section>

  <section class="text-gray-600 body-font">
    <div class="container px-5 py-24 mx-auto">
      <div class="flex flex-col text-center w-full mb-20">
        <h2 class="text-xs text-indigo-500 leavethis tracking-widest font-medium title-font mb-1">Most Important Question Before You Begin</h2>
        <h1 class="sm:text-3xl text-2xl font-medium title-font text-gray-900">How to Learn?</h1>
      </div>
      <div class="flex flex-wrap -m-4">
        <div class="p-4 md:w-1/3">
          <div class="flex rounded-lg h-full bg-gray-100 p-8 flex-col">
            <div class="flex items-center mb-3">
              <div class="w-8 h-8 mr-3 inline-flex items-center justify-center rounded-full leavethis bg-indigo-500 text-white flex-shrink-0">
                <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-5 h-5" viewBox="0 0 56.401 56.4">
                  <g>
                    <polygon points="33.721,6.26 26.215,6.26 22.83,12.858 29.901,12.858 		" />
                    <polygon points="46.521,6.26 39.015,6.26 35.63,12.858 42.701,12.858 		" />
                    <polygon points="56.25,6.26 51.816,6.26 48.43,12.858 56.25,12.858 		" />
                    <polygon points="20.92,6.358 0,6.358 0,8.214 0,12.858 17.101,12.858 		" />
                    <path d="M0.15,45.974c0,2.302,1.866,4.167,4.167,4.167h47.917c2.301,0,4.167-1.865,4.167-4.167V17.154H0.15V45.974z
			 M21.208,29.655c0-2.301,1.669-3.332,3.727-2.303l8.864,4.432c2.058,1.028,2.058,2.697,0,3.727l-8.864,4.432
			c-2.058,1.028-3.727-0.003-3.727-2.303V29.655z" />
                  </g>
                </svg>
              </div>
              <h2 class="text-gray-900 text-lg title-font font-medium">Watch <span class="leavethis">👀</span> </h2>
            </div>
            <div class="flex-grow">
              <p class="leading-relaxed text-base">Go to Tutorials page, Find video realted to your course or Project and Watch it!</p>
              <a href="/tutorials.php" class="mt-3 text-indigo-500 leavethis inline-flex items-center">Explore Now
                <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4 ml-2" viewBox="0 0 24 24">
                  <path d="M5 12h14M12 5l7 7-7 7"></path>
                </svg>
              </a>
            </div>
          </div>
        </div>
        <div class="p-4 md:w-1/3">
          <div class="flex rounded-lg h-full bg-gray-100 p-8 flex-col">
            <div class="flex items-center mb-3">
              <div class="w-8 h-8 mr-3 inline-flex items-center justify-center rounded-full leavethis bg-indigo-500 text-white flex-shrink-0">
                <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-5 h-5" viewBox="0 0 500.00001 500.00001">
                  <g transform="translate(0 -552.36)" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="38.966">
                    <path d="m125.28 700.91-101.56 101.56 101.56 101.56" />
                    <path d="m376.97 700.91 101.56 101.56-101.56 101.56" />
                    <path d="m274.86 670.23-54.621 265.77" />
                  </g>
                </svg>
              </div>
              <h2 class="text-gray-900 text-lg title-font font-medium">Code <span class="leavethis">👨‍💻</span> </h2>
            </div>
            <div class="flex-grow">
              <p class="leading-relaxed text-base">After watching the video go to your PC or any device where you can do coading And make the programs seen in video first try it yourself if you got any problem the see it below the video in tutorials page.</p>
              <a href="/tutorials.php" class="mt-3 text-indigo-500 leavethis inline-flex items-center">Explore now
                <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4 ml-2" viewBox="0 0 24 24">
                  <path d="M5 12h14M12 5l7 7-7 7"></path>
                </svg>
              </a>
            </div>
          </div>
        </div>
        <div class="p-4 md:w-1/3">
          <div class="flex rounded-lg h-full bg-gray-100 p-8 flex-col">
            <div class="flex items-center mb-3">
              <div class="w-8 h-8 mr-3 inline-flex items-center justify-center rounded-full leavethis bg-indigo-500 text-white flex-shrink-0">
                <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-5 h-5" viewBox="0 0 20 20">
                  <g transform="translate(-377.32 -357.36)">
                    <g transform="matrix(.45699 0 0 .45699 235.14 196.47)" fill-rule="evenodd" stroke="currentColor">
                      <path d="m346 392.36c-1.894-4.3686-4.9169-4.5055-10-5v-10c5-5 11.03-9.773 10-20h-26c-1.0298 10.227 5 15 10 20v10c-5.0831 0.49454-8.106 0.63135-10 5h26z" fill="none" />
                      <g fill="none">
                        <path d="m320 357.36c-6.7844-7.9414-11.53 12.622 4.1161 13.939" />
                        <path d="m346 357.36c6.7844-7.9414 11.53 12.622-4.1161 13.939" />
                      </g>
                    </g>
                  </g>
                </svg>
              </div>
              <h2 class="text-gray-900 text-lg title-font font-medium">All Done <span class="leavethis">🎉</span> </h2>
            </div>
            <div class="flex-grow">
              <p class="leading-relaxed text-base">Thats all you have completed on topic keep on going ahead.<span class="leavethis">✌️</span> <br>Now you can make projects Click below to go to projects</p>
              <a href="/projects.php" class="mt-3 text-indigo-500 leavethis inline-flex items-center">Explore Now
                <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4 ml-2" viewBox="0 0 24 24">
                  <path d="M5 12h14M12 5l7 7-7 7"></path>
                </svg>
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <br>
  <?php include('footer.html'); ?>
  <script src="js/validation.js">
  </script>
</body>

</html>