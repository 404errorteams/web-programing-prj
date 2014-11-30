<?php
class GlobalVar {
    
    static function read($key){
        global ${'global_'.$key};
        return ${'global_'.$key};
    }    
    
    static function write($key, $val){
        global ${'global_'.$key};
        ${'global_'.$key} = $val;
    }
    
    	static function get_html_sidebar_nav($active = null){
        global $global_sidebar_nav;
        $html_sidebar_nav = '<div style="background-color: #FFFFFF;">';
        $html_sidebar_nav .= '<ul class="nav nav-tabs nav-pills nav-stacked">';
        //if(isset($this->Session->read(SESSION_USER))){
            $session_user = 'admin';//strtolower($this->Session->read(SESSION_USER));
        //}
            
        foreach($global_sidebar_nav as $key => $val){
            if($session_user=='admin'){
                if ($val['type'] == 'nav_header'){
                    $html_sidebar_nav .= '<li class="active"><a>'.$val['title'].'</a></li>';
                } else {
                    $html_sidebar_nav .= '<li><a href="'.$val['url'].'">'.$val['title'].'<i class="pull-right icon-chevron-right"></i></a></li>';
                }
            }else{
                if($val['url'] !=ADMIN_ROOT_URL . 'admindevtool/querytool' || $val['url'] !=ADMIN_ROOT_URL . 'adminquiz/crawl'){
                    if ($val['type'] == 'nav_header'){
                        $html_sidebar_nav .= '<li class="active"><a>'.$val['title'].'</a></li>';
                    } else {
                        $html_sidebar_nav .= '<li><a href="'.$val['url'].'">'.$val['title'].'<i class="pull-right icon-chevron-right"></i></a></li>';
                    }
                }
            }
        }
        
        $html_sidebar_nav .= '</ul>';
        $html_sidebar_nav .= '</div>';
        return $html_sidebar_nav;
    }
    
    static function get_html_error($message){
        return '<div class="alert alert-error"><button type="button" class="close" data-dismiss="alert">×</button>'.$message.'</div>';
    }
	
	static function get_html_success($message){
        return '<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert">×</button>'.$message.'</div>';
    }

//chua thay su dung

/*
	static function get_spiral_field_list(){
		global $global_spiral_field_list_arr;
		return $global_spiral_field_list_arr;
	}
	
	static function set_spiral_field_list($val){
		global $global_spiral_field_list_arr;
		$global_spiral_field_list_arr = $val;
	}
    
    static function set_product_categories($cat_arr){
        global $global_product_categories;
        $global_product_categories = $cat_arr;
    }
    
    static function get_product_categories(){
        global $global_product_categories;
        return $global_product_categories;
    }

    static function set_cities($cities_arr){
        global $global_cities;
        $global_cities = $cities_arr;
    }
    
    static function get_cities(){
        global $global_cities;
        return $global_cities;
    }
    
    static function set_sexes($sexes_arr){
        global $global_sexes;
        $global_sexes = $sexes_arr;
    }

    static function get_sexes(){
        global $global_sexes;
        return $global_sexes;
    }

    static function set_giftidea_types($giftidea_types_arr){
        global $global_giftidea_types;
        $global_giftidea_types = $giftidea_types_arr;
    }

    static function get_giftidea_types(){
        global $global_giftidea_types;
        return $global_giftidea_types;
    }

    static function set_giftidea_categories($giftidea_categories_arr){
        global $global_giftidea_categories;
        $global_giftidea_categories = $giftidea_categories_arr;
    }

    static function get_giftidea_categories(){
        global $global_giftidea_categories;
        return $global_giftidea_categories;
    }

    static function set_participate_type($participate_type_arr){
        global $global_participate_type;
        $global_participate_type = $participate_type_arr;
    }

    static function get_participate_type(){
        global $global_participate_type;
        return $global_participate_type;
    }

    static function set_product_statuses($product_statuses){
        global $global_product_statuses;
        $global_product_statuses = $product_statuses;
    }
    
    static function get_product_statuses(){
        global $global_product_statuses;
        return $global_product_statuses;
    }

    static function set_event_statuses($event_statuses){
        global $global_event_statuses;
        $global_event_statuses = $event_statuses;
    }
    
    static function get_event_statuses(){
        global $global_event_statuses;
        return $global_event_statuses;
    }
    
    static function set_fbuser_field_map($fbuser_field_map){
        global $global_fbuser_field_map;
        $global_fbuser_field_map = $fbuser_field_map;
    }
    
    static function get_fbuser_field_map(){
        global $global_fbuser_field_map;
        return $global_fbuser_field_map;
    }
    
    static function set_sidebar_nav($sidebar_nav_arr){
        global $global_sidebar_nav;
        $global_sidebar_nav = $sidebar_nav_arr;
    }
    
    static function get_sidebar_nav(){
        global $global_sidebar_nav;
        return $global_sidebar_nav;
    }
    
    static function get_countries(){
        global $global_countries;
        return $global_countries;
    }
 */   
}