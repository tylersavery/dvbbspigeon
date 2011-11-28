<?php
class Pigeon {
    
    private $uri;
    private $uri_string;
    private $controller;
    private $controllers;
    private $controller_data;
    
    function __construct() {
        $this->controllers = array(
           
            
            //frontend
            
            'Home_Controller' => array(
                array()
            ),
            'Article_Controller' => array(
              array('article', '{is_string:article_slug}||{is_int:article_id}')
            ),
            
            //blog
            'Blog_Controller' => array(
              array('blog')
            ),
            'Blog_Single_Controller' => array(
              array('blog', '{is_string:post_slug}||{is_int:post_id}')
            ),
            
            
            
            //admin
            
            'Admin_Controller' => array(
                array('admin')
            ),
            'Admin_Login_Controller' => array(
                array('admin', 'login')
            ),
            'Admin_Logout_Controller' => array(
                array('admin', 'logout')
            ),
            
            //articles
            
            'Admin_Article_Controller' => array(
                array('admin', 'article'),         
                array('admin', 'articles')
            ),
            'Admin_Article_Add_Controller' => array(
                array('admin', 'article', 'add'),         
            ),
            'Admin_Article_Edit_Controller' => array(
                array('admin', 'article', 'edit', '{is_int:article_id}'),         
            ),
            
            //categories
            
            'Admin_Category_Controller' => array(
                array('admin', 'category'),         
                array('admin', 'categories')
            ),
            'Admin_Category_Add_Controller' => array(
                array('admin', 'category', 'add'),         
            ),
            'Admin_Category_Edit_Controller' => array(
                array('admin', 'category', 'edit', '{is_int:category_id}'),         
            ),
            
            //users
            
            'Admin_User_Controller' => array(
                array('admin', 'user'),         
                array('admin', 'users')
            ),
            'Admin_User_Add_Controller' => array(
                array('admin', 'user', 'add'),         
            ),
            'Admin_User_Edit_Controller' => array(
                array('admin', 'user', 'edit', '{is_int:user_id}'),         
            ),
            
             
            //ajax
            
            'Ajax_Post_Article_Controller' => array(
                array('ajax', 'post', 'article')
            ),
            'Ajax_Post_User_Controller' => array(
                array('ajax', 'post', 'user')
            ),
            'Ajax_Post_Category_Controller' => array(
                array('ajax', 'post', 'category')
            ),
            
            //feed
            
            'Feed_Controller' => array(
                array('feed', '{is_string:format}')
            ),
            
            
            
        );
    }
    
     public function fly() {

        if (isset($_GET['p'])) {
            $this->uri_string = rtrim(strtolower($_GET['p']), '/');
        } else {
            $this->uri_string = '';
        }
        
        $this->uri = explode('/', $this->uri_string);
        
        foreach ($this->uri as $key=>$value) {
            if ((int)$value != null) $this->uri[$key] = (int)$value;
            else if ((float)$value != null) $this->uri[$key] = (float)$value;
        }
        
        $match = false;
        foreach ($this->controllers as $controller=>$patterns) {
            
            if ($match) break;
            
            foreach ($patterns as $pattern) {
                
                if ($match) break;
                $pattern_string = '';
                
                foreach ($pattern as $pattern_key=>$pattern_value) {
                    $pattern_needle = '~'.$pattern_value;
                    if (strpos($pattern_needle, '{') && strpos($pattern_needle, '}')) {   
                        $stripped_pattern = str_replace(array('{', '}'), '', $pattern_value);
                        $data_options = explode('||', $stripped_pattern);
                        $data_match = false;
                        
                        if (isset($this->uri[$pattern_key])) {
                            foreach ($data_options as $data_option) { 
                                $data = explode(':', $data_option);
                                if ($data[0]($this->uri[$pattern_key])) {
                                    $this->controller_data[$data[1]] = $this->uri[$pattern_key];
                                    $data_match = true;
                                    break;
                                } 
                            }
                        }
                        if ($data_match) $pattern_string .= $this->uri[$pattern_key];  
                    } else {
                        $pattern_string .= $pattern_value;
                    } 
                    if ($pattern_key != (sizeof($pattern)-1)) $pattern_string .= '/';   
                }
                if ($pattern_string == $this->uri_string) {
                    $match = true;
                    $this->controller = new $controller($this->uri, $this->controller_data);
                    break;
                } else { 
                    $this->controller_data = null; 
                }
            }
        }
        
        if (empty($this->controller)) {
            $this->controller = new Static_404_Controller($this->uri, $this->controller_data);
        }
        
        return $this->controller->render_view();
    
    }
    
}
?>