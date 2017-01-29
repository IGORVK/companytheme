<?php  global $phpmailer;

if( !empty( $_POST['comment'] ) || !empty( $_POST['message'] ) ) {
    exit;
}

// аргументов функции будет путь к файлу
function get_filesize($file)
{
    // идем файл
    if(!file_exists($file)) return "Файл  не найден";
    // теперь определяем размер файла в несколько шагов
    $filesize = filesize($file);
    // Если размер больше 1 Кб
    if($filesize > 1024)
    {
        $filesize = ($filesize/1024);
        // Если размер файла больше Килобайта
        // то лучше отобразить его в Мегабайтах. Пересчитываем в Мб
        if($filesize > 1024)
        {
            $filesize = ($filesize/1024);
            // А уж если файл больше 1 Мегабайта, то проверяем
            // Не больше ли он 1 Гигабайта
            if($filesize > 1024)
            {
                $filesize = ($filesize/1024);
                $filesize = round($filesize, 1);
                return $filesize." Gb";
            }
            else
            {
                $filesize = round($filesize, 1);
                return $filesize." Mb";
            }
        }
        else
        {
            $filesize = round($filesize, 1);
            return $filesize." Kb";
        }
    }
    else
    {
        $filesize = round($filesize, 1);
        return $filesize." bite";
    }
}
// подключаем WP, можно конечно обойтись без этого, но зачем?
require( $_SERVER['DOCUMENT_ROOT'].'/wp-load.php');

// следующий шаг - проверка на обязательные поля, у нас это емайл, имя и сообщение
if( ( $_POST['formAgree'] =='yes' )&&!empty( $_POST['name'] )&&!empty( $_POST['phone'] )&&!empty( $_POST['company'] ) && !empty( $_POST['email'] ) && is_email( $_POST['email'] ) && !empty( $_POST['wrapf2'] ) ) {
    //yзнаем IP
    $ip = $_SERVER['REMOTE_ADDR'];

    // Каталог, в который мы будем принимать файл:
    if (!empty($_FILES['mail_file']['name'])) {
        //проверяем на расширение загружаемого файла
        $blacklist = array(".php", ".phtml", ".php3", ".php4", ".html", ".htm", ".js", ".css");
        //получаем MIME-type и размер
        foreach ($blacklist as $item)
            if (preg_match("/$item\$/i", $_FILES['mail_file']['name'])) exit;
        $type = $_FILES['mail_file']['type'];
        $size = $_FILES['mail_file']['size'];
        $filesize = round($size / 1024);
        if (($type != "image/jpg") && ($type != "image/jpeg") && ($type != "application/pdf")) {
            header('Location:' . get_bloginfo('wpurl') . "/contact-us?msg=error");
            exit;
        }

        if ($size > 524288) {
            header('Location:' . get_bloginfo('wpurl') . "/contact-us?msg=error");
            exit;
        }
        //поместить файл в директорию "tmp-files"
        $uploadfile = "tmp-files/" . $_FILES['mail_file']['name'];
        //перемещаем файл в выбранную нами директорию из его временного хранилища.
        move_uploaded_file($_FILES['mail_file']['tmp_name'], $uploadfile);
        //открываем поток работы с файлом
        $file = fopen($uploadfile, "rb");
        //заносим имя файла в переменную
        $filename = $_FILES['mail_file']['name'];
        $fileobject = base64_encode(fread($file, $_FILES[mail_file][size]));

    } else {
        $filename = 'none';
        $fileobject = 'none';
        $filesize = 'none';
    }

    $txt = $_POST['wrapf2'];

    $message = wordwrap($txt, 80, "<br>\n");


    if (!is_object($phpmailer) || !is_a($phpmailer, 'PHPMailer')) { // проверяем, существует ли объект $phpmailer и принадлежит ли он классу PHPMailer
// если нет, то подключаем необходимые файлы с классами и создаём новый объект
        require_once ABSPATH . WPINC . '/class-phpmailer.php';
        require_once ABSPATH . WPINC . '/class-smtp.php';
        $phpmailer = new PHPMailer(true);
    }


    $phpmailer->ClearAttachments(); // если в объекте уже содержатся вложения, очищаем их
    $phpmailer->ClearCustomHeaders(); // то же самое касается заголовков письма
    $phpmailer->ClearReplyTos();
    $phpmailer->From = $_POST['email']; // от кого, Email
    $phpmailer->FromName = $_POST['name'] ;
    $phpmailer->Subject = 'Contact on ' . get_bloginfo('name'); // тема
    $phpmailer->SingleTo = true; // это означает, что если получателей несколько, то отображаться будет всё равно только один
    $phpmailer->ContentType = 'multipart/mixed'; // тип содержимого письма
    $phpmailer->IsHTML(true);
    $phpmailer->CharSet = 'utf-8'; // кодировка письма
    $phpmailer->ClearAllRecipients(); // очищаем всех получателей
    $phpmailer->AddAddress('' . get_bloginfo('admin_email')); // добавляем новый адрес получателя
    $phpmailer->Body = '<p>Company: ' . $_POST['company'] . '</p>' . '<br><p>Phone: ' . $_POST['phone'] . '</p>' . '<br><p>IP: ' . $ip . ' IP search:' .'<a href=http://whatismyipaddress.com/ip/' . $ip .'>http://whatismyipaddress.com/ip/</a></p>' . '<br><p>I agree to process my personal data: ' . $_POST[ 'formAgree']  .  '</p>' . '<br><p>' . $message . '</p>';
    $phpmailer->addAttachment($uploadfile, $filename, base64, $type);  // добавляем вложение

   



   
    //$phpmailer->Send(); // отправка письма
    if($phpmailer->Send()){
       // echo "Ошибка отправки письма: " . $phpmailer->ErrorInfo;
        if(!isset($_POST['mail_file'])) {
            fclose($file);
            unlink( "tmp-files/" . $_FILES['mail_file']['name']);
             }
        header('Location:' . get_bloginfo('wpurl')."/contact-us?msg=success" );
        exit;
    }
        if(!isset($_POST['mail_file'])) {
            fclose($file);
            unlink( "tmp-files/" . $_FILES['mail_file']['name']);
        }
        header('Location:' . get_bloginfo('wpurl')."/contact-us?msg=error" );
        exit;

}

?>






















