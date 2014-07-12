<?php
class CategoriaComposer {
 
    public function compose($view)
    {
        $categories = Category::all();
 
        $view->with(compact('categories'));
    }
 
}