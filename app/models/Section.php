<?php

namespace App\models;

use App\helpers\Connection;

class Section
{
    public static function getSectionImg($section)
    {
        $query = Connection::make()->prepare("SELECT img, content, section_elements.name as element, section_elements.description, sections.name as name_sections 
        FROM elements_img 
        INNER JOIN section_elements ON elements_img.sect_elements_id = section_elements.id 
        INNER JOIN sections ON section_elements.sections_id = sections.id
        WHERE sections.name = :section");
        $query->execute(["section" => $section]);
        return $query->fetchAll();
    }

    public static function getSectionText($section){
        $query = Connection::make()->prepare("SELECT text, content, section_elements.name as element, section_elements.description, sections.name as name_sections 
        FROM elements_text 
        INNER JOIN section_elements ON elements_text.sect_element_id = section_elements.id 
        INNER JOIN sections ON section_elements.sections_id = sections.id
        WHERE sections.name = :section");
        $query->execute(["section" => $section]);
        return $query->fetchAll();
    }

    public static function getSectionElements($section){
        $query = Connection::make()->prepare("SELECT  section_elements.*  
        FROM section_elements 
        INNER JOIN sections ON section_elements.sections_id = sections.id
        WHERE sections.name = :section");
        $query->execute(["section" => $section]);
        return $query->fetchAll();
    }

    public static function getElementTexts($section_element_id){
        $query = Connection::make()->prepare("SELECT  *  
        FROM elements_text
        WHERE sect_element_id = :section_element_id");
        $query->execute(["section_element_id" => $section_element_id]);
        return $query->fetchAll();
    }

    public static function getElementImg($section_element_id){
        $query = Connection::make()->prepare("SELECT  *  
        FROM elements_img
        WHERE sect_elements_id = :section_element_id");
        $query->execute(["section_element_id" => $section_element_id]);
        return $query->fetchAll();
    }

    public static function changeElementImg($id, $img){
        $query = Connection::make()->prepare("UPDATE elements_img SET img = :img WHERE elements_img.id = :id");
        $query->execute([
            'id' => $id,
            'img' => $img
        ]);
    }
}
