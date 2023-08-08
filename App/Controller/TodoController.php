<?php
namespace App\Controller;

class TodoController{
    public function list(){
        $data = [
          "tasks" => ["One Task", "Two Task" ,"Three Task" ,"Four Task",],
          "title" => "Lists"
        ];
        view("test.list", $data);
    }
    public function post($post){
        $slug = $post[1] ?? '';
        view("post.$slug.index");
    }
}
