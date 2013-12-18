<div class="grid_12 header-repeat">
    <div id="branding">
        <div class="floatleft">
            <h1>Administration</h1>
           <!--  <img src="img/logo.png" alt="Logo" /> -->
        </div>
        <div class="floatright">
            <div class="floatleft">
                <!-- <img src="img/img-profile.jpg" alt="Profile Pic" /> -->
            </div>
            <div class="floatleft marginleft10">
                <ul class="inline-ul floatleft">
                    <li>Hello <?php echo $this->Session->read('User.prenom'); ?></li>
                    <!-- <li><a href="#">Config</a></li>
                    <li><a href="#">Logout</a></li> -->
                </ul>
                <br />
                <!-- <span class="small grey">Last Login: 3 hours ago</span> -->
            </div>
        </div>
        <div class="clear"></div>
    </div>
</div>
<div class="clear"></div>