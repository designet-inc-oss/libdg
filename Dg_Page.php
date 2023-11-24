<?php
/**
 * �ڡ����饤�֥��
 *
 */

/** �ѥ󤯤��ꥹ�Ȥα���� */
define("RIGHT_ARROW",		"&gt;");

/** ���֥ե������1�Ԥ�����κ����ɹ������� */
define("MAX_TAB_LINE",		1024);

/**
 * �ڡ������饹
 */
Class page {

/**
 * ��å������ΰ�˽��Ϥ����å�����
 */
var $message;

/**
 *
 * �ڡ����ν���
 *
 * $topic��Ϣ������ϰʲ��Τ褦��������ޤ���<br>
 * $topic[0]["name"] = "�ѥ󤯤��ꥹ�Ȥ�ɽ������̾��"<br>
 * $topic[0]["url"] = "�ѥ󤯤��ꥹ�Ȥ�URL"<br>
 * ���ѥ󤯤��ꥹ�Ȥ�ʣ���ˤ�����������ź������1�����䤷��Ʊ�ͤ�������ޤ���ź�����ξ�������Τ��麸���¤٤��Ƥ����ޤ���
 *
 * ���֥ե�����η����ϰʲ��Ȥ��ޤ���<br>
 * ����ID:�̾�Υ��ֲ����Υѥ�:�ϥ��饤�Ȼ��Υ��ֲ����Υѥ�:���֤Υ����<br>
 * ��1�Ԥ�1�ĤΥ��֤������Ԥ��ޤ�
 *
 * ����$sesskey�η����ϰʲ��Ȥ��롣
 * $sesskey[hidden���Ϥ�name��̾��] = ���å���󥭡�������(value)
 *
 * �ʲ��Υ����Х��ѿ���������ޤ���<br>
 * $dg_title: �ڡ����Υ����ȥ뤪��ӥ����ȥ�����ɽ������ʸ��<br>
 * $dg_tabrow: 1�Ԥ��¤٤륿�ֿ�<br>
 * $dg_logout: ���������ѥץ����Υѥ�<br>
 * $dg_sys_err: Body����ɽ�����������ʤ�����TRUE�ˤ���
 * 
 * @param array  $topic   �ѥ󤯤��ꥹ�Ȥξ��󤬳�Ǽ����Ƥ���Ϣ������
 * @param string $tabId   �ϥ��饤�ȥ��֤ˤ���ID
 * @param string $tabfile ���֥ե�����
 * @param array  $sesskey ���å���󥭡�($sesskey["���å���󥭡���name"] = "���å���󥭡���value")
 * @param string $err_msg ���顼��å�����
 *
 */
function DgPage_display($topic, $tabId, $tabfile, $sesskey, $err_msg = "")
{
    /* ��å��������� */
    if ($err_msg != "") {
        $this->message = $err_msg;
    }
    if ($this->message == "") {
        $this->message = "&nbsp;";
    } else {
        $this->message = preg_replace("/<br>$/i", "", $this->message);
    }

    $this->DgPage_output_http_header();
    $this->DgPage_display_header();
    $this->DgPage_display_style($sesskey);
    $this->DgPage_display_topic($topic);
    $this->DgPage_display_message();
    $this->DgPage_display_tab($tabId, $tabfile);
    $this->DgPage_display_body_frame($sesskey);
    $this->DgPage_display_footer();
}

/**
 *
 * HTTP �إå����ν���
 *
 */
function DgPage_output_http_header()
{

    header("Cache-Control: no-cache, must-revalidate");	/* HTTP 1.1 */
    header("Pragma: no-cache");	/* HTTP 1.0 */
    header("Content-Type: text/html; charset=EUC-JP");

}

/**
 *
 * �إå�������ɽ��
 *
 *
 */
function DgPage_display_header()
{
    global $dg_title;

    print <<<EOD
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<meta http-equiv="Cache-Control" content="no-cache, must-revalidate">
<meta http-equiv="Pragma" content="no-cache">
<meta http-equiv="Content-Type" content="text/html; charset=EUC-JP">
<title>$dg_title</title>
<script type="text/javascript">
<!--
function msgConfirm(msg) {
        return(window.confirm(msg));
}

function dgSubmit(url) {
    document.common.action = url;
    document.common.submit();
}
// -->
</script>
EOD;

}

/**
 *
 * ������������ɽ��
 *
 * @param string $sesskey ���å���󥭡�
 *
 */
function DgPage_display_style($sesskey)
{
    global $dg_title;

    print <<<EOD

<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body topmargin="0" leftmargin="0">
<table class="title">
  <tr>
    <td class="title">$dg_title</td>
    <td class="logout">
EOD;

    $this->DgPage_display_logout($sesskey);

    print <<<EOD
    </td>
  </tr>
</table>
EOD;
}

/**
 *
 * �������ȥܥ����ɽ��
 *
 * @param string $sesskey ���å���󥭡�
 *
 */
function DgPage_display_logout($sesskey)
{
    global $dg_logout;

    $keys = array_keys($sesskey);
    $sessname = $keys[0];
    $sessvalue = $sesskey[$sessname];

    print <<<EOD

      <form method="post" action="$dg_logout">
        <input type="hidden" name="$sessname" value="$sessvalue">
        <input type="submit" name="logout" value="��������">
      </form>

EOD;

}

/**
 *
 * �ѥ󤯤�����ɽ��
 *
 * @param array $topic �ѥ󤯤��ꥹ�Ȥξ��󤬳�Ǽ���줿Ϣ������
 *
 */
function DgPage_display_topic($topic)
{

    print <<<EOD

<table class="head">
  <tr>
    <td class="topic">
EOD;

    if (is_array($topic) === FALSE) {
        print "&nbsp;";
    } else {

        $topic_max = count($topic);
        for ($i = 0; $i < $topic_max; $i++) {

            $name = $topic[$i]["name"];
            $url = $topic[$i]["url"];

            /* �ǽ�Υȥԥå��ʳ��� ����� */
            if ($i > 0) {
                print "&nbsp;" . RIGHT_ARROW . "&nbsp;";
            }

            /* �Ǹ�Υȥԥå��ϥ�󥯤ˤ��ʤ� */
            if ($i < $topic_max - 1) {
                 print "<a href=\"#\" onClick=\"dgSubmit('$url')\">$name</a>";
            } else {
                 print $name;
            }
        }
    }

    print <<<EOD
    </td>
  </tr>
</table>
EOD;

}

/**
 *
 * ��å���������ɽ��
 *
 */
function DgPage_display_message()
{

    print <<<EOD

<table class="head">
  <tr>
    <td class="message"><img class="bmessage" src="images/spacer.gif"></td>
  </tr>
  <tr>
    <td class="message">$this->message</td>
  </tr>
  <tr>
    <td class="message"><img class="amessage" src="images/spacer.gif"></td>
  </tr>
</table>

EOD;

    $this->message = "";
}

/**
 *
 * ��������ɽ��
 *
 * @param string $tabId   �ϥ��饤�Ȥˤ��륿�֤�ID(���֥ե�����˵���)
 * @param string $tabFile ���֥ե�����Υѥ�
 *
 */
function DgPage_display_tab($tabId, $tabFile)
{

    global $dg_err_msg;
    global $dg_tabrow;

    $html_h = <<<EOD

<table class="head">
  <tr>
    <td class="normal">

EOD;

    $html_f = <<<EOD
</td>
  </tr>
</table>

EOD;

    if (DgCommon_is_readable_file($tabFile) === FALSE) {
        $err_msg = "����" . $dg_err_msg;
        print $html_h;
        print $err_msg;
        print $html_f;
        return(-1);
    }

    $fp = fopen($tabFile, "r");
    if ($fp === FALSE ) {
        $err_msg = "��������ե����뤬�����ץ�Ǥ��ޤ��� ($tabFile)"; 
        print $html_h;
        print $err_msg;
        print $html_f;
        return(-1);
    }

    $line_cnt = 0;
    $tabs = 0;
    while (!feof($fp)) {
        $buf = fgets($fp, MAX_TAB_LINE);
        if ($buf === FALSE){
            continue; 
        }
        $buf = rtrim($buf);	
        $line_cnt ++;

        if (ereg("^#", $buf) || $buf == "") {
            continue;
        } else {
            $tmp = explode(":", $buf, 4);  
	    if (!isset($tmp[0]) || !isset($tmp[1]) ||
	        !isset($tmp[2]) || !isset($tmp[3])) {
	        print $html_h;
	        $this->message =
		"��������ե�����������ʹԤ�¸�ߤ��ޤ��� (" .
                $tabFile . " : " . $line_cnt . "����)";
		print $this->message;
		print $html_f;
	        fclose($fp);
		return(-1);
	    }
        }

        /* �ϥ��饤�Ȥβ��� */
        if ($tabId == $tmp[0]) {
            $tab[$tabs] = array("img" => $tmp[2], "url" => $tmp[3]);
        } else {
            $tab[$tabs] = array("img" => $tmp[1], "url" => $tmp[3]);
        }
        $tabs++;
    }
    fclose($fp);

    /* ���֤ο���Ĵ��(���ߡ����֤�����) */
    $dum_tab["url"] = ":";
    for (; ($tabs % $dg_tabrow) != 0; $tabs ++) {
	array_push($tab, $dum_tab);
    }

    /* ���֤�ɽ�� */
    print "<table class=\"tab\">\n";
    for ($i = 0; $i < $tabs; $i++) {
        /* ���ֺ� */
        if (($i % $dg_tabrow) == 0) {
	    print "  <tr>\n";
	}

	$url = $tab[$i]["url"];

        /* ���ߡ����֤ξ��ν��� */
	if ($url == ":") {
            print "    <td class=\"tab\"></td>\n";
        /* �̾�Υ��� */
        } else {
	    print "    <td class=\"tab\">";
	    print "<a href=\"#\" onClick=\"dgSubmit('$url')\"><img class=\"tab\" src=\"images/";
	    print $tab[$i]["img"];
	    print "\"></a></td>\n";
        }

	/* ���ֱ� */
	if ($i == ($dg_tabrow - 1)) {
	    print "  </tr>\n";
	}
    }
    print "</table>\n";
	
}

/**
 *
 * �ܥǥ���������ɽ��
 *
 * @param string $sesskey ���å���󥭡�
 *
 */
function DgPage_display_body_frame($sesskey)
{
    global $dg_sys_err;

    print <<<EOD
<table class="frame">
  <tr>
    <td class="normal"><img class="table" src="images/spacer.gif"></td>
  </tr>
  <tr>
    <td class="normal"><img src="images/spacer.gif"></td>
    <td class="normal">
      <table class="body">
        <tr>
          <td class="normal">
EOD;

    /* �����ƥ२�顼�λ�����Ȥ�ɽ�����ʤ� */
    if($dg_sys_err !== TRUE) {
        $this->DgPage_display_body();
    }

    $keys = array_keys($sesskey);
    $sessname = $keys[0];
    $sessvalue = $sesskey[$sessname];

    print <<<EOD

          </td>
        </tr>
      </table>
    </td>
  </tr>
  <tr>
    <td class="normal"><img class="table" src="images/spacer.gif"></td>
  </tr>
</table>
<form method="post" name="common">
  <input type="hidden" name="$sessname" value="$sessvalue">
</form>
EOD;

}

/**
 *
 * �ܥǥ�������ɽ��(�����С��饤�ɤ����)
 *
 */
function DgPage_display_body()
{
}

/**
 *
 * �եå�������ɽ��
 *
 */
function DgPage_display_footer()
{

    print <<<EOD

</body>
</html>
EOD;

}

};

/**
 *
 * ��󥯤򲡤�������POST�Υǡ����������������������Ԥ�
 *
 * @param string $url     �����������URL
 * @param string $sesskey ���å���󥭡�
 * @param string $msg     �����������ǽ��Ϥ����å�����
 *
 */
function DgPage_location($url, $sesskey, $msg = "")
{
    $mypg = new page();

    $mypg->DgPage_output_http_header();
    $mypg->DgPage_display_header();

    $keys = array_keys($sesskey);
    $sessname = $keys[0];
    $sessvalue = $sesskey[$sessname];

    print <<<EOD

<body onload="dgSubmit('$url')">
������...
<form method="post" name="common">
<input type="hidden" name="$sessname" value="$sessvalue">

EOD;

    /* ��å������������� */
    if (!is_null($msg)) {
        print <<< EOD
<input type="hidden" name="msg" value="$msg">

EOD;
    }

    print <<<EOD

</form>
</body>
</html>

EOD;
   exit;
    
}

/**
 *
 * �ƥ�ץ졼���ɤ߹��ߴؿ�
 *
 * @param string $filename �ƥ�ץ졼�ȥե���������Хѥ�
 *
 * @return mixed �ƥ�ץ졼�ȥե���������Ƥ��֤��ޤ����ɤ߹��ߤ˼��Ԥ�������FALSE���֤��ޤ���
 *
 */
function DgPage_read_template($filename)
{
    global $dg_err_msg;
    global $dg_log_msg;

    /* �ե�������ɹ��������å� */
    if (DgCommon_is_readable_file($filename) === FALSE) {
        return FALSE;
    }

    // �ե������ɤ߹���
    $html = file_get_contents($filename);
    if ($html === FALSE) {
        $dg_err_msg = "�ƥ�ץ졼�ȥե�������ɹ��˼��Ԥ��ޤ�����(" .
                      $filename . ")";
        $dg_log_msg = "Cannot read the template file(" . $filename . ")";
        return FALSE;
    }

    return $html;
}

/**
 *
 * �ƥ�ץ졼�ȥ������Ѵ���Ԥ�
 *
 * @param  string $html     �Ѵ���Ԥ�HTML
 * @param  array  $tag      �������󤬳�Ǽ���줿Ϣ������
 *
 * @return string �Ѵ�����HTML
 */
function DgPage_change_template_tag($html, $tag)
{
    // ������̵�����̤�Ѵ�
    if (count($tag) <= 0) {
        return $html;
    }

    // �����Ѵ�
    foreach($tag as $key => $value) {
        $html = str_replace($key, $value, $html);
    }

    return $html;
}

/**
 *
 * �ƥ�ץ졼�ȥե�������ɤ߹��ߡ��ƥ�ץ졼�ȥ������Ѵ�����
 *
 * @param string $filename �ƥ�ץ졼�ȥե���������Хѥ�
 * @param array  $tag      �������󤬳�Ǽ���줿Ϣ������
 * @param array  $looptag  �롼�ץ����ˤϤ��ޤ줿�����ξ��󤬳�Ǽ����Ƥ���Ϣ������
 * @param string $starttag �롼�׳��ϤΥ����򼨤�ʸ���� 
 * @param string $endtag   �롼�׽�λ�����򼨤�ʸ����
 *
 * @return mixed �������֤�������HTML���֤��ޤ����ɤ߹��ߤ˼��Ԥ�������FALSE���֤��ޤ���
 *
 */
function DgPage_replace_template_tag($filename, $tag, $looptag, $starttag,
                                     $endtag)
{
    $mod_html = "";

    /* �ƥ�ץ졼�ȥե������ɤ߹��� */
    $rest_html = DgPage_read_template($filename);
    if ($rest_html === FALSE) {
        return FALSE;
    }

    while(1) {

        /* �롼�׳��ϥ�����ʬ�� */
        $dev_s = explode($starttag, $rest_html, 2);
        $mod_html .= $dev_s[0];
        if (!isset($dev_s[1]) || $dev_s[1] == "") {
            // �롼�׳��ϥ��������Ĥ���ʤ��ä����
            break;
        }

        /* �롼�׽�λ������ʬ�� */
        $dev_e = explode($endtag, $dev_s[1], 2);
        if ($dev_e[1] == "") {
            // �롼�׽�λ���������Ĥ���ʤ��ä����
            $mod_html .= $starttag . $dev_s[1];
            break;
        }

        /* �롼����Υ������Ѵ� */
        $loop_html = $dev_e[0];         // �롼�ץ������HTML
        $loop_num = count($looptag);   // �롼�פ�����

        /* �롼�ץ���������ʬ�Τߥ롼�פ��� */
        for ($i = 0; $loop_num > $i; $i++) {
            $str = DgPage_change_template_tag($loop_html, $looptag[$i]);
            $mod_html .= $str;
        }

        /* �Ĥ���������� */
        $rest_html = $dev_e[1];
    }

    /* �롼�ץ����ʳ��Υ������ִ� */
    $mod_html = DgPage_change_template_tag($mod_html, $tag);

    return $mod_html;
}

/**
 *
 * �ڡ��������ɤ���
 *
 * @param array   $data  POST���Ϥ��ǡ���
 * @param integer $time  ����ɤ���ֳ�(��)
 * @param string  $msg   ����ɽ�����˽��Ϥ����å�����
 *
 */
function DgPage_reload_page($data, $time, $msg)
{
    foreach ($data as $key => $value) {
        $html .= "<input type=\"hidden\" name=\"" . $key . "\" value=\"" . 
                 $value . "\">";
    }
    print <<<EOD
<center>$msg</center>
<form method="post" name="dg_page_reload">
  $html
</form>
<script type="text/javascript">
<!--
function myTimer() {
    clearInterval(TimeID);
    document.dg_page_reload.submit();
}
TimeID = setInterval('new myTimer()', $time);
// -->
</script>

EOD;

}

/**
 *
 * ������̤�ꥢ�륿�����ɽ�����롣
 *
 * @param string $msg ���Ϥ����å�����
 *
 */
function DgPage_flush($msg)
{
    print($msg);
    ob_flush();
    flush();
}
?>
