<?php

namespace App;

class RenderHtml
{

    /**
     * Get render html
     * 
     * @return HTML & $variables
     */
    public function renderHtml(string $path, array $variables = [])
    {
        extract($variables);

        ob_start();
        require_once('../html/' . htmlspecialchars($path) . '');
        $content = ob_get_clean();

        require_once('../html/base.index.html.php');
    }
}
