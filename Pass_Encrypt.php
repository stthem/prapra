<?php
###############################################################################
# сервер "понимает" это кодирование.Он преобразует пароль, введенные пользова-#
# телем в форму авторизации при входе в защищенную область и сравнивает с тем #
# который сгенерирован этой программой и это работает                         #
###############################################################################
#                                                
                                                 // берем только 10 символов
$w_pass          = $$headers_db[1];              // это пароль не зашифрованный
$salt            = substr($w_pass,0,2);          //     
//$$headers_db[1]  = crypt($w_pass,$salt);       // в демо пароль не зашифрован
?>