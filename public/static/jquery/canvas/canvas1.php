
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>canvas鼠标画图</title>
<script src="jquery-1.6.4.min.js" type="text/javascript"></script>
<script src="jquery-ui-1.8.16.custom.min.js" type="text/javascript"></script>
<!-- <script src="jquery-ui-1.8.16.custom.min" type="text/javascript"></script> -->


<style>
    /*body { background-color:yellow;}*/
    #c1 { background-color: white;border:1px solid #000000;}
</style>
<script>
// onload 事件会在页面或图像加载完成后立即发生
window.onload = function() {
　　var oC = document.getElementById('c1');
    // getContext() 方法返回一个用于在画布上绘图的环境 2b代表二维绘图。
    var oCG = oC.getContext('2d');
    // 当按下鼠标按钮时
　　oC.onmousedown = function(ev) {
    var ev = ev || window.event;
    oCG.moveTo(ev.clientX-oC.offsetLeft,ev.clientY-oC.offsetTop); //ev.clientX-oC.offsetLeft,ev.clientY-oC.offsetTop鼠标在当前画布上X,Y坐标
    // lastImg = oCG.getImageData(ev.clientX-oC.offsetLeft,ev.clientY-oC.offsetTop,oC.width,oC.height);
    
    // 点击鼠标时发生
        document.onmousemove = function(ev) {
            var ev = ev || window.event;//获取event对象
            // 移动到位置
            oCG.lineTo(ev.clientX-oC.offsetLeft,ev.clientY-oC.offsetTop);
            oCG.stroke();
        };
    //鼠标按键被松开时发生
        oC.onmouseup = function(){
            document.onmousemove = null;
            document.onmouseup = null;
        };
　　};
};

    // var butSave = document.getElementById("save");
    function lists(){
        var canvas = document.getElementById("c1");
        var svaeHref = document.getElementById("save_href");
        var svaeHref = document.getElementById("save_href");
        // 传入对应想要保存的图片格式的mime类型
        var img = document.getElementById("save_img");
        // 返回一个包含图片展示的 data URI
        var tempSrc = canvas.toDataURL("image/png");
            $.ajax({
                type:   'POST',
                url:    "llo.php",
                data:   "urls="+tempSrc,
                dataType:   'html',
                timeout:    55000,
                success: function(data){
                    // alert(data);
                    $("#save_img").attr("src",data);
                },
                error: function(o,s,e){
                    //window.location = urlx;
                }
            });
    }
    function revocation(){
        var oC = document.getElementById('c1');
        // getContext() 方法返回一个用于在画布上绘图的环境 2b代表二维绘图。
        var oCG = oC.getContext('2d');
        oCG.clearRect(0,0,lastImg);
    }
</script>
</head>
 
<body>
    <canvas id="c1" width="400px" height="400px"> <!--宽高写在html里，写在css里有问题-->
        <span>该浏览器不支持canvas内容</span> <!--对于不支持canvas的浏览器显示-->
    </canvas>
    <button id="save" onclick="lists()">save</button>
    <button id="revocation" onclick="revocation()">Revocation</button>

    <a href="" id="save_href" >
    <img src="" id="save_img">
    <!-- <img src="" id="savess"> -->
    </a>
    <!-- <input type="hidden"  id='jj' value="" /> -->
</body>
</html>
