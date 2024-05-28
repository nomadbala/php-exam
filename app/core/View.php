<?php

class View
{
    public function generate($view, $template, $data = null)
    {
        if (is_array($data) && count($data) > 0) {
            extract($data);
        }
        include "app/views/$template";
    }

    public function noExtractGenerate($view, $template, $data = null)
    {
        include "app/views/$template";
    }
}