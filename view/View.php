<?php

class View
{
    public function render(string $viewPath, array $params = [])
    {
        $content = $this->renderContent($viewPath, $params);
        if(file_exists('./view/mainTemplate.php'))
        {
            require('./view/mainTemplate.php');
        }
    }

    public function renderContent(string $viewPath, array $params = [])
    {
        extract($params);
        ob_start();
        if(file_exists($viewPath))
        {
            require($viewPath);
        }
        return ob_get_clean();
    }
}