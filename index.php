
        <?php include "includes/header1.php";?>

        <div id="all">
            <div id="search_div">
                <h1>Worlds best toursim site</h1>
                <span>explore the world with us</span><br><br>
                <form action="search_city.php" method="POST">
                <input type="text" class="search_input" name="the_search_city" placeholder="try dargeeling...">
                <input type="submit" name="search_city_btn" class="search_btn" value = "search"/>
                </form>
            </div>

            <?php include "includes/navigation.php";?>

            <div id="not_sure">
                <div class="sure_head">
                    <h1>Not sure where to go?</h1>
                    <span>let us help you.</span><br>
                    <input type="text" class="not_sure_input" placeholder="Which place do you like..."/>
                </div>
                <div class="sure_slide">
                    <div id="not_sure_container">
                        <img src="images/redfort.jpg" class="not_sure_img"/>
                        <img src="images/tajmahal.jpg" class="not_sure_img"/>
                        <img src="images/tigerhills.jpg" class="not_sure_img"/>
                        <img src="images/teesta.jpg" class="not_sure_img"/>
                    </div>
                </div>
            </div>

            <div id="gallary_div">
                <div class="show">
                    <img src="tourists/hampi.jpg" id="show_gallary_img"/>
                </div>
                <div class="video_container"></div>
                <div class="img_container">
                    <div id="gallary_container" onclick="changeImageOnClick(event)">
                        <img src="tourists/hampi.jpg" class="gallary_img"/>
                        <img src="tourists/grass-3840x2160-4k-hd-wallpaper-green-drops-dew-sun-rays-3896.jpg" class="gallary_img"/>
                        <img src="tourists/julian-yu-_WuPjE-MPHo-unsplash.jpg" class="gallary_img"/>
                        <img src="tourists/1475949226-9875.jpg" class="gallary_img"/>
                        <img src="tourists/agra-fort_story_650_013015114748.jpg" class="gallary_img"/>
                        <img src="tourists/bijapur_itinerary-cover.jpg" class="gallary_img"/>
                        <img src="tourists/Ghats-Banks-on-the-Ganges-River-Hindu-holy-city-on-Ganges-Banaras.jpg" class="gallary_img"/>
                        <img src="tourists/redfort.jpg" class="gallary_img"/>
                        <img src="tourists/Places-that-Americans-Visit-in-India.jpg" class="gallary_img"/>
                        <img src="tourists/qutub-minar.jpg" class="gallary_img"/>
                        <img src="tourists/Where-does-UK-travelers-visit-in-India.jpg" class="gallary_img"/>
                        <img src="tourists/jodhpur.jpg" class="gallary_img"/>
                        <img src="tourists/mumbai.jpg" class="gallary_img"/>
                        <img src="tourists/Ghats-Banks-on-the-Ganges-River-Hindu-holy-city-on-Ganges-Banaras.jpg" class="gallary_img"/>
                        <img src="tourists/1475949226-9875.jpg" class="gallary_img"/>
                        <img src="tourists/redfort.jpg" class="gallary_img"/>
                        <img src="tourists/trekking.jpg" class="gallary_img"/>
                        <img src="tourists/banaras.jpg" class="gallary_img"/>
                    </div>
                </div>
            </div>

        </div>

        <div id="trailer">
            <div id="show_trailer">
                <div id="close_btn_div">
                        <input type="button" value="X" onclick="closeTrailer()" id="close_btn"/>
                </div>
                <div id="trailer_video">
                    <video width="100%" height="700px" controls>
                        <source src="videos/Enchanting India.mp4" type="video/mp4">
                    </video>
                </div>
            </div>
                    
        </div>

        <?php include "includes/feedback1.php";?>

 <?php include "includes/footer1.php";?>