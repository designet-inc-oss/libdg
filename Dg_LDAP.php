<?php
/**
 * LDAPライブラリ
 *
 */

/* マクロ定義 */
/**  LDAP成功 */
define ("LDAP_OK",		 0);
/** ファイルIOエラー */
define ("LDAP_ERR_FILE",	-1);
/** LDAPバインドエラー */
define ("LDAP_ERR_BIND",	-2);
/** LDAP検索エラー */
define ("LDAP_ERR_SEARCH",	-3);
/** LDAP登録エラー */
define ("LDAP_ERR_ADD",		-4);
/** LDAP変更エラー */
define ("LDAP_ERR_MOD",		-5);
/** 不正な引数が入力された */
define ("LDAP_ERR_PARAM",	-6);
/** 不正なデータが存在した */
define ("LDAP_ERR_DATA",	-7);
/** 該当するエントリが存在しない */
define ("LDAP_ERR_NODATA",	-8);
/** 複数のエントリが存在 */
define ("LDAP_ERR_DUPLICATE",	-9);
/** LDAP削除エラー */
define ("LDAP_ERR_DEL",		-10);
/** LDAP属性値なしエラー */
define ("LDAP_ERR_NOATTR",	-11);
/** その他のエラー */
define ("LDAP_ERR_OTHER",	-127);

/* サーチの種類 */
/** LDAPサーチの種類 ベースDN直下の階層のみ検索 */
define("TYPE_ONELEVEL",		0);
/** LDAPサーチの種類 ベースDNを検索 */
define("TYPE_ONEENTRY",		1);
/** LDAPサーチの種類 ベースDN配下をすべてを検索 */
define("TYPE_SUBTREE",		2);

/* 操作の種類 */
/** LDAPエントリ登録処理 */
define("TYPE_ADD",		0);
/** LDAPエントリ変更処理 */
define("TYPE_MODIFY",		1);
/** LDAPエントリ削除処理 */
define("TYPE_DELETE",		2);
/** LDAP属性追加処理 */
define("TYPE_ADD_ATTRIBUTE",	3);
/** LDAP属性置換処理 */
define("TYPE_REPLACE_ATTRIBUTE",	4);
/** LDAP属性修正削除処理 */
define("TYPE_MODIFY_DELETE",	5);

/* LDAPからの返り値 */
/** LDAPのアクセスに成功 */
define ("LDAP_SUCCESS",		0);
/** 指定したDNのエントリが見つからない */
define ("LDAP_NO_SUCH_OBJECT",	32);
/** 指定したDNのエントリが既にある */
define ("LDAP_ALREADY_EXISTS",	68);
/** 指定した属性値が見つからない */
define ("LDAP_DECODING_ERROR",	84);
/** 指定した属性の値が存在しない */
define ("LDAP_NO_SUCH_VALUE",	16);
/** 指定した属性の値が存在しない */
define ("LDAP_NO_SUCH_ATTR",	17);
/** 指定した属性の値が存在している */
define ("LDAP_EXISTS_VALUE",	20);
/** binddn,bindpwが間違っている */
define ("LDAP_INVALID_CREDENTIALS",	49);
/** LDAPサービス停止 */
define ("LDAP_SERVER_DOWN",	81);

/* LDAP用エンコード */
/** プログラム側のエンコード */
define("PG_ENCODING",		"EUC-JP");
/** LDAP用エンコード */
define("LDAP_ENCODING",		"UTF-8");

/** LDAPバージョン */
define("LDAP_VERSION",		3);

/* $dg_err_msg用マクロ */
/** LDAPサーバに接続できない */
define("ERRMSG_CONNECT",	"LDAPサーバに接続できませんでした。");
/** LDAPサーバのバインドに失敗 */
define("ERRMSG_BIND",		"LDAPサーバのバインドに失敗しました。");
/** LDAPのバージョン設定失敗 */
define("ERRMSG_VERSION",	"LDAPのバージョン設定に失敗しました。");
/** 引数で与えられたベースDNの値が不正 */
define("ERRMSG_BASEDN",		"ベースDNの値が不正です。");
/** 引数で与えられたフィルタの値が不正 */
define("ERRMSG_FILTER",		"フィルタの値が不正です。");
/** 引数で与えられた属性の形式が不正 */
define("ERRMSG_ARG_ATTR",	"属性の形式が不正です。");
/** エントリの取得に失敗 */
define("ERRMSG_ENTRY",		"LDAPエントリの取得に失敗しました。");
/** 属性の取得に失敗 */
define("ERRMSG_ATTR",		"LDAP属性の取得に失敗しました。");
/** エントリが既に存在している */
define("ERRMSG_EXIST",		"指定されたエントリはすでに存在しています。");
/** エントリが見つからない */
define("ERRMSG_NOTFOUND",	"指定されたエントリは見つかりませんでした。");
/** 属性の削除に失敗 */
define("ERRMSG_DELATTR",	"LDAP属性の削除に失敗しました。");
/** 検索に失敗 */
define("ERRMSG_SEARCH",		"LDAP検索でエラーが発生しました。");
/** DNの取得に失敗 */
define("ERRMSG_GETDN",		"DNの取得に失敗しました。");
/** 指定された属性値が既に存在 */
define("ERRMSG_EXISTS_VALUE",	"指定された属性値はすでに存在しています。");

/* $dg_log_msg用マクロ */
/** LDAPサーバに接続できない */
define("LOGMSG_CONNECT",	"Cannot connect LDAP server.");
/** LDAPサーバのバインドに失敗 */
define("LOGMSG_BIND",		"Cannot bind LDAP server.");
/** LDAPのバージョン設定失敗 */
define("LOGMSG_VERSION",	"Cannot set LDAP version.");
/** 引数で与えられたベースDNの値が不正 */
define("LOGMSG_BASEDN",		"Invalid BaseDN.");
/** 引数で与えられたフィルタの値が不正 */
define("LOGMSG_FILTER",		"Invalid filter.");
/** 引数で与えられた属性の形式が不正 */
define("LOGMSG_ARG_ATTR",	"Invalid attribute form.");
/** エントリの取得に失敗 */
define("LOGMSG_ENTRY",		"Cannot get LDAP entry. ");
/** 属性の取得に失敗 */
define("LOGMSG_ATTR",		"Cannot get attribute.");
/** エントリが既に存在している */
define("LOGMSG_EXIST",		"LDAP entry already exists.");
/** エントリが見つからない */
define("LOGMSG_NOTFOUND",	"Cannot find LDAP entry.");
/** 属性の削除に失敗 */
define("LOGMSG_DELATTR",	"Cannot delete LDAP attribute.");
/** 検索に失敗 */
define("LOGMSG_SEARCH",		"Cannot search LDAP entry.");
/** DNの取得に失敗 */
define("LOGMSG_GETDN",		"Cannot get LDAP DN.");
/** 指定された属性値が既に存在 */
define("LOGMSG_EXISTS_VALUE",	"Attribute already exists.");

/**
 * 
 * グローバル配列で指定されたLDAPサーバに対してコネクト・バインドを行う。  
 *
 * 関数呼び出し側で$dg_ldapinfoという名前で以下の形式の連想配列を定義することによりLDAPサーバへの接続が可能です。<br><br>
 * $dg_ldapinfo["ldapserver"] : LDAPサーバのIPアドレス<br>
 * $dg_ldapinfo["ldapport"] : LDAPサーバのポート番号<br>
 * $dg_ldapinfo["ldapbinddn"] : LDAPサーバのバインドDN<br>
 * $dg_ldapinfo["ldapbindpw"] : LDAPサーバのバインドパスワード<br>
 * $dg_ldapinfo["ldapuserself"] : 自分自身へのバインド(有効: TRUE 無効: FALSE)<br>
 * $dg_ldapinfo["ldapuserselfdn"] : 自分自身へバインドする場合のバインドDN<br>
 * $dg_ldapinfo["ldapuserselfpw"] : 自分自身へバインドする場合のバインドパスワード<br>
 * $dg_ldapinfo["ldapro"] : read-onlyサーバへのバインド(有効: TRUE 無効: FALSE)<br>
 * $dg_ldapinfo["ldapserverro"] : read-onlyサーバのIPアドレス<br>
 * $dg_ldapinfo["ldapportro"] : read-onlyサーバのポート番号<br>
 *
 * @return mixed LDAPリンクIDを返します。エラーの場合はLDAP_ERR_BINDを返します。
 *
 */
function DgLDAP_connect_server()
{
    global $dg_err_msg;
    global $dg_log_msg;
    global $dg_ldapinfo;

    /* 読込み専用の場合 */
    if ($dg_ldapinfo["ldapro"] === TRUE) {
        $lservers = explode(",", $dg_ldapinfo["ldapserverro"]);
        $lports = explode(",", $dg_ldapinfo["ldapportro"]);
        $max = count($lservers);
    } else {
        $lservers = explode(",", $dg_ldapinfo["ldapserver"]);
        $lports = explode(",", $dg_ldapinfo["ldapport"]);
        $max = count($lservers);
    }

    /* ユーザ自身でバインドする場合 */
    if (isset($dg_ldapinfo["ldapuserself"]) &&
        $dg_ldapinfo["ldapuserself"] === TRUE) {
        $ldapbinddn = $dg_ldapinfo["ldapuserselfdn"];
        $ldapbindpw = $dg_ldapinfo["ldapuserselfpw"];
    } else {
        $ldapbinddn = $dg_ldapinfo["ldapbinddn"];
        $ldapbindpw = $dg_ldapinfo["ldapbindpw"];
    }

    $ldap_err = "";
    $ldap_log = "";
    for ($i = 0; $i < $max; $i++) {

        $lserver = trim($lservers[$i]);
        if ($lserver == "") {
            continue;
        }

        $lport = trim($lports[$i]);
        if ($lport == "") {
            $lport = 389;
        }

        /* LDAPサーバへ接続する */
        $ds = @ldap_connect($lserver, $lport);
        if ($ds === FALSE) {
            $ldap_err .= ERRMSG_CONNECT . "($lserver:$lport)<BR>";
            $ldap_log .= LOGMSG_CONNECT . "($lserver:$lport) ";
            continue;
        }

        /* LDAPのバージョンを3に設定 */
        if (!ldap_set_option($ds, LDAP_OPT_PROTOCOL_VERSION, LDAP_VERSION)) {
            $ldap_err .= ERRMSG_VERSION . "($lserver:$lport)<BR>";
            $ldap_log .= LOGMSG_VERSION . "($lserver:$lport) ";
            ldap_unbind($ds);
            continue;
        }

        /* LDAPディレクトリにバインドする */
        $r = @ldap_bind($ds, $ldapbinddn, $ldapbindpw);
        if ($r === FALSE) {
            $errno = ldap_errno($ds);
            if ($errno == LDAP_SUCCESS) {
                $ldap_err .= ERRMSG_BIND . "($lserver:$lport)<BR>";
                $ldap_log .= LOGMSG_BIND . "($lserver:$lport) ";
            } else {
                $error = ldap_error($ds);
                $ldap_err .= ERRMSG_BIND . "($error $lserver:$lport)<BR>";
                $ldap_log .= LOGMSG_BIND . "($error $lserver:$lport) ";
            }
            ldap_unbind($ds);
            continue;
        }

        /* 接続できた場合 エラーが発生している場合 */
        if ($ldap_err != "") {
            $dg_err_msg = preg_replace("/<br>$/i", "", $ldap_err);
            $dg_log_msg = preg_replace("/<br>$/i", "", $ldap_log);
        }
        return $ds;
    }

    $dg_err_msg = $ldap_err . "指定されたLDAPサーバは全て接続できません" .
                  "でした。";
    $dg_log_msg = $ldap_log . "Cannot connect all LDAP server.";
    return (LDAP_ERR_BIND);
}

/**
 * 
 * 指定された検索スコープの型を使い検索をした結果、得られるエントリの必要情報を、連想配列(&$data)に格納する。
 *
 * 関数呼び出し側で$dg_ldapinfoという名前で以下の形式の連想配列を定義することによりLDAPサーバへの接続が可能です。<br><br>
 * $dg_ldapinfo["ldapserver"] : LDAPサーバのIPアドレス<br>
 * $dg_ldapinfo["ldapport"] : LDAPサーバのポート番号<br>
 * $dg_ldapinfo["ldapbinddn"] : LDAPサーバのバインドDN<br>
 * $dg_ldapinfo["ldapbindpw"] : LDAPサーバのバインドパスワード<br>
 * $dg_ldapinfo["ldapuserself"] : 自分自身へのバインド(有効: TRUE 無効: FALSE)<br>
 * $dg_ldapinfo["ldapuserselfdn"] : 自分自身へバインドする場合のバインドDN<br>
 * $dg_ldapinfo["ldapuserselfpw"] : 自分自身へバインドする場合のバインドパスワード<br>
 * $dg_ldapinfo["ldapro"] : read-onlyサーバへのバインド(有効: TRUE 無効: FALSE)<br>
 * $dg_ldapinfo["ldapserverro"] : read-onlyサーバのIPアドレス<br>
 * $dg_ldapinfo["ldapportro"] : read-onlyサーバのポート番号<br>
 *
 * $attrsの形式には取得したい属性名の配列を指定します。<br>
 * (例) $attrs = array("mail", "uid", "mailDirectory");
 *
 * $typeで指定するサーチスコープの種類は以下になります。<br>
 * TYPE_ONELEVEL : 単一階層の検索<br>
 * TYPE_ONEENTRY : 1エントリの検索<br>
 * TYPE_SUBTREE : LDAPツリーを検索
 * 
 * $dataには以下の形式で検索結果が格納されます。<br>
 * $data[0][属性名][0] = 属性値<br>
 * $data[0][属性名][1] = 属性値 ← 属性に2つ値があった場合<br>
 * $data[1][属性名][0] = 属性値 ← 次のエントリ
 *
 * @param string $basedn 検索ベースDN
 * @param string $filter 検索フィルタ 
 * @param array  $attrs  必要な要素のテーブル 
 * @param string $type   検索スコープの型
 * @param array  &$data  参照渡しされた必要な要素データの格納先
 *
 * @return integer 正常に終了した場合はLDAP_OK、バインドに失敗した場合はLDAP_ERR_BIND、検索に失敗した時はLDAP_ERR_SEARCH、不正な引数が渡された場合はLDAP_ERR_PARAM、エントリが存在しない場合はLDAP_ERR_NODATA、その他のエラーの場合はLDAP_ERR_OTHERを返します。
 *
 */
function DgLDAP_get_entry($basedn, $filter, $attrs, $type, &$data)
{
    /* バインド */
    $ds = DgLDAP_connect_server();
    if ($ds == LDAP_ERR_BIND) {
        return (LDAP_ERR_BIND);
    }

    $ret = DgLDAP_get_entry_batch($basedn, $ds, $filter, $attrs, $type, $data);

    /* アンバインド */
    ldap_unbind($ds);

    return $ret;
}

/**
 * 
 * 指定された検索スコープの型を使い検索をした結果、得られるエントリの必要情報を、連想配列(&$data)に格納する。(関数内でLDAPサーバに接続しない)
 *
 * $attrsの形式には取得したい属性名の配列を指定します。<br>
 * (例) $attrs = array("mail", "uid", "mailDirectory");
 *
 * $typeで指定するサーチスコープの種類は以下になります。<br>
 * TYPE_ONELEVEL : 単一階層の検索<br>
 * TYPE_ONEENTRY : 1エントリの検索<br>
 * TYPE_SUBTREE : LDAPツリーを検索
 * 
 * $dataには以下の形式で検索結果が格納されます。<br>
 * $data[0][属性名][0] = 属性値<br>
 * $data[0][属性名][1] = 属性値 ← 属性に2つ値があった場合<br>
 * $data[1][属性名][0] = 属性値 ← 次のエントリ
 *
 * 引数$dsは関数DgLDAP_connnect_server()を使用して取得してください。
 *
 * @param string $basedn 検索ベースDN
 * @param string $ds     LDAPリンクID
 * @param string $filter 検索フィルタ 
 * @param array  $attrs  必要な要素のテーブル 
 * @param string $type   検索スコープの型(TYPE_ONEENTRY, TYPE_ONELEVEL, TYPE_SUBTREE)
 * @param array  &$data  参照渡しされた必要な要素データの格納先
 *
 * @return integer 正常に終了した場合はLDAP_OK、検索に失敗した時はLDAP_ERR_SEARCH、不正な引数が渡された場合はLDAP_ERR_PARAM、エントリが存在しない場合はLDAP_ERR_NODATA、その他のエラーの場合はLDAP_ERR_OTHERを返します。
 *
 */
function DgLDAP_get_entry_batch($basedn, $ds, $filter, $attrs, $type, &$data)
{
    global $dg_err_msg;
    global $dg_log_msg;

    $s_attrs = array();

    /* 引数チェック */
    if (!$basedn) {
        $dg_err_msg = ERRMSG_BASEDN;
        $dg_log_msg = LOGMSG_BASEDN;
        return (LDAP_ERR_PARAM);
    }
    if (!$filter){
        $dg_err_msg = ERRMSG_FILTER;
        $dg_log_msg = LOGMSG_FILTER;
        return (LDAP_ERR_PARAM);
    }
    if (!is_array($attrs)) {
        $dg_err_msg = ERRMSG_ARG_ATTR;
        $dg_log_msg = LOGMSG_ARG_ATTR;
        return (LDAP_ERR_PARAM);
    }

    /* 属性名を小文字に変換 */
    for ($i = 0, $max = count($attrs); $i < $max; $i++) {
        $tmp = strtolower($attrs[$i]);

        /* アトリビュートにDNがあるときは次へ */
        if ($tmp == "dn") {
            continue;
        }
        $s_attrs[$i] = $tmp;
    }

    /* サーチ */
    $sr = DgLDAP_scope_search($ds, $basedn, $s_attrs, $filter, $type);
    if ($sr === FALSE){
        $errno = ldap_errno($ds);
        if ($errno == LDAP_NO_SUCH_OBJECT) {
            $dg_err_msg = ERRMSG_NOTFOUND . "(dn:$basedn)";
            $dg_log_msg = LOGMSG_NOTFOUND . "(dn:$basedn)";
            return (LDAP_ERR_NODATA);

        } elseif ($errno == LDAP_SUCCESS) {
            $dg_err_msg = ERRMSG_SEARCH . "(dn:$basedn)";
            $dg_log_msg = LOGMSG_SEARCH . "(dn:$basedn)";
            return (LDAP_ERR_SEARCH);

        } else {
            $error = ldap_error($ds);
            $dg_err_msg = ERRMSG_SEARCH . "($error dn:$basedn)";
            $dg_log_msg = LOGMSG_SEARCH . "($error dn:$basedn)";
            return (LDAP_ERR_SEARCH);
        }
    }

    /* データ格納 */
    $ret = DgLDAP_set_data($ds, $sr, $attrs, $s_attrs, $type, $data, $basedn);

    return $ret;
}

/**
 *
 * 引数で渡された連想配列($data)に格納されたデータをLDAPに登録する。
 *
 * 関数呼び出し側で$dg_ldapinfoという名前で以下の形式の連想配列を定義することによりLDAPサーバへの接続が可能です。<br><br>
 * $dg_ldapinfo["ldapserver"] : LDAPサーバのIPアドレス<br>
 * $dg_ldapinfo["ldapport"] : LDAPサーバのポート番号<br>
 * $dg_ldapinfo["ldapbinddn"] : LDAPサーバのバインドDN<br>
 * $dg_ldapinfo["ldapbindpw"] : LDAPサーバのバインドパスワード<br>
 * $dg_ldapinfo["ldapuserself"] : 自分自身へのバインド(有効: TRUE 無効: FALSE)<br>
 * $dg_ldapinfo["ldapuserselfdn"] : 自分自身へバインドする場合のバインドDN<br>
 * $dg_ldapinfo["ldapuserselfpw"] : 自分自身へバインドする場合のバインドパスワード<br>
 * $dg_ldapinfo["ldapro"] : read-onlyサーバへのバインド(有効: TRUE 無効: FALSE)<br>
 * $dg_ldapinfo["ldapserverro"] : read-onlyサーバのIPアドレス<br>
 * $dg_ldapinfo["ldapportro"] : read-onlyサーバのポート番号<br>
 *
 * 引数で渡す連想配列$dataの形式は以下とします。<br>
 * $data["追加する属性名"] = "属性値"
 *
 * @param string $dn   登録するDN
 * @param array  $data 必要な要素データの格納先
 *
 * @return integer 正常な場合はLDAP_OKを返します。バインドに失敗した場合はLDAP_ERR_BIND、LDAPへの登録に失敗した場合はLDAP_ERR_ADD、エントリが既に存在した場合はLDAP_ERR_DUPLICATEを返します。
 *
 */
function DgLDAP_add_entry($dn, $data)
{

    $ret = DgLDAP_entry_operate($dn, $data, TYPE_ADD);
    return $ret;

}

/**
 * 
 * 引数で渡された連想配列($data)に格納されたデータをLDAPに登録する。(関数内でLDAPサーバに接続しない)
 *
 * 引数で渡す連想配列$dataの形式は以下とします。<br>
 * $data["追加する属性名"] = "属性値"
 *
 * 引数$dsは関数DgLDAP_connnect_server()を使用して取得してください。
 *
 * @param string $dn   登録するDN
 * @param string $ds   LDAPリンクID
 * @param array  $data 必要な要素データの格納先
 *
 * @return integer 正常な場合はLDAP_OKを返します。LDAPへの登録に失敗した場合はLDAP_ERR_ADD、エントリが既に存在した場合はLDAP_ERR_DUPLICATEを返します。
 *
 */
function DgLDAP_add_entry_batch($dn, $ds, $data)
{

    $ret = DgLDAP_entry_operate_batch($dn, $ds, $data, TYPE_ADD);
    return $ret;

}

/**
 * 
 * LDAPに登録されたデータを、連想配列($data)に格納されたデータに変更する。
 *
 * 関数呼び出し側で$dg_ldapinfoという名前で以下の形式の連想配列を定義することによりLDAPサーバへの接続が可能です。<br><br>
 * $dg_ldapinfo["ldapserver"] : LDAPサーバのIPアドレス<br>
 * $dg_ldapinfo["ldapport"] : LDAPサーバのポート番号<br>
 * $dg_ldapinfo["ldapbinddn"] : LDAPサーバのバインドDN<br>
 * $dg_ldapinfo["ldapbindpw"] : LDAPサーバのバインドパスワード<br>
 * $dg_ldapinfo["ldapuserself"] : 自分自身へのバインド(有効: TRUE 無効: FALSE)<br>
 * $dg_ldapinfo["ldapuserselfdn"] : 自分自身へバインドする場合のバインドDN<br>
 * $dg_ldapinfo["ldapuserselfpw"] : 自分自身へバインドする場合のバインドパスワード<br>
 * $dg_ldapinfo["ldapro"] : read-onlyサーバへのバインド(有効: TRUE 無効: FALSE)<br>
 * $dg_ldapinfo["ldapserverro"] : read-onlyサーバのIPアドレス<br>
 * $dg_ldapinfo["ldapportro"] : read-onlyサーバのポート番号<br>
 *
 * 引数で渡す連想配列$dataの形式は以下とします。<br>
 * $data["追加する属性名"] = "属性値"
 *
 * @param string $dn   変更するDN
 * @param array  $data 必要な要素データの格納先
 *
 * @return integer 正常な場合はLDAP_OKを返します。バインドに失敗した場合はLDAP_ERR_BIND、LDAPの情報変更に失敗した場合はLDAP_ERR_MOD、変更するエントリが存在しない場合はLDAP_ERR_NODATAを返します。
 *
 */
function DgLDAP_mod_entry($dn, $data)
{

    $ret = DgLDAP_entry_operate($dn, $data, TYPE_MODIFY);
    return $ret;

}

/**
 * 
 * LDAPに登録されたデータを、連想配列($data)に格納されたデータに変更する。(関数内でLDAPサーバに接続しない)
 *
 * 引数で渡す連想配列$dataの形式は以下とします。<br>
 * $data["追加する属性名"] = "属性値"
 *
 * 引数$dsは関数DgLDAP_connnect_server()を使用して取得してください。
 *
 * @param string $dn   変更するDN
 * @param string $ds   LDAPリンクID
 * @param array  $data 必要な要素データの格納先
 *
 * @return integer 正常な場合はLDAP_OKを返します。LDAPの情報変更に失敗した場合はLDAP_ERR_MOD、変更するエントリが存在しない場合はLDAP_ERR_NODATAを返します。
 *
 */
function DgLDAP_mod_entry_batch($dn, $ds, $data)
{

    $ret = DgLDAP_entry_operate_batch($dn, $ds, $data, TYPE_MODIFY);
    return $ret;

}

/**
 * 
 * LDAPに登録されたデータを、消去する。
 *
 * 関数呼び出し側で$dg_ldapinfoという名前で以下の形式の連想配列を定義することによりLDAPサーバへの接続が可能です。<br><br>
 * $dg_ldapinfo["ldapserver"] : LDAPサーバのIPアドレス<br>
 * $dg_ldapinfo["ldapport"] : LDAPサーバのポート番号<br>
 * $dg_ldapinfo["ldapbinddn"] : LDAPサーバのバインドDN<br>
 * $dg_ldapinfo["ldapbindpw"] : LDAPサーバのバインドパスワード<br>
 * $dg_ldapinfo["ldapuserself"] : 自分自身へのバインド(有効: TRUE 無効: FALSE)<br>
 * $dg_ldapinfo["ldapuserselfdn"] : 自分自身へバインドする場合のバインドDN<br>
 * $dg_ldapinfo["ldapuserselfpw"] : 自分自身へバインドする場合のバインドパスワード<br>
 * $dg_ldapinfo["ldapro"] : read-onlyサーバへのバインド(有効: TRUE 無効: FALSE)<br>
 * $dg_ldapinfo["ldapserverro"] : read-onlyサーバのIPアドレス<br>
 * $dg_ldapinfo["ldapportro"] : read-onlyサーバのポート番号<br>
 *
 * @param string $basedn 消去するDN
 *
 * @return integer 正常な場合はLDAP_OKを返します。バインドに失敗した場合はLDAP_ERR_BIND、LDAPのエントリの削除に失敗した場合はLDAP_ERR_DEL、変更するエントリが存在しない場合はLDAP_ERR_NODATAを返します。
 *
 */
function DgLDAP_del_entry($basedn)
{
    $data = "";
    $ret = DgLDAP_entry_operate($basedn, $data, TYPE_DELETE);
    return $ret;
}

/**
 * 
 * LDAPに登録されたデータを、消去する。(関数内でLDAPサーバに接続しない)
 *
 * 引数$dsは関数DgLDAP_connnect_server()を使用して取得してください。
 *
 * @param string $basedn 消去するDN
 * @param string $ds LDAPリンクID
 *
 * @return integer 正常な場合はLDAP_OKを返します。LDAPのエントリの削除に失敗した場合はLDAP_ERR_DEL、変更するエントリが存在しない場合はLDAP_ERR_NODATAを返します。
 *
 */
function DgLDAP_del_entry_batch($basedn, $ds)
{
    $data = "";
    $ret = DgLDAP_entry_operate_batch($basedn, $ds, $data, TYPE_DELETE);
    return $ret;
}

/**
 *
 * LDAPに登録されたエントリの属性を追加する
 *
 * 関数呼び出し側で$dg_ldapinfoという名前で以下の形式の連想配列を定義することによりLDAPサーバへの接続が可能です。<br><br>
 * $dg_ldapinfo["ldapserver"] : LDAPサーバのIPアドレス<br>
 * $dg_ldapinfo["ldapport"] : LDAPサーバのポート番号<br>
 * $dg_ldapinfo["ldapbinddn"] : LDAPサーバのバインドDN<br>
 * $dg_ldapinfo["ldapbindpw"] : LDAPサーバのバインドパスワード<br>
 * $dg_ldapinfo["ldapuserself"] : 自分自身へのバインド(有効: TRUE 無効: FALSE)<br>
 * $dg_ldapinfo["ldapuserselfdn"] : 自分自身へバインドする場合のバインドDN<br>
 * $dg_ldapinfo["ldapuserselfpw"] : 自分自身へバインドする場合のバインドパスワード<br>
 * $dg_ldapinfo["ldapro"] : read-onlyサーバへのバインド(有効: TRUE 無効: FALSE)<br>
 * $dg_ldapinfo["ldapserverro"] : read-onlyサーバのIPアドレス<br>
 * $dg_ldapinfo["ldapportro"] : read-onlyサーバのポート番号
 *
 * 引数で渡す連想配列$dataの形式は以下とします。<br>
 * $data["追加する属性名"] = "属性値"
 *
 * この関数は既に存在するエントリの属性を追加します。エントリを追加する場合はDgLDAP_add_entry()を使用してください。
 *
 * @param string $basedn 属性を追加するDN
 * @param array  $data   必要な要素データの格納先
 *
 * @return integer 正常な場合はLDAP_OKを返します。バインドに失敗した場合はLDAP_ERR_BIND、LDAPの情報追加に失敗した場合はLDAP_ERR_ADD、エントリが存在しない場合はLDAP_ERR_NODATA、属性値が既に存在する場合はLDAP_ERR_DUPLICATEを返します。
 *
 */
function DgLDAP_add_attribute($basedn, $data)
{

    $ret = DgLDAP_entry_operate($basedn, $data, TYPE_ADD_ATTRIBUTE);
    return $ret;

}

/**
 *
 * LDAPに登録されたエントリの属性を追加する(関数内でLDAPサーバに接続しない)
 *
 * 引数で渡す連想配列$dataの形式は以下とします。<br>
 * $data["追加する属性名"] = "属性値"
 *
 * この関数は既に存在するエントリの属性を追加します。エントリを追加する場合はDgLDAP_add_entry_batch()を使用してください。
 *
 * 引数$dsは関数DgLDAP_connnect_server()を使用して取得してください。
 *
 * @param string $basedn 属性を追加するDN
 * @param string $ds     LDAPリンクID
 * @param array  $data   必要な要素データの格納先
 *
 * @return integer 正常な場合はLDAP_OKを返します。LDAPの情報追加に失敗した場合はLDAP_ERR_ADD、エントリが存在しない場合はLDAP_ERR_NODATA、属性値が既に存在する場合はLDAP_ERR_DUPLICATEを返します。
 *
 */
function DgLDAP_add_attribute_batch($basedn, $ds, $data)
{

    $ret = DgLDAP_entry_operate_batch($basedn, $ds, $data, TYPE_ADD_ATTRIBUTE);
    return $ret;

}

/**
 *
 * LDAPに登録された1つのデータの属性を削除する
 *
 * 関数呼び出し側で$dg_ldapinfoという名前で以下の形式の連想配列を定義することによりLDAPサーバへの接続が可能です。<br><br>
 * $dg_ldapinfo["ldapserver"] : LDAPサーバのIPアドレス<br>
 * $dg_ldapinfo["ldapport"] : LDAPサーバのポート番号<br>
 * $dg_ldapinfo["ldapbinddn"] : LDAPサーバのバインドDN<br>
 * $dg_ldapinfo["ldapbindpw"] : LDAPサーバのバインドパスワード<br>
 * $dg_ldapinfo["ldapuserself"] : 自分自身へのバインド(有効: TRUE 無効: FALSE)<br>
 * $dg_ldapinfo["ldapuserselfdn"] : 自分自身へバインドする場合のバインドDN<br>
 * $dg_ldapinfo["ldapuserselfpw"] : 自分自身へバインドする場合のバインドパスワード<br>
 * $dg_ldapinfo["ldapro"] : read-onlyサーバへのバインド(有効: TRUE 無効: FALSE)<br>
 * $dg_ldapinfo["ldapserverro"] : read-onlyサーバのIPアドレス<br>
 * $dg_ldapinfo["ldapportro"] : read-onlyサーバのポート番号<br>
 *
 * 引数で渡す連想配列$attrsの形式は以下とします。<br>
 * $attrs["削除する属性名"] = "削除する属性値"
 * 
 * @param string $dn    削除対象の属性を持つDN
 * @param array  $attrs 削除する属性の名前の配列
 * @return integer 正常な場合はLDAP_OKを返します。バインドに失敗した場合はLDAP_ERR_BIND、不正な引数が渡された場合はLDAP_ERR_PARAM、属性の削除に失敗した場合はLDAP_ERR_DEL、エントリが存在しなかった場合はLDAP_ERR_NODATA、属性または属性値がなかった場合はLDAP_ERR_NOATTRを返します。
 *
 */
function DgLDAP_del_attribute($dn, $attrs)
{

    /* バインド */
    $ds = DgLDAP_connect_server();
    if ($ds == LDAP_ERR_BIND) {
        return (LDAP_ERR_BIND);
    }

    /* 属性の削除 */
    $ret = DgLDAP_del_attribute_batch($ds, $dn, $attrs);

    /* アンバインド */
    ldap_unbind($ds);

    return $ret;
}

/**
 *
 * LDAPに登録された1つのデータの属性を削除する(関数内でLDAPサーバに接続しない)
 *
 * 引数で渡す連想配列$attrsの形式は以下とします。<br>
 * $attrs["削除する属性名"] = "削除する属性値"
 * 
 * 引数$dsは関数DgLDAP_connnect_server()を使用して取得してください。
 *
 * @param string $ds    LDAPリンクID
 * @param string $dn    削除対象の属性を持つDN
 * @param array  $attrs 削除する属性の名前の配列
 *
 * @return integer 正常な場合はLDAP_OKを返します。不正な引数が渡された場合はLDAP_ERR_PARAM、属性の削除に失敗した場合はLDAP_ERR_DEL、エントリが存在しなかった場合はLDAP_ERR_NODATA、属性または属性値がなかった場合はLDAP_ERR_NOATTRを返します。
 *
 */
function DgLDAP_del_attribute_batch($ds, $dn, $attrs)
{
    global $dg_err_msg;
    global $dg_log_msg;

    /* 引数チェック */
    if (!$dn) {
        $dg_err_msg = ERRMSG_BASEDN;
        $dg_log_msg = LOGMSG_BASEDN;
        return (LDAP_ERR_PARAM);
    }
    if (!is_array($attrs)) {
        $dg_err_msg = ERRMSG_ARG_ATTR;
        $dg_log_msg = LOGMSG_ARG_ATTR;
        return (LDAP_ERR_PARAM);
    }

    $enc_dn = mb_convert_encoding($dn, LDAP_ENCODING, PG_ENCODING);
    $r = @ldap_mod_del($ds, $enc_dn, $attrs);
    if ($r === FALSE) {
        $errno = ldap_errno($ds);
        if ($errno == LDAP_SUCCESS) {
            $dg_err_msg = ERRMSG_DELATTR . "(dn:$dn)";
            $dg_log_msg = LOGMSG_DELATTR . "(dn:$dn)";
            $ret = LDAP_ERR_DEL;
        } else {
            $error = ldap_error($ds);
            $dg_err_msg = ERRMSG_DELATTR . "($error dn:$dn)";
            $dg_log_msg = LOGMSG_DELATTR . "($error dn:$dn)";

            if ($errno == LDAP_NO_SUCH_VALUE || $errno == LDAP_NO_SUCH_ATTR) {
                $ret = LDAP_ERR_NOATTR;
            } else if ($errno == LDAP_NO_SUCH_OBJECT) {
                $ret = LDAP_ERR_NODATA;
            } else {
                $ret =  LDAP_ERR_DEL;
            }
        }
        return $ret;
    }

    return (LDAP_OK);
}

/**
 * 
 * 指定されたデータ操作($type)を受けて追加・変更・削除・置換といった処理を行う
 *
 * 関数呼び出し側で$dg_ldapinfoという名前で以下の形式の連想配列を定義することによりLDAPサーバへの接続が可能です。<br><br>
 * $dg_ldapinfo["ldapserver"] : LDAPサーバのIPアドレス<br>
 * $dg_ldapinfo["ldapport"] : LDAPサーバのポート番号<br>
 * $dg_ldapinfo["ldapbinddn"] : LDAPサーバのバインドDN<br>
 * $dg_ldapinfo["ldapbindpw"] : LDAPサーバのバインドパスワード<br>
 * $dg_ldapinfo["ldapuserself"] : 自分自身へのバインド(有効: TRUE 無効: FALSE)<br>
 * $dg_ldapinfo["ldapuserselfdn"] : 自分自身へバインドする場合のバインドDN<br>
 * $dg_ldapinfo["ldapuserselfpw"] : 自分自身へバインドする場合のバインドパスワード<br>
 * $dg_ldapinfo["ldapro"] : read-onlyサーバへのバインド(有効: TRUE 無効: FALSE)<br>
 * $dg_ldapinfo["ldapserverro"] : read-onlyサーバのIPアドレス<br>
 * $dg_ldapinfo["ldapportro"] : read-onlyサーバのポート番号
 *
 * $typeには以下の値を設定してください。<br>
 * エントリの追加 : TYPE_ADD<br>
 * エントリの変更 : TYPE_MODIFY<br>
 * エントリの削除 : TYPE_DELETE<br>
 * 属性の追加 : TYPE_ADD_ATTRIBUTE<br>
 * 属性の置換 : TYPE_REPLACE_ATTRIBUTE<br>
 * エントリの変更 : TYPE_MODIFY_DELETE
 *
 * @param string $dn   登録or変更or削除DN
 * @param array  $data 登録or変更するデータのarray
 * @param string $type 指定されたデータ操作
 *
 * @return integer 正常な場合はLDAP_OKを返します。LDAPへのバインドに失敗した場合はLDAP_ERR_BIND、LDAPへの登録に失敗した場合はLDAP_ERR_ADD、LDAPの情報変更に失敗した場合はLDAP_ERR_MOD、エントリが存在しない場合はLDAP_ERR_NODATA、エントリが存在する場合はLDAP_ERR_DUPLICATE、LDAPのエントリの削除に失敗した場合はLDAP_ERR_DELを返します。
 *
 */
function DgLDAP_entry_operate($dn, $data, $type)
{

    /* バインド */
    $ds = DgLDAP_connect_server();
    if ($ds == LDAP_ERR_BIND) {
        return (LDAP_ERR_BIND);
    }

    /* データ操作 */
    $ret = DgLDAP_entry_operate_batch($dn, $ds, $data, $type);

    /* アンバインド */
    ldap_unbind($ds);

    return $ret;
}

/**
 * 
 * 指定されたデータ操作($type)を受けて追加・変更・削除・置換といった処理を行う(関数内でLDAPサーバに接続しない)
 *
 * $typeには以下の値を設定してください。<br>
 * エントリの追加 : TYPE_ADD<br>
 * エントリの変更 : TYPE_MODIFY<br>
 * エントリの削除 : TYPE_DELETE<br>
 * 属性の追加 : TYPE_ADD_ATTRIBUTE<br>
 * 属性の置換 : TYPE_REPLACE_ATTRIBUTE<br>
 * エントリの変更 : TYPE_MODIFY_DELETE
 *
 * @param string $dn   登録or変更or削除DN
 * @param string $ds   LDAPリンクID
 * @param array  $data 登録or変更するデータのarray
 * @param string $type 指定されたデータ操作	
 *
 * @return integer 正常な場合はLDAP_OKを返します。LDAPへの登録に失敗した場合はLDAP_ERR_ADD、LDAPの情報変更に失敗した場合はLDAP_ERR_MOD、エントリが存在しない場合はLDAP_ERR_NODATA、エントリが存在する場合はLDAP_ERR_DUPLICATE、LDAPのエントリの削除に失敗した場合はLDAP_ERR_DELを返します。
 *
 */
function DgLDAP_entry_operate_batch($dn, $ds, $data, $type)
{
    global $dg_err_msg;
    global $dg_log_msg;

    /* 引数チェック */
    if (!$dn) {
        $dg_err_msg = ERRMSG_BASEDN;
        $dg_log_msg = LOGMSG_BASEDN;
        return (LDAP_ERR_PARAM);
    }
    if ((!is_array($data)) && ($type != TYPE_DELETE)) {
        $dg_err_msg = ERRMSG_ARG_ATTR;
        $dg_log_msg = LOGMSG_ARG_ATTR;
        return (LDAP_ERR_PARAM);
    }

    $conv_dn = mb_convert_encoding($dn, LDAP_ENCODING, PG_ENCODING);

    /* エントリの追加・変更・削除・置換 */
    if ($type == TYPE_ADD) {
        $err_str = "エントリの追加";
        $log_str = "add entry";
        $r = @ldap_add($ds, $conv_dn, $data);
    } elseif ($type == TYPE_MODIFY) {
        $err_str = "エントリの変更";
        $log_str = "modify entry";
        $r = @ldap_modify($ds, $conv_dn, $data);
    } elseif ($type == TYPE_DELETE) {
        $err_str = "エントリの削除";
        $log_str = "delete entry";
        $r = @ldap_delete($ds, $conv_dn);
    } elseif ($type == TYPE_ADD_ATTRIBUTE) {
        $err_str = "属性の追加";
        $log_str = "add attribute";
        $r = @ldap_mod_add($ds, $conv_dn, $data);
    } elseif ($type == TYPE_REPLACE_ATTRIBUTE) {
        $err_str = "属性の追加";
        $log_str = "add attribute";
        $r = @ldap_mod_add($ds, $conv_dn, array($data[0] => $data[2]));
    } elseif ($type == TYPE_MODIFY_DELETE) {
        $err_str = "エントリの変更";
        $log_str = "modify entry";
        $r = @ldap_modify($ds, $conv_dn, $data[0]);
    }

    if ($r === FALSE) {
        $errno = ldap_errno($ds);
        /* すでに存在している */
	if ($errno == LDAP_ALREADY_EXISTS) {
            $dg_err_msg = ERRMSG_EXIST . "(dn:$dn)";
            $dg_log_msg = LOGMSG_EXIST . "(dn:$dn)";
            return (LDAP_ERR_DUPLICATE);
        }
        /* 見つからない */
	if ($errno == LDAP_NO_SUCH_OBJECT) {
            $dg_err_msg = ERRMSG_NOTFOUND . "(dn:$dn)";
            $dg_log_msg = LOGMSG_NOTFOUND . "(dn:$dn)";
            return (LDAP_ERR_NODATA);
        }
        /* すでに存在している(属性値) */
	if ($errno == LDAP_EXISTS_VALUE) {
            $dg_err_msg = ERRMSG_EXISTS_VALUE . "(dn:$dn)";
            $dg_log_msg = LOGMSG_EXISTS_VALUE . "(dn:$dn)";
            return (LDAP_ERR_DUPLICATE);
        }

        if ($errno == LDAP_SUCCESS) {
            $dg_err_msg = $err_str . "に失敗しました。(dn:" . $dn . ")";
            $dg_log_msg = "Cannot " . $log_str . ".(dn:" . $dn . ")";
        } else {
            $error = ldap_error($ds);
            $dg_err_msg = $err_str . "に失敗しました。(" . $error . " dn:" .
                          $dn . ")";
            $dg_log_msg = "Cannot " . $log_str . ".(" . $error . " dn:" . $dn .
                          ")";
	}

	if ($type == TYPE_ADD || $type == TYPE_ADD_ATTRIBUTE ||
            $type == TYPE_REPLACE_ATTRIBUTE) {
            return (LDAP_ERR_ADD);
	} elseif ($type == TYPE_MODIFY || $type == TYPE_MODIFY_DELETE){
            return (LDAP_ERR_MOD);
	} elseif ($type == TYPE_DELETE){
            return (LDAP_ERR_DEL);
	}
    }
    /* 置換の場合は削除 */
    if ($type == TYPE_REPLACE_ATTRIBUTE) {
        return DgLDAP_del_attribute_batch($ds, $dn,
                                          array($data[0] => $data[1]));
    /* 修正削除の場合は削除 */
    } else if ($type == TYPE_MODIFY_DELETE) {
        return DgLDAP_del_attribute_batch($ds, $dn, $data[1]);
    }

    return (LDAP_OK);
}

/**
 * 
 * $typeで指定されたサーチスコープでサーチをする。
 *
 * $typeで指定するサーチスコープの種類は以下になります。<br>
 * TYPE_ONELEVEL : 単一階層の検索<br>
 * TYPE_ONEENTRY : 1エントリの検索<br>
 * TYPE_SUBTREE : LDAPツリーを検索
 * 
 * @param string $ds     LDAPリンクID	
 * @param string $basedn 基点エントリのDN
 * @param array  $attrs  必要な要素のテーブル 
 * @param string $filter 検索フィルタ	
 * @param string $type   サーチスコープの型	
 *
 * @return string サーチ結果IDを返します。
 *
 */
function DgLDAP_scope_search($ds, $basedn, $attrs, $filter, $type)
{
    $basedn = mb_convert_encoding($basedn, LDAP_ENCODING, PG_ENCODING);
    if (count($attrs) == 0) {
	switch ($type) {
	    case TYPE_ONELEVEL:
	        $sr = @ldap_list($ds, $basedn, $filter, array());
		break;	
	    case TYPE_ONEENTRY:
	        $sr = @ldap_read($ds, $basedn, $filter);
		break;
	    case TYPE_SUBTREE:
	        $sr = @ldap_search($ds, $basedn, $filter);
		break;
	}
    } else {
	switch ($type) {
	    case TYPE_ONELEVEL:
	        $sr = @ldap_list($ds, $basedn, $filter, $attrs);
	        break;
	    case TYPE_ONEENTRY:
	        $sr = @ldap_read($ds, $basedn, $filter, $attrs);
		break;
	    case TYPE_SUBTREE:
	        $sr = @ldap_search($ds, $basedn, $filter, $attrs);
		break;
	}
    }
    return ($sr);
}

/**
 * 
 * 検索した結果から得られる必要要素を連想配列(&$data)に格納する。
 *
 * @param string $ds      LDAPリンクID	
 * @param string $sr      サーチ結果ID	
 * @param array  $attrs   必要な要素のテーブル 
 * @param array  $s_attrs 小文字のキーテーブル
 * @param string $type    サーチスコープの型	
 * @param array  &$data   必要な要素データの格納先
 * @param string $basedn  ベースDN 
 *
 * @return integer 正常な場合はLDAP_OKを返します。検索エラーの場合はLDAP_ERR_SEARCHを、エントリが存在しない場合はLDAP_ERR_NODATAを、その他のエラーの場合はLDAP_ERR_OTHERを返します。
 *
 */
function DgLDAP_set_data($ds, $sr, $attrs, $s_attrs, $type, &$data, $basedn) 
{
    global $dg_err_msg;
    global $dg_log_msg;

    /* エントリ数を数える */
    $entry_cnt = @ldap_count_entries($ds, $sr);
    if ($entry_cnt === FALSE) {
        $errno = ldap_errno($ds);
        if ($errno == LDAP_SUCCESS) {
            $dg_err_msg = ERRMSG_ENTRY . "(dn:$basedn)";
            $dg_log_msg = LOGMSG_ENTRY . "(dn:$basedn)";
        } else {
            $error = ldap_error($ds);
            $dg_err_msg = ERRMSG_ENTRY . "($error dn:$basedn)";
            $dg_log_msg = LOGMSG_ENTRY . "($error dn:$basedn)";
        }
        return (LDAP_ERR_NODATA);

    } elseif ($entry_cnt == 0) { 
        $dg_err_msg = ERRMSG_NOTFOUND . "(dn:$basedn)";
        $dg_log_msg = LOGMSG_NOTFOUND . "(dn:$basedn)";
        return (LDAP_ERR_NODATA);
    }

    /* 最初の結果エントリを得る */
    $entry_id = @ldap_first_entry($ds, $sr);
    if ($entry_id === FALSE) {
        $errno = ldap_errno($ds);
        if ($errno == LDAP_SUCCESS) {
            $dg_err_msg = ERRMSG_ENTRY . "(dn:$basedn)";
            $dg_log_msg = LOGMSG_ENTRY . "(dn:$basedn)";
        } else {
            $error = ldap_error($ds);
            $dg_err_msg = ERRMSG_ENTRY . "($error dn:$basedn)";
            $dg_log_msg = LOGMSG_ENTRY . "($error dn:$basedn)";
        }
        return (LDAP_ERR_NODATA);
    }

    for ($j = 0 ; $entry_id ; $j++) {
        $dn = @ldap_get_dn($ds, $entry_id);
        if ($dn === FALSE) {
            $errno = ldap_errno($ds);
            if ($errno == LDAP_SUCCESS) {
                $dg_err_msg = ERRMSG_GETDN . "(dn:$basedn)"; 
                $dg_log_msg = LOGMSG_GETDN . "(dn:$basedn)"; 
            } else {
                $error = ldap_error($ds);
                $dg_err_msg = ERRMSG_GETDN . "($error dn:$basedn)";
                $dg_log_msg = LOGMSG_GETDN . "($error dn:$basedn)";
            }
            return (LDAP_ERR_OTHER);
        }
        $data[$j]["dn"] = preg_replace("/, +/", ",", $dn);

        /* エントリ情報取得 */
        $attri = @ldap_get_attributes($ds, $entry_id); 
        if ($attri === FALSE) {
            $errno = ldap_errno($ds);
            if ($errno == LDAP_SUCCESS) {
                $dg_err_msg = ERRMSG_ATTR . "(dn:$basedn)";
                $dg_log_msg = LOGMSG_ATTR . "(dn:$basedn)";
            } else {
                $error = ldap_error($ds);
                $dg_err_msg = ERRMSG_ATTR . "($error dn:$basedn)";
                $dg_log_msg = LOGMSG_ATTR . "($error dn:$basedn)";
            }
            return (LDAP_ERR_OTHER);
        }

        $attrs_cnt = $attri["count"];

        for ($i = 0; $i < $attrs_cnt; $i++) {
            /* 属性の値 */
            $value = @ldap_get_values_len($ds, $entry_id, $attri[$i]);
            if ($value === FALSE) {
                    $errno = ldap_errno($ds);
                    if ($errno == LDAP_DECODING_ERROR) {
                        $data[$j][$attri[$i]][$k] = "";
                    } elseif($errno == LDAP_SUCCESS) {
                    	$dg_err_msg = ERRMSG_ATTR . "(dn:$basedn)";
                    	$dg_log_msg = LOGMSG_ATTR . "(dn:$basedn)";
                    } else {
                        $error = ldap_error($ds);
                    	$dg_err_msg = ERRMSG_ATTR . "($error dn:$basedn)";
                    	$dg_log_msg = LOGMSG_ATTR . "($error dn:$basedn)";
                    }
                    return (LDAP_ERR_OTHER);
            }

            for ($k = 0; $k < $value["count"]; $k++ ) {
                $data[$j][$attri[$i]][$k] = $value[$k];	
            }
        }
        /* 次の結果エントリを得る */
        $entry_id = @ldap_next_entry($ds, $entry_id);
    }
    return (LDAP_OK);
}

/**
 * 
 * フィルタのエスケープ
 *
 * フィルタに指定される文字列(*, (, ), \\)をエスケープします。
 *
 * @param string $str エスケープする文字列
 *
 * @return string エスケープ後の文字列
 *
 */
function DgLDAP_filter_escape($str)
{
    $trans = array("*" => "\\*",
                   "(" => "\\(",
                   ")" => "\\)",
                   "\\" => "\\\\");

    return strtr($str, $trans);
}

?>
