YBpublish-stable-0.1
====================

DB_config:
--------------
	application/config/database.php


Login_Api:
--------------
	application/libraries/Ybauth.php  --#57


Linux_config
--------------
modify /etc/sudoers:

	www     ALL=(root)      NOPASSWD:/bin/mkdir
	www     ALL=(root)      NOPASSWD:/bin/cp
	www     ALL=(root)      NOPASSWD:/bin/echo
	www     ALL=(root)      NOPASSWD:/usr/bin/tee
	www     ALL=(root)      NOPASSWD:/usr/bin/rsync


Mkdir
--------------
	/work_dir


chmod 777
--------------
	application/logs
	application/cache
