<?php
defined('BASEPATH') or exit('No direct script access allowed');

$config['sess_driver'] = 'files'; // Set the session driver (files, database, redis, memcached, etc.)

$config['sess_cookie_name'] = 'ci_session'; // Name of the session cookie
$config['sess_expiration'] = 0; // Session expiration time (0 = until the browser is closed)
$config['sess_save_path'] = NULL; // Save path for session files (only for files driver)

$config['sess_match_ip'] = FALSE; // Whether to match the user's IP address when reading the session cookie
$config['sess_time_to_update'] = 1; // Time (in seconds) to update the session expiration time

$config['sess_regenerate_destroy'] = FALSE; // Regenerate session ID on each request (for security)

$config['cookie_prefix']    = '';
$config['cookie_domain']    = '';
$config['cookie_path']      = '/';
$config['cookie_secure']    = FALSE;
$config['cookie_httponly']  = FALSE;
