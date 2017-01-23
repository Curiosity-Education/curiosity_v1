<?php
class viewsController extends BaseController{
   protected $objViews = array(
      "administer.admin-activities"     => "manage_content",
      "administer.admin-blocks"         => "manage_content",
      "administer.admin-intelligences"  => "manage_content",
      "administer.admin-levels"         => "manage_content",
      "administer.admin-libraryPdfs"    => "manage_content",
      "administer.admin-libraryVideos"  => "manage_content",
      "administer.admin-plans"          => "manage_content",
      "administer.admin-topics"         => "manage_content",
      "administer.admin-teachers"       => "manage_teacher_aliance",
      "administer.asociateSchool"       => "manage_school_aliance",
      "administer.admin-employees"      => "manage_administrative",
      "administer.admin-salescode"      => "manage_administrative",
      "child.init"                      => "child_actions",
      "child.menu-studio"               => "child_actions",
      "child.profile"                   => "child_actions",
      "child.library_videos"            => "child_actions",
      "child.store"                     => "child_actions",
      "parent.profile"                  => "parent_actions",
      "parent.pay-suscription"                  => "parent_actions",
   );

   public function getViewWithData($controller = '',$method = '',$viewName){
      return "Nada";
      if($controller != '' || $method != ''){
         $callback = $controller."Controller@".$method;
         $data = ExternalCall::execute($callback);
      }
      else{
         $data = [];
      }
      return View::make($viewName,$data);
   }
   public function getViewWithOutData($viewName){
      $permission = $this->getPermissionView($viewName);
      if ($permission != null){
         if (Entrust::can($permission)){
            return View::make($viewName);
         }
      }
      return View::make('errors.404');
   }

   private function getPermissionView($view){
      $p = null;
      foreach ($this->objViews as $key => $value) {
         if ($view == $key) { $p = $value; }
      }
      return $p;
   }
}
