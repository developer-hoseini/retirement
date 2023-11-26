<?php
if(!function_exists('to_persian_numbers')) {
    /**
     * convert latin number to persian
     *
     * @param string $string
     *   string that we want change number format
     *
     * @return formated string
     */
    function to_persian_numbers($string) {
        return str_replace(range(0, 9), ['۰', '۱', '۲', '۳', '۴', '۵', '۶', '۷', '۸', '۹'], $string);
    }
}

if (!function_exists('to_latin_numbers')) {
    /**
     * convert persian number to latin
     *
     * @param string $string
     *   string that we want change number format
     *
     * @return formated string
     */
    function to_latin_numbers($string) {
        return str_replace(['۰', '۱', '۲', '۳', '۴', '۵', '۶', '۷', '۸', '۹'], range(0, 9), $string);
    }
}

if(!function_exists('minifiy_html')) {
    /**
     * Minify given html.
     *
     * @param string|null $html
     * @return string|string[]
     */
    function minify_html($html) {
        if (!env('COMPRESS_HTML_ENABLED', true)) return $html;

        $html = preg_replace([
            '/^\s+/m',
            '/\s+$/m',
        ], '', $html);

        return preg_replace('/\h{2,}/', ' ', $html);
    }
}

if(!function_exists('title_case')) {
    /**
     * Convert foo-bar to Foo bar.
     *
     * @param  string  $string
     * @return string
     */
    function title_case(string $string): string
    {
        $string = str_replace('-', ' ' , $string);
        $string = strtolower($string);
        return ucfirst($string);
    }
}