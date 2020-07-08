<?php 

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
/**
 * Pagination Config
 * 
 * Just applying codeigniter's standard pagination config with twitter 
 * bootstrap stylings
 *
 * @author    Jaeeme Khan
 * @link    http://codeigniter.com/user_guide/libraries/pagination.html
 * @email   jaeeme.khan@sitanet.in
 * 
 * @file    pagination.php
 * @version   1.0.0.1
 * @date    08/09/2015
 * 
 * Copyright (c) 2015
 */
/* -------------------------------------------------------------------------- */

$config['per_page'] = 10;
$config['num_links'] = 2;

$config['use_page_numbers'] = TRUE;
$config['page_query_string'] = FALSE;

$config['query_string_segment'] = '';

$config['full_tag_open'] = '<ul class="pagination justify-content-end">';
$config['full_tag_close'] = '</ul>';
$config['attributes'] = ['class' => 'page-link'];

$config['first_link'] = '&laquo; First';
$config['first_tag_open'] = '<li class="page-item">';
$config['first_tag_close'] = '</li>';

$config['last_link'] = 'Last &raquo;';
$config['last_tag_open'] = '<li class="page-item">';
$config['last_tag_close'] = '</li>';

$config['next_link'] = 'Next &rarr;';
$config['next_tag_open'] = '<li class="page-item">';
$config['next_tag_close'] = '</li>';

$config['prev_link'] = '&larr; Prev';
$config['prev_tag_open'] = '<li class="page-item">';
$config['prev_tag_close'] = '</li>';

$config['cur_tag_open'] = '<li class="page-item active"><a href="#" class="page-link">';
$config['cur_tag_close'] = '<span class="sr-only">(current)</span></a></li>';
$config['num_tag_open'] = '<li class="page-item">';
$config['num_tag_close'] = '</li>';

$config['anchor_class'] = 'follow_link';



?>