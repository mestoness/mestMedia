<?php componentsAdd("menuLınk") ?>
<div class="ns-col-lg-3 ns-col-12 ns-center">
    <form method="GET" style="margin-bottom:1rem">
        <input type="text" class="add_post_input" name="s" required placeholder="Kullanıcı Adı giriniz" autofocus>
        <button class="submit-post" style="float:unset"><i class="fa fa-search"></i></button>
    </form>

    <?php

    if ($search_data != null) {
        foreach ($search_data as $key) :  ?>
            <div style="color:white;padding: 10px;text-align: left;display:flex">
                <img src="https://gist.github.com/fluidicon.png" alt="Avatar" style="width: 20px;">
                <div>
                    <a href="<?= site_URL() ?>profile/<?= $key["username"] ?>" style="color:unset;text-decoration:none;margin-left:5px"> @<?= $key["username"] ?></a>
                </div>
            </div>

    <?php endforeach;
    }
    ?>
</div>