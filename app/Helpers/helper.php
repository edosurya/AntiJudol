<?php


if (!function_exists('user')) {
    function user()
    {
        return auth()->user();
    }
}

if (!function_exists('autoVersioning')) {

    function autoVersioning($file)
    {
        $physical_file = public_path($file);
        return filemtime($physical_file);
    }
}



if (!function_exists('isLaunching')) {

    function isLaunching($type)
    {

        $url = config('services.event.is_launch') ? route('reservation.index') : '#';
        $text = config('services.event.is_launch') ? __('frontend.button.rsvp') : __('frontend.button.launch_rsvp');
        return $type == 'text' ? $text : $url;
    }
}
