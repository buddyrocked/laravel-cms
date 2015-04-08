<?php 

use Illuminate\Support\Collection;  
use Illuminate\View\View;


class NavigationViewComposer {

  public function compose(View $view) {
		/*
	    |------------------------------------------------------------------------
	    | Define the main menu
	    |------------------------------------------------------------------------
	    | Each menu is a Collection
	    */
    	$menu = new Collection;
    	$menus = static::getData();
    	foreach ($menus as $m) {
            if($m->childrens){
                $sub = $m->title;
                $$sub = new Collection;
                foreach ($m->childrens()->whereIn('id', static::getGroupMenu())->orderBy('order')->get() as $c) {
                    $class = (Route::currentRouteName() == $c->url)?'active':'';
                    $$sub->push((object)['title' => $c->title, 'link' => URL::route($c->url), 'icon'=>$c->icon, 'active'=>$class, 'name'=>$c->url]);                
                }
                $sub_menu = $$sub;                
            }
            $class = (Route::currentRouteName() == $m->url)?'active':'';
            $menu->push((object)['title' => $m->title, 'link' => ($m->url == '#')?URL::to('#'):URL::route($m->url), 'icon'=>$m->icon, 'active'=>$class, 'name'=>$m->url, 'menu'=>$$sub]);
    	}
    	$view->menu = $menu;
	}

	public static function getData(){
		$menus = Menus::where('parent_id', '=', '0')->whereIn('id', static::getGroupMenu())->orderBy('order')->get();
		return $menus;
	}

    public static function getGroupMenu(){
        $groups = Sentry::getUser()->getGroups();
        $groupIds = array();
        foreach($groups as $group):
            $groupIds[] = $group->id;
        endforeach;

        $GroupMenu = GroupMenu::whereIn('group_id', $groupIds)->get();
        $menuId = array();
        foreach($GroupMenu as $gm):
            $menuId[] = $gm->menu_id;
        endforeach;

        return $menuId;
    }
}