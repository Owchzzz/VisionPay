<?php

class Templatequery extends CI_Model{
    public function load_news(){
        $query=$this->db->get('news');
        $result = "";
        $date="";
        $title="";
        $content="";
        $day = "";
        $month="";
        $mon="";
        $year="";
        foreach($query->result() as $row){
            $date = $row->date;
			$day = date("d",strtotime($date));
            $month = date("m",strtotime($date));
            switch($month){
                case 1:
                    $mon = "Jan";
                    break;
                case 2:
                    $mon = "Feb";
                    break;
                case 3:
                    $mon = "Mar";
                    break;
                case 4:
                    $mon = "Apr";
                    break;
                case 5:
                    $mon="May";
                    break;
                case 6:
                    $mon = "Jun";
                    break;
                case 7:
                    $mon="Jul";
                    break;
                case 8:
                    $mon="Aug";
                    break;
                case 9:
                    $mon="Sep";
                    break;
                case 10:
                    $mon="Oct";
                    break;
                case 11:
                    $mon="Nov";
                    break;
                case 12:
                    $mon="Dec";
                    break;
            }
            $year = date("Y",strtotime($date));
            $content=$row->content;
            if(strlen($content) > 65){
                $content = substr($content,0,65);
                $content.= "...";
            }
            
            $result.="<li><a href=\"/templates/news_1?id=$row->id\"> <span class=\"span_date\">$day $mon<br />$year<h4>$title</h4></a><span>$content</span></li>";
        }
        return $result;
    }
    
    public function load_newsid($id){
        $query=$this->db->get_where('news',array('id'=>$id));
        $data=array();
        foreach($query->result() as $row){
            $data['date'] = $row->date;
            $data['title'] = $row->title;
            $data['content'] = $row->content;
            $data['image'] = "/media/images/news_1.jpg";
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
    
    public function load_all_news(){
        mysql_set_charset('utf8');
        $query=$this->db->get('news');
        $data=array();
        $output="";
        $images="";
        $fimage="";
        $greatnews = lang('great_new');
        $moredetails=lang('more_details');
        $totalnewscount=0;
        $arr=array();
        foreach($query->result() as $row){
            $totalnewscount++;
            $date = $row->date;
            $day = date("d",strtotime($date));
            $month = date("m",strtotime($date));
            switch($month){
                case 1:
                    $mon = "Jan";
                    break;
                case 2:
                    $mon = "Feb";
                    break;
                case 3:
                    $mon = "Mar";
                    break;
                case 4:
                    $mon = "Apr";
                    break;
                case 5:
                    $mon="May";
                    break;
                case 6:
                    $mon = "Jun";
                    break;
                case 7:
                    $mon="Jul";
                    break;
                case 8:
                    $mon="Aug";
                    break;
                case 9:
                    $mon="Sep";
                    break;
                case 10:
                    $mon="Oct";
                    break;
                case 11:
                    $mon="Nov";
                    break;
                case 12:
                    $mon="Dec";
                    break;
            }
            $year = date("Y",strtotime($date));
            $id=$row->id;
            $title=$row->title;
            $fimage="";
            if(is_dir("/var/www/visionclab/data/www/visionclab.com/media/news/$row->id")){
                
                $images = glob("/var/www/visionclab/data/www/visionclab.com/media/news/$row->id/" . "{*.jpg,*.gif,*.png,*.bmp}", GLOB_BRACE);
                foreach($images as $image){
                  
                    $img = basename($image);
                    $fimage = "/media/news/$row->id/$img";
                   
                }
            }
           	$content=$row->content;
            if(strlen($content) > 65){
                $content = substr($content,0,65);
                $content.= "...";
            }
            $output="<li><a href=\"/templates/news_1?id=$id\"><div class=\"imgholder\"><img src=\"$fimage\" /></div></a><span class=\"span_date\">$day $mon<br />$year</span><h4><a href=\"/templates/news_1?id=$id\">$title</a></h4><span>$content</span><a href=\"/templates/news_1?id=$id\">$moredetails</a></li>";
            //$output = iconv('UTF-8', 'UTF-8//IGNORE', utf8_encode($output));
            //$output=  json_decode($output);
            //$output= utf8_decode($output);
            
            array_push($arr,$id);
            
       }
       //update
       
       $data['totalnewscount'] = $totalnewscount;
        $data['all_news'] = json_encode($arr);
       echo json_last_error();
        return $data;
    }
}
