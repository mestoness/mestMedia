<?php componentsAdd("menuLınk") ?>

<div class="ns-container" style="margin-top:1rem">
    <center>
        <h2 style="color:white">@<?php echo $user_data[0]["username"] ?></h2>
        <?php
        if ($user_data[0]["username"] != $_SESSION["oturum"]["username"] && !in_array(
            $user_data[0]["username"],
            array_filter(explode(",", $session_data[0]["followed"]))
        )) {
        ?>
            <form method="POST">
                <button class="submit-post" style="float:unset;margin-top:1rem">Takip Et</button>
                <input type="hidden" name="user_follow" />
            </form>
    </center>
<?php

        } else if ($user_data[0]["username"] != $_SESSION["oturum"]["username"]) {
?>
    <button class="submit-post disabled" style="float:unset;margin-top:1rem;">Takip Ediliyor</button>
    <form method="POST" style="display: inline;">
        <button class="submit-post" style="float:unset"><i class="fa fa-trash"></i></button>
        <input type="hidden" name="user_unf" />
    </form>
<?php
        }
?>
</div>
<?php
$counttt = 0;
foreach ($post_data as $rows) :
    $counttt++;
?>


    <a href="p/<?php echo preg_replace('/[^a-zA-Z0-9]+/', '_', $rows["uniq"]) ?>/<?php echo $rows["id"] ?>" style="color:unset ;text-decoration: none;" class="postCGdo" data-post-id="<?php echo $counttt ?>">
        <div class="ns-col-lg-6" style="margin: 0 auto">
            <div class="post-content">
                <div class="post-header">
                    <img src="https://gist.github.com/fluidicon.png" alt="Avatar" />
                    <div class="post-header-info">
                        <strong><?php echo "@" . $rows["owner"] ?></strong><small><?php echo calcTimeSpan(dateToAgo($rows["date"])) ?></small>
                    </div>
                </div>
                <div class="post-tw-content">
                    <p>

                        <?php echo htmlspecialchars_decode($rows["content"]) ?>
                    </p>
                </div>
            </div>
        </div>
    </a>
<?php endforeach; ?>

<div class="ns-col-12" id="showMorePost"><i class="fa fa-refresh"></i></div>
<div class="ns-col-12" id="showMore__"></div>


<script>
    $("#showMore__").hide();
    $("#showMorePost").hide();

    $("#showMorePost").click(function() {
        $("#showMorePost").hide();
        var id = $(".postCGdo:last").attr("data-post-id");
        $.ajax({
            type: "post",
            url: "<?= site_URL() ?>ajaxlimitpostprofile",
            data: {
                id: id,
                username: "<?php echo $user_data[0]["username"] ?>"
            },
            success: function(data) {
                if (data != "none") {
                    $("#post-list").append(data);
                    $("#showMorePost").show();
                } else {
                    $("#showMorePost").remove();
                    $("#showMore__").html("Daha fazlası bulunamadı");
                    $("#showMore__").show();
                }
            },
        });
    });

    if (parseInt($(".postCGdo:last").attr("data-post-id")) > 9) {
        $("#showMorePost").show();

    }
</script>