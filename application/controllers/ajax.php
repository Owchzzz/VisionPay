<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ajax extends CI_Controller {
    public function index(){
        $greatnews = lang('great_new');
        $moredetails=lang('more_details');
        $id=$_POST['id'];
        $query=$this->db->get_where('news',array('id'=>$id));
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
            
            echo $output;
            
       }    }
       
       public function generate_captcha_img(){

$string = '';
for ($i = 0; $i < 5; $i++) {
    $string .= chr(rand(97, 122));
}

//$_SESSION['captcha'] = $string; //store the captcha
$this->session->set_userdata(array('captcha'=>$string));
$dir = '../fonts/';
$image = imagecreatetruecolor(165, 50); //custom image size
$font = "PlAGuEdEaTH.ttf"; // custom font style
$color = imagecolorallocate($image, 113, 193, 217); // custom color
$white = imagecolorallocate($image, 255, 255, 255); // custom background color
imagefilledrectangle($image,0,0,399,99,$white);
//imagettftext ($image, 30, 0, 10, 40, $color, 0, $_SESSION['captcha']);
header("Content-type: image/png");
imagepng($image);


       }
}