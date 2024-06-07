<?php

namespace Admin\XuongOop\Controllers\Admin;

use Admin\XuongOop\Commons\Controller;
use Admin\XuongOop\Commons\Helper;
use Admin\XuongOop\Models\News;
use Admin\XuongOop\Models\Category;
use Admin\XuongOop\Models\Status;
use Rakit\Validation\Validator;


class NewsController extends Controller
{
    private News $news;
    private Category $category;
    private Status $status;

    public function __construct()
    {
        $this->news = new News();
        $this->category = new Category();
        $this->status = new Status();
    }
    public function index()
    {
        $allNews = $this->news->all();

        $this->renderViewAdmin("news.index", [
            "allNews" => $allNews
        ]);
    }
    public function create()
    {
        $categories = $this->category->all();
        $this->renderViewAdmin('news.create', [
            'categories'=> $categories
        ]);
    }

    public function store()
    {

        $validator = new Validator;
        $validator->setMessages([
            'required' => ':attribute không được để trống',
            'min'      => ':attribute quá ngắn',
            'max'      => ':attribute không được quá 170 ký tự',
            'uploaded_file' => 'Vui lòng chọn ảnh và ảnh không được quá 2MB'
        ]);
        $validation = $validator->make($_POST + $_FILES, [
            'title'         => 'required|min:10|max:70',
            'description'   => 'required|max:170',
            'news_image'    => 'required|uploaded_file:0,2M,png,jpg,jpeg',
            'content'       => 'required|min:200',
        ]);

        $validation->validate();

        if ($validation->fails()) {
            $_SESSION['errors'] = $validation->errors()->firstOfAll();

            header('Location: ' . url('admin/news/create'));
        }else{
            
            $data = [
                'title'         => $_POST['title'],
                'category_id'   => $_POST['category_id'],
                'description'   => $_POST['description'],
                'content'       => $_POST['content'],
                'author_id'     => $_SESSION['user']['id'],
            ];

            if (isset($_FILES['news_image']) && $_FILES['news_image']['size'] > 0)
            {
                $from = $_FILES['news_image']['tmp_name'];
                $to = 'assets/uploads/' . time() . $_FILES['news_image']['name'];
                if(move_uploaded_file($from, PATH_ROOT . $to)){
                    $data['news_image'] = $to;
                }else{
                    $_SESSION['errors']['image'] = "Tải hình ảnh thất bại";

                    header("Location: ". url("admin/news/create"));
                    exit;
                }
            }

            $this->news->insert($data);

            $_SESSION['status'] = true;
            $_SESSION['msg'] = 'Thêm mới tin tức thành công';

            header('Location: ' . url('admin/news'));
            exit;
        }
    }

    public function show($id)
    {
        $news = $this->news->showById($id);

        $this->renderViewAdmin('news.show', [
            'news'=> $news
        ]);
    }

    public function edit($id)
    {
        $states = $this->status->all();
        $categories = $this->category->all();
        $news = $this->news->findById($id);

        $this->renderViewAdmin('news.edit', [
            'categories'=> $categories,
            'news'      => $news,
            'states'    => $states
        ]);
    }

    public function update($id)
    {
        
        $news = $this->news->findById($id);

        $validator = new Validator;
        $validation = $validator->make($_POST + $_FILES, [
            'title'         => 'required|min:10',
            'description'   => 'required|max:255',
            'news_image'    => 'uploaded_file:0,2M,png,jpg,jpeg',
            'content'       => 'required|min:200',
        ]);

        $validation->validate();

        if ($validation->fails()) {
            $_SESSION['errors'] = $validation->errors()->firstOfAll();

            header('Location: ' . url("admin/news/{$id}/edit"));
        }else{
            $data = [
                'title'         => $_POST['title'],
                'category_id'   => $_POST['category_id'],
                'description'   => $_POST['description'],
                'content'       => $_POST['content'],
                'status_id'     => $_POST['status_id'],
            ];

            $flagUpload = false;
            if (isset($_FILES['news_image']) && $_FILES['news_image']['size'] > 0)
            {
                $flagUpload = true;

                $from = $_FILES['news_image']['tmp_name'];
                $to = 'assets/uploads/' . time() . $_FILES['news_image']['name'];
                if(move_uploaded_file($from, PATH_ROOT . $to)){
                    $data['news_image'] = $to;
                }else{
                    $_SESSION['errors']['image'] = "Tải hình ảnh thất bại";

                    header("Location: ". url("admin/news/{$id}/edit"));
                    exit;
                }
            }

            $this->news->update($id ,$data);

            if( $flagUpload && 
                $news['news_image'] &&
                file_exists(PATH_ROOT . $news['news_image']) )
            {
                unlink(PATH_ROOT . $news['news_image']);
            }
            $_SESSION['status'] = true;
            $_SESSION['msg'] = 'Cập nhật tin tức thành công';

            header('Location: ' . url("admin/news/{$id}/edit"));
            exit;
        }
        
    }

    public function delete($id)
    {
        $news = $this->news->findById($id);

        $this->news->delete($id);

        if( $news["news_image"] &&
            file_exists(PATH_ROOT . $news["news_image"])
        ){
            unlink(PATH_ROOT . $news["news_image"]);
        }
        
        $_SESSION["status"] = true;
        $_SESSION["msg"] = "Xóa thành công";

        header("Location: ". url("admin/news"));
        exit;
    }
}