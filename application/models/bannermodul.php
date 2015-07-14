<?php

class Bannermodul extends CI_Model{
    public function load_banners(){
        $query=$this->db->get('banner_sizes');
        $sizes=array();
        $sizewidth=array();
        $sizeheight=array();
        $actsize=array();
        foreach($query->result() as $row){
            array_push($sizes, $row->banner_size_id);
            array_push($sizewidth,$row->banner_width);
            array_push($sizeheight,$row->banner_height);
            array_push($actsize,$row->banner_size);
        }
        $farray=array();
        $output="";
        $banner=lang('banners');
        for($i=0;$i<count($sizes);$i++){
            $width=$sizewidth[$i];
            $height=$sizeheight[$i];
            $size=$actsize[$i];
            $output.="<h3>$banner</h3><span>$size</span>";
            $query=$this->db->get('banners');
            foreach($query->result() as $row){
                if($row->banner_size == $sizes[$i]){
                    $output .= "<img src=\"$row->file_path\" />".'<p class="p_cod">&lt;a href="http://www.visionclab.com" target="_blank" &gt;&lt;img src="http://www.visionclab.com'.$row->file_path.'" border="0" width="'.$width.'" height="'.$height.'" alt="" /&gt;&lt;/a&gt;</p>';
                }
            }
        }
        $fdata=array('output'=>$output);
        return $fdata;
    }
}