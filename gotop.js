(function ($) {
    //使用jquery將img插入body中
    //$("body")=選擇body，append=將img放置進去
    $("body").append("<img id='goTopButton' style='display:none; z-index: 5; cursor:pointer;' title='回到前端'/>");

    var img = "images/gotop.png",  //宣告變數設定圖檔名稱
        location = 0.9,       //按鈕出現在螢幕的高度
        right = 50,          //距離右邊100px
        opacity = 0.6,        //透明度0.6
        speed = 0,          //返回TOP的移動速度

        $button = $("#goTopButton"),  //定義jquary呼叫圖片ID
        $body = $(document),          //定義jquary網頁
        $win = $(window);             //定義jquary瀏覽器chrome

    $button.attr("src", img);  //將圖設定到goTopButton的src

    /* 當網頁捲動時呼叫自訂函數 */
    window.goTopMove = function () {
        //從網頁取得選項端離具的數值，約為75-165px之間
        var scrollH = $body.scrollTop(),
            winH = $win.height(),
            css = { "top": winH * location + "px", "position": "fixed", "right": right, "opacity": opacity }; //將參數設定css

        //如果捲動與網頁頂端超過20px時，則顯示圖片，否則隱藏圖片
        if (scrollH > 20) {
            $button.css(css);
            $button.fadeIn("slow");
        }
        else {
            $button.fadeOut("fast");
            $button.attr("src", img);
            css = { "transition": "none", "transform": "none","box-shadow":"none"};
            $button.css(css);
        }
    };

    /* 設定瀏覽器監聽scroll(捲動網頁)與resize(縮放瀏覽器大小)兩個動作 */
    $win.on({
        scroll: function () { goTopMove(); },
        resize: function () { goTopMove(); }
    });

    /* 設定瀏覽器監聽圖片的三個動作(滑過/滑出/按下) */
    $button.on({
        mouseover: function () { $button.css("opacity", 1); },
        mouseout: function () { $button.css("opacity", opacity);},
        click: function () {
            css = {
                "transform": "rotateY(360deg)", "transition": "all 1s ease 0s" };
            $button.css(css);
            $("html, body").animate({ scrollTop: 0 }, speed);
        }
    });

})(jQuery);