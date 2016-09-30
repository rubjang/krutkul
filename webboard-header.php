<div class="fix-r">
  <?php if($_SESSION['id_shop_member']!=""){echo "สวัสดีคุณ : <font color=blue>".$_SESSION['user_shop']."</font>"; ?>
    <?php if($_SESSION['user_shop']=="admin"){ ?>
    | <a href="check-member.php"><font color=green>ดูข้อมูลสมาชิก</font></a>
    <? } ?>
    | <a href="check-logout.php"><font color=red>ออกจากระบบ</font></a>
    | <a class="ui-btn-mini" href="webboard-post.php" title="ตั้งกระทู้">ตั้งกระทู้</a>
  <? }else{ ?>
    <a class="ui-btn-mini" href="webboard-login.php" title="ตั้งกระทู้">เข้าระบบ</a>
    <a class="ui-btn-mini" href="webboard-post.php" title="ตั้งกระทู้">ตั้งกระทู้</a>
    <a class="ui-btn-mini" href="webboard-register.php" title="สมัครสมาชิก">สมัครสมาชิก</a>
    <a class="ui-btn-mini" href="webboard-forgot.php" title="ลืมรหัสผ่าน">ลืมรหัสผ่าน</a>
  <? }?>
</div>
