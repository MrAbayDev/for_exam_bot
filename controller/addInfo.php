<?php
declare(strict_types=1);
use ForExamBot\Info;

(new Info())->addInfo($_POST['text']);
header('Location: /addInfo');
exit();