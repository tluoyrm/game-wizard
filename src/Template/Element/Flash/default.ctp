<?php
$class = 'message';
if (!empty($params['class'])) {
    $class .= ' ' . $params['class'];
}
?>
<div class="alert alert-info col-md-7">
    <a class="close" data-dismiss="alert">×</a>
    <div class="<?= h($class) ?>"><?= h($message) ?></div>
</div>
