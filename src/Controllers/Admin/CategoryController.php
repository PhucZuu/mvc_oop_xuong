<?php

namespace Admin\XuongOop\Controllers\Admin;

use Admin\XuongOop\Commons\Controller;
use Admin\XuongOop\Commons\Helper;
use Admin\XuongOop\Models\Category;
use Rakit\Validation\Validator;

class CategoryController extends Controller
{
    private Category $category;
    public function __construct()
    {
        $this->category = new Category();
    }
    public function index()
    {
        $categories = $this->category->all();
        $this->renderViewAdmin('categories.index', [
            'categories'=> $categories
        ]);
    }

    public function indexDelete()
    {
        $categories = $this->category->allDel();
        $this->renderViewAdmin('categories.index', [
            'categories'=> $categories
        ]);
    }

    public function store()
    {
        $validator = new Validator;
        $validator->setMessages([
            'required'   => ':attribute không được để trống',
            'max'       => 'Tên danh mục không được quá 30 ký tự'
        ]);
        $validation = $validator->make($_POST, [
            'category_name' => 'required|max:30',
        ]);

        $validation->validate();
        if ($validation->fails()) 
        {
            $_SESSION['errors'] = $validation->errors()->firstOfAll();

            header('Location: ' . url('admin/categories/create'));
            exit();
        }else{
            $uniqueCategory = $this->category->uniqueCategory($_POST['category_name']);
            if(!$uniqueCategory)
            {
                $data = [
                    'category_name'=> $_POST['category_name']
                ];
            }else{
                $_SESSION['errors']['unique'] = "Category already exist";
                header('Location: '. url('admin/categories/create'));
            }

            $this->category->insert($data);
            $_SESSION['status'] = true;
            $_SESSION['msg'] = 'Thao tác thành công';
            header('Location: '. url('admin/categories'));
            exit();
        }
    }

    public function create()
    {
        $this->renderViewAdmin('categories.create');
    }

    public function show($id)
    {
       $category = $this->category->findById($id);

       $this->renderViewAdmin('categories.show', [
        'category'=> $category
       ]);
    }

    public function edit($id)
    {
        $category = $this->category->findById($id);
        
        $this->renderViewAdmin('categories.edit', [
            'category'=> $category
        ]);
    }

    public function update($id)
    {
        $category = $this->category->findById($id);

        $validator = new Validator;
        $validator->setMessages([
            'required'   => ':attribute không được để trống',
            'max'       => 'Tên danh mục không được quá 30 ký tự'
        ]);
        $validation = $validator->make($_POST, [
            'category_name' => 'required|max:30',
        ]);

        $validation->validate();
        if ($validation->fails()) 
        {
            $_SESSION['errors'] = $validation->errors()->firstOfAll();

            header('Location: ' . url("admin/categories/{$category['id']}/edit"));
            exit();
        }else{
            $data = [
                'category_name'=> $_POST['category_name']
            ];

            $this->category->update($id, $data);
            $_SESSION['status'] = true;
            $_SESSION['msg'] = 'Thao tác thành công';
            header('Location: '. url("admin/categories/{$category['id']}/edit"));
            exit();
        }
    }

    public function restore($id)
    {
        $this->category->update($id, ["active" => 1]);
        
        $_SESSION['status'] = true;
        $_SESSION['msg'] = 'Khôi phục thành công';

        header('Location: ' . url('admin/categories'));
        exit();
    }

    public function softDelete($id)
    {
        $this->category->update($id, ["active" => 0]);

        $_SESSION['status'] = true;
        $_SESSION['msg'] = 'Xóa thành công';

        header('Location: ' . url('admin/categories'));
        exit();
    }

    public function delete($id)
    {
        $_SESSION['status'] = true;
        $_SESSION['msg'] = 'Xóa thành công';

        header('Location: ' . url('admin/categories'));
        exit();
    }
}