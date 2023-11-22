<?php
interface iTemplate {
    public function ponerVariable($nombre, $var);
    public function verHtml($template);
}

class Template implements iTemplate {
    private $vars = array();

    public function ponerVariable($nombre, $var) {
        $this->vars[$nombre] = $var;
    }

    public function verHtml($template) {
        foreach ($this->vars as $nombre => $value) {
            $template = str_replace('{' . $nombre . '}', $value, $template);
        }
        return $template;
    }
}
?>
