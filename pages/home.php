<?php 
   if(!empty($_SESSION['loggedin'])){
       echo "<h1 class='hello'>Welcome back, " .$_SESSION['customerData']['FirstName']. "</h1>";
    }
?>
    <section class="offerBox">
        <!--Image belongs to Jonathan Need Photogrpahy (https://www.jneedphotography.com/photo_16354830.html)-->
        <img class="offerImg" alt="Bird food 50% off this month!" src="images/beautifulBird.png" />
        <h1 class="offerTxt">50% off bird food this month!</h1>
    </section>
    <div class="content">
        <section class="informationCont">
            <div class="tab">
                <button class="tablinks" onclick="openTab(event, 'WhoAreWe')" id="whoAreWe">WHO ARE WE <i class="fas fa-users"></i></button>
                <button class="tablinks" onclick="openTab(event, 'UpcomingEvents')" id="upcomingEvents">UPCOMING EVENTS <i class="fal fa-calendar-alt"></i></button>
                <button class="tablinks" onclick="openTab(event, 'ContactUs')" id="contactUs">CONTACT US <i class="far fa-envelope"></i></button>
                <button class="tablinks" onclick="openTab(event, 'OurStore')" id="ourStore">OUR STORE <i class="fas fa-map-marker-alt"></i></button>
            </div>
            <div id="WhoAreWe" class="tabcontent">
                <h3>Who are we...</h3>
                <span>The Garden Centre has always been a family business since its opening in 1984. We are committed to providing the very best for your garden and home. We have everything for the dedicated and occasional gardener alike, as well as the thoughtful gift givers. We have three stores across the South of England all of which are open 9-5 every Monday - Saturday. <br><br> Come and enjoy our garden centre with us!</span>
                <div class="profileContainer">
                    <div class="staffProfile">
                        <img alt="Staff Member" class="staff" src="images/passportPhoto.png" />
                        <span>Joseph Gardener</span>
                    </div>
                    <div class="staffProfile">
                        <img alt="Staff Member" class="staff" src="images/wife.jpeg" />
                        <span>Sandra Gardener</span>
                    </div>
                    <div class="staffProfile">
                        <img alt="Staff Member" class="staff" src="images/grandad.jpg" />
                        <span>Frank Gardener</span>
                    </div>
                    <div class="staffProfile">
                        <img alt="Staff Member" class="staff" src="images/grandma.jpg" />
                        <span>Julie Gardener</span>
                    </div>
                </div>
            </div>
            <div id="UpcomingEvents" class="tabcontent">
                <h3>Upcoming Events</h3>
                <span>We have loads of events happening this month! <br><br>Including: <br> Barbecue Cookery Courses, <br> Beekeeping Taster Course,<br> Children's Story Time and many more!<br><br>
        Follow us on twitter to hear about these events as they arise <br>
            <a href="https://twitter.com/GardenCentre?ref_src=twsrc%5Etfw" class="twitter-follow-button" data-show-count="false">Follow @GardenCentre</a><script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
        </span>
            </div>
            <div id="ContactUs" class="tabcontent">
            <h2>The customer service team is here to help...</h2><br>
            <h3>Any Issues?</h3><br>
            <b>For all enquiries:</b><br><br>
            customerservices@gardencentre.co.uk<br><br>
            01624 820000<br><br>
            <i>Or in writing to:</i><br>
            The Garden Centre Manager<br>
            Garden Centre,<br>
            New Haw,<br>
            Surrey,<br>
            KT15 3YT
            <br><br>

            Wherever possible Garden Centre will reply to emails within 24 hours. For urgent enquiries please telephone on 01624 820000.
            </div>
            <div id="OurStore" class="tabcontent">
                <h3>Our store</h3>
                <h2 id = "locationtitle">Our Locations</h2>
                <h4 id = "locationtxt">We are based in the heart of Surrey and have two other stores in the surrounding areas! <br> Come and give us a visit!</h4>
                <div id = "map"></div>
                <script>
                function initMap() {
                    var options = {
                        zoom:10,
                        center:{lat: 51.3470,lng: -0.5090}
                    }
                    var map = new google.maps.Map(document.getElementById('map'), options);
                    // Add marker
                    var marker = new google.maps.Marker({
                    position: options.center,
                    map: map,
                    title: 'Garden Centre'
                    });
                    // Add marker
                    var marker = new google.maps.Marker({
                    position: {lat: 51.304339, lng: -0.450003},
                    map: map,
                    title: 'Garden Centre'
                    });
                    // Add marker
                    var marker = new google.maps.Marker({
                    position: {lat: 51.455197, lng: -0.611980},
                    map: map,
                    title: 'Garden Centre'
                    });
                }
                </script>
                <script
                src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBsu8m97OtYsQ4iPblsHdLuAwfcDhmOca4&callback=initMap" async defer>
                </script>
            </div>
        </section>
    </div>
