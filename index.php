<?php
require('model/model.php');

$posts = getPosts();

require('frontend/view/indexView.php');
?>