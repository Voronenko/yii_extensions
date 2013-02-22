<?php
class GZScriptMapBehavior extends CBehavior
{
    public function events()
    {
        return array_merge(
            parent::events(),
            array(
                'onBeginRequest' => 'beginRequest',
            )
        );
    }

    /**
     * Load configuration that cannot be put in config/main
     */
    public function beginRequest()
    {
        if (isset($_SERVER['HTTP_ACCEPT_ENCODING'])) {
            $header = $_SERVER['HTTP_ACCEPT_ENCODING'];
            $encodings = explode(',', $header);
            foreach ($encodings as $encoding) {
                if (trim($encoding) == 'gzip') {
                    return;
                }
            }
            $map = & Yii::app()->clientScript->scriptMap;
            foreach ($map as $from => $to) {
                if (substr($to, -6) == '.js.gz') {
                    $map[$from] = substr($to, 0, strlen($to) - 3);
                }
                if (substr($to, -7) == '.css.gz') {
                    $map[$from] = substr($to, 0, strlen($to) - 3);
                }
            }
        }
    }
}
