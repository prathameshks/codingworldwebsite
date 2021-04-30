<?php
require("timeconv.php");
function showvideo($vytid,$con)
{
    $querygd = "select * from video where vytid='$vytid'";
    $rungd = mysqli_query($con, $querygd);
    $ytdata = mysqli_fetch_assoc($rungd);
    $svid = $ytdata['vid'];
    $svcourse = $ytdata['vcourse'];
    $svtitle = $ytdata['ytitle'];
    $svimg = $ytdata['yimg'];
    $svdesc = str_replace("\\n", " ", substr($ytdata['ydesc'], 0, 150) . "....   ");
    $svtime = $ytdata['ypubat'];
?>
    <div class="rounded-t-xl overflow-hidden bg-transparent px-6 py-8">
        <div class="max-w-md mx-auto bg-white rounded-xl shadow-md overflow-hidden md:max-w-6xl">
            <div class="md:flex">
                <div class="md:flex-shrink-0">
                    <a href="/post.php?vid=<?= $svid ?>">
                        <img class="h-full w-full object-cover md:w-96" src="<?= $svimg ?>" width="448" height="299" alt="Thumbnail">
                    </a>
                </div>
                <div class="p-8">
                    <a class="no-underline" href="/tutorials.php?course=<?= $svcourse ?>">
                        <div class="uppercase tracking-wide text-sm text-indigo-500 font-semibold"><?= $svcourse ?></div>
                    </a>
                    <a href="/post.php?vid=<?= $svid ?>" class="block mt-1 text-lg leading-tight font-medium text-black hover:underline"><?= $svtitle ?></a>
                    <a href="/post.php?vid=<?= $svid ?>">
                        <p class="mt-2 text-gray-500"><?= $svdesc ?></p>
                        <P class="font-bold text-blue-400">Posted <?= timeago($svtime) ?></P>
                    </a>
                </div>
            </div>
        </div>
    </div>
<?php
}
?>