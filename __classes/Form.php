<?php
class Form{
    static function startForm( $action,  $method,  $class){
        echo '<form action='.$action.' class='.$class.' method='.$method.'>';
    }

    static function endForm(){
        echo '</form>';
    }

    static function createField( $name,  $class ,  $type){
        echo '<input type="'.$type.'" class="'.$class.'" name="'.$name.'">';
    }

    static function createFieldWithValue( $name,  $class ,  $type,  $value){
        echo '<input type="'.$type.'" class="'.$class.'" value="'.$value.'" name="'.$name.'">';
    }

    static function createLabel( $for,  $class,  $label){
        echo '<label for="'.$for.'" class="'.$class.'">'.$label.'</label>';
    }

    static function createSubmit(string $type, $class, $name, $value, $text){
        echo '<button type="'.$type.'" class="'.$class.'" name="'.$name.'" value="'.$value.'">'.$text.'</button>';
    }

    static function startSelect($name, $class){
        echo '<select name='.$name. ' class='.$class.'>' ;

    }
    static function createOption($value, $content){
        echo '<option value='.$value.'>'.$content.'</option>' ;
    }
    static function endSelect(){
        echo '</select>';

    }


}




?>