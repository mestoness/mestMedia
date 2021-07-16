<?php

if (isset($_GET["kod"])) {
    if ($_GET["kod"] == "1") {
        session_start();
        ob_start();


        $kod = substr(md5(uniqid(rand(0, 5))), 0, 5);

        $_SESSION["kod_add"] = $kod;

        header('Content-type: image/png');

        $kod_uzunluk = strlen($kod);
        $genislik = imagefontwidth(25) *  $kod_uzunluk;
        $yukseklik = imagefontheight(20);

        $resim = imagecreate($genislik, $yukseklik);

        $arka_renk = imagecolorallocate($resim, 255, 255, 255);
        $yazi_renk = imagecolorallocate($resim, 0, 0, 0);
        imagefill($resim, 0, 0, $arka_renk);

        imagestring($resim, 5, 0, 0, $kod, $yazi_renk);
        // for ($i = 0; $i < 2; $i++) {
        //     imageline($resim, rand(0, 5) * 5, rand(0, 5), rand(0, 5) * 0, 5, $yazi_renk);
        // }
        imagepng($resim);
        imagedestroy($resim);
    }
    if ($_GET["kod"] == "2") {
        session_start();
        ob_start();


        $kod = substr(md5(uniqid(rand(0, 5))), 0, 5);

        $_SESSION["kod"] = $kod;

        header('Content-type: image/png');

        $kod_uzunluk = strlen($kod);
        $genislik = imagefontwidth(25) *  $kod_uzunluk;
        $yukseklik = imagefontheight(20);

        $resim = imagecreate($genislik, $yukseklik);

        $arka_renk = imagecolorallocate($resim, 255, 255, 255);
        $yazi_renk = imagecolorallocate($resim, 0, 0, 0);
        imagefill($resim, 0, 0, $arka_renk);

        imagestring($resim, 5, 0, 0, $kod, $yazi_renk);
        // for ($i = 0; $i < 2; $i++) {
        //     imageline($resim, rand(0, 5) * 5, rand(0, 5), rand(0, 5) * 0, 5, $yazi_renk);
        // }
        imagepng($resim);
        imagedestroy($resim);
    }
}
