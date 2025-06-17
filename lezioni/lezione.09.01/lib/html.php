<?php

    /**
     * libreria che genera tag HTML con un approccio
     * generalista
     */

    namespace HTML;

    /**
     * genera un tag HTML
     * @param string $tag il nome del tag
     * @param array $attr un array associativo con gli attributi del tag
     * @param string $content il contenuto del tag
     * @return string il tag HTML generato
     */
    function tag($tag, $attr = [], $content = '') {
        
        $t = '<' . $tag;
        foreach ($attr as $key => $value) {
            $t .= ' ' . $key . ( ( ! empty( $value ) ) ? '="' . htmlspecialchars($value) . '"' : '' );
        }
        $t .= '>';
        if( ! empty($content) ) {
            $t .= $content . '</' . $tag . '>';
        }
        $t . PHP_EOL;

        return $t;

    }

    /**
     * genera un form HTML
     * @param array $attr un array associativo con gli attributi del form
     * @param array $fields un array associativo con i campi del form
     * @return string il form HTML generato
     */
    function form($attr = [], $fields = []) {

        $form = [];
        foreach($fields as $name => $attributi) {
            if( ! empty($attributi) ){
                $form[] = tag(
                    $attributi['field'],
                    $attributi
                );
            }
        }

        $t = tag('form', $attr, implode(PHP_EOL, $form));

        return $t;

    }
