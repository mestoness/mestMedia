<?php componentsAdd("menuLınk") ?>

<div class="ns-col-lg-6" style="margin: 0 auto">
    <div class="post-content border-none" style="padding-bottom:0">
        <div class="post-header">
            <img src="https://gist.github.com/fluidicon.png" alt="Avatar" />
            <div class="post-header-info">
                <a href="<?= site_URL() ?>profile/<?= $post_data["owner"] ?>" style="color:unset;text-decoration:none"><strong><?php echo "@" . $post_data["owner"] ?></strong></a><small><?php echo calcTimeSpan(dateToAgo($post_data["date"])) ?></small>
            </div>
        </div>
        <div class="post-tw-content">
            <p>
                <?php echo htmlspecialchars_decode($post_data["content"]) ?>
            </p>
        </div>
    </div>
</div>


<div class="ns-col-lg-6 " style="padding:20px;margin:0 auto;margin-bottom:2rem;padding-bottom:1rem">
    <form method="POST" autocomplete="off" style="border-bottom:1px solid #191919;padding-bottom:3.2rem">
        <input type="text" name="commments_content" class="add_post_input" placeholder="Yorum Giriniz" required>
        <div class="g-recaptcha" data-sitekey="6LfXFTwbAAAAAK0GapuU1OMomju3SLS9bTAGxK-_" data-theme="dark"></div>
        <button class="submit-post"><i class="fa fa-paper-plane"></i></button>
    </form>
</div>

<div id="comments-list">
    <?php
    $countComment = 0;
    foreach ($comment_data as $key) {
        $countComment++ ?>
        <div class="ns-col-lg-6 postCGdo" style="margin: 0 auto" data-comment-id="<?= $countComment ?>">
            <div class="post-content">
                <div class="post-header">
                    <img src="https://gist.github.com/fluidicon.png" alt="Avatar" />
                    <div class="post-header-info">
                        <a href="<?= site_URL() ?>profile/<?= $key["username"] ?>" style="color:unset;text-decoration:none"><strong><?php echo "@" . $key["username"] ?></strong></a><small><?php echo calcTimeSpan(dateToAgo($key["date"])) ?></small>
                    </div>
                </div>
                <div class="post-tw-content">
                    <p>
                        <?php echo htmlspecialchars_decode($key["content"]) ?>
                    </p>
                </div>
            </div>
        </div>
    <?php
    } ?>
</div>



<div class="ns-col-12" id="showMorePost"><i class="fa fa-refresh"></i></div>
<div class="ns-col-12" id="showMore__"></div>



<script src="<?php echo assetsURL("js/main.js") ?>"></script>
<script>
    $("#showMorePost").hide();
    $("#showMorePost").click(function() {
        $("#showMorePost").hide();
        var id = $(".postCGdo:last").attr("data-comment-id");
        $.ajax({
            type: "post",
            url: "<?= site_URL() ?>ajaxlimitcomment",
            data: {
                id: id,
                uniq: "<?= $post_data["uniq"] ?>",
                sef_id: "<?= $post_data["id"] ?>"
            },
            success: function(data) {
                if (data != "no") {
                    $("#comments-list").append(data);
                    $("#showMorePost").show();
                } else {
                    $("#showMorePost").remove();
                    $("#showMore__").html("Daha fazlası bulunamadı");
                    $("#showMore__").show();
                }
            },
        });
    });
    if (parseInt($(".postCGdo:last").attr("data-comment-id")) > 2) {
        $("#showMorePost").show();
    }
</script>