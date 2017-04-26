<html>
    <body>
        <div id="content">
            <!-- <form id="suchleiste" method="post" action="/Default/suche">
                 <div id="flexer">
                     <input id="suchbar" name="searchbar" type="search" placeholder="Search" onchange=""/>
                     <input  id="suchbtn" type="submit" name="Suche" value="Suchen"/>
                 </div>
             </form> -->
            <form  method="post" action="/Default/suche">
            <div id="suchleiste" class="input-group stylish-input-group">
                <input name="searchbar" type="search" class="form-control" placeholder="Search">
                <span class="input-group-addon">
                        <button type="submit">
                            <span class="glyphicon glyphicon-search"></span>
                        </button>
                </span>
                <p><?php $Ksuchergebnis?></p>

            </div>
            </form>
             <ul>
                <?php
               // foreach($i < $videoid i++){

                //}
                ?>
                 <!--div class="fb-video" data-href="https://www.facebook.com/facebook/videos/10153231379946729/" data-width="500" data-show-text="true"><blockquote cite="https://www.facebook.com/facebook/videos/10153231379946729/" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/facebook/videos/10153231379946729/">How to Share With Just Friends</a><p>How to share with just friends.</p>Posted by <a href="https://www.facebook.com/facebook/">Facebook</a> on Freitag, 5. Dezember 2014</blockquote></div-->
                 <div class="video">
                 <li><?php var_dump($videoId);?>
                    <iframe src="https://www.facebook.com/plugins/video.php?href=https%3A%2F%2Fwww.facebook.com%2Ffacebook%2Fvideos%2F<?php echo $videoId?>%2F&width=500&show_text=false&appId=1159851510827809&height=197" width="350" height="197" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true" allowfullscreen>
                    </iframe>
                 </li>
                 </div>



             </ul>
         </div>
     </body>
 </html>