<?php
declare(strict_types=1);

namespace ForExamBot;

$info = new Info();
$infoArray = $info->getAll();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Info Page</title>
</head>
<body>
<div class="container">
    <h1>Information Page</h1>
    <div class="info-container">
        <?php if (empty($infoArray)): ?>
            <p>No information available.</p>
        <?php else: ?>
            <ul>
                <?php foreach ($infoArray as $info): ?>
                    <li><?php echo htmlspecialchars($info->text); ?></li>
                <?php endforeach; ?>
            </ul>
        <?php endif; ?>
    </div>
</div>
</body>
</html>
