<?php 

namespace Feehi;

class FamilyTree{

    public $tree;

    public function __construct($tree)
    {
        $this->tree = $tree;
    }

    public function getSons($id)
    {
    	$sons = [];
        foreach ($this->tree as $key => $value) {
        	if($value['parent_id'] == $id) $sons[] = $value;
        }
        return $sons;
    }

    public function getDescendants($id, $level=1)
    {
    	$nodes = [];
    	foreach ($this->tree as $key => $value) {
    		if($value['parent_id'] == $id){
    			$value['level'] = $level;
    			$nodes[] = $value;
    			$nodes = array_merge($nodes, $this->getDescendants($value['id'], $level+1));
    		}
    	}
    	return $nodes;
    }

    public function getAncectors($id)
    {
        $nodes = [];
        foreach ($this->tree as $key => $value) {
            if($value['id'] == $id){
                $nodes[] = $value;
                if($value['parent_id'] != 0){
                    $nodes = array_merge($nodes, $this->getAncectors($value['parent_id']));
                }
           }
        }
        return $nodes;
    }

}