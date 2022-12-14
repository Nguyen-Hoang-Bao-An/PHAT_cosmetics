<?php
namespace App\Components;
use App\Models\Category;

class Recursive{
    private $htmlSelect = '';

    public function __construct($data) {
        $this->data = $data;
    }

    function categoryRecursive($parentId, $id = 0, $text='') {
            $data = Category::all();

            foreach ($data as $value) {
                if ($value['parent_id'] == $id) {
                    if(!empty($parentId) && $parentId == $value['id']) {
                        $this->htmlSelect .= "<option selected value='" . $value['id'] ."'>". $text . $value['name']. "</option>";
                } else { 
                    $this->htmlSelect .="<Option value='" . $value['id'] ."'>". $text . $value['name'] ."</option>";
                }

                    $this->categoryRecursive($parentId, $value['id'], $text.'--');
            }
        }

        return $this->htmlSelect;

    }
    

}







?>
