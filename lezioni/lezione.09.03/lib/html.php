<?php

    /**
     * libreria che genera tag HTML con un approccio generalista
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
            if( $value !== false ) {
                $t .= ' ' . $key . ( ( ! empty( $value ) ) ? '="' . htmlspecialchars($value) . '"' : '' );
            }
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
                switch( $attributi['field'] ) {
                    case 'input':
                        $form[] = tag(
                            $attributi['field'],
                            $attributi
                        );
                        break;
                    case 'select':
                        $options = [];
                        if( isset($attributi['options']) && is_array($attributi['options']) ) {
                            foreach( $attributi['options'] as $value => $option ) {
                                $selected = ( isset($attributi['value']) && $attributi['value'] == $value ) ? true : false;
                                $options[] = tag(
                                    'option',
                                    [ 'value' => $value, 'selected' => $selected ],
                                    $option['nome']
                                );
                            }
                        } 
                        $form[] = tag(
                            'select',
                            ['name' => $attributi['name']],
                            implode('', $options)
                        );
                        break;
                }
            }
        }

        $t = tag('form', $attr, implode(PHP_EOL, $form));

        return $t;

    }
