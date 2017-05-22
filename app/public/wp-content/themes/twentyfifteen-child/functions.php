<?php

add_action('acf/init', 'my_acf_init');

function my_acf_init() {

	acf_update_setting('google_api_key', 'AIzaSyBRjDW7mh4mKXJ88dRi14IoLMjCV4Syzas');
}
