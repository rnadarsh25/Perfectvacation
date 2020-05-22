<div id="footer">
            <div class="copyright">
                <h1><img src="images/logo.png" class="logo"/>
                    COPYRIGHT  &COPY; perfectvacation 2020</h1>
                    <h2><span style="color: orange; letter-spacing: 1px;">info@perfectvacation.com</span> - Jalandhar, Punjab, 144411.</h2>
            </div>
            <div class="list_div">
                <ul>
                    <a href="#"><li>Home</li></a>
                    <a href="#"><li>Trips</li></a>
                    <a href="#"><li>Planning</li></a>
                    <a href="#"><li>About</li></a>
                </ul>
            </div>
            <div class="list_div">
                <ul>
                    <a href="#"><li>FAQ</li></a>
                    <a href="#"><li>Guides</li></a>
                    <a href="#"><li>Blog</li></a>
                    <a href="#"><li>Contact</li></a>
                </ul>
            </div>
            <div class="list_div">
                <i style="background:#343433;padding: 10px 15px 10px 15px; color: white;margin-top: 20px;"
                 class="fab fa-facebook-f"></i>
                <i style="background:#343433;padding: 10px 15px 10px 15px; color: white;margin-top: 20px;"
                 class="far fa-envelope"></i>
                <br><br>
                <strong style="color: white; font-size: 16px; font-family: 'Raleway', sans-serif;letter-spacing: 1px;">
                    Design by <span style="color: orange; font-size: 16px; font-family: 'Raleway', sans-serif;letter-spacing: 1px;">Adarsh Singh Tiwari.</span></strong> <br><br>
                    <strong style="color: white; font-size: 16px; font-family: 'Raleway', sans-serif;letter-spacing: 1px;">
                        Email <span style="color: orange; font-size: 16px; font-family: 'Raleway', sans-serif;letter-spacing: 1px;">ast.adarsh99@gmail.com</span></strong><br><br>    
                    <strong style="color: white; font-size: 16px; font-family: 'Raleway', sans-serif;letter-spacing: 1px;">
                        Marketing by <span style="color: orange; font-size: 16px; font-family: 'Raleway', sans-serif;letter-spacing: 1px;">perfectGuide.</span></strong>
                
            </div>
        </div>
    </div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script>

    $(document).ready(function(){
        $("#agent_btn").click(function(){
            $("#show_agent").toggle(700);
        })
    })
</script>

    <script>
        function changeImageOnClick(event){
            event = event || window.event;
            var targetElement = event.target || event.srcElement;
        document.getElementById('show_gallary_img').src = targetElement.getAttribute('src');
        }

        function showTrailer(){
            document.getElementById('trailer').style.display = "block";
        }
        function closeTrailer(){
            document.getElementById('trailer').style.display = "none";
        }
    </script>


</body>
</html>