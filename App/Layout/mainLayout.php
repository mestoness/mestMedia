<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>MestApp | </title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="https://gist.github.com/fluidicon.png" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/loadermest.js/2.0.30/loadermest.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/gridmest/1.0.15/gridmest.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/nprogress/0.2.0/nprogress.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="<?= assetsURL("js/jquery.modal.js") ?>"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.css" />
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?= assetsURL("css/app.css") . "?" . rand(0000, 999) ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" />
</head>
<style>
    .g-recaptcha {
        transform: scale(0.8);
        transform-origin: 0;
        -webkit-transform: scale(0.8);
        transform: scale(0.8);
        -webkit-transform-origin: 0 0;
        transform-origin: 0 0;
    }
</style>

<body>
    <div class="ns-container-fluid p-0" style="margin-bottom:10rem">

        <?php echo $VIEW ?>

    </div>
    <script>
        (function() {
            loaderMest({
                status: true,
                spinnerBackground: "black",
                spinnerColor: "white"
            });
            NProgress.start();
            $(window).scroll(function() {
                if ($(window).scrollTop() > 80) {
                    $(".navbarMenuLg").addClass("sticky-nav-class");
                } else {
                    $(".navbarMenuLg").removeClass("sticky-nav-class");
                }

            });
            setTimeout(function() {
                NProgress.done();
            }, 1200);
        })();
    </script>
    <script src='https://www.google.com/recaptcha/api.js?hl=tr'></script>
</body>

</html>