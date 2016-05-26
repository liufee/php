<?php 
require "../autoload.php";

use Feehi\FamilyTree;

$tree = [
            ['id'=>1, 'name'=>'中国', 'parent_id'=>0],
            ['id'=>2, 'name'=>'美国', 'parent_id'=>0],
            ['id'=>3, 'name'=>'日本', 'parent_id'=>0],
            ['id'=>4, 'name'=>'湖南', 'parent_id'=>1],
            ['id'=>5, 'name'=>'华盛顿','parent_id'=>2],
            ['id'=>6, 'name'=>'广东', 'parent_id'=>1],
            ['id'=>7, 'name'=>'贵州', 'parent_id'=>1],
            ['id'=>8, 'name'=>'怀化', 'parent_id'=>4],
            ['id'=>9, 'name'=>'深圳', 'parent_id'=>6],
            ['id'=>10, 'name'=>'长沙', 'parent_id'=>4],
            ['id'=>11, 'name'=>'纽约', 'parent_id'=>2],
            ['id'=>12, 'name'=>'株洲', 'parent_id'=>4],
            ['id'=>13, 'name'=>'东莞', 'parent_id'=>6],
            ['id'=>14, 'name'=>'麻阳', 'parent_id'=>8],
        ];
$obj = new FamilyTree($tree);
echo "中国的子节点\r\n";
//print_r($obj->getSons(1));
echo "\r\n\r\n";
echo "中国的所有子节点\r\n";
print_r($obj->getDescendants(1));
echo "\r\n\r\n";
echo "麻阳的所有父节点\r\n";
print_r($obj->getAncectors(14));