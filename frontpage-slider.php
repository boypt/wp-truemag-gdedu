<?php
/**
 * The template part for displaying a message that posts cannot be found.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package gdedu
 */
?>

<div class="banner"></div>
<div class="nav_1">
  <div class="cen"><a href="#">活动首页</a> <a href="#"> 活动规则</a> <a href="#">作品要求</a> <a href="#">新闻动态 </a> <a href="#"> 奖项设置</a> <span> <a href="#">上传作品</a> </span> </div>
</div>
<div class="ind_1">
  <table border="0" cellspacing="0">
    <tr>
      <td colspan="4"><div align="center"><img src="<?php echo get_template_directory_uri() . "/images/ing_1.png";?>"></div></td>
    </tr>
    <tr height="30">
      <td width="28%"><div align="center" class="txt1">【视频上传】</div></td>
      <td width="21%"><div align="center" class="txt1">【网络点赞】</div></td>
      <td width="27%"><div align="center" class="txt1">【专家评审】</div></td>
      <td width="24%"><div align="center" class="txt1">【公布结果】</div></td>
    </tr>
    <tr height="20">
      <td width="28%"><div align="center">07.05-10.30</div></td>
      <td width="21%"><div align="center">09.01-11.30</div></td>
      <td width="27%"><div align="center">12.01-12.25</div></td>
      <td width="24%"><div align="center">12.31前</div></td>
    </tr>
  </table>
</div>

<div class="ind_2">
    <div class="pptbox_slider">
         <script>
         var box =new PPTBox();
         box.width = 622; //宽度
         box.height = 323;//高度
         box.autoplayer = 3;//自动播放间隔时间

         //box.add({"url":"图片地址","title":"悬浮标题","href":"链接地址"})
         box.add({"url":"<?php echo get_template_directory_uri() . "/images/tu1.jpg"; ?>","href":"http://www.lanrentuku.com/","title":"悬浮提示标题1"})
         box.add({"url":"<?php echo get_template_directory_uri() . "/images/tu2.jpg"; ?>","href":"http://www.lanrentuku.com/","title":"悬浮提示标题2"})
         box.add({"url":"<?php echo get_template_directory_uri() . "/images/tu3.jpg"; ?>","href":"http://www.lanrentuku.com/","title":"悬浮提示标题3"})
         box.add({"url":"<?php echo get_template_directory_uri() . "/images/tu4.jpg"; ?>","href":"http://www.lanrentuku.com/","title":"悬浮提示标题4"})
         box.show();
        </script>
    </div>

    <div class="pptbox_txt">
      <h3>活动简介</h3>
      <p>此次组织开展“牛津书虫阅读漂流活动”，旨在为全国中小学开展英语读物教学提供优质教学内容并拓展有声教学模式，同时为一线教师教学成果展示提供活宣传平台。</p>
      <p>活动组委会统一安排向参与活动学校免费寄送牛津“书虫”漂流用书。</p>
      <p>优秀剧本将在《英语周报》发表。详情<a href="#" class="r">【在线答疑】 </a></p>
      <h3>主办方：</h3>
      <p>广东省教育厅<br/>中国电信股份有限公司广东分公司</p>
      <p><div align="center"><a href="#"><img src="<?php echo get_template_directory_uri() . "/images/ind_but1.png"; ?>" border="0"></a><a href="#"><img src="<?php echo get_template_directory_uri() . "/images/ind_but2.png";?>" border="0"></a></div></p>
    </div>
</div>

