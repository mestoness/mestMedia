<?php
class index extends Controller
{

    public function index()
    {
        $postModel = self::model("post");
        //$postModel->getAllPost();
        self::viewRender("index", "main", ["posts" => $postModel->getAllPost()]);
    }
    public function postAdd()
    {
        $postModel = self::model("post");
        print_r($_POST);
        if (post("content") && post("g-recaptcha-response")) {
            $response = post_get("g-recaptcha-response");
            $remoteip = $_SERVER["REMOTE_ADDR"];
            $captcha = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=" . captchaKey . "&response=$response&remoteip=$remoteip");
            $result = json_decode($captcha);
            if ($result->success == 1) {

                $query = $postModel->addPost(htmlspecialchars(strip_tags(trim($_SESSION["oturum"]["username"]))), htmlspecialchars($_POST["content"]), date('H:i | d.m.Y'));
                if ($query) {
                    header("location:./");
                }
            } else {
                echo jsAlert("Güvenlik kodunuz hatalı tekrar deneyiniz");
                header("Refresh:2");
            }
        }
    }

    public function ajaxLimit()
    {
        sleep(2);
        $id = $_POST["id"];
        $postModel = self::model("post");
        $query = $postModel->getLimitPost($id);
?>
        <?php
        $countt = $id;
        if ($query) {
            foreach ($query as $rows) {
                $countt++;
        ?>
                <a href="p/<?php echo preg_replace('/[^a-zA-Z0-9]+/', '_', $rows["uniq"]) ?>/<?php echo $rows["id"] ?>" style="color:unset ;text-decoration: none;" class="postCGdo" data-post-id="<?php echo $countt ?>">

                    <div class="ns-col-lg-6" style="margin: 0 auto">
                        <div class="post-content">
                            <div class="post-header">
                                <img src="https://365retailmarkets.com/wp-content/uploads/2020/07/user.png" alt="Avatar" />
                                <div class="post-header-info">
                                    <a href="<?= site_URL() ?>profile/<?= $rows["owner"] ?>" style="color:unset;text-decoration:none"><strong><?php echo "@" . $rows["owner"] ?></strong></a><small><?php echo calcTimeSpan(dateToAgo($rows["date"])) ?></small>
                                </div>
                            </div>
                            <div class="post-tw-content">

                                <p>
                                    <?php echo htmlspecialchars_decode($rows["content"]) ?>

                                </p>
                            </div>
                            <!--<div class="comment-button"><i class="far fa-comments"></i></div>-->
                        </div>

                    </div>
                </a>

                <!--post component end-->
        <?php }
        } else {
            exit("none");
        } ?>
<?php
    }
}
?>