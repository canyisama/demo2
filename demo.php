<?php
// 爬取异步加载的数据
$url = 'http://mobile.sina.com.cn/';

$html = file_get_contents($url);
//str_replace($html, "feed-card-item", "feed_card_item");

$html .='<script>
        setTimeout(function(){
            console.log("页面加载结束!");

            var _html = $("#feedCardContent").html();
            $.post("http://www.demo.com/demo2/post.php", {_html: _html}, function (result) {
                console.log(result);
            });
        }, 2000);
    </script>';

print_r($html);

$regex4=$regex4="/<div class=\"feed-card-item\".*?>.*?<\/div>/ism";

var_dump(preg_match_all($regex4, $html, $matches));exit;

if(preg_match_all($regex4, $html, $matches)){
    var_dump($matches);
}else{
    echo '------------';
}

//print_r($html);

?>