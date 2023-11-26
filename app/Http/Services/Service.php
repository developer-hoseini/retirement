<?php
namespace App\Http\Services;

class Service
{
    /**
     * Get the evaluated view contents for the given view.
     *
     * @param string|null $view
     * @param \Illuminate\Contracts\Support\Arrayable|array $data
     * @param array $mergeData
     * @return string|string[]
     */
    public function view($view = null, $data = [], $mergeData = [])
    {
        $html = view($view, $data, $mergeData)->render();
        return minify_html($html);
    }
}
