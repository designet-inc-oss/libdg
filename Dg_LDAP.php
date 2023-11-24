<?php
/**
 * LDAP�饤�֥��
 *
 */

/* �ޥ������ */
/**  LDAP���� */
define ("LDAP_OK",		 0);
/** �ե�����IO���顼 */
define ("LDAP_ERR_FILE",	-1);
/** LDAP�Х���ɥ��顼 */
define ("LDAP_ERR_BIND",	-2);
/** LDAP�������顼 */
define ("LDAP_ERR_SEARCH",	-3);
/** LDAP��Ͽ���顼 */
define ("LDAP_ERR_ADD",		-4);
/** LDAP�ѹ����顼 */
define ("LDAP_ERR_MOD",		-5);
/** �����ʰ��������Ϥ��줿 */
define ("LDAP_ERR_PARAM",	-6);
/** �����ʥǡ�����¸�ߤ��� */
define ("LDAP_ERR_DATA",	-7);
/** �������륨��ȥ꤬¸�ߤ��ʤ� */
define ("LDAP_ERR_NODATA",	-8);
/** ʣ���Υ���ȥ꤬¸�� */
define ("LDAP_ERR_DUPLICATE",	-9);
/** LDAP������顼 */
define ("LDAP_ERR_DEL",		-10);
/** LDAP°���ͤʤ����顼 */
define ("LDAP_ERR_NOATTR",	-11);
/** ����¾�Υ��顼 */
define ("LDAP_ERR_OTHER",	-127);

/* �������μ��� */
/** LDAP�������μ��� �١���DNľ���γ��ؤΤ߸��� */
define("TYPE_ONELEVEL",		0);
/** LDAP�������μ��� �١���DN�򸡺� */
define("TYPE_ONEENTRY",		1);
/** LDAP�������μ��� �١���DN�۲��򤹤٤Ƥ򸡺� */
define("TYPE_SUBTREE",		2);

/* ���μ��� */
/** LDAP����ȥ���Ͽ���� */
define("TYPE_ADD",		0);
/** LDAP����ȥ��ѹ����� */
define("TYPE_MODIFY",		1);
/** LDAP����ȥ������� */
define("TYPE_DELETE",		2);
/** LDAP°���ɲý��� */
define("TYPE_ADD_ATTRIBUTE",	3);
/** LDAP°���ִ����� */
define("TYPE_REPLACE_ATTRIBUTE",	4);
/** LDAP°������������� */
define("TYPE_MODIFY_DELETE",	5);

/* LDAP������֤��� */
/** LDAP�Υ������������� */
define ("LDAP_SUCCESS",		0);
/** ���ꤷ��DN�Υ���ȥ꤬���Ĥ���ʤ� */
define ("LDAP_NO_SUCH_OBJECT",	32);
/** ���ꤷ��DN�Υ���ȥ꤬���ˤ��� */
define ("LDAP_ALREADY_EXISTS",	68);
/** ���ꤷ��°���ͤ����Ĥ���ʤ� */
define ("LDAP_DECODING_ERROR",	84);
/** ���ꤷ��°�����ͤ�¸�ߤ��ʤ� */
define ("LDAP_NO_SUCH_VALUE",	16);
/** ���ꤷ��°�����ͤ�¸�ߤ��ʤ� */
define ("LDAP_NO_SUCH_ATTR",	17);
/** ���ꤷ��°�����ͤ�¸�ߤ��Ƥ��� */
define ("LDAP_EXISTS_VALUE",	20);
/** binddn,bindpw���ְ�äƤ��� */
define ("LDAP_INVALID_CREDENTIALS",	49);
/** LDAP�����ӥ���� */
define ("LDAP_SERVER_DOWN",	81);

/* LDAP�ѥ��󥳡��� */
/** �ץ����¦�Υ��󥳡��� */
define("PG_ENCODING",		"EUC-JP");
/** LDAP�ѥ��󥳡��� */
define("LDAP_ENCODING",		"UTF-8");

/** LDAP�С������ */
define("LDAP_VERSION",		3);

/* $dg_err_msg�ѥޥ��� */
/** LDAP�����Ф���³�Ǥ��ʤ� */
define("ERRMSG_CONNECT",	"LDAP�����Ф���³�Ǥ��ޤ���Ǥ�����");
/** LDAP�����ФΥХ���ɤ˼��� */
define("ERRMSG_BIND",		"LDAP�����ФΥХ���ɤ˼��Ԥ��ޤ�����");
/** LDAP�ΥС���������꼺�� */
define("ERRMSG_VERSION",	"LDAP�ΥС����������˼��Ԥ��ޤ�����");
/** ������Ϳ����줿�١���DN���ͤ����� */
define("ERRMSG_BASEDN",		"�١���DN���ͤ������Ǥ���");
/** ������Ϳ����줿�ե��륿���ͤ����� */
define("ERRMSG_FILTER",		"�ե��륿���ͤ������Ǥ���");
/** ������Ϳ����줿°���η��������� */
define("ERRMSG_ARG_ATTR",	"°���η����������Ǥ���");
/** ����ȥ�μ����˼��� */
define("ERRMSG_ENTRY",		"LDAP����ȥ�μ����˼��Ԥ��ޤ�����");
/** °���μ����˼��� */
define("ERRMSG_ATTR",		"LDAP°���μ����˼��Ԥ��ޤ�����");
/** ����ȥ꤬����¸�ߤ��Ƥ��� */
define("ERRMSG_EXIST",		"���ꤵ�줿����ȥ�Ϥ��Ǥ�¸�ߤ��Ƥ��ޤ���");
/** ����ȥ꤬���Ĥ���ʤ� */
define("ERRMSG_NOTFOUND",	"���ꤵ�줿����ȥ�ϸ��Ĥ���ޤ���Ǥ�����");
/** °���κ���˼��� */
define("ERRMSG_DELATTR",	"LDAP°���κ���˼��Ԥ��ޤ�����");
/** �����˼��� */
define("ERRMSG_SEARCH",		"LDAP�����ǥ��顼��ȯ�����ޤ�����");
/** DN�μ����˼��� */
define("ERRMSG_GETDN",		"DN�μ����˼��Ԥ��ޤ�����");
/** ���ꤵ�줿°���ͤ�����¸�� */
define("ERRMSG_EXISTS_VALUE",	"���ꤵ�줿°���ͤϤ��Ǥ�¸�ߤ��Ƥ��ޤ���");

/* $dg_log_msg�ѥޥ��� */
/** LDAP�����Ф���³�Ǥ��ʤ� */
define("LOGMSG_CONNECT",	"Cannot connect LDAP server.");
/** LDAP�����ФΥХ���ɤ˼��� */
define("LOGMSG_BIND",		"Cannot bind LDAP server.");
/** LDAP�ΥС���������꼺�� */
define("LOGMSG_VERSION",	"Cannot set LDAP version.");
/** ������Ϳ����줿�١���DN���ͤ����� */
define("LOGMSG_BASEDN",		"Invalid BaseDN.");
/** ������Ϳ����줿�ե��륿���ͤ����� */
define("LOGMSG_FILTER",		"Invalid filter.");
/** ������Ϳ����줿°���η��������� */
define("LOGMSG_ARG_ATTR",	"Invalid attribute form.");
/** ����ȥ�μ����˼��� */
define("LOGMSG_ENTRY",		"Cannot get LDAP entry. ");
/** °���μ����˼��� */
define("LOGMSG_ATTR",		"Cannot get attribute.");
/** ����ȥ꤬����¸�ߤ��Ƥ��� */
define("LOGMSG_EXIST",		"LDAP entry already exists.");
/** ����ȥ꤬���Ĥ���ʤ� */
define("LOGMSG_NOTFOUND",	"Cannot find LDAP entry.");
/** °���κ���˼��� */
define("LOGMSG_DELATTR",	"Cannot delete LDAP attribute.");
/** �����˼��� */
define("LOGMSG_SEARCH",		"Cannot search LDAP entry.");
/** DN�μ����˼��� */
define("LOGMSG_GETDN",		"Cannot get LDAP DN.");
/** ���ꤵ�줿°���ͤ�����¸�� */
define("LOGMSG_EXISTS_VALUE",	"Attribute already exists.");

/**
 * 
 * �����Х�����ǻ��ꤵ�줿LDAP�����Ф��Ф��ƥ��ͥ��ȡ��Х���ɤ�Ԥ���  
 *
 * �ؿ��ƤӽФ�¦��$dg_ldapinfo�Ȥ���̾���ǰʲ��η�����Ϣ�������������뤳�Ȥˤ��LDAP�����Фؤ���³����ǽ�Ǥ���<br><br>
 * $dg_ldapinfo["ldapserver"] : LDAP�����Ф�IP���ɥ쥹<br>
 * $dg_ldapinfo["ldapport"] : LDAP�����ФΥݡ����ֹ�<br>
 * $dg_ldapinfo["ldapbinddn"] : LDAP�����ФΥХ����DN<br>
 * $dg_ldapinfo["ldapbindpw"] : LDAP�����ФΥХ���ɥѥ����<br>
 * $dg_ldapinfo["ldapuserself"] : ��ʬ���ȤؤΥХ����(ͭ��: TRUE ̵��: FALSE)<br>
 * $dg_ldapinfo["ldapuserselfdn"] : ��ʬ���ȤإХ���ɤ�����ΥХ����DN<br>
 * $dg_ldapinfo["ldapuserselfpw"] : ��ʬ���ȤإХ���ɤ�����ΥХ���ɥѥ����<br>
 * $dg_ldapinfo["ldapro"] : read-only�����ФؤΥХ����(ͭ��: TRUE ̵��: FALSE)<br>
 * $dg_ldapinfo["ldapserverro"] : read-only�����Ф�IP���ɥ쥹<br>
 * $dg_ldapinfo["ldapportro"] : read-only�����ФΥݡ����ֹ�<br>
 *
 * @return mixed LDAP���ID���֤��ޤ������顼�ξ���LDAP_ERR_BIND���֤��ޤ���
 *
 */
function DgLDAP_connect_server()
{
    global $dg_err_msg;
    global $dg_log_msg;
    global $dg_ldapinfo;

    /* �ɹ������Ѥξ�� */
    if ($dg_ldapinfo["ldapro"] === TRUE) {
        $lservers = explode(",", $dg_ldapinfo["ldapserverro"]);
        $lports = explode(",", $dg_ldapinfo["ldapportro"]);
        $max = count($lservers);
    } else {
        $lservers = explode(",", $dg_ldapinfo["ldapserver"]);
        $lports = explode(",", $dg_ldapinfo["ldapport"]);
        $max = count($lservers);
    }

    /* �桼�����ȤǥХ���ɤ����� */
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

        /* LDAP�����Ф���³���� */
        $ds = @ldap_connect($lserver, $lport);
        if ($ds === FALSE) {
            $ldap_err .= ERRMSG_CONNECT . "($lserver:$lport)<BR>";
            $ldap_log .= LOGMSG_CONNECT . "($lserver:$lport) ";
            continue;
        }

        /* LDAP�ΥС�������3������ */
        if (!ldap_set_option($ds, LDAP_OPT_PROTOCOL_VERSION, LDAP_VERSION)) {
            $ldap_err .= ERRMSG_VERSION . "($lserver:$lport)<BR>";
            $ldap_log .= LOGMSG_VERSION . "($lserver:$lport) ";
            ldap_unbind($ds);
            continue;
        }

        /* LDAP�ǥ��쥯�ȥ�˥Х���ɤ��� */
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

        /* ��³�Ǥ������ ���顼��ȯ�����Ƥ����� */
        if ($ldap_err != "") {
            $dg_err_msg = preg_replace("/<br>$/i", "", $ldap_err);
            $dg_log_msg = preg_replace("/<br>$/i", "", $ldap_log);
        }
        return $ds;
    }

    $dg_err_msg = $ldap_err . "���ꤵ�줿LDAP�����Ф�������³�Ǥ��ޤ���" .
                  "�Ǥ�����";
    $dg_log_msg = $ldap_log . "Cannot connect all LDAP server.";
    return (LDAP_ERR_BIND);
}

/**
 * 
 * ���ꤵ�줿�����������פη���Ȥ������򤷤���̡������륨��ȥ��ɬ�׾����Ϣ������(&$data)�˳�Ǽ���롣
 *
 * �ؿ��ƤӽФ�¦��$dg_ldapinfo�Ȥ���̾���ǰʲ��η�����Ϣ�������������뤳�Ȥˤ��LDAP�����Фؤ���³����ǽ�Ǥ���<br><br>
 * $dg_ldapinfo["ldapserver"] : LDAP�����Ф�IP���ɥ쥹<br>
 * $dg_ldapinfo["ldapport"] : LDAP�����ФΥݡ����ֹ�<br>
 * $dg_ldapinfo["ldapbinddn"] : LDAP�����ФΥХ����DN<br>
 * $dg_ldapinfo["ldapbindpw"] : LDAP�����ФΥХ���ɥѥ����<br>
 * $dg_ldapinfo["ldapuserself"] : ��ʬ���ȤؤΥХ����(ͭ��: TRUE ̵��: FALSE)<br>
 * $dg_ldapinfo["ldapuserselfdn"] : ��ʬ���ȤإХ���ɤ�����ΥХ����DN<br>
 * $dg_ldapinfo["ldapuserselfpw"] : ��ʬ���ȤإХ���ɤ�����ΥХ���ɥѥ����<br>
 * $dg_ldapinfo["ldapro"] : read-only�����ФؤΥХ����(ͭ��: TRUE ̵��: FALSE)<br>
 * $dg_ldapinfo["ldapserverro"] : read-only�����Ф�IP���ɥ쥹<br>
 * $dg_ldapinfo["ldapportro"] : read-only�����ФΥݡ����ֹ�<br>
 *
 * $attrs�η����ˤϼ���������°��̾���������ꤷ�ޤ���<br>
 * (��) $attrs = array("mail", "uid", "mailDirectory");
 *
 * $type�ǻ��ꤹ�륵�����������פμ���ϰʲ��ˤʤ�ޤ���<br>
 * TYPE_ONELEVEL : ñ�쳬�ؤθ���<br>
 * TYPE_ONEENTRY : 1����ȥ�θ���<br>
 * TYPE_SUBTREE : LDAP�ĥ꡼�򸡺�
 * 
 * $data�ˤϰʲ��η����Ǹ�����̤���Ǽ����ޤ���<br>
 * $data[0][°��̾][0] = °����<br>
 * $data[0][°��̾][1] = °���� �� °����2���ͤ����ä����<br>
 * $data[1][°��̾][0] = °���� �� ���Υ���ȥ�
 *
 * @param string $basedn �����١���DN
 * @param string $filter �����ե��륿 
 * @param array  $attrs  ɬ�פ����ǤΥơ��֥� 
 * @param string $type   �����������פη�
 * @param array  &$data  �����Ϥ����줿ɬ�פ����ǥǡ����γ�Ǽ��
 *
 * @return integer ����˽�λ��������LDAP_OK���Х���ɤ˼��Ԥ�������LDAP_ERR_BIND�������˼��Ԥ�������LDAP_ERR_SEARCH�������ʰ������Ϥ��줿����LDAP_ERR_PARAM������ȥ꤬¸�ߤ��ʤ�����LDAP_ERR_NODATA������¾�Υ��顼�ξ���LDAP_ERR_OTHER���֤��ޤ���
 *
 */
function DgLDAP_get_entry($basedn, $filter, $attrs, $type, &$data)
{
    /* �Х���� */
    $ds = DgLDAP_connect_server();
    if ($ds == LDAP_ERR_BIND) {
        return (LDAP_ERR_BIND);
    }

    $ret = DgLDAP_get_entry_batch($basedn, $ds, $filter, $attrs, $type, $data);

    /* ����Х���� */
    ldap_unbind($ds);

    return $ret;
}

/**
 * 
 * ���ꤵ�줿�����������פη���Ȥ������򤷤���̡������륨��ȥ��ɬ�׾����Ϣ������(&$data)�˳�Ǽ���롣(�ؿ����LDAP�����Ф���³���ʤ�)
 *
 * $attrs�η����ˤϼ���������°��̾���������ꤷ�ޤ���<br>
 * (��) $attrs = array("mail", "uid", "mailDirectory");
 *
 * $type�ǻ��ꤹ�륵�����������פμ���ϰʲ��ˤʤ�ޤ���<br>
 * TYPE_ONELEVEL : ñ�쳬�ؤθ���<br>
 * TYPE_ONEENTRY : 1����ȥ�θ���<br>
 * TYPE_SUBTREE : LDAP�ĥ꡼�򸡺�
 * 
 * $data�ˤϰʲ��η����Ǹ�����̤���Ǽ����ޤ���<br>
 * $data[0][°��̾][0] = °����<br>
 * $data[0][°��̾][1] = °���� �� °����2���ͤ����ä����<br>
 * $data[1][°��̾][0] = °���� �� ���Υ���ȥ�
 *
 * ����$ds�ϴؿ�DgLDAP_connnect_server()����Ѥ��Ƽ������Ƥ���������
 *
 * @param string $basedn �����١���DN
 * @param string $ds     LDAP���ID
 * @param string $filter �����ե��륿 
 * @param array  $attrs  ɬ�פ����ǤΥơ��֥� 
 * @param string $type   �����������פη�(TYPE_ONEENTRY, TYPE_ONELEVEL, TYPE_SUBTREE)
 * @param array  &$data  �����Ϥ����줿ɬ�פ����ǥǡ����γ�Ǽ��
 *
 * @return integer ����˽�λ��������LDAP_OK�������˼��Ԥ�������LDAP_ERR_SEARCH�������ʰ������Ϥ��줿����LDAP_ERR_PARAM������ȥ꤬¸�ߤ��ʤ�����LDAP_ERR_NODATA������¾�Υ��顼�ξ���LDAP_ERR_OTHER���֤��ޤ���
 *
 */
function DgLDAP_get_entry_batch($basedn, $ds, $filter, $attrs, $type, &$data)
{
    global $dg_err_msg;
    global $dg_log_msg;

    $s_attrs = array();

    /* ���������å� */
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

    /* °��̾��ʸ�����Ѵ� */
    for ($i = 0, $max = count($attrs); $i < $max; $i++) {
        $tmp = strtolower($attrs[$i]);

        /* ���ȥ�ӥ塼�Ȥ�DN������Ȥ��ϼ��� */
        if ($tmp == "dn") {
            continue;
        }
        $s_attrs[$i] = $tmp;
    }

    /* ������ */
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

    /* �ǡ�����Ǽ */
    $ret = DgLDAP_set_data($ds, $sr, $attrs, $s_attrs, $type, $data, $basedn);

    return $ret;
}

/**
 *
 * �������Ϥ��줿Ϣ������($data)�˳�Ǽ���줿�ǡ�����LDAP����Ͽ���롣
 *
 * �ؿ��ƤӽФ�¦��$dg_ldapinfo�Ȥ���̾���ǰʲ��η�����Ϣ�������������뤳�Ȥˤ��LDAP�����Фؤ���³����ǽ�Ǥ���<br><br>
 * $dg_ldapinfo["ldapserver"] : LDAP�����Ф�IP���ɥ쥹<br>
 * $dg_ldapinfo["ldapport"] : LDAP�����ФΥݡ����ֹ�<br>
 * $dg_ldapinfo["ldapbinddn"] : LDAP�����ФΥХ����DN<br>
 * $dg_ldapinfo["ldapbindpw"] : LDAP�����ФΥХ���ɥѥ����<br>
 * $dg_ldapinfo["ldapuserself"] : ��ʬ���ȤؤΥХ����(ͭ��: TRUE ̵��: FALSE)<br>
 * $dg_ldapinfo["ldapuserselfdn"] : ��ʬ���ȤإХ���ɤ�����ΥХ����DN<br>
 * $dg_ldapinfo["ldapuserselfpw"] : ��ʬ���ȤإХ���ɤ�����ΥХ���ɥѥ����<br>
 * $dg_ldapinfo["ldapro"] : read-only�����ФؤΥХ����(ͭ��: TRUE ̵��: FALSE)<br>
 * $dg_ldapinfo["ldapserverro"] : read-only�����Ф�IP���ɥ쥹<br>
 * $dg_ldapinfo["ldapportro"] : read-only�����ФΥݡ����ֹ�<br>
 *
 * �������Ϥ�Ϣ������$data�η����ϰʲ��Ȥ��ޤ���<br>
 * $data["�ɲä���°��̾"] = "°����"
 *
 * @param string $dn   ��Ͽ����DN
 * @param array  $data ɬ�פ����ǥǡ����γ�Ǽ��
 *
 * @return integer ����ʾ���LDAP_OK���֤��ޤ����Х���ɤ˼��Ԥ�������LDAP_ERR_BIND��LDAP�ؤ���Ͽ�˼��Ԥ�������LDAP_ERR_ADD������ȥ꤬����¸�ߤ�������LDAP_ERR_DUPLICATE���֤��ޤ���
 *
 */
function DgLDAP_add_entry($dn, $data)
{

    $ret = DgLDAP_entry_operate($dn, $data, TYPE_ADD);
    return $ret;

}

/**
 * 
 * �������Ϥ��줿Ϣ������($data)�˳�Ǽ���줿�ǡ�����LDAP����Ͽ���롣(�ؿ����LDAP�����Ф���³���ʤ�)
 *
 * �������Ϥ�Ϣ������$data�η����ϰʲ��Ȥ��ޤ���<br>
 * $data["�ɲä���°��̾"] = "°����"
 *
 * ����$ds�ϴؿ�DgLDAP_connnect_server()����Ѥ��Ƽ������Ƥ���������
 *
 * @param string $dn   ��Ͽ����DN
 * @param string $ds   LDAP���ID
 * @param array  $data ɬ�פ����ǥǡ����γ�Ǽ��
 *
 * @return integer ����ʾ���LDAP_OK���֤��ޤ���LDAP�ؤ���Ͽ�˼��Ԥ�������LDAP_ERR_ADD������ȥ꤬����¸�ߤ�������LDAP_ERR_DUPLICATE���֤��ޤ���
 *
 */
function DgLDAP_add_entry_batch($dn, $ds, $data)
{

    $ret = DgLDAP_entry_operate_batch($dn, $ds, $data, TYPE_ADD);
    return $ret;

}

/**
 * 
 * LDAP����Ͽ���줿�ǡ�����Ϣ������($data)�˳�Ǽ���줿�ǡ������ѹ����롣
 *
 * �ؿ��ƤӽФ�¦��$dg_ldapinfo�Ȥ���̾���ǰʲ��η�����Ϣ�������������뤳�Ȥˤ��LDAP�����Фؤ���³����ǽ�Ǥ���<br><br>
 * $dg_ldapinfo["ldapserver"] : LDAP�����Ф�IP���ɥ쥹<br>
 * $dg_ldapinfo["ldapport"] : LDAP�����ФΥݡ����ֹ�<br>
 * $dg_ldapinfo["ldapbinddn"] : LDAP�����ФΥХ����DN<br>
 * $dg_ldapinfo["ldapbindpw"] : LDAP�����ФΥХ���ɥѥ����<br>
 * $dg_ldapinfo["ldapuserself"] : ��ʬ���ȤؤΥХ����(ͭ��: TRUE ̵��: FALSE)<br>
 * $dg_ldapinfo["ldapuserselfdn"] : ��ʬ���ȤإХ���ɤ�����ΥХ����DN<br>
 * $dg_ldapinfo["ldapuserselfpw"] : ��ʬ���ȤإХ���ɤ�����ΥХ���ɥѥ����<br>
 * $dg_ldapinfo["ldapro"] : read-only�����ФؤΥХ����(ͭ��: TRUE ̵��: FALSE)<br>
 * $dg_ldapinfo["ldapserverro"] : read-only�����Ф�IP���ɥ쥹<br>
 * $dg_ldapinfo["ldapportro"] : read-only�����ФΥݡ����ֹ�<br>
 *
 * �������Ϥ�Ϣ������$data�η����ϰʲ��Ȥ��ޤ���<br>
 * $data["�ɲä���°��̾"] = "°����"
 *
 * @param string $dn   �ѹ�����DN
 * @param array  $data ɬ�פ����ǥǡ����γ�Ǽ��
 *
 * @return integer ����ʾ���LDAP_OK���֤��ޤ����Х���ɤ˼��Ԥ�������LDAP_ERR_BIND��LDAP�ξ����ѹ��˼��Ԥ�������LDAP_ERR_MOD���ѹ����륨��ȥ꤬¸�ߤ��ʤ�����LDAP_ERR_NODATA���֤��ޤ���
 *
 */
function DgLDAP_mod_entry($dn, $data)
{

    $ret = DgLDAP_entry_operate($dn, $data, TYPE_MODIFY);
    return $ret;

}

/**
 * 
 * LDAP����Ͽ���줿�ǡ�����Ϣ������($data)�˳�Ǽ���줿�ǡ������ѹ����롣(�ؿ����LDAP�����Ф���³���ʤ�)
 *
 * �������Ϥ�Ϣ������$data�η����ϰʲ��Ȥ��ޤ���<br>
 * $data["�ɲä���°��̾"] = "°����"
 *
 * ����$ds�ϴؿ�DgLDAP_connnect_server()����Ѥ��Ƽ������Ƥ���������
 *
 * @param string $dn   �ѹ�����DN
 * @param string $ds   LDAP���ID
 * @param array  $data ɬ�פ����ǥǡ����γ�Ǽ��
 *
 * @return integer ����ʾ���LDAP_OK���֤��ޤ���LDAP�ξ����ѹ��˼��Ԥ�������LDAP_ERR_MOD���ѹ����륨��ȥ꤬¸�ߤ��ʤ�����LDAP_ERR_NODATA���֤��ޤ���
 *
 */
function DgLDAP_mod_entry_batch($dn, $ds, $data)
{

    $ret = DgLDAP_entry_operate_batch($dn, $ds, $data, TYPE_MODIFY);
    return $ret;

}

/**
 * 
 * LDAP����Ͽ���줿�ǡ����򡢾õ�롣
 *
 * �ؿ��ƤӽФ�¦��$dg_ldapinfo�Ȥ���̾���ǰʲ��η�����Ϣ�������������뤳�Ȥˤ��LDAP�����Фؤ���³����ǽ�Ǥ���<br><br>
 * $dg_ldapinfo["ldapserver"] : LDAP�����Ф�IP���ɥ쥹<br>
 * $dg_ldapinfo["ldapport"] : LDAP�����ФΥݡ����ֹ�<br>
 * $dg_ldapinfo["ldapbinddn"] : LDAP�����ФΥХ����DN<br>
 * $dg_ldapinfo["ldapbindpw"] : LDAP�����ФΥХ���ɥѥ����<br>
 * $dg_ldapinfo["ldapuserself"] : ��ʬ���ȤؤΥХ����(ͭ��: TRUE ̵��: FALSE)<br>
 * $dg_ldapinfo["ldapuserselfdn"] : ��ʬ���ȤإХ���ɤ�����ΥХ����DN<br>
 * $dg_ldapinfo["ldapuserselfpw"] : ��ʬ���ȤإХ���ɤ�����ΥХ���ɥѥ����<br>
 * $dg_ldapinfo["ldapro"] : read-only�����ФؤΥХ����(ͭ��: TRUE ̵��: FALSE)<br>
 * $dg_ldapinfo["ldapserverro"] : read-only�����Ф�IP���ɥ쥹<br>
 * $dg_ldapinfo["ldapportro"] : read-only�����ФΥݡ����ֹ�<br>
 *
 * @param string $basedn �õ��DN
 *
 * @return integer ����ʾ���LDAP_OK���֤��ޤ����Х���ɤ˼��Ԥ�������LDAP_ERR_BIND��LDAP�Υ���ȥ�κ���˼��Ԥ�������LDAP_ERR_DEL���ѹ����륨��ȥ꤬¸�ߤ��ʤ�����LDAP_ERR_NODATA���֤��ޤ���
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
 * LDAP����Ͽ���줿�ǡ����򡢾õ�롣(�ؿ����LDAP�����Ф���³���ʤ�)
 *
 * ����$ds�ϴؿ�DgLDAP_connnect_server()����Ѥ��Ƽ������Ƥ���������
 *
 * @param string $basedn �õ��DN
 * @param string $ds LDAP���ID
 *
 * @return integer ����ʾ���LDAP_OK���֤��ޤ���LDAP�Υ���ȥ�κ���˼��Ԥ�������LDAP_ERR_DEL���ѹ����륨��ȥ꤬¸�ߤ��ʤ�����LDAP_ERR_NODATA���֤��ޤ���
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
 * LDAP����Ͽ���줿����ȥ��°�����ɲä���
 *
 * �ؿ��ƤӽФ�¦��$dg_ldapinfo�Ȥ���̾���ǰʲ��η�����Ϣ�������������뤳�Ȥˤ��LDAP�����Фؤ���³����ǽ�Ǥ���<br><br>
 * $dg_ldapinfo["ldapserver"] : LDAP�����Ф�IP���ɥ쥹<br>
 * $dg_ldapinfo["ldapport"] : LDAP�����ФΥݡ����ֹ�<br>
 * $dg_ldapinfo["ldapbinddn"] : LDAP�����ФΥХ����DN<br>
 * $dg_ldapinfo["ldapbindpw"] : LDAP�����ФΥХ���ɥѥ����<br>
 * $dg_ldapinfo["ldapuserself"] : ��ʬ���ȤؤΥХ����(ͭ��: TRUE ̵��: FALSE)<br>
 * $dg_ldapinfo["ldapuserselfdn"] : ��ʬ���ȤإХ���ɤ�����ΥХ����DN<br>
 * $dg_ldapinfo["ldapuserselfpw"] : ��ʬ���ȤإХ���ɤ�����ΥХ���ɥѥ����<br>
 * $dg_ldapinfo["ldapro"] : read-only�����ФؤΥХ����(ͭ��: TRUE ̵��: FALSE)<br>
 * $dg_ldapinfo["ldapserverro"] : read-only�����Ф�IP���ɥ쥹<br>
 * $dg_ldapinfo["ldapportro"] : read-only�����ФΥݡ����ֹ�
 *
 * �������Ϥ�Ϣ������$data�η����ϰʲ��Ȥ��ޤ���<br>
 * $data["�ɲä���°��̾"] = "°����"
 *
 * ���δؿ��ϴ���¸�ߤ��륨��ȥ��°�����ɲä��ޤ�������ȥ���ɲä������DgLDAP_add_entry()����Ѥ��Ƥ���������
 *
 * @param string $basedn °�����ɲä���DN
 * @param array  $data   ɬ�פ����ǥǡ����γ�Ǽ��
 *
 * @return integer ����ʾ���LDAP_OK���֤��ޤ����Х���ɤ˼��Ԥ�������LDAP_ERR_BIND��LDAP�ξ����ɲä˼��Ԥ�������LDAP_ERR_ADD������ȥ꤬¸�ߤ��ʤ�����LDAP_ERR_NODATA��°���ͤ�����¸�ߤ������LDAP_ERR_DUPLICATE���֤��ޤ���
 *
 */
function DgLDAP_add_attribute($basedn, $data)
{

    $ret = DgLDAP_entry_operate($basedn, $data, TYPE_ADD_ATTRIBUTE);
    return $ret;

}

/**
 *
 * LDAP����Ͽ���줿����ȥ��°�����ɲä���(�ؿ����LDAP�����Ф���³���ʤ�)
 *
 * �������Ϥ�Ϣ������$data�η����ϰʲ��Ȥ��ޤ���<br>
 * $data["�ɲä���°��̾"] = "°����"
 *
 * ���δؿ��ϴ���¸�ߤ��륨��ȥ��°�����ɲä��ޤ�������ȥ���ɲä������DgLDAP_add_entry_batch()����Ѥ��Ƥ���������
 *
 * ����$ds�ϴؿ�DgLDAP_connnect_server()����Ѥ��Ƽ������Ƥ���������
 *
 * @param string $basedn °�����ɲä���DN
 * @param string $ds     LDAP���ID
 * @param array  $data   ɬ�פ����ǥǡ����γ�Ǽ��
 *
 * @return integer ����ʾ���LDAP_OK���֤��ޤ���LDAP�ξ����ɲä˼��Ԥ�������LDAP_ERR_ADD������ȥ꤬¸�ߤ��ʤ�����LDAP_ERR_NODATA��°���ͤ�����¸�ߤ������LDAP_ERR_DUPLICATE���֤��ޤ���
 *
 */
function DgLDAP_add_attribute_batch($basedn, $ds, $data)
{

    $ret = DgLDAP_entry_operate_batch($basedn, $ds, $data, TYPE_ADD_ATTRIBUTE);
    return $ret;

}

/**
 *
 * LDAP����Ͽ���줿1�ĤΥǡ�����°����������
 *
 * �ؿ��ƤӽФ�¦��$dg_ldapinfo�Ȥ���̾���ǰʲ��η�����Ϣ�������������뤳�Ȥˤ��LDAP�����Фؤ���³����ǽ�Ǥ���<br><br>
 * $dg_ldapinfo["ldapserver"] : LDAP�����Ф�IP���ɥ쥹<br>
 * $dg_ldapinfo["ldapport"] : LDAP�����ФΥݡ����ֹ�<br>
 * $dg_ldapinfo["ldapbinddn"] : LDAP�����ФΥХ����DN<br>
 * $dg_ldapinfo["ldapbindpw"] : LDAP�����ФΥХ���ɥѥ����<br>
 * $dg_ldapinfo["ldapuserself"] : ��ʬ���ȤؤΥХ����(ͭ��: TRUE ̵��: FALSE)<br>
 * $dg_ldapinfo["ldapuserselfdn"] : ��ʬ���ȤإХ���ɤ�����ΥХ����DN<br>
 * $dg_ldapinfo["ldapuserselfpw"] : ��ʬ���ȤإХ���ɤ�����ΥХ���ɥѥ����<br>
 * $dg_ldapinfo["ldapro"] : read-only�����ФؤΥХ����(ͭ��: TRUE ̵��: FALSE)<br>
 * $dg_ldapinfo["ldapserverro"] : read-only�����Ф�IP���ɥ쥹<br>
 * $dg_ldapinfo["ldapportro"] : read-only�����ФΥݡ����ֹ�<br>
 *
 * �������Ϥ�Ϣ������$attrs�η����ϰʲ��Ȥ��ޤ���<br>
 * $attrs["�������°��̾"] = "�������°����"
 * 
 * @param string $dn    ����оݤ�°�������DN
 * @param array  $attrs �������°����̾��������
 * @return integer ����ʾ���LDAP_OK���֤��ޤ����Х���ɤ˼��Ԥ�������LDAP_ERR_BIND�������ʰ������Ϥ��줿����LDAP_ERR_PARAM��°���κ���˼��Ԥ�������LDAP_ERR_DEL������ȥ꤬¸�ߤ��ʤ��ä�����LDAP_ERR_NODATA��°���ޤ���°���ͤ��ʤ��ä�����LDAP_ERR_NOATTR���֤��ޤ���
 *
 */
function DgLDAP_del_attribute($dn, $attrs)
{

    /* �Х���� */
    $ds = DgLDAP_connect_server();
    if ($ds == LDAP_ERR_BIND) {
        return (LDAP_ERR_BIND);
    }

    /* °���κ�� */
    $ret = DgLDAP_del_attribute_batch($ds, $dn, $attrs);

    /* ����Х���� */
    ldap_unbind($ds);

    return $ret;
}

/**
 *
 * LDAP����Ͽ���줿1�ĤΥǡ�����°����������(�ؿ����LDAP�����Ф���³���ʤ�)
 *
 * �������Ϥ�Ϣ������$attrs�η����ϰʲ��Ȥ��ޤ���<br>
 * $attrs["�������°��̾"] = "�������°����"
 * 
 * ����$ds�ϴؿ�DgLDAP_connnect_server()����Ѥ��Ƽ������Ƥ���������
 *
 * @param string $ds    LDAP���ID
 * @param string $dn    ����оݤ�°�������DN
 * @param array  $attrs �������°����̾��������
 *
 * @return integer ����ʾ���LDAP_OK���֤��ޤ��������ʰ������Ϥ��줿����LDAP_ERR_PARAM��°���κ���˼��Ԥ�������LDAP_ERR_DEL������ȥ꤬¸�ߤ��ʤ��ä�����LDAP_ERR_NODATA��°���ޤ���°���ͤ��ʤ��ä�����LDAP_ERR_NOATTR���֤��ޤ���
 *
 */
function DgLDAP_del_attribute_batch($ds, $dn, $attrs)
{
    global $dg_err_msg;
    global $dg_log_msg;

    /* ���������å� */
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
 * ���ꤵ�줿�ǡ������($type)��������ɲá��ѹ���������ִ��Ȥ��ä�������Ԥ�
 *
 * �ؿ��ƤӽФ�¦��$dg_ldapinfo�Ȥ���̾���ǰʲ��η�����Ϣ�������������뤳�Ȥˤ��LDAP�����Фؤ���³����ǽ�Ǥ���<br><br>
 * $dg_ldapinfo["ldapserver"] : LDAP�����Ф�IP���ɥ쥹<br>
 * $dg_ldapinfo["ldapport"] : LDAP�����ФΥݡ����ֹ�<br>
 * $dg_ldapinfo["ldapbinddn"] : LDAP�����ФΥХ����DN<br>
 * $dg_ldapinfo["ldapbindpw"] : LDAP�����ФΥХ���ɥѥ����<br>
 * $dg_ldapinfo["ldapuserself"] : ��ʬ���ȤؤΥХ����(ͭ��: TRUE ̵��: FALSE)<br>
 * $dg_ldapinfo["ldapuserselfdn"] : ��ʬ���ȤإХ���ɤ�����ΥХ����DN<br>
 * $dg_ldapinfo["ldapuserselfpw"] : ��ʬ���ȤإХ���ɤ�����ΥХ���ɥѥ����<br>
 * $dg_ldapinfo["ldapro"] : read-only�����ФؤΥХ����(ͭ��: TRUE ̵��: FALSE)<br>
 * $dg_ldapinfo["ldapserverro"] : read-only�����Ф�IP���ɥ쥹<br>
 * $dg_ldapinfo["ldapportro"] : read-only�����ФΥݡ����ֹ�
 *
 * $type�ˤϰʲ����ͤ����ꤷ�Ƥ���������<br>
 * ����ȥ���ɲ� : TYPE_ADD<br>
 * ����ȥ���ѹ� : TYPE_MODIFY<br>
 * ����ȥ�κ�� : TYPE_DELETE<br>
 * °�����ɲ� : TYPE_ADD_ATTRIBUTE<br>
 * °�����ִ� : TYPE_REPLACE_ATTRIBUTE<br>
 * ����ȥ���ѹ� : TYPE_MODIFY_DELETE
 *
 * @param string $dn   ��Ͽor�ѹ�or���DN
 * @param array  $data ��Ͽor�ѹ�����ǡ�����array
 * @param string $type ���ꤵ�줿�ǡ������
 *
 * @return integer ����ʾ���LDAP_OK���֤��ޤ���LDAP�ؤΥХ���ɤ˼��Ԥ�������LDAP_ERR_BIND��LDAP�ؤ���Ͽ�˼��Ԥ�������LDAP_ERR_ADD��LDAP�ξ����ѹ��˼��Ԥ�������LDAP_ERR_MOD������ȥ꤬¸�ߤ��ʤ�����LDAP_ERR_NODATA������ȥ꤬¸�ߤ������LDAP_ERR_DUPLICATE��LDAP�Υ���ȥ�κ���˼��Ԥ�������LDAP_ERR_DEL���֤��ޤ���
 *
 */
function DgLDAP_entry_operate($dn, $data, $type)
{

    /* �Х���� */
    $ds = DgLDAP_connect_server();
    if ($ds == LDAP_ERR_BIND) {
        return (LDAP_ERR_BIND);
    }

    /* �ǡ������ */
    $ret = DgLDAP_entry_operate_batch($dn, $ds, $data, $type);

    /* ����Х���� */
    ldap_unbind($ds);

    return $ret;
}

/**
 * 
 * ���ꤵ�줿�ǡ������($type)��������ɲá��ѹ���������ִ��Ȥ��ä�������Ԥ�(�ؿ����LDAP�����Ф���³���ʤ�)
 *
 * $type�ˤϰʲ����ͤ����ꤷ�Ƥ���������<br>
 * ����ȥ���ɲ� : TYPE_ADD<br>
 * ����ȥ���ѹ� : TYPE_MODIFY<br>
 * ����ȥ�κ�� : TYPE_DELETE<br>
 * °�����ɲ� : TYPE_ADD_ATTRIBUTE<br>
 * °�����ִ� : TYPE_REPLACE_ATTRIBUTE<br>
 * ����ȥ���ѹ� : TYPE_MODIFY_DELETE
 *
 * @param string $dn   ��Ͽor�ѹ�or���DN
 * @param string $ds   LDAP���ID
 * @param array  $data ��Ͽor�ѹ�����ǡ�����array
 * @param string $type ���ꤵ�줿�ǡ������	
 *
 * @return integer ����ʾ���LDAP_OK���֤��ޤ���LDAP�ؤ���Ͽ�˼��Ԥ�������LDAP_ERR_ADD��LDAP�ξ����ѹ��˼��Ԥ�������LDAP_ERR_MOD������ȥ꤬¸�ߤ��ʤ�����LDAP_ERR_NODATA������ȥ꤬¸�ߤ������LDAP_ERR_DUPLICATE��LDAP�Υ���ȥ�κ���˼��Ԥ�������LDAP_ERR_DEL���֤��ޤ���
 *
 */
function DgLDAP_entry_operate_batch($dn, $ds, $data, $type)
{
    global $dg_err_msg;
    global $dg_log_msg;

    /* ���������å� */
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

    /* ����ȥ���ɲá��ѹ���������ִ� */
    if ($type == TYPE_ADD) {
        $err_str = "����ȥ���ɲ�";
        $log_str = "add entry";
        $r = @ldap_add($ds, $conv_dn, $data);
    } elseif ($type == TYPE_MODIFY) {
        $err_str = "����ȥ���ѹ�";
        $log_str = "modify entry";
        $r = @ldap_modify($ds, $conv_dn, $data);
    } elseif ($type == TYPE_DELETE) {
        $err_str = "����ȥ�κ��";
        $log_str = "delete entry";
        $r = @ldap_delete($ds, $conv_dn);
    } elseif ($type == TYPE_ADD_ATTRIBUTE) {
        $err_str = "°�����ɲ�";
        $log_str = "add attribute";
        $r = @ldap_mod_add($ds, $conv_dn, $data);
    } elseif ($type == TYPE_REPLACE_ATTRIBUTE) {
        $err_str = "°�����ɲ�";
        $log_str = "add attribute";
        $r = @ldap_mod_add($ds, $conv_dn, array($data[0] => $data[2]));
    } elseif ($type == TYPE_MODIFY_DELETE) {
        $err_str = "����ȥ���ѹ�";
        $log_str = "modify entry";
        $r = @ldap_modify($ds, $conv_dn, $data[0]);
    }

    if ($r === FALSE) {
        $errno = ldap_errno($ds);
        /* ���Ǥ�¸�ߤ��Ƥ��� */
	if ($errno == LDAP_ALREADY_EXISTS) {
            $dg_err_msg = ERRMSG_EXIST . "(dn:$dn)";
            $dg_log_msg = LOGMSG_EXIST . "(dn:$dn)";
            return (LDAP_ERR_DUPLICATE);
        }
        /* ���Ĥ���ʤ� */
	if ($errno == LDAP_NO_SUCH_OBJECT) {
            $dg_err_msg = ERRMSG_NOTFOUND . "(dn:$dn)";
            $dg_log_msg = LOGMSG_NOTFOUND . "(dn:$dn)";
            return (LDAP_ERR_NODATA);
        }
        /* ���Ǥ�¸�ߤ��Ƥ���(°����) */
	if ($errno == LDAP_EXISTS_VALUE) {
            $dg_err_msg = ERRMSG_EXISTS_VALUE . "(dn:$dn)";
            $dg_log_msg = LOGMSG_EXISTS_VALUE . "(dn:$dn)";
            return (LDAP_ERR_DUPLICATE);
        }

        if ($errno == LDAP_SUCCESS) {
            $dg_err_msg = $err_str . "�˼��Ԥ��ޤ�����(dn:" . $dn . ")";
            $dg_log_msg = "Cannot " . $log_str . ".(dn:" . $dn . ")";
        } else {
            $error = ldap_error($ds);
            $dg_err_msg = $err_str . "�˼��Ԥ��ޤ�����(" . $error . " dn:" .
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
    /* �ִ��ξ��Ϻ�� */
    if ($type == TYPE_REPLACE_ATTRIBUTE) {
        return DgLDAP_del_attribute_batch($ds, $dn,
                                          array($data[0] => $data[1]));
    /* ��������ξ��Ϻ�� */
    } else if ($type == TYPE_MODIFY_DELETE) {
        return DgLDAP_del_attribute_batch($ds, $dn, $data[1]);
    }

    return (LDAP_OK);
}

/**
 * 
 * $type�ǻ��ꤵ�줿�������������פǥ������򤹤롣
 *
 * $type�ǻ��ꤹ�륵�����������פμ���ϰʲ��ˤʤ�ޤ���<br>
 * TYPE_ONELEVEL : ñ�쳬�ؤθ���<br>
 * TYPE_ONEENTRY : 1����ȥ�θ���<br>
 * TYPE_SUBTREE : LDAP�ĥ꡼�򸡺�
 * 
 * @param string $ds     LDAP���ID	
 * @param string $basedn ��������ȥ��DN
 * @param array  $attrs  ɬ�פ����ǤΥơ��֥� 
 * @param string $filter �����ե��륿	
 * @param string $type   �������������פη�	
 *
 * @return string ���������ID���֤��ޤ���
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
 * ����������̤���������ɬ�����Ǥ�Ϣ������(&$data)�˳�Ǽ���롣
 *
 * @param string $ds      LDAP���ID	
 * @param string $sr      ���������ID	
 * @param array  $attrs   ɬ�פ����ǤΥơ��֥� 
 * @param array  $s_attrs ��ʸ���Υ����ơ��֥�
 * @param string $type    �������������פη�	
 * @param array  &$data   ɬ�פ����ǥǡ����γ�Ǽ��
 * @param string $basedn  �١���DN 
 *
 * @return integer ����ʾ���LDAP_OK���֤��ޤ����������顼�ξ���LDAP_ERR_SEARCH�򡢥���ȥ꤬¸�ߤ��ʤ�����LDAP_ERR_NODATA�򡢤���¾�Υ��顼�ξ���LDAP_ERR_OTHER���֤��ޤ���
 *
 */
function DgLDAP_set_data($ds, $sr, $attrs, $s_attrs, $type, &$data, $basedn) 
{
    global $dg_err_msg;
    global $dg_log_msg;

    /* ����ȥ��������� */
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

    /* �ǽ�η�̥���ȥ������ */
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

        /* ����ȥ������� */
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
            /* °������ */
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
        /* ���η�̥���ȥ������ */
        $entry_id = @ldap_next_entry($ds, $entry_id);
    }
    return (LDAP_OK);
}

/**
 * 
 * �ե��륿�Υ���������
 *
 * �ե��륿�˻��ꤵ���ʸ����(*, (, ), \\)�򥨥������פ��ޤ���
 *
 * @param string $str ���������פ���ʸ����
 *
 * @return string ���������׸��ʸ����
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
