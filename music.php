<!DOCTYPE html>
<html>
<!--
	Web Programming Step by Step
	Lab #3, PHP
	-->

<head>
    <title>Music Viewer</title>
    <meta charset="utf-8" />
    <link href="viewer.css" type="text/css" rel="stylesheet" />
</head>

<body>

    <h1>My Music Page</h1>

    <!-- Exercise 1: Number of Songs (Variables) -->
    <p>
        I love music.
        <?php 
            $totalsongs = 4500;
            $totaltime = $totalsongs/7;

        echo 'I have '. $totalsongs . ' total songs, which is over '.round($totaltime,2) .' hours of music!';
        ?>
    </p>

    <!-- Exercise 2: Top Music News (Loops) -->
    <?php 
           if(isset($_GET["newspages"])){
               $newspages = $_GET["newspages"];
           }else{
               $newspages = 4;
           }
        ?>
        <!-- Exercise 3: Query Variable -->
        <div class="section">
            <h2>Yahoo! Top Music News</h2>

            <ol>
                <?php
           
                   for($i = 1 ;$i<= $newspages; $i++){                       
               echo '<li><a href="http://music.yahoo.com/news/archive/'.$i.'.html">Page '. $i.  '</a></li>';
                }
              ?>
            </ol>
        </div>

        <!-- Exercise 4: Favorite Artists (Arrays) -->

        <!-- Exercise 5: Favorite Artists from a File (Files) -->
        <div class="section">
            <h2>My Favorite Artists</h2>

            <ol>
                <?php
            $list = file("favorite.txt");
            foreach($list as $musiclist){
            echo '<li>'.$musiclist.'</li>'; 
            }
            ?>
            </ol>
        </div>

        <!-- Exercise 6: Music (Multiple Files) -->
        <!-- Exercise 7: MP3 Formatting -->
        <div class="section">
            <h2>My Music and Playlists</h2>
            <ul id="musiclist">
                <?php
                    $mymusiclist = glob("songs/*.mp3");
                    foreach($mymusiclist as $song){?>
                    <li class="mp3item">
                        <a href="<?=$song ?>">
                            <?=$song?>
                        </a>
                        (<?=round(filesize($song)/1024,2)?> KB )<br/><br>
                            <audio controls>
                                <source src="<?=$song ?>" type="audio/mp3" /> Your browser does not support the audio element.
                            </audio>
                    </li>
                    <?php }

                     $playlsit = glob("songs/*.m3u");
                              foreach($playlsit as $myplaylist){ ?>
                        <li class="playlistitem">
                            <?=basename($myplaylist);?>
                                <?php
                                  $plist = file_get_contents($myplaylist);
                                  $mp3_list = explode("\n",$plist);
                                  ?>
                                    <ul>
                                        <?php foreach($mp3_list as $mylist) {
                                        if(strpos($mylist,".mp3")==true){ ?>
                                            <li>
                                                <?=basename($mylist);?>
                                            </li>
                                            <?php }
                                    }?>
                                    </ul>
                        </li>
                        <?php }?>

            </ul>
        </div>

        <div>
            <a href="http://validator.w3.org/check/referer">
                <img src="http://mumstudents.org/cs472/Labs/3/w3c-html.png" alt="Valid HTML5" />
            </a>
            <a href="http://jigsaw.w3.org/css-validator/check/referer">
                <img src="http://mumstudents.org/cs472/Labs/3/w3c-css.png" alt="Valid CSS" />
            </a>
        </div>
</body>

</html>