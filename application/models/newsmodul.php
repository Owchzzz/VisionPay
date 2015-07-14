<?php
class Newsmodul extends CI_Model{
    public function fetch_news(){
        $query=$this->db->get('news');
        $result="";
        foreach($query->result() as $row){
            $date = $row->date;
            $content= $row->content;
            $title = $row->title;
            $id=$row->id;
            $result.="<tr><td>$date</td><td>$title</td><td><a href=\"/admin/newsedit?id=$id\">Edit</a> | <a href=\"/admin/newsdel?id=$id\">Delete</a></td></tr>";
        }
        return $result;
    }
    
    public function fetch_newsid($id){
        $query=$this->db->get_where('news',array('id'=>$id));
        $data=array();
        $data['title']="";
        $data['content'] = "";
        $images="";
        $data['image']="";
        foreach($query->result() as $row){
            $data['title'] = $row->title;
            $data['content'] = $row->content;
            if(is_dir("/var/www/visionclab/data/www/visionclab.com/media/news/$row->id")){
                
                $images = glob("/var/www/visionclab/data/www/visionclab.com/media/news/$row->id/" . "{*.jpg,*.gif,*.png,*.bmp}", GLOB_BRACE);
                foreach($images as $image){
                    
                    $img = basename($image);
                    $data['image'] = "/media/news/$row->id/$img";
                }
            }
        }
        
        return $data;
    }
    
    public function create_news($title,$content){
        $date = date("Y-m-d",time());
        $data=array('title'=>$title,'content'=>$content,'date'=>$date);
        $this->db->insert('news',$data);
        $insertid=$this->db->insert_id();
        $dir="media/news/$insertid";
        
        if(!is_dir($dir))
        {
            mkdir($dir);
        }
        if(is_dir($dir)){
            if($_FILES["file"]["error"] > 0){
                
            }else{
                $extension=end(explode(".", $_FILES["file"]["name"]));
                move_uploaded_file($_FILES["file"]["tmp_name"],$dir."/thumb.$extension");
            }
        }
    }
    
    public function delete_news($id){
        $this->db->delete('news',array('id'=>$id));
    }
    
    public function update_news($id,$title,$content){
        $data=array('title'=>$title,'content'=>$content);
        $this->db->where('id',$id);
        $dir="media/news/$id";
        
        if(!is_dir($dir))
        {
            mkdir($dir);
        }
        if(is_dir($dir)){
            if($_FILES["file"]["error"] > 0){
                
            }else{
                $extension=end(explode(".", $_FILES["file"]["name"]));
                move_uploaded_file($_FILES["file"]["tmp_name"],$dir."/thumb.$extension");
            }
        }
        $this->db->update('news',$data);
    }
}