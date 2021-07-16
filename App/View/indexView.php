    <?php componentsAdd("menuLınk") ?>

    <div id="post-list" style="width:100%">
        <!--post component start-->
        <?php
        $counttt = 0;
        foreach ($posts as $rows) {
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
        <?php } ?>
    </div>
    <!---->
    <div class="ns-col-12" id="showMorePost"><i class="fa fa-refresh"></i></div>
    <div class="ns-col-12" id="showMore__"></div>
    <!--container fd end-->

    <script src="<?php echo assetsURL("js/main.js") ?>"></script>
    <script>
        $("#showMore__").hide();
        $("#showMorePost").hide();

        $("#showMorePost").click(function() {
            $("#showMorePost").hide();
            var id = $(".postCGdo:last").attr("data-post-id");
            $.ajax({
                type: "post",
                url: "ajaxlimitpost",
                data: {
                    id: id
                },
                success: function(data) {
                    if (data != "        none") {
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