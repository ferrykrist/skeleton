<?php


function genAlert($msg = '', $msgtype = 'success')
{
    return '<div class="alert alert-' . $msgtype . '" role="alert">' . $msg . '</div>';
}

function isLogin($defaultcontroller = 'login', $sessionvar = 'user')
{
    if (!$_SESSION[$sessionvar]) {
        redirect($defaultcontroller);
    };
}

function checkDashboard($name = null, $defaultcontroller = 'dashboard')
{
    $result = isset($_SESSION['modul']['dashboard'][$name]);
    if ((isset($defaultcontroller)) && (!isset($result))) {
        redirect($defaultcontroller);
    }
    return $result;
}

function checkMenu($name = null, $defaultcontroller = 'dashboard')
{
    isLogin();
    $result = isset($_SESSION['modul']['menu'][$name]);
    if ((isset($defaultcontroller)) && (!isset($result))) {
        redirect($defaultcontroller);
    }
    return $result;
}

// check modul
function checkModul($name = null, $defaultcontroller = 'dashboard')
{
    $result = isset($_SESSION['modul']['modul'][$name]);
    if ((isset($defaultcontroller)) && (!isset($result))) {
        redirect($defaultcontroller);
    }
    return $result;
}

// check modul
function checkAkses($name = null, $defaultcontroller = 'dashboard')
{
    $result = $_SESSION['modul']['akses'][$name];
    if ((isset($defaultcontroller)) && (!isset($result))) {
        redirect($defaultcontroller);
    }
    return $result;
}

function checkImgProfile($uid)
{
    $imgfile = MY_UPLOADEDIMGPROFILE  . $uid;
    $defaultfile = MY_IMGPROFILE . 'default.png';
    $result = base_url($defaultfile);
    if (file_exists(FCPATH . $imgfile . '.jpg')) {
        $result = base_url($imgfile . '.jpg');
    };
    if (file_exists(FCPATH . $imgfile . '.png')) {
        $result = base_url($imgfile . '.png');
    };
    return $result;
}

function setChecked($input)
{
    return (($input == 1) ? 'checked' : '');
}

function setDisabled($input)
{
    return ($input ? 'disabled' : '');
}

function setSelected($input)
{
    return ($input ? 'selected' : '');
}

function setValue($input)
{
    return (!empty($input) ? $input : '');
}

function checkNull($input)
{
    return (in_array(trim($input), ['0000-00-00', '']) ? null : $input);
}


/* 
function isset2var
default akan menghasilkan $var1 kalau ada, tapi kalau tidak ada, hasilnya $var2
*/
function isset2var($var1, $var2 = null)
{
    $result = null;
    if (isset($var1)) {
        $result = $var1;
    } else {
        if (isset($var2)) {
            $result = $var2;
        }
    }
    return $result;
}

function confirmation($text)
{
    $result = "return confirm('$text')";
    return $result;
}

function checked_bool($value)
{
    $result = '';
    if ($value || ($value == 1)) {
        $result = 'checked';
    }
    return $result;
}

function tblookup($tbresult, $key, $kvalue, $lkey)
{
    $result = null;
    foreach ($tbresult as $row) {
        if ($row[$key] == $kvalue) {
            $result = $row[$lkey];
        }
    }
    // echo '<pre> RESULT:' . $result . '</pre>';
    return $result;
}

function defvalue($value, $defvalue = 0)
{
    $result = $defvalue;
    if ((!is_null($value)) || ($value != '')) {
        $result = $value;
    }
    return $result;
}

function createDir($path)
{
    if (!file_exists($path)) {
        mkdir($path, 0777, true);
    }
}

// gunakan function ini untuk membuat folder dengan basis UID user
function prep_UID($uid)
{
    createDir(MY_UPLOADEDIMGPROFILE . $uid);
    createDir(MY_UPLOADEDIMGPROFILE . $uid . '/profile');
    createDir(MY_UPLOADEDIMGPROFILE . $uid . '/portofolio');
}

function left_str($str, $length)
{
    return substr($str, 0, $length);
}

function right_str($str, $length)
{
    return substr($str, -$length);
}


function namahari($input)
{
    $hari = date('D', strtotime($input));
    switch ($hari) {
        case 'Sun':
            $result = "Minggu";
            break;
        case 'Mon':
            $result = "Senin";
            break;

        case 'Tue':
            $result = "Selasa";
            break;

        case 'Wed':
            $result = "Rabu";
            break;

        case 'Thu':
            $result = "Kamis";
            break;

        case 'Fri':
            $result = "Jumat";
            break;

        case 'Sat':
            $result = "Sabtu";
            break;

        default:
            $result = "Tidak di ketahui";
            break;
    }
    return  $result;
}

function tglindo($input)
{
    $result = $input . ', ' . namahari($input);
    return $result;
}
