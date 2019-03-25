<?php
/*
* Project: Gkiokan.NET | Posts
* Author: Gkiokan Sali
* URI: http://www.gkiokan.net
* Comments:
* This is the Posts Class which serves different Categories.
* The perform for the Back- & Frontend will be in this file.
*/

class posts extends Controller{

  private $_db;

    public function __construct(){
        $this->user = $this->model('User');

        if(!$this->user->isLoggedIn()) redirect::to("/login");

        $this->_db = db::getInstance();
        $this->post = $this->model('PostsModel', $this->user->data()->id);
        //show_all_errors();
    }

    public function index($category=null, $name=null){

      $this->params['category'] = $category;
      $this->params['name'] = $name;
      $this->view('posts/showPost', $this);

    }

    public function newCategory(){
      if(input::exists()):
      if(token::check(input::get('token'))):
          $validate = new validate();
          $check = $validate->check($_POST, array(
                                                  'name'=>array('unique'=>'posts_categories', 'min'=>3, 'required'=>true),
                                                  'description'=>array('required'=>true)
                                                ));

          if($check->passed()):
              $options=array();
              $options['google'] = input::get('google');
              $options['twitter'] = input::get('twitter');
              $options['facebook'] = input::get('facebook');
              $options = json_encode($options);

              try{
                $this->post->createCategory(array(
                                          'name'=>input::get('name'),
                                          'description'=>input::get('description'),
                                          'options'=>$options,
                                          'status'=>input::get('status')
                                            ));
                session::flash('editPostCategory', "<p class='text-success bg-success'>Post Category has been created</p>");
                $last_id = $this->_db->lastInsertId();
                redirect::to("/posts/editCategory/$last_id");

                } catch(Exception $e){ die($e->getMessage()); }
          else:
              $this->errors = $check->errors();
          endif;
      endif; endif;


      $this->view('posts/newPostCategory', $this);
    }

    public function editCategory($id){
          $this->post->findCategory($id);

        if(input::exists()):
        if(token::check(input::get('token'))):
                $validate = new validate();
                $check = $validate->check($_POST, array(
                  'name'=>array('min'=>3, 'required'=>true),
                  'description'=>array('required'=>true)
                ));

                if($check->passed()):
                  $options=array();
                  $options['google'] = input::get('google');
                  $options['twitter'] = input::get('twitter');
                  $options['facebook'] = input::get('facebook');
                  $options = json_encode($options);

                  try{
                    $this->post->updateCategory(array(
                      'name'=>input::get('name'),
                      'description'=>input::get('description'),
                      'options'=>$options,
                      'status'=>input::get('status')
                    ), $id);
                    session::flash('editPostCategory', "<p class='text-success bg-success'>Post Category has been updated</p>");
                    redirect::to("/posts/editCategory/$id");

                  } catch(Exception $e){ die($e->getMessage()); }
                else:
                  $this->errors = $check->errors();
                endif;
          endif; endif;

          $this->view('posts/editPostCategory', $this);
    }

    public function ManageCategories(){
        $this->post->allCategories();
        $this->view('posts/ManagePostCategories', $this);
    }

    public function newPost($id){

        $this->view('posts/newPost', $this);
    }
}
