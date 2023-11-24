<?php
/**
 * ���å����饤�֥��
 */

/** hidden���Ϥ���륭��ʸ�������Ƭ���ղä���ʸ���� */
define("DG_FRONT_STR", "dg_");

/**
 * 
 * mcrypt�ǰŹ沽�������å���󥭡����������
 *
 * ���Ѥ���ˤϥץ����¦��Dg_Common.php��include����ɬ�פ�����ޤ���
 *
 * @param string $akeydir etc/admin.key�����֤���Ƥ���ǥ��쥯�ȥ�(�ǥե����:��)
 * @param array   $keylist  �Ź沽����ʸ������Ǽ��������
 * @param string  $delim    ���ڤ�ʸ��(�ǥե����:�����(:))
 *
 * @return mixed �����������å���󥭡����֤��ޤ��������˼��Ԥ�������FALSE���֤��ޤ���
 */
function DgSession_make_key($akeydir, $keylist, $delim = ":")
{

    /* �Ź沽��ʸ�������� */
    $input .= implode($delim, $keylist);

    /* �Ź沽 */
    $sess_key = DgSession_encode_str($input, 1, $akeydir);
    if ($sess_key === FALSE) {
        return FALSE;
    }

    return $sess_key;
}

/**
 *
 * ���å���󥭡������椷�����ꤵ�줿�ǥ�ߥ��Ƕ��ڤä��ǡ�����������֤�
 *
 * ���Ѥ���ˤϥץ����¦��Dg_Common.php��include����ɬ�פ�����ޤ���
 *
 * @param string $akeydir   etc/admin.key�����֤���Ƥ���ǥ��쥯�ȥ�(�ǥե����:��)
 * @param string $sess_key  �Ź沽���줿���å���󥭡�
 * @param string $delim     ���ڤ�ʸ��(�ǥե����:�����(:))
 *
 * @return mixed �����������ϻ��ꤵ�줿�ǥ�ߥ��Ƕ��ڤä��ǡ�����������֤������顼�ξ���FALSE���֤��ޤ���
 *
 */
function DgSession_decode_key($akeydir, $sess_key, $delim = ":") 
{
    global $dg_err_msg;
    global $dg_log_msg;

    /* ʣ�粽 */
    $dec_key = DgSession_decode_str($sess_key, 1, $akeydir);
    if ($dec_key === FALSE) {
        return FALSE;
    }

    /* �ǥ�ߥ��Ƕ��ڤ� */
    $dec_data = explode($delim, $dec_key);

    return $dec_data;

}

/**
 *
 * �Ź沽�����ե�������ɤ߹��ࡣ
 *
 * ���Ѥ���ˤϥץ����¦��Dg_Common.php��include����ɬ�פ�����ޤ���
 *
 * @param string $akeyfile  �Ź沽�����ե�����Υѥ� 
 *
 * @return mixed ������ɤ߹��᤿���ϰŹ沽�����ե������1�Ԥ򡢥��顼�ξ���FALSE���֤��ޤ���
 *
 */
function DgSession_read_admin_key_file($akeyfile)
{
    global $dg_err_msg;
    global $dg_log_msg;

    /* admin�����Υ����å� */
    if (DgCommon_is_readable_file($akeyfile) === FALSE) {
        return FALSE;
    }

    /* �Ź沽�����ե�����Υ����ץ� */
    $tmp = file($akeyfile);

    /* �����å� */
    if ($tmp === FALSE) {
        $dg_err_msg = "�Ź沽�����ե����뤬�����ץ�Ǥ��ޤ���(" .
                      $akeyfile . ")";
        $dg_log_msg = "Cannot open key file.(" .  $akeyfile . ")";
        return FALSE;
    }

    /* �ե���������ƥ����å� */
    if (is_null($tmp[0]) === TRUE) {
        $dg_err_msg = "�Ź沽�����ե����뤬����������ޤ���(" .
                      $akeyfile . ")";
        $dg_log_msg = "Key file is invalid.(" .  $akeyfile . ")";
        return FALSE;
    }

    /* ��ü�β��Ԥ������Ƴ�Ǽ */
    $akey = rtrim($tmp[0]);

    return $akey;
}

/**
 *
 * �����ǻ��ꤵ�줿ʸ�����Ź沽���롣
 *
 * ����$level�ϰʲ���ư���Ԥ��ޤ���<br>
 * $level = 1 : mcrypt�ǰŹ沽<br>
 * $level = 2 : base64��str_rot13�ǰŹ沽<br>
 * $level = 3 : HTML�����Υ���������
 * 
 * $level=1�ξ�硢���Ѥ���ˤϥץ����¦��Dg_Common.php��include����ɬ�פ�����ޤ���
 *
 * @param string  $str     �Ź沽����ʸ����
 * @param integer $level   ���󥳡��ɤ����٥�(1 or 2 or 3) (�ǥե����:3)
 * @param string  $akeydir etc/admin.key�����֤���Ƥ���ǥ��쥯�ȥ�(�ǥե����:��)
 *
 * @return string ������Ź沽����ʸ������֤��ޤ������顼�ξ���FALSE���֤��ޤ���
 *
 */
function DgSession_encode_str($str, $level = 3, $akeydir = "")
{
    global $dg_err_msg;
    global $dg_log_msg;

    /* ���������å� */
    if ($level != 1 && $level != 2 && $level != 3) {
        $dg_err_msg = "�Ź沽��٥�λ��꤬�ְ�äƤ��ޤ���(" . $level . ")";
        $dg_log_msg = "Invalid encoded level.(" . $level . ")";
    }

    if ($level == 1) {

        /* �Ź沽�����ե������ɹ��� */
        $akeyfile = $akeydir . "/etc/admin.key";
        $akey = DgSession_read_admin_key_file($akeyfile);
        if ($akey === FALSE) {
            return FALSE;
        }

        /* �Ź沽 */
        srand();
        $td = mcrypt_module_open(MCRYPT_3DES, "", MCRYPT_MODE_CBC, "");
        $iv = mcrypt_create_iv(mcrypt_enc_get_iv_size($td), MCRYPT_RAND);
        $encrypted_data = mcrypt_encrypt(MCRYPT_3DES, $akey, $str,
                                         MCRYPT_MODE_CBC, $iv);

        /* �����Ϥ��ѥ��󥳡��� */
        $enc_str = base64_encode($iv . $encrypted_data);

    } elseif ($level == 2) {

        /* Base64���󥳡��� */
        $enc_str = base64_encode($str);

        /* str_rot13 */
        $enc_str = str_rot13($enc_str);

    } elseif ($level == 3) {

        /* htmlspecialchars�ǥ��������� */
        $enc_str = htmlspecialchars($str);

    }

    return $enc_str;
}

/**
 *
 * �����ǻ��ꤵ�줿ʸ�����ʣ�粽���롣
 *
 * ����$level�ϰʲ���ư���Ԥ��ޤ���<br>
 * $level = 1 : mcrypt�ǰŹ沽����ʸ�����ʣ�粽<br>
 * $level = 2 : base64��str_rot13��ʣ�粽
 * 
 * $level = 1�ξ�硢���Ѥ���ˤϥץ����¦��Dg_Common.php��include����ɬ�פ�����ޤ���
 *
 * @param string  $str     �Ź沽����ʸ����
 * @param integer $level   �ǥ����ɤ����٥�(1 or 2)
 * @param string  $akeydir etc/admin.key�����֤���Ƥ���ǥ��쥯�ȥ�(�ǥե����:��)
 *
 * @return string ������ʣ�粽����ʸ������֤��ޤ������顼�ξ���FALSE���֤��ޤ���
 *
 */
function DgSession_decode_str($str, $level, $akeydir = "")
{
    global $dg_err_msg;
    global $dg_log_msg;

    /* ���������å� */
    if ($level != 1 && $level != 2) {
        $dg_err_msg = "�Ź沽��٥�λ��꤬�ְ�äƤ��ޤ���(" . $level . ")";
        $dg_log_msg = "Invalid encoded level.(" . $level . ")";
    }

    if ($level == 1) {

        /* �Ź沽�����ե������ɹ��� */
        $akeyfile = $akeydir . "/etc/admin.key";
        $akey = DgSession_read_admin_key_file($akeyfile);
        if ($akey === FALSE) {
            return FALSE;
        }

        /* ʣ�粽���� */
        $td = mcrypt_module_open(MCRYPT_3DES, "", MCRYPT_MODE_CBC, "");
        $ivlen = mcrypt_enc_get_iv_size($td);

        /* ʸ������Ѵ� */
        $d64 = base64_decode($str);

        /* ʸ�����ʬ�� */
        $iv = substr($d64, 0, $ivlen);
        $decode = substr($d64, $ivlen);

        /* ʣ�粽 */
        $tmp = mcrypt_decrypt(MCRYPT_3DES, $akey, $decode, MCRYPT_MODE_CBC,
                              $iv);
        mcrypt_module_close($td);

        /* ���ԡ� */
        $dec_str = rtrim($tmp);

    } elseif ($level == 2) {

        /* str_rot13 */
        $dec_str = str_rot13($str);

        /* Base64�ǥ����� */
        $dec_str = base64_decode($dec_str);

    }

    return $dec_str;
}

/**
 *
 * hidden������form��HTML��������롣
 *
 * ����$level�ϰʲ���ư���Ԥ��ޤ���<br>
 * $level = 1 : mcrypt�ǰŹ沽<br>
 * $level = 2 : base64��str_rot13�ǰŹ沽<br>
 * $level = 3 : HTML�����Υ���������
 *
 * $level = 1�ξ�硢���Ѥ���ˤϥץ����¦��Dg_Common.php��include����ɬ�פ�����ޤ���
 *
 * @param array   $data    form�ǡ�������Ǽ���줿Ϣ������
 * @param integer $level   ���󥳡��ɤ����٥�(1 or 2)
 * @param string  $akeydir etc/admin.key�����֤���Ƥ���ǥ��쥯�ȥ�(�ǥե����:��)
 *
 * @return string \$data�����Ƥ�Ÿ������HTML�����顼�ξ���FALSE���֤��ޤ�������HTML�Υե������name�ϰ����ǻ��ꤵ�줿$data�Υ�����"dg_"���ղä�����Ρ�value�ϥ������б������ͤ����$level���˰Ź沽������ΤǤ���
 *
 */
function DgSession_form_in($data, $level, $akeydir = "")
{
    global $dg_err_msg;
    global $dg_log_msg;

    /* form�Υǡ�����Ÿ�� */
    foreach ($data as $key => $value) {

        /* value��Ź沽 */
        $enc_str = DgSession_encode_str($value, $level, $akeydir);
        if ($enc_str === FALSE) {
            return FALSE;
        }

        /* form�Ȥ�Ω�� */
        $html .= "<input type=\"hidden\" name=\"dg_" . $key . "\" value=\"" .
                 $enc_str . "\">\n";

    }
    return $html;
}

/**
 *
 * �Ź沽���줿form�ǡ�����ǥ����ɤ���
 *
 * ����$postdata�Υ�����ʸ����dg_�ǻϤޤäƤ���ɬ�פ�����ޤ���(DgSession_form_in�Ǻ�������form�ˤ�äƺ������줿�ǡ�����ǥ����ɤ��ޤ���)
 *
 * ����$level�ϰʲ���ư���Ԥ��ޤ���<br>
 * $level = 1 : mcrypt�ǰŹ沽����ʸ�����ʣ�粽<br>
 * $level = 2 : base64��str_rot13��ʣ�粽
 * 
 * $level = 1�ξ�硢���Ѥ���ˤϥץ����¦��Dg_Common.php��include����ɬ�פ�����ޤ���
 *
 * @param array   $postdata DgSession_form_in�ˤ�äưŹ沽���졢POST�������Ƥ����ǡ���
 * @param integer $level    �ǥ����ɤ����٥�(1 or 2)
 * @param string  $akeydir  etc/admin.key�����֤���Ƥ���ǥ��쥯�ȥ�(�ǥե����:��)
 *
 * @return array ʣ�粽����Ϣ������($data["dg_���������key"] = "ʣ�粽����value"
 *
 */
function DgSession_form_out($postdata, $level, $akeydir = "")
{
    global $dg_err_msg;
    global $dg_log_msg;

    $dg_strlen = strlen(DG_FRONT_STR);

    /* form�Υǡ�����Ÿ�� */
    foreach ($postdata as $key => $value) {
        /* dg_�ʳ�����ʬ�ڤ�Ф� */
        $ch_key = substr($key, $dg_strlen);

        /* ʣ�粽 */
        $dec_str = DgSession_decode_str($value, $level, $akeydir);
        if ($dec_str === FALSE) {
            return FALSE;
        }

        /* ��Ǽ */
        $dec_data[$ch_key] = $dec_str;

    }
    return $dec_data;
}

?>
