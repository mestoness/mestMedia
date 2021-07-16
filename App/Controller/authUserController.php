<?php

class authUser extends Controller
{

	public function login()
	{
		self::viewRender("login", "main");
	}
	public function loginPost()
	{

		if (post("username") && post("password") && post("g-recaptcha-response")) {
			$response = post_get("g-recaptcha-response");
			$remoteip = $_SERVER["REMOTE_ADDR"];
			$captcha = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=" . captchaKey . "&response=$response&remoteip=$remoteip");
			$result = json_decode($captcha);
			if ($result->success == 1) {

				$modelUsers = self::model("users");
				$query = $modelUsers->loginUser(post_get("username"), post_get("password"));
				if ($query) {
					if (count($query) === 1) {
						$_SESSION["oturum"] = array(
							"username" => post_get("username"),
							"password" => post_get("password")
						);
						header("Refresh:0");
					}
				} else {
					echo jsAlert("Girilen Kullanıcı bilgileri hatalı tekrar deneyiniz");
					header("Refresh:2");

				}
			} else {
				echo jsAlert("Güvenlik doğrulaması hatalı tekrar deneyiniz");
				header("Refresh:2");

			}
		}
	}
}
