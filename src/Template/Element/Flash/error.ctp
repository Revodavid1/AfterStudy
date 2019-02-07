<?php
if (!isset($params['escape']) || $params['escape'] !== false) {
    $message = h($message);
}
?>
<div class="message error red chip white-text" onclick="this.classList.add('hidden');"><?= $message ?> 
    <i class="close material-icons">close</i></div>
