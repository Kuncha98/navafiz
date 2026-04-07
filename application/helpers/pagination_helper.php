<?php

function init_pagination($base_url, $total_rows, $per_page = 20, $uri_segment = 3)
{
    $CI =& get_instance();

    $config = [];

    $config["base_url"] = site_url($base_url);
    $config["total_rows"] = $total_rows;
    $config["per_page"] = $per_page;
    $config["uri_segment"] = $uri_segment;

    // Bootstrap UI
    $config['full_tag_open'] = '<ul class="pagination justify-content-center">';
    $config['full_tag_close'] = '</ul>';

    $config['first_link'] = 'First';
    $config['last_link'] = 'Last';

    $config['first_tag_open'] = '<li class="page-item">';
    $config['first_tag_close'] = '</li>';

    $config['last_tag_open'] = '<li class="page-item">';
    $config['last_tag_close'] = '</li>';

    $config['next_tag_open'] = '<li class="page-item">';
    $config['next_tag_close'] = '</li>';

    $config['prev_tag_open'] = '<li class="page-item">';
    $config['prev_tag_close'] = '</li>';

    $config['cur_tag_open'] = '<li class="page-item active"><a class="page-link">';
    $config['cur_tag_close'] = '</a></li>';

    $config['num_tag_open'] = '<li class="page-item">';
    $config['num_tag_close'] = '</li>';

    $config['attributes'] = ['class' => 'page-link'];

    $CI->pagination->initialize($config);

    return $config;
}