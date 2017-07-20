/**
 * Created by ChengYa on 2016/6/18.
 */

//判断手机类型
window.onload = function () {
    //alert($(window).height());
    var u = navigator.userAgent;
    if (u.indexOf('Android') > -1 || u.indexOf('Linux') > -1) {//安卓手机
    } else if (u.indexOf('iPhone') > -1) {//苹果手机
        //屏蔽ios下上下弹性
        $(window).on('scroll.elasticity', function (e) {
            e.preventDefault();
        }).on('touchmove.elasticity', function (e) {
            e.preventDefault();
        });
    } else if (u.indexOf('Windows Phone') > -1) {//winphone手机
    }
    //预加载
    loading();
}

var date_start;
var date_end;
date_start = getNowFormatDate();
//加载图片
var loading_img_url = [
    "./image/0001.jpg",
    "./image/0002.jpg",
    "./image/0003.jpg",
    "./image/0004.jpg",
    "./image/0005.jpg",
    "./image/0006.jpg",
    "./image/0007.jpg",
    "./image/0008.jpg",
    "./image/0009.jpg",
    "./image/0010.jpg",
    "./image/0011.jpg",
    "./image/0012.jpg",
    "./image/0013.jpg",
    "./image/0014.jpg",
    "./image/0015.jpg",
    "./image/0016.jpg",
    "./image/0017.jpg",
    "./image/0018.jpg",
    "./image/0019.jpg",
    "./image/0020.jpg",
    "./image/0021.jpg",
    "./image/0022.jpg",
    "./image/0023.jpg",
    "./image/0024.jpg",
    "./image/0025.jpg",
    "./image/0026.jpg",
    "./image/0027.jpg",
    "./image/0028.jpg",
    "./image/0029.jpg",
    "./image/0030.jpg",
    "./image/0031.jpg",
    "./image/0032.jpg",
    "./image/0033.jpg",
    "./image/0034.jpg",
    "./image/0035.jpg",
    "./image/0036.jpg",
    "./image/0037.jpg",
    "./image/0038.jpg",
    "./image/0039.jpg",
    "./image/0040.jpg",
    "./image/0041.jpg",
    "./image/0042.jpg",
    "./image/0043.jpg",
    "./image/0044.jpg",
    "./image/0045.jpg",
    "./image/0046.jpg",
    "./image/0047.jpg",
    "./image/0048.jpg",
    "./image/0049.jpg",
    "./image/0050.jpg",
    "./image/0051.jpg",
    "./image/0052.jpg",
    "./image/0053.jpg",
    "./image/0054.jpg",
    "./image/0055.jpg",
    "./image/0056.jpg",
    "./image/0057.jpg",
    "./image/0058.jpg",
    "./image/0059.jpg",
    "./image/0060.jpg",
    "./image/0061.jpg",
    "./image/0062.jpg",
    "./image/0063.jpg",
    "./image/0064.jpg",
    "./image/0065.jpg",
    "./image/0066.jpg",
    "./image/0067.jpg",
    "./image/0068.jpg",
	
	"./image/0069.jpg",
	"./image/0070.jpg",
	"./image/0071.jpg",
	"./image/0072.jpg",
	"./image/0073.jpg",
	"./image/0074.jpg",
	"./image/0075.jpg",
	"./image/0076.jpg",
	"./image/0077.jpg",
	"./image/0078.jpg",
	"./image/0079.jpg",
	"./image/0080.jpg",
	"./image/0081.jpg",
	"./image/0082.jpg",
	"./image/0083.jpg",
	"./image/0084.jpg",
	"./image/0085.jpg",
	"./image/0086.jpg",
	"./image/0087.jpg",
	"./image/0088.jpg",
	"./image/0089.jpg",
	"./image/0090.jpg",
	"./image/0091.jpg",
	"./image/0092.jpg",
	"./image/0093.jpg",
	"./image/0094.jpg",
	"./image/0095.jpg",
	"./image/0096.jpg",
	"./image/0097.jpg",
	"./image/0098.jpg",
	"./image/0099.jpg",
	"./image/0100.jpg",
];

//加载页面
function loading() {
    var numbers = 0;
    var length = loading_img_url.length;

    for (var i = 0; i < length; i++) {
        var img = new Image();
        img.src = loading_img_url[i];
        img.onerror = function () {
            numbers += (1 / length) * 100;
        }
        img.onload = function () {
            numbers += (1 / length) * 100;
            $('.number').html(parseInt(numbers) + "%");
            console.log(numbers);
            if (Math.round(numbers) == 100) {
                //$('.number').hide();
                date_end = getNowFormatDate();
                var loading_time = date_end - date_start;
                //预加载图片
                $(function progressbar() {
                    //拼接图片
                    $('.shade').hide();
                    var tagHtml = "";
                    for (var i = 1; i <= 100; i++) {
                        if (i == 1) {
                            tagHtml += ' <div id="first" style="background:url(image/00' + (i < 10 ? '0' + i : i) + '.jpg) center top no-repeat;background-size:100%"></div>';
                        } else if (i == 100) {
                            tagHtml += ' <div id="end" style="background:url(image/00' + (i < 10 ? '0' + i : i) + '.jpg) center top no-repeat;background-size:100%"></div>';
                        } else {
                            tagHtml += ' <div style="background:url(image/00' + (i < 10 ? '0' + i : i) + '.jpg) center top no-repeat;background-size:100%"></div>';
                        }
                    }
                    $(".flipbook").append(tagHtml);
                    var w = $(".graph").width();
                    $(".flipbook-viewport").show();
                });
                //配置turn.js
                function loadApp() {
                    var w = $(window).width();
                    var h = $(window).height();
                    $('.flipboox').width(w).height(h);
                    $(window).resize(function () {
                        w = $(window).width();
                        h = $(window).height();
                        $('.flipboox').width(w).height(h);
                    });
                    $('.flipbook').turn({
                        // Width
                        width: w,
                        // Height
                        height: h,
                        // Elevation
                        elevation: 50,
                        display: 'single',
                        // Enable gradients
                        gradients: true,
                        // Auto center this flipbook
                        autoCenter: true,
                        when: {
                            turning: function (e, page, view) {
                                if (page == 1) {
                                    $(".btnImg").css("display", "none");
                                    $(".mark").css("display", "block");
                                } else {
                                    $(".btnImg").css("display", "block");
                                    $(".mark").css("display", "none");
                                }
                                if (page == 100) {
                                    $(".nextPage").css("display", "none");
                                } else {
                                    $(".nextPage").css("display", "block");
                                }
                            },
                            turned: function (e, page, view) {
                                console.log(page);
                                var total = $(".flipbook").turn("pages");//总页数
                                if (page == 1) {
                                    $(".return").css("display", "none");
                                    $(".btnImg").css("display", "none");
                                } else {
                                    $(".return").css("display", "block");
                                    $(".btnImg").css("display", "block");
                                }
                                if (page == 2) {
                                    $(".catalog").css("display", "block");
                                } else {
                                    $(".catalog").css("display", "none");
                                }
                            }
                        }
                    })
                }
                yepnope({
                    test: Modernizr.csstransforms,
                    yep: ['js/turn.js'],
                    complete: loadApp
                });
            }
            ;
        }
    }
}

function getNowFormatDate() {
    var date = new Date();
    var seperator1 = "";
    var seperator2 = "";
    var month = date.getMonth() + 1;
    var strDate = date.getDate();
    if (month >= 1 && month <= 9) {
        month = "0" + month;
    }
    if (strDate >= 0 && strDate <= 9) {
        strDate = "0" + strDate;
    }
    var currentdate = date.getFullYear() + seperator1 + month + seperator1 + strDate
        + "" + date.getHours() + seperator2 + date.getMinutes()
        + seperator2 + date.getSeconds();
    return currentdate;
}


