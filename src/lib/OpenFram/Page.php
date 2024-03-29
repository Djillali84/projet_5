<?php


namespace OpenFram;

class Page extends ApplicationComponent
{

    protected $contentFile;
    protected $vars = [];

    public function addVar($var, $value)
    {
        if (!is_string($var) || is_numeric($var) || empty($var)) {
            throw new \InvalidArgumentException('Le nom de la variable doit être une chaine de caractère non null');
        }
        $this->vars[$var] = $value;
    }

    public function setContentFile($contentFile)
    {
        if (!is_string($contentFile) || empty($contentFile)) {
            throw new \InvalidArgumentException('La vu spécifiée est invalide');
        }
        $this->contentFile = $contentFile;
    }

    public function getGeneratedPage()
    {
        if (!file_exists($this->contentFile)) {
            throw new \RuntimeException('La vue spécifiée n\'existe pas');
        }
        $currentUser = $this->app->getCurrentUser();
        extract($this->vars);
        ob_start();
        include $this->contentFile;
        $content = ob_get_clean();

        ob_start();
        include __DIR__ . '/../../App/' . $this->app->getName() . '/Templates/layout.php';
        return ob_get_clean();
    }
}
