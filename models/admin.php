<?php
class PageControl
{
    public function getPage($route){
        $sql = "SELECT * FROM page WHERE url = '".$route."'";
        $query = mysqli_query(ConDB::connect(), $sql);
        $res = mysqli_fetch_assoc($query);
        return $res;
    }

    public function getAllPages(){
        $sql = "SELECT * FROM page";
        $query = mysqli_query(ConDB::connect(), $sql);
        while ($res[] = mysqli_fetch_assoc($query)){
            $pages = $res;
        }
        return $pages;
    }

    public function deletePage($url){
        $sql = "DELETE FROM page WHERE url='".$url."'";
        mysqli_query(ConDB::connect(), $sql);
        unlink('controllers/'.$url.'.php');
        unlink('views/'.$url.'.php');
    }

    public function insertPageInfo($title, $meta, $content, $url){
        $sql = "INSERT INTO page SET title = '".$title."', content = '".$content."', meta_description = '".$meta."', url = '".$url."'";
        mysqli_query(ConDB::connect(), $sql);
    }

    public function validCreatePage($title, $meta, $content, $url){
        $title = trim($title);
        $meta = trim($meta);
        $content = trim($content);
        $url = trim($url);
        if(!empty($title) && !empty($meta) && !empty($content) && !empty($url) ){
            if(!preg_match('/[^A-Za-z0-9]/', $url)){
                if(!file_exists('controllers/'.$url.'.php')) {
                    $this->insertPageInfo($title, $meta, $content, $url);
                    $this->createFiles($content, $url);
                }
            }else{
               return $_SESSION['errorUrl'] = 'URL должен содержать только латинские знаки и цифры';
            }
        }else{
           return $_SESSION['errorNewPageEmpty'] = 'Заполните все поля';
        }
    }
    public function createFiles($content, $url){
        $pageRequest = '<?php 
Request::header();
Request::view("'. $url .'");
?>';

            file_put_contents('controllers/'.$url.'.php', $pageRequest);
            $pageContent = '<div class="myContent">'.$content.'</div>';
            file_put_contents('views/'.$url.'.php', $pageContent);

    }
}