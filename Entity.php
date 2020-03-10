<?php

    abstract class Entity{

        protected function hydrate($data){

            foreach($data as $field => $value){

                $method = "set".ucfirst(explode("_", $field)[0]);
                if(method_exists($this, $method)){
                    $this->$method($value);
                }
            }
        }
    }