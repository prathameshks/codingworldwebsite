<?php
session_start();
$con = mysqli_connect("localhost", "root", "", "userdata");
if (isset($_GET['vid'])) {
    $vid = $_GET['vid'];

    $datagetquery = "SELECT * FROM `video` where `vid`=$vid";
    $vresult = mysqli_query($con, $datagetquery);
    $vdata = mysqli_fetch_assoc($vresult);
    $vcourse = $vdata['vcourse'];
    $vytid = $vdata['vytid'];
    $vnotes = $vdata['vnotes'];
    // print_r($vdata);
    $vdate = $vdata['vdate'];
    $vtitle = $vdata['ytitle'];
    $vdesc = $vdata['ydesc'];
    $vpubat = $vdata['ypubat'];
    $vimg = $vdata['yimg'];
    $views =  $vdata['views'] + 1;
    $viewquery = "UPDATE `video` SET `views`=$views WHERE `vid`=$vid";
    $viewresult = mysqli_query($con, $viewquery);
    $q2 = "SELECT * FROM code WHERE vid=$vid;";
    $re2 = mysqli_query($con, $q2);
    $codedata = mysqli_fetch_all($re2, MYSQLI_ASSOC);
} else {
    header("location:tutorials.php");
}
require("php/showvideo.php");
include('php/whichbtn.php');
// include('php/timeconv.php');

?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">

    <title><?= $vtitle ?> | CodeWorld</title>
    <meta name="description" content="Official website of Code World.Get All video code information programs and Projects.">
    <meta name="author" content="Code World" />
    <link rel="stylesheet" href="css/style.css" />

    <link href="css/tstyle.css" rel="stylesheet" />
    <link rel="stylesheet" href="prism/prism.css" />
    <style>
        #tutorials {
            text-shadow: 0 0 2px #fff;
            background-color: #bababa;
            padding: 5px 15px;
            border-radius: 5px;
        }

        #videoframe {
            width: 100%;
            height: calc(100vw*350/640);
        }

        div.scrollmenu {
            background-color: transparent;
            overflow: auto;
            white-space: nowrap;
            display: flex;
        }

        div.scrollmenu div {
            display: inline-block;
            color: white;
            text-align: center;
            padding: 6px;
            text-decoration: none;
        }

        .commentsection {
            max-height: 400px;
            overflow-y: scroll;
        }
    </style>
</head>

<body>
    <script type="text/javascript" src="prism/prism.js"></script>
    <?php include('header.html'); ?>
    <br>
    <script>
        function changedesc(type) {
            if (type) {
                var desc = document.getElementById('desc');
                desc.innerHTML = "<?= $vdesc ?>";
                var desclink = document.getElementById('desclink');
                desclink.innerHTML = "SHOW LESS";
                desclink.setAttribute("onclick", "changedesc(0)")
            } else {
                var desc = document.getElementById('desc');
                desc.innerHTML = "<?= substr($vdesc, 0, 300) ?>";
                var desclink = document.getElementById('desclink');
                desclink.innerHTML = "SHOW MORE";
                desclink.setAttribute("onclick", "changedesc(1)")
            }
        }
    </script>

    <div class="">
    <div class="px-3 m-auto">
				<h1 class="pt-6">
					<span class="bg-brand font-bold text-center text-white text-3xl sm:text-4xl px-3 mb-5 sm:mb-16" style="box-decoration-break: clone;-webkit-box-decoration-break: clone;"><span><?=$vtitle?></span></span>
				</h1>
			</div>

        <div class="w-full p-16 m-auto">
            <iframe id="videoframe" class="leavethis" src="https://www.youtube.com/embed/<?= $vytid ?>" title="YouTube video" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        </div>
        <div class="m-auto w-3/4">
            <a class="no-underline" href="/tutorials.php?course=<?= $vcourse ?>">
                <div class="uppercase tracking-wide text-sm text-indigo-500 font-semibold"><?= $vcourse ?></div>
            </a>

            <p class="m-2 font-bold	text-2xl text-black "><?= $vtitle ?></p>

            <P class="m-2 text-purple-700">Posted <?= timeago($vpubat) ?></P>
            <P class="m-2 text-purple-700"><?= $views ?> Views </P>
            <p id="desc" class="m-2 text-gray-500 overflow-hidden"><?= substr($vdesc, 0, 300) ?></p>
            <a id="desclink" onclick=changedesc(1) class="m-2 font-bold cursor-pointer underline text-gray-500 overflow-hidden">SHOW MORE</a>

            <section class="bg-white rounded p-4 my-4">
                <h2 class="font-extrabold">Comments</h2>
                <div class="commentsection ">
                    <?php
                    $cq1 = "SELECT * FROM comment where vid=$vid ORDER BY cid DESC";
                    $cr1 = mysqli_query($con, $cq1);
                    $cdata = mysqli_fetch_all($cr1, MYSQLI_ASSOC);
                    foreach ($cdata as $cmt) {
                        $userid = $cmt['userid'];
                        $comment = $cmt['comment'];
                        $ctime = $cmt['time'];
                        $cq2 = "SELECT `name`,`email` from `userdata` WHERE `userid`=$userid";
                        $cr2 = mysqli_query($con, $cq2);
                        $udata = mysqli_fetch_row($cr2);
                        $username = $udata[0];
                        $useremail = $udata[1];
                    ?>

                        <div class="flex py-3 border-2  rounded-lg">
                            <div class="w-1/8">
                                <a class="block rounded-full h-12 w-12 p-1  mr-2 bg-gray-300"><svg class="h-10 w-10 text-green-500" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" />
                                        <path d="M9 7 h-3a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-3" />
                                        <path d="M9 15h3l8.5 -8.5a1.5 1.5 0 0 0 -3 -3l-8.5 8.5v3" />
                                        <line x1="16" y1="5" x2="19" y2="8" />
                                    </svg></a>
                            </div>
                            <div class="w-7/8">
                                <div>
                                    <span class="font-bold"><a class="text-black"><?= $username ?></a></span>
                                    <span class="text-gray-700"><?= $useremail ?></span>
                                    <span class="text-gray-700">·</span>
                                    <span class="text-gray-700"><?= timeago($ctime) ?></span>
                                </div>
                                <div class="">
                                    <p class="my-3 text-sm">
                                        <?= $comment ?>
                                    </p>
                                </div>
                            </div>
                        </div>
                    <?php

                    }
                    ?>
                </div>
                <div class="addcmt">
                    <?php
                    if(isset($_SESSION['userid'])){
                    ?>
                    <form action="php/addcmt.php" method="POST">
                    <div class="w-full mt-4 ">
                        <input name="vid" type="hidden" value="<?=$vid?>">
                        <input name="userid" type="hidden" value="<?=$_SESSION['userid']?>">
                        <textarea type="text" class="block w-full focus:outline-0 bg-white border-2 py-3 px-6 mb-2 sm:mb-0" name="cmt" placeholder="Enter your Comment" required ></textarea>
                        <button type="submit" class="inline-block px-6 py-2 text-xs font-medium leading-6 text-center text-blue-700 uppercase transition bg-transparent border-2 border-blue-700 rounded ripple hover:bg-blue-100 focus:outline-none waves-effect m-2">POST</button>
                    </div>
                    </form>
                    <?php
                    }else{
                        ?>
                        <div>
                            <a href="login.php">
                                <span>Please </span>
                                <button class="inline-block px-6 py-2 text-xs font-medium leading-6 text-center text-blue-700 uppercase transition bg-transparent border-2 border-blue-700 rounded ripple hover:bg-blue-100 focus:outline-none waves-effect m-2">Log In</button>
                                <span> To Post a Comment </span>
                            </a>
                        </div>
                        
                        
                        <?php
                    }
                    ?>
                </div>
            </section>


            <div class="notes w-96 m-auto">
                <a href="<?= $vnotes ?>">
                    <button type="button" class="py-2 m-8 px-4 flex justify-center  items-center  bg-green-500 hover:bg-green-700 focus:ring-green-500 focus:ring-offset-green-200 text-white w-full transition ease-in duration-200 text-center text-base font-semibold shadow-md focus:outline-none focus:ring-2 focus:ring-offset-2  rounded-full">
                        <svg class="h-8 m-2 w-8 text-white" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <polyline points="8 17 12 21 16 17" />
                            <line x1="12" y1="12" x2="12" y2="21" />
                            <path d="M20.88 18.09A5 5 0 0 0 18 9h-1.26A8 8 0 1 0 3 16.29" />
                        </svg>
                        <span>Download Notes</span>
                    </button>
                </a>
            </div>
            <?php
            foreach ($codedata as $videocode) {
                $vcode = str_replace("\\r\\n", "&#10;", $videocode['code']);
                $language = $videocode['language'];

            ?>
                <h1 class="order-1 text-2xl sm:text-2xl sm:leading-none font-bold tracking-tight text-gray-700 mb-4">Code In the Tutorial - <span class="text-blue-400"><?= $language ?></span></h1>
                <div class="leavethis code">
                    <pre><code class="language-<?= $language ?>"><?php if ($language == 'html') {
                                                                        echo htmlspecialchars($vcode);
                                                                    } else {
                                                                        echo $vcode;
                                                                    } ?></code></pre>
                </div>
            <?php
            }

            ?>



            <div class="scrollmenu border-2 border-gray-400 rounded-xl holder bg-white   w-full grid ">
                <?php
                $datagetquery = "SELECT * FROM `video` where `vcourse`='$vcourse' AND `vid`!=$vid ORDER BY `vid`";
                $vresult = mysqli_query($con, $datagetquery);
                $vdata = mysqli_fetch_all($vresult, MYSQLI_ASSOC);
                foreach ($vdata as $video) {
                    $svid = $video['vid'];
                    $svcourse = $video['vcourse'];
                    $svtitle = $video['ytitle'];
                    $svimg = $video['yimg'];
                    $svdesc = str_replace("\\n", " ", substr($video['ydesc'], 0, 80) . "....");
                    $svtime = $video['ypubat'];
                    $svviews = $video['views'];

                ?>


                    <div class="each mb-10 w-48 m-4 shadow-lg border-gray-800  bg-white relative">
                        <img class="w-full" src="<?= $svimg ?>" alt="Thumbnail" />
                        <div class="badge absolute top-0 right-0 bg-indigo-500 m-1 text-gray-200 p-1 px-2 text-xs font-bold rounded"><?= $svcourse ?></div>
                        <div class="info-box text-xs flex p-1 font-semibold text-gray-500 bg-gray-300">
                            <span class="mr-1 p-1 px-2 font-bold"><?= $svviews ?> views</span>
                        </div>
                        <br>
                        <div class="text-gray-800 w-full overflow-hidden ">
                            <span class="font-bold break-words text-gray-700 "><?= $svtitle ?></span>
                            <span class=" text-sm   border-gray-400 mb-2 text-gray-700"><?= $svdesc ?></span>
                        </div>
                    </div>

                <?php
                }
                ?>

            </div>
        </div>
    </div>


    </div>



    <br>
    <?php include('footer.html'); ?>


</body>

</html>