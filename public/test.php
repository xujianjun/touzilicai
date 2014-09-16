<?php

$urls = array('test1', 'test2');
echo '<pre>';print_r($urls);echo '</pre>';
unset($urls[0]);
sort($urls);
echo '<pre>';print_r($urls);echo '</pre>';