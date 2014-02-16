YBpublish


--------------
Config_files:

DB_config:
application/config/database.php


Login_Api:
application/libraries/Ybauth.php  --#57


Linux_config
modify /etc/sudoers
add:
www     ALL=(root)      NOPASSWD:/bin/mkdir
www     ALL=(root)      NOPASSWD:/bin/cp
www     ALL=(root)      NOPASSWD:/bin/echo
www     ALL=(root)      NOPASSWD:/usr/bin/tee


Mkdir
/work_dir


chmod 777
application/logs
application/cache
