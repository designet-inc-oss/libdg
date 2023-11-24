<?php
/**
 * セッションライブラリ
 */

/** hiddenで渡されるキー文字列の先頭に付加する文字列 */
define("DG_FRONT_STR", "dg_");

/**
 * 
 * mcryptで暗号化したセッションキーを作成する
 *
 * 使用するにはプログラム側でDg_Common.phpもincludeする必要があります。
 *
 * @param string $akeydir etc/admin.keyが配置されているディレクトリ(デフォルト:空)
 * @param array   $keylist  暗号化する文字列を格納した配列
 * @param string  $delim    区切り文字(デフォルト:コロン(:))
 *
 * @return mixed 生成したセッションキーを返します。生成に失敗した時はFALSEを返します。
 */
function DgSession_make_key($akeydir, $keylist, $delim = ":")
{

    /* 暗号化用文字列生成 */
    $input .= implode($delim, $keylist);

    /* 暗号化 */
    $sess_key = DgSession_encode_str($input, 1, $akeydir);
    if ($sess_key === FALSE) {
        return FALSE;
    }

    return $sess_key;
}

/**
 *
 * セッションキーを復号し、指定されたデリミタで区切ったデータの配列を返す
 *
 * 使用するにはプログラム側でDg_Common.phpもincludeする必要があります。
 *
 * @param string $akeydir   etc/admin.keyが配置されているディレクトリ(デフォルト:空)
 * @param string $sess_key  暗号化されたセッションキー
 * @param string $delim     区切り文字(デフォルト:コロン(:))
 *
 * @return mixed 成功した場合は指定されたデリミタで区切ったデータの配列を返し、エラーの場合はFALSEを返します。
 *
 */
function DgSession_decode_key($akeydir, $sess_key, $delim = ":") 
{
    global $dg_err_msg;
    global $dg_log_msg;

    /* 複合化 */
    $dec_key = DgSession_decode_str($sess_key, 1, $akeydir);
    if ($dec_key === FALSE) {
        return FALSE;
    }

    /* デリミタで区切る */
    $dec_data = explode($delim, $dec_key);

    return $dec_data;

}

/**
 *
 * 暗号化キーファイルを読み込む。
 *
 * 使用するにはプログラム側でDg_Common.phpもincludeする必要があります。
 *
 * @param string $akeyfile  暗号化キーファイルのパス 
 *
 * @return mixed 正常に読み込めた場合は暗号化キーファイルの1行を、エラーの場合はFALSEを返します。
 *
 */
function DgSession_read_admin_key_file($akeyfile)
{
    global $dg_err_msg;
    global $dg_log_msg;

    /* adminキーのチェック */
    if (DgCommon_is_readable_file($akeyfile) === FALSE) {
        return FALSE;
    }

    /* 暗号化キーファイルのオープン */
    $tmp = file($akeyfile);

    /* チェック */
    if ($tmp === FALSE) {
        $dg_err_msg = "暗号化キーファイルがオープンできません。(" .
                      $akeyfile . ")";
        $dg_log_msg = "Cannot open key file.(" .  $akeyfile . ")";
        return FALSE;
    }

    /* ファイルの内容チェック */
    if (is_null($tmp[0]) === TRUE) {
        $dg_err_msg = "暗号化キーファイルが正しくありません。(" .
                      $akeyfile . ")";
        $dg_log_msg = "Key file is invalid.(" .  $akeyfile . ")";
        return FALSE;
    }

    /* 終端の改行を削除して格納 */
    $akey = rtrim($tmp[0]);

    return $akey;
}

/**
 *
 * 引数で指定された文字列を暗号化する。
 *
 * 引数$levelは以下の動作を行います。<br>
 * $level = 1 : mcryptで暗号化<br>
 * $level = 2 : base64とstr_rot13で暗号化<br>
 * $level = 3 : HTMLタグのエスケープ
 * 
 * $level=1の場合、使用するにはプログラム側でDg_Common.phpもincludeする必要があります。
 *
 * @param string  $str     暗号化する文字列
 * @param integer $level   エンコードするレベル(1 or 2 or 3) (デフォルト:3)
 * @param string  $akeydir etc/admin.keyが配置されているディレクトリ(デフォルト:空)
 *
 * @return string 引数を暗号化した文字列を返します。エラーの場合はFALSEを返します。
 *
 */
function DgSession_encode_str($str, $level = 3, $akeydir = "")
{
    global $dg_err_msg;
    global $dg_log_msg;

    /* 引数チェック */
    if ($level != 1 && $level != 2 && $level != 3) {
        $dg_err_msg = "暗号化レベルの指定が間違っています。(" . $level . ")";
        $dg_log_msg = "Invalid encoded level.(" . $level . ")";
    }

    if ($level == 1) {

        /* 暗号化キーファイル読込み */
        $akeyfile = $akeydir . "/etc/admin.key";
        $akey = DgSession_read_admin_key_file($akeyfile);
        if ($akey === FALSE) {
            return FALSE;
        }

        /* 暗号化 */
        srand();
        $td = mcrypt_module_open(MCRYPT_3DES, "", MCRYPT_MODE_CBC, "");
        $iv = mcrypt_create_iv(mcrypt_enc_get_iv_size($td), MCRYPT_RAND);
        $encrypted_data = mcrypt_encrypt(MCRYPT_3DES, $akey, $str,
                                         MCRYPT_MODE_CBC, $iv);

        /* 受け渡し用エンコード */
        $enc_str = base64_encode($iv . $encrypted_data);

    } elseif ($level == 2) {

        /* Base64エンコード */
        $enc_str = base64_encode($str);

        /* str_rot13 */
        $enc_str = str_rot13($enc_str);

    } elseif ($level == 3) {

        /* htmlspecialcharsでエスケープ */
        $enc_str = htmlspecialchars($str);

    }

    return $enc_str;
}

/**
 *
 * 引数で指定された文字列を複合化する。
 *
 * 引数$levelは以下の動作を行います。<br>
 * $level = 1 : mcryptで暗号化した文字列を複合化<br>
 * $level = 2 : base64とstr_rot13で複合化
 * 
 * $level = 1の場合、使用するにはプログラム側でDg_Common.phpもincludeする必要があります。
 *
 * @param string  $str     暗号化する文字列
 * @param integer $level   デコードするレベル(1 or 2)
 * @param string  $akeydir etc/admin.keyが配置されているディレクトリ(デフォルト:空)
 *
 * @return string 引数を複合化した文字列を返します。エラーの場合はFALSEを返します。
 *
 */
function DgSession_decode_str($str, $level, $akeydir = "")
{
    global $dg_err_msg;
    global $dg_log_msg;

    /* 引数チェック */
    if ($level != 1 && $level != 2) {
        $dg_err_msg = "暗号化レベルの指定が間違っています。(" . $level . ")";
        $dg_log_msg = "Invalid encoded level.(" . $level . ")";
    }

    if ($level == 1) {

        /* 暗号化キーファイル読込み */
        $akeyfile = $akeydir . "/etc/admin.key";
        $akey = DgSession_read_admin_key_file($akeyfile);
        if ($akey === FALSE) {
            return FALSE;
        }

        /* 複合化準備 */
        $td = mcrypt_module_open(MCRYPT_3DES, "", MCRYPT_MODE_CBC, "");
        $ivlen = mcrypt_enc_get_iv_size($td);

        /* 文字列の変換 */
        $d64 = base64_decode($str);

        /* 文字列の分割 */
        $iv = substr($d64, 0, $ivlen);
        $decode = substr($d64, $ivlen);

        /* 複合化 */
        $tmp = mcrypt_decrypt(MCRYPT_3DES, $akey, $decode, MCRYPT_MODE_CBC,
                              $iv);
        mcrypt_module_close($td);

        /* コピー */
        $dec_str = rtrim($tmp);

    } elseif ($level == 2) {

        /* str_rot13 */
        $dec_str = str_rot13($str);

        /* Base64デコード */
        $dec_str = base64_decode($dec_str);

    }

    return $dec_str;
}

/**
 *
 * hiddenで送るformのHTMLを作成する。
 *
 * 引数$levelは以下の動作を行います。<br>
 * $level = 1 : mcryptで暗号化<br>
 * $level = 2 : base64とstr_rot13で暗号化<br>
 * $level = 3 : HTMLタグのエスケープ
 *
 * $level = 1の場合、使用するにはプログラム側でDg_Common.phpもincludeする必要があります。
 *
 * @param array   $data    formデータが格納された連想配列
 * @param integer $level   エンコードするレベル(1 or 2)
 * @param string  $akeydir etc/admin.keyが配置されているディレクトリ(デフォルト:空)
 *
 * @return string \$dataの内容を展開したHTML。エラーの場合はFALSEを返します。尚、HTMLのフォームのnameは引数で指定された$dataのキーに"dg_"を付加したもの、valueはキーに対応する値を引数$levelを基に暗号化したものです。
 *
 */
function DgSession_form_in($data, $level, $akeydir = "")
{
    global $dg_err_msg;
    global $dg_log_msg;

    /* formのデータを展開 */
    foreach ($data as $key => $value) {

        /* valueを暗号化 */
        $enc_str = DgSession_encode_str($value, $level, $akeydir);
        if ($enc_str === FALSE) {
            return FALSE;
        }

        /* form組み立て */
        $html .= "<input type=\"hidden\" name=\"dg_" . $key . "\" value=\"" .
                 $enc_str . "\">\n";

    }
    return $html;
}

/**
 *
 * 暗号化されたformデータをデコードする
 *
 * 引数$postdataのキーは文字列dg_で始まっている必要があります。(DgSession_form_inで作成したformによって作成されたデータをデコードします。)
 *
 * 引数$levelは以下の動作を行います。<br>
 * $level = 1 : mcryptで暗号化した文字列を複合化<br>
 * $level = 2 : base64とstr_rot13で複合化
 * 
 * $level = 1の場合、使用するにはプログラム側でDg_Common.phpもincludeする必要があります。
 *
 * @param array   $postdata DgSession_form_inによって暗号化され、POSTで送られてきたデータ
 * @param integer $level    デコードするレベル(1 or 2)
 * @param string  $akeydir  etc/admin.keyが配置されているディレクトリ(デフォルト:空)
 *
 * @return array 複合化した連想配列($data["dg_を取り除いたkey"] = "複合化したvalue"
 *
 */
function DgSession_form_out($postdata, $level, $akeydir = "")
{
    global $dg_err_msg;
    global $dg_log_msg;

    $dg_strlen = strlen(DG_FRONT_STR);

    /* formのデータを展開 */
    foreach ($postdata as $key => $value) {
        /* dg_以外の部分切り出し */
        $ch_key = substr($key, $dg_strlen);

        /* 複合化 */
        $dec_str = DgSession_decode_str($value, $level, $akeydir);
        if ($dec_str === FALSE) {
            return FALSE;
        }

        /* 格納 */
        $dec_data[$ch_key] = $dec_str;

    }
    return $dec_data;
}

?>
