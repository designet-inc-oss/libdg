<?php
/**
 * ページライブラリ
 *
 */

/** パンくずリストの右矢印 */
define("RIGHT_ARROW",		"&gt;");

/** タブファイルの1行あたりの最大読込サイズ */
define("MAX_TAB_LINE",		1024);

/**
 * ページクラス
 */
Class page {

/**
 * メッセージ領域に出力するメッセージ
 */
var $message;

/**
 *
 * ページの出力
 *
 * $topicの連想配列は以下のように定義します。<br>
 * $topic[0]["name"] = "パンくずリストに表示する名前"<br>
 * $topic[0]["url"] = "パンくずリストのURL"<br>
 * ※パンくずリストを複数にする場合は配列の添え字を1つ増やし、同様に定義します。添え字の小さいものから左に並べられていきます。
 *
 * タブファイルの形式は以下とします。<br>
 * タブID:通常のタブ画像のパス:ハイライト時のタブ画像のパス:タブのリンク先<br>
 * ・1行で1つのタブの定義を行います
 *
 * 引数$sesskeyの形式は以下とする。
 * $sesskey[hiddenで渡すnameの名前] = セッションキーの内容(value)
 *
 * 以下のグローバル変数を定義します。<br>
 * $dg_title: ページのタイトルおよびタイトル部に表示する文字<br>
 * $dg_tabrow: 1行に並べるタブ数<br>
 * $dg_logout: ログアウト用プログラムのパス<br>
 * $dg_sys_err: Body部を表示させたくない時にTRUEにする
 * 
 * @param array  $topic   パンくずリストの情報が格納されている連想配列
 * @param string $tabId   ハイライトタブにするID
 * @param string $tabfile タブファイル
 * @param array  $sesskey セッションキー($sesskey["セッションキーのname"] = "セッションキーのvalue")
 * @param string $err_msg エラーメッセージ
 *
 */
function DgPage_display($topic, $tabId, $tabfile, $sesskey, $err_msg = "")
{
    /* メッセージ取得 */
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
 * HTTP ヘッダーの出力
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
 * ヘッダー部の表示
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
 * スタイル部の表示
 *
 * @param string $sesskey セッションキー
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
 * ログアウトボタンの表示
 *
 * @param string $sesskey セッションキー
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
        <input type="submit" name="logout" value="ログアウト">
      </form>

EOD;

}

/**
 *
 * パンくず部の表示
 *
 * @param array $topic パンくずリストの情報が格納された連想配列
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

            /* 最初のトピック以外は 右矢印 */
            if ($i > 0) {
                print "&nbsp;" . RIGHT_ARROW . "&nbsp;";
            }

            /* 最後のトピックはリンクにしない */
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
 * メッセージ部の表示
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
 * タブ部の表示
 *
 * @param string $tabId   ハイライトにするタブのID(タブファイルに記述)
 * @param string $tabFile タブファイルのパス
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
        $err_msg = "タブ" . $dg_err_msg;
        print $html_h;
        print $err_msg;
        print $html_f;
        return(-1);
    }

    $fp = fopen($tabFile, "r");
    if ($fp === FALSE ) {
        $err_msg = "タブ定義ファイルがオープンできません。 ($tabFile)"; 
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
		"タブ設定ファイルに不正な行が存在します。 (" .
                $tabFile . " : " . $line_cnt . "行目)";
		print $this->message;
		print $html_f;
	        fclose($fp);
		return(-1);
	    }
        }

        /* ハイライトの画像 */
        if ($tabId == $tmp[0]) {
            $tab[$tabs] = array("img" => $tmp[2], "url" => $tmp[3]);
        } else {
            $tab[$tabs] = array("img" => $tmp[1], "url" => $tmp[3]);
        }
        $tabs++;
    }
    fclose($fp);

    /* タブの数を調整(ダミータブの挿入) */
    $dum_tab["url"] = ":";
    for (; ($tabs % $dg_tabrow) != 0; $tabs ++) {
	array_push($tab, $dum_tab);
    }

    /* タブの表示 */
    print "<table class=\"tab\">\n";
    for ($i = 0; $i < $tabs; $i++) {
        /* 一番左 */
        if (($i % $dg_tabrow) == 0) {
	    print "  <tr>\n";
	}

	$url = $tab[$i]["url"];

        /* ダミータブの場合の処理 */
	if ($url == ":") {
            print "    <td class=\"tab\"></td>\n";
        /* 通常のタブ */
        } else {
	    print "    <td class=\"tab\">";
	    print "<a href=\"#\" onClick=\"dgSubmit('$url')\"><img class=\"tab\" src=\"images/";
	    print $tab[$i]["img"];
	    print "\"></a></td>\n";
        }

	/* 一番右 */
	if ($i == ($dg_tabrow - 1)) {
	    print "  </tr>\n";
	}
    }
    print "</table>\n";
	
}

/**
 *
 * ボディー部の枠表示
 *
 * @param string $sesskey セッションキー
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

    /* システムエラーの時は中身を表示しない */
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
 * ボディー部の表示(オーバーライドされる)
 *
 */
function DgPage_display_body()
{
}

/**
 *
 * フッター部の表示
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
 * リンクを押した時にPOSTのデータを送信するロケーションを行う
 *
 * @param string $url     ロケーション先URL
 * @param string $sesskey セッションキー
 * @param string $msg     ロケーション先で出力するメッセージ
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
処理中...
<form method="post" name="common">
<input type="hidden" name="$sessname" value="$sessvalue">

EOD;

    /* メッセージがある場合 */
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
 * テンプレート読み込み関数
 *
 * @param string $filename テンプレートファイルの絶対パス
 *
 * @return mixed テンプレートファイルの内容を返します。読み込みに失敗した場合はFALSEを返します。
 *
 */
function DgPage_read_template($filename)
{
    global $dg_err_msg;
    global $dg_log_msg;

    /* ファイルの読込権チェック */
    if (DgCommon_is_readable_file($filename) === FALSE) {
        return FALSE;
    }

    // ファイル読み込み
    $html = file_get_contents($filename);
    if ($html === FALSE) {
        $dg_err_msg = "テンプレートファイルの読込に失敗しました。(" .
                      $filename . ")";
        $dg_log_msg = "Cannot read the template file(" . $filename . ")";
        return FALSE;
    }

    return $html;
}

/**
 *
 * テンプレートタグの変換を行う
 *
 * @param  string $html     変換を行うHTML
 * @param  array  $tag      タグ情報が格納された連想配列
 *
 * @return string 変換したHTML
 */
function DgPage_change_template_tag($html, $tag)
{
    // タグが無ければ未変換
    if (count($tag) <= 0) {
        return $html;
    }

    // タグ変換
    foreach($tag as $key => $value) {
        $html = str_replace($key, $value, $html);
    }

    return $html;
}

/**
 *
 * テンプレートファイルを読み込み、テンプレートタグを変換する
 *
 * @param string $filename テンプレートファイルの絶対パス
 * @param array  $tag      タグ情報が格納された連想配列
 * @param array  $looptag  ループタグにはさまれたタグの情報が格納されている連想配列
 * @param string $starttag ループ開始のタグを示す文字列 
 * @param string $endtag   ループ終了タグを示す文字列
 *
 * @return mixed タグを置き換えたHTMLを返します。読み込みに失敗した場合はFALSEを返します。
 *
 */
function DgPage_replace_template_tag($filename, $tag, $looptag, $starttag,
                                     $endtag)
{
    $mod_html = "";

    /* テンプレートファイル読み込み */
    $rest_html = DgPage_read_template($filename);
    if ($rest_html === FALSE) {
        return FALSE;
    }

    while(1) {

        /* ループ開始タグで分割 */
        $dev_s = explode($starttag, $rest_html, 2);
        $mod_html .= $dev_s[0];
        if (!isset($dev_s[1]) || $dev_s[1] == "") {
            // ループ開始タグが見つからなかった場合
            break;
        }

        /* ループ終了タグで分割 */
        $dev_e = explode($endtag, $dev_s[1], 2);
        if ($dev_e[1] == "") {
            // ループ終了タグが見つからなかった場合
            $mod_html .= $starttag . $dev_s[1];
            break;
        }

        /* ループ内のタグを変換 */
        $loop_html = $dev_e[0];         // ループタグ内のHTML
        $loop_num = count($looptag);   // ループする回数

        /* ループタグがある分のみループする */
        for ($i = 0; $loop_num > $i; $i++) {
            $str = DgPage_change_template_tag($loop_html, $looptag[$i]);
            $mod_html .= $str;
        }

        /* 残りを代入する */
        $rest_html = $dev_e[1];
    }

    /* ループタグ以外のタグを置換 */
    $mod_html = DgPage_change_template_tag($mod_html, $tag);

    return $mod_html;
}

/**
 *
 * ページをリロードする
 *
 * @param array   $data  POSTで渡すデータ
 * @param integer $time  リロードする間隔(秒)
 * @param string  $msg   リロード処理中に出力するメッセージ
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
 * 処理結果をリアルタイムで表示する。
 *
 * @param string $msg 出力するメッセージ
 *
 */
function DgPage_flush($msg)
{
    print($msg);
    ob_flush();
    flush();
}
?>
