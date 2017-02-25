<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

if (!function_exists('asset_url()')) {

    function asset_url() {
        return base_url() . 'assets/';
    }

}

if (!function_exists('is_loggedIn()')) {

    function is_loggedIn() {
        $ci= & get_instance();
        $is_logged_in=$ci->session->userdata('is_logged_in');
        if($is_logged_in){
            return true;
        }
        return false;        
    }

}


if (!function_exists('copyrights()')) {

    function copyrights() {
        echo "&copy Copy " . date('Y') . " Apnnnews, Desinged by BLM Tech. All rights reserved";
    }

}
if (!function_exists('popularPosts()')) {

    function popularPosts() {
        $CI = & get_instance();
        $CI->load->model('Home_model');
        return $CI->Home_model->getPopularpost();
    }

}

if (!function_exists('getHeaderBanners()')) {

    function getHeaderBanners() {
        $CI = & get_instance();
        $CI->load->model('Banners_model');
        return $CI->Banners_model->getHeaderBanners();
    }

}

if (!function_exists('getHeaderadds()')) {

    function getHeaderadds() {
        $CI = & get_instance();
        $CI->load->model('adds_model');
        return $CI->adds_model->getHeaderadds();
    }

}



if (!function_exists('getHeaderVedios()')) {

    function getHeaderVedios() {
        $CI = & get_instance();
        $CI->load->model('vedios_model');
        return $CI->vedios_model->getHeaderVedios();
    }

}
if (!function_exists('getLatestUpdates()')) {

    function getLatestUpdates() {
        $CI = & get_instance();
        $CI->load->model('Home_model');
        return $CI->Home_model->getLastUpdates();
    }

}
if (!function_exists('popularNews()')) {

    function popularNews() {
        $CI = & get_instance();
        $CI->load->model('Home_model');
        return $CI->Home_model->getPopularNews();
    }

}

if (!function_exists('getPageNames()')) {

    function getPageNames() {
        $pagenames = [
            0 => ["name" => "breakingnews", "title" => "Breaking News"],
            1 => ["name" => "apnews", "title" => "AP News"],
            2 => ["name" => "tnews", "title" => "T News"],
            3 => ["name" => "national_news", "title" => "National News"],
            4 => ["name" => "cinema", "title" => "Movie News"],
            5 => ["name" => "makeup", "title" => "Make Up"],
            6 => ["name" => "beautytips", "title" => "Beauty Tips"],
            7 => ["name" => "faceandhealthtips", "title" => "Face and Health Tips"],
            8 => ["name" => "rasipalalu", "title" => "Rasipalalu"],
            9 => ["name" => "kalachak", "title" => "Kalachak"],
            10 => ["name" => "mustknow", "title" => "Must Know"],
        ];
        return $pagenames;
    }

}
if (!function_exists('flashNews()')) {

    function flashNews() {
        $CI = & get_instance();
        $CI->load->model('Home_model');
        return $CI->Home_model->flashNews();
    }

}

if (!function_exists('interviews()')) {

    function interviews() {
        $CI = & get_instance();
        $CI->load->model('Home_model');
        return $CI->Home_model->interviews();
    }

}

if (!function_exists('movieReviews()')) {

    function movieReviews() {
        $CI = & get_instance();
        $CI->load->model('Home_model');
        return $CI->Home_model->movieReviews();
    }

}
if (!function_exists('time_elapsed_string()')) {

    function time_elapsed_string($ptime) {
        $etime = time() - $ptime;

        if ($etime < 1) {
            return '0 seconds';
        }
        if((24 * 60 * 60 *2) < $etime){
            return date("jS M Y", $ptime);
        }
        $a = array(
            365 * 24 * 60 * 60 => 'year',
            30 * 24 * 60 * 60 => 'month',
            24 * 60 * 60 => 'day',
            60 * 60 => 'hour',
            60 => 'minute',
            1 => 'second'
        );
        $a_plural = array('year' => 'years',
            'month' => 'months',
            'day' => 'days',
            'hour' => 'hours',
            'minute' => 'minutes',
            'second' => 'seconds'
        );

        foreach ($a as $secs => $str) {

            $d = $etime / $secs;
            //echo $d;exit;
            if ($d >= 1) {
                $r = round($d);
                return $r . ' ' . ($r > 1 ? $a_plural[$str] : $str) . ' ago';
            }
        }
    }

}if (!function_exists('time_elapsed_string1()')) {

    function time_elapsed_string1($ptime) {
        $etime = time() - $ptime;

        if ($etime < 1) {
            return '0 seconds';
        }

        $a = array(365 * 24 * 60 * 60 => 'year',
            30 * 24 * 60 * 60 => 'month',
            24 * 60 * 60 => 'day',
            60 * 60 => 'hour',
            60 => 'minute',
            1 => 'second'
        );
        $a_plural = array('year' => 'years',
            'month' => 'months',
            'day' => 'days',
            'hour' => 'hours',
            'minute' => 'minutes',
            'second' => 'seconds'
        );

        foreach ($a as $secs => $str) {
            $d = $etime / $secs;
            if ($d >= 1) {
                $r = round($d);
                return $r . ' ' . ($r > 1 ? $a_plural[$str] : $str) . ' ago';
            }
        }
    }

}

if (!function_exists('active_link')) {

    function active_link($controller) {
        $CI = & get_instance();

        $class = $CI->router->fetch_class();
        return ($class == $controller) ? 'active' : '';
    }

}

if (!function_exists('latestVideos()')) {

    function latestVideos() {
        $CI = & get_instance();
        $CI->load->model('Home_model');
        return $CI->Home_model->get_videos_home();
    }

}

if (!function_exists('latestGallery()')) {

    function latestGallery() {
        $CI = & get_instance();
        $CI->load->model('gallery_model');
        return $CI->gallery_model->getHighlights();
    }

}
?>