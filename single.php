<?php

if (have_posts()) {
	have_posts();
	rewind_posts();
}


if ('villas' == get_post_type()) {
	require_once("single-town.php");

} elseif('servicios' == get_post_type()) {
	require_once("single-service.php");
} else {
	require_once("single-blog.php");
};
