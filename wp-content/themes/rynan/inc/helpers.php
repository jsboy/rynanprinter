<?php
function naming_clazz($str) {
	$str = strtolower($str);
	return str_replace(' ', '-', $str);
}

function wrap_string($str, $tag = 'span', $clazz = ''){
    preg_match_all('/\*.*?\*/', $str, $m, PREG_PATTERN_ORDER);
    $clazz = ($clazz)? " class='$clazz'":"";
    if($m){
        foreach ($m[0] as $item){
            $tmp = "<$tag$clazz>".str_replace("*","", $item)."</$tag>";
            $str = str_replace($item, $tmp, $str);
        }
    }
    return $str;
}

function the_text($text, $before = '', $after = ''){
    if($text):
        echo $before;
        echo wrap_string($text);
        echo $after;
    endif;
}

function wrap_link($str, $tag = 'span', $link = ''){
    preg_match_all('/\*.*?\*/', $str, $m, PREG_PATTERN_ORDER);
    if($m){
        foreach ($m[0] as $item){
            $tmp = "<$tag$link>".str_replace("*","", $item)."</$tag>";
            $str = str_replace($item, $tmp, $str);
        }
    }
    return $str;
}

function make_term_condition_text($text, $before = '', $after = ''){
    $TCs = get_privacy_policy_url();
    if($text):
        echo $before;
        echo wrap_link($text, 'a', ' target="_blank" href="'. $TCs .'"' );
        echo $after;
    endif;
}

function the_class_css($clazz){
    if($clazz){
        return 'class="'.$clazz. '"';
    }
    return '';
}

function the_image($img, $clazz = '', $style=''){
    if($img['url']){
        echo '<img src="'.$img['url'].'" alt="'.$img['alt'].'" '. the_class_css($clazz) .' style="'.$style.'">';
    }
}

function the_button($button, $cssClass='btn-default', $p=false){
    $type = $button['type'];
    $target = $button['target'];
    $url = ($type == 'internal')?get_permalink($button['link']):$button['url'];
    if($type == 'internal'){
        if($button['anchor']) $url .= $button['anchor'];
    }
    if($url){
        if($p){
            echo '<p><a  href="'.$url.'" class="btn '. $cssClass .'" '. $target .'>'.$button['label'].'</a></p>';
        }else{
            echo '<a  href="'.$url.'" class="btn '. $cssClass .'" '. $target .'>'.$button['label'].'</a>';
        }
    }
}

function the_action_buttons($buttons, $button_clazz = 'btn-default', $before = '<div class="div-cta">', $after = '</div>'){
    if($buttons){
        echo $before;
        foreach ($buttons as $item){
            the_button($item, $button_clazz);
        }
        echo $after;
    }
}

function get_social_link($item){
    if($item['brand'] == 'icon-tel.png'):
        $link = 'tel:'.$item['phone'];
    elseif($item['brand'] == 'icon-email.png'):
        $link = 'mailto:'.$item['email'];
    else:
        $link = $item['link'];
    endif;
    return $link;
}

function get_custom_url($button){
    $type = $button['type'];
    $url = ($type == 'internal')?get_permalink($button['link']):$button['url'];
    if(!$url || $url == '') return false;
    return $url;
}

function the_padding($padding, $inside=false){
    $padding_css = '';
    $padding_top = ($padding['padding_top'] != '')?'padding-top: '.$padding['padding_top']. 'px;':'';
    $padding_bottom = ($padding['padding_bottom'] != '')?'padding-bottom: '.$padding['padding_bottom']. 'px;':'';
    $padding_css .= $padding_top.$padding_bottom;
    $padding_css = (!$inside)?'style="'. $padding_css .'"': $padding_css;
    echo $padding_css;
}

add_filter('the_content', function($content){
   return wrap_string($content);
});

add_filter('the_title', function($title){
    return wrap_string($title);
});

function the_social_share($arr, $post_id, $before = '<div class="heading-blog-right">', $after = '</div>'){
    if(!$arr || !$post_id) return;
    echo $before;
    echo '<ul class="share">';
    $title = urlencode(get_the_title( $post_id ));
    $url = urlencode(get_permalink( $post_id ));
    if(in_array('facebook', $arr)){
        ?>
        <li><a onClick="window.open('http://www.facebook.com/sharer.php?s=100&amp;p[title]=<?php echo $title;?>&amp;p[url]=<?php echo $url; ?>', 'sharer', 'toolbar=0,status=0,width=548,height=325')" target='_parent' href='javascript: void(0)'><i class='fab fa-facebook-f'></i></a></li>
        <?php
    }
    if(in_array('twitter', $arr)){
        ?>
        <li><a onClick="window.open('https://twitter.com/intent/tweet?original_referer=<?php echo $url;?>&ref_src=twsrc%5Etfw&text=<?php echo $title; ?>&&tw_p=tweetbutton&url=<?php echo $url;?>', 'sharer', 'toolbar=0,status=0,width=548,height=325')" target='_parent' href='javascript: void(0)'><i class="fab fa-twitter"></i></a></li>
        <?php
    }
    if(in_array('email', $arr)){
        ?>
        <li><a href="mailto:?subject=<?php echo get_the_title( $post_id );?>&amp;body=<?php echo $url;?>"><i class="far fa-envelope"></i></a></li>
        <?php
    }
    echo '</ul>';
    echo $after;
}

function youtube_id_from_url($url) {
    $pattern = 
        '%^# Match any youtube URL
        (?:https?://)?  # Optional scheme. Either http or https
        (?:www\.)?      # Optional www subdomain
        (?:             # Group host alternatives
          youtu\.be/    # Either youtu.be,
        | youtube\.com  # or youtube.com
          (?:           # Group path alternatives
            /embed/     # Either /embed/
          | /v/         # or /v/
          | /watch\?v=  # or /watch\?v=
          )             # End path alternatives.
        )               # End host alternatives.
        ([\w-]{10,12})  # Allow 10-12 for 11 char youtube id.
        $%x'
        ;
    $result = preg_match($pattern, $url, $matches);
    if ($result) {
        return $matches[1];
    }
    return false;
}

function upload_user_file( $file = array() ) {

    require_once( ABSPATH . 'wp-admin/includes/admin.php' );

      $file_return = wp_handle_upload( $file, array('test_form' => false ) );

      if( isset( $file_return['error'] ) || isset( $file_return['upload_error_handler'] ) ) {
          return false;
      } else {

          $filename = $file_return['file'];

          $attachment = array(
              'post_mime_type' => $file_return['type'],
              'post_title' => preg_replace( '/\.[^.]+$/', '', basename( $filename ) ),
              'post_content' => '',
              'post_status' => 'inherit',
              'guid' => $file_return['url']
          );

          $attachment_id = wp_insert_attachment( $attachment, $file_return['url'] );

          require_once(ABSPATH . 'wp-admin/includes/image.php');
          $attachment_data = wp_generate_attachment_metadata( $attachment_id, $filename );
          wp_update_attachment_metadata( $attachment_id, $attachment_data );

          if( 0 < intval( $attachment_id ) ) {
            return $attachment_id;
          }
      }

      return false;
}

function is_empty_group($groupname) {
    $subfields = get_field($groupname);
    $temp = '';
    foreach ($subfields as $name => $value) :
        $temp .= $value;
    endforeach;
    return empty($temp);
}

add_action('wp_ajax_ajax_upload_user_file', 'ajax_upload_user_file');
add_action('wp_ajax_nopriv_ajax_upload_user_file', 'ajax_upload_user_file');
