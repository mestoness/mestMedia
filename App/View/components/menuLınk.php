<!--loader-->
<div class="ns-page-loading active">
    <div class="ns-page-loading-inner">
        <div class="ns-page-spinner"> </div>
    </div>
</div>
<!--NavBar-->
<div class="navbarMenuLg">
    <nav class="navbar">
        <div class="content">
            <div class="logo">
                <a href="<?= site_URL() ?>">
                    {mestHub}
                </a>
            </div>
            <ul class="menu-list">
                <li>
                    <a href="<?= site_URL() ?>" title="Home">
                        <i class="fa fa-home">
                        </i>
                    </a>
                </li>
                <li>
                    <a href="<?= site_URL() ?>search" title="Search">
                        <i class="fa fa-search">
                        </i>
                    </a>
                </li>
                <li>
                    <a title="Add" href="#postAdd" rel="modal:open">
                        <i class="fa fa-plus">
                        </i>
                    </a>
                </li>
                <!-- <li>
                    <a href="#" title="Messages">
                        <i class="fa fa-envelope ">
                        </i>
                    </a>
                </li>
                <li>
                    <a href="#" title="Notification">
                        <i class="fa fa-heart">
                        </i>
                    </a>
                </li>
                -->
                <li>
                    <a href="<?= site_URL() ?>profile/<?= $_SESSION["oturum"]["username"] ?>" title="Profile">
                        <i class="fa fa-user">
                        </i>
                    </a>
                </li>
            </ul>
        </div>
    </nav>
</div>
<br><br>
<div class="ns-container-fluid " id="mobileNav">
    <div class="mobileNavIn">
        <div class="ns-row ns-center">
            <div class="ns-col-2">
                <a class="menu-a" href="<?= site_URL() ?>">
                    <i class="fa fa-home">
                    </i>
                </a>
            </div>
            <div class="ns-col-2">
                <a class="menu-a" href="<?= site_URL() ?>search">
                    <i class="fa fa-search">
                    </i>
                </a>
            </div>
            <div class="ns-col-2">
                <a class="menu-a" href="#postAdd" rel="modal:open">
                    <i class="fa fa-plus">
                    </i>
                </a>
            </div>
            <!-- <div class="ns-col-2">
                <a class="menu-a" href="">
                    <i class="fa fa-envelope">
                    </i>
                </a>
            </div>
            <div class="ns-col-2">
                <a class="menu-a" href="">
                    <i class="fa fa-heart">
                    </i>
                </a>
            </div> -->
            <div class="ns-col-2">
                <a class="menu-a" href="">
                    <i class="fa fa-user">
                    </i>
                </a>
            </div>
        </div>
    </div>
</div>

<div id="postAdd" class="modal">
    <form action="<?= site_URL() ?>add-post" method="POST" id="add_post_form" autocomplete="off">
        <textarea class="add_post_input" id="content" placeholder="İçerik Giriniz" rows="5" required style="line-height: 1.5;"></textarea>
        <div class="g-recaptcha" data-sitekey="6LfXFTwbAAAAAK0GapuU1OMomju3SLS9bTAGxK-_" data-theme="dark"></div>
        <input type="hidden" id="content_" name="content">
        <button class="submit-post"><i class="fa fa-paper-plane"></i></button>
    </form>
</div>