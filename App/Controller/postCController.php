<?php


class postC extends Controller
{
	public function index($uniq, $id)
	{
		$model = self::model("post");
		$query = $model->postPage($id, $uniq);
		if (!$query) {
			header("location:" . site_URL());
			die();
		} else {
			self::viewRender(
				"post",
				"main",
				[

					"post_data" => $query,
					"comment_data" => self::model("post")->getPostComments($uniq, $id)
				]
			);
		}
	}
	public function post($uniq, $id)
	{
		if (post("g-recaptcha-response")) {
			$response = post_get("g-recaptcha-response");
			$remoteip = $_SERVER["REMOTE_ADDR"];
			$captcha = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=" . captchaKey . "&response=$response&remoteip=$remoteip");
			$result = json_decode($captcha);
			if ($result->success == 1) {
				$model = self::model("users");
				$queryOne = $model->loginUser($_SESSION["oturum"]["username"], $_SESSION["oturum"]["password"]);
				if ($queryOne) {
					if (count($queryOne) === 1) {
						$modelTwo = self::model("post");
						$insertComment = $modelTwo->addComment($id, $uniq, post_get("commments_content"), date('H:i | d.m.Y'), $_SESSION["oturum"]["username"]);
						if ($insertComment) {
							header("Refresh:0");
						}
					}
				}
			} else {
				echo jsAlert("Güvenlik doğrulaması hatalı tekrar deneyiniz");
				header("Refresh:2");
			}
		} else {
			header("Refresh:0");
		}
	}
	public function ajaxComment()
	{
		$id = post_get("id");

		$model = self::model("post");
		$query = $model->limitComments($id, post_get("uniq"), post_get("sef_id"));
		if ($query) {
			foreach ($query as $key) {
				$id++
?>

				<div class="ns-col-lg-6 p-0" style="margin: 0 auto" data-comment-id="<?= $id ?>">
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
			}
		} else {
			echo "no";
		}
	}

	public function ajaxProfilePost()
	{
		$id = post_get("id");
		$model = self::model("profileC");
		$query = $model->profileToPostLimit(post_get("username"), $id);
		if ($query) {
			foreach ($query as $rows) :
			$id++;
			?>

				<a href="p/<?php echo preg_replace('/[^a-zA-Z0-9]+/', '_', $rows["uniq"]) ?>/<?php echo $rows["id"] ?>" style="color:unset ;text-decoration: none;" class="postCGdo" data-post-id="<?php echo $id ?>">
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


<?php
			endforeach;
		}
		else {
			echo "none";
		}
	}
}
